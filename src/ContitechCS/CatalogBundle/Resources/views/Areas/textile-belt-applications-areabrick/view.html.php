<?php
    if($this->editmode)
    {
        ?><h3>Select Column</h3><?php
    }
    
    $columns    = $tds = [];
    $total_rows = 0;
    while($this->block("headingblock")->loop()) 
    { 
        $columns[] = $this->input("heading",['width' => 200]);
    }
    
    if($this->editmode)
    {
        ?><h3>Select Rows</h3><?php
    }

    while($this->block("contentblock")->loop()) 
    {   
        foreach($columns as $key => $col)
        {
            $tds["row_".$total_rows][] = $this->input("data_$total_rows_$key",['width' => 200]);
        }  
        $total_rows++;
    }
?>

<div class="table-data textile-table">
    <table width="100%">
        <thead>
            <tr>
                <?php
                    foreach($columns as $col_name)
                    {
                        ?><th width="9.2%"><?= $col_name; ?></th><?php
                    }
                ?>
            </tr>
            <thead>

            <tbody>
                <?php
                for($i=0;$i<=$total_rows-1;$i++)
                {   
                    ?>
                <tr align="center" <?= ($total_rows-1 == $i)?"class='white-bg'":""; ?>>
                    <?php 
                                if(isset($tds["row_".$i]) && isset($tds["row_".$i]))
                                {
                                    foreach($tds["row_".$i] as $key => $td)
                                    {   
                                        if(($total_rows-1 == $i) && $key == 0)
                                        {   
                                            ?><td align="left"><b><?= $td; ?></b></td><?php
                                        }
                                        else
                                        {   
                                            if($key == 0)
                                            {
                                                ?><td align="left"><?= $td; ?></td><?php
                                            }
                                            else
                                            {
                                                ?><td><?= $td; ?></td><?php
                                            }  
                                        }
                                    }
                                }
                            ?>
                </tr>
                <?php
                }
            ?>
            </tbody>
    </table>
</div>    