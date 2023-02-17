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
        ['path' =>'/Contitech_ConveyorSolution/Master Data/Product Hierarchy', 'class' => 'CSHierarchy', 'parentType' => 'both', 'allowFolder' => true],
        ['path' =>'/Contitech_ConveyorSolution/Master Data/Regions', 'class' => 'CSRegion', 'parentType' => 'folder', 'allowFolder' => true],
        ['path' =>'/Contitech_ConveyorSolution/Master Data/Segment', 'class' => 'CSSegment', 'parentType' => 'folder', 'allowFolder' => true],
        ['path' =>'/Contitech_ConveyorSolution/Master Data/Available Belt Width', 'class' => 'CSAvailableBeltWidths', 'parentType' => 'folder', 'allowFolder' => true],
        ['path' =>'/Contitech_ConveyorSolution/Master Data/Available Pattern Width', 'class' => 'CSAvailablePatternWidths', 'parentType' => 'folder', 'allowFolder' => true],
        ['path' =>'/Contitech_ConveyorSolution/Master Data/Material', 'class' => 'CSMaterial', 'parentType' => 'folder', 'allowFolder' => true],
        ['path' =>'/Contitech_ConveyorSolution/Master Data/Performance Categories', 'class' => 'CSPerformanceCategories', 'parentType' => 'folder', 'allowFolder' => true],
        ['path' =>'/Contitech_ConveyorSolution/Master Data/Region', 'class' => 'CSRegion', 'parentType' => 'folder', 'allowFolder' => true],
        ['path' =>'/Contitech_ConveyorSolution/Master Data', 'class' => '', 'parentType' => 'both', 'allowFolder' => false],
        ['path' =>'/Contitech_ConveyorSolution/Products', 'class' => 'CSProducts', 'parentType' => 'folder', 'allowFolder' => false],
        ['path' =>'/Contitech_ConveyorSolution/Catalog Objects', 'class' => 'CSCatalogCategory', 'parentType' => 'folder', 'allowFolder' => true],
        ['path' =>'/Contitech_ConveyorSolution/Catalog Objects', 'class' => 'CSCatalogTables', 'parentType' => 'object', 'allowFolder' => true]
    ];
}
