<?php
$this->extend('CatalogBundle:Layouts:layout.html.php');
?>
<?php if ($this->editmode) { ?>
    <?= $this->relation("fitting-straight"); ?>
<?php } ?>
<div class="seggregate ">
   <nav class="header ">
        <span>Hydraulic Hose</span>
        <div id="pageHeader"></div>
   </nav>

    <nav class="header1 ">
        <div id="pageHeader"></div>
        <span>Hydraulic Hose</span>
        
    </nav>

<div class="footer">
 <footer class="flex-center ">
<?php
      //  if ($this->image('logo')->isEmpty() && !is_null($logo)) {
        ?>
            <span class="logo">
                <b>Hose</b>
<img src="/CatalogImages/logo_new.png">
               
            </span>
        <?php // } ?>
         <div class="flex aligned reverse">
              
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
         <h5  class="rowC">
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
</footer>
</div>

<div class="footer1">
 <footer class="flex-center ">

         <div class="flex aligned reverse">
            <h5  class="rowC alignEnd">
                <?php
                    if($this->editmode) {
                        echo $this->input('section_2')->setDataFromResource('Section 1');
                    } else {
                        echo $this->input('section_2');
                    }
                    
                ?>
                <span>
                <?php
                    if($this->editmode) {
                        echo $this->input('fittingFamily_2')->setDataFromResource('B2 Fittings');
                    } else {
                        echo $this->input('fittingFamily_2');
                    }
                    
                ?>    
                </span>
            </h5>

            <p class="flex-center">
                <?php
                if ($this->image('myCrampApp_f2')->isEmpty() && !is_null($myCrampApp)) {
                    echo $this->image('myCrampApp_f2', [
                        "width" => 61,
                        "height" => 60,
                        "aspectratio" => true,
                        "interlace" => true,
                        "quality" => 95,
                        "format" => "PNG"
                    ])->setImage($logo);
                } else {
                    echo $this->image('myCrampApp_f2', [
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
 <?php
       // if ($this->image('logo')->isEmpty() && !is_null($logo)) {
        ?>
            <span class="logo">
                <b>Hose</b>
<img src="/CatalogImages/logo_new.png">
               
            </span>
        <?php // } ?>

</footer>

</div>

    <?php
    if (is_array($info['data']) && !empty($info['data'])) {
        foreach ($info['data'] as $uniqueId => $tableData) {
            foreach ($tableData as $tableName => $tableRows) {
                $tableColumns = $info['fittingTableColumn'][$tableName];

                if (is_array($tableColumns) && !empty($tableColumns)) {
                    $result = array_diff_assoc($tableColumns['columns'], $tableRows['data']);
                    // p_r($result);die;
                    /* New Family Info */
    ?>
                    <article class="container noBorder alternated">
                        <figure class="">
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
                                        "class" => "leftImg",
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
                                        "class" => "rightImg",
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





    <!-- Footer -->
    <!-- End Footer-->
</div>