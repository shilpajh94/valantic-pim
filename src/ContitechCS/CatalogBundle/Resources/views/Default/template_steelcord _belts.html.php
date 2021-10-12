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

            <p class="p-medium"><?= $this->wysiwyg("Content1"); ?></p>

            <p><?= $this->wysiwyg("Content2"); ?></p>

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

                <p><?= $this->wysiwyg("Content3"); ?></p>

                <p><?= $this->wysiwyg("Content4"); ?> </p>

                <p class="note"><?= $this->wysiwyg("Note1"); ?></p>

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

                    <p class="note"><?= $this->input("Note2"); ?></p>

                </div>
            </div>


            <h1 class="orange"><?= $this->input("SPlice_Header_title"); ?>
                <span class="sub-title"><?= $this->input("SPlice_Sub_title"); ?></span>
            </h1>

            <p class="p-medium"><?= $this->wysiwyg("Splice_Content1"); ?></p>

            <p><?= $this->wysiwyg("Splice_Content2"); ?></p>

            <div class="colum-2 p-0 standard-compounds">

                <h3><?= $this->input("Perform_Panel_Heading"); ?></h3>

                <p><?= $this->wysiwyg("Perform_Panel_Content"); ?></p>

                <h3><?= $this->input("Perform_Splice_Heading"); ?></h3>

                <p><?= $this->wysiwyg("Perform_SPlice_Content"); ?></p>

                <h3><?= $this->input("Improved_Performance_Heading"); ?></h3>

                <p><?= $this->wysiwyg("Improved_Performance_Content"); ?></p>

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

                    <h3><?= $this->input("Savings_Heading"); ?></h3>

                    <p><?= $this->wysiwyg("Saving_Content"); ?></p>

                    <h3><?= $this->input("Less_Downtime_Heading"); ?></h3>

                    <p><?= $this->input("Less_Downtime_Content"); ?></p>

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
</body>

</html>