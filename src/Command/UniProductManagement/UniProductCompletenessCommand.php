<?php

namespace App\Command\UniProductManagement;

use App\Service\UniProductManagement\UniProductCompletenessService;
use Pimcore\Model\DataObject\UniProductBase\Listing;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:uni:product:completeness:update')]
class UniProductCompletenessCommand extends Command
{
    protected const PARENT_PATH = '/Unified PIM/Product Management/Products';

    public function __construct(private readonly UniProductCompletenessService $completenessService)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $start = microtime(true);

        // TODO: Potentially filter listing by base path
        foreach (new Listing() as $object) {
            $output->writeln(sprintf('Processing %s...', $object->getFullPath()));
            $this->completenessService->updateCompleteness($object);
            $object->save();
        }

        $output->writeln(sprintf('<info>Finished calculating in %s ms</info>', microtime(true) - $start));

        return self::SUCCESS;
    }
}
