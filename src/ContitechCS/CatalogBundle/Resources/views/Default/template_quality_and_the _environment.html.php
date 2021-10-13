<?php
if (!isset($this->parentContainer)) {
$this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
}
?>
<div class="wrapper">
    <header id="header">
        <div class="header-sec">
            <div class="header-txt"><strong>Conveying Solutions</strong></div>
            <div class="print-pg-no"></div>
        </div>
    </header>
    <footer id="footer">
        <div class="footer-logo"><img src="images/continental_logo.png" alt="" /></div>
    </footer>
    <main id="content" role="main">
        <section class="fortressxp-belts">
            <h1 class="orange"><?= $this->input("Header_title"); ?></strong></h1>

            <p><?= $this->wysiwyg("QAE_Content"); ?></p>

            <div class="full-image-sec">
                <?php
                    if($this->editmode)
                        {
                            echo $this->image("QAE_Image");
                        }
                        else
                        {
                            $imgSrcObj =  $this->image("QAE_Image");
                            if($imgSrcObj)
                            {
                            ?>
                <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" />
                <?php
                            }
                        }
                ?>

            </div>

            <h3 class="orange"><?= $this->input("Environment_title"); ?></h3>

            <div class="environment-quality-sec">

                <p><?= $this->wysiwyg("Environment_Content"); ?></p>

                <div class="media">
                    <div class="media-body">

                        <p><?= $this->wysiwyg("Environment_Content2"); ?> </p>

                        <h3 class="orange"><?= $this->input("Quality_title"); ?></h3>

                        <p><?= $this->wysiwyg("Quality_Content"); ?></p>

                    </div>
                    <?php
                        if($this->editmode)
                            {
                                echo $this->image("Environment_Image");
                            }
                            else{
                                $imgSrcObj =  $this->image("Environment_Image");
                                if($imgSrcObj)
                                {
                                ?>
                    <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" />
                    <?php
                                }
                            }
                    ?>
                </div>
            </div>
        </section>

    </main>
    <footer id="footer1">
        <div class="footer-logo"><img src="images/continental_logo.png" alt="" /></div>
    </footer>
</div>