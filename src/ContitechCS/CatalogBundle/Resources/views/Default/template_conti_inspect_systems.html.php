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
                <div class="header-txt">
                <div class="header-txt"><span class="first-title"><?= $this->translate('header_title') ?></span>
                <span class="second-title">
                    <?= $this->input("CIS_title",["placeholder" =>"Enter Your  Title"]); ?></span>
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
                <div class="page95">
                <?php
                    if($this->editmode)
                    {
                        if($this->image("CIS_productImage")->isEmpty())
                        {
                            echo $this->image("CIS_productImage")->setImage($data['ProductImage']);
                        }
                        else{
                            echo $this->image("CIS_productImage");
                        }
                    }
                    else
                    {
                        $CIS_productImageObj =  $this->image("CIS_productImage");
                        if($CIS_productImageObj)
                        {
                        ?>
                        <img src="<?= $CIS_productImageObj->getThumbnail('catalog_thumb'); ?>" alt="" class="w-100">
                        <?php
                        }
                    }
                ?>
                    
                </div>
                <div class="feature-benefit-list w-80">
                    <h2>
                    <?php if($this->editmode): ?>
                            <?php if($this->input("CIS_Inspect_Systems")->isEmpty()): ?>
                                    <?= $this->input("CIS_Inspect_Systems")->setDataFromResource($data['Name']) ?>
                            <?php else: ?>
                                    <?= $this->input("CIS_Inspect_Systems"); ?>
                            <?php endif; ?>
                    <?php else: ?>
                            <?= $this->input("CIS_Inspect_Systems") ?>
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

                        <?php
                            if($this->editmode)
                            {
                                if($this->image("CIS_ReportImage")->isEmpty())
                                {
                                    echo $this->image("CIS_ReportImage")->setImage($data['ReportImage']);
                                }
                                else{
                                    echo $this->image("CIS_ReportImage");
                                }
                            }
                            else
                            {
                                $CIS_ReportImageObj =  $this->image("CIS_ReportImage");
                                if($CIS_ReportImageObj)
                                {
                                ?>
                                <img src="<?= $CIS_ReportImageObj->getThumbnail('catalog_thumb'); ?>" alt="" class="features-images ml-0">
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

                            <?php if($this->editmode): ?>
                                    <?php if($this->input("CIS_Benefits")->isEmpty()): ?>
                                            <?= $this->input("CIS_Benefits")->setDataFromResource($data['Benefits']) ?>
                                    <?php else: ?>
                                            <?= $this->input("CIS_Benefits"); ?>
                                    <?php endif; ?>
                            <?php else: ?>
                                    <?= $this->input("CIS_Benefits") ?>
                            <?php endif; ?>
                            
                            </p>
                        </div>
                    </div>
                </div>

                <?php
                    if($this->editmode)
                    {
                        if($this->image("CIS_ApplicationImage")->isEmpty())
                        {
                            echo $this->image("CIS_ApplicationImage")->setImage($data['ApplicationImage']);
                        }
                        else{
                            echo $this->image("CIS_ApplicationImage");
                        }
                    }
                    else
                    {
                        $CIS_ApplicationImageObj =  $this->image("CIS_ApplicationImage");
                        if($CIS_ApplicationImageObj)
                        {
                        ?>
                        <img src="<?= $CIS_ApplicationImageObj->getThumbnail('catalog_thumb'); ?>" alt="">
                        <?php
                        }
                    }
                ?>
            </section>
        </main>
    

    </div>
<?php endif; ?>