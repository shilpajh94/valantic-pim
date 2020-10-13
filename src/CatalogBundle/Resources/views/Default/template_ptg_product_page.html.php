<?php
$this->extend('CatalogBundle:Layouts:layout.html.php');
?>

<?php if($this->editmode): ?>
        <?= $this->relation("ptg_product_page", [
                "types" => ["object"],
                "subtypes" => [
                "object" => ["object"]
                ],
                "classes" => ["CatalogTables"],
        ]); 
        ?>
<?php endif; ?>

<?php
if($groupData):
?>
<div class="template">
        <section class="segregate">

                <div id="pageHeader"></div>
                <span  class="pageName">
                        <?= $groupData['siop3Category']; ?>
                </span>

                <div class="footer">
                        <footer class="flex-center <?php echo $footer_class; ?>">
                                <span class="logo">
                                        <img src="<?= $footer_logo_src; ?>">
                                </span>
                                <div class="flex aligned">
                                <h5>
                                        <?php 
                                        if($this->editmode){
                                                echo $this->input("PTG_Footer_BrandName")->setDataFromResource($groupData['brandName']); 
                                        }else{
                                                echo $this->input("PTG_Footer_BrandName");
                                        }                
                                        ?>

                                        <span>
                                        
                                        <?php 
                                        if($this->editmode){
                                                echo $this->input("PTG_Footer_HoseType")->setDataFromResource($groupData['siop3Category'])."/".$this->input("PTG_Footer_HoseType2")->setDataFromResource($groupData['siop4Category']); 
                                        }else{
                                                echo $this->input("PTG_Footer_HoseType")."/".$this->input("PTG_Footer_HoseType2");
                                        }                
                                        ?>

                                        </span>
                                </h5>

                                        <div class="compatible">
                                                <b>
                                                <?php 
                                                if($this->editmode){
                                                        echo $this->input("PTG_Footer_Compatibility")->setDataFromResource('Compatible fittings'); 
                                                }else{
                                                        echo $this->input("PTG_Footer_Compatibility");
                                                }                
                                                ?>
                                                </b>
                                                
                                                <?php 
                                                $compatibility_description = "All fittings compatible with ".$groupData['brandName']." are listed in Section 1 (starting on page 131).";
                                                if($this->editmode){
                                                        echo $this->input("PTG_Footer_Compatibility_Description")->setDataFromResource($compatibility_description); 
                                                }else{
                                                        echo $this->input("PTG_Footer_Compatibility_Description");
                                                }                
                                                ?>
                                        </div>
                                </div>
                        </footer>
                </div>
                <div class="footer1">
                        <footer class="flex-center <?php echo $footer_class; ?>">
                                
                                <div class="flex aligned">
                                        


                                        <div class="compatible">
                                                                                <b>
                                                <?php 
                                                if($this->editmode){
                                                        echo $this->input("PTG_Footer_Compatibility1")->setDataFromResource('Compatible fittings'); 
                                                }else{
                                                        echo $this->input("PTG_Footer_Compatibility1");
                                                }                
                                                ?>
                                                </b>
                                                
                                                <?php 
                                                $compatibility_description = "All fittings compatible with ".$groupData['brandName']." are listed in Section 1 (starting on page 131).";
                                                if($this->editmode){
                                                        echo $this->input("PTG_Footer_Compatibility1_Description")->setDataFromResource($compatibility_description); 
                                                }else{
                                                        echo $this->input("PTG_Footer_Compatibility1_Description");
                                                }                
                                                ?>
                                        </div>
                                        <h5>
                                        
                                        <?php 
                                        if($this->editmode){
                                                echo $this->input("PTG_Footer_BrandName1")->setDataFromResource($groupData['brandName']); 
                                        }else{
                                                echo $this->input("PTG_Footer_BrandName1");
                                        }                
                                        ?>

                                        <span>
                                        
                                        <?php 
                                        if($this->editmode){
                                                echo $this->input("PTG_Footer_HoseType1")->setDataFromResource($groupData['siop3Category'])."/".$this->input("PTG_Footer_HoseType3")->setDataFromResource($groupData['siop4Category']); 
                                        }else{
                                                echo $this->input("PTG_Footer_HoseType1")."/".$this->input("PTG_Footer_HoseType3");
                                        }                
                                        ?>

                                        </span>


                                        </h5>
                                </div>
                                <span class="logo">
                                        <img src="<?= $footer_logo_src; ?>">
                                </span>
                        </footer>
                </div>
        
                
                <header class="content white">
                        <h1>
                        <?php
                                if($this->editmode){
                                        echo $this->input("PTG_Heading")->setDataFromResource($groupData['brandName']); 
                                }else{
                                        echo $this->input("PTG_Heading");
                                }                
                        ?>
                        </h1>
                        <aside class="ptgHead">
                                <div>
                                <?php
                                if($this->editmode){
                                        echo $this->wysiwyg("PTG_LongDescription")->setDataFromResource($groupData['longDescription']); 
                                }else{
                                        echo $this->wysiwyg("PTG_LongDescription");
                                }                
                                ?>
                                </div>
                                <span class="imageHolder">
                                <?php
                                if($this->editmode){
                                        echo $this->image("HHPP_Image_Left", ["width" => 400, "height" => 200])->setImage($groupData['mainImageObj']); 
                                }else{
                                        if(!$this->image("HHPP_Image_Left")->isEmpty())
                                                $imgSrcObj1 = $this->image("HHPP_Image_Left");
                                                
                                        if($imgSrcObj1)
                                        {
                                        ?>
                                        <img src="<?= $imgSrcObj1->getSrc(); ?>"width="400" height="200"/>
                                        <?php
                                        }
                                }                
                                ?>

                                <?php
                                if($this->editmode){
                                        echo $this->image("Drawing_Picture", ["width" => 400, "height" => 200])->setImage($groupData['ProfileDimensionImageObj']); 
                                }else{
                                        if(!$this->image("Drawing_Picture")->isEmpty())
                                                $imgSrcObj2 = $this->image("Drawing_Picture");

                                        if($imgSrcObj2)
                                        {
                                        ?>
                                        <img src="<?= $imgSrcObj2->getSrc(); ?>"width="400" height="200"/>
                                        <?php
                                        }
                                }                
                                ?>
                        </span>
                </aside>
                </header>
        
                <article class="fullcontainer">
                        <section class="content single ptg">
                                <?php if($groupData['safetyFeatures'] || !empty(trim($groupData['material'])) || !empty(trim($groupData['reinforcement'])) || !empty(trim($groupData['temperatureRange']))): ?>
                                <menu class="flex">
                                        <?php if($groupData['safetyFeatures']): ?>
                                        <div class="specs">
                                                        <h6><?= $this->translate('features') ?></h6>
                                                        <div>
                                                                <?php foreach($groupData['safetyFeatures'] as $key => $feature): ?>
                                                                        <p  class="flex center">
                                                                                <?php if($feature['iconSrc']): ?>
                                                                                <img src="<?= $feature['iconSrc'] ?>" />
                                                                                <?php endif; ?>
                                                                                <font> <?= $feature['name'] ?></font>
                                                                        </p>
                                                                <?php endforeach; ?>

                                                        </div>
                                        </div>
                                        <?php endif; ?>

                                        <?php if(!empty(trim($groupData['material'])) || !empty(trim($groupData['reinforcement'])) || !empty(trim($groupData['temperatureRange']))): ?>
                                        <div class="specs">
                                                        <h6><?= $this->translate('specs') ?></h6>
                                                        <div class="spec-requirement">
                                                        <div>
                                                                        <?php if(!empty(trim($groupData['material']))): ?>
                                                                        <p>
                                                                                <b><?= $this->translate('Material') ?></b>
                                                                                <?= $groupData['material'] ?>
                                                                        </p>
                                                                        <?php endif; ?>
                                                                <?php if(!empty(trim($groupData['reinforcement']))): ?>
                                                                <p>                
                                                                        <b><?= $this->translate('Reinforcement') ?></b>
                                                                        <?= $groupData['reinforcement'] ?>
                                                                </p>
                                                                <?php endif; ?>

                                                                <?php if(!empty(trim($groupData['temperatureRange']))): ?>
                                                                <p>              
                                                                        <b><?= $this->translate('Temperature Range') ?></b>
                                                                        <?= $groupData['temperatureRange']; ?>
                                                                </p>
                                                                <?php endif; ?>
                                                                </div>
                                                        </div>
                                        </div> 
                                        <?php endif; ?>
                                </menu>
                                <?php endif; ?>

                                <?php 
                                
                                $tableNoteCount = 0;
                                foreach($groupData['data'] as $articleGroupKey => $articleGroupData): 
                                
                                ?>
                                <table class="grid" cellpadding="0" cellspacing="0">
                                <thead>
                                
                                <?php if($groupData['iconRequired'] == 'YES'): ?>
                                                <tr class="sub-head">
                                                        <?php foreach($groupData['columnsDataWithImages'] as $key => $c1data): ?>
                                                                <?php 
                                                                        $g1count = count($c1data);
                                                                        $firstArray = array_shift($c1data);
                                                                ?>
                                                                <td colspan="<?= $g1count; ?>">
                                                                <?php if($firstArray['columnIcon']): ?>
                                                                <img src="<?= $firstArray['columnIcon'] ?>" width="45" height="45" />
                                                                <?php endif; ?>
                                                                </td>
                                                        <?php endforeach; ?>
                                                </tr>
                                        <?php endif; ?>

                                        <tr class="head">
                                                <?php foreach($groupData['columnsDataWithImages'] as $key => $c2data): ?>
                                                        <?php 
                                                                $g2count = count($c2data);
                                                                $first2Array = array_shift($c2data);
                                                        ?>
                                                        <td colspan="<?= $g2count; ?>"><?= $first2Array['columnLabel'] ?></td>
                                                <?php endforeach; ?>
                                        </tr>

                                        <?php if($groupData['subHeaderRequired'] == 'YES'): ?>
                                                <tr class="sub-head">
                                                        <?php foreach($groupData['columnsDataWithImages'] as $key => $c3data): ?>
                                                                <?php  foreach($c3data as $c3key => $c3value): ?>
                                                                        <?php if($c3value['unitName']): ?>
                                                                                <td><?= $c3value['unitName'] ?></td>
                                                                        <?php else: ?>
                                                                                <td></td>
                                                                        <?php endif; ?>
                                                                <?php endforeach; ?>
                                                        <?php endforeach; ?>
                                                </tr>
                                        <?php endif; ?>
                                </thead>
                                <tbody>
                                        <?php $incrRow = 1; ?>        
                                        <?php foreach($articleGroupData as $key => $element): ?>
                                                <?php if($incrRow%2==0): ?>
                                                <tr>
                                                <?php else: ?>
                                                <tr class="active">
                                                <?php endif; ?>
                                                        <?php foreach($element as $ekey => $value): ?>
                                                                        <td><?= $value ?></td>
                                                        <?php endforeach; ?>
                                                </tr>
                                                <?php $incrRow++ ?>
                                        <?php endforeach; ?>
                                </tbody>
                                </table>
                                <p class="small"><?= $this->input('PTG_Note_' .$tableNoteCount, ['placeholder' => 'Enter comment']); ?></p>
                                <?php
                        
                                $tableNoteCount++;
                                
                                endforeach; ?>
                        </section>
                </article>

        </section>
</div>
<?php endif; ?>