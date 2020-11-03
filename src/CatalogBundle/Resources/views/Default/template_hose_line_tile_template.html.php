<?php
if (!isset($this->parentContainer)) {
$this->extend('CatalogBundle:Layouts:layout.html.php', ['name1' => 'Name from Extend']);
}
?>
<?php if ($this->editmode) { ?>

    <?= $this->href("tiletemplate"); ?>
<?php
}
$featuresFooter = false;
?>
<div class="template">
<div class="hoseline" id="hoseline">

    <div id="pageHeader" class="alternate"></div>
    <div class="hoselineHeader">
        <header class="dark ">
            <h1>
                <?php
                if ($this->editmode) {
                    echo $this->input("header");
                } else {
                    echo $this->input("header");
                }
                ?>
            </h1>
        </header>
    </div>

    <div class="footer">
        <footer class="flex-center <?= $info['footer_class']; ?>">
            <span class="logo">
                <b>
                    <?php if($this->editmode): ?>
                            <?php if($this->input("footerTitle")->isEmpty()): ?>
                                    <?= $this->input("footerTitle")->setDataFromResource('Hose') ?>
                            <?php else: ?>
                                    <?= $this->input("footerTitle"); ?>
                            <?php endif; ?>
                    <?php else: ?>
                            <?= $this->input("footerTitle") ?>
                    <?php endif; ?>
                </b>

                <img src="<?= $info['footer_logo_src']; ?>">
            </span>
            <div class="flex aligned ">

                <h4>
                    <?php
                    if ($this->editmode) {
                        echo $this->input('footerContent', ['width' => 826, 'height' => 34]);
                    } else {
                        echo $this->input('footerContent', ['width' => 826, 'height' => 34]);
                    }
                    ?>
                </h4>

            </div>
        </footer>
    </div>

    <div class="footer1">
        <footer class="flex-center <?= $info['footer_class']; ?>">

            <div class="flex aligned ">


                <h4>
                    <?php
                    if ($this->editmode) {
                        echo $this->input('footerContent1', ['width' => 826, 'height' => 34]);
                    } else {
                        echo $this->input('footerContent1', ['width' => 826, 'height' => 34]);
                    }
                    ?>
                </h4>

            </div>
            <span class="logo">
                <b>
                    <?php if($this->editmode): ?>
                            <?php if($this->input("footerTitle1")->isEmpty()): ?>
                                    <?= $this->input("footerTitle1")->setDataFromResource('Hose') ?>
                            <?php else: ?>
                                    <?= $this->input("footerTitle1"); ?>
                            <?php endif; ?>
                    <?php else: ?>
                            <?= $this->input("footerTitle1") ?>
                    <?php endif; ?>
                </b>

                <img src="<?= $info['footer_logo_src']; ?>">
            </span>
        </footer>
    </div>
    <section>
            <article class="fullcontainer single hoseline">
                <aside class="flex first ">

                    <?php
                    $brandsInfo = $info['brandsInfo'];
                    $blockDes = $info['blockDes'];

                    if (isset($brandsInfo) && is_array($brandsInfo)) {
                        $brandIds = array_keys($brandsInfo);
                        // p_r($brandIds);die;
                        if (is_array($brandIds) && !empty($brandIds)) {

                            $k = 0;
                            while ($this->block("contentblock", ['default' => count($brandIds)])->loop()) {
                                $key = $brandIds[$k];
                                $row = $brandsInfo[$key];
                                // p_r($row);die;
                                ?>



            <?php if ($k == 0) { ?>
                                    <p>
                                    <?php
                                    if ($this->input('prodDesc' . $k)->isEmpty()) {
                                        echo $this->input("prodDesc" . $k, ["width" => 540])->setDataFromResource($info['productDescription']);
                                    } else {
                                        echo $this->input("prodDesc" . $k, ["width" => 540]);
                                    }
                                    ?>
                                    </p>
                                    <?php } ?>
                                <figure class="products">
                                    <span class="img-placeholder">
                                <?php
                                if ($this->image('productImage' . $k)->isEmpty() && !empty($row['mainImage'])) {
                                    echo $this->image('productImage' . $k, [
                                        "width" => $row['mainImage']->getWidth(),
                                        "height" => $row['mainImage']->getHeight(),
                                        "aspectratio" => true,
                                        "interlace" => true,
                                        "quality" => 95,
                                        "format" => "PNG"
                                    ])->setImage($row['mainImage']);
                                } else {
                                    $imgSrcObj1 =  $this->image('productImage' . $k, [
                                        "width" => 92,
                                        "height" => 240,
                                        "aspectratio" => true,
                                        "interlace" => true,
                                        "quality" => 95,
                                        "format" => "PNG"
                                    ]);

                                    if($imgSrcObj1)
                                    {
                                    ?>
                                                <img src="<?= $imgSrcObj1->getThumbnail('catalog_thumb'); ?>"width="92" height="240"/>
                                                <?php
                                    }
                                }
                                ?>
                                    </span>
                                    <figcaption>
                                        <div class="topText">
                                            <span class="productName">
            <?php
            if ($this->input("brandName" . $k)->isEmpty() && !empty($row['brandName'])) {
                echo $this->input("brandName" . $k, ["class" => "productName"])->setDataFromResource($row['brandName']);
            } else {
                echo $this->input("brandName" . $k, ["class" => "productName"]);
            }
            ?>
                                            </span>
                                            <span class="productTitle">
                                                <?php
                                                if ($this->input("industryStandard" . $k)->isEmpty() && !empty($row['industryStandard'])) {
                                                    echo $this->input("industryStandard" . $k, ["class" => "productTitle"])->setDataFromResource($row['industryStandard']);
                                                } else {
                                                    echo $this->input("industryStandard" . $k, ["class" => "productTitle"]);
                                                }
                                                ?>
                                            </span>
                                            <ul>
                                                <?php
                                                $bstCnt = 1;
                                                if (isset($row['BrandShortText']) && is_array($row['BrandShortText'])) {
                                                    foreach ($row['BrandShortText'] as $i => $bst) {
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

                                                while ($bstCnt <= 5) {
                                                    if ($this->editmode) {
                                                        echo "<li>";
                                                        echo $this->input("brandShortText" . $key . $bstCnt);
                                                        echo "</li>";
                                                    } else {
                                                        if (!$this->input("brandShortText" . $key . $bstCnt)->isEmpty()) {
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
            $iccnt = 0;
            if (isset($row['featureIcon']) && is_array($row['featureIcon']) && !empty($row['featureIcon'])) {

                foreach ($row['featureIcon'] as $iccntKey => $featureIcon) {

                    if($this->editmode)
                    {
                        if($iccnt<=3){
                            if ($this->image('productLogo' . $key . $iccnt)->isEmpty() && !is_null($featureIcon['icon'])) {
                                echo $this->image('productLogo' . $key . $iccnt, [
                                    "width" => $featureIcon['icon']->getWidth(),
                                    "height" => $featureIcon['icon']->getHeight(),
                                    "aspectratio" => true,
                                    "interlace" => true,
                                    "quality" => 95,
                                    "format" => "PNG"
                                ])->setImage($featureIcon['icon']);
                            } else {
                                echo $this->image('productLogo' . $key . $iccnt, [
                                    "width" => 91,
                                    "height" => 53,
                                    "aspectratio" => true,
                                    "interlace" => true,
                                    "quality" => 95,
                                    "format" => "PNG"
                                ]);
                                ?>

                                <?php
                            }

                            $iccnt++;
                        }
                    }
                    else
                    {
                        $imgSrcObj2 = $this->image('productLogo' . $key . $iccnt);
                        if($imgSrcObj2)
                        {
                        ?>
                        <img src="<?= $imgSrcObj2->getThumbnail('catalog_thumb'); ?>" width="91" height="53"/>
                        <?php
                        }
                    }
                }
            }

            for ($iccnt = $iccnt; $iccnt <= 3; $iccnt++) {
                echo $this->image('productLogo' . $key . $iccnt, [
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
                                                if ($this->input("sizeRange" . $k)->isEmpty() && !empty($row['range'])) {
                                                    echo $this->input("sizeRange" . $k, ["class" => "details"])->setDataFromResource($row['range']);
                                                } else {
                                                    echo $this->input("sizeRange" . $k, ["class" => "details"]);
                                                }
                                                ?>
                                            </span>
                                        </div>
                                    </figcaption>
                                </figure>

                                                <?php
                                                $k++;
                                                unset($key);
                                            } // Block End
                                        }
                                        ?>
                    <?php } ?>
                </aside>

                <!-- Footer Area -->

            </article>
            </section>
        </div>
</div>
