<?php
if (!isset($this->parentContainer)) {
$this->extend('CatalogBundle:Layouts:layout.html.php',['name1'=>'Name from Extend']);
}
?>
<div class="template">
<div id="toc" class="toc">
 <div id="pageHeader"></div>

<div class="tableHeader" >
    <header class="content partNumber tableContent">
        <h2>Table of Contents</h2>
    </header>
</div>
    
    
    <?php if($this->editmode): ?>
    
<div class="content content_single table-content ">
    <?php else: ?>
   
<div class="content content_double table-content ">
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
      </div>
  </div>