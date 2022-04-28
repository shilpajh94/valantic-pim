<?php
    if (!isset($this->parentContainer)) {
        $this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
    }
?>
<?php if($this->editmode): ?>
<?= $this->relation("cbs_template_textile_belt_services_page", [
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
                    <?php
                        if($this->input("TBC_title")->isEmpty())
                            {
                                echo $this->input("TBC_title",['placeholder' => 'Enter your title'])->setDataFromResource($data['HierarchyNameLevel2']);
                            }
                            else
                            {
                                echo $this->input("TBC_title",['placeholder' => 'Enter your title']);
                            }
                        ?>
                    </span>
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
                <?php if($this->editmode):?>
                    <div class="attr-font">Attribute Name = Name</div>
                <?php endif;?>
                <h1 class="orange">
                    <?php if($this->editmode): ?>
                        <?php if($this->input("CS_ProductName")->isEmpty()): ?>
                            <?= $this->input("CS_ProductName",['placeholder' => 'Enter Product Name'])->setDataFromResource($data['Name']) ?>
                        <?php else: ?>
                            <?= $this->input("CS_ProductName",['placeholder' => 'Enter Product Name']); ?>
                        <?php endif; ?>
                        <?php else: ?>
                            <?= $this->input("CS_ProductName",['placeholder' => 'Enter Product Name']) ?>
                    <?php endif; ?></h1>
                
               <?php if($this->editmode):?>
                    <div class="attr-font">Attribute Name = Product Claim/Slogan</div>
                <?php endif;?>
                <p class="p-medium-big"><?php if($this->editmode): ?>
                    <?php if($this->textarea("TBS_ProductClaimSlogan")->isEmpty()): ?>
                        <?= $this->textarea("TBS_ProductClaimSlogan",['placeholder' => 'Enter Product Slogan'])->setDataFromResource($data['ProductClaimSlogan']) ?>
                    <?php else: ?>
                        <?= $this->textarea("TBS_ProductClaimSlogan",['placeholder' => 'Enter Product Slogan']); ?>
                    <?php endif; ?>
                    <?php else: ?>
                        <?= $this->textarea("TBS_ProductClaimSlogan",['placeholder' => 'Enter Product Slogan']) ?>
                    <?php endif; ?> </p>

                <div class="colum-2 p-0 mb-5">
                <?php if($this->editmode):?>
                    <div class="attr-font">Attribute Name = Short Text</div>
                <?php endif;?>
                    <p>
                        <?php if($this->editmode): ?>
                            <?php if($this->wysiwyg("TBS_ShortText")->isEmpty()): ?>
                                <?= $this->wysiwyg("TBS_ShortText",['placeholder' => 'Enter Short Text'])->setDataFromResource($data['ShortText']) ?>
                            <?php else: ?>
                                <?= $this->wysiwyg("TBS_ShortText",['placeholder' => 'Enter Short Text']); ?>
                            <?php endif; ?>
                            <?php else: ?>
                                <?= $this->wysiwyg("TBS_ShortText",['placeholder' => 'Enter Short Text']) ?>
                        <?php endif; ?>
                    </p>
                </div>
                
                <?php if($this->editmode):?>
                    <div class="attr-font">Enter Your  Heading</div>
                <?php endif;?>
                <h2 class="orange mb-4"><?= $this->input("TBS_Header_title",["placeholder" =>"Enter Your  Heading"]); ?></h2>
                
                <?php if($this->editmode):?>
                    <div class="attr-font">Attribute Name = Product Image</div>
                <?php endif;?>
                <?php
                    if ($this->editmode) {
                        if ($this->image("TBS_ProductImage")->isEmpty()) {
                            echo $this->image("TBS_ProductImage")->setImage($data['ProductImage']);
                        } else {
                            echo $this->image("TBS_ProductImage");
                        }
                    } else {
                        $TBSProdImgSrcObj =  $this->image("TBS_ProductImage");
                        if (!empty($TBSProdImgSrcObj->getId())) { ?>
                            <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($TBSProdImgSrcObj, $this->imageWidth); ?>"  class="mb-4" alt="" />
                        <?php
                        }
                    } ?>
                <?php if($this->editmode):?>
                    <div class="attr-font">Enter Your  Heading</div>
                <?php endif;?>
                <h2 class="orange mb-0"><?= $this->input("BNE_Header_title",["placeholder" =>"Enter Your  Heading"]); ?>
                </h2>

                <?php if($this->editmode):?>
                    <div class="attr-font">Attribute Name = Application Image</div>
                <?php endif;?>
                <?php
                    if ($this->editmode) {
                        if ($this->image("TBS_ApplicationImage")->isEmpty()) {
                            echo $this->image("TBS_ApplicationImage")->setImage($data['ApplicationImage']);
                        } else {
                            echo $this->image("TBS_ApplicationImage");
                        }
                    } else {
                        $TBSAppImgSrcObj =  $this->image("TBS_ApplicationImage");
                        if (!empty($TBSAppImgSrcObj->getId())) { ?>
                            <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($TBSAppImgSrcObj, $this->imageWidth); ?>"  class="w-100 mb-4" alt="" />
                        <?php
                        }
                    }
                ?>       
            </section>
        </main>
</div>
<?php endif; ?>