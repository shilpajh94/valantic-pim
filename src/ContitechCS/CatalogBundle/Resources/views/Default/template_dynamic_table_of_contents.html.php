<?php
if (!isset($this->parentContainer)) {
$this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
}
?>
<div class="wrapper">
    <header id="header">
        <div class="header-sec">
            <div class="header-txt"><span class="first-title"><?= $this->translate('CS_header_title') ?></span>
                <span class="second-title">
                    <?= $this->input("TOC_title",["placeholder" =>"Table Of Contents"]); ?></span>
            </div>
            <div class="print-pg-no"></div>
        </div>
    </header>
    <footer id="footer" class="footer">
        <div class="footer-logo">
            <img src="<?= $footer_logo_src; ?>" alt="" width="150">
        </div>
    </footer>
    <main id="content" role="main">
        <section class="table-content-sec">
            <?php if($this->editmode): ?>
            <?php if($this->input("CBS_TOC_Heading")->isEmpty()): ?>
            <h1 class="orange"><?= $this->input("CBS_TOC_Heading",['placeholder' => 'Table of Contents']); ?></h1>
            <?php else: ?>
            <h1 class="orange"><?= $this->input("CBS_TOC_Heading"); ?></h1>
            <?php endif; ?>
            <?php else: ?>
            <h1 class="orange"><?= $this->input("CBS_TOC_Heading") ?></h1>
            <?php endif; ?>
            <div class="table-of-contents">
                <div class="colum-2">
                    <?php
                        $parents = array_keys($data);
                    ?>

                    <?php
                    $i = 0; 
                    while($this->block("CBS_TOC_HeadingBlock",['default' => count($parents)])->loop())
                    {   
                        $headingVal = isset($parents[$i])?$parents[$i]:'';
                        ?>
                            <h3 class="orange-bg">
                                
                                <?php
                                    if($this->input("CBS_TOC_HeadingName")->isEmpty())
                                    {    
                                        echo $this->input("CBS_TOC_HeadingName", ['placeholder' => 'Enter Title'])->setDataFromResource($headingVal);
                                    }
                                    else
                                    {
                                        echo $this->input("CBS_TOC_HeadingName", ['placeholder' => 'Enter Title']);
                                    }
                                ?>
                            </h3>
                            <ul>
                                <?php
                                    $j=0;
                                    $totalChilds = isset($data[$headingVal])?count($data[$headingVal]):0;

                                    while($this->block("CBS_TOC_ContentBlock",['default' => $totalChilds])->loop())
                                    {   
                                        $pageTitle = '';
                                        if(isset($data[$headingVal][$j]))
                                        {
                                           $pageTitle =  $data[$headingVal][$j];
                                        }
                                        ?>
                                            <li>
                                                <span
                                                    class="chapter">
                                                    <?php
                                                        if($this->input("CBS_TOC_Title")->isEmpty())
                                                        {
                                                            echo $this->input("CBS_TOC_Title", ['placeholder' => 'Enter title here.'])->setDataFromResource($pageTitle);
                                                        }
                                                        else
                                                        {
                                                            echo $this->input("CBS_TOC_Title", ['placeholder' => 'Enter title here.']);
                                                        }
                                                    ?>
                                                </span>
                                                <span
                                                    class="page"><?= $this->input("CBS_TOC_Page", ['placeholder' => 'Enter page number here.']); ?>
                                                </span>
                                            </li>
                                            <ul>
                                                <?php while($this->block("CBS_TOC_ContentBlockInner")->loop())
                                                {
                                                    ?>
                                                        <li>
                                                            <span
                                                                class="chapter"><?= $this->input("CBS_TOC_Title_Inner", ['placeholder' => 'Enter inner title here.']); ?></span>
                                                            <span
                                                                class="page"><?= $this->input("CBS_TOC_Page_Inner", ['placeholder' => 'Enter page number here.']); ?></span>
                                                        </li>
                                                    <?php 
                                                } 
                                            ?>
                                            </ul>
                                        <?php 
                                        $j++;
                                    }
                                ?>
                            </ul>
                        <?php
                        $i++;    
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>

</div>
