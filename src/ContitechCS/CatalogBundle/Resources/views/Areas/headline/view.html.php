<?php

$totalColumnCount =  $this->block("columns")->getCount(); // p_r($this->block("columns")->getCount());die; //4
$rowsCount = $this->block("rows")->getCount(); //p_r($this->block("rows")->getCount());die;  //4
if ($totalColumnCount>0 && $rowsCount >0) { ?>
<table width="100%">
    <thead>
        <tr>
            <?php foreach($this->block("columns")->getElements() as $element) { ?>
            <!-- p_r($element);  info of the block column-->
            <th><?php echo $element->getInput("heading")->getData(); ?></th>
            <!--???? -->
            <?php } ?>
        </tr>
    </thead>
    <!--head over -->
    <tbody>
        <?php
        $j = 0;
        while ($this->block("rows")->loop()) {
//        foreach($this->block("rows")->getElements() as $element) {
//            $current = $element->getIndex();

            $evenOrOdd = ($j%2); ?> 
        <tr class="row_<?php echo $evenOrOdd ?>">
            <?php for ($i=0; $i<$totalColumnCount; $i++) { ?>
            <td>
                <ul>
                    <?php // p_r($element->block("points_".$i)->getElements()); die;
//                            if (!empty($element) && !empty($element->block("points_".$i))) {
                            while ($this->block("points_".$i)->loop()) {
//                            foreach ($element->block("points_".$i)->getElements() as $pointElement) { ?>
                    <li> <?php echo $this->input("pa_points_".$i)->getData(); ?></li>
                    <?php }
//                            } ?>
                </ul>
            </td>
            <?php } ?>
        </tr>
        <?php $j++; } ?>
        `
    </tbody>
</table>
<?php } ?>