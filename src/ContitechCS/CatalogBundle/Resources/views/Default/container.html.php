<?php
/**
 * @var \Pimcore\Templating\PhpEngine $this
 * @var \Pimcore\Templating\PhpEngine $view
 * @var \Pimcore\Templating\GlobalVariables $app
 */
?>
<?php
$this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
?>
<?php foreach($this->allChildren as $child) { ?>

    <?php
        if($child instanceof \Pimcore\Model\Document\Hardlink) {
            $child = \Pimcore\Model\Document\Hardlink\Service::wrap($child);
        }
    ?>

    <?= $this->inc($child, array('containerRequest' =>TRUE)) ?>
   <!-- <div class="break-before"></div>-->
<?php } ?>