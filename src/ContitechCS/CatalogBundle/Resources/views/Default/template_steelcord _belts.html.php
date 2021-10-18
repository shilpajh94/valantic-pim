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

            <h1 class="orange"><?= $this->input("Sybercord_Header_title"); ?></h1>
            <h2 class="d-flex sub-title" style="justify-content: space-between;">
                <?= $this->input("Sybercord_Sub_title"); ?>

                <?php
                    if($this->editmode)
                        {
                            echo $this->image("sybercord_Image");
                        }
                        else
                        {
                            $imgSrcObj =  $this->image("sybercord_Image");
                            if($imgSrcObj)
                            {
                            ?>
                <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" />
                <?php
                        }
                     }
                ?>

            </h2>



            <div class="environment-quality-sec">

                <div class="media">
                    <div class="media-body pr-4">

                        <p><?= $this->wysiwyg("sybercord_Content"); ?></p>

                        <?php
                            if($this->editmode)
                                {
                                    echo $this->image("Sybercord_Construction_Image");
                                }
                                else
                                {
                                    $imgSrcObj =  $this->image("Sybercord_Construction_Image");
                                    if($imgSrcObj)
                                    {
                                    ?>
                        <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" class="w-100" />
                        <?php
                                }
                             }
                        ?>
                        </p>
                    </div>

                    <?php
                        if($this->editmode)
                            {
                                echo $this->image("Sybercord_Construction_Compact_Image");
                            }
                            else
                            {
                                $imgSrcObj =  $this->image("Sybercord_Construction_Compact_Image");
                                if($imgSrcObj)
                                {
                                ?>
                    <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" class="w-100" />
                    <?php
                            }
                         }
                    ?>
                </div>
            </div>


            <div class="feature-benefit-list">
                <h3><?= $this->input("Sybercord_Sub_Heading1"); ?></h3>
                <ul>
                    <?php
                    while($this->block("Sybercord_Sub_Heading1_Content")->loop()) { ?>
                    <li><span class="orange">›</span><?= $this->input("Sybercord_Sub_Heading1_Content");?> </li>
                    <?php
                    } ?>
                </ul>
            </div>

            <div class="colum-2 p-0">
                <div class="feature-benefit-list my-0">
                    <h3><?= $this->input("Sybercord_Sub_Heading2"); ?></h3>
                    <ul>
                        <li><span class="orange">›</span><?= $this->input("Sybercord_Sub_Heading2_Content"); ?></li>
                    </ul>

                    <div class="nexcolumtarget">
                        <h3><?= $this->input("Sybercord_Sub_Heading3"); ?></h3>
                        <ul>
                            <li><span class="orange">›</span><?= $this->input("Sybercord_Sub_Heading3_Content"); ?></li>
                        </ul>
                    </div>

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