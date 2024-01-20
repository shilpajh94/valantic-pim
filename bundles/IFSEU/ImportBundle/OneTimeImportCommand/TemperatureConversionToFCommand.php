<?php

namespace IFSEU\ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;
use IFSEU\ProductBundle\Services\ImportConstants;
use Symfony\Component\Yaml\Yaml;
use Exception;
use Symfony\Component\DependencyInjection\ContainerInterface;

class TemperatureConversionToFCommand extends AbstractCommand
{
    private $unitConversionService;
    private $container;

    protected function configure()
    {
        $this->setName('ifs-eu-temperature-conversion-to-farenheit-command')
            ->setDescription('Temperature conversion to farenheit command');
    }
    public function __construct(ContainerInterface $container)
    {
        parent::__construct();
        $this->container = $container;
        $this->unitConversionService= $this->container->get('ifs_eu_import.unit_conversion_import_service');
    }


    public function execute(InputInterface $input, OutputInterface $output)
    {  
      
        try {
            $productsList = new DataObject\IFSEUProduct\Listing();
            $productsList->setCondition("productType='base'");
            $productsList->load();
            if($productsList)
            {
                p_r(count($productsList));
                $i = 0;
                foreach($productsList as $product){
                    $i++;
                    $minimumTemperatureC = $product->getMinimumTemperatureC();
                    $maximumTemperatureC = $product->getMaximumTemperatureC();
                    if(is_numeric($minimumTemperatureC)){
                        $attributeGroupName = $this->unitConversionService->getAttributeGroupName('minimumTemperatureC');
                        if($attributeGroupName && is_numeric($minimumTemperatureC)){
                            $conversionAttributeArr= $this->unitConversionService->getGroupWithValues('minimumTemperatureC', floatval($minimumTemperatureC));
                            foreach($conversionAttributeArr as $key=>$convertValues){
                                $method = 'set' . ucfirst($key);
                                $product->$method($convertValues);
                            }
                        }
                    }
                    if(is_numeric($maximumTemperatureC)){
                        $attributeGroupName = $this->unitConversionService->getAttributeGroupName('maximumTemperatureC');
                        if($attributeGroupName && is_numeric($maximumTemperatureC)){
                            $conversionAttributeArr= $this->unitConversionService->getGroupWithValues('maximumTemperatureC', floatval($maximumTemperatureC));
                            foreach($conversionAttributeArr as $key=>$convertValues){
                                $method = 'set' . ucfirst($key);
                                $product->$method($convertValues);
                            }
                        }
                    }
                    p_r($i.'. '.$product->getId());
                    $product->save();    
                }
    
            }
    

        }catch(Exception $ex){
            p_r($ex->getMessage());
        }
        return 1;
    }
}