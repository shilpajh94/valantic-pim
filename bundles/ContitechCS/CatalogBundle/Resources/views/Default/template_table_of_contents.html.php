<?php
if (!isset($this->parentContainer)) {
$this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
}
?>
<div class="wrapper">
    <header id="header">
        <div class="header-sec">
            <div class="header-txt"><span class="first-title"><?= $this->translate('CS_header_title') ?></span>
                <span class="second-title">
                    <?= $this->input("TOC_title",["placeholder" =>"Table Of Contents"]); ?></span>
            </div>
            <div class="print-pg-no"></div>
        </div>
    </header>
    <footer id="footer" class="footer">
        <div class="footer-logo">
            <img src="<?= $footer_logo_src; ?>" alt="" width="150">
        </div>
    </footer>
    <main id="content" role="main">
        <section class="table-content-sec">
            <?php if($this->editmode): ?>
            <?php if($this->input("CBS_TOC_Heading")->isEmpty()): ?>
            <h1 class="orange"><?= $this->input("CBS_TOC_Heading",['placeholder' => 'Table of Contents']); ?></h1>
            <?php else: ?>
            <h1 class="orange"><?= $this->input("CBS_TOC_Heading"); ?></h1>
            <?php endif; ?>
            <?php else: ?>
            <h1 class="orange"><?= $this->input("CBS_TOC_Heading") ?></h1>
            <?php endif; ?>
            <div class="table-of-contents">
                <div class="colum-2">
                    <?php while($this->block("CBS_TOC_HeadingBlock")->loop()) { ?>
                    <h3 class="orange-bg">
                        <?= $this->input("CBS_TOC_HeadingName", ['placeholder' => 'Featured Solutions']); ?></h3>
                    <ul>
                        <?php while($this->block("CBS_TOC_ContentBlock")->loop()) { ?>
                        <li>
                            <span
                                class="chapter"><?= $this->input("CBS_TOC_Title", ['placeholder' => 'Enter title here.']); ?></span>
                            <span
                                class="page"><?= $this->input("CBS_TOC_Page", ['placeholder' => 'Enter page number here.']); ?></span>
                        </li>
                        <ul>
                            <?php while($this->block("CBS_TOC_ContentBlockInner")->loop()) { ?>
                            <li>
                                <span
                                    class="chapter"><?= $this->input("CBS_TOC_Title_Inner", ['placeholder' => 'Enter inner title here.']); ?></span>
                                <span
                                    class="page"><?= $this->input("CBS_TOC_Page_Inner", ['placeholder' => 'Enter page number here.']); ?></span>
                            </li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                    </ul>

                    <?php } ?>
                </div>
            </div>
        </section>
    </main>

</div>
