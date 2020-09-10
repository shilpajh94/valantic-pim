<?php
$this->extend('CatalogBundle:Layouts:layout.html.php');
?>
<?php if ($this->editmode) { ?>
    <?= $this->relation("inh-printcatalog"); ?>
<?php } ?>
<div class="template">
<div class="segregate">

   <div id="pageHeader"></div>
    <span  class="pageName">Index</span>
        <div class="footer">
            <footer class="flex-center <?php echo $info['footer_class']; ?> ">
                <span class="logo">
                    <img src="<?= $info['footer_logo_src']; ?>">
                </span>
                <div class="flex aligned">
                    <h5>
                        <?= $this->input("INH_SP_FOOTER_BRAND_1", ["placeholder" => "Split flanges"])->setDataFromResource('Split flanges'); ?>
                        <span><?= $this->input("INH_SP_FOOTER_HP_1", ["placeholder" => "eg: Code 61 / Code 62 clamps kit"])->setDataFromResource("Code 61 / Code 62 clamps kit"); ?></span>
                    </h5>
                </div>
            </footer>
        </div>
        <div class="footer1">
                            <footer class="flex-center <?php echo $info['footer_class']; ?> ">
                                <div class="flex aligned">
                                    <h5>
                                        <?= $this->input("INH_SP_FOOTER_BRAND_2", ["placeholder" => "Split flanges"])->setDataFromResource('Split flanges'); ?>
                                        <span><?= $this->input("INH_SP_FOOTER_HP_2", ["placeholder" => "eg: Code 61 / Code 62 clamps kit"])->setDataFromResource("Code 61 / Code 62 clamps kit"); ?></span>
                                    </h5>
                                </div>
                                <span class="logo">
                                    <img src="<?= $info['footer_logo_src']; ?>">
                                </span>
                            </footer>
                        </div>
        
        <article class="fullcontainer single">
            <?php
            if (isset($info['data']) && !empty($info['data'])) {
                foreach ($info['data'] as $tableName => $data) {
                    // p_r($data['dispColumns']);
                    // die;
            ?>

                        <div class="inhsetting1">
                            <div class="inhsetting-sidebar sidebar">
                            <ul>
                                
                                <?php
                                if (is_array($info['categories'])) {
                                    foreach ($info['categories'] as $category) {
                                        $catNames = array_column($category, 'name');
                                        $first = "";
                                        foreach($catNames as $cn) {
                                            if($tableName==$cn) {
                                                $first = "first";
                                            }
                                        }
                                        echo "<li class='$first'>";
                                        if (is_array($category) && !empty($category)) {
                                            foreach ($category as $k=> $cat) {
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
                        <div class="inhRight">
                            <h2 class="borderBottom block marginBottom5"><?php echo $tableName; ?></h2>
                            <p class=" borderBottom block">
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
                                            echo "<td>{$this->translate($colInfo['title'])}</td>";
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <?php
                                /**
                                 * Printable columns is attribut which we get from table-column mapping
                                 * In this template Display column is different. It is combination of printable column and feature attribute
                                 * If Key of display column will be feature type, then it will get the value of feature and print as column value.
                                 * Feature attribut will become seperate column here.
                                 */
                                $i = 1;
                                if (isset($data['data']) && !empty($data['data'])) {
                                    foreach ($data['data'] as $brandName => $row) {
                                        $active = "";
                                        if ($i % 2 !== 0) {
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
                                                if (in_array($colInfo['feature'], $row[$colInfo['fieldName']])) {
                                                    echo "<td>Yes</td>";
                                                    $td = true;
                                                }
                                            }
                                            if (!$td) {
                                                if(isset($colInfo['mode'])) {
                                                    echo "<td>".$this->input('ING_PP_PageNumber_'.md5($tableName.$brandName.$key),["width"=>"40", "placeholder"=>"Page Number"])."</td>";
                                                } else {
                                                    echo "<td></td>";
                                                }
                                            }
                                        }
                                        echo "</tr>";
                                    }
                                }


                                ?>

                            </table>
                            <?php if($this->editmode) {?>
                            <p class="small">*<?php echo $this->input('INH_PP_'.md5($tableName), ["placeholder"=>"Table Bottom Title"])?></p>
                            <?php }?>
                            <?php if(!$this->editmode && !$this->input('INH_PP_'.md5($tableName))->isEmpty()) { ?>
                                <p class="small">*<?php echo $this->input('INH_PP_'.md5($tableName), ["placeholder"=>"Table Bottom Title"])?></p>
                            <?php }?>
                        </div>

                    </div>
            <?php }
            } ?>

       </article>

    </div>
</div>


<script>
    var rows = document.querySelectorAll(".inhsetting1");
    rows.forEach(function (row) {
        var rowDescriptions = ro.layout.getBoxDescriptions(row);
        var rowDescription = rowDescriptions[0];
        const onLeftPage = rowDescription.pageLeft;
        row.className = row.className +" "+  (onLeftPage ? "inhsettingLeft" : "inhsettingRight");
    });
</script>
