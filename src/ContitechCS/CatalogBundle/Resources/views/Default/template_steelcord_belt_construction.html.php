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
    <!-- <footer id="footer" >
            <div class="footer-logo"><img src="images/continental_logo.png" alt="" /></div>
        </footer> -->
    <main id="content" role="main">
        <section class="fortressxp-belts">
            <h1 class="orange"><?= $this->input("Header_title"); ?></h1>

            <p class="p-medium"><?= $this->input("Sub_Headings"); ?> </p>

            <p><?= $this->wysiwyg("Content1"); ?> </p>




            <h3 class="orange"><?= $this->input("SubHeading_title"); ?></h3>

            <?php
                if($this->editmode)
                    {
                        echo $this->image("SBC_Image");
                    }
                    else
                    {
                        $imgSrcObj =  $this->image("SBC_Image");
                        if($imgSrcObj)
                        {
                        ?>
            <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" />
            <?php
                        }
                    }
            ?>




            <h3 class="orange mb-0"><?= $this->input("SubHeading_title2"); ?></h3>

            <?php
                if($this->editmode)
                    {
                        echo $this->image("SBC_60-2_Image");
                    }
                    else
                    {
                        $imgSrcObj =  $this->image("SBC_60-2_Image");
                        if($imgSrcObj)
                        {
                        ?>
            <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" />
            <?php
                        }
                    }
            ?>


            <h2 class="orange mb-0"><?= $this->input("PPFB_title"); ?>
                <span class="sub-title"><?= $this->input("PPFB_SubHeading"); ?>
                </span>
            </h2>


            <p class="p-medium"><?= $this->wysiwyg("PPFB_Content"); ?></p>

            <h3><?= $this->input("PPFB_Slogan"); ?></h3>

            <h3 class="orange mb-0"><?= $this->input("ZGSC_title");?> </h3>
            <p> <?= $this->wysiwyg("ZGSC_Content"); ?></p>

            <h3 class="orange mb-0"><?= $this->input("ZGSC2_title");?> </h3>
            <p><?= $this->wysiwyg("ZGSC2_Content"); ?></p>

            <h3 class="orange mb-0"><?= $this->input("ORBC_title");?> </h3>
            <p><?= $this->wysiwyg("ORBC_Content"); ?> </p>

            <h3><?= $this->input("BHE_title");?></h3>


            <h3 class="orange"><?= $this->input("PPSB_title");?></h3>
            <p> <?= $this->wysiwyg("PPSB_Content"); ?>
            </p>

            <h3 class="orange"><?= $this->input("FSSMO_title");?></h3>
            <p> <?= $this->wysiwyg("FSSMO_Content"); ?> </p>



        </section>

    </main>
    <footer id="footer1">
        <div class="footer-logo"><img src="images/continental_logo.png" alt="" /></div>
    </footer>
</div>