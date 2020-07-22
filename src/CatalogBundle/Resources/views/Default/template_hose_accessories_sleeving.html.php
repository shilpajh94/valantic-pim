<?php
$this->extend('CatalogBundle:Layouts:layout.html.php',['name1'=>'Name from Extend']);
?>
<?php if($this->editmode): ?>
        <?= $this->relation("template_hose_accessories_sleeving", [
                "types" => ["object"],
                "subtypes" => [
                "object" => ["object"]
                ],
                "classes" => ["CatalogTables"],
        ]); 
        ?>
<?php endif; ?>


<section class="seggregate">
<nav class="header alternate">
  <div id="pageHeader"></div>
  <span>Hydraulic Hose</span>
</nav>
<div class="footer">
<footer class="flex-center ">
<span class="logo">
        <b>Hose</b>
        <img src="/CatalogImages/logo_new.png">
</span>
<div class="flex reverse">
                <h5 class="rowC">
                Hose Accessories
                <span>Protective Sleeving / Protective Wrap</span>
                </h5>

        
</div>
</footer>
</div>
        
    <article class="container noBorder">
    
    <?php

        if($data):
        $onlyOneTitle = false;
        $incr = 1;
        foreach($data as $key => $brand):

        extract($brand);

        ?>      

       <figure class="justify-between">
           
           <figcaption>
                <?php if(!$onlyOneTitle): ?>
                <h2>
                <?php
                if ($this->input("HHAS_Heading_{$incr}")->isEmpty()) {
                        echo $this->input("HHAS_Heading_{$incr}")->setDataFromResource("Hose Accessories");
                } else {
                        echo $this->input("HHAS_Heading_{$incr}");
                }
                ?>
                </h2>
                <?php 
                $onlyOneTitle = true;
                endif;
                ?>

                <h4 class="contitech-yellow">
                
                <?php
                        echo $this->input("HHAS_BrandName_{$incr}")->setDataFromResource($brandName);
                ?>
                </h4>

                <span>
                <?php
                        echo $this->wysiwyg("HHAS_LongDescription_{$incr}")->setDataFromResource($longDescription);
                ?>
                </span>

                <?php if(!empty(trim($materialString)) || !empty(trim($colorString)) || !empty(trim($availableLengthString)) || (!empty(trim($tempFmin)) && !empty(trim($tempFmax)) && !empty(trim($tempCmin)) && !empty(trim($tempCmax))) ): ?>
                   <menu>             
                   <div class="specs">
                        <h6><?= $this->translate('features + specs') ?></h6>
                        <div class="spec-requirement">

                           <?php if(!empty(trim($materialString)) || (!empty(trim($tempFmin)) && !empty(trim($tempFmax)) && !empty(trim($tempCmin)) && !empty(trim($tempCmax)))): ?>
                            <div>
                                <?php if(!empty(trim($tempFmin)) && !empty(trim($tempFmax)) && !empty(trim($tempCmin)) && !empty(trim($tempCmax))): ?>
                                <p class="small">     
                                        <b><?= $this->translate('Temperature Range') ?></b>
                                        <?=$tempFmin ?>&#8457; to  <?=$tempFmax ?>&#8457; (<?=$tempCmin ?>&#8451; to  <?=$tempCmax ?>&#8451;)
                                </p>
                                <?php endif; ?>
                                <?php if(!empty(trim($materialString))): ?>
                                        <p class="small">
                                                <b><?= $this->translate('Material') ?></b>
                                                <?= $materialString ?>
                                        </p>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                                
                            <?php if(!empty(trim($colorString)) || !empty(trim($availableLengthString))): ?>
                            <div>
                                <?php if(!empty(trim($colorString))): ?>
                                        <p class="small">            
                                        <b><?= $this->translate('Color') ?></b>
                                        <?= $colorString ?>
                                        </p>
                                <?php endif; ?>
                                <?php if(!empty(trim($availableLengthString))): ?>
                                        <p class="small">            
                                        <b><?= $this->translate('Available Lengths') ?></b>
                                        <?= "Continuous {$availableLengthString}' rolls" ?>
                                </p>
                                <?php endif; ?>
                                    
                            </div>   
                            <?php endif; ?>   

                        </div>
                   </div>
</menu>
                   <?php endif; ?>
           </figcaption>
           <?= $this->image("HHAS_Image_{$incr}", ["width" => 200, "height" => 200])->setImage($imageObj); ?>
           
       </figure>
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

        <?php 

        $incr++;

        endforeach; 

        endif;

        ?>
    </article>
</section>   
    
    