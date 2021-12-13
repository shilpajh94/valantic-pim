<?php
    if($this->editmode)
    {
        echo $this->image("QAE_Image");
    }
    else
    {
        $imgSrcObj =  $this->image("QAE_Image");
        if($imgSrcObj)
        {
            ?>
            <div class="full-image-sec">
                <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt=""  />
            </div>
            <?php
        }
    }
?>