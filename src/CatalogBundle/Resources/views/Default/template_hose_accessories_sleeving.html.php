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
                if ($this->input("HHAS_BrandName_{$incr}")->isEmpty()) {
                        echo $this->input("HHAS_BrandName_{$incr}")->setDataFromResource($brandName);
                } else {
                        echo $this->input("HHAS_BrandName_{$incr}");
                }
                ?>
                </h4>

                <span>
                <?php
                if ($this->input("HHAS_LongDescription_{$incr}")->isEmpty()) {
                        echo $this->input("HHAS_LongDescription_{$incr}")->setDataFromResource($longDescription);
                } else {
                        echo $this->input("HHAS_LongDescription_{$incr}");
                }
                ?>
                </span>

                <?php if(!empty(trim($materialString)) || !empty(trim($colorString)) || !empty(trim($availableLengthString)) || (!empty(trim($tempFmin)) && !empty(trim($tempFmax)) && !empty(trim($tempCmin)) && !empty(trim($tempCmax))) ): ?>
                   <menu>             
                   <div class="specs">
                        <h6><?= $this->translate('features + specs') ?></h6>
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
                                        <?= $availableLengthString ?>
                                </p>
                                <?php endif; ?>
                                    
                            </div>   
                            <?php endif; ?>   

                        </div>
                   </div>
</menu>
                   <?php endif; ?>
           </figcaption>
        
        <?php if($this->editmode): ?>
                <span>
                <?php if(!$this->image("HHAS_Image_{$incr}")->isEmpty()): ?>
                        <?= $this->image("HHAS_Image_{$incr}", ["width" => 200, "height" => 200]); ?>
                <?php else: ?>
                        <?= $this->image("HHAS_Image_{$incr}", ["width" => 200, "height" => 200])->setImage($imageObj); ?>
                <?php endif; ?>
                </span>
                <?php else: ?>
                <?php if(!$this->image("HHAS_Image_{$incr}")->isEmpty()): ?>
                        <span><img src="<?= $this->image("HHAS_Image_{$incr}")->getSrc() ?>" /></span>
                <?php elseif($imageObj): ?>
                        <span><img src="<?= $imageObj ?>" /></span>
                <?php endif; ?>
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
    <?php  echo $this->inc($this->document->getProperty('footer'),['title'=>'Hose Accessories', 'subTitle'=>'Protective Sleeving / Protective Wrap']) ?>
   
    
    