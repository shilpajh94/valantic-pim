<?php

namespace App\Command\UniProductManagement\DummyData;

use Pimcore\Db;
use Pimcore\Model\Asset;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrand;
use Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrandDss;
use Pimcore\Model\DataObject\Objectbrick\Data\UniPrBrandPts;
use Pimcore\Model\DataObject\Objectbrick\Data\UniPrGsTechDss;
use Pimcore\Model\DataObject\Objectbrick\Data\UniPrGsTechPts;
use Pimcore\Model\DataObject\Objectbrick\Data\UniPrSkeletonDss;
use Pimcore\Model\DataObject\Objectbrick\Data\UniPrSkeletonPts;
use Pimcore\Model\DataObject\UniProductBase;
use Pimcore\Model\DataObject\UniProductCategoryInternal;
use Pimcore\Model\Version;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:uni:product:dummy-data:generate', description: 'Generates dummy products including hierarchy.')]
class GenerateCommand extends AbstractDummyDataCommand
{
    protected const BATCH_SIZE = 2000;
    private const OBJECT_KEY_TEMPLATE = self::OBJECT_KEY_PREFIX . '%s %03d';
    private const OBJECT_NAME_TEMPLATE = '%s %03d';

    private const OBJECT_COUNTS = [
        10, // Product Group
        10, // Category - 100
        10, // Sub Category - 1000
        5,  // High Level Brand - 5000
        10, // Product Line - 50'000
        10, // Product Variant - 500'000
        5,  // Finished good - 2'500'000 (currently ~2M finished goods)
    ];

    private const OBJECT_PREFIXES = [
        'Product Group',
        'Category',
        'Sub Category',
        'High Level Brand',
        'Product Line Brand',
        'Product Variant',
        'Finished Good',
    ];

    private OutputInterface $output;
    private ProgressBar $progress;
    private int $maxLevel;
    private ?Asset $mainImage;
    private array $regions;
    private int $committableObjects = 0;
    private int $now;

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        Version::disable();
        $dirtyDetectionDisabled = DataObject::isDirtyDetectionDisabled();
        DataObject::disableDirtyDetection();

        $this->now = \Carbon\Carbon::now()->timestamp;
        $this->maxLevel = count(self::OBJECT_COUNTS) + 1;
        $this->output = $output;

        $totalObjects = 5 * array_reduce(self::OBJECT_COUNTS, static fn(?int $carry, int $count): int => $count * ($carry ?? 1));
        $this->output->writeln(sprintf('<info>Creating %s dummy objects over %s levels...</info>', self::nf($totalObjects), count(self::OBJECT_COUNTS)));

        $this->progress = new ProgressBar($output, $totalObjects);
        $this->progress->setFormat(ProgressBar::getFormatDefinition(ProgressBar::FORMAT_DEBUG));
        $this->progress->start();

        $this->mainImage = Asset::getByPath(self::MAIN_IMAGE_PATH);
        $parent = DataObject::getByPath(self::PARENT_PATH);

        $this->regions = [];

        foreach (['CN', 'HK', 'JP', 'KR'] as $country) {
            $this->regions[] = DataObject::getByPath(sprintf('%s/IAPAC/%s', self::REGION_PATH, $country));
        }

        if ($parent === null || $this->mainImage === null || in_array(null, $this->regions, true)) {
            Version::enable();
            $this->output->writeln('');
            $this->output->writeln('<error>Error: At least one static object not found</error>');

            return Command::FAILURE;
        }

        Db::get()->beginTransaction();

        $this->createObjects(self::OBJECT_COUNTS, self::OBJECT_PREFIXES, $parent);

        if (Db::get()->isTransactionActive()) {
            Db::get()->commit();
        }

        $this->progress->finish();
        $this->output->writeln(''); // Newline required

        Version::enable();
        DataObject::setDisableDirtyDetection($dirtyDetectionDisabled);

        return Command::SUCCESS;
    }

    private function createObjects(array $objectCounts, array $objectPrefixes, AbstractObject $parent): void
    {
        if ($objectCounts === []) {
            return;
        }

        $count = array_shift($objectCounts);
        $prefix = array_shift($objectPrefixes);
        $level = count(self::OBJECT_COUNTS) - count($objectCounts) + 1;

        for ($i = 0; $i <= $count; $i++) {
            $object = $this->createObject($parent, $prefix, $i, $level);
            $this->createObjects($objectCounts, $objectPrefixes, $object);
        }
    }

    private function createObject(AbstractObject $parent, string $prefix, int $i, int $level): AbstractObject
    {
        $isFinishedGood = $level === $this->maxLevel;

        $result = $isFinishedGood ? new UniProductBase() : new UniProductCategoryInternal();
        $result->setParent($parent);
        $result->setPublished(true);
        $result->setKey(sprintf(self::OBJECT_KEY_TEMPLATE, $prefix, $i + 1));
        $result->setCreationDate($this->now);
        $result->setModificationDate($this->now);

        $name = sprintf(self::OBJECT_NAME_TEMPLATE, $prefix, $i + 1);

        $ghpCode = strtoupper(substr(md5(microtime()), random_int(0, 26), $level < 5 ? 2 : 3));

        if ($result instanceof UniProductBase) {
            $result->setSapDescription($name);
            $result->setSapMaterialNumber(uniqid('', true));

            if ($parent instanceof UniProductCategoryInternal) {
                $result->setGhpFullCode($parent->getPimInternalHiearchyCode() . $ghpCode);
            }
        } else {
            $result->setGhpCode($ghpCode);
            $result->setName($name);
        }

        if ($level === $this->maxLevel - 2) {
            $this->assignProductGroupSpecificBrandData($result);
        } elseif ($level === $this->maxLevel - 1) {
            $this->assignProductGroupSpecificSkeletonData($result);
        } elseif ($level === $this->maxLevel) {
            $this->addHierarchyRelations($result);
            $this->setRegionalAvailability($result);
            $this->assignProductGroupSpecificFinishedGoodData($result);
        }

        $this->committableObjects++;
        $result->save();

        if ($this->committableObjects > self::BATCH_SIZE) {
            Db::get()->commit();
            Db::get()->beginTransaction();
            $this->committableObjects = 0;
        }

        $this->progress->advance();

        return $result;
    }

    private function assignProductGroupSpecificBrandData(UniProductCategoryInternal $object): void
    {
        $baseProductData = (new UniPrBrand($object))
            ->setProductDescriptionShort('FRONTIER RED 200 PSI WORKING PRESSURE  3/4X500 FOOT REEL ')
            ->setIndustrialStandard('CEI EN 60312')
            ->setMarketingDescriptionLong('Variflex is a good-quality, economical general purpose hose with an ARPM Class A (Limited Oil Resistance) tube and cover. This hose is for industrial air service, compressor lines, pneumatic tools, low-pressure spray and many other applications where the need for oil resistance is high. It is Non-conductive with a minimum electrical resistance greater than one (1) megohm per inch of length of hose at 1000 V DC. Available in 200, 250 and 300 PSI working pressures.')
            ->setMarketingDescriptionLong('Variflex 是一種品質優良、經濟實惠的通用軟管，配有 ARPM A 級（耐油性有限）的管子和外層。此軟管適用於工業空氣服務、壓縮機管路、氣動工具、低壓噴霧及許多對耐油性需求較高的其他應用。它不導電，在 1000 V 直流電壓下，每英吋軟管長度的最小電阻大於一 (1) 兆歐姆。提供 200、250 和 300 PSI 工作壓力。', 'zh_Hans_CN')
            ->setMarketingDescriptionLong('Variflex는 ARPM 클래스 A(제한적 내유성) 튜브와 커버가 있는 고품질의 경제적인 범용 호스입니다. 이 호스는 산업용 공기 서비스, 컴프레서 라인, 공압 공구, 저압 스프레이 및 기타 오일 저항이 필요한 다양한 용도에 사용됩니다. 비전도성이며 1000V DC에서 호스 길이 1인치당 최소 전기 저항이 1메가옴보다 큽니다. 200, 250 및 300 PSI 작동 압력으로 제공됩니다.', 'ko_KP')
            ->setMarketingDescriptionLong('Variflexは、ARPMクラスA（限定耐油性）のチューブとカバーを備えた、良質で経済的な汎用ホースです。このホースは、工業用エアサービス、コンプレッサーライン、空気圧ツール、低圧スプレーなど、耐油性の必要性が高い多くの用途に適しています。このホースは非導電性で、1000 V DCでホースの長さ1インチあたり1メガオーム以上の最小電気抵抗を示します。使用圧力は200、250、300 PSIがあります。', 'ja_JP')
            ->setMainImage($this->mainImage);

        $object->getLevelSpecificData()?->setUniPrBrand($baseProductData);

        switch (random_int(0, 1)) {
            case 0:
                $object->getLevelSpecificData()?->setUniPrBrandPts(
                    new UniPrBrandPts($object)
                    // Hint: No product group specific fields on Brand level
                );

                break;

            case 1:
                $object->getLevelSpecificData()?->setUniPrBrandDss(
                    new UniPrBrandDss($object)
                    // Hint: No product group specific fields on Brand level
                );

                break;
        }
    }

    private function assignProductGroupSpecificSkeletonData(UniProductCategoryInternal $object): void
    {
        // Hint: No base product fields on skeleton level

        switch (random_int(0, 1)) {
            case 0:
                $object->getLevelSpecificData()?->setUniPrSkeletonPts(
                    (new UniPrSkeletonPts($object))
                        ->setBeltThicknessMetric(random_int(5, 10))
                        ->setProfileHeightMetric(random_int(2, 5))
                        ->setToothHeightMetric(random_int(2, 5))
                        ->setPitchMetric(random_int(2, 5))
                        ->setBeltAngle(10 * random_int(5, 8))
                        ->setMaxSpeed(10 * random_int(1, 5) . ' m/s')
                );

                break;

            case 1:
                $locations = ['OS', 'CA'];
                $object->getLevelSpecificData()?->setUniPrSkeletonDss(
                    (new UniPrSkeletonDss($object))
                        ->setWorkingPressureMetric(random_int(80, 160))
                        ->setAirInletLocation($locations[random_int(0, 1)])
                        ->setApplication('Bus')
                );

                break;
        }
    }

    private function assignProductGroupSpecificFinishedGoodData(UniProductBase $object): void
    {
        switch (random_int(0, 1)) {
            case 0:
                $inside = 500 * random_int(1, 4);
                $object->getTechnicalProductGroupSpecific()?->setUniPrGsTechPts(
                    (new UniPrGsTechPts($object))
                        ->setInsideLengthMetric($inside)
                        ->setOutsideLengthMetric($inside + random_int(20, 50))
                        ->setRibPitchMetric(random_int(2, 5))
                );

                break;

            case 1:
                $object->getTechnicalProductGroupSpecific()?->setUniPrGsTechDss(
                    (new UniPrGsTechDss($object))
                        ->setBellowOnly((bool) random_int(0, 1))
                        ->setMinimumHeightMetric(10 * random_int(7, 10))
                        ->setMaximumBellowDiameterMetric(10 * random_int(10, 40))
                );

                break;
        }
    }

    private function addHierarchyRelations(UniProductBase $object): void
    {
        $parents = [];
        $parent = $object->getParent();

        while ($parent instanceof UniProductCategoryInternal) {
            $parents[] = $parent;
            $parent = $parent->getParent();
        }

        $object->setInternalCategories(array_reverse($parents));
    }

    private function setRegionalAvailability(UniProductBase $object): void
    {
        $regions = [];

        foreach ($this->regions as $region) {
            if (random_int(0, 1) === 1) {
                $regions[] = $region;
            }
        }

        if ($regions === []) {
            $regions = [$this->regions[random_int(0, count($this->regions) - 1)]];
        }

        $object->setRegionalAvailability($regions);
    }
}
