
<?php
if (!isset($this->parentContainer)) {
    $this->extend('CatalogBundle:Layouts:layout.html.php');
}
?>

<?php if ($this->editmode): ?>
    <?=
    $this->relation("inh_template_hose_product_page", [
        "types" => ["object"],
        "subtypes" => [
            "object" => ["object"]
        ],
        "classes" => ["CatalogTables"],
    ]);
    ?>
<?php endif; ?>

<?php
$partNumbers = [];
$incr = 0;
$incr2 = 0;
if ($data):
    foreach ($data as $catalogGroupKey => $catalogGroupData):
        foreach ($catalogGroupData as $md5key => $brandData):
            // p_r($catalogGroupKey);
            ?>
            <div class="template">
                <section class="segregate">

                    <div id="pageHeader"></div>
                    <span  class="pageName">
                        <?php

                        if($this->editmode): 
                            if($this->input("HHPP_Header_{$md5key}_{$incr}")->isEmpty()): 
                                echo $this->input("HHPP_Header_{$md5key}_{$incr}")->setDataFromResource('Hydraulic Hose');
                            else: 
                                echo $this->input("HHPP_Header_{$md5key}_{$incr}"); 
                            endif; 
                        else:
                            echo $this->input("HHPP_Header_{$md5key}_{$incr}");
                        endif; 

                        ?>
                    </span>

                    <div class="footer">
                        <footer class="flex-center <?php echo $footer_class; ?>">
                            <span class="logo">
                                <b>
                                <?php if($this->editmode): ?>
                                        <?php if($this->input("HHPP_Logo_Text1_{$md5key}_{$incr}")->isEmpty()): ?>
                                                <?= $this->input("HHPP_Logo_Text1_{$md5key}_{$incr}")->setDataFromResource('Hose') ?>
                                        <?php else: ?>
                                                <?= $this->input("HHPP_Logo_Text1_{$md5key}_{$incr}"); ?>
                                        <?php endif; ?>
                                <?php else: ?>
                                        <?= $this->input("HHPP_Logo_Text1_{$md5key}_{$incr}") ?>
                                <?php endif; ?>
                                </b>
                                <img src="<?= $footer_logo_src; ?>">
                            </span>
                            <div class="flex aligned">
                                <h5>
                                    <?php 
                                        if($this->editmode): 
                                            if($this->input("HHPP_Footer_BrandName_{$md5key}_{$incr}")->isEmpty()): 
                                                echo $this->input("HHPP_Footer_BrandName_{$md5key}_{$incr}")->setDataFromResource($brandData['brandName']);
                                            else: 
                                                echo $this->input("HHPP_Footer_BrandName_{$md5key}_{$incr}"); 
                                            endif; 
                                        else:
                                            echo $this->input("HHPP_Footer_BrandName_{$md5key}_{$incr}");
                                        endif; 
                                    ?>

                                    <span>

                                    <?php 
                                        if($this->editmode): 
                                            if($this->input("HHPP_Footer_HoseType_{$md5key}_{$incr}")->isEmpty()): 
                                                // echo $this->input("HHPP_Footer_HoseType_{$md5key}")->setDataFromResource('High Pressure');
                                                echo $this->input("HHPP_Footer_HoseType_{$md5Key}_{$incr}")->setDataFromResource($catalogGroupKey);
                                            else: 
                                                echo $this->input("HHPP_Footer_HoseType_{$md5key}_{$incr}"); 
                                            endif; 
                                        else:
                                            // echo $this->input("HHPP_Footer_HoseType_{$md5key}_{$incr}");
                                            echo $this->input("HHPP_Footer_HoseType_{$md5Key}_{$incr}")->setDataFromResource($catalogGroupKey);

                                        endif; 
                                        $incr++;
                                    ?>

                                    </span>
                                </h5>

                                <div class="compatible">
                                    <b>

                                        <?php 
                                            if($this->editmode): 
                                                if($this->input("HHPP_Footer_Compatibility_{$md5key}_{$incr}")->isEmpty()): 
                                                    echo $this->input("HHPP_Footer_Compatibility_{$md5key}_{$incr}")->setDataFromResource('Compatible fittings');
                                                else: 
                                                    echo $this->input("HHPP_Footer_Compatibility_{$md5key}_{$incr}"); 
                                                endif; 
                                            else:
                                                echo $this->input("HHPP_Footer_Compatibility_{$md5key}_{$incr}");
                                            endif; 
                                        ?>

                                    </b>

                                    <?php
                                    $compatibility_description = "All fittings compatible with ".$brandData['brandName']." are listed in Section 1 (starting on page 131).";
                                    
                                    if($this->editmode): 
                                        if($this->input("HHPP_Footer_Compatibility_Description_{$md5key}_{$incr}")->isEmpty()): 
                                            echo $this->input("HHPP_Footer_Compatibility_Description_{$md5key}_{$incr}")->setDataFromResource($compatibility_description);
                                        else: 
                                            echo $this->input("HHPP_Footer_Compatibility_Description_{$md5key}_{$incr}"); 
                                        endif; 
                                    else:
                                        echo $this->input("HHPP_Footer_Compatibility_Description_{$md5key}_{$incr}");
                                    endif; 
                                    
                                    ?>
                                </div>
                            </div>
                        </footer>
                    </div>
                    <div class="footer1">
                        <footer class="flex-center <?php echo $footer_class; ?>">
                            <div class="flex aligned">
                                <div class="compatible">
                                    <b>
                                        <?php 
                                            if($this->editmode): 
                                                if($this->input("HHPP_Footer_Compatibility1_{$md5key}_{$incr2}")->isEmpty()): 
                                                    echo $this->input("HHPP_Footer_Compatibility1_{$md5key}_{$incr2}")->setDataFromResource('Compatible fittings');
                                                else: 
                                                    echo $this->input("HHPP_Footer_Compatibility1_{$md5key}_{$incr2}"); 
                                                endif; 
                                            else:
                                                echo $this->input("HHPP_Footer_Compatibility1_{$md5key}_{$incr2}");
                                            endif; 
                                        ?>

                                    </b>

                                    <?php
                                    $compatibility_description = "All fittings compatible with ".$brandData['brandName']." are listed in Section 1 (starting on page 131).";
                                    
                                    if($this->editmode): 
                                        if($this->input("HHPP_Footer_Compatibility_Description1_{$md5key}_{$incr2}")->isEmpty()): 
                                            echo $this->input("HHPP_Footer_Compatibility_Description1_{$md5key}_{$incr2}")->setDataFromResource($compatibility_description);
                                        else: 
                                            echo $this->input("HHPP_Footer_Compatibility_Description1_{$md5key}_{$incr2}"); 
                                        endif; 
                                    else:
                                        echo $this->input("HHPP_Footer_Compatibility_Description1_{$md5key}_{$incr2}");
                                    endif; 
                                    
                                    ?>
                                </div>
                                <h5>

                                    <?php

                                    if($this->editmode): 
                                        if($this->input("HHPP_Footer_BrandName1_{$md5key}_{$incr2}")->isEmpty()): 
                                            echo $this->input("HHPP_Footer_BrandName1_{$md5key}_{$incr2}")->setDataFromResource($brandData['brandName']);
                                        else: 
                                            echo $this->input("HHPP_Footer_BrandName1_{$md5key}_{$incr2}"); 
                                        endif; 
                                    else:
                                        echo $this->input("HHPP_Footer_BrandName1_{$md5key}_{$incr2}");
                                    endif;

                                    ?>

                                    <span>

                                        <?php

                                        if($this->editmode): 
                                            if($this->input("HHPP_Footer_HoseType1_{$md5key}_{$incr2}")->isEmpty()): 
                                                // echo $this->input("HHPP_Footer_HoseType1_{$md5key}")->setDataFromResource('High Pressure');
                                                echo $this->input("HHPP_Footer_HoseType1_{$md5Key}_{$incr2}")->setDataFromResource($catalogGroupKey);
                                            else: 
                                                echo $this->input("HHPP_Footer_HoseType1_{$md5key}_{$incr2}"); 
                                            endif; 
                                        else:
                                            // echo $this->input("HHPP_Footer_HoseType1_{$md5key}_{$incr2}");
                                            echo $this->input("HHPP_Footer_HoseType1_{$md5Key}_{$incr2}")->setDataFromResource($catalogGroupKey);
                                        endif; 
                                        $incr2++;
                                        ?>

                                    </span>

                                </h5>
                            </div>
                            <span class="logo">

                                <b>
                                <?php if($this->editmode): ?>
                                        <?php if($this->input("HHPP_Logo_Text2_{$md5key}_{$incr2}")->isEmpty()): ?>
                                                <?= $this->input("HHPP_Logo_Text2_{$md5key}_{$incr2}")->setDataFromResource('Hose') ?>
                                        <?php else: ?>
                                                <?= $this->input("HHPP_Logo_Text2_{$md5key}_{$incr2}"); ?>
                                        <?php endif; ?>
                                <?php else: ?>
                                        <?= $this->input("HHPP_Logo_Text2_{$md5key}_{$incr2}") ?>
                                <?php endif; ?>
                                </b>
                                <img src="<?= $footer_logo_src; ?>">
                            </span>
                        </footer>
                    </div>
                    <header class="content white productHeadingProductPage">
                        <h1>
                            <?php

                            if($this->editmode): 
                                if($this->input("HHPP_Heading_{$md5key}_{$incr2}")->isEmpty()): 
                                    echo $this->input("HHPP_Heading_{$md5key}_{$incr2}")->setDataFromResource($brandData['brandName']);
                                else: 
                                    echo $this->input("HHPP_Heading_{$md5key}_{$incr2}"); 
                                endif; 
                            else:
                                echo $this->input("HHPP_Heading_{$md5key}_{$incr2}");
                            endif; 

                            ?>
                        </h1>
                        <aside>
                            <p>
                                <?php

                                if($this->editmode): 
                                    if($this->wysiwyg("HHPP_LongDescription_{$md5key}_{$incr2}")->isEmpty()): 
                                        echo $this->wysiwyg("HHPP_LongDescription_{$md5key}_{$incr2}")->setDataFromResource($brandData['longDescription']);
                                    else: 
                                        echo $this->wysiwyg("HHPP_LongDescription_{$md5key}_{$incr2}"); 
                                    endif; 
                                else:
                                    echo $this->wysiwyg("HHPP_LongDescription_{$md5key}_{$incr2}");
                                endif; 

                                ?>
                            </p>
                            <?php
                            if ($this->editmode) {
                                if(!$this->image("HHPP_Image_Left_{$md5key}_{$incr2}")->isEmpty())
                                        echo $this->image("HHPP_Image_Left_{$md5key}_{$incr2}",["class" => "leftImg", "width" => 600, "height" => 200]);
                                else
                                        echo $this->image("HHPP_Image_Left_{$md5key}_{$incr2}", ["class" => "leftImg", "width" => 600, "height" => 200])->setImage($brandData['LeftPrintCatalogImageObj']);
                            } else {
                                // if(!$this->image("HHPP_Image_Left_{$md5key}")->isEmpty())
                                $imgSrcObj1 = $this->image("HHPP_Image_Left_{$md5key}_{$incr2}");

                                if($imgSrcObj1)
                                {
                                ?>
                                <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj1,$this->imageWidth); ?>" class="leftImg" width="600" height="200"/>
                                <?php
                                }
                            }
                            ?>
                            <?php
                            if ($this->editmode) {
                                if(!$this->image("HHPP_Image_Right_{$md5key}_{$incr2}")->isEmpty())
                                        echo $this->image("HHPP_Image_Right_{$md5key}_{$incr2}",["class" => "rightImg", "width" => 600, "height" => 200]);
                                else
                                        echo $this->image("HHPP_Image_Right_{$md5key}_{$incr2}", ["class" => "rightImg", "width" => 600, "height" => 200])->setImage($brandData['RightPrintCatalogImageObj']);
                            } else {
                                // if(!$this->image("HHPP_Image_Right_{$md5key}")->isEmpty())
                                $imgSrcObj2 = $this->image("HHPP_Image_Right_{$md5key}_{$incr2}", ["class" => "rightImg", "width" => 600, "height" => 200]);

                                if($imgSrcObj2)
                                {
                                ?>
                                <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj2,$this->imageWidth); ?>" class="rightImg" width="600" height="200"/>
                                <?php
                                }
                            }
                            ?>
                        </aside>
                    </header>
                    <article class="fullcontainer ">
                            <?php 
                            // p_r($brandData['standardMetHoseListData']);
                            ?>
                        <section class="content single">
                            <?php if ($brandData['safetyFeatures'] || $brandData['standardMetHoseListData'] || !empty(trim($brandData['tubeMaterialAtrributeString'])) || !empty(trim($brandData['reinforcement'])) || !empty(trim($brandData['coverMaterialattributeString'])) ||!empty(trim($brandData['temperatureRangeFAndC']))): ?>

                                <menu class="flex">
                                    <?php if ($brandData['standardMetHoseListData'] || !empty(trim($brandData['tubeMaterialAtrributeString'])) || !empty(trim($brandData['reinforcement'])) || !empty(trim($brandData['coverMaterialattributeString'])) || !empty(trim($brandData['temperatureRangeFAndC']))): ?>
                                        <div class="specs">
                                            <h6><?= $this->translate('specs') ?></h6>
                                            <div class="spec-requirement">
                                                <?php if ($brandData['standardMetHoseListData'] || $brandData['standardMetHoseMeetFlameResistence']): ?>
                                                <div class="col-6">

                                                        <div class="standard-hose-met">
                                                            <?php

                                                                if(count($brandData['standardMetHoseListData']) > 0)
                                                                {
                                                                    if($this->editmode): 
                                                                        if($this->input("meetPerformanceRequirements_{$md5key}_{$incr2}")->isEmpty()): 
                                                                            echo $this->input("meetPerformanceRequirements_{$md5key}_{$incr2}")->setDataFromResource("Meets or exceeds the performance requirements of:");
                                                                        else: 
                                                                            echo $this->input("meetPerformanceRequirements_{$md5key}_{$incr2}"); 
                                                                        endif; 
                                                                    else:
                                                                        echo $this->input("meetPerformanceRequirements_{$md5key}_{$incr2}");
                                                                    endif; 
                                                                }         
                                                                echo "<br/>";                                                   
                                                                $hoseMetCount = 0;
                                                                foreach ($brandData['standardMetHoseListData'] as $key => $standard): 
                                                                ?>
                                                                <?php
                                                                // if($this->editmode): 
                                                                //     if($this->input("standardMetHoseLabel{$md5key}_{$hoseMetCount}")->isEmpty()): 
                                                                //         echo $this->input("standardMetHoseLabel{$md5key}_{$hoseMetCount}")->setDataFromResource($standard['CustomerFacingVersion']);
                                                                //     else: 
                                                                //         echo $this->input("standardMetHoseLabel{$md5key}_{$hoseMetCount}"); 
                                                                //     endif; 
                                                                // else:
                                                                //     echo $this->input("standardMetHoseLabel{$md5key}_{$hoseMetCount}");
                                                                // endif; 
                                                                ?>
                                                            
                                                            <div class="is-highlight"> <?= $this->input("standardMetHose{$md5key}_{$hoseMetCount}_{$incr2}")->setDataFromResource($standard['name']); ?></div>
                                                                
                                                                <?php
                                                                $hoseMetCount++;
                                                                endforeach;
                                                            ?>

                                                        </div>

                                                        <div class="standard-hose-met-flame">

                                                            <?php
                                                                $hoseMetFlameCount = 1;
                                                                foreach ($brandData['standardMetHoseMeetFlameResistence'] as $key => $standard2): 
                                                                ?>
                                                                <?php
                                                                if($this->editmode): 
                                                                    if($this->input("standardMetHoseFlameResistenceLabel{$md5key}_{$hoseMetFlameCount}")->isEmpty()): 
                                                                        echo $this->input("standardMetHoseFlameResistenceLabel{$md5key}_{$hoseMetFlameCount}")->setDataFromResource($standard2['CustomerFacingVersion']);
                                                                    else: 
                                                                        echo $this->input("standardMetHoseFlameResistenceLabel{$md5key}_{$hoseMetFlameCount}"); 
                                                                    endif; 
                                                                else:
                                                                    echo $this->input("standardMetHoseFlameResistenceLabel{$md5key}_{$hoseMetFlameCount}");
                                                                endif; 
                                                                ?>
                                                            
                                                            <div class="is-highlight"> <?= $this->input("standardMetHoseFlameResistence{$md5key}_{$hoseMetFlameCount}")->setDataFromResource($standard2['name']); ?></div>
                                                                
                                                                <?php
                                                                $hoseMetFlameCount++;
                                                                endforeach;
                                                            ?>
                                                        </div>

                                                        <div class="custom-specs-text">
                                                            <?= $this->wysiwyg("customSpecsText{$md5key}_{$incr2}"); ?>
                                                        </div>
                                                </div>
                                                <?php endif; ?>
                                                <div class="col-6">
                                                    <?php if (!empty(trim($brandData['tubeMaterialAtrributeString']))): ?>
                                                        <div class="full">
                                                            <b><?= $this->translate('Inner Tube') ?></b>
                                                            <?= $brandData['tubeMaterialAtrributeString'] ?>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if (!empty(trim($brandData['reinforcement']))): ?>
                                                        <div class="full">
                                                            <b><?= $this->translate('Reinforcement') ?></b>
                                                            <?= $brandData['reinforcement'] ?>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if (!empty(trim($brandData['coverMaterialattributeString']))): ?>
                                                        <div class="full">
                                                            <b><?= $this->translate('Cover') ?></b>
                                                            <?= $brandData['coverMaterialattributeString'] ?>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if (!empty(trim($brandData['temperatureRangeFAndC']))): ?>
                                                       <div class="full">
                                                            <b><?= $this->translate('Temperature Range') ?></b>
                                                            <?= $brandData['temperatureRangeFAndC'] ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>

                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($brandData['safetyFeatures']): ?>
                                        <div class="feature">
                                            <h6><?= $this->translate('features') ?></h6>
                                            <div>
                                                <?php foreach ($brandData['safetyFeatures'] as $key => $feature): ?>
                                                    <p  class="flex">
                                                        <?php if ($feature['iconSrc']): ?>
                                                            <img src="<?= $feature['iconSrc'] ?>" />
                                                        <?php endif; ?>
                                                        <font> <?= $feature['name'] ?></font>
                                                    </p>
                                                <?php endforeach; ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </menu>
                            <?php endif; ?>

                            <?php if (!empty(trim($brandData['BrandingLayline']))): ?>
                                <menu>
                                    <h6><?= $this->translate('branding') ?></h6>
                                    <figure class="brandingLaylineStyle">
                                        <figcaption> <?= $brandData['BrandingLayline'] ?> </figcaption>
                                    </figure>
                                </menu>
                            <?php endif; ?>
                            <?php 
                            $columnList = [];
                            ?>
                            <table cellpadding="0" cellspacing="0" class="grid continueLable">
                                <thead>
                                        <?php if($brandData['iconRequired'] == 'YES'): ?>
                                                <tr class="sub-head">
                                                        <?php foreach($brandData['columnsDataWithImages'] as $key => $c1data): ?>
                                                                <?php
                                                                        $columnWidth = '';
                                                                        $g1count = count($c1data);
                                                                        $firstArray = array_shift($c1data);
                                                                        if($firstArray['columnWidth'])
                                                                            $columnWidth = "width=".$firstArray['columnWidth']

                                                                ?>
                                                                <td colspan="<?= $g1count; ?>" <?php echo $columnWidth; ?>>
                                                                <?php if($firstArray['columnIcon']): ?>
                                                                <img src="<?= $firstArray['columnIcon'] ?>" width="45" height="45" />
                                                                <?php endif; ?>
                                                                </td>
                                                        <?php endforeach; ?>
                                                </tr>
                                        <?php endif; ?>

                                        <tr class="head">
                                                <?php foreach($brandData['columnsDataWithImages'] as $key => $c2data): ?>
                                                        <?php
                                                                $columnWidth = '';
                                                                $g2count = count($c2data);
                                                                $first2Array = array_shift($c2data);
                                                                if($first2Array['columnWidth'])
                                                                            $columnWidth = "width=".$first2Array['columnWidth']
                                                        ?>
                                                        <td colspan="<?= $g2count; ?>" <?php echo $columnWidth; ?>><?= $first2Array['columnLabel'] ?></td>
                                                <?php endforeach; ?>
                                        </tr>

                                        <?php if($brandData['subHeaderRequired'] == 'YES'): ?>
                                                <tr class="sub-head">
                                                        <?php foreach($brandData['columnsDataWithImages'] as $key => $c3data): ?>
                                                                <?php  foreach($c3data as $c3key => $c3value): 
                                                                    $columnList[] = $c3key;
                                                                    ?>
                                                                        <?php if($c3value['unitName']): ?>
                                                                                <td><?= $c3value['unitName'] ?></td>
                                                                        <?php else: ?>
                                                                                <td></td>
                                                                        <?php endif; ?>
                                                                <?php endforeach; ?>
                                                        <?php endforeach; ?>
                                                </tr>
                                        <?php endif; ?>

                                </thead>
                                <?php $incrRow = 1; ?>
                                <?php foreach ($brandData['articlesData'] as $key => $element): ?>
                                    <?php if ($incrRow % 2 == 0): ?>
                                        <tr class = 'tableNewFont'>
                                        <?php else: ?>
                                        <tr class="active tableNewFont">
                                        <?php endif; ?>
                                        <?php 
                                            $indexDescriptiveNumber = array_search('descriptive', $columnList);
                                            if(($indexDescriptiveNumber !== false) && ($element[$indexDescriptiveNumber]))
                                            { 
                                                $descriptiveNumberText = $element[$indexDescriptiveNumber];
                                                $descriptiveNumberList = explode('-', $descriptiveNumberText);
                                                if(!in_array($descriptiveNumberList[0], $partNumbers))
                                                {
                                                    $partNumbers[] = $descriptiveNumberList[0];
                                                }
                                            }
                                        ?>
                                        <?php foreach ($element as $ekey => $value): ?>
                                            <td><?= $value; ?></td>
                                        <?php endforeach; ?>
                                    </tr>
                                    <?php $incrRow++ ?>
                                <?php endforeach; ?>
                            </table>
                            <?php
                            // p_r($sds);
                            ?>
                            <p class="small"><?= $this->input("customer_data_{$md5key}_{$incr2}", ['placeholder' => 'Enter comment']); ?></p>
                        </section>

                    </article>

                </section>
            </div>
            <?php
        endforeach;

    endforeach;
    
    ?>

    <div class="hide">
        <?php
        if(count($partNumbers) > 0)
        {
            $partNumberString = implode(',', $partNumbers);
            echo $this->textarea('product_page_part_number')->setDataFromResource($partNumberString);
        }
        ?>
    </div>

<?php
    if (!$containerRequest):
    
    ?>
    <script type="text/javascript" src="/static/js/tableContinueLable.js"></script>

    <?php
    
    endif;

endif;
?>

