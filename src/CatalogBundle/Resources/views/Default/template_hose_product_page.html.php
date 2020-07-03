<?php
$this->extend('CatalogBundle:Layouts:layout.html.php',['name1'=>'Name from Extend']);
?>

<?php if($this->editmode): ?>
        <?= $this->relation("inh_template_hose_product_page", [
                "types" => ["object"],
                "subtypes" => [
                "object" => ["object"]
                ],
                "classes" => ["CatalogTables"],
        ]); 
        ?>
<?php endif; ?>

<?php

if($data):
$incr = 1;
foreach($data as $key => $brand):

extract($brand);

$imageObj = '';
if($incr % 2 == 0)
        $imageObj = $RightPrintCatalogImageObj;
else 
        $imageObj = $LeftPrintCatalogImageObj;

?>

<section class="seggregate">
        <nav class="header">
                <div id="pageHeader"></div>
                <span>
                <?php 
                if($this->editmode){
                        echo $this->input("HHPP_Header_{$incr}")->setDataFromResource('Hydraulic Hose'); 
                }else{
                        echo $this->input("HHPP_Header_{$incr}");
                }                
                ?>
                </span>
        </nav>
        <div class="footer">
                <footer class="flex">
                        <span class="logo">
                                <img src="/CatalogImages/logo.JPG" />
                        </span>
                        <div class="flex aligned">
                                <h5>
                                
                                <?php 
                                if($this->editmode){
                                        echo $this->input("HHPP_Footer_BrandName_{$incr}")->setDataFromResource($brandName); 
                                }else{
                                        echo $this->input("HHPP_Footer_BrandName_{$incr}");
                                }                
                                ?>

                                <span>
                                
                                <?php 
                                if($this->editmode){
                                        echo $this->input("HHPP_Footer_HoseType_{$incr}")->setDataFromResource('High Pressure'); 
                                }else{
                                        echo $this->input("HHPP_Footer_HoseType_{$incr}");
                                }                
                                ?>

                                </span>

                                </h5>


                                <p>
                                        <b>
                                        <?php 
                                        if($this->editmode){
                                                echo $this->input("HHPP_Footer_Compatibility_{$incr}")->setDataFromResource('Compatible fittings'); 
                                        }else{
                                                echo $this->input("HHPP_Footer_Compatibility_{$incr}");
                                        }                
                                        ?>
                                        </b>
                                        
                                        
                                        <br>

                                        <?php 
                                        $compatibility_description = "All fittings compatible with {$brandName} are listed in Section 1 (starting on page 131).";
                                        if($this->editmode){
                                                echo $this->input("HHPP_Footer_Compatibility_Description_{$incr}")->setDataFromResource($compatibility_description); 
                                        }else{
                                                echo $this->input("HHPP_Footer_Compatibility_Description_{$incr}");
                                        }                
                                        ?>
                                </p>
                        </div>
                </footer>
        </div>
        <header class="content white">
                <h1>
                <?php
                        if($this->editmode){
                                echo $this->input("HHPP_Heading_{$incr}")->setDataFromResource($brandName); 
                        }else{
                                echo $this->input("HHPP_Heading_{$incr}");
                        }                
                ?>
                </h1>
                <aside>
                        <p>
                        <?php
                        if($this->editmode){
                                echo $this->wysiwyg("HHPP_LongDescription_{$incr}")->setDataFromResource($longDescription); 
                        }else{
                                echo $this->wysiwyg("HHPP_LongDescription_{$incr}");
                        }                
                        ?>
                        </p>
                        <?php
                        if($this->editmode){
                                echo $this->image("HHPP_Image_Left_{$incr}", ["class"=>"leftImg","width" => 600, "height" => 200])->setImage($LeftPrintCatalogImageObj); 
                        }else{
                                echo $this->image("HHPP_Image_Left_{$incr}", ["class"=>"leftImg", "width" => 600, "height" => 200]);
                        }                
                        ?>
                        <?php
                        if($this->editmode){
                                echo $this->image("HHPP_Image_Right_{$incr}", ["class"=>"rightImg", "width" => 600, "height" => 200])->setImage($RightPrintCatalogImageObj); 
                        }else{
                                echo $this->image("HHPP_Image_Right_{$incr}", ["class"=>"rightImg", "width" => 600, "height" => 200]);
                        }                
                        ?>
                </aside>
        </header>
        <article class="fullcontainer">

                <section class="content">
                        <?php if($safetyFeatures || !empty(trim($tubeMaterialAtrributeString)) || !empty(trim($reinforcement)) || !empty(trim($coverMaterialattributeString)) || (!empty(trim($tempFmin)) && !empty(trim($tempFmax)) && !empty(trim($tempCmin)) && !empty(trim($tempCmax))) ): ?>
                                
                        <menu class="flex">
                                <?php if(!empty(trim($tubeMaterialAtrributeString)) || !empty(trim($reinforcement)) || !empty(trim($coverMaterialattributeString)) || (!empty(trim($tempFmin)) && !empty(trim($tempFmax)) && !empty(trim($tempCmin)) && !empty(trim($tempCmax))) ): ?>
                                <div class="specs">
                                                <h6><?= $this->translate('performance + specs') ?></h6>
                                                <div class="spec-requirement">
                                                <div>
                                                        <?php if(!empty(trim($tubeMaterialAtrributeString))): ?>
                                                        <p>
                                                                <b><?= $this->translate('Inner Tube') ?></b>
                                                                <?= $tubeMaterialAtrributeString ?>
                                                        </p>
                                                        <?php endif; ?>

                                                        <?php if(!empty(trim($reinforcement))): ?>
                                                        <p>                
                                                                <b><?= $this->translate('Reinforcement') ?></b>
                                                                <?= $reinforcement ?>
                                                        </p>
                                                        <?php endif; ?>

                                                        <?php if(!empty(trim($coverMaterialattributeString))): ?>
                                                        <p>              
                                                                <b><?= $this->translate('Cover') ?></b>
                                                                <?= $coverMaterialattributeString ?>
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
                                </div> 
                                <?php endif; ?>

                                <?php if($safetyFeatures): ?>
                                <div class="feature">
                                                <h6><?= $this->translate('features') ?></h6>
                                                <div>
                                                        <?php foreach($safetyFeatures as $key => $feature): ?>
                                                                <p  class="flex">
                                                                        <img src="<?= $feature['iconSrc'] ?>" />
                                                                        <font> <?= $feature['name'] ?></font>
                                                                </p>
                                                        <?php endforeach; ?>

                                                </div>
                                </div>
                                <?php endif; ?>

                        </menu>
                        <?php endif; ?>

                        <?php if(!empty(trim($BrandingLayline))): ?>
                        <menu>
                                <h6><?= $this->translate('branding') ?></h6>
                                <figure>
                                        <img src="/CatalogImages/6a.jpg"/> 
                                        <figcaption><b><?= $brandName ?></b></figcaption> 
                                        <figcaption> <?= $BrandingLayline ?> </figcaption>
                                </figure>
                        </menu>
                        <?php endif; ?>
                
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
                                                <span><?= $columnsData['columnLabel'] ?></span>
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
                                                        <span><?= $value; ?></span>
                                                <?php endforeach; ?>
                                        </p>
                                        <?php $incrRow++ ?>
                                <?php endforeach; ?>

                        </div>
                </section>
        
        </article>

        <?php if($incr != count($data)): ?>
<div class="break-before"></div>

<?php endif; ?>

</section>

<?php 
$incr++;
endforeach; 

endif;

?>
