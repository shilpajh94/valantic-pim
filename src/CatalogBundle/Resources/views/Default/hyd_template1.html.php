<?php
$this->extend('CatalogBundle:Layouts:layout.html.php');
?>
<article class="container">
    <figure>
        <span>
            <img src="http://contitechdev.com.local/static/images/print_images/1.JPG" />
        </span>
        <figcaption>
            <h3>O-Ring Tube</h3>
            <p>
                <b>Female to O-Ring Insert</b>
                Male / R12 Valve 
            </p>
        </figcaption>
    </figure>

    <?php if($this->editmode): ?>
        <?= $this->relation("FittingAccessories_ACAdapter", [
            "types" => ["object"],
            "subtypes" => [
                "object" => ["object"]
            ],
            "classes" => ["CatalogTables"],
        ]); 
    ?>
    <?php else: ?>

        <?php $elementObj = $this->relation("FittingAccessories_ACAdapter")->getElement(); ?>
        <?php if ($elementObj instanceof Pimcore\Model\DataObject): ?>
            <?php $tableColumns = json_decode($elementObj->getColumns()); ?>
            <div class="grid">
                <p class="head">
                    <?php foreach($tableColumns as $element): ?>
                        <span><?= $element->columnLabel; ?></span>
                    <?php endforeach; ?>
                </p>
                <p class="sub-head">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span>in.</span>
                    <span></span>
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
        <?php endif; ?>
    <?php endif; ?>
</article>
