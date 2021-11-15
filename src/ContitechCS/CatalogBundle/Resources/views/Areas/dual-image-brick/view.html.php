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
