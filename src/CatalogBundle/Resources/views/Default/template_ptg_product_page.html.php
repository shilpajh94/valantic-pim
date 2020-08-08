<?php
$this->extend('CatalogBundle:Layouts:layout.html.php',['name1'=>'Name from Extend']);
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
// foreach($data as $catalogGroupKey => $catalogGroupData):

// $incr = 1;
// foreach($catalogGroupData as $brandName => $brandData):
// extract($brandData);

// foreach($data as $key => $brand):

extract($groupData);

// $imageObj = '';
// if($incr % 2 == 0)
//         $imageObj = $RightPrintCatalogImageObj;
// else 
//         $imageObj = $LeftPrintCatalogImageObj;

?>

<section class="segregate">

<div id="pageHeader"></div>
 <span  class="pageName">
                <?php 
                if($this->editmode){
                        echo $this->input("PTG_Header_{$incr}")->setDataFromResource($siop3Category); 
                }else{
                        echo $this->input("PTG_Header_{$incr}");
                }                
                ?>
 
</span>

    <div class="footer">
        <footer class="flex-center <?php echo $footer_class; ?>">
                        <span class="logo">
                               <b>Hose</b>
                                <?php if($footer_class == 'reverseColor'): ?>
                                        <img src="/CatalogImages/Continental_Logo_Master_Black.png">
                                <?php else: ?>
                                        <img src="/CatalogImages/Continental_Logo_Master_yellow.png">
                                <?php endif; ?>
                        </span>
                        <div class="flex aligned">
                            <h5>
                                <?php 
                                if($this->editmode){
                                        echo $this->input("PTG_Footer_BrandName_{$incr}")->setDataFromResource($brandName); 
                                }else{
                                        echo $this->input("PTG_Footer_BrandName_{$incr}");
                                }                
                                ?>

                                <span>
                                
                                <?php 
                                if($this->editmode){
                                        echo $this->input("PTG_Footer_HoseType_{$incr}")->setDataFromResource($siop3Category)."/".$this->input("PTG_Footer_HoseType2_{$incr}")->setDataFromResource($siop4Category); 
                                }else{
                                        echo $this->input("PTG_Footer_HoseType_{$incr}");
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
                                        $compatibility_description = "All fittings compatible with {$brandName} are listed in Section 1 (starting on page 131).";
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
                                        $compatibility_description = "All fittings compatible with {$brandName} are listed in Section 1 (starting on page 131).";
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
                                            echo $this->input("PTG_Footer_BrandName1_{$incr}")->setDataFromResource($brandName); 
                                    }else{
                                            echo $this->input("PTG_Footer_BrandName1_{$incr}");
                                    }                
                                    ?>

                                    <span>
                                    
                                    <?php 
                                    if($this->editmode){
                                            echo $this->input("PTG_Footer_HoseType1_{$incr}")->setDataFromResource($siop3Category)."/".$this->input("PTG_Footer_HoseType3_{$incr}")->setDataFromResource($siop4Category); 
                                    }else{
                                            echo $this->input("PTG_Footer_HoseType1_{$incr}");
                                    }                
                                    ?>

                                    </span>


                                </h5>
                        </div>
                        <span class="logo">
                                 <b>Hose</b>
                                <?php if($footer_class == 'reverseColor'): ?>
                                        <img src="/CatalogImages/Continental_Logo_Master_Black.png">
                                <?php else: ?>
                                        <img src="/CatalogImages/Continental_Logo_Master_yellow.png">
                                <?php endif; ?>
                        </span>
                </footer>
        </div>
    
        
        <header class="content white">
                <h1>
                <?php
                        if($this->editmode){
                                echo $this->input("PTG_Heading_{$incr}")->setDataFromResource($brandName); 
                        }else{
                                echo $this->input("PTG_Heading_{$incr}");
                        }                
                ?>
                </h1>
                <aside class="ptgHead">
                        <div>
                        <?php
                        if($this->editmode){
                                echo $this->wysiwyg("PTG_LongDescription_{$incr}")->setDataFromResource($longDescription); 
                        }else{
                                echo $this->wysiwyg("PTG_LongDescription_{$incr}");
                        }                
                        ?>
                        </div>
 <span class="imageHolder">
                        <?php
                        if($this->editmode){
                                echo $this->image("HHPP_Image_Left_{$incr}", ["class"=>"leftImg","width" => 400, "height" => 200])->setImage($LeftPrintCatalogImageObj); 
                        }else{
                                echo $this->image("HHPP_Image_Left_{$incr}", ["class"=>"leftImg", "width" => 400, "height" => 200]);
                        }                
                        ?>
                        <?php
                        if($this->editmode){
                                echo $this->image("HHPP_Image_Right_{$incr}", ["class"=>"rightImg", "width" => 400, "height" => 200])->setImage($RightPrintCatalogImageObj); 
                        }else{
                                echo $this->image("HHPP_Image_Right_{$incr}", ["class"=>"rightImg", "width" => 400, "height" => 200]);
                        }                
                        ?>

                        <?php
                        if($this->editmode){
                                echo $this->image("Drawing_Picture_{$incr}", ["width" => 400, "height" => 200])->setImage($ProfileDimensionImageObj); 
                        }else{
                                echo $this->image("Drawing_Picture_{$incr}", ["width" => 400, "height" => 200]);
                        }                
                        ?>
</span>
               </aside>
        </header>
       
      
        <article class="fullcontainer">

                <section class="content single ptg">
                        <?php if($safetyFeatures || !empty(trim($material)) || !empty(trim($reinforcement)) || (!empty(trim($tempFmin)) && !empty(trim($tempFmax)) && !empty(trim($tempCmin)) && !empty(trim($tempCmax))) ): ?>
                                
                        <menu class="flex">
                                <?php if(!empty(trim($material)) || !empty(trim($reinforcement)) || (!empty(trim($tempFmin)) && !empty(trim($tempFmax)) && !empty(trim($tempCmin)) && !empty(trim($tempCmax))) ): ?>
                                <div class="specs">
                                                <h6><?= $this->translate('performance + specs') ?></h6>
                                                <div class="spec-requirement">
                                                        <?php if(!empty(trim($BrandShortText1))): ?>
                                                        <p>
                                                                <?= $BrandShortText1 ?>
                                                        </p>
                                                        <?php endif; ?>

                                                        <?php if(!empty(trim($BrandShortText2))): ?>
                                                        <p>
                                                                <?= $BrandShortText2 ?>
                                                        </p>
                                                        <?php endif; ?>

                                                        <?php if(!empty(trim($BrandShortText3))): ?>
                                                        <p>
                                                                <?= $BrandShortText3 ?>
                                                        </p>
                                                        <?php endif; ?>

                                                        <?php if(!empty(trim($BrandShortText4))): ?>
                                                        <p>
                                                                <?= $BrandShortText4 ?>
                                                        </p>
                                                        <?php endif; ?>

                                                        <?php if(!empty(trim($BrandShortText5))): ?>
                                                        <p>
                                                                <?= $BrandShortText5 ?>
                                                        </p>
                                                        <?php endif; ?>

                                                        <?php if(!empty(trim($material))): ?>
                                                        <p>
                                                                <b><?= $this->translate('Material') ?></b>
                                                                <?= $material ?>
                                                        </p>
                                                        <?php endif; ?>

                                                        <div class="spec-requirement">
                                                        <?php if(!empty(trim($reinforcement))): ?>
                                                        <p>                
                                                                <b><?= $this->translate('Reinforcement') ?></b>
                                                                <?= $reinforcement ?>
                                                        </p>
                                                        <?php endif; ?>

                                                        <?php if(!empty(trim($tempFmin)) && !empty(trim($tempFmax)) && !empty(trim($tempCmin)) && !empty(trim($tempCmax))): ?>
                                                        <p>              
                                                                <b><?= $this->translate('Temperature Range') ?></b>
                                                                <?=$tempFmin ?>&#8457; to  <?=$tempFmax ?>&#8457; (<?=$tempCmin ?>&#8451; to  <?=$tempCmax ?>&#8451;)
                                                        </p>
                                                        <?php endif; ?>
                                                        </div>
                                                
                                </div> 
                                <?php endif; ?>

                                <?php if($safetyFeatures): ?>
                                <div class="feature">
                                                <h6><?= $this->translate('features') ?></h6>
                                                <div>
                                                        <?php foreach($safetyFeatures as $key => $feature): ?>
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

                        </menu>
                        <?php endif; ?>

                        <?php foreach($groupData as $key => $columnsData): 
                            extract($columnsData);    
                        ?>
                        <table class="grid" cellpadding="0" cellspacing="0">
                            <thead>
                                <?php if($iconRequired == 'YES'): ?>
                                        <tr class="sub-head">
                                                <?php foreach($columnsDataWithImages as $key => $columnsData): ?>
                                                        <td><img src="<?= $columnsData['columnIcon'] ?>" width="45" height="45" /></td>
                                                <?php endforeach; ?>
                                        </tr>
                                <?php endif; ?>


                                <tr class="head">

                                        <?php foreach($columnsDataWithImages as $key => $columnsData): ?>
                                                <?php if($columnsData['columnName'] == 'listPrice'): ?>
                                                        <?php if($IsPriceCatalog): ?>
                                                        <td><?= $columnsData['columnLabel'] ?></td>
                                                        <?php endif; ?>
                                                <?php else: ?>
                                                        <td><?= $columnsData['columnLabel'] ?></td>
                                                <?php endif; ?>
                                        <?php endforeach; ?>
                                        
                                </tr>
                            </thead>
                                <?php $incrRow = 1; ?>        
                                <?php foreach($articlesData as $key => $element): ?>
                                        <?php if($incrRow%2==0): ?>
                                        <tr>
                                        <?php else: ?>
                                        <tr class="active">
                                        <?php endif; ?>
                                                <?php foreach($element as $ekey => $value): ?>

                                                        <?php if($ekey == 'listPrice'): ?>
                                                        <?php if($IsPriceCatalog): ?>
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

        <?php endif; ?>
