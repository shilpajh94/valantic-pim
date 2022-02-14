<?php

if (!isset($this->parentContainer)) {
    $this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
} ?>
<div class="wrapper imgcoverPage1 coverPageWrapper">
    <div class="cover-image " id="cover-up" >
        <?php 
        if ($this->editmode) {
            echo "Select image type: ".$this->select("image_type", [
                "store" => [
                    ['single-image', 'Single Collage Image'],
                    ['multi-images', 'Multiple Image (Fixed Design)']
                ],
                "reload" => true
            ]);
        } ?>
        <div class="top-section">
            <?php if ( !$this->select("image_type")->isEmpty()) { 
                $imageType = $this->select("image_type")->getData();
                if ($imageType == 'single-image') {
                    if ($this->editmode) { ?>
                        <div class="" style="max-width: 300px; position: relative;"><?= "Drop logo image here" ?><?= $this->image("cover_page_logo_image"); ?></div>
                        <div class="img-wrapper">
                            <div class="set1-collage"><?= $this->image("cover_page_collage_image"); ?></div>
                        </div>
                    <?php } else { 
                        $logoSrcObj =  $this->image("cover_page_logo_image"); 
                        $collageSrcObj =  $this->image("cover_page_collage_image"); 
                        if (!empty($logoSrcObj)) { ?>
                            <div class="logo"><img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($logoSrcObj, $this->imageWidth); ?>"/></div>
                        <?php }
                        if (!empty($collageSrcObj)) { ?>
                            <div class="img-wrapper">
                                <div class="set1-collage"><img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($collageSrcObj, $this->imageWidth); ?>"/></div>
                            </div>
                        <?php } 
                    }
                } else { 
                    if ($this->editmode) { ?>
                        <div class="" style="max-width: 300px; position: relative;"><?= $this->image("cover_page_logo_image"); ?></div>
                        <div class="img-wrapper">
                            <div class="set1"><?= $this->image("cover_page_collage_image_1"); ?></div>
                            <div class="set2">
                                <div class="col-3 set2-1"><?= $this->image("cover_page_collage_image_2_1"); ?></div>
                                <div class="col-3 set2-2">
                                    <div class="set2-2-1"><?= $this->image("cover_page_collage_image_2_2_1"); ?></div>
                                    <div class="set2-2-2"><?= $this->image("cover_page_collage_image_2_2_2"); ?></div>
                                </div>
                                <div class="col-3 set2-3"><?= $this->image("cover_page_collage_image_2_3"); ?></div>
                            </div>
                        </div>
                    <?php } else { 
                        $logoSrcObj =  $this->image("cover_page_logo_image"); 
                        $collageSetObj1 =  $this->image("cover_page_collage_image_1"); 
                        $collageSetObj21 =  $this->image("cover_page_collage_image_2_1"); 
                        $collageSetObj221 =  $this->image("cover_page_collage_image_2_2_1");
                        $collageSetObj222 =  $this->image("cover_page_collage_image_2_2_2");
                        $collageSetObj23 =  $this->image("cover_page_collage_image_2_3");
                        if (!empty($logoSrcObj)) { ?>
                            <div class="logo"><img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($logoSrcObj, $this->imageWidth); ?>"/></div>
                        <?php } ?>
                        <div class="img-wrapper">
                            <?php if (!empty($collageSetObj1)) { ?>
                                <div class="set1"><img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($collageSetObj1, $this->imageWidth); ?>"/></div>
                            <?php } 
                            if (!empty($collageSetObj21) || !empty($collageSetObj221) || !empty($collageSetObj222) || !empty($collageSetObj23)) { ?>
                                <div class="set2">
                                    <div class="col-3 set2-1"><img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($collageSetObj21, $this->imageWidth); ?>"/></div>
                                    <div class="col-3 set2-2">
                                        <div class="set2-2-1"><img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($collageSetObj221, $this->imageWidth); ?>"/></div>
                                        <div class="set2-2-2"><img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($collageSetObj222, $this->imageWidth); ?>"/></div>
                                    </div>
                                    <div class="col-3 set2-3"><img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($collageSetObj23, $this->imageWidth); ?>"/></div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } 
                }
            } ?>
        </div>
        <div class="bottom-section">
            <h1 class="orange lh"><?= $this->input("cover_page_bottom_part_heading1",["placeholder" =>"Enter First Heading"]); ?></h1>
            <h1 class="orange"><?= $this->input("cover_page_bottom_part_heading2",["placeholder" =>"Enter Second Heading"]); ?></h1>
            <h2 class=""><?= $this->input("cover_page_bottom_part_sub_heading",["placeholder" =>"Enter Sub Heading"]); ?></h2>
            <?php if ($this->editmode) { ?>
                <div class="orange bottom-align" ><?= $this->input("cover_page_bottom_line",["placeholder" =>"Enter Details"]); ?></div>
            <?php } else { ?>
                <p class="orange bottom-align"><?= $this->input("cover_page_bottom_line")->getData(); ?></p>
            <?php } ?>
        </div>
    </div>
</div>


<style>


.imgcoverPage1 {
    page: title81;
    width: 100%;
    height: 100%;
   
}





.imgcoverPage1 .footer2 {
    display: none;
    text-align: left;
    position: running(footer2);

}

.imgcoverPage1 .footer3 {
    display: none;
    text-align: left;
    position: running(footer3);
}

@page title81 {
    margin-left: 20px;
    margin-right: 20px;
    margin-top: 20px;
    margin-bottom: 20px;
    padding: 0px;
    content: counter(0);

    @top-right-corner {
        content: "";
    }

    @top-left-corner {
        content: "";
    }

    @top-right {
        content: "";
    }
    @bottom-left {
        content: "";
    }
    @bottom-right {
        content: "";
    }
}

/* @page title80:left {
    @bottom-center {
        content: element(footer2);
        z-index: 1;
    }
}

@page title80:right {
    @bottom-center {
        content: element(footer3);
        z-index: 1;
    }
} */
</style>

