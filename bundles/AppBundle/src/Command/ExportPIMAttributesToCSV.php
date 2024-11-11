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
        ]
    ];
    
    protected function configure()
    {
        $this->setName('contitech:export-pim-attributes-to-csv')
            ->setDescription('Export PIM Attributes to CSV');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->export();
    }

    // function to export class and brick attribute csv
    private function export()
    {
        $arrItems       = self::ITEMS_TO_EXPORT;
        $arrCSVHeader   = ['Attribute Name', 'Attribute Label'];

        foreach($arrItems as $bu=>$item)
        {
            foreach($item['classes'] as $className=>$bricks)
            {
                $fileName       = $bu.'-'.$className.'.csv';
                $filePath       = PIMCORE_PROJECT_ROOT . "/var/tmp/" . $fileName;
                $csvFileHandle  = fopen($filePath, "w");
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
        $classDefinition= DataObject\ClassDefinition::getByName($className);
        $classAttributes= $classDefinition->getFieldDefinitions();

        foreach($classAttributes as $attribute)
        {
            if($attribute->getFieldType()=='objectbricks')
            {
                continue;
            }

            if($attribute instanceof DataObject\ClassDefinition\Data\Localizedfields)
            {
                $localizedFields = $attribute->getFieldDefinitions();
                foreach($localizedFields as $localizedField)
                {
                    $attributeData = [$localizedField->getName(), $localizedField->getTitle()];
                    $this->generateCSV($csvFileHandle, $attributeData);
                }
            }

            if($attribute->getFieldType()=='localizedfields')
            {
                continue;
            }

            $attributeData = [$attribute->getName(), $attribute->getTitle()];
            $this->generateCSV($csvFileHandle, $attributeData);
        }
    }


    private function generateBrickAttributeRows($brickName, $csvFileHandle)
    {
        // insert blank row
        $this->generateCSV($csvFileHandle, ['']);
        // insert brick name
        // $this->generateCSV($csvFileHandle, [$brickName]);
        $brickData = DataObject\Objectbrick\Definition::getByKey($brickName);
        if(!empty($brickData))
        {
            $brickAttributes= $brickData->getFieldDefinitions();
            foreach($brickAttributes as $attribute)
            {
                if($attribute instanceof DataObject\ClassDefinition\Data\Localizedfields)
                {
                    $localizedFields = $attribute->getFieldDefinitions();
                    foreach($localizedFields as $localizedField)
                    {
                        $attributeName = $brickName.'.'.$localizedField->getName();
                        $attributeData = [$attributeName, $localizedField->getTitle()];
                        $this->generateCSV($csvFileHandle, $attributeData);
                    }
                }

                if($attribute->getFieldType()=='localizedfields')
                {
                    continue;
                }

                $attributeName = $brickName.'.'.$attribute->getName();
                $attributeData = [$attributeName, $attribute->getTitle()];
                $this->generateCSV($csvFileHandle, $attributeData);
            }
        }
    }

    private function generateCSV($fileHandler, array $dataRow)
    {
        $delimiter = ",";
        fputcsv($fileHandler, $dataRow, $delimiter);
    }
}