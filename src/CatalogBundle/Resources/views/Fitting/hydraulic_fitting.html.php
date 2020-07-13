<?php
$this->extend('CatalogBundle:Layouts:layout.html.php');
?>
<?php if ($this->editmode) { ?>
    <?= $this->relation("fitting-straight"); ?>
<?php } ?>
<div class="seggregate">
<nav class="header">
  <div id="pageHeader"></div>
<span>Hydraulic Hose</span>
</nav>
    <?php
    if (is_array($info['data']) && !empty($info['data'])) {
        foreach ($info['data'] as $uniqueId => $tableData) {
            foreach ($tableData as $tableName => $tableRows) {
                // p_r($tableRows);die;
                $tableColumns = $info['fittingTableColumn'][$tableName];

                if (is_array($tableColumns) && !empty($tableColumns)) {
                    $result = array_diff_assoc($tableColumns['columns'], $tableRows['data']);
                    // p_r($result);die;
                    /* New Family Info */
    ?>
                    <article class="container noBorder">
                        <figure class="reverse">
                            <span>
                                <?php
                                if ($this->editmode) {
                                    echo $this->image('catLeftImage' . $uniqueId, [
                                        "class" => "leftImg",
                                        "width" => $tableRows['leftImage']->getWidth(),
                                        "height" => $tableRows['leftImage']->getHeight()
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
                                        "class" => "leftImg",
                                        "width" => $tableRows['rightImage']->getWidth(),
                                        "height" => $tableRows['rightImage']->getHeight()
                                    ])->setImage($tableRows['rightImage']);
                                } else {
                                    echo $this->image('catRightImage' . $uniqueId, [
                                        "class" => "leftImg",
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
                        <div class="grid">
                            <?php
                            echo "<p class='sub-head'>";
                            foreach ($result as $col) {p_r();
                                if(array_key_exists($col, $info['attrImages'])) {
                                    echo "<span><img src='{$info['attrImages'][$col]}' /></span>";
                                } else {
                                    echo "<span></span>";
                                }
                                
                            }
                            echo "</p>";
                            echo "<p class='head'>";
                            foreach ($result as $col) {
                                echo "<span>{$info['dataTableColumn'][$col]->columnLabel}</span>";
                            }
                            echo "</p>";
                            $activeClassColName = $info['activeClassColName'];
                            $activeClassColVal = "";
                            $active = "";
                            foreach ($tableRows['data'] as $k => $row) {
                                if(isset($row[$activeClassColName])) {
                                    if($k==0) {
                                        $activeClassColVal = $row[$activeClassColName];
                                    }
                                    if($activeClassColVal!=$row[$activeClassColName]) {
                                        $active = $active==""?"active":"";
                                        $activeClassColVal = $row[$activeClassColName];
                                    }
                                    
                                }
                                echo "<p class='{$active}'>";
                                foreach ($result as $col) {                                    
                                    echo "<span>{$row[$col]}</span>";
                                }
                                echo "</p>";
                            }
                            ?>
                            <!-- Closing grid div here -->
                        </div>
                    </article>
    <?php
                }
            }
        }
    }
    ?>





    <footer class="flex reverseColor">
        <?php
        if ($this->image('logo')->isEmpty() && !is_null($logo)) {
        ?>
            <span class="logo">
                <b>Fittings</b>
                <?php
                echo $this->image('logo', [
                    "width" => $logo->getWidth(),
                    "height" => $logo->getHeight(),
                    "aspectratio" => true,
                    "interlace" => true,
                    "quality" => 95,
                    "format" => "PNG"
                ])->setImage($logo);
                ?>
            </span>
        <?php } ?>
        <div class="flex aligned reverse">
            <h3>
                Section 1
                <span>B2 Fittings</span>
            </h3>

            <p class="flex-center">
                <?php
                if ($this->image('myCrampApp')->isEmpty() && !is_null($myCrampApp)) {
                    echo $this->image('myCrampApp', [
                        "width" => $myCrampApp->getWidth(),
                        "height" => $myCrampApp->getHeight(),
                        "aspectratio" => true,
                        "interlace" => true,
                        "quality" => 95,
                        "format" => "PNG"
                    ])->setImage($logo);
                } else {
                    echo $this->image('myCrampApp', [
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
    <!-- Footer -->
    <!-- End Footer-->
</div>