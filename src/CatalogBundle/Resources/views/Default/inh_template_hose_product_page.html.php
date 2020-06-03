
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

<?php  echo $this->inc($this->document->getProperty('header'),['title'=>'']) ?>
<?php  echo $this->inc($this->document->getProperty('footer'),['title'=>$brandName]) ?>
<!-- <div class="break-after"></div> -->
<article class="fullcontainer">
<?php //echo  $this->template("CatalogBundle:Include:header.html.php", ["param1" => "value1"]) ?>
      <header class="content white">
        <h1><?= $brandName ?></h1>
        <aside>
                <p>
                        <?= $longDescription ?>
                        <!-- Extended Life<sup>TM</sup> X600R  effectively a CSS-in-JS library, styled components deserves a position of its own. Take a look at some of these UI libraries using styled-components.
                        While effectively a CSS-in-JS library, styled components deserves a position of its own. Take a look at some of these UI libraries using styled-components.
                   -->
                   </p>
                <img src="<?= $brandImageSrc ?>" />
                
        </aside>
      </header>
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
                                     <!-- <span><img src="/CatalogImages/5a.jpg" width="45" height="45" /></span>
                                     <span><img src="/CatalogImages/5a1.jpg" width="45" height="45" /></span>
                                     <span><img src="/CatalogImages/5a2.jpg" width="45" height="45"/></span>
                                    <span class="grow-2"><img src="/CatalogImages/5a3.jpg" width="45" height="45"/></span>
                                     <span class="grow-2"><img src="/CatalogImages/5a4.jpg" width="45" height="45" /></span>
                                     <span class="grow-2"><img src="/CatalogImages/5a5.jpg" width="45" height="45"/></span>
                                     <span><img src="/CatalogImages/5a6.jpg" width="45" height="45"/></span>
                                     <span><img src="/CatalogImages/5a7.jpg" width="45" height="45"/></span> -->
                                </p>
                                <?php endif; ?>
                                <p class="head">
                                        <?php foreach($columnsDataWithImages as $key => $columnsData): ?>
                                                <span><?= $columnsData['columnLabel']?></span>
                                        <?php endforeach; ?>

                                     <!-- <span>Part Number</span>
                                     <span>SAP Number</span>
                                     <span>Hose size ID</span>
                                     <span class="grow-2">Hose OD</span>
                                      <span class="grow-2">Max. Work Pressure</span>
                                     <span class="grow-2">Min. Bend Radius</span>
                                     <span>Weight</span>
                                     <span>Fitting</span> -->
                                </p>
                                
                                        <?php foreach($articlesData as $key => $element): ?>
                                                <p>
                                                <?php foreach($element as $ekey => $value): ?>
                                                <span><?= $value; ?></span>
                                                <?php endforeach; ?>
                                                </p>
                                        <?php endforeach; ?>


                                <!-- <p>
                                                                <span>AEDKSJFKDSJFKS</span>
                                                                <span>454545</span>
                                                                <span>1544545</span>
                                                                <span>32/12</span>
                                                                <span>32/12</span>
                                                                <span>1-14</span>
                                                                <span>0.91</span>
                                                                <span>23</span>
                                                                <span>0.91</span>
                                                                <span>23</span>
                                                                <span>0.91</span>
                                                           </p>
                                <p>
                                        <span>AEDKSJFKDSJFKS</span>
                                        <span>454545</span>
                                        <span>1544545</span>
                                        <span>32/12</span>
                                        <span>32/12</span>
                                        <span>1-14</span>
                                        <span>0.91</span>
                                        <span>23</span>
                                        <span>0.91</span>
                                        <span>23</span>
                                        <span>0.91</span>
                                </p>
                                <p>
                                        <span>AEDKSJFKDSJFKS</span>
                                        <span>454545</span>
                                        <span>1544545</span>
                                        <span>32/12</span>
                                        <span>32/12</span>
                                        <span>1-14</span>
                                        <span>0.91</span>
                                        <span>23</span>
                                        <span>0.91</span>
                                        <span>23</span>
                                        <span>0.91</span>
                                </p>
                                <p>
                                        <span>AEDKSJFKDSJFKS</span>
                                        <span>454545</span>
                                        <span>1544545</span>
                                        <span>32/12</span>
                                        <span>32/12</span>
                                        <span>1-14</span>
                                        <span>0.91</span>
                                        <span>23</span>
                                        <span>0.91</span>
                                        <span>23</span>
                                        <span>0.91</span>
                                </p>
                                <p>
                                        <span>AEDKSJFKDSJFKS</span>
                                        <span>454545</span>
                                        <span>1544545</span>
                                        <span>32/12</span>
                                        <span>32/12</span>
                                        <span>1-14</span>
                                        <span>0.91</span>
                                        <span>23</span>
                                        <span>0.91</span>
                                        <span>23</span>
                                        <span>0.91</span>
                                </p> -->
                                
                            </div>
      </section>
      
      <!-- <footer class="flex">
              <span class="logo">
                      <img src="/CatalogImages/logo.JPG" />
              </span>
              <div class="flex aligned">
                        <h3>
                            Extended Life<sup>&trade;</sup> X600R
                            <span>High Pressure</span>
                        </h3>

                        <p>
                                <b>Compatible fittings</b>
                                Meets or exceeds the performance requirements of
                        </p>
              </div>
      </footer> -->

      <?php //echo $this->template("CatalogBundle:Include:footer.html.php", ["param2" => "value2"]) ?>
    </article>
    <?php if(current($data) != end($data)): ?>
    <div class="break-before"></div>
    <?php endif; ?>
    <?php  //echo $this->inc($this->document->getProperty('footer'),['title'=>$brandName]) ?>
<?php 

endforeach; 

endif;

?>