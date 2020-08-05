<?php
$this->extend('CatalogBundle:Layouts:layout.html.php',['name1'=>'Name from Extend']);
?>
<?php if($this->editmode): ?>
        <?= $this->relation("template_hose_accessories_oring", [
                "types" => ["object"],
                "subtypes" => [
                "object" => ["object"]
                ],
                "classes" => ["CatalogTables"],
        ]); 
        ?>
<?php endif; ?>
<section class="segregate">
    <div id="pageHeader"></div>
        <span class="pageName">Hydraulic Fittings</span>
   


<div class="footer">
    <footer class="flex-center ">
<span class="logo">
            <b>Fittings</b>
            <img src="/CatalogImages/logo_new.png">
    </span>


    <div class="flex aligned">
                    <h5>
                    Fitting Accessories
                    <span>O-Rings</span>
                    </h5>

            
    </div>
        </footer>

</div>

<div class="footer1">
    <footer class="flex-center ">



    <div class="flex aligned">
                    <h5>
    Fitting Accessories
                    <span>O-Rings</span>
                    </h5>

            
    </div>

<span class="logo">
            <b>Fittings</b>
            <img src="/CatalogImages/logo_new.png">
    </span>
        </footer>

</div>

<div class="wrapper">
    <article class="container noBorder">
<section class="content single">
    <?php
extract($data);
if($data):
?>   
<h2 class="contitech-yellow">
<?php
if ($this->input("HHAO_Heading")->isEmpty()) {
        echo $this->input("HHAO_Heading")->setDataFromResource("Fitting Accessories: O-Rings");
} else {
        echo $this->input("HHAO_Heading");
}
?>
</h2>
       <figure>
           
           <figcaption>
                

                <?= $this->image("HHAO_Image", ["width" => 200, "height" => 200])->setImage($imageObj); ?>
                <div>
                <?php if($materialString): ?>
                        <p><?= $this->translate('Material') ?>:<?= $materialString ?></p>
                <?php endif; ?>
                <?php if($hardness): ?>
                        <p><?= $this->translate('Hardness') ?>:<?= $hardness ?></p>
                <?php endif; ?>
                <?php if($tempratureRange): ?>
                        <p><?= $this->translate('Temprature Range') ?>:<?= $tempratureRange ?></p>
                <?php endif; ?>
                </div>
                
           </figcaption>
           
           
           
       </figure>
       <?php
       $tableCount = 0;
       foreach($brandData as $key => $brand):
        extract($brand);


?>
<br/>
       <h3 class="contitech-yellow">
        <?php
                echo $this->input("HHAO_BrandName_{$tableCount}")->setDataFromResource($brandName);
        ?>
        </h3>
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
        $tableCount++;
        endforeach; 

        endif;

        ?>
</section>
    </article>
</div>



</section>
