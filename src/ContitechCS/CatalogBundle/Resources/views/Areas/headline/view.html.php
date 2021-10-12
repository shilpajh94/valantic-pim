 <?php  while($this->block("W_Product_Points")->loop()) { ?>
 <td>
     <ul>
         <?php while($this->block("WP_Points")->loop()) { ?>
         <li> <?= $this->input("pa_points", ['placeholder' => 'Enter Name']); ?></li>
         <?php

                    }
                ?>
     </ul>
 </td>
 <?php

            }
         ?>