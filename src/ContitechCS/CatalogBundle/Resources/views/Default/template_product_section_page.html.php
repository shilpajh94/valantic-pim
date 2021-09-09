<?php
if (!isset($this->parentContainer)) {
$this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
}
?>
<div class="innercoverpage">
    <div class="black-bg">
        <h1><?= $this->input("TOC_Section_Title"); ?></h1>
    </div>
    <div class="bannersec">
    <?php 
        if ($this->editmode) {
            echo $this->image("TOC_Section_Image");
        }
        else
        { ?>
            <img src="<?php echo $this->image("TOC_Section_Image")->getSrc(); ?>" alt="">
            <?php
        }
        ?>
    </div>
</div>