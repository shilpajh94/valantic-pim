<?php
$this->extend('CatalogBundle:Layouts:layout.html.php');
?>
<?php if ($this->editmode) { ?>

<?= $this->href("template2"); ?>
<?php }  
?>
    <article class="fullcontainer">
        <header>
            <h1>
                <?php
                    if($this->input("header")->isEmpty()) {
                        echo $this->input("header")->setDataFromResource("Hydraulic Hose Line");
                    } else {
                        echo $this->input("header");
                    }
                ?>
            </h1>
        </header>
        <section>
            
            <?php
            if ($this->href("template2")->getElement() instanceof \Pimcore\Model\DataObject) {
                $id = $this->href("template2")->getId();
                $obj = \Pimcore\Model\DataObject::getById($id);
                
                if (is_array($obj->getProductsData()) && !empty($obj->getProductsData())) {
                    $productData = $obj->getProductsData();
                    $columns = (array) json_decode($obj->getColumns());
                    $keys = array_keys($columns);
                    // p_r($keys);die;
                    $totalProduct = is_array($obj->getProductsData()) ? count($obj->getProductsData()) : 0;
                    // foreach ($obj->getProductsData() as $k => $row) {

                    $k = 0;
                    while ($this->block("contentblock", ['default' => $totalProduct])->loop()) {
                        $row = $productData[$k];
                        // p_r($row);
                        if (count($keys) == count($row)) {
                            $row = array_combine($keys, $row);
                        }
                        $productImage = \Pimcore\Model\Asset::getById(32);
                        $productLogo = \Pimcore\Model\Asset::getById(33);

            ?>
                        <?php
                        if ($k == 0) {
                            // if($this->editmode) {
                        ?>
                            <aside class="flex justify-between">
                                <p>
                                    <?php
                                    if ($this->input('prodDesc')->isEmpty()) {
                                        echo $this->input("prodDesc")->setDataFromResource("Varied pressures, abrasion levels and temperatures are no match for Continental Hydraulic Hose.");
                                    } else {
                                        echo $this->input("prodDesc");
                                    }
                                    ?>
                                </p>
                                <figure class="products">
                                    <span class="img-placeholder">
                                        <?php
                                        if ($this->image('productImage')->isEmpty()) {
                                            echo $this->image('productImage', [
                                                "width" => 92,
                                                "height" => 240,
                                                "aspectratio" => true,
                                                "interlace" => true,
                                                "quality" => 95,
                                                "format" => "PNG"
                                            ])->setImage($productImage);
                                        } else {
                                            echo $this->image('productImage', [
                                                "width" => 92,
                                                "height" => 240,
                                                "aspectratio" => true,
                                                "interlace" => true,
                                                "quality" => 95,
                                                "format" => "PNG"
                                            ]);
                                        }
                                        ?>
                                    </span>
                                    <figcaption>
                                        <div class="topText">
                                            <span class="productName">
                                                <?php
                                                if ($this->input("brandName")->isEmpty()) {
                                                    echo $this->input("brandName", ["class" => "productName"])->setDataFromResource(isset($row['SAP']) ? $row['SAP'] : $row[0]);
                                                } else {
                                                    echo $this->input("brandName", ["class" => "productName"]);
                                                }
                                                ?>
                                            </span>
                                            <span class="productTitle">
                                                <?php
                                                if ($this->input("industryStandard")->isEmpty()) {
                                                    echo $this->input("industryStandard", ["class" => "productTitle"])->setDataFromResource(isset($row['HoseId1_2']) ? $row['HoseId1_2'] : $row[1]);
                                                } else {
                                                    echo $this->input("industryStandard", ["class" => "productTitle"]);
                                                }
                                                ?>
                                            </span>
                                            <ul>
                                                <li>
                                                    <?php
                                                    if ($this->input("brandShortText")->isEmpty()) {
                                                        echo $this->input("brandShortText")->setDataFromResource("Varied pressures, abrasion levels and temperatures");
                                                    } else {
                                                        echo $this->input("brandShortText");
                                                    }
                                                    ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="bottomText">

                                            <span class="productImage">
                                                <?php
                                                if ($this->image('productLogo')->isEmpty()) {
                                                    echo $this->image('productLogo', [
                                                        "width" => 91,
                                                        "height" => 53,
                                                        "aspectratio" => true,
                                                        "interlace" => true,
                                                        "quality" => 95,
                                                        "format" => "PNG"
                                                    ])->setImage($productLogo);
                                                } else {
                                                    echo $this->image('productLogo', [
                                                        "width" => 91,
                                                        "height" => 53,
                                                        "aspectratio" => true,
                                                        "interlace" => true,
                                                        "quality" => 95,
                                                        "format" => "PNG"
                                                    ]);
                                                }

                                                ?>
                                            </span>
                                            <span class="details">
                                                <?php
                                                if ($this->input("sizeRange")->isEmpty()) {
                                                    echo $this->input("sizeRange", ["class" => "details"])->setDataFromResource(isset($row['HoseId']) ? $row['HoseId'] : $row[2]);
                                                } else {
                                                    echo $this->input("sizeRange", ["class" => "details"]);
                                                }
                                                ?>
                                            </span>
                                        </div>
                                    </figcaption>
                                </figure>
                            </aside>
                        <?php
                            // }
                        }
                        if ($k == 1) {
                            echo "<aside class='flex'>";
                        }
                        if ($k >= 1) {
                        ?>
                            <!-- <p>Varied pressures, abrasion levels and temperatures are no match for Continental Hydraulic Hose.</p> -->
                            <figure class="products">
                                <span class="img-placeholder">
                                    <?php
                                    if ($this->image('productImage')->isEmpty()) {
                                        echo $this->image('productImage', [
                                            "width" => 92,
                                            "height" => 240,
                                            "aspectratio" => true,
                                            "interlace" => true,
                                            "quality" => 95,
                                            "format" => "PNG"
                                        ])->setImage($productImage);
                                    } else {
                                        echo $this->image('productImage', [
                                            "width" => 92,
                                            "height" => 240,
                                            "aspectratio" => true,
                                            "interlace" => true,
                                            "quality" => 95,
                                            "format" => "PNG"
                                        ]);
                                    }
                                    ?>
                                </span>
                                <figcaption>
                                    <div class="topText">
                                        <span class="productName">
                                            <?php
                                            if ($this->input("brandName")->isEmpty()) {
                                                echo $this->input("brandName", ["class" => "productName"])->setDataFromResource(isset($row['SAP']) ? $row['SAP'] : $row[0]);
                                            } else {
                                                echo $this->input("brandName", ["class" => "productName"]);
                                            }
                                            ?>
                                        </span>
                                        <span class="productTitle">
                                            <?php
                                            if ($this->input("industryStandard")->isEmpty()) {
                                                echo $this->input("industryStandard", ["class" => "productTitle"])->setDataFromResource(isset($row['HoseId1_2']) ? $row['HoseId1_2'] : $row[1]);
                                            } else {
                                                echo $this->input("industryStandard", ["class" => "productTitle"]);
                                            }
                                            ?>
                                        </span>
                                        <ul>
                                            <?php
                                            if ($this->input("brandShortText")->isEmpty()) {
                                                echo $this->input("brandShortText")->setDataFromResource("Varied pressures, abrasion levels and temperatures");
                                            } else {
                                                echo $this->input("brandShortText");
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="bottomText">
                                        <span class="productImage">
                                            <?php
                                            if ($this->image('productLogo')->isEmpty()) {
                                                echo $this->image('productLogo', [
                                                    "width" => 91,
                                                    "height" => 53,
                                                    "aspectratio" => true,
                                                    "interlace" => true,
                                                    "quality" => 95,
                                                    "format" => "PNG"
                                                ])->setImage($productLogo);
                                            } else {
                                                echo $this->image('productLogo', [
                                                    "width" => 91,
                                                    "height" => 53,
                                                    "aspectratio" => true,
                                                    "interlace" => true,
                                                    "quality" => 95,
                                                    "format" => "PNG"
                                                ]);
                                            }
                                            ?>
                                        </span>
                                        <span class="details">
                                            <?php
                                            if ($this->input("sizeRange")->isEmpty()) {
                                                echo $this->input("sizeRange", ["class" => "details"])->setDataFromResource(isset($row['HoseId']) ? $row['HoseId'] : $row[2]);
                                            } else {
                                                echo $this->input("sizeRange", ["class" => "details"]);
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </figcaption>
                            </figure>
                        <?php } ?>
                <?php

                        $k++;
                    } // Block End
                    // }
                    if ($k > 1) {
                        echo "</aside>";
                    }
                }
                ?>
            <?php } ?>

        </section>
    </article>