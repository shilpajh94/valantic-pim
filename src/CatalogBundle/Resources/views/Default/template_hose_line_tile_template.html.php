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
            if ($this->input("header")->isEmpty()) {
                echo $this->input("header")->setDataFromResource("Hydraulic Hose Line");
            } else {
                echo $this->input("header");
            }
            ?>
        </h1>
    </header>
    <section>

        <?php
        $brandsInfo = $info['brandsInfo'];
        $blockDes = $info['blockDes'];
        if (isset($brandsInfo) && is_array($brandsInfo)) {
            $brandIds = array_keys($brandsInfo);

            if (is_array($brandIds) && !empty($brandIds)) {
                /* $productData = $obj->getProductsData();
                    $columns = (array) json_decode($obj->getColumns());
                    $keys = array_keys($columns); */
                // p_r($keys);die;
                // $totalProduct = is_array($obj->getProductsData()) ? count($obj->getProductsData()) : 0;
                // foreach ($obj->getProductsData() as $k => $row) {

                $k = 0;
                $productImage = \Pimcore\Model\Asset::getById(32);
                $productLogo = \Pimcore\Model\Asset::getById(33);
                $productLogo2 = \Pimcore\Model\Asset::getById(38);
                $productLogo3 = \Pimcore\Model\Asset::getById(63);
                $productLogo4 = \Pimcore\Model\Asset::getById(63);
                while ($this->block("contentblock", ['default' => count($brandIds)])->loop()) {
                    $key = $brandIds[$k];
                    $row = $brandsInfo[$key];
                    // p_r($row);
                    /* if (count($keys) == count($row)) {
                            $row = array_combine($keys, $row);
                        } */


        ?>
                    <?php
                    if ($k == 0) {
                        // if($this->editmode) {
                    ?>
                        <aside class="flex justify-between">
                            <p>
                                <?php
                                if ($this->input('prodDesc')->isEmpty() && !empty($blockDes)) {
                                    echo $this->input("prodDesc")->setDataFromResource($blockDes);
                                } else {
                                    echo $this->input("prodDesc");
                                }
                                ?>
                            </p>
                            <figure class="products">
                                <span class="img-placeholder">
                                    <?php
                                    if ($this->image('productImage')->isEmpty() && !is_null($productImage)) {
                                        echo $this->image('productImage', [
                                            "width" => $productImage->getWidth(),
                                            "height" => $productImage->getHeight(),
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
                                            if ($this->input("brandName")->isEmpty() && !empty($row['brandName'])) {
                                                echo $this->input("brandName", ["class" => "productName"])->setDataFromResource($row['brandName']);
                                            } else {
                                                echo $this->input("brandName", ["class" => "productName"]);
                                            }
                                            ?>
                                        </span>
                                        <span class="productTitle">
                                            <?php
                                            if ($this->input("industryStandard")->isEmpty() && !empty($row['industryStandard'])) {
                                                echo $this->input("industryStandard", ["class" => "productTitle"])->setDataFromResource($row['industryStandard']);
                                            } else {
                                                echo $this->input("industryStandard", ["class" => "productTitle"]);
                                            }
                                            ?>
                                        </span>
                                        <ul>
                                            <?php
                                            if (isset($row['bst']) && is_array($row['bst'])) {
                                                foreach ($row['bst'] as $i => $bst) {
                                                    if (!empty($bst)) {
                                                        echo "<li>";
                                                        if ($this->input("brandShortText" . $key . $i)->isEmpty()) {
                                                            echo $this->input("brandShortText" . $key . $i)->setDataFromResource($bst);
                                                        } else {
                                                            echo $this->input("brandShortText" . $key . $i);
                                                        }
                                                        echo "</li>";
                                                    }
                                                }
                                            }

                                            ?>
                                        </ul>
                                    </div>
                                    <div class="bottomText">

                                        <span class="productImage">
                                            <?php
                                            if(isset($row['featureIcon']) && is_array($row['featureIcon']) && !empty($row['featureIcon'])) {
                                                foreach($row['featureIcon'] as $icnum => $featureIcon) {
                                                    if ($this->image('productLogo' . $key . $icnum)->isEmpty() && !is_null($featureIcon)) {
                                                        echo $this->image('productLogo' . $key . $icnum, [
                                                            "width" => $featureIcon->getWidth(),
                                                            "height" => $featureIcon->getHeight(),
                                                            "aspectratio" => true,
                                                            "interlace" => true,
                                                            "quality" => 95,
                                                            "format" => "PNG"
                                                        ])->setImage($featureIcon);
                                                    } else {
                                                        echo $this->image('productLogo' . $key . $icnum, [
                                                            "width" => 91,
                                                            "height" => 53,
                                                            "aspectratio" => true,
                                                            "interlace" => true,
                                                            "quality" => 95,
                                                            "format" => "PNG"
                                                        ]);
                                                    }
                                                }
                                            } else {
                                                echo $this->image('productLogo' . $key, [
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
                                            if ($this->input("sizeRange")->isEmpty() && !empty($row['range'])) {
                                                echo $this->input("sizeRange", ["class" => "details"])->setDataFromResource($row['range']);
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
                                if ($this->image('productImage')->isEmpty() && !is_null($productImage)) {
                                    echo $this->image('productImage', [
                                        "width" => $productImage->getWidth(),
                                        "height" => $productImage->getHeight(),
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
                                        if ($this->input("brandName")->isEmpty() && !empty($row['brandName'])) {
                                            echo $this->input("brandName", ["class" => "productName"])->setDataFromResource($row['brandName']);
                                        } else {
                                            echo $this->input("brandName", ["class" => "productName"]);
                                        }
                                        ?>
                                    </span>
                                    <span class="productTitle">
                                        <?php
                                        if ($this->input("industryStandard")->isEmpty() && !empty($row['industryStandard'])) {
                                            echo $this->input("industryStandard", ["class" => "productTitle"])->setDataFromResource($row['industryStandard']);
                                        } else {
                                            echo $this->input("industryStandard", ["class" => "productTitle"]);
                                        }
                                        ?>
                                    </span>
                                    <ul>
                                        <?php
                                        if (isset($row['bst']) && is_array($row['bst'])) {
                                            foreach ($row['bst'] as $i => $bst) {
                                                if (!empty($bst)) {
                                                    echo "<li>";
                                                    if ($this->input("brandShortText" . $key . $i)->isEmpty()) {
                                                        echo $this->input("brandShortText" . $key . $i)->setDataFromResource($bst);
                                                    } else {
                                                        echo $this->input("brandShortText" . $key . $i);
                                                    }
                                                    echo "</li>";
                                                }
                                            }
                                        }

                                        ?>
                                    </ul>
                                </div>
                                <div class="bottomText">

                                    <span class="productImage">
                                        <?php
                                        if(isset($row['featureIcon']) && is_array($row['featureIcon']) && !empty($row['featureIcon'])) {
                                            foreach($row['featureIcon'] as $icnum => $featureIcon) {
                                                if ($this->image('productLogo' . $key . $icnum)->isEmpty() && !is_null($featureIcon)) {
                                                    echo $this->image('productLogo' . $key . $icnum, [
                                                        "width" => $featureIcon->getWidth(),
                                                        "height" => $featureIcon->getHeight(),
                                                        "aspectratio" => true,
                                                        "interlace" => true,
                                                        "quality" => 95,
                                                        "format" => "PNG"
                                                    ])->setImage($featureIcon);
                                                } else {
                                                    echo $this->image('productLogo' . $key . $icnum, [
                                                        "width" => 91,
                                                        "height" => 53,
                                                        "aspectratio" => true,
                                                        "interlace" => true,
                                                        "quality" => 95,
                                                        "format" => "PNG"
                                                    ]);
                                                }
                                            }
                                        } else {
                                            echo $this->image('productLogo' . $key, [
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
                                        if ($this->input("sizeRange")->isEmpty() && !empty($row['range'])) {
                                            echo $this->input("sizeRange", ["class" => "details"])->setDataFromResource($row['range']);
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
                    unset($key);
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