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

<section class="seggregate">
        <nav class="header alternate">
                <div id="pageHeader"></div>
                <span>
                <?php 
                if($this->editmode){
                        echo $this->input("PTG_Header_{$incr}")->setDataFromResource($siop3Category); 
                }else{
                        echo $this->input("PTG_Header_{$incr}");
                }                
                ?>
                </span>
        </nav>
        
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
                <aside>
                        <p>
                        <?php
                        if($this->editmode){
                                echo $this->wysiwyg("PTG_LongDescription_{$incr}")->setDataFromResource($longDescription); 
                        }else{
                                echo $this->wysiwyg("PTG_LongDescription_{$incr}");
                        }                
                        ?>
                        </p>
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


                </aside>
        </header>
        <article class="fullcontainer">

                <section class="content">
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

</div>
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
                        <div class="grid">

                                <?php if($iconRequired == 'YES'): ?>
                                        <p class="sub-head">
                                                <?php foreach($columnsDataWithImages as $key => $columnsData): ?>
                                                        <span><img src="<?= $columnsData['columnIcon'] ?>" width="45" height="45" /></span>
                                                <?php endforeach; ?>
                                        </p>
                                <?php endif; ?>


                                <p class="head">

                                        <?php foreach($columnsDataWithImages as $key => $columnsData): ?>
                                                <?php if($columnsData['columnName'] == 'listPrice'): ?>
                                                        <?php if($IsPriceCatalog): ?>
                                                        <span><?= $columnsData['columnLabel'] ?></span>
                                                        <?php endif; ?>
                                                <?php else: ?>
                                                        <span><?= $columnsData['columnLabel'] ?></span>
                                                <?php endif; ?>
                                        <?php endforeach; ?>
                                        
                                </p>
                                <?php $incrRow = 1; ?>        
                                <?php foreach($articlesData as $key => $element): ?>
                                        <?php if($incrRow%2==0): ?>
                                        <p>
                                        <?php else: ?>
                                        <p class="active">
                                        <?php endif; ?>
                                                <?php foreach($element as $ekey => $value): ?>

                                                        <?php if($ekey == 'listPrice'): ?>
                                                        <?php if($IsPriceCatalog): ?>
                                                        <span><?= $value ?></span>
                                                        <?php endif; ?>
                                                        <?php else: ?>
                                                                <span><?= $value ?></span>
                                                        <?php endif; ?>
                                                <?php endforeach; ?>
                                        </p>
                                        <?php $incrRow++ ?>
                                <?php endforeach; ?>

                        </div>
                        <?php endforeach; ?>
                </section>
        
        </article>

        <div class="footer">
        <footer class="flex-center ">
                        <span class="logo">
                                <b>Hose</b>
                                <img src="/CatalogImages/Continental_Logo_Master_yellow.png">
                        </span>
                        <div class="flex aligned">
                                <h5 class="rowC">
                                
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


                                <div class="rowC compatible">
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
                                </d>
                        </div>
                </footer>
        </div>

        <?php //if($incr != count($catalogGroupData)): ?>
        <div class="break-before"></div>
        <?php //endif; ?>    

</section>

        <?php endif; ?>