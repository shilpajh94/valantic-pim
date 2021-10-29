<?php
    if($this->editmode)
    {
        ?><h3>Select Column</h3><?php
    }
    
    $columns    = $tds = [];
    $total_rows = 0;
    while($this->block("headingblock")->loop()) 
    { 
        $columns[] = $this->input("heading");
    }
    
    if($this->editmode)
    {
        ?><h3>Select Rows</h3><?php
    }

    while($this->block("contentblock")->loop()) 
    {   
        foreach($columns as $key => $col)
        {
            $tds["row_".$total_rows][] = $this->wysiwyg("data_$total_rows_$key");
        }  
        $total_rows++;
    }
?>

<table width="100%">
    <thead>
        <tr>
            <?php
                foreach($columns as $col_name)
                {
                    ?><th><?= $col_name; ?></th><?php
                }
            ?>
        </tr>
    <thead>

    <tbody>
        <?php
            for($i=0;$i<=$total_rows-1;$i++)
            {   
                ?>
                    <tr>
                        <?php 
                            if(isset($tds["row_".$i]) && isset($tds["row_".$i]))
                            {
                                foreach($tds["row_".$i] as $td)
                                {   
                                    ?><td><?= $td; ?></td><?php
                                }
                            }
                        ?>
                    </tr>
                <?php
            }
        ?>
    </tbody>
</table>

