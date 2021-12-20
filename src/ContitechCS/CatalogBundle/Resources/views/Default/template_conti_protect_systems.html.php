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
            <div class="header-txt"><span class="first-title"><?= $this->translate('CS_header_title') ?></span>
                <span class="second-title">
                    <?php
                        if($this->input("CPS_title")->isEmpty())
                            {
                                echo $this->input("CPS_title",['placeholder' => 'Enter your title'])->setDataFromResource($data['HierarchyNameLevel2']);
                            }
                            else
                            {
                                echo $this->input("CPS_title",['placeholder' => 'Enter your title']);
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
                <div class="environment-quality-sec">
                    <div class="media pt-0 align-item-ends">
                        <div class="media-body">
                        <?php if($this->editmode):?>
                            <div class="attr-font">Attribute Name = ShortText</div>
                        <?php endif;?>
                            <p>

                            <?php if($this->editmode): ?>
                                    <?php if($this->input("CPS_ShortText")->isEmpty()): ?>
                                            <?= $this->input("CPS_ShortText",['placeholder' => 'Enter Short Text'])->setDataFromResource($data['ShortText']) ?>
                                    <?php else: ?>
                                            <?= $this->input("CPS_ShortText",['placeholder' => 'Enter Short Text']); ?>
                                    <?php endif; ?>
                            <?php else: ?>
                                    <?= $this->input("CPS_ShortText",['placeholder' => 'Enter Short Text']) ?>
                            <?php endif; ?>

                            </p>
                            
                            <?php
                                if($monitoring_system)
                                {
                                    ?>
                                        <div class="feature-benefit-list mb-0">
                                            <h3 class="f-12 conti-grey">
                                            
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
                                            <?php if($this->editmode):?>
                                                <div class="attr-font">Attribute Name = Benefits</div>
                                            <?php endif;?>
            
                                            <?php 
                                                echo "<ul>";
                                                foreach($monitoring_system as $val)
                                                {
                                                    echo "<li>".$val."</li>";
                                                }
                                                echo "</ul>";
                                            ?>
                                        </div>
                                    <?php
                                }
                            ?>
                        </div>

                        <?php if($this->editmode):?>
                            <div class="attr-font">Child Attribute Name = ProductImage</div>
                        <?php endif;?>
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
                                if(method_exists($CPS_productImageObj,'getThumbnail') && $CPS_productImageObj->getThumbnail('catalog_thumb'))
                                {
                                ?>
                                <img src="<?= $CPS_productImageObj->getThumbnail('catalog_thumb'); ?>" alt="" class="features-images mr-0">
                                <?php
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="feature-benefit-list w-80 mb-4">
                <?php if($this->editmode):?>
                    <div class="attr-font">Attribute Name = Name</div>
                <?php endif;?>
                    <h2 class="orange f-22">
                    <strong>

                        <?php if($this->editmode): ?>
                                <?php if($this->input("CPS_Protect_Systems")->isEmpty()): ?>
                                        <?= $this->input("CPS_Protect_Systems",['placeholder' => 'Enter  Name'])->setDataFromResource($data['Name']) ?>
                                <?php else: ?>
                                        <?= $this->input("CPS_Protect_Systems",['placeholder' => 'Enter  Name']); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->input("CPS_Protect_Systems",['placeholder' => 'Enter  Name']) ?>
                        <?php endif; ?>

                    </strong>
                    </h2>

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

                <?php if($this->editmode):?>
                    <div class="attr-font">Child Attribute Name = ApplicationImage</div>
                <?php endif;?>
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
                        if(method_exists($CPS_ApplicationImageObj,'getThumbnail') && $CPS_ApplicationImageObj->getThumbnail('catalog_thumb'))
                        {
                        ?>
                        <img src="<?= $CPS_ApplicationImageObj->getThumbnail('catalog_thumb'); ?>" alt="" >
                        <?php
                        }
                    }
                ?>
            </section>
        </main>
        
    </div>
<?php endif; ?>