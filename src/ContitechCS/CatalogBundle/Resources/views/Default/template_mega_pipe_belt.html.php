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
                <div class="header-txt">
                
                <b>
                <?php if($this->editmode): ?>
                        <?php if($this->input("MPB_HierarchyNameLevel1")->isEmpty()): ?>
                                <?= $this->input("MPB_HierarchyNameLevel1")->setDataFromResource($data['HierarchyNameLevel1']) ?>
                        <?php else: ?>
                                <?= $this->input("MPB_HierarchyNameLevel1"); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("MPB_HierarchyNameLevel1") ?>
                <?php endif; ?>
                </b>
        
                </div>
                <div class="print-pg-no"></div>
            </div>
        </header>

        <main id="content" role="main">
            <section class="fortressxp-belts">
                <h1 class="orange">
                        
                <?php if($this->editmode): ?>
                        <?php if($this->input("MPB_productName")->isEmpty()): ?>
                                <?= $this->input("MPB_productName")->setDataFromResource($data['Name']) ?>
                        <?php else: ?>
                                <?= $this->input("MPB_productName"); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("MPB_productName") ?>
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
                <p class="p-medium">
                        
                        <?php if($this->editmode): ?>
                                <?php if($this->wysiwyg("MPB_ShortText")->isEmpty()): ?>
                                        <?= $this->wysiwyg("MPB_ShortText")->setDataFromResource($data['ShortText']) ?>
                                <?php else: ?>
                                        <?= $this->wysiwyg("MPB_ShortText"); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->wysiwyg("MPB_ShortText") ?>
                        <?php endif; ?>

                </p>

                <div class="feature-benefit-list">
                    <!-- <h3 class="orange">Technical Information</h3>
                    <ul>
                        <li><span class="orange">›</span> Conveyance over mine slopes with inclinations ≤ 34° </li>
                        <li><span class="orange">›</span> Mine depths of up to 700 m and mass flows of 5000 t/h and even
                            more! </li>
                        <li><span class="orange">›</span> Nominal belt breaking strength of up to 9500 N/mm</li>
                        <li><span class="orange">›</span> Outer pipe diameter of up to 900 mm (belt width 3200 mm)
                        </li>
                        <li><span class="orange">›</span> Primary crushed material with lump sizes up to 350 mm</li>
                        <li><span class="orange">›</span> Conveyor belts with steelcord and fabric carcasses</li>
                        <li><span class="orange">›</span> Cost and Energy Efficient Siemens DirectDrives® </li>
                    </ul> -->
                        <h3 class="orange">
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
                        <?php endif; ?>

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
        <footer id="footer1">
            <div class="footer-logo"><img src="/static/cbs/images/continental_logo.png" alt="" /></div>
        </footer>
    </div>
<?php endif; ?>