<!DOCTYPE html>
<?php
if (!isset($this->parentContainer)) {
$this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
}
?>
<div class="wrapper">
    <div class="backcoverpage">
        <div class="black-bg">
            <div class="top-sec">
                <?php if($this->input("Conveyor_Belt_Group_header_title")->isEmpty()): ?>
                <?= $this->input("Conveyor_Belt_Group_header_title")->setDataFromResource('Conveyor Belt Group'); ?>
                <?php else: ?>
                <?= $this->input("Conveyor_Belt_Group_header_title"); ?>
                <?php endif; ?>

                <p>
                    <?php if($this->editmode): ?>
                    <?php if($this->input("CBG_ShortText")->isEmpty()): ?>
                    <span><?= $this->input("CBG_ShortText")->setDataFromResource('Market segment');?></span>
                    <?php else: ?>
                    <span><?= $this->input("CBG_ShortText"); ?></span>
                    <?php endif; ?>
                    <?php else: ?>
                    <span> <?= $this->input("CBG_ShortText") ?></span>
                    <?php endif; ?>

                    <?php if($this->editmode): ?>
                    <?php if($this->input("CBG_Text")->isEmpty()): ?>
                    <?= $this->input("CBG_Text")->setDataFromResource('Conveyor Belt');?>
                    <?php else: ?>
                    <?= $this->input("CBG_Text"); ?>
                    <?php endif; ?>
                    <?php else: ?>
                    <?= $this->input("CBG_Text") ?>
                    <?php endif; ?>
                </p>
                <p>
                    <?php if($this->editmode): ?>
                    <?php if($this->input("CBG_Contact_ShortText")->isEmpty()): ?>
                    <span><?= $this->input("CBG_Contact_ShortText")->setDataFromResource('Contact');?></span>
                    <?php else: ?>
                    <span><?= $this->input("CBG_Contact_ShortText"); ?></span>
                    <?php endif; ?>
                    <?php else: ?>
                    <span> <?= $this->input("CBG_Contact_ShortText") ?></span>
                    <?php endif; ?>

                    <?php if($this->editmode): ?>
                    <?php if($this->input("CBG_first_Details")->isEmpty()): ?>
                    <?= $this->input("CBG_first_Details")->setDataFromResource('Continental');?>
                    <?php else: ?>
                    <?= $this->input("CBG_first_Details"); ?>
                    <?php endif; ?>
                    <?php else: ?>
                    <?= $this->input("CBG_First_Details") ?>
                    <?php endif; ?>

                    <?php if($this->editmode): ?>
                    <?php if($this->input("CBG_Second_Details")->isEmpty()): ?>
                    <?= $this->input("CBG_Second_Details")->setDataFromResource('703 S. Cleveland Massillon Road');?>
                    <?php else: ?>
                    <?= $this->input("CBG_Second_Details"); ?>
                    <?php endif; ?>
                    <?php else: ?>
                    <?= $this->input("CBG_Second_Details") ?>
                    <?php endif; ?>

                    <?php if($this->editmode): ?>
                    <?php if($this->input("CBG_Third_Details")->isEmpty()): ?>
                    <?= $this->input("CBG_Third_Details")->setDataFromResource('Fairlawn, OH 44333-3023 U.S.A.');?>
                    <?php else: ?>
                    <?= $this->input("CBG_Third_Details"); ?>
                    <?php endif; ?>
                    <?php else: ?>
                    <?= $this->input("CBG_Third_Details") ?>
                    <?php endif; ?>

                    <?php if($this->editmode): ?>
                    <?php if($this->input("CBG_Fourth_Details")->isEmpty()): ?>
                    <?= $this->input("CBG_Fourth_Details")->setDataFromResource('1-800-235-8872');?>
                    <?php else: ?>
                    <?= $this->input("CBG_Fourth_Details"); ?>
                    <?php endif; ?>
                    <?php else: ?>
                    <?= $this->input("CBG_Fourth_Details") ?>
                    <?php endif; ?>

                    <?php if($this->editmode): ?>
                    <?php if($this->input("CBG_Fifth_Details")->isEmpty()): ?>
                    <?= $this->input("CBG_Fifth_Details")->setDataFromResource('www.continental-industry.com');?>
                    <?php else: ?>
                    <?= $this->input("CBG_Fifth_Details"); ?>
                    <?php endif; ?>
                    <?php else: ?>
                    <?= $this->input("CBG_Fifth_Details") ?>
                    <?php endif; ?>

                </p>
                <p>
                    <?php if($this->editmode): ?>
                    <?php if($this->input("CBG_Contact")->isEmpty()): ?>
                    <span><?= $this->input("CBG_Contact")->setDataFromResource('Your local contact');?></span>
                    <?php else: ?>
                    <span><?= $this->input("CBG_Contact"); ?></span>
                    <?php endif; ?>
                    <?php else: ?>
                    <span> <?= $this->input("CBG_Contact") ?></span>
                    <?php endif; ?>

                    <?php if($this->editmode): ?>
                    <?php if($this->input("CBG_Website_Details")->isEmpty()): ?>
                    <?= $this->input("CBG_Website_Details")->setDataFromResource('www.contitech.de/contactlocator');?>
                    <?php else: ?>
                    <?= $this->input("CBG_Website_Details"); ?>
                    <?php endif; ?>
                    <?php else: ?>
                    <?= $this->input("CBG_Website_Details") ?>
                    <?php endif; ?>
                </p>
                <p>
                    <?php if($this->editmode): ?>
                    <?php if($this->input("CBG_Canada")->isEmpty()): ?>
                    <span><?= $this->input("CBG_Canada")->setDataFromResource('Canada');?></span>
                    <?php else: ?>
                    <span><?= $this->input("CBG_Canada"); ?></span>
                    <?php endif; ?>
                    <?php else: ?>
                    <span> <?= $this->input("CBG_Canada") ?></span>
                    <?php endif; ?>

                    <?php if($this->editmode): ?>
                    <?php if($this->input("CBG_Con_Details")->isEmpty()): ?>
                    <?= $this->input("CBG_Con_Details")->setDataFromResource('1-800-263-77');?>
                    <?php else: ?>
                    <?= $this->input("CBG_Con_Details"); ?>
                    <?php endif; ?>
                    <?php else: ?>
                    <?= $this->input("CBG_Con_Details") ?>
                    <?php endif; ?>

                </p>
            </div>
            <div class="bottom-sect">
                <div class="backcover-logo">
                    <?php

                        if($this->editmode)
                        {
                            echo $this->image("CBG_Image");
                        }
                        else
                        {
                            $imgSrcObj =  $this->image("CBG_Image");
                            if($imgSrcObj)
                            {
                            ?>
                    <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" />
                    <?php
                        }
                    }
                ?>

                </div>
                <p>
                    <?php if($this->editmode): ?>
                    <?php if($this->input("CBG")->isEmpty()): ?>
                    <?= $this->input("CBG")->setDataFromResource('The content of this publication is not legally binding and is provided
                        as information only. The trademarks displayed in this publication are
                        the property of Continental AG and/or its affiliates. Copyright © 2020
                        ContiTech AG. All rights reserved. For complete information go to:
                        www.contitech.de/discl_en');?>
                    <?php else: ?>
                    <?= $this->input("CBG"); ?>
                    <?php endif; ?>
                    <?php else: ?>
                    <?= $this->input("CBG") ?>
                    <?php endif; ?>
                </p>
                <p>
                    <?php if($this->editmode): ?>
                    <?php if($this->input("CBG_End")->isEmpty()): ?>
                    <?= $this->input("CBG_End")->setDataFromResource('20781718–11/20');?>
                    <?php else: ?>
                    <?= $this->input("CBG_End"); ?>
                    <?php endif; ?>
                    <?php else: ?>
                    <?= $this->input("CBG_End") ?>
                    <?php endif; ?>
                </p>
            </div>
        </div>
    </div>
</div>