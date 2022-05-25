<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if ($this->editmode) {
    echo $this->input("beltConstructionTitle", ['placeholder' => 'Belt Construction Title']);
    echo "Select how many heading you want in table: ";
    while ($this->block("columns")->loop()) { 
        echo $this->input("heading", ['placeholder' => 'Enter Heading']); 
    }
    $totalColumnCount =  $this->block("columns")->getCount(); 
    if ($totalColumnCount>0) { 
        echo "Select how many rows you want in table: "; 
        while ($this->block("rows")->loop()) { 
            for ($i=0; $i<$totalColumnCount; $i++) {          
                while ($this->block("points_".$i)->loop()) { 
                    echo $this->input("pa_points_".$i, ['placeholder' => 'Enter Data']);  
                }
            }
        }
    }
}
?>