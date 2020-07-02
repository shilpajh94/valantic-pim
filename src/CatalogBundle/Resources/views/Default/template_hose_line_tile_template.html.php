<?php
$this->extend('CatalogBundle:Layouts:layout.html.php', ['name1' => 'Name from Extend']);
?>
<?php if ($this->editmode) { ?>

    <?= $this->href("tiletemplate"); ?>
<?php }
$featuresFooter = false;
?>
<section class="seggregate tile">
<nav class="header dark">
  <div id="pageHeader"></div>
<span>Hydraulic Hose</span>
</nav>

<header class="dark">
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
    <div class="footer">
    <footer class="flex">
            <span class="logo">
                <b>
                    <?php
                    if ($this->editmode) {
                        echo $this->input("footerTitle");
                    } else {
                        echo $this->input("footerTitle");
                    }
                    ?>
                </b>
                <?php
                if ($this->editmode) {
                    echo $this->image('footerLogo', [
                        "width" => 172,
                        "height" => 'auto',
                        "aspectratio" => true,
                        "interlace" => true,
                        "quality" => 95,
                        "format" => "PNG"
                    ]);
                } else {
                    echo $this->image('footerLogo', [
                        "width" => 172,
                        "height" => 'auto',
                        "aspectratio" => true,
                        "interlace" => true,
                        "quality" => 95,
                        "format" => "PNG"
                    ]);
                }
                ?>
            </span>
            <div class="flex aligned small">
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
    <?php
    /* echo $this->inc($this->document->getProperty('header'), [
        'title' => $info['headerTitle']
    ]); */
    ?>
    <?php
    /* echo $this->inc($this->document->getProperty('footer'), [
        'footerTitle' => $info['footer']['footerTitle'],
        'footerContent' => $info['footer']['footerContent'],
        'footerLogo' => $info['footer']['footerLogo'],
        'featuresFooter' => $featuresFooter
    ]); */
    ?>
    <article class="fullcontainer">
        <section class="spacing">
            <aside class="flex first">

                <?php
                $brandsInfo = $info['brandsInfo'];
                $blockDes = $info['blockDes'];
                
                if (isset($brandsInfo) && is_array($brandsInfo)) {
                    $brandIds = array_keys($brandsInfo);
                    // p_r($brandIds);die;
                    if (is_array($brandIds) && !empty($brandIds)) {

                        $k = 0;
                        $page = 1;
                        $block = 3; // Total block skipped at first row
                        $pageBrkPoint = 16; // Maximum number of block can be added into a page.
                        while ($this->block("contentblock", ['default' => count($brandIds)])->loop()) {
                            $key = $brandIds[$k];
                            $row = $brandsInfo[$key];
                            // p_r($row);die;
                            if (!$this->editmode) {
                                if ($block % $pageBrkPoint == 0) {
                                    $featuresFooter = !$featuresFooter?true:false;
                ?>
                                    <!-- Close Page End Tags And Open new tages -->
            </aside>
        </section>
    </article>
    <!-- Forcefully break page -->
    <div class="break-before"></div>
</section>

<!-- Opening wrapper class again to start new page -->
<section class="seggregate tile">
    <?php
                                    /* echo $this->inc($this->document->getProperty('header'), [
                                        'title' => $info['headerTitle']
                                    ]); */
                                    /**
                                     * featuresFooter: If true, it will show footer with feature icon list
                                     * brandsInfo: List of brand which will be used to get feature icon detail
                                     * brandPichkupIndex: It will let us know the position of the index
                                     * to get feature icon detail from the brandsInfo array
                                     * 
                                     * ### If you want remove feature icon footer, then keep the featuresFooter is false
                                    */
                                    /* echo $this->inc($this->document->getProperty('footer'), [
                                        'footerTitle' => $info['footer']['footerTitle'],
                                        'footerContent' => $info['footer']['footerContent'],
                                        'footerLogo' => $info['footer']['footerLogo'],
                                        'featuresFooter' => false,//$featuresFooter,
                                        'brandsInfo' => $brandsInfo,
                                        'brandPickupIndex' => $k
                                    ]); */
    ?>
    <article class="fullcontainer">
        <section class="spacing">
            <aside class="flex">
        <?php
                                }
                            }
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
                                echo $this->image('productImage' . $k, [
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
                                foreach ($row['featureIcon'] as $iccnt => $featureIcon) {
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
                                    }
                                    $iccnt++;
                                }
                            }

                            for($iccnt=($iccnt+1); $iccnt<=3; $iccnt++) {
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
                            $block++; // New block added.
                            unset($key);
                        } // Block End

                    }
?>
<?php } ?>
            </aside>
        </section>
        <!-- Footer Area -->

    </article>
    <?php if ($k > 0 && $brandIds[$k - 1] != end($brandIds)) : ?>
        <div class="break-before"></div>
    <?php endif; ?>
</section>