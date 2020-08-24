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

    <?php if($this->editmode): ?>
    
        <div id="amortizationTable" class="content_single single">
        <?php else: ?>
       
            <div id="amortizationTable" class="content_double single">
        <?php endif; ?>

    
        
        
            <?php $block = $this->block("gridblock", ["manual" => true])->start(); ?>
            <table cellpadding="0" cellspacing="0" class="grid">
                        <thead>
                            <tr>
                            <td><span class="upper">Descriptive #</span></td>
                            <td align="right"><span class="upper">PAGE #</span></td>
                            </tr>
                        </thead>
                        <?php 
                        $rowCount = 1;
                        while ($block->loop()) { ?>
                                         
                            <tr>
                            <?php $block->blockConstruct(); ?>
                                    <?php $block->blockStart(); ?> 
                                     <td colspan="2">
                                       <p class="paging">
                                       <span class="pageTitle"><?= $this->input("td1",['placeholder'=>"Descriptive Number- {$rowCount}"]); ?></span>
                                        <span class="pageNo"><?= $this->input("td2",['placeholder'=>"Page - {$rowCount}"]); ?></span>
                                       </p>
                                     </td>

                                      
                                         <?php $block->blockEnd(); ?>
                            <?php $block->blockDestruct(); ?>
                            
                                   
                            </tr>
                           
                        <?php 
                        $rowCount++;
                        } 
                        ?>
            </table>
            <?php $block->end(); ?>
            
           
           
    </div>
</div>
</div>
<style>
    div.content_single {
    -webkit-column-count: 1;
    -moz-column-count: 1;
    column-count: 1;
    -webkit-column-fill: auto;
    -moz-column-fill: auto;
    column-fill: auto;
}
div.content_double {
    -webkit-column-count: 2;
    -moz-column-count: 2;
    column-count: 2;
    -webkit-column-fill: auto;
    -moz-column-fill: auto;
    column-fill: auto;

}


</style>