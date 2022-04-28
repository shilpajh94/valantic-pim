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
            "classes" => ["CSCatalogTables"],
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
                        if($this->input("ST_title")->isEmpty())
                            {
                                echo $this->input("ST_title",['placeholder' => 'Enter your title'])->setDataFromResource($data['HierarchyNameLevel2']);
                            }
                            else
                            {
                                echo $this->input("ST_title",['placeholder' => 'Enter your title']);
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
            <h1 class="orange mb-0">
                <?php if($this->editmode): ?>
                    <?php if($this->input("CS_ProductName")->isEmpty()): ?>
                        <?= $this->input("CS_ProductName",['placeholder' => 'Enter Product Name'])->setDataFromResource($data['Name']) ?>
                    <?php else: ?>
                        <?= $this->input("CS_ProductName",['placeholder' => 'Enter Product Name']); ?>
                    <?php endif; ?>
                        <?php else: ?>
                    <?= $this->input("CS_ProductName",['placeholder' => 'Enter Product Name']) ?>
                <?php endif; ?>
            </h1>

            <?php if($this->editmode):?>
                <div class="attr-font">Attribute Name = Product Claim/Slogan</div>
            <?php endif;?>
            <h2 class="d-flex sub-title black-bold" style="justify-content: space-between;">
                <?php if($this->editmode): ?>
                    <?php if($this->textarea("ST_ProductClaimSlogan")->isEmpty()): ?>
                        <?= $this->textarea("ST_ProductClaimSlogan",['placeholder' => 'Enter Product Slogan'])->setDataFromResource($data['ProductClaimSlogan']) ?>
                    <?php else: ?>
                        <?= $this->textarea("ST_ProductClaimSlogan",['placeholder' => 'Enter Product Slogan']); ?>
                    <?php endif; ?>
                        <?php else: ?>
                    <?= $this->textarea("ST_ProductClaimSlogan",['placeholder' => 'Enter Product Slogan']) ?>
                <?php endif; ?>

                <?php if($this->editmode):?>
                    <div class="attr-font">Attribute Name = Logo Image</div>
                <?php endif;?>
                <?php
                if($this->editmode)
                    {
                        if($this->image("ST_LogoImage")->isEmpty()) {
                            echo $this->image("ST_LogoImage")->setImage($data['LogoImage']);
                        } else {
                            echo $this->image("ST_LogoImage");
                        }
                    } else
                        {
                        $STLogoImgSrcObj =  $this->image("ST_LogoImage");
                        if (!empty($STLogoImgSrcObj->getId())) { ?>
                            <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($STLogoImgSrcObj, $this->imageWidth); ?>" alt="" style="margin-right: 0px; margin-bottom: 0px;" width="180" />
                        <?php
                        }
                    }
                ?>
            </h2>



            <div class="environment-quality-sec">

                <div class="media">
                    <div class="media-body pr-4">
                    <?php if($this->editmode):?>
                        <div class="attr-font">Attribute Name = Short Text</div>
                    <?php endif;?>
                        <p>
                            <?php if($this->editmode): ?>
                                <?php if($this->textarea("ST_ShortText")->isEmpty()): ?>
                                    <?= $this->textarea("ST_ShortText",['placeholder' => 'Enter Short Text'])->setDataFromResource($data['ShortText']) ?>
                                <?php else: ?>
                                    <?= $this->textarea("ST_ShortText",['placeholder' => 'Enter Short Text']); ?>
                                <?php endif; ?>
                                <?php else: ?>
                                    <?= $this->textarea("ST_ShortText",['placeholder' => 'Enter Short Text']) ?>
                            <?php endif; ?>
                        </p>


                        <?php if($this->editmode):?>
                            <div class="attr-font">Attribute Name = Product Image</div>
                        <?php endif;?>
                        <?php
                        if($this->editmode) {
                            if($this->image("ST_ProductImage")->isEmpty()) {
                                echo $this->image("ST_ProductImage")->setImage($data['ProductImage']);
                            } else {
                               echo $this->image("ST_ProductImage");
                            }
                        } else {
                            $STProdImgSrcObj =  $this->image("ST_ProductImage");
                            if (!empty($STProdImgSrcObj->getId())) { ?>
                                <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($STProdImgSrcObj, $this->imageWidth); ?>" alt="" class="w-100" />
                            <?php
                            }
                        }
                        ?>
                        </p>
                    </div>

                    <?php if($this->editmode):?>
                            <div class="attr-font">Attribute Name = ApplicationImage</div>
                        <?php endif;?>
                    <?php
                    if($this->editmode) {
                        if ($this->image("ST_ApplicationImage")->isEmpty()) {
                            echo $this->image("ST_ApplicationImage")->setImage($data['ApplicationImage']);
                        } else {
                            echo $this->image("ST_ApplicationImage");
                        }
                    } else {
                        $STAppImgSrcObj =  $this->image("ST_ApplicationImage");
                        if (!empty($STAppImgSrcObj->getId())) { ?>
                            <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($STAppImgSrcObj, $this->imageWidth); ?>" alt="" style="max-width:180px"  />
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
            
            <?php
                if(isset($data['Features']) && $data['Features'])
                {
                    ?>
                        <div class="feature-benefit-list">
                            <h3 class="black-bold black mb-3">
                            <?php if($this->editmode):?>
                                <div class="attr-font">Enter Your  Heading</div>
                            <?php endif;?>
                                <?= $this->input("ST_advantage_heading",["placeholder" => "Enter Your  Heading"]); ?></h3>
                            <ul>
                            <?php if($this->editmode):?>
                                <div class="attr-font">Attribute Name = Features</div>
                            <?php endif;?>
                                <?php 
                                    foreach ($data['Features'] as $key => $item) {
                                        ?>
                                <li><?= $item ?></li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    <?php
                }
            ?>

            <div class="row">
                    <div class="col-6">
                        <div class="feature-benefit-list my-0">
                            <?php
                                if(count($data['CSProductApplications']) > 0)
                                {
                                    ?>
                                        <?php if($this->editmode):?>
                                            <div class="attr-font">Enter Your  Heading</div>
                                        <?php endif;?>
                                        <h3 class="black-bold black mb-3">
                                            <?= $this->input("ST_application_heading",["placeholder" => "Enter Your Heading"]); ?>
                                        </h3>

                                        <ul>
                                        <?php if($this->editmode):?>
                                            <div class="attr-font">Attribute Name = Application</div>
                                        <?php endif;?>
                                            <?php
                                                foreach($data['CSProductApplications'] as $key => $applictaion)
                                                {
                                                    ?>
                                                    <li>
                                                        <?php 
                                                            echo $applictaion->getApplicationName();
                                                        ?>
                                                    </li>
                                                    <?php
                                                }
                                            ?>
                                        </ul>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="feature-benefit-list my-0">
                                <?php if($this->editmode):?>
                                    <div class="attr-font">Enter Your  Heading</div>
                                <?php endif;?>
                                <h3 class="black-bold black mb-3">
                                    <?= $this->input("ST_product_range_heading",["placeholder" => "Enter Your  Heading"]); ?>
                                </h3>
                                <ul>
                                    <?php if($this->editmode):?>
                                        <div class="attr-font">Enter Your Points</div>
                                    <?php endif;?>
                                    <li>
                                        <?= $this->input("ST_product_range_content",["placeholder" => "Enter Your Points"]); ?>
                                    </li>
                                </ul>
                        </div>
                    </div>
            </div>
        </section>
    </main>
</div>
<?php endif; ?>