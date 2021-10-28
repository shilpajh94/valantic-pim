<?php
    if (!isset($this->parentContainer)) {
        $this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
    }
?>
<div class="wrapper">
    <header id="header">
        <div class="header-sec">
            <div class="header-txt"><strong>Conveying Solutions</strong> <?= $this->input("TBS_title",[
                "placeholder" =>
                "Enter Your  Title"]); ?></div>
            <div class="print-pg-no"></div>
        </div>
    </header>
    <footer id="footer">
        <div class="footer-logo"><img src="/static/cbs/images/continental_logo.png" alt="" /></div>
    </footer>
    <main id="content" role="main">
        <section class="fortressxp-belts">
            <h1 class="orange"><?= $this->input("Header_title",[
            "placeholder" =>
            "Enter Your  Heading"]); ?></h1>

            <p class="p-medium"><?= $this->input("Sub_Headings",[
            "placeholder" =>
            "Enter Your  SubHeading"]); ?> </p>

            <p><?= $this->wysiwyg("Content1",[
                "placeholder" =>
                "Enter Your  Description"
            ]); ?> </p>


            <h3 class="orange"><?= $this->input("SubHeading_title",[
            "placeholder" =>
            "Enter Your  SubHeading"]); ?></h3>

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
            <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" class="w-100 mb-5" />
            <?php
                        }
                    }
            ?>




            <h3 class="orange mb-0"><?= $this->input("SubHeading_title2",[
            "placeholder" =>
            "Enter Your  SubHeading"]); ?></h3>

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

            <div class="page-break"></div>
            <h2 class="orange mb-0"><?= $this->input("PPFB_title",[
                "placeholder" =>
                "Enter Your  Heading"]); ?>
                <span class="sub-title"><?= $this->input("PPFB_SubHeading",[
                    "placeholder" =>
                    "Enter Your  SubHeading"]); ?>
                </span>
            </h2>


            <p class="p-medium">
                <?= $this->input("PPFB_Content",[
            "placeholder" =>
            "Enter Your  SubHeading"]); ?>
            </p>


            <h3><?= $this->input("PPFB_Slogan",[
            "placeholder" =>
            "Enter Your  Slogan"]); ?></h3>

            <h3 class="orange mb-0"><?= $this->input("ZGSC_title",[
            "placeholder" =>
            "Enter Your  Heading"]);?> </h3>
            <p> <?= $this->wysiwyg("ZGSC_Content",[
                "placeholder" =>
                "Enter Your  Description"
            ]); ?></p>


            <h3 class="orange mb-0"><?= $this->input("ZGSC2_title",[
            "placeholder" =>
            "Enter Your  Heading"]);?> </h3>
            <p><?= $this->wysiwyg("ZGSC2_Content",[
                "placeholder" =>
                "Enter Your  Description"
            ]); ?></p>

            <h3 class="orange mb-0"><?= $this->input("ORBC_title",[
            "placeholder" =>
            "Enter Your  Heading"]);?> </h3>
            <p><?= $this->wysiwyg("ORBC_Content",[
                "placeholder" =>
                "Enter Your  Description"
            ]); ?> </p>


            <h3><?= $this->input("BHE_title",[
            "placeholder" =>
            "Enter Your  Heading"]);?></h3>


            <h3 class="orange"><?= $this->input("PPSB_title",[
            "placeholder" =>
            "Enter Your  Heading"]);?></h3>
            <p> <?= $this->wysiwyg("PPSB_Content",[
                    "placeholder" =>
                    "Enter Your  Description"
                ]); ?>
            </p>

            <h3 class="orange"><?= $this->input("FSSMO_title",[
            "placeholder" =>
            "Enter Your  Heading"]);?></h3>
            <p> <?= $this->wysiwyg("FSSMO_Content",[
                "placeholder" =>
                "Enter Your  Description"
            ]); ?> </p>



        </section>

    </main>

</div>