<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if ($this->editmode) {
    echo "Select how many heading you want in table: ";
    while ($this->block("columns")->loop()) { //Service Required....  //column number
        echo $this->input("heading", ['placeholder' => 'Enter Heading']); //placeholder input
    }
    $totalColumnCount =  $this->block("columns")->getCount(); //print_r($totalColumnCount);die; //4
    if ($totalColumnCount>0) { // 4
        echo "Select how many rows you want in table: "; //for rows
        while ($this->block("rows")->loop()) { //row loop
//            $current = $this->block("rows")->getCurrent();
            for ($i=0; $i<$totalColumnCount; $i++) {          // i=0 ,0<4
                while ($this->block("points_".$i)->loop()) { // points like Log Decks...
                    echo $this->input("pa_points_".$i, ['placeholder' => 'Enter point']); //placeholder input for rows point 
                }
            }
        }
    }
}
?>