<?php
$this->extend('CatalogBundle:Layouts:layout.html.php');
?>
<?php if ($this->editmode) { ?>
    <?= $this->relation("fitting-straight"); ?>
<?php } ?>
<section class="segregate">
 
 <div id="pageHeader"></div>
 <span  class="pageName">Hydraulic Hose</span>
       


<div class="footer">
 <footer class="flex-center ">
            <span class="logo">
                <b>Hose</b>
                <img src="/CatalogImages/logo_new.png">
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
                        echo $this->input('fittingFamily_11')->setDataFromResource('B2 Fittings');
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
 <footer class="flex-center ">

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
                        echo $this->input('fittingFamily_1')->setDataFromResource('B2 Fittings');
                    } else {
                        echo $this->input('fittingFamily_1');
                    }
                    
                ?>    
                </span>
            </h5> 
            
         

</div>

            <span class="logo">
                <b>Hose</b>
<img src="/CatalogImages/logo_new.png">
               
            </span>
        
</footer>
</div>


<div class="wrapper padding">

    <?php
    if (is_array($info['data']) && !empty($info['data'])) {
        foreach ($info['data'] as $uniqueId => $tableData) {
            foreach ($tableData as $tableName => $tableRows) {
                $tableColumns = $info['fittingTableColumn'][$tableName];

                if (is_array($tableColumns) && !empty($tableColumns)) {
                    $result = array_diff_assoc($tableColumns['columns'], $tableRows['data']);
                    
                    /* New Family Info */
    ?>
                    <article class="container noBorder ">
                        <figure class="headingSection">
                            <span>
                                <?php
                                if ($this->editmode) {
                                    echo $this->image('catLeftImage' . $uniqueId, [
                                        "class" => "leftImg",
                                        "width" => 226,
                                        "height" => 150
                                    ])->setImage($tableRows['leftImage']);
                                } else {
                                    echo $this->image('catLeftImage' . $uniqueId, [
                                        "class" => "lImg",
                                        "width" => 226,
                                        "height" => 150
                                    ]);
                                }
                                if ($this->editmode) {
                                    echo $this->image('catRightImage' . $uniqueId, [
                                        "class" => "rightImg",
                                        "width" => 226,
                                        "height" => 150
                                    ])->setImage($tableRows['rightImage']);
                                } else {
                                    echo $this->image('catRightImage' . $uniqueId, [
                                        "class" => "rImg",
                                        "width" => 226,
                                        "height" => 150
                                    ]);
                                }
                                ?>
                            </span>
                            <figcaption class="highlight">
                                <h3>
                                    <?php
                                    if ($this->input('BrandShortText1' . $uniqueId)->isEmpty()) {
                                        echo $this->input('BrandShortText1' . $uniqueId)->setDataFromResource($tableRows['BrandShortText1']);
                                    } else {
                                        echo $this->input('BrandShortText1' . $uniqueId);
                                    }
                                    ?>
                                </h3>
                                <p>
                                    <?php
                                    if ($this->input('shortDescription' . $uniqueId)->isEmpty()) {
                                        echo $this->input('shortDescription' . $uniqueId)->setDataFromResource($tableRows['shortDescription']);
                                    } else {
                                        echo $this->input('shortDescription' . $uniqueId);
                                    }
                                    ?>
                                </p>
                            </figcaption>
                        </figure>

                        <!-- Starting grid here -->
                        <table class="grid" cellspacing="0" cellpadding="0">
                            <?php
                            echo "<thead> <tr class='sub-head'>";
                            foreach ($result as $col) {
                                if(array_key_exists($col, $info['attrImages'])) {
                                    echo "<td><img src='{$info['attrImages'][$col]}' /></td>";
                                } else {
                                    echo "<td></td>";
                                }
                                
                            }
                            echo "</tr>";
                            echo "<tr class='head'>";
                            foreach ($result as $col) {
                                echo "<td>{$info['dataTableColumn'][$col]->columnLabel}</td>";
                            }
                            echo "</tr></thead>";
                            $activeClassColName = $info['activeClassColName'];
                            $activeClassColVal = "";
                            $active = "";
                            $i = 1;
                            foreach ($tableRows['data']['HoseID1InDec'] as $k => $rows) {
                                $active = "";
                                if($i%2==0) {
                                    $active = "active";
                                }
                                foreach($rows as $row) {
                                    echo "<tr class='{$active}'>";
                                    foreach ($result as $col) {                                    
                                        echo "<td>{$row[$col]}</td>";
                                    }
                                    echo "</tr>";                                    
                                }
                                $i++;
                            }
                            ?>
                            <!-- Closing grid div here -->
                        </table>

                    </article>
    <?php
                }
            }
        }
    }
    ?>

</div>

  


    <!-- Footer -->
    <!-- End Footer-->
</section>

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