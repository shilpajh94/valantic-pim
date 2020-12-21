<?php
$this->extend('CatalogBundle:Layouts:layout.html.php');
?>
<?php if ($this->editmode) { ?>
    <?= $this->relation("inh-printcatalogproduct"); ?>
<?php } ?>
<?php
if (isset($info['brandsData'])) {
    ?>

    <?php
    if (is_array($info['brandsData'])) {
        $pg = 0;
        foreach ($info['brandsData'] as $brandKey => $brand) {
            $uniqueId = md5($brandKey);
            ?>
            <div class="template">
                <div class="segregate inh  inhSettingN">

                    <div id="pageHeader"></div>
                    <span class="pageName">
                        <?= $brand['brandData']['SIOP3Description']." - ".$brand['brandData']['SIOP4Description']; ?>
                    </span>

                    <div class="footer">
                        <footer class="flex-center <?php echo $info['footer_class']; ?> ">
                            <span class="logo">
                                <img src="<?= $info['footer_logo_src']; ?>">
                            </span>
                            <div class="flex aligned">
                                <h5>
                                    <?php if($this->editmode): ?>
                                        <?php if($this->input("INH_PP_FOOTER_BRAND_" . $uniqueId, ["placeholder" => "Brand"])->isEmpty()): ?>
                                                <?= $this->input("INH_PP_FOOTER_BRAND_" . $uniqueId, ["placeholder" => "Brand"])->setDataFromResource($brandKey) ?>
                                        <?php else: ?>
                                                <?= $this->input("INH_PP_FOOTER_BRAND_" . $uniqueId, ["placeholder" => "Brand"]); ?>
                                        <?php endif; ?>
                                    <?php else: ?>
                                            <?= $this->input("INH_PP_FOOTER_BRAND_" . $uniqueId, ["placeholder" => "Brand"]) ?>
                                    <?php endif; ?>
                                    <span>
                                        <?php if($this->editmode): ?>
                                            <?php if($this->input("INH_PP_FOOTER_HP_" . $uniqueId, ["placeholder" => "eg: Enter Product Category"])->isEmpty()): ?>
                                                    <?= $this->input("INH_PP_FOOTER_HP_" . $uniqueId, ["placeholder" => "eg: Enter Product Category"])->setDataFromResource($info['selectedCategory']) ?>
                                            <?php else: ?>
                                                    <?= $this->input("INH_PP_FOOTER_HP_" . $uniqueId, ["placeholder" => "eg: Enter Product Category"]); ?>
                                            <?php endif; ?>
                                        <?php else: ?>
                                                <?= $this->input("INH_PP_FOOTER_HP_" . $uniqueId, ["placeholder" => "eg: Enter Product Category"]) ?>
                                        <?php endif; ?>
                                    </span>
                                </h5>

                                <div class="compatible">
                                    <?php if($this->editmode): ?>
                                        <?php if($this->wysiwyg("INH_PP_FOOTER_COMP_FITTING_" . $uniqueId, ["placeholder" => "eg: Enter Product Category"])->isEmpty()): ?>
                                                <?= $this->wysiwyg("INH_PP_FOOTER_COMP_FITTING_" . $uniqueId, ["placeholder" => "eg: Enter Product Category"])->setDataFromResource("<b>Compatible Fitting</b><p>Meets or exceeds the performance requirements of</p>") ?>
                                        <?php else: ?>
                                                <?= $this->wysiwyg("INH_PP_FOOTER_COMP_FITTING_" . $uniqueId, ["placeholder" => "eg: Enter Product Category"]); ?>
                                        <?php endif; ?>
                                    <?php else: ?>
                                            <?= $this->wysiwyg("INH_PP_FOOTER_COMP_FITTING_" . $uniqueId, ["placeholder" => "eg: Enter Product Category"]) ?>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </footer>
                    </div>

                    <div class="footer1">
                        <footer class="flex-center <?php echo $info['footer_class']; ?> ">
                            <div class="flex aligned">

                                <div class="compatible">
                                    <?php if($this->editmode): ?>
                                        <?php if($this->wysiwyg("INH_PP_FOOTER_COMP_FITTING1_" . $uniqueId, ["placeholder" => "eg: Enter Product Category"])->isEmpty()): ?>
                                                <?= $this->wysiwyg("INH_PP_FOOTER_COMP_FITTING1_" . $uniqueId, ["placeholder" => "eg: Enter Product Category"])->setDataFromResource("<b>Compatible Fitting</b><p>Meets or exceeds the performance requirements of</p>") ?>
                                        <?php else: ?>
                                                <?= $this->wysiwyg("INH_PP_FOOTER_COMP_FITTING1_" . $uniqueId, ["placeholder" => "eg: Enter Product Category"]); ?>
                                        <?php endif; ?>
                                    <?php else: ?>
                                            <?= $this->wysiwyg("INH_PP_FOOTER_COMP_FITTING1_" . $uniqueId, ["placeholder" => "eg: Enter Product Category"]) ?>
                                    <?php endif; ?>
                                </div>
                                <h5>
                                    <?php if($this->editmode): ?>
                                        <?php if($this->input("INH_PP_FOOTER_BRAND1_" . $uniqueId, ["placeholder" => "Brand"])->isEmpty()): ?>
                                                <?= $this->input("INH_PP_FOOTER_BRAND1_" . $uniqueId, ["placeholder" => "Brand"])->setDataFromResource($brandKey) ?>
                                        <?php else: ?>
                                                <?= $this->input("INH_PP_FOOTER_BRAND1_" . $uniqueId, ["placeholder" => "Brand"]); ?>
                                        <?php endif; ?>
                                    <?php else: ?>
                                            <?= $this->input("INH_PP_FOOTER_BRAND1_" . $uniqueId, ["placeholder" => "Brand"]) ?>
                                    <?php endif; ?>
                                    <span>
                                        <?php if($this->editmode): ?>
                                            <?php if($this->input("INH_PP_FOOTER_HP1_" . $uniqueId, ["placeholder" => "eg: Enter Product Category"])->isEmpty()): ?>
                                                    <?= $this->input("INH_PP_FOOTER_HP1_" . $uniqueId, ["placeholder" => "eg: Enter Product Category"])->setDataFromResource($info['selectedCategory']) ?>
                                            <?php else: ?>
                                                    <?= $this->input("INH_PP_FOOTER_HP1_" . $uniqueId, ["placeholder" => "eg: Enter Product Category"]); ?>
                                            <?php endif; ?>
                                        <?php else: ?>
                                                <?= $this->input("INH_PP_FOOTER_HP1_" . $uniqueId, ["placeholder" => "eg: Enter Product Category"]) ?>
                                        <?php endif; ?>
                                </h5>

                            </div>
                            <span class="logo">
                                <img src="<?= $info['footer_logo_src']; ?>">
                            </span>
                        </footer>
                    </div>

                    <article class="fullcontainer single">
                        <div class="inhsetting1">
 <div class="inhsetting-sidebar">
                            <div class=" sidebar">
                                <ul>
                                    <?php
                                    if (is_array($info['categories'])) {
                                        foreach ($info['categories'] as $category) {
                                            $first = "";
                                            if ($info['selectedCategory'] == $category['mainCategory'][0]['name']) {
                                                $first = "first";
                                            }
                                            
                                            echo "<li class='$first'>";

                                            if(isset($category['mainCategory'][0]['name']))
                                                echo "<p><b>" . $category['mainCategory'][0]['name'] . "</b></p>";
                                            else
                                                echo "<p</p>";

                                            if (is_array($category['subCategory']) && !empty($category['subCategory'])) {
                                                foreach ($category['subCategory'] as $k => $cat) {
                                                    if ($cat['printable'] == 1) {
                                                        echo "<p>" . $cat['name'] . "</p>";
                                                    }
                                                }
                                            }
                                            echo "</li>";
                                        }
                                    }
                                        ?>
                                    </ul>
                                </div>
 </div>
<!--<div class="inhSettingRight">-->
                                <div class="inhRight">
                                    <header class=" white">
                                        <h1>
                                            <?php if($this->editmode): ?>
                                                <?php if($this->input("INH_PRODUCT_BRANDNAME_{$uniqueId}", ["placeholder" => "eg: Enter Brand"])->isEmpty()): ?>
                                                        <?= $this->input("INH_PRODUCT_BRANDNAME_{$uniqueId}", ["placeholder" => "eg: Enter Brand"])->setDataFromResource($brandKey) ?>
                                                <?php else: ?>
                                                        <?= $this->input("INH_PRODUCT_BRANDNAME_{$uniqueId}", ["placeholder" => "eg: Enter Brand"]); ?>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                    <?= $this->input("INH_PRODUCT_BRANDNAME_{$uniqueId}", ["placeholder" => "eg: Enter Brand"]) ?>
                                            <?php endif; ?>
                                        </h1>
					<aside>
                                         <div>
                                            <?php if($this->editmode): ?>
                                                <?php if($this->wysiwyg("INH_LONG_DESCRIPTION_{$uniqueId}", ["placeholder" => "eg: Enter Brand Description"])->isEmpty()): ?>
                                                        <?= $this->wysiwyg("INH_LONG_DESCRIPTION_{$uniqueId}", ["placeholder" => "eg: Enter Brand Description"])->setDataFromResource($brand['brandData']['longDescription']) ?>
                                                <?php else: ?>
                                                        <?= $this->wysiwyg("INH_LONG_DESCRIPTION_{$uniqueId}", ["placeholder" => "eg: Enter Brand Description"]); ?>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                    <?= $this->wysiwyg("INH_LONG_DESCRIPTION_{$uniqueId}", ["placeholder" => "eg: Enter Brand Description"]) ?>
                                            <?php endif; ?>
                                        </div>
                                        <?php
                                        if ($this->editmode) {
                                            echo $this->image("INH_MAIN_IMAGE_{$uniqueId}", ['width' => 1067, 'height' => 128])->setImage($brand['brandData']['mainImage']);
                                        } else {
                                            if(!$this->image("INH_MAIN_IMAGE_{$uniqueId}")->isEmpty())
                                                $imgSrcObj = $this->image("INH_MAIN_IMAGE_{$uniqueId}");

                                            if($imgSrcObj)
                                            {
                                            ?>
                                            <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" width="1067" height="128"/>
                                            <?php
                                            }
                                        }
                                        ?>
                                    </aside>
                                </header>
                                <section class="content">
                                    <?php if($brand['brandData']['safetyFeatures'] || !empty(trim($brand['brandData']['tubeMaterial'])) || !empty(trim($brand['brandData']['coverMaterial'])) || !empty(trim($brand['brandData']['orderCodes'])) || !empty(trim($brand['brandData']['reinforcement'])) || !empty(trim($brand['brandData']['temperatureRangeFAndC'])) || !empty(trim($brand['brandData']['Coupling'])) || !empty(trim($brand['brandData']['Packaging']))): ?>
                                        <menu class="flex">
                                            <div class="specs">
                                                <h6><?= $this->translate('specs') ?></h6>
                                                <div class="spec-requirement flex">
                                                    <div class="col-6">
                                                        <?php if (!empty(trim($brand['brandData']['tubeMaterial']))): ?>
                                                            <div>
                                                                <b><?= $this->translate('Tube Material') ?></b>
                                                                <?= $brand['brandData']['tubeMaterial'] ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if (!empty(trim($brand['brandData']['coverMaterial']))): ?>
                                                            <div>
                                                                <b><?= $this->translate('Cover Material') ?></b>
                                                                <?= $brand['brandData']['coverMaterial'] ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if (!empty(trim($brand['brandData']['reinforcement']))): ?>
                                                            <div>
                                                                <b><?= $this->translate('Reinforcement') ?></b>
                                                                <?= $brand['brandData']['reinforcement'] ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if (!empty(trim($brand['brandData']['temperatureRangeFAndC']))): ?>
                                                            <div>
                                                                <b><?= $this->translate('Temperature Range') ?></b>
                                                                <?= $brand['brandData']['temperatureRangeFAndC'] ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        
                                                    </div>
                                                    <div class="col-6">
                                                        
                                                        <?php if (!empty(trim($brand['brandData']['Packaging']))): ?>
                                                            <div>
                                                                <b><?= $this->translate('Packaging') ?></b>
                                                                <?= $brand['brandData']['Packaging'] ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if (!empty(trim($brand['brandData']['Coupling']))): ?>
                                                            <div>
                                                                <b><?= $this->translate('Coupling') ?></b>
                                                                <?= $brand['brandData']['Coupling'] ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-12">

                                                </div>
                                            </div>

                                            <?php if ($brand['brandData']['safetyFeatures']): ?>
                                                <div class="feature">
                                                    <h6><?= $this->translate('features') ?></h6>
                                                    <div>
                                                        <?php foreach ($brand['brandData']['safetyFeatures'] as $key => $feature): ?>
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
                                    <menu>
                                        <h6><?= $this->translate('branding') ?></h6>
                                        <figure>
                                            <img src="<?= $info['branding_image_src']; ?>" width='80'/>
                                            <figcaption><b><?= $brandKey ?></b></figcaption>
                                            <figcaption> <?= $brand['brandData']['BrandingLayline'] ?> </figcaption>
                                        </figure>
                                    </menu>
                                    <?php
                                    $noterow = 0;

                                    if(isset($brand['articleData']) && is_array($brand['articleData'])):

                                        foreach ($brand['articleData'] as $key => $GroupingFields):
                                            foreach ($GroupingFields as $gkey => $fittingTableName):
                                            $tableKey = md5($key.$gkey);
                                        ?>
                                            <h5><?= $brandKey. " ". $key ?> </h5>
                                            <?php if($fittingTableName['orderCodes']): ?>
                                            <p><b>Order Codes :</b> 
                                            
                                            <?php if($this->editmode): ?>
                                                <?php if($this->input('INH_PP_OrderCodes_' . $uniqueId.'_'.$tableKey, ["placeholder" => "eg: Enter Order Codes"])->isEmpty()): ?>
                                                        <?= $this->input('INH_PP_OrderCodes_' . $uniqueId.'_'.$tableKey, ["placeholder" => "eg: Enter Order Codes"])->setDataFromResource($fittingTableName['orderCodes']) ?>
                                                <?php else: ?>
                                                        <?= $this->input('INH_PP_OrderCodes_' . $uniqueId.'_'.$tableKey, ["placeholder" => "eg: Enter Order Codes"]); ?>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                    <?= $this->input('INH_PP_OrderCodes_' . $uniqueId.'_'.$tableKey, ["placeholder" => "eg: Enter Order Codes"]) ?>
                                            <?php endif; ?>
                                            </p>
                                            <?php endif; ?>

                                            <!-- <table class="grid" cellpadding="0" cellspacing="0"> -->
                                            <table class="grid special inh marginBottom5" cellspacing="0" cellpadding="0">
                                                <thead>

                                                    <?php if ($info['iconRequired'] == 'YES'): ?>
                                                        <tr class="sub-head">
                                                            <?php foreach ($fittingTableName['columnsDataWithImages'] as $key => $c1data): ?>
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
                                                        <?php foreach ($fittingTableName['columnsDataWithImages'] as $key => $c2data): ?>
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

                                                    <?php if ($fittingTableName['subHeaderRequired'] == 'YES'): ?>
                                                        <tr class="head">
                                                            <?php foreach ($fittingTableName['columnsDataWithImages'] as $key => $c3data): ?>
                                                                <?php foreach ($c3data as $c3key => $c3value): ?>
                                                                    <?php if ($c3value['unitName']): ?>
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

                                                    if(isset($fittingTableName['articles']) && is_array($fittingTableName['articles'])):
                                                    $incrRow = 1;

                                                    ?>
                                                    <?php foreach ($fittingTableName['articles'] as $key => $element): ?>
                                                        <?php if ($incrRow % 2 == 0): ?>
                                                            <tr>
                                                            <?php else: ?>
                                                            <tr class="active">
                                                            <?php endif; ?>
                                                            <?php foreach ($element as $ekey => $value): ?>
                                                                <td><?= $value ?></td>
                                                            <?php endforeach; ?>
                                                        </tr>
                                                        <?php $incrRow++ ?>
                                                    <?php
                                                        endforeach;
                                                    endif;
                                                    ?>
                                                </tbody>


                                            </table>
                                            <p class="small"><?= $this->input('INH_PP_Note_' . $uniqueId.'_'.$tableKey, ['placeholder' => 'Enter comment']); ?></p>
                                        <?php
                                        $noterow++;
                                        endforeach;
                                        endforeach;
                                    endif;
                                    ?>
                                </section>
                            </div>
                        </div>
<!-- </div> -->
                    </article>
                </div>
            </div>
            <?php
            $pg++;
        }
    }
    ?>


<?php } ?>


<script>
    var rows = document.querySelectorAll(".inhsetting1");
    rows.forEach(function (row) {
        var rowDescriptions = ro.layout.getBoxDescriptions(row);
        var rowDescription = rowDescriptions[0];
        const onLeftPage = rowDescription.pageLeft;
        row.className = row.className +" "+  (onLeftPage ? "inhsettingLeft" : "inhsettingRight");
    });
</script>
