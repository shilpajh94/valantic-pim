<?php
if (!isset($this->parentContainer)) {
$this->extend('CatalogBundle:Layouts:layout.html.php');
}
?>
<?php if($this->editmode): ?>
        <?= $this->relation("template_hose_accessories_flanges", [
                "types" => ["object"],
                "subtypes" => [
                "object" => ["object"]
                ],
                "classes" => ["CatalogTables"],
        ]); 
        ?>
<?php endif; ?>
<div class="template">
<div class="segregate">

<div id="pageHeader"></div>
        <span class="pageName">Hydraulic Hose</span>

   <div class="footer">
        <footer class="flex-center <?php echo $footer_class; ?>">
                        <span class="logo">
                                <b>
                                <?php if($this->editmode): ?>
                                        <?php if($this->input("HHAFC_Logo_Text1")->isEmpty()): ?>
                                                <?= $this->input("HHAFC_Logo_Text1")->setDataFromResource('Fittings') ?>
                                        <?php else: ?>
                                                <?= $this->input("HHAFC_Logo_Text1"); ?>
                                        <?php endif; ?>
                                <?php else: ?>
                                        <?= $this->input("HHAFC_Logo_Text1") ?>
                                <?php endif; ?>
                                </b>

                                <img src="<?= $footer_logo_src; ?>">
                        </span>
                        
                        <div class="flex aligned">
                        <h5>
                    <?php if($this->editmode): ?>
                        <?php if($this->input("HHAFC_Footer_Title1")->isEmpty()): ?>
                                <?= $this->input("HHAFC_Footer_Title1")->setDataFromResource('Split Flanges') ?>
                        <?php else: ?>
                                <?= $this->input("HHAFC_Footer_Title1"); ?>
                        <?php endif; ?>
                <?php else: ?>
                                <?= $this->input("HHAFC_Footer_Title1") ?>
                <?php endif; ?>
    
                    <span>
                    <?php if($this->editmode): ?>
                        <?php if($this->input("HHAFC_Footer_SubTitle1")->isEmpty()): ?>
                                <?= $this->input("HHAFC_Footer_SubTitle1")->setDataFromResource('Code 61 / Code 62 Clamp Kits') ?>
                        <?php else: ?>
                                <?= $this->input("HHAFC_Footer_SubTitle1"); ?>
                        <?php endif; ?>
                        <?php else: ?>
                                        <?= $this->input("HHAFC_Footer_SubTitle1") ?>
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
                        <?php if($this->input("HHAFC_Footer_Title2")->isEmpty()): ?>
                                <?= $this->input("HHAFC_Footer_Title2")->setDataFromResource('Split Flanges') ?>
                        <?php else: ?>
                                <?= $this->input("HHAFC_Footer_Title2"); ?>
                        <?php endif; ?>
                <?php else: ?>
                                <?= $this->input("HHAFC_Footer_Title2") ?>
                <?php endif; ?>
    
                    <span>
                    <?php if($this->editmode): ?>
                        <?php if($this->input("HHAFC_Footer_SubTitle2")->isEmpty()): ?>
                                <?= $this->input("HHAFC_Footer_SubTitle2")->setDataFromResource('Code 61 / Code 62 Clamp Kits') ?>
                        <?php else: ?>
                                <?= $this->input("HHAFC_Footer_SubTitle2"); ?>
                        <?php endif; ?>
                        <?php else: ?>
                                        <?= $this->input("HHAFC_Footer_SubTitle2") ?>
                        <?php endif; ?>
                    
                    </span>
                </h5>
                               
                               
                        </div>
                        <span class="logo">
                        <b>
                <?php if($this->editmode): ?>
                        <?php if($this->input("HHAFC_Logo_Text2")->isEmpty()): ?>
                                <?= $this->input("HHAFC_Logo_Text2")->setDataFromResource('Fittings') ?>
                        <?php else: ?>
                                <?= $this->input("HHAFC_Logo_Text2"); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("HHAFC_Logo_Text2") ?>
                <?php endif; ?>
                </b>
                <img src="<?= $footer_logo_src; ?>">
                        </span>
                </footer>
        </div>

    <article class="container single">
        <header>
            <h2 class="contitech-yellow"><?php echo $this->input("HHAFC_Title"); ?></h2>
            <p><?php echo $this->wysiwyg("HHAFC_Description"); ?></p>
        </header>
        <figure class="margin15 marginBottom30">
            <figcaption class="col-6"> 
                <h6 class="contitech-yellow"><?php echo $this->input("HHAFC_Sub_Title_1"); ?></h6>
                <ul class="list method ">

                <?php while($this->block("HHAFC_SectionFirst")->loop()) { ?>
                    <li><?php echo $this->input("HHAFC_SectionFirst_".$this->block("HHAFC_SectionFirst")->getCurrent()); ?></li>
                <?php } ?>
                    
                </ul>
                <h6 class="contitech-yellow"><?php echo $this->input("HHAFC_Sub_Title_2"); ?></h6>
                <ul class="list">
                    <?php while($this->block("HHAFC_SectionSecond")->loop()) { ?>
                        <li><?php echo $this->input("HHAFC_SectionSecond_".$this->block("HHAFC_SectionFirst")->getCurrent()); ?></li>
                    <?php } ?>
                </ul>
            </figcaption>
            <span class="img-placeholder"><?php echo $this->image("HHAFC_Image", ["width" => 400, "height" => 300]); ?></span>
        </figure>
        <?php

        if($data):
        $incr =1;
        foreach($data as $key => $brand):

        extract($brand);

        ?>   
               <div class="marginBottom30 margin15" >
                    <h2 class="contitech-yellow paddingNo"><?php echo $this->input("HHAFC_BrandName_{$incr}")->setDataFromResource($brandName); ?></h2>
                    <h3 class="light paddingNo borderBottom"><?php echo $this->wysiwyg("HHAFC_BrandName_Description_{$incr}")->setDataFromResource($shortDescription); ?></h3>
                    <table class="grid special" cellspacing="0" cellpadding="0">
            <thead>
                            <tr class="head noBorder">

                            <?php foreach($columnsDataWithImages as $key => $columnsData): ?>
                                    <td><?= $columnsData['columnLabel'] ?></td>
                            <?php endforeach; ?>

                            </tr>
                            
                            
                        </thead>    
                            <?php foreach($articlesData as $key => $element): ?>
                                    <tr>
                                            <?php foreach($element as $ekey => $value): ?>
                                                    <td><?= $value; ?></td>
                                            <?php endforeach; ?>
                                    </tr>
                            <?php endforeach; ?>
                            
                           
                           
                        </table>
               </div>
               
               
            
           <?php 
            $incr++;
            endforeach; 

            endif;

            ?>
      
    </article>
</div>
</div>
<style>
li .pimcore_tag_input.empty{
    width: 200px;
}
.reverseColor .logo {
    background-color: #ffa500;
    color: #231f20;
}
</style>