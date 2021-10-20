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
                "classes" => ["CSCatalogTables"],
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

                <h1 class="orange">Solar-Shield® Heat Resistant Compounds</h1>
                    <p>Solar-Shield® series of heat resistant compounds offer high performance in extremely hot material
                        applications. Solar-Shield® compounds maintain their physical properties through continuous exposure.
                        This ability to resist the effects of continuous exposure to elevated temperatures results in longer belt
                        life leading to better customer results.</p>

                        <img src="/static/cbs/images/solar-shield-com-img.png" alt="" class="w-100">

                        <div class="features-benefit-sec">
                            <div class="media">
                                <img src="/static/cbs/images/picture1.png" class="features-images" alt="">
                                <div class="media-body">
                                    <h2 class="orange">Solar-Shield® carcass with fiberglass reinforcement</h2>
                                    <p>The fiberglass fabric option offers the highest degree of burn-through resistance
                                        of any currently available fabric reinforcement.</p>
                                </div>
                            </div>
                        </div>

                        <div class="environment-quality-sec">
                            <div class="media my-4">
                                <img src="/static/cbs/images/solar-shield-img.png" alt="" class="features-images w-50 ml-0">

                                <div class="media-body pr-4">
                                       <table class="solar-shield-table">
                                               <tr>
                                                   <td class="orange" width="15%">Solar-Shield®
                                                    Classic</td>
                                                    <td width="80%">A compound formulated for excellent heat and
                                                        abrasion resistance up to 350°F (180°C).</td>
                                                   </tr>
                                                   <tr>
                                                    <td class="orange">Solar-Shield®
                                                        Plus</td>
                                                     <td>A compound designed to retain flexibility while
                                                        conveying materials with higher temperatures.
                                                        Resists cover cracks and carcass delamination when
                                                        intermittently exposed to loads up to 400°F (200°C)
                                                        for longer life and reduced operating costs.</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="orange">Solar-Shield®
                                                            Extreme
                                                            </td>
                                                            <td>An exceptional hot material compound with superior
                                                                heat resistance against hardening and cracking.
                                                                Designed to handle hot material loads intermittently
                                                                up to 750°F (400°C). Improved heat resistance means
                                                                longer belt life.</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="orange">Solar-Shield®
                                                            Extreme
                                                            </td>
                                                            <td>An exceptional hot material compound with superior
                                                                heat resistance against hardening and cracking.
                                                                Designed to handle hot material loads intermittently
                                                                up to 750°F (400°C). Improved heat resistance means
                                                                longer belt life.</td>
                                                    </tr>
                                       </table>
                                       <p class="note">*The maximum allowable temperatures are influenced by the type and form of material, the time influence
                                        and the construction of the installation. In closed systems (e.g. elevator belt, pipe conveyor) the permissible
                                        temperature drops accordingly. Temperatures of the conveyed materials can be higher, depending on the size
                                        of the material pieces and on the operating conditions.</p>
                                </div>
                        
                            </div>
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
                            <p class="note">*Sliderback is not recommended for systems that use variable speed drives. </p>
                        </div


                            
            </section>
            
        </main>
        <footer id="footer1" >
            <div class="footer-logo"><img src="/static/cbs/images/continental_logo.png" alt="" /></div>
        </footer>
    </div>

<?php endif; ?>