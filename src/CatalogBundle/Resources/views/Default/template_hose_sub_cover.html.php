<?php
$this->extend('CatalogBundle:Layouts:layout.html.php',['name1'=>'Name from Extend']);
?>

<?php if($this->editmode): ?>
        <?= $this->relation("template_hose_product_page", [
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
foreach($data as $catalogGroupKey => $catalogGroupData):
?>
<div class="seggregate coverPage">
    <nav class="header alternate">
       <div id="pageHeader"></div>
    </nav>
    
    <article class="containerAll noBorder">
    <header class="dark">
            <?= $this->image("HHSC_Image"); ?>
    </header>
    
        <nav class="marginBottom30">
            <h4><?= $this->input("HHSC_Heading"); ?></h4>
        </nav>
        <div class="fullcontainer containerAll">
            <p class="marginBottom30">
            <?= $this->wysiwyg("HHSC_Description",["class"=>"marginBottom30"]); ?>
            </p>
           
            <div class="bg marginTop30">               
                        <span>
                        <?php
                        echo $this->image("HHSC_Title_Image", ["width" => 50]);
                        ?>
                        </span>
                        <h3>
                        <?php
                        echo $this->input("HHSC_Title")->setDataFromResource($catalogGroupKey);
                        ?>
                        </h3>               
            </div>
            <div class="grid">
                    
                    <p class="head noBorder">
                           <span></span>
                            <span><?= $this->translate('Page') ?></span>
                            <span><?= $this->translate('Construction') ?></span>
                            <span><?= $this->translate('Inner Tube') ?></span>
                            <span><?= $this->translate('Working Pressure (psi)') ?></span>
                            <span><?= $this->translate('Temperature Range') ?></span>
                            <span><?= $this->translate('Fitting Series') ?></span>
                            <span><?= $this->translate('Approvals') ?></span>
                            <span><?= $this->translate('Packaging') ?></span>
                    </p>

                    <?php
                        if($data):
                        $incr = 1;
                        foreach($catalogGroupData as $brandName => $brandData):
                        extract($brandData);
                        ?>

                        <?php if($incr%2==0): ?>
                        <div>
                        <?php else: ?>
                        <div class="active">
                        <?php endif; ?>

                                <span><b><?= $brandName; ?></b></span>
                                <span><?= $this->input("HHSC_Page_{$incr}") ?></span>
                                <span><?= $reinforcement; ?></span>
                                <span><?= $tubeMaterialAtrributeString; ?></span>
                                <span><?= $workingPressurePSIString; ?></span>
                                <span><?= ($tempFmin .'&#8457; to '. $tempFmax.'&#8457;')?></span>
                                <span><?= $fittingFamily; ?></span>
                                <span><?= $industryStandard; ?></span>
                                <span></span>
                        </div>

                        <?php 
                        $incr++;
                        endforeach; 
                        endif;
                        ?>
                    
            </div>
              
        </div>
           
    </article>
    <div class="footer containerAll">
                <footer class="flex-center ">
                        <span class="logo">
                                <b>Hose</b>
                                <img src="/CatalogImages/logo_new.png">
                        </span>
                        <div class="flex aligned">
                        <div class="rowD">               
                                    <span>
                                    <?php
                                    echo $this->image("HHSC_Footer_Image", ["width" => 40]);
                                    ?>
                                    </span>
                                    <h5>
                                    <?php
                                    echo $this->input("HHSC_Footer")->setDataFromResource($catalogGroupKey);
                                    ?>
                                    </h5>               
                        </div>
                                
                        </div>
                </footer>
        </div>
</div>
<div class="break-before"></div>
<?php 
endforeach; 
endif;
?>