<?php
    if($this->editmode)
    {
        ?><h3>Select Column</h3><?php
    }
    
    $columns    = $tds = [];
    $total_rows = 0;
    while($this->block("headingblock")->loop()) 
    { 
        $columns[] = $this->wysiwyg("heading");
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
        <tr align="right">
			<th colspan="4" class="p-0">
            <?php
                    if($this->editmode)
                    {
                        if($this->image("fieldPhoto")->isEmpty())
                        {
                            echo $this->image("fieldPhoto")->setImage($data['fieldPhoto']);
                        }
                        else
                        {
                            echo $this->image("fieldPhoto");
                        }
                    }
                    else
                    {
                        $CSSImgSrcObj =  $this->image("fieldPhoto")->setImage($data['fieldPhoto']);
                        
                        if($CSSImgSrcObj)
                        {
                            ?>
                                <img src="<?= $CSSImgSrcObj->getThumbnail('catalog_thumb'); ?>" class="features-images" alt="" style="float:right" class="w-80"/>
                            <?php
                        }
                    }
            ?>
			</th>
		</tr>
        <tr valign="bottom">
            <?php
                foreach($columns as $col_name)
                {
                    ?><th width="25%"><?= $col_name; ?></th><?php
                }
            ?>
        </tr>
    <thead>

    <tbody>
        <?php
            for($i=0;$i<=$total_rows-1;$i++)
            {   
                ?>
                    <tr align="left">
                        <?php 
                            if(isset($tds["row_".$i]) && isset($tds["row_".$i]))
                            {
                                foreach($tds["row_".$i] as $key => $td)
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

