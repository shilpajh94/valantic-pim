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
    
    
    <footer id="footer" class="footer">
        <div class="footer-logo">
            <img src="<?= $footer_logo_src; ?>" alt="" width="150">
        </div>
    </footer>

        <main id="content" role="main">
            <div class="fortressxp-belts conveyor-belt">
                <?php if($this->editmode):?>
                    <div class="attr-font"> Attribute Name = Product Image</div>
                <?php endif;?>
                <div class="page95" id="contiInspectSystemBanner">
                    <?php
                        if($this->editmode) {
                            if($this->image("CIS_productImage")->isEmpty()) {
                                echo $this->image("CIS_productImage", ["height" => 340])->setImage($data['ProductImage']);
                            } else{
                                echo $this->image("CIS_productImage", ["height" => 340]);
                            }
                        } else {
                            $CIS_productImageObj =  $this->image("CIS_productImage");
                            if (!empty($CIS_productImageObj->getId())) { ?>
                                <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($CIS_productImageObj, $this->imageWidth); ?>" alt="" style="height:340px; width:auto;">
                            <?php
                            }
                        }
                    ?>
                </div>
                <div class="feature-benefit-list" id="contiInspectSystemProducts">
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
                <div class="environment-quality-sec" id="contiInspectSystemReport">
                    <div class="media pt-0" id="contiInspectSystemReportImage">
                        
                        <div id="instpectReport1">
                            <?php if($this->editmode):?>
                                <div class="attr-font"> Attribute Name = ReportImage</div>
                            <?php endif;?>
                            <?php
                                if($this->editmode)
                                {
                                    if($this->image("CIS_ReportImage1")->isEmpty())
                                    {
                                        echo $this->image("CIS_ReportImage1",["height" => 90])->setImage($data['ReportImage']);
                                    }
                                    else{
                                        echo $this->image("CIS_ReportImage1",["height" => 90]);
                                    }
                                }
                                else
                                {
                                    $CIS_ReportImageObj1 =  $this->image("CIS_ReportImage1");
                                    if (!empty($CIS_ReportImageObj1->getId())) { ?>
                                        <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($CIS_ReportImageObj1, $this->imageWidth); ?>" alt="" style="height:90px;">
                                    <?php
                                    }
                                }
                            ?>
                        </div>

                        <div id="instpectReport2">
                            <?php if($this->editmode):?>
                                <div class="attr-font"> Attribute Name = DamageImage</div>
                            <?php endif;?>
                            <?php
                                if($this->editmode)
                                {
                                    if($this->image("CIS_ReportImage2")->isEmpty())
                                    {
                                        echo $this->image("CIS_ReportImage2",["height" => 90])->setImage($data['DamageImage']);
                                    }
                                    else{
                                        echo $this->image("CIS_ReportImage2",["height" => 90]);
                                    }
                                }
                                else
                                {
                                    $CIS_ReportImageObj2 =  $this->image("CIS_ReportImage2");
                                    if (!empty($CIS_ReportImageObj2->getId())) { ?>
                                        <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($CIS_ReportImageObj2, $this->imageWidth); ?>" alt="" style="height: 90px;">
                                    <?php
                                    }
                                }
                            ?>
                        </div>

                        <div class="media-body mt-4 mr50 ml20">
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
                            <div id="reportParagraph">
                                <p>

                                <?php if($this->editmode):?>
                                    <div class="attr-font"> Attribute Name = Features</div>
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
                </div>
                <div id="contiInspectSystemApplicationImage">
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
                                <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($CIS_ApplicationImageObj, $this->imageWidth); ?>" alt="" style="max-height: 265px; width:auto;">
                            <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </main>
    

    </div>
<?php endif; ?>