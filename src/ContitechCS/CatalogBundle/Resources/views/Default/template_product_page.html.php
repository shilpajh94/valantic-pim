<?php
if (!isset($this->parentContainer)) {
$this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
}
?>

<?php if($this->editmode): ?>
        <?= $this->relation("cbs_template_product_page", [
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
            <div class="header-txt"><strong>
            
            <?php if($this->editmode): ?>
                    <?php if($this->input("PP_HierarchyNameLevel1")->isEmpty()): ?>
                            <?= $this->input("PP_HierarchyNameLevel1")->setDataFromResource($data['HierarchyNameLevel1']) ?>
                    <?php else: ?>
                            <?= $this->input("PP_HierarchyNameLevel1"); ?>
                    <?php endif; ?>
            <?php else: ?>
                    <?= $this->input("PP_HierarchyNameLevel1") ?>
            <?php endif; ?>
            
            </strong> 
            <?php if($this->editmode): ?>
                    <?php if($this->input("PP_HierarchyNameLevel2")->isEmpty()): ?>
                            <?= $this->input("PP_HierarchyNameLevel2")->setDataFromResource($data['HierarchyNameLevel2']) ?>
                    <?php else: ?>
                            <?= $this->input("PP_HierarchyNameLevel2"); ?>
                    <?php endif; ?>
            <?php else: ?>
                    <?= $this->input("PP_HierarchyNameLevel2") ?>
            <?php endif; ?>
        </div>
            <div class="print-pg-no"></div>
        </div>
    </header>
    
    <main id="content" role="main">
        <section class="fortressxp-belts">
            <h1 class="orange">
            
            <strong>
            

            <?php if($this->editmode): ?>
                    <?php if($this->input("PP_ProductName")->isEmpty()): ?>
                            <?= $this->input("PP_ProductName")->setDataFromResource($data['ProductName']) ?>
                    <?php else: ?>
                            <?= $this->input("PP_ProductName"); ?>
                    <?php endif; ?>
            <?php else: ?>
                    <?= $this->input("PP_ProductName") ?>
            <?php endif; ?>
            
            
            </strong>
            
                <?php if($data['TitleTagSloganRequired']) { ?>
                    <span class="sub-title">
                        <?= $this->input("PP_TitleTagSlogan", ['placeholder'=>'TexSteel® Will Take You There']) ?>
                    </span>
                <?php } ?>
                <!-- span tag add accroding to page 55 -->
            </h1>

            <?php if($data['ShortTextRequired']) { ?>
                <?php if($this->editmode): ?>
                    <p>
                        <?php if($this->input("PP_ShortText")->isEmpty()): ?>
                                <?= $this->input("PP_ShortText")->setDataFromResource($data['ShortText']) ?>
                        <?php else: ?>
                                <?= $this->input("PP_ShortText"); ?>
                        <?php endif; ?>
                    </p>
                <?php else: ?>
                    <?php if(!$this->input("PP_ShortText")->isEmpty()): ?>
                        <p>
                        <?= $this->input("PP_ShortText") ?>
                        </p>
                    <?php endif; ?>
                <?php endif; ?>
            <?php } ?>

            <?php if($data['LongTextRequired'] || $data['ProductImageRequired']) { ?>
            <div class="media pt-0">
                <?php if($data['LongTextRequired']) { ?>
                    <?php if($this->editmode): ?>
                        <div class="media-body">
                            <p>
                            <?php if($this->input("PP_LongText")->isEmpty()): ?>
                                    <?= $this->input("PP_LongText")->setDataFromResource($data['LongText']) ?>
                            <?php else: ?>
                                    <?= $this->input("PP_LongText"); ?>
                            <?php endif; ?>
                            </p>
                        </div>
                    <?php else: ?>
                        <?php if(!$this->input("PP_LongText")->isEmpty()): ?>
                            <div class="media-body">
                                <p>
                                <?= $this->input("PP_LongText") ?>
                                </p>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php } ?>

                <?php
                    if($data['ProductImageRequired'])
                    {
                        if($this->editmode)
                        {
                            ?>
                            <div class="seal-image">
                            <?php
                            if($this->image("PP_Product_Image")->isEmpty())
                            {
                                echo $this->image("PP_Product_Image")->setImage($data['ProductImage']);
                            }
                            else{
                                echo $this->image("PP_Product_Image");
                            }
                            ?>
                            </div>
                            <?php
                            
                        }
                        else
                        {
                            $productImgSrcObj =  $this->image("PP_Product_Image");
                            if($productImgSrcObj)
                            {
                            ?>
                            <div class="seal-image">
                            <img src="<?= $productImgSrcObj->getThumbnail('catalog_thumb'); ?>" alt=""/>
                            </div>
                            <?php
                            }
                        }
                    }
                    ?>
            </div>
            <?php } ?>

            <?php if($data['FeaturesAndBenefitsWithoutImages']){ ?>
            <div class="feature-benefit-list">
                <h3><span class="orange">
                        <strong>
                        <?php if($this->editmode): ?>
                                <?php if($this->input("PPF_ProductName")->isEmpty()): ?>
                                        <?= $this->input("PPF_ProductName")->setDataFromResource($data['ProductName']) ?>
                                <?php else: ?>
                                        <?= $this->input("PPF_ProductName"); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->input("PPF_ProductName") ?>
                        <?php endif; ?>
                        
                        </strong>
                    </span> 
                    
                        <?php if($this->editmode): ?>
                                <?php if($this->input("PPF_FeatureBenefitsLabel")->isEmpty()): ?>
                                        <?= $this->input("PPF_FeatureBenefitsLabel")->setDataFromResource('Features and Benefits') ?>
                                <?php else: ?>
                                        <?= $this->input("PPF_FeatureBenefitsLabel"); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->input("PPF_FeatureBenefitsLabel") ?>
                        <?php endif; ?>
                    </h3>
                <ul>
                    <li><span class="orange">›</span> High-strength with exceptional dimensional stability</li>
                    <li><span class="orange">›</span> Rip and tear resistance that is 2-3 times that of conventional
                        conveyor belting</li>
                    <li><span class="orange">›</span> Impact resistance that far exceeds conventional conveyor
                        belting
                    </li>
                    <li><span class="orange">›</span> Outstanding puncture resistance
                    </li>
                    <li><span class="orange">›</span> Excellent flexibility and load support
                    </li>
                </ul>

                <?php if($this->editmode): ?>
                    <p>
                        <?php if($this->textarea("PPFB_Comment")->isEmpty()): ?>
                                <?= $this->textarea("PPFB_Comment")->setDataFromResource('CONTI® Titan is available in operating tensions up to 1500 PIW in 2-ply design. Combined with one of Continental’s
high-performance covers, CONTI® Titan will provide the lowest cost of ownership in demanding applications.') ?>
                        <?php else: ?>
                                <?= $this->textarea("PPFB_Comment"); ?>
                        <?php endif; ?>
                    </p>
                <?php else: ?>
                    <?php if(!$this->textarea("PPFB_Comment")->isEmpty()): ?>
                        <p>
                            <?= $this->textarea("PPFB_Comment") ?>
                        </p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <?php } ?>

            <?php if($data['ApplicationRequired'] || $data['MarketsRequired']){ ?>

            <div class="table">
                <table width="100%">
                    <thead>
                        <tr>
                            <?php if($data['MarketsRequired'] && $data['Markets']){ ?>
                                <th width="30%" class="orange">Markets</th>
                            <?php } ?>

                            <?php if($data['ApplicationRequired'] && $data['Applications']){ ?>
                                <th width="30%" class="orange">Applications</th>
                            <?php } ?>

                            <th width="30%" class="orange">Cover Compounds</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr valign="top">
                            <?php if($data['MarketsRequired'] && $data['Markets']){ ?>
                                <td>
                                    <?= $data['Markets'] ?>                                        
                                </td>
                            <?php } ?>
                            <?php if($data['ApplicationRequired'] && $data['Applications']){ ?>
                                <td>
                                    <?= $data['Applications'] ?>
                                </td>
                            <?php } ?>

                            <td>
                                <ul>
                                    <li><span class="orange">›</span> Monster Hide® Series</li>
                                    <li><span class="orange">›</span> Stacker® Series</li>
                                    <li><span class="orange">›</span> Solar-Shield® Classic</li>
                                </ul>
                                <p class="details"><?= $this->input("PP_CoverCompoundComment", ['placeholder' => 'Enter comment']) ?></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php if($this->editmode): ?>
                    <p class="note">
                        <?php if($this->input("PP_ApplicationComment")->isEmpty()): ?>
                                <?= $this->input("PP_ApplicationComment")->setDataFromResource('See the process diagram for Aggregate, Hard Rock Mining, Sand and Gravel markets on page 9 for alternative belt recommendations.') ?>
                        <?php else: ?>
                                <?= $this->input("PP_ApplicationComment"); ?>
                        <?php endif; ?>
                    </p>
                <?php else: ?>
                    <?php if(!$this->input("PP_ApplicationComment")->isEmpty()): ?>
                        <p class="note">
                        <?= $this->input("PP_ApplicationComment") ?>
                        </p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <?php } ?>

            <?php if($data['PowerOfFortressRequired']){ ?>
                <div class="components-sec">
                    

                        <?php if($this->editmode): ?>
                            <h2 class="orange">
                                <?php if($this->input("PP_PowerOfFortressTechnology")->isEmpty()): ?>
                                        <?= $this->input("PP_PowerOfFortressTechnology")->setDataFromResource('Fortified with the Power of Fortress™ Technology') ?>
                                <?php else: ?>
                                        <?= $this->input("PP_PowerOfFortressTechnology"); ?>
                                <?php endif; ?>
                            <br />
                                <?php if($this->input("PP_ConveyorBeltsComponents")->isEmpty()): ?>
                                        <?= $this->input("PP_ConveyorBeltsComponents")->setDataFromResource('Conveyor Belt Components') ?>
                                <?php else: ?>
                                        <?= $this->input("PP_ConveyorBeltsComponents"); ?>
                                <?php endif; ?>
                            </h2>
                        <?php else: ?>  
                                <?php if(!$this->input("PP_PowerOfFortressTechnology")->isEmpty() || !$this->input("PP_ConveyorBeltsComponents")->isEmpty()): ?>
                                    <h2 class="orange">
                                        <?= $this->input("PP_PowerOfFortressTechnology") ?>
                                    <br />
                                        <?= $this->input("PP_ConveyorBeltsComponents") ?>
                                    </h2>
                                <?php endif; ?>
                        <?php endif; ?>
                    
                    <div class="media">
                        <div class="media-img">
                            <?php 
                                if($this->editmode)
                                {
                                    echo $this->image("PP_ConveyorBeltsComponents_Image");
                                }
                                else
                                {
                                    $cbcImgSrcObj =  $this->image("PP_ConveyorBeltsComponents_Image");
                                    if($cbcImgSrcObj)
                                    {
                                    ?>
                                    <img src="<?= $cbcImgSrcObj->getThumbnail('catalog_thumb'); ?>" alt=""/>
                                    <?php
                                    }
                                }
                            ?>
                        </div>
                        <div class="media-body">
                            <ul class="components">
                                <?php while($this->block("PP_ConveyorBeltsComponents_Points")->loop()) { ?>
                                    <li><?= $this->input("pp_points", ['placeholder' => 'Enter comment']) ?></p1>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
            
            <?php if($data['CostPerTonRequired']){ ?>
            <div class="labels">
                <table width="100%">
                    <tr>
                        <th>
                            <?php if($this->input("PP_CostPerTon")->isEmpty()): ?>
                                    <?= $this->input("PP_CostPerTon")->setDataFromResource('Get a lower cost-per-ton conveyed') ?>
                            <?php else: ?>
                                    <?= $this->input("PP_CostPerTon"); ?>
                            <?php endif; ?>
                        </th>
                        <th class="orange-bg">
                            <?php if($this->input("PP_TensionRange")->isEmpty()): ?>
                                    <?= $this->input("PP_TensionRange")->setDataFromResource('Tension Range: 330 – 1500 PIW') ?>
                            <?php else: ?>
                                    <?= $this->input("PP_TensionRange"); ?>
                            <?php endif; ?>
                        </th>
                    </tr>
                </table>
            </div>
            <?php } ?>
	    </section>

        <?php if($data['FeaturesAndBenefitRequired'] && $data['FeaturesAndBenefits']){ ?>
        <section class="features-benefit-sec">
            <h1>
                <span class="orange">
                    <strong>

                    <?php if($this->editmode): ?>
                            <?php if($this->input("PP_FeatureText")->isEmpty()): ?>
                                    <?= $this->input("PP_FeatureText")->setDataFromResource($data['ProductName']) ?>
                            <?php else: ?>
                                    <?= $this->input("PP_FeatureText"); ?>
                            <?php endif; ?>
                    <?php else: ?>
                            <?= $this->input("PP_FeatureText") ?>
                    <?php endif; ?>
                    
                    </strong>
                </span>
                
                <?php if($this->input("PP_FeaturesBeneFit")->isEmpty()): ?>
                        <?= $this->input("PP_FeaturesBeneFit")->setDataFromResource('Features and Benefits') ?>
                <?php else: ?>
                        <?= $this->input("PP_FeaturesBeneFit"); ?>
                <?php endif; ?>
            
            </h1>

            <?php if($data['FeaturesAndBenefits']) { 
                foreach ($data['FeaturesAndBenefits'] as $fkey => $feature) {
                    $md5FeatureNameKey = md5($feature['FeatureName']);
                ?>
                    <div class="media">
                        <?php
                            if($this->editmode)
                            {
                                if($this->image("PPFI_{$md5FeatureNameKey}")->isEmpty())
                                {
                                    echo $this->image("PPFI_{$md5FeatureNameKey}")->setImage($feature['FeatureImage']);
                                }
                                else{
                                    echo $this->image("PPFI_{$md5FeatureNameKey}");
                                }
                            }
                            else
                            {
                                $PPFIImgSrcObj =  $this->image("PPFI_{$md5FeatureNameKey}");
                                if($PPFIImgSrcObj)
                                {
                                ?>
                                <img src="<?= $PPFIImgSrcObj->getThumbnail('catalog_thumb'); ?>" class="features-images" alt=""/>
                                <?php
                                }
                            }
                        ?>
                        
                        <div class="media-body">
                            <h2 class="orange">
                                <?php if($this->editmode): ?>
                                        <?php if($this->input("PPFN_{$md5FeatureNameKey}")->isEmpty()): ?>
                                                <?= $this->input("PPFN_{$md5FeatureNameKey}")->setDataFromResource($feature['FeatureName']) ?>
                                        <?php else: ?>
                                                <?= $this->input("PPFN_{$md5FeatureNameKey}"); ?>
                                        <?php endif; ?>
                                <?php else: ?>
                                        <?= $this->input("PPFN_{$md5FeatureNameKey}") ?>
                                <?php endif; ?>
                            </h2>
                            <p>
                                <?php if($this->editmode): ?>
                                        <?php if($this->input("PPFD_{$md5FeatureNameKey}")->isEmpty()): ?>
                                                <?= $this->input("PPFD_{$md5FeatureNameKey}")->setDataFromResource($feature['FeatureDescription']) ?>
                                        <?php else: ?>
                                                <?= $this->input("PPFD_{$md5FeatureNameKey}"); ?>
                                        <?php endif; ?>
                                <?php else: ?>
                                        <?= $this->input("PPFD_{$md5FeatureNameKey}") ?>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
            <?php 
                }
            } ?>
        </section>
        <?php } ?>

        <section class="belts-information">
            <h1>
            <span class="orange">
            <strong>
            <?php if($this->editmode): ?>
                    <?php if($this->input("PP_MoreInfoHeading")->isEmpty()): ?>
                            <?= $this->input("PP_MoreInfoHeading")->setDataFromResource($data['ProductName']) ?>
                    <?php else: ?>
                            <?= $this->input("PP_MoreInfoHeading"); ?>
                    <?php endif; ?>
            <?php else: ?>
                    <?= $this->input("PP_MoreInfoHeading") ?>
            <?php endif; ?>
            
            </strong>
            
            </span> 

            <?php if($this->editmode): ?>
                    <?php if($this->input("PP_MoreInfo")->isEmpty()): ?>
                            <?= $this->input("PP_MoreInfo")->setDataFromResource('Belt Information') ?>
                    <?php else: ?>
                            <?= $this->input("PP_MoreInfo"); ?>
                    <?php endif; ?>
            <?php else: ?>
                    <?= $this->input("PP_MoreInfo") ?>
            <?php endif; ?>
            
            </h1>


            <?php if(isset($data['productTables']['Conveyor Belt Data'])){ ?>
            <h3>
            <strong>
            <?php if($this->editmode): ?>
                    <?php if($this->input("PP_Conveyor_Belt_Data")->isEmpty()): ?>
                            <?= $this->input("PP_Conveyor_Belt_Data")->setDataFromResource($data['ProductName']. ' Conveyor Belt Data') ?>
                    <?php else: ?>
                            <?= $this->input("PP_Conveyor_Belt_Data"); ?>
                    <?php endif; ?>
            <?php else: ?>
                    <?= $this->input("PP_Conveyor_Belt_Data") ?>
            <?php endif; ?>
            
            </strong>
            </h3>

            <div class="table-data">
            <?php
                $conveyorBeltData = $data['productTables']['Conveyor Belt Data'];
                $TableComment = $conveyorBeltData['TableComment'];
                unset($conveyorBeltData['TableComment']);
                
                foreach ($conveyorBeltData as $key => $value) {
                
                ?>
            
                <table width="100%">
                    <thead>
                        <tr align="left" class="orange-bg">
                            <th colspan="<?= $value['theadfirstRowColspan'] ?>"><?= $key ?></th>
                        </tr>
                        <?php 
                            $theadSecondRow = $value['theadSecondRow'];
                            ?>
                            <tr class="grey-bg">
                            <?php
                            $firstKey = array_key_first($theadSecondRow);
                            foreach($theadSecondRow as $key => $td)
                            {
                                $style = '';
                                    if($firstKey == $key){
                                        $style = 'align="left" width="21.1%"';
                                    }
                                    else{
                                        $style = 'width="9.2%"';
                                    }
                                ?>
                                <th <?= $style; ?>><?= $td ?></th>
                            <?php
                            }
                            ?>
                            </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $tbody = $value['tbody'];
                            
                            foreach($tbody as $key => $trows)
                            {
                                ?>
                                <tr align="center">
                                <?php
                                $firstKey = array_key_first($trows);
                                foreach($trows as $key => $value)
                                {
                                    $style = '';
                                        if($firstKey == $key){
                                            $style = 'align="left"';
                                        }
                                    ?>
                                    <td <?= $style; ?>><?= $value ?></td>
                                <?php
                                }
                                ?>
                                </tr>
                                <?php
                            }
                            ?>
                    </tbody>
                </table>
                <?php 
                } 
            ?>
            </div>

                <?php if($this->editmode): ?>
                    <p class="note">
                        <?php if($this->textarea("PP_Conveyor_Belt_Data_Comment")->isEmpty()): ?>
                                <?= $this->textarea("PP_Conveyor_Belt_Data_Comment")->setDataFromResource($TableComment) ?>
                        <?php else: ?>
                                <?= $this->textarea("PP_Conveyor_Belt_Data_Comment"); ?>
                        <?php endif; ?>
                    </p>
                <?php else: ?>
                    <?php if(!$this->textarea("PP_Conveyor_Belt_Data_Comment")->isEmpty()): ?>
                        <p class="note">
                            <?= $this->textarea("PP_Conveyor_Belt_Data_Comment") ?>
                        </p>
                    <?php endif; ?>
                <?php endif; ?>

            <?php 
            }
            ?>

            <?php if(isset($data['productTables']['Load Support – Maximum Belt Width Data'])){ ?>
            <h3>
                <strong>
                <?php if($this->editmode): ?>
                        <?php if($this->input("PP_Load_Support_Maximum_Belt")->isEmpty()): ?>
                                <?= $this->input("PP_Load_Support_Maximum_Belt")->setDataFromResource($data['ProductName']. ' Load Support – Maximum Belt Width Data') ?>
                        <?php else: ?>
                                <?= $this->input("PP_Load_Support_Maximum_Belt"); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("PP_Load_Support_Maximum_Belt") ?>
                <?php endif; ?>
                
                </strong>
            </h3>
            
            <div class="table-data mt-4">
            <?php 
                
                $LoadSupportMaximumBeltWidthData = $data['productTables']['Load Support – Maximum Belt Width Data'];
                $TableComment = $LoadSupportMaximumBeltWidthData['TableComment'];
                unset($LoadSupportMaximumBeltWidthData['TableComment']);
                
                foreach ($LoadSupportMaximumBeltWidthData as $key => $value) {
                   
                ?>
            
                <table width="100%">
                    <thead>
                        <tr class="orange-bg">
                            <th colspan="<?= $value['theadfirstRowColspan'] ?>" align="left" ><?= $key ?></th>
                        </tr>

                        <tr class="white-bg">
                        <?php
                        $theadSecondRowGroup = $value['theadSecondRowGroup'];
                        $firstKey = array_key_first($theadSecondRowGroup);
                        // $firstKey = array_key_first($theadSecondRow);
                        foreach($theadSecondRowGroup as $key => $colspan)
                        {
                            $style = '';
                                if($firstKey == $key){
                                    $style = 'align="left"';
                                }

                            ?>
                            <th colspan="<?= $colspan ?>" <?= $style ?>><?= $key ?></th>
                        <?php
                        }
                        ?>
                        </tr>
                        
                        <tr class="white-bg">
                        <?php
                        $theadSecondRow = $value['theadSecondRow'];
                        $firstKey = array_key_first($theadSecondRow);
                        foreach($theadSecondRow as $key => $td)
                        {
                            $style = '';
                                if($firstKey == $key){
                                    $style = 'align="left" width="13.6%"';
                                }
                                else{
                                    $style = 'width="7.2%"';
                                }
                            ?>
                            <th <?= $style; ?>><?= $td ?></th>
                        <?php
                        }
                        ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $tbody = $value['tbody'];
                            
                            foreach($tbody as $key => $trows)
                            {
                                ?>
                                <tr align="center">
                                <?php
                                $firstKey = array_key_first($trows);
                                foreach($trows as $key => $value)
                                {
                                    $style = '';
                                        if($firstKey == $key){ ?>
                                            <th align="left" class="grey-bg border-bottom-0" scope="row"><?= $value ?></th>
                                        <?php }else{ ?>
                                            <td><?= $value ?></td>
                                        <?php } ?>
                                <?php
                                }
                                ?>
                                </tr>
                                <?php
                            }
                            ?>
                    </tbody>
                </table>
                
                <?php 
                }
                
            ?>
                
            </div>
                <?php if($this->editmode): ?>
                    <p class="note">
                        <?php if($this->textarea("PP_Load_Support_Maximum_Belt_Comment")->isEmpty()): ?>
                                <?= $this->textarea("PP_Load_Support_Maximum_Belt_Comment")->setDataFromResource($TableComment) ?>
                        <?php else: ?>
                                <?= $this->textarea("PP_Load_Support_Maximum_Belt_Comment"); ?>
                        <?php endif; ?>
                    </p>
                <?php else: ?>
                    <?php if(!$this->textarea("PP_Load_Support_Maximum_Belt_Comment")->isEmpty()): ?>
                        <p class="note">
                            <?= $this->textarea("PP_Load_Support_Maximum_Belt_Comment") ?>
                        </p>
                    <?php endif; ?>
                <?php endif; ?>
            <?php 
            }
            ?>

            <?php if(isset($data['productTables']['Troughability Minimum Belt Width'])){ ?>
            <h3>
                <strong>
                <?php if($this->editmode): ?>
                        <?php if($this->input("PP_Troughability_Minimum_Belt_Width")->isEmpty()): ?>
                                <?= $this->input("PP_Troughability_Minimum_Belt_Width")->setDataFromResource($data['ProductName']. ' Troughability Minimum Belt Width') ?>
                        <?php else: ?>
                                <?= $this->input("PP_Troughability_Minimum_Belt_Width"); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("PP_Troughability_Minimum_Belt_Width") ?>
                <?php endif; ?>
                
                </strong>
            </h3>
            
            <div class="table-data mt-4">

            <?php 
                
                $TroughabilityMinimumBeltWidth = $data['productTables']['Troughability Minimum Belt Width'];
                $TableComment = $TroughabilityMinimumBeltWidth['TableComment'];
                unset($TroughabilityMinimumBeltWidth['TableComment']);
                
                foreach ($TroughabilityMinimumBeltWidth as $key => $value) {
                   
                ?>
                <table width="100%">
                    <thead>
                        <tr class="orange-bg">
                            <th colspan="<?= $value['theadfirstRowColspan'] ?>"  align="left"><?= $key ?></th>
                        </tr>

                        <tr class="grey-bg">
                        <?php
                        $theadSecondRow = $value['theadSecondRow'];
                        // $firstKey = array_key_first($theadSecondRow);
                        foreach($theadSecondRow as $key => $td)
                        {
                            if($key < 1)
                            {
                                continue;
                            }

                            $style = '';
                                if($key == 1){
                                    $style = 'colspan="2" align="left"';
                                }
                                else{
                                    $style = 'width="8.8%"';
                                }
                            ?>
                            <th <?= $style; ?>><?= $td ?></th>
                        <?php
                        }
                        ?>
                        </tr>
                        
                    </thead>
                    <tbody>
                        <?php 
                            $tbody = $value['tbody'];
                            $onlyOnce = false;
                            $onlyOnceStyle = false;
                            foreach($tbody as $key => $trows)
                            {
                                ?>
                                <tr align="center">
                                <?php

                                $onlyOnceData = $trows[0];
                                
                                unset($trows[0]);
                                if(!$onlyOnce)
                                {
                                    ?>
                                <th rowspan="3" class="border-0 w-20"><?= $onlyOnceData ?></th>
                                <?php
                                $onlyOnce = true;
                                }

                                $firstKey = array_key_first($trows);
                                foreach($trows as $key => $value)
                                {
                                    $style = '';
                                    if($firstKey == $key){
                                        $style = 'align="left"';
                                    }

                                    if(!$onlyOnceStyle)
                                    {
                                        $style .= ' class="border-right w-20"';
                                        $onlyOnceStyle = true;
                                    }
                                    ?>
                                    <td <?= $style; ?>><?= $value ?></td>
                                <?php
                                }
                                ?>
                                </tr>
                                <?php
                            }
                            ?>
                    </tbody> 
                </table>
                
                <?php 
                }
                
            ?>
                
            </div>
                <?php if($this->editmode): ?>
                    <p class="note">
                        <?php if($this->textarea("PP_Troughability_Minimum_Belt_Width_Comment")->isEmpty()): ?>
                                <?= $this->textarea("PP_Troughability_Minimum_Belt_Width_Comment")->setDataFromResource($TableComment) ?>
                        <?php else: ?>
                                <?= $this->textarea("PP_Troughability_Minimum_Belt_Width_Comment"); ?>
                        <?php endif; ?>
                    </p>
                <?php else: ?>
                    <?php if(!$this->textarea("PP_Troughability_Minimum_Belt_Width_Comment")->isEmpty()): ?>
                        <p class="note">
                            <?= $this->textarea("PP_Troughability_Minimum_Belt_Width_Comment") ?>
                        </p>
                    <?php endif; ?>
                <?php endif; ?>

            <?php 
            }
            ?>

            <?php if(isset($data['productTables']['Minimum Pulley Diameters'])){ ?>
            <h3>
            <strong>
            <?php if($this->editmode): ?>
                    <?php if($this->input("PP_Minimum_Pulley_Diameters")->isEmpty()): ?>
                            <?= $this->input("PP_Minimum_Pulley_Diameters")->setDataFromResource($data['ProductName']. ' Minimum Pulley Diameters') ?>
                    <?php else: ?>
                            <?= $this->input("PP_Minimum_Pulley_Diameters"); ?>
                    <?php endif; ?>
            <?php else: ?>
                    <?= $this->input("PP_Minimum_Pulley_Diameters") ?>
            <?php endif; ?>
            
            </strong>
            </h3>

            <div class="table-data">
            <?php
                $MinimumPulleyDiameters = $data['productTables']['Minimum Pulley Diameters'];
                $TableComment = $MinimumPulleyDiameters['TableComment'];
                unset($MinimumPulleyDiameters['TableComment']);
                
                foreach ($MinimumPulleyDiameters as $key => $value) {
                
                ?>
            
                <table width="100%">
                    <thead>
                        <tr align="left" class="orange-bg">
                            <th colspan="<?= $value['theadfirstRowColspan'] ?>"><?= $key ?></th>
                        </tr>
                        <?php 
                            $theadSecondRow = $value['theadSecondRow'];
                            ?>
                            <tr class="grey-bg">
                            <?php
                            $firstKey = array_key_first($theadSecondRow);
                            foreach($theadSecondRow as $key => $td)
                            {
                                $style = '';
                                    if($firstKey == $key){
                                        $style = 'align="left" width="21.1%"';
                                    }
                                ?>
                                <th <?= $style; ?>><?= $td ?></th>
                            <?php
                            }
                            ?>
                            </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $tbody = $value['tbody'];
                            
                            foreach($tbody as $key => $trows)
                            {
                                ?>
                                <tr align="center">
                                <?php
                                $firstKey = array_key_first($trows);
                                foreach($trows as $key => $value)
                                {
                                    $style = '';
                                        if($firstKey == $key){
                                            $style = 'align="left"';
                                        }
                                    ?>
                                    <td <?= $style; ?>><?= $value ?></td>
                                <?php
                                }
                                ?>
                                </tr>
                                <?php
                            }
                            ?>
                    </tbody>
                </table>
                <?php 
                } 
            ?>
            </div>
                <?php if($this->editmode): ?>
                    <p class="note">
                        <?php if($this->textarea("PP_Minimum_Pulley_Diameters_Comment")->isEmpty()): ?>
                                <?= $this->textarea("PP_Minimum_Pulley_Diameters_Comment")->setDataFromResource($TableComment) ?>
                        <?php else: ?>
                                <?= $this->textarea("PP_Minimum_Pulley_Diameters_Comment"); ?>
                        <?php endif; ?>
                    </p>
                <?php else: ?>
                    <?php if(!$this->textarea("PP_Minimum_Pulley_Diameters_Comment")->isEmpty()): ?>
                        <p class="note">
                            <?= $this->textarea("PP_Minimum_Pulley_Diameters_Comment") ?>
                        </p>
                    <?php endif; ?>
                <?php endif; ?>

            <?php 
            }
            ?>

            <?php if(isset($data['productTables']['Elevator Belt Data'])){ ?>
            <h3>
            <strong>
            <?php if($this->editmode): ?>
                    <?php if($this->input("PP_Elevator_Belt_Data")->isEmpty()): ?>
                            <?= $this->input("PP_Elevator_Belt_Data")->setDataFromResource($data['ProductName']. ' Elevator Belt Data') ?>
                    <?php else: ?>
                            <?= $this->input("PP_Elevator_Belt_Data"); ?>
                    <?php endif; ?>
            <?php else: ?>
                    <?= $this->input("PP_Elevator_Belt_Data") ?>
            <?php endif; ?>
            
            </strong>
            </h3>

            <div class="table-data">
            <?php
                $ElevatorBeltData = $data['productTables']['Elevator Belt Data'];
                $TableComment = $ElevatorBeltData['TableComment'];
                unset($ElevatorBeltData['TableComment']);

                
                foreach ($ElevatorBeltData as $key => $value) {
                
                ?>
            
                <table width="100%">
                    <thead>
                        <tr align="left" class="orange-bg">
                            <th colspan="<?= $value['theadfirstRowColspan'] ?>"><?= $key ?></th>
                        </tr>
                        <?php 
                            $theadSecondRow = $value['theadSecondRow'];
                            ?>
                            <tr class="grey-bg">
                            <?php
                            $firstKey = array_key_first($theadSecondRow);
                            foreach($theadSecondRow as $key => $td)
                            {
                                $style = '';
                                    if($firstKey == $key){
                                        $style = 'align="left" width="21.1%"';
                                    }
                                ?>
                                <th <?= $style; ?>><?= $td ?></th>
                            <?php
                            }
                            ?>
                            </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $tbody = $value['tbody'];
                            
                            foreach($tbody as $key => $trows)
                            {
                                ?>
                                <tr align="center">
                                <?php
                                $firstKey = array_key_first($trows);
                                foreach($trows as $key => $value)
                                {
                                    $style = '';
                                        if($firstKey == $key){
                                            $style = 'align="left"';
                                        }
                                    ?>
                                    <td <?= $style; ?>><?= $value ?></td>
                                <?php
                                }
                                ?>
                                </tr>
                                <?php
                            }
                            ?>
                    </tbody>
                </table>
                <?php 
                } 
            ?>
            </div>
                <?php if($this->editmode): ?>
                    <p class="note">
                        <?php if($this->textarea("PP_Elevator_Belt_Data_Comment")->isEmpty()): ?>
                                <?= $this->textarea("PP_Elevator_Belt_Data_Comment")->setDataFromResource($TableComment) ?>
                        <?php else: ?>
                                <?= $this->textarea("PP_Elevator_Belt_Data_Comment"); ?>
                        <?php endif; ?>
                    </p>
                <?php else: ?>
                    <?php if(!$this->textarea("PP_Elevator_Belt_Data_Comment")->isEmpty()): ?>
                        <p class="note">
                            <?= $this->textarea("PP_Elevator_Belt_Data_Comment") ?>
                        </p>
                    <?php endif; ?>
                <?php endif; ?>

            <?php 
            }
            ?>

            <?php if(isset($data['productTables']['Maximum Bucket Projection'])){ ?>
            <h3>
            <strong>
            <?php if($this->editmode): ?>
                    <?php if($this->input("PP_Maximum_Bucket_Projection")->isEmpty()): ?>
                            <?= $this->input("PP_Maximum_Bucket_Projection")->setDataFromResource($data['ProductName']. ' Maximum Bucket Projection') ?>
                    <?php else: ?>
                            <?= $this->input("PP_Maximum_Bucket_Projection"); ?>
                    <?php endif; ?>
            <?php else: ?>
                    <?= $this->input("PP_Maximum_Bucket_Projection") ?>
            <?php endif; ?>
            
            </strong>
            </h3>

            <div class="table-data">
            <?php
                $MaximumBucketProjection = $data['productTables']['Maximum Bucket Projection'];
                $TableComment = $MaximumBucketProjection['TableComment'];
                unset($MaximumBucketProjection['TableComment']);
                
                foreach ($MaximumBucketProjection as $key => $value) {
                
                ?>
            
                <table width="100%">
                    <thead>
                        <tr align="left" class="orange-bg">
                            <th colspan="<?= $value['theadfirstRowColspan'] ?>"><?= $key ?></th>
                        </tr>
                        <?php 
                            $theadSecondRow = $value['theadSecondRow'];
                            ?>
                            <tr class="grey-bg">
                            <?php
                            $firstKey = array_key_first($theadSecondRow);
                            foreach($theadSecondRow as $key => $td)
                            {
                                $style = '';
                                    if($firstKey == $key){
                                        $style = 'align="left" width="21.1%"';
                                    }
                                ?>
                                <th <?= $style; ?>><?= $td ?></th>
                            <?php
                            }
                            ?>
                            </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $tbody = $value['tbody'];
                            
                            foreach($tbody as $key => $trows)
                            {
                                ?>
                                <tr align="center">
                                <?php
                                $firstKey = array_key_first($trows);
                                foreach($trows as $key => $value)
                                {
                                    $style = '';
                                        if($firstKey == $key){
                                            $style = 'align="left"';
                                        }
                                    ?>
                                    <td <?= $style; ?>><?= $value ?></td>
                                <?php
                                }
                                ?>
                                </tr>
                                <?php
                            }
                            ?>
                    </tbody>
                </table>
                <?php 
                } 
            ?>
            </div>
                <?php if($this->editmode): ?>
                    <p class="note">
                        <?php if($this->textarea("PP_Maximum_Bucket_Projection_Comment")->isEmpty()): ?>
                                <?= $this->textarea("PP_Maximum_Bucket_Projection_Comment")->setDataFromResource($TableComment) ?>
                        <?php else: ?>
                                <?= $this->textarea("PP_Maximum_Bucket_Projection_Comment"); ?>
                        <?php endif; ?>
                    </p>
                <?php else: ?>
                    <?php if(!$this->textarea("PP_Maximum_Bucket_Projection_Comment")->isEmpty()): ?>
                        <p class="note">
                            <?= $this->textarea("PP_Maximum_Bucket_Projection_Comment") ?>
                        </p>
                    <?php endif; ?>
                <?php endif; ?>

            <?php 
            }
            ?>

            <?php if(isset($data['productTables']['Standard Specifications'])){ ?>
            <h3>
            <strong>
            <?php if($this->editmode): ?>
                    <?php if($this->input("PP_Standard_Specifications")->isEmpty()): ?>
                            <?= $this->input("PP_Standard_Specifications")->setDataFromResource($data['ProductName']. ' Standard Specifications') ?>
                    <?php else: ?>
                            <?= $this->input("PP_Standard_Specifications"); ?>
                    <?php endif; ?>
            <?php else: ?>
                    <?= $this->input("PP_Standard_Specifications") ?>
            <?php endif; ?>
            
            </strong>
            </h3>

            <div class="table-data">
            <?php
                $StandardSpecifications = $data['productTables']['Standard Specifications'];
                
                foreach ($StandardSpecifications as $key => $value) {
                
                ?>
            
                <table width="100%">
                    <thead>
                        <tr align="left" class="orange-bg">
                            <th colspan="<?= $value['theadfirstRowColspan'] ?>"><?= $key ?></th>
                        </tr>
                        <?php 
                            $theadSecondRow = $value['theadSecondRow'];
                            ?>
                            <tr class="grey-bg">
                            <?php
                            $firstKey = array_key_first($theadSecondRow);
                            foreach($theadSecondRow as $key => $td)
                            {
                                $style = '';
                                    if($firstKey == $key){
                                        $style = 'align="left" width="21.1%"';
                                    }
                                ?>
                                <th <?= $style; ?>><?= $td ?></th>
                            <?php
                            }
                            ?>
                            </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $tbody = $value['tbody'];
                            
                            foreach($tbody as $key => $trows)
                            {
                                ?>
                                <tr align="center">
                                <?php
                                $firstKey = array_key_first($trows);
                                foreach($trows as $key => $value)
                                {
                                    $style = '';
                                        if($firstKey == $key){
                                            $style = 'align="left"';
                                        }
                                    ?>
                                    <td <?= $style; ?>><?= $value ?></td>
                                <?php
                                }
                                ?>
                                </tr>
                                <?php
                            }
                            ?>
                    </tbody>
                </table>
                <?php 
                } 
            ?>
            </div>
                <?php if($this->editmode): ?>
                    <?= $this->textarea('PP_Standard_Specifications_Comment', ['class'=>'note']); ?>
                <?php else: ?>
                    <p class="note"><?= $this->textarea('PP_Standard_Specifications_Comment'); ?></p>
                <?php endif; ?>

            <?php 
            }
            ?>

        </section>
    </main>
    <footer id="footer" class="footer">
        <img src="/static/cbs/images/continental_logo.png" alt="" class="img-fluid" width="150">
    </footer>
</div>
<?php endif; ?>