<?php
$this->extend('CatalogBundle:Layouts:layout.html.php');
?>
<?php if ($this->editmode) { ?>

    <?= $this->href("template2"); ?>
<?php }
?>
<article class="fullcontainer">
    <header class="dark">
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
    <section class="spacing">
        <?php
        $brandsInfo = $info['brandsInfo'];
        $blockDes = $info['blockDes'];
        if (isset($brandsInfo) && is_array($brandsInfo)) {
            $brandIds = array_keys($brandsInfo);

            if (is_array($brandIds) && !empty($brandIds)) {

                $k = 0;
                while ($this->block("contentblock", ['default' => count($brandIds)])->loop()) {
                    $key = $brandIds[$k];
                    $row = $brandsInfo[$key];


        ?>
                    <?php
                    if ($k == 0) {
                        // if($this->editmode) {
                    ?>
                        <aside class="flex justify-between">
                            <p>
                                <?php
                                echo $this->input("prodDesc", ["width" => 540]);
                                ?>
                            </p>
                            <figure class="products">
                                <span class="img-placeholder">
                                    <?php
                                    if ($this->image('productImage')->isEmpty() && !is_null($row['mainImage'])) {
                                        echo $this->image('productImage', [
                                            "width" => $row['mainImage']->getWidth(),
                                            "height" => $row['mainImage']->getHeight(),
                                            "aspectratio" => true,
                                            "interlace" => true,
                                            "quality" => 95,
                                            "format" => "PNG"
                                        ])->setImage($row['mainImage']);
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
                                            $bstCnt = 1;
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
                                                        $bstCnt++;
                                                    }
                                                }
                                            }
                                            
                                            while($bstCnt <= 5) {
                                                if($this->editmode) {
                                                    echo "<li>";
                                                    echo $this->input("brandShortText" . $key . $bstCnt);
                                                    echo "</li>";
                                                } else {
                                                    if(!$this->input("brandShortText" . $key . $bstCnt)->isEmpty()) {
                                                        echo "<li>";
                                                        echo $this->input("brandShortText" . $key . $bstCnt);
                                                        echo "</li>";
                                                    }
                                                }
                                                
                                                $bstCnt++;
                                            }

                                            ?>
                                        </ul>
                                    </div>
                                    <div class="bottomText">

                                        <span class="productImage">
                                            <?php
                                            $icnum = 0;
                                            if (isset($row['featureIcon']) && is_array($row['featureIcon']) && !empty($row['featureIcon'])) {
                                                foreach ($row['featureIcon'] as $icnum => $featureIcon) {
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
                                            }
                                            
                                            while($icnum < 2) {
                                                $icnum++;
                                                echo $this->image('productLogo' . $key . $icnum, [
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
                        echo "<aside class='flex justify-between'>";
                    }
                    if ($k >= 1) {
                    ?>
                        <!-- <p>Varied pressures, abrasion levels and temperatures are no match for Continental Hydraulic Hose.</p> -->
                        <figure class="products">
                            <span class="img-placeholder">
                                <?php
                                if ($this->image('productImage')->isEmpty() && !is_null($row['mainImage'])) {
                                    echo $this->image('productImage', [
                                        "width" => $row['mainImage']->getWidth(),
                                        "height" => $row['mainImage']->getHeight(),
                                        "aspectratio" => true,
                                        "interlace" => true,
                                        "quality" => 95,
                                        "format" => "PNG"
                                    ])->setImage($row['mainImage']);
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
                                        $bstCnt = 1;
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
                                                    $bstCnt++;
                                                }
                                            }
                                        }
                                        while($bstCnt <= 5) {
                                            if($this->editmode) {
                                                echo "<li>";
                                                echo $this->input("brandShortText" . $key . $bstCnt);
                                                echo "</li>";
                                            } else {
                                                if(!$this->input("brandShortText" . $key . $bstCnt)->isEmpty()) {
                                                    echo "<li>";
                                                    echo $this->input("brandShortText" . $key . $bstCnt);
                                                    echo "</li>";
                                                }
                                            }
                                            $bstCnt++;
                                        }

                                        ?>
                                    </ul>
                                </div>
                                <div class="bottomText">
                                    <span class="productImage">
                                        <?php
                                        $icnum = 0;
                                        if (isset($row['featureIcon']) && is_array($row['featureIcon']) && !empty($row['featureIcon'])) {
                                            foreach ($row['featureIcon'] as $icnum => $featureIcon) {
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
                                        }
                                        while($icnum < 2) {
                                            $icnum++;
                                            echo $this->image('productLogo' . $key . $icnum, [
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
                if ($k > 1) {
                    echo "</aside>";
                }
            }
            ?>
        <?php } ?>

    </section>
    <div class="footer">
    <footer class="flex">
        <span class="logo">
            <b>Hose</b>
            <?php
            echo $this->image('logo', [
                "width" => 172,
                "height" => 'auto',
                "aspectratio" => true,
                "interlace" => true,
                "quality" => 95,
                "format" => "PNG"
            ]);
            ?>
        </span>
        <div class="flex aligned small">
            <h4><?php echo $this->input('footerText', ['width' => 826, 'height' => 34]); ?></h4>
        </div>
    </footer>
    </div>
</article>