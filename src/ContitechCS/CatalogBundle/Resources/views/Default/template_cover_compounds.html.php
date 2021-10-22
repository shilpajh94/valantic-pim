<?php
if (!isset($this->parentContainer)) {
$this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
}
?>
<?php if($this->editmode): ?>
        <?= $this->relation("cbs_template_cover_compound_page", [
                "types" => ["object"],
                "subtypes" => [
                "object" => ["object"]
                ],
                "classes" => ["CSCatalogCategory"],
        ]);
        ?>
<?php endif; ?>

<?php if($data): ?>

<?php 

$coverCompound = $data['coverCompoundData'];
?>
<div class="wrapper">
        <header id="header">
            <div class="header-sec">
                <div class="header-txt">
                    <strong>
                        <?php if($this->editmode): ?>
                                <?php if($this->input("CC_HierarchyNameLevel1")->isEmpty()): ?>
                                        <?= $this->input("CC_HierarchyNameLevel1")->setDataFromResource($coverCompound['HierarchyNameLevel1']) ?>
                                <?php else: ?>
                                        <?= $this->input("CC_HierarchyNameLevel1"); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->input("CC_HierarchyNameLevel1") ?>
                        <?php endif; ?>
                
                
                    </strong>
                </div>
                <div class="print-pg-no"></div>
            </div>
        </header>
        <!-- <footer id="footer" >
            <div class="footer-logo"><img src="/static/cbs/images/continental_logo.png" alt="" /></div>
        </footer> -->
        <main id="content" role="main">
            <section class="fortressxp-belts">
                <h1 class="orange">
                    <strong>
                        <?php if($this->editmode): ?>
                                <?php if($this->input("CC_Name")->isEmpty()): ?>
                                        <?= $this->input("CC_Name")->setDataFromResource($coverCompound['Name']) ?>
                                <?php else: ?>
                                        <?= $this->input("CC_Name"); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->input("CC_Name") ?>
                        <?php endif; ?>
                    </strong>
                    <span class="sub-title">
                        <?php if($this->editmode): ?>
                                <?php if($this->input("CC_ProductClaimSlogan")->isEmpty()): ?>
                                        <?= $this->input("CC_ProductClaimSlogan")->setDataFromResource($coverCompound['ProductClaimSlogan']) ?>
                                <?php else: ?>
                                        <?= $this->input("CC_ProductClaimSlogan"); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->input("CC_ProductClaimSlogan") ?>
                        <?php endif; ?>
                    
                    </span>
                </h1>

                <div class="colum-2 p-0">
                    <p>
                        <?php if($this->editmode): ?>
                                <?php if($this->input("CC_ShortText")->isEmpty()): ?>
                                        <?= $this->input("CC_ShortText")->setDataFromResource($coverCompound['ShortText']) ?>
                                <?php else: ?>
                                        <?= $this->input("CC_ShortText"); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->input("CC_ShortText") ?>
                        <?php endif; ?>
                    </p>
                    <p>
                        <?php if($this->editmode): ?>
                                <?php if($this->input("CC_LongText")->isEmpty()): ?>
                                        <?= $this->input("CC_LongText")->setDataFromResource($coverCompound['LongText']) ?>
                                <?php else: ?>
                                        <?= $this->input("CC_LongText"); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->input("CC_LongText") ?>
                        <?php endif; ?>
                    </p>
                </div>
                    
                <?php
                    if($this->editmode)
                    {
                        ?>
                        <div class="full-image-sec">
                        <?php
                        if($this->image("CC_productImage")->isEmpty())
                        {
                            echo $this->image("CC_productImage")->setImage($coverCompound['productImage']);
                        }
                        else{
                            echo $this->image("CC_productImage");
                        }
                        ?>
                        </div>
                        <?php
                        
                    }
                    else
                    {
                        $productImgSrcObj =  $this->image("CC_productImage");
                        if($productImgSrcObj)
                        {
                        ?>
                        <div class="full-image-sec">
                        <img src="<?= $productImgSrcObj->getThumbnail('catalog_thumb'); ?>" alt=""/>
                        </div>
                        <?php
                        }
                    }
                ?>

                <div class="belts-information">
                    <h1><span class="orange">
                    <strong>
                        <?php if($this->editmode): ?>
                                <?php if($this->input("CC_CCAA")->isEmpty()): ?>
                                        <?= $this->input("CC_CCAA",['placeholder'=>'Cover Compounds and Applications']) ?>
                                <?php else: ?>
                                        <?= $this->input("CC_CCAA"); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->input("CC_CCAA") ?>
                        <?php endif; ?>
                    </strong>  
                    </h1>
                    <?php if($data['CCAARows']): ?>
                    <div class="table-data compounds-table">
                        <table width="100%" class="white-bg">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th colspan="15" class="orange">Applications</th>
                                </tr>
                                <tr class="vertical-head">
                                    <th align="left" width="13%" class="orange">Compounds</th>
                                    
                                    <?php 
                                        $applicationData = $data['applicationData'];

                                        foreach ($applicationData as $key => $value) {
                                            ?>
                                            <th width="5.8%" class="rotate"><div><?= $value; ?></div></th>
                                            <?php
                                        }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($data['CCAARows'] as $key => $row) { 
                                    
                                ?>
                                    <tr align="center">

                                        <?php
                                            $firstKey = array_key_first($row);
                                            foreach ($row as $key => $value) { 
                                                $style = '';
                                                $class = '';
                                                if($firstKey == $key)
                                                {
                                                    $style = 'align="left"';
                                                }

                                                if($value === true)
                                                {
                                                    $class = 'class="orange-bg"';
                                                    $value = '';
                                                }
                                        ?>
                                            <td <?= $style; ?> <?= $class; ?>><?= $value; ?></td>

                                        <?php 
                                            } 
                                        ?>

                                    </tr>

                                <?php 
                                } 
                                ?>
                            </tbody>
                        </table>
                        
                    </div>
                    <?php endif; ?>

                    <h1 class="orange">
                        <?php if($this->editmode): ?>
                            <?php if($this->input("CC_Title_Standard_Compounds")->isEmpty()): ?>
                                    <?= $this->input("CC_Title_Standard_Compounds",['placeholder'=>'Standard Compounds']) ?>
                            <?php else: ?>
                                    <?= $this->input("CC_Title_Standard_Compounds"); ?>
                            <?php endif; ?>
                        <?php else: ?>
                            <?= $this->input("CC_Title_Standard_Compounds") ?>
                        <?php endif; ?>
                    </h1>

                    <div class="colum-2 standard-compounds p-0">

                        <?php
                            $level3rdObjectData = $data['level3rdObjectData'];
                            foreach ($level3rdObjectData as $key => $object) {
                                ?>
                                <h3>
                                    <?php if($this->editmode): ?>
                                            <?php if($this->textarea("CC_Level_3rd_Object_{$key}_Name")->isEmpty()): ?>
                                                    <?= $this->textarea("CC_Level_3rd_Object_{$key}_Name")->setDataFromResource($object['Name']) ?>
                                            <?php else: ?>
                                                    <?= $this->textarea("CC_Level_3rd_Object_{$key}_Name"); ?>
                                            <?php endif; ?>
                                    <?php else: ?>
                                            <?= $this->textarea("CC_Level_3rd_Object_{$key}_Name") ?>
                                    <?php endif; ?>
                                </h3>
                                <p>
                                    <?php if($this->editmode): ?>
                                            <?php if($this->textarea("CC_Level_3rd_Object_{$key}_LongText")->isEmpty()): ?>
                                                    <?= $this->textarea("CC_Level_3rd_Object_{$key}_LongText")->setDataFromResource($object['LongText']) ?>
                                            <?php else: ?>
                                                    <?= $this->textarea("CC_Level_3rd_Object_{$key}_LongText"); ?>
                                            <?php endif; ?>
                                    <?php else: ?>
                                            <?= $this->textarea("CC_Level_3rd_Object_{$key}_LongText") ?>
                                    <?php endif; ?>
                                </p>
                                <?php
                            }

                        ?>
                    </div>
                </div>

                <?php 
                    $singleProductPage = $data['singleProductPage'];
                ?>
                <h1 class="orange">
                
                    <?php if($this->editmode): ?>
                            <?php if($this->input("CCHRPage_NamePerformanceCategory")->isEmpty()): ?>
                                    <?= $this->input("CCHRPage_NamePerformanceCategory")->setDataFromResource($singleProductPage['NamePerformanceCategory']) ?>
                            <?php else: ?>
                                    <?= $this->input("CCHRPage_NamePerformanceCategory"); ?>
                            <?php endif; ?>
                    <?php else: ?>
                            <?= $this->input("CCHRPage_NamePerformanceCategory") ?>
                    <?php endif; ?>
                </h1>
                <p>
                    <?php if($this->editmode): ?>
                            <?php if($this->textarea("CCHRPage_LongText")->isEmpty()): ?>
                                    <?= $this->textarea("CCHRPage_LongText")->setDataFromResource($singleProductPage['LongText']) ?>
                            <?php else: ?>
                                    <?= $this->textarea("CCHRPage_LongText"); ?>
                            <?php endif; ?>
                    <?php else: ?>
                            <?= $this->textarea("CCHRPage_LongText") ?>
                    <?php endif; ?>
                    
                </p>

                <?php
                    if($this->editmode)
                    {
                        if($this->image("CCHRPage_productImage")->isEmpty())
                        {
                            echo $this->image("CCHRPage_productImage")->setImage($singleProductPage['productImage']);
                        }
                        else{
                            echo $this->image("CCHRPage_productImage");
                        }
                    }
                    else
                    {
                        $CCHRPage_productImageObj =  $this->image("CCHRPage_productImage");
                        if($CCHRPage_productImageObj)
                        {
                        ?>
                        <img src="<?= $CCHRPage_productImageObj->getThumbnail('catalog_thumb'); ?>" alt="" class="w-100"/>
                        <?php
                        }
                    }
                ?>
                        
                <?php if($singleProductPage['FeaturesAndBenefits']) {  ?>
                    <div class="features-benefit-sec">
                        <?php
                        foreach ($singleProductPage['FeaturesAndBenefits'] as $fkey => $feature) {
                            $md5FeatureNameKey = md5($feature['FeatureName']);
                        ?>
                            <div class="media">
                                <?php
                                    if($this->editmode)
                                    {
                                        if($this->image("CCHRPageFeature_{$md5FeatureNameKey}")->isEmpty())
                                        {
                                            echo $this->image("CCHRPageFeature_{$md5FeatureNameKey}")->setImage($feature['FeatureImage']);
                                        }
                                        else{
                                            echo $this->image("CCHRPageFeature_{$md5FeatureNameKey}");
                                        }
                                    }
                                    else
                                    {
                                        $CCHRPageFeatureImgSrcObj =  $this->image("CCHRPageFeature_{$md5FeatureNameKey}");
                                        if($CCHRPageFeatureImgSrcObj)
                                        {
                                        ?>
                                        <img src="<?= $CCHRPageFeatureImgSrcObj->getThumbnail('catalog_thumb'); ?>" class="features-images" alt=""/>
                                        <?php
                                        }
                                    }
                                ?>
                                
                                <div class="media-body">
                                    <h2 class="orange">
                                        <?php if($this->editmode): ?>
                                                <?php if($this->input("CCHRPageFeature_{$md5FeatureNameKey}")->isEmpty()): ?>
                                                        <?= $this->input("CCHRPageFeature_{$md5FeatureNameKey}")->setDataFromResource($feature['FeatureName']) ?>
                                                <?php else: ?>
                                                        <?= $this->input("CCHRPageFeature_{$md5FeatureNameKey}"); ?>
                                                <?php endif; ?>
                                        <?php else: ?>
                                                <?= $this->input("CCHRPageFeature_{$md5FeatureNameKey}") ?>
                                        <?php endif; ?>
                                    </h2>
                                    <p>
                                        <?php if($this->editmode): ?>
                                                <?php if($this->input("CCHRPageFeature_{$md5FeatureNameKey}")->isEmpty()): ?>
                                                        <?= $this->input("CCHRPageFeature_{$md5FeatureNameKey}")->setDataFromResource($feature['FeatureDescription']) ?>
                                                <?php else: ?>
                                                        <?= $this->input("CCHRPageFeature_{$md5FeatureNameKey}"); ?>
                                                <?php endif; ?>
                                        <?php else: ?>
                                                <?= $this->input("CCHRPageFeature_{$md5FeatureNameKey}") ?>
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
                        
                <div class="environment-quality-sec">
                    
                    <?php
                        if($this->editmode)
                        {
                            ?>
                            <div class="media my-4">
                            <?php
                            echo $this->image("CCHRPage_tempratureImage");
                            ?>
                            </div>
                            <?php
                        }
                        else
                        {
                            $CCHRPage_tempratureImageObj =  $this->image("CCHRPage_tempratureImage");
                            if($CCHRPage_tempratureImageObj)
                            {
                            ?>
                            <div class="media my-4">
                            <img src="<?= $CCHRPage_tempratureImageObj->getThumbnail('catalog_thumb'); ?>" alt="" class="features-images w-50 ml-0"/>
                            </div>
                            <?php
                            }
                        }
                    ?>
                    <?php if($singleProductPage['Level4ObjChildData']) {  ?>
                    <div class="media-body pr-4">
                            <table class="solar-shield-table">
                                    <?php 
                                        foreach ($singleProductPage['Level4ObjChildData'] as $chKey => $chValue) {
                                        ?>
                                            <tr>
                                                <td class="orange" width="15%"><?= $chValue['Name'] ?></td>
                                                <td width="80%"><?= $chValue['LongText'] ?></td>
                                            </tr>
                                        <?php
                                        }
                                    ?>
                            </table>

                            <?php if($this->editmode): ?>
                                <p class="note">
                                    <?= $this->textarea("CCHRPage_Comment"); ?>
                                </p>
                            <?php else: ?>
                                <?php if(!$this->textarea("CCHRPage_Comment")->isEmpty()): ?>
                                    <p class="note">
                                        <?= $this->textarea("CCHRPage_Comment") ?>
                                    </p>
                                <?php endif; ?>
                            <?php endif; ?>
                    </div>
                    <?php } ?>
                </div>

                <div class="belts-information">
                    <h1><span class="orange">
                        <strong>
                            <?php if($this->editmode): ?>
                                    <?php if($this->input("CC_TableTitle")->isEmpty()): ?>
                                            <?= $this->input("CC_TableTitle",['placeholder'=>'Cover Compounds']) ?>
                                    <?php else: ?>
                                            <?= $this->input("CC_TableTitle"); ?>
                                    <?php endif; ?>
                            <?php else: ?>
                                    <?= $this->input("CC_TableTitle") ?>
                            <?php endif; ?>
                        
                        </strong>  
                    </h1>
                    <div class="cover-compounds-table">
                        <table width="100%">
                            <thead>
                                <tr>
                                <?php
                                    $coverCompoundsHeaderKeys = $data['coverCompoundsHeaderKeys'];
                                    $firstKey = array_key_first($coverCompoundsHeaderKeys);
                                    $colSpan = count($coverCompoundsHeaderKeys);
                                    foreach ($coverCompoundsHeaderKeys as $hkey => $headerValue) {
                                        if($firstKey == $hkey)
                                        {
                                            $style = 'align="left"';
                                        }
                                        ?>
                                            <th <?= $style; ?> width="8%"><?= $headerValue; ?></th>
                                        <?php
                                    }
                                ?>
                                </tr>
                            </thead>

                            <?php
                                $coverCompounds = $data['coverCompounds'];
                                foreach ($coverCompounds as $coverCompoundType => $coverCompoundArray) {
                                    ?>
                                    <thead>
                                        <tr>
                                            <th colspan="<?= $colSpan; ?>" class="orange-bg" align="left"><?= $coverCompoundType; ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($coverCompoundArray as $cc => $ccArr) {
                                        ?>
                                        <tr align="center">
                                        <?php
                                        $firstKey = array_key_first($ccArr);
                                        foreach ($ccArr as $tdKey => $tdValue) {
                                            if($firstKey == $tdKey)
                                            {
                                                $style = 'align="left"';
                                            }
                                            ?>
                                            <td <?= $style; ?>><?= $tdValue; ?></td>
                                            <?php
                                        }
                                        ?>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                    <?php

                                }
                            ?>
                            
                        </table>
                    </div>
                </div>
            </section>
        </main>
        <footer id="footer1" >
            <div class="footer-logo"><img src="/static/cbs/images/continental_logo.png" alt="" /></div>
        </footer>
    </div>

<?php endif; ?>