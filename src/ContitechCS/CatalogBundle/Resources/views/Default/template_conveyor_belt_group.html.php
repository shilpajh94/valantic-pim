<?php
if (!isset($this->parentContainer)) {
    $this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
}
?>
<div class="wrapper">
    <div class="backcoverpage">
        <div class="black-bg">
            <div class="top-sec">
                <div class="first-sec col-3">
                    <h1 class="orange"><?= $this->input("Conveyor_Belt_Group_header_title",["placeholder" =>"Enter Heading"]); ?></h1>
                    <?= $this->wysiwyg("CBG_About",["placeholder" =>"Enter Description" ]);?>
                    <?php if($this->editmode) { ?>
                        <div class="img-placeholder">
                            <?= $this->image("CBG_logo_image"); ?>
                        </div>
                    <?php } else { 
                        $logoImgSrcObj =  $this->image("CBG_logo_image");
                        if (!empty($logoImgSrcObj)) { ?>
                            <span class="img-placeholder">
                                <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($logoImgSrcObj, $this->imageWidth); ?>" alt=""  >
                            </span>
                        <?php }
                    } ?>
                </div>
                <div class="last-sec col-3 ml-5">
                    <h1 class="orange"><?= $this->input("back_cover_second_title",["placeholder" =>"Enter Heading"]); ?></h1>
                    <?= $this->wysiwyg("CBG_Description", ["placeholder" =>"Enter Description" ]);?>
                </div>
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
                            if (!empty($imgSrcObj)) { ?>
                                <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj, $this->imageWidth); ?>" alt=""  >
                                <?php
                            }
                        }
                    ?>
                </div>

                <div class="bottom-mid-sec"><?= $this->textarea("CBG_Content", ["placeholder" => "Enter Your  Description"]);?></div>
                    
                <div class="bottom-end-sec">
                    <p><?= $this->input("myHeadline", ["width" => 140 ,"placeholder" => "Enter Your  Content"]); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .top-sec{ display: flex; }
</style>
