<?php
   if (!isset($this->parentContainer)){
       $this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
   }
   ?>
<div class="wrapper">
    <header id="header">
        <div class="header-sec">
            <div class="header-txt"><strong>Conveying Solutions</strong></div>
            <div class="print-pg-no"></div>
        </div>
    </header>
    <footer id="footer" class="footer">
      <img src="<?= $footer_logo_src; ?>" alt="" width="150">
    </footer>
    <main id="content" role="main">
       <?php 
      /* <section class="fortressxp-belts">
            <h1 class="orange">
                <?= $this->input("Header_title",["placeholder" =>"Enter Your  Heading"]); ?>
            </h1>
            <p class="p-medium">
                <?= $this->textarea("QAE_Content",["placeholder" =>"Enter Your  Description"]); ?>
            </p>
    
        </section> */
    ?>  
<section class="fortressxp-belts">

    <?= $this->areablock('myAreablock'); ?>

      
        <h3 class="orange">
            <?= $this->input("Environment_title",["placeholder" =>"Enter Your  Heading"]); ?>
        </h3>
        
         <div class="environment-quality-sec">
            <p>
                <?= $this->wysiwyg("Environment_Content",["placeholder" =>"Enter Your  Description"]); ?>
            </p>

            <div class="media">
                <div class="media-body">
                    <p>
                        <?= $this->wysiwyg("Environment_Content2",["placeholder" =>"Enter Your  Description"]); ?>
                    </p>

                    <h3 class="orange">
                        <?= $this->input("Quality_title",["placeholder" =>"Enter Your  Heading"]); ?>
                    </h3>
                    <p>
                        <?= $this->wysiwyg("Quality_Content",["placeholder" =>"Enter Your  Description"]); ?>
                    </p>

                    

                </div>
                <?php
                    if($this->editmode)
                    {
                        echo $this->image("Environment_Image");
                    }
                    else
                    {
                        $imgSrcObj =  $this->image("Environment_Image");
                        if($imgSrcObj)
                        {
                            ?>
                                <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" class="features-images mr-0"
                            style="max-height:350px" />
                            <?php
                        }
                    }
                ?>
            </div>
         </div>
      </section>
    </main>
</div>