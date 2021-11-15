<?php
   if (!isset($this->parentContainer)){
       $this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
   }
   ?>
<div class="wrapper">
    <header id="header">
            <?php 
                if($this->editmode)
                {
                    echo $this->input("CS_ProductName",['placeholder' => 'Enter Product Name']);
                }
            ?>
        <div class="header-sec">
            <div class="header-txt"><span class="first-title"><?= $this->translate('CS_header_title') ?></span>
                <span class="second-title">
                    <?= $this->input("ESP_title",["placeholder" =>"Enter Your  Title"]); ?></span>
            </div>
            <div class="print-pg-no"></div>
        </div>
    </header>
    <footer id="footer" class="footer">
        <div class="footer-logo">
            <img src="<?= $footer_logo_src; ?>" alt="" width="150">
        </div>
    </footer>
    <main id="content" role="main">
        <section class="fortressxp-belts ">
            <?= $this->areablock('myAreablock'); ?>
        </section>       
    </main>
</div>