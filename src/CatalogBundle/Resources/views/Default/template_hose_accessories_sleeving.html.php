<?php
if (!isset($this->parentContainer)) {
$this->extend('CatalogBundle:Layouts:layout.html.php');
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
            <b>
                <?php if($this->editmode): ?>
                        <?php if($this->input("HHAS_Logo_Text1")->isEmpty()): ?>
                                <?= $this->input("HHAS_Logo_Text1")->setDataFromResource('Hose') ?>
                        <?php else: ?>
                                <?= $this->input("HHAS_Logo_Text1"); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("HHAS_Logo_Text1") ?>
                <?php endif; ?>
                </b>
                <img src="<?= $footer_logo_src; ?>">
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
                <b>
                <?php if($this->editmode): ?>
                        <?php if($this->input("HHAS_Logo_Text2")->isEmpty()): ?>
                                <?= $this->input("HHAS_Logo_Text2")->setDataFromResource('Hose') ?>
                        <?php else: ?>
                                <?= $this->input("HHAS_Logo_Text2"); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("HHAS_Logo_Text2") ?>
                <?php endif; ?>
                </b>
                <img src="<?= $footer_logo_src; ?>">
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
                        <h6><?= $this->translate('specs') ?></h6>
                        <div class="spec-requirement">

                           <?php if($safetyFeatures || !empty(trim($materialString)) || (!empty(trim($temperatureRangeFAndC)))): ?>
                            
                                <?php if ($safetyFeatures): ?>
                                        <div>
                                        <?php foreach ($safetyFeatures as $key => $feature): ?>
                                                <p  class="flex">
                                                <font> <?= $feature['name'] ?></font>
                                                </p>
                                        <?php endforeach; ?>

                                        </div>
                                <?php endif; ?>

                            <div>
                                <?php if(!empty(trim($temperatureRangeFAndC))): ?>
                                <p class="small">     
                                        <b><?= $this->translate('Temperature Range') ?></b>
                                        <?=$temperatureRangeFAndC ?>
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
                <?php
                if ($this->editmode) {
                echo $this->image("HHAS_Image_{$incr}", ["width" => 200, "height" => 200])->setImage($imageObj);
                } else {
                if(!$this->image("HHAS_Image_{$incr}")->isEmpty())
                        echo $this->image("HHAS_Image_{$incr}", ["width" => 200, "height" => 200]);
                }
                ?>
       </figure>
       <table class="grid" cellspacing="0" cellpadding="0">
                <thead>
                        <?php if($iconRequired == 'YES'): ?>
                                <tr class="sub-head">
                                        <?php foreach($columnsDataWithImages as $key => $c1data): ?>
                                                <?php 
                                                        $g1count = count($c1data);
                                                        $firstArray = array_shift($c1data);
                                                ?>
                                                <td colspan="<?= $g1count; ?>">
                                                <?php if($firstArray['columnIcon']): ?>
                                                <img src="<?= $firstArray['columnIcon'] ?>" width="45" height="45" />
                                                <?php endif; ?>
                                                </td>
                                        <?php endforeach; ?>
                                </tr>
                        <?php endif; ?>

                        <tr class="head">
                        <?php foreach($columnsDataWithImages as $key => $c2data): ?>
                                
                                <?php 
                                        $g2count = count($c2data);
                                        $first2Array = array_shift($c2data);
                                ?>
                                <td colspan="<?= $g2count; ?>"><?= $first2Array['columnLabel'] ?></td>
                                
                        <?php endforeach; ?>
                        </tr>
                                        
                        <?php if($subHeaderRequired == 'YES'): ?>
                                <tr class="sub-head">
                                        <?php foreach($columnsDataWithImages as $key => $c3data): ?>
                                                <?php  foreach($c3data as $c3key => $c3value): ?>
                                                        <?php if($c3value['unitName']): ?>
                                                                <td><?= $c3value['unitName'] ?></td>
                                                        <?php else: ?>
                                                                <td></td>
                                                        <?php endif; ?>
                                                <?php endforeach; ?>
                                        <?php endforeach; ?>
                                </tr>
                        <?php endif; ?>
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
        <p class="small"><?= $this->input('HHAS_note' . $incr, ['placeholder' => 'Enter comment']); ?></p>
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