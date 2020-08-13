<?php
if (!isset($this->parentContainer)) {
$this->extend('CatalogBundle:Layouts:layout.html.php');
}
?>
<article class="container">
    <figure>
        <span>
            <img src="/CatalogImages/1.JPG" />
            <!-- <img src="/static/images/print_images/1.JPG" /> -->
        </span>
        <figcaption>
            <h3>O-Ring Tube</h3>
            <p>
                <b>Female to O-Ring Insert</b>
                Male / R12 Valve 
            </p>
        </figcaption>
    </figure>
    <div class="grid">
        <p class="head">
            <span>Part Number</span>
            <span>Product Number</span>
            <span>SAP Number</span>
            <span>Thread Size OTCF</span>
            <span>Thread Size OIM</span>
        </p>
        
        <p>
            <span>AEDKSJFKDSJFKS</span>
            <span>454545-5455</span>
            <span>1544545</span>
            <span>1-14</span>
            <span>3/1-14</span>
        </p>
        
        <p>
            <span>AEDKSJFKDSJFKS</span>
            <span>454545-5455</span>
            <span>1544545</span>
            <span>1-14</span>
            <span>3/1-14</span>
        </p>

        <p>
            <span>AEDKSJFKDSJFKS</span>
            <span>454545-5455</span>
            <span>1544545</span>
            <span>1-14</span>
            <span>3/1-14</span>
        </p>

        <p>
            <span>AEDKSJFKDSJFKS</span>
            <span>454545-5455</span>
            <span>1544545</span>
            <span>1-14</span>
            <span>3/1-14</span>
        </p>
    </div>
       
    <?php if ($this->editmode): ?>
    <?= $this->relation("myRelation", [
            "types" => ["asset","object"],
            "subtypes" => [
                "asset" => ["video","image"],
                "object" => ["object"]
            ],
            "classes" => ["CompetitorParts"],
        ]); 
    ?>
    <?php else: ?>
        <?php $element = $this->relation("myRelation")->getElement(); ?>
        <?php if ($element instanceof Pimcore\Model\DataObject): ?>
            <div class="grid">
            <p class="head">
                    <span>Competitor Name</span>
                    <span>Product Name</span>
                    <span>Part Number</span>
                    <span>CompetitorId Dec</span>
                    <span>Competitor Length</span>
            </p>
            <p>
                    <span><?= $element->getCompetitorName() ?></span>
                    <span><?= $element->getCompetitorProductName() ?></span>
                    <span><?= $element->getPartNumber() ?></span>
                    <span><?= $element->getCompetitorIdDec() ?></span>
                    <span><?= $element->getCompetitorLength() ?></span>
            </p>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <?php if($this->editmode): ?>
        <?= $this->relations("objectPaths", [
                "types" => ["object"],
                    "subtypes" => [
                        "object" => ["object"]
                    ],
                    "classes" => ["Product"]
                ]); 
        ?>
    <?php else: ?>
        <div class="grid">
            <p class="head">
                    <span>Article Number</span>
                    <span>Old Material Code</span>
                    <span>Base UOM</span>
                    <span>Gross Weight</span>
                    <span>SIOP Full Code</span>
            </p>
            
        <?php foreach($this->relations("objectPaths") as $element): ?>
        <?php if ($element instanceof Pimcore\Model\DataObject): ?>
            <p>
                <span><?= $element->getArticleNumber() ?></span>
                <span><?= $element->getOldMaterialCode() ?></span>
                <span><?= $element->getBaseUOM() ?></span>
                <span><?= $element->getGrossWeight() ?></span>
                <span><?= $element->getSiopFullCode() ?></span>
            </p>
        <?php endif; ?>
        <?php endforeach; ?>
        </div>
        
    <?php endif; ?>
       
</article>