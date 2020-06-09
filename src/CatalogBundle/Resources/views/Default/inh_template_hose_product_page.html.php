
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
                        <?= $brandDescription ?>
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
                                <figcaption>
                                   <b><?= $brandName ?></b>
                                </figcaption>
                                <figcaption>SAE 100R16 / ENT 1020 <br/>1/2 (DEE)</figcaption>
                                 
                          <figcaption><?= $maxWorkingPressurePSI ?> PSI <br/> <?= $maxWorkingMPA ?> MPa</figcaption>

 <figcaption>
                                   <b>MSHA 2G-1C-5F-20B/37</b>
                                </figcaption>  
<figcaption>MADE <br/> IN USA </figcaption>

 <figcaption>     
                        </figure>
                </menu>
         
                <div class="grid">
                                <p class="sub-head">
                                     <span><img src="/CatalogImages/5a.jpg" width="45" height="45" /></span>
                                     <span><img src="/CatalogImages/5a1.jpg" width="45" height="45" /></span>
                                     <span><img src="/CatalogImages/5a2.jpg" width="45" height="45"/></span>
                                    <span class="grow-2"><img src="/CatalogImages/5a3.jpg" width="45" height="45"/></span>
                                     <span class="grow-2"><img src="/CatalogImages/5a4.jpg" width="45" height="45" /></span>
                                     <span class="grow-2"><img src="/CatalogImages/5a5.jpg" width="45" height="45"/></span>
                                     <span><img src="/CatalogImages/5a6.jpg" width="45" height="45"/></span>
                                     <span><img src="/CatalogImages/5a7.jpg" width="45" height="45"/></span>
                                </p>
                                <p class="head">
                                     <span>Part Number</span>
                                     <span>SAP Number</span>
                                     <span>Hose size ID</span>
                                     <span class="grow-2">Hose OD</span>
                                      <span class="grow-2">Max. Work Pressure</span>
                                     <span class="grow-2">Min. Bend Radius</span>
                                     <span>Weight</span>
                                     <span>Fitting</span>
                                </p>
                                <p class="sub-head">
                                     <span></span>
                                     <span></span>
                                     <span>in.</span>
                                     <span>in.</span>
                                     <span>mm.</span>
                                     <span>psi</span>
                                     <span>mpa</span>
                                     <span>in.</span>
                                     <span>mm.</span>
                                     <span>lbs/ft</span>
                                     <span></span>
                                 </p>

                                

                                        <?php foreach($productsData as $key => $element): ?>
                                                <?php //if($key <= 5): ?>
                                                <p>
                                                        
                                                        <span><?= $element['partNumber']; ?></span>
                                                        <span><?= $element['sapNumber']; ?></span>
                                                        <span><?= $element['hoseSizeId']; ?></span>
                                                        <span><?= $element['hoseODIn']; ?></span>
                                                        <span><?= $element['hoseODMm']; ?></span>
                                                        <span><?= $element['maxWorkingPressurePSI']; ?></span>
                                                        <span><?= $element['maxWorkingMPA']; ?></span>
                                                        <span><?= $element['minBendRadiusIn']; ?></span>
                                                        <span><?= $element['minBendRadiusMm']; ?></span>
                                                        <span><?= $element['weight']; ?></span>
                                                        <span><?= $element['fitting']; ?></span>
                                                        
                                                </p>
                                                <?php //endif; ?>
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
<?php endforeach; ?>