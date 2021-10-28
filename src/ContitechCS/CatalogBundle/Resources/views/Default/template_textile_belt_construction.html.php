<?php
    if (!isset($this->parentContainer)) {
        $this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
    }
?>
<div class="wrapper">
    <header id="header">
        <div class="header-sec">
            <div class="header-txt"><strong>Conveying Solutions</strong>
                <?= $this->input("TBS_title",[
                "placeholder" =>
                "Enter Your  Title"]); ?>
            </div>
            <div class="print-pg-no"></div>
        </div>
        <!-- <footer id="footer" >
            <div class="footer-logo"><img src="images/continental_logo.png" alt="" /></div>
        </footer> -->
        <main id="content" role="main">
            <section class="fortressxp-belts">
                <h1 class="orange"><?= $this->input("Header_title",[
                "placeholder" =>
                "Enter Your  Heading"]); ?></h1>

                <p class="p-medium"><?= $this->input("Slogan_title",[
                "placeholder" =>
                "Enter Your  Slogan"]); ?> </p>

                <div class="colum-2 p-0">
                    <p><?= $this->wysiwyg("Content1",[
                    "placeholder" =>
                    "Enter Your  Description"]); ?></p>

                    <p><?= $this->wysiwyg("Content2",[
                    "placeholder" =>
                    "Enter Your  Description"]); ?></p>

                </div>


                <h3 class="orange"><?= $this->input("BC_Header_title",[
                "placeholder" =>
                "Enter Your  Heading"]); ?></h3>

                <?php
                    if($this->editmode)
                        {
                            echo $this->image("Belt_Components_Image");
                        }
                        else
                        {
                            $imgSrcObj =  $this->image("Belt_Components_Image");
                            if($imgSrcObj)
                            {
                            ?>
                <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" />
                <?php
                            }
                        }
                ?>


                <h3 class="orange mb-0"><?= $this->input("BNE_Header_title",[
                "placeholder" =>
                "Enter Your  Heading"]); ?></h3>

                <?php
                    if($this->editmode)
                        {
                            echo $this->image("Belt_Nomenclature_Image");
                        }
                        else
                        {
                            $imgSrcObj =  $this->image("Belt_Nomenclature_Image");
                            if($imgSrcObj)
                            {
                            ?>
                <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" />
                <?php
                            }
                        }
                ?>

                <h1 class="orange"><?= $this->input("TBA_Header_title",[
                "placeholder" =>
                "Enter Your  Heading"]); ?></h1>

                <div class="table-data textile-table">
                    <?= $this->area('myArea', ['type' => 'textile-belt-applications-areabrick']); ?>
                </div>

                <h3 class="mt-4"><?= $this->input("Example_Header",[
                "placeholder" =>
                "Enter Your  SubHeading"]); ?></h3>

                <div class="table process-table">
                    <?= $this->area('myArea2', ['type' => 'example-of-aggregate-areabrick']); ?>
                </div>
                <p class="note"><?= $this->textarea("Note",[
                "placeholder" =>
                "Enter Your  Note"]); ?></p>


            </section>

        </main>
        <footer id="footer1">
            <div class="footer-logo"><img src="images/continental_logo.png" alt="" /></div>
        </footer>
</div>