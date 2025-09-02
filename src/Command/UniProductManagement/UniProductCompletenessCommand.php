<?php

declare(strict_types=1);

namespace App\Command\UniProductManagement;

use App\Service\UniProductManagement\UniProductCompletenessService;
use Pimcore\Model\DataObject\UniProductBase\Listing;
use Pimcore\Model\Version;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:uni:product:completeness:update',
    description: 'Calculate product completeness percentage and empty fields for Unified PIM product data.',
)]
class UniProductCompletenessCommand extends Command
{
    protected const BASE_PATH = '/Unified PIM/Product Management/Products';

    public function __construct(private readonly UniProductCompletenessService $completenessService)
    {
        parent::__construct();
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

        $progress = new ProgressBar($output, $listing->count());
        $progress->setFormat(ProgressBar::getFormatDefinition(ProgressBar::FORMAT_DEBUG));
        $progress->start();

        foreach ($listing as $object) {
            $this->completenessService->updateCompleteness($object);
            $object->save();
            $progress->advance();
        }

        $progress->finish();
        $output->writeln('');
        $output->writeln(sprintf('<info>Finished calculating in %s s</info>', round(microtime(true) - $start, 2)));
        Version::enable();

        return self::SUCCESS;
    }
}
