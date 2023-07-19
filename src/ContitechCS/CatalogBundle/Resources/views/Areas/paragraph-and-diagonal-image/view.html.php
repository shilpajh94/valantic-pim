<div class="environment-quality-sec">
    <div class="media">
            <?php   
                $image_position = 'right';
            ?>
        

        <!-- <div class="media-body"> -->

            <div class="p-medium" style = "position: absolute;">
                <?= $this->wysiwyg("quality_description_above",["placeholder" =>"Enter Your  Description"]); ?>
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
                            <div class="diagonal-image-sec" style = "margin-left: 350px">
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
                                <img src="<?= $this->helper->getImageThumbnail($imgSrcObj1, $this->imageWidth); ?>" alt="" class="features-images" style="max-height:350px;" />
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
         <?= $this->wysiwyg("quality_description_below",["placeholder" =>"Enter Your  Description"]); ?>
    </div>
    <?php
        }else{
    ?>
            <?= $this->wysiwyg("quality_description_below",["placeholder" =>"Enter Your  Description"]); ?>
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