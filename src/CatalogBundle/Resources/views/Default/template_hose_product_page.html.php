
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
if ($data):
    foreach ($data as $catalogGroupKey => $catalogGroupData):

        $incr = 1;
        foreach ($catalogGroupData as $brandName => $brandData):
            extract($brandData);

// foreach($data as $key => $brand):
// extract($brand);

            $imageObj = '';
            if ($incr % 2 == 0) {
                $imageObj = $RightPrintCatalogImageObj;
            } else {
                $imageObj = $LeftPrintCatalogImageObj;
            }
            ?>
            <div class="template">
                <section class="segregate">

                    <div id="pageHeader"></div>
                    <span  class="pageName">
                        <?php
                        if ($this->editmode) {
                            echo $this->input("HHPP_Header_{$incr}")->setDataFromResource('Hydraulic Hose');
                        } else {
                            echo $this->input("HHPP_Header_{$incr}");
                        }
                        ?>
                    </span>

                    <div class="footer">
                        <footer class="flex-center <?php echo $footer_class; ?>">
                            <span class="logo">
                                <b>
                                <?php if($this->editmode): ?>
                                        <?php if($this->input("HHPP_Logo_Text1_{$incr}")->isEmpty()): ?>
                                                <?= $this->input("HHPP_Logo_Text1_{$incr}")->setDataFromResource('Hose') ?>
                                        <?php else: ?>
                                                <?= $this->input("HHPP_Logo_Text1_{$incr}"); ?>
                                        <?php endif; ?>
                                <?php else: ?>
                                        <?= $this->input("HHPP_Logo_Text1_{$incr}") ?>
                                <?php endif; ?>
                                </b>
                                <img src="<?= $footer_logo_src; ?>">
                            </span>
                            <div class="flex aligned">
                                <h5>
                                    <?php
                                    if ($this->editmode) {
                                        echo $this->input("HHPP_Footer_BrandName_{$incr}")->setDataFromResource($brandName);
                                    } else {
                                        echo $this->input("HHPP_Footer_BrandName_{$incr}");
                                    }
                                    ?>

                                    <span>

                                        <?php
                                        if ($this->editmode) {
                                            echo $this->input("HHPP_Footer_HoseType_{$incr}")->setDataFromResource('High Pressure');
                                        } else {
                                            echo $this->input("HHPP_Footer_HoseType_{$incr}");
                                        }
                                        ?>

                                    </span>
                                </h5>

                                <div class="compatible">
                                    <b>
                                        <?php
                                        if ($this->editmode) {
                                            echo $this->input("HHPP_Footer_Compatibility_{$incr}")->setDataFromResource('Compatible fittings');
                                        } else {
                                            echo $this->input("HHPP_Footer_Compatibility_{$incr}");
                                        }
                                        ?>
                                    </b>

                                    <?php
                                    $compatibility_description = "All fittings compatible with {$brandName} are listed in Section 1 (starting on page 131).";
                                    if ($this->editmode) {
                                        echo $this->input("HHPP_Footer_Compatibility_Description_{$incr}")->setDataFromResource($compatibility_description);
                                    } else {
                                        echo $this->input("HHPP_Footer_Compatibility_Description_{$incr}");
                                    }
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
                                        if ($this->editmode) {
                                            echo $this->input("HHPP_Footer_Compatibility1_{$incr}")->setDataFromResource('Compatible fittings');
                                        } else {
                                            echo $this->input("HHPP_Footer_Compatibility1_{$incr}");
                                        }
                                        ?>
                                    </b>

                                    <?php
                                    $compatibility_description = "All fittings compatible with {$brandName} are listed in Section 1 (starting on page 131).";
                                    if ($this->editmode) {
                                        echo $this->input("HHPP_Footer_Compatibility_Description1_{$incr}")->setDataFromResource($compatibility_description);
                                    } else {
                                        echo $this->input("HHPP_Footer_Compatibility_Description1_{$incr}");
                                    }
                                    ?>
                                </div>
                                <h5>

                                    <?php
                                    if ($this->editmode) {
                                        echo $this->input("HHPP_Footer_BrandName1_{$incr}")->setDataFromResource($brandName);
                                    } else {
                                        echo $this->input("HHPP_Footer_BrandName1_{$incr}");
                                    }
                                    ?>

                                    <span>

                                        <?php
                                        if ($this->editmode) {
                                            echo $this->input("HHPP_Footer_HoseType1_{$incr}")->setDataFromResource('High Pressure');
                                        } else {
                                            echo $this->input("HHPP_Footer_HoseType1_{$incr}");
                                        }
                                        ?>

                                    </span>

                                </h5>
                            </div>
                            <span class="logo">

                                <b>
                                <?php if($this->editmode): ?>
                                        <?php if($this->input("HHPP_Logo_Text2_{$incr}")->isEmpty()): ?>
                                                <?= $this->input("HHPP_Logo_Text2_{$incr}")->setDataFromResource('Hose') ?>
                                        <?php else: ?>
                                                <?= $this->input("HHPP_Logo_Text2_{$incr}"); ?>
                                        <?php endif; ?>
                                <?php else: ?>
                                        <?= $this->input("HHPP_Logo_Text2_{$incr}") ?>
                                <?php endif; ?>
                                </b>
                                <img src="<?= $footer_logo_src; ?>">
                            </span>
                        </footer>
                    </div>
                    <header class="content white productHeadingProductPage">
                        <h1>
                            <?php
                            if ($this->editmode) {
                                echo $this->input("HHPP_Heading_{$incr}")->setDataFromResource($brandName);
                            } else {
                                echo $this->input("HHPP_Heading_{$incr}");
                            }
                            ?>
                        </h1>
                        <aside>
                            <p>
                                <?php
                                if ($this->editmode) {
                                    echo $this->wysiwyg("HHPP_LongDescription_{$incr}")->setDataFromResource($longDescription);
                                } else {
                                    echo $this->wysiwyg("HHPP_LongDescription_{$incr}");
                                }
                                ?>
                            </p>
                            <?php
                            if ($this->editmode) {
                                echo $this->image("HHPP_Image_Left_{$incr}", ["class" => "leftImg", "width" => 600, "height" => 200])->setImage($LeftPrintCatalogImageObj);
                            } else {
                                if(!$this->image("HHPP_Image_Left_{$incr}")->isEmpty())
                                    echo $this->image("HHPP_Image_Left_{$incr}", ["class" => "leftImg", "width" => 600, "height" => 200]);
                            }
                            ?>
                            <?php
                            if ($this->editmode) {
                                echo $this->image("HHPP_Image_Right_{$incr}", ["class" => "rightImg", "width" => 600, "height" => 200])->setImage($RightPrintCatalogImageObj);
                            } else {
                                if(!$this->image("HHPP_Image_Right_{$incr}")->isEmpty())
                                    echo $this->image("HHPP_Image_Right_{$incr}", ["class" => "rightImg", "width" => 600, "height" => 200]);
                            }
                            ?>
                        </aside>
                    </header>
                    <article class="fullcontainer ">

                        <section class="content single">
                            <?php if ($safetyFeatures || $standardMetHoseListData || !empty(trim($tubeMaterialAtrributeString)) || !empty(trim($reinforcement)) || !empty(trim($coverMaterialattributeString)) ||!empty(trim($temperatureRangeFAndC))): ?>

                                <menu class="flex">
                                    <?php if ($standardMetHoseListData || !empty(trim($tubeMaterialAtrributeString)) || !empty(trim($reinforcement)) || !empty(trim($coverMaterialattributeString)) || !empty(trim($temperatureRangeFAndC))): ?>
                                        <div class="specs">
                                            <h6><?= $this->translate('specs') ?></h6>
                                            <div class="spec-requirement">
                                                <div class="col-6">
                                                    <?php if ($standardMetHoseListData): ?>

                                                        <?php foreach ($standardMetHoseListData as $key => $standard): ?>
                                                            <?= $this->input("standardMetHose{$incr}_{$key}")->setDataFromResource($standard['CustomerFacingVersion']) ?>
                                                            <p><?= $standard['name'] ?></p>
                                                        <?php endforeach; ?>

                                                    <?php endif; ?>
                                                    
                                                </div>
                                                <div class="col-6">
                                                    <?php if (!empty(trim($tubeMaterialAtrributeString))): ?>
                                                        <p>
                                                            <b><?= $this->translate('Inner Tube') ?></b>
                                                            <?= $tubeMaterialAtrributeString ?>
                                                        </p>
                                                    <?php endif; ?>

                                                    <?php if (!empty(trim($reinforcement))): ?>
                                                        <p>                
                                                            <b><?= $this->translate('Reinforcement') ?></b>
                                                            <?= $reinforcement ?>
                                                        </p>
                                                    <?php endif; ?>

                                                    <?php if (!empty(trim($coverMaterialattributeString))): ?>
                                                        <p>              
                                                            <b><?= $this->translate('Cover') ?></b>
                                                            <?= $coverMaterialattributeString ?>
                                                        </p>
                                                    <?php endif; ?>

                                                    <?php if (!empty(trim($temperatureRangeFAndC))): ?>
                                                        <p>              
                                                            <b><?= $this->translate('Temperature Range') ?></b>
                                                            <?= $temperatureRangeFAndC ?>
                                                        </p>
                                                    <?php endif; ?>
                                                </div>

                                            </div>
                                        </div> 
                                    <?php endif; ?>

                                    <?php if ($safetyFeatures): ?>
                                        <div class="feature">
                                            <h6><?= $this->translate('features') ?></h6>
                                            <div>
                                                <?php foreach ($safetyFeatures as $key => $feature): ?>
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

                            <?php if (!empty(trim($BrandingLayline))): ?>
                                <menu>
                                    <h6><?= $this->translate('branding') ?></h6>
                                    <figure>
                                        <img src="<?= $branding_image_src; ?>" width='80'/> 
                                        <figcaption><b><?= $brandName ?></b></figcaption> 
                                        <figcaption> <?= $BrandingLayline ?> </figcaption>
                                    </figure>
                                </menu>
                            <?php endif; ?>

                            <table cellpadding="0" cellspacing="0" class="grid">
                                <thead>
                                        <?php if($iconRequired == 'YES'): ?>
                                                <tr class="sub-head">
                                                        <?php foreach($columnsDataWithImages as $key => $c1data): ?>
                                                                <?php 
                                                                        $g1count = count($c1data);
                                                                        $firstArray = array_shift($c1data);
                                                                ?>
                                                                <td colspan="<?= $g1count; ?>">
                                                                <?php if($firstArray['columnIcon']): ?>
                                                                <img src="<?= $firstArray['columnIcon'] ?>" width="45" height="45" />
                                                                <?php endif; ?>
                                                                </td>
                                                        <?php endforeach; ?>
                                                </tr>
                                        <?php endif; ?>

                                        <tr class="head">
                                                <?php foreach($columnsDataWithImages as $key => $c2data): ?>
                                                        <?php 
                                                                $g2count = count($c2data);
                                                                $first2Array = array_shift($c2data);
                                                        ?>
                                                        <td colspan="<?= $g2count; ?>"><?= $first2Array['columnLabel'] ?></td>
                                                <?php endforeach; ?>
                                        </tr>
                                        
                                        <?php if($subHeaderRequired == 'YES'): ?>
                                                <tr class="sub-head">
                                                        <?php foreach($columnsDataWithImages as $key => $c3data): ?>
                                                                <?php  foreach($c3data as $c3key => $c3value): ?>
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
                                <?php foreach ($articlesData as $key => $element): ?>
                                    <?php if ($incrRow % 2 == 0): ?>
                                        <tr>
                                        <?php else: ?>
                                        <tr class="active">
                                        <?php endif; ?>
                                        <?php foreach ($element as $ekey => $value): ?>
                                            <td><?= $value; ?></td>
                                        <?php endforeach; ?>
                                    </tr>
                                    <?php $incrRow++ ?>
                                <?php endforeach; ?>

                            </table>
                            <p class="small"><?= $this->input("customer_data_{$incr}_{$key}", ['placeholder' => 'Enter comment']); ?></p>
                        </section>

                    </article>

                    <?php //if($incr != count($catalogGroupData)):  ?>

                    <?php //endif;  ?>    

                </section>
            </div>
            <?php
            $incr++;
        endforeach;

    endforeach;
endif;
?>

<script>
    var rows = document.querySelectorAll(".productHeadingProductPage");
    rows.forEach(function (row) {
        var rowDescriptions = ro.layout.getBoxDescriptions(row);
        var rowDescription = rowDescriptions[0];
        const onLeftPage = rowDescription.pageLeft;
        row.className = onLeftPage ? "leftpHeadingSection" : "rightpHeadingSection";
    });
</script>

