<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ContitechCS\ImportBundle\Command;

/**
 * Description of TagsImportCommand
 *
 */
use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Elements\Bundle\ProcessManagerBundle\ExecutionTraitClass;
use Symfony\Component\Console\Input\InputOption;

class TagsImportCommand  extends AbstractCommand {

    use ExecutionTraitClass;
    protected function configure()
    {
        $this->setName('cs:import:tags')
            ->setDescription('This command will import tags in system. It will read csv file from website setting config.');
        
        /* As per Process Manager plugin, we will use addOption to take use input
            becuase there is no option to take argument in process manager
        */
        /* monitoring-item-id: We don't need to paas it explicitly because, plugin do it */
       
        $this->addOption(
            'monitoring-item-id',
            null,
            InputOption::VALUE_REQUIRED,
            'Contains the monitoring item if executed via the Pimcore backend'
        );

        /* Asking for user input to execute our program */
        /* 'command-name' is a name of the command. eg: IFS (SIOP Import for IFS), PTG (SIOP Import for PTG) */
        
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        /* We will use options instead of argument */
        $options = $input->getOptions();

        if (isset($options['monitoring-item-id']) && !empty($options['monitoring-item-id'])) {
            $this->initProcessManager($options['monitoring-item-id']);
        }

        $tagsArray = $this->getCSVData();
        foreach ($tagsArray as $tag) {
            $this->initiateTagCreation($tag);
//            $tagId = $this->createTag($tag);
//            if (!empty($tag['childs']) && count($tag['childs'])>0) {
//                foreach ($tag['childs'] as $childTag) {
//                    $this->createTag($childTag, $tagId);
//                }
//            }
        }
        
    }
    public function initiateTagCreation($tag, $parentId = 0) {
        $tagId = $this->createTag($tag, $parentId);
        if (!empty($tag['childs']) && count($tag['childs'])>0) {
            foreach ($tag['childs'] as $childTag) {
                $this->initiateTagCreation($childTag, $tagId);
            }
        }
        return $tagId;
    }
    public function createTag($data, $parentId = 0) {
        $tagObject = new \Pimcore\Model\Element\Tag();
        $tagObject->setName($data['name']);
        if(empty($data['parent'])) {
            $tagObject->setParentId(0);
        } else {
            $tagObject->setParentId($parentId);
        }
        $tagObject->save();
        return $tagObject->getId();
    }
    
    
    public function getCSVData() {
        $config = \Pimcore\Model\WebsiteSetting::getByName('tags_csv_file');
        $tagsArray = [];
        if (!empty($config->getData())) {
            $asset = $config->getData();
            if ($asset instanceof \Pimcore\Model\Asset && (strpos($asset->getMimetype(), 'csv') !== false)) {
                $filePath = PIMCORE_ASSET_DIRECTORY.$asset->getFullpath();
                
                $csvData = $this->getCSVDataToArray($filePath);
                if (!empty($csvData['data'])) {
                    foreach ($csvData['data'] as $data) {
                        $this->addToPlace($tagsArray, $data);
                    }
                }   
            }
        }
        return $tagsArray;
    }
    
    public function addToPlace(&$tagsArray, $data) {
        
        if (!empty($data[2]) ) {
            $copy = $tagsArray;
            if (is_array($tagsArray)) {
                if(!array_key_exists($data[2], $copy)) {
                    foreach ($copy as $key => $tags) {
                        $this->addToPlace($tagsArray[$key]['childs'], $data);
                    }
                } else {
                    $tagsArray[$data[2]]['childs'][$data['0']] = [
                        'id' => $data['0'],
                        'name' => $data['1'],
                        'parent' => $data['2']
                    ];
                }
            }
        } else {
            $tagsArray[$data['0']] = [
                'id' => $data['0'],
                'name' => $data['1'],
                'parent' => $data['2'],
                'childs' => []
            ];
        }
    }
    
    public function getCSVDataToArray($fileName)
    {
        try {

            $csvFilePath = $fileName;
            $firstRowData = array();
            if (empty($csvFilePath)) {
                return $firstRowData;
            }

            // $csvFilePath = PIMCORE_ASSET_DIRECTORY . $filePath;

            $csvFilePath = str_replace("%20", " ", $csvFilePath);

            $dialect = \Pimcore\Tool\Admin::determineCsvDialect($csvFilePath);
            $data = [];
            $count = 0;

            if (($handle = fopen($csvFilePath, 'r')) !== false) {
                while (($rowData = fgetcsv($handle, 0, $dialect->delimiter, $dialect->quotechar, $dialect->escapechar)) !== false) {
                    if ($count == 0) {
                        foreach ($rowData as $key => $value) {
                            unset($rowData[$key]);
                            $rowData[mb_convert_encoding(trim($key), 'ISO-8859-1', 'UTF-8')] = mb_convert_encoding(trim($value), 'ISO-8859-1', 'UTF-8'); // alternate for utf8_decode
                        }
                        $firstRowData = $rowData;
                    } else {
                        $data[] = $rowData;
                        $cols = count($rowData);
                    }
                    $count++;
                }
                fclose($handle);
            }
            return array(
                'header'    =>  $firstRowData,
                'data'      =>  $data
            );
        } catch (\Exception $e) {
            return array(
                'error' => $e->getMessage()
            );
        }
    }

}
