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


<?php  echo $this->inc($this->document->getProperty('header'),['title'=>'Hydraulic Hose']) ?>
        
    <article class="container noBorder">
    
    <?php

        if($data):
        $onlyOneTitle = false;
        foreach($data as $key => $brand):

        extract($brand);

        ?>      

       <figure class="justify-between">
           
           <figcaption>
                <?php if(!$onlyOneTitle): ?>
                <h2>Hose Accessories</h2>
                <?php 
                $onlyOneTitle = true;
                endif;
                ?>
                <h4 class="contitech-yellow"><?= $brandName ?></h4>
                <span><?= $longDescription ?></span>
                <?php if(!empty(trim($materialString)) || !empty(trim($colorString)) || !empty(trim($availableLengthString)) || (!empty(trim($tempFmin)) && !empty(trim($tempFmax)) && !empty(trim($tempCmin)) && !empty(trim($tempCmax))) ): ?>
                                
                   <div class="specs">
                        <h3 class="small contitech-black"><?= $this->translate('features + specs') ?></h3>
                        <div class="spec-requirement">
                        <?php if($safetyFeatures): ?>
                           <div>
                           
                                <?php foreach($safetyFeatures as $key => $feature): ?>
                                        <p class="small">
                                        <b class="contitech-yellow "><?= $feature['name'] ?></b>
                                        </p>
                                <?php endforeach; ?>
                           </div>   
                           <?php endif; ?>
                           
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
                                        <?= $availableLengthString ?>
                                </p>
                                <?php endif; ?>
                                    
                            </div>      


                        </div>
                   </div>
                   <?php endif; ?>
           </figcaption>

           <?php if($brandImageSrc): ?>
           <span>
                <img src="<?= $brandImageSrc ?>" />
            </span>
           <?php endif; ?>
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
                                <span><?= $this->translate($columnsData['columnName'])?></span>
                        <?php endforeach; ?>
                        
                </p>
                        
                <?php foreach($articlesData as $key => $element): ?>
                        <p>
                                <?php foreach($element as $ekey => $value): ?>
                                        <span><?= $value; ?></span>
                                <?php endforeach; ?>
                        </p>
                <?php endforeach; ?>

        </div>

        <?php 

        endforeach; 

        endif;

        ?>
    </article>
    <?php  echo $this->inc($this->document->getProperty('footer'),['title'=>'Hose Accessories', 'subTitle'=>'Protective Sleeving / Protective Wrap']) ?>
   
    
    