<?php
if ($this->editmode) {
    echo $this->image("Conti_Roll_T_Image");
} else {
    $imgSrcObj =  $this->image("Conti_Roll_T_Image");
    if(!empty($imgSrcObj->getId())) { ?>
        <img src="<?= $this->helper->getImageThumbnail($imgSrcObj, $this->imageWidth); ?>" alt="" />
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
        <img src="<?= $this->helper->getImageThumbnail($imgSrcObj, $this->imageWidth); ?>" alt="" />
    <?php
    }
}
?>
