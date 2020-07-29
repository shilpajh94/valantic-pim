<?php
$this->extend('CatalogBundle:Layouts:layout.html.php');
?>
<?php if ($this->editmode) { ?>
    <?= $this->relation("inh-printcatalog"); ?>
<?php } ?>
<?php //p_r($info['dispColumns'] );die;
?>
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
        <span>Hydraulic Hose</span>
    </nav>
    
        <article class="fullcontainer ">

            <div class="flex noWrap">
                <div class="sidebar">
                    <ul>
                        <!-- <li class="first">
                            <p>
                                Lorem ipsum
                            </p>
                            <p>
                                <b>Lorem ipsum</b>
                            </p>
                        </li> -->
                        <?php
                        if (is_array($info['categories'])) {
                            foreach ($info['categories'] as $category) {
                                echo "<li>";
                                if (is_array($category) && !empty($category)) {
                                    foreach ($category as $cat) {
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
                                    <img src="images/12a.JPG" class="alignRight" />
                                </h2>
                                <span class="img-placeholder marginBottom15">
                                    <?php echo $this->image('INH_PP_BRAND_BOTTOM'.md5($brand),['width'=>595, 'height'=>128]);?>
                                </span>
                                <h3 class="light"><?php echo $this->input("INH_PP_Product_specification".md5($brand))->setDataFromResource("Product specification");?></h3>
                                <div class="flex  specs-details">
                                    <div class="col-6">
                                    <p>
                                            <b>Application</b>
                                            <?php
                                                if($this->editmode) {
                                                    echo $this->wysiwyg('INH_PP_APPLICATION_'.md5($brand))->setDataFromResource($rows['info']['Application']);
                                                } else {
                                                    echo $this->wysiwyg('INH_PP_APPLICATION_'.md5($brand));
                                                }
                                            ?>
                                        </p>
                                        <p>
                                            <b>Construction</b>
                                            <b>> Tube</b>
                                            <?php
                                                if($this->editmode) {
                                                    echo $this->wysiwyg('INH_PP_Tube_'.md5($brand))->setDataFromResource($rows['info']['VirtualCatalogTubeMaterial']);
                                                } else {
                                                    echo $this->wysiwyg('INH_PP_Tube_'.md5($brand));
                                                }
                                            ?>

                                            <b>> Cover</b>
                                            <?php
                                                if($this->editmode) {
                                                    echo $this->wysiwyg('INH_PP_Cover_'.md5($brand))->setDataFromResource($rows['info']['VirtualCatalogCoverMaterial']);
                                                } else {
                                                    echo $this->wysiwyg('INH_PP_Cover_'.md5($brand));
                                                }
                                            ?>

                                            <b>> Reinforcement</b>
                                            <?php
                                                if($this->editmode) {
                                                    echo $this->wysiwyg('INH_PP_Reinforcement_'.md5($brand))->setDataFromResource($rows['info']['VirtualCatalogReinforcement']);
                                                } else {
                                                    echo $this->wysiwyg('INH_PP_Reinforcement_'.md5($brand));
                                                }
                                            ?>
                                        </p>
                                        <p>
                                            <b>Temperature Range</b>
                                            <?php
                                                if($this->editmode) {
                                                    echo $this->textarea('INH_PP_Temprance_'.md5($brand))->setDataFromResource($rows['info']['VirtualCatalogHoseTemperatureRangeFAndC']);
                                                } else {
                                                    echo $this->textarea('INH_PP_Temprance_'.md5($brand));
                                                }
                                            ?>
                                        </p>
                                    </div>
                                    <div class="col-6">
                                    <p>
                                            <b>Packaging</b>
                                            <?php
                                                if($this->editmode) {
                                                    echo $this->wysiwyg('INH_PP_Packaging_'.md5($brand))->setDataFromResource($rows['info']['VirtualCatalogPackaging']);
                                                } else {
                                                    echo $this->wysiwyg('INH_PP_Packaging_'.md5($brand));
                                                }
                                            ?>
                                        </p>
                                        <p>
                                            <b>Branding</b>
                                            <?php
                                                if($this->editmode) {
                                                    echo $this->input('INH_PP_Branding_'.md5($brand))->setDataFromResource($rows['info']['VirtualCatalogBrandingLayline']);
                                                } else {
                                                    echo $this->input('INH_PP_Branding_'.md5($brand));
                                                }
                                            ?>
                                        </p>
                                        <p>
                                            <b>Couplings</b>
                                            <?php
                                                if($this->editmode) {
                                                    echo $this->textarea('INH_PP_Coupling_'.md5($brand))->setDataFromResource($rows['info']['VirtualCatalogCoupling']);
                                                } else {
                                                    echo $this->textarea('INH_PP_Coupling_'.md5($brand));
                                                }
                                            ?>
                                        </p>
                                        <p>
                                            <b>Order Codes</b>
                                            <?php
                                                $orderCode = isset($brands['info']['VirtualCatalogCoupling']) && is_array($rows['info']['VirtualCatalogCoupling']) ? implode(", ",$rows['info']['VirtualCatalogCoupling']) : "";
                                                if($this->editmode) {
                                                    echo $this->input('INH_PP_Input_'.md5($brand))->setDataFromResource($orderCode);
                                                } else {
                                                    echo $this->input('INH_PP_Input_'.md5($brand));
                                                }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="grid special marginBottom5">
                                    <h5 class="borderBottom"><?php echo $brand; ?>&reg; </h5>
                                    <table class="grid special marginBottom5" cellspacing="0" cellpadding="0">
                                        <thead>
                                            <tr class="head ">
                                                <?php
                                                foreach ($info['dispColumns'] as $key => $col) {
                                                    echo "<td>{$info['dataTableColumn'][$col]->columnLabel}</td>";
                                                }
                                                ?>
                                            </tr>
                                        </thead>
                                        <?php
                                        if (is_array($rows['products']) && !empty($rows['products'])) {
                                            $i = 1;
                                            foreach ($rows['products'] as $row) {
                                                $active = "";
                                                if($i%2!=0) {
                                                    $active="active";
                                                }
                                                $i++;
                                                echo "<tr class='$active'>";
                                                foreach ($info['dispColumns'] as $key => $col) {
                                                    $td = false;
                                                    if (is_array($row[$col]) ) {                                                        
                                                        if(!empty($row[$col])) {
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