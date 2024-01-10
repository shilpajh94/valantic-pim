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
                    <h2><?= $this->input("HHIDN_Heading", ['placeholder'=>"Index Page Title"])->setDataFromResource('Industrial Hose Index By Application'); ?></h2>
                <?php else: ?>
                    <h2><?= $this->input("HHIDN_Heading"); ?></h2>
                <?php endif; ?>
            <?php else: ?>
                <h2><?= $this->input("HHIDN_Heading") ?></h2>
            <?php endif; ?>
        </div>
        <div id="amortizationTable" class="<?php if(!$this->editmode){echo "content_double";} ?> single">
            <?php if($this->editmode): ?>
                <div class="flex">
                    <div class="inh-upper"> 
                    <?php
                        if($this->editmode){
                                if(!$this->input("HHIDN_th_col_1")->isEmpty())
                                    echo $this->input("HHIDN_th_col_1",['placeholder'=>"Column 1"]);
                                else
                                    echo $this->input("HHIDN_th_col_1",['placeholder'=>"Column 1"])->setDataFromResource('Name');
                        }else{
                                echo $this->input("HHIDN_th_col_1",['placeholder'=>"Column 1"]);
                        }
                    ?>
                    </div>
                    <div class="inh-upper"> 
                    
                    <?php
                        if($this->editmode){
                                if(!$this->input("HHIDN_th_col_2")->isEmpty())
                                    echo $this->input("HHIDN_th_col_2",['placeholder'=>"Column 2"]);
                                else
                                    echo $this->input("HHIDN_th_col_2",['placeholder'=>"Column 2"])->setDataFromResource('Page #');
                        }else{
                                echo $this->input("HHIDN_th_col_2",['placeholder'=>"Column 2"]);
                        }
                    ?>
                    </div>
                </div>
                    
                <?php 
                
                $dataCount = count($data);

                if($this->block("INH_Index_Content")->getCount())
                {
                    while($this->block("INH_Index_Content")->loop()) { 
                        
                        ?>
                        <div class="inh-subcategory">
                            <?= $this->input("TOC_HeadingName", ['placeholder' => 'Enter Heading here.']);  ?>
                        </div>

                        <?php
                        
                        while($this->block("INH_Index_Inner_Content")->loop()) { 
                            
                            
                            ?>
                            <div class="paging">
                                <span class="pageTitle"><?= $this->input("HHIDN_td1",['placeholder'=>"Page Title"]); ?></span>
                                <span class="pageNo"><?= $this->input("HHIDN_td2",['placeholder'=>"Page No"]); ?></span>
                            </div>
                            <?php 
                        } 
                    } 
                }
                else{
                    $i = 0;
                    while($this->block("INH_Index_Content", ['default'=> $dataCount])->loop()) { 
                        $heading = '';
                        if(isset($data[$i][0]))
                        {
                            $heading = $data[$i][0];
                        }
                        
                        ?>
                        <div class="inh-subcategory">
                            <?= $this->input("TOC_HeadingName", ['placeholder' => 'Enter Heading here.'])->setDataFromResource($heading);  ?>
                        </div>

                        <?php
                        $j = 0;
                        $innerData = 0;

                        $innerDataCount = 0;
                        if(isset($data[$i][1]))
                        {
                            $innerData = explode(",",$data[$i][1]);
                            $innerDataCount = count($innerData);
                        }
                        
                        while($this->block("INH_Index_Inner_Content", ['default'=> $innerDataCount])->loop()) { 
                            $title = '';
                            if(isset($innerData[$j]))
                            {
                                $title = $innerData[$j];
                            }
                            ?>
                            <div class="paging">
                                <span class="pageTitle"><?= $this->input("HHIDN_td1",['placeholder'=>"Page Title"])->setDataFromResource($title); ?></span>
                                <span class="pageNo"><?= $this->input("HHIDN_td2",['placeholder'=>"Page No"]); ?></span>
                            </div>
                            <?php 
                            $j++;
                        } 
                        
                        $i++;
                    } 
                }
                ?>

            <?php else: ?>
                <table cellpadding="0" cellspacing="0" class="grid">
                        <thead>
                            <tr>
                            <td><span class="inh-upper"><?= $this->input("HHIDN_th_col_1"); ?></span></td>
                            <td align="right"><span class="inh-upper"><?= $this->input("HHIDN_th_col_2"); ?></span></td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        while($this->block("INH_Index_Content")->loop()) { 
                            ?>
                            <tr>
                                <td colspan="2"><div class="inh-subcategory"><?= $this->input("TOC_HeadingName"); ?></div></td>
                            </tr>
                            <?php
                            while($this->block("INH_Index_Inner_Content")->loop()) { 
                            ?>
                            <tr>
                            <td colspan="2">
                            <div class="paging">
                                <span class="pageTitle"><?= $this->input("HHIDN_td1"); ?></span>
                                <span class="pageNo"><?= $this->input("HHIDN_td2"); ?></span>
                            </div>
                            </td>
                            </tr>
                        
                        <?php 
                            }
                        } ?>
                        </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>