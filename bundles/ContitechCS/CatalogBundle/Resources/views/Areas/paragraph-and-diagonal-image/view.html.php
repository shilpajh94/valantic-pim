<div class="environment-quality-sec">
    <div class="media">
            <?php   
                $image_position = 'right';
            ?>
        

        <!-- <div class="media-body"> -->

            <div class="p-medium" style = "position: absolute;">
                <div>
                    <?= $this->wysiwyg("quality_description_above",["placeholder" =>"Enter text for Preform™ Panel"]); ?>
                </div>
                <div style="margin-top: 100px;">
                    <?= $this->wysiwyg("quality_description_above_2",["placeholder" =>"Enter text for Preform™ Splice Method & Improved Performance"]); ?>
                </div>
            </div>
        </div>
        <?php
            if($image_position == 'right')
            {   
                ?>
                
                <?php
                    
                    if(!$this->editmode && ($this->image("Image")->getThumbnail('catalog_thumb') || $this->image("Environment_Image")->getThumbnail('catalog_thumb')))
                    {
                        ?>
                            <div class="diagonal-image-sec">
                        <?php
                    }

                    if($this->editmode)
                    {
                    ?>
                    <div style = "margin-left: 500px">
                        <?php
                            echo $this->image("Environment_Image");
                        ?>
                    </div>
                    <?php
                    }
                    else
                    {
                        $imgSrcObj1 =  $this->image("Environment_Image");

                        
                        if(!empty($imgSrcObj1->getId()))
                        {
                            ?>
                                <img src="<?= $this->helper->getImageThumbnail($imgSrcObj1, $this->imageWidth); ?>" alt="" class="features-images" style="max-height:400px; width: 430px; margin-top: -69px;" />
                            <?php
                        }
                    }
            }
        ?>

<div class="p-medium" style = "margin-left: 100px; margin-top: 10px;">
    <?php
        if($this->editmode){
    ?> 
    <div style = "margin-left: 500px; margin-top: 20px;">
         <?= $this->wysiwyg("quality_description_below",["placeholder" =>"Enter text for Savings & Less Downtime"]); ?>
    </div>
    <?php
        }else{
    ?>
            <?= $this->wysiwyg("quality_description_below",["placeholder" =>"Enter text for Savings & Less Downtime"]); ?>
    <?php
        }
    ?>
        <?php
            if($this->editmode)
            {
            ?>
            <div style = "position: absolute; margin-left: 500px; margin-top: 50px;">
                <?php
                    echo $this->image("Environment_Image_2");
                ?>
            </div>
            <?php
            }
            else
            {
                $imgSrcObj1 =  $this->image("Environment_Image_2");

                
                if(!empty($imgSrcObj1->getId()))
                {
                    ?>
                        <img src="<?= $this->helper->getImageThumbnail($imgSrcObj1, $this->imageWidth); ?>" alt="" class="features-image1" style="max-height:350px; margin-top: 0px;" />
                    <?php
                }
            }
        ?>

    </div>
</div>