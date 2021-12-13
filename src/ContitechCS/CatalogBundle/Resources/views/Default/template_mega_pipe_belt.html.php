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
                    <?php
                        if($this->input("MPB_title")->isEmpty())
                            {
                                echo $this->input("MPB_title",['placeholder' => 'Enter your title'])->setDataFromResource($data['HierarchyNameLevel2']);
                            }
                            else
                            {
                                echo $this->input("MPB_title",['placeholder' => 'Enter your title']);
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
                <h1 class="orange">
                        
                <?php if($this->editmode): ?>
                        <?php if($this->input("CS_ProductName")->isEmpty()): ?>
                                <?= $this->input("CS_ProductName",['placeholder' => 'Enter Product Name'])->setDataFromResource($data['Name']) ?>
                        <?php else: ?>
                                <?= $this->input("CS_ProductName"),['placeholder' => 'Enter Product Name']; ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("CS_ProductName",['placeholder' => 'Enter Product Name']) ?>
                <?php endif; ?>
                
                <span class="sub-title">

                <?php if($this->editmode): ?>
                        <?php if($this->input("MPB_ProductClaimSlogan")->isEmpty()): ?>
                                <?= $this->input("MPB_ProductClaimSlogan",['placeholder' => 'Enter Product Slogan'])->setDataFromResource($data['ProductClaimSlogan']) ?>
                        <?php else: ?>
                                <?= $this->input("MPB_ProductClaimSlogan",['placeholder' => 'Enter Product Slogan']); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("MPB_ProductClaimSlogan",['placeholder' => 'Enter Product Slogan']) ?>
                <?php endif; ?>
                        
                </span>

                </h1>
                <div class="p-medium">
                        <?php if($this->editmode): ?>
                                <?php if($this->wysiwyg("MPB_ShortText")->isEmpty()): ?>
                                        <?= $this->wysiwyg("MPB_ShortText",['placeholder' => 'Enter Short Text'])->setDataFromResource($data['ShortText']) ?>
                                <?php else: ?>
                                        <?= $this->wysiwyg("MPB_ShortText",['placeholder' => 'Enter Short Text']); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->wysiwyg("MPB_ShortText",['placeholder' => 'Enter Short Text']) ?>
                        <?php endif; ?>
                </div>
                
                <div class="feature-benefit-list">
                        <?php
                        if(isset($data['Features']) && $data['Features'])
                        {
                                ?>

                                <h3 class="orange">
                                        <?= $this->input("ST_advantage_heading",["placeholder" => "Technical Information"]); ?>
                                </h3>
                                <ul>
                                        <?php 
                                                foreach ($data['Features'] as $key => $item)
                                                {
                                                        ?>
                                                                <li><?= $item ?></li>
                                                        <?php
                                                }
                                        ?>
                                </ul>
                                <?php
                        }
                        ?>
                     
                    <?php
                        if(isset($data['CSProductFeaturesAndBenefits']) && $data['CSProductFeaturesAndBenefits'])
                        {
                           ?>

                                <h3 class="orange black-bold mb-0 mt-4"><?= $this->input("Features_heading",["placeholder" => "Features and Benefits"]); ?></h3>
                                <ul>
                                        <?php
                                                foreach($data['CSProductFeaturesAndBenefits'] as $key => $applictaion)
                                                {
                                                        ?>
                                                        <li><?= $applictaion->getFeatureName(); ?></li>
                                                        <?php
                                                } 
                                        ?>
                                </ul>
                           <?php
                        }
                    ?>
                     
                

                    

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