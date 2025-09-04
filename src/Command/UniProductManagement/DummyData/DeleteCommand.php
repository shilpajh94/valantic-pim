<?php

declare(strict_types=1);

namespace App\Command\UniProductManagement\DummyData;

use Pimcore\Db;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\UniProductBase;
use Pimcore\Model\DataObject\UniProductCategoryInternal;
use Pimcore\Model\Version;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:uni:product:dummy-data:delete', description: 'Deletes previously generated dummy data.')]
class DeleteCommand extends AbstractDummyDataCommand
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        Version::disable();
        $dirtyDetectionDisabled = DataObject::isDirtyDetectionDisabled();
        DataObject::disableDirtyDetection();

        $condition = '`key` LIKE ?';

        $products = (new UniProductBase\Listing())
            ->setCondition($condition, [self::OBJECT_KEY_PREFIX . '%'])
            ->setUnpublished(true)
        ;
        $categories = (new UniProductCategoryInternal\Listing())
            ->setCondition($condition, [self::OBJECT_KEY_PREFIX . '%'])
            ->setUnpublished(true)
        ;

        $total = $products->count() + $categories->count();

        if ($total === 0) {
            $output->writeln('<info>No products or categories found</info>');

            return self::SUCCESS;
        }

        $output->writeln(sprintf(
            '<info>Deleting %s dummy products and %s dummy categories...</info>',
            $products->count(),
            $categories->count(),
        ));

        $progress = new ProgressBar($output, $total);
        $progress->start();

        Db::get()->beginTransaction();

        foreach ($products as $object) {
            $object->delete();
            $progress->advance();
        }

        foreach ($categories as $object) {
            $object->delete();
            $progress->advance();
        }

        Db::get()->commit();

        $progress->finish();
        $output->writeln(''); // Newline required

        Version::enable();
        DataObject::setDisableDirtyDetection($dirtyDetectionDisabled);

        return Command::SUCCESS;
    }
}
