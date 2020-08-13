<?php
if (!isset($this->parentContainer)) {
$this->extend('CatalogBundle:Layouts:layout.html.php',['name1'=>'Name from Extend']);
}
?>
<?php if($this->editmode): ?>
        <?= $this->relation("template_hose_accessories_clamps", [
                "types" => ["object"],
                "subtypes" => [
                "object" => ["object"]
                ],
                "classes" => ["CatalogTables"],
        ]); 
        ?>
<?php endif; ?>
<div class="template">
<section class="segregate">
    <div id="pageHeader"></div>
        <span class="pageName">Hydraulic Hose</span>
   


<div class="footer">
    <footer class="flex-center <?php echo $footer_class; ?>">
<span class="logo">
               <b>
                <?php if($this->editmode): ?>
                        <?php if($this->input("HHAC_Logo_Text1")->isEmpty()): ?>
                                <?= $this->input("HHAC_Logo_Text1")->setDataFromResource('Hose') ?>
                        <?php else: ?>
                                <?= $this->input("HHAC_Logo_Text1"); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("HHAC_Logo_Text1") ?>
                <?php endif; ?>
                </b>
            <?php if($footer_class == 'reverseColor'): ?>
                        <img src="/CatalogImages/Continental_Logo_Master_Black.png">
                <?php else: ?>
                        <img src="/CatalogImages/Continental_Logo_Master_yellow.png">
                <?php endif; ?>
    </span>


    <div class="flex aligned">
    <h5>
                    <?php if($this->editmode): ?>
                        <?php if($this->input("HHAC_Footer_Title1")->isEmpty()): ?>
                                <?= $this->input("HHAC_Footer_Title1")->setDataFromResource('Hose Accessories') ?>
                        <?php else: ?>
                                <?= $this->input("HHAC_Footer_Title1"); ?>
                        <?php endif; ?>
                <?php else: ?>
                                <?= $this->input("HHAC_Footer_Title1") ?>
                <?php endif; ?>
    
                    <span>
                    <?php if($this->editmode): ?>
                        <?php if($this->input("HHAC_Footer_SubTitle1")->isEmpty()): ?>
                                <?= $this->input("HHAC_Footer_SubTitle1")->setDataFromResource('Routing Clamps') ?>
                        <?php else: ?>
                                <?= $this->input("HHAC_Footer_SubTitle1"); ?>
                        <?php endif; ?>
                        <?php else: ?>
                                        <?= $this->input("HHAC_Footer_SubTitle1") ?>
                        <?php endif; ?>
                    
                    </span>
                </h5>
                    
                    

            
    </div>
        </footer>

</div>

<div class="footer1">
    <footer class="flex-center <?php echo $footer_class; ?>">



    <div class="flex aligned">

    <h5>
                    <?php if($this->editmode): ?>
                        <?php if($this->input("HHAC_Footer_Title2")->isEmpty()): ?>
                                <?= $this->input("HHAC_Footer_Title2")->setDataFromResource('Hose Accessories') ?>
                        <?php else: ?>
                                <?= $this->input("HHAC_Footer_Title2"); ?>
                        <?php endif; ?>
                <?php else: ?>
                                <?= $this->input("HHAC_Footer_Title2") ?>
                <?php endif; ?>
    
                    <span>
                    <?php if($this->editmode): ?>
                        <?php if($this->input("HHAC_Footer_SubTitle2")->isEmpty()): ?>
                                <?= $this->input("HHAC_Footer_SubTitle2")->setDataFromResource('Routing Clamps') ?>
                        <?php else: ?>
                                <?= $this->input("HHAC_Footer_SubTitle2"); ?>
                        <?php endif; ?>
                        <?php else: ?>
                                        <?= $this->input("HHAC_Footer_SubTitle2") ?>
                        <?php endif; ?>
                    
                    </span>
                </h5>
                    
                    

            
    </div>

<span class="logo">
               <b>
                <?php if($this->editmode): ?>
                        <?php if($this->input("HHAC_Logo_Text2")->isEmpty()): ?>
                                <?= $this->input("HHAC_Logo_Text2")->setDataFromResource('Hose') ?>
                        <?php else: ?>
                                <?= $this->input("HHAC_Logo_Text2"); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("HHAC_Logo_Text2") ?>
                <?php endif; ?>
                </b>
            <?php if($footer_class == 'reverseColor'): ?>
                        <img src="/CatalogImages/Continental_Logo_Master_Black.png">
                <?php else: ?>
                        <img src="/CatalogImages/Continental_Logo_Master_yellow.png">
                <?php endif; ?>
    </span>
        </footer>

</div>

<div class="wrapper">
    <article class="container noBorder">
<section class="content single">
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
                        echo $this->wysiwyg("HHAC_LongDescription")->setDataFromResource($longDescription);
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
       <table class="grid" cellspacing="0" cellpadding="0">
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
                                <td><?= $columnsData['columnLabel'] ?></td>
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
                                        <td><?= $value; ?></td>
                                <?php endforeach; ?>
                        </tr>
                        <?php $incrRow++ ?>
                <?php endforeach; ?>

        </table>
       <?php 

        endforeach; 

        endif;

        ?>
</section>
    </article>
</div>



</section>
</div>