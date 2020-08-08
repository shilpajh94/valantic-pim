<?php
/**
 * @var \Pimcore\Templating\PhpEngine $this
 * @var \Pimcore\Templating\PhpEngine $view
 * @var \Pimcore\Templating\GlobalVariables $app
 */
?>
<?php
$this->extend('CatalogBundle:Layouts:layout.html.php');
?>
<?php foreach($this->allChildren as $child) { ?>

    <?php
        if($child instanceof \Pimcore\Model\Document\Hardlink) {
            $child = \Pimcore\Model\Document\Hardlink\Service::wrap($child);
        }
    ?>

    <?= $this->inc($child) ?>
   <!-- <div class="break-before"></div>-->
<?php } ?>