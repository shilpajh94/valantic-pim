<div class="environment-quality-sec">
    <div class="media">
            <?php   
                $image_position = 'right';
            ?>
        

        <div class="media-body" style="margin-top: 0px;">

            <?php
                if ($this->editmode) {
                    echo $this->image("Conti_Roll_T_Image");
                } else {
                    $imgSrcObj =  $this->image("Conti_Roll_T_Image");
                    if(!empty($imgSrcObj->getId())) { ?>
                        <img src="<?= $this->helper->getImageThumbnail($imgSrcObj, $this->imageWidth); ?>" alt="" style="margin-top: 0px;"/>
                    <?php
                    }
                }
                ?>
                <?php
                if ($this->editmode) {
                    echo $this->image("Conti_Roll_U_Image");
                } else {
                    $imgSrcObj =  $this->image("Conti_Roll_U_Image");
                    if ($imgSrcObj->getId()) { ?>
                        <img src="<?= $this->helper->getImageThumbnail($imgSrcObj, $this->imageWidth); ?>" alt="" style="margin-top: 0px;"/>
                    <?php
                    }
                }
            ?>
            
            <div class="p-medium" style = "margin-top: 30px;">
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
                            <div class="media-image-sec">
                        <?php
                    }

                    if($this->editmode)
                    {
                        echo $this->image("Environment_Image");
                    }
                    else
                    {
                        $imgSrcObj1 =  $this->image("Environment_Image");

                        
                        if(!empty($imgSrcObj1->getId()))
                        {
                            ?>
                                <img src="<?= $this->helper->getImageThumbnail($imgSrcObj1, $this->imageWidth); ?>" alt="" class="features-images" style="max-height:350px; margin-top: 20px;" />
                            <?php
                        }
                    }

                    if(!$this->editmode && ($this->image("Image")->getThumbnail('catalog_thumb') || $this->image("Environment_Image")->getThumbnail('catalog_thumb')))
                    {
                        ?></div><?php
                    }
            }
        ?>
        
    </div>
</div>