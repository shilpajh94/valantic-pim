<?php
if (!isset($this->parentContainer)) {
$this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
}
?>
<div class="wrapper">
    <div class="backcoverpage">
        <div class="black-bg">
            <div class="top-sec">

                <h1 class="orange"><?= $this->input("Conveyor_Belt_Group_header_title",["placeholder" =>"Enter Your  Heading"]); ?>     
                </h1>

                <?= $this->wysiwyg("CBG_About",["placeholder" =>"Enter Your  Description" ]);?>
    
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
                            
                            if(method_exists($imgSrcObj,'getThumbnail') && $imgSrcObj->getThumbnail('catalog_thumb'))
                            {
                            ?>
                    <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" />
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