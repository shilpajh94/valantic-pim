<?php
if (!isset($this->parentContainer)) {
$this->extend('CatalogBundle:Layouts:layout.html.php');
}
?>
<div class="template">
    <div id="toc" class="toc">
        <div id="pageHeader"></div>

        <div class="tableHeader" >
            <header class="content partNumber tableContent">
            <?php if($this->editmode): ?>
                <?php if($this->input("TOC_Heading")->isEmpty()): ?>
                    <h2><?= $this->input("TOC_Heading")->setDataFromResource('Table of Contents'); ?></h2>
                <?php else: ?>
                    <h2><?= $this->input("TOC_Heading"); ?></h2>
                <?php endif; ?>
            <?php else: ?>
                <h2><?= $this->input("TOC_Heading") ?></h2>
            <?php endif; ?>
            </header>
        </div>
    
        <div class="content <?php if(!$this->editmode){echo "content_double";} ?> table-content ">
            <?php 
            

            if($this->block("TOC_SectionBlock")->getCount())
            {
                while($this->block("TOC_SectionBlock")->loop()) 
                { 
                    ?>
                        <h4><?= $this->input("TOC_SectionName", ['placeholder' => 'Enter Section name here.']); ?></h4>
                        <article>
                            <?php 
                            while($this->block("TOC_HeadingBlock")->loop()) 
                            { 
                                ?>
                                <h5><?= $this->input("TOC_HeadingName", ['placeholder' => 'Enter Heading here.']); ?></h5>
                                <?php if($this->editmode): ?>
                                    <span class="pageTitle"><?= $this->input("TOC_Desc", ['placeholder' => 'Enter heading description here.']); ?></span>
                                <?php else: ?>
                                    <?php if(!$this->input("TOC_Desc")->isEmpty()): ?>
                                        <span class="pageTitle"><?= $this->input("TOC_Desc"); ?></span>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php 
                                while($this->block("TOC_ContentBlock")->loop()) 
                                { 
                                    ?>
                                    <div class="paging">
                                        <span class="pageTitle"><?= $this->input("TOC_Title", ['placeholder' => 'Enter title here.']); ?></span>
                                        <span class="pageNo"><?= $this->input("TOC_Page", ['placeholder' => 'Enter page number here.']); ?></span>
                                    </div>
                                    <?php 
                                } 
                                ?>
                                <?php 
                            } 
                            ?>
                        </article>
                    <?php 
                } 
            }
            else
            {
                $dataCount = count($data);
                $i = 0;

                while($this->block("TOC_SectionBlock", ['default'=>$dataCount])->loop()) 
                { 
                    $sectionName = $data[$i][0];
                    ?>
                        <h4><?= $this->input("TOC_SectionName", ['placeholder' => 'Enter Section name here.'])->setDataFromResource($sectionName); ?></h4>
                        <article>
                            <?php 
                            $j = 0;
                            $innerDataCount = 0;
                            if(isset($data[$i][1]))
                            {
                                $innerData = $data[$i][1];
                                $innerDataCount = count($innerData);
                            }
                            while($this->block("TOC_HeadingBlock", ['default'=> $innerDataCount])->loop()) 
                            { 
                                $heading = $innerData[$j][0];
                                
                                ?>
                                <h5><?= $this->input("TOC_HeadingName", ['placeholder' => 'Enter Heading here.'])->setDataFromResource($heading); ?></h5>
                                <?php if($this->editmode): ?>
                                    <span class="pageTitle"><?= $this->input("TOC_Desc", ['placeholder' => 'Enter heading description here.']); ?></span>
                                <?php else: ?>
                                    <?php if(!$this->input("TOC_Desc")->isEmpty()): ?>
                                        <span class="pageTitle"><?= $this->input("TOC_Desc"); ?></span>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php 
                                $k = 0;
                                if(isset($innerData[$j][1]))
                                {
                                    $subInnerData = $innerData[$j][1];
                                    $subInnerDataCount = count($subInnerData);
                                }
                                while($this->block("TOC_ContentBlock", ['default'=> $subInnerDataCount])->loop()) 
                                { 
                                    $title = $subInnerData[$k];
                                    ?>
                                    <div class="paging">
                                        <span class="pageTitle"><?= $this->input("TOC_Title", ['placeholder' => 'Enter title here.'])->setDataFromResource($title); ?></span>
                                        <span class="pageNo"><?= $this->input("TOC_Page", ['placeholder' => 'Enter page number here.']); ?></span>
                                    </div>
                                    <?php 
                                    $k++;
                                } 
                                ?>
                                <?php 
                                $j++;
                            } 
                            ?>
                        </article>
                    <?php 
                    $i++;
                } 

            }
            ?>
        </div>
    </div>
</div>