<?php 

/** 
* Generated at: 2022-07-11T16:14:29+05:30
* Inheritance: yes
* Variants: no
* Changed by: admin (2)
* IP: 127.0.0.1


Fields Summary: 
- shelfLife [numeric]
- specificationConstruction [input]
- printedCatalogFlag [booleanSelect]
- rohs [select]
- reach [select]
- virtualCatalogFlag [booleanSelect]
- FeaturesBenefitsBulletPoint [multiselect]
- productType [select]
- businessUnit [select]
- localizedfields [localizedfields]
-- shortDescription [wysiwyg]
-- webDiscription [input]
-- longDescription [wysiwyg]
-- legalText [textarea]
-- sapDescription [textarea]
-- CompletenessPercentage [input]
-- EmptyFields [textarea]
- performance [select]
- material [select]
- fabricColor [input]
- Color [select]
- heatAndOilResistant [input]
- beltHardness [numeric]
- reinforcement [multiselect]
- ProductName [input]
- materialGroup [manyToOneRelation]
- countryOfOrigin [manyToOneRelation]
- quality [input]
- fabricType [input]
- beltType [select]
- staticConductive [select]
- minimumTemperatureF [numeric]
- maximumTemperatureF [numeric]
- rangeTemperatureF [input]
- minimumTemperatureC [numeric]
- maximumTemperatureC [numeric]
- rangeTemperatureC [input]
- siopFullCode [input]
- hierarchyLevel1 [manyToManyObjectRelation]
- hierarchyLevel2 [manyToManyObjectRelation]
- hierarchyLevel3 [manyToManyObjectRelation]
- hierarchyLevel4 [manyToManyObjectRelation]
- hierarchyLevel5 [manyToManyObjectRelation]
- hierarchyLevel6 [manyToManyObjectRelation]
- hierarchyLevel7 [manyToManyObjectRelation]
- base [objectbricks]
- profile [input]
- beltAngle [numeric]
- maxSpeed [input]
- minPulleyDia [numeric]
- minOutsidePulleyDia [numeric]
- skeleton [objectbricks]
- articleNumber [input]
- eanUpc [input]
- netWeight [numeric]
- weightUnit [select]
- listPrice [numeric]
- nominalLength [input]
- sapDescriptionLanguage [input]
- manufacturer [input]
- manufacturerPartNumber [numeric]
- oldMaterialCode [input]
- industryStandard [input]
- beltTolerance [input]
- grossWeight [numeric]
- din [input]
- matchMakerLL [input]
- Currency [select]
- alternativeUnitOfMeasureForStockkeepingUnit [input]
- cadLINK [input]
- cadFile [booleanSelect]
- pdfDrawing [booleanSelect]
- searchKeywords [select]
- CategoryDescriptionCatalog [textarea]
- newItemFlagForCatalog [booleanSelect]
- vtlStatus [select]
- pdfLINK [input]
- catalogFlag [input]
- fert [objectbricks]
- salesData [reverseManyToManyObjectRelation]
- plantData [reverseManyToManyObjectRelation]
- mainImage1 [image]
- mainImage2 [image]
- fullView1 [image]
- fullView2 [image]
- technicalDrawing1 [image]
- halfView1 [image]
- halfView2 [image]
- halfView3 [image]
- halfView4 [image]
- technicalDrawing2 [image]
- applicationImage1 [image]
- applicationImage2 [image]
- applicationImage3 [image]
- applicationImage4 [image]
- applicationImage5 [image]
- applicationImage6 [image]
- epixImage1 [image]
- epixImage3 [image]
- epixImage2 [image]
- epixImage4 [image]
- video1 [image]
- video2 [image]
- priceData [table]
*/ 


return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => '38',
   'name' => 'PTGEUProduct',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1657536264,
   'userOwner' => 2,
   'userModification' => 2,
   'parentClass' => '',
   'implementsInterfaces' => '',
   'listingParentClass' => '',
   'useTraits' => '',
   'listingUseTraits' => '',
   'encryption' => false,
   'encryptedTables' => 
  array (
  ),
   'allowInherit' => true,
   'allowVariants' => NULL,
   'showVariants' => false,
   'layoutDefinitions' => 
  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
     'fieldtype' => 'panel',
     'labelWidth' => 100,
     'layout' => NULL,
     'border' => false,
     'name' => 'pimcore_root',
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
    array (
      0 => 
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
        array (
          0 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'Base',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Brand Data',
             'width' => NULL,
             'height' => NULL,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'permissions' => NULL,
             'childs' => 
            array (
              0 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
                 'fieldtype' => 'tabpanel',
                 'border' => false,
                 'tabPosition' => NULL,
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
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => '',
                     'border' => false,
                     'name' => 'Enriched in PIM',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Enriched in PIM​',
                     'width' => NULL,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'childs' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                         'fieldtype' => 'text',
                         'html' => 'Enriched in PIM​',
                         'renderingClass' => '',
                         'renderingData' => '',
                         'border' => false,
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'color:black;padding: 10px !important; background-color: #28a050 !important;border-color: #bce8f1 !important',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                        ),
                         'locked' => false,
                      )),
                      1 => 
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
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'fieldtype' => 'fieldcontainer',
                             'labelWidth' => 250,
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
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'fieldtype' => 'fieldcontainer',
                                 'labelWidth' => 150,
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
                                array (
                                  0 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 250,
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
                                     'name' => 'shelfLife',
                                     'title' => 'Shelf Life',
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
                                     'width' => 250,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 15,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'specificationConstruction',
                                     'title' => 'Specification Construction',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'fieldtype' => 'booleanSelect',
                                     'yesLabel' => 'Y',
                                     'noLabel' => 'N',
                                     'emptyLabel' => 'Empty',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => 'Empty',
                                        'value' => 0,
                                      ),
                                      1 => 
                                      array (
                                        'key' => 'Y',
                                        'value' => 1,
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'N',
                                        'value' => -1,
                                      ),
                                    ),
                                     'width' => 250,
                                     'queryColumnType' => 'tinyint(1) null',
                                     'columnType' => 'tinyint(1) null',
                                     'phpdocType' => 'boolean',
                                     'name' => 'printedCatalogFlag',
                                     'title' => 'Printed Catalog Flag',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'fieldtype' => 'select',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => 'Cadmium (Cd): < 100 ppm',
                                        'value' => 'Cadmium (Cd): < 100 ppm',
                                      ),
                                      1 => 
                                      array (
                                        'key' => 'Lead (Pb): < 1000 ppm',
                                        'value' => 'Lead (Pb): < 1000 ppm',
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'Mercury (Hg): < 1000 ppm',
                                        'value' => 'Mercury (Hg): < 1000 ppm',
                                      ),
                                      3 => 
                                      array (
                                        'key' => 'Hexavalent Chromium: (Cr VI) < 1000 ppm',
                                        'value' => 'Hexavalent Chromium: (Cr VI) < 1000 ppm',
                                      ),
                                      4 => 
                                      array (
                                        'key' => 'Polybrominated Biphenyls (PBB): < 1000 ppm',
                                        'value' => 'Polybrominated Biphenyls (PBB): < 1000 ppm',
                                      ),
                                      5 => 
                                      array (
                                        'key' => 'Polybrominated Diphenyl Ethers (PBDE): < 1000 ppm',
                                        'value' => 'Polybrominated Diphenyl Ethers (PBDE): < 1000 ppm',
                                      ),
                                      6 => 
                                      array (
                                        'key' => 'Bis(2-Ethylhexyl) phthalate (DEHP): < 1000 ppm',
                                        'value' => 'Bis(2-Ethylhexyl) phthalate (DEHP): < 1000 ppm',
                                      ),
                                      7 => 
                                      array (
                                        'key' => 'Benzyl butyl phthalate (BBP): < 1000 ppm',
                                        'value' => 'Benzyl butyl phthalate (BBP): < 1000 ppm',
                                      ),
                                      8 => 
                                      array (
                                        'key' => 'Dibutyl phthalate (DBP): < 1000 ppm',
                                        'value' => 'Dibutyl phthalate (DBP): < 1000 ppm',
                                      ),
                                      9 => 
                                      array (
                                        'key' => 'Diisobutyl phthalate (DIBP): < 1000 ppm',
                                        'value' => 'Diisobutyl phthalate (DIBP): < 1000 ppm',
                                      ),
                                    ),
                                     'width' => 250,
                                     'defaultValue' => '',
                                     'optionsProviderClass' => '',
                                     'optionsProviderData' => '',
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'dynamicOptions' => false,
                                     'name' => 'rohs',
                                     'title' => 'Rohs',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'fieldtype' => 'select',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => '1-methyl-2-pyrrolidone (NMP)',
                                        'value' => '1-methyl-2-pyrrolidone -NMP-',
                                      ),
                                      1 => 
                                      array (
                                        'key' => '1,1-Dichloroethene',
                                        'value' => '1-1-Dichloroethene',
                                      ),
                                      2 => 
                                      array (
                                        'key' => '1,1,1,2-Tetrachloroethane',
                                        'value' => '1-1-1-2-Tetrachloroethane',
                                      ),
                                      3 => 
                                      array (
                                        'key' => '1,1,2-Trichloroethane',
                                        'value' => '1-1-2-Trichloroethane',
                                      ),
                                      4 => 
                                      array (
                                        'key' => '1,1,2,2-Tetrachloroethane',
                                        'value' => '1-1-2-2-Tetrachloroethane',
                                      ),
                                      5 => 
                                      array (
                                        'key' => '1,4-Dichlorobenzene',
                                        'value' => '1-4-Dichlorobenzene',
                                      ),
                                      6 => 
                                      array (
                                        'key' => '2-(2-butoxyethoxy)ethanol (DEGBE)',
                                        'value' => '2--2-butoxyethoxy-ethanol -DEGBE-',
                                      ),
                                      7 => 
                                      array (
                                        'key' => '2-(2-methoxyethoxy)ethanol (DEGME)',
                                        'value' => '2--2-methoxyethoxy-ethanol -DEGME-',
                                      ),
                                      8 => 
                                      array (
                                        'key' => '2-naphthylamine and salts',
                                        'value' => '2-naphthylamine and salts',
                                      ),
                                      9 => 
                                      array (
                                        'key' => '4-Aminobiphenyl xenylamine and salts',
                                        'value' => '4-Aminobiphenyl xenylamine and salts',
                                      ),
                                      10 => 
                                      array (
                                        'key' => '4-Nitrobiphenyl',
                                        'value' => '4-Nitrobiphenyl',
                                      ),
                                      11 => 
                                      array (
                                        'key' => 'Acrylamide',
                                        'value' => 'Acrylamide',
                                      ),
                                      12 => 
                                      array (
                                        'key' => 'Ammonium and compounds: nitrates, polysulphides, sulphide, hydrogen sulphides, inorganic salts',
                                        'value' => 'Ammonium and compounds- nitrates- polysulphides- sulphide- hydrogen sulphides- inorganic salts',
                                      ),
                                      13 => 
                                      array (
                                        'key' => 'Arsenic and compounds',
                                        'value' => 'Arsenic and compounds',
                                      ),
                                      14 => 
                                      array (
                                        'key' => 'Asbestos fibers',
                                        'value' => 'Asbestos fibers',
                                      ),
                                      15 => 
                                      array (
                                        'key' => 'Azocolourants and Azodyes',
                                        'value' => 'Azocolourants and Azodyes',
                                      ),
                                      16 => 
                                      array (
                                        'key' => 'Benzene',
                                        'value' => 'Benzene',
                                      ),
                                      17 => 
                                      array (
                                        'key' => 'Benzidine and salts',
                                        'value' => 'Benzidine and salts',
                                      ),
                                      18 => 
                                      array (
                                        'key' => 'Bis(pentabromophenyl)ether (decaBDE)',
                                        'value' => 'Bis-pentabromophenyl-ether -decaBDE-',
                                      ),
                                      19 => 
                                      array (
                                        'key' => 'Bisphenol A',
                                        'value' => 'Bisphenol A',
                                      ),
                                      20 => 
                                      array (
                                        'key' => 'Bromoacetic acid esters: Butyl bromoacetate, Propyl bromoacetate, Ethyl bromoacetate, Methyl bromoacetate',
                                        'value' => 'Bromoacetic acid esters- Butyl bromoacetate- Propyl bromoacetate- Ethyl bromoacetate- Methyl bromoacetate',
                                      ),
                                      21 => 
                                      array (
                                        'key' => 'Cadmium and compounds',
                                        'value' => 'Cadmium and compounds',
                                      ),
                                      22 => 
                                      array (
                                        'key' => 'Chloroethene and Chloroethylene (Vinyl chloride)',
                                        'value' => 'Chloroethene and Chloroethylene -Vinyl chloride-',
                                      ),
                                      23 => 
                                      array (
                                        'key' => 'Chloroform',
                                        'value' => 'Chloroform',
                                      ),
                                      24 => 
                                      array (
                                        'key' => 'Chromium VI and compounds',
                                        'value' => 'Chromium VI and compounds',
                                      ),
                                      25 => 
                                      array (
                                        'key' => 'CMR substances in textiles',
                                        'value' => 'CMR substances in textiles',
                                      ),
                                      26 => 
                                      array (
                                        'key' => 'Coal tars: low-temp oils, alkalines, acids, extracts, phenols, distillates; anthracene, creosote, naphthalene oils',
                                        'value' => 'Coal tars- low-temp oils- alkalines- acids- extracts- phenols- distillates; anthracene- creosote- naphthalene oils',
                                      ),
                                      27 => 
                                      array (
                                        'key' => 'Cyclohexane',
                                        'value' => 'Cyclohexane',
                                      ),
                                      28 => 
                                      array (
                                        'key' => 'Di-µ-oxo-di-n-butylstanniohydroxyborane / Dibutyltin hydrogen borate C8H19BO3Sn (DBB)',
                                        'value' => 'Di-µ-oxo-di-n-butylstanniohydroxyborane - Dibutyltin hydrogen borate C8H19BO3Sn -DBB-',
                                      ),
                                      29 => 
                                      array (
                                        'key' => 'Dichloromethane',
                                        'value' => 'Dichloromethane',
                                      ),
                                      30 => 
                                      array (
                                        'key' => 'Dimethylfumarate (DMF)',
                                        'value' => 'Dimethylfumarate -DMF-',
                                      ),
                                      31 => 
                                      array (
                                        'key' => 'Diphenylether, octabromo derivative C12H2Br8O',
                                        'value' => 'Diphenylether- octabromo derivative C12H2Br8O',
                                      ),
                                      32 => 
                                      array (
                                        'key' => 'Directive 1999/45/EC dangerous liquids',
                                        'value' => 'Directive 1999-45-EC dangerous liquids',
                                      ),
                                      33 => 
                                      array (
                                        'key' => 'EC 1272/2008 Annex VI Part 3 carcinogens, mutagens, and reprotoxins per category 1A, 1B (Table 3.1) or 1, 2 (Table 3.2)',
                                        'value' => 'EC 1272-2008 Annex VI Part 3 carcinogens- mutagens- and reprotoxins per category 1A- 1B -Table 3.1- or 1- 2 -Table 3.2-',
                                      ),
                                      34 => 
                                      array (
                                        'key' => 'Flammable gases (Cat 1,2), liquids (Cat 1,2,3), solids (Cat 1,2) that in water emit flamable gases (Cat 1,2,3) of pyrophoric liquids, solids (Cat 1)',
                                        'value' => 'Flammable gases -Cat 1-2-- liquids -Cat 1-2-3-- solids -Cat 1-2- that in water emit flamable gases -Cat 1-2-3- of pyrophoric liquids- solids -Cat 1-',
                                      ),
                                      35 => 
                                      array (
                                        'key' => 'Hexachloroethane',
                                        'value' => 'Hexachloroethane',
                                      ),
                                      36 => 
                                      array (
                                        'key' => 'Lead and compounds',
                                        'value' => 'Lead and compounds',
                                      ),
                                      37 => 
                                      array (
                                        'key' => 'Mercury and compounds',
                                        'value' => 'Mercury and compounds',
                                      ),
                                      38 => 
                                      array (
                                        'key' => 'Methanol',
                                        'value' => 'Methanol',
                                      ),
                                      39 => 
                                      array (
                                        'key' => 'Methylenediphenyl diisocyanate (MDI)',
                                        'value' => 'Methylenediphenyl diisocyanate -MDI-',
                                      ),
                                      40 => 
                                      array (
                                        'key' => 'Monomethyl -tetrachlorodiphenyl methane (Ugilec 141)',
                                        'value' => 'Monomethyl -tetrachlorodiphenyl methane -Ugilec 141-',
                                      ),
                                      41 => 
                                      array (
                                        'key' => 'Monomethyl-dibromo-diphenyl methane bromobenzylbromotoluene, mixture of isomers (DBBT)',
                                        'value' => 'Monomethyl-dibromo-diphenyl methane bromobenzylbromotoluene- mixture of isomers -DBBT-',
                                      ),
                                      42 => 
                                      array (
                                        'key' => 'Monomethyl-dichloro-diphenyl methane (Ugilec 121/21)',
                                        'value' => 'Monomethyl-dichloro-diphenyl methane -Ugilec 121-21-',
                                      ),
                                      43 => 
                                      array (
                                        'key' => 'Nickel and compounds',
                                        'value' => 'Nickel and compounds',
                                      ),
                                      44 => 
                                      array (
                                        'key' => 'Nonylphenol C6H4(OH)C9H19 and Nonylphenol ethoxylates',
                                        'value' => 'Nonylphenol C6H4-OH-C9H19 and Nonylphenol ethoxylates',
                                      ),
                                      45 => 
                                      array (
                                        'key' => 'Nonylphenol ethoxylates (NPE) (C2H4O)nC15H24O',
                                        'value' => 'Nonylphenol ethoxylates -NPE- -C2H4O-nC15H24O',
                                      ),
                                      46 => 
                                      array (
                                        'key' => 'Octamethylcyclotetrasiloxane (D4), Decamethylcyclopentasiloxane (D5)',
                                        'value' => 'Octamethylcyclotetrasiloxane -D4-- Decamethylcyclopentasiloxane -D5-',
                                      ),
                                      47 => 
                                      array (
                                        'key' => 'Organostannic compounds',
                                        'value' => 'Organostannic compounds',
                                      ),
                                      48 => 
                                      array (
                                        'key' => 'Pentachloroethane',
                                        'value' => 'Pentachloroethane',
                                      ),
                                      49 => 
                                      array (
                                        'key' => 'Pentachlorophenol and salts, esters',
                                        'value' => 'Pentachlorophenol and salts- esters',
                                      ),
                                      50 => 
                                      array (
                                        'key' => 'Perfluorooctanoic acid (PFOA) and salts',
                                        'value' => 'Perfluorooctanoic acid -PFOA- and salts',
                                      ),
                                      51 => 
                                      array (
                                        'key' => 'Phenylmercury: 2-ethylhexanoate, acetate, neodecanoate, octanoate, propionate',
                                        'value' => 'Phenylmercury- 2-ethylhexanoate- acetate- neodecanoate- octanoate- propionate',
                                      ),
                                      52 => 
                                      array (
                                        'key' => 'Phthalates: 1,2-Benzenedicarboxylic acid, di-C8-10-branched alkyl esters, C9-rich, 1,2-Benzenedicarboxylic acid, di-C9-11-branched alkyl esters, C10-rich, Di-isononyl phthalate (DINP), Di-isodecyl phthalate (DIDP), Di-n-octyl phthalate (DNOP)',
                                        'value' => 'Phthalates- 1-2-Benzenedicarboxylic acid- di-C8-10-branched alkyl esters- C9-rich- 1-2-Benzenedicarboxylic acid- di-C9-11-branched alkyl esters- C10-rich- Di-isononyl phthalate -DINP-- Di-isodecyl phthalate -DIDP-- Di-n-octyl phthalate -DNOP-',
                                      ),
                                      53 => 
                                      array (
                                        'key' => 'Phthalates: Dibutyl phthalate (DBP), Benzyl butyl phthalate (BBP), Bis (2-ethylhexyl) phthalate (DEHP)',
                                        'value' => 'Phthalates- Dibutyl phthalate -DBP-- Benzyl butyl phthalate -BBP-- Bis -2-ethylhexyl- phthalate -DEHP-',
                                      ),
                                      54 => 
                                      array (
                                        'key' => 'Polybromobiphenyls, Polybrominatedbiphenyls (PBB)',
                                        'value' => 'Polybromobiphenyls- Polybrominatedbiphenyls -PBB-',
                                      ),
                                      55 => 
                                      array (
                                        'key' => 'Polychlorinated terphenyls (PCTs)',
                                        'value' => 'Polychlorinated terphenyls -PCTs-',
                                      ),
                                      56 => 
                                      array (
                                        'key' => 'Polycyclic-aromatic hydrocarbons (PAHs): Benzo[a]pyrene (BaP), Benzo[e]pyrene (BeP), Benzo[a]anthracene (BaA), Chrysen (CHR), Benzo[b]fluoranthene (BbFA), Benzo[j]fluoranthene (BjFA), Benzo[k]fluoranthene (BkFA), Dibenzo[a,h]anthracene (DBAhA)',
                                        'value' => 'Polycyclic-aromatic hydrocarbons -PAHs-- Benzo-a-pyrene -BaP-- Benzo-e-pyrene -BeP-- Benzo-a-anthracene -BaA-- Chrysen -CHR-- Benzo-b-fluoranthene -BbFA-- Benzo-j-fluoranthene -BjFA-- Benzo-k-fluoranthene -BkFA-- Dibenzo-a-h-anthracene -DBAhA-',
                                      ),
                                      57 => 
                                      array (
                                        'key' => 'Soap bark powder (Quillaja saponaria) and saponine derivatives',
                                        'value' => 'Soap bark powder -Quillaja saponaria- and saponine derivatives',
                                      ),
                                      58 => 
                                      array (
                                        'key' => 'Toluene',
                                        'value' => 'Toluene',
                                      ),
                                      59 => 
                                      array (
                                        'key' => 'Trichlorobenzene',
                                        'value' => 'Trichlorobenzene',
                                      ),
                                      60 => 
                                      array (
                                        'key' => 'Tris (2,3 dibromopropyl) phosphate',
                                        'value' => 'Tris -2-3 dibromopropyl- phosphate',
                                      ),
                                      61 => 
                                      array (
                                        'key' => 'Tris(aziridinyl) phosphinoxide',
                                        'value' => 'Tris-aziridinyl- phosphinoxide',
                                      ),
                                    ),
                                     'width' => 250,
                                     'defaultValue' => '',
                                     'optionsProviderClass' => '',
                                     'optionsProviderData' => '',
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'dynamicOptions' => false,
                                     'name' => 'reach',
                                     'title' => 'Reach',
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                     'fieldtype' => 'booleanSelect',
                                     'yesLabel' => 'Y',
                                     'noLabel' => 'N',
                                     'emptyLabel' => 'Empty',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => 'Empty',
                                        'value' => 0,
                                      ),
                                      1 => 
                                      array (
                                        'key' => 'Y',
                                        'value' => 1,
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'N',
                                        'value' => -1,
                                      ),
                                    ),
                                     'width' => 250,
                                     'queryColumnType' => 'tinyint(1) null',
                                     'columnType' => 'tinyint(1) null',
                                     'phpdocType' => 'boolean',
                                     'name' => 'virtualCatalogFlag',
                                     'title' => 'Virtual Catalog Flag',
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
                                 'labelWidth' => 150,
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
                                array (
                                  0 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                                     'fieldtype' => 'multiselect',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => '1/2 Bend Radius',
                                        'value' => 3187,
                                      ),
                                      1 => 
                                      array (
                                        'key' => '1000hr Steam Rack Tested',
                                        'value' => 3063,
                                      ),
                                      2 => 
                                      array (
                                        'key' => '10:1 Safety Factor',
                                        'value' => 3062,
                                      ),
                                      3 => 
                                      array (
                                        'key' => '20:1 Safety Factor',
                                        'value' => 3064,
                                      ),
                                      4 => 
                                      array (
                                        'key' => '25 to 30 percent higher power ratings than classical v-belts',
                                        'value' => 759991,
                                      ),
                                      5 => 
                                      array (
                                        'key' => '2:1 Safety Factor',
                                        'value' => 10822383,
                                      ),
                                      6 => 
                                      array (
                                        'key' => '3-A 18-02 Certified',
                                        'value' => 759935,
                                      ),
                                      7 => 
                                      array (
                                        'key' => '3A 18-03 Certified',
                                        'value' => 3065,
                                      ),
                                      8 => 
                                      array (
                                        'key' => '3A Compliant Tube',
                                        'value' => 3066,
                                      ),
                                      9 => 
                                      array (
                                        'key' => '4 percent more energy efficient than traditional v-belts',
                                        'value' => 759992,
                                      ),
                                      10 => 
                                      array (
                                        'key' => '4:1 Safety Factor',
                                        'value' => 759936,
                                      ),
                                      11 => 
                                      array (
                                        'key' => '500,000 Impulse Cycles Tested',
                                        'value' => 3067,
                                      ),
                                      12 => 
                                      array (
                                        'key' => 'Abrasion resistant tube',
                                        'value' => 3068,
                                      ),
                                      13 => 
                                      array (
                                        'key' => 'ABS Certified',
                                        'value' => 3069,
                                      ),
                                      14 => 
                                      array (
                                        'key' => 'Air Conditioning',
                                        'value' => 3070,
                                      ),
                                      15 => 
                                      array (
                                        'key' => 'Armorcoat™ Abrasion-Resistant Cover',
                                        'value' => 3071,
                                      ),
                                      16 => 
                                      array (
                                        'key' => 'Available in raw-edge, molded cog and envelope constructions',
                                        'value' => 759993,
                                      ),
                                      17 => 
                                      array (
                                        'key' => 'Available with cogs for increased flexibility and heat dissipation',
                                        'value' => 759994,
                                      ),
                                      18 => 
                                      array (
                                        'key' => 'Avilable in cut-edge or envelope construction',
                                        'value' => 759995,
                                      ),
                                      19 => 
                                      array (
                                        'key' => 'B100 Fuel Compatibility',
                                        'value' => 3072,
                                      ),
                                      20 => 
                                      array (
                                        'key' => 'B20 Fuel Compatibility',
                                        'value' => 3073,
                                      ),
                                      21 => 
                                      array (
                                        'key' => 'Barber Pole Design',
                                        'value' => 3188,
                                      ),
                                      22 => 
                                      array (
                                        'key' => 'Beats the heat, operates continuous at temperatures up to 210 F',
                                        'value' => 759996,
                                      ),
                                      23 => 
                                      array (
                                        'key' => 'Better Cover Adhesion',
                                        'value' => 759937,
                                      ),
                                      24 => 
                                      array (
                                        'key' => 'Better Flame Resistance',
                                        'value' => 759938,
                                      ),
                                      25 => 
                                      array (
                                        'key' => 'Braided Construction - Greater Fitting Retention',
                                        'value' => 759939,
                                      ),
                                      26 => 
                                      array (
                                        'key' => 'Braided Construction - Kink Resistant',
                                        'value' => 759940,
                                      ),
                                      27 => 
                                      array (
                                        'key' => 'Braided Construction - Reeling Durability',
                                        'value' => 759941,
                                      ),
                                      28 => 
                                      array (
                                        'key' => 'Braided Construction - Superior Durability',
                                        'value' => 759942,
                                      ),
                                      29 => 
                                      array (
                                        'key' => 'Braided Construction - Twist Resistant',
                                        'value' => 759943,
                                      ),
                                      30 => 
                                      array (
                                        'key' => 'Built In Couplings Available',
                                        'value' => 3074,
                                      ),
                                      31 => 
                                      array (
                                        'key' => 'Built On Chrome Mandrel',
                                        'value' => 759989,
                                      ),
                                      32 => 
                                      array (
                                        'key' => 'Chemical Resistant',
                                        'value' => 3075,
                                      ),
                                      33 => 
                                      array (
                                        'key' => 'Chemical resistant cover',
                                        'value' => 3833622,
                                      ),
                                      34 => 
                                      array (
                                        'key' => 'Chrome Mandrel Built',
                                        'value' => 3076,
                                      ),
                                      35 => 
                                      array (
                                        'key' => 'Cogged for cooler running',
                                        'value' => 759997,
                                      ),
                                      36 => 
                                      array (
                                        'key' => 'Conductive',
                                        'value' => 3077,
                                      ),
                                      37 => 
                                      array (
                                        'key' => 'Conductive Cover',
                                        'value' => 3078,
                                      ),
                                      38 => 
                                      array (
                                        'key' => 'Conductive Tube',
                                        'value' => 3079,
                                      ),
                                      39 => 
                                      array (
                                        'key' => 'Conductive Tube & Cover',
                                        'value' => 3080,
                                      ),
                                      40 => 
                                      array (
                                        'key' => 'Consistent performance',
                                        'value' => 759998,
                                      ),
                                      41 => 
                                      array (
                                        'key' => 'Consistent, reliable and predictable over the life of belt',
                                        'value' => 759999,
                                      ),
                                      42 => 
                                      array (
                                        'key' => 'Constant Pressure Rating',
                                        'value' => 3081,
                                      ),
                                      43 => 
                                      array (
                                        'key' => 'Continuous Lengths Available',
                                        'value' => 3082,
                                      ),
                                      44 => 
                                      array (
                                        'key' => 'Cost effective',
                                        'value' => 760000,
                                      ),
                                      45 => 
                                      array (
                                        'key' => 'Coupled Assembly Available',
                                        'value' => 3083,
                                      ),
                                      46 => 
                                      array (
                                        'key' => 'Crimp Specs Available',
                                        'value' => 3084,
                                      ),
                                      47 => 
                                      array (
                                        'key' => 'Crimped Solution Available',
                                        'value' => 759944,
                                      ),
                                      48 => 
                                      array (
                                        'key' => 'Crush Resistant',
                                        'value' => 3085,
                                      ),
                                      49 => 
                                      array (
                                        'key' => 'Cut Lengths Available',
                                        'value' => 3086,
                                      ),
                                      50 => 
                                      array (
                                        'key' => 'Decreased component wear',
                                        'value' => 760001,
                                      ),
                                      51 => 
                                      array (
                                        'key' => 'Decreased drive weight',
                                        'value' => 760002,
                                      ),
                                      52 => 
                                      array (
                                        'key' => 'Decreased system weight',
                                        'value' => 760003,
                                      ),
                                      53 => 
                                      array (
                                        'key' => 'Designed for high-capacity performance',
                                        'value' => 760004,
                                      ),
                                      54 => 
                                      array (
                                        'key' => 'Dissipates heat',
                                        'value' => 760005,
                                      ),
                                      55 => 
                                      array (
                                        'key' => 'Drinking Water Safe',
                                        'value' => 3087,
                                      ),
                                      56 => 
                                      array (
                                        'key' => 'Dual purpose for classical and FHP',
                                        'value' => 760006,
                                      ),
                                      57 => 
                                      array (
                                        'key' => 'Dual-sided classical profile',
                                        'value' => 760007,
                                      ),
                                      58 => 
                                      array (
                                        'key' => 'Durability that goes the distance',
                                        'value' => 760008,
                                      ),
                                      59 => 
                                      array (
                                        'key' => 'E25 Fuel Compatibility',
                                        'value' => 3088,
                                      ),
                                      60 => 
                                      array (
                                        'key' => 'E85 Fuel Compatibility',
                                        'value' => 3089,
                                      ),
                                      61 => 
                                      array (
                                        'key' => 'Ease of Coupling',
                                        'value' => 3090,
                                      ),
                                      62 => 
                                      array (
                                        'key' => 'Ease of Handling',
                                        'value' => 3091,
                                      ),
                                      63 => 
                                      array (
                                        'key' => 'Easy installation',
                                        'value' => 760009,
                                      ),
                                      64 => 
                                      array (
                                        'key' => 'Economical and trouble-free',
                                        'value' => 760010,
                                      ),
                                      65 => 
                                      array (
                                        'key' => 'Economical Solution',
                                        'value' => 3092,
                                      ),
                                      66 => 
                                      array (
                                        'key' => 'EI 1529-7th Edition, 2014 Compliant',
                                        'value' => 3093,
                                      ),
                                      67 => 
                                      array (
                                        'key' => 'Eliminates chirps, squeaks and squeals',
                                        'value' => 760011,
                                      ),
                                      68 => 
                                      array (
                                        'key' => 'EN 1361 Compliant',
                                        'value' => 3094,
                                      ),
                                      69 => 
                                      array (
                                        'key' => 'Energy saving',
                                        'value' => 760012,
                                      ),
                                      70 => 
                                      array (
                                        'key' => 'Engineered to universal metric profiles',
                                        'value' => 760013,
                                      ),
                                      71 => 
                                      array (
                                        'key' => 'Exceeds ASME B30.27-2009. 2:1 WP to Burst Ratio',
                                        'value' => 3095,
                                      ),
                                      72 => 
                                      array (
                                        'key' => 'Exceptional Durability',
                                        'value' => 3096,
                                      ),
                                      73 => 
                                      array (
                                        'key' => 'Exceptional lengthwise flexibility allows for small pulleys',
                                        'value' => 760014,
                                      ),
                                      74 => 
                                      array (
                                        'key' => 'Extended Life™ Cover',
                                        'value' => 3186,
                                      ),
                                      75 => 
                                      array (
                                        'key' => 'Extreme Flexibility',
                                        'value' => 3097,
                                      ),
                                      76 => 
                                      array (
                                        'key' => 'FDA / USDA Certified Tube',
                                        'value' => 3189,
                                      ),
                                      77 => 
                                      array (
                                        'key' => 'FDA / USDA Compliant Tube',
                                        'value' => 3190,
                                      ),
                                      78 => 
                                      array (
                                        'key' => 'Fiberglass tension cords for excellent resistance to shrinkage/elongation',
                                        'value' => 760066,
                                      ),
                                      79 => 
                                      array (
                                        'key' => 'Field Attachable Coupling',
                                        'value' => 3098,
                                      ),
                                      80 => 
                                      array (
                                        'key' => 'Fire resistant cover provides minimum 2-1/2 minute fire resistivity for USCG type A service',
                                        'value' => 4552263,
                                      ),
                                      81 => 
                                      array (
                                        'key' => 'Fits smaller pulleys',
                                        'value' => 760015,
                                      ),
                                      82 => 
                                      array (
                                        'key' => 'Full Vacuum Rating',
                                        'value' => 3099,
                                      ),
                                      83 => 
                                      array (
                                        'key' => 'Good Flexibility',
                                        'value' => 3100,
                                      ),
                                      84 => 
                                      array (
                                        'key' => 'Greater Abrasion Resistance In The Tube',
                                        'value' => 759946,
                                      ),
                                      85 => 
                                      array (
                                        'key' => 'Greater Abrasion Resistance On The Cover',
                                        'value' => 759947,
                                      ),
                                      86 => 
                                      array (
                                        'key' => 'Greater Ozone Resistance',
                                        'value' => 759948,
                                      ),
                                      87 => 
                                      array (
                                        'key' => 'Handles 90% of Common Chemicals',
                                        'value' => 3101,
                                      ),
                                      88 => 
                                      array (
                                        'key' => 'Handles 98% of Common Chemicals',
                                        'value' => 3102,
                                      ),
                                      89 => 
                                      array (
                                        'key' => 'Handles common industry chemicals',
                                        'value' => 4552265,
                                      ),
                                      90 => 
                                      array (
                                        'key' => 'Handles Common Industry Chemicals ',
                                        'value' => 3191,
                                      ),
                                      91 => 
                                      array (
                                        'key' => 'Handles High Aromatic Hydrocarbons',
                                        'value' => 3103,
                                      ),
                                      92 => 
                                      array (
                                        'key' => 'Heat and oil resistant',
                                        'value' => 760016,
                                      ),
                                      93 => 
                                      array (
                                        'key' => 'Heat, ozone and abrasion resistant',
                                        'value' => 760017,
                                      ),
                                      94 => 
                                      array (
                                        'key' => 'Helicog profile for quiet operation',
                                        'value' => 760018,
                                      ),
                                      95 => 
                                      array (
                                        'key' => 'High & Low Temperature Rating',
                                        'value' => 3104,
                                      ),
                                      96 => 
                                      array (
                                        'key' => 'High Oil Resistance Cover',
                                        'value' => 3105,
                                      ),
                                      97 => 
                                      array (
                                        'key' => 'High Oil Resistance Tube',
                                        'value' => 3106,
                                      ),
                                      98 => 
                                      array (
                                        'key' => 'High Oil Resistance Tube & Cover',
                                        'value' => 3107,
                                      ),
                                      99 => 
                                      array (
                                        'key' => 'High Pressure Rating',
                                        'value' => 3108,
                                      ),
                                      100 => 
                                      array (
                                        'key' => 'High Temperature Rating',
                                        'value' => 3109,
                                      ),
                                      101 => 
                                      array (
                                        'key' => 'High Temperature Rating',
                                        'value' => 3833587,
                                      ),
                                      102 => 
                                      array (
                                        'key' => 'High-strength aramid tensile members',
                                        'value' => 760020,
                                      ),
                                      103 => 
                                      array (
                                        'key' => 'Higher Maximum Temperature Rating',
                                        'value' => 759949,
                                      ),
                                      104 => 
                                      array (
                                        'key' => 'Higher Vacuum Rating',
                                        'value' => 759950,
                                      ),
                                      105 => 
                                      array (
                                        'key' => 'Higher Working Pressure',
                                        'value' => 759951,
                                      ),
                                      106 => 
                                      array (
                                        'key' => 'Highly versital',
                                        'value' => 760019,
                                      ),
                                      107 => 
                                      array (
                                        'key' => 'Homogeneous, Extruded Tube',
                                        'value' => 3110,
                                      ),
                                      108 => 
                                      array (
                                        'key' => 'Ideal for lumber applications',
                                        'value' => 760021,
                                      ),
                                      109 => 
                                      array (
                                        'key' => 'Increase belt life',
                                        'value' => 760022,
                                      ),
                                      110 => 
                                      array (
                                        'key' => 'Increased belt and sheave life',
                                        'value' => 760023,
                                      ),
                                      111 => 
                                      array (
                                        'key' => 'Increased belt life',
                                        'value' => 760024,
                                      ),
                                      112 => 
                                      array (
                                        'key' => 'Increased belt life up to 4 times',
                                        'value' => 760025,
                                      ),
                                      113 => 
                                      array (
                                        'key' => 'Increased efficiency',
                                        'value' => 760026,
                                      ),
                                      114 => 
                                      array (
                                        'key' => 'Increased flexibility, abrasion and heat resistance',
                                        'value' => 760027,
                                      ),
                                      115 => 
                                      array (
                                        'key' => 'Increased power',
                                        'value' => 760028,
                                      ),
                                      116 => 
                                      array (
                                        'key' => 'Internal Expansion For Expanded Flow',
                                        'value' => 759952,
                                      ),
                                      117 => 
                                      array (
                                        'key' => 'ISO1825:2010 Type E Grade 2 Compliant',
                                        'value' => 3111,
                                      ),
                                      118 => 
                                      array (
                                        'key' => 'Keeps you running in a pinch',
                                        'value' => 760029,
                                      ),
                                      119 => 
                                      array (
                                        'key' => 'Kink Resistance',
                                        'value' => 3112,
                                      ),
                                      120 => 
                                      array (
                                        'key' => 'Lightweight Construction',
                                        'value' => 3113,
                                      ),
                                      121 => 
                                      array (
                                        'key' => 'Limited Oil Resistance Cover',
                                        'value' => 3114,
                                      ),
                                      122 => 
                                      array (
                                        'key' => 'Limited Oil Resistance Tube',
                                        'value' => 3115,
                                      ),
                                      123 => 
                                      array (
                                        'key' => 'Limited Oil Resistance Tube & Cover',
                                        'value' => 3116,
                                      ),
                                      124 => 
                                      array (
                                        'key' => 'Lloyd\'s Certified',
                                        'value' => 3117,
                                      ),
                                      125 => 
                                      array (
                                        'key' => 'Longer life',
                                        'value' => 760030,
                                      ),
                                      126 => 
                                      array (
                                        'key' => 'Low Coefficient Of Friction For Ease Of Maneuverability',
                                        'value' => 759953,
                                      ),
                                      127 => 
                                      array (
                                        'key' => 'Low Computer Creep',
                                        'value' => 3118,
                                      ),
                                      128 => 
                                      array (
                                        'key' => 'Low Drag Resistance',
                                        'value' => 3119,
                                      ),
                                      129 => 
                                      array (
                                        'key' => 'Low Extraction Tube',
                                        'value' => 3120,
                                      ),
                                      130 => 
                                      array (
                                        'key' => 'Low Extraction Tube To Reduce Contamination',
                                        'value' => 759954,
                                      ),
                                      131 => 
                                      array (
                                        'key' => 'Low Force to Bend',
                                        'value' => 3121,
                                      ),
                                      132 => 
                                      array (
                                        'key' => 'Low Temperature Flexibility',
                                        'value' => 3122,
                                      ),
                                      133 => 
                                      array (
                                        'key' => 'Low Temperature Rating',
                                        'value' => 3123,
                                      ),
                                      134 => 
                                      array (
                                        'key' => 'Low Termperature Rating',
                                        'value' => 4552262,
                                      ),
                                      135 => 
                                      array (
                                        'key' => 'Low vibration for low noise',
                                        'value' => 760031,
                                      ),
                                      136 => 
                                      array (
                                        'key' => 'Lower Computer Creep',
                                        'value' => 759955,
                                      ),
                                      137 => 
                                      array (
                                        'key' => 'Lower Force To Bend',
                                        'value' => 759956,
                                      ),
                                      138 => 
                                      array (
                                        'key' => 'Lower Minimum Temperature Rating',
                                        'value' => 759957,
                                      ),
                                      139 => 
                                      array (
                                        'key' => 'Lower noise generation',
                                        'value' => 760032,
                                      ),
                                      140 => 
                                      array (
                                        'key' => 'Lower Weight Per Foot',
                                        'value' => 759958,
                                      ),
                                      141 => 
                                      array (
                                        'key' => 'Made in USA',
                                        'value' => 3124,
                                      ),
                                      142 => 
                                      array (
                                        'key' => 'Made in USA',
                                        'value' => 760033,
                                      ),
                                      143 => 
                                      array (
                                        'key' => 'Maintenance Free',
                                        'value' => 3125,
                                      ),
                                      144 => 
                                      array (
                                        'key' => 'Maximum Abrasion Resistant Cover',
                                        'value' => 3126,
                                      ),
                                      145 => 
                                      array (
                                        'key' => 'Medium Oil Resistance Cover',
                                        'value' => 3127,
                                      ),
                                      146 => 
                                      array (
                                        'key' => 'Medium Oil Resistance Tube',
                                        'value' => 3128,
                                      ),
                                      147 => 
                                      array (
                                        'key' => 'Medium Oil Resistance Tube & Cover',
                                        'value' => 3129,
                                      ),
                                      148 => 
                                      array (
                                        'key' => 'Meets ARPM IP-7 2011 Guidelines',
                                        'value' => 759959,
                                      ),
                                      149 => 
                                      array (
                                        'key' => 'Meets ARPM IP-7 Standards',
                                        'value' => 4552264,
                                      ),
                                      150 => 
                                      array (
                                        'key' => 'Meets ARPM IP-7 Standards ',
                                        'value' => 3192,
                                      ),
                                      151 => 
                                      array (
                                        'key' => 'Meets CARB requirements',
                                        'value' => 3130,
                                      ),
                                      152 => 
                                      array (
                                        'key' => 'Meets CGA E-1 Standards',
                                        'value' => 3131,
                                      ),
                                      153 => 
                                      array (
                                        'key' => 'Meets CGA Requirements',
                                        'value' => 759961,
                                      ),
                                      154 => 
                                      array (
                                        'key' => 'Meets DOT Requirements',
                                        'value' => 3132,
                                      ),
                                      155 => 
                                      array (
                                        'key' => 'Meets EN 12115:2011',
                                        'value' => 3133,
                                      ),
                                      156 => 
                                      array (
                                        'key' => 'Meets EPA requirements for low permeation Class A1-15 marine fuel lines',
                                        'value' => 3833595,
                                      ),
                                      157 => 
                                      array (
                                        'key' => 'Meets EVR Requirements',
                                        'value' => 3134,
                                      ),
                                      158 => 
                                      array (
                                        'key' => 'Meets ISO 22241-2 Immersion Test',
                                        'value' => 3135,
                                      ),
                                      159 => 
                                      array (
                                        'key' => 'Meets ISO 22241-2 Standard',
                                        'value' => 759962,
                                      ),
                                      160 => 
                                      array (
                                        'key' => 'Meets ISO 7840 Type A1',
                                        'value' => 3136,
                                      ),
                                      161 => 
                                      array (
                                        'key' => 'Meets ISO 7840 Type A2',
                                        'value' => 3137,
                                      ),
                                      162 => 
                                      array (
                                        'key' => 'Meets ISO 7840 Type B2',
                                        'value' => 3138,
                                      ),
                                      163 => 
                                      array (
                                        'key' => 'Meets Low Permeation Requirements',
                                        'value' => 759963,
                                      ),
                                      164 => 
                                      array (
                                        'key' => 'Meets ORVR requirements',
                                        'value' => 3139,
                                      ),
                                      165 => 
                                      array (
                                        'key' => 'Microban Cover',
                                        'value' => 3140,
                                      ),
                                      166 => 
                                      array (
                                        'key' => 'Microban Cover - Anti-Microbial Protection',
                                        'value' => 759965,
                                      ),
                                      167 => 
                                      array (
                                        'key' => 'Microban Cover Option Available',
                                        'value' => 3141,
                                      ),
                                      168 => 
                                      array (
                                        'key' => 'Mild Chemical Resistance',
                                        'value' => 3142,
                                      ),
                                      169 => 
                                      array (
                                        'key' => 'Military Applications',
                                        'value' => 3143,
                                      ),
                                      170 => 
                                      array (
                                        'key' => 'More narrow drive',
                                        'value' => 760034,
                                      ),
                                      171 => 
                                      array (
                                        'key' => 'MSHA Flame Resistant Cover',
                                        'value' => 3144,
                                      ),
                                      172 => 
                                      array (
                                        'key' => 'MSHA Flame Resistant Cover Available',
                                        'value' => 3145,
                                      ),
                                      173 => 
                                      array (
                                        'key' => 'MSHA Flame Resistant Tube & Cover',
                                        'value' => 3146,
                                      ),
                                      174 => 
                                      array (
                                        'key' => 'MSHA Rated Cover',
                                        'value' => 759966,
                                      ),
                                      175 => 
                                      array (
                                        'key' => 'Multiple Colors Available',
                                        'value' => 3147,
                                      ),
                                      176 => 
                                      array (
                                        'key' => 'NFPA Bulletin #407 Compliant',
                                        'value' => 3148,
                                      ),
                                      177 => 
                                      array (
                                        'key' => 'Nitrile Tube Designed for Jet Fuel',
                                        'value' => 3193,
                                      ),
                                      178 => 
                                      array (
                                        'key' => 'Non Conductive - Minimum Electric Resistance Greater Than 1 Megohm Per Inch At 1000 Volts Dc',
                                        'value' => 759967,
                                      ),
                                      179 => 
                                      array (
                                        'key' => 'Non-Conductive Cover',
                                        'value' => 3149,
                                      ),
                                      180 => 
                                      array (
                                        'key' => 'Non-Conductive Tube',
                                        'value' => 3150,
                                      ),
                                      181 => 
                                      array (
                                        'key' => 'Non-Conductive Tube & Cover',
                                        'value' => 3151,
                                      ),
                                      182 => 
                                      array (
                                        'key' => 'Non-Damming Cover',
                                        'value' => 3152,
                                      ),
                                      183 => 
                                      array (
                                        'key' => 'Non-Marking Cover',
                                        'value' => 3153,
                                      ),
                                      184 => 
                                      array (
                                        'key' => 'Non-Porous Tube',
                                        'value' => 3154,
                                      ),
                                      185 => 
                                      array (
                                        'key' => 'Non-Skive Crimped Solution',
                                        'value' => 759968,
                                      ),
                                      186 => 
                                      array (
                                        'key' => 'Not Pin-Pricked, Eliminating Path Of Moisture To Reinforcement',
                                        'value' => 759969,
                                      ),
                                      187 => 
                                      array (
                                        'key' => 'NSF-61 Listed Material',
                                        'value' => 3155,
                                      ),
                                      188 => 
                                      array (
                                        'key' => 'Oil Resistant',
                                        'value' => 3156,
                                      ),
                                      189 => 
                                      array (
                                        'key' => 'Oil, heat, ozone and abrasion resistant',
                                        'value' => 760035,
                                      ),
                                      190 => 
                                      array (
                                        'key' => 'Outperforms On Flex Fatigue Testing',
                                        'value' => 759970,
                                      ),
                                      191 => 
                                      array (
                                        'key' => 'Passes 1000 Hour Steam Rack Test',
                                        'value' => 759988,
                                      ),
                                      192 => 
                                      array (
                                        'key' => 'Peace of mind',
                                        'value' => 760036,
                                      ),
                                      193 => 
                                      array (
                                        'key' => 'Peroxide cured',
                                        'value' => 3157,
                                      ),
                                      194 => 
                                      array (
                                        'key' => 'Pin Pricked, Allowing Release Of Gasses Or Vapors Which May Permeate Tube Of The Hose',
                                        'value' => 759971,
                                      ),
                                      195 => 
                                      array (
                                        'key' => 'Pin-Pricked Cover',
                                        'value' => 3158,
                                      ),
                                      196 => 
                                      array (
                                        'key' => 'Premium Ozone Resistance',
                                        'value' => 3159,
                                      ),
                                      197 => 
                                      array (
                                        'key' => 'Provides accurate positioning',
                                        'value' => 760037,
                                      ),
                                      198 => 
                                      array (
                                        'key' => 'Quiet Channel Technology',
                                        'value' => 760038,
                                      ),
                                      199 => 
                                      array (
                                        'key' => 'Quiet tooth engagement',
                                        'value' => 760039,
                                      ),
                                      200 => 
                                      array (
                                        'key' => 'Reduce maintenance',
                                        'value' => 760040,
                                      ),
                                      201 => 
                                      array (
                                        'key' => 'Reduced costs',
                                        'value' => 760041,
                                      ),
                                      202 => 
                                      array (
                                        'key' => 'Reduced drive cost',
                                        'value' => 760042,
                                      ),
                                      203 => 
                                      array (
                                        'key' => 'Reduced drive weight',
                                        'value' => 760043,
                                      ),
                                      204 => 
                                      array (
                                        'key' => 'Reduced inventory',
                                        'value' => 760044,
                                      ),
                                      205 => 
                                      array (
                                        'key' => 'Reduced maintenance',
                                        'value' => 760045,
                                      ),
                                      206 => 
                                      array (
                                        'key' => 'Reduced maintenance provided by its resistance to elongation',
                                        'value' => 760046,
                                      ),
                                      207 => 
                                      array (
                                        'key' => 'Reduced operating noise up to 6 dB',
                                        'value' => 760047,
                                      ),
                                      208 => 
                                      array (
                                        'key' => 'Reduced overall costs',
                                        'value' => 760048,
                                      ),
                                      209 => 
                                      array (
                                        'key' => 'Reduced stretch and shrinkage',
                                        'value' => 760049,
                                      ),
                                      210 => 
                                      array (
                                        'key' => 'Reduced vibration and operating noise',
                                        'value' => 760050,
                                      ),
                                      211 => 
                                      array (
                                        'key' => 'Reduced vibration and turn over',
                                        'value' => 760051,
                                      ),
                                      212 => 
                                      array (
                                        'key' => 'Reeling Durability',
                                        'value' => 3160,
                                      ),
                                      213 => 
                                      array (
                                        'key' => 'Resistance up to 10% Xylene',
                                        'value' => 3161,
                                      ),
                                      214 => 
                                      array (
                                        'key' => 'Resistant to Animal Fats',
                                        'value' => 3162,
                                      ),
                                      215 => 
                                      array (
                                        'key' => 'Ribbed top for transverse rigidity, flexibility and cool running conditions',
                                        'value' => 760052,
                                      ),
                                      216 => 
                                      array (
                                        'key' => 'Rust Resistant Wire Reinforcement',
                                        'value' => 3163,
                                      ),
                                      217 => 
                                      array (
                                        'key' => 'Self tensioning technology',
                                        'value' => 760053,
                                      ),
                                      218 => 
                                      array (
                                        'key' => 'Silicone free raw materials and production',
                                        'value' => 760054,
                                      ),
                                      219 => 
                                      array (
                                        'key' => 'Smooth Cover For Low Drag Resistance',
                                        'value' => 759972,
                                      ),
                                      220 => 
                                      array (
                                        'key' => 'Smooth operation due to precision belt characteristics',
                                        'value' => 760055,
                                      ),
                                      221 => 
                                      array (
                                        'key' => 'Static Conductive',
                                        'value' => 3164,
                                      ),
                                      222 => 
                                      array (
                                        'key' => 'Static conductive',
                                        'value' => 760056,
                                      ),
                                      223 => 
                                      array (
                                        'key' => 'Static Dissipating Cover',
                                        'value' => 3165,
                                      ),
                                      224 => 
                                      array (
                                        'key' => 'Static Dissipating Tube',
                                        'value' => 3166,
                                      ),
                                      225 => 
                                      array (
                                        'key' => 'Static Dissipating Tube & Cover',
                                        'value' => 3167,
                                      ),
                                      226 => 
                                      array (
                                        'key' => 'Static Pressure Rating',
                                        'value' => 12472320,
                                      ),
                                      227 => 
                                      array (
                                        'key' => 'Static Wire',
                                        'value' => 3168,
                                      ),
                                      228 => 
                                      array (
                                        'key' => 'Static Wire Allowing For Static Continuity In Crimped Assembly',
                                        'value' => 759973,
                                      ),
                                      229 => 
                                      array (
                                        'key' => 'Static Wire Option Available',
                                        'value' => 3169,
                                      ),
                                      230 => 
                                      array (
                                        'key' => 'Suitable for drinking  water',
                                        'value' => 759974,
                                      ),
                                      231 => 
                                      array (
                                        'key' => 'Superior Abrasion Resistant Cover',
                                        'value' => 3170,
                                      ),
                                      232 => 
                                      array (
                                        'key' => 'Superior Abrasion Resistant Tube',
                                        'value' => 3171,
                                      ),
                                      233 => 
                                      array (
                                        'key' => 'Superior Abrasion Resistant Tube & Cover',
                                        'value' => 3172,
                                      ),
                                      234 => 
                                      array (
                                        'key' => 'Superior Bend Radius',
                                        'value' => 759975,
                                      ),
                                      235 => 
                                      array (
                                        'key' => 'Superior Cold Weather Flexibility',
                                        'value' => 759976,
                                      ),
                                      236 => 
                                      array (
                                        'key' => 'Superior Cover Adhesion',
                                        'value' => 3173,
                                      ),
                                      237 => 
                                      array (
                                        'key' => 'Superior Crush-Resistance',
                                        'value' => 759977,
                                      ),
                                      238 => 
                                      array (
                                        'key' => 'Superior Durability',
                                        'value' => 759978,
                                      ),
                                      239 => 
                                      array (
                                        'key' => 'Superior efficiency for improved performance',
                                        'value' => 760057,
                                      ),
                                      240 => 
                                      array (
                                        'key' => 'Superior Fitting Retention',
                                        'value' => 3174,
                                      ),
                                      241 => 
                                      array (
                                        'key' => 'Superior Kink Resistance',
                                        'value' => 759979,
                                      ),
                                      242 => 
                                      array (
                                        'key' => 'Superior Oil Resistance In The Tube',
                                        'value' => 759980,
                                      ),
                                      243 => 
                                      array (
                                        'key' => 'Superior Oil Resistance On The Cover',
                                        'value' => 759981,
                                      ),
                                      244 => 
                                      array (
                                        'key' => 'Superior Oil Resistance Tube And Cover',
                                        'value' => 759982,
                                      ),
                                      245 => 
                                      array (
                                        'key' => 'Superior Resistance To Oil, Grease And Animal Fat',
                                        'value' => 759983,
                                      ),
                                      246 => 
                                      array (
                                        'key' => 'Survivor Compound Available',
                                        'value' => 3194,
                                      ),
                                      247 => 
                                      array (
                                        'key' => 'Tapered Nozzle Available',
                                        'value' => 3175,
                                      ),
                                      248 => 
                                      array (
                                        'key' => 'Taste & Odorless Tube',
                                        'value' => 3176,
                                      ),
                                      249 => 
                                      array (
                                        'key' => 'Tolerates misalignment',
                                        'value' => 760058,
                                      ),
                                      250 => 
                                      array (
                                        'key' => 'Transmit power from both sides',
                                        'value' => 760059,
                                      ),
                                      251 => 
                                      array (
                                        'key' => 'True dimensional stability and higher horsepower capacity for long belt life',
                                        'value' => 760060,
                                      ),
                                      252 => 
                                      array (
                                        'key' => 'Twist Resistant',
                                        'value' => 3177,
                                      ),
                                      253 => 
                                      array (
                                        'key' => 'U.S. Coast Guard Certified',
                                        'value' => 3178,
                                      ),
                                      254 => 
                                      array (
                                        'key' => 'UL / CUL 330 Certified ',
                                        'value' => 759987,
                                      ),
                                      255 => 
                                      array (
                                        'key' => 'UL / CUL Certified',
                                        'value' => 3195,
                                      ),
                                      256 => 
                                      array (
                                        'key' => 'UL 330A Approved',
                                        'value' => 3179,
                                      ),
                                      257 => 
                                      array (
                                        'key' => 'UL 330B Approved',
                                        'value' => 3180,
                                      ),
                                      258 => 
                                      array (
                                        'key' => 'UL 94Hb Approved',
                                        'value' => 759984,
                                      ),
                                      259 => 
                                      array (
                                        'key' => 'UL Certified',
                                        'value' => 759985,
                                      ),
                                      260 => 
                                      array (
                                        'key' => 'Ultra-Low Permeation',
                                        'value' => 3181,
                                      ),
                                      261 => 
                                      array (
                                        'key' => 'Uniform cross section means less drive wear',
                                        'value' => 760061,
                                      ),
                                      262 => 
                                      array (
                                        'key' => 'Universal Fuel Compatibility',
                                        'value' => 3182,
                                      ),
                                      263 => 
                                      array (
                                        'key' => 'Universal tooth profile drops into existing sprockets',
                                        'value' => 760062,
                                      ),
                                      264 => 
                                      array (
                                        'key' => 'Universal tooth profile fits into existing RPP sprockets',
                                        'value' => 760063,
                                      ),
                                      265 => 
                                      array (
                                        'key' => 'Universal tooth profile, fits into existing HTD and RPP sprockets',
                                        'value' => 760064,
                                      ),
                                      266 => 
                                      array (
                                        'key' => 'USDA / FDA Certified',
                                        'value' => 759986,
                                      ),
                                      267 => 
                                      array (
                                        'key' => 'Vacuum Rated',
                                        'value' => 3183,
                                      ),
                                      268 => 
                                      array (
                                        'key' => 'Versatile Chemical Hose that Handles Petroleum Based Products',
                                        'value' => 3184,
                                      ),
                                      269 => 
                                      array (
                                        'key' => 'Visibility of Flow',
                                        'value' => 3185,
                                      ),
                                      270 => 
                                      array (
                                        'key' => 'Withstand high loading forces',
                                        'value' => 760065,
                                      ),
                                    ),
                                     'width' => 250,
                                     'height' => '',
                                     'maxItems' => 10,
                                     'renderType' => 'tags',
                                     'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
                                     'optionsProviderData' => 'Features|Name',
                                     'queryColumnType' => 'text',
                                     'columnType' => 'text',
                                     'phpdocType' => 'array',
                                     'dynamicOptions' => false,
                                     'name' => 'FeaturesBenefitsBulletPoint',
                                     'title' => 'Features & Benefits Bullet Points',
                                     'tooltip' => 'Max 10 allowed',
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
                                  1 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'fieldtype' => 'select',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => 'Base',
                                        'value' => 'base',
                                      ),
                                      1 => 
                                      array (
                                        'key' => 'Skeleton',
                                        'value' => 'skeleton',
                                      ),
                                      2 => 
                                      array (
                                        'key' => 'Fert',
                                        'value' => 'fert',
                                      ),
                                    ),
                                     'width' => 250,
                                     'defaultValue' => '',
                                     'optionsProviderClass' => '',
                                     'optionsProviderData' => '',
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'dynamicOptions' => false,
                                     'name' => 'productType',
                                     'title' => 'ProductType',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => true,
                                     'visibleGridView' => false,
                                     'visibleSearch' => false,
                                     'defaultValueGenerator' => '',
                                  )),
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                     'fieldtype' => 'select',
                                     'options' => 
                                    array (
                                      0 => 
                                      array (
                                        'key' => 'PTGEU',
                                        'value' => 'PTGEU',
                                      ),
                                    ),
                                     'width' => 250,
                                     'defaultValue' => 'PTGEU',
                                     'optionsProviderClass' => '',
                                     'optionsProviderData' => '',
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'dynamicOptions' => false,
                                     'name' => 'businessUnit',
                                     'title' => 'Business Unit',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:20px;',
                                     'permissions' => NULL,
                                     'datatype' => 'data',
                                     'relationType' => false,
                                     'invisible' => true,
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                         'fieldtype' => 'localizedfields',
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Localizedfield',
                         'childs' => 
                        array (
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
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'fieldtype' => 'fieldcontainer',
                                 'labelWidth' => 250,
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
                                array (
                                  0 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                     'fieldtype' => 'fieldcontainer',
                                     'labelWidth' => 150,
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
                                    array (
                                      0 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                                         'fieldtype' => 'wysiwyg',
                                         'width' => 425,
                                         'height' => 100,
                                         'queryColumnType' => 'longtext',
                                         'columnType' => 'longtext',
                                         'phpdocType' => 'string',
                                         'toolbarConfig' => '',
                                         'excludeFromSearchIndex' => false,
                                         'name' => 'shortDescription',
                                         'title' => 'Marketing / Short Description',
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
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                         'fieldtype' => 'input',
                                         'width' => 250,
                                         'defaultValue' => NULL,
                                         'queryColumnType' => 'varchar',
                                         'columnType' => 'varchar',
                                         'columnLength' => 190,
                                         'phpdocType' => 'string',
                                         'regex' => '',
                                         'unique' => false,
                                         'showCharCount' => false,
                                         'name' => 'webDiscription',
                                         'title' => 'Web Description',
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
                                     'labelWidth' => 150,
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
                                    array (
                                      0 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                                         'fieldtype' => 'wysiwyg',
                                         'width' => 425,
                                         'height' => 100,
                                         'queryColumnType' => 'longtext',
                                         'columnType' => 'longtext',
                                         'phpdocType' => 'string',
                                         'toolbarConfig' => '',
                                         'excludeFromSearchIndex' => false,
                                         'name' => 'longDescription',
                                         'title' => 'Marketing / Long Description',
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
                                      1 => 
                                      Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                         'fieldtype' => 'textarea',
                                         'width' => 250,
                                         'height' => 100,
                                         'maxLength' => NULL,
                                         'showCharCount' => false,
                                         'excludeFromSearchIndex' => false,
                                         'queryColumnType' => 'longtext',
                                         'columnType' => 'longtext',
                                         'phpdocType' => 'string',
                                         'name' => 'legalText',
                                         'title' => 'Legal Text (Term & Conditions)',
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
                        ),
                         'name' => 'localizedfields',
                         'region' => NULL,
                         'layout' => NULL,
                         'title' => '',
                         'width' => '',
                         'height' => '',
                         'maxTabs' => NULL,
                         'labelWidth' => NULL,
                         'border' => true,
                         'provideSplitView' => false,
                         'tabPosition' => NULL,
                         'hideLabelsWhenTabsReached' => NULL,
                         'referencedFields' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                             'fieldtype' => 'localizedfields',
                             'phpdocType' => '\\Pimcore\\Model\\DataObject\\Localizedfield',
                             'childs' => 
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                 'fieldtype' => 'textarea',
                                 'width' => 250,
                                 'height' => 100,
                                 'maxLength' => NULL,
                                 'showCharCount' => false,
                                 'excludeFromSearchIndex' => false,
                                 'queryColumnType' => 'longtext',
                                 'columnType' => 'longtext',
                                 'phpdocType' => 'string',
                                 'name' => 'sapDescription',
                                 'title' => 'SAP Description',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                             'name' => 'localizedfields',
                             'region' => NULL,
                             'layout' => NULL,
                             'title' => '',
                             'width' => '',
                             'height' => '',
                             'maxTabs' => NULL,
                             'labelWidth' => NULL,
                             'border' => true,
                             'provideSplitView' => false,
                             'tabPosition' => NULL,
                             'hideLabelsWhenTabsReached' => NULL,
                             'referencedFields' => 
                            array (
                            ),
                             'fieldDefinitionsCache' => NULL,
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => false,
                             'index' => NULL,
                             'locked' => false,
                             'style' => '',
                             'permissions' => NULL,
                             'datatype' => 'data',
                             'relationType' => false,
                             'invisible' => false,
                             'visibleGridView' => true,
                             'visibleSearch' => true,
                          )),
                          1 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                             'fieldtype' => 'localizedfields',
                             'phpdocType' => '\\Pimcore\\Model\\DataObject\\Localizedfield',
                             'childs' => 
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'fieldtype' => 'input',
                                 'width' => 600,
                                 'defaultValue' => NULL,
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 190,
                                 'phpdocType' => 'string',
                                 'regex' => '',
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'name' => 'CompletenessPercentage',
                                 'title' => 'Completeness Percentage',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'padding: 10px; background-color: #d9edf7; border-color: #bce8f1 !important; color: #31708f;',
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
                                 'width' => 600,
                                 'height' => 500,
                                 'maxLength' => NULL,
                                 'showCharCount' => false,
                                 'excludeFromSearchIndex' => false,
                                 'queryColumnType' => 'longtext',
                                 'columnType' => 'longtext',
                                 'phpdocType' => 'string',
                                 'name' => 'EmptyFields',
                                 'title' => 'Empty Fields',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'padding: 10px; background-color: pink; border-color: #bce8f1 !important; color: #31708f;',
                                 'permissions' => NULL,
                                 'datatype' => 'data',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                              )),
                            ),
                             'name' => 'localizedfields',
                             'region' => NULL,
                             'layout' => NULL,
                             'title' => '',
                             'width' => '',
                             'height' => '',
                             'maxTabs' => NULL,
                             'labelWidth' => 200,
                             'border' => false,
                             'provideSplitView' => false,
                             'tabPosition' => NULL,
                             'hideLabelsWhenTabsReached' => -1,
                             'referencedFields' => 
                            array (
                            ),
                             'fieldDefinitionsCache' => NULL,
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => false,
                             'index' => NULL,
                             'locked' => false,
                             'style' => '',
                             'permissions' => NULL,
                             'datatype' => 'data',
                             'relationType' => false,
                             'invisible' => false,
                             'visibleGridView' => true,
                             'visibleSearch' => true,
                          )),
                        ),
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => false,
                         'index' => NULL,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'relationType' => false,
                         'invisible' => false,
                         'visibleGridView' => true,
                         'visibleSearch' => true,
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
                     'name' => 'Imported From SAP',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Imported From SAP​',
                     'width' => NULL,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'childs' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                         'fieldtype' => 'text',
                         'html' => 'Imported From SAP​',
                         'renderingClass' => '',
                         'renderingData' => '',
                         'border' => false,
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'color:black;padding: 10px !important; background-color: #28a050 !important;border-color: #bce8f1 !important',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                        ),
                         'locked' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                         'fieldtype' => 'fieldcontainer',
                         'labelWidth' => 250,
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
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'fieldtype' => 'fieldcontainer',
                             'labelWidth' => 150,
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
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                 'fieldtype' => 'select',
                                 'options' => 
                                array (
                                  0 => 
                                  array (
                                    'key' => 'High',
                                    'value' => 'High',
                                  ),
                                  1 => 
                                  array (
                                    'key' => 'Advance',
                                    'value' => 'Advance',
                                  ),
                                  2 => 
                                  array (
                                    'key' => 'Standard',
                                    'value' => 'Standard',
                                  ),
                                ),
                                 'width' => 250,
                                 'defaultValue' => '',
                                 'optionsProviderClass' => '',
                                 'optionsProviderData' => '',
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 30,
                                 'phpdocType' => 'string',
                                 'dynamicOptions' => false,
                                 'name' => 'performance',
                                 'title' => 'Performance',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                                array (
                                  0 => 
                                  array (
                                    'key' => 'EPDM',
                                    'value' => 'EPDM',
                                  ),
                                  1 => 
                                  array (
                                    'key' => 'HNBR',
                                    'value' => 'HNBR',
                                  ),
                                  2 => 
                                  array (
                                    'key' => 'PU',
                                    'value' => 'PU',
                                  ),
                                  3 => 
                                  array (
                                    'key' => 'CR',
                                    'value' => 'CR',
                                  ),
                                  4 => 
                                  array (
                                    'key' => 'PBD',
                                    'value' => 'PBD',
                                  ),
                                  5 => 
                                  array (
                                    'key' => 'NR / SBR',
                                    'value' => 'NR / SBR',
                                  ),
                                ),
                                 'width' => 250,
                                 'defaultValue' => '',
                                 'optionsProviderClass' => '',
                                 'optionsProviderData' => '',
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 190,
                                 'phpdocType' => 'string',
                                 'dynamicOptions' => false,
                                 'name' => 'material',
                                 'title' => 'Material / Compound ',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                                 'width' => 250,
                                 'defaultValue' => NULL,
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 190,
                                 'phpdocType' => 'string',
                                 'regex' => '',
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'name' => 'fabricColor',
                                 'title' => 'Fabric Color',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                                array (
                                  0 => 
                                  array (
                                    'key' => 'Grey',
                                    'value' => 'Grey',
                                  ),
                                  1 => 
                                  array (
                                    'key' => 'Black',
                                    'value' => 'Black',
                                  ),
                                  2 => 
                                  array (
                                    'key' => 'Blue',
                                    'value' => 'Blue',
                                  ),
                                  3 => 
                                  array (
                                    'key' => 'Yellow',
                                    'value' => 'Yellow',
                                  ),
                                ),
                                 'width' => 250,
                                 'defaultValue' => '',
                                 'optionsProviderClass' => '',
                                 'optionsProviderData' => '',
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 100,
                                 'phpdocType' => 'string',
                                 'dynamicOptions' => false,
                                 'name' => 'Color',
                                 'title' => 'Color',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                                 'width' => 250,
                                 'defaultValue' => NULL,
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 20,
                                 'phpdocType' => 'string',
                                 'regex' => '',
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'name' => 'heatAndOilResistant',
                                 'title' => 'Heat & Oil Resistant',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                                 'width' => 250,
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
                                 'name' => 'beltHardness',
                                 'title' => 'Belt Hardness',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                              Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::__set_state(array(
                                 'fieldtype' => 'multiselect',
                                 'options' => 
                                array (
                                  0 => 
                                  array (
                                    'key' => 'Cord',
                                    'value' => 'Cord',
                                  ),
                                  1 => 
                                  array (
                                    'key' => 'Polyamide',
                                    'value' => 'Poly',
                                  ),
                                  2 => 
                                  array (
                                    'key' => 'Polyester',
                                    'value' => 'Polyster',
                                  ),
                                  3 => 
                                  array (
                                    'key' => 'Aramid',
                                    'value' => 'Aramid',
                                  ),
                                  4 => 
                                  array (
                                    'key' => 'Carbon',
                                    'value' => 'Carbon',
                                  ),
                                  5 => 
                                  array (
                                    'key' => 'Carbon-Glass',
                                    'value' => 'Carbon-Glass',
                                  ),
                                  6 => 
                                  array (
                                    'key' => 'Glass',
                                    'value' => 'Glass',
                                  ),
                                  7 => 
                                  array (
                                    'key' => 'Steel',
                                    'value' => 'Steel',
                                  ),
                                ),
                                 'width' => 250,
                                 'height' => '',
                                 'maxItems' => 1,
                                 'renderType' => 'tags',
                                 'optionsProviderClass' => '',
                                 'optionsProviderData' => '',
                                 'queryColumnType' => 'text',
                                 'columnType' => 'text',
                                 'phpdocType' => 'array',
                                 'dynamicOptions' => false,
                                 'name' => 'reinforcement',
                                 'title' => 'Reinforcement / Cord',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                             'labelWidth' => 150,
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
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'fieldtype' => 'input',
                                 'width' => 250,
                                 'defaultValue' => NULL,
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 50,
                                 'phpdocType' => 'string',
                                 'regex' => '',
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'name' => 'ProductName',
                                 'title' => 'Product Name',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                                 'fieldtype' => 'manyToOneRelation',
                                 'width' => 250,
                                 'assetUploadPath' => '',
                                 'relationType' => true,
                                 'queryColumnType' => 
                                array (
                                  'id' => 'int(11)',
                                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                                ),
                                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                                 'objectsAllowed' => true,
                                 'assetsAllowed' => false,
                                 'assetTypes' => 
                                array (
                                ),
                                 'documentsAllowed' => false,
                                 'documentTypes' => 
                                array (
                                ),
                                 'classes' => 
                                array (
                                  0 => 
                                  array (
                                    'classes' => 'PTGEUMaterialGroup',
                                  ),
                                ),
                                 'pathFormatterClass' => '',
                                 'name' => 'materialGroup',
                                 'title' => 'Material Group',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:20px;',
                                 'permissions' => NULL,
                                 'datatype' => 'data',
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                              )),
                              2 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                                 'fieldtype' => 'manyToOneRelation',
                                 'width' => 250,
                                 'assetUploadPath' => '',
                                 'relationType' => true,
                                 'queryColumnType' => 
                                array (
                                  'id' => 'int(11)',
                                  'type' => 'enum(\'document\',\'asset\',\'object\')',
                                ),
                                 'phpdocType' => '\\Pimcore\\Model\\Document\\Page | \\Pimcore\\Model\\Document\\Snippet | \\Pimcore\\Model\\Document | \\Pimcore\\Model\\Asset | \\Pimcore\\Model\\DataObject\\AbstractObject',
                                 'objectsAllowed' => true,
                                 'assetsAllowed' => false,
                                 'assetTypes' => 
                                array (
                                ),
                                 'documentsAllowed' => false,
                                 'documentTypes' => 
                                array (
                                ),
                                 'classes' => 
                                array (
                                  0 => 
                                  array (
                                    'classes' => 'PTGEUCountryOfOrigin',
                                  ),
                                ),
                                 'pathFormatterClass' => '',
                                 'name' => 'countryOfOrigin',
                                 'title' => 'Country Of Origin',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:20px;',
                                 'permissions' => NULL,
                                 'datatype' => 'data',
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                              )),
                              3 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'fieldtype' => 'input',
                                 'width' => 250,
                                 'defaultValue' => NULL,
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 30,
                                 'phpdocType' => 'string',
                                 'regex' => '',
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'name' => 'quality',
                                 'title' => 'Quality',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'fieldtype' => 'input',
                                 'width' => 250,
                                 'defaultValue' => NULL,
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 190,
                                 'phpdocType' => 'string',
                                 'regex' => '',
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'name' => 'fabricType',
                                 'title' => 'FabricType',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                              5 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                 'fieldtype' => 'select',
                                 'options' => 
                                array (
                                  0 => 
                                  array (
                                    'key' => 'Banded Belt - Classical',
                                    'value' => 13095627,
                                  ),
                                  1 => 
                                  array (
                                    'key' => 'Banded Belt - Narrow',
                                    'value' => 13095628,
                                  ),
                                  2 => 
                                  array (
                                    'key' => 'Dual Poly V Belts',
                                    'value' => 13095639,
                                  ),
                                  3 => 
                                  array (
                                    'key' => 'Dual Timing Belts',
                                    'value' => 13095638,
                                  ),
                                  4 => 
                                  array (
                                    'key' => 'Dual V Belts',
                                    'value' => 13095640,
                                  ),
                                  5 => 
                                  array (
                                    'key' => 'Flat Belts',
                                    'value' => 13095636,
                                  ),
                                  6 => 
                                  array (
                                    'key' => 'Flat Belts - PU',
                                    'value' => 13095635,
                                  ),
                                  7 => 
                                  array (
                                    'key' => 'Metal Parts',
                                    'value' => 13095637,
                                  ),
                                  8 => 
                                  array (
                                    'key' => 'Open ended Belts - PU',
                                    'value' => 13095643,
                                  ),
                                  9 => 
                                  array (
                                    'key' => 'Open ended Belts - Rubber',
                                    'value' => 13095642,
                                  ),
                                  10 => 
                                  array (
                                    'key' => 'Poly V Belt',
                                    'value' => 13095626,
                                  ),
                                  11 => 
                                  array (
                                    'key' => 'Single',
                                    'value' => 13098859,
                                  ),
                                  12 => 
                                  array (
                                    'key' => 'Single Classical - Raw Edge',
                                    'value' => 13095632,
                                  ),
                                  13 => 
                                  array (
                                    'key' => 'Single Classical - Wrapped',
                                    'value' => 13095631,
                                  ),
                                  14 => 
                                  array (
                                    'key' => 'Single Narrow - Raw Edge',
                                    'value' => 13095633,
                                  ),
                                  15 => 
                                  array (
                                    'key' => 'Single Narrow - Wrapped',
                                    'value' => 13095634,
                                  ),
                                  16 => 
                                  array (
                                    'key' => 'Timing Belts - PU',
                                    'value' => 13095630,
                                  ),
                                  17 => 
                                  array (
                                    'key' => 'Timing Belts - Rubber',
                                    'value' => 13095629,
                                  ),
                                  18 => 
                                  array (
                                    'key' => 'VSB',
                                    'value' => 13095641,
                                  ),
                                ),
                                 'width' => 250,
                                 'defaultValue' => '',
                                 'optionsProviderClass' => 'AppBundle\\OptionProvider\\GenericOptionsProvider',
                                 'optionsProviderData' => 'PTGEUBeltType|beltType',
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 30,
                                 'phpdocType' => 'string',
                                 'dynamicOptions' => false,
                                 'name' => 'beltType',
                                 'title' => 'Belt Type',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                              6 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                 'fieldtype' => 'select',
                                 'options' => 
                                array (
                                  0 => 
                                  array (
                                    'key' => ' Yes acc. ISO 1813',
                                    'value' => ' Yes acc. ISO 1813',
                                  ),
                                  1 => 
                                  array (
                                    'key' => 'Yes acc. ISO 9563',
                                    'value' => 'Yes acc. ISO 9563',
                                  ),
                                  2 => 
                                  array (
                                    'key' => 'Yes',
                                    'value' => 'Yes',
                                  ),
                                  3 => 
                                  array (
                                    'key' => 'No',
                                    'value' => 'No',
                                  ),
                                ),
                                 'width' => 250,
                                 'defaultValue' => '',
                                 'optionsProviderClass' => '',
                                 'optionsProviderData' => '',
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 30,
                                 'phpdocType' => 'string',
                                 'dynamicOptions' => false,
                                 'name' => 'staticConductive',
                                 'title' => 'Static Conductive',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                      2 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
                         'fieldtype' => 'fieldset',
                         'labelWidth' => 100,
                         'name' => 'Temperatures',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => 'Temperatures',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => true,
                         'collapsed' => true,
                         'bodyStyle' => '',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'fieldtype' => 'fieldcontainer',
                             'labelWidth' => 250,
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
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                                 'fieldtype' => 'fieldcontainer',
                                 'labelWidth' => 150,
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
                                array (
                                  0 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 250,
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
                                     'name' => 'minimumTemperatureF',
                                     'title' => 'Min Temp °F',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:10px;',
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
                                     'width' => 250,
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
                                     'name' => 'maximumTemperatureF',
                                     'title' => 'Max temp °F',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:10px;',
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
                                     'width' => 250,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'rangeTemperatureF',
                                     'title' => 'Temperature Range (°F)',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
                                     'index' => false,
                                     'locked' => false,
                                     'style' => 'margin-left:10px;',
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
                                 'labelWidth' => 150,
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
                                array (
                                  0 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 250,
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
                                     'name' => 'minimumTemperatureC',
                                     'title' => 'Min Temp °C',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
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
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                     'fieldtype' => 'numeric',
                                     'width' => 250,
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
                                     'name' => 'maximumTemperatureC',
                                     'title' => 'Max temp °C',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
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
                                  2 => 
                                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                     'fieldtype' => 'input',
                                     'width' => 250,
                                     'defaultValue' => NULL,
                                     'queryColumnType' => 'varchar',
                                     'columnType' => 'varchar',
                                     'columnLength' => 190,
                                     'phpdocType' => 'string',
                                     'regex' => '',
                                     'unique' => false,
                                     'showCharCount' => false,
                                     'name' => 'rangeTemperatureC',
                                     'title' => 'Temperature Range (°C)',
                                     'tooltip' => '',
                                     'mandatory' => false,
                                     'noteditable' => true,
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
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 150,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'SIOP Data',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Product Hierarchy Data',
                     'width' => NULL,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'childs' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                         'fieldtype' => 'input',
                         'width' => 226,
                         'defaultValue' => NULL,
                         'queryColumnType' => 'varchar',
                         'columnType' => 'varchar',
                         'columnLength' => 190,
                         'phpdocType' => 'string',
                         'regex' => '',
                         'unique' => false,
                         'showCharCount' => false,
                         'name' => 'siopFullCode',
                         'title' => 'Product Hierarchy Full Code',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => true,
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'id,key,code,fullCode,description',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'PTGEUProductHierarchy',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'hierarchyLevel1',
                         'title' => 'Product Hierarchy Level 1',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
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
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'id,key,code,fullCode,description',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'PTGEUProductHierarchy',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'hierarchyLevel2',
                         'title' => 'Product Hierarchy Level 2',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'id,key,code,fullCode,description',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'PTGEUProductHierarchy',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'hierarchyLevel3',
                         'title' => 'Product Hierarchy Level 3',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      4 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'id,key,code,fullCode,description',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'PTGEUProductHierarchy',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'hierarchyLevel4',
                         'title' => 'Product Hierarchy Level 4',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      5 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'id,key,code,fullCode,description',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'PTGEUProductHierarchy',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'hierarchyLevel5',
                         'title' => 'Product Hierarchy Level 5',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      6 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'id,key,code,fullCode,description',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'PTGEUProductHierarchy',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'hierarchyLevel6',
                         'title' => 'Product Hierarchy Level 6',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
                      )),
                      7 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'manyToManyObjectRelation',
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => 'id,key,code,fullCode,description',
                         'allowToCreateNewObject' => false,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                          0 => 
                          array (
                            'classes' => 'PTGEUProductHierarchy',
                          ),
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'hierarchyLevel7',
                         'title' => 'Product Hierarchy Level 7',
                         'tooltip' => '',
                         'mandatory' => false,
                         'noteditable' => true,
                         'index' => false,
                         'locked' => false,
                         'style' => '',
                         'permissions' => NULL,
                         'datatype' => 'data',
                         'invisible' => false,
                         'visibleGridView' => false,
                         'visibleSearch' => false,
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
                     'name' => 'Category Specific Data',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Category Specific Data',
                     'width' => NULL,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'childs' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks::__set_state(array(
                         'fieldtype' => 'objectbricks',
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Objectbrick',
                         'allowedTypes' => 
                        array (
                          0 => 'PTGEUCommonBase',
                          1 => 'PTGEUVBeltsBase',
                        ),
                         'maxItems' => '',
                         'border' => false,
                         'name' => 'base',
                         'title' => '',
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
                     'icon' => '',
                  )),
                ),
                 'locked' => false,
              )),
            ),
             'locked' => false,
             'icon' => '/bundles/pimcoreadmin/img/icon/tag_yellow.png',
          )),
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'Skeleton',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Skeleton Data',
             'width' => NULL,
             'height' => NULL,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'permissions' => NULL,
             'childs' => 
            array (
              0 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
                 'fieldtype' => 'tabpanel',
                 'border' => false,
                 'tabPosition' => NULL,
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
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'Imported From SAP',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Imported From SAP​',
                     'width' => NULL,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'childs' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                         'fieldtype' => 'text',
                         'html' => 'Imported From SAP​​',
                         'renderingClass' => '',
                         'renderingData' => '',
                         'border' => false,
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'color:black;padding: 10px !important; background-color: #28a050 !important;border-color: #bce8f1 !important',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                        ),
                         'locked' => false,
                      )),
                      1 => 
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
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'fieldtype' => 'fieldcontainer',
                             'labelWidth' => 175,
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
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'fieldtype' => 'input',
                                 'width' => 250,
                                 'defaultValue' => NULL,
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 30,
                                 'phpdocType' => 'string',
                                 'regex' => '',
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'name' => 'profile',
                                 'title' => 'Profile',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:10px;',
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
                                 'width' => 250,
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
                                 'name' => 'beltAngle',
                                 'title' => 'Belt Angle',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:10px;',
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
                                 'width' => 250,
                                 'defaultValue' => NULL,
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 190,
                                 'phpdocType' => 'string',
                                 'regex' => '',
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'name' => 'maxSpeed',
                                 'title' => 'Max Speed',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:10px;',
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
                                 'width' => 250,
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
                                 'name' => 'minPulleyDia',
                                 'title' => 'Min. pulley dia',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:10px;',
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
                                 'width' => 250,
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
                                 'name' => 'minOutsidePulleyDia',
                                 'title' => 'Min. outside pulley dia',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-left:10px;',
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
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'Category Specific Data',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Category Specific Data',
                     'width' => NULL,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'childs' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks::__set_state(array(
                         'fieldtype' => 'objectbricks',
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Objectbrick',
                         'allowedTypes' => 
                        array (
                          0 => 'PTGEUFlatBeltsSkeleton',
                        ),
                         'maxItems' => '',
                         'border' => false,
                         'name' => 'skeleton',
                         'title' => '',
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
                     'icon' => '',
                  )),
                ),
                 'locked' => false,
              )),
            ),
             'locked' => false,
             'icon' => '/bundles/pimcoreadmin/img/icon/tag_blue.png',
          )),
          2 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'Fert',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Finished Goods Data',
             'width' => NULL,
             'height' => NULL,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'permissions' => NULL,
             'childs' => 
            array (
              0 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
                 'fieldtype' => 'tabpanel',
                 'border' => false,
                 'tabPosition' => NULL,
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
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Finished Good Attributes',
                     'width' => NULL,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'childs' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                         'fieldtype' => 'text',
                         'html' => 'Imported From SAP​​',
                         'renderingClass' => '',
                         'renderingData' => '',
                         'border' => false,
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'color:black;padding: 10px !important; background-color: #28a050 !important;border-color: #bce8f1 !important',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                        ),
                         'locked' => false,
                      )),
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                         'fieldtype' => 'fieldcontainer',
                         'labelWidth' => 150,
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
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'fieldtype' => 'fieldcontainer',
                             'labelWidth' => 150,
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
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'fieldtype' => 'input',
                                 'width' => 220,
                                 'defaultValue' => NULL,
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 30,
                                 'phpdocType' => 'string',
                                 'regex' => '',
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'name' => 'articleNumber',
                                 'title' => 'SAP Code / Material Number',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
                                 'index' => true,
                                 'locked' => false,
                                 'style' => '',
                                 'permissions' => NULL,
                                 'datatype' => 'data',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => true,
                                 'visibleSearch' => true,
                                 'defaultValueGenerator' => '',
                              )),
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'fieldtype' => 'input',
                                 'width' => 220,
                                 'defaultValue' => NULL,
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 14,
                                 'phpdocType' => 'string',
                                 'regex' => '',
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'name' => 'eanUpc',
                                 'title' => 'EAN / UPC',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                                 'width' => 220,
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
                                 'name' => 'netWeight',
                                 'title' => 'Net Weight',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                                array (
                                  0 => 
                                  array (
                                    'key' => 'LB',
                                    'value' => 'LB',
                                  ),
                                  1 => 
                                  array (
                                    'key' => 'G',
                                    'value' => 'G',
                                  ),
                                  2 => 
                                  array (
                                    'key' => 'KG',
                                    'value' => 'KG',
                                  ),
                                ),
                                 'width' => 220,
                                 'defaultValue' => '',
                                 'optionsProviderClass' => '',
                                 'optionsProviderData' => '',
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 190,
                                 'phpdocType' => 'string',
                                 'dynamicOptions' => false,
                                 'name' => 'weightUnit',
                                 'title' => 'Weight Unit',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                                 'width' => 220,
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
                                 'name' => 'listPrice',
                                 'title' => 'List Price',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => '',
                                 'permissions' => NULL,
                                 'datatype' => 'data',
                                 'relationType' => false,
                                 'invisible' => true,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                                 'defaultValueGenerator' => '',
                              )),
                              5 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'fieldtype' => 'input',
                                 'width' => 220,
                                 'defaultValue' => NULL,
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 190,
                                 'phpdocType' => 'string',
                                 'regex' => '',
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'name' => 'nominalLength',
                                 'title' => 'Nominal Length',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'fieldtype' => 'input',
                                 'width' => 220,
                                 'defaultValue' => NULL,
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 190,
                                 'phpdocType' => 'string',
                                 'regex' => '',
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'name' => 'sapDescriptionLanguage',
                                 'title' => 'SAP Description Language',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                              7 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'fieldtype' => 'input',
                                 'width' => 220,
                                 'defaultValue' => NULL,
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 190,
                                 'phpdocType' => 'string',
                                 'regex' => '',
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'name' => 'manufacturer',
                                 'title' => 'Manufacturer',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                              Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                                 'fieldtype' => 'numeric',
                                 'width' => 220,
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
                                 'name' => 'manufacturerPartNumber',
                                 'title' => 'Manufacturer Part Number',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                             'labelWidth' => 150,
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
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'fieldtype' => 'input',
                                 'width' => 220,
                                 'defaultValue' => NULL,
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 190,
                                 'phpdocType' => 'string',
                                 'regex' => '',
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'name' => 'oldMaterialCode',
                                 'title' => 'Old Material Code',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                                 'width' => 220,
                                 'defaultValue' => NULL,
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 30,
                                 'phpdocType' => 'string',
                                 'regex' => '',
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'name' => 'industryStandard',
                                 'title' => 'Industry Standard #',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                              2 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'fieldtype' => 'input',
                                 'width' => 220,
                                 'defaultValue' => NULL,
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 190,
                                 'phpdocType' => 'string',
                                 'regex' => '',
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'name' => 'beltTolerance',
                                 'title' => 'Belt Tolerance',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                                 'width' => 220,
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
                                 'name' => 'grossWeight',
                                 'title' => 'Gross Weight',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'fieldtype' => 'input',
                                 'width' => 220,
                                 'defaultValue' => NULL,
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 10,
                                 'phpdocType' => 'string',
                                 'regex' => '',
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'name' => 'din',
                                 'title' => 'DIN',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                              5 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'fieldtype' => 'input',
                                 'width' => 220,
                                 'defaultValue' => NULL,
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 190,
                                 'phpdocType' => 'string',
                                 'regex' => '',
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'name' => 'matchMakerLL',
                                 'title' => 'Match Maker L=L',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                              6 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                 'fieldtype' => 'select',
                                 'options' => 
                                array (
                                  0 => 
                                  array (
                                    'key' => 'USD',
                                    'value' => 'USD',
                                  ),
                                ),
                                 'width' => 220,
                                 'defaultValue' => '',
                                 'optionsProviderClass' => '',
                                 'optionsProviderData' => '',
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 190,
                                 'phpdocType' => 'string',
                                 'dynamicOptions' => false,
                                 'name' => 'Currency',
                                 'title' => 'Currency',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                              7 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'fieldtype' => 'input',
                                 'width' => 220,
                                 'defaultValue' => NULL,
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 3,
                                 'phpdocType' => 'string',
                                 'regex' => '',
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'name' => 'alternativeUnitOfMeasureForStockkeepingUnit',
                                 'title' => 'Alternative Unit of Measure for Stockkeeping Unit',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                      2 => 
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
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                             'fieldtype' => 'localizedfields',
                             'phpdocType' => '\\Pimcore\\Model\\DataObject\\Localizedfield',
                             'childs' => 
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                 'fieldtype' => 'textarea',
                                 'width' => 250,
                                 'height' => 100,
                                 'maxLength' => NULL,
                                 'showCharCount' => false,
                                 'excludeFromSearchIndex' => false,
                                 'queryColumnType' => 'longtext',
                                 'columnType' => 'longtext',
                                 'phpdocType' => 'string',
                                 'name' => 'sapDescription',
                                 'title' => 'SAP Description',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => true,
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
                             'name' => 'localizedfields',
                             'region' => NULL,
                             'layout' => NULL,
                             'title' => '',
                             'width' => '',
                             'height' => '',
                             'maxTabs' => NULL,
                             'labelWidth' => NULL,
                             'border' => true,
                             'provideSplitView' => false,
                             'tabPosition' => NULL,
                             'hideLabelsWhenTabsReached' => NULL,
                             'referencedFields' => 
                            array (
                            ),
                             'fieldDefinitionsCache' => NULL,
                             'tooltip' => '',
                             'mandatory' => false,
                             'noteditable' => false,
                             'index' => NULL,
                             'locked' => false,
                             'style' => '',
                             'permissions' => NULL,
                             'datatype' => 'data',
                             'relationType' => false,
                             'invisible' => false,
                             'visibleGridView' => true,
                             'visibleSearch' => true,
                          )),
                        ),
                         'locked' => false,
                      )),
                      3 => 
                      Pimcore\Model\DataObject\ClassDefinition\Layout\Text::__set_state(array(
                         'fieldtype' => 'text',
                         'html' => 'Enriched in PIM​',
                         'renderingClass' => '',
                         'renderingData' => '',
                         'border' => false,
                         'name' => 'Layout',
                         'type' => NULL,
                         'region' => NULL,
                         'title' => '',
                         'width' => NULL,
                         'height' => NULL,
                         'collapsible' => false,
                         'collapsed' => false,
                         'bodyStyle' => 'color:black;padding: 10px !important; background-color: #28a050 !important;border-color: #bce8f1 !important',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                        ),
                         'locked' => false,
                      )),
                      4 => 
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
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'fieldtype' => 'fieldcontainer',
                             'labelWidth' => 100,
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
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                                 'fieldtype' => 'input',
                                 'width' => 220,
                                 'defaultValue' => NULL,
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 190,
                                 'phpdocType' => 'string',
                                 'regex' => '',
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'name' => 'cadLINK',
                                 'title' => 'CAD LINK',
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
                              Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                 'fieldtype' => 'booleanSelect',
                                 'yesLabel' => 'yes',
                                 'noLabel' => 'no',
                                 'emptyLabel' => 'empty',
                                 'options' => 
                                array (
                                  0 => 
                                  array (
                                    'key' => 'empty',
                                    'value' => 0,
                                  ),
                                  1 => 
                                  array (
                                    'key' => 'yes',
                                    'value' => 1,
                                  ),
                                  2 => 
                                  array (
                                    'key' => 'no',
                                    'value' => -1,
                                  ),
                                ),
                                 'width' => 220,
                                 'queryColumnType' => 'tinyint(1) null',
                                 'columnType' => 'tinyint(1) null',
                                 'phpdocType' => 'boolean',
                                 'name' => 'cadFile',
                                 'title' => 'CAD File ',
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
                                 'yesLabel' => 'Y',
                                 'noLabel' => 'N',
                                 'emptyLabel' => 'Empty',
                                 'options' => 
                                array (
                                  0 => 
                                  array (
                                    'key' => 'Empty',
                                    'value' => 0,
                                  ),
                                  1 => 
                                  array (
                                    'key' => 'Y',
                                    'value' => 1,
                                  ),
                                  2 => 
                                  array (
                                    'key' => 'N',
                                    'value' => -1,
                                  ),
                                ),
                                 'width' => 220,
                                 'queryColumnType' => 'tinyint(1) null',
                                 'columnType' => 'tinyint(1) null',
                                 'phpdocType' => 'boolean',
                                 'name' => 'pdfDrawing',
                                 'title' => 'PDF Drawing (Y/N)',
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
                              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                 'fieldtype' => 'select',
                                 'options' => 
                                array (
                                  0 => 
                                  array (
                                    'key' => 'Synchronous, Positive Drive, timing, falcon, GTR',
                                    'value' => 13095867,
                                  ),
                                  1 => 
                                  array (
                                    'key' => 'flat, PU, polyflat',
                                    'value' => 13095868,
                                  ),
                                  2 => 
                                  array (
                                    'key' => 'Synchronous, Positive Drive, timing, silent, silentsync, HOT',
                                    'value' => 13095869,
                                  ),
                                  3 => 
                                  array (
                                    'key' => 'Synchronous, Positive Drive, timing, standard, synchrobelt',
                                    'value' => 13095870,
                                  ),
                                  4 => 
                                  array (
                                    'key' => 'Synchronous, Positive Drive, timing, PU, synchrochain, SCC',
                                    'value' => 13095871,
                                  ),
                                  5 => 
                                  array (
                                    'key' => 'Synchronous, Positive Drive, timing, color, synchrocolor',
                                    'value' => 13095872,
                                  ),
                                  6 => 
                                  array (
                                    'key' => 'Synchronous, Positive Drive, timing, color, synchrocolor, CXA',
                                    'value' => 13095873,
                                  ),
                                  7 => 
                                  array (
                                    'key' => 'Synchronous, Positive Drive, timing, color, synchrocolor, CXP',
                                    'value' => 13095874,
                                  ),
                                  8 => 
                                  array (
                                    'key' => 'Synchronous, Positive Drive, timing, color, synchrocolor, carbon',
                                    'value' => 13095875,
                                  ),
                                  9 => 
                                  array (
                                    'key' => 'Synchronous, Positive Drive, timing, PU, drive, synchrodrive',
                                    'value' => 13095876,
                                  ),
                                  10 => 
                                  array (
                                    'key' => 'Synchronous, Positive Drive, timing, PU, flex, synchroflex',
                                    'value' => 13095877,
                                  ),
                                  11 => 
                                  array (
                                    'key' => 'Synchronous, Positive Drive, timing, PU, flex, synchroflex, GEN III',
                                    'value' => 13095878,
                                  ),
                                  12 => 
                                  array (
                                    'key' => 'Synchronous, Positive Drive, timing, force, synchroforce, CXP',
                                    'value' => 13095879,
                                  ),
                                  13 => 
                                  array (
                                    'key' => 'Synchronous, Positive Drive, timing, force, synchroforce, CXA',
                                    'value' => 13095880,
                                  ),
                                  14 => 
                                  array (
                                    'key' => 'Synchronous, Positive Drive, timing, force, carbon, synchroforce',
                                    'value' => 13095881,
                                  ),
                                  15 => 
                                  array (
                                    'key' => 'Synchronous, Positive Drive, timing, force, extreme, synchroforce',
                                    'value' => 13095882,
                                  ),
                                  16 => 
                                  array (
                                    'key' => 'Synchronous, Positive Drive, timing, open end, line, synchroline',
                                    'value' => 13095883,
                                  ),
                                  17 => 
                                  array (
                                    'key' => 'Synchronous, Positive Drive, timing, open end, line, synchroline, CXP',
                                    'value' => 13095884,
                                  ),
                                  18 => 
                                  array (
                                    'key' => 'hybrid, special, synchrorib',
                                    'value' => 13095885,
                                  ),
                                  19 => 
                                  array (
                                    'key' => 'hybrid, special, synchrorib, CXP',
                                    'value' => 13095886,
                                  ),
                                  20 => 
                                  array (
                                    'key' => 'hybrid, special, synchrorib, CXA',
                                    'value' => 13095887,
                                  ),
                                  21 => 
                                  array (
                                    'key' => 'double sided, twin, synchrotwin',
                                    'value' => 13095888,
                                  ),
                                  22 => 
                                  array (
                                    'key' => 'double sided, twin, synchrotwin, CXP',
                                    'value' => 13095889,
                                  ),
                                  23 => 
                                  array (
                                    'key' => 'double sided, twin, synchrotwin, CXA',
                                    'value' => 13095890,
                                  ),
                                  24 => 
                                  array (
                                    'key' => 'friction, V-belt, V, standard ',
                                    'value' => 13095891,
                                  ),
                                  25 => 
                                  array (
                                    'key' => 'friction, V-belt, V, advance',
                                    'value' => 13095892,
                                  ),
                                  26 => 
                                  array (
                                    'key' => 'friction, V-belt, V, double sided, dual',
                                    'value' => 13095893,
                                  ),
                                  27 => 
                                  array (
                                    'key' => 'friction, raw edge, V-belt, V, FO, standard',
                                    'value' => 13095894,
                                  ),
                                  28 => 
                                  array (
                                    'key' => 'friction, raw edge, V-belt, V, FO, pioneer',
                                    'value' => 13095895,
                                  ),
                                  29 => 
                                  array (
                                    'key' => 'banded, V-belt, V, multi, multibelt, standard',
                                    'value' => 13095896,
                                  ),
                                  30 => 
                                  array (
                                    'key' => 'banded, V-belt, V, multi, multibelt, advance',
                                    'value' => 13095897,
                                  ),
                                  31 => 
                                  array (
                                    'key' => 'banded, V-belt, V, multi, multibelt, power, ZAR',
                                    'value' => 13095898,
                                  ),
                                  32 => 
                                  array (
                                    'key' => 'banded, raw edge, V-belt, V, multi, multibelt, FO, standard',
                                    'value' => 13095899,
                                  ),
                                  33 => 
                                  array (
                                    'key' => 'banded, raw edge, V-belt, V, multi, multibelt, FO, advance',
                                    'value' => 13095900,
                                  ),
                                  34 => 
                                  array (
                                    'key' => 'poly-V, multi, multirib ',
                                    'value' => 13095901,
                                  ),
                                  35 => 
                                  array (
                                    'key' => 'poly-V, multi, multirib, power, ZAR',
                                    'value' => 13095902,
                                  ),
                                  36 => 
                                  array (
                                    'key' => 'poly-V, multi, multirib, elast',
                                    'value' => 13095903,
                                  ),
                                  37 => 
                                  array (
                                    'key' => 'poly-V, multi, multirib, double sided, dual',
                                    'value' => 13095904,
                                  ),
                                  38 => 
                                  array (
                                    'key' => 'V-belt, V, power, ZAR',
                                    'value' => 13095905,
                                  ),
                                  39 => 
                                  array (
                                    'key' => 'variable speed, variator, varispeed, VSB, advance',
                                    'value' => 13095906,
                                  ),
                                ),
                                 'width' => 220,
                                 'defaultValue' => '',
                                 'optionsProviderClass' => '\\PTGEU\\ProductBundle\\OptionProvider\\PTGEUSearchKeywordsOptionProvider',
                                 'optionsProviderData' => 'Search Keywords|Id',
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 190,
                                 'phpdocType' => 'string',
                                 'dynamicOptions' => false,
                                 'name' => 'searchKeywords',
                                 'title' => 'Search Keywords',
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
                              Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                                 'fieldtype' => 'textarea',
                                 'width' => 220,
                                 'height' => 80,
                                 'maxLength' => NULL,
                                 'showCharCount' => false,
                                 'excludeFromSearchIndex' => false,
                                 'queryColumnType' => 'longtext',
                                 'columnType' => 'longtext',
                                 'phpdocType' => 'string',
                                 'name' => 'CategoryDescriptionCatalog',
                                 'title' => 'Category Description Catalog',
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
                             'labelWidth' => 150,
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
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\BooleanSelect::__set_state(array(
                                 'fieldtype' => 'booleanSelect',
                                 'yesLabel' => 'Y',
                                 'noLabel' => 'N',
                                 'emptyLabel' => 'Empty',
                                 'options' => 
                                array (
                                  0 => 
                                  array (
                                    'key' => 'Empty',
                                    'value' => 0,
                                  ),
                                  1 => 
                                  array (
                                    'key' => 'Y',
                                    'value' => 1,
                                  ),
                                  2 => 
                                  array (
                                    'key' => 'N',
                                    'value' => -1,
                                  ),
                                ),
                                 'width' => 220,
                                 'queryColumnType' => 'tinyint(1) null',
                                 'columnType' => 'tinyint(1) null',
                                 'phpdocType' => 'boolean',
                                 'name' => 'newItemFlagForCatalog',
                                 'title' => 'New Item Flag for Catalog',
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
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                                 'fieldtype' => 'select',
                                 'options' => 
                                array (
                                  0 => 
                                  array (
                                    'key' => 'Stock article',
                                    'value' => 13095907,
                                  ),
                                  1 => 
                                  array (
                                    'key' => 'Overall block',
                                    'value' => 13095908,
                                  ),
                                  2 => 
                                  array (
                                    'key' => 'Matchcode stock art.',
                                    'value' => 13095909,
                                  ),
                                  3 => 
                                  array (
                                    'key' => 'Remaining quantity',
                                    'value' => 13095910,
                                  ),
                                  4 => 
                                  array (
                                    'key' => 'On Demand Priv.Brand',
                                    'value' => 13095911,
                                  ),
                                  5 => 
                                  array (
                                    'key' => 'Stock art.Priv.Brand',
                                    'value' => 13095912,
                                  ),
                                  6 => 
                                  array (
                                    'key' => 'Matchcode China MTO',
                                    'value' => 13095913,
                                  ),
                                  7 => 
                                  array (
                                    'key' => 'Remaining quant. MTO',
                                    'value' => 13095914,
                                  ),
                                ),
                                 'width' => 220,
                                 'defaultValue' => '',
                                 'optionsProviderClass' => '\\PTGEU\\ProductBundle\\OptionProvider\\PTGEUVTLOptionProvider',
                                 'optionsProviderData' => 'Description|Id',
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 190,
                                 'phpdocType' => 'string',
                                 'dynamicOptions' => false,
                                 'name' => 'vtlStatus',
                                 'title' => 'VTL Status / Distribution Chain Level',
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
                                 'width' => 220,
                                 'defaultValue' => NULL,
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 190,
                                 'phpdocType' => 'string',
                                 'regex' => '',
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'name' => 'pdfLINK',
                                 'title' => 'PDF LINK',
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
                                 'width' => 220,
                                 'defaultValue' => NULL,
                                 'queryColumnType' => 'varchar',
                                 'columnType' => 'varchar',
                                 'columnLength' => 190,
                                 'phpdocType' => 'string',
                                 'regex' => '',
                                 'unique' => false,
                                 'showCharCount' => false,
                                 'name' => 'catalogFlag',
                                 'title' => 'Catalog Flag',
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
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'Category Specific Data',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Category Specific Data',
                     'width' => NULL,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'childs' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks::__set_state(array(
                         'fieldtype' => 'objectbricks',
                         'phpdocType' => '\\Pimcore\\Model\\DataObject\\Objectbrick',
                         'allowedTypes' => 
                        array (
                          0 => 'PTGEUCommonFert',
                          1 => 'PTGEUMetalFert',
                          2 => 'PTGEUPolyVFert',
                          3 => 'PTGEUVBeltsFert',
                          4 => 'PTGEUFlatBeltsFert',
                        ),
                         'maxItems' => '',
                         'border' => false,
                         'name' => 'fert',
                         'title' => '',
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
                     'icon' => '',
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'Plant And Sales Data',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Plant & Sales Data',
                     'width' => NULL,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'childs' => 
                    array (
                      0 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ReverseManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'reverseManyToManyObjectRelation',
                         'ownerClassName' => 'PTGEUSalesMaterialMaster',
                         'ownerClassId' => NULL,
                         'ownerFieldName' => 'Material',
                         'lazyLoading' => true,
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => NULL,
                         'allowToCreateNewObject' => true,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'salesData',
                         'title' => 'Sales Data',
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
                      1 => 
                      Pimcore\Model\DataObject\ClassDefinition\Data\ReverseManyToManyObjectRelation::__set_state(array(
                         'fieldtype' => 'reverseManyToManyObjectRelation',
                         'ownerClassName' => 'PTGEUPlantMaterialMaster',
                         'ownerClassId' => NULL,
                         'ownerFieldName' => 'Material',
                         'lazyLoading' => true,
                         'width' => '',
                         'height' => '',
                         'maxItems' => '',
                         'queryColumnType' => 'text',
                         'phpdocType' => 'array',
                         'relationType' => true,
                         'visibleFields' => NULL,
                         'allowToCreateNewObject' => true,
                         'optimizedAdminLoading' => false,
                         'visibleFieldDefinitions' => 
                        array (
                        ),
                         'classes' => 
                        array (
                        ),
                         'pathFormatterClass' => '',
                         'name' => 'plantData',
                         'title' => 'Plant Data',
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
                    ),
                     'locked' => false,
                     'icon' => '',
                  )),
                ),
                 'locked' => false,
              )),
            ),
             'locked' => false,
             'icon' => '/bundles/pimcoreadmin/img/icon/tag_green.png',
          )),
          3 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'Digital Assets',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Digital Assets',
             'width' => NULL,
             'height' => 1100,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'permissions' => NULL,
             'childs' => 
            array (
              0 => 
              Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
                 'fieldtype' => 'tabpanel',
                 'border' => false,
                 'tabPosition' => NULL,
                 'name' => 'Layout',
                 'type' => NULL,
                 'region' => NULL,
                 'title' => '',
                 'width' => NULL,
                 'height' => NULL,
                 'collapsible' => false,
                 'collapsed' => false,
                 'bodyStyle' => 'height:100%;',
                 'datatype' => 'layout',
                 'permissions' => NULL,
                 'childs' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Product Images',
                     'width' => NULL,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'childs' => 
                    array (
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
                         'bodyStyle' => 'margin:20px;',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'fieldtype' => 'fieldcontainer',
                             'labelWidth' => 100,
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
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'mainImage1',
                                 'title' => 'Main Image 1',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
                                 'permissions' => NULL,
                                 'datatype' => 'data',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                              )),
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'mainImage2',
                                 'title' => 'Main Image 2',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
                                 'permissions' => NULL,
                                 'datatype' => 'data',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                              )),
                              2 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'fullView1',
                                 'title' => 'Full View 1',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
                                 'permissions' => NULL,
                                 'datatype' => 'data',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                              )),
                              3 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'fullView2',
                                 'title' => 'Full View 2',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
                                 'permissions' => NULL,
                                 'datatype' => 'data',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                              )),
                              4 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'technicalDrawing1',
                                 'title' => 'Technical Drawing 1',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
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
                             'labelWidth' => 100,
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
                             'bodyStyle' => 'margin:20px;',
                             'datatype' => 'layout',
                             'permissions' => NULL,
                             'childs' => 
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'halfView1',
                                 'title' => 'Half View 1',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;margin-left:20px;',
                                 'permissions' => NULL,
                                 'datatype' => 'data',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                              )),
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'halfView2',
                                 'title' => 'Half View 2',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;margin-left:20px;',
                                 'permissions' => NULL,
                                 'datatype' => 'data',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                              )),
                              2 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'halfView3',
                                 'title' => 'Half View 3',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;margin-left:20px;',
                                 'permissions' => NULL,
                                 'datatype' => 'data',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                              )),
                              3 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'halfView4',
                                 'title' => 'Half View 4',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;margin-left:20px;',
                                 'permissions' => NULL,
                                 'datatype' => 'data',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                              )),
                              4 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'technicalDrawing2',
                                 'title' => 'Technical Drawing 2',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;margin-left:20px;',
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
                     'icon' => '',
                  )),
                  1 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Application Images',
                     'width' => NULL,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'childs' => 
                    array (
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
                         'bodyStyle' => 'margin:20px;',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'fieldtype' => 'fieldcontainer',
                             'labelWidth' => 100,
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
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'applicationImage1',
                                 'title' => 'Application Image1',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
                                 'permissions' => NULL,
                                 'datatype' => 'data',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                              )),
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'applicationImage2',
                                 'title' => 'Application Image2',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
                                 'permissions' => NULL,
                                 'datatype' => 'data',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                              )),
                              2 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'applicationImage3',
                                 'title' => 'Application Image3',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
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
                             'labelWidth' => 100,
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
                             'bodyStyle' => 'margin:20px;',
                             'datatype' => 'layout',
                             'permissions' => NULL,
                             'childs' => 
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'applicationImage4',
                                 'title' => 'Application Image4',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;margin-left:20px;',
                                 'permissions' => NULL,
                                 'datatype' => 'data',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                              )),
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'applicationImage5',
                                 'title' => 'Application Image5',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;margin-left:20px;',
                                 'permissions' => NULL,
                                 'datatype' => 'data',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                              )),
                              2 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'applicationImage6',
                                 'title' => 'Application Image6',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;margin-left:20px;',
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
                     'icon' => '',
                  )),
                  2 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Epix',
                     'width' => NULL,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'childs' => 
                    array (
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
                         'bodyStyle' => 'margin:20px;',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'fieldtype' => 'fieldcontainer',
                             'labelWidth' => 100,
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
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'epixImage1',
                                 'title' => 'Epix Image 1',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
                                 'permissions' => NULL,
                                 'datatype' => 'data',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                              )),
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'epixImage3',
                                 'title' => 'Epix Image 3',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
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
                             'labelWidth' => 100,
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
                             'bodyStyle' => 'margin:20px;',
                             'datatype' => 'layout',
                             'permissions' => NULL,
                             'childs' => 
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'epixImage2',
                                 'title' => 'Epix Image 2',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;margin-left:20px;',
                                 'permissions' => NULL,
                                 'datatype' => 'data',
                                 'relationType' => false,
                                 'invisible' => false,
                                 'visibleGridView' => false,
                                 'visibleSearch' => false,
                              )),
                              1 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'epixImage4',
                                 'title' => 'Epix Image 4',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;margin-left:20px;',
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
                     'icon' => '',
                  )),
                  3 => 
                  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
                     'fieldtype' => 'panel',
                     'labelWidth' => 100,
                     'layout' => NULL,
                     'border' => false,
                     'name' => 'Layout',
                     'type' => NULL,
                     'region' => NULL,
                     'title' => 'Videos',
                     'width' => NULL,
                     'height' => NULL,
                     'collapsible' => false,
                     'collapsed' => false,
                     'bodyStyle' => '',
                     'datatype' => 'layout',
                     'permissions' => NULL,
                     'childs' => 
                    array (
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
                         'bodyStyle' => 'margin:20px;',
                         'datatype' => 'layout',
                         'permissions' => NULL,
                         'childs' => 
                        array (
                          0 => 
                          Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldcontainer::__set_state(array(
                             'fieldtype' => 'fieldcontainer',
                             'labelWidth' => 100,
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
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'video1',
                                 'title' => 'Video 1',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;',
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
                             'labelWidth' => 100,
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
                             'bodyStyle' => 'margin:20px;',
                             'datatype' => 'layout',
                             'permissions' => NULL,
                             'childs' => 
                            array (
                              0 => 
                              Pimcore\Model\DataObject\ClassDefinition\Data\Image::__set_state(array(
                                 'fieldtype' => 'image',
                                 'width' => 400,
                                 'height' => '',
                                 'uploadPath' => '',
                                 'queryColumnType' => 'int(11)',
                                 'columnType' => 'int(11)',
                                 'phpdocType' => '\\Pimcore\\Model\\Asset\\Image',
                                 'name' => 'video2',
                                 'title' => 'Video 2',
                                 'tooltip' => '',
                                 'mandatory' => false,
                                 'noteditable' => false,
                                 'index' => false,
                                 'locked' => false,
                                 'style' => 'margin-top:10px;margin-left:20px;',
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
                     'icon' => '',
                  )),
                ),
                 'locked' => false,
              )),
            ),
             'locked' => false,
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/image-region.svg',
          )),
          4 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'Pricing Data',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Pricing Data',
             'width' => NULL,
             'height' => NULL,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'permissions' => NULL,
             'childs' => 
            array (
              0 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Table::__set_state(array(
                 'fieldtype' => 'table',
                 'width' => '',
                 'height' => '',
                 'cols' => 8,
                 'colsFixed' => true,
                 'rows' => '',
                 'rowsFixed' => false,
                 'data' => '',
                 'columnConfigActivated' => true,
                 'columnConfig' => 
                array (
                  0 => 
                  array (
                    'key' => '0',
                    'label' => 'Unique ID',
                  ),
                  1 => 
                  array (
                    'key' => '1',
                    'label' => 'Sales Organization',
                  ),
                  2 => 
                  array (
                    'key' => '2',
                    'label' => 'Distribution Channel',
                  ),
                  3 => 
                  array (
                    'key' => '3',
                    'label' => 'Validity End Date',
                  ),
                  4 => 
                  array (
                    'key' => '4',
                    'label' => 'Validity Start Date',
                  ),
                  5 => 
                  array (
                    'key' => '5',
                    'label' => 'Rate',
                  ),
                  6 => 
                  array (
                    'key' => '6',
                    'label' => 'Rate Unit',
                  ),
                  7 => 
                  array (
                    'key' => 7,
                    'label' => 'Condition Type',
                  ),
                ),
                 'queryColumnType' => 'longtext',
                 'columnType' => 'longtext',
                 'phpdocType' => 'array',
                 'name' => 'priceData',
                 'title' => 'Price Data',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => true,
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
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/currency_exchange.svg',
          )),
          5 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'labelWidth' => 100,
             'layout' => NULL,
             'border' => false,
             'name' => 'Completeness',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Completeness',
             'width' => NULL,
             'height' => NULL,
             'collapsible' => false,
             'collapsed' => false,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'permissions' => NULL,
             'childs' => 
            array (
              0 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::__set_state(array(
                 'fieldtype' => 'localizedfields',
                 'phpdocType' => '\\Pimcore\\Model\\DataObject\\Localizedfield',
                 'childs' => 
                array (
                  0 => 
                  Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                     'fieldtype' => 'input',
                     'width' => 600,
                     'defaultValue' => NULL,
                     'queryColumnType' => 'varchar',
                     'columnType' => 'varchar',
                     'columnLength' => 190,
                     'phpdocType' => 'string',
                     'regex' => '',
                     'unique' => false,
                     'showCharCount' => false,
                     'name' => 'CompletenessPercentage',
                     'title' => 'Completeness Percentage',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding: 10px; background-color: #d9edf7; border-color: #bce8f1 !important; color: #31708f;',
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
                     'width' => 600,
                     'height' => 500,
                     'maxLength' => NULL,
                     'showCharCount' => false,
                     'excludeFromSearchIndex' => false,
                     'queryColumnType' => 'longtext',
                     'columnType' => 'longtext',
                     'phpdocType' => 'string',
                     'name' => 'EmptyFields',
                     'title' => 'Empty Fields',
                     'tooltip' => '',
                     'mandatory' => false,
                     'noteditable' => true,
                     'index' => false,
                     'locked' => false,
                     'style' => 'padding: 10px; background-color: pink; border-color: #bce8f1 !important; color: #31708f;',
                     'permissions' => NULL,
                     'datatype' => 'data',
                     'relationType' => false,
                     'invisible' => false,
                     'visibleGridView' => false,
                     'visibleSearch' => false,
                  )),
                ),
                 'name' => 'localizedfields',
                 'region' => NULL,
                 'layout' => NULL,
                 'title' => '',
                 'width' => '',
                 'height' => '',
                 'maxTabs' => NULL,
                 'labelWidth' => 200,
                 'border' => false,
                 'provideSplitView' => false,
                 'tabPosition' => NULL,
                 'hideLabelsWhenTabsReached' => -1,
                 'referencedFields' => 
                array (
                ),
                 'fieldDefinitionsCache' => NULL,
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => NULL,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
              )),
            ),
             'locked' => false,
             'icon' => '/bundles/pimcoreadmin/img/flat-color-icons/accept_database.svg',
          )),
        ),
         'locked' => false,
      )),
    ),
     'locked' => false,
     'icon' => NULL,
  )),
   'icon' => '',
   'previewUrl' => '',
   'group' => 'PTGEU',
   'showAppLoggerTab' => false,
   'linkGeneratorReference' => '',
   'compositeIndices' => 
  array (
  ),
   'propertyVisibility' => 
  array (
    'grid' => 
    array (
      'id' => true,
      'key' => false,
      'path' => true,
      'published' => true,
      'modificationDate' => true,
      'creationDate' => true,
    ),
    'search' => 
    array (
      'id' => true,
      'key' => false,
      'path' => true,
      'published' => true,
      'modificationDate' => true,
      'creationDate' => true,
    ),
  ),
   'enableGridLocking' => false,
   'dao' => NULL,
));
