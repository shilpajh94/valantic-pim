<?php
if (!isset($this->parentContainer)) {
    $this->extend('CatalogBundle:Layouts:layout.html.php');
} ?>
<div class="pdf-page">
    <div class="container-inner">
        <?php if ($this->editmode) { ?>
            <div class="error" >Warning: a minimum 300 dpi is file is required.</div>
        <?php } ?>
            <div class="container without-header areaPdf">
                <?php if($this->editmode) { ?>
                    <?= $this->pdf("pdf", ["placeholder" => 'PDF drop' ]); ?>
                <?php } else { 
                    $requestUrl = $_SERVER['REQUEST_URI'];
                    $previewUrl = "pimcore_preview=true";
                    if (strpos($requestUrl, $previewUrl) !== false) { ?>
                        <?= $this->pdf("pdf", ["placeholder" => 'PDF drop' ]); ?>
                    <?php } else { 
                        $path = $this->pdf("pdf")->getElement()->getFullpath(); ?>
                        <div id="pimcore-pdf" class="pimcore-pdfViewer">
                            <a href="<?php echo $path; ?>" target="_blank">
                                <img alt="" src="<?php echo $path; ?>">
                            </a>
                        </div>
                <?php } 
                } ?>
            </div>
    </div>
</div>