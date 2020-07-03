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

<div class="seggregate">
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
                <h2>
                <?php
                if ($this->input("HHAC_Heading")->isEmpty()) {
                        echo $this->input("HHAC_Heading")->setDataFromResource("Hose Accessories");
                } else {
                        echo $this->input("HHAC_Heading");
                }
                ?>
                </h2>

                <?php 
                $onlyOneTitle = true;
                endif;
                ?>

                <h4 class="contitech-yellow">
                <?php
                        echo $this->input("HHAC_BrandName")->setDataFromResource($brandName);
                ?>
                </h4>

                <span>
                <?php
                        echo $this->wysiwyg("HHAS_LongDescription")->setDataFromResource($longDescription);
                ?>
                </span>
                <?php if(!empty(trim($materialString))): ?>
                 <menu>
                   <div class="specs ">
                        <h6 class="small contitech-black"><?= $this->translate('features + specs') ?></h6>
                        <div class="spec-requirement">
                           <div>
                                <?php if(!empty(trim($materialString))): ?>
                                        <p class="small">
                                                <b><?= $this->translate('Material') ?></b>
                                                <?= $materialString ?>
                                        </p>
                                <?php endif; ?>
                           </div>

                        </div>
                   </div>
</menu>
                   <?php endif; ?>
           </figcaption>
           
           <?= $this->image("HHAC_Image", ["width" => 200, "height" => 200])->setImage($imageObj); ?>
           
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

        endforeach; 

        endif;

        ?>
    </article>
    <!-- <footer class="flex ">
        <span class="logo">
                <b>Hose</b> 
                <img src="/CatalogImages/6c.JPG" />
        </span>
        <div class="flex  reverse">
                  <h3>
                     Hose Accessories
                      <span>Routing Clamps</span>
                  </h3>

                 
        </div>
    </footer> -->
</div>
<?php  echo $this->inc($this->document->getProperty('footer'),['title'=>'Hose Accessories', 'subTitle'=>'Routing Clamps']) ?>
   