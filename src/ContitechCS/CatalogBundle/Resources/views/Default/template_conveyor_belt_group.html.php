<?php
if (!isset($this->parentContainer)) {
$this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
}
?>
<div class="wrapper">
    <div class="backcoverpage">
        <div class="black-bg">
            <div class="top-sec">

                <h1 class="orange"><?= $this->input("Conveyor_Belt_Group_header_title"); ?></h1>

                <?= $this->wysiwyg("CBG_About"); ?>

            </div>
            <div class="bottom-sect">
                <div class="backcover-logo">
                    <?php

                        if($this->editmode)
                        {
                            echo $this->image("CBG_Image");
                        }
                        else
                        {
                            $imgSrcObj =  $this->image("CBG_Image");
                            if($imgSrcObj)
                            {
                            ?>
                    <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" />
                    <?php
                        }
                    }
                    ?>
                </div>

                <?= $this->wysiwyg("CBG_Content"); ?>

                <h2><?= $this->input("myHeadline", ["width" => 140]); ?></h2>

            </div>
        </div>
    </div>
</div>