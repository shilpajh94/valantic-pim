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

foreach($data as $key => $brand):

extract($brand);

?>

<section class="seggregate">

        <?php  echo $this->inc($this->document->getProperty('header'),['title'=>'Hydraulic Hose']) ?>
        <?php  echo $this->inc($this->document->getProperty('footer'),['title'=>$brandName]) ?>
        <header class="content white">
                        <h1><?= $brandName ?></h1>
                        <aside>
                                <p>
                                        <?= $longDescription ?>
                                </p>
                                <img src="<?= $brandImageSrc ?>" />
                                
                        </aside>
                </header>
        <article class="fullcontainer">

                <!-- <header class="content white">
                        <h1><?= $brandName ?></h1>
                        <aside>
                                <p>
                                        <?= $longDescription ?>
                                </p>
                                <img src="<?= $brandImageSrc ?>" />
                                
                        </aside>
                </header> -->

                <section class="content">

                        <menu class="flex">
                        <div class="specs">
                                        <h3>performance + specs</h3>
                                        <div class="spec-requirement">
                                        <div>

                                                <p>
                                                        <b>Inner Tube</b>
                                                        <?= $tubeMaterialAtrributeString ?>
                                                </p>
                                                <p>                
                                                        <b>Reinforcement</b>
                                                        <?= $reinforcement ?>
                                                </p>
                                                <p>              
                                                        <b>Cover</b>
                                                        <?= $coverMaterialattributeString ?>
                                                </p>
                                                <p>              
                                                        <b>Temperature Range</b>
                                                        <?=$tempFmin ?>&#8457; to  <?=$tempFmax ?>&#8457; (<?=$tempCmin ?>&#8451; to  <?=$tempCmax ?>&#8451;)
                                                </p>
                                        </div>

                                        </div>
                        </div> 

                        <div class="feature">
                                        <h3>features</h3>
                                        <div>
                                                <?php foreach($safetyFeatures as $key => $feature): ?>
                                                        <p  class="flex">
                                                                <img src="<?= $feature['iconSrc'] ?>" />
                                                                <font> <?= $feature['name'] ?></font>
                                                        </p>
                                                <?php endforeach; ?>

                                        </div>
                        </div>
                        </menu>

                        <menu>
                                <h3>branding</h3>
                                <figure>
                                        <img src="/CatalogImages/6a.jpg"/> 
                                        <figcaption><b><?= $brandName ?></b></figcaption> 
                                        <figcaption> <?= $brandingLayline ?> </figcaption>
                                </figure>
                                <?php if(trim($digit6code)): ?>
                                <figure>
                                        <figcaption> Order Code: <?= $digit6code ?> </figcaption>
                                </figure>
                                <?php endif; ?>
                        </menu>
                
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
                                                <span><?= $columnsData['columnLabel']?></span>
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
                </section>
        
        </article>

        <?php if(current($data) != end($data)): ?>

        <div class="break-before"></div>

        <?php endif; ?>

</section>

<?php 

endforeach; 

endif;

?>
