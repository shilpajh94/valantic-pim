<?php
if (!isset($this->parentContainer)) {
$this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
}
?>
<div class="wrapper">
    <header id="header">
        <div class="header-sec">
            <div class="header-txt"><span class="first-title">Conveying Solutions</span>
                <span class="second-title">
                    <?= $this->input("WPA_title",["placeholder" =>"Enter Your  Title"]); ?></span>
            </div>
            <div class="print-pg-no"></div>
        </div>
    </header>
    <footer id="footer" class="footer">
        <div class="footer-logo">
            <img src="<?= $footer_logo_src; ?>" alt="" width="150">
        </div>
    </footer>
    <main id="content" role="main">
        <section class="wood-product-applications">
            <h1 class="orange"><?= $this->input("CBS_WPA_Heading",[
            "placeholder" =>
            "Enter Your  Heading"]); ?></h1>

            <div class="table-data wpa-table">

                <?= $this->area('myArea', ['type' => 'wood-product-areabrick']); ?>

            </div>

            <p class="note mb-0"><?= $this->input("Note_mb",[
            "placeholder" =>
            "Enter Your  Note"]); ?></p>

            <p class="note"><?= $this->input("Note",[
            "placeholder" =>
            "Enter Your  Note"]); ?></p>


            <h1 class="orange"><strong><?= $this->input("CBS_WPF_Heading",[
            "placeholder" =>
            "Enter Your  Heading"]); ?></strong></h1>

            <h2> <?= $this->input("CBS_TPPF_Heading",[
            "placeholder" =>
            "Enter Your  Heading"]); ?></h2>

            <?php
                if($this->editmode)
                    {
                        echo $this->image("PP_Image");
                    }
                    else
                    {
                        $imgSrcObj =  $this->image("PP_Image");
                        if($imgSrcObj)
                    {
                    ?>
            <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" />
            <?php
                        }
                    }
            ?>

            <h2><?= $this->input("CBS_CBRT_Heading",[
            "placeholder" =>
            "Enter Your  Heading"]); ?></h2>

            <div class="environment-quality-sec">
                <div class="media">
                    <div class="media-body">
<p>
                            <?php

                                    if($this->editmode)
                                    {
                                        echo $this->image("Conti_Roll_T_Image");
                                    }
                                    else
                                    {
                                        $imgSrcObj =  $this->image("Conti_Roll_T_Image");
                                        if($imgSrcObj)
                                        {
                                        ?>
                            <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" />
                            <?php
                                    }
                                }
                            ?>

                            <?php

                                    if($this->editmode)
                                    {
                                        echo $this->image("Conti_Roll_U_Image");
                                    }
                                    else
                                    {
                                        $imgSrcObj =  $this->image("Conti_Roll_U_Image");
                                        if($imgSrcObj)
                                        {
                                        ?>
                            <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" />
                            <?php
                                    }
                                }
                            ?>
</p>

<div class="p-medium">

                        <?= $this->wysiwyg("CBS_CBRT_text",[
                            "placeholder" =>
                            "Enter Your  Description"
                        ]); ?>
</div>

                        <p class="page-details"><?= $this->input("CBS_CBRT_Input_Text",[
                            "placeholder" =>
                            "Enter Your  Description"
                        ]); ?></p>

                    </div>

                    <?php

                            if($this->editmode)
                            {
                                echo $this->image("CBRT_Section_Image");
                            }
                            else
                            {
                                $imgSrcObj =  $this->image("CBRT_Section_Image");
                                if($imgSrcObj)
                                {
                                ?>
                    <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt=""  class="features-images" />
                    <?php
                                }
                            }
                        ?>
                </div>
            </div>

            <h1><?= $this->input("CBS_TSF_Heading",[
            "placeholder" =>
            "Enter Your  Heading"]); ?></h1>

            <?php

                    if($this->editmode)
                    {
                        echo $this->image("TSF_Section_Image");
                    }
                    else
                    {
                        $imgSrcObj =  $this->image("TSF_Section_Image");
                        if($imgSrcObj)
                        {
                        ?>
            <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" />
            <?php
                    }
                }
            ?>
        </section>
    </main>
</div>