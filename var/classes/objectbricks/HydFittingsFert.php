<?php

/** 
 * Generated at: 2022-01-12T16:20:16+01:00
 * IP: 127.0.0.1


Fields Summary: 
- DescriptivePartNumber [input]
- HydFittingFamily [multiselect]
- HydThreadDescription [input]
- nomenclatureDetails [advancedManyToManyObjectRelation]
- AssemblyRevisionNumber [input]
- AssemblyVendor [multiselect]
- ReleasedToProduction [booleanSelect]
- SocketWrenchSizeInFract [input]
- SocketWrenchSizeInDec [input]
- FittingWeight [input]
- DualGripStyle [booleanSelect]
- SAEStandard [input]
- SkiveType [input]
- NutType [select]
- ReleasedToProductionDate [date]
- Comments [textarea]
- FittingEndFamilyType [select]
- SocketWrenchSizeMM [input]
- FittingSizeInFract [input]
- UniCrimpStyle [booleanSelect]
- DualSeatYN [booleanSelect]
- AssemblyMaterial [select]
- CatalogDescription [textarea]
- FlangeIDInFract [input]
- FlangeIDMM [input]
- FlangeODInDec [input]
- FlangeIDInDec [input]
- FlangeODInFract [input]
- FlangeODMM [input]
- TubeIDInFract [input]
- TubeLengthMM [input]
- TubeLengthInDec [input]
- TubeODInDec [numeric]
- OrificeTubeODInDecimal [numeric]
- OrificeTubeLengthInDecimal [numeric]
- TubeIDInDec [numeric]
- TubeIDMM [numeric]
- TubeODInFract [input]
- TubeODMM [numeric]
- OrificeTubeODMMDecimal [numeric]
- OrificeTubeLengthMMDecimal [numeric]
- ValveSize1inFraction [input]
- ValveSizeInDec [numeric]
- ValveSizeMM [numeric]
- ValveStyle [numeric]
- ValveSize2inFraction [input]
- ValveSize2InDec [numeric]
- ValveSize2MM [numeric]
- ValveStyle2 [numeric]
- OverallLengthIN [input]
- RunLengthIN [input]
- CutOffLengthIN [input]
- InsertionDepthIN [input]
- DropLengthIN [numeric]
- OverallLengthMm [input]
- RunLengthMM [input]
- CutOffLengthMM [input]
- InsertionDepthMM [input]
- DropLengthMM [numeric]
- HoseID1InFract [input]
- HoseID1InDec [numeric]
- HoseID1MM [numeric]
- HoseID3InFract [input]
- HoseID3InDec [numeric]
- HoseID2InFract [input]
- HoseID2InDec [numeric]
- HoseID2MM [numeric]
- HoseDashSize [numeric]
- HoseID3MM [numeric]
- Hex1WrenchSizeIN [input]
- Hex2WrenchSizeIN [input]
- Hex1WrenchSizeMM [input]
- Hex2WrenchSizeMM [input]
- SingleHexYN [booleanSelect]
- Thread1 [input]
- Thread3 [input]
- ThreadSize1InMMDecimal [input]
- ThreadSize2InMMDecimal [input]
- ThreadDashSize1 [numeric]
- ThreadDashSize3 [numeric]
- Thread2 [input]
- Thread4 [input]
- ThreadSize3InMMDecimal [input]
- ThreadSize4InMMDecimal [input]
- ThreadDashSize2 [numeric]
- ThreadDashSize4 [numeric]
- StemComponentNumber [input]
- StemComponentThreadType [select]
- StemHexinchDecimal [numeric]
- StemHexMM [input]
- StemRevDate [date]
- StemComponentSAPNumber [input]
- StemComponentVendor [multiselect]
- StemHexinchFraction [input]
- StemMaterial [select]
- StemRevisionNumber [input]
- FerruleComponentNumber [input]
- FerruleComponentVendor [multiselect]
- FerruleMaterial [select]
- FerruleIDInDec [numeric]
- FerruleODInDec [numeric]
- FerruleLengthInDec [numeric]
- FerruleRevDate [date]
- FerruleComponentSAPNumber [input]
- FerruleRevisionNumber [input]
- FerruleIDMM [numeric]
- FerruleODMM [numeric]
- FerruleLengthMM [numeric]
- SwivelNutComponentNumber [input]
- SwivelNutComponentThreadType [select]
- SwivelNutHexinchFraction [input]
- SwivelNutMaterial [select]
- SwivelNutRevisionNumber [input]
- SwivelNutComponentSAPNumber [input]
- SwivelNutComponentVendor [multiselect]
- SwivelNutinchDecimal [numeric]
- SwivelNutRevDate [date]
- ThrustWireComponentNumber [input]
- ThrustWireMaterial [select]
- ThrustWireRevisionNumber [input]
- ORingBOMSAPNumber [input]
- ORingComponentSAPNumber [input]
- ORingMaterial [select]
- ORingIDInDec [numeric]
- ORingThicknessInDec [numeric]
- ORingComponentNumber [input]
- ORingComponentVendor [multiselect]
- ORingRevisionNumber [input]
- ORingIDMM [numeric]
- ORingThicknessMM [numeric]
- InternalORingComponentNumber [input]
- InternalORingSAPNumber [input]
- InternalORingRev [input]
- InternalORingVendor [multiselect]
- BackUpORingComponentVendor [multiselect]
- BackUpORingMaterial [select]
- BackUpORingSAPNumber [input]
- BackUpORingComponentNumber [input]
- BackUpORingRevisionNumber [input]
- SlipNutRetainingRingComponentNumber [input]
- SlipNutRetainingRingComponentVendor [multiselect]
- SlipNutRetainingRingMaterial [select]
- SlipNutRetainingRingSAPComponentNumber [input]
- SlipNutRevisionNumber [input]
- ThreadProtectorComponentNumber [input]
- ThreadProtectorComponentVendor [multiselect]
- ThreadProtectorMaterial [select]
- ThreadProtectorRevisionNumber [input]
- ThreadProtectorSAPComponentNumber [input]
- PackagingBoxSize [select]
- PackagingQuantityPerBox [input]
 */


return Pimcore\Model\DataObject\Objectbrick\Definition::__set_state(array(
  'classDefinitions' =>
  array(
    0 =>
    array(
      'classname' => 'Product',
      'fieldname' => 'Fert',
    ),
  ),
  'dao' => NULL,
  'key' => 'HydFittingsFert',
  'parentClass' => '',
  'implementsInterfaces' => '',
  'title' => '',
  'group' => 'HYD_FITTINGS',
  'layoutDefinitions' =>
  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
    'fieldtype' => 'panel',
    'labelWidth' => 100,
    'layout' => NULL,
    'border' => false,
    'name' => NULL,
    'type' => NULL,
    'region' => NULL,
    'title' => NULL,
    'width' => NULL,
    'height' => NULL,
    'collapsible' => false,
    'collapsed' => false,
    'bodyStyle' => NULL,
    'datatype' => 'layout',
    'permissions' => NULL,
    'childs' =>
    array(
      0 =>
      Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
        'fieldtype' => 'panel',
        'labelWidth' => 200,
        'layout' => NULL,
        'border' => false,
        'name' => 'Layout',
        'type' => NULL,
        'region' => NULL,
        'title' => '',
        'width' => NULL,
        'height' => NULL,
        'collapsible' => false,
        'collapsed' => false,
        'bodyStyle' => '',
        'datatype' => 'layout',
        'permissions' => NULL,
        'childs' =>
        array(
          0 =>
          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
            'fieldtype' => 'fieldcontainer',
            'labelWidth' => 100,
            'layout' => 'hbox',
            'fieldLabel' => '',
            'name' => 'Flange',
            'type' => NULL,
            'region' => NULL,
            'title' => '',
            'width' => NULL,
            'height' => NULL,
            'collapsible' => false,
            'collapsed' => false,
            'bodyStyle' => '',
            'datatype' => 'layout',
            'permissions' => NULL,
            'childs' =>
            array(
              0 =>
              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                'fieldtype' => 'fieldcontainer',
                'labelWidth' => 200,
                'layout' => 'vbox',
                'fieldLabel' => '',
                'name' => 'Field Container',
                'type' => NULL,
                'region' => NULL,
                'title' => '',
                'width' => NULL,
                'height' => NULL,
                'collapsible' => false,
                'collapsed' => false,
                'bodyStyle' => '',
                'datatype' => 'layout',
                'permissions' => NULL,
                'childs' =>
                array(
                  0 =>
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                    'fieldtype' => 'input',
                    'width' => 200,
                    'defaultValue' => NULL,
                    'queryColumnType' => 'varchar',
                    'columnType' => 'varchar',
                    'columnLength' => 150,
                    'phpdocType' => 'string',
                    'regex' => '',
                    'unique' => false,
                    'showCharCount' => false,
                    'name' => 'DescriptivePartNumber',
                    'title' => 'Descriptive Part Number',
                    'tooltip' => '',
                    'mandatory' => false,
                    'noteditable' => false,
                    'index' => false,
                    'locked' => false,
                    'style' => 'margin-top:5px;',
                    'permissions' => NULL,
                    'datatype' => 'data',
                    'relationType' => false,
                    'invisible' => false,
                    'visibleGridView' => false,
                    'visibleSearch' => false,
                    'defaultValueGenerator' => '',
                  )),
                  1 =>
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                    'fieldtype' => 'multiselect',
                    'options' =>
                    array(
                      0 =>
                      array(
                        'key' => 'ABCT',
                        'value' => 1829868,
                      ),
                      1 =>
                      array(
                        'key' => 'ABPT',
                        'value' => 1829869,
                      ),
                      2 =>
                      array(
                        'key' => 'AC',
                        'value' => 1829865,
                      ),
                      3 =>
                      array(
                        'key' => 'AC2',
                        'value' => 5355085,
                      ),
                      4 =>
                      array(
                        'key' => 'AV',
                        'value' => 1829939,
                      ),
                      5 =>
                      array(
                        'key' => 'B1-DELETE',
                        'value' => 5354403,
                      ),
                      6 =>
                      array(
                        'key' => 'B2',
                        'value' => 1829854,
                      ),
                      7 =>
                      array(
                        'key' => 'B2SC',
                        'value' => 1830638,
                      ),
                      8 =>
                      array(
                        'key' => 'BP',
                        'value' => 1829870,
                      ),
                      9 =>
                      array(
                        'key' => 'BT',
                        'value' => 1829867,
                      ),
                      10 =>
                      array(
                        'key' => 'CB',
                        'value' => 1829941,
                      ),
                      11 =>
                      array(
                        'key' => 'CLIP',
                        'value' => 1829942,
                      ),
                      12 =>
                      array(
                        'key' => 'CLIP2',
                        'value' => 3833676,
                      ),
                      13 =>
                      array(
                        'key' => 'CLIPHLDR',
                        'value' => 1830382,
                      ),
                      14 =>
                      array(
                        'key' => 'COT',
                        'value' => 1829928,
                      ),
                      15 =>
                      array(
                        'key' => 'CT',
                        'value' => 1829871,
                      ),
                      16 =>
                      array(
                        'key' => 'DG',
                        'value' => 1829859,
                      ),
                      17 =>
                      array(
                        'key' => 'DGF1',
                        'value' => 1829891,
                      ),
                      18 =>
                      array(
                        'key' => 'DGF2',
                        'value' => 1829892,
                      ),
                      19 =>
                      array(
                        'key' => 'DH',
                        'value' => 1829872,
                      ),
                      20 =>
                      array(
                        'key' => 'DL',
                        'value' => 1829873,
                      ),
                      21 =>
                      array(
                        'key' => 'FG',
                        'value' => 1829861,
                      ),
                      22 =>
                      array(
                        'key' => 'FG2',
                        'value' => 1829893,
                      ),
                      23 =>
                      array(
                        'key' => 'FG5',
                        'value' => 1829894,
                      ),
                      24 =>
                      array(
                        'key' => 'FH',
                        'value' => 1830119,
                      ),
                      25 =>
                      array(
                        'key' => 'FL',
                        'value' => 1829874,
                      ),
                      26 =>
                      array(
                        'key' => 'FSL',
                        'value' => 1830388,
                      ),
                      27 =>
                      array(
                        'key' => 'FT',
                        'value' => 1830304,
                      ),
                      28 =>
                      array(
                        'key' => 'FTN',
                        'value' => 1829929,
                      ),
                      29 =>
                      array(
                        'key' => 'FTS',
                        'value' => 1829930,
                      ),
                      30 =>
                      array(
                        'key' => 'FTSM',
                        'value' => 1829931,
                      ),
                      31 =>
                      array(
                        'key' => 'GC',
                        'value' => 1829895,
                      ),
                      32 =>
                      array(
                        'key' => 'GG',
                        'value' => 1829863,
                      ),
                      33 =>
                      array(
                        'key' => 'HM',
                        'value' => 1829875,
                      ),
                      34 =>
                      array(
                        'key' => 'ILOT',
                        'value' => 1829932,
                      ),
                      35 =>
                      array(
                        'key' => 'JC',
                        'value' => 1829876,
                      ),
                      36 =>
                      array(
                        'key' => 'JS',
                        'value' => 1829877,
                      ),
                      37 =>
                      array(
                        'key' => 'KM',
                        'value' => 1829878,
                      ),
                      38 =>
                      array(
                        'key' => 'MC',
                        'value' => 1829879,
                      ),
                      39 =>
                      array(
                        'key' => 'MH',
                        'value' => 1829943,
                      ),
                      40 =>
                      array(
                        'key' => 'ML',
                        'value' => 1829880,
                      ),
                      41 =>
                      array(
                        'key' => 'MLL',
                        'value' => 1829944,
                      ),
                      42 =>
                      array(
                        'key' => 'MP',
                        'value' => 1829881,
                      ),
                      43 =>
                      array(
                        'key' => 'MS',
                        'value' => 1829882,
                      ),
                      44 =>
                      array(
                        'key' => 'NEEDS NOMENCLATURE ADDED',
                        'value' => 5356953,
                      ),
                      45 =>
                      array(
                        'key' => 'NP',
                        'value' => 1829883,
                      ),
                      46 =>
                      array(
                        'key' => 'NS',
                        'value' => 1829884,
                      ),
                      47 =>
                      array(
                        'key' => 'OB',
                        'value' => 1829885,
                      ),
                      48 =>
                      array(
                        'key' => 'OF',
                        'value' => 1829886,
                      ),
                      49 =>
                      array(
                        'key' => 'OI',
                        'value' => 1829933,
                      ),
                      50 =>
                      array(
                        'key' => 'OIM',
                        'value' => 1829936,
                      ),
                      51 =>
                      array(
                        'key' => 'OSWCH',
                        'value' => 1830419,
                      ),
                      52 =>
                      array(
                        'key' => 'OT',
                        'value' => 1829934,
                      ),
                      53 =>
                      array(
                        'key' => 'OTC',
                        'value' => 1829935,
                      ),
                      54 =>
                      array(
                        'key' => 'PB',
                        'value' => 1829887,
                      ),
                      55 =>
                      array(
                        'key' => 'PLIERS',
                        'value' => 1830438,
                      ),
                      56 =>
                      array(
                        'key' => 'PPT',
                        'value' => 1829888,
                      ),
                      57 =>
                      array(
                        'key' => 'R2',
                        'value' => 1829896,
                      ),
                      58 =>
                      array(
                        'key' => 'RA',
                        'value' => 1829897,
                      ),
                      59 =>
                      array(
                        'key' => 'S4',
                        'value' => 1829898,
                      ),
                      60 =>
                      array(
                        'key' => 'S6',
                        'value' => 1829857,
                      ),
                      61 =>
                      array(
                        'key' => 'SE',
                        'value' => 1829858,
                      ),
                      62 =>
                      array(
                        'key' => 'SF',
                        'value' => 1829864,
                      ),
                      63 =>
                      array(
                        'key' => 'SG',
                        'value' => 1829855,
                      ),
                      64 =>
                      array(
                        'key' => 'SH',
                        'value' => 1829899,
                      ),
                      65 =>
                      array(
                        'key' => 'SI',
                        'value' => 1829889,
                      ),
                      66 =>
                      array(
                        'key' => 'SRT',
                        'value' => 1829900,
                      ),
                      67 =>
                      array(
                        'key' => 'ST',
                        'value' => 1829890,
                      ),
                      68 =>
                      array(
                        'key' => 'SWCN',
                        'value' => 1829937,
                      ),
                      69 =>
                      array(
                        'key' => 'T7',
                        'value' => 1829866,
                      ),
                      70 =>
                      array(
                        'key' => 'T8',
                        'value' => 1829856,
                      ),
                      71 =>
                      array(
                        'key' => 'UC',
                        'value' => 1829860,
                      ),
                      72 =>
                      array(
                        'key' => 'UCF1',
                        'value' => 1829901,
                      ),
                      73 =>
                      array(
                        'key' => 'UCF10',
                        'value' => 1829902,
                      ),
                      74 =>
                      array(
                        'key' => 'UCF11',
                        'value' => 1829903,
                      ),
                      75 =>
                      array(
                        'key' => 'UCF2',
                        'value' => 1829904,
                      ),
                      76 =>
                      array(
                        'key' => 'UCF3',
                        'value' => 1829905,
                      ),
                      77 =>
                      array(
                        'key' => 'UCF4',
                        'value' => 1829906,
                      ),
                      78 =>
                      array(
                        'key' => 'UCF5',
                        'value' => 1829907,
                      ),
                      79 =>
                      array(
                        'key' => 'UCF6',
                        'value' => 1829908,
                      ),
                      80 =>
                      array(
                        'key' => 'UCF7',
                        'value' => 1829909,
                      ),
                      81 =>
                      array(
                        'key' => 'UCF8',
                        'value' => 1831134,
                      ),
                      82 =>
                      array(
                        'key' => 'UCF9',
                        'value' => 1829910,
                      ),
                      83 =>
                      array(
                        'key' => 'UCFB2',
                        'value' => 1829911,
                      ),
                      84 =>
                      array(
                        'key' => 'UCFSG',
                        'value' => 1829912,
                      ),
                      85 =>
                      array(
                        'key' => 'UCH',
                        'value' => 1829913,
                      ),
                      86 =>
                      array(
                        'key' => 'UCSC',
                        'value' => 1829914,
                      ),
                      87 =>
                      array(
                        'key' => 'UCSG',
                        'value' => 1829915,
                      ),
                      88 =>
                      array(
                        'key' => 'UT',
                        'value' => 1829862,
                      ),
                      89 =>
                      array(
                        'key' => 'VA',
                        'value' => 1829938,
                      ),
                      90 =>
                      array(
                        'key' => 'VCORE',
                        'value' => 1829940,
                      ),
                      91 =>
                      array(
                        'key' => 'XB2',
                        'value' => 1829916,
                      ),
                      92 =>
                      array(
                        'key' => 'XDG',
                        'value' => 1829917,
                      ),
                      93 =>
                      array(
                        'key' => 'XDG3',
                        'value' => 1829918,
                      ),
                      94 =>
                      array(
                        'key' => 'XDGF1',
                        'value' => 1829919,
                      ),
                      95 =>
                      array(
                        'key' => 'XDGF2',
                        'value' => 1829920,
                      ),
                      96 =>
                      array(
                        'key' => 'XDGF3',
                        'value' => 1829921,
                      ),
                      97 =>
                      array(
                        'key' => 'XS6',
                        'value' => 1829922,
                      ),
                      98 =>
                      array(
                        'key' => 'XS6C',
                        'value' => 1829923,
                      ),
                      99 =>
                      array(
                        'key' => 'XSC',
                        'value' => 1829924,
                      ),
                      100 =>
                      array(
                        'key' => 'XSG',
                        'value' => 1829925,
                      ),
                      101 =>
                      array(
                        'key' => 'XUC',
                        'value' => 1829926,
                      ),
                      102 =>
                      array(
                        'key' => 'XUCF',
                        'value' => 1829927,
                      ),
                    ),
                    'width' => 200,
                    'height' => '',
                    'maxItems' => '',
                    'renderType' => 'tags',
                    'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
                    'optionsProviderData' => 'FittingFamily|Name',
                    'queryColumnType' => 'text',
                    'columnType' => 'text',
                    'phpdocType' => 'array',
                    'dynamicOptions' => false,
                    'name' => 'HydFittingFamily',
                    'title' => 'Fitting Family (Hyd)',
                    'tooltip' => '',
                    'mandatory' => false,
                    'noteditable' => false,
                    'index' => false,
                    'locked' => false,
                    'style' => '',
                    'permissions' => NULL,
                    'datatype' => 'data',
                    'relationType' => false,
                    'invisible' => false,
                    'visibleGridView' => false,
                    'visibleSearch' => false,
                  )),
                ),
                'locked' => false,
              )),
              1 =>
              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                'fieldtype' => 'fieldcontainer',
                'labelWidth' => 200,
                'layout' => 'vbox',
                'fieldLabel' => '',
                'name' => 'Field Container',
                'type' => NULL,
                'region' => NULL,
                'title' => '',
                'width' => NULL,
                'height' => NULL,
                'collapsible' => false,
                'collapsed' => false,
                'bodyStyle' => '',
                'datatype' => 'layout',
                'permissions' => NULL,
                'childs' =>
                array(
                  0 =>
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                    'fieldtype' => 'input',
                    'width' => 200,
                    'defaultValue' => NULL,
                    'queryColumnType' => 'varchar',
                    'columnType' => 'varchar',
                    'columnLength' => 190,
                    'phpdocType' => 'string',
                    'regex' => '',
                    'unique' => false,
                    'showCharCount' => false,
                    'name' => 'HydThreadDescription',
                    'title' => 'Thread Description (Hyd)',
                    'tooltip' => '',
                    'mandatory' => false,
                    'noteditable' => false,
                    'index' => false,
                    'locked' => false,
                    'style' => 'margin-left:20px;',
                    'permissions' => NULL,
                    'datatype' => 'data',
                    'relationType' => false,
                    'invisible' => false,
                    'visibleGridView' => false,
                    'visibleSearch' => false,
                    'defaultValueGenerator' => '',
                  )),
                ),
                'locked' => false,
              )),
            ),
            'locked' => false,
          )),
          1 =>
          Pimcore\Model\DataObject\ClassDefinition\Data\AdvancedManyToManyObjectRelation::__set_state(array(
            'allowedClassId' => 'NomenClature',
            'visibleFields' => 'fullpath,id',
            'columns' =>
            array(),
            'columnKeys' =>
            array(),
            'fieldtype' => 'advancedManyToManyObjectRelation',
            'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\ObjectMetadata[]',
            'enableBatchEdit' => false,
            'allowMultipleAssignments' => false,
            'visibleFieldDefinitions' =>
            array(),
            'width' => 950,
            'height' => '',
            'maxItems' => 1,
            'queryColumnType' => 'text',
            'relationType' => true,
            'allowToCreateNewObject' => true,
            'optimizedAdminLoading' => false,
            'classes' =>
            array(),
            'pathFormatterClass' => '',
            'name' => 'nomenclatureDetails',
            'title' => 'Nomenclature Details',
            'tooltip' => '',
            'mandatory' => false,
            'noteditable' => false,
            'index' => false,
            'locked' => false,
            'style' => '',
            'permissions' => NULL,
            'datatype' => 'data',
            'invisible' => false,
            'visibleGridView' => false,
            'visibleSearch' => false,
          )),
          2 =>
          Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
            'fieldtype' => 'tabpanel',
            'border' => false,
            'tabPosition' => 'top',
            'name' => 'Layout',
            'type' => NULL,
            'region' => NULL,
            'title' => '',
            'width' => NULL,
            'height' => NULL,
            'collapsible' => false,
            'collapsed' => false,
            'bodyStyle' => '',
            'datatype' => 'layout',
            'permissions' => NULL,
            'childs' =>
            array(
              0 =>
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                'fieldtype' => 'panel',
                'labelWidth' => 100,
                'layout' => NULL,
                'border' => false,
                'name' => 'Finished',
                'type' => NULL,
                'region' => NULL,
                'title' => 'Finished',
                'width' => NULL,
                'height' => NULL,
                'collapsible' => false,
                'collapsed' => false,
                'bodyStyle' => '',
                'datatype' => 'layout',
                'permissions' => NULL,
                'childs' =>
                array(
                  0 =>
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                    'fieldtype' => 'fieldset',
                    'labelWidth' => 100,
                    'name' => 'Layout',
                    'type' => NULL,
                    'region' => NULL,
                    'title' => '',
                    'width' => NULL,
                    'height' => NULL,
                    'collapsible' => false,
                    'collapsed' => false,
                    'bodyStyle' => '',
                    'datatype' => 'layout',
                    'permissions' => NULL,
                    'childs' =>
                    array(
                      0 =>
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                        'fieldtype' => 'fieldcontainer',
                        'labelWidth' => 200,
                        'layout' => 'hbox',
                        'fieldLabel' => '',
                        'name' => 'Field Container',
                        'type' => NULL,
                        'region' => NULL,
                        'title' => '',
                        'width' => NULL,
                        'height' => NULL,
                        'collapsible' => false,
                        'collapsed' => false,
                        'bodyStyle' => '',
                        'datatype' => 'layout',
                        'permissions' => NULL,
                        'childs' =>
                        array(
                          0 =>
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                            'fieldtype' => 'fieldcontainer',
                            'labelWidth' => 200,
                            'layout' => 'vbox',
                            'fieldLabel' => '',
                            'name' => 'Field Container',
                            'type' => NULL,
                            'region' => NULL,
                            'title' => '',
                            'width' => NULL,
                            'height' => NULL,
                            'collapsible' => false,
                            'collapsed' => false,
                            'bodyStyle' => '',
                            'datatype' => 'layout',
                            'permissions' => NULL,
                            'childs' =>
                            array(
                              0 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'AssemblyRevisionNumber',
                                'title' => 'Assembly Revision Number',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              1 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                                'fieldtype' => 'multiselect',
                                'options' =>
                                array(
                                  0 =>
                                  array(
                                    'key' => 'V1',
                                    'value' => 'V1',
                                  ),
                                  1 =>
                                  array(
                                    'key' => 'V2',
                                    'value' => 'V2',
                                  ),
                                  2 =>
                                  array(
                                    'key' => 'V3',
                                    'value' => 'V3',
                                  ),
                                  3 =>
                                  array(
                                    'key' => 'V4',
                                    'value' => 'V4',
                                  ),
                                  4 =>
                                  array(
                                    'key' => 'V5',
                                    'value' => 'V5',
                                  ),
                                  5 =>
                                  array(
                                    'key' => 'V6',
                                    'value' => 'V6',
                                  ),
                                  6 =>
                                  array(
                                    'key' => 'V6',
                                    'value' => 'V6',
                                  ),
                                  7 =>
                                  array(
                                    'key' => 'V7',
                                    'value' => 'V7',
                                  ),
                                  8 =>
                                  array(
                                    'key' => 'V8',
                                    'value' => 'V8',
                                  ),
                                  9 =>
                                  array(
                                    'key' => 'V9',
                                    'value' => 'V9',
                                  ),
                                ),
                                'width' => 200,
                                'height' => '',
                                'maxItems' => '',
                                'renderType' => 'tags',
                                'optionsProviderClass' => '',
                                'optionsProviderData' => '',
                                'queryColumnType' => 'text',
                                'columnType' => 'text',
                                'phpdocType' => 'array',
                                'dynamicOptions' => false,
                                'name' => 'AssemblyVendor',
                                'title' => 'Assembly Vendor',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                              )),
                              2 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                'fieldtype' => 'booleanSelect',
                                'yesLabel' => 'Yes',
                                'noLabel' => 'No',
                                'emptyLabel' => '',
                                'options' =>
                                array(
                                  0 =>
                                  array(
                                    'key' => '',
                                    'value' => 0,
                                  ),
                                  1 =>
                                  array(
                                    'key' => 'Yes',
                                    'value' => 1,
                                  ),
                                  2 =>
                                  array(
                                    'key' => 'No',
                                    'value' => -1,
                                  ),
                                ),
                                'width' => 200,
                                'queryColumnType' => 'tinyint(1) null',
                                'columnType' => 'tinyint(1) null',
                                'phpdocType' => 'boolean',
                                'name' => 'ReleasedToProduction',
                                'title' => 'Released To Production',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                              )),
                              3 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'SocketWrenchSizeInFract',
                                'title' => 'Socket Wrench Size (in) Fract',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              4 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'SocketWrenchSizeInDec',
                                'title' => 'Socket Wrench Size (in) Dec',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              5 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'FittingWeight',
                                'title' => 'Fitting Weight',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              6 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                'fieldtype' => 'booleanSelect',
                                'yesLabel' => 'Y',
                                'noLabel' => 'N',
                                'emptyLabel' => '',
                                'options' =>
                                array(
                                  0 =>
                                  array(
                                    'key' => '',
                                    'value' => 0,
                                  ),
                                  1 =>
                                  array(
                                    'key' => 'Y',
                                    'value' => 1,
                                  ),
                                  2 =>
                                  array(
                                    'key' => 'N',
                                    'value' => -1,
                                  ),
                                ),
                                'width' => 200,
                                'queryColumnType' => 'tinyint(1) null',
                                'columnType' => 'tinyint(1) null',
                                'phpdocType' => 'boolean',
                                'name' => 'DualGripStyle',
                                'title' => 'Dual-Grip Style (Y/N)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                              )),
                              7 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'SAEStandard',
                                'title' => 'SAE Standard',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              8 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'SkiveType',
                                'title' => 'Skive Type',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              10 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                'fieldtype' => 'select',
                                'options' =>
                                array(
                                  0 =>
                                  array(
                                    'key' => 'Thrust Nut',
                                    'value' => 'Thrust Nut',
                                  ),
                                  1 =>
                                  array(
                                    'key' => 'Tube Nut',
                                    'value' => 'Tube Nut',
                                  ),
                                  2 =>
                                  array(
                                    'key' => 'Crimp Nut',
                                    'value' => 'Crimp Nut',
                                  ),
                                ),
                                'width' => 200,
                                'defaultValue' => '',
                                'optionsProviderClass' => '',
                                'optionsProviderData' => '',
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 190,
                                'phpdocType' => 'string',
                                'dynamicOptions' => false,
                                'name' => 'NutType',
                                'title' => 'Nut Type',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                            ),
                            'locked' => false,
                          )),
                          1 =>
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                            'fieldtype' => 'fieldcontainer',
                            'labelWidth' => 200,
                            'layout' => 'vbox',
                            'fieldLabel' => '',
                            'name' => 'Field Container',
                            'type' => NULL,
                            'region' => NULL,
                            'title' => '',
                            'width' => NULL,
                            'height' => NULL,
                            'collapsible' => false,
                            'collapsed' => false,
                            'bodyStyle' => '',
                            'datatype' => 'layout',
                            'permissions' => NULL,
                            'childs' =>
                            array(
                              0 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Date::__set_state(array(
                                'fieldtype' => 'date',
                                'queryColumnType' => 'bigint(20)',
                                'columnType' => 'bigint(20)',
                                'phpdocType' => '\\Carbon\\Carbon',
                                'defaultValue' => NULL,
                                'useCurrentDate' => false,
                                'name' => 'ReleasedToProductionDate',
                                'title' => 'Released To Production Date',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              1 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                'fieldtype' => 'textarea',
                                'width' => 200,
                                'height' => 120,
                                'maxLength' => NULL,
                                'showCharCount' => false,
                                'excludeFromSearchIndex' => false,
                                'queryColumnType' => 'longtext',
                                'columnType' => 'longtext',
                                'phpdocType' => 'string',
                                'name' => 'Comments',
                                'title' => 'Comments',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                              )),
                              2 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                'fieldtype' => 'select',
                                'options' =>
                                array(
                                  0 =>
                                  array(
                                    'key' => 'BFFX',
                                    'value' => 1829692,
                                  ),
                                  1 =>
                                  array(
                                    'key' => 'BPFX',
                                    'value' => 1829693,
                                  ),
                                  2 =>
                                  array(
                                    'key' => 'BPFX45',
                                    'value' => 1829694,
                                  ),
                                  3 =>
                                  array(
                                    'key' => 'BPFX90',
                                    'value' => 1829695,
                                  ),
                                  4 =>
                                  array(
                                    'key' => 'BPM',
                                    'value' => 1829696,
                                  ),
                                  5 =>
                                  array(
                                    'key' => 'BTM',
                                    'value' => 1829697,
                                  ),
                                  6 =>
                                  array(
                                    'key' => 'CB12VS90',
                                    'value' => 1829698,
                                  ),
                                  7 =>
                                  array(
                                    'key' => 'CB12VSR90',
                                    'value' => 1829699,
                                  ),
                                  8 =>
                                  array(
                                    'key' => 'CF',
                                    'value' => 1829700,
                                  ),
                                  9 =>
                                  array(
                                    'key' => 'CF22',
                                    'value' => 1829701,
                                  ),
                                  10 =>
                                  array(
                                    'key' => 'CF30',
                                    'value' => 1829702,
                                  ),
                                  11 =>
                                  array(
                                    'key' => 'CF45',
                                    'value' => 1829703,
                                  ),
                                  12 =>
                                  array(
                                    'key' => 'CF60',
                                    'value' => 1829704,
                                  ),
                                  13 =>
                                  array(
                                    'key' => 'CF67',
                                    'value' => 1829705,
                                  ),
                                  14 =>
                                  array(
                                    'key' => 'CF90',
                                    'value' => 1829706,
                                  ),
                                  15 =>
                                  array(
                                    'key' => 'CLIP',
                                    'value' => 1829707,
                                  ),
                                  16 =>
                                  array(
                                    'key' => 'CLIPHLDR',
                                    'value' => 1829708,
                                  ),
                                  17 =>
                                  array(
                                    'key' => 'COTF134V90',
                                    'value' => 1829709,
                                  ),
                                  18 =>
                                  array(
                                    'key' => 'COTF45',
                                    'value' => 1829710,
                                  ),
                                  19 =>
                                  array(
                                    'key' => 'COTF90',
                                    'value' => 1829711,
                                  ),
                                  20 =>
                                  array(
                                    'key' => 'DHFX',
                                    'value' => 1829712,
                                  ),
                                  21 =>
                                  array(
                                    'key' => 'DHFX45',
                                    'value' => 1829713,
                                  ),
                                  22 =>
                                  array(
                                    'key' => 'DHFX90',
                                    'value' => 1829714,
                                  ),
                                  23 =>
                                  array(
                                    'key' => 'DHM',
                                    'value' => 1829715,
                                  ),
                                  24 =>
                                  array(
                                    'key' => 'DLFX',
                                    'value' => 1829716,
                                  ),
                                  25 =>
                                  array(
                                    'key' => 'DLFX45',
                                    'value' => 1829717,
                                  ),
                                  26 =>
                                  array(
                                    'key' => 'DLFX90',
                                    'value' => 1829718,
                                  ),
                                  27 =>
                                  array(
                                    'key' => 'DLM',
                                    'value' => 1829719,
                                  ),
                                  28 =>
                                  array(
                                    'key' => 'DNFX45',
                                    'value' => 1829720,
                                  ),
                                  29 =>
                                  array(
                                    'key' => 'DNFX90',
                                    'value' => 1829721,
                                  ),
                                  30 =>
                                  array(
                                    'key' => 'F',
                                    'value' => 1829722,
                                  ),
                                  31 =>
                                  array(
                                    'key' => 'Ferrule',
                                    'value' => 1829852,
                                  ),
                                  32 =>
                                  array(
                                    'key' => 'FH',
                                    'value' => 1829723,
                                  ),
                                  33 =>
                                  array(
                                    'key' => 'FH22',
                                    'value' => 1829724,
                                  ),
                                  34 =>
                                  array(
                                    'key' => 'FH30',
                                    'value' => 1829725,
                                  ),
                                  35 =>
                                  array(
                                    'key' => 'FH45',
                                    'value' => 1829726,
                                  ),
                                  36 =>
                                  array(
                                    'key' => 'FH60',
                                    'value' => 1829727,
                                  ),
                                  37 =>
                                  array(
                                    'key' => 'FH67',
                                    'value' => 1829728,
                                  ),
                                  38 =>
                                  array(
                                    'key' => 'FH90',
                                    'value' => 1829729,
                                  ),
                                  39 =>
                                  array(
                                    'key' => 'FL',
                                    'value' => 1829730,
                                  ),
                                  40 =>
                                  array(
                                    'key' => 'FL110',
                                    'value' => 1829731,
                                  ),
                                  41 =>
                                  array(
                                    'key' => 'FL135',
                                    'value' => 1829732,
                                  ),
                                  42 =>
                                  array(
                                    'key' => 'FL22',
                                    'value' => 1829733,
                                  ),
                                  43 =>
                                  array(
                                    'key' => 'FL30',
                                    'value' => 1829734,
                                  ),
                                  44 =>
                                  array(
                                    'key' => 'FL45',
                                    'value' => 1829735,
                                  ),
                                  45 =>
                                  array(
                                    'key' => 'FL60',
                                    'value' => 1829736,
                                  ),
                                  46 =>
                                  array(
                                    'key' => 'FL67',
                                    'value' => 1829737,
                                  ),
                                  47 =>
                                  array(
                                    'key' => 'FL90',
                                    'value' => 1829738,
                                  ),
                                  48 =>
                                  array(
                                    'key' => 'FL90EOC',
                                    'value' => 1829739,
                                  ),
                                  49 =>
                                  array(
                                    'key' => 'FSLF',
                                    'value' => 1829740,
                                  ),
                                  50 =>
                                  array(
                                    'key' => 'FSLF45',
                                    'value' => 1829741,
                                  ),
                                  51 =>
                                  array(
                                    'key' => 'FSLF90',
                                    'value' => 1829742,
                                  ),
                                  52 =>
                                  array(
                                    'key' => 'FSLM',
                                    'value' => 1829743,
                                  ),
                                  53 =>
                                  array(
                                    'key' => 'FSLM45',
                                    'value' => 1829744,
                                  ),
                                  54 =>
                                  array(
                                    'key' => 'FSLM90',
                                    'value' => 1829745,
                                  ),
                                  55 =>
                                  array(
                                    'key' => 'FT',
                                    'value' => 1829746,
                                  ),
                                  56 =>
                                  array(
                                    'key' => 'FTBO',
                                    'value' => 1829747,
                                  ),
                                  57 =>
                                  array(
                                    'key' => 'FTM',
                                    'value' => 1829748,
                                  ),
                                  58 =>
                                  array(
                                    'key' => 'FTM90',
                                    'value' => 1829749,
                                  ),
                                  59 =>
                                  array(
                                    'key' => 'FTMM',
                                    'value' => 1829750,
                                  ),
                                  60 =>
                                  array(
                                    'key' => 'FTN',
                                    'value' => 1829751,
                                  ),
                                  61 =>
                                  array(
                                    'key' => 'FTSM',
                                    'value' => 1829752,
                                  ),
                                  62 =>
                                  array(
                                    'key' => 'GTF',
                                    'value' => 1829753,
                                  ),
                                  63 =>
                                  array(
                                    'key' => 'HJ',
                                    'value' => 1829754,
                                  ),
                                  64 =>
                                  array(
                                    'key' => 'HM',
                                    'value' => 1829755,
                                  ),
                                  65 =>
                                  array(
                                    'key' => 'HM12V',
                                    'value' => 1829756,
                                  ),
                                  66 =>
                                  array(
                                    'key' => 'HM134V',
                                    'value' => 1829757,
                                  ),
                                  67 =>
                                  array(
                                    'key' => 'HM180',
                                    'value' => 1829758,
                                  ),
                                  68 =>
                                  array(
                                    'key' => 'HM90',
                                    'value' => 1829759,
                                  ),
                                  69 =>
                                  array(
                                    'key' => 'HMSG',
                                    'value' => 1829760,
                                  ),
                                  70 =>
                                  array(
                                    'key' => 'HMT',
                                    'value' => 1829761,
                                  ),
                                  71 =>
                                  array(
                                    'key' => 'IHUF1502',
                                    'value' => 1829762,
                                  ),
                                  72 =>
                                  array(
                                    'key' => 'IHUM1502',
                                    'value' => 1829763,
                                  ),
                                  73 =>
                                  array(
                                    'key' => 'ILOTBLK',
                                    'value' => 1829764,
                                  ),
                                  74 =>
                                  array(
                                    'key' => 'ILOTBLU',
                                    'value' => 1829765,
                                  ),
                                  75 =>
                                  array(
                                    'key' => 'ILOTORA',
                                    'value' => 1829766,
                                  ),
                                  76 =>
                                  array(
                                    'key' => 'ILOTRED',
                                    'value' => 1829767,
                                  ),
                                  77 =>
                                  array(
                                    'key' => 'ILOTWHI',
                                    'value' => 1829768,
                                  ),
                                  78 =>
                                  array(
                                    'key' => 'JCFX',
                                    'value' => 1829769,
                                  ),
                                  79 =>
                                  array(
                                    'key' => 'JCFX45',
                                    'value' => 1829770,
                                  ),
                                  80 =>
                                  array(
                                    'key' => 'JCFX90',
                                    'value' => 1829771,
                                  ),
                                  81 =>
                                  array(
                                    'key' => 'JCM',
                                    'value' => 1829772,
                                  ),
                                  82 =>
                                  array(
                                    'key' => 'JSFX',
                                    'value' => 1829773,
                                  ),
                                  83 =>
                                  array(
                                    'key' => 'KF',
                                    'value' => 1829774,
                                  ),
                                  84 =>
                                  array(
                                    'key' => 'KF45',
                                    'value' => 1829775,
                                  ),
                                  85 =>
                                  array(
                                    'key' => 'KF90',
                                    'value' => 1829776,
                                  ),
                                  86 =>
                                  array(
                                    'key' => 'KMFX',
                                    'value' => 1829777,
                                  ),
                                  87 =>
                                  array(
                                    'key' => 'KMFX45',
                                    'value' => 1829778,
                                  ),
                                  88 =>
                                  array(
                                    'key' => 'KMFX90',
                                    'value' => 1829779,
                                  ),
                                  89 =>
                                  array(
                                    'key' => 'NPF',
                                    'value' => 1829780,
                                  ),
                                  90 =>
                                  array(
                                    'key' => 'NPFX',
                                    'value' => 1829781,
                                  ),
                                  91 =>
                                  array(
                                    'key' => 'NPM',
                                    'value' => 1829782,
                                  ),
                                  92 =>
                                  array(
                                    'key' => 'NPM90',
                                    'value' => 1829783,
                                  ),
                                  93 =>
                                  array(
                                    'key' => 'NPMAPI',
                                    'value' => 1829784,
                                  ),
                                  94 =>
                                  array(
                                    'key' => 'NPMX',
                                    'value' => 1829785,
                                  ),
                                  95 =>
                                  array(
                                    'key' => 'NPMX90',
                                    'value' => 1829786,
                                  ),
                                  96 =>
                                  array(
                                    'key' => 'NSFX',
                                    'value' => 1829787,
                                  ),
                                  97 =>
                                  array(
                                    'key' => 'OBM',
                                    'value' => 1829788,
                                  ),
                                  98 =>
                                  array(
                                    'key' => 'OBMX',
                                    'value' => 1829789,
                                  ),
                                  99 =>
                                  array(
                                    'key' => 'OBMX90',
                                    'value' => 1829790,
                                  ),
                                  100 =>
                                  array(
                                    'key' => 'OFFX',
                                    'value' => 1829791,
                                  ),
                                  101 =>
                                  array(
                                    'key' => 'OFFX45',
                                    'value' => 1829792,
                                  ),
                                  102 =>
                                  array(
                                    'key' => 'OFFX90',
                                    'value' => 1829793,
                                  ),
                                  103 =>
                                  array(
                                    'key' => 'OFM',
                                    'value' => 1829794,
                                  ),
                                  104 =>
                                  array(
                                    'key' => 'OFS',
                                    'value' => 1829795,
                                  ),
                                  105 =>
                                  array(
                                    'key' => 'OIM',
                                    'value' => 1829796,
                                  ),
                                  106 =>
                                  array(
                                    'key' => 'OIM134V',
                                    'value' => 1829797,
                                  ),
                                  107 =>
                                  array(
                                    'key' => 'OIM134V90',
                                    'value' => 1829798,
                                  ),
                                  108 =>
                                  array(
                                    'key' => 'OIM45',
                                    'value' => 1829799,
                                  ),
                                  109 =>
                                  array(
                                    'key' => 'OIM90',
                                    'value' => 1829800,
                                  ),
                                  110 =>
                                  array(
                                    'key' => 'OIMB90',
                                    'value' => 1829801,
                                  ),
                                  111 =>
                                  array(
                                    'key' => 'OSWCH',
                                    'value' => 1829802,
                                  ),
                                  112 =>
                                  array(
                                    'key' => 'OTCF10',
                                    'value' => 1829803,
                                  ),
                                  113 =>
                                  array(
                                    'key' => 'OTF',
                                    'value' => 1829804,
                                  ),
                                  114 =>
                                  array(
                                    'key' => 'OTF06',
                                    'value' => 1829805,
                                  ),
                                  115 =>
                                  array(
                                    'key' => 'OTF08',
                                    'value' => 1829806,
                                  ),
                                  116 =>
                                  array(
                                    'key' => 'OTF10',
                                    'value' => 1829807,
                                  ),
                                  117 =>
                                  array(
                                    'key' => 'OTF12',
                                    'value' => 1829808,
                                  ),
                                  118 =>
                                  array(
                                    'key' => 'OTF12V',
                                    'value' => 1829809,
                                  ),
                                  119 =>
                                  array(
                                    'key' => 'OTF12V90',
                                    'value' => 1829810,
                                  ),
                                  120 =>
                                  array(
                                    'key' => 'OTF134V',
                                    'value' => 1829811,
                                  ),
                                  121 =>
                                  array(
                                    'key' => 'OTF134V45',
                                    'value' => 1829812,
                                  ),
                                  122 =>
                                  array(
                                    'key' => 'OTF134V90',
                                    'value' => 1829813,
                                  ),
                                  123 =>
                                  array(
                                    'key' => 'OTF134VH',
                                    'value' => 1829814,
                                  ),
                                  124 =>
                                  array(
                                    'key' => 'OTF180',
                                    'value' => 1829815,
                                  ),
                                  125 =>
                                  array(
                                    'key' => 'OTF45',
                                    'value' => 1829816,
                                  ),
                                  126 =>
                                  array(
                                    'key' => 'OTF90',
                                    'value' => 1829817,
                                  ),
                                  127 =>
                                  array(
                                    'key' => 'OTFM',
                                    'value' => 1829818,
                                  ),
                                  128 =>
                                  array(
                                    'key' => 'OTFM45',
                                    'value' => 1829819,
                                  ),
                                  129 =>
                                  array(
                                    'key' => 'OTFM90',
                                    'value' => 1829820,
                                  ),
                                  130 =>
                                  array(
                                    'key' => 'OTM',
                                    'value' => 1829821,
                                  ),
                                  131 =>
                                  array(
                                    'key' => 'OTM134V',
                                    'value' => 1829822,
                                  ),
                                  132 =>
                                  array(
                                    'key' => 'OTM134V90',
                                    'value' => 1829823,
                                  ),
                                  133 =>
                                  array(
                                    'key' => 'OTM45',
                                    'value' => 1829824,
                                  ),
                                  134 =>
                                  array(
                                    'key' => 'OTM90',
                                    'value' => 1829825,
                                  ),
                                  135 =>
                                  array(
                                    'key' => 'OTMLP',
                                    'value' => 1829826,
                                  ),
                                  136 =>
                                  array(
                                    'key' => 'OTUBE',
                                    'value' => 1829827,
                                  ),
                                  137 =>
                                  array(
                                    'key' => 'PLIER',
                                    'value' => 1829828,
                                  ),
                                  138 =>
                                  array(
                                    'key' => 'PTTFX',
                                    'value' => 1829829,
                                  ),
                                  139 =>
                                  array(
                                    'key' => 'SFFX',
                                    'value' => 1829830,
                                  ),
                                  140 =>
                                  array(
                                    'key' => 'SFFX45',
                                    'value' => 1829831,
                                  ),
                                  141 =>
                                  array(
                                    'key' => 'SFFX90',
                                    'value' => 1829832,
                                  ),
                                  142 =>
                                  array(
                                    'key' => 'SFM',
                                    'value' => 1829833,
                                  ),
                                  143 =>
                                  array(
                                    'key' => 'SFM45',
                                    'value' => 1829834,
                                  ),
                                  144 =>
                                  array(
                                    'key' => 'SFM90',
                                    'value' => 1829835,
                                  ),
                                  145 =>
                                  array(
                                    'key' => 'SIF',
                                    'value' => 1829836,
                                  ),
                                  146 =>
                                  array(
                                    'key' => 'SIM',
                                    'value' => 1829837,
                                  ),
                                  147 =>
                                  array(
                                    'key' => 'SIMX',
                                    'value' => 1829838,
                                  ),
                                  148 =>
                                  array(
                                    'key' => 'SIMX45',
                                    'value' => 1829839,
                                  ),
                                  149 =>
                                  array(
                                    'key' => 'SIMX90',
                                    'value' => 1829840,
                                  ),
                                  150 =>
                                  array(
                                    'key' => 'SP',
                                    'value' => 1829841,
                                  ),
                                  151 =>
                                  array(
                                    'key' => 'SP45',
                                    'value' => 1829842,
                                  ),
                                  152 =>
                                  array(
                                    'key' => 'SWA',
                                    'value' => 1829843,
                                  ),
                                  153 =>
                                  array(
                                    'key' => 'SWCN',
                                    'value' => 1829844,
                                  ),
                                  154 =>
                                  array(
                                    'key' => 'SWCW',
                                    'value' => 1829845,
                                  ),
                                  155 =>
                                  array(
                                    'key' => 'VA12V1/4',
                                    'value' => 1829846,
                                  ),
                                  156 =>
                                  array(
                                    'key' => 'VA12V3/16',
                                    'value' => 1829847,
                                  ),
                                  157 =>
                                  array(
                                    'key' => 'VC12V',
                                    'value' => 1829848,
                                  ),
                                  158 =>
                                  array(
                                    'key' => 'VC134VH',
                                    'value' => 1829849,
                                  ),
                                  159 =>
                                  array(
                                    'key' => 'VC134VL',
                                    'value' => 1829850,
                                  ),
                                  160 =>
                                  array(
                                    'key' => 'VCORE',
                                    'value' => 1829851,
                                  ),
                                ),
                                'width' => 200,
                                'defaultValue' => '',
                                'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
                                'optionsProviderData' => 'FittingEndFamilyType|Name',
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'dynamicOptions' => false,
                                'name' => 'FittingEndFamilyType',
                                'title' => 'Fitting End Family Type',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              3 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'SocketWrenchSizeMM',
                                'title' => 'Socket Wrench Size (mm)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              4 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'FittingSizeInFract',
                                'title' => 'Fitting Size (in) Fract.',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              5 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                'fieldtype' => 'booleanSelect',
                                'yesLabel' => 'Y',
                                'noLabel' => 'N',
                                'emptyLabel' => '',
                                'options' =>
                                array(
                                  0 =>
                                  array(
                                    'key' => '',
                                    'value' => 0,
                                  ),
                                  1 =>
                                  array(
                                    'key' => 'Y',
                                    'value' => 1,
                                  ),
                                  2 =>
                                  array(
                                    'key' => 'N',
                                    'value' => -1,
                                  ),
                                ),
                                'width' => 200,
                                'queryColumnType' => 'tinyint(1) null',
                                'columnType' => 'tinyint(1) null',
                                'phpdocType' => 'boolean',
                                'name' => 'UniCrimpStyle',
                                'title' => 'Uni-Crimp Style (Y/N)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                              )),
                              6 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                'fieldtype' => 'booleanSelect',
                                'yesLabel' => 'Y',
                                'noLabel' => 'N',
                                'emptyLabel' => '',
                                'options' =>
                                array(
                                  0 =>
                                  array(
                                    'key' => '',
                                    'value' => 0,
                                  ),
                                  1 =>
                                  array(
                                    'key' => 'Y',
                                    'value' => 1,
                                  ),
                                  2 =>
                                  array(
                                    'key' => 'N',
                                    'value' => -1,
                                  ),
                                ),
                                'width' => 200,
                                'queryColumnType' => 'tinyint(1) null',
                                'columnType' => 'tinyint(1) null',
                                'phpdocType' => 'boolean',
                                'name' => 'DualSeatYN',
                                'title' => 'Dual Seat Y/N',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                              )),
                              7 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                'fieldtype' => 'select',
                                'options' =>
                                array(
                                  0 =>
                                  array(
                                    'key' => 'Steel',
                                    'value' => 'Steel',
                                  ),
                                  1 =>
                                  array(
                                    'key' => 'Stainless Steel',
                                    'value' => 'Stainless Steel',
                                  ),
                                  2 =>
                                  array(
                                    'key' => 'Brass',
                                    'value' => 'Brass',
                                  ),
                                ),
                                'width' => 200,
                                'defaultValue' => '',
                                'optionsProviderClass' => '',
                                'optionsProviderData' => '',
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'dynamicOptions' => false,
                                'name' => 'AssemblyMaterial',
                                'title' => 'Assembly Material',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              8 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                'fieldtype' => 'textarea',
                                'width' => 200,
                                'height' => 120,
                                'maxLength' => NULL,
                                'showCharCount' => false,
                                'excludeFromSearchIndex' => false,
                                'queryColumnType' => 'longtext',
                                'columnType' => 'longtext',
                                'phpdocType' => 'string',
                                'name' => 'CatalogDescription',
                                'title' => 'Catalog Description',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                              )),
                            ),
                            'locked' => false,
                          )),
                        ),
                        'locked' => false,
                      )),
                    ),
                    'locked' => false,
                  )),
                  1 =>
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                    'fieldtype' => 'fieldset',
                    'labelWidth' => 100,
                    'name' => 'Layout',
                    'type' => NULL,
                    'region' => NULL,
                    'title' => 'Flange',
                    'width' => NULL,
                    'height' => NULL,
                    'collapsible' => true,
                    'collapsed' => false,
                    'bodyStyle' => '',
                    'datatype' => 'layout',
                    'permissions' => NULL,
                    'childs' =>
                    array(
                      0 =>
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                        'fieldtype' => 'fieldcontainer',
                        'labelWidth' => 100,
                        'layout' => 'hbox',
                        'fieldLabel' => '',
                        'name' => 'Flange',
                        'type' => NULL,
                        'region' => NULL,
                        'title' => '',
                        'width' => NULL,
                        'height' => NULL,
                        'collapsible' => false,
                        'collapsed' => false,
                        'bodyStyle' => '',
                        'datatype' => 'layout',
                        'permissions' => NULL,
                        'childs' =>
                        array(
                          0 =>
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                            'fieldtype' => 'fieldcontainer',
                            'labelWidth' => 200,
                            'layout' => 'vbox',
                            'fieldLabel' => '',
                            'name' => 'Field Container',
                            'type' => NULL,
                            'region' => NULL,
                            'title' => '',
                            'width' => NULL,
                            'height' => NULL,
                            'collapsible' => false,
                            'collapsed' => false,
                            'bodyStyle' => '',
                            'datatype' => 'layout',
                            'permissions' => NULL,
                            'childs' =>
                            array(
                              0 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'FlangeIDInFract',
                                'title' => 'Flange ID (in) Fract.',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              1 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'FlangeIDMM',
                                'title' => 'Flange ID (mm)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              2 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'FlangeODInDec',
                                'title' => 'Flange OD (in) Dec.',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                            ),
                            'locked' => false,
                          )),
                          1 =>
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                            'fieldtype' => 'fieldcontainer',
                            'labelWidth' => 200,
                            'layout' => 'vbox',
                            'fieldLabel' => '',
                            'name' => 'Field Container',
                            'type' => NULL,
                            'region' => NULL,
                            'title' => '',
                            'width' => NULL,
                            'height' => NULL,
                            'collapsible' => false,
                            'collapsed' => false,
                            'bodyStyle' => '',
                            'datatype' => 'layout',
                            'permissions' => NULL,
                            'childs' =>
                            array(
                              0 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'FlangeIDInDec',
                                'title' => 'Flange ID (in) Dec.',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              1 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'FlangeODInFract',
                                'title' => 'Flange OD (in) Fract.',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              2 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'FlangeODMM',
                                'title' => 'Flange OD (mm)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                            ),
                            'locked' => false,
                          )),
                        ),
                        'locked' => false,
                      )),
                    ),
                    'locked' => false,
                  )),
                  2 =>
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                    'fieldtype' => 'fieldset',
                    'labelWidth' => 100,
                    'name' => 'Layout',
                    'type' => NULL,
                    'region' => NULL,
                    'title' => 'Tube',
                    'width' => NULL,
                    'height' => NULL,
                    'collapsible' => true,
                    'collapsed' => false,
                    'bodyStyle' => '',
                    'datatype' => 'layout',
                    'permissions' => NULL,
                    'childs' =>
                    array(
                      0 =>
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                        'fieldtype' => 'fieldcontainer',
                        'labelWidth' => 100,
                        'layout' => 'hbox',
                        'fieldLabel' => '',
                        'name' => 'Tube',
                        'type' => NULL,
                        'region' => NULL,
                        'title' => '',
                        'width' => NULL,
                        'height' => NULL,
                        'collapsible' => false,
                        'collapsed' => false,
                        'bodyStyle' => '',
                        'datatype' => 'layout',
                        'permissions' => NULL,
                        'childs' =>
                        array(
                          0 =>
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                            'fieldtype' => 'fieldcontainer',
                            'labelWidth' => 200,
                            'layout' => 'vbox',
                            'fieldLabel' => '',
                            'name' => 'Field Container',
                            'type' => NULL,
                            'region' => NULL,
                            'title' => '',
                            'width' => NULL,
                            'height' => NULL,
                            'collapsible' => false,
                            'collapsed' => false,
                            'bodyStyle' => '',
                            'datatype' => 'layout',
                            'permissions' => NULL,
                            'childs' =>
                            array(
                              0 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'TubeIDInFract',
                                'title' => 'Tube ID (in) Fract.',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              1 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'TubeLengthMM',
                                'title' => 'Tube Length (mm)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              2 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'TubeLengthInDec',
                                'title' => 'Tube Length (in) Dec.',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              3 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                'fieldtype' => 'numeric',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'double',
                                'columnType' => 'double',
                                'phpdocType' => 'float',
                                'integer' => false,
                                'unsigned' => false,
                                'minValue' => NULL,
                                'maxValue' => NULL,
                                'unique' => false,
                                'decimalSize' => NULL,
                                'decimalPrecision' => NULL,
                                'name' => 'TubeODInDec',
                                'title' => 'Tube OD (in) Dec.',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              4 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                'fieldtype' => 'numeric',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'double',
                                'columnType' => 'double',
                                'phpdocType' => 'float',
                                'integer' => false,
                                'unsigned' => false,
                                'minValue' => NULL,
                                'maxValue' => NULL,
                                'unique' => false,
                                'decimalSize' => NULL,
                                'decimalPrecision' => NULL,
                                'name' => 'OrificeTubeODInDecimal',
                                'title' => 'Orifice Tube OD (in) Decimal',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              5 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                'fieldtype' => 'numeric',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'double',
                                'columnType' => 'double',
                                'phpdocType' => 'float',
                                'integer' => false,
                                'unsigned' => false,
                                'minValue' => NULL,
                                'maxValue' => NULL,
                                'unique' => false,
                                'decimalSize' => NULL,
                                'decimalPrecision' => NULL,
                                'name' => 'OrificeTubeLengthInDecimal',
                                'title' => 'Orifice Tube Length (in) Decimal',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                            ),
                            'locked' => false,
                          )),
                          1 =>
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                            'fieldtype' => 'fieldcontainer',
                            'labelWidth' => 200,
                            'layout' => 'vbox',
                            'fieldLabel' => '',
                            'name' => 'Field Container',
                            'type' => NULL,
                            'region' => NULL,
                            'title' => '',
                            'width' => NULL,
                            'height' => NULL,
                            'collapsible' => false,
                            'collapsed' => false,
                            'bodyStyle' => '',
                            'datatype' => 'layout',
                            'permissions' => NULL,
                            'childs' =>
                            array(
                              0 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                'fieldtype' => 'numeric',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'double',
                                'columnType' => 'double',
                                'phpdocType' => 'float',
                                'integer' => false,
                                'unsigned' => false,
                                'minValue' => NULL,
                                'maxValue' => NULL,
                                'unique' => false,
                                'decimalSize' => NULL,
                                'decimalPrecision' => NULL,
                                'name' => 'TubeIDInDec',
                                'title' => 'Tube ID (in) Dec.',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              1 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                'fieldtype' => 'numeric',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'double',
                                'columnType' => 'double',
                                'phpdocType' => 'float',
                                'integer' => false,
                                'unsigned' => false,
                                'minValue' => NULL,
                                'maxValue' => NULL,
                                'unique' => false,
                                'decimalSize' => NULL,
                                'decimalPrecision' => NULL,
                                'name' => 'TubeIDMM',
                                'title' => 'Tube ID (mm)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              2 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'TubeODInFract',
                                'title' => 'Tube OD (in) Fract.',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              3 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                'fieldtype' => 'numeric',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'double',
                                'columnType' => 'double',
                                'phpdocType' => 'float',
                                'integer' => false,
                                'unsigned' => false,
                                'minValue' => NULL,
                                'maxValue' => NULL,
                                'unique' => false,
                                'decimalSize' => NULL,
                                'decimalPrecision' => NULL,
                                'name' => 'TubeODMM',
                                'title' => 'Tube OD (mm)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              4 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                'fieldtype' => 'numeric',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'double',
                                'columnType' => 'double',
                                'phpdocType' => 'float',
                                'integer' => false,
                                'unsigned' => false,
                                'minValue' => NULL,
                                'maxValue' => NULL,
                                'unique' => false,
                                'decimalSize' => NULL,
                                'decimalPrecision' => NULL,
                                'name' => 'OrificeTubeODMMDecimal',
                                'title' => 'Orifice Tube OD (mm) Decimal',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              5 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                'fieldtype' => 'numeric',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'double',
                                'columnType' => 'double',
                                'phpdocType' => 'float',
                                'integer' => false,
                                'unsigned' => false,
                                'minValue' => NULL,
                                'maxValue' => NULL,
                                'unique' => false,
                                'decimalSize' => NULL,
                                'decimalPrecision' => NULL,
                                'name' => 'OrificeTubeLengthMMDecimal',
                                'title' => 'Orifice Tube Length (mm) Decimal',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                            ),
                            'locked' => false,
                          )),
                        ),
                        'locked' => false,
                      )),
                    ),
                    'locked' => false,
                  )),
                  3 =>
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                    'fieldtype' => 'fieldset',
                    'labelWidth' => 100,
                    'name' => 'Layout',
                    'type' => NULL,
                    'region' => NULL,
                    'title' => 'Valve',
                    'width' => NULL,
                    'height' => NULL,
                    'collapsible' => true,
                    'collapsed' => false,
                    'bodyStyle' => '',
                    'datatype' => 'layout',
                    'permissions' => NULL,
                    'childs' =>
                    array(
                      0 =>
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                        'fieldtype' => 'fieldcontainer',
                        'labelWidth' => 100,
                        'layout' => 'hbox',
                        'fieldLabel' => '',
                        'name' => 'Layout',
                        'type' => NULL,
                        'region' => NULL,
                        'title' => '',
                        'width' => NULL,
                        'height' => NULL,
                        'collapsible' => false,
                        'collapsed' => false,
                        'bodyStyle' => '',
                        'datatype' => 'layout',
                        'permissions' => NULL,
                        'childs' =>
                        array(
                          0 =>
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                            'fieldtype' => 'fieldcontainer',
                            'labelWidth' => 200,
                            'layout' => 'vbox',
                            'fieldLabel' => '',
                            'name' => 'Field Container',
                            'type' => NULL,
                            'region' => NULL,
                            'title' => '',
                            'width' => NULL,
                            'height' => NULL,
                            'collapsible' => false,
                            'collapsed' => false,
                            'bodyStyle' => '',
                            'datatype' => 'layout',
                            'permissions' => NULL,
                            'childs' =>
                            array(
                              0 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'ValveSize1inFraction',
                                'title' => 'Valve Size 1 (in, Fraction)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              1 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                'fieldtype' => 'numeric',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'double',
                                'columnType' => 'double',
                                'phpdocType' => 'float',
                                'integer' => false,
                                'unsigned' => true,
                                'minValue' => NULL,
                                'maxValue' => NULL,
                                'unique' => false,
                                'decimalSize' => NULL,
                                'decimalPrecision' => 3,
                                'name' => 'ValveSizeInDec',
                                'title' => 'Valve Size (in) Dec.',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              2 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                'fieldtype' => 'numeric',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'double',
                                'columnType' => 'double',
                                'phpdocType' => 'float',
                                'integer' => false,
                                'unsigned' => true,
                                'minValue' => NULL,
                                'maxValue' => NULL,
                                'unique' => false,
                                'decimalSize' => NULL,
                                'decimalPrecision' => 3,
                                'name' => 'ValveSizeMM',
                                'title' => 'Valve Size (mm)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              3 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                'fieldtype' => 'numeric',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'double',
                                'columnType' => 'double',
                                'phpdocType' => 'float',
                                'integer' => false,
                                'unsigned' => true,
                                'minValue' => NULL,
                                'maxValue' => NULL,
                                'unique' => false,
                                'decimalSize' => NULL,
                                'decimalPrecision' => 3,
                                'name' => 'ValveStyle',
                                'title' => 'Valve Style',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                            ),
                            'locked' => false,
                          )),
                          1 =>
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                            'fieldtype' => 'fieldcontainer',
                            'labelWidth' => 200,
                            'layout' => 'vbox',
                            'fieldLabel' => '',
                            'name' => 'Field Container',
                            'type' => NULL,
                            'region' => NULL,
                            'title' => '',
                            'width' => NULL,
                            'height' => NULL,
                            'collapsible' => false,
                            'collapsed' => false,
                            'bodyStyle' => '',
                            'datatype' => 'layout',
                            'permissions' => NULL,
                            'childs' =>
                            array(
                              0 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'ValveSize2inFraction',
                                'title' => 'Valve Size 2 (in, Fraction)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              1 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                'fieldtype' => 'numeric',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'double',
                                'columnType' => 'double',
                                'phpdocType' => 'float',
                                'integer' => false,
                                'unsigned' => true,
                                'minValue' => NULL,
                                'maxValue' => NULL,
                                'unique' => false,
                                'decimalSize' => NULL,
                                'decimalPrecision' => 3,
                                'name' => 'ValveSize2InDec',
                                'title' => 'Valve Size 2 (in) Dec.',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              2 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                'fieldtype' => 'numeric',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'double',
                                'columnType' => 'double',
                                'phpdocType' => 'float',
                                'integer' => false,
                                'unsigned' => true,
                                'minValue' => NULL,
                                'maxValue' => NULL,
                                'unique' => false,
                                'decimalSize' => NULL,
                                'decimalPrecision' => 3,
                                'name' => 'ValveSize2MM',
                                'title' => 'Valve Size 2 (mm)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              3 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                'fieldtype' => 'numeric',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'double',
                                'columnType' => 'double',
                                'phpdocType' => 'float',
                                'integer' => false,
                                'unsigned' => true,
                                'minValue' => NULL,
                                'maxValue' => NULL,
                                'unique' => false,
                                'decimalSize' => NULL,
                                'decimalPrecision' => 3,
                                'name' => 'ValveStyle2',
                                'title' => 'Valve Style 2',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                            ),
                            'locked' => false,
                          )),
                        ),
                        'locked' => false,
                      )),
                    ),
                    'locked' => false,
                  )),
                  4 =>
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                    'fieldtype' => 'fieldset',
                    'labelWidth' => 100,
                    'name' => 'Layout',
                    'type' => NULL,
                    'region' => NULL,
                    'title' => 'Length/Depth',
                    'width' => NULL,
                    'height' => NULL,
                    'collapsible' => true,
                    'collapsed' => false,
                    'bodyStyle' => '',
                    'datatype' => 'layout',
                    'permissions' => NULL,
                    'childs' =>
                    array(
                      0 =>
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                        'fieldtype' => 'fieldcontainer',
                        'labelWidth' => 100,
                        'layout' => 'hbox',
                        'fieldLabel' => NULL,
                        'name' => 'Layout',
                        'type' => NULL,
                        'region' => NULL,
                        'title' => NULL,
                        'width' => NULL,
                        'height' => NULL,
                        'collapsible' => false,
                        'collapsed' => false,
                        'bodyStyle' => NULL,
                        'datatype' => 'layout',
                        'permissions' => NULL,
                        'childs' =>
                        array(
                          0 =>
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                            'fieldtype' => 'fieldcontainer',
                            'labelWidth' => 200,
                            'layout' => 'vbox',
                            'fieldLabel' => '',
                            'name' => 'Field Container',
                            'type' => NULL,
                            'region' => NULL,
                            'title' => '',
                            'width' => NULL,
                            'height' => NULL,
                            'collapsible' => false,
                            'collapsed' => false,
                            'bodyStyle' => '',
                            'datatype' => 'layout',
                            'permissions' => NULL,
                            'childs' =>
                            array(
                              0 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'OverallLengthIN',
                                'title' => 'Overall Length (In)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              1 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'RunLengthIN',
                                'title' => 'Run Length (in)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              2 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'CutOffLengthIN',
                                'title' => 'Cut Off Length (in)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              3 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'InsertionDepthIN',
                                'title' => 'Insertion Depth (in)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              4 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                'fieldtype' => 'numeric',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'double',
                                'columnType' => 'double',
                                'phpdocType' => 'float',
                                'integer' => false,
                                'unsigned' => false,
                                'minValue' => NULL,
                                'maxValue' => NULL,
                                'unique' => false,
                                'decimalSize' => NULL,
                                'decimalPrecision' => NULL,
                                'name' => 'DropLengthIN',
                                'title' => 'Drop Length (in)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                            ),
                            'locked' => false,
                          )),
                          1 =>
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                            'fieldtype' => 'fieldcontainer',
                            'labelWidth' => 200,
                            'layout' => 'vbox',
                            'fieldLabel' => '',
                            'name' => 'Field Container',
                            'type' => NULL,
                            'region' => NULL,
                            'title' => '',
                            'width' => NULL,
                            'height' => NULL,
                            'collapsible' => false,
                            'collapsed' => false,
                            'bodyStyle' => '',
                            'datatype' => 'layout',
                            'permissions' => NULL,
                            'childs' =>
                            array(
                              0 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'OverallLengthMm',
                                'title' => 'Overall Length (mm)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              1 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'RunLengthMM',
                                'title' => 'Run Length (mm)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              2 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'CutOffLengthMM',
                                'title' => 'Cut Off Length (mm)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              3 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'InsertionDepthMM',
                                'title' => 'Insertion Depth (mm)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              4 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                'fieldtype' => 'numeric',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'double',
                                'columnType' => 'double',
                                'phpdocType' => 'float',
                                'integer' => false,
                                'unsigned' => false,
                                'minValue' => NULL,
                                'maxValue' => NULL,
                                'unique' => false,
                                'decimalSize' => NULL,
                                'decimalPrecision' => NULL,
                                'name' => 'DropLengthMM',
                                'title' => 'Drop Length (mm)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                            ),
                            'locked' => false,
                          )),
                        ),
                        'locked' => false,
                      )),
                    ),
                    'locked' => false,
                  )),
                  5 =>
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                    'fieldtype' => 'fieldset',
                    'labelWidth' => 100,
                    'name' => 'Layout',
                    'type' => NULL,
                    'region' => NULL,
                    'title' => 'Hose',
                    'width' => NULL,
                    'height' => NULL,
                    'collapsible' => true,
                    'collapsed' => false,
                    'bodyStyle' => '',
                    'datatype' => 'layout',
                    'permissions' => NULL,
                    'childs' =>
                    array(
                      0 =>
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                        'fieldtype' => 'fieldcontainer',
                        'labelWidth' => 100,
                        'layout' => 'hbox',
                        'fieldLabel' => '',
                        'name' => 'Flange',
                        'type' => NULL,
                        'region' => NULL,
                        'title' => '',
                        'width' => NULL,
                        'height' => NULL,
                        'collapsible' => false,
                        'collapsed' => false,
                        'bodyStyle' => '',
                        'datatype' => 'layout',
                        'permissions' => NULL,
                        'childs' =>
                        array(
                          0 =>
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                            'fieldtype' => 'fieldcontainer',
                            'labelWidth' => 200,
                            'layout' => 'vbox',
                            'fieldLabel' => '',
                            'name' => 'Field Container',
                            'type' => NULL,
                            'region' => NULL,
                            'title' => '',
                            'width' => NULL,
                            'height' => NULL,
                            'collapsible' => false,
                            'collapsed' => false,
                            'bodyStyle' => '',
                            'datatype' => 'layout',
                            'permissions' => NULL,
                            'childs' =>
                            array(
                              0 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'HoseID1InFract',
                                'title' => 'Hose ID 1 (in) Fract.',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              1 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                'fieldtype' => 'numeric',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'double',
                                'columnType' => 'double',
                                'phpdocType' => 'float',
                                'integer' => false,
                                'unsigned' => true,
                                'minValue' => NULL,
                                'maxValue' => NULL,
                                'unique' => false,
                                'decimalSize' => NULL,
                                'decimalPrecision' => 3,
                                'name' => 'HoseID1InDec',
                                'title' => 'Hose ID 1 (in) Dec.',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              2 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                'fieldtype' => 'numeric',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'double',
                                'columnType' => 'double',
                                'phpdocType' => 'float',
                                'integer' => false,
                                'unsigned' => true,
                                'minValue' => NULL,
                                'maxValue' => NULL,
                                'unique' => false,
                                'decimalSize' => NULL,
                                'decimalPrecision' => 3,
                                'name' => 'HoseID1MM',
                                'title' => 'Hose ID 1 (mm)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              3 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'HoseID3InFract',
                                'title' => 'Hose ID 3 (in) Fract.',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              4 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                'fieldtype' => 'numeric',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'double',
                                'columnType' => 'double',
                                'phpdocType' => 'float',
                                'integer' => false,
                                'unsigned' => true,
                                'minValue' => NULL,
                                'maxValue' => NULL,
                                'unique' => false,
                                'decimalSize' => NULL,
                                'decimalPrecision' => 3,
                                'name' => 'HoseID3InDec',
                                'title' => 'Hose ID 3 (in) Dec.',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                            ),
                            'locked' => false,
                          )),
                          1 =>
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                            'fieldtype' => 'fieldcontainer',
                            'labelWidth' => 200,
                            'layout' => 'vbox',
                            'fieldLabel' => '',
                            'name' => 'Field Container',
                            'type' => NULL,
                            'region' => NULL,
                            'title' => '',
                            'width' => NULL,
                            'height' => NULL,
                            'collapsible' => false,
                            'collapsed' => false,
                            'bodyStyle' => '',
                            'datatype' => 'layout',
                            'permissions' => NULL,
                            'childs' =>
                            array(
                              0 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'HoseID2InFract',
                                'title' => 'Hose ID 2 (in) Fract.',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              1 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                'fieldtype' => 'numeric',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'double',
                                'columnType' => 'double',
                                'phpdocType' => 'float',
                                'integer' => false,
                                'unsigned' => true,
                                'minValue' => NULL,
                                'maxValue' => NULL,
                                'unique' => false,
                                'decimalSize' => NULL,
                                'decimalPrecision' => 3,
                                'name' => 'HoseID2InDec',
                                'title' => 'Hose ID 2 (in) Dec.',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              2 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                'fieldtype' => 'numeric',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'double',
                                'columnType' => 'double',
                                'phpdocType' => 'float',
                                'integer' => false,
                                'unsigned' => true,
                                'minValue' => NULL,
                                'maxValue' => NULL,
                                'unique' => false,
                                'decimalSize' => NULL,
                                'decimalPrecision' => 3,
                                'name' => 'HoseID2MM',
                                'title' => 'Hose ID 2 (mm)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              3 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                'fieldtype' => 'numeric',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'double',
                                'columnType' => 'double',
                                'phpdocType' => 'float',
                                'integer' => false,
                                'unsigned' => true,
                                'minValue' => NULL,
                                'maxValue' => NULL,
                                'unique' => false,
                                'decimalSize' => NULL,
                                'decimalPrecision' => 3,
                                'name' => 'HoseDashSize',
                                'title' => 'Hose Dash Size',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              4 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                'fieldtype' => 'numeric',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'double',
                                'columnType' => 'double',
                                'phpdocType' => 'float',
                                'integer' => false,
                                'unsigned' => true,
                                'minValue' => NULL,
                                'maxValue' => NULL,
                                'unique' => false,
                                'decimalSize' => NULL,
                                'decimalPrecision' => 3,
                                'name' => 'HoseID3MM',
                                'title' => 'Hose ID 3 (mm)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                            ),
                            'locked' => false,
                          )),
                        ),
                        'locked' => false,
                      )),
                    ),
                    'locked' => false,
                  )),
                  6 =>
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                    'fieldtype' => 'fieldset',
                    'labelWidth' => 100,
                    'name' => 'Layout',
                    'type' => NULL,
                    'region' => NULL,
                    'title' => 'Hex',
                    'width' => NULL,
                    'height' => NULL,
                    'collapsible' => true,
                    'collapsed' => false,
                    'bodyStyle' => '',
                    'datatype' => 'layout',
                    'permissions' => NULL,
                    'childs' =>
                    array(
                      0 =>
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                        'fieldtype' => 'fieldcontainer',
                        'labelWidth' => 100,
                        'layout' => 'hbox',
                        'fieldLabel' => '',
                        'name' => 'Flange',
                        'type' => NULL,
                        'region' => NULL,
                        'title' => '',
                        'width' => NULL,
                        'height' => NULL,
                        'collapsible' => false,
                        'collapsed' => false,
                        'bodyStyle' => '',
                        'datatype' => 'layout',
                        'permissions' => NULL,
                        'childs' =>
                        array(
                          0 =>
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                            'fieldtype' => 'fieldcontainer',
                            'labelWidth' => 200,
                            'layout' => 'vbox',
                            'fieldLabel' => '',
                            'name' => 'Field Container',
                            'type' => NULL,
                            'region' => NULL,
                            'title' => '',
                            'width' => NULL,
                            'height' => NULL,
                            'collapsible' => false,
                            'collapsed' => false,
                            'bodyStyle' => '',
                            'datatype' => 'layout',
                            'permissions' => NULL,
                            'childs' =>
                            array(
                              0 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 190,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'Hex1WrenchSizeIN',
                                'title' => 'Hex 1 Wrench Size (in)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              1 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 190,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'Hex2WrenchSizeIN',
                                'title' => 'Hex 2 Wrench Size (in)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                            ),
                            'locked' => false,
                          )),
                          1 =>
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                            'fieldtype' => 'fieldcontainer',
                            'labelWidth' => 200,
                            'layout' => 'vbox',
                            'fieldLabel' => '',
                            'name' => 'Field Container',
                            'type' => NULL,
                            'region' => NULL,
                            'title' => '',
                            'width' => NULL,
                            'height' => NULL,
                            'collapsible' => false,
                            'collapsed' => false,
                            'bodyStyle' => '',
                            'datatype' => 'layout',
                            'permissions' => NULL,
                            'childs' =>
                            array(
                              0 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 190,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'Hex1WrenchSizeMM',
                                'title' => 'Hex 1 Wrench Size (mm)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              1 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 190,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'Hex2WrenchSizeMM',
                                'title' => 'Hex 2 Wrench Size (mm)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              2 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                'fieldtype' => 'booleanSelect',
                                'yesLabel' => 'Y',
                                'noLabel' => 'N',
                                'emptyLabel' => '',
                                'options' =>
                                array(
                                  0 =>
                                  array(
                                    'key' => '',
                                    'value' => 0,
                                  ),
                                  1 =>
                                  array(
                                    'key' => 'Y',
                                    'value' => 1,
                                  ),
                                  2 =>
                                  array(
                                    'key' => 'N',
                                    'value' => -1,
                                  ),
                                ),
                                'width' => 200,
                                'queryColumnType' => 'tinyint(1) null',
                                'columnType' => 'tinyint(1) null',
                                'phpdocType' => 'boolean',
                                'name' => 'SingleHexYN',
                                'title' => 'Single Hex Y/N',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left: 20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                              )),
                            ),
                            'locked' => false,
                          )),
                        ),
                        'locked' => false,
                      )),
                    ),
                    'locked' => false,
                  )),
                ),
                'locked' => false,
                'icon' => '',
              )),
              1 =>
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                'fieldtype' => 'panel',
                'labelWidth' => 100,
                'layout' => NULL,
                'border' => false,
                'name' => 'Thread',
                'type' => NULL,
                'region' => NULL,
                'title' => 'Thread',
                'width' => 1200,
                'height' => NULL,
                'collapsible' => false,
                'collapsed' => false,
                'bodyStyle' => '',
                'datatype' => 'layout',
                'permissions' => NULL,
                'childs' =>
                array(
                  0 =>
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                    'fieldtype' => 'fieldcontainer',
                    'labelWidth' => 100,
                    'layout' => 'hbox',
                    'fieldLabel' => '',
                    'name' => 'Field Container',
                    'type' => NULL,
                    'region' => NULL,
                    'title' => '',
                    'width' => NULL,
                    'height' => NULL,
                    'collapsible' => false,
                    'collapsed' => false,
                    'bodyStyle' => '',
                    'datatype' => 'layout',
                    'permissions' => NULL,
                    'childs' =>
                    array(
                      0 =>
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                        'fieldtype' => 'fieldcontainer',
                        'labelWidth' => 200,
                        'layout' => 'vbox',
                        'fieldLabel' => '',
                        'name' => 'Field Container',
                        'type' => NULL,
                        'region' => NULL,
                        'title' => '',
                        'width' => NULL,
                        'height' => NULL,
                        'collapsible' => false,
                        'collapsed' => false,
                        'bodyStyle' => '',
                        'datatype' => 'layout',
                        'permissions' => NULL,
                        'childs' =>
                        array(
                          0 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                            'fieldtype' => 'input',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'varchar',
                            'columnType' => 'varchar',
                            'columnLength' => 150,
                            'phpdocType' => 'string',
                            'regex' => '',
                            'unique' => false,
                            'showCharCount' => false,
                            'name' => 'Thread1',
                            'title' => 'Thread 1',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => '',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          1 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                            'fieldtype' => 'input',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'varchar',
                            'columnType' => 'varchar',
                            'columnLength' => 150,
                            'phpdocType' => 'string',
                            'regex' => '',
                            'unique' => false,
                            'showCharCount' => false,
                            'name' => 'Thread3',
                            'title' => 'Thread 3',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => '',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          2 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                            'fieldtype' => 'input',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'varchar',
                            'columnType' => 'varchar',
                            'columnLength' => 190,
                            'phpdocType' => 'string',
                            'regex' => '',
                            'unique' => false,
                            'showCharCount' => false,
                            'name' => 'ThreadSize1InMMDecimal',
                            'title' => 'Thread Size 1 (in & mm) Decimal',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => '',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          3 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                            'fieldtype' => 'input',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'varchar',
                            'columnType' => 'varchar',
                            'columnLength' => 190,
                            'phpdocType' => 'string',
                            'regex' => '',
                            'unique' => false,
                            'showCharCount' => false,
                            'name' => 'ThreadSize2InMMDecimal',
                            'title' => 'Thread Size 2 (in & mm) Decimal',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => '',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          4 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                            'fieldtype' => 'numeric',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'double',
                            'columnType' => 'double',
                            'phpdocType' => 'float',
                            'integer' => false,
                            'unsigned' => false,
                            'minValue' => NULL,
                            'maxValue' => NULL,
                            'unique' => false,
                            'decimalSize' => NULL,
                            'decimalPrecision' => 3,
                            'name' => 'ThreadDashSize1',
                            'title' => 'Thread Dash Size 1',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => '',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          5 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                            'fieldtype' => 'numeric',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'double',
                            'columnType' => 'double',
                            'phpdocType' => 'float',
                            'integer' => false,
                            'unsigned' => true,
                            'minValue' => NULL,
                            'maxValue' => NULL,
                            'unique' => false,
                            'decimalSize' => NULL,
                            'decimalPrecision' => 3,
                            'name' => 'ThreadDashSize3',
                            'title' => 'Thread Dash Size 3',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => '',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                        ),
                        'locked' => false,
                      )),
                      1 =>
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                        'fieldtype' => 'fieldcontainer',
                        'labelWidth' => 200,
                        'layout' => 'vbox',
                        'fieldLabel' => '',
                        'name' => 'Field Container',
                        'type' => NULL,
                        'region' => NULL,
                        'title' => '',
                        'width' => NULL,
                        'height' => NULL,
                        'collapsible' => false,
                        'collapsed' => false,
                        'bodyStyle' => '',
                        'datatype' => 'layout',
                        'permissions' => NULL,
                        'childs' =>
                        array(
                          0 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                            'fieldtype' => 'input',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'varchar',
                            'columnType' => 'varchar',
                            'columnLength' => 150,
                            'phpdocType' => 'string',
                            'regex' => '',
                            'unique' => false,
                            'showCharCount' => false,
                            'name' => 'Thread2',
                            'title' => 'Thread 2',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => 'margin-left: 20px;',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          1 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                            'fieldtype' => 'input',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'varchar',
                            'columnType' => 'varchar',
                            'columnLength' => 150,
                            'phpdocType' => 'string',
                            'regex' => '',
                            'unique' => false,
                            'showCharCount' => false,
                            'name' => 'Thread4',
                            'title' => 'Thread 4',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => 'margin-left: 20px;',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          2 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                            'fieldtype' => 'input',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'varchar',
                            'columnType' => 'varchar',
                            'columnLength' => 190,
                            'phpdocType' => 'string',
                            'regex' => '',
                            'unique' => false,
                            'showCharCount' => false,
                            'name' => 'ThreadSize3InMMDecimal',
                            'title' => 'Thread Size 3 (in & mm) Decimal',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => 'margin-left: 20px;',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          3 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                            'fieldtype' => 'input',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'varchar',
                            'columnType' => 'varchar',
                            'columnLength' => 190,
                            'phpdocType' => 'string',
                            'regex' => '',
                            'unique' => false,
                            'showCharCount' => false,
                            'name' => 'ThreadSize4InMMDecimal',
                            'title' => 'Thread Size 4 (in & mm) Decimal',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => 'margin-left: 20px;',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          4 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                            'fieldtype' => 'numeric',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'double',
                            'columnType' => 'double',
                            'phpdocType' => 'float',
                            'integer' => false,
                            'unsigned' => true,
                            'minValue' => NULL,
                            'maxValue' => NULL,
                            'unique' => false,
                            'decimalSize' => NULL,
                            'decimalPrecision' => 3,
                            'name' => 'ThreadDashSize2',
                            'title' => 'Thread Dash Size 2',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => 'margin-left: 20px;',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          5 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                            'fieldtype' => 'numeric',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'double',
                            'columnType' => 'double',
                            'phpdocType' => 'float',
                            'integer' => false,
                            'unsigned' => true,
                            'minValue' => NULL,
                            'maxValue' => NULL,
                            'unique' => false,
                            'decimalSize' => NULL,
                            'decimalPrecision' => 3,
                            'name' => 'ThreadDashSize4',
                            'title' => 'Thread Dash Size 4',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => 'margin-left: 20px;',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                        ),
                        'locked' => false,
                      )),
                    ),
                    'locked' => false,
                  )),
                ),
                'locked' => false,
                'icon' => '',
              )),
              2 =>
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                'fieldtype' => 'panel',
                'labelWidth' => 100,
                'layout' => NULL,
                'border' => false,
                'name' => 'STEM',
                'type' => NULL,
                'region' => NULL,
                'title' => 'STEM',
                'width' => NULL,
                'height' => NULL,
                'collapsible' => false,
                'collapsed' => false,
                'bodyStyle' => '',
                'datatype' => 'layout',
                'permissions' => NULL,
                'childs' =>
                array(
                  0 =>
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                    'fieldtype' => 'fieldcontainer',
                    'labelWidth' => 100,
                    'layout' => 'hbox',
                    'fieldLabel' => '',
                    'name' => 'Field Container',
                    'type' => NULL,
                    'region' => NULL,
                    'title' => '',
                    'width' => NULL,
                    'height' => NULL,
                    'collapsible' => false,
                    'collapsed' => false,
                    'bodyStyle' => '',
                    'datatype' => 'layout',
                    'permissions' => NULL,
                    'childs' =>
                    array(
                      0 =>
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                        'fieldtype' => 'fieldcontainer',
                        'labelWidth' => 200,
                        'layout' => 'vbox',
                        'fieldLabel' => '',
                        'name' => 'Field Container',
                        'type' => NULL,
                        'region' => NULL,
                        'title' => '',
                        'width' => NULL,
                        'height' => NULL,
                        'collapsible' => false,
                        'collapsed' => false,
                        'bodyStyle' => '',
                        'datatype' => 'layout',
                        'permissions' => NULL,
                        'childs' =>
                        array(
                          0 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                            'fieldtype' => 'input',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'varchar',
                            'columnType' => 'varchar',
                            'columnLength' => 150,
                            'phpdocType' => 'string',
                            'regex' => '',
                            'unique' => false,
                            'showCharCount' => false,
                            'name' => 'StemComponentNumber',
                            'title' => 'Stem Component Number',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => '',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          1 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                            'fieldtype' => 'select',
                            'options' =>
                            array(
                              0 =>
                              array(
                                'key' => 'G 1/4-19A',
                                'value' => 'G 1/4-19A',
                              ),
                              1 =>
                              array(
                                'key' => 'G 3/8-19A',
                                'value' => 'G 3/8-19A',
                              ),
                              2 =>
                              array(
                                'key' => 'G 1/2-14A',
                                'value' => 'G 1/2-14A',
                              ),
                              3 =>
                              array(
                                'key' => 'G 5/8-14A',
                                'value' => 'G 5/8-14A',
                              ),
                              4 =>
                              array(
                                'key' => 'G 3/4-14A',
                                'value' => 'G 3/4-14A',
                              ),
                              5 =>
                              array(
                                'key' => 'G 1-11A',
                                'value' => 'G 1-11A',
                              ),
                              6 =>
                              array(
                                'key' => 'G 1 1/4-11A',
                                'value' => 'G 1 1/4-11A',
                              ),
                              7 =>
                              array(
                                'key' => 'G 1 1/2-11A',
                                'value' => 'G 1 1/2-11A',
                              ),
                              8 =>
                              array(
                                'key' => 'G 2-11A',
                                'value' => 'G 2-11A',
                              ),
                              9 =>
                              array(
                                'key' => '1/4-19 BSPT',
                                'value' => '1/4-19 BSPT',
                              ),
                              10 =>
                              array(
                                'key' => '3/8-19 BSPT',
                                'value' => '3/8-19 BSPT',
                              ),
                              11 =>
                              array(
                                'key' => '1/2-14 BSPT',
                                'value' => '1/2-14 BSPT',
                              ),
                              12 =>
                              array(
                                'key' => '3/4-14 BSPT',
                                'value' => '3/4-14 BSPT',
                              ),
                              13 =>
                              array(
                                'key' => '1-11 BSPT',
                                'value' => '1-11 BSPT',
                              ),
                              14 =>
                              array(
                                'key' => '7/16-20 UNF-2A',
                                'value' => '7/16-20 UNF-2A',
                              ),
                              15 =>
                              array(
                                'key' => '1/2-20 UNF-2A',
                                'value' => '1/2-20 UNF-2A',
                              ),
                              16 =>
                              array(
                                'key' => '9/16-18 UNF-2A',
                                'value' => '9/16-18 UNF-2A',
                              ),
                              17 =>
                              array(
                                'key' => '3/4-16 UNF-2A',
                                'value' => '3/4-16 UNF-2A',
                              ),
                              18 =>
                              array(
                                'key' => '7/8-14 UNF-2A',
                                'value' => '7/8-14 UNF-2A',
                              ),
                              19 =>
                              array(
                                'key' => '1-1/16-12 UN 2A',
                                'value' => '1-1/16-12 UN 2A',
                              ),
                              20 =>
                              array(
                                'key' => '1-5/16-12 UN 2A',
                                'value' => '1-5/16-12 UN 2A',
                              ),
                              21 =>
                              array(
                                'key' => 'M16 X 1.5',
                                'value' => 'M16 X 1.5',
                              ),
                              22 =>
                              array(
                                'key' => 'M18 X 1.5',
                                'value' => 'M18 X 1.5',
                              ),
                              23 =>
                              array(
                                'key' => 'M20 X 1.5',
                                'value' => 'M20 X 1.5',
                              ),
                              24 =>
                              array(
                                'key' => 'M22 X 1.5',
                                'value' => 'M22 X 1.5',
                              ),
                              25 =>
                              array(
                                'key' => 'M24 X 1.5',
                                'value' => 'M24 X 1.5',
                              ),
                              26 =>
                              array(
                                'key' => 'M30 X 2.0',
                                'value' => 'M30 X 2.0',
                              ),
                              27 =>
                              array(
                                'key' => 'M36 X 2.0',
                                'value' => 'M36 X 2.0',
                              ),
                              28 =>
                              array(
                                'key' => 'M42 X 2.0',
                                'value' => 'M42 X 2.0',
                              ),
                              29 =>
                              array(
                                'key' => 'M52 X 2.0',
                                'value' => 'M52 X 2.0',
                              ),
                              30 =>
                              array(
                                'key' => 'M12 X 1.5',
                                'value' => 'M12 X 1.5',
                              ),
                              31 =>
                              array(
                                'key' => 'M14 X 1.5',
                                'value' => 'M14 X 1.5',
                              ),
                              32 =>
                              array(
                                'key' => 'M26 X 1.5',
                                'value' => 'M26 X 1.5',
                              ),
                              33 =>
                              array(
                                'key' => '1/2-27 UNS -2B',
                                'value' => '1/2-27 UNS -2B',
                              ),
                              34 =>
                              array(
                                'key' => '3.5 TPI ACME 2G',
                                'value' => '3.5 TPI ACME 2G',
                              ),
                              35 =>
                              array(
                                'key' => '3 TPI ACME 2G',
                                'value' => '3 TPI ACME 2G',
                              ),
                              36 =>
                              array(
                                'key' => '7/8-14 UN-2A',
                                'value' => '7/8-14 UN-2A',
                              ),
                              37 =>
                              array(
                                'key' => '1-1/16-12 UN-2A',
                                'value' => '1-1/16-12 UN-2A',
                              ),
                              38 =>
                              array(
                                'key' => '1-3/16-12 UN-2A',
                                'value' => '1-3/16-12 UN-2A',
                              ),
                              39 =>
                              array(
                                'key' => '1-5/16-12 UN-2A',
                                'value' => '1-5/16-12 UN-2A',
                              ),
                              40 =>
                              array(
                                'key' => '1-5/8-12 UN-2A',
                                'value' => '1-5/8-12 UN-2A',
                              ),
                              41 =>
                              array(
                                'key' => '1-7/8-12 UN-2A',
                                'value' => '1-7/8-12 UN-2A',
                              ),
                              42 =>
                              array(
                                'key' => '2-1/2-12 UN-2A',
                                'value' => '2-1/2-12 UN-2A',
                              ),
                              43 =>
                              array(
                                'key' => '1/8-27 NPTF CLASS 2 PLUG',
                                'value' => '1/8-27 NPTF CLASS 2 PLUG',
                              ),
                              44 =>
                              array(
                                'key' => '1/4-18 NPTF CLASS 2 PLUG',
                                'value' => '1/4-18 NPTF CLASS 2 PLUG',
                              ),
                              45 =>
                              array(
                                'key' => '3/8-18 NPTF CLASS 2',
                                'value' => '3/8-18 NPTF CLASS 2',
                              ),
                              46 =>
                              array(
                                'key' => '3/8-18 NPTF CLASS 2 PLUG',
                                'value' => '3/8-18 NPTF CLASS 2 PLUG',
                              ),
                              47 =>
                              array(
                                'key' => '1/2-14 NPTF CLASS 2 PLUG',
                                'value' => '1/2-14 NPTF CLASS 2 PLUG',
                              ),
                              48 =>
                              array(
                                'key' => '3/4-14 NPTF CLASS 2 PLUG',
                                'value' => '3/4-14 NPTF CLASS 2 PLUG',
                              ),
                              49 =>
                              array(
                                'key' => '1-11-1/2 NPTF CLASS 2',
                                'value' => '1-11-1/2 NPTF CLASS 2',
                              ),
                              50 =>
                              array(
                                'key' => '1/8-27 NPTF CLASS 2',
                                'value' => '1/8-27 NPTF CLASS 2',
                              ),
                              51 =>
                              array(
                                'key' => '1/4-18 NPTF CLASS 2',
                                'value' => '1/4-18 NPTF CLASS 2',
                              ),
                              52 =>
                              array(
                                'key' => '1/2-14 NPTF CLASS 2',
                                'value' => '1/2-14 NPTF CLASS 2',
                              ),
                              53 =>
                              array(
                                'key' => '3/4-14 NPTF CLASS 2',
                                'value' => '3/4-14 NPTF CLASS 2',
                              ),
                              54 =>
                              array(
                                'key' => '1-1/4-11-1/2 NPTF CLASS 2',
                                'value' => '1-1/4-11-1/2 NPTF CLASS 2',
                              ),
                              55 =>
                              array(
                                'key' => '1-1/2-11-1/2 NPTF CLASS 2',
                                'value' => '1-1/2-11-1/2 NPTF CLASS 2',
                              ),
                              56 =>
                              array(
                                'key' => '2-11-1/2 NPTF CLASS 2',
                                'value' => '2-11-1/2 NPTF CLASS 2',
                              ),
                              57 =>
                              array(
                                'key' => '1-1/2 11-1/2 API API5B',
                                'value' => '1-1/2 11-1/2 API API5B',
                              ),
                              58 =>
                              array(
                                'key' => '2-11-1/2 API API5B',
                                'value' => '2-11-1/2 API API5B',
                              ),
                              59 =>
                              array(
                                'key' => '1-1/6-12 UN-2A',
                                'value' => '1-1/6-12 UN-2A',
                              ),
                              60 =>
                              array(
                                'key' => '11/16-16 UN-2A',
                                'value' => '11/16-16 UN-2A',
                              ),
                              61 =>
                              array(
                                'key' => '13/16-16 UN-2A',
                                'value' => '13/16-16 UN-2A',
                              ),
                              62 =>
                              array(
                                'key' => '1-14 UNS-2A',
                                'value' => '1-14 UNS-2A',
                              ),
                              63 =>
                              array(
                                'key' => '1-7/16-12 UN-2A',
                                'value' => '1-7/16-12 UN-2A',
                              ),
                              64 =>
                              array(
                                'key' => '1-11/16-12 UN-2A',
                                'value' => '1-11/16-12 UN-2A',
                              ),
                              65 =>
                              array(
                                'key' => '5/8-18 UNF-2A',
                                'value' => '5/8-18 UNF-2A',
                              ),
                              66 =>
                              array(
                                'key' => '1-1/16-14 UN-2A',
                                'value' => '1-1/16-14 UN-2A',
                              ),
                              67 =>
                              array(
                                'key' => '1-11-1/2 API API5B',
                                'value' => '1-11-1/2 API API5B',
                              ),
                              68 =>
                              array(
                                'key' => '1-1/4 11-1/2 API API5B',
                                'value' => '1-1/4 11-1/2 API API5B',
                              ),
                              69 =>
                              array(
                                'key' => '3-11-1/2 API API5B',
                                'value' => '3-11-1/2 API API5B',
                              ),
                              70 =>
                              array(
                                'key' => '1 1/16 - 12 UNC-2A',
                                'value' => '1 1/16 - 12 UNC-2A',
                              ),
                              71 =>
                              array(
                                'key' => '1 5/16 - 12 UNC-2A',
                                'value' => '1 5/16 - 12 UNC-2A',
                              ),
                              72 =>
                              array(
                                'key' => '1-11 1/2 NPTF CLASS 2',
                                'value' => '1-11 1/2 NPTF CLASS 2',
                              ),
                              73 =>
                              array(
                                'key' => '1 1/4-11 1/2 NPTF CLASS 2',
                                'value' => '1 1/4-11 1/2 NPTF CLASS 2',
                              ),
                              74 =>
                              array(
                                'key' => '2-11 1/2 NPTF CLASS 2',
                                'value' => '2-11 1/2 NPTF CLASS 2',
                              ),
                              75 =>
                              array(
                                'key' => 'G 1-1/4-11A',
                                'value' => 'G 1-1/4-11A',
                              ),
                              76 =>
                              array(
                                'key' => 'G 1-1/2-11A',
                                'value' => 'G 1-1/2-11A',
                              ),
                              77 =>
                              array(
                                'key' => '2-11 BSPT',
                                'value' => '2-11 BSPT',
                              ),
                              78 =>
                              array(
                                'key' => '2-11 1/2 NPTF',
                                'value' => '2-11 1/2 NPTF',
                              ),
                              79 =>
                              array(
                                'key' => '2-12 UN-2A',
                                'value' => '2-12 UN-2A',
                              ),
                              80 =>
                              array(
                                'key' => '?',
                                'value' => '?',
                              ),
                              81 =>
                              array(
                                'key' => '1/8-27 NPSM External 1/4-28 UNF Internal',
                                'value' => '1/8-27 NPSM External 1/4-28 UNF Internal',
                              ),
                              82 =>
                              array(
                                'key' => '1-18 UN-2A',
                                'value' => '1-18 UN-2A',
                              ),
                            ),
                            'width' => 200,
                            'defaultValue' => '',
                            'optionsProviderClass' => '',
                            'optionsProviderData' => '',
                            'queryColumnType' => 'varchar',
                            'columnType' => 'varchar',
                            'columnLength' => 150,
                            'phpdocType' => 'string',
                            'dynamicOptions' => false,
                            'name' => 'StemComponentThreadType',
                            'title' => 'Stem Component Thread Type',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => '',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          2 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                            'fieldtype' => 'numeric',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'double',
                            'columnType' => 'double',
                            'phpdocType' => 'float',
                            'integer' => false,
                            'unsigned' => false,
                            'minValue' => NULL,
                            'maxValue' => NULL,
                            'unique' => false,
                            'decimalSize' => NULL,
                            'decimalPrecision' => NULL,
                            'name' => 'StemHexinchDecimal',
                            'title' => 'Stem Hex inch Decimal',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => '',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          3 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                            'fieldtype' => 'input',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'varchar',
                            'columnType' => 'varchar',
                            'columnLength' => 150,
                            'phpdocType' => 'string',
                            'regex' => '',
                            'unique' => false,
                            'showCharCount' => false,
                            'name' => 'StemHexMM',
                            'title' => 'Stem Hex mm',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => '',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          4 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Date::__set_state(array(
                            'fieldtype' => 'date',
                            'queryColumnType' => 'bigint(20)',
                            'columnType' => 'bigint(20)',
                            'phpdocType' => '\\Carbon\\Carbon',
                            'defaultValue' => NULL,
                            'useCurrentDate' => false,
                            'name' => 'StemRevDate',
                            'title' => 'Stem Rev Date',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => '',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                        ),
                        'locked' => false,
                      )),
                      1 =>
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                        'fieldtype' => 'fieldcontainer',
                        'labelWidth' => 200,
                        'layout' => 'vbox',
                        'fieldLabel' => '',
                        'name' => 'Field Container',
                        'type' => NULL,
                        'region' => NULL,
                        'title' => '',
                        'width' => NULL,
                        'height' => NULL,
                        'collapsible' => false,
                        'collapsed' => false,
                        'bodyStyle' => '',
                        'datatype' => 'layout',
                        'permissions' => NULL,
                        'childs' =>
                        array(
                          0 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                            'fieldtype' => 'input',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'varchar',
                            'columnType' => 'varchar',
                            'columnLength' => 150,
                            'phpdocType' => 'string',
                            'regex' => '',
                            'unique' => false,
                            'showCharCount' => false,
                            'name' => 'StemComponentSAPNumber',
                            'title' => 'Stem Component SAP Number',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => 'margin-left: 20px;',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          1 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                            'fieldtype' => 'multiselect',
                            'options' =>
                            array(
                              0 =>
                              array(
                                'key' => 'Experimental',
                                'value' => 'Experimental',
                              ),
                              1 =>
                              array(
                                'key' => 'V1',
                                'value' => 'V1',
                              ),
                              2 =>
                              array(
                                'key' => 'V2',
                                'value' => 'V2',
                              ),
                              3 =>
                              array(
                                'key' => 'V3',
                                'value' => 'V3',
                              ),
                              4 =>
                              array(
                                'key' => 'V4',
                                'value' => 'V4',
                              ),
                              5 =>
                              array(
                                'key' => 'V5',
                                'value' => 'V5',
                              ),
                              6 =>
                              array(
                                'key' => 'V6',
                                'value' => 'V6',
                              ),
                              7 =>
                              array(
                                'key' => 'V7',
                                'value' => 'V7',
                              ),
                              8 =>
                              array(
                                'key' => 'V8',
                                'value' => 'V8',
                              ),
                              9 =>
                              array(
                                'key' => 'V9',
                                'value' => 'V9',
                              ),
                            ),
                            'width' => 200,
                            'height' => '',
                            'maxItems' => '',
                            'renderType' => 'tags',
                            'optionsProviderClass' => '',
                            'optionsProviderData' => '',
                            'queryColumnType' => 'text',
                            'columnType' => 'text',
                            'phpdocType' => 'array',
                            'dynamicOptions' => false,
                            'name' => 'StemComponentVendor',
                            'title' => 'Stem Component Vendor',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => 'margin-left: 20px;',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                          )),
                          2 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                            'fieldtype' => 'input',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'varchar',
                            'columnType' => 'varchar',
                            'columnLength' => 150,
                            'phpdocType' => 'string',
                            'regex' => '',
                            'unique' => false,
                            'showCharCount' => false,
                            'name' => 'StemHexinchFraction',
                            'title' => 'Stem Hex inch Fraction',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => 'margin-left: 20px;',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          3 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                            'fieldtype' => 'select',
                            'options' =>
                            array(
                              0 =>
                              array(
                                'key' => '1215, 1045',
                                'value' => '1215, 1045',
                              ),
                              1 =>
                              array(
                                'key' => '316 STAINLESS',
                                'value' => '316 STAINLESS',
                              ),
                              2 =>
                              array(
                                'key' => '316 Stainless',
                                'value' => '316 Stainless',
                              ),
                              3 =>
                              array(
                                'key' => '4140',
                                'value' => '4140',
                              ),
                              4 =>
                              array(
                                'key' => '316',
                                'value' => '316',
                              ),
                              5 =>
                              array(
                                'key' => '1045, 1215',
                                'value' => '1045, 1215',
                              ),
                              6 =>
                              array(
                                'key' => '340 Brass',
                                'value' => '340 Brass',
                              ),
                              7 =>
                              array(
                                'key' => '360 BRASS',
                                'value' => '360 BRASS',
                              ),
                            ),
                            'width' => 200,
                            'defaultValue' => '',
                            'optionsProviderClass' => '',
                            'optionsProviderData' => '',
                            'queryColumnType' => 'varchar',
                            'columnType' => 'varchar',
                            'columnLength' => 150,
                            'phpdocType' => 'string',
                            'dynamicOptions' => false,
                            'name' => 'StemMaterial',
                            'title' => 'Stem Material',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => 'margin-left: 20px;',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          4 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                            'fieldtype' => 'input',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'varchar',
                            'columnType' => 'varchar',
                            'columnLength' => 150,
                            'phpdocType' => 'string',
                            'regex' => '',
                            'unique' => false,
                            'showCharCount' => false,
                            'name' => 'StemRevisionNumber',
                            'title' => 'Stem Revision Number',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => 'margin-left: 20px;',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                        ),
                        'locked' => false,
                      )),
                    ),
                    'locked' => false,
                  )),
                ),
                'locked' => false,
                'icon' => '',
              )),
              3 =>
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                'fieldtype' => 'panel',
                'labelWidth' => 100,
                'layout' => NULL,
                'border' => false,
                'name' => 'FERRULE',
                'type' => NULL,
                'region' => NULL,
                'title' => 'FERRULE',
                'width' => NULL,
                'height' => NULL,
                'collapsible' => false,
                'collapsed' => false,
                'bodyStyle' => '',
                'datatype' => 'layout',
                'permissions' => NULL,
                'childs' =>
                array(
                  0 =>
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                    'fieldtype' => 'fieldcontainer',
                    'labelWidth' => 100,
                    'layout' => 'hbox',
                    'fieldLabel' => '',
                    'name' => 'Field Container',
                    'type' => NULL,
                    'region' => NULL,
                    'title' => '',
                    'width' => NULL,
                    'height' => NULL,
                    'collapsible' => false,
                    'collapsed' => false,
                    'bodyStyle' => '',
                    'datatype' => 'layout',
                    'permissions' => NULL,
                    'childs' =>
                    array(
                      0 =>
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                        'fieldtype' => 'fieldcontainer',
                        'labelWidth' => 200,
                        'layout' => 'vbox',
                        'fieldLabel' => '',
                        'name' => 'Field Container',
                        'type' => NULL,
                        'region' => NULL,
                        'title' => '',
                        'width' => NULL,
                        'height' => NULL,
                        'collapsible' => false,
                        'collapsed' => false,
                        'bodyStyle' => '',
                        'datatype' => 'layout',
                        'permissions' => NULL,
                        'childs' =>
                        array(
                          0 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                            'fieldtype' => 'input',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'varchar',
                            'columnType' => 'varchar',
                            'columnLength' => 150,
                            'phpdocType' => 'string',
                            'regex' => '',
                            'unique' => false,
                            'showCharCount' => false,
                            'name' => 'FerruleComponentNumber',
                            'title' => 'Ferrule Component Number',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => '',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          1 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                            'fieldtype' => 'multiselect',
                            'options' =>
                            array(
                              0 =>
                              array(
                                'key' => 'Experimental',
                                'value' => 'Experimental',
                              ),
                              1 =>
                              array(
                                'key' => 'V1',
                                'value' => 'V1',
                              ),
                              2 =>
                              array(
                                'key' => 'V2',
                                'value' => 'V2',
                              ),
                              3 =>
                              array(
                                'key' => 'V3',
                                'value' => 'V3',
                              ),
                              4 =>
                              array(
                                'key' => 'V4',
                                'value' => 'V4',
                              ),
                              5 =>
                              array(
                                'key' => 'V5',
                                'value' => 'V5',
                              ),
                              6 =>
                              array(
                                'key' => 'V6',
                                'value' => 'V6',
                              ),
                              7 =>
                              array(
                                'key' => 'V7',
                                'value' => 'V7',
                              ),
                              8 =>
                              array(
                                'key' => 'V8',
                                'value' => 'V8',
                              ),
                              9 =>
                              array(
                                'key' => 'V9',
                                'value' => 'V9',
                              ),
                            ),
                            'width' => 200,
                            'height' => '',
                            'maxItems' => '',
                            'renderType' => 'tags',
                            'optionsProviderClass' => '',
                            'optionsProviderData' => '',
                            'queryColumnType' => 'text',
                            'columnType' => 'text',
                            'phpdocType' => 'array',
                            'dynamicOptions' => false,
                            'name' => 'FerruleComponentVendor',
                            'title' => 'Ferrule Component Vendor',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => '',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                          )),
                          2 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                            'fieldtype' => 'select',
                            'options' =>
                            array(
                              0 =>
                              array(
                                'key' => '1215, 1020',
                                'value' => '1215, 1020',
                              ),
                              1 =>
                              array(
                                'key' => '316L STAINLESS',
                                'value' => '316L STAINLESS',
                              ),
                              2 =>
                              array(
                                'key' => '316L STAINLESS STEEL',
                                'value' => '316L STAINLESS STEEL',
                              ),
                              3 =>
                              array(
                                'key' => '316L Stainless Steel',
                                'value' => '316L Stainless Steel',
                              ),
                              4 =>
                              array(
                                'key' => '316L',
                                'value' => '316L',
                              ),
                              5 =>
                              array(
                                'key' => '1215, 102',
                                'value' => '1215, 102',
                              ),
                              6 =>
                              array(
                                'key' => '340 Brass',
                                'value' => '340 Brass',
                              ),
                              7 =>
                              array(
                                'key' => '1215, 1045',
                                'value' => '1215, 1045',
                              ),
                              8 =>
                              array(
                                'key' => '316 Stainless Steel',
                                'value' => '316 Stainless Steel',
                              ),
                              9 =>
                              array(
                                'key' => '',
                                'value' => '',
                              ),
                            ),
                            'width' => 200,
                            'defaultValue' => '',
                            'optionsProviderClass' => '',
                            'optionsProviderData' => '',
                            'queryColumnType' => 'varchar',
                            'columnType' => 'varchar',
                            'columnLength' => 150,
                            'phpdocType' => 'string',
                            'dynamicOptions' => false,
                            'name' => 'FerruleMaterial',
                            'title' => 'Ferrule Material',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => '',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          3 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                            'fieldtype' => 'numeric',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'double',
                            'columnType' => 'double',
                            'phpdocType' => 'float',
                            'integer' => false,
                            'unsigned' => true,
                            'minValue' => NULL,
                            'maxValue' => NULL,
                            'unique' => false,
                            'decimalSize' => NULL,
                            'decimalPrecision' => NULL,
                            'name' => 'FerruleIDInDec',
                            'title' => 'Ferrule ID (in) Dec.',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => '',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          4 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                            'fieldtype' => 'numeric',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'double',
                            'columnType' => 'double',
                            'phpdocType' => 'float',
                            'integer' => false,
                            'unsigned' => true,
                            'minValue' => NULL,
                            'maxValue' => NULL,
                            'unique' => false,
                            'decimalSize' => NULL,
                            'decimalPrecision' => NULL,
                            'name' => 'FerruleODInDec',
                            'title' => 'Ferrule OD (in) Dec.',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => '',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          5 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                            'fieldtype' => 'numeric',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'double',
                            'columnType' => 'double',
                            'phpdocType' => 'float',
                            'integer' => false,
                            'unsigned' => true,
                            'minValue' => NULL,
                            'maxValue' => NULL,
                            'unique' => false,
                            'decimalSize' => NULL,
                            'decimalPrecision' => NULL,
                            'name' => 'FerruleLengthInDec',
                            'title' => 'Ferrule Length (in) Dec.',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => '',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          6 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Date::__set_state(array(
                            'fieldtype' => 'date',
                            'queryColumnType' => 'bigint(20)',
                            'columnType' => 'bigint(20)',
                            'phpdocType' => '\\Carbon\\Carbon',
                            'defaultValue' => NULL,
                            'useCurrentDate' => false,
                            'name' => 'FerruleRevDate',
                            'title' => 'Ferrule Rev Date',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => '',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                        ),
                        'locked' => false,
                      )),
                      1 =>
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                        'fieldtype' => 'fieldcontainer',
                        'labelWidth' => 200,
                        'layout' => 'vbox',
                        'fieldLabel' => '',
                        'name' => 'Field Container',
                        'type' => NULL,
                        'region' => NULL,
                        'title' => '',
                        'width' => NULL,
                        'height' => NULL,
                        'collapsible' => false,
                        'collapsed' => false,
                        'bodyStyle' => '',
                        'datatype' => 'layout',
                        'permissions' => NULL,
                        'childs' =>
                        array(
                          0 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                            'fieldtype' => 'input',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'varchar',
                            'columnType' => 'varchar',
                            'columnLength' => 150,
                            'phpdocType' => 'string',
                            'regex' => '',
                            'unique' => false,
                            'showCharCount' => false,
                            'name' => 'FerruleComponentSAPNumber',
                            'title' => 'Ferrule Component SAP Number',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => 'margin-left: 20px;',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          1 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                            'fieldtype' => 'input',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'varchar',
                            'columnType' => 'varchar',
                            'columnLength' => 150,
                            'phpdocType' => 'string',
                            'regex' => '',
                            'unique' => false,
                            'showCharCount' => false,
                            'name' => 'FerruleRevisionNumber',
                            'title' => 'Ferrule Revision Number',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => 'margin-left: 20px;',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          2 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                            'fieldtype' => 'numeric',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'double',
                            'columnType' => 'double',
                            'phpdocType' => 'float',
                            'integer' => false,
                            'unsigned' => false,
                            'minValue' => NULL,
                            'maxValue' => NULL,
                            'unique' => false,
                            'decimalSize' => NULL,
                            'decimalPrecision' => NULL,
                            'name' => 'FerruleIDMM',
                            'title' => 'Ferrule ID (mm)',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => 'margin-left: 20px;',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          3 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                            'fieldtype' => 'numeric',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'double',
                            'columnType' => 'double',
                            'phpdocType' => 'float',
                            'integer' => false,
                            'unsigned' => false,
                            'minValue' => NULL,
                            'maxValue' => NULL,
                            'unique' => false,
                            'decimalSize' => NULL,
                            'decimalPrecision' => NULL,
                            'name' => 'FerruleODMM',
                            'title' => 'Ferrule OD (mm)',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => 'margin-left: 20px;',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          4 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                            'fieldtype' => 'numeric',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'double',
                            'columnType' => 'double',
                            'phpdocType' => 'float',
                            'integer' => false,
                            'unsigned' => false,
                            'minValue' => NULL,
                            'maxValue' => NULL,
                            'unique' => false,
                            'decimalSize' => NULL,
                            'decimalPrecision' => NULL,
                            'name' => 'FerruleLengthMM',
                            'title' => 'Ferrule Length (mm)',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => 'margin-left: 20px;',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                        ),
                        'locked' => false,
                      )),
                    ),
                    'locked' => false,
                  )),
                ),
                'locked' => false,
                'icon' => '',
              )),
              4 =>
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                'fieldtype' => 'panel',
                'labelWidth' => 100,
                'layout' => NULL,
                'border' => false,
                'name' => 'SWIVEL NUT',
                'type' => NULL,
                'region' => NULL,
                'title' => 'SWIVEL NUT',
                'width' => NULL,
                'height' => NULL,
                'collapsible' => false,
                'collapsed' => false,
                'bodyStyle' => 'margin-left:20px;',
                'datatype' => 'layout',
                'permissions' => NULL,
                'childs' =>
                array(
                  0 =>
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                    'fieldtype' => 'fieldcontainer',
                    'labelWidth' => 100,
                    'layout' => 'hbox',
                    'fieldLabel' => '',
                    'name' => 'Field Container',
                    'type' => NULL,
                    'region' => NULL,
                    'title' => '',
                    'width' => NULL,
                    'height' => NULL,
                    'collapsible' => false,
                    'collapsed' => false,
                    'bodyStyle' => '',
                    'datatype' => 'layout',
                    'permissions' => NULL,
                    'childs' =>
                    array(
                      0 =>
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                        'fieldtype' => 'fieldcontainer',
                        'labelWidth' => 200,
                        'layout' => 'vbox',
                        'fieldLabel' => '',
                        'name' => 'Field Container',
                        'type' => NULL,
                        'region' => NULL,
                        'title' => '',
                        'width' => NULL,
                        'height' => NULL,
                        'collapsible' => false,
                        'collapsed' => false,
                        'bodyStyle' => '',
                        'datatype' => 'layout',
                        'permissions' => NULL,
                        'childs' =>
                        array(
                          0 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                            'fieldtype' => 'input',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'varchar',
                            'columnType' => 'varchar',
                            'columnLength' => 150,
                            'phpdocType' => 'string',
                            'regex' => '',
                            'unique' => false,
                            'showCharCount' => false,
                            'name' => 'SwivelNutComponentNumber',
                            'title' => 'Swivel Nut Component Number',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => '',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          1 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                            'fieldtype' => 'select',
                            'options' =>
                            array(
                              0 =>
                              array(
                                'key' => 'G 3/8-19',
                                'value' => 'G 3/8-19',
                              ),
                              1 =>
                              array(
                                'key' => 'G 1/2-14',
                                'value' => 'G 1/2-14',
                              ),
                              2 =>
                              array(
                                'key' => 'G 3/4-14',
                                'value' => 'G 3/4-14',
                              ),
                              3 =>
                              array(
                                'key' => 'G 1/4-19',
                                'value' => 'G 1/4-19',
                              ),
                              4 =>
                              array(
                                'key' => 'G 5/8-14',
                                'value' => 'G 5/8-14',
                              ),
                              5 =>
                              array(
                                'key' => 'G 1-11',
                                'value' => 'G 1-11',
                              ),
                              6 =>
                              array(
                                'key' => 'G 1-1/4-11',
                                'value' => 'G 1-1/4-11',
                              ),
                              7 =>
                              array(
                                'key' => 'G 1-1/2-11',
                                'value' => 'G 1-1/2-11',
                              ),
                              8 =>
                              array(
                                'key' => 'G 2-11',
                                'value' => 'G 2-11',
                              ),
                              9 =>
                              array(
                                'key' => 'M16 X 1.5',
                                'value' => 'M16 X 1.5',
                              ),
                              10 =>
                              array(
                                'key' => 'M18 X 1.5',
                                'value' => 'M18 X 1.5',
                              ),
                              11 =>
                              array(
                                'key' => 'M20 X 1.5',
                                'value' => 'M20 X 1.5',
                              ),
                              12 =>
                              array(
                                'key' => 'M22 X 1.5',
                                'value' => 'M22 X 1.5',
                              ),
                              13 =>
                              array(
                                'key' => 'M24 X 1.5',
                                'value' => 'M24 X 1.5',
                              ),
                              14 =>
                              array(
                                'key' => 'M30 X 2.0',
                                'value' => 'M30 X 2.0',
                              ),
                              15 =>
                              array(
                                'key' => 'M36 X 2.0',
                                'value' => 'M36 X 2.0',
                              ),
                              16 =>
                              array(
                                'key' => 'M42 X 2.0',
                                'value' => 'M42 X 2.0',
                              ),
                              17 =>
                              array(
                                'key' => 'M52 X 2.0',
                                'value' => 'M52 X 2.0',
                              ),
                              18 =>
                              array(
                                'key' => 'M12 X 1.5',
                                'value' => 'M12 X 1.5',
                              ),
                              19 =>
                              array(
                                'key' => 'M14 X 1.5',
                                'value' => 'M14 X 1.5',
                              ),
                              20 =>
                              array(
                                'key' => 'M26 X 1.5',
                                'value' => 'M26 X 1.5',
                              ),
                              21 =>
                              array(
                                'key' => 'M45 X 2.0',
                                'value' => 'M45 X 2.0',
                              ),
                              22 =>
                              array(
                                'key' => '7/16-20 UNF 2B',
                                'value' => '7/16-20 UNF 2B',
                              ),
                              23 =>
                              array(
                                'key' => '3/8-24 UNF 2B',
                                'value' => '3/8-24 UNF 2B',
                              ),
                              24 =>
                              array(
                                'key' => '1/2-20 UNF 2B',
                                'value' => '1/2-20 UNF 2B',
                              ),
                              25 =>
                              array(
                                'key' => '9/16-18 UNF 2B',
                                'value' => '9/16-18 UNF 2B',
                              ),
                              26 =>
                              array(
                                'key' => '3/4-16 UNF 2B',
                                'value' => '3/4-16 UNF 2B',
                              ),
                              27 =>
                              array(
                                'key' => '7/8-14 UNF 2B',
                                'value' => '7/8-14 UNF 2B',
                              ),
                              28 =>
                              array(
                                'key' => '1-1/16-12 UN 2B',
                                'value' => '1-1/16-12 UN 2B',
                              ),
                              29 =>
                              array(
                                'key' => '1-5/16-12 UN 2B',
                                'value' => '1-5/16-12 UN 2B',
                              ),
                              30 =>
                              array(
                                'key' => '1-3/16-12 UN 2B',
                                'value' => '1-3/16-12 UN 2B',
                              ),
                              31 =>
                              array(
                                'key' => '1-5/8-12 UN 2B',
                                'value' => '1-5/8-12 UN 2B',
                              ),
                              32 =>
                              array(
                                'key' => '1-7/8-12 UN 2B',
                                'value' => '1-7/8-12 UN 2B',
                              ),
                              33 =>
                              array(
                                'key' => '2-1/2-12 UN 2B',
                                'value' => '2-1/2-12 UN 2B',
                              ),
                              34 =>
                              array(
                                'key' => 'G 1 1/4-11',
                                'value' => 'G 1 1/4-11',
                              ),
                              35 =>
                              array(
                                'key' => 'M30 X 1.5',
                                'value' => 'M30 X 1.5',
                              ),
                              36 =>
                              array(
                                'key' => 'M33 X 1.5',
                                'value' => 'M33 X 1.5',
                              ),
                              37 =>
                              array(
                                'key' => 'M36 X 1.5',
                                'value' => 'M36 X 1.5',
                              ),
                              38 =>
                              array(
                                'key' => 'M42 X 1.5',
                                'value' => 'M42 X 1.5',
                              ),
                              39 =>
                              array(
                                'key' => '1/4-18 NPFT CLASS 2',
                                'value' => '1/4-18 NPFT CLASS 2',
                              ),
                              40 =>
                              array(
                                'key' => '3/8-18 NPTF CLASS 2',
                                'value' => '3/8-18 NPTF CLASS 2',
                              ),
                              41 =>
                              array(
                                'key' => '1-11 1/2 NPTF CLASS 2',
                                'value' => '1-11 1/2 NPTF CLASS 2',
                              ),
                              42 =>
                              array(
                                'key' => '1/8-27 NPTF CLASS 2',
                                'value' => '1/8-27 NPTF CLASS 2',
                              ),
                              43 =>
                              array(
                                'key' => '1/4-18 NPTF CLASS 2',
                                'value' => '1/4-18 NPTF CLASS 2',
                              ),
                              44 =>
                              array(
                                'key' => '1/2-14 NPTF CLASS 2',
                                'value' => '1/2-14 NPTF CLASS 2',
                              ),
                              45 =>
                              array(
                                'key' => '3/4-14 NPTF CLASS 2',
                                'value' => '3/4-14 NPTF CLASS 2',
                              ),
                              46 =>
                              array(
                                'key' => '1/8-27 NPSM',
                                'value' => '1/8-27 NPSM',
                              ),
                              47 =>
                              array(
                                'key' => '1/4-18 NPSM',
                                'value' => '1/4-18 NPSM',
                              ),
                              48 =>
                              array(
                                'key' => '3/8-18 NPSM',
                                'value' => '3/8-18 NPSM',
                              ),
                              49 =>
                              array(
                                'key' => '1/2-14 NPSM',
                                'value' => '1/2-14 NPSM',
                              ),
                              50 =>
                              array(
                                'key' => '1/2-14 NPSM THREAD',
                                'value' => '1/2-14 NPSM THREAD',
                              ),
                              51 =>
                              array(
                                'key' => '3/4-14 NPSM',
                                'value' => '3/4-14 NPSM',
                              ),
                              52 =>
                              array(
                                'key' => '1-11 1/2 NPSM',
                                'value' => '1-11 1/2 NPSM',
                              ),
                              53 =>
                              array(
                                'key' => '1 1/4-11 1/2 NPSM',
                                'value' => '1 1/4-11 1/2 NPSM',
                              ),
                              54 =>
                              array(
                                'key' => '7/16-20 UNF 2A',
                                'value' => '7/16-20 UNF 2A',
                              ),
                              55 =>
                              array(
                                'key' => '9/16-18 UNF 2A',
                                'value' => '9/16-18 UNF 2A',
                              ),
                              56 =>
                              array(
                                'key' => '3/4-16 UNF 2A',
                                'value' => '3/4-16 UNF 2A',
                              ),
                              57 =>
                              array(
                                'key' => '7/8-14 UNF 2A',
                                'value' => '7/8-14 UNF 2A',
                              ),
                              58 =>
                              array(
                                'key' => '1-1/16-12 UN 2A',
                                'value' => '1-1/16-12 UN 2A',
                              ),
                              59 =>
                              array(
                                'key' => '9/16-18 UNF-2A',
                                'value' => '9/16-18 UNF-2A',
                              ),
                              60 =>
                              array(
                                'key' => '1/2-20 UNF 2A',
                                'value' => '1/2-20 UNF 2A',
                              ),
                              61 =>
                              array(
                                'key' => '11/16-16 UN 2B',
                                'value' => '11/16-16 UN 2B',
                              ),
                              62 =>
                              array(
                                'key' => '13/16-16 UN 2B',
                                'value' => '13/16-16 UN 2B',
                              ),
                              63 =>
                              array(
                                'key' => '1-14 UNS 2B',
                                'value' => '1-14 UNS 2B',
                              ),
                              64 =>
                              array(
                                'key' => '1-7/16-12 UN 2B',
                                'value' => '1-7/16-12 UN 2B',
                              ),
                              65 =>
                              array(
                                'key' => '1-11/16-12 UN 2B',
                                'value' => '1-11/16-12 UN 2B',
                              ),
                              66 =>
                              array(
                                'key' => '2-12 UN 2B',
                                'value' => '2-12 UN 2B',
                              ),
                              67 =>
                              array(
                                'key' => '9/16-24 UNEF 2B',
                                'value' => '9/16-24 UNEF 2B',
                              ),
                              68 =>
                              array(
                                'key' => '5/8-18 UNF 2B',
                                'value' => '5/8-18 UNF 2B',
                              ),
                              69 =>
                              array(
                                'key' => '1-1/16-14 UNS 2B',
                                'value' => '1-1/16-14 UNS 2B',
                              ),
                              70 =>
                              array(
                                'key' => '3/8-24 2A THREAD',
                                'value' => '3/8-24 2A THREAD',
                              ),
                              71 =>
                              array(
                                'key' => '7/16-24 2A THREAD',
                                'value' => '7/16-24 2A THREAD',
                              ),
                              72 =>
                              array(
                                'key' => '1/2-20 2A THREAD',
                                'value' => '1/2-20 2A THREAD',
                              ),
                              73 =>
                              array(
                                'key' => '5/8-18 2A THREAD',
                                'value' => '5/8-18 2A THREAD',
                              ),
                              74 =>
                              array(
                                'key' => '11/16-18 2A THREAD',
                                'value' => '11/16-18 2A THREAD',
                              ),
                              75 =>
                              array(
                                'key' => '3/4-18 2A THREAD',
                                'value' => '3/4-18 2A THREAD',
                              ),
                              76 =>
                              array(
                                'key' => '7/8-18 2A THREAD',
                                'value' => '7/8-18 2A THREAD',
                              ),
                              77 =>
                              array(
                                'key' => '2-11 UN 2B',
                                'value' => '2-11 UN 2B',
                              ),
                              78 =>
                              array(
                                'key' => '7/8-16 UNF 2B',
                                'value' => '7/8-16 UNF 2B',
                              ),
                              79 =>
                              array(
                                'key' => '9/16-20 UNF 2B',
                                'value' => '9/16-20 UNF 2B',
                              ),
                              80 =>
                              array(
                                'key' => '5/8-16 UNF 2B',
                                'value' => '5/8-16 UNF 2B',
                              ),
                              81 =>
                              array(
                                'key' => 'G1-1/2-11',
                                'value' => 'G1-1/2-11',
                              ),
                              82 =>
                              array(
                                'key' => '2-12 UN-2B',
                                'value' => '2-12 UN-2B',
                              ),
                            ),
                            'width' => 200,
                            'defaultValue' => '',
                            'optionsProviderClass' => '',
                            'optionsProviderData' => '',
                            'queryColumnType' => 'varchar',
                            'columnType' => 'varchar',
                            'columnLength' => 150,
                            'phpdocType' => 'string',
                            'dynamicOptions' => false,
                            'name' => 'SwivelNutComponentThreadType',
                            'title' => 'Swivel Nut Component Thread Type',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => '',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          2 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                            'fieldtype' => 'input',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'varchar',
                            'columnType' => 'varchar',
                            'columnLength' => 150,
                            'phpdocType' => 'string',
                            'regex' => '',
                            'unique' => false,
                            'showCharCount' => false,
                            'name' => 'SwivelNutHexinchFraction',
                            'title' => 'Swivel Nut Hex inch Fraction',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => '',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          3 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                            'fieldtype' => 'select',
                            'options' =>
                            array(
                              0 =>
                              array(
                                'key' => '22 MM HEX',
                                'value' => '22 MM HEX',
                              ),
                              1 =>
                              array(
                                'key' => '27 MM HEX',
                                'value' => '27 MM HEX',
                              ),
                              2 =>
                              array(
                                'key' => '32 MM HEX',
                                'value' => '32 MM HEX',
                              ),
                              3 =>
                              array(
                                'key' => '19 MM HEX',
                                'value' => '19 MM HEX',
                              ),
                              4 =>
                              array(
                                'key' => '38 MM HEX',
                                'value' => '38 MM HEX',
                              ),
                              5 =>
                              array(
                                'key' => '50 MM HEX',
                                'value' => '50 MM HEX',
                              ),
                              6 =>
                              array(
                                'key' => '55 MM HEX',
                                'value' => '55 MM HEX',
                              ),
                              7 =>
                              array(
                                'key' => '70 MM HEX',
                                'value' => '70 MM HEX',
                              ),
                              8 =>
                              array(
                                'key' => '24 MM HEX',
                                'value' => '24 MM HEX',
                              ),
                              9 =>
                              array(
                                'key' => '30 MM HEX',
                                'value' => '30 MM HEX',
                              ),
                              10 =>
                              array(
                                'key' => '36 MM HEX',
                                'value' => '36 MM HEX',
                              ),
                              11 =>
                              array(
                                'key' => '46 MM HEX',
                                'value' => '46 MM HEX',
                              ),
                              12 =>
                              array(
                                'key' => '60 MM HEX',
                                'value' => '60 MM HEX',
                              ),
                              13 =>
                              array(
                                'key' => '14 MM HEX',
                                'value' => '14 MM HEX',
                              ),
                              14 =>
                              array(
                                'key' => '17 MM HEX',
                                'value' => '17 MM HEX',
                              ),
                              15 =>
                              array(
                                'key' => '1215',
                                'value' => '1215',
                              ),
                              16 =>
                              array(
                                'key' => '19 MM',
                                'value' => '19 MM',
                              ),
                              17 =>
                              array(
                                'key' => '27 MM HEX STAINLESS',
                                'value' => '27 MM HEX STAINLESS',
                              ),
                              18 =>
                              array(
                                'key' => '41 MM HEX',
                                'value' => '41 MM HEX',
                              ),
                              19 =>
                              array(
                                'key' => '5/8 HEX',
                                'value' => '5/8 HEX',
                              ),
                              20 =>
                              array(
                                'key' => '5/8 HEX STAINLESS STEEL',
                                'value' => '5/8 HEX STAINLESS STEEL',
                              ),
                              21 =>
                              array(
                                'key' => '19 MM HEX STAINLESS STEEL',
                                'value' => '19 MM HEX STAINLESS STEEL',
                              ),
                              22 =>
                              array(
                                'key' => '25 MM HEX',
                                'value' => '25 MM HEX',
                              ),
                              23 =>
                              array(
                                'key' => '25 MM HEX STAINLESS STEEL',
                                'value' => '25 MM HEX STAINLESS STEEL',
                              ),
                              24 =>
                              array(
                                'key' => '27 MM HEX STAINLESS STEEL',
                                'value' => '27 MM HEX STAINLESS STEEL',
                              ),
                              25 =>
                              array(
                                'key' => '32 MM HEX STAINLESS STEEL',
                                'value' => '32 MM HEX STAINLESS STEEL',
                              ),
                              26 =>
                              array(
                                'key' => '38 MM HEX STAINLESS STEEL',
                                'value' => '38 MM HEX STAINLESS STEEL',
                              ),
                              27 =>
                              array(
                                'key' => '50 MM HEX STAINLESS STEEL',
                                'value' => '50 MM HEX STAINLESS STEEL',
                              ),
                              28 =>
                              array(
                                'key' => '55 MM HEX STAINLESS STEEL',
                                'value' => '55 MM HEX STAINLESS STEEL',
                              ),
                              29 =>
                              array(
                                'key' => '75 MM HEX',
                                'value' => '75 MM HEX',
                              ),
                              30 =>
                              array(
                                'key' => '70 MM HEX STAINLESS STEEL',
                                'value' => '70 MM HEX STAINLESS STEEL',
                              ),
                              31 =>
                              array(
                                'key' => '75MM HEX 1045',
                                'value' => ' 1215',
                              ),
                              32 =>
                              array(
                                'key' => '16 MM HEX',
                                'value' => '16 MM HEX',
                              ),
                              33 =>
                              array(
                                'key' => '17 MM HEX STANLESS STEEL',
                                'value' => '17 MM HEX STANLESS STEEL',
                              ),
                              34 =>
                              array(
                                'key' => '22 MM HEX STAINLESS STEEL',
                                'value' => '22 MM HEX STAINLESS STEEL',
                              ),
                              35 =>
                              array(
                                'key' => '41 MM HEX STAINLESS STEEL',
                                'value' => '41 MM HEX STAINLESS STEEL',
                              ),
                              36 =>
                              array(
                                'key' => '22 HEX',
                                'value' => '22 HEX',
                              ),
                              37 =>
                              array(
                                'key' => '17MM',
                                'value' => '17MM',
                              ),
                              38 =>
                              array(
                                'key' => '22MM',
                                'value' => '22MM',
                              ),
                              39 =>
                              array(
                                'key' => '25MM',
                                'value' => '25MM',
                              ),
                              40 =>
                              array(
                                'key' => '32MM',
                                'value' => '32MM',
                              ),
                              41 =>
                              array(
                                'key' => '58 MM HEX',
                                'value' => '58 MM HEX',
                              ),
                              42 =>
                              array(
                                'key' => '14 HEX',
                                'value' => '14 HEX',
                              ),
                              43 =>
                              array(
                                'key' => '24 HEX',
                                'value' => '24 HEX',
                              ),
                              44 =>
                              array(
                                'key' => '44 MM HEX',
                                'value' => '44 MM HEX',
                              ),
                              45 =>
                              array(
                                'key' => '55MM HEX',
                                'value' => '55MM HEX',
                              ),
                              46 =>
                              array(
                                'key' => '30MM HEX',
                                'value' => '30MM HEX',
                              ),
                              47 =>
                              array(
                                'key' => '60MM HEX',
                                'value' => '60MM HEX',
                              ),
                              48 =>
                              array(
                                'key' => '46 MM HEX STAINLESS STEEL',
                                'value' => '46 MM HEX STAINLESS STEEL',
                              ),
                              49 =>
                              array(
                                'key' => '22MM HEX',
                                'value' => '22MM HEX',
                              ),
                              50 =>
                              array(
                                'key' => '9/16 HEX',
                                'value' => '9/16 HEX',
                              ),
                              51 =>
                              array(
                                'key' => '24 MM HEX STAINLESS STEEL',
                                'value' => '24 MM HEX STAINLESS STEEL',
                              ),
                              52 =>
                              array(
                                'key' => '60 MM HEX STAINLESS STEEL',
                                'value' => '60 MM HEX STAINLESS STEEL',
                              ),
                              53 =>
                              array(
                                'key' => '17.4 MM HEX',
                                'value' => '17.4 MM HEX',
                              ),
                              54 =>
                              array(
                                'key' => '22.2 MM HEX',
                                'value' => '22.2 MM HEX',
                              ),
                              55 =>
                              array(
                                'key' => '15/16 HEX',
                                'value' => '15/16 HEX',
                              ),
                            ),
                            'width' => 200,
                            'defaultValue' => '',
                            'optionsProviderClass' => '',
                            'optionsProviderData' => '',
                            'queryColumnType' => 'varchar',
                            'columnType' => 'varchar',
                            'columnLength' => 150,
                            'phpdocType' => 'string',
                            'dynamicOptions' => false,
                            'name' => 'SwivelNutMaterial',
                            'title' => 'Swivel Nut Material',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => '',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          4 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                            'fieldtype' => 'input',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'varchar',
                            'columnType' => 'varchar',
                            'columnLength' => 150,
                            'phpdocType' => 'string',
                            'regex' => '',
                            'unique' => false,
                            'showCharCount' => false,
                            'name' => 'SwivelNutRevisionNumber',
                            'title' => 'Swivel Nut Revision Number',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => '',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                        ),
                        'locked' => false,
                      )),
                      1 =>
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                        'fieldtype' => 'fieldcontainer',
                        'labelWidth' => 200,
                        'layout' => 'vbox',
                        'fieldLabel' => '',
                        'name' => 'Field Container',
                        'type' => NULL,
                        'region' => NULL,
                        'title' => '',
                        'width' => NULL,
                        'height' => NULL,
                        'collapsible' => false,
                        'collapsed' => false,
                        'bodyStyle' => '',
                        'datatype' => 'layout',
                        'permissions' => NULL,
                        'childs' =>
                        array(
                          0 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                            'fieldtype' => 'input',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'varchar',
                            'columnType' => 'varchar',
                            'columnLength' => 150,
                            'phpdocType' => 'string',
                            'regex' => '',
                            'unique' => false,
                            'showCharCount' => false,
                            'name' => 'SwivelNutComponentSAPNumber',
                            'title' => 'Swivel Nut Component SAP Number',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => 'margin-left:20px;',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          1 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                            'fieldtype' => 'multiselect',
                            'options' =>
                            array(
                              0 =>
                              array(
                                'key' => 'Experimental',
                                'value' => 'Experimental',
                              ),
                              1 =>
                              array(
                                'key' => 'V1',
                                'value' => 'V1',
                              ),
                              2 =>
                              array(
                                'key' => 'V2',
                                'value' => 'V2',
                              ),
                              3 =>
                              array(
                                'key' => 'V3',
                                'value' => 'V3',
                              ),
                              4 =>
                              array(
                                'key' => 'V4',
                                'value' => 'V4',
                              ),
                              5 =>
                              array(
                                'key' => 'V5',
                                'value' => 'V5',
                              ),
                              6 =>
                              array(
                                'key' => 'V6',
                                'value' => 'V6',
                              ),
                              7 =>
                              array(
                                'key' => 'V7',
                                'value' => 'V7',
                              ),
                              8 =>
                              array(
                                'key' => 'V8',
                                'value' => 'V8',
                              ),
                              9 =>
                              array(
                                'key' => 'V9',
                                'value' => 'V9',
                              ),
                            ),
                            'width' => 200,
                            'height' => '',
                            'maxItems' => '',
                            'renderType' => 'tags',
                            'optionsProviderClass' => '',
                            'optionsProviderData' => '',
                            'queryColumnType' => 'text',
                            'columnType' => 'text',
                            'phpdocType' => 'array',
                            'dynamicOptions' => false,
                            'name' => 'SwivelNutComponentVendor',
                            'title' => 'Swivel Nut Component Vendor',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => 'margin-left:20px;',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                          )),
                          2 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                            'fieldtype' => 'numeric',
                            'width' => 200,
                            'defaultValue' => NULL,
                            'queryColumnType' => 'double',
                            'columnType' => 'double',
                            'phpdocType' => 'float',
                            'integer' => false,
                            'unsigned' => false,
                            'minValue' => NULL,
                            'maxValue' => NULL,
                            'unique' => false,
                            'decimalSize' => NULL,
                            'decimalPrecision' => NULL,
                            'name' => 'SwivelNutinchDecimal',
                            'title' => 'Swivel Nut inch Decimal',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => 'margin-left:20px;',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                          3 =>
                          Pimcore\Model\DataObject\ClassDefinition\Data\Date::__set_state(array(
                            'fieldtype' => 'date',
                            'queryColumnType' => 'bigint(20)',
                            'columnType' => 'bigint(20)',
                            'phpdocType' => '\\Carbon\\Carbon',
                            'defaultValue' => NULL,
                            'useCurrentDate' => false,
                            'name' => 'SwivelNutRevDate',
                            'title' => 'Swivel Nut Rev Date',
                            'tooltip' => '',
                            'mandatory' => false,
                            'noteditable' => false,
                            'index' => false,
                            'locked' => false,
                            'style' => 'margin-left:20px;',
                            'permissions' => NULL,
                            'datatype' => 'data',
                            'relationType' => false,
                            'invisible' => false,
                            'visibleGridView' => false,
                            'visibleSearch' => false,
                            'defaultValueGenerator' => '',
                          )),
                        ),
                        'locked' => false,
                      )),
                    ),
                    'locked' => false,
                  )),
                ),
                'locked' => false,
                'icon' => '',
              )),
              5 =>
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                'fieldtype' => 'panel',
                'labelWidth' => 200,
                'layout' => NULL,
                'border' => false,
                'name' => 'THRUST WIRE',
                'type' => NULL,
                'region' => NULL,
                'title' => 'THRUST WIRE',
                'width' => NULL,
                'height' => NULL,
                'collapsible' => false,
                'collapsed' => false,
                'bodyStyle' => '',
                'datatype' => 'layout',
                'permissions' => NULL,
                'childs' =>
                array(
                  0 =>
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                    'fieldtype' => 'input',
                    'width' => 200,
                    'defaultValue' => NULL,
                    'queryColumnType' => 'varchar',
                    'columnType' => 'varchar',
                    'columnLength' => 150,
                    'phpdocType' => 'string',
                    'regex' => '',
                    'unique' => false,
                    'showCharCount' => false,
                    'name' => 'ThrustWireComponentNumber',
                    'title' => 'Thrust Wire Component Number',
                    'tooltip' => '',
                    'mandatory' => false,
                    'noteditable' => false,
                    'index' => false,
                    'locked' => false,
                    'style' => '',
                    'permissions' => NULL,
                    'datatype' => 'data',
                    'relationType' => false,
                    'invisible' => false,
                    'visibleGridView' => false,
                    'visibleSearch' => false,
                    'defaultValueGenerator' => '',
                  )),
                  1 =>
                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                    'fieldtype' => 'select',
                    'options' =>
                    array(
                      0 =>
                      array(
                        'key' => '304 STAINLESS STEEL',
                        'value' => '304 STAINLESS STEEL',
                      ),
                    ),
                    'width' => 200,
                    'defaultValue' => '',
                    'optionsProviderClass' => '',
                    'optionsProviderData' => '',
                    'queryColumnType' => 'varchar',
                    'columnType' => 'varchar',
                    'columnLength' => 150,
                    'phpdocType' => 'string',
                    'dynamicOptions' => false,
                    'name' => 'ThrustWireMaterial',
                    'title' => 'Thrust Wire Material',
                    'tooltip' => '',
                    'mandatory' => false,
                    'noteditable' => false,
                    'index' => false,
                    'locked' => false,
                    'style' => '',
                    'permissions' => NULL,
                    'datatype' => 'data',
                    'relationType' => false,
                    'invisible' => false,
                    'visibleGridView' => false,
                    'visibleSearch' => false,
                    'defaultValueGenerator' => '',
                  )),
                  2 =>
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                    'fieldtype' => 'input',
                    'width' => 200,
                    'defaultValue' => NULL,
                    'queryColumnType' => 'varchar',
                    'columnType' => 'varchar',
                    'columnLength' => 150,
                    'phpdocType' => 'string',
                    'regex' => '',
                    'unique' => false,
                    'showCharCount' => false,
                    'name' => 'ThrustWireRevisionNumber',
                    'title' => 'Thrust Wire Revision Number',
                    'tooltip' => '',
                    'mandatory' => false,
                    'noteditable' => false,
                    'index' => false,
                    'locked' => false,
                    'style' => '',
                    'permissions' => NULL,
                    'datatype' => 'data',
                    'relationType' => false,
                    'invisible' => false,
                    'visibleGridView' => false,
                    'visibleSearch' => false,
                    'defaultValueGenerator' => '',
                  )),
                ),
                'locked' => false,
                'icon' => '',
              )),
              6 =>
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                'fieldtype' => 'panel',
                'labelWidth' => 200,
                'layout' => NULL,
                'border' => false,
                'name' => 'O-RING',
                'type' => NULL,
                'region' => NULL,
                'title' => 'O-RING',
                'width' => NULL,
                'height' => NULL,
                'collapsible' => false,
                'collapsed' => false,
                'bodyStyle' => '',
                'datatype' => 'layout',
                'permissions' => NULL,
                'childs' =>
                array(
                  0 =>
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                    'fieldtype' => 'fieldset',
                    'labelWidth' => 100,
                    'name' => 'Layout',
                    'type' => NULL,
                    'region' => NULL,
                    'title' => 'O-RING',
                    'width' => NULL,
                    'height' => NULL,
                    'collapsible' => true,
                    'collapsed' => false,
                    'bodyStyle' => '',
                    'datatype' => 'layout',
                    'permissions' => NULL,
                    'childs' =>
                    array(
                      0 =>
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                        'fieldtype' => 'fieldcontainer',
                        'labelWidth' => 100,
                        'layout' => 'hbox',
                        'fieldLabel' => '',
                        'name' => 'Field Container',
                        'type' => NULL,
                        'region' => NULL,
                        'title' => '',
                        'width' => NULL,
                        'height' => NULL,
                        'collapsible' => false,
                        'collapsed' => false,
                        'bodyStyle' => '',
                        'datatype' => 'layout',
                        'permissions' => NULL,
                        'childs' =>
                        array(
                          0 =>
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                            'fieldtype' => 'fieldcontainer',
                            'labelWidth' => 200,
                            'layout' => 'vbox',
                            'fieldLabel' => '',
                            'name' => 'Field Container',
                            'type' => NULL,
                            'region' => NULL,
                            'title' => '',
                            'width' => NULL,
                            'height' => NULL,
                            'collapsible' => false,
                            'collapsed' => false,
                            'bodyStyle' => '',
                            'datatype' => 'layout',
                            'permissions' => NULL,
                            'childs' =>
                            array(
                              0 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'ORingBOMSAPNumber',
                                'title' => 'O-Ring BOM SAP Number',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              1 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'ORingComponentSAPNumber',
                                'title' => 'O-Ring Component SAP Number',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              2 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                'fieldtype' => 'select',
                                'options' =>
                                array(
                                  0 =>
                                  array(
                                    'key' => 'NBR',
                                    'value' => 'NBR',
                                  ),
                                ),
                                'width' => 200,
                                'defaultValue' => '',
                                'optionsProviderClass' => '',
                                'optionsProviderData' => '',
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'dynamicOptions' => false,
                                'name' => 'ORingMaterial',
                                'title' => 'O-Ring Material',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              3 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                'fieldtype' => 'numeric',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'double',
                                'columnType' => 'double',
                                'phpdocType' => 'float',
                                'integer' => false,
                                'unsigned' => false,
                                'minValue' => NULL,
                                'maxValue' => NULL,
                                'unique' => false,
                                'decimalSize' => NULL,
                                'decimalPrecision' => NULL,
                                'name' => 'ORingIDInDec',
                                'title' => 'O-Ring ID (in) Dec.',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              4 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                'fieldtype' => 'numeric',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'double',
                                'columnType' => 'double',
                                'phpdocType' => 'float',
                                'integer' => false,
                                'unsigned' => false,
                                'minValue' => NULL,
                                'maxValue' => NULL,
                                'unique' => false,
                                'decimalSize' => NULL,
                                'decimalPrecision' => NULL,
                                'name' => 'ORingThicknessInDec',
                                'title' => 'O-Ring Thickness (in) Dec.',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                            ),
                            'locked' => false,
                          )),
                          1 =>
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                            'fieldtype' => 'fieldcontainer',
                            'labelWidth' => 200,
                            'layout' => 'vbox',
                            'fieldLabel' => '',
                            'name' => 'Field Container',
                            'type' => NULL,
                            'region' => NULL,
                            'title' => '',
                            'width' => NULL,
                            'height' => NULL,
                            'collapsible' => false,
                            'collapsed' => false,
                            'bodyStyle' => '',
                            'datatype' => 'layout',
                            'permissions' => NULL,
                            'childs' =>
                            array(
                              0 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'ORingComponentNumber',
                                'title' => 'O-Ring Component Number',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left:20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              1 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                                'fieldtype' => 'multiselect',
                                'options' =>
                                array(
                                  0 =>
                                  array(
                                    'key' => 'Parker',
                                    'value' => 'Parker',
                                  ),
                                  1 =>
                                  array(
                                    'key' => 'NOK',
                                    'value' => 'NOK',
                                  ),
                                  2 =>
                                  array(
                                    'key' => 'Dichtomatic',
                                    'value' => 'Dichtomatic',
                                  ),
                                  3 =>
                                  array(
                                    'key' => 'Sterling Seal',
                                    'value' => 'Sterling Seal',
                                  ),
                                ),
                                'width' => 200,
                                'height' => '',
                                'maxItems' => '',
                                'renderType' => 'tags',
                                'optionsProviderClass' => '',
                                'optionsProviderData' => '',
                                'queryColumnType' => 'text',
                                'columnType' => 'text',
                                'phpdocType' => 'array',
                                'dynamicOptions' => false,
                                'name' => 'ORingComponentVendor',
                                'title' => 'O-Ring Component Vendor',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left:20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                              )),
                              2 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'ORingRevisionNumber',
                                'title' => 'O-Ring Revision Number',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left:20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              3 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                'fieldtype' => 'numeric',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'double',
                                'columnType' => 'double',
                                'phpdocType' => 'float',
                                'integer' => false,
                                'unsigned' => false,
                                'minValue' => NULL,
                                'maxValue' => NULL,
                                'unique' => false,
                                'decimalSize' => NULL,
                                'decimalPrecision' => NULL,
                                'name' => 'ORingIDMM',
                                'title' => 'O-Ring ID (mm)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left:20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              4 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                'fieldtype' => 'numeric',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'double',
                                'columnType' => 'double',
                                'phpdocType' => 'float',
                                'integer' => false,
                                'unsigned' => false,
                                'minValue' => NULL,
                                'maxValue' => NULL,
                                'unique' => false,
                                'decimalSize' => NULL,
                                'decimalPrecision' => NULL,
                                'name' => 'ORingThicknessMM',
                                'title' => 'O-Ring Thickness (mm)',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left:20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                            ),
                            'locked' => false,
                          )),
                        ),
                        'locked' => false,
                      )),
                    ),
                    'locked' => false,
                  )),
                  1 =>
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                    'fieldtype' => 'fieldset',
                    'labelWidth' => 200,
                    'name' => 'Layout',
                    'type' => NULL,
                    'region' => NULL,
                    'title' => 'INTERNAL O-RING',
                    'width' => NULL,
                    'height' => NULL,
                    'collapsible' => true,
                    'collapsed' => false,
                    'bodyStyle' => '',
                    'datatype' => 'layout',
                    'permissions' => NULL,
                    'childs' =>
                    array(
                      0 =>
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                        'fieldtype' => 'fieldcontainer',
                        'labelWidth' => 100,
                        'layout' => 'hbox',
                        'fieldLabel' => '',
                        'name' => 'Field Container',
                        'type' => NULL,
                        'region' => NULL,
                        'title' => '',
                        'width' => NULL,
                        'height' => NULL,
                        'collapsible' => false,
                        'collapsed' => false,
                        'bodyStyle' => '',
                        'datatype' => 'layout',
                        'permissions' => NULL,
                        'childs' =>
                        array(
                          0 =>
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                            'fieldtype' => 'fieldcontainer',
                            'labelWidth' => 200,
                            'layout' => 'vbox',
                            'fieldLabel' => '',
                            'name' => 'Field Container',
                            'type' => NULL,
                            'region' => NULL,
                            'title' => '',
                            'width' => NULL,
                            'height' => NULL,
                            'collapsible' => false,
                            'collapsed' => false,
                            'bodyStyle' => '',
                            'datatype' => 'layout',
                            'permissions' => NULL,
                            'childs' =>
                            array(
                              0 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'InternalORingComponentNumber',
                                'title' => 'Internal O-Ring Component Number',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              1 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'InternalORingSAPNumber',
                                'title' => 'Internal O-Ring SAP Number',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                            ),
                            'locked' => false,
                          )),
                          1 =>
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                            'fieldtype' => 'fieldcontainer',
                            'labelWidth' => 200,
                            'layout' => 'vbox',
                            'fieldLabel' => '',
                            'name' => 'Field Container',
                            'type' => NULL,
                            'region' => NULL,
                            'title' => '',
                            'width' => NULL,
                            'height' => NULL,
                            'collapsible' => false,
                            'collapsed' => false,
                            'bodyStyle' => '',
                            'datatype' => 'layout',
                            'permissions' => NULL,
                            'childs' =>
                            array(
                              0 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'InternalORingRev',
                                'title' => 'Internal O-Ring Rev',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left:20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              1 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                                'fieldtype' => 'multiselect',
                                'options' =>
                                array(
                                  0 =>
                                  array(
                                    'key' => 'Parker',
                                    'value' => 'Parker',
                                  ),
                                  1 =>
                                  array(
                                    'key' => 'NOK',
                                    'value' => 'NOK',
                                  ),
                                  2 =>
                                  array(
                                    'key' => 'Dichtomatic',
                                    'value' => 'Dichtomatic',
                                  ),
                                  3 =>
                                  array(
                                    'key' => 'Sterling Seal',
                                    'value' => 'Sterling Seal',
                                  ),
                                ),
                                'width' => 200,
                                'height' => '',
                                'maxItems' => '',
                                'renderType' => 'tags',
                                'optionsProviderClass' => '',
                                'optionsProviderData' => '',
                                'queryColumnType' => 'text',
                                'columnType' => 'text',
                                'phpdocType' => 'array',
                                'dynamicOptions' => false,
                                'name' => 'InternalORingVendor',
                                'title' => 'Internal O-Ring Vendor',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left:20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                              )),
                            ),
                            'locked' => false,
                          )),
                        ),
                        'locked' => false,
                      )),
                    ),
                    'locked' => false,
                  )),
                  2 =>
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                    'fieldtype' => 'fieldset',
                    'labelWidth' => 200,
                    'name' => 'Layout',
                    'type' => NULL,
                    'region' => NULL,
                    'title' => 'BACK-UP O-RING',
                    'width' => NULL,
                    'height' => NULL,
                    'collapsible' => true,
                    'collapsed' => false,
                    'bodyStyle' => '',
                    'datatype' => 'layout',
                    'permissions' => NULL,
                    'childs' =>
                    array(
                      0 =>
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                        'fieldtype' => 'fieldcontainer',
                        'labelWidth' => 100,
                        'layout' => 'hbox',
                        'fieldLabel' => '',
                        'name' => 'Field Container',
                        'type' => NULL,
                        'region' => NULL,
                        'title' => '',
                        'width' => NULL,
                        'height' => NULL,
                        'collapsible' => false,
                        'collapsed' => false,
                        'bodyStyle' => '',
                        'datatype' => 'layout',
                        'permissions' => NULL,
                        'childs' =>
                        array(
                          0 =>
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                            'fieldtype' => 'fieldcontainer',
                            'labelWidth' => 200,
                            'layout' => 'vbox',
                            'fieldLabel' => '',
                            'name' => 'Field Container',
                            'type' => NULL,
                            'region' => NULL,
                            'title' => '',
                            'width' => NULL,
                            'height' => NULL,
                            'collapsible' => false,
                            'collapsed' => false,
                            'bodyStyle' => '',
                            'datatype' => 'layout',
                            'permissions' => NULL,
                            'childs' =>
                            array(
                              0 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                                'fieldtype' => 'multiselect',
                                'options' =>
                                array(
                                  0 =>
                                  array(
                                    'key' => 'Parker',
                                    'value' => 'Parker',
                                  ),
                                  1 =>
                                  array(
                                    'key' => 'NOK',
                                    'value' => 'NOK',
                                  ),
                                  2 =>
                                  array(
                                    'key' => 'Dichtomatic',
                                    'value' => 'Dichtomatic',
                                  ),
                                  3 =>
                                  array(
                                    'key' => 'Sterling Seal',
                                    'value' => 'Sterling Seal',
                                  ),
                                ),
                                'width' => 200,
                                'height' => '',
                                'maxItems' => '',
                                'renderType' => 'tags',
                                'optionsProviderClass' => '',
                                'optionsProviderData' => '',
                                'queryColumnType' => 'text',
                                'columnType' => 'text',
                                'phpdocType' => 'array',
                                'dynamicOptions' => false,
                                'name' => 'BackUpORingComponentVendor',
                                'title' => 'Back Up O-Ring Component Vendor',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                              )),
                              1 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                'fieldtype' => 'select',
                                'options' =>
                                array(
                                  0 =>
                                  array(
                                    'key' => 'Teflon',
                                    'value' => 'Teflon',
                                  ),
                                ),
                                'width' => 200,
                                'defaultValue' => '',
                                'optionsProviderClass' => '',
                                'optionsProviderData' => '',
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'dynamicOptions' => false,
                                'name' => 'BackUpORingMaterial',
                                'title' => 'Back Up O-Ring Material',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              2 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'BackUpORingSAPNumber',
                                'title' => 'Back Up O-Ring SAP Number',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => '',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                            ),
                            'locked' => false,
                          )),
                          1 =>
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                            'fieldtype' => 'fieldcontainer',
                            'labelWidth' => 200,
                            'layout' => 'vbox',
                            'fieldLabel' => '',
                            'name' => 'Field Container',
                            'type' => NULL,
                            'region' => NULL,
                            'title' => '',
                            'width' => NULL,
                            'height' => NULL,
                            'collapsible' => false,
                            'collapsed' => false,
                            'bodyStyle' => '',
                            'datatype' => 'layout',
                            'permissions' => NULL,
                            'childs' =>
                            array(
                              0 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'BackUpORingComponentNumber',
                                'title' => 'Back Up O-Ring Component Number',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left:20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                              1 =>
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                'fieldtype' => 'input',
                                'width' => 200,
                                'defaultValue' => NULL,
                                'queryColumnType' => 'varchar',
                                'columnType' => 'varchar',
                                'columnLength' => 150,
                                'phpdocType' => 'string',
                                'regex' => '',
                                'unique' => false,
                                'showCharCount' => false,
                                'name' => 'BackUpORingRevisionNumber',
                                'title' => 'Back Up O-Ring Revision Number',
                                'tooltip' => '',
                                'mandatory' => false,
                                'noteditable' => false,
                                'index' => false,
                                'locked' => false,
                                'style' => 'margin-left:20px;',
                                'permissions' => NULL,
                                'datatype' => 'data',
                                'relationType' => false,
                                'invisible' => false,
                                'visibleGridView' => false,
                                'visibleSearch' => false,
                                'defaultValueGenerator' => '',
                              )),
                            ),
                            'locked' => false,
                          )),
                        ),
                        'locked' => false,
                      )),
                    ),
                    'locked' => false,
                  )),
                ),
                'locked' => false,
                'icon' => '',
              )),
              7 =>
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                'fieldtype' => 'panel',
                'labelWidth' => 200,
                'layout' => NULL,
                'border' => false,
                'name' => 'SLIP NUT RETAINING RING',
                'type' => NULL,
                'region' => NULL,
                'title' => 'SLIP NUT RETAINING RING',
                'width' => NULL,
                'height' => NULL,
                'collapsible' => false,
                'collapsed' => false,
                'bodyStyle' => '',
                'datatype' => 'layout',
                'permissions' => NULL,
                'childs' =>
                array(
                  0 =>
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                    'fieldtype' => 'input',
                    'width' => 200,
                    'defaultValue' => NULL,
                    'queryColumnType' => 'varchar',
                    'columnType' => 'varchar',
                    'columnLength' => 150,
                    'phpdocType' => 'string',
                    'regex' => '',
                    'unique' => false,
                    'showCharCount' => false,
                    'name' => 'SlipNutRetainingRingComponentNumber',
                    'title' => 'Slip Nut Retaining Ring Component Number',
                    'tooltip' => '',
                    'mandatory' => false,
                    'noteditable' => false,
                    'index' => false,
                    'locked' => false,
                    'style' => '',
                    'permissions' => NULL,
                    'datatype' => 'data',
                    'relationType' => false,
                    'invisible' => false,
                    'visibleGridView' => false,
                    'visibleSearch' => false,
                    'defaultValueGenerator' => '',
                  )),
                  1 =>
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                    'fieldtype' => 'multiselect',
                    'options' =>
                    array(
                      0 =>
                      array(
                        'key' => 'MICROPLASTICS',
                        'value' => 'MICROPLASTICS',
                      ),
                      1 =>
                      array(
                        'key' => '',
                        'value' => '',
                      ),
                    ),
                    'width' => 200,
                    'height' => '',
                    'maxItems' => '',
                    'renderType' => 'tags',
                    'optionsProviderClass' => '',
                    'optionsProviderData' => '',
                    'queryColumnType' => 'text',
                    'columnType' => 'text',
                    'phpdocType' => 'array',
                    'dynamicOptions' => false,
                    'name' => 'SlipNutRetainingRingComponentVendor',
                    'title' => 'Slip Nut Retaining Ring Component Vendor',
                    'tooltip' => '',
                    'mandatory' => false,
                    'noteditable' => false,
                    'index' => false,
                    'locked' => false,
                    'style' => '',
                    'permissions' => NULL,
                    'datatype' => 'data',
                    'relationType' => false,
                    'invisible' => false,
                    'visibleGridView' => false,
                    'visibleSearch' => false,
                  )),
                  2 =>
                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                    'fieldtype' => 'select',
                    'options' =>
                    array(
                      0 =>
                      array(
                        'key' => 'HS NYLON 6 NATURAL',
                        'value' => 'HS NYLON 6 NATURAL',
                      ),
                    ),
                    'width' => 200,
                    'defaultValue' => '',
                    'optionsProviderClass' => '',
                    'optionsProviderData' => '',
                    'queryColumnType' => 'varchar',
                    'columnType' => 'varchar',
                    'columnLength' => 150,
                    'phpdocType' => 'string',
                    'dynamicOptions' => false,
                    'name' => 'SlipNutRetainingRingMaterial',
                    'title' => 'SlipNutRetainingRing Material',
                    'tooltip' => '',
                    'mandatory' => false,
                    'noteditable' => false,
                    'index' => false,
                    'locked' => false,
                    'style' => '',
                    'permissions' => NULL,
                    'datatype' => 'data',
                    'relationType' => false,
                    'invisible' => false,
                    'visibleGridView' => false,
                    'visibleSearch' => false,
                    'defaultValueGenerator' => '',
                  )),
                  3 =>
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                    'fieldtype' => 'input',
                    'width' => 200,
                    'defaultValue' => NULL,
                    'queryColumnType' => 'varchar',
                    'columnType' => 'varchar',
                    'columnLength' => 150,
                    'phpdocType' => 'string',
                    'regex' => '',
                    'unique' => false,
                    'showCharCount' => false,
                    'name' => 'SlipNutRetainingRingSAPComponentNumber',
                    'title' => 'Slip Nut Retaining Ring SAP Component Number',
                    'tooltip' => '',
                    'mandatory' => false,
                    'noteditable' => false,
                    'index' => false,
                    'locked' => false,
                    'style' => '',
                    'permissions' => NULL,
                    'datatype' => 'data',
                    'relationType' => false,
                    'invisible' => false,
                    'visibleGridView' => false,
                    'visibleSearch' => false,
                    'defaultValueGenerator' => '',
                  )),
                  4 =>
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                    'fieldtype' => 'input',
                    'width' => 200,
                    'defaultValue' => NULL,
                    'queryColumnType' => 'varchar',
                    'columnType' => 'varchar',
                    'columnLength' => 150,
                    'phpdocType' => 'string',
                    'regex' => '',
                    'unique' => false,
                    'showCharCount' => false,
                    'name' => 'SlipNutRevisionNumber',
                    'title' => 'Slip Nut Revision Number',
                    'tooltip' => '',
                    'mandatory' => false,
                    'noteditable' => false,
                    'index' => false,
                    'locked' => false,
                    'style' => '',
                    'permissions' => NULL,
                    'datatype' => 'data',
                    'relationType' => false,
                    'invisible' => false,
                    'visibleGridView' => false,
                    'visibleSearch' => false,
                    'defaultValueGenerator' => '',
                  )),
                ),
                'locked' => false,
                'icon' => '',
              )),
              8 =>
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                'fieldtype' => 'panel',
                'labelWidth' => 240,
                'layout' => NULL,
                'border' => false,
                'name' => 'THREAD PROTECTOR',
                'type' => NULL,
                'region' => NULL,
                'title' => 'THREAD PROTECTOR',
                'width' => NULL,
                'height' => NULL,
                'collapsible' => false,
                'collapsed' => false,
                'bodyStyle' => '',
                'datatype' => 'layout',
                'permissions' => NULL,
                'childs' =>
                array(
                  0 =>
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                    'fieldtype' => 'input',
                    'width' => 200,
                    'defaultValue' => NULL,
                    'queryColumnType' => 'varchar',
                    'columnType' => 'varchar',
                    'columnLength' => 150,
                    'phpdocType' => 'string',
                    'regex' => '',
                    'unique' => false,
                    'showCharCount' => false,
                    'name' => 'ThreadProtectorComponentNumber',
                    'title' => 'Thread Protector Component Number',
                    'tooltip' => '',
                    'mandatory' => false,
                    'noteditable' => false,
                    'index' => false,
                    'locked' => false,
                    'style' => '',
                    'permissions' => NULL,
                    'datatype' => 'data',
                    'relationType' => false,
                    'invisible' => false,
                    'visibleGridView' => false,
                    'visibleSearch' => false,
                    'defaultValueGenerator' => '',
                  )),
                  1 =>
                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                    'fieldtype' => 'multiselect',
                    'options' =>
                    array(
                      0 =>
                      array(
                        'key' => 'Continental',
                        'value' => 'Continental',
                      ),
                    ),
                    'width' => 200,
                    'height' => '',
                    'maxItems' => '',
                    'renderType' => 'tags',
                    'optionsProviderClass' => '',
                    'optionsProviderData' => '',
                    'queryColumnType' => 'text',
                    'columnType' => 'text',
                    'phpdocType' => 'array',
                    'dynamicOptions' => false,
                    'name' => 'ThreadProtectorComponentVendor',
                    'title' => 'Thread Protector Component Vendor',
                    'tooltip' => '',
                    'mandatory' => false,
                    'noteditable' => false,
                    'index' => false,
                    'locked' => false,
                    'style' => '',
                    'permissions' => NULL,
                    'datatype' => 'data',
                    'relationType' => false,
                    'invisible' => false,
                    'visibleGridView' => false,
                    'visibleSearch' => false,
                  )),
                  2 =>
                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                    'fieldtype' => 'select',
                    'options' =>
                    array(
                      0 =>
                      array(
                        'key' => 'Steel',
                        'value' => 'Steel',
                      ),
                      1 =>
                      array(
                        'key' => 'Stainless Steel',
                        'value' => 'Stainless Steel',
                      ),
                      2 =>
                      array(
                        'key' => 'Brass',
                        'value' => 'Brass',
                      ),
                    ),
                    'width' => 200,
                    'defaultValue' => '',
                    'optionsProviderClass' => '',
                    'optionsProviderData' => '',
                    'queryColumnType' => 'varchar',
                    'columnType' => 'varchar',
                    'columnLength' => 150,
                    'phpdocType' => 'string',
                    'dynamicOptions' => false,
                    'name' => 'ThreadProtectorMaterial',
                    'title' => 'Thread Protector Material',
                    'tooltip' => '',
                    'mandatory' => false,
                    'noteditable' => false,
                    'index' => false,
                    'locked' => false,
                    'style' => '',
                    'permissions' => NULL,
                    'datatype' => 'data',
                    'relationType' => false,
                    'invisible' => false,
                    'visibleGridView' => false,
                    'visibleSearch' => false,
                    'defaultValueGenerator' => '',
                  )),
                  3 =>
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                    'fieldtype' => 'input',
                    'width' => 200,
                    'defaultValue' => NULL,
                    'queryColumnType' => 'varchar',
                    'columnType' => 'varchar',
                    'columnLength' => 150,
                    'phpdocType' => 'string',
                    'regex' => '',
                    'unique' => false,
                    'showCharCount' => false,
                    'name' => 'ThreadProtectorRevisionNumber',
                    'title' => 'Thread Protector Revision Number',
                    'tooltip' => '',
                    'mandatory' => false,
                    'noteditable' => false,
                    'index' => false,
                    'locked' => false,
                    'style' => '',
                    'permissions' => NULL,
                    'datatype' => 'data',
                    'relationType' => false,
                    'invisible' => false,
                    'visibleGridView' => false,
                    'visibleSearch' => false,
                    'defaultValueGenerator' => '',
                  )),
                  4 =>
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                    'fieldtype' => 'input',
                    'width' => 200,
                    'defaultValue' => NULL,
                    'queryColumnType' => 'varchar',
                    'columnType' => 'varchar',
                    'columnLength' => 150,
                    'phpdocType' => 'string',
                    'regex' => '',
                    'unique' => false,
                    'showCharCount' => false,
                    'name' => 'ThreadProtectorSAPComponentNumber',
                    'title' => 'Thread Protector SAP Component Number',
                    'tooltip' => '',
                    'mandatory' => false,
                    'noteditable' => false,
                    'index' => false,
                    'locked' => false,
                    'style' => '',
                    'permissions' => NULL,
                    'datatype' => 'data',
                    'relationType' => false,
                    'invisible' => false,
                    'visibleGridView' => false,
                    'visibleSearch' => false,
                    'defaultValueGenerator' => '',
                  )),
                ),
                'locked' => false,
                'icon' => '',
              )),
              9 =>
              Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                'fieldtype' => 'panel',
                'labelWidth' => 200,
                'layout' => NULL,
                'border' => false,
                'name' => 'PACKAGING',
                'type' => NULL,
                'region' => NULL,
                'title' => 'PACKAGING',
                'width' => NULL,
                'height' => NULL,
                'collapsible' => false,
                'collapsed' => false,
                'bodyStyle' => '',
                'datatype' => 'layout',
                'permissions' => NULL,
                'childs' =>
                array(
                  0 =>
                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                    'fieldtype' => 'select',
                    'options' =>
                    array(
                      0 =>
                      array(
                        'key' => 'Box 2',
                        'value' => 'Box 2',
                      ),
                      1 =>
                      array(
                        'key' => 'Box 3',
                        'value' => 'Box 3',
                      ),
                      2 =>
                      array(
                        'key' => 'Box 4',
                        'value' => 'Box 4',
                      ),
                      3 =>
                      array(
                        'key' => 'Box 5',
                        'value' => 'Box 5',
                      ),
                    ),
                    'width' => 200,
                    'defaultValue' => '',
                    'optionsProviderClass' => '',
                    'optionsProviderData' => '',
                    'queryColumnType' => 'varchar',
                    'columnType' => 'varchar',
                    'columnLength' => 150,
                    'phpdocType' => 'string',
                    'dynamicOptions' => false,
                    'name' => 'PackagingBoxSize',
                    'title' => 'Packaging Box Size',
                    'tooltip' => '',
                    'mandatory' => false,
                    'noteditable' => false,
                    'index' => false,
                    'locked' => false,
                    'style' => '',
                    'permissions' => NULL,
                    'datatype' => 'data',
                    'relationType' => false,
                    'invisible' => false,
                    'visibleGridView' => false,
                    'visibleSearch' => false,
                    'defaultValueGenerator' => '',
                  )),
                  1 =>
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                    'fieldtype' => 'input',
                    'width' => 200,
                    'defaultValue' => NULL,
                    'queryColumnType' => 'varchar',
                    'columnType' => 'varchar',
                    'columnLength' => 150,
                    'phpdocType' => 'string',
                    'regex' => '',
                    'unique' => false,
                    'showCharCount' => false,
                    'name' => 'PackagingQuantityPerBox',
                    'title' => 'Packaging Quantity Per Box',
                    'tooltip' => '',
                    'mandatory' => false,
                    'noteditable' => false,
                    'index' => false,
                    'locked' => false,
                    'style' => '',
                    'permissions' => NULL,
                    'datatype' => 'data',
                    'relationType' => false,
                    'invisible' => false,
                    'visibleGridView' => false,
                    'visibleSearch' => false,
                    'defaultValueGenerator' => '',
                  )),
                ),
                'locked' => false,
                'icon' => '',
              )),
            ),
            'locked' => false,
          )),
        ),
        'locked' => false,
        'icon' => '',
      )),
    ),
    'locked' => false,
    'icon' => NULL,
  )),
));
