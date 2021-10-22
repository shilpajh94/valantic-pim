<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace ContitechCS\ProductBundle\Lib;
/**
 * Description of Constants
 *
 * @author rohitsrivastava
 */
class Constants {
    const CONTITECHCS_FOLDER_CLASS_MAPPING = [
        ['path' =>'/Contitech_ConveyorSolution/Master Data/Applications', 'class' => 'CSApplications', 'parentType' => 'folder', 'allowFolder' => true], 
        ['path' =>'/Contitech_ConveyorSolution/Master Data/Features and Benefits', 'class' => 'CSFeaturesAndBenefits', 'parentType' => 'folder', 'allowFolder' => false],
        ['path' =>'/Contitech_ConveyorSolution/Master Data/Industries', 'class' => 'CSIndustries', 'parentType' => 'folder', 'allowFolder' => true],
        ['path' =>'/Contitech_ConveyorSolution/Master Data/Product Hierarchy', 'class' => 'CSHierarchy', 'parentType' => 'folder', 'allowFolder' => true],
        ['path' =>'/Contitech_ConveyorSolution/Master Data/Regions', 'class' => 'CSRegion', 'parentType' => 'folder', 'allowFolder' => true],
        ['path' =>'/Contitech_ConveyorSolution/Master Data/Segment', 'class' => 'CSSegment', 'parentType' => 'folder', 'allowFolder' => true],
        ['path' =>'/Contitech_ConveyorSolution/Master Data', 'class' => '', 'parentType' => 'folder', 'allowFolder' => false],
        ['path' =>'/Contitech_ConveyorSolution/Products', 'class' => 'CSProducts', 'parentType' => 'folder', 'allowFolder' => false],
        ['path' =>'/Contitech_ConveyorSolution/Catalog Objects', 'class' => 'CSCatalogObjects', 'parentType' => 'object', 'allowFolder' => true]
    ];
}
