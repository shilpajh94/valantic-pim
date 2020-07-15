<?php
$this->extend('CatalogBundle:Layouts:layout.html.php',['name1'=>'Name from Extend']);
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

<div class="seggregate">
<div class="footer">
<footer class="flex-center reverseColor">
<span class="logo">
        <b>Fittings</b>
        <img src="/CatalogImages/Continental_Logo_Master_Black.png">
</span>
<div class="flex reverse">
                <h5 class="rowC">
                Split Flanges 
                <span>Code 61 / Code 62 Clamp Kits</span>
                </h5>

        
</div>
</footer>
</div>

<div class="footer1">
<footer class="flex reverseColor">
        <span class="logo">
                <b>Fittings</b> 
                <img src="/CatalogImages/Continental_Logo_Master_Black.png">
        </span>
        <div class="flex aligned">
                  <h5 class="rowC">
                     Split flanges
                      <span>Code 61 / Code 62 clamps kit</span>
                  </h5>

                  
        </div>
    </footer>
</div>
    <article class="container noBorder">
        <header>
            <h1><?php echo $this->input("HHAFC_Title"); ?></h1>
            <p><?php echo $this->textarea("HHAFC_Description"); ?></p>
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
                    <h3 class="light paddingNo borderBottom"><?php echo $this->input("HHAFC_BrandName_Description_{$incr}")->setDataFromResource($longDescription); ?></h3>
                    <div class="grid special">
            
                            <p class="head noBorder">

                            <?php foreach($columnsDataWithImages as $key => $columnsData): ?>
                                    <span><?= $columnsData['columnLabel'] ?></span>
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
               </div>
               
               
            
           <?php 
            $incr++;
            endforeach; 

            endif;

            ?>
      
    </article>
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