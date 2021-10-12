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
    <main id="content" role="main">
        <section class="wood-product-applications">
            <h1 class="orange"><?= $this->input("CBS_WPA_Heading"); ?></h1>

            <div class="table-data wpa-table">
                <table width="100%">
                    <thead>
                        <?php if($this->editmode) {
                            echo ("text");
                             } ?>
                        <tr>
                            <?php  while($this->block("Table_Headers")->loop()) { ?>
                            <th>
                                <ul>

                                    <li> <?= $this->input("Table_Header", ['placeholder' => 'Enter Name']); ?></li>

                                </ul>
                            </th>
                            <?php } ?>


                            <!-- <th>Service<br /> Require</th>
                             <th>Product<br /> Options</th>
                            <th>Special Service Construction</th>
                            <th>Top Cover Options*</th>
                            <th>Application Requirements</th>   -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr> <?= $this->areablock('myAreablock'); ?></tr>
                    </tbody>
                </table>
            </div>

            <p class="note mb-0"><?= $this->input("Note_mb"); ?></p>

            <p class="note"><?= $this->input("Note"); ?></p>


            <h1 class="orange"><strong><?= $this->input("CBS_WPF_Heading"); ?></strong></h1>

            <h1> <?= $this->input("CBS_TPPF_Heading"); ?></h1>

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

            <h1 class="orange"><?= $this->input("CBS_CBRT_Heading"); ?></h1>

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

                        <p class="note"><?= $this->wysiwyg("CBS_CBRT_text"); ?></p>

                        <p class="page-details"><?= $this->input("CBS_CBRT_Input_Text"); ?></p>

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
                    <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" width="184" height="282" />
                    <?php
                                }
                            }
                        ?>
                </div>
            </div>

            <h1 class="orange"><?= $this->input("CBS_TSF_Heading"); ?></h1>

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
    <footer id="footer1">
        <div class="footer-logo"><img src="/static/cbs/images/continental_logo.png" alt="" /></div>
    </footer>
</div>