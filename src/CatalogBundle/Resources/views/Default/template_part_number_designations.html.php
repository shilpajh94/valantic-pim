<?php
$this->extend('CatalogBundle:Layouts:layout.html.php',['name1'=>'Name from Extend']);
?>
<?php 
$incr = 1;
while($this->block("PBD_Block")->loop()) { 
        
?>
<section class="seggregate">
<nav class="header alternate">
  <div id="pageHeader"></div>
  <span>Hydraulic Hose</span>
</nav>
<div class="footer">
<footer class="flex-center ">
<span class="logo">
        <b>Hose</b>
        <img src="/CatalogImages/logo_new.png">
</span>
<div class="flex reverse">
                <h5 class="rowC">
                General Information
                <span>Part Number Designations</span>
                </h5>

        
</div>
</footer>
</div>
        <article class="containerAll">
                <?php if($incr == 1): ?>
                <header class="content">
                        <h3><?= $this->input("PBD_Heading")->setDataFromResource('Part Number Designations') ?></h3>
                </header>
                <?php endif; ?>
                <section class="content">
                
                        <div class="part_number_table">
                                <p class="row top">
                                        <span></span>
                                        <span>description</span>
                                        <span>page</span>
                                </p>
                                <?php while($this->block("PBD_Block_Brand")->loop()) { ?>
                                        <div class="row full"  >
                                                <span><?= $this->input("PND_BrandName"); ?></span>
                                </div>
                                        <?php while($this->block("PBD_Block_Family")->loop()) { ?>
                                                <?php if($this->block("PBD_Block_Family")->getCount()-1 != $this->block("PBD_Block_Family")->getCurrent()): ?>
                                                        <div class="row">
                                                <?php else: ?>
                                                        <div class="row borderLess">
                                                <?php endif; ?>
                                                        <span><?= $this->input("PND_FamilyName"); ?></span>
                                                        <span><?= $this->input("PND_IndustryStandard"); ?></span>
                                                        <span><?= $this->input("PND_PageNumber"); ?></span>
                                        </div>
                                        <?php } ?>
                                <?php } ?>
                        </div>
        
                </section>

        </article>
        <?php //if($this->block("PBD_Block")->getCount()-1 != $this->block("PBD_Block")->getCurrent()): ?>
        <div class="break-before"></div>
        <?php //endif; ?>
</section>

<?php
$incr++; 
} 
 ?>