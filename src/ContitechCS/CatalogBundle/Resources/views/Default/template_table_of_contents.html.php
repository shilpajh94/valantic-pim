<?php
if (!isset($this->parentContainer)) {
$this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
}
?>
<div class="wrapper">
        <header id="header">
            <div class="header-sec">
                <div><strong>Conveying Solutions</strong> 
                <?php if($this->input("TOC_header_title")->isEmpty()): ?>
                        <?= $this->input("TOC_header_title")->setDataFromResource('Table of Contents'); ?>
                    <?php else: ?>
                        <?= $this->input("TOC_header_title"); ?>
                    <?php endif; ?>
                </div>
                <div class="print-pg-no"></div>
            </div>
        </header>
        <main id="content" role="main">
            <div class="table-content-sec">
                <?php if($this->editmode): ?>
                    <?php if($this->input("CBS_TOC_Heading")->isEmpty()): ?>
                        <h1 class="orange"><?= $this->input("CBS_TOC_Heading")->setDataFromResource('Table of contents'); ?></h1>
                    <?php else: ?>
                        <h1 class="orange"><?= $this->input("CBS_TOC_Heading"); ?></h1>
                    <?php endif; ?>
                <?php else: ?>
                    <h1 class="orange"><?= $this->input("CBS_TOC_Heading") ?></h1>
                <?php endif; ?>
                <div class="table-of-contents">
                    <div class="colum-2">
                    <?php while($this->block("CBS_TOC_HeadingBlock")->loop()) { ?>
                        <h3 class="black-bg"><?= $this->input("CBS_TOC_HeadingName", ['placeholder' => 'Featured Solutions']); ?></h3>
                        
                        <?php while($this->block("CBS_TOC_ContentBlock")->loop()) { ?>
                            <span class="chapter"><?= $this->input("CBS_TOC_Title", ['placeholder' => 'Enter title here.']); ?></span> 
                            <span class="page"><?= $this->input("CBS_TOC_Page", ['placeholder' => 'Enter page number here.']); ?></span>

                            <?php while($this->block("CBS_TOC_ContentBlockInner")->loop()) { ?>

                                <span class="chapter"><?= $this->input("CBS_TOC_Title_Inner", ['placeholder' => 'Enter inner title here.']); ?></span> 
                                <span class="page"><?= $this->input("CBS_TOC_Page_Inner", ['placeholder' => 'Enter page number here.']); ?></span>

                                <?php } ?>
                        <?php } ?>

                    <?php } ?>
                    </div>
                </div>
            </div>
        </main>
        <footer id="footer" class="footer">
            <img src="<?= $footer_logo_src; ?>" alt="" class="img-fluid" width="150">
        </footer>
    </div>