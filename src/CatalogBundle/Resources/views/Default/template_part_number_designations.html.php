<?php
$this->extend('CatalogBundle:Layouts:layout.html.php',['name1'=>'Name from Extend']);
?>

<section class="seggregate">
<?php  echo $this->inc($this->document->getProperty('header'),['title'=>'Hydraulic Hose']) ?>
<?php  echo $this->inc($this->document->getProperty('footer'),['title'=>'General Information', 'subTitle'=>'Part Number Designations', 'thirdSection'=>false]) ?>
        
    <article class="fullcontainer">
      <header class="content">
          <h3><?= $this->input("PBD_Heading")->setDataFromResource('Part Number Designations') ?></h3>
      </header>
      <section class="content">
      <?php while($this->block("PBD_Block")->loop()) { ?>
        
                <div class="part_number_table" style="page-break-after:auto">
                        <p class="row top">
                                <span></span>
                                <span>description</span>
                                <span>page</span>
                        </p>
                        <?php while($this->block("PBD_Block_Brand")->loop()) { ?>
                                <div class="row full" style="page-break-after:auto">
                                        <span><?= $this->input("PND_BrandName"); ?></span>
                        </div>
                                <?php while($this->block("PBD_Block_Family")->loop()) { ?>
                                        <div class="row" style="page-break-after:auto">
                                                <span><?= $this->input("PND_FamilyName"); ?></span>
                                                <span><?= $this->input("PND_IndustryStandard"); ?></span>
                                                <span><?= $this->input("PND_PageNumber"); ?></span>
                                </div>
                                <?php } ?>
                        <?php } ?>
                </div>
                
        <?php } ?>
        </section>

    </article>
</section>