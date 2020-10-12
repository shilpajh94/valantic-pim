<?php
if (!isset($this->parentContainer)) {
$this->extend('CatalogBundle:Layouts:layout.html.php');
}
?>
<div class="template">
    <div id="toc" class="toc">
        <div id="pageHeader"></div>

        <div class="tableHeader" >
            <header class="content partNumber tableContent">
            <?php if($this->editmode): ?>
                <?php if($this->input("TOC_Heading")->isEmpty()): ?>
                    <h2><?= $this->input("TOC_Heading")->setDataFromResource('Table of Contents'); ?></h2>
                <?php else: ?>
                    <h2><?= $this->input("TOC_Heading"); ?></h2>
                <?php endif; ?>
            <?php else: ?>
                <h2><?= $this->input("TOC_Heading") ?></h2>
            <?php endif; ?>
            </header>
        </div>
    
        <div class="content content_double  table-content ">
            <?php while($this->block("TOC_SectionBlock")->loop()) { ?>
                    <h4><?= $this->input("TOC_SectionName", ['placeholder' => 'Enter Section name here.']); ?></h4>
                    <article>
                        <?php while($this->block("TOC_HeadingBlock")->loop()) { ?>
                            <h5><?= $this->input("TOC_HeadingName", ['placeholder' => 'Enter Heading here.']); ?></h5>
                            <?php if($this->editmode): ?>
                                <span class="pageTitle"><?= $this->input("TOC_Desc", ['placeholder' => 'Enter heading description here.']); ?></span>
                            <?php else: ?>
                                <?php if(!$this->input("TOC_Desc")->isEmpty()): ?>
                                    <span class="pageTitle"><?= $this->input("TOC_Desc"); ?></span>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php while($this->block("TOC_ContentBlock")->loop()) { ?>
                                <div class="paging">
                                    <span class="pageTitle"><?= $this->input("TOC_Title", ['placeholder' => 'Enter title here.']); ?></span>
                                    <span class="pageNo"><?= $this->input("TOC_Page", ['placeholder' => 'Enter page number here.']); ?></span>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </article>
            <?php } ?>
        </div>
    </div>
</div>