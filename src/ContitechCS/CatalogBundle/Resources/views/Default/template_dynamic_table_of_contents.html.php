<?php
if (!isset($this->parentContainer)) {
$this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
}
?>
<?php if($data): ?>
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
                <?php
                    foreach ($data as $section => $childs) {
                        while($this->block("CBS_TOC_HeadingBlock")->loop()) { ?>
                            <h3 class="orange-bg">
                        <?php
                            if($this->input("CBS_TOC_HeadingName")->isEmpty())
                            {
                                echo $this->input("CBS_TOC_HeadingName",['placeholder' => 'Featured Solutions' ])->setDataFromResource($section);
                            }
                            else
                            {
                                echo $this->input("CBS_TOC_HeadingName", ['placeholder' => 'Featured Solutions']);
                            }
                        ?>
                        </h3>
                        
                    <?php } ?>
                        <?php } ?>
                    
                    
                    
                </div>
            </div>
        </section>
    </main>

</div>
<?php endif; ?>
