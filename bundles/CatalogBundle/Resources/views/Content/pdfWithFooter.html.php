<?php
if (!isset($this->parentContainer)) {
    $this->extend('CatalogBundle:Layouts:layout.html.php');
} ?>
<div class="template coverPage3">
    <div class="segregate ">
        <?php if ($this->editmode) { ?>
            <div class="error" >Warning: a minimum 300 dpi is file is required.</div>
        <?php } ?>
            <div id="pageHeader"></div>
            <div class="footer">
                <footer class="flex-center ">
                    <span class="logo">
                        <?php if ($this->editmode) { ?>
                            <?= $this->image('PDF_PAGE_FOOTER1_LOGO', ["title" => "Brand Logo"]) ?>
                        <?php } else { ?>
                        <img src="<?= $this->image('PDF_PAGE_FOOTER1_LOGO')->getSrc(); ?>" />
                        <?php } ?>
                    </span>
                    <div class="flex aligned">
                        <h5 class="marginTop2">
                            <?= $this->input("PDF_PAGE_FOOTER1_BRAND", ["placeholder" => "Brand"]) ?>
                            <span>
                                <?= $this->input("PDF_PAGE_FOOTER1_CAT", ["placeholder" => "eg: Enter Product Category"]); ?>
                            </span>
                        </h5>
                        <div class="compatible">
                            <?= $this->wysiwyg("PDF_PAGE_FOOTER1_COMP_FITTING", ["placeholder" => "eg: Enter Product Category"]) ?>
                        </div>
                    </div>
                </footer>
            </div>

            <div class="footer1">
                <footer class="flex-center">
                    <div class="flex aligned">
                        <div class="compatible">
                            <?= $this->wysiwyg("PDF_PAGE_FOOTER2_COMP_FITTING", ["placeholder" => "eg: Enter Product Category"]) ?>
                        </div>
                        <h5 class="marginTop2">
                            <?= $this->input("PDF_PAGE_FOOTER2_BRAND", ["placeholder" => "Brand"]) ?>
                            <span>
                                <?= $this->input("PDF_PAGE_FOOTER2_CAT", ["placeholder" => "eg: Enter Product Category"]); ?>
                            </span>
                        </h5>
                    </div>
                    <span class="logo">
                        <?php if ($this->editmode) { ?>
                            <?= $this->image('PDF_PAGE_FOOTER2_LOGO', ["title" => "Brand Logo"]) ?>
                        <?php } else { ?>
                        <img src="<?= $this->image('PDF_PAGE_FOOTER2_LOGO')->getSrc(); ?>" />
                        <?php } ?>
                    </span>
                </footer>
            </div>
            <div class="without-header areaPdf">
                <?php if($this->editmode) { ?>
                    <?= $this->pdf("pdfwithfooter", ["placeholder" => 'PDF drop' ]); ?>
                <?php } else { 
                    $requestUrl = $_SERVER['REQUEST_URI'];
                    $previewUrl = "pimcore_preview=true";
                    if (strpos($requestUrl, $previewUrl) !== false) { ?>
                        <?= $this->pdf("pdfwithfooter", ["placeholder" => 'PDF drop' ]); ?>
                    <?php } else { 
                        $element = $this->pdf("pdfwithfooter")->getElement(); 
                        $path = \S3CustomizationBundle\Lib\Utils::getAssetFullPathCompatibleToS3($element); ?>
                        <div id="pimcore-pdf" class="pimcore-pdfViewer1">
                            <a href="<?php echo $path; ?>" target="_blank">
                                <img alt="" src="<?php echo $path; ?>">
                            </a>
                        </div>
                <?php } 
                } ?>
            </div>
    </div>
</div>
<style>

.pimcore-pdfViewer1{ height:100vh; /*overflow:hidden;*/ padding: 15px;}
.pimcore-pdfViewer1 img{ max-width:100%; width: 100%; 
height:auto; max-height:98%;}

.coverPage3{

break-after: avoid;
break-before: avoid;
}
</style>