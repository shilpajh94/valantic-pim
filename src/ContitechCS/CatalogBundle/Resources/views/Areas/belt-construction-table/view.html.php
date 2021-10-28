<?php

$totalColumnCount =  $this->block("columns")->getCount();
$rowsCount = $this->block("rows")->getCount();

if ($totalColumnCount>0 && $rowsCount >0) { ?>

<table width="100%">

    <thead>
        <tr>
            <th class="orange" colspan="<?= $totalColumnCount; ?>" align="center"><?= $this->input("beltConstructionTitle")->getData(); ?></th>
        </tr>
        <tr>
            <?php while ($this->block("columns")->loop()) { ?>
                <th><?= $this->input("heading")->getData(); ?></th>
            <?php } ?>
        </tr>
    </thead>

    <tbody>
        <?php
        while ($this->block("rows")->loop()) {
        ?> 
        <tr>
            <?php for ($i=0; $i<$totalColumnCount; $i++) { ?>
            <td>
                <?php 
                
                while ($this->block("points_".$i)->loop()) { 
                    echo $this->input("pa_points_".$i)->getData();
                }
                
                ?>
            </td>
            <?php } ?>
        </tr>

        <?php } ?>

    </tbody>

</table>
<?php } ?>