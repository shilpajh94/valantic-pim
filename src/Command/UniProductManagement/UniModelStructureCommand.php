<?php

declare(strict_types=1);

namespace App\Command\UniProductManagement;

use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject\UniProductBase\Listing as ProductListing;
use Pimcore\Model\DataObject\UniProductCategoryInternal\Listing as CategoryListing;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Process\Process;

#[AsCommand(
    name: 'app:uni:model:structure',
    description: 'Check or fix Objectbricks assignment in the Uni data model',
)]
class UniModelStructureCommand extends AbstractCommand
{
    public const ARGUMENT_MODE = 'mode';
    public const OPTION_BATCH_SIZE = 'batch-size';
    public const MODE_CHECK = 'check';
    public const MODE_FIX = 'fix';
    public const BASE_PATH = '/Unified PIM/Product Management/Products';

    public const DEFAULT_BATCH_SIZE = 100;

    public function __construct(
        private readonly KernelInterface $kernel,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument(self::ARGUMENT_MODE, InputArgument::REQUIRED, 'Can be either check or fix. Note that "fix" can cause data loss.')
            ->addOption(self::OPTION_BATCH_SIZE, mode: InputOption::VALUE_OPTIONAL, default: self::DEFAULT_BATCH_SIZE)
            ->setHelp('Note that this is only intended for development purposes as in production the structure will be ensured by the SAP import API.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $mode = $input->getArgument(self::ARGUMENT_MODE);

        if (!in_array($mode, [self::MODE_CHECK, self::MODE_FIX], true)) {
            $this->output->writeln(sprintf('<error>Unknown mode: %s</error>', $mode));

            return self::FAILURE;
        }

        $this->processBaseProducts();
        $this->processCategories();

        $this->output->writeln('<info>Finished!</info>');

        return self::SUCCESS;
    }

    private function processBaseProducts(): void
    {
        $listing = $this->prepareListing(new ProductListing(), 'products');

        if ($listing === null) {
            return;
        }

        $this->output->writeln('<info>Processing products...</info>');
        $this->do(UniModelDoStructureCommand::TYPE_PRODUCT, $listing->count());
    }

    private function processCategories(): void
    {
        $listing = $this->prepareListing(new CategoryListing(), 'categories');

        if ($listing === null) {
            return;
        }

        $this->output->writeln('<info>Processing categories...</info>');
        $this->do(UniModelDoStructureCommand::TYPE_CATEGORY, $listing->count());
    }

    private function prepareListing(ProductListing|CategoryListing $listing, string $elementType): ProductListing|CategoryListing|null
    {
        $listing->setCondition('path LIKE ?', [self::BASE_PATH . '%']);
        $listing->setUnpublished(true);

        if ($listing->getTotalCount() === 0) {
            $this->output->writeln(sprintf('<info>No %s found to process.</info>', $elementType));

            return null;
        }

        return $listing;
    }

    private function do(string $type, int $total): void
    {
        $batchSize = $this->input->getOption(self::OPTION_BATCH_SIZE);
        $iterations = ceil($total / $batchSize);

        for ($i = 0; $i < $iterations; $i++) {
            $this->output->writeln(sprintf('<comment>Processing batch %s of %s (%s objects)</comment>', $i + 1, $iterations, $total));
            $process = new Process(
                [
                    'bin/console', 'app:uni:model:do-structure',
                    $this->input->getArgument(self::ARGUMENT_MODE),
                    '--type', $type,
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
    }
}
