<?php
if (!isset($this->parentContainer)) {
$this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
}
?>
<?php if($this->editmode): ?>
        <?= $this->relation("cbs_template_cleated_belts_page", [
                "types" => ["object"],
                "subtypes" => [
                "object" => ["object"]
                ],
                "classes" => ["CSCatalogTables"],
        ]);
        ?>
<?php endif; ?>

<?php if($data): ?>
<div class="wrapper beltinfotable">
    <header id="header">
        <div class="header-sec">
            <div class="header-txt"><span class="first-title"><?= $this->translate('CS_header_title') ?></span>
                <span class="second-title">
                    <?php
                        if($this->input("CB_title")->isEmpty())
                            {
                                echo $this->input("CB_title",['placeholder' => 'Enter your title'])->setDataFromResource($data['HierarchyNameLevel2']);
                            }
                            else
                            {
                                echo $this->input("CB_title",['placeholder' => 'Enter your title']);
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
            <h1 class="orange pt-4">
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
            <div class="p-medium">
                <p>
                <?php if($this->editmode):?>
                    <div class="attr-font">Attribute Name = Short Text</div>
                <?php endif;?>
                <?php if($this->editmode): ?>
                        <?php if($this->textarea("CB_LongText")->isEmpty()): ?>
                                <?= $this->textarea("CB_LongText",['placeholder' => 'Enter Short Text'])->setDataFromResource($data['ShortText']) ?>
                        <?php else: ?>
                                <?= $this->textarea("CB_LongText",['placeholder' => 'Enter Short Text']); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->textarea("CB_LongText",['placeholder' => 'Enter Short Text']) ?>
                <?php endif; ?>
                </p>
            </div>
            
            <?php 
            if($data['cleatedProducts'])
            {
            ?>
                <h2 class="orange mb-4 pt-4">
                
                    <?php if($this->editmode): ?>
                            <?php if($this->textarea("CB_ProfileOption")->isEmpty()): ?>
                                    <?= $this->textarea("CB_ProfileOption",['placeholder'=>'Profile Options']) ?>
                            <?php else: ?>
                                    <?= $this->textarea("CB_ProfileOption"); ?>
                            <?php endif; ?>
                    <?php else: ?>
                            <?= $this->textarea("CB_ProfileOption") ?>
                    <?php endif; ?>
                
                </h2>
            
                <div class="row profile-option">
                    
                    <?php 
                    foreach ($data['cleatedProducts'] as $key => $child) 
                    {
                        $md5Key = md5($child['Name']);
                    ?>

                        <div class="col-2">
                            <?php if($this->editmode):?>
                                <div class="attr-font">Child Attribute Name = Product Image</div>
                            <?php endif;?>
                            <div class="cleated_product_img">
                                <?php
                                    if($this->editmode)
                                    {
                                        if($this->image("CBChild_productImage_{$md5Key}")->isEmpty())
                                        {
                                            echo $this->image("CBChild_productImage_{$md5Key}")->setImage($child['ProductImage']);
                                        }
                                        else{
                                            echo $this->image("CBChild_productImage_{$md5Key}");
                                        }
                                    }
                                    else
                                    {
                                        $CBChild_productImageObj =  $this->image("CBChild_productImage_{$md5Key}");
                                        if($CBChild_productImageObj->getId()) { ?>
                                            <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($CBChild_productImageObj, $this->imageWidth); ?>" alt=""/>
                                        <?php 
                                        }
                                    }
                                ?>
                            </div>
                            
                            <?php if($this->editmode):?>
                                <div class="attr-font">Child Attribute Name = Name</div>
                            <?php endif;?>
                            <p>
                                <?php if($this->editmode): ?>
                                        <?php if($this->textarea("CBChild_Name_{$md5Key}")->isEmpty()): ?>
                                                <?= $this->textarea("CBChild_Name_{$md5Key}",['placeholder' => 'Enter Name'])->setDataFromResource($child['Name']) ?>
                                        <?php else: ?>
                                                <?= $this->textarea("CBChild_Name_{$md5Key}",['placeholder' => 'Enter Name']); ?>
                                        <?php endif; ?>
                                <?php else: ?>
                                        <?= $this->textarea("CBChild_Name_{$md5Key}",['placeholder' => 'Enter Name']) ?>
                                <?php endif; ?>
                            </p>
                        </div>

                    <?php 
                    } 
                    ?>
                </div>
            
            <?php 
            } 
            ?>

            <hr class="divider" />

            <?php
                if($displayTablesFlag)
                {
                    ?>
                    <div class="table w-90 construction-tab">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td class="border-b">
                                        <div class="<?= (!$this->editmode)?'d-flex':'';  ?>">
                                            <?= $this->areablock('BeltConstruction'); ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php 
                                $cover_compounds = array_chunk($data['cover_compounds'],3);
                                if($cover_compounds)
                                {
                                ?>
                                <tr>
                                    <td class="border-b  pt-4">
                                        <table width="50%" class="mx-auto">
                                            <thead>
                                                <tr>
                                                    <th class="orange" colspan="3">
                                                    <?= $this->input("P_N_Belt_Construction", ['placeholder'=>'Cleated Belt Compounds']); ?>   
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                                if($cover_compounds)
                                                {
                                                    foreach($cover_compounds as $arr)
                                                    {
                                                        ?><tr><?php
                                                        foreach($arr as $obj)
                                                        {
                                                            ?>
                                                                <td>
                                                                    <?= $obj->getName();?></td>
                                                            <?php   
                                                        }
                                                        ?></tr><?php
                                                    }
                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>   
                                <?php 
                                }
                                ?> 
                            </tbody>        
                        </table>
                    </div>
                    <?php
                }
            ?>

            <?php if($this->editmode):?>
                <div class="page-break"></div>
                <div class="attr-font">Attribute Name = Name</div>
                
                <h2 class="orange pt-4">
                        <?php if($this->input("CB_ProductNameBeltRoll")->isEmpty()): ?>
                                <?= $this->input("CB_ProductNameBeltRoll",['placeholder' => 'Enter Name'])->setDataFromResource($data['Name']) ?>
                        <?php else: ?>
                                <?= $this->input("CB_ProductNameBeltRoll",['placeholder' => 'Enter Name']); ?>
                        <?php endif; ?>
                    <span class="sub-title">
                        <?php if($this->input("CB_ProductNameBeltRollDiameters")->isEmpty()): ?>
                                <?= $this->input("CB_ProductNameBeltRollDiameters", ['placeholder'=>'Belt Roll Diameters']) ?>
                        <?php else: ?>
                                <?= $this->input("CB_ProductNameBeltRollDiameters"); ?>
                        <?php endif; ?>
                    </span>
                </h2>

                <div class="attr-font">Attribute Name = Belt Roll Diameters</div>
                <?php
                if($this->image("CB_BeltRollDiameters")->isEmpty())
                {
                    echo $this->image("CB_BeltRollDiameters",["height" => 525])->setImage($data['BeltRollDiameters']);
                }
                else{
                    echo $this->image("CB_BeltRollDiameters",["height" => 525]);
                }
                ?>
            <?php else:?>
                <?php 

                $CB_BeltRollDiametersObj =  $this->image("CB_BeltRollDiameters");
                if(!empty($CB_BeltRollDiametersObj->getId()))
                {
                ?>
                <div class="page-break"></div>
                <h2 class="orange pt-4">
                    <?= $this->input("CB_ProductNameBeltRoll",['placeholder' => 'Enter Name']) ?>
                    <span class="sub-title">
                        <?= $this->input("CB_ProductNameBeltRollDiameters") ?>
                    </span>
                </h2>
                <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($CB_BeltRollDiametersObj, $this->imageWidth); ?>" alt="" class="w-100 mt-4 mb-4" style="max-height:525px; width:auto;"/>
                <?php
                }
                ?>
            <?php endif;?>

            <?php if($this->editmode):?>
                <div class="page-break"></div>
                <div class="attr-font">Attribute Name = Name</div>
                
                <h2 class="orange pt-4">
                    <?php if($this->input("CB_ProductNameAngleIncline")->isEmpty()): ?>
                            <?= $this->input("CB_ProductNameAngleIncline",['placeholder' => 'Enter Name'])->setDataFromResource($data['Name']) ?>
                    <?php else: ?>
                            <?= $this->input("CB_ProductNameAngleIncline",['placeholder' => 'Enter Name']); ?>
                    <?php endif; ?>

                    <span class="sub-title">
                
                        <?php if($this->input("CB_ProductNameAngleOfInclination")->isEmpty()): ?>
                                <?= $this->input("CB_ProductNameAngleOfInclination", ['placeholder'=>'Angles of Inclination']) ?>
                        <?php else: ?>
                                <?= $this->input("CB_ProductNameAngleOfInclination"); ?>
                        <?php endif; ?>
                    </span>
                </h2>

                <div class="attr-font">Attribute Name = Angles of Inclination</div>
                <?php
                    if($this->image("CB_AngleOfInclination")->isEmpty())
                    {
                        echo $this->image("CB_AngleOfInclination",["height" => 450])->setImage($data['AngleOfInclination']);
                    }
                    else{
                        echo $this->image("CB_AngleOfInclination",["height" => 450]);
                    }
                ?>

            <?php else:?>
                <?php 
                $CB_AngleOfInclinationObj =  $this->image("CB_AngleOfInclination");
                if(!empty($CB_AngleOfInclinationObj->getId()))
                {
                ?>
                <div class="page-break"></div>
                
                <h2 class="orange pt-4">
                    <?= $this->input("CB_ProductNameAngleIncline",['placeholder' => 'Enter Name']) ?>
                    <span class="sub-title">
                        <?= $this->input("CB_ProductNameAngleOfInclination") ?>
                    </span>
                </h2>

                <?php if($this->editmode):?>
                    <div class="attr-font">Attribute Name = Angles of Inclination</div>
                <?php endif;?>
                    <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($CB_AngleOfInclinationObj, $this->imageWidth); ?>" alt="" class="w-100 mt-4 mb-4" style="max-height:450px; width:auto;"/>
                <?php
                }
                ?>
            <?php endif;?>
            
            <?php if($data['normalProductsDetails']['childData']): ?>
                <div class="cleated-belts" style="page-break-inside: avoid;">
                    <?php if($this->editmode):?>
                        <div class="attr-font">Attribute Name = Name</div>
                    <?php endif;?>
                    <h2 class="orange heading-info pt-4">
                        <?php if($this->editmode): ?>
                                <?php if($this->input("CB_ProductNameProfileOptions")->isEmpty()): ?>
                                        <?= $this->input("CB_ProductNameProfileOptions",['placeholder' => 'Enter Name'])->setDataFromResource($data['Name']) ?>
                                <?php else: ?>
                                        <?= $this->input("CB_ProductNameProfileOptions",['placeholder' => 'Enter Name']); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->input("CB_ProductNameProfileOptions",['placeholder' => 'Enter Name']) ?>
                        <?php endif; ?> 

                        <span class="sub-title">
                    
                            <?php if($this->editmode): ?>
                                    <?php if($this->input("CB_ProductNameProfileOptionsLabel")->isEmpty()): ?>
                                            <?= $this->input("CB_ProductNameProfileOptionsLabel", ['placeholder'=>'Profile Options']) ?>
                                    <?php else: ?>
                                            <?= $this->input("CB_ProductNameProfileOptionsLabel"); ?>
                                    <?php endif; ?>
                            <?php else: ?>
                                    <?= $this->input("CB_ProductNameProfileOptionsLabel") ?>
                            <?php endif; ?>
                        
                        </span>

                    </h2>

                    <div class="table construction-tab">
                        <?php 
                            foreach ($data['normalProductsDetails']['childData'] as $key => $child) {
                                if (($child['Name'] != "Ultra Shift II") && ($child['Name'] != "Bucket Grip") && ($child['Name'] != "Bucket Grip II") && ($child['Name'] != "Wave Grip")){
                                $md5Key = md5($child['Name']);
                        ?>
                            
                    <table width="100%" class="mt-2 mb-4 parentTable"  style=" page-break-inside:avoid;">
                        <thead>
                            <th colspan="3" class="text-left">
                            <?php if($this->editmode):?>
                                <div class="attr-font">Child Attribute Name = Name</div>
                            <?php endif;?>
                                <h2 class="mb-0">
                                <?php if($this->editmode): ?>
                                        <?php if($this->input("CB_Profile_{$md5Key}")->isEmpty()): ?>
                                                <?php echo $this->input("CB_Profile_{$md5Key}")    ?>
                                                <?= $this->input("CB_Profile_{$md5Key}", ['placeholder'=>'Profile Name'])->setDataFromResource($child['Name']) ?>
                                        <?php else: ?>
                                                <?= $this->input("CB_Profile_{$md5Key}"); ?>
                                        <?php endif; ?>
                                <?php else: ?>
                                        <?= $this->input("CB_Profile_{$md5Key}") ?>
                                <?php endif; ?>
                                </h2>
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <table class="parentTable">
                                        <tr>
                                            <td>
                                                <div  style="width:100vw">
                                                    <div abs="middle" style="float:right; width:40%; text-align:right;">
                                                    <!--This section is used to display the both images-->
                                                        <table>
                                                            <tr>
                                                                <td> </td>
                                                                <td width = "50%" style="vertical-align: top;">
                                                                <?php if($this->editmode):?>
                                                                            <div class="attr-font" >Child Attribute Name = Product Image</div>
                                                                        <?php endif;?>
                                                                        <?php
                                                                            if($this->editmode)
                                                                            {
                                                                                if($this->image("CB_ProfileOptionImage1_{$md5Key}")->isEmpty())
                                                                                {
                                                                                    echo $this->image("CB_ProfileOptionImage1_{$md5Key}")->setImage($child['ProductImage']);
                                                                                }
                                                                                else{
                                                                                    echo $this->image("CB_ProfileOptionImage1_{$md5Key}");
                                                                                }
                                                                            }
                                                                            else
                                                                            {
                                                                                $CB_ProfileOptionImage1Obj =  $this->image("CB_ProfileOptionImage1_{$md5Key}");

                                                                                if(!empty($CB_ProfileOptionImage1Obj->getId()))
                                                                                {
                                                                                ?>
                                                                                    <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($CB_ProfileOptionImage1Obj, $this->imageWidth); ?>" alt="" class=""/>
                                                                                <?php
                                                                                }
                                                                            }
                                                                        ?>
                                                                </td>
                                                                <td width = "50%" style="vertical-align: top;">
                                                                <?php if($this->editmode):?>
                                                                            <div class="attr-font" vertical-align = "text-top">Child Attribute Name = Application Image</div>
                                                                        <?php endif;?>
                                                                        <?php
                                                                            if($this->editmode)
                                                                            {
                                                                                if($this->image("CB_ProfileOptionImage2_{$md5Key}")->isEmpty())
                                                                                {
                                                                                    echo $this->image("CB_ProfileOptionImage2_{$md5Key}")->setImage($child['ApplicationImage']);
                                                                                }
                                                                                else{
                                                                                    echo $this->image("CB_ProfileOptionImage2_{$md5Key}");
                                                                                }
                                                                            }
                                                                            else
                                                                            {
                                                                                $CB_ProfileOptionImage2Obj =  $this->image("CB_ProfileOptionImage2_{$md5Key}");
                                                                                if(!empty($CB_ProfileOptionImage2Obj->getId()))
                                                                                {
                                                                                ?>
                                                                                <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($CB_ProfileOptionImage2Obj, $this->imageWidth); ?>" alt="" class=""/>
                                                                                <?php
                                                                                }
                                                                            }
                                                                        ?>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    <!-- END -->
                                                    </div>
                                                    <!--This section is used to display Short Text And Table-->
                                                    <table class="parentTable">
                                                        <tr class="grip-col">
                                                            <td class ="pr-5">
                                                                <?php if($this->editmode):?>
                                                                    <div class="attr-font">Child Attribute Name = Short Text</div>
                                                                <?php endif;?>
                                                                    <?php if($this->editmode): ?>
                                                                            <?php if($this->textarea("CB_ProfileDesc_{$md5Key}")->isEmpty()): ?>
                                                                                    <?= $this->textarea("CB_ProfileDesc_{$md5Key}", ['placeholder'=>'Profile Description'])->setDataFromResource($child['ShortText']) ?>
                                                                            <?php else: ?>
                                                                                    <?= $this->textarea("CB_ProfileDesc_{$md5Key}"); ?>
                                                                            <?php endif; ?>
                                                                    <?php else: ?>
                                                                            <?= $this->textarea("CB_ProfileDesc_{$md5Key}") ?>
                                                                    <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                        <tr style="page-break-inside: avoid;">
                                                            <td>
                                                                <table class="normal-cleated-product" style="margin:0; page-break-inside: avoid;">
                                                                    <tbody>
                                                                        <?php if(isset($child['CS_CleatHeightInch'])){ ?>
                                                                        <tr>
                                                                            <th class="orange text-right">
                                                                                <?= $this->translate($child['CS_CleatHeightInch']); ?>
                                                                            </th>
                                                                            <td colspan="<?= $child['maxColumnLenth'] ?>">
                                                                                <?= $child['CS_CleatHeightInchVal'] . " ". $this->translate('CS_Unit_in'); ?>
                                                                            </td>
                                                                        </tr>
                                                                        <?php } ?>

                                                                        <?php if(isset($child['CS_AvailableBeltWidthInch'])){ ?>
                                                                        <tr>
                                                                            <th class="orange text-right">
                                                                                <?= $this->translate($child['CS_AvailableBeltWidthInch']); ?>
                                                                            </th>
                                                                            <?php foreach ($child['CS_AvailableBeltWidthInchList'] as $key => $value) { ?>
                                                                                <td>
                                                                                    <?= $value . " ". $this->translate('CS_Unit_in'); ?>
                                                                                </td>
                                                                            <?php } ?>
                                                                        </tr>
                                                                        <?php } ?>

                                                                        <?php if($child['CS_AvailableProfilePatternWidthsInch']){ ?>
                                                                            <?php foreach ($child['CS_AvailableProfilePatternWidthsInch'] as $key => $rows) { ?>
                                                                                <tr>
                                                                                    <th class="orange text-right">
                                                                                        <?= $this->translate('CS_AvailableProfilePatternWidthsInch'); ?>
                                                                                    </th>
                                                                                    <?php

                                                                                    $firstIndexData = array_unique($child['CS_AvailableProfilePatternWidthsInch'][0]);

                                                                                    if($child['maxRowLength'] == 1 && count($firstIndexData) == 1  && !is_numeric($firstIndexData[0])){ ?>
                                                                                        <td colspan="<?= $child['maxColumnLenth'] ?>"><?= $rows[0] ?></td>
                                                                                    <?php }else{ ?>
                                                                                    <?php foreach ($rows as $key => $value) { ?>
                                                                                        <td>
                                                                                            <?php
                                                                                                if($value)
                                                                                                {
                                                                                                    echo $value . " ". $this->translate('CS_Unit_in');
                                                                                                }
                                                                                                else{
                                                                                                    echo '&#8209';
                                                                                                }
                                                                                                ?>
                                                                                        </td>
                                                                                    <?php } ?>
                                                                                    <?php } ?>
                                                                                </tr>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <!-- END -->
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                      <?php }
                      else {
                        $md5Key = md5($child['Name']);
                      ?>
                    <table width="100%" class="mt-2 mb-3 parentTable"  style="page-break-inside:avoid;">
                        <thead>
                            <th colspan="3" class="text-left">
                            <?php if($this->editmode):?>
                                <div class="attr-font">Child Attribute Name = Name</div>
                            <?php endif;?>
                                <h2 class="mb-0">
                                <?php if($this->editmode): ?>
                                        <?php if($this->input("CB_Profile_{$md5Key}")->isEmpty()): ?>
                                                <?php echo $this->input("CB_Profile_{$md5Key}")    ?>
                                                <?= $this->input("CB_Profile_{$md5Key}", ['placeholder'=>'Profile Name'])->setDataFromResource($child['Name']) ?>
                                        <?php else: ?>
                                                <?= $this->input("CB_Profile_{$md5Key}"); ?>
                                        <?php endif; ?>
                                <?php else: ?>
                                        <?= $this->input("CB_Profile_{$md5Key}") ?>
                                <?php endif; ?>
                                </h2>
                            </th>
                        </thead>
                        <tbody>
                            <!--This section is used to display Short Text And both images-->
                            <tr class="grip-col" style="page-break-inside:avoid;">
                                <td width="60%" class="pr-4">
                                <?php if($this->editmode):?>
                                    <div class="attr-font">Child Attribute Name = Short Text</div>
                                <?php endif;?>
                                    <?php if($this->editmode): ?>
                                            <?php if($this->textarea("CB_ProfileDesc_{$md5Key}")->isEmpty()): ?>
                                                    <?= $this->textarea("CB_ProfileDesc_{$md5Key}", ['placeholder'=>'Profile Description'])->setDataFromResource($child['ShortText']) ?>
                                            <?php else: ?>
                                                    <?= $this->textarea("CB_ProfileDesc_{$md5Key}"); ?>
                                            <?php endif; ?>
                                    <?php else: ?>
                                            <?= $this->textarea("CB_ProfileDesc_{$md5Key}") ?>
                                    <?php endif; ?>
                                </td>

                                <td width="20%">
                                <?php if($this->editmode):?>
                                    <div class="attr-font">Child Attribute Name = Product Image</div>
                                <?php endif;?>
                                <?php
                                    if($this->editmode)
                                    {
                                        if($this->image("CB_ProfileOptionImage1_{$md5Key}")->isEmpty())
                                        {
                                            echo $this->image("CB_ProfileOptionImage1_{$md5Key}")->setImage($child['ProductImage']);
                                        }
                                        else{
                                            echo $this->image("CB_ProfileOptionImage1_{$md5Key}");
                                        }
                                    }
                                    else
                                    {
                                        $CB_ProfileOptionImage1Obj =  $this->image("CB_ProfileOptionImage1_{$md5Key}");

                                        if(!empty($CB_ProfileOptionImage1Obj->getId()))
                                        {
                                        ?>
                                            <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($CB_ProfileOptionImage1Obj, $this->imageWidth); ?>" alt="" class=""/>
                                        <?php
                                        }
                                    }
                                ?>
                                </td>

                                <td width="20%">
                                <?php if($this->editmode):?>
                                    <div class="attr-font">Child Attribute Name = Application Image</div>
                                <?php endif;?>
                                <?php
                                    if($this->editmode)
                                    {
                                        if($this->image("CB_ProfileOptionImage2_{$md5Key}")->isEmpty())
                                        {
                                            echo $this->image("CB_ProfileOptionImage2_{$md5Key}")->setImage($child['ApplicationImage']);
                                        }
                                        else{
                                            echo $this->image("CB_ProfileOptionImage2_{$md5Key}");
                                        }
                                    }
                                    else
                                    {
                                        $CB_ProfileOptionImage2Obj =  $this->image("CB_ProfileOptionImage2_{$md5Key}");
                                        if(!empty($CB_ProfileOptionImage2Obj->getId()))
                                        {
                                        ?>
                                        <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($CB_ProfileOptionImage2Obj, $this->imageWidth); ?>" alt="" class=""/>
                                        <?php
                                        }
                                    }
                                ?>
                                </td>
                            </tr>
                            <!-- END -->
                            <!--This section is used to display Only Table with colspan-2-->
                            <tr>
                                <td colspan="2" >
                                <table class="normal-cleated-product" style = "margin:0; page-break-inside:avoid;"  >
                                            <tbody>
                                                <?php if(isset($child['CS_CleatHeightInch'])){ ?>
                                                <tr>
                                                    <th class="orange text-right">
                                                        <?= $this->translate($child['CS_CleatHeightInch']); ?>
                                                    </th>

                                                    <td colspan="<?= $child['maxColumnLenth'] ?>">
                                                        <?= $child['CS_CleatHeightInchVal'] . " ". $this->translate('CS_Unit_in'); ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>

                                                <?php if(isset($child['CS_AvailableBeltWidthInch'])){ ?>
                                                <tr>
                                                    <th class="orange text-right">
                                                        <?= $this->translate($child['CS_AvailableBeltWidthInch']); ?>
                                                    </th>

                                                    <?php foreach ($child['CS_AvailableBeltWidthInchList'] as $key => $value) { ?>
                                                        <td>
                                                            <?= $value . " ". $this->translate('CS_Unit_in'); ?>
                                                        </td>
                                                    <?php } ?>
                                                    
                                                </tr>
                                                <?php } ?>

                                                <?php if($child['CS_AvailableProfilePatternWidthsInch']){ ?>
                                                    <?php foreach ($child['CS_AvailableProfilePatternWidthsInch'] as $key => $rows) { ?>
                                                        <tr>
                                                            <th class="orange text-right">
                                                                <?= $this->translate('CS_AvailableProfilePatternWidthsInch'); ?>
                                                            </th>
                                                            <?php

                                                            $firstIndexData = array_unique($child['CS_AvailableProfilePatternWidthsInch'][0]);

                                                            if($child['maxRowLength'] == 1 && count($firstIndexData) == 1  && !is_numeric($firstIndexData[0])){ ?>
                                                                <td colspan="<?= $child['maxColumnLenth'] ?>"><?= $rows[0] ?></td>
                                                            <?php }else{ ?>
                                                            <?php foreach ($rows as $key => $value) { ?>
                                                                <td>
                                                                    <?php
                                                                        if($value)
                                                                        {
                                                                            echo $value . " ". $this->translate('CS_Unit_in');
                                                                        }
                                                                        else{
                                                                            echo '&#8209';
                                                                        }
                                                                    ?>
                                                                </td>
                                                            <?php } ?>
                                                            <?php } ?>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                </td>
                                <td></td>
                            </tr>
                            <!-- END -->
                        </tbody>
                    </table>
                      <?php } ?>
                    <?php } ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if($data['contiRollProductsDetails']['childData']): ?>
                <!-- <div style="page-break-before:avoid"></div> -->

                <div class="cleated-belts" style="page-break-before:always">
                    <?php if($this->editmode):?>
                        <div class="attr-font">Attribute Name = Name</div>
                    <?php endif;?>
                    <h2 class="orange heading-info pt-4">
                        <?php if($this->editmode): ?>
                                <?php if($this->input("CB_ContiRollProductNameProfileOptions")->isEmpty()): ?>
                                        <?= $this->input("CB_ContiRollProductNameProfileOptions",['placeholder' => 'Enter Name'])->setDataFromResource($data['Name']) ?>
                                <?php else: ?>
                                        <?= $this->input("CB_ContiRollProductNameProfileOptions",['placeholder' => 'Enter Name']); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->input("CB_ContiRollProductNameProfileOptions",['placeholder' => 'Enter Name']) ?>
                        <?php endif; ?> 

                        <span class="sub-title">
                    
                            <?php if($this->editmode): ?>
                                    <?php if($this->input("CB_ContiRollProductNameProfileOptionsLabel")->isEmpty()): ?>
                                            <?= $this->input("CB_ContiRollProductNameProfileOptionsLabel", ['placeholder'=>'Profile Options']) ?>
                                    <?php else: ?>
                                            <?= $this->input("CB_ContiRollProductNameProfileOptionsLabel"); ?>
                                    <?php endif; ?>
                            <?php else: ?>
                                    <?= $this->input("CB_ContiRollProductNameProfileOptionsLabel") ?>
                            <?php endif; ?>
                        
                        </span>

                    </h2>

                    <div class="contiRoll90">
                        <?php if($this->editmode):?>
                            <div class="attr-font">Child Attribute Name = Name</div>
                        <?php endif;?> 
                        <h2 class="mb-0">
                        <?php if($this->editmode): ?>
                                <?php if($this->input("CB_contiRollParentProfile_{$md5Key}")->isEmpty()): ?>
                                        <?= $this->input("CB_contiRollParentProfile_{$md5Key}", ['placeholder'=>'ContiRoll Belt Profiles'])->setDataFromResource($data['contiRollProductsDetails']['parentData']['Name']) ?>
                                <?php else: ?>
                                        <?= $this->input("CB_contiRollParentProfile_{$md5Key}"); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->input("CB_contiRollParentProfile_{$md5Key}") ?>
                        <?php endif; ?>
                        </h2>

                        <?php if($this->editmode):?>
                            <div class="attr-font">Child Attribute Name = Short Text</div>
                        <?php endif;?>
                        <?php if($this->editmode): ?>
                                <?php if($this->textarea("CB_contiRollParentProfileDesc_{$md5Key}")->isEmpty()): ?>
                                        <?= $this->textarea("CB_contiRollParentProfileDesc_{$md5Key}", ['placeholder'=>'Profile Description'])->setDataFromResource($data['contiRollProductsDetails']['parentData']['ShortText']) ?>
                                <?php else: ?>
                                        <?= $this->textarea("CB_contiRollParentProfileDesc_{$md5Key}"); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->textarea("CB_contiRollParentProfileDesc_{$md5Key}") ?>
                        <?php endif; ?>
                    </div>

                    <div class="table construction-tab ml50">
                        <?php 
                            foreach ($data['contiRollProductsDetails']['childData'] as $key => $child) { 

                                $md5Key = md5($child['Name']);
                            
                        ?>
                            
                        <table width="100%" class="mt-4 mb-5">
                            <thead>
                                <th colspan="2" class="text-left">
                                <?php if($this->editmode):?>
                                    <div class="attr-font">Child Attribute Name = Name</div>
                                <?php endif;?> 
                                    <h2 class="mb-0">
                                    <?php if($this->editmode): ?>
                                            <?php if($this->input("CB_ContiRollProfile_{$md5Key}")->isEmpty()): ?>
                                                    <?= $this->input("CB_ContiRollProfile_{$md5Key}", ['placeholder'=>'Profile Name'])->setDataFromResource($child['Name']) ?>
                                            <?php else: ?>
                                                    <?= $this->input("CB_ContiRollProfile_{$md5Key}"); ?>
                                            <?php endif; ?>
                                    <?php else: ?>
                                            <?= $this->input("CB_ContiRollProfile_{$md5Key}") ?>
                                    <?php endif; ?>
                                    </h2>
                                </th>
                            </thead>
                            <tbody>
                                <tr class="grip-col">
                                    <td class="pr-5 contiRollChild">

                                    <table>
                                            <tbody>
                                                <?php if(isset($child['CS_profileWidth'])){ ?>
                                                <tr>
                                                    <th class="orange text-right">
                                                        <?= $this->translate($child['CS_profileWidth']); ?>
                                                    </th>
                                                
                                                    <td>
                                                        <?= $child['CS_profileWidthInch'] . " ". $this->translate('CS_Unit_in'); ?>
                                                    </td>

                                                    <td>
                                                        <?= $child['CS_profileWidthMm'] . " ". $this->translate('CS_Unit_mm'); ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>

                                                <?php if(isset($child['CS_beltWidthRange'])){ ?>
                                                <tr>
                                                    <th class="orange text-right">
                                                        <?= $this->translate($child['CS_beltWidthRange']); ?>
                                                    </th>
                                                
                                                    <td>
                                                        <?= $child['CS_beltWidthRangeInch'] . " ". $this->translate('CS_Unit_in'); ?>
                                                    </td>

                                                    <td>
                                                        <?= $child['CS_beltWidthRangeMm'] . " ". $this->translate('CS_Unit_mm'); ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>

                                                <?php if(isset($child['CS_AdditionalInformation'])){ ?>
                                                <tr>
                                                    <th class="orange text-right">
                                                        <?= $this->translate($child['CS_AdditionalInformation']); ?>
                                                    </th>
                                                
                                                    <td colspan="2">
                                                        <?= $child['CS_AdditionalInformationValue'] ; ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        
                                    </td>
                                    <td>
                                    
                                    <?php if($this->editmode):?>
                                        <div class="attr-font">Child Attribute Name = Product Image</div>
                                    <?php endif;?>
                                    <?php
                                        if($this->editmode)
                                        {
                                            if($this->image("CB_ContiRollProfileOptionImage1_{$md5Key}")->isEmpty())
                                            {
                                                echo $this->image("CB_ContiRollProfileOptionImage1_{$md5Key}",["height" => 120])->setImage($child['ProductImage']);
                                            }
                                            else{
                                                echo $this->image("CB_ContiRollProfileOptionImage1_{$md5Key}");
                                            }
                                        }
                                        else
                                        {
                                            $CB_ProfileOptionImage1Obj =  $this->image("CB_ContiRollProfileOptionImage1_{$md5Key}");

                                            if(!empty($CB_ProfileOptionImage1Obj->getId()))
                                            {
                                            ?>
                                                <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($CB_ProfileOptionImage1Obj, $this->imageWidth); ?>" alt="" style="height:120px; width:auto;"/>
                                            <?php
                                            }
                                        }
                                    ?>

                                    <?php if($this->editmode):?>
                                        <div class="attr-font">Child Attribute Name = Application Image</div>
                                    <?php endif;?>
                                    <?php
                                        if($this->editmode)
                                        {
                                            if($this->image("CB_ContiRollProfileOptionImage2_{$md5Key}")->isEmpty())
                                            {
                                                echo $this->image("CB_ContiRollProfileOptionImage2_{$md5Key}", ["height" => 120])->setImage($child['ApplicationImage']);
                                            }
                                            else{
                                                echo $this->image("CB_ContiRollProfileOptionImage2_{$md5Key}");
                                            }
                                        }
                                        else
                                        {
                                            $CB_ProfileOptionImage2Obj =  $this->image("CB_ContiRollProfileOptionImage2_{$md5Key}");
                                            if(!empty($CB_ProfileOptionImage2Obj->getId()))
                                            {
                                            ?>
                                            <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($CB_ProfileOptionImage2Obj, $this->imageWidth); ?>" alt="" style="height:120px; width:auto;"/>
                                            <?php
                                            }
                                        }
                                    ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <?php } ?>
                    </div>
                </div>
            <?php endif; ?>
        </section>
    </main>
   
</div>
<?php endif; ?>

<style>
    .parentTable tr td:first-child {
        font-size: 12px;
    }
    .parentTable tr td {
        border: none;
    }
    .contiRoll90{
        width: 90%;
        padding-bottom: 20px;
    }
    .ml50{
        margin-left: 40px;
    }
    .contiRollChild {
        width:60%
    }
    .contiRollChild table{
        width:100%;
        margin-top: 40px;
    }
    .contiRollChild tr:not(:last-child){
        border-bottom: 1px solid black;
    }

    .contiRollChild tr th{
        padding-bottom: 1px;
        vertical-align: bottom;
        border-bottom: none;
    }

    .contiRollChild tr td{
        text-align: center;
        padding-top: 0;
    }
    .normal-cleated-product{
        width: 100%;
        margin-top: 50px;
    }

    .normal-cleated-product tr:not(:last-child){
        border-bottom: 1px solid black;
    }

    .normal-cleated-product tr th{
        padding-bottom: 1px;
        vertical-align: bottom;
        border-bottom: none;
    }

    .normal-cleated-product tr td{
        text-align: center;
        padding-top: 0;
    }
</style>