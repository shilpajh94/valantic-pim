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
    // p_r($info);die;
    if (is_array($info['data'])) {
        $pg = 0;
        foreach ($info['data'] as $tableName => $tableData) {
            foreach ($tableData['data'] as $brand => $rows) {
                $brandenc = md5($brand . $pg);
                //p_r($rows);die;
    ?>

                <div class="template">
                    <div class="segregate">

                        <div id="pageHeader"></div>
                        <span class="pageName">
                            <?php
                            if (isset($info['selectedCategory']) && !empty($info['selectedCategory'])) {
                                echo $this->input("INH_PP_HEADER_CAP_" . $brandenc, ["placehoder" => "SIOP Cat Description"])->setDataFromResource($info['selectedCategory']);
                            } else {
                                echo $this->input("INH_PP_HEADER_CAP_" . $brandenc, ["placehoder" => "SIOP Cat Description"]);
                            }
                            ?>

                        </span>



                        <div class="footer">
                            <footer class="flex-center ">
                                <span class="logo">
                                    <?php
                                    if ($info['logo'] != null) {
                                        echo $this->image("FOOTER_LOGO_" . $brandenc, ["width" => 120, "height" => 53])->setImage($info['logo']);
                                    } else {
                                        echo $this->image("FOOTER_LOGO_" . $brandenc, ["width" => 120, "height" => 53]);
                                    }

                                    ?>
                                </span>
                                <div class="flex aligned">
                                    <h5>
                                        <?= $this->input("INH_PP_FOOTER_BRAND_" . $brandenc, ["placeholder" => "Brand"])->setDataFromResource($brand); ?>
                                        <span><?= $this->input("INH_PP_FOOTER_HP_" . $brandenc, ["placeholder" => "eg: High Pressure"])->setDataFromResource("High Pressure"); ?></span>
                                    </h5>

                                    <div class="compatible">
                                    <?= $this->wysiwyg("INH_PP_FOOTER_COMP_FITTING_" . $brandenc)->setDataFromResource("<b>Compatible Fitting</b><p>Meets or exceeds the performance requirements of</p>"); ?>                                        
                                    </div>

                                </div>
                            </footer>
                        </div>

                        <div class="footer1">
                            <footer class="flex-center ">
                                <div class="flex aligned">

                                    <div class="compatible">
                                    <?= $this->wysiwyg("INH_PP_FOOTER_COMP_FITTING1_" . $brandenc)->setDataFromResource("<b>Compatible Fitting</b><p>Meets or exceeds the performance requirements of</p>"); ?>

                                    <h5>
                                        <?= $this->input("INH_PP_FOOTER_BRAND1_" . $brandenc)->setDataFromResource($brand); ?>
                                        <span><?= $this->input("INH_PP_FOOTER_HP1_" . $brandenc)->setDataFromResource("High Pressure"); ?></span>
                                    </h5>

                                </div>
                                <span class="logo">
                                    <?php
                                    if ($info['logo'] != null) {
                                        echo $this->image("FOOTER_LOGO1_" . $brandenc, ["width" => 120, "height" => 53])->setImage($info['logo']);
                                    } else {
                                        echo $this->image("FOOTER_LOGO1_" . $brandenc, ["width" => 120, "height" => 53]);
                                    }

                                    ?>
                                </span>
                            </footer>
                        </div>



                        <article class="fullcontainer single">
                            <div class="flex">
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
                                <div class="grow-2">
                                    <header class=" white">
                                        <h1><?php echo $brand; ?> </h1>
                                        <aside>
                                            <p>
                                                <?php
                                                if ($this->editmode) { ?>
                                                    <?php
                                                    echo $this->textarea('INH_LONG_DESCRIPTION_' . $brandenc)->setDataFromResource($rows['info']['longDescription']);
                                                    ?>
                                                <?php } ?>
                                                <?php
                                                if (!$this->editmode && !$this->textarea('INH_LONG_DESCRIPTION_' . $brandenc)->isEmpty()) { ?>
                                                    <?php
                                                    echo $this->textarea('INH_LONG_DESCRIPTION_' . $brandenc);
                                                    ?>
                                                <?php } ?>
                                            </p>
                                            <?php echo $this->image('INH_MAIN_IMAGE_' . $brandenc, ['width' => 1067, 'height' => 128]); ?>
                                        </aside>
                                    </header>
                                    <section class="content">
                                        <menu class="flex">
                                            <div class="specs">
                                                <h6>performance + specs</h6>
                                                <div class="spec-requirement flex">
                                                    <div class="col-6">
                                                        <?php
                                                        if ($this->editmode) {
                                                        ?>
                                                            <p>
                                                                <b><?= $this->translate('VirtualCatalogTubeMaterial'); ?></b>
                                                                <?= $this->wysiwyg('INH_PP_Tube_' . $brandenc)->setDataFromResource($rows['info']['VirtualCatalogTubeMaterial']); ?>
                                                            </p>
                                                            <p>
                                                                <b><?= $this->translate('VirtualCatalogReinforcement'); ?></b>
                                                                <?= $this->wysiwyg('INH_PP_Reinforcement_' . $brandenc)->setDataFromResource($rows['info']['VirtualCatalogReinforcement']); ?>
                                                            </p>
                                                            <p>
                                                                <b><?= $this->translate('VirtualCatalogCoverMaterial'); ?></b>
                                                                <?php
                                                                echo $this->wysiwyg('INH_PP_Cover_' . $brandenc)->setDataFromResource($rows['info']['VirtualCatalogCoverMaterial']);
                                                                ?>
                                                            </p>
                                                            <p>
                                                                <b><?= $this->translate('VirtualCatalogHoseTemperatureRangeFAndC'); ?></b>
                                                                <?= $this->textarea('INH_PP_Temprance_' . $brandenc)->setDataFromResource($rows['info']['VirtualCatalogHoseTemperatureRangeFAndC']); ?>
                                                            </p>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php
                                                        if (
                                                            !$this->editmode
                                                        ) { ?>
                                                            <?php
                                                            if (!$this->wysiwyg('INH_PP_Tube_' . $brandenc)->isEmpty()) { ?>
                                                                <p>
                                                                    <b><?= $this->translate('VirtualCatalogTubeMaterial'); ?></b>
                                                                    <?php
                                                                    echo $this->wysiwyg('INH_PP_Tube_' . $brandenc);
                                                                    ?>
                                                                </p>
                                                            <?php }
                                                            ?>

                                                            <?php
                                                            if (!$this->wysiwyg('INH_PP_Reinforcement_' . $brandenc)->isEmpty()) { ?>
                                                                <p>
                                                                    <b><?= $this->translate('VirtualCatalogReinforcement'); ?></b>
                                                                    <?php
                                                                    echo $this->wysiwyg('INH_PP_Reinforcement_' . $brandenc);
                                                                    ?>
                                                                </p>
                                                            <?php }
                                                            ?>

                                                            <?php
                                                            if (!$this->wysiwyg('INH_PP_Cover_' . $brandenc)->isEmpty()) { ?>
                                                                <p>
                                                                    <b><?= $this->translate('VirtualCatalogCoverMaterial'); ?></b>
                                                                    <?php
                                                                    echo $this->wysiwyg('INH_PP_Cover_' . $brandenc);
                                                                    ?>
                                                                </p>
                                                            <?php }
                                                            ?>

                                                            <?php
                                                            if (!$this->wysiwyg('INH_PP_Temprance_' . $brandenc)->isEmpty()) { ?>
                                                                <p>
                                                                    <b><?= $this->translate('VirtualCatalogHoseTemperatureRangeFAndC'); ?></b>
                                                                    <?php
                                                                    echo $this->wysiwyg('INH_PP_Temprance_' . $brandenc);
                                                                    ?>
                                                                </p>
                                                            <?php }
                                                            ?>

                                                        <?php } ?>
                                                    </div>
                                                    <div class="col-6">
                                                        <?php
                                                        if ($this->editmode) { ?>
                                                            <p>
                                                                <b><?= $this->translate('VirtualCatalogPackaging'); ?></b>
                                                                <?php
                                                                echo $this->wysiwyg('INH_PP_Packaging_' . $brandenc)->setDataFromResource($rows['info']['VirtualCatalogPackaging']);
                                                                ?>
                                                            </p>
                                                            <p>
                                                                <b><?= $this->translate('VirtualCatalogCoupling'); ?></b>
                                                                <?php
                                                                echo $this->textarea('INH_PP_Coupling_' . $brandenc)->setDataFromResource($rows['info']['VirtualCatalogCoupling']);
                                                                ?>
                                                            </p>
                                                        <?php } ?>

                                                        <?php
                                                        if (!$this->editmode) {
                                                        ?>
                                                            <?php
                                                            if (!$this->wysiwyg('INH_PP_Packaging_' . $brandenc)->isEmpty()) { ?>
                                                                <p>
                                                                    <b><?= $this->translate('VirtualCatalogPackaging'); ?></b>
                                                                    <?php
                                                                    echo $this->wysiwyg('INH_PP_Packaging_' . $brandenc);
                                                                    ?>
                                                                </p>
                                                            <?php } ?>

                                                            <?php
                                                            if (!$this->textarea('INH_PP_Coupling_' . $brandenc)->isEmpty()) { ?>
                                                                <p>
                                                                    <b><?= $this->translate('VirtualCatalogCoupling'); ?></b>
                                                                    <?php
                                                                    echo $this->textarea('INH_PP_Coupling_' . $brandenc);
                                                                    ?>
                                                                </p>
                                                            <?php } ?>
                                                        <?php

                                                        }
                                                        ?>

                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                        <?php
                                                        if ($this->editmode) {
                                                        ?>
                                                            <p>
                                                                <b><?= $this->translate('note'); ?></b>
                                                                <?php
                                                                echo $this->wysiwyg('INH_PP_Note_' . $brandenc);
                                                                ?>
                                                            </p>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php
                                                        if (!$this->editmode && !$this->wysiwyg('INH_PP_Note_' . $brandenc)->isEmpty()) {
                                                        ?>
                                                            <p>
                                                                <b><?= $this->translate('note'); ?></b>
                                                                <?php
                                                                echo $this->wysiwyg('INH_PP_Note_' . $brandenc);
                                                                ?>
                                                            </p>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                            </div>

                                            <div class="feature">
                                                <h6>features</h6>
                                                <div>
                                                    <?php
                                                    // Feature Icons
                                                    if (is_array($rows['info']['featureIcon'])) {
                                                        $fn = 0;
                                                        foreach ($rows['info']['featureIcon'] as $fid => $feature) {
                                                            echo "<p class='flex'>";
                                                            if ($this->editmode) {
                                                                echo $this->image('INH_PP_ICONS_' . $brandenc . $fid)->setImage($feature['icon']);
                                                            } else {
                                                                echo $this->image('INH_PP_ICONS_' . $brandenc . $fid);
                                                            }
                                                            if ($fn == 0) {
                                                                echo "<span>";
                                                                echo $this->input("INH_PP_FNAME_" . $brandenc . $fid)->setDataFromResource($feature['name']);
                                                                echo "</span>";
                                                            } else {
                                                                echo $this->input("INH_PP_FNAME_" . $brandenc . $fid)->setDataFromResource($feature['name']);
                                                            }

                                                            echo "</p>";
                                                            $fn++;
                                                        }
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                        </menu>

                                        <menu>
                                            <h6><?= $this->translate('branding') ?></h6>
                                            <figure>
                                                <img src="/CatalogImages/Continental_Logo_Master_yellow.png" width='80' />
                                                <figcaption><b><?= $brand ?></b></figcaption>
                                                <figcaption> <?= $rows['info']['VirtualCatalogBrandingLayline'] ?> </figcaption>
                                            </figure>
                                        </menu>


                                        <table class="grid special inh marginBottom5" cellspacing="0" cellpadding="0">
                                            <?php
                                            echo "<thead> <tr class='sub-head'>";
                                            foreach ($info['dispColumns'] as $key => $col) {
                                                if (array_key_exists($col, $info['attrImages'])) {
                                                    echo "<td><img src='{$info['attrImages'][$col]}' /></td>";
                                                } else {
                                                    echo "<td></td>";
                                                }
                                            }
                                            echo "</tr>";
                                            ?>
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

                                    </section>

                                </div>
                            </div>
                        </article>
                    </div>
                </div>
    <?php }
            $pg++;
        }
    } ?>
<?php } ?>