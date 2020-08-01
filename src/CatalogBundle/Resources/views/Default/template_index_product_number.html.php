<?php
$this->extend('CatalogBundle:Layouts:layout.html.php');
?>
<article>
    <div id="pageHeader"></div>
    <span  class="pageName">Index</span>

    <h3>Alphanumeric Index by Product Number</h3>

    <?php if($this->editmode): ?>
    
        <div id="amortizationTable" class="content_single">
        <?php else: ?>
       
            <div id="amortizationTable" class="content_double">
        <?php endif; ?>

    
        
        
            <?php $block = $this->block("gridblock", ["manual" => true])->start(); ?>
<table>
<thead>
<tr>
<td><strong>PRDOUCT #</strong></td>
<td><strong>PAGE #</strong></td>
</tr>
</thead>
<?php 
$rowCount = 1;
while ($block->loop()) { ?>
                 
    <tr>
    <?php $block->blockConstruct(); ?>
            <?php $block->blockStart(); ?> 
                <td><?= $this->input("td1")->setDataFromResource("Text - {$rowCount}"); ?></td>
                <td><?= $this->input("td2")->setDataFromResource("{$rowCount}"); ?></td>
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

</article>
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

#amortizationTable {
    column-gap: 5mm;
}
#amortizationTable table {
    width: 100%;
    /* border-collapse: collapse; */
}

#amortizationTable td {
    border: 1px solid silver;
}
#amortizationTable thead td {
    background:yellow;
}
</style>