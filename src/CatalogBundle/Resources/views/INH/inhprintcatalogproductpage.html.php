<?php
$this->extend('CatalogBundle:Layouts:layout.html.php');
?>
<?php if ($this->editmode) { ?>
    <?= $this->relation("inh-printcatalog"); ?>
<?php } ?>
<?php
if (isset($info['data'])) {
?>
    <?php
    if (is_array($info['data'])) {
        foreach ($info['data'] as $tableName => $tableData) {
            foreach ($tableData['data'] as $brand => $rows) {
                //p_r($rows);die;
    ?>
                <div class="seggregate">
                    <nav class="header">
                        <div id="pageHeader"></div>
                        <span><?= $this->translate('Hydraulic Hose');?></span>
                    </nav>

                    <article class="fullcontainer ">

                        <div class="flex noWrap">
                            <div class="sidebar">
                                <ul>
                                    <?php
                                    if (is_array($info['categories'])) {
                                        foreach ($info['categories'] as $category) {
                                            $catNames = array_column($category, 'name');
                                            $first = "";
                                            foreach ($catNames as $cn) {
                                                if ($info['selectedCategory'] == $cn) {
                                                    $first = "first";
                                                }
                                            }
                                            echo "<li class='$first'>";
                                            if (is_array($category) && !empty($category)) {
                                                foreach ($category as $k => $cat) {
                                                    if ($cat['printable'] == 1 && $cat['level'] == 3) {
                                                        echo "<p><b>" . $cat['name'] . "</b></p>";
                                                    } else {
                                                        if ($cat['printable'] == 1) {
                                                            echo "<p>" . $cat['name'] . "</p>";
                                                        }
                                                    }
                                                }
                                            }
                                            echo "</li>";
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>

                            <div class="grow-2 width80">
                                <h2 class="borderBottom marginBottom5 flex-center"><?php echo $brand ?>&reg;
                                    <!-- <img src="images/12a.JPG" class="alignRight" /> -->
                                    <?php
                                    // Feature Icons
                                    if (is_array($rows['info']['featureIcon'])) {
                                        foreach ($rows['info']['featureIcon'] as $fid => $feature) {
                                            if ($this->editmode) {
                                                echo $this->image('INH_PP_ICONS_' . md5($brand) . $fid, ['class' => 'alignRight'])->setImage($feature['icon']);
                                            } else {
                                                echo $this->image('INH_PP_ICONS_' . md5($brand) . $fid, ['class' => 'alignRight']);
                                            }
                                        }
                                    }
                                    ?>
                                </h2>

                                <?php
                                if ($this->editmode) {
                                ?>
                                    <span class="img-placeholder marginBottom15">
                                        <?php echo $this->image('INH_PP_BRAND_BOTTOM' . md5($brand), ['width' => 595, 'height' => 128]); ?>
                                    </span>
                                <?php
                                }
                                if (!$this->image('INH_PP_BRAND_BOTTOM' . md5($brand))->isEmpty()) {
                                ?>
                                    <span class="img-placeholder marginBottom15">
                                        <?php echo $this->image('INH_PP_BRAND_BOTTOM' . md5($brand), ['width' => 595, 'height' => 128]); ?>
                                    </span>
                                <?php } ?>
                                <h3 class="light"><?php echo $this->input("INH_PP_Product_specification" . md5($brand))->setDataFromResource($this->translate("Product Specification")); ?></h3>
                                <div class="flex  specs-details">
                                    <div class="col-6">
                                        <?php
                                        if ($this->editmode) {
                                        ?>
                                            <p>
                                                <b><?= $this->translate('longDescription');?></b>
                                                <?php
                                                echo $this->wysiwyg('INH_PP_APPLICATION_' . md5($brand))->setDataFromResource($rows['info']['Application']);
                                                ?>
                                            </p>
                                        <?php
                                        }
                                        if (!$this->editmode && !$this->wysiwyg('INH_PP_APPLICATION_' . md5($brand))->isEmpty()) {
                                        ?>
                                            <b>Application</b>
                                            <?php
                                            echo $this->wysiwyg('INH_PP_APPLICATION_' . md5($brand));
                                            ?>
                                            </p>
                                        <?php
                                        }
                                        ?>

                                        <?php
                                        if ($this->editmode) {
                                        ?>
                                            <p>
                                                <b><?= $this->input('Construction'.md5($brand))->setDataFromResource($this->translate('Construction'));?></b>
                                                <b>> <?= $this->translate('VirtualCatalogTubeMaterial');?></b>
                                                <?php
                                                echo $this->wysiwyg('INH_PP_Tube_' . md5($brand))->setDataFromResource($rows['info']['VirtualCatalogTubeMaterial']);
                                                ?>

                                                <b>> <?= $this->translate('VirtualCatalogCoverMaterial');?></b>
                                                <?php
                                                echo $this->wysiwyg('INH_PP_Cover_' . md5($brand))->setDataFromResource($rows['info']['VirtualCatalogCoverMaterial']);
                                                ?>

                                                <b>> <?= $this->translate('VirtualCatalogReinforcement');?></b>
                                                <?php
                                                echo $this->wysiwyg('INH_PP_Reinforcement_' . md5($brand))->setDataFromResource($rows['info']['VirtualCatalogReinforcement']);
                                                ?>
                                            </p>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if (
                                            !$this->editmode &&
                                            (!$this->wysiwyg('INH_PP_Tube_' . md5($brand))->isEmpty() ||
                                                !$this->wysiwyg('INH_PP_Cover_' . md5($brand))->isEmpty() ||
                                                !$this->wysiwyg('INH_PP_Reinforcement_' . md5($brand))->isEmpty())
                                        ) { ?>
                                            <p>
                                                <?php
                                                if (!$this->wysiwyg('INH_PP_Tube_' . md5($brand))->isEmpty()) { ?>
                                                    <b><?= $this->input('Construction'.md5($brand));?></b>
                                                    <b>> <?= $this->translate('VirtualCatalogTubeMaterial');?></b>
                                                    <?php
                                                    echo $this->wysiwyg('INH_PP_Tube_' . md5($brand));
                                                    ?>
                                                <?php }
                                                ?>
                                                <?php
                                                if (!$this->wysiwyg('INH_PP_Cover_' . md5($brand))->isEmpty()) { ?>
                                                    <b>> <?= $this->translate('VirtualCatalogCoverMaterial');?></b>
                                                    <?php
                                                    echo $this->wysiwyg('INH_PP_Cover_' . md5($brand));
                                                    ?>
                                                <?php }
                                                ?>
                                                <?php
                                                if (!$this->wysiwyg('INH_PP_Reinforcement_' . md5($brand))->isEmpty()) { ?>
                                                    <b>> <?= $this->translate('VirtualCatalogReinforcement');?></b>
                                                    <?php
                                                    echo $this->wysiwyg('INH_PP_Reinforcement_' . md5($brand));
                                                    ?>
                                                <?php }
                                                ?>
                                            </p>
                                        <?php } ?>
                                        <?php
                                        if ($this->editmode) { ?>
                                            <p>
                                                <b><?= $this->translate('VirtualCatalogHoseTemperatureRangeFAndC');?></b>
                                                <?php
                                                echo $this->textarea('INH_PP_Temprance_' . md5($brand))->setDataFromResource($rows['info']['VirtualCatalogHoseTemperatureRangeFAndC']);
                                                ?>
                                            </p>
                                        <?php } ?>
                                        <?php
                                        if (!$this->editmode && !$this->textarea('INH_PP_Temprance_' . md5($brand))->isEmpty()) { ?>
                                            <p>
                                                <b><?= $this->translate('VirtualCatalogHoseTemperatureRangeFAndC');?></b>
                                                <?php
                                                echo $this->textarea('INH_PP_Temprance_' . md5($brand));
                                                ?>
                                            </p>
                                        <?php } ?>


                                    </div>
                                    <div class="col-6">
                                        <?php
                                        if ($this->editmode) { ?>
                                            <p>
                                                <b><?= $this->translate('VirtualCatalogPackaging');?></b>
                                                <?php
                                                echo $this->wysiwyg('INH_PP_Packaging_' . md5($brand))->setDataFromResource($rows['info']['VirtualCatalogPackaging']);
                                                ?>
                                            </p>
                                        <?php } ?>
                                        <?php
                                        if (!$this->editmode && !$this->wysiwyg('INH_PP_Packaging_' . md5($brand))->isEmpty()) { ?>
                                            <p>
                                                <b><?= $this->translate('VirtualCatalogPackaging');?></b>
                                                <?php
                                                echo $this->wysiwyg('INH_PP_Packaging_' . md5($brand));
                                                ?>
                                            </p>
                                        <?php } ?>
                                        <?php
                                        if ($this->editmode) { ?>
                                            <p>
                                                <b><?= $this->translate('VirtualCatalogBrandingLayline');?></b>
                                                <?php
                                                echo $this->input('INH_PP_Branding_' . md5($brand))->setDataFromResource($rows['info']['VirtualCatalogBrandingLayline']);
                                                ?>
                                            </p>
                                        <?php } ?>
                                        <?php
                                        if (!$this->editmode && !$this->input('INH_PP_Branding_' . md5($brand))->isEmpty()) { ?>
                                            <p>
                                                <b><?= $this->translate('VirtualCatalogBrandingLayline');?></b>
                                                <?php
                                                echo $this->input('INH_PP_Branding_' . md5($brand));
                                                ?>
                                            </p>
                                        <?php } ?>
                                        <?php
                                        if ($this->editmode) { ?>
                                            <p>
                                                <b><?= $this->translate('VirtualCatalogCoupling');?></b>
                                                <?php
                                                echo $this->textarea('INH_PP_Coupling_' . md5($brand))->setDataFromResource($rows['info']['VirtualCatalogCoupling']);
                                                ?>
                                            </p>
                                        <?php } ?>
                                        <?php
                                        if (!$this->editmode && !$this->textarea('INH_PP_Coupling_' . md5($brand))->isEmpty()) { ?>
                                            <p>
                                                <b><?= $this->translate('VirtualCatalogCoupling');?></b>
                                                <?php
                                                echo $this->textarea('INH_PP_Coupling_' . md5($brand));
                                                ?>
                                            </p>
                                        <?php } ?>

                                        <?php
                                        if ($this->editmode) { ?>
                                            <p>
                                                <b><?= $this->translate('Order Codes');?></b>
                                                <?php
                                                $orderCode = is_array($rows['info']['orderCode']) ? implode(", ", $rows['info']['orderCode']) : "";
                                                if ($this->editmode) {
                                                    echo $this->input('INH_PP_Input_OrderCode' . md5($brand))->setDataFromResource($orderCode);
                                                }
                                                ?>
                                            </p>
                                        <?php } ?>
                                        <?php
                                        if (!$this->editmode && $this->input('INH_PP_Input_OrderCode' . md5($brand))) { ?>
                                            <p>
                                                <b><?= $this->translate('Order Codes');?></b>
                                                <?php
                                                echo $this->input('INH_PP_Input_OrderCode' . md5($brand));
                                                ?>
                                            </p>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                                <div class="grid special marginBottom5">
                                    <h5 class="borderBottom"><?php echo $brand; ?>&reg; </h5>
                                    <table class="grid special marginBottom5" cellspacing="0" cellpadding="0">
                                        <thead>
                                            <tr class="head ">
                                                <?php
                                                foreach ($info['dispColumns'] as $key => $col) {
                                                    echo "<td>{$this->translate($info['dataTableColumn'][$col]->columnLabel)}</td>";
                                                }
                                                ?>
                                            </tr>
                                        </thead>
                                        <?php
                                        if (is_array($rows['products']) && !empty($rows['products'])) {
                                            $i = 1;
                                            foreach ($rows['products'] as $row) {
                                                $active = "";
                                                if ($i % 2 != 0) {
                                                    $active = "active";
                                                }
                                                $i++;
                                                echo "<tr class='$active'>";
                                                foreach ($info['dispColumns'] as $key => $col) {
                                                    $td = false;
                                                    if (is_array($row[$col])) {
                                                        if (!empty($row[$col])) {
                                                            $td = true;
                                                            echo "<td>{$row[$col][0]}</td>";
                                                        }
                                                    } else {
                                                        $td = true;
                                                        echo "<td>{$row[$col]}</td>";
                                                    }
                                                    if (!$td) {
                                                        echo "<td></td>";
                                                    }
                                                }
                                                echo "</tr>";
                                            }
                                        }
                                        ?>
                                    </table>


                                </div>
                                <p class="small">*Lorem ipsum</p>
                            </div>

                        </div>





                    </article>

                    <footer class="flex reverseColor">
                        <span class="logo">
                            <b>Fittings</b>
                            <img src="images/6b.JPG" />
                        </span>
                        <div class="flex aligned">
                            <h5>
                                Split flanges
                                <span>Code 61 / Code 62 clamps kit</span>
                            </h5>


                        </div>
                    </footer>
                </div>
    <?php }
        }
    } ?>
<?php } ?>