<?php
if (!isset($this->parentContainer)) {
$this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
}
?>
<?php if($this->editmode): ?>
<?= $this->relation("cbs_template_belt_services_page", [
            "types" => ["object"],
            "subtypes" => [
            "object" => ["object"]
            ],
            "classes" => ["CSCatalogCategory"],
    ]);
    ?>
<?php endif; ?>
<?php if($data): ?>
<div class="wrapper conveyor-system">
    <header id="header">
        <div class="header-sec">
            <div class="header-txt"><span class="first-title"><?= $this->translate('CS_header_title') ?></span>
                <span class="second-title">
                    <?php
                        if($this->input("CCS_title")->isEmpty())
                            {
                                echo $this->input("CCS_title",['placeholder' => 'Enter your title'])->setDataFromResource($data['HierarchyNameLevel2']);
                            }
                            else
                            {
                                echo $this->input("CCS_title",['placeholder' => 'Enter your title']);
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
                <label>Attribute Name = Name</label><br></br>
            <?php endif;?>
            <h1 class="orange">
                <span class="ccss-title">
                <?php if($this->editmode): ?>
                    <?php if($this->input("CCS_Name")->isEmpty()): ?>
                        <?= $this->input("CCS_Name",['placeholder' => 'Enter Product Name'])->setDataFromResource($data['Name']) ?>
                    <?php else: ?>
                        <?= $this->input("CCS_Name",['placeholder' => 'Enter Product Name']); ?>
                    <?php endif; ?>
                    <?php else: ?>
                        <?= $this->input("CCS_Name",['placeholder' => 'Enter Product Name']) ?>
                    <?php endif; ?>
                </span>
                
                <span class="sub-title">
                <?php if($this->editmode):?>
                   <div class="attr-font"><label>Attribute Name = ProductClaimSlogan</label><br></br></div>
                <?php endif;?>
                    <?php if($this->editmode): ?>
                        <?php if($this->input("CCS_ProductClaimSlogan")->isEmpty()): ?>
                            <?= $this->input("CCS_ProductClaimSlogan",['placeholder' => 'Enter Product Slogan'])->setDataFromResource($data['ProductClaimSlogan']) ?>
                        <?php else: ?>
                            <?= $this->input("CCS_ProductClaimSlogan",['placeholder' => 'Enter Product Slogan']); ?>
                        <?php endif; ?>
                        <?php else: ?>
                            <?= $this->input("CCS_ProductClaimSlogan",['placeholder' => 'Enter Product Slogan']) ?>
                    <?php endif; ?>

                </span>

            </h1>

            <div class="p-medium">
                <?php if($this->editmode):?>
                    <label>Attribute Name = ShortText</label>
                <?php endif;?>
                <p>
                    <?php if($this->editmode): ?>
                        <?php if($this->textarea("CSS_ShortText")->isEmpty()): ?>
                            <?= $this->textarea("CSS_ShortText",['placeholder' => 'Enter Short Text'])->setDataFromResource($data['ShortText']) ?>
                        <?php else: ?>
                            <?= $this->textarea("CSS_ShortText",['placeholder' => 'Enter Short Text']); ?>
                        <?php endif; ?>
                        <?php else: ?>
                            <?= $this->textarea("CSS_ShortText",['placeholder' => 'Enter Short Text']) ?>
                    <?php endif; ?>
                </p>
            </div>

            <div class="features-benefit-sec ccs-service">
                <?php if($data['childrenData']) {
                    foreach ($data['childrenData'] as $key => $child) {
                    ?>
                    <?php if($this->editmode):?>
                    <label>Child Attribute Name = ProductImage</label>
                    <?php endif;?>
                <div class="media">
                    <?php
                               
                        if(method_exists($child['ProductImage'],'getThumbnail') && $child['ProductImage']->getThumbnail('catalog_thumb'))
                        {   
                            ?>
                                <img src="<?= $child['ProductImage']->getThumbnail('catalog_thumb'); ?>" alt="" width="150" class="features-images">
                            <?Php
                        }
                        else
                        {   
                            ?>
                                <img src="<?= $default_image; ?>" alt="" width="150" class="features-images">
                            <?Php
                            
                        }
                                
                    ?>

                    <div class="media-body">
                    <?php if($this->editmode):?>
                        <label>Child Attribute Name = Name</label><br></br>
                    <?php endif;?>
                        <h2 class="orange">
                            <?php if($this->editmode): ?>
                            <?php if($this->input("CSS_Name_{$key}")->isEmpty()): ?>
                            <?= $this->input("CSS_Name_{$key}",['placeholder' => 'Enter Child Name'])->setDataFromResource($child['Name']) ?>
                            <?php else: ?>
                            <?= $this->input("CSS_Name_{$key}",['placeholder' => 'Enter Child Name']); ?>
                            <?php endif; ?>
                            <?php else: ?>
                            <?= $this->input("CSS_Name_{$key}",['placeholder' => 'Enter Child Name']) ?>
                            <?php endif; ?>
                        </h2>

                        <?php if($this->editmode):?>
                        <label>Child Attribute Name = LongText</label>
                        <?php endif;?>
                        <p>
                            <?php if($this->editmode): ?>
                            <?php if($this->input("CSS_LongText_{$key}")->isEmpty()): ?>
                            <?= $this->input("CSS_LongText_{$key}",['placeholder' => 'Enter Long Text'])->setDataFromResource($child['LongText']) ?>
                            <?php else: ?>
                            <?= $this->input("CSS_LongText_{$key}",['placeholder' => 'Enter Long Text']); ?>
                            <?php endif; ?>
                            <?php else: ?>
                            <?= $this->input("CSS_LongText_{$key}",['placeholder' => 'Enter Long Text']) ?>
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
                <?php
                    }
                } ?>


            </div>

        </section>
    </main>
</div>
<?php endif; ?>