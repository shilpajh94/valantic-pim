<?php
if (!isset($this->parentContainer)) {
$this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
}
?>
<?php if($this->editmode): ?>
        <?= $this->relation("cbs_conti_protect_systems", [
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
                
                <strong>

                <?php if($this->editmode): ?>
                        <?php if($this->input("CPS_HierarchyNameLevel1")->isEmpty()): ?>
                                <?= $this->input("CPS_HierarchyNameLevel1")->setDataFromResource($data['HierarchyNameLevel1']) ?>
                        <?php else: ?>
                                <?= $this->input("CPS_HierarchyNameLevel1"); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("CPS_HierarchyNameLevel1") ?>
                <?php endif; ?> 
                
                <strong>
                </div>
                <div class="print-pg-no"></div>
            </div>
        </header>
        <footer id="footer" class="footer">
            <div class="footer-logo">
            <img src="<?= $footer_logo_src; ?>" alt="" width="150">
            </div>
        </footer>
        <footer id="footer1" class="footer">
        <div class="footer-logo">
            <img src="<?= $footer_logo_src; ?>" alt="" width="150">
            </div>
        </footer>
        <main id="content" role="main">
            <section class="fortressxp-belts conveyor-belt">
                <h1 class="orange">
                
                    <?php if($this->editmode): ?>
                            <?php if($this->input("CPS_Conveyor_Belt_Diagnostic_Technologies")->isEmpty()): ?>
                                    <?= $this->input("CPS_Conveyor_Belt_Diagnostic_Technologies")->setDataFromResource($data['Name']) ?>
                            <?php else: ?>
                                    <?= $this->input("CPS_Conveyor_Belt_Diagnostic_Technologies"); ?>
                            <?php endif; ?>
                    <?php else: ?>
                            <?= $this->input("CPS_Conveyor_Belt_Diagnostic_Technologies") ?>
                    <?php endif; ?>        
                
                </h1>
                <div class="environment-quality-sec">
                    <div class="media pt-0 align-item-ends">
                        <div class="media-body">
                            <p class="f-12">

                            <?php if($this->editmode): ?>
                                    <?php if($this->input("CPS_ShortText")->isEmpty()): ?>
                                            <?= $this->input("CPS_ShortText")->setDataFromResource($data['ShortText']) ?>
                                    <?php else: ?>
                                            <?= $this->input("CPS_ShortText"); ?>
                                    <?php endif; ?>
                            <?php else: ?>
                                    <?= $this->input("CPS_ShortText") ?>
                            <?php endif; ?>

                            </p>

                            <div class="feature-benefit-list">
                                <h3 class="f-12">
                                
                                <?php if($this->editmode): ?>
                                        <?php if($this->input("CPS_BenefitLabel")->isEmpty()): ?>
                                                <?= $this->input("CPS_BenefitLabel", ['placeholder'=>'THE RIGHT MONITORING SYSTEM FOR EVERY CONVEYOR SYSTEM.']) ?>
                                        <?php else: ?>
                                                <?= $this->input("CPS_BenefitLabel"); ?>
                                        <?php endif; ?>
                                <?php else: ?>
                                        <?= $this->input("CPS_BenefitLabel") ?>
                                <?php endif; ?>
                                
                                </h3>

                                <?php 
                                    if($monitoring_system)
                                    {   
                                        echo "<ul>";
                                        foreach($monitoring_system as $val)
                                        {
                                            echo "<li>".$val."</li>";
                                        }
                                        echo "</ul>";
                                    }
                                /**if($this->editmode): ?>
                                        <?php if($this->input("CPS_Benefits")->isEmpty()): ?>
                                                <?= $this->input("CPS_Benefits")->setDataFromResource($data['Benefits']) ?>
                                        <?php else: ?>
                                                <?= $this->input("CPS_Benefits"); ?>
                                        <?php endif; ?>
                                <?php else: ?>
                                        <?= $this->input("CPS_Benefits") ?>
                                <?php endif; */?>
                            </div>
                        </div>

                        <?php
                            if($this->editmode)
                            {
                                if($this->image("CPS_productImage")->isEmpty())
                                {
                                    echo $this->image("CPS_productImage")->setImage($data['ProductImage']);
                                }
                                else{
                                    echo $this->image("CPS_productImage");
                                }
                            }
                            else
                            {
                                $CPS_productImageObj =  $this->image("CPS_productImage");
                                if($CPS_productImageObj->getThumbnail('catalog_thumb'))
                                {
                                ?>
                                <img src="<?= $CPS_productImageObj->getThumbnail('catalog_thumb'); ?>" alt="" width="280">
                                <?php
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="feature-benefit-list w-80">
                    <h3 class="orange">
                    <strong>

                        <?php if($this->editmode): ?>
                                <?php if($this->input("CPS_Protect_Systems")->isEmpty()): ?>
                                        <?= $this->input("CPS_Protect_Systems")->setDataFromResource($data['Name']) ?>
                                <?php else: ?>
                                        <?= $this->input("CPS_Protect_Systems"); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->input("CPS_Protect_Systems") ?>
                        <?php endif; ?>

                    </strong>
                    </h3>

                    <?php

                    if($data['childrenData'])
                    {
                        $childrenData = $data['childrenData'];
                        foreach ($childrenData as $cKey => $cValue) {
                            $md5Key = md5($cValue['Name']);
                            ?>
                            <p>
                                <strong><?= $cValue['Name']; ?></strong> 
                                <span class="orange">»</span> 
                                <?= $cValue['ShortText']; ?>
                            </p>
                            <?php
                        }

                    }
                    ?>
                </div>

                <?php
                    if($this->editmode)
                    {
                        if($this->image("CPS_ApplicationImage")->isEmpty())
                        {
                            echo $this->image("CPS_ApplicationImage")->setImage($data['ApplicationImage']);
                        }
                        else{
                            echo $this->image("CPS_ApplicationImage");
                        }
                    }
                    else
                    {
                        $CPS_ApplicationImageObj =  $this->image("CPS_ApplicationImage");
                        if($CPS_ApplicationImageObj->getThumbnail('catalog_thumb'))
                        {
                        ?>
                        <img src="<?= $CPS_ApplicationImageObj->getThumbnail('catalog_thumb'); ?>" alt="" class="w-100">
                        <?php
                        }
                    }
                ?>
            </section>
        </main>
        
    </div>
<?php endif; ?>