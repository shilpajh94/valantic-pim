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
                <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" class="w-100" />
            <?php
        }
    }
?>