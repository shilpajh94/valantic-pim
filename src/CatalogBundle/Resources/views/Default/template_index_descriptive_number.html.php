<?php
if (!isset($this->parentContainer)) {
$this->extend('CatalogBundle:Layouts:layout.html.php');
}
?>
<div class="template">
    <div id="descriptive">
        <div id="pageHeader"></div>
        <span  class="pageName">Index</span>

        <div class="numberTitle">
            <?php if($this->editmode): ?>
                <?php if($this->input("HHIDN_Heading")->isEmpty()): ?>
                    <h2><?= $this->input("HHIDN_Heading")->setDataFromResource('Alphanumeric Index by Descriptive Number'); ?></h2>
                <?php else: ?>
                    <h2><?= $this->input("HHIDN_Heading"); ?></h2>
                <?php endif; ?>
            <?php else: ?>
                <h2><?= $this->input("HHIDN_Heading") ?></h2>
            <?php endif; ?>
        </div>
        <div id="amortizationTable" class="content_double single">
            <?php if($this->editmode): ?>
                <div>
                    <div class="upper"> <?= $this->input("HHIDN_th_col_1",['placeholder'=>"Table column 1"])->setDataFromResource('Descriptive #'); ?></div>
                    <div class="upper"> <?= $this->input("HHIDN_th_col_2",['placeholder'=>"Table column 2"])->setDataFromResource('Page #'); ?> </div>
                </div>
                    
                <?php 
                $rowCount = 1;
                while($this->block("HHIDN_Index_Content")->loop()) { ?>
                <div class="paging">
                    <span class="pageTitle"><?= $this->input("HHIDN_td1",['placeholder'=>"Descriptive Number- {$rowCount}"])->setDataFromResource("title-{$rowCount}"); ?></span>
                    <span class="pageNo"><?= $this->input("HHIDN_td2",['placeholder'=>"Page - {$rowCount}"])->setDataFromResource("p-{$rowCount}"); ?></span>
                </div>
                <?php 
                $rowCount++;
                } ?>

            <?php else: ?>
                <table cellpadding="0" cellspacing="0" class="grid">
                        <thead>
                            <tr>
                            <td><span class="upper"><?= $this->input("HHIDN_th_col_1"); ?></span></td>
                            <td align="right"><span class="upper"><?= $this->input("HHIDN_th_col_2"); ?></span></td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $rowCount = 1;
                        while($this->block("HHIDN_Index_Content")->loop()) { ?>
                        <tr>
                        <td colspan="2">
                        <div class="paging">
                            <span class="pageTitle"><?= $this->input("HHIDN_td1",['placeholder'=>"Descriptive Number- {$rowCount}"])->setDataFromResource("title-{$rowCount}"); ?></span>
                            <span class="pageNo"><?= $this->input("HHIDN_td2",['placeholder'=>"Page - {$rowCount}"])->setDataFromResource("p-{$rowCount}"); ?></span>
                        </div>
                        </td>
                        </tr>
                        
                        <?php 
                        $rowCount++;
                        } ?>
                        </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>
<style>
div.content_double {
    -webkit-column-count: 2;
    -moz-column-count: 2;
    column-count: 2;
    -webkit-column-fill: auto;
    -moz-column-fill: auto;
    column-fill: auto;

}
</style>