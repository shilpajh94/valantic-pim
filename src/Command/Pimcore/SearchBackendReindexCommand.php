<?php

declare(strict_types=1);

namespace App\Command\Pimcore;

use Pimcore\Console\AbstractCommand;
use Pimcore\Db;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Process\Process;

#[AsCommand(
    name: 'app:pimcore:search-backend-reindex',
    description: 'Replaces pimcore:search-backend-reindex to prevent memory leaks',
)
]
class SearchBackendReindexCommand extends AbstractCommand
{
    use SearchBackendReindexTrait;

    public function __construct(
        private readonly KernelInterface $kernel,
    ) {
        parent::__construct();
    }

    /**
     * @see \Pimcore\Bundle\SimpleBackendSearchBundle\Command\SearchBackendReindexCommand
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $db = Db::get();

        $elementsPerLoop = 100;
        $types = ['asset', 'document', 'object'];

        foreach ($types as $type) {
            $elementsTotal = $this->getList($type)->getTotalCount();

            $this->output->writeln('Processing ' . $type);

            $iterations = ceil($elementsTotal / $elementsPerLoop);
            $progress = new ProgressBar($output, (int) $iterations);

            for ($i = 0; $i < $iterations; $i++) {
                $process = new Process(
                    [
                        'bin/console', 'app:pimcore:do-search-backend-reindex',
                        '--type', $type,
                        '--limit', $elementsPerLoop,
                        '--offset', $i * $elementsPerLoop,
                    ],
                    $this->kernel->getProjectDir(),
                    timeout: null,
                );
                $progress->advance();

                $exitCode = $process->run(function ($type, $buffer): void {
                    if ($type === Process::ERR && $this->output instanceof ConsoleOutput) {
                        $this->output->getErrorOutput()->write($buffer);
                    } else {
                        $this->output->write($buffer);
                    }
                });

                if ($exitCode !== self::SUCCESS) {
                    return self::FAILURE;
                }
            }

            $progress->finish();

            $output->writeln('');
            $output->writeln('');

            $db->executeQuery(
                sprintf(
                    "DELETE FROM `search_backend_data` WHERE `maintype` = '%s' AND `id` NOT IN (SELECT `id` FROM `%ss`);",
                    $type,
                    $type,
                ),
            );
        }

        $db->executeQuery('OPTIMIZE TABLE search_backend_data;');

        return Command::SUCCESS;
    }
}
