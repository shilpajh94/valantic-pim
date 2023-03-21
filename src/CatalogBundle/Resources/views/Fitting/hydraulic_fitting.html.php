<?php
if (!isset($this->parentContainer)) {
    $this->extend('CatalogBundle:Layouts:layout.html.php');
}
?>
<?php if ($this->editmode) { ?>
    <?= $this->relation("fitting-straight"); ?>
<?php } ?>

<?php
if (is_array($brandsData) && !empty($brandsData)) {
    $partNumbers = [];
    $brandNameList = [];	
    $productNumbers = [];
?>

<div class="template">
<section class="segregate">

 <div id="pageHeader"></div>
 <span  class="pageName">Hydraulic Fittings</span>
 <div class="footer">
 <footer class="flex-center <?php echo $footer_class; ?>">
            <span class="logo">
                <b>
                <?php if($this->editmode): ?>
                        <?php if($this->input("HHFP_Logo_Text1")->isEmpty()): ?>
                                <?= $this->input("HHFP_Logo_Text1")->setDataFromResource('Hose') ?>
                        <?php else: ?>
                                <?= $this->input("HHFP_Logo_Text1"); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("HHFP_Logo_Text1") ?>
                <?php endif; ?>
                </b>
                <img src="<?= $footer_logo_src; ?>">
            </span>
         <div class="flex aligned ">


         <h5>
                <?php

                    if($this->editmode): 
                        if($this->input("section_11")->isEmpty()): 
                        echo $this->input("section_11")->setDataFromResource('Section 1');
                        else: 
                        echo $this->input("section_11"); 
                        endif; 
                    else:
                        echo $this->input("section_11");
                    endif; 

                ?>
                <span>
                <?php

                    if($this->editmode): 
                        if($this->input('fittingFamily_11',["placeholder"=>"Fitting Type"])->isEmpty()): 
                        echo $this->input('fittingFamily_11',["placeholder"=>"Fitting Type"])->setDataFromResource($HydFittingFamily. ' Fittings');
                        else: 
                        echo $this->input('fittingFamily_11',["placeholder"=>"Fitting Type"]); 
                        endif; 
                    else:
                        echo $this->input('fittingFamily_11',["placeholder"=>"Fitting Type"]);
                    endif; 

                ?>
                </span>
            </h5>
            <div class="compatible">
                                    <b>
                                        <?php
                                            echo $this->input("HHF_Footer_Compatibility11", ["placeholder"=>'Compatible Hose:']);
                                        ?>
                                    </b>

                                    <?php
                                        echo $this->input("HHF_Footer_Compatibility_Description11", ["placeholder"=>'SR1SN SR2SN SR3SN']);
                                    ?>
                                </div>
 
 
</div>
</footer>
</div>

<div class="footer1">
 <footer class="flex-center <?php echo $footer_class; ?>">
         <div class="flex aligned ">
<p class="flex-center">
                <?php
                if($this->editmode)
                {
                    if ($this->image('myCrampApp_f1')->isEmpty() && !is_null($myCrampApp)) {
                        echo $this->image('myCrampApp_f1', [
                            "width" => 61,
                            "height" => 60,
                            "aspectratio" => true,
                            "interlace" => true,
                            "quality" => 95,
                            "format" => "PNG"
                        ])->setImage($logo);
                    } else {
                        echo $this->image('myCrampApp_f1', [
                            "width" => 61,
                            "height" => 60,
                            "aspectratio" => true,
                            "interlace" => true,
                            "quality" => 95,
                            "format" => "PNG"
                        ]);
                    }
                }
                else
                {
                    $imgSrcObj4 = $this->image('myCrampApp_f1');
                    if($view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj4,$this->imageWidth))
                    {
                    ?>
                    <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj4,$this->imageWidth); ?>" width="61" height="60"/>
                    <?php
                    }
                }
                ?>
                <span>
                    Download the <strong class="contitech-yellow">MyCrimp App</strong><br />
                    for more information
                </span>
            </p>
            
             <h5>
                <?php

                    if($this->editmode): 
                        if($this->input("section_1")->isEmpty()): 
                        echo $this->input("section_1")->setDataFromResource('Section 1');
                        else: 
                        echo $this->input("section_1"); 
                        endif; 
                    else:
                        echo $this->input("section_1");
                    endif; 

                ?>
                <span>
                <?php

                    if($this->editmode): 
                        if($this->input('fittingFamily_1',["placeholder"=>"Fitting Type"])->isEmpty()): 
                        echo $this->input('fittingFamily_1',["placeholder"=>"Fitting Type"])->setDataFromResource($HydFittingFamily. ' Fittings');
                        else: 
                        echo $this->input('fittingFamily_1',["placeholder"=>"Fitting Type"]); 
                        endif; 
                    else:
                        echo $this->input('fittingFamily_1',["placeholder"=>"Fitting Type"]);
                    endif; 

                ?>
                </span>
            </h5>



</div>
            <span class="logo">

            <b>
            <?php if($this->editmode): ?>
                    <?php if($this->input("HHFP_Logo_Text2")->isEmpty()): ?>
                            <?= $this->input("HHFP_Logo_Text2")->setDataFromResource('Hose') ?>
                    <?php else: ?>
                            <?= $this->input("HHFP_Logo_Text2"); ?>
                    <?php endif; ?>
            <?php else: ?>
                    <?= $this->input("HHFP_Logo_Text2") ?>
            <?php endif; ?>
            </b>
            <img src="<?= $footer_logo_src ?>">
            </span>
</footer>
</div>


<div class="wrapper padding">

    <?php
      //  $incr = 1;
    //   p_r($brandsData);
    // $dispColumns = array_keys($info['dataTableColumn']);
        foreach ($brandsData as $uniqueId => $shortDescrioptionTableData) {
            unset($shortDescrioptionTableData['SortOrder']);
            foreach ($shortDescrioptionTableData as $shortDescrioptionKey => $tableData) {
                foreach ($tableData as $tableName => $tableRowsSkiveType) {
                    $firstKey = array_key_first($tableRowsSkiveType);
                    // $tableColumns = $info['fittingTableColumn'][$tableName];
                    // $uniqueId = md5($uniqueId.$tableName);
                    // if ($tableName !== 'SortOrder') {
                        $uniqueId = md5($uniqueId.$shortDescrioptionKey.$tableName);
                    //     $result = array_intersect($tableColumns['columns'], $dispColumns);

                        /* New Family Info */
                        ?>
                        <article class="container page-break-inside-avoid">
                            <figure class="headingSection">
                                <span>
                                    <?php
                                    if ($this->editmode) {
                                        if(!$this->image('catLeftImage' . $uniqueId)->isEmpty())
                                            echo $this->image('catLeftImage' . $uniqueId, ["class" => "leftImg", "width" => 226, "height" => 150]);
                                        else
                                            echo $this->image('catLeftImage' . $uniqueId, ["class" => "leftImg", "width" => 226, "height" => 150])->setImage($tableRowsSkiveType[$firstKey]['brandData']['LeftPrintCatalogImageObj']);
                                    } else {
                                        $imgSrcObj1 =  $this->image('catLeftImage' . $uniqueId);
                                        if($view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj1,$this->imageWidth))
                                        {
                                        ?>
                                        <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj1,$this->imageWidth); ?>" class="lImg" width="226" height="150"/>
                                        <?php
                                        }
                                    }
                                    if ($this->editmode) {
                                        if(!$this->image('catRightImage' . $uniqueId)->isEmpty())
                                            echo $this->image('catRightImage' . $uniqueId, ["class" => "rightImg", "width" => 226, "height" => 150]);
                                        else
                                            echo $this->image('catRightImage' . $uniqueId, ["class" => "rightImg", "width" => 226, "height" => 150])->setImage($tableRowsSkiveType[$firstKey]['brandData']['RightPrintCatalogImageObj']);
                                    } else {
                                        $imgSrcObj2 = $this->image('catRightImage' . $uniqueId);
                                        if($view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj2,$this->imageWidth))
                                        {
                                        ?>
                                        <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj2,$this->imageWidth); ?>" class="rImg" width="226" height="150"/>
                                        <?php
                                        }
                                    }
                                    ?>
                                </span>
                                <figcaption class="highlight">
                                    <h3>
                                        <?php

                                        if($this->editmode): 
                                            if($this->input('brandName' . $uniqueId)->isEmpty()): 
                                            echo $this->input('brandName' . $uniqueId)->setDataFromResource($tableRowsSkiveType[$firstKey]['brandData']['brandName']);
                                            else: 
                                            echo $this->input('brandName' . $uniqueId); 
                                            endif; 
                                        else:
                                            echo $this->input('brandName' . $uniqueId);
                                        endif; 

                                        ?>
                                    </h3>
                                    <p>
                                        <?php

                                        if($this->editmode): 
                                            if($this->input('shortDescription' . $uniqueId)->isEmpty()): 
                                            echo $this->input('shortDescription' . $uniqueId)->setDataFromResource(strip_tags($tableRowsSkiveType[$firstKey]['brandData']['shortDescription']));
                                            else: 
                                            echo $this->input('shortDescription' . $uniqueId); 
                                            endif; 
                                        else:
                                            echo $this->input('shortDescription' . $uniqueId);
                                        endif; 

                                        ?>
                                    </p>
                                </figcaption>
                            </figure>

                            <!-- Starting grid here -->
                            <?php

                            foreach ($skiveTypeSortKeys as $skiveTypekey => $skiveTypekValue) {
                                $showTitle = (count($tableRowsSkiveType) > 1) ? true : false;
                                $tableRows = $tableRowsSkiveType[$skiveTypekValue];
                                $uniqueId2 = md5($uniqueId.$shortDescrioptionKey.$tableName.$skiveTypekey);
                                
                                if(isset($tableRows['articleData']) && is_array($tableRows['articleData'])):
                                    $skiveTypeTableTitle = '';
                                    $columnList = array();
                                    if($skiveTypekey == 'Non-Skive')
                                    {
                                        $skiveTypeTableTitle = 'Uni-Crimp™ Style';
                                    }
                                    else if($skiveTypekey == 'Dual-Grip'){
                                        $skiveTypeTableTitle = 'Dual-Grip Style';
                                    }

                                    ?>
                                    <?php if($showTitle): ?>
                                    <h1 class="skiveTypeTableTitle">
                                    <?php echo $skiveTypeTableTitle;?>
                                    </h1>
                                    <?php endif; ?>

                                    <table class="grid inh fitting marginBottom5 continueLable" cellspacing="0" cellpadding="0">
                                        <thead>
                                            <?php if ($iconRequired == 'YES'): ?>
                                                <tr class="sub-head">
                                                    <?php foreach ($tableRows['articleData']['columnsDataWithImages'] as $key => $c1data): ?>
                                                        <?php
                                                        $columnWidth = '';
                                                        $g1count = count($c1data);
                                                        $firstArray = array_shift($c1data);
                                                        if($firstArray['columnWidth'])
                                                            $columnWidth = "width=".$firstArray['columnWidth']
                                                        ?>
                                                        <td colspan="<?= $g1count; ?>" <?php echo $columnWidth; ?>>
                                                            <?php if ($firstArray['columnIcon']): ?>
                                                                <img src="<?= $firstArray['columnIcon'] ?>" width="45" height="45" />
                                                            <?php endif; ?>
                                                        </td>
                                                    <?php endforeach; ?>
                                                </tr>
                                            <?php endif; ?>
                                            <tr class="head">
                                                <?php foreach ($tableRows['articleData']['columnsDataWithImages'] as $key => $c2data): ?>
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

                                            <?php if ($tableRows['articleData']['subHeaderRequired'] == 'YES'): ?>
                                                <tr class="head">
                                                    <?php foreach ($tableRows['articleData']['columnsDataWithImages'] as $key => $c3data): ?>
                                                        <?php foreach ($c3data as $c3key => $c3value): 
                                                            $columnList[] = $c3key;
                                                            if ($c3value['unitName']): ?>
                                                                <td><?= $c3value['unitName'] ?></td>
                                                            <?php else: ?>
                                                                <td></td>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    <?php endforeach; ?>
                                                </tr>
                                            <?php endif; ?>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(isset($tableRows['articleData']['articles']) && is_array($tableRows['articleData']['articles'])):
                                            $HoseID1InFractIndex = $tableRows['articleData']['HoseID1InFractIndex'];
                                            $oldValue = '';
                                            $activeClass = '';
                                            ?>
                                            <?php foreach ($tableRows['articleData']['articles'] as $key => $shortedRows): ?>
                                                <?php 
                                                    if($key == array_key_first($shortedRows))
                                                    {
                                                        $oldValue = $shortedRows[$HoseID1InFractIndex];
                                                    }
                                                    
                                                    if($oldValue !== $shortedRows[$HoseID1InFractIndex])
                                                    {
                                                        $oldValue = $shortedRows[$HoseID1InFractIndex];
                                                        $activeClass = ($activeClass == 'active') ? '' : 'active';
                                                    }
                                                ?>
                                                <tr class="<?= $activeClass; ?>" data-id="<?= "$oldValue = $shortedRows[$HoseID1InFractIndex]" ?>">
                                                    <?php 	
                                                        $indexDescriptiveNumber = array_search('DescriptivePartNumber', $columnList);	
                                                        if(($indexDescriptiveNumber !== false) && ($shortedRows[$indexDescriptiveNumber]))	
                                                        { 	
                                                            $descriptiveNumberText = $shortedRows[$indexDescriptiveNumber];	
                                                            $descriptiveNumberList = explode('-', $descriptiveNumberText);	
                                                            if(count($descriptiveNumberList) > 1)	
                                                            {	
                                                                $descriptiveText = $descriptiveNumberList[0].'-'.$descriptiveNumberList[1];	
                                                            }	
                                                            if(!in_array($descriptiveText, $partNumbers))	
                                                            {	
                                                                $partNumbers[] = $descriptiveText;	
                                                            }	
                                                        }	
                                                        $industryStandard = array_search('industryStandard', $columnList);	
                                                        if(($industryStandard !== false) && ($shortedRows[$industryStandard]))	
                                                        { 	
                                                            $industryStandardText = $shortedRows[$industryStandard];	
                                                            $industryStandardList = explode('-', $industryStandardText);	
                                                            if(!in_array($industryStandardList[0], $productNumbers))	
                                                            {	
                                                                $productNumbers[] = $industryStandardList[0];	
                                                            }	
                                                        }	
                                                    ?>
                                                    <?php foreach ($shortedRows as $ekey => $value): ?>
                                                        <td><?= $value ?></td>
                                                    <?php endforeach; ?>
                                                </tr>
                                            <?php
                                                endforeach;
                                            endif;
                                            ?>
                                        </tbody>


                                        <!-- Closing grid div here -->
                                    </table>
                                    <span class="tableFooter">
                                    <?php echo $this->input("HYD_PP_".$uniqueId2,["Table Info"], ["placeholder" => "Enter comment"]);?>

                                    </span>
                                <?php 
                                endif; 
                            }
                            ?>
                        </article>
                        <?php
                    // }
                }
               // $incr++;
            }
        }
    ?>

</div>

    <!-- Footer -->
    <!-- End Footer-->
</section>
<div class="hide">
<?php
if(count($partNumbers) > 0)
{
    $partNumberString = implode(',', $partNumbers);
    echo $this->textarea('product_page_part_number')->setDataFromResource($partNumberString);
}

if(count($productNumbers) > 0)
{
    $productNumbersString = implode(',', $productNumbers);
    echo $this->textarea('product_page_product_number')->setDataFromResource($productNumbersString);
}

if(count($brandNameList) > 0)
{
    $brandNameList = array_unique($brandNameList);
    $brandNamesText = implode('$$', $brandNameList);
    echo $this->textarea('hydraulic_fitting_brand')->setDataFromResource($brandNamesText);
}
?>
</div>
</div>

<?php if (!$containerRequest): ?>
        <script type="text/javascript" src="/static/js/tableContinueLable.js"></script>
<?php endif; ?>

<?php } ?>
