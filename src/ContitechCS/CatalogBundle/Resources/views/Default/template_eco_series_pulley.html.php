<?php
     if (!isset($this->parentContainer)) {
    $this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
    }
?>
<div class="wrapper">
    <header id="header">
        <div class="header-sec">
            <div class="header-txt"><span class="first-title"><?= $this->translate('CS_header_title') ?></span>
                <span class="second-title">
                    <?= $this->input("ESP_title",["placeholder" =>"Enter Your  Title"]); ?></span>
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
        <section class="fortressxp-belts">

            <h1 class="orange"><?= $this->input("Header_title",[
            "placeholder" =>
            "Enter Your  Heading"]); ?></h1>
            <p class="p-medium"><?= $this->textarea("Content1",[
                "placeholder" =>
                "Enter Your  Description"
            ]); ?></p>

            <p><?= $this->wysiwyg("Content2",[
                "placeholder" =>
                "Enter Your  Description"
            ]); ?></p>

            <p>
                <?php
                    if($this->editmode)
                        {
                            echo $this->image("Eco_Series_Image");
                        }
                        else
                        {
                            $imgSrcObj =  $this->image("Eco_Series_Image");
                            if($imgSrcObj)
                            {
                            ?>
                <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" />
                <?php
                            }
                        }
                ?>
            </p>


            <div class="colum-2 p-0">

                <p><?= $this->wysiwyg("Content3",[
                    "placeholder" =>
                    "Enter Your  Description"
                ]); ?></p>

                <p><?= $this->wysiwyg("Content4",[
                    "placeholder" =>
                    "Enter Your  Description"
                ]); ?> </p>

                <p class="note"><i>
                        <?= $this->textarea("Note1",[
                "placeholder" =>
                "Enter Your  Description"
            ]); ?>
                    </i></p>

                <div class="nexcolumtarget">

                    <p>
                        <?php
                            if($this->editmode)
                                {
                                    echo $this->image("Eco_Extreme_Image");
                                }
                                else
                                {
                                    $imgSrcObj =  $this->image("Eco_Extreme_Image");
                                    if($imgSrcObj)
                                    {
                                    ?>
                        <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" />
                        <?php
                                    }
                                 }
                        ?>
                    </p>
                    <div>
                        <?php
                            if($this->editmode)
                                {
                                    echo $this->image("Test_Rig_Image");
                                }
                                else
                                {
                                    $imgSrcObj =  $this->image("Test_Rig_Image");
                                    if($imgSrcObj)
                                    {
                                    ?>
                        <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" />
                        <?php
                                }
                             }
                        ?>
                    </div>

                    <p class="note"><?= $this->input("Note2",[
                        "placeholder" =>
                        "Enter Your  Note"
                    ]); ?></p>

                </div>
            </div>

            <div class="page-break"></div>


            <h1 class="orange"><?= $this->input("SPlice_Header_title",[
                "placeholder" =>
                "Enter Your  Heading"]); ?>
                <span class="sub-title"><?= $this->input("SPlice_Sub_title",[
                "placeholder" =>
                "Enter Your  SubHeading"]); ?></span>
            </h1>


            <p class="p-medium"><?= $this->textarea("Splice_Content1",[
                "placeholder" =>
                "Enter Your  Description"
            ]); ?></p>


            <p><?= $this->wysiwyg("Splice_Content2",[
                "placeholder" =>
                "Enter Your  Description"
            ]); ?></p>

            <div class="colum-2 p-0 standard-compounds mb-4">

                <h3><?= $this->input("Perform_Panel_Heading",[
                "placeholder" =>
                "Enter Your  Heading"]); ?></h3>

                <p><?= $this->wysiwyg("Perform_Panel_Content",[
                    "placeholder" =>
                    "Enter Your  Description"
                ]); ?></p>

                <h3><?= $this->input("Perform_Splice_Heading",[
                "placeholder" =>
                "Enter Your  Heading"]); ?></h3>

                <p><?= $this->wysiwyg("Perform_SPlice_Content",[
                    "placeholder" =>
                    "Enter Your  Description"
                ]); ?></p>

                <h3><?= $this->input("Improved_Performance_Heading",[
                "placeholder" =>
                "Enter Your  Heading"]); ?></h3>

                <p><?= $this->wysiwyg("Improved_Performance_Content",[
                    "placeholder" =>
                    "Enter Your  Description"
                ]); ?></p>

                <div class="nexcolumtarget">
                    <?php
                        if($this->editmode)
                            {
                                echo $this->image("Splice_Image");
                            }
                            else
                            {
                                $imgSrcObj =  $this->image("Splice_Image");
                                if($imgSrcObj)
                                {
                                ?>
                    <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" />
                    <?php
                            }
                         }
                    ?>

                    <h3><?= $this->input("Savings_Heading",[
                    "placeholder" =>
                    "Enter Your  Heading"]); ?></h3>

                    <p><?= $this->wysiwyg("Saving_Content",[
                        "placeholder" =>
                        "Enter Your  Description"
                    ]); ?></p>

                    <h3><?= $this->input("Less_Downtime_Heading",[
                    "placeholder" =>
                    "Enter Your  Heading"]); ?></h3>

                    <p><?= $this->input("Less_Downtime_Content",[
                        "placeholder" =>
                        "Enter Your  Description"
                    ]); ?></p>

                    <?php
                        if($this->editmode)
                            {
                                echo $this->image("less-downtime_Image");
                            }
                            else
                            {
                                $imgSrcObj =  $this->image("less-downtime_Image");
                                if($imgSrcObj)
                                {
                                ?>
                    <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt=""
                        style="margin-right: 22px; margin-bottom: 0px;" width="200" />
                    <?php
                            }
                         }
                    ?>

                </div>
            </div>

        </section>

    </main>

</div>