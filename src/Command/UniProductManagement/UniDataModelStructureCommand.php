<?php

declare(strict_types=1);

namespace App\Command\UniProductManagement;

use App\Enum\UniProductCategoryLevel;
use App\EventListener\UniProductWorkflowEventListener;
use App\Service\VersionService;
use App\Util\Helpers;
use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Objectbrick\Data\UniPrBr;
use Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrFhs;
use Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrPts;
use Pimcore\Model\DataObject\Objectbrick\Data\UniPrFgDss;
use Pimcore\Model\DataObject\Objectbrick\Data\UniPrFgFhs;
use Pimcore\Model\DataObject\Objectbrick\Data\UniPrFgPts;
use Pimcore\Model\DataObject\Objectbrick\Data\UniPrSkFhs;
use Pimcore\Model\DataObject\Objectbrick\Data\UniPrSkPts;
use Pimcore\Model\DataObject\UniProductBase;
use Pimcore\Model\DataObject\UniProductBase\Listing as ProductListing;
use Pimcore\Model\DataObject\UniProductCategoryInternal;
use Pimcore\Model\DataObject\UniProductCategoryInternal\Listing as CategoryListing;
use Pimcore\Model\Version;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:uni:model:structure',
    description: 'Check or fix Objectbricks assignment in the Uni data model',
)]
class UniDataModelStructureCommand extends AbstractCommand
{
    public const ARGUMENT_MODE = 'mode';
    public const MODE_CHECK = 'check';
    public const MODE_FIX = 'fix';
    protected const BASE_PATH = '/Unified PIM/Product Management/Products';
    protected const BRICKS_CLASSES_BR = [
        'DY' => [UniPrBr::class],
        'FL' => [UniPrBr::class, UniPrBrFhs::class],
        'PT' => [UniPrBr::class, UniPrBrPts::class],
    ];

    protected const BRICKS_CLASSES_SK = [
        'DY' => [],
        'FL' => [UniPrSkFhs::class],
        'PT' => [UniPrSkPts::class],
    ];

    protected const BRICKS_CLASSES_FG = [
        'DY' => [UniPrFgDss::class],
        'FL' => [UniPrFgFhs::class],
        'PT' => [UniPrFgPts::class],
    ];

    private ?string $mode = null;
    private bool $fix = false;

    /** @var array<string,array<string,string>> */
    private array $result = [];

    private static function objKey(Concrete $object): string
    {
        return sprintf('%s (%s)', $object->getFullPath(), $object->getId());
    }

    protected function configure(): void
    {
        $this
            ->addArgument(self::ARGUMENT_MODE, InputArgument::REQUIRED, 'Can be either check or fix. Note that "fix" can cause data loss.')
            ->setHelp('Note that this is only intended for development purposes as in production the structure will be ensured by the SAP import API.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->mode = $input->getArgument(self::ARGUMENT_MODE);
        $this->fix = $this->mode === self::MODE_FIX;

        if (!in_array($this->mode, [self::MODE_CHECK, self::MODE_FIX], true)) {
            $this->output->writeln(sprintf('<error>Unknown mode: %s</error>', $this->mode));

            return self::FAILURE;
        }

        VersionService::useLatestVersion(true);
        Version::disable();

        $this->processFinishedGoods();
        $this->processCategories();
        Version::enable();

        foreach ($this->result as $objKey => $errors) {
            $this->output->writeln(sprintf('<comment>%s</comment>', $objKey));

            foreach ($errors as $error) {
                $this->output->writeln(sprintf(' → %s', $error));
            }
        }

        $this->output->writeln('<info>Finished!</info>');

        return self::SUCCESS;
    }

    private function processFinishedGoods(): void
    {
        $listing = new ProductListing();
        $listing->setCondition('path LIKE ?', [self::BASE_PATH . '%']);
        $listing->setUnpublished(true);

        if ($listing->count() === 0) {
            $this->output->writeln('<info>No products found to process.</info>');

            return;
        }

        $this->output->writeln('<info>Processing finished goods...</info>');
        $progress = new ProgressBar($this->output, $listing->count());
        $progress->setFormat(ProgressBar::getFormatDefinition(ProgressBar::FORMAT_DEBUG));
        $progress->start();

        foreach ($listing as $object) {
            if (!$object instanceof UniProductBase) {
                continue;
            }

            $this->processFinishedGood($object);
            $progress->advance();
        }

        $progress->finish();
        $this->output->writeln('');
    }

    private function processCategories(): void
    {
        $listing = new CategoryListing();
        $listing->setCondition('path LIKE ?', [self::BASE_PATH . '%']);
        $listing->setUnpublished(true);

        if ($listing->count() === 0) {
            $this->output->writeln('<info>No categories found to process.</info>');

            return;
        }

        $this->output->writeln('<info>Processing categories...</info>');
        $progress = new ProgressBar($this->output, $listing->count());
        $progress->setFormat(ProgressBar::getFormatDefinition(ProgressBar::FORMAT_DEBUG));
        $progress->start();

        foreach ($listing as $object) {
            if (!$object instanceof UniProductCategoryInternal) {
                continue;
            }

            $this->processCategory($object);
            $progress->advance();
        }

        $progress->finish();
        $this->output->writeln('');
    }

    private function processFinishedGood(UniProductBase $object): void
    {
        // $object = VersionService::getPublishedOrLatestVersion($object);

        /* --- Fix Levels --- */

        $parents = $this->getParents($object);
        $catTransformer = static fn ($cat): ?string => $cat instanceof UniProductCategoryInternal ? $cat->getFullPath() : null;
        $mappedLevels = array_filter(array_map($catTransformer, $object->getInternalCategories()));
        $actualLevels = array_filter(array_map($catTransformer, $parents));

        $missingLevels = array_diff($actualLevels, $mappedLevels);
        $surplusLevels = array_diff($mappedLevels, $actualLevels);

        if ($this->fix && ($missingLevels !== [] || $surplusLevels !== [])) {
            // Force correct parents
            $object->setInternalCategories(array_reverse($parents));
        }

        // TODO: Currently mapped levels does not show them all
        //       print_r(['actualLevels' => $actualLevels, 'mappedLevels' => $mappedLevels]);
        if ($missingLevels !== []) {
            $this->result[self::objKey($object)][] = sprintf('Missing levels: %s', implode(', ', $missingLevels));
        }

        if ($surplusLevels !== []) {
            $this->result[self::objKey($object)][] = sprintf('Surplus levels: %s', implode(', ', $surplusLevels));
        }

        /* --- Fix Objectbricks --- */

        $missingBricks = $this->getMissingBricks($object, self::BRICKS_CLASSES_FG);

        if ($missingBricks !== []) {
            $this->result[self::objKey($object)][] = sprintf('Missing bricks: %s', implode(', ', $missingBricks));
        }

        if (!$this->fix || ($missingBricks === [] && $missingLevels === [] && $surplusLevels === [])) {
            return;
        }

        foreach ($missingBricks as $missingBrick) {
            $setter = sprintf('set%s', Helpers::classBasename($missingBrick));
            $object->getProductGroupSpecific()?->$setter(new $missingBrick($object));
        }

        // TODO: Remove surplus bricks?

        $object->setOmitMandatoryCheck(true);
        $object->save([UniProductWorkflowEventListener::SKIP_WORKFLOW_LISTENER => true]);
    }

    private function processCategory(UniProductCategoryInternal $object): void
    {
        // $object = VersionService::getPublishedOrLatestVersion($object);

        $level = (int) $object->getLevel();
        $categoryLevel = $object->getCategoryLevel();
        $fixLevel = UniProductCategoryLevel::fromLevelNumber($level)->value;
        $levelMismatch = $categoryLevel !== $fixLevel;

        if ($levelMismatch) {
            $this->result[self::objKey($object)][] = sprintf('Wrong or missing level: %s instead of %s', $categoryLevel ?? '–', $fixLevel);

            if ($this->fix) {
                $object->setCategoryLevel($fixLevel);
            }
        }

        $bricksClasses = match ($level) {
            5 => self::BRICKS_CLASSES_BR,
            6 => self::BRICKS_CLASSES_SK,
            default => [],
        };

        $missingBricks = $this->getMissingBricks($object, $bricksClasses);

        if ($missingBricks !== []) {
            $this->result[self::objKey($object)][] = sprintf('Missing bricks: %s', implode(', ', $missingBricks));
        }

        // TODO: Remove surplus bricks?

        if (!$this->fix || ($missingBricks === [] && !$levelMismatch)) {
            return;
        }

        foreach ($missingBricks as $missingBrick) {
            $setter = sprintf('set%s', Helpers::classBasename($missingBrick));
            $object->getLevelSpecificData()?->$setter(new $missingBrick($object));
        }

        $object->setOmitMandatoryCheck(true);
        $object->save([UniProductWorkflowEventListener::SKIP_WORKFLOW_LISTENER => true]);
    }

    /** @return UniProductCategoryInternal[] */
    private function getParents(UniProductBase|UniProductCategoryInternal $object): array
    {
        $result = [];
        $parent = $object->getParent();

        while (true) {
            if (!$parent instanceof UniProductCategoryInternal) {
                break;
            }

            $result[] = $parent;
            $parent = $parent->getParent();
        }

        return $result;
    }

    /**
     * @param array<string,mixed> $lookup
     *
     * @return string[]
     */
    private function getMissingBricks(UniProductBase|UniProductCategoryInternal $object, array $lookup): array
    {
        $parents = $this->getParents($object);

        if ($parents === []) {
            return [];
        }

        $l1 = end($parents);
        $bricksClasses = $lookup[$l1->getKey()] ?? [];
        $bricks = match ($object::class) {
            UniProductBase::class => $object->getProductGroupSpecific()?->getItems() ?? [],
            UniProductCategoryInternal::class => $object->getLevelSpecificData()?->getItems() ?? [],
            default => [],
        };
        $existingBricks = array_map(static fn ($brick): string => $brick::class, $bricks);

        return array_diff($bricksClasses, $existingBricks);
    }
}
