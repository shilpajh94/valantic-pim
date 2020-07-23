<?php
$this->extend('CatalogBundle:Layouts:layout.html.php');
?>
<?php if ($this->editmode) { ?>
    <?= $this->relation("inh-printcatalog"); ?>
<?php } ?>
<div class="seggregate">
    <nav class="header">
        <div id="pageHeader"></div>
        <span>Hydraulic Hose</span>
    </nav>
    <!-- <div class="seggregate"></div> -->

    <div class="seggregate">
        <article class="fullcontainer ">
            <?php
            if (isset($info['data']) && !empty($info['data'])) {
                foreach ($info['data'] as $tableName => $data) {
                    // p_r($tableName);
                    // die;
            ?>
                    <div class="flex reverse">
                        <div class="sidebar">
                            <ul>
                                <!-- <li class="first">
                                <p>
                                    Lorem ipsum
                                </p>
                                <p>
                                    <b>Lorem ipsum</b>
                                </p>
                            </li> -->
                                <?php
                                if (is_array($info['categories'])) {
                                    foreach ($info['categories'] as $category) {
                                        echo "<li>";
                                        if (is_array($category) && !empty($category)) {
                                            foreach ($category as $cat) {
                                                if ($cat['printable'] == 1 && $cat['level'] == 3) {
                                                    echo "<p><b>" . $cat['name'] . "</b></p>";
                                                } else {
                                                    if ($cat['printable'] == 1) {
                                                        echo "<p>" . $cat['name'] . "</p>";
                                                    }
                                                }
                                            }
                                        }
                                        echo "</li>";
                                    }
                                }
                                ?>

                            </ul>
                        </div>
                        <div class="grow-2">
                            <h2 class="borderBottom marginBottom5"><?php echo $tableName; ?></h2>
                            <p class=" borderBottom">
                                <?php
                                if ($this->editmode) {
                                    echo $this->image('INH_SP_' . md5($tableName), [
                                        'widht' => 450,
                                        'height' => 222
                                    ])->setImage($info['defaultPageImage']);
                                } else {
                                    echo $this->image('INH_SP_' . md5($tableName), [
                                        'widht' => 450,
                                        'height' => 222
                                    ]);
                                } ?>
                            </p>
                            <table class="grid special marginBottom5" cellspacing="0" cellpadding="0">
                                <thead>
                                    <tr class="head ">
                                        <td></td>
                                        <?php
                                        foreach ($data['dispColumns'] as $key => $colInfo) {
                                            echo "<td>{$colInfo['title']}</td>";
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <?php
                                /**
                                 * 
                                 */
                                $i = 1;
                                if (isset($data['data']) && !empty($data['data'])) {
                                    foreach ($data['data'] as $brandName => $row) {
                                        $active = "";
                                        if ($i % 2 == 0) {
                                            $active = "active";
                                        }
                                        $i++;
                                        echo "<tr class='$active'>";
                                        echo "<td>{$brandName}</td>";
                                        foreach ($data['dispColumns'] as $key => $colInfo) { //p_r($colInfo);die;
                                            $td = false;
                                            if (isset($row[$key])) {
                                                if ($colInfo['type'] == 'attr') {
                                                    if (is_array($row[$key])) {
                                                        echo "<td>{$row[$key][0]}</td>";
                                                    } else {
                                                        echo "<td>{$row[$key]}</td>";
                                                    }
                                                    $td = true;
                                                }
                                            } else if ($colInfo['type'] == 'feature' && isset($row[$colInfo['fieldName']])) {
                                                if (in_array($colInfo['title'], $row[$colInfo['fieldName']])) {
                                                    echo "<td>Yes</td>";
                                                    $td = true;
                                                }
                                            }
                                            if (!$td) {
                                                echo "<td></td>";
                                            }
                                        }
                                        echo "</tr>";
                                    }
                                }


                                ?>

                            </table>
                            <p class="small">*Lorem ipsum</p>
                        </div>

                    </div>
            <?php }
            } ?>




            <footer class="flex reverseColor">
                <span class="logo">
                    <b>Fittings</b>
                    <img src="images/6b.JPG" />
                </span>
                <div class="flex aligned">
                    <h3>
                        Split flanges
                        <span>Code 61 / Code 62 clamps kit</span>
                    </h3>


                </div>
            </footer>
        </article>

    </div>