<?php
$this->extend('CatalogBundle:Layouts:layout.html.php');
?>
<?php if ($this->editmode) { ?>
    <?= $this->relation("fitting-straight"); ?>
<?php } ?>
<div class="template">
<section class="segregate">
 
 <div id="pageHeader"></div>
 <span  class="pageName">Hydraulic Fittings</span>
 <div class="footer">
 <footer class="flex-center <?php echo $footer_class; ?>">
            <span class="logo">
                <b>
                <?php if($this->editmode): ?>
                        <?php if($this->input("HHFP_Logo_Text1")->isEmpty()): ?>
                                <?= $this->input("HHFP_Logo_Text1")->setDataFromResource('Hose') ?>
                        <?php else: ?>
                                <?= $this->input("HHFP_Logo_Text1"); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("HHFP_Logo_Text1") ?>
                <?php endif; ?>
                </b>
                <img src="<?= $footer_logo_src; ?>">
            </span>
         <div class="flex aligned ">
              
           
         <h5>
                <?php
                    if($this->editmode) {
                        echo $this->input('section_11')->setDataFromResource('Section 1');
                    } else {
                        echo $this->input('section_11');
                    }
                    
                ?>
                <span>
                <?php
                    if($this->editmode) {                        
                        echo $this->input('fittingFamily_11',["placeholder"=>"Fitting Type"])->setDataFromResource($HydFittingFamily. ' Fittings');
                    } else {
                        echo $this->input('fittingFamily_11');
                    }
                    
                ?>    
                </span>
            </h5>
 <p class="flex-center">
                <?php
                if ($this->image('myCrampApp_f11')->isEmpty() && !is_null($myCrampApp)) {
                    echo $this->image('myCrampApp_f11', [
                        "width" => 61,
                        "height" => 60,
                        "aspectratio" => true,
                        "interlace" => true,
                        "quality" => 95,
                        "format" => "PNG"
                    ])->setImage($logo);
                } else {
                    echo $this->image('myCrampApp_f11', [
                        "width" => 61,
                        "height" => 60,
                        "aspectratio" => true,
                        "interlace" => true,
                        "quality" => 95,
                        "format" => "PNG"
                    ]);
                }
                ?>
                <span>
                    Download the <strong class="contitech-yellow">MyCrimp App</strong><br />
                    for more information
                </span>
            </p>
</div>
</footer>
</div>

<div class="footer1">
 <footer class="flex-center <?php echo $footer_class; ?>">
         <div class="flex aligned ">
<p class="flex-center">
                <?php
                if ($this->image('myCrampApp_f1')->isEmpty() && !is_null($myCrampApp)) {
                    echo $this->image('myCrampApp_f1', [
                        "width" => 61,
                        "height" => 60,
                        "aspectratio" => true,
                        "interlace" => true,
                        "quality" => 95,
                        "format" => "PNG"
                    ])->setImage($logo);
                } else {
                    echo $this->image('myCrampApp_f1', [
                        "width" => 61,
                        "height" => 60,
                        "aspectratio" => true,
                        "interlace" => true,
                        "quality" => 95,
                        "format" => "PNG"
                    ]);
                }
                ?>
                <span>
                    Download the <strong class="contitech-yellow">MyCrimp App</strong><br />
                    for more information
                </span>
            </p>
             <h5>
                <?php
                    if($this->editmode) {
                        echo $this->input('section_1')->setDataFromResource('Section 1');
                    } else {
                        echo $this->input('section_1');
                    }
                    
                ?>
                <span>
                <?php
                    if($this->editmode) {
                        echo $this->input('fittingFamily_1')->setDataFromResource($HydFittingFamily. ' Fittings');
                    } else {
                        echo $this->input('fittingFamily_1');
                    }
                    
                ?>    
                </span>
            </h5> 
            
         

</div>
            <span class="logo">

            <b>
            <?php if($this->editmode): ?>
                    <?php if($this->input("HHFP_Logo_Text2")->isEmpty()): ?>
                            <?= $this->input("HHFP_Logo_Text2")->setDataFromResource('Hose') ?>
                    <?php else: ?>
                            <?= $this->input("HHFP_Logo_Text2"); ?>
                    <?php endif; ?>
            <?php else: ?>
                    <?= $this->input("HHFP_Logo_Text2") ?>
            <?php endif; ?>
            </b>
            <img src="<?= $footer_logo_src ?>">
            </span>
</footer>
</div>


<div class="wrapper padding">

    <?php

    if (is_array($brandsData) && !empty($brandsData)) {
        $incr = 1;
    // $dispColumns = array_keys($info['dataTableColumn']);
        foreach ($brandsData as $uniqueId => $tableData) {
            foreach ($tableData as $tableName => $tableRows) {
                // $tableColumns = $info['fittingTableColumn'][$tableName];
                // $uniqueId = md5($uniqueId.$tableName);
                // if (is_array($tableColumns) && !empty($tableColumns)) {
                //     $result = array_intersect($tableColumns['columns'], $dispColumns);
                    
                    /* New Family Info */
    ?>
                    <article class="container noBorder noBreak">
                        <figure class="headingSection">
                            <span>
                                <?php
                                if ($this->editmode) {
                                    echo $this->image('catLeftImage' . $incr, ["class" => "leftImg", "width" => 226, "height" => 150])->setImage($tableRows['brandData']['LeftPrintCatalogImageObj']);
                                } else {
                                    echo $this->image('catLeftImage' . $incr, ["class" => "lImg", "width" => 226, "height" => 150]);
                                }
                                if ($this->editmode) {
                                    echo $this->image('catRightImage' . $incr, ["class" => "rightImg", "width" => 226, "height" => 150])->setImage($tableRows['brandData']['RightPrintCatalogImageObj']);
                                } else {
                                    echo $this->image('catRightImage' . $incr, ["class" => "rImg", "width" => 226, "height" => 150]);
                                }
                                ?>
                            </span>
                            <figcaption class="highlight">
                                <h3>
                                    <?php
                                    if ($this->input('brandName' . $incr)->isEmpty()) {
                                        echo $this->input('brandName' . $incr)->setDataFromResource($tableRows['brandData']['brandName']);
                                    } else {
                                        echo $this->input('brandName' . $incr);
                                    }
                                    ?>
                                </h3>
                                <p>
                                    <?php
                                    if ($this->input('shortDescription' . $incr)->isEmpty()) {
                                        echo $this->input('shortDescription' . $incr)->setDataFromResource($tableRows['brandData']['shortDescription']);
                                    } else {
                                        echo $this->input('shortDescription' . $incr);
                                    }
                                    ?>
                                </p>
                            </figcaption>
                        </figure>

                        <!-- Starting grid here -->
                        <table class="grid inh fitting" cellspacing="0" cellpadding="0">
                            <thead>       
                                <?php if ($iconRequired == 'YES'): ?>
                                    <tr class="sub-head">
                                        <?php foreach ($tableRows['articleData']['columnsDataWithImages'] as $key => $c1data): ?>
                                            <?php
                                            $g1count = count($c1data);
                                            $firstArray = array_shift($c1data);
                                            ?>
                                            <td colspan="<?= $g1count; ?>">
                                                <?php if ($firstArray['columnIcon']): ?>
                                                    <img src="<?= $firstArray['columnIcon'] ?>" width="45" height="45" />
                                                <?php endif; ?>
                                            </td>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endif; ?>
                                <tr class="head">
                                    <?php foreach ($tableRows['articleData']['columnsDataWithImages'] as $key => $c2data): ?>
                                        <?php
                                        $g2count = count($c2data);
                                        $first2Array = array_shift($c2data);
                                        ?>
                                        <td colspan="<?= $g2count; ?>"><?= $first2Array['columnLabel'] ?></td>
                                    <?php endforeach; ?>
                                </tr>

                                <?php if ($tableRows['articleData']['subHeaderRequired'] == 'YES'): ?>
                                    <tr class="head">
                                        <?php foreach ($tableRows['articleData']['columnsDataWithImages'] as $key => $c3data): ?>
                                            <?php foreach ($c3data as $c3key => $c3value): ?>
                                                <?php if ($c3value['unitName']): ?>
                                                    <td><?= $c3value['unitName'] ?></td>
                                                <?php else: ?>
                                                    <td></td>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endif; ?>
                            </thead>
                            <tbody>
                                <?php $incrRow = 1; ?>        
                                <?php foreach ($tableRows['articleData']['articles'] as $key => $shortedRows): ?>
                                    <?php $activeClass = ($incrRow % 2 == 0) ? 'active' : ''; ?>
                                        <?php foreach ($shortedRows as $ekey => $element): ?>
                                            <tr class="<?= $activeClass; ?>">
                                                <?php foreach ($element as $ekey => $value): ?>
                                                    <td><?= $value ?></td>
                                                <?php endforeach; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php $incrRow++ ?>
                                <?php endforeach; ?>
                            </tbody>
                            
                            
                            <!-- Closing grid div here -->
                        </table>
<span class="tableFooter">
                        <?php echo $this->input("HYD_PP_".$incr,["Table Info"])->setDataFromResource("Table Name: ".$tableName);?>

</span>
                    </article>
    <?php
                // }
                $incr++;
            }
        }
        
    }
    ?>

</div>

  


    <!-- Footer -->
    <!-- End Footer-->
</section>
</div>
<style>

</style>
<script>
var rows = document.querySelectorAll(".headingSection");
        rows.forEach(function (row) {
            var rowDescriptions = ro.layout.getBoxDescriptions(row);
            var rowDescription = rowDescriptions[0];
            const onLeftPage = rowDescription.pageLeft;
            row.className = onLeftPage ? "leftHeadingSection" : "rightHeadingSection";
        });
</script>
