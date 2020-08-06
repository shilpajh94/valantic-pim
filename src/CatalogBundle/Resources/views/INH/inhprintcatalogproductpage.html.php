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
                <article class="fullcontainer">
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
                            <header class=" white">
                                <h1><?php echo $brand; ?> </h1>
                                <aside>
                                    <p>
                                        <?php
                                        if ($this->editmode) { ?>
                                            <?php
                                            echo $this->textarea('INH_LONG_DESCRIPTION_' . md5($brand))->setDataFromResource($rows['info']['longDescription']);
                                            ?>
                                        <?php } ?>
                                        <?php
                                        if (!$this->editmode && !$this->textarea('INH_LONG_DESCRIPTION_' . md5($brand))->isEmpty()) { ?>
                                            <?php
                                            echo $this->textarea('INH_LONG_DESCRIPTION_' . md5($brand));
                                            ?>
                                        <?php } ?>
                                    </p>
                                    <?php echo $this->image('INH_MAIN_IMAGE_' . md5($brand), ['width' => 1067, 'height' => 128]); ?>
                                </aside>
                            </header>
                            <section class="content">

                                <menu class="flex">
                                    <div class="specs">
                                        <h6>performance + specs</h6>
                                        <div class="spec-requirement">
                                            <div>
                                                <?php
                                                if ($this->editmode) {
                                                ?>
                                                    <p>
                                                        <b><?= $this->translate('VirtualCatalogTubeMaterial'); ?></b>
                                                        <?= $this->wysiwyg('INH_PP_Tube_' . md5($brand))->setDataFromResource($rows['info']['VirtualCatalogTubeMaterial']); ?>
                                                    </p>
                                                    <p>
                                                        <b><?= $this->translate('VirtualCatalogReinforcement'); ?></b>
                                                        <?= $this->wysiwyg('INH_PP_Reinforcement_' . md5($brand))->setDataFromResource($rows['info']['VirtualCatalogReinforcement']); ?>
                                                    </p>
                                                    <p>
                                                        <b><?= $this->translate('VirtualCatalogCoverMaterial'); ?></b>
                                                        <?php
                                                        echo $this->wysiwyg('INH_PP_Cover_' . md5($brand))->setDataFromResource($rows['info']['VirtualCatalogCoverMaterial']);
                                                        ?>
                                                    </p>
                                                    <p>
                                                        <b><?= $this->translate('VirtualCatalogHoseTemperatureRangeFAndC'); ?></b>
                                                        <?= $this->textarea('INH_PP_Temprance_' . md5($brand))->setDataFromResource($rows['info']['VirtualCatalogHoseTemperatureRangeFAndC']); ?>
                                                    </p>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if (
                                                    !$this->editmode
                                                ) { ?>
                                                    <?php
                                                    if (!$this->wysiwyg('INH_PP_Tube_' . md5($brand))->isEmpty()) { ?>
                                                        <p>
                                                            <b><?= $this->translate('VirtualCatalogTubeMaterial'); ?></b>
                                                            <?php
                                                            echo $this->wysiwyg('INH_PP_Tube_' . md5($brand));
                                                            ?>
                                                        </p>
                                                    <?php }
                                                    ?>

                                                    <?php
                                                    if (!$this->wysiwyg('INH_PP_Reinforcement_' . md5($brand))->isEmpty()) { ?>
                                                        <p>
                                                            <b><?= $this->translate('VirtualCatalogReinforcement'); ?></b>
                                                            <?php
                                                            echo $this->wysiwyg('INH_PP_Reinforcement_' . md5($brand));
                                                            ?>
                                                        </p>
                                                    <?php }
                                                    ?>

                                                    <?php
                                                    if (!$this->wysiwyg('INH_PP_Cover_' . md5($brand))->isEmpty()) { ?>
                                                        <p>
                                                            <b><?= $this->translate('VirtualCatalogCoverMaterial'); ?></b>
                                                            <?php
                                                            echo $this->wysiwyg('INH_PP_Cover_' . md5($brand));
                                                            ?>
                                                        </p>
                                                    <?php }
                                                    ?>

                                                    <?php
                                                    if (!$this->wysiwyg('INH_PP_Temprance_' . md5($brand))->isEmpty()) { ?>
                                                        <p>
                                                            <b><?= $this->translate('VirtualCatalogHoseTemperatureRangeFAndC'); ?></b>
                                                            <?php
                                                            echo $this->wysiwyg('INH_PP_Temprance_' . md5($brand));
                                                            ?>
                                                        </p>
                                                    <?php }
                                                    ?>

                                                <?php } ?>
                                            </div>

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
                                                        echo $this->image('INH_PP_ICONS_' . md5($brand) . $fid)->setImage($feature['icon']);
                                                    } else {
                                                        echo $this->image('INH_PP_ICONS_' . md5($brand) . $fid);
                                                    }
                                                    if ($fn == 0) {
                                                        echo "<span>";
                                                        echo $this->input("INH_PP_FNAME_" . md5($brand) . $fid)->setDataFromResource($feature['name']);
                                                        echo "</span>";
                                                    } else {
                                                        echo $this->input("INH_PP_FNAME_" . md5($brand) . $fid)->setDataFromResource($feature['name']);
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

                                <div class="grid">
                                    <table class="grid special marginBottom5" cellspacing="0" cellpadding="0">
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
                                </div>
                            </section>

                        </div>
                    </div>
                    <footer class="flex">
                        <span class="logo">
                            <?php
                            if ($info['logo'] != null) {
                                echo $this->image("FOOTER_LOGO_" . md5($brand), ["width" => 172, "height" => 53])->setImage($info['logo']);
                            } else {
                                echo $this->image("FOOTER_LOGO_" . md5($brand), ["width" => 172, "height" => 53]);
                            }

                            ?>
                        </span>
                        <div class="flex aligned">
                            <h3>
                                <?= $this->input("INH_PP_FOOTER_BRAND_" . md5($brand))->setDataFromResource($brand); ?>
                                <span><?= $this->input("INH_PP_FOOTER_HP_" . md5($brand))->setDataFromResource("High Pressure"); ?></span>
                            </h3>

                            <p>
                                <b><?= $this->input("INH_PP_FOOTER_FITTING_TYPE_" . md5($brand))->setDataFromResource("Compatible fittings"); ?></b>
                                <?php echo $this->input("INH_PP_FOOTER_FITTING_TYPE_DESC_" . md5($brand))->setDataFromResource("Meets or exceeds the performance requirements of"); ?>
                            </p>
                        </div>
                    </footer>
                </article>

    <?php }
        }
    } ?>
<?php } ?>