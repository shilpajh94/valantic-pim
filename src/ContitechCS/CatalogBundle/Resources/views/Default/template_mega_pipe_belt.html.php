<?php
if (!isset($this->parentContainer)) {
$this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
}
?>
<?php if($this->editmode): ?>
        <?= $this->relation("cbs_mega_pipe_belt", [
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
                    <?= $this->input("MPB_title",["placeholder" =>"Enter Your  Title"]); ?></span>
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
                                <?= $this->input("CS_ProductName")->setDataFromResource($data['Name']) ?>
                        <?php else: ?>
                                <?= $this->input("CS_ProductName"); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("CS_ProductName") ?>
                <?php endif; ?>
                
                <span class="sub-title">

                <?php if($this->editmode): ?>
                        <?php if($this->input("MPB_ProductClaimSlogan")->isEmpty()): ?>
                                <?= $this->input("MPB_ProductClaimSlogan")->setDataFromResource($data['ProductClaimSlogan']) ?>
                        <?php else: ?>
                                <?= $this->input("MPB_ProductClaimSlogan"); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("MPB_ProductClaimSlogan") ?>
                <?php endif; ?>
                        
                </span>

                </h1>
                <div class="p-medium">
                        <?php if($this->editmode): ?>
                                <?php if($this->wysiwyg("MPB_ShortText")->isEmpty()): ?>
                                        <?= $this->wysiwyg("MPB_ShortText")->setDataFromResource($data['ShortText']) ?>
                                <?php else: ?>
                                        <?= $this->wysiwyg("MPB_ShortText"); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->wysiwyg("MPB_ShortText") ?>
                        <?php endif; ?>
                </div>

                <div class="feature-benefit-list">
                        <h3 class="orange">
                    <?= $this->input("ST_advantage_heading",["placeholder" => "Technical Information"]); ?></h3>
                <ul>
                    <?php 
                        foreach ($data['Features'] as $key => $item) {
                            ?>
                    <li><?= $item ?></li>
                    <?php
                        }
                    ?>
                
                    <h3 class="orange black-bold mb-0 mt-4"><?= $this->input("Features_heading",["placeholder" => "Features and Benefits"]); ?></h3>
                    <ul>
                        <?php
                        foreach($data['CSProductFeaturesAndBenefits'] as $key => $applictaion) {
                           ?>
                        <li><?= $applictaion->getFeatureName(); ?></li>
                        <?php
                        } ?>
                    </ul>
                

                    

                    <!-- old code -->
                        <!-- <h3 class="orange black-bold">
                               <?php if($this->editmode): ?>
                                        <?php if($this->input("MPB_FeaturesAndBenefitsLabel")->isEmpty()): ?>
                                                <?= $this->input("MPB_FeaturesAndBenefitsLabel", ['placeholder'=>'Features and Benefits']) ?>
                                        <?php else: ?>
                                                <?= $this->input("MPB_FeaturesAndBenefitsLabel"); ?>
                                        <?php endif; ?>
                                <?php else: ?>
                                        <?= $this->input("MPB_FeaturesAndBenefitsLabel") ?>
                                <?php endif; ?>
                        </h3>

                        <?php if($this->editmode): ?>
                                <?php if($this->wysiwyg("MPB_Benefits")->isEmpty()): ?>
                                        <?= $this->wysiwyg("MPB_Benefits", ['placeholder'=>'Features and Benefits'])->setDataFromResource($data['Benefits']) ?>
                                <?php else: ?>
                                        <?= $this->wysiwyg("MPB_Benefits"); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->wysiwyg("MPB_Benefits") ?>
                        <?php endif; ?> -->

                </div>
                
                <?php
                        if($this->editmode)
                        {
                                if($this->image("MPB_productImage")->isEmpty())
                                {
                                        echo $this->image("MPB_productImage")->setImage($data['ProductImage']);
                                }
                                else{
                                        echo $this->image("MPB_productImage");
                                }
                        }
                        else
                        {
                                $MPB_productImageObj =  $this->image("MPB_productImage");
                                if($MPB_productImageObj->getThumbnail('catalog_thumb'))
                                {
                                ?>
                                <img src="<?= $MPB_productImageObj->getThumbnail('catalog_thumb'); ?>" alt="" class="w-100">
                                <?php
                                }
                        }
                ?>
                
            </section>

        </main>
        
    </div>
<?php endif; ?>