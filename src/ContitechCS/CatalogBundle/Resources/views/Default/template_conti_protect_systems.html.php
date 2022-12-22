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
    <div class="wrapper" id="contiprotectsystem">
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
            <!-- <div class="print-pg-no"></div> -->
        </div>
    </header>                      
        <footer id="footer" class="footer" style="position: relative;">
            <div class="footer-logo">
                <img src="<?= $footer_logo_src; ?>" alt="">
            </div>
        </footer>
       
        <main id="content" role="main" class="content-layout">
            <section class="fortressxp-belts conveyor-belt conveyor-belt-layout">
                <div id="top-block">
                    <?php if($this->editmode):?>
                        <div class="attr-font">Attribute Name = Name</div>
                    <?php endif;?>
                    <h2 class="orange">                
                        <?php if($this->editmode): ?>
                                <?php if($this->input("CS_ProductName")->isEmpty()): ?>
                                        <?= $this->input("CS_ProductName",['placeholder' => 'Enter Product Name'])->setDataFromResource($data['Name']) ?>
                                <?php else: ?>
                                        <?= $this->input("CS_ProductName",['placeholder' => 'Enter Product Name']); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->input("CS_ProductName",['placeholder' => 'Enter Product Name']) ?>
                        <?php endif; ?>        
                    
                    </h2>
                    <div class="environment-quality-sec">
                        <div class="media pt-0 align-item-ends" id="conti-protect-system">
                            <div class="media-body">
                            <?php if($this->editmode):?>
                                <div class="attr-font">Attribute Name = Short Text</div>
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
                                                    <div class="attr-font">Attribute Name = Features</div>
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
                            <div id="productImageContainer">
                                <?php if($this->editmode):?>
                                    <div class="attr-font">Child Attribute Name = Product Image</div>
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
                                        if (!empty($CPS_productImageObj->getId())) { ?>
                                            <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($CPS_productImageObj, $this->imageWidth); ?>" alt=""  class="" style="">
                                        <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="bottom-block">
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
                                ?>
                                <div id="fblock"> 
                                <?php
                                $childrenData = $data['childrenData'];
                                $rendoredProduct=[];
                                $count = 0;
                                foreach ($childrenData as $cKey => $cValue) {
                                    $md5Key = md5($cValue['Name']);
                                    
                                    if($count >= 4)
                                    {
                                        
                                        break;
                                    }
                                    $rendoredProduct[] = $md5Key;
                                    $count++;
                                    ?>
                                    <p>
                                        <strong><?= $cValue['Name']; ?></strong> 
                                        <span class="orange">»</span> 
                                        <?= $cValue['ShortText']; ?>
                                    </p>
                                    <?php
                                }

                                
                                ?>
                                </div>
                                <?php

                                if(count($childrenData) > 3)
                                {
                                    ?>
                                    <div id="sblock">
                                    <?php
                                    foreach ($childrenData as $cKey => $cValue) {
                                        $md5Key = md5($cValue['Name']);
                                        if(!in_array($md5Key, $rendoredProduct))
                                        {
                                        
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
                                }
                            }
                            ?>
                        </div>

                    <?php if($this->editmode):?>
                        <div class="attr-font">Child Attribute Name = Application Image</div>
                    <?php endif;?>
                    <?php
                        if($this->editmode)
                        {
                            if($this->image("CPS_ApplicationImage")->isEmpty())
                            {
                                echo $this->image("CPS_ApplicationImage", ['height'=>400])->setImage($data['ApplicationImage']);
                            }
                            else{
                                echo $this->image("CPS_ApplicationImage", ['height'=>400]);
                            }
                        }
                        else
                        {
                            $CPS_ApplicationImageObj =  $this->image("CPS_ApplicationImage");
                            if (!empty($CPS_ApplicationImageObj->getId())) { ?>
                                <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($CPS_ApplicationImageObj, $this->imageWidth); ?>" alt="" style="">
                            <?php
                            }
                        }
                    ?>
                </div>
            </section>
        </main>
        
    </div>
<?php endif; ?>