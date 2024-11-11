<?php

/**
 * File Path: Your File path on system
 * Command: contitech:export-pim-attributes-to-csv
 * Des: PIM attributes export script.
 */

namespace AppBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;

class ExportPIMAttributesToCSV extends AbstractCommand
{
    const ITEMS_TO_EXPORT = [
        "IFS_PTG_US" => [
            "classes" => [
                "Product" => [
                    "bricks" => [
                        // "HoseBase",
                        // "HoseSkeleton",
                        // "HoseFert",
                        // "HydFittingsFert",
                        // "INHFittingsFert",
                        "PTGBase",
                        "PTGSkeleton",
                        "PTGFert",
                        "AccessoriesFert",
                        "BeltsFert",
                        "MetalFert",
                        "SynchronousFert"
                    ]
                ],
                // "ProductCategory" => [],
                // "Brand" => [],
                // "Chemical" => [],
                // "Country" => [],
                // "DistributionChannel" => [],
                // "Features" => [],
                // "MaterialGroup" => [],
                // "Plant" => [],
                // "SalesOrganisation" => [],
                "PlantMaterialMaster" => [],
                "SalesMaterialMaster" => [],
                // "Category" => [],
                // "FittingCategory" => [],
                // "FittingSubCategory" => [],
                // "SubCategory" => [],
                // "Competitor" => [],
                // "CompetitorParts" => [],
                // "FittingEndFamilyType" => [],
                // "FittingFamily" => [],
                // "NomenClature" => [],
                // "Thread" => []
            
            ],
        ],
        "CBS" => [
            "classes" => [
                "CSProducts" => [
                    "bricks" => [
                        "BeltData",
                        "DigitalSolution",
                        "Functionality",
                        "LoadSupport",
                        "Material",
                        "OptionsStandards",
                        "Performance1",
                        "Performance2",
                        "ProdDimentions",
                        "ProdSpec",
                        "SalesOrga",
                        "SpliceData",
                        "TensionElevatorBelt",
                        "TypeOfIdler",
                        "WidthLength"
                    ]
                ],
                "CSHierarchy" => [],
                "CSApplications" => [],
                "CSAvailableBeltWidths" => [],
                "CSAvailablePatternWidths" => [],
                "CSCoverCompounds" => [],
                "CSFeaturesAndBenefits" => [],
                "CSIndustries" => [],
                "CSMaterial" => [],
                "CSPerformanceCategories" => [],
                "CSRegion" => [],
                "CSSegment" => []
            ]
            ],
        "IFSEU" => [
            "classes" => [
                "IFSEUProduct" => [
                    "bricks" => [
                        "IFSEUHoseBase",
                        "IFSEUHoseSkeleton",
                        "IFSEUHoseFert",
                    ]
                ],
                "IFSEUApplications" => [],
                "IFSEUBrand" => [],
                "IFSEUCategory" => [],
                "IFSEUConditions" => [],
                "IFSEUCountries" => [],
                "IFSEUDistributionChannel" => [],
                "IFSEUFlowMedium" => [],
                "IFSEUManufacturingLength" => [],
                "IFSEUMaterialGroup" => [],
                "IFSEUMedium" => [],
                "IFSEUMinimumOrder" => [],
                "IFSEUNorm" => [],
                "IFSEUNoteInformationBelowTable" => [],
                "IFSEUPlant" => [],
                "IFSEUPlantMaterialMaster" => [],
                "IFSEUProductCategory" => [],
                "IFSEUProductionLength" => [],
                "IFSEUProperties" => [],
                "IFSEUSalesMaterialMaster" => [],
                "IFSEUSalesOrganisation" => [],
                "IFSEUSubCategory" => [],
                "IFSEUShippingConditions" => [],
            ],
        ],
    ];

    const BASE_LEVEL_ATTRIBUTE_IFSEU = [
        'productBrandName',
        'brandConstruction',
        'catalogLayline',
        'Category',
        'Sub_Category',
        'productPublishedOnline',
        'datasheetPublishedInTheDealerPortal',
        'pricelistPublishedInTheDealerPortal',
        'FeaturesBenefitsBulletPoint',
        'TPCode',
        'WebsiteLink',
        'headlineWeb',
        'productBrandNamePerLanguage',
        'BrandShortText2',
        'searchKeywords',
        'Marking1',
        'Marking2',
        'commercialDescription',
        'technicalDescription',
        'shortDescription',
        'longDescription',
        'NoteInformationBelowTable',
        'minimumTemperatureC',
        'maximumTemperatureC',
        'rangeTemperatureC',
        'temperatureRangeApplication',
        'temporaryUntilC',
        'DampableUntil1C',
        'DampableUntil1T',
        'justTemporarily','PressureUntil',
        'minimumTemperatureF',
        'rangeTemperatureF',
        'maximumTemperatureF',
        'temperatureNote',
        'onlyOpenSystem',
        'DampableUntil2T','DampableUntil2C',
        'temporaryUntilT',
        'temperatureRangeFAndC',
        'siopFullCode',
        'SIOPLevel1',
        'SIOPLevel2',
        'SIOPLevel3',
        'SIOPLevel4',
        'SIOPLevel5','SIOPLevel6',
        'SIOPLevel7',
        'shippingConditions',
        'Conditions',
        'minimumOrder',
        'manufacturingLength',
        'IFSEUHoseBase.BaseBrickMapping'
    ];

        const SKELETON_LEVEL_ATTRIBUTE_IFSEU = [
            'IFSEUHoseBase.standards',
            'IFSEUHoseBase.InnerLining',
            'IFSEUHoseBase.colorInnerLining',
            'IFSEUHoseBase.Reinforcement',
            'IFSEUHoseBase.Helix',
            'IFSEUHoseBase.numberOfHelixWires',
            'IFSEUHoseBase.propertiesInnerLayer',
            'IFSEUHoseBase.CoverOuterLayer',
            'IFSEUHoseBase.ColorOuterLayer',
            'IFSEUHoseBase.Haptic',
            'IFSEUHoseBase.PropertiesOuterLayer',
            'IFSEUHoseBase.FieldsOfApplication',
            'IFSEUHoseBase.flowMedium',
            "IFSEUHoseSkeleton.IdMM",
            "IFSEUHoseSkeleton.IdInch",
            "IFSEUHoseSkeleton.wallThicknessMM",
            "IFSEUHoseSkeleton.wallThicknessInch",
            "IFSEUHoseSkeleton.Odmm",
            "IFSEUHoseSkeleton.OdIn",
            "IFSEUHoseSkeleton.withHelix",
            "IFSEUHoseSkeleton.SkeletonBrickMapping",
            "IFSEUHoseSkeleton.workingPressureBAR",
            "IFSEUHoseSkeleton.workingPressurePSI",
            "IFSEUHoseSkeleton.workingPressureMPA",
            "IFSEUHoseSkeleton.VacuumBar",
            "IFSEUHoseSkeleton.VacuumMM",
            "IFSEUHoseSkeleton.VacuumIN",
            "IFSEUHoseSkeleton.testPressureBar",
            "IFSEUHoseSkeleton.testPressurePSI",
            "IFSEUHoseSkeleton.BurstPressureBar",
            "IFSEUHoseSkeleton.BurstPressurePSI",
            "IFSEUHoseSkeleton.BurstPressurempa",
            "IFSEUHoseSkeleton.BendingRadiusMM",
            "IFSEUHoseSkeleton.BendingRadiusIN",
            "IFSEUHoseSkeleton.descriptive",
            "IFSEUHoseSkeleton.negativeToleranceIdMM",
            "IFSEUHoseSkeleton.PositiveToleranceIdMM",
            "IFSEUHoseSkeleton.negativeToleranceWtMM",
            "IFSEUHoseSkeleton.PositiveToleranceWtMM",
            "IFSEUHoseSkeleton.negativeToleranceOdMM",
            "IFSEUHoseSkeleton.PositiveToleranceOdMM"
    ];

    const FERT_LEVEL_ATTRIBUTE_IFSEU = [
        "IFSEUHoseFert.totalWeightPerPackage",
        "IFSEUHoseFert.hoseLengthFT",
        "IFSEUHoseFert.InnerHoseWeightLbs",
        "IFSEUHoseFert.IsAssembled",
        "IFSEUHoseFert.totalWeight",
        "IFSEUHoseFert.InnerHoseWeightKg",
        "IFSEUHoseFert.fitting1Type",
        "IFSEUHoseFert.fitting1Size",
        "IFSEUHoseFert.fitting1Material",
        "IFSEUHoseFert.fitting2Type",
        "IFSEUHoseFert.fitting2Size",
        "IFSEUHoseFert.fitting2Material",
        "IFSEUHoseFert.CompleteFittingText",
        "IFSEUHoseFert.bendRestrictorType",
        "IFSEUHoseFert.bendRestrictor",
        "B2CCategory",
        "printedCatalogFlag",
        "B2CStoreFlag",
        "virtualCatalogFlag",
        "newItemFlagForCatalog",
        "productLength",
        "ProductLengthUnit",
        "webDescription",
        "productShortDescription",
        "amazonTitle",
        "materialNumber",
        "EANCode",
        "materialGroup",
        "countryOfOrigin",
        "baseUOM",
        "grossWeight",
        "netWeight",
        "weightUnit",
        "industryStandard",
        "succesorFlag",
        "deletedFlagAtClientLevel",
        "rebateFlag",
        "BusinessUnit",
        "Spezi",
        "oldMaterialCode",
        "manufacturer",
        "stccCode",
        "manufacturerPartNumber",
        "returnFlag",
        "OutsidePurchaseFlag",
        "eHoseProduct",
        "CustomsTariffNumber",
        "b2BexternalID",
        "sapDescriptionLanguage",
        "sapDescription",
        "weightg",
        "weightKg",
        "WeightLbsPerFTUOM",
        "ProductType",
        "shelfLife",
        "ConflictMinerals",
        "additionalInformation",
        "substitutePartNumber",
        "numberOfItems",
        "UnitsInPackage",
        "SalesOrgData",
        "Plants",
        "rohs",
        "reach",
        "Gallery",
        "proposition65WarningAttributesRequired",
        "prop65Message",
        "warningIcon",
        "californiaProposition65ChemicalName1",
        "californiaProposition65ChemicalName2",
        "californiaProposition65ChemicalName3",
        "nitrosamines",
        "merchantDiscount",
        "Discount",
        "GrossPrice",
        "Department",
        "listPrice",
        "additionalDiscount",
        "OnStock",
        "publishedOnline",
        "priceDate",
        "Amount",
        "ConnectionType",
        "Note",
        "Currency",
        "minimumQuantityUnit",
        "MinimumQuantityMeasurementUnit",
        "EHoseID",
        "productionLength"


    ];
        
    
    protected function configure()
    {
        $this->setName('contitech:export-pim-attributes-to-csv')
            ->setDescription('Export PIM Attributes to CSV');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->export();
        return 0;
    }

    // function to export class and brick attribute csv
    private function export()
    {
        $arrItems       = self::ITEMS_TO_EXPORT;
        foreach($arrItems as $bu=>$item)
        {
            foreach($item['classes'] as $className=>$bricks)
            {
                $fileName       = $bu.'-'.$className.'.csv';
                $filePath       = PIMCORE_PROJECT_ROOT . "/var/tmp/" . $fileName;
                $csvFileHandle  = fopen($filePath, "w");
                if ($className === 'IFSEUProduct') {
                    $arrCSVHeader = ['Attribute Name', 'Attribute Label', 'Level'];
                } else {
                    $arrCSVHeader = ['Attribute Name', 'Attribute Label'];
                }
                $this->generateCSV($csvFileHandle, $arrCSVHeader);

                $this->generateClassAttributeRows($className, $csvFileHandle);

                if(isset($bricks['bricks']) && !empty($bricks['bricks']))
                {
                    foreach($bricks['bricks'] as $brickName)
                    {
                        $this->generateBrickAttributeRows($brickName, $csvFileHandle);
                    }
                }

                fclose($csvFileHandle);
            }
        }
    }


    private function generateClassAttributeRows($className, $csvFileHandle)
    {
        $classDefinition = DataObject\ClassDefinition::getByName($className);
        $classAttributes = $classDefinition->getFieldDefinitions();
    
        foreach ($classAttributes as $attribute) {
            // Skip object brick attributes
            if ($attribute->getFieldType() == 'objectbricks') {
                continue;
            }
    
            // Check if the attribute is part of the BASE_LEVEL_ATTRIBUTE_IFSEU array
            $level =  $level = $this->getLevelForAttribute($attribute->getName());
    
            // If the attribute is a localized field, handle them separately
            if ($attribute instanceof DataObject\ClassDefinition\Data\Localizedfields) {
                $localizedFields = $attribute->getFieldDefinitions();
                foreach ($localizedFields as $localizedField) {
                    $level = $this->getLevelForAttribute($localizedField->getName());
                    if ($className === 'IFSEUProduct') {
                        // For localized fields in IFSEUProduct class, include Level
                        $attributeData = [$localizedField->getName(), $localizedField->getTitle(), $level];
                    } else {
                        // For other classes, don't include Level
                        $attributeData = [$localizedField->getName(), $localizedField->getTitle()];
                    }
                    
                    $this->generateCSV($csvFileHandle, $attributeData);
                }
            }
    
            // Skip localized fields type as they are already handled
            if ($attribute->getFieldType() == 'localizedfields') {
                continue;
            }
    
            if ($className === 'IFSEUProduct') {
                // If class is IFSEUProduct, include Level
                $attributeData = [$attribute->getName(), $attribute->getTitle(), $level];
            } else {
                // For other classes, don't include Level
                $attributeData = [$attribute->getName(), $attribute->getTitle()];
            }
            $this->generateCSV($csvFileHandle, $attributeData);
        }
    }
    
    private function generateBrickAttributeRows($brickName, $csvFileHandle)
    {
        // Insert blank row
        $this->generateCSV($csvFileHandle, ['']);
        
        // Get the brick definition
        $brickData = DataObject\Objectbrick\Definition::getByKey($brickName);
        
        if (!empty($brickData)) {
            $brickAttributes = $brickData->getFieldDefinitions();
            foreach ($brickAttributes as $attribute) {
                
                // Handle localized fields
                if ($attribute instanceof DataObject\ClassDefinition\Data\Localizedfields) {
                    $localizedFields = $attribute->getFieldDefinitions();
                    foreach ($localizedFields as $localizedField) {
                        $attributeName = $brickName . '.' . $localizedField->getName();
                        $level = $this->getLevelForAttribute($attributeName);
                        $attributeData = [$attributeName, $localizedField->getTitle(), $level];
                        $this->generateCSV($csvFileHandle, $attributeData);
                    }
                }
    
                // Skip localized fields type as they are already handled
                if ($attribute->getFieldType() == 'localizedfields') {
                    continue;
                }
    
                // For regular fields
                $attributeName = $brickName . '.' . $attribute->getName();
            
                $level = $this->getLevelForAttribute($attributeName);
                $attributeData = [$attributeName, $attribute->getTitle(), $level];
                $this->generateCSV($csvFileHandle, $attributeData);
            }
        }
    }
    

    private function getLevelForAttribute($attributeName)
    {
        // First check in the BASE_LEVEL_ATTRIBUTE_IFSEU array
        if (in_array($attributeName, self::BASE_LEVEL_ATTRIBUTE_IFSEU)) {
            return 'Base';
        }

        // If not found, check in the SKELETON_LEVEL_ATTRIBUTE_IFSEU array
        if (in_array($attributeName, self::SKELETON_LEVEL_ATTRIBUTE_IFSEU)) {
            return 'Skeleton';
        }

        if (in_array($attributeName, self::FERT_LEVEL_ATTRIBUTE_IFSEU)) {
            return 'Fert';
        }
        // If not found in either array, return empty (or another default value if needed)
        return '';
    }

    private function generateCSV($fileHandler, array $dataRow)
    {
        $delimiter = ",";
        fputcsv($fileHandler, $dataRow, $delimiter);
    }
}