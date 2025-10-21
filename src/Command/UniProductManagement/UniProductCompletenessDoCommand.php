<?php

declare(strict_types=1);

namespace App\Command\UniProductManagement;

use App\Service\UniProductManagement\UniProductCompletenessService;
use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject\UniProductBase\Listing;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:uni:product:completeness:do-update',
    description: 'Calculate product completeness percentage and empty fields for Unified PIM product data.',
)]
class UniProductCompletenessDoCommand extends AbstractCommand
{
    public const OPTION_LIMIT = 'limit';
    public const OPTION_OFFSET = 'offset';

    public function __construct(private readonly UniProductCompletenessService $completenessService)
    {
        parent::__construct();

        $this
            ->setHidden()
            ->addOption(self::OPTION_LIMIT, mode: InputOption::VALUE_REQUIRED)
            ->addOption(self::OPTION_OFFSET, mode: InputOption::VALUE_REQUIRED)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $listing = new Listing();
        $listing->setCondition('path LIKE ?', [UniProductCompletenessCommand::BASE_PATH . '%']);
        $listing->setUnpublished(true);
        $listing->setOffset((int) $this->input->getOption(self::OPTION_OFFSET));
        $listing->setLimit((int) $this->input->getOption(self::OPTION_LIMIT));

        $progress = new ProgressBar($output, $listing->getCount());
        $progress->setFormat(ProgressBar::getFormatDefinition(ProgressBar::FORMAT_DEBUG));
        $progress->start();

        foreach ($listing as $object) {
            $this->completenessService->updateCompleteness($object);
            $object->save();
            $progress->advance();
        }

        $progress->finish();
        $output->writeln('');

        return self::SUCCESS;
    }
}
