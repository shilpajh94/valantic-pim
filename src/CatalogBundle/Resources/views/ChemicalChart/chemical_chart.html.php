<?php
if (!isset($this->parentContainer)) {
    $this->extend('CatalogBundle:Layouts:layout.html.php');
}
?>
<?php if ($this->editmode) { ?>
    <?= $this->relation("fitting-straight"); ?>
<?php } ?>

<div class="template">
<section class="segregate">

 <div id="pageHeader"></div>
 <span  class="pageName">Chemical Charts</span>
 <div class="footer">
    <footer class="flex-center <?php echo $footer_class; ?>">
        <div class="flex aligned ">
            <h5>
                    <span>
                    </span>
                </h5>
                <div class="compatible">
                    <b>

                    </b>
                </div>
        </div>
    </footer>
</div>

<div class="footer1">
    <footer class="flex-center <?php echo $footer_class; ?>">
            <div class="flex aligned ">
                <h5>
                    <span>
                    
                    </span>
                </h5>
            </div>
    </footer>
</div>


<div class="wrapper padding">

    
            <article class="container page-break-inside-avoid">
                <figure class="headingSection">
                    
                        <?php
                        if(isset($tableRowsSkiveType['NS']) && isset($tableRowsSkiveType['DG']))
                        {
                            ?>
                            <span>
                                <?php
                                $uniqueIdDG = md5($uniqueIdTemp.$shortDescrioptionKey.$tableName.'DG');
                                if ($this->editmode) {
                                    if(!$this->image('catLeftImage' . $uniqueIdDG)->isEmpty())
                                        echo $this->image('catLeftImage' . $uniqueIdDG, ["class" => "leftImg", "width" => 226, "height" => 150]);
                                    else
                                        echo $this->image('catLeftImage' . $uniqueIdDG, ["class" => "leftImg", "width" => 226, "height" => 150])->setImage($tableRowsSkiveType['DG']['brandData']['LeftPrintCatalogImageObj']);
                                } else {
                                    $imgSrcObj1 =  $this->image('catLeftImage' . $uniqueIdDG);
                                    if($view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj1,$this->imageWidth))
                                    {
                                    ?>
                                    <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj1,$this->imageWidth); ?>" class="lImg" width="226" height="150"/>
                                    <?php
                                    }
                                }
                                if ($this->editmode) {
                                    if(!$this->image('catRightImage' . $uniqueIdDG)->isEmpty())
                                        echo $this->image('catRightImage' . $uniqueIdDG, ["class" => "rightImg", "width" => 226, "height" => 150]);
                                    else
                                        echo $this->image('catRightImage' . $uniqueIdDG, ["class" => "rightImg", "width" => 226, "height" => 150])->setImage($tableRowsSkiveType['DG']['brandData']['RightPrintCatalogImageObj']);
                                } else {
                                    $imgSrcObj2 = $this->image('catRightImage' . $uniqueIdDG);
                                    if($view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj2,$this->imageWidth))
                                    {
                                    ?>
                                    <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj2,$this->imageWidth); ?>" class="rImg" width="226" height="150"/>
                                    <?php
                                    }
                                }
                                
                                $imgSrcObj1 =  $this->image('catLeftImage' . $uniqueIdDG);
                                $imgSrcObj2 = $this->image('catRightImage' . $uniqueIdDG);

                                if($this->editmode): 
                                    if($view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj1,$this->imageWidth) && $view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj2,$this->imageWidth)):
                                        if($this->input('dualgrip' . $uniqueIdDG)->isEmpty()): 
                                            echo $this->input('dualgrip' . $uniqueIdDG)->setDataFromResource('Dual-Grip Style');
                                        else: 
                                        echo $this->input('dualgrip' . $uniqueIdDG); 
                                        endif; 
                                    endif;
                                else:
                                    if($view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj1,$this->imageWidth) && $view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj2,$this->imageWidth)):
                                        echo $this->input('dualgrip' . $uniqueIdDG);
                                    endif; 
                                endif; 
                                ?>
                                    
                            </span>
                            
                            <span>
                                <?php
                                $uniqueIdNS = md5($uniqueIdTemp.$shortDescrioptionKey.$tableName.'NS');
                                if ($this->editmode) {
                                    if(!$this->image('catLeftImage' . $uniqueIdNS)->isEmpty())
                                        echo $this->image('catLeftImage' . $uniqueIdNS, ["class" => "leftImg", "width" => 226, "height" => 150]);
                                    else
                                        echo $this->image('catLeftImage' . $uniqueIdNS, ["class" => "leftImg", "width" => 226, "height" => 150])->setImage($tableRowsSkiveType['NS']['brandData']['LeftPrintCatalogImageObj']);
                                } else {
                                    $imgSrcObj1 =  $this->image('catLeftImage' . $uniqueIdNS);
                                    if($view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj1,$this->imageWidth))
                                    {
                                    ?>
                                    <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj1,$this->imageWidth); ?>" class="lImg" width="226" height="150"/>
                                    <?php
                                    }
                                }
                                if ($this->editmode) {
                                    if(!$this->image('catRightImage' . $uniqueIdNS)->isEmpty())
                                        echo $this->image('catRightImage' . $uniqueIdNS, ["class" => "rightImg", "width" => 226, "height" => 150]);
                                    else
                                        echo $this->image('catRightImage' . $uniqueIdNS, ["class" => "rightImg", "width" => 226, "height" => 150])->setImage($tableRowsSkiveType['NS']['brandData']['RightPrintCatalogImageObj']);
                                } else {
                                    $imgSrcObj2 = $this->image('catRightImage' . $uniqueIdNS);
                                    if($view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj2,$this->imageWidth))
                                    {
                                    ?>
                                    <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj2,$this->imageWidth); ?>" class="rImg" width="226" height="150"/>
                                    <?php
                                    }
                                }

                                $imgSrcObj1 =  $this->image('catLeftImage' . $uniqueIdNS);
                                $imgSrcObj2 = $this->image('catRightImage' . $uniqueIdNS);

                                if($this->editmode): 
                                    if($view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj1,$this->imageWidth) && $view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj2,$this->imageWidth)):
                                        if($this->input('unicrimp' . $uniqueIdNS)->isEmpty()): 
                                            echo $this->input('unicrimp' . $uniqueIdNS)->setDataFromResource('Uni-Crimp™ Style');
                                        else: 
                                        echo $this->input('unicrimp' . $uniqueIdNS); 
                                        endif; 
                                    endif;
                                else:
                                    if($view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj1,$this->imageWidth) && $view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj2,$this->imageWidth)):
                                        echo $this->input('unicrimp' . $uniqueIdNS);
                                    endif; 
                                endif; 

                                ?>
                                
                            </span>
                            
                            <?php
                        }
                        else
                        {
                            ?>
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
                            <?php
                        }
                        ?>
                    
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
                        if($skiveTypekey == 'Non-Skive' || $skiveTypekey == 'NS' )
                        {
                            $skiveTypeTableTitle = 'Uni-Crimp™ Style';
                        }
                        else if($skiveTypekey == 'Dual-Grip' || $skiveTypekey == 'DG'){
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
                                        <td colspan="<?= $g2count; ?>" <?php echo $columnWidth; ?>><?= $first2Array['columnLabel'] ?></td>
                                    
                                </tr>

                                    <tr class="head">
                                                    <td></td>
                                                    <td></td>
                                    </tr>
                            </thead>
                            <tbody class = "tableNewFont">
                                
                                    <tr class="" data-id="">
                                                <td></td>
                                                <td></td>
                                    </tr>
                            </tbody>


                            <!-- Closing grid div here -->
                        </table>
                        <span class="tableFooter">
                        
                        </span>
            </article>
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
