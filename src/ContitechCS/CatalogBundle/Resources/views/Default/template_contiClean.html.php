<?php
    if (!isset($this->parentContainer)) {
    $this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
    }
    ?>
<?php if($this->editmode): ?>
<?= $this->relation("cbs_conti_clean", [
                "types" => ["object"],
                "subtypes" => [
                "object" => ["object"]
                ],
                "classes" => ["CSCatalogTables"],
        ]);
        ?>
<?php endif; ?>

<?php if($data): ?>
<div class="wrapper conticleanpage">
    <header id="header">
        <div class="header-sec">
            <div class="header-txt"><span class="first-title"><?= $this->translate('header_title') ?></span>  
            <div class="print-pg-no"></div>
        </div>
    </header>
    <footer id="footer" class="footer">
        <div class="footer-logo">
            <img src="<?= $footer_logo_src; ?>" alt="" width="150">
        </div>
    </footer>
    <main id="content" role="main">
        <section class="fortressxp-belts">
            <h1 class="orange">
                <?php if($this->editmode): ?>
                    <?php if($this->input("CS_ProductName")->isEmpty()): ?>
                            <?= $this->input("CS_ProductName")->setDataFromResource($data['Name']) ?>
                    <?php else: ?>
                            <?= $this->input("CS_ProductName"); ?>
                    <?php endif; ?>
            <?php else: ?>
                    <?= $this->input("CS_ProductName") ?>
            <?php endif; ?>

 <span class="sub-title">
                <?php if($this->editmode): ?>
                        <?php if($this->input("ContiC_TitleTagSlogan")->isEmpty()): ?>
                                <?= $this->input("ContiC_TitleTagSlogan")->setDataFromResource($data['ProductClaimSlogan']) ?>
                        <?php else: ?>
                                <?= $this->input("ContiC_TitleTagSlogan"); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("ContiC_TitleTagSlogan") ?>
                <?php endif; ?>
            
            </span>

            </h1>

           

           <div class="p-medium pt-0">
                    <?php if($this->editmode): ?>
                            <?php if($this->wysiwyg("ContiC_ShortText")->isEmpty()): ?>
                                    <?= $this->wysiwyg("ContiC_ShortText")->setDataFromResource($data['ShortText']) ?>
                            <?php else: ?>
                                    <?= $this->wysiwyg("ContiC_ShortText"); ?>
                            <?php endif; ?>
                           
                    <?php else: ?>
                        <?php if(!$this->wysiwyg("ContiC_ShortText")->isEmpty()): ?>
                                <?= $this->wysiwyg("ContiC_ShortText") ?>
                        <?php endif; ?>
                    <?php endif; ?>
            </div>
    
            <div class="full-image-sec">
                <?php
                    if($this->editmode)
                        {
                            if($this->image("ContiClean_ProductImage")->isEmpty())
                                {
                                    echo $this->image("ContiClean_ProductImage")->setImage($data['ProductImage']);
                                }        
                                else{
                                    echo $this->image("ContiClean_ProductImage");
                                    }
                                }
                                else
                                    {
                                    $CSSImgSrcObj =  $this->image("ContiClean_ProductImage");
                                        if($CSSImgSrcObj)
                                        {
                                        ?>
                    <img src="<?= $CSSImgSrcObj->getThumbnail('catalog_thumb'); ?>" alt=""  />
                    <?php
                                        }
                                    }
                                ?>
            </div>
            <div class="conticleancol colum-2 p-0">
                <div class="conticlean-tab">
                    <div class="row">
                        
                        <?php
                            if(isset($data['Benefits']) && $data['Benefits'])
                            {
                                ?>
                                    <div class="col-7">
                                        <h3 class="orange">
                                            <?= $this->input("ContiC_BenefitsLabel", ['placeholder'=>'ContiClean® Benefits']) ?>
                                        </h3>
                                        <div class="feature-benefit-list my-0">        
                                            <ul>
                                                <?php 
                                                    foreach ($data['Benefits'] as $key => $item){
                                                        ?>
                                                            <li><span class="orange">›</span> <?= $item ?></li>
                                                        <?php
                                                    }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php
                            }
                        ?>            

                        <div class="col-5">
<<<<<<< HEAD:src/ContitechCS/CatalogBundle/Resources/views/Default/template_contiClean.html.php
                            <h3 class="orange">
                           <?= $this->input("Materials_Label", ['placeholder'=>'Materials']) ?>
                             </h3>
                            <ul class="materials-list">

=======
                            
>>>>>>> 87d04e248e476d2a81cf333ea0806c3c08998d3f:src/ContitechCS/CatalogBundle/Resources/views/Default/template_contiClean_old.html.php
                            <?php 
                                if($data['material'])
                                {   
                                    ?>
                                        <h3 class="orange">
                                            <?= $this->input("Materials_Label", ['placeholder'=>'Materials']) ?>
                                        </h3>
                                        <ul class="materials-list">
                                    <?php
                                    foreach ($data['material'] as $key => $item) {
                                        ?>
                                            <li><span class="orange">›</span> <?= $item ?></li>
                                        <?php
                                    }
                                    ?></ul><?php
                                }
                            ?>
                        </div>
                    </div>
                </div>    
                <div class="nexcolumtarget">
                    <div class="feature-benefit-list">
                        <h3 class="orange"><?= $this->input("CCSM_Header3", [
                                "placeholder" =>
                                "Enter Your  TableHead"
                            ]);?> </h3>
                        <ul>
                            <?php
                                while($this->block("CCSM_Header_Points3")->loop()) { ?>
                            <li><span class="orange">›</span> <i><?= $this->input("ASTM_Label", ['placeholder'=>'ASTM D 1894-06 Coefficient of Friction']) ?> </i></li>
                            <?php
                                } ?>
                        </ul>
                    </div>
                   <?php
                    if($this->editmode)
                        {
                            if($this->image("ContiClean_reportImage")->isEmpty())
                                {
                                    echo $this->image("ContiClean_reportImage")->setImage($data['reportImage']);
                                }        
                                else{
                                    echo $this->image("ContiClean_reportImage");
                                    }
                                }
                                else
                                    {
                                    $CSSImgSrcObj =  $this->image("ContiClean_reportImage");
                                        if($CSSImgSrcObj)
                                        {
                                        ?>
                    <img src="<?= $CSSImgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" class="chartimage" />
                    <?php
                                        }
                                    }
                                ?>
                </div>
            </div>


            <div class="pg-6">
                <?php
                    if($this->editmode)
                        {
                            if($this->image("ContiClean_ApplicationImage")->isEmpty())
                                {
                                    echo $this->image("ContiClean_ApplicationImage")->setImage($data['ApplicationImage']);
                                }        
                                else{
                                    echo $this->image("ContiClean_ApplicationImage");
                                    }
                                }
                                else
                                    {
                                    $CSSImgSrcObj =  $this->image("ContiClean_ApplicationImage");
                                        if($CSSImgSrcObj)
                                        {
                                        ?>
                    <img src="<?= $CSSImgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" class="w-100" />
                    <?php
                                        }
                                    }
                                ?>
            </div>


        </section>

    </main>

</div>
<?php endif; ?>