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
            <p class="p-medium">
                <?php if($this->editmode):?>
                    <div class="attr-font">Attribute Name = Long Text</div>
                <?php endif;?>
                <?php if($this->editmode): ?>
                        <?php if($this->textarea("CB_LongText")->isEmpty()): ?>
                                <?= $this->textarea("CB_LongText",['placeholder' => 'Enter Long Text'])->setDataFromResource($data['LongText']) ?>
                        <?php else: ?>
                                <?= $this->textarea("CB_LongText",['placeholder' => 'Enter Long Text']); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->textarea("CB_LongText",['placeholder' => 'Enter Long Text']) ?>
                <?php endif; ?>
            </p>
            
            <?php 
            if($data['childrenData'])
            {
            ?>
                <h2 class="orange mb-4">
                
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
                    foreach ($data['childrenData'] as $key => $child) 
                    {
                        $md5Key = md5($child['Name']);
                    ?>

                        <div class="col-2">
                            <?php if($this->editmode):?>
                                <div class="attr-font">Child Attribute Name = Product Image</div>
                            <?php endif;?>
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
                                    if($CBChild_productImageObj) { ?>
                                        <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($CBChild_productImageObj, $this->imageWidth); ?>" class="w-100" alt=""/>
                                    <?php 
                                    }
                                }
                            ?>
                            
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
                
                <h2 class="orange">
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
                    echo $this->image("CB_BeltRollDiameters")->setImage($data['BeltRollDiameters']);
                }
                else{
                    echo $this->image("CB_BeltRollDiameters");
                }
                ?>
            <?php else:?>
                <?php 

                $CB_BeltRollDiametersObj =  $this->image("CB_BeltRollDiameters");
                if(!empty($CB_BeltRollDiametersObj))
                {
                ?>
                <div class="page-break"></div>
                <h2 class="orange">
                    <?= $this->input("CB_ProductNameBeltRoll",['placeholder' => 'Enter Name']) ?>
                    <span class="sub-title">
                        <?= $this->input("CB_ProductNameBeltRollDiameters") ?>
                    </span>
                </h2>
                <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($CB_BeltRollDiametersObj, $this->imageWidth); ?>" alt="" class="w-100 mt-4 mb-4"/>
                <?php
                }
                ?>
            <?php endif;?>

            <?php if($this->editmode):?>
                <div class="page-break"></div>
                <div class="attr-font">Attribute Name = Name</div>
                
                <h2 class="orange">
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
                        echo $this->image("CB_AngleOfInclination",['placeholder' => 'Enter AngleOfInclination'])->setImage($data['AngleOfInclination']);
                    }
                    else{
                        echo $this->image("CB_AngleOfInclination",['placeholder' => 'Enter AngleOfInclination']);
                    }
                ?>

            <?php else:?>
                <?php 
                $CB_AngleOfInclinationObj =  $this->image("CB_AngleOfInclination");
                if(!empty($CB_AngleOfInclinationObj))
                {
                ?>
                <div class="page-break"></div>
                
                <h2 class="orange">
                    <?= $this->input("CB_ProductNameAngleIncline",['placeholder' => 'Enter Name']) ?>
                    <span class="sub-title">
                        <?= $this->input("CB_ProductNameAngleOfInclination") ?>
                    </span>
                </h2>

                <?php if($this->editmode):?>
                    <div class="attr-font">Attribute Name = Angles of Inclination</div>
                <?php endif;?>
                    <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($CB_AngleOfInclinationObj, $this->imageWidth); ?>" alt="" class="w-100 mt-4 mb-4"/>
                <?php
                }
                ?>
            <?php endif;?>
            
            <?php if($data['childrenData']): ?>
                <div class="page-break"></div>

                <div class="cleated-belts">
                    <?php if($this->editmode):?>
                        <div class="attr-font">Attribute Name = Name</div>
                    <?php endif;?>
                    <h2 class="orange heading-info">
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
                            foreach ($data['childrenData'] as $key => $child) { 

                                $md5Key = md5($child['Name']);
                            
                        ?>
                            
                        <table width="100%" class="mt-4">
                            <thead class="mb-4">
                                <th colspan="3" class="text-left">
                                <?php if($this->editmode):?>
                                    <div class="attr-font">Child Attribute Name = Name</div>
                                <?php endif;?> 
                                    <h2 class="mb-0">
                                    <?php if($this->editmode): ?>
                                            <?php if($this->input("CB_Profile_{$md5Key}")->isEmpty()): ?>
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
                                <tr class="grip-col">
                                    <td width="50%" class="pr-5">
                                    <?php if($this->editmode):?>
                                        <div class="attr-font">Child Attribute Name = Long Text</div>
                                    <?php endif;?>
                                        <?php if($this->editmode): ?>
                                                <?php if($this->textarea("CB_ProfileDesc_{$md5Key}")->isEmpty()): ?>
                                                        <?= $this->textarea("CB_ProfileDesc_{$md5Key}", ['placeholder'=>'Profile Description'])->setDataFromResource($child['LongText']) ?>
                                                <?php else: ?>
                                                        <?= $this->textarea("CB_ProfileDesc_{$md5Key}"); ?>
                                                <?php endif; ?>
                                        <?php else: ?>
                                                <?= $this->textarea("CB_ProfileDesc_{$md5Key}") ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                    
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

                                            if(!empty($CB_ProfileOptionImage1Obj))
                                            {
                                            ?>
                                                <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($CB_ProfileOptionImage1Obj, $this->imageWidth); ?>" alt="" class=""/>
                                            <?php
                                            }
                                        }
                                    ?>
                                    </td>
                                    
                                    <td>
                                    
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
                                            if(!empty($CB_ProfileOptionImage2Obj))
                                            {
                                            ?>
                                            <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($CB_ProfileOptionImage2Obj, $this->imageWidth); ?>" alt="" class=""/>
                                            <?php
                                            }
                                        }
                                    ?>
                                    </td>

                                </tr>

                                <?php if($child['tableFieldData']): ?>
                                <tr>
                                    <td class="border-b" colspan="3">
                                        <table class="w-80">
                                            <tbody>

                                                <?php 
                                                    $maxColumns = $child['maxColumns'] + 1;
                                                    foreach ($child['tableFieldData'] as $fieldName => $rowArray) {
                                                        $colspan = ($maxColumns - count($rowArray));
                                                        $colspanStr = '';
                                                        if($colspan > 0)
                                                        {
                                                            $colspan += 1;
                                                            $colspanStr = "colspan='{$colspan}'";
                                                        }
                                                        $firstKey = array_key_first($rowArray);

                                                        ?>

                                                        <tr>

                                                        <?php
                                                        foreach ($rowArray as $rkey => $rvalue) {
                                                            
                                                            $unit = "CS_Unit_in";
                                                            $translatedUnit = '';

                                                            if(($rowArray[0] == 'CS_profileWidth' || $rowArray[0] == 'CS_beltWidthRange') && $rkey == 2)
                                                            {
                                                                $unit = "CS_Unit_mm";
                                                            }

                                                            if($firstKey == $rkey)
                                                            {
                                                                if($rvalue == 'CS_CleatHeightMM')
                                                                {
                                                                    $unit = "CS_Unit_mm";
                                                                }
                                                                
                                                                

                                                                ?>
                                                                <th class="orange text-right">
                                                                    <?= $this->translate($rvalue); ?>
                                                                </th>
                                                            <?php
                                                            }
                                                            else{
                                                                if(!$colspan)
                                                                {
                                                                    $translatedUnit = $this->translate($unit);
                                                                }
                                                                else{
                                                                    if(is_numeric($rvalue))
                                                                    {
                                                                        $translatedUnit = $this->translate($unit);
                                                                    }
                                                                }
                                                                
                                                                
                                                                ?>
                                                                <td <?= $colspanStr ?>>
                                                                    <?= ($rvalue) ? $rvalue.' '.$translatedUnit: '-'; ?>
                                                                </td>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <?php endif; ?>
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