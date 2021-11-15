<?php
     if (!isset($this->parentContainer)) {
    $this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
    }
?>
<?php if($this->editmode): ?>
<?= $this->relation("cbs_template_sybercord_technology_construction_page", [
            "types" => ["object"],
            "subtypes" => [
            "object" => ["object"]
            ],
            "classes" => ["CSCatalogCategory"],
    ]);
?>
<?php endif; ?>
<?php if($data): ?>
<div class="wrapper">
    <header id="header">
        <div class="header-sec">
            <div class="header-txt"><span class="first-title"><?= $this->translate('CS_header_title') ?></span>
                <span class="second-title">
                    <?= $this->input("ST_title",["placeholder" =>"Enter Your  Title"]); ?></span>
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
            <h1 class="orange mb-0">
                <?php if($this->editmode): ?>
                <?php if($this->input("CS_ProductName")->isEmpty()): ?>
                <?= $this->input("CS_ProductName")->setDataFromResource($data['Name']) ?>
                <?php else: ?>
                <?= $this->input("CS_ProductName"); ?>
                <?php endif; ?>
                <?php else: ?>
                <?= $this->input("CS_ProductName") ?>
                <?php endif; ?>
            </h1>
            <h2 class="d-flex sub-title black-bold" style="justify-content: space-between;">
                <?php if($this->editmode): ?>
                <?php if($this->textarea("ST_ProductClaimSlogan")->isEmpty()): ?>
                <?= $this->textarea("ST_ProductClaimSlogan")->setDataFromResource($data['ProductClaimSlogan']) ?>
                <?php else: ?>
                <?= $this->textarea("ST_ProductClaimSlogan"); ?>
                <?php endif; ?>
                <?php else: ?>
                <?= $this->textarea("ST_ProductClaimSlogan") ?>
                <?php endif; ?>

                <?php
                if($this->editmode)
                    {
                        if($this->image("ST_LogoImage")->isEmpty())
                            {
                                echo $this->image("ST_LogoImage")->setImage($data['LogoImage']);
                            }        
                            else{
                                echo $this->image("ST_LogoImage");
                                }
                            }
                            else
                                {
                                $CSSImgSrcObj =  $this->image("ST_LogoImage");
                                    if($CSSImgSrcObj)
                                    {
                                    ?>
                <img src="<?= $CSSImgSrcObj->getThumbnail('catalog_thumb'); ?>" alt=""
                    style="margin-right: 0px; margin-bottom: 0px;" width="180" />
                <?php
                                    }
                                }
                ?>
            </h2>



            <div class="environment-quality-sec">

                <div class="media">
                    <div class="media-body pr-4">
                        <p>
                            <?php if($this->editmode): ?>
                            <?php if($this->textarea("ST_ShortText")->isEmpty()): ?>
                            <?= $this->textarea("ST_ShortText")->setDataFromResource($data['ShortText']) ?>
                            <?php else: ?>
                            <?= $this->textarea("ST_ShortText"); ?>
                            <?php endif; ?>
                            <?php else: ?>
                            <?= $this->textarea("ST_ShortText") ?>
                            <?php endif; ?>
                        </p>


                        <?php
                        if($this->editmode)
                            {
                            if($this->image("ST_ProductImage")->isEmpty())
                                {
                                    echo $this->image("ST_ProductImage")->setImage($data['ProductImage']);
                                }
                                else{
                                    echo $this->image("ST_ProductImage");
                                    }
                                }
                                else{
                                    $CSSImgSrcObj =  $this->image("ST_ProductImage");
                                    if($CSSImgSrcObj)
                                        {
                                            ?>
                        <img src="<?= $CSSImgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" class="w-100" />
                        <?php
                                        }
                                    }
                        ?>
                        </p>
                    </div>
                    <?php
                    if($this->editmode)
                        {
                            if($this->image("ST_ApplicationImage")->isEmpty())
                                {
                                    echo $this->image("ST_ApplicationImage")->setImage($data['ApplicationImage']);
                                }        
                                else{
                                    echo $this->image("ST_ApplicationImage");
                                    }
                                }
                                else
                                    {
                                    $CSSImgSrcObj =  $this->image("ST_ApplicationImage");
                                        if($CSSImgSrcObj)
                                        {
                                        ?>
                    <img src="<?= $CSSImgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" style="max-width:180px" />
                    <?php
                                        }
                                    }
                                ?>
                </div>
            </div>


            <div class="feature-benefit-list">
                <h3 class="black-bold black mb-3">
                    <?= $this->input("ST_advantage_heading",["placeholder" => "Enter Your  Heading"]); ?></h3>
                <ul>
                    <?php 
                        foreach ($data['Features'] as $key => $item) {
                            ?>
                    <li><?= $item ?></li>
                    <?php
                        }
                    ?>
                </ul>
            </div>


            <div class="colum-2 p-0">
                <div class="feature-benefit-list my-0">
                    

                    <?php
            if(count($data['CSProductApplications']) > 0)
                {
                 ?>
            <h3 class="black-bold black mb-3">
            <?= $this->input("ST_application_heading",["placeholder" => "Enter Your Heading"]); ?>
             </h3>
            <?php
                }
            ?>
                   
                       
                    <ul>
                        <?php
                        foreach($data['CSProductApplications'] as $key => $applictaion) {
                           ?>
                        <li><?= $applictaion->getApplicationName(); ?></li>
                        <?php
                        } ?>
                    </ul>

                    <div class="nexcolumtarget">
                        <h3 class="black-bold black mb-3"><?= $this->input("ST_product_range_heading",["placeholder" => "Enter Your  Heading"]); ?>
                        </h3>
                        <ul>
                            <li><?= $this->input("ST_product_range_content",["placeholder" => "Enter Your Points"]); ?>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </section>
    </main>
</div>
<?php endif; ?>