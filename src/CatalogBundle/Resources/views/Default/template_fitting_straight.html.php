<?php
$this->extend('CatalogBundle:Layouts:layout.html.php');
?>
<?php if ($this->editmode) { ?>
    <?= $this->relation("fitting-straight"); ?>
<?php } ?>
<div class="seggregate">
    <?php echo $this->inc($this->document->getProperty('header'));?>
    <article class="container noBorder">
        <figure class="reverse">
            <span>
                <?php
                if ($this->image('fittingRendering')->isEmpty() && !is_null($fittingRendering)) {
                    echo $this->image('fittingRendering', [
                        "width" => $fittingRendering->getWidth(),
                        "height" => $fittingRendering->getHeight(),
                        "aspectratio" => true,
                        "interlace" => true,
                        "quality" => 95,
                        "format" => "PNG"
                    ])->setImage($fittingRendering);
                } else {
                    echo $this->image('fittingRendering', [
                        "width" => 226,
                        "height" => 150,
                        "aspectratio" => true,
                        "interlace" => true,
                        "quality" => 95,
                        "format" => "PNG"
                    ])->setImage($data['defaultData']['defaultImage']);
                }
                ?>
            </span>
            <figcaption>
                <h3>
                    <?php
                    if ($this->input('threadFamilyDesc')->isEmpty()) {
                        echo $this->input('threadFamilyDesc')->setDataFromResource($data['defaultData']['defaultFamilyDesc']);
                    } else {
                        echo $this->input('threadFamilyDesc');
                    }
                    ?>
                </h3>
                <p>
                    <b>
                        <?php
                        if ($this->input('gender')->isEmpty()) {
                            echo $this->input('gender')->setDataFromResource("");
                        } else {
                            echo $this->input('gender');
                        }
                        ?>
                    </b>
                    <?php
                    if ($this->input('elbow')->isEmpty()) {
                        echo $this->input('elbow')->setDataFromResource($data['defaultData']['defaultElbow']);
                    } else {
                        echo $this->input('elbow');
                    }
                    ?> /
                    <?php
                    if ($this->input('elbowType')->isEmpty()) {
                        echo $this->input('elbowType')->setDataFromResource($data['defaultData']['defaultElbowType']);
                    } else {
                        echo $this->input('elbowType');
                    }
                    ?>
                </p>
            </figcaption>
        </figure>
        <div class="grid">
            <p class="sub-head">
                <span></span>
                <span></span>
                <span></span>
                <span><img src="images/1-1.jpg" /></span>
                <span><img src="images/2-1.jpg" /></span>
                <span class="grow-2"><img src="images/3-1.jpg" /></span>
                <span class="grow-2"><img src="images/4-1.jpg" /></span>
                <span class="grow-2"><img src="images/5-1.jpg" /></span>

            </p>
            <p class="head">
                <span>Descriptive Part Number</span>
                <span>Activant Number</span>
                <span>SAP #</span>
                <span>Hose Id</span>
                <span>Thread Size <em>(A)</em></span>
                <span class="grow-2">Hex 1 Wrench Size</span>
                <span class="grow-2">Hex 2 Wrench Size</span>
                <span class="grow-2">Cut-off <em>(R)</em></span>
                <span class="grow-2">Length <em>(L)</em></span>
            </p>
            <!-- <p class="sub-head">
                <span></span>
                <span></span>
                <span></span>
                <span>in.</span>
                <span></span>

                <span>in.</span>
                <span>mm.</span>
                <span>in.</span>
                <span>mm.</span>

                <span>in.</span>
                <span>mm.</span>

                <span>in.</span>
                <span>mm.</span>
            </p> -->
            <?php
            if (isset($data['fittingStraightData']) && !empty($data['fittingStraightData'])) {
                $i = 1;
                foreach ($data['fittingStraightData'] as $k => $results) {
                    $class = '';
                    foreach ($results as $row) {
                        $class = $i % 2 == 0 ? 'active' : '';
                        echo "<p class='$class'>";
                        echo "<span>" . $row['partNumber'] . "</span>";
                        echo "<span>" . $row['activantNumber'] . "</span>";
                        echo "<span>" . $row['sapNumber'] . "</span>";
                        echo "<span>" . $row['hoseID'] . "</span>";
                        echo "<span>" . $row['threadSize_1'] . "</span>";

                        echo "<span>" . $row['hex_1_wrenchSize_IN'] . "</span>";
                        echo "<span>" . $row['hex_1_wrenchSize_MM'] . "</span>";
                        echo "<span>" . $row['hex_2_wrenchSize_IN'] . "</span>";
                        echo "<span>" . $row['hex_2_wrenchSize_MM'] . "</span>";

                        echo "<span>" . $row['CutOff_C_IN'] . "</span>";
                        echo "<span>" . $row['CutOff_C_MM'] . "</span>";
                        echo "<span>" . $row['Length_L_IN'] . "</span>";
                        echo "<span>" . $row['Length_L_MM'] . "</span>";
                        echo "</p>";
                    }
                    $i++;
                }
            }
            ?>
            <!-- <p>
                <span>AEDKSJFKDSJFKS</span>
                <span>454545-5455</span>
                <span>1544545</span>
                <span>32/12</span>
                <span>1-14</span>

                <span>0.91</span>
                <span>23</span>
                <span>0.91</span>
                <span>23</span>

                <span>0.91</span>
                <span>23</span>
                <span>0.91</span>
                <span>23</span>
           </p>
           
            <p>
                <span>AEDKSJFKDSJFKS</span>
                <span>454545-5455</span>
                <span>1544545</span>
                <span>32/12</span>
                <span>1-14</span>
                <span>0.91</span>
                <span>23</span>
                <span>0.91</span>
                <span>23</span>
                <span>0.91</span>
                <span>23</span>
            </p>
            <p class="active">
                    <span>AEDKSJFKDSJFKS</span>
                    <span>454545-5455</span>
                    <span>1544545</span>
                    <span>32/12</span>
                    <span>1-14</span>
                    <span>0.91</span>
                    <span>23</span>
                    <span>0.91</span>
                    <span>23</span>
                    <span>0.91</span>
                    <span>23</span>
                </p>
                <p class="active">
                        <span>AEDKSJFKDSJFKS</span>
                        <span>454545-5455</span>
                        <span>1544545</span>
                        <span>32/12</span>
                        <span>1-14</span>
                        <span>0.91</span>
                        <span>23</span>
                        <span>0.91</span>
                        <span>23</span>
                        <span>0.91</span>
                        <span>23</span>
                    </p>
                    <p>
                            <span>AEDKSJFKDSJFKS</span>
                            <span>454545-5455</span>
                            <span>1544545</span>
                            <span>32/12</span>
                            <span>1-14</span>
                            <span>0.91</span>
                            <span>23</span>
                            <span>0.91</span>
                            <span>23</span>
                            <span>0.91</span>
                            <span>23</span>
                        </p>

            <p>
                <span>AEDKSJFKDSJFKS</span>
                <span>454545-5455</span>
                <span>1544545</span>
                <span>32/12</span>
                <span>1-14</span>
                <span>0.91</span>
                <span>23</span>
                <span>0.91</span>
                <span>23</span>
                <span>0.91</span>
                <span>23</span>
            </p>
            <p>
                <span>AEDKSJFKDSJFKS</span>
                <span>454545-5455</span>
                <span>1544545</span>
                <span>32/12</span>
                <span>1-14</span>
                <span>0.91</span>
                <span>23</span>
                <span>0.91</span>
                <span>23</span>
                <span>0.91</span>
                <span>23</span>
            </p> -->
        </div>
    </article>

    <!-- Footer -->
    <?php
    echo $this->inc($this->document->getProperty('footer'));
    ?>
</div>