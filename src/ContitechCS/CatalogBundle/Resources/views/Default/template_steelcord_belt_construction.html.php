<?php
    if (!isset($this->parentContainer)) {
        $this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
    }
?>
<?php if($this->editmode): ?>
<?= $this->relation("cbs_template_steelcord_belt_construction_page", [
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
    <div class="wrapper">
        <header id="header">
            <div class="header-sec">
                <div class="header-txt"><span class="first-title"><?= $this->translate('CS_header_title') ?></span>
                    <span class="second-title">
                        <?php
                            if($this->input("STBC_title")->isEmpty())
                            {
                                echo $this->input("STBC_title",['placeholder' => 'Enter your title'])->setDataFromResource($data['HierarchyNameLevel2']);
                            }
                            else
                            {
                                echo $this->input("STBC_title",['placeholder' => 'Enter your title']);
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
            <section class="fortressxp-belts steel-belt-const">
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
                    <?php endif; ?>
                </h1>
                
                <?php if($this->editmode):?>
                    <div class="attr-font">Attribute Name = Product Claim/Slogan</div>
                <?php endif;?>
                <p class="p-medium-big">
                    <?php if($this->editmode): ?>
                        <?php if($this->textarea("SCB_ProductClaimSlogan")->isEmpty()): ?>
                            <?= $this->textarea("SCB_ProductClaimSlogan",['placeholder' => 'Enter Product Slogan'])->setDataFromResource($data['ProductClaimSlogan']) ?>
                        <?php else: ?>
                            <?= $this->textarea("SCB_ProductClaimSlogan",['placeholder' => 'Enter Product Slogan']); ?>
                        <?php endif; ?>
                        <?php else: ?>
                            <?= $this->textarea("SCB_ProductClaimSlogan",['placeholder' => 'Enter Product Slogan']) ?>
                    <?php endif; ?>
                </p>
                
                <?php if($this->editmode):?>
                    <div class="attr-font">Attribute Name = Short Text</div>
                <?php endif;?> 
                <p>
                    <?php if($this->editmode): ?>
                        <?php if($this->wysiwyg("SCB_ShortText")->isEmpty()): ?>
                            <?= $this->wysiwyg("SCB_ShortText",['placeholder' => 'Enter Short Text'])->setDataFromResource($data['ShortText']) ?>
                        <?php else: ?>
                            <?= $this->wysiwyg("SCB_ShortText",['placeholder' => 'Enter Short Text']); ?>
                        <?php endif; ?>
                        <?php else: ?>
                            <?= $this->wysiwyg("SCB_ShortText",['placeholder' => 'Enter Short Text']) ?>
                    <?php endif; ?>
                </p>

                <?php if($this->editmode):?>
                    <div class="attr-font">Enter Your  SubHeading</div>
                <?php endif;?>
                <h3 class="orange fnt20 my-4">
                    <?= $this->input("SubHeading_title",["placeholder" => "Enter Your  SubHeading"]); ?></h3>

                <?php if($this->editmode):?>
                    <div class="attr-font">Attribute Name = Product Image</div>
                <?php endif;?> 
                <?php
                    if($this->editmode)
                        {
                            if($this->image("SCB_ProductImage")->isEmpty())
                            {
                                echo $this->image("SCB_ProductImage",["height" => 350])->setImage($data['ProductImage']);
                            }
                            else{
                                echo $this->image("SCB_ProductImage",["height" => 350]);
                            }
                        }
                        else
                        {
                            $SCBImgSrcObj =  $this->image("SCB_ProductImage");
                            if (!empty($SCBImgSrcObj->getId())) { ?>
                                <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($SCBImgSrcObj, $this->imageWidth); ?>" alt="" class="w-100 mb-5" style="max-height: 350px; width: auto;"/>
                            <?php
                            }
                        }
                    ?>
                <?php if($this->editmode):?>
                    <div class="attr-font">Enter Your  SubHeading</div>
                <?php endif;?>
                <h3 class="orange fnt20 mb-0">
                    <?= $this->input("SubHeading_title2",["placeholder" =>"Enter Your  SubHeading"]); ?>
                </h3>
                <hr></hr>
                <?php if($this->editmode):?>
                    <div class="attr-font">Attribute Name = Application Image</div>
                <?php endif;?>
                <?php
                if($this->editmode)
                {
                    if($this->image("SCB_ApplicationImage")->isEmpty())
                    {
                        echo $this->image("SCB_ApplicationImage",["height" => 240])->setImage($data['ApplicationImage']);
                    }        
                    else
                    {
                        echo $this->image("SCB_ApplicationImage",["height" => 240]);
                    }
                }
                else
                {
                    $SCBAppImgSrcObj =  $this->image("SCB_ApplicationImage");
                    if (!empty($SCBAppImgSrcObj->getId())) { ?>
                        <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($SCBAppImgSrcObj, $this->imageWidth); ?>" alt="" class="mb-4" style="height: 240px; width: auto;"/>
                    <?php
                    }
                }
                ?>
                
                <?php
                if(!$this->input("PPFB_title")->isEmpty())
                {
                    ?>
                    <div class="page-break"></div>
                    <?php
                }  
                ?>

                <?php if($this->editmode):?>
                    <div class="attr-font">Enter Title</div>
                <?php endif;?>
                <h2 class="orange">
                    <?= $this->input("PPFB_title",["placeholder" =>"Phoenix Phoenocord® and Flexsteel® Belts"]); ?>
                </h2>

                <?php if($this->editmode):?>
                    <div class="attr-font">Enter Slogan</div>
                <?php endif;?>
                <h2 class="">
                    <span class="sub-title"><?= $this->input("PPFB_SubHeading",["placeholder" =>"Technologically Superior Products"]); ?>
                    </span>
                </h2>

                <?php if($this->editmode):?>
                    <div class="attr-font">Enter Short Description</div>
                <?php endif;?>
                <div class="p-medium">
                    <?= $this->wysiwyg("PPFB_Content",["placeholder" =>"Description"]); ?>
                </div>

                <?php if($this->editmode):?>
                    <div class="attr-font">Enter Heading</div>
                <?php endif;?>
                <h3 class="h-padding"><?= $this->input("PPFB_Slogan",["placeholder" =>"Three Reasons Why We Outperform The Competition:"]); ?></h3>

                <?php if($this->editmode):?>
                    <div class="attr-font">Enter Sub Heading</div>
                <?php endif;?>   
                <h3 class="orange mb-0"><?= $this->input("ZGSC_title",["placeholder" =>"Zinc galvanized steel cord"]);?> </h3>

                <?php if($this->editmode):?>
                    <div class="attr-font">Enter Description</div>
                <?php endif;?>
                <div> <?= $this->wysiwyg("ZGSC_Content",["placeholder" =>"Description"]); ?> </div>

                <?php if($this->editmode):?>
                    <div class="attr-font">Enter Sub Heading</div>
                <?php endif;?>
                <h3 class="orange mb-0"><?= $this->input("ZGSC2_title",["placeholder" =>"Insulation gum (core rubber)"]);?> </h3>

                <?php if($this->editmode):?>
                    <div class="attr-font">Enter Description</div>
                <?php endif;?>
                <div><?= $this->wysiwyg("ZGSC2_Content",["placeholder" =>"Description"]); ?> </div>

                <?php if($this->editmode):?>
                    <div class="attr-font">Enter Sub Heading</div>
                <?php endif;?>
                <h3 class="orange mb-0"><?= $this->input("ORBC_title",["placeholder" =>"Outer rubber covers"]);?> </h3>

                <?php if($this->editmode):?>
                    <div class="attr-font">Enter Description</div>
                <?php endif;?>
                <div><?= $this->wysiwyg("ORBC_Content",["placeholder" =>"Description"]); ?> </div>

                <?php if($this->editmode):?>
                    <div class="attr-font">Enter Heading</div>
                <?php endif;?>
                <h3 class="h-padding"><?= $this->input("BHE_title",["placeholder" => "Built for the Harshest Environments"]);?></h3>
                
                <?php if($this->editmode):?>
                    <div class="attr-font">Enter Sub Heading</div>
                <?php endif;?>
                <h3 class="orange"><?= $this->input("PPSB_title",["placeholder" =>"Phoenix Phoenocord® – World’s Strongest Belts"]);?></h3>

                <?php if($this->editmode):?>
                    <div class="attr-font">Enter Description</div>
                <?php endif;?>
                <div><?= $this->wysiwyg("PPSB_Content",["placeholder" =>"Description"]); ?> </div>

                <?php if($this->editmode):?>
                    <div class="attr-font">Enter Sub Heading</div>
                <?php endif;?>
                <h3 class="orange"><?= $this->input("FSSMO_title",["placeholder" =>"Flexsteel® – Superior Strength for Heavy Mining Operations"]);?></h3>

                <?php if($this->editmode):?>
                    <div class="attr-font">Enter Description</div>
                <?php endif;?>
                <div> <?= $this->wysiwyg("FSSMO_Content",["placeholder" =>"Description"]); ?> </div>
            </section>
        </main>
    </div>
<?php endif; ?>