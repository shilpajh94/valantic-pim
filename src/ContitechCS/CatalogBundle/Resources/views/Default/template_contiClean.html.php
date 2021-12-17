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
                <div class="header-txt"><span class="first-title"><?= $this->translate('CS_header_title') ?></span>
                <span class="second-title">
                    <?= $this->input("ContiA_title",["placeholder" =>"Enter Your  Title"]); ?></span>
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
        <section class="fortressxp-belts">
            <h1 class="orange">
                <?php if($this->editmode): ?>
                    <?php if($this->input("CS_ProductName")->isEmpty()): ?>
                            <?= $this->input("CS_ProductName",['placeholder' => 'Enter Product Name'])->setDataFromResource($data['Name']) ?>
                    <?php else: ?>
                            <?= $this->input("CS_ProductName",['placeholder' => 'Enter Product Name']); ?>
                    <?php endif; ?>
            <?php else: ?>
                    <?= $this->input("CS_ProductName",['placeholder' => 'Enter Product Name']) ?>
            <?php endif; ?>

 <span class="sub-title">
                <?php if($this->editmode): ?>
                        <?php if($this->input("ContiC_TitleTagSlogan")->isEmpty()): ?>
                                <?= $this->input("ContiC_TitleTagSlogan",['placeholder' => 'Enter Product Slogan'])->setDataFromResource($data['ProductClaimSlogan']) ?>
                        <?php else: ?>
                                <?= $this->input("ContiC_TitleTagSlogan",['placeholder' => 'Enter Product Slogan']); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("ContiC_TitleTagSlogan",['placeholder' => 'Enter Product Slogan']) ?>
                <?php endif; ?>
            
            </span>

            </h1>

           

           <div class="p-medium pt-0">
                    <?php if($this->editmode): ?>
                            <?php if($this->wysiwyg("ContiC_ShortText")->isEmpty()): ?>
                                    <?= $this->wysiwyg("ContiC_ShortText",['placeholder' => 'Enter Short Text'])->setDataFromResource($data['ShortText']) ?>
                            <?php else: ?>
                                    <?= $this->wysiwyg("ContiC_ShortText",['placeholder' => 'Enter Short Text']); ?>
                            <?php endif; ?>
                           
                    <?php else: ?>
                        <?php if(!$this->wysiwyg("ContiC_ShortText")->isEmpty()): ?>
                                <?= $this->wysiwyg("ContiC_ShortText",['placeholder' => 'Enter Short Text']) ?>
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
                                    $CCProdImgSrcObj =  $this->image("ContiClean_ProductImage");
                                        if(method_exists($CCProdImgSrcObj,'getThumbnail') && $CCProdImgSrcObj->getThumbnail('catalog_thumb'))
                                        {
                                        ?>
                    <img src="<?= $CCProdImgSrcObj->getThumbnail('catalog_thumb'); ?>" alt=""  />
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
                                }
                            ?>
                            </ul>
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
                                    $CCReportImgSrcObj =  $this->image("ContiClean_reportImage");
                                        if(method_exists($CCReportImgSrcObj,'getThumbnail') && $CCReportImgSrcObj->getThumbnail('catalog_thumb'))
                                        {
                                        ?>
                    <img src="<?= $CCReportImgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" class="chartimage" />
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
                                    $CCAppImgSrcObj =  $this->image("ContiClean_ApplicationImage");
                                        if(method_exists($CCAppImgSrcObj,'getThumbnail') && $CCAppImgSrcObj->getThumbnail('catalog_thumb'))
                                        {
                                        ?>
                    <img src="<?= $CCAppImgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" class="w-100" />
                    <?php
                                        }
                                    }
                                ?>
            </div>


        </section>

    </main>

</div>
<?php endif; ?>