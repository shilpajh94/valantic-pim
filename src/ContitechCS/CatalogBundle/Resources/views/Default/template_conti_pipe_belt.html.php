<?php
if (!isset($this->parentContainer)) {
$this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
}
?>
<?php if($this->editmode): ?>
        <?= $this->relation("cbs_conti_pipe_belt", [
                "types" => ["object"],
                "subtypes" => [
                "object" => ["object"]
                ],
                "classes" => ["CSCatalogTables"],
        ]);
        ?>
<?php endif; ?>
<?php if($data): ?>
    <?php 

    $parentProductData = $data['parentProductData'];
    $childProductData = $data['childProductData'];
    ?>
    <div class="wrapper">
    <header id="header">
        <div class="header-sec">
            <div class="header-txt"><span class="first-title"><?= $this->translate('CS_header_title') ?></span>
                <span class="second-title">
                    <?php
                        if($this->input("CPB_title")->isEmpty())
                            {
                                echo $this->input("CPB_title",['placeholder' => 'Enter your title'])->setDataFromResource($parentProductData['HierarchyNameLevel2']);
                            }
                            else
                            {
                                echo $this->input("CPB_title",['placeholder' => 'Enter your title']);
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
                    <div class="attr-font">Attribute Name = Name</div>
                <?php endif;?>
                <h1 class="orange">
                    
                    <?php if($this->editmode): ?>
                            <?php if($this->input("CS_ProductName")->isEmpty()): ?>
                                    <?= $this->input("CS_ProductName",['placeholder' => 'Enter Product Name'])->setDataFromResource($parentProductData['Name']) ?>
                            <?php else: ?>
                                    <?= $this->input("CS_ProductName",['placeholder' => 'Enter Product Name']); ?>
                            <?php endif; ?>
                    <?php else: ?>
                            <?= $this->input("CS_ProductName",['placeholder' => 'Enter Product Name']) ?>
                    <?php endif; ?>
                
                    <span class="sub-title">
                    <?php if($this->editmode):?>
                        <div class="attr-font">Attribute Name = Product Claim/Slogan</div>
                    <?php endif;?>
                        <?php if($this->editmode): ?>
                                <?php if($this->input("CPBParent_ProductClaimSlogan")->isEmpty()): ?>
                                        <?= $this->input("CPBParent_ProductClaimSlogan",['placeholder' => 'Enter Product Slogan'])->setDataFromResource($parentProductData['ProductClaimSlogan']) ?>
                                <?php else: ?>
                                        <?= $this->input("CPBParent_ProductClaimSlogan",['placeholder' => 'Enter Product Slogan']); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->input("CPBParent_ProductClaimSlogan",['placeholder' => 'Enter Product Slogan']) ?>
                        <?php endif; ?>
                    
                    </span>
                </h1>
                
                <div class="feature-benefit-list">
                <?php if($this->editmode):?>
                    <div class="attr-font">Attribute Name = Short Text</div>
                <?php endif;?>
                    <?php if($this->editmode): ?>
                            <?php if($this->wysiwyg("CPBParent_ShortText")->isEmpty()): ?>
                                    <?= $this->wysiwyg("CPBParent_ShortText",['placeholder' => 'Enter Short Text'])->setDataFromResource($parentProductData['ShortText']) ?>
                            <?php else: ?>
                                    <?= $this->wysiwyg("CPBParent_ShortText",['placeholder' => 'Enter Short Text']); ?>
                            <?php endif; ?>
                    <?php else: ?>
                            <?= $this->wysiwyg("CPBParent_ShortText",['placeholder' => 'Enter Short Text']) ?>
                    <?php endif; ?>
                </div>

                <?php if($parentProductData['Applications']): ?>
                <div class="table">
                    <table width="100%">
                        <thead>
                            <tr>
                                <th class="orange" colspan="3"><?= $this->translate('CS_Typical_Applications_Label') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr valign="top">

                                <?php 
                                $applications = $parentProductData['Applications'];

                                $chunk_app = array_chunk($applications,5);

                                foreach($chunk_app as $arr)
                                {
                                    ?>
                                        <td>
                                            <ul>
                                                <?php
                                                  foreach($arr as $val)
                                                  {
                                                    ?>
                                                        <li>
                                                            <span class="orange">›</span>
                                                            <?= $val;?>
                                                        <li>
                                                    <?php
                                                  }  
                                                ?>
                                            </ul>
                                        </td>   
                                    <?php
                                }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>


                <h3 class="orange">
                    <?php if($this->editmode): ?>
                            <?php if($this->input("CPBParentConveyor_Belt_Components_Label")->isEmpty()): ?>
                                    <?= $this->input("CPBParentConveyor_Belt_Components_Label",['placeholder'=>'Conveyor Belt Components']) ?>
                            <?php else: ?>
                                    <?= $this->input("CPBParentConveyor_Belt_Components_Label"); ?>
                            <?php endif; ?>
                    <?php else: ?>
                            <?= $this->input("CPBParentConveyor_Belt_Components_Label") ?>
                    <?php endif; ?>
                    
                </h3>
                
                <?php if($this->editmode):?>
                    <div class="attr-font">Attribute Name = Product Image</div>
                <?php endif;?>
                <?php
                    if($this->editmode)
                    {
                        if($this->image("CPBParent_ProductImage")->isEmpty())
                        {
                            echo $this->image("CPBParent_ProductImage", ['height'=>385])->setImage($parentProductData['ProductImage']);
                        }
                        else{
                            echo $this->image("CPBParent_ProductImage", ['height'=>385]);
                        }
                    }
                    else
                    {
                        $CPBParent_ProductImageObj =  $this->image("CPBParent_ProductImage");
                        if (!empty($CPBParent_ProductImageObj->getId())) { ?>
                            <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($CPBParent_ProductImageObj, $this->imageWidth); ?>" alt="" class="mb-4" style="max-height:385px; width:auto;" >
                        <?php
                        }
                    }
                ?>
                <div class="page-break"></div>
                <?php if($this->editmode):?>
                    <div class="attr-font">Child Attribute Name = Name</div>
                <?php endif;?>
                <h2>
                    <span class="orange">
                        <?php if($this->editmode): ?>
                                <?php if($this->input("CPBChild_ProductNameBeltInfo")->isEmpty()): ?>
                                        <?= $this->input("CPBChild_ProductNameBeltInfo")->setDataFromResource($childProductData['Name']) ?>
                                <?php else: ?>
                                        <?= $this->input("CPBChild_ProductNameBeltInfo"); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->input("CPBChild_ProductNameBeltInfo") ?>
                        <?php endif; ?>
                    </span> 
                    <span class="light-black">
                    <?php if($this->editmode): ?>
                            <?php if($this->input("CPBChild_BeltInfoLabel")->isEmpty()): ?>
                                    <?= $this->input("CPBChild_BeltInfoLabel",['placeholder'=>'Belt Information']) ?>
                            <?php else: ?>
                                    <?= $this->input("CPBChild_BeltInfoLabel"); ?>
                            <?php endif; ?>
                    <?php else: ?>
                            <?= $this->input("CPBChild_BeltInfoLabel") ?>
                    <?php endif; ?>
                </span>
                </h2>
                <div class="feature-benefit-list">
                <?php if($this->editmode):?>
                    <div class="attr-font">Child Attribute Name = Product Claim/Slogan</div>
                <?php endif;?>	
                <h3 class="orange mb-0">
                    <?php if($this->editmode): ?>
                            <?php if($this->input("CPBChild_ProductClaimSlogan")->isEmpty()): ?>
                                    <?= $this->input("CPBChild_ProductClaimSlogan",['placeholder' => 'Enter Product Slogan'])->setDataFromResource($childProductData['ProductClaimSlogan']) ?>
                            <?php else: ?>
                                    <?= $this->input("CPBChild_ProductClaimSlogan",['placeholder' => 'Enter Product Slogan']); ?>
                            <?php endif; ?>
                    <?php else: ?>
                            <?= $this->input("CPBChild_ProductClaimSlogan",['placeholder' => 'Enter Product Slogan']) ?>
                    <?php endif; ?>
                </h3>
                
                    <?php if($this->editmode):?>
                        <div class="attr-font">Child Attribute Name = Short Text</div>
                    <?php endif;?>
                    <?php if($this->editmode): ?>
                            <?php if($this->wysiwyg("CPBChild_ShortText")->isEmpty()): ?>
                                    <?= $this->wysiwyg("CPBChild_ShortText")->setDataFromResource($childProductData['ShortText']) ?>
                            <?php else: ?>
                                    <?= $this->wysiwyg("CPBChild_ShortText"); ?>
                            <?php endif; ?>
                    <?php else: ?>
                            <?= $this->wysiwyg("CPBChild_ShortText") ?>
                    <?php endif; ?> 
                </div>

                <div class="feature-benefit-list black-bold">

                <?php
                    if(isset($childProductData['Benefits']) && $childProductData['Benefits'])
                    {
                        ?>
                            <div class="feature-benefit-list">
                                <ul>
                                    <?php 
                                        foreach ($childProductData['Benefits'] as $key => $item) {
                                            ?>
                                    <li><?= $item ?></li>
                                    <?php
                                        }
                                    ?>
                                </ul>
                            </div>
                        <?php
                    }
                ?>

                
                <?php if($this->editmode):?>
                    <div class="attr-font">Child Attribute Name = Product Image</div>
                <?php endif;?>
                <?php
                    if($this->editmode)
                    {
                        if($this->image("CPBChild_ProductImage")->isEmpty())
                        {
                            echo $this->image("CPBChild_ProductImage", ['height'=>195])->setImage($childProductData['ProductImage']);
                        }
                        else{
                            echo $this->image("CPBChild_ProductImage", ['height'=>195]);
                        }
                    }
                    else
                    {
                        $CPBChild_ProductImageObj =  $this->image("CPBChild_ProductImage");
                        if (!empty($CPBChild_ProductImageObj->getId())) { ?>
                            <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($CPBChild_ProductImageObj, $this->imageWidth); ?>" alt="" style="max-height:195px; width:auto;" >
                        <?php
                        }
                    }
                ?>

                <?php

                if(isset($childProductData['productSpecificData']) && $childProductData['productSpecificData'])
                {
                ?>
                    <div class="belts-information black">
                        <h3><?= $this->input("CPBContiPipe_MegaPipe",['placeholder'=>'Enter Heading']); ?></h3>
                        <div class="table-data contipipe-table w-80">
                            <table width="100%">
                                <thead>
                                    <tr align="left" class="orange-bg">
                                        <th colspan="10">&nbsp;</th>
                                    </tr>
                                    <tr class="grey-bg">
                                        <th colspan="2">
                                            <?= $this->translate('CS_Diameter') ?>
                                        </th>
                                        <th colspan="2">
                                            <?= $this->translate('CS_Belt_Width') ?>
                                        </th>
                                        <th colspan="2">
                                        <?= $this->translate('CS_Type') ?>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th width="16.5%">
                                            <?= $this->translate('CS_Unit_in') ?>.
                                        </th>
                                        <th width="16.5%">
                                            <?= $this->translate('CS_Unit_mm') ?>
                                        </th>
                                        <th width="16.5%">
                                            <?= $this->translate('CS_Unit_in') ?>.
                                        </th>
                                        <th width="16.5%">
                                            <?= $this->translate('CS_Unit_mm') ?>
                                        </th>
                                        <th width="16.5%">
                                            <?= $this->translate('CS_Fabric') ?>
                                        </th>
                                        <th width="16.5%">
                                            <?= $this->translate('CS_Steel') ?>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                        foreach($childProductData['productSpecificData'] as $arr)
                                        {   
                                            ?><tr align="center"><?php
                                            foreach($arr as $val)
                                            {
                                                ?>
                                                    <td><?= $val; ?></td>
                                                <?php
                                            }
                                            ?></tr><?php
                                        }
                                    ?>

                                </tbody>
                            </table>
                        </div>

                        <p class="table-notes w-80">
                        <?php if($this->editmode): ?>
                            <?php if($this->input("CPBChild_Note")->isEmpty()): ?>
                                    <?= $this->input("CPBChild_Note",['placeholder'=>'notes']) ?>
                            <?php else: ?>
                                    <?= $this->input("CPBChild_Note"); ?>
                            <?php endif; ?>
                        <?php else: ?>
                                <?= $this->input("CPBChild_Note") ?>
                        <?php endif; ?>
                        </p>
                    </div>
                <?php } ?>
            </section>

        </main>
    </div>
<?php endif; ?>
