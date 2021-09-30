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
<div class="wrapper">
    <header id="header">
        <div class="header-sec">
            <div class="header-txt"><strong>Conveying Solutions</strong> 
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
            <p>
            
            <?php if($this->editmode): ?>
                    <?php if($this->input("PP_ShortText")->isEmpty()): ?>
                            <?= $this->input("PP_ShortText")->setDataFromResource($data['ShortText']) ?>
                    <?php else: ?>
                            <?= $this->input("PP_ShortText"); ?>
                    <?php endif; ?>
            <?php else: ?>
                    <?= $this->input("PP_ShortText") ?>
            <?php endif; ?>

            </p>
            <?php } ?>

            <div class="media pt-0">
                <div class="media-body">
                    <p>

                    <?php if($this->editmode): ?>
                            <?php if($this->input("PP_LongText")->isEmpty()): ?>
                                    <?= $this->input("PP_LongText")->setDataFromResource($data['LongText']) ?>
                            <?php else: ?>
                                    <?= $this->input("PP_LongText"); ?>
                            <?php endif; ?>
                    <?php else: ?>
                            <?= $this->input("PP_LongText") ?>
                    <?php endif; ?>
                    
                    </p>
                </div>
                
                <?php
                    if($data['ProductImageRequired'] && $data['ProductImage'])
                    {
                    ?>
                    <div class="seal-image">
                    <img src="<?= $data['ProductImage']->getThumbnail('catalog_thumb'); ?>" alt="">
                    </div>
                    <?php
                    }
                ?>

                
            </div>

            <?php if($data['FeaturesRequired']){ ?>
            <div class="feature-benefit-list">
                <h3><span class="orange"><strong>CONTI<sup>®</sup> Titan</strong></span> Features and Benefits</h3>
                <!-- <p>CONTI<sup>®</sup> Titan is available in operating tensions up to 1500 PIW in 2-ply design.
                    Combined with one of Continental’s
                    high-performance covers, CONTI® Titan will provide the lowest cost of ownership in demanding
                    applications.</p> -->

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
                <p>CONTI<sup>®</sup> Titan is available in operating tensions up to 1500 PIW in 2-ply design.
                    Combined with one of Continental’s
                    high-performance covers, CONTI® Titan will provide the lowest cost of ownership in demanding
                    applications.</p>

                <!-- <h3><strong>Designed for Extreme Environments </strong></h3>
                    <p>Phoenix Phoenocord® conveyor belts are available up to a breaking strength of 10,000 N/mm and a width of 3,200 mm.
                        Belts can be manufactured in lengths weighing up to an incredible 60 metric tons. With decades of experience and
                        outstanding research and development, Phoenix Phoenocord® belts have been proven to handle the most extreme
                        conveyor belt applications. </p> -->

            </div>
            <?php } ?>

            <?php if($data['IsApplicationAvailable'] || $data['IsMarketsAvailable']){ ?>

            <div class="table">
                <table width="100%">
                    <thead>
                        <tr>
                            <?php if($data['IsMarketsAvailable']){ ?>
                                <th width="30%" class="orange">Markets</th>
                            <?php } ?>

                            <?php if($data['IsApplicationAvailable']){ ?>
                                <th width="30%" class="orange">Applications</th>
                            <?php } ?>

                            <th width="30%" class="orange">Cover Compounds</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr valign="top">
                            <?php if($data['IsMarketsAvailable']){ ?>
                                <td>
                                    <?= $data['Markets'] ?>                                        
                                </td>
                            <?php } ?>
                            <?php if($data['IsApplicationAvailable']){ ?>
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
                <p class="note">
                <?= $this->input("PP_ApplicationComment", ['placeholder' => 'Enter comment']) ?>
                </p>
            </div>

            <?php } ?>

            <?php if($data['PowerOfFortressRequired']){ ?>
                <div class="components-sec">
                    <h2 class="orange">
                    
                        <?= $this->input("PP_PowerOfFortressTechnology", ['placeholder' => 'Enter comment']) ?>
                    
                    <br />
                        <?= $this->input("PP_ConveyorBeltsComponents", ['placeholder' => 'Enter comment']) ?>
                        
                    </h2>
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
                            <?= $this->input("PP_CostPerTon", ['placeholder' => 'Get a lower cost-per-ton conveyed']) ?>
                        </th>
                        <th class="orange-bg">
                            <?= $this->input("PP_TensionRange", ['placeholder' => 'Tension Range: 330 – 1500 PIW']) ?>
                        </th>
                    </tr>
                </table>
            </div>
            <?php } ?>
	
	</section>

        <?php if($data['IsFeaturesAndBenefitAvailable']){ ?>
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
                    $md5FeatureNameKey = $feature['FeatureName'];
                ?>
                    <div class="media">

                        <?php
                            if($feature['FeatureImage'])
                            {
                            ?>
                            <img src="<?= $feature['FeatureImage']->getThumbnail('catalog_thumb'); ?>" class="features-images" alt="">
                            <?php
                            }
                        ?>
                        
                        <div class="media-body">
                            <h2 class="orange">
                                <?= $feature['FeatureName']; ?>
                            </h2>
                            <p>
                                <?= $feature['FeatureDescription']; ?>
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
                    <?= $this->textarea('PP_Conveyor_Belt_Data_Comment', ['class'=>'note']); ?>
                <?php else: ?>
                    <p class="note"><?= $this->textarea('PP_Conveyor_Belt_Data_Comment'); ?></p>
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
                    <?= $this->textarea('PP_Load_Support_Maximum_Belt_Comment', ['class'=>'note']); ?>
                <?php else: ?>
                    <p class="note"><?= $this->textarea('PP_Load_Support_Maximum_Belt_Comment'); ?></p>
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
                    <?= $this->textarea('PP_Troughability_Minimum_Belt_Width_Comment', ['class'=>'note']); ?>
                <?php else: ?>
                    <p class="note"><?= $this->textarea('PP_Troughability_Minimum_Belt_Width_Comment'); ?></p>
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
                    <?= $this->textarea('PP_Minimum_Pulley_Diameters_Comment', ['class'=>'note']); ?>
                <?php else: ?>
                    <p class="note"><?= $this->textarea('PP_Minimum_Pulley_Diameters_Comment'); ?></p>
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
                    <?= $this->textarea('PP_Elevator_Belt_Data_Comment', ['class'=>'note']); ?>
                <?php else: ?>
                    <p class="note"><?= $this->textarea('PP_Elevator_Belt_Data_Comment'); ?></p>
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
                    <?= $this->textarea('PP_Maximum_Bucket_Projection_Comment', ['class'=>'note']); ?>
                <?php else: ?>
                    <p class="note"><?= $this->textarea('PP_Maximum_Bucket_Projection_Comment'); ?></p>
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