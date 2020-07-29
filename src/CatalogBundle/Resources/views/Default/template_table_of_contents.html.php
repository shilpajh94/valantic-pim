<?php
$this->extend('CatalogBundle:Layouts:layout.html.php',['name1'=>'Name from Extend']);
?>

 <div id="pageHeader"></div>
    <header class="content partNumber">
        <h2>Table of Contents</h2>
    </header>
    
    
    <?php if($this->editmode): ?>
    
<div class="content content_single table-content single">
    <?php else: ?>
   
<div class="content content_double table-content single">
    <?php endif; ?>
    <?php while($this->block("TOC_SectionBlock")->loop()) { ?>
        
          <h4><?= $this->input("TOC_SectionName"); ?></h4>
          <article>
          <?php while($this->block("TOC_HeadingBlock")->loop()) { ?>
            
                <h5><?= $this->input("TOC_HeadingName"); ?></h5>
                <?php if($this->editmode): ?>
                <span class="pageTitle"><?= $this->input("TOC_Desc"); ?></span>
                <?php else: ?>
                    <?php if(!$this->input("TOC_Desc")->isEmpty()): ?>
                    <span class="pageTitle"><?= $this->input("TOC_Desc"); ?></span>
                    <?php endif; ?>
                <?php endif; ?>
                <?php while($this->block("TOC_ContentBlock")->loop()) { ?>
                <p class="paging">
                    <span class="pageTitle"><?= $this->input("TOC_Title"); ?></span>
                    <span class="pageNo"><?= $this->input("TOC_Page"); ?></span>
                </p>
                <?php } ?>
            
            
        <?php } ?>
        </article>
        
    <?php } ?>
    </div>
      
    
    <style>
    div.content_single {
    -webkit-column-count: 1;
    -moz-column-count: 1;
    column-count: 1;
    -webkit-column-fill: auto;
    -moz-column-fill: auto;
    column-fill: auto;
}
div.content_double {
    -webkit-column-count: 2;
    -moz-column-count: 2;
    column-count: 2;
    -webkit-column-fill: auto;
    -moz-column-fill: auto;
    column-fill: auto;
}
</style>