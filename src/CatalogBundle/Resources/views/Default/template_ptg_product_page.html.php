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
                <?php 
                if($this->editmode){
                        echo $this->input("PTG_Header_{$incr}")->setDataFromResource($groupData['siop3Category']); 
                }else{
                        echo $this->input("PTG_Header_{$incr}");
                }                
                ?>
 
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
                                        echo $this->input("PTG_Footer_BrandName_{$incr}")->setDataFromResource($groupData['brandName']); 
                                }else{
                                        echo $this->input("PTG_Footer_BrandName_{$incr}");
                                }                
                                ?>

                                <span>
                                
                                <?php 
                                if($this->editmode){
                                        echo $this->input("PTG_Footer_HoseType_{$incr}")->setDataFromResource($groupData['siop3Category'])."/".$this->input("PTG_Footer_HoseType2_{$incr}")->setDataFromResource($groupData['siop4Category']); 
                                }else{
                                        echo $this->input("PTG_Footer_HoseType_{$incr}")."/".$this->input("PTG_Footer_HoseType2_{$incr}");
                                }                
                                ?>

                                </span>
                            </h5>

                                <div class="compatible">
                                        <b>
                                        <?php 
                                        if($this->editmode){
                                                echo $this->input("PTG_Footer_Compatibility_{$incr}")->setDataFromResource('Compatible fittings'); 
                                        }else{
                                                echo $this->input("PTG_Footer_Compatibility_{$incr}");
                                        }                
                                        ?>
                                        </b>
                                        
                                        <?php 
                                        $compatibility_description = "All fittings compatible with ".$groupData['brandName']." are listed in Section 1 (starting on page 131).";
                                        if($this->editmode){
                                                echo $this->input("PTG_Footer_Compatibility_Description_{$incr}")->setDataFromResource($compatibility_description); 
                                        }else{
                                                echo $this->input("PTG_Footer_Compatibility_Description_{$incr}");
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
                                                echo $this->input("PTG_Footer_Compatibility1_{$incr}")->setDataFromResource('Compatible fittings'); 
                                        }else{
                                                echo $this->input("PTG_Footer_Compatibility1_{$incr}");
                                        }                
                                        ?>
                                        </b>
                                        
                                        <?php 
                                        $compatibility_description = "All fittings compatible with ".$groupData['brandName']." are listed in Section 1 (starting on page 131).";
                                        if($this->editmode){
                                                echo $this->input("PTG_Footer_Compatibility1_Description_{$incr}")->setDataFromResource($compatibility_description); 
                                        }else{
                                                echo $this->input("PTG_Footer_Compatibility1_Description_{$incr}");
                                        }                
                                        ?>
                                </div>
                                <h5>
                                
                                    <?php 
                                    if($this->editmode){
                                            echo $this->input("PTG_Footer_BrandName1_{$incr}")->setDataFromResource($groupData['brandName']); 
                                    }else{
                                            echo $this->input("PTG_Footer_BrandName1_{$incr}");
                                    }                
                                    ?>

                                    <span>
                                    
                                    <?php 
                                    if($this->editmode){
                                            echo $this->input("PTG_Footer_HoseType1_{$incr}")->setDataFromResource($groupData['siop3Category'])."/".$this->input("PTG_Footer_HoseType3_{$incr}")->setDataFromResource($groupData['siop4Category']); 
                                    }else{
                                            echo $this->input("PTG_Footer_HoseType1_{$incr}")."/".$this->input("PTG_Footer_HoseType3_{$incr}");
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
                                echo $this->input("PTG_Heading_{$incr}")->setDataFromResource($groupData['brandName']); 
                        }else{
                                echo $this->input("PTG_Heading_{$incr}");
                        }                
                ?>
                </h1>
                <aside class="ptgHead">
                        <div>
                        <?php
                        if($this->editmode){
                                echo $this->wysiwyg("PTG_LongDescription_{$incr}")->setDataFromResource($groupData['longDescription']); 
                        }else{
                                echo $this->wysiwyg("PTG_LongDescription_{$incr}");
                        }                
                        ?>
                        </div>
                        <span class="imageHolder">
                        <?php
                        if($this->editmode){
                                echo $this->image("HHPP_Image_Left_{$incr}", ["width" => 400, "height" => 200])->setImage($groupData['mainImageObj']); 
                        }else{
                                echo $this->image("HHPP_Image_Left_{$incr}", ["width" => 400, "height" => 200]);
                        }                
                        ?>

                        <?php
                        if($this->editmode){
                                echo $this->image("Drawing_Picture_{$incr}", ["width" => 400, "height" => 200])->setImage($groupData['ProfileDimensionImageObj']); 
                        }else{
                                echo $this->image("Drawing_Picture_{$incr}", ["width" => 400, "height" => 200]);
                        }                
                        ?>
                    </span>
               </aside>
        </header>
       
      
        <article class="fullcontainer">

                <section class="content single ptg">
                        <?php if($groupData['safetyFeatures'] || !empty(trim($groupData['material'])) || !empty(trim($groupData['reinforcement'])) || !empty(trim($groupData['temperatureRange']))): ?>

                                
                        <menu class="flex">
                                <?php if(!empty(trim($groupData['material'])) || !empty(trim($groupData['reinforcement'])) || !empty(trim($groupData['temperatureRange']))): ?>

                                
<?php if($groupData['safetyFeatures']): ?>
                                <div class="feature">
                                                <h6><?= $this->translate('Key features + Benefits') ?></h6>
                                                <div>
                                                        <?php foreach($groupData['safetyFeatures'] as $key => $feature): ?>
                                                                <p  class="flex">
                                                                        <?php if($feature['iconSrc']): ?>
                                                                        <img src="<?= $feature['iconSrc'] ?>" />
                                                                        <?php endif; ?>
                                                                        <font> <?= $feature['name'] ?></font>
                                                                </p>
                                                        <?php endforeach; ?>

                                                </div>
                                </div>
                                <?php endif; ?>
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

                        <?php foreach($groupData['data'] as $key => $columnsData): 
                        ?>
                        <table class="grid" cellpadding="0" cellspacing="0">
                            <thead>
                                <?php if($groupData['iconRequired'] == 'YES'): ?>
                                        <tr class="sub-head">
                                                <?php foreach($columnsData['columnsDataWithImages'] as $key => $c1data): ?>
                                                        <?php 
                                                                $g1count = count($c1data);
                                                                $firstArray = array_shift($c1data);
                                                        ?>
                                                        <td colspan="<?= $g1count; ?>"><img src="<?= $firstArray['columnIcon'] ?>" width="45" height="45" /></td>
                                                <?php endforeach; ?>
                                        </tr>
                                <?php endif; ?>
                                


                                <tr class="head">
                                        <?php foreach($columnsData['columnsDataWithImages'] as $key => $c2data): ?>
                                                <?php 
                                                        $g2count = count($c2data);
                                                        $first2Array = array_shift($c2data);
                                                ?>
                                                <td colspan="<?= $g2count; ?>"><?= $first2Array['columnLabel'] ?></td>
                                        <?php endforeach; ?>
                                </tr>

                                <?php if($groupData['subHeaderRequired'] == 'YES'): ?>
                                        <tr class="sub-head">
                                                <?php foreach($columnsData['columnsDataWithImages'] as $key => $c3data): ?>
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
                                <?php $incrRow = 1; ?>        
                                <?php foreach($columnsData['articlesData'] as $key => $element): ?>
                                        <?php if($incrRow%2==0): ?>
                                        <tr>
                                        <?php else: ?>
                                        <tr class="active">
                                        <?php endif; ?>
                                                <?php foreach($element as $ekey => $value): ?>

                                                        <?php if($ekey == 'listPrice'): ?>
                                                                <?php if($groupData['IsPriceCatalog']): ?>
                                                                <td><?= $value ?></td>
                                                                <?php endif; ?>
                                                        <?php else: ?>
                                                                <td><?= $value ?></td>
                                                        <?php endif; ?>
                                                <?php endforeach; ?>
                                        </tr>
                                        <?php $incrRow++ ?>
                                <?php endforeach; ?>

                        </table>
                        <?php endforeach; ?>
                </section>
        
        </article>

       

</section>
</div>
        <?php endif; ?>