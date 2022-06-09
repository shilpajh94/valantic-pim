<?php
if (!isset($this->parentContainer)) {
$this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
}
?>
<?php if($this->editmode): ?>
        <?= $this->relation("cbs_conti_inspect_systems", [
                "types" => ["object"],
                "subtypes" => [
                "object" => ["object"]
                ],
                "classes" => ["CSCatalogTables"],
        ]);
        ?>
<?php endif; ?>
<?php if($data): ?>
    <div class="wrapper contiinspectsystem">
    <header id="header">
        <div class="header-sec">
            <div class="header-txt"><span class="first-title"><?= $this->translate('CS_header_title') ?></span>
                <span class="second-title">
                    <?php
                        if($this->input("CIS_title")->isEmpty())
                            {
                                echo $this->input("CIS_title",['placeholder' => 'Enter your title'])->setDataFromResource($data['HierarchyNameLevel2']);
                            }
                            else
                            {
                                echo $this->input("CIS_title",['placeholder' => 'Enter your title']);
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
            <section class="fortressxp-belts conveyor-belt">
                <?php if($this->editmode):?>
                    <div class="attr-font"> Attribute Name = Product Image</div>
                <?php endif;?>
                <div class="page95">
                    <?php
                        if($this->editmode) {
                            if($this->image("CIS_productImage")->isEmpty()) {
                                echo $this->image("CIS_productImage", ["height" => 335])->setImage($data['ProductImage']);
                            } else{
                                echo $this->image("CIS_productImage", ["height" => 335]);
                            }
                        } else {
                            $CIS_productImageObj =  $this->image("CIS_productImage");
                            if (!empty($CIS_productImageObj->getId())) { ?>
                                <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($CIS_productImageObj, $this->imageWidth); ?>" alt="" class="w-100" style="max-height:335px; width:auto;">
                            <?php
                            }
                        }
                    ?>
                </div>
                <div class="feature-benefit-list w-80">
                <?php if($this->editmode):?>
                    <div class="attr-font"> Attribute Name = Name</div>
                <?php endif;?>
                    <h2>
                    <?php if($this->editmode): ?>
                            <?php if($this->input("CIS_Inspect_Systems")->isEmpty()): ?>
                                    <?= $this->input("CIS_Inspect_Systems",['placeholder' => 'Enter Name'])->setDataFromResource($data['Name']) ?>
                            <?php else: ?>
                                    <?= $this->input("CIS_Inspect_Systems",['placeholder' => 'Enter Name']); ?>
                            <?php endif; ?>
                    <?php else: ?>
                            <?= $this->input("CIS_Inspect_Systems",['placeholder' => 'Enter Name']) ?>
                    <?php endif; ?>

                    </h2>

                    <?php

                    if($data['childrenData'])
                    {
                        $childrenData = $data['childrenData'];
                        foreach ($childrenData as $cKey => $cValue) {
                            $md5Key = md5($cValue['Name']);
                            ?>
                            <p>
                                <span class="orange"><strong><?= $cValue['Name']; ?></strong></span>
                                <strong>»</strong>
                                <?= $cValue['ShortText']; ?>
                            </p>
                            <?php
                        }

                    }
                    ?>

                </div>
                <div class="environment-quality-sec">
                    <div class="media pt-0">
                        <?php if($this->editmode):?>
                            <div class="attr-font"> Attribute Name = Report Image</div>
                        <?php endif;?>
                        <?php
                            if($this->editmode)
                            {
                                if($this->image("CIS_ReportImage")->isEmpty())
                                {
                                    echo $this->image("CIS_ReportImage",["height" => 105])->setImage($data['ReportImage']);
                                }
                                else{
                                    echo $this->image("CIS_ReportImage",["height" => 105]);
                                }
                            }
                            else
                            {
                                $CIS_ReportImageObj =  $this->image("CIS_ReportImage");
                                if (!empty($CIS_ReportImageObj->getId())) { ?>
                                    <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($CIS_ReportImageObj, $this->imageWidth); ?>" alt="" class="features-images ml-0" style="max-height:105px; width:auto;">
                                <?php
                                }
                            }
                        ?>

                        <div class="media-body">
                            <p class="orange mb-0"><strong>
                            
                            <?php if($this->editmode): ?>
                                    <?php if($this->input("CIS_BenefitsLabel")->isEmpty()): ?>
                                            <?= $this->input("CIS_BenefitsLabel", ['placeholder'=>'COMPREHENSIVE REPORTING']) ?>
                                    <?php else: ?>
                                            <?= $this->input("CIS_BenefitsLabel"); ?>
                                    <?php endif; ?>
                            <?php else: ?>
                                    <?= $this->input("CIS_BenefitsLabel") ?>
                            <?php endif; ?>
                            </strong>
                            </h3>
                            <p>

                            <?php if($this->editmode):?>
                                <div class="attr-font"> Attribute Name = Benefits</div>
                            <?php endif;?>
                            <?php if($this->editmode): ?>
                                    <?php if($this->input("CIS_Benefits")->isEmpty()): ?>
                                            <?= $this->input("CIS_Benefits",['placeholder' => 'Enter Benefits'])->setDataFromResource($data['Benefits'][0]) ?>
                                    <?php else: ?>
                                            <?= $this->input("CIS_Benefits",['placeholder' => 'Enter Benefits']); ?>
                                    <?php endif; ?>
                            <?php else: ?>
                                    <?= $this->input("CIS_Benefits",['placeholder' => 'Enter Benefits']) ?>
                            <?php endif; ?>
                            
                            </p>
                        </div>
                    </div>
                </div>
                
                <?php if($this->editmode):?>
                    <div class="attr-font"> Attribute Name = Application Image</div>
                <?php endif;?>
                <?php
                    if($this->editmode)
                    {
                        if($this->image("CIS_ApplicationImage")->isEmpty())
                        {
                            echo $this->image("CIS_ApplicationImage",["height" => 280])->setImage($data['ApplicationImage']);
                        }
                        else{
                            echo $this->image("CIS_ApplicationImage",["height" => 280]);
                        }
                    }
                    else
                    {
                        $CIS_ApplicationImageObj =  $this->image("CIS_ApplicationImage");
                        if (!empty($CIS_ApplicationImageObj->getId())) { ?>
                            <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($CIS_ApplicationImageObj, $this->imageWidth); ?>" alt="" style="max-height: 280px; width:auto;">
                        <?php
                        }
                    }
                ?>
            </section>
        </main>
    

    </div>
<?php endif; ?>