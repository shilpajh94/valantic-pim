<?php

declare(strict_types=1);

namespace App\Command\UniProductManagement;

use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject\UniProductBase\Listing;
use Pimcore\Model\Version;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Process\Process;

#[AsCommand(
    name: 'app:uni:product:completeness:update',
    description: 'Calculate product completeness percentage and empty fields for Unified PIM product data.',
)]
class UniProductCompletenessCommand extends AbstractCommand
{
    public const BASE_PATH = '/Unified PIM/Product Management/Products';
    public const OPTION_BATCH_SIZE = 'batch-size';
    public const DEFAULT_BATCH_SIZE = 300;

    public function __construct(
        private readonly KernelInterface $kernel,
    ) {
        parent::__construct();

        $this->addOption(self::OPTION_BATCH_SIZE, mode: InputOption::VALUE_OPTIONAL, default: self::DEFAULT_BATCH_SIZE);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $start = microtime(true);
        Version::disable();

        $listing = new Listing();
        $listing->setCondition('path LIKE ?', [self::BASE_PATH . '%']);
        $listing->setUnpublished(true);

        if ($listing->count() === 0) {
            $output->writeln('<info>No products found to calculate.</info>');

            return self::SUCCESS;
        }

        $batchSize = $this->input->getOption(self::OPTION_BATCH_SIZE);
        $iterations = ceil($listing->count() / $batchSize);

        for ($i = 0; $i < $iterations; $i++) {
            $this->output->writeln(sprintf('<comment>Processing batch %s of %s (%s objects)</comment>', $i + 1, $iterations, $listing->getTotalCount()));
            $process = new Process(
                [
                    'bin/console', 'app:uni:product:completeness:do-update',
                    '--limit', $batchSize,
                    '--offset', $i * $batchSize,
                ],
                $this->kernel->getProjectDir(),
                timeout: null,
            );

            $exitCode = $process->run(function ($type, $buffer): void {
                if ($type === Process::ERR && $this->output instanceof ConsoleOutput) {
                    $this->output->getErrorOutput()->write($buffer);
                } else {
                    $this->output->write($buffer);
                }
            });

            if ($exitCode !== self::SUCCESS) {
                throw new \RuntimeException('Error while running subcommand');
            }
        }

        $this->output->writeln('');

        $output->writeln(sprintf('<info>Finished calculating in %s s</info>', round(microtime(true) - $start, 2)));
        Version::enable();

        return self::SUCCESS;
    }
}
