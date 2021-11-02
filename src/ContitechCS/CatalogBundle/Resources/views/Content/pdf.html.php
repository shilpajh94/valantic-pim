<?php
if (!isset($this->parentContainer)) {
    $this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
} ?>

<div class="template pdf-page coverPage1">

    <div class="">
        <?php if ($this->editmode) { ?>
        <div class="error">Warning: a minimum 300 dpi is file is required.</div>
        <?php } ?>
        <div class="template without-header areaPdf">
            <?php if($this->editmode) { ?>
            <?= $this->pdf("pdf", ["placeholder" => 'PDF drop' ]); ?>
            <?php } else { 
                    $requestUrl = $_SERVER['REQUEST_URI'];
                    $previewUrl = "pimcore_preview=true";
                    if (strpos($requestUrl, $previewUrl) !== false) { ?>
            <?= $this->pdf("pdf", ["placeholder" => 'PDF drop' ]); ?>
            <?php } else { 
                        $element = $this->pdf("pdf")->getElement(); 

                        if($element)
                        {
                        $path = \S3CustomizationBundle\Lib\Utils::getAssetFullPathCompatibleToS3($element); 
                        
                        ?>
            <div id="pimcore-pdf" class="pimcore-pdfViewer">
                <a href="<?php echo $path; ?>" target="_blank">
                    <img alt="" src="<?php echo $path; ?>">
                </a>
            </div>
            <?php   
                        }
                    } 
                } ?>
        </div>
    </div>
</div>

<style>
#pimcore-pdf img {
    max-width: 100%;
    height: auto;
}

.coverPage1 {
    page: title80;
    width: 100%;
    height: 100%;
    break-after: avoid;
    break-before: avoid;
}

.coverPage1 .footer2 {
    display: none;
    text-align: left;
    position: running(footer2);

}

.coverPage1 .footer3 {
    display: none;
    text-align: left;
    position: running(footer3);
}

@page title80 {
    margin-left: 0;
    margin-right: 0;
    margin-top: 50px;
    margin-bottom: 120px;
    padding: 0px;
    content: counter(0);

    @top-right-corner {
        content: "";
    }

    @top-left-corner {
        content: "";

    }

    @top-right {
        content: "";
    }

}

@page title80:left {
    @bottom-center {
        content: element(footer2);
        z-index: 1;
    }
}

@page title80:right {
    @bottom-center {
        content: element(footer3);
        z-index: 1;
    }
}
</style>