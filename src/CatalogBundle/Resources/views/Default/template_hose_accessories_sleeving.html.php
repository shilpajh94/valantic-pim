<?php
if (!isset($this->parentContainer)) {
$this->extend('CatalogBundle:Layouts:layout.html.php',['name1'=>'Name from Extend']);
}
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
<div class="template">
<section class="segregate">
<div id="pageHeader"></div>
        <span class="pageName">Hydraulic Hose</span>


<div class="footer">
    <footer class="flex-center <?php echo $footer_class; ?>">
 <span class="logo">
            <b>Hose</b>
            <?php if($footer_class == 'reverseColor'): ?>
                        <img src="/CatalogImages/Continental_Logo_Master_Black.png">
                <?php else: ?>
                        <img src="/CatalogImages/Continental_Logo_Master_yellow.png">
                <?php endif; ?>
    </span>
    <div class="flex aligned">
                    <h5>
                    <?php if($this->editmode): ?>
                        <?php if($this->input("HHAS_Footer_Title1")->isEmpty()): ?>
                                <?= $this->input("HHAS_Footer_Title1")->setDataFromResource('Hose Accessories') ?>
                        <?php else: ?>
                                <?= $this->input("HHAS_Footer_Title1"); ?>
                        <?php endif; ?>
                <?php else: ?>
                                <?= $this->input("HHAS_Footer_Title1") ?>
                <?php endif; ?>
    
                    <span>
                    <?php if($this->editmode): ?>
                        <?php if($this->input("HHAS_Footer_SubTitle1")->isEmpty()): ?>
                                <?= $this->input("HHAS_Footer_SubTitle1")->setDataFromResource('Protective Sleeving / Protective Wrap') ?>
                        <?php else: ?>
                                <?= $this->input("HHAS_Footer_SubTitle1"); ?>
                        <?php endif; ?>
                        <?php else: ?>
                                        <?= $this->input("HHAS_Footer_SubTitle1") ?>
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
                        <?php if($this->input("HHAS_Footer_Title2")->isEmpty()): ?>
                                <?= $this->input("HHAS_Footer_Title2")->setDataFromResource('Hose Accessories') ?>
                        <?php else: ?>
                                <?= $this->input("HHAS_Footer_Title2"); ?>
                        <?php endif; ?>
                <?php else: ?>
                                <?= $this->input("HHAS_Footer_Title2") ?>
                <?php endif; ?>
    
                    <span>
                    <?php if($this->editmode): ?>
                        <?php if($this->input("HHAS_Footer_SubTitle2")->isEmpty()): ?>
                                <?= $this->input("HHAS_Footer_SubTitle2")->setDataFromResource('Protective Sleeving / Protective Wrap') ?>
                        <?php else: ?>
                                <?= $this->input("HHAS_Footer_SubTitle2"); ?>
                        <?php endif; ?>
                        <?php else: ?>
                                        <?= $this->input("HHAS_Footer_SubTitle2") ?>
                        <?php endif; ?>
                    
                    </span>
                </h5>
    </div>
   <span class="logo">
            <b>Hose</b>
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
        $incr = 1;
        foreach($data as $key => $brand):

        extract($brand);

        ?>      

       <figure class="justify-between">
           
           <figcaption>
                <?php if(!$onlyOneTitle): ?>
                <h2>
                <?php
                if ($this->input("HHAS_HeadingRight_{$incr}")->isEmpty()) {
                        echo $this->input("HHAS_HeadingRight_{$incr}")->setDataFromResource("Hose Accessories");
                } else {
                        echo $this->input("HHAS_HeadingRight_{$incr}");
                }
                ?>
                </h2>
                <?php 
                $onlyOneTitle = true;
                endif;
                ?>

                <h4 class="contitech-yellow">
                
                <?php
                        echo $this->input("HHAS_BrandNameRight_{$incr}")->setDataFromResource($brandName);
                ?>
                </h4>

                <span>
                <?php
                        echo $this->wysiwyg("HHAS_LongDescriptionRight_{$incr}")->setDataFromResource($longDescription);
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

        $incr++;

        endforeach; 

        endif;

        ?>
</section>
    </article>
</div>





</section>
   
    </div>