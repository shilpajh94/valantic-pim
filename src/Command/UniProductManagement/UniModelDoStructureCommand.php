<?php

declare(strict_types=1);

namespace App\Command\UniProductManagement;

use App\Enum\UniProductHierarchyLevel;
use App\EventListener\UniProductWorkflowEventListener;
use App\Service\VersionService;
use App\Util\Helpers;
use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject\Concrete;
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
use Pimcore\Model\DataObject\UniRegion;
use Pimcore\Model\Version;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:uni:model:do-structure',
    description: 'Check or fix Objectbricks assignment in the Uni data model',
)]
class UniModelDoStructureCommand extends AbstractCommand
{
    public const ARGUMENT_MODE = 'mode';
    public const OPTION_TYPE = 'type';
    public const OPTION_LIMIT = 'limit';
    public const OPTION_OFFSET = 'offset';
    public const MODE_CHECK = 'check';
    public const MODE_FIX = 'fix';
    public const TYPE_PRODUCT = 'product';
    public const TYPE_CATEGORY = 'category';
    protected const BRICKS_CLASSES = [
        'DY' => [UniPrFgDss::class],
        'FL' => [UniPrBrFhs::class, UniPrSkFhs::class, UniPrFgFhs::class],
        'PT' => [UniPrBrPts::class, UniPrSkPts::class, UniPrFgPts::class],
    ];

    private bool $fix = false;

    /** @var array<string,array<string,string>> */
    private array $result = [];

    /** @var UniRegion[] */
    private array $availableRegions = [];

    private static function objKey(Concrete $object): string
    {
        return sprintf('%s (%s)', $object->getFullPath(), $object->getId());
    }

    protected function configure(): void
    {
        $this
            ->addArgument(self::ARGUMENT_MODE, InputArgument::REQUIRED, 'Can be either check or fix. Note that "fix" can cause data loss.')
            ->addOption(self::OPTION_TYPE, mode: InputOption::VALUE_REQUIRED, description: 'Must be one of [category, product]')
            ->addOption(self::OPTION_LIMIT, mode: InputOption::VALUE_REQUIRED)
            ->addOption(self::OPTION_OFFSET, mode: InputOption::VALUE_REQUIRED)
            ->setHelp('Note that this is only intended for development purposes as in production the structure will be ensured by the SAP import API.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $mode = $input->getArgument(self::ARGUMENT_MODE);
        $this->fix = $mode === self::MODE_FIX;
        $type = $input->getOption(self::OPTION_TYPE);

        if (!in_array($mode, [self::MODE_CHECK, self::MODE_FIX], true)) {
            $this->output->writeln(sprintf('<error>Unknown mode: %s</error>', $mode));

            return self::FAILURE;
        }

        $this->availableRegions = $this->getAvailableRegions();

        VersionService::useLatestVersion(true);
        Version::disable();

        if ($type === self::TYPE_PRODUCT) {
            $this->processBaseProducts();
        } elseif ($type === self::TYPE_CATEGORY) {
            $this->processCategories();
        } else {
            $this->output->writeln(sprintf('<error>Unknown type: %s</error>', $mode));

            return self::FAILURE;
        }

        Version::enable();

        foreach ($this->result as $objKey => $errors) {
            $this->output->writeln(sprintf('<comment>%s</comment>', $objKey));

            foreach ($errors as $error) {
                $this->output->writeln(sprintf(' → %s', $error));
            }
        }

        return self::SUCCESS;
    }

    /**
     * Search for all finished goods in the Uni Product namespace and process them.
     */
    private function processBaseProducts(): void
    {
        $listing = new ProductListing();
        $this->prepareListing($listing);

        if ($listing->getCount() === 0) {
            return;
        }

        $progress = new ProgressBar($this->output, $listing->getCount());
        $progress->setFormat(ProgressBar::getFormatDefinition(ProgressBar::FORMAT_DEBUG));
        $progress->start();

        foreach ($listing as $object) {
            if (!$object instanceof UniProductBase) {
                continue;
            }

            $this->processBaseProduct($object);
            $progress->advance();
        }

        $progress->finish();
        $this->output->writeln('');
    }

    /**
     * Search for all categories in the Uni Product namespace and process them.
     */
    private function processCategories(): void
    {
        $listing = new CategoryListing();
        $this->prepareListing($listing);

        if ($listing->getCount() === 0) {
            return;
        }

        $progress = new ProgressBar($this->output, $listing->getCount());
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

    /**
     * Add internal category level relations when missing and ensure the correct Objectbricks are added based on the product group.
     */
    private function processBaseProduct(UniProductBase $object): void
    {
        // $object = VersionService::getPublishedOrLatestVersion($object);

        /* --- Fix Levels --- */
        $parents = $this->getFullCategoryHistory($object);
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

        $missingBricks = $this->processMissingBricks($object);

        if ($missingBricks !== []) {
            $this->result[self::objKey($object)][] = sprintf('Missing bricks: %s', implode(', ', $missingBricks));
        }

        if ($this->fix) {
            foreach ($missingBricks as $missingBrick) {
                $setter = sprintf('set%s', Helpers::classBasename($missingBrick));
                $brickGetter = match ($missingBrick) {
                    UniPrBrFhs::class, UniPrBrPts::class => 'getBrandProductGroupSpecific',
                    UniPrSkFhs::class, UniPrSkPts::class => 'getSkeletonProductGroupSpecific',
                    UniPrFgDss::class, UniPrFgFhs::class, UniPrFgPts::class => 'getFinishedGoodProductGroupSpecific',
                    default => throw new \RuntimeException(sprintf('Unknown brick %s', $missingBrick)),
                };
                $object->$brickGetter()?->$setter(new $missingBrick($object));
            }
        }

        // TODO: Remove surplus bricks?

        /* --- Fix regions --- */

        // Make every product available in all regions for now.
        $missingRegions = array_diff($this->availableRegions, $object->getRegionalAvailability());

        if ($missingRegions !== []) {
            $this->result[self::objKey($object)][] = sprintf(
                'Missing regions: %s',
                implode(', ', array_map(static fn (UniRegion $region): ?string => $region->getName(), $missingRegions)),
            );
        }

        if ($this->fix) {
            $object->setRegionalAvailability($this->availableRegions);
        }

        /* --- Save changes --- */

        if (!$this->fix || ($missingBricks === [] && $missingLevels === [] && $surplusLevels === [] && $missingRegions === [])) {
            return;
        }

        $object->setOmitMandatoryCheck(true);
        $object->save([UniProductWorkflowEventListener::SKIP_WORKFLOW_LISTENER => true]);
    }

    /**
     * Set internal category level name when missing and ensure the correct Objectbricks are added based on the product group.
     */
    private function processCategory(UniProductCategoryInternal $object): void
    {
        // $object = VersionService::getPublishedOrLatestVersion($object);

        $level = (int) $object->getLevel();
        $hierarchyLevel = $object->getHierarchyLevel();
        $fixLevel = UniProductHierarchyLevel::fromLevelNumber($level)->value;
        $levelMismatch = $hierarchyLevel !== $fixLevel;

        if ($levelMismatch) {
            $this->result[self::objKey($object)][] = sprintf('Wrong or missing level: %s instead of %s', $hierarchyLevel ?? '–', $fixLevel);

            if ($this->fix) {
                $object->setHierarchyLevel($fixLevel);
            }
        }

        if ($this->fix) {
            $object->setOmitMandatoryCheck(true);
            $object->save([UniProductWorkflowEventListener::SKIP_WORKFLOW_LISTENER => true]);
        }
    }

    /** @return UniProductCategoryInternal[] */
    private function getFullCategoryHistory(UniProductBase|UniProductCategoryInternal $object): array
    {
        $result = [];
        $parent = $object->getParent();

        while (true) {
            if (!$parent instanceof UniProductBase && !$parent instanceof UniProductCategoryInternal) {
                break;
            }

            $result[] = $parent;
            $parent = $parent->getParent();
        }

        return $result;
    }

    /**
     * Returns a list of Objectbricks that should be assigned to a given object based on product hierarchy level
     * and product group.
     *
     * @return string[]
     */
    private function processMissingBricks(UniProductBase $object): array
    {
        $parents = $this->getFullCategoryHistory($object);

        if ($parents === []) {
            return [];
        }

        $l1 = end($parents);
        $bricksClasses = self::BRICKS_CLASSES[$l1->getKey()] ?? [];
        $bricks = match ($object->getHierarchyLevel()) {
            UniProductHierarchyLevel::PRODUCT_LINE->value => $object->getBrandProductGroupSpecific()?->getItems() ?? [],
            UniProductHierarchyLevel::PRODUCT_VARIANT->value => $object->getSkeletonProductGroupSpecific()?->getItems() ?? [],
            UniProductHierarchyLevel::FINISHED_GOOD->value => $object->getFinishedGoodProductGroupSpecific()?->getItems() ?? [],
            default => [],
        };
        $existingBricks = array_map(static fn ($brick): string => $brick::class, $bricks);

        return array_diff($bricksClasses, $existingBricks);
    }

    private function prepareListing(ProductListing|CategoryListing $listing): void
    {
        $listing->setCondition('path LIKE ?', [UniModelStructureCommand::BASE_PATH . '%']);
        $listing->setUnpublished(true);

        $offset = (int) $this->input->getOption(self::OPTION_OFFSET);
        $limit = (int) $this->input->getOption(self::OPTION_LIMIT);

        $listing->setOffset($offset);
        $listing->setLimit($limit);
    }

    /** @return UniRegion[] */
    private function getAvailableRegions(): array
    {
        $listing = new UniRegion\Listing();
        $listing->setCondition('path LIKE ?', ['/Unified PIM/%']);
        $result = $listing->load();

        return array_filter($result, static fn (UniRegion $region): bool => !$region->hasChildren());
    }
}
