<?php
if (!isset($this->parentContainer)) {
    $this->extend('CatalogBundle:Layouts:layout.html.php');
}
?>
<?php if ($this->editmode) { ?>
    <?= $this->relation("inh-printcatalog"); ?>
<?php } ?>

<?php if (isset($info['data']) && !empty($info['data'])) { ?>
<div class="template">
<div class="segregate inhSettingSectionPage">

   <div id="pageHeader"></div>
    <span  class="pageName"><?= $info['configTableName']." - ". $info['siop4Description'] ?></span>
        <div class="footer">
            <footer class="flex-center <?php echo $info['footer_class']; ?> ">
                <span class="logo">
                    <img src="<?= $info['footer_logo_src']; ?>">
                </span>
                <div class="flex aligned">
                    <h5>
                    <?php if($this->editmode): ?>
                            <?php if($this->input("INH_SP_FOOTER_BRAND_1", ["placeholder" => "Enter Product Category"])->isEmpty()): ?>
                                    <?= $this->input("INH_SP_FOOTER_BRAND_1", ["placeholder" => "Enter Product Category"])->setDataFromResource($info['configTableName']) ?>
                            <?php else: ?>
                                    <?= $this->input("INH_SP_FOOTER_BRAND_1", ["placeholder" => "Enter Product Category"]); ?>
                            <?php endif; ?>
                    <?php else: ?>
                            <?= $this->input("INH_SP_FOOTER_BRAND_1", ["placeholder" => "Enter Product Category"]) ?>
                    <?php endif; ?>
                    </h5>
                </div>
            </footer>
        </div>
        <div class="footer1">
                            <footer class="flex-center <?php echo $info['footer_class']; ?> ">
                                <div class="flex aligned">
                                    <h5>
                                    <?php if($this->editmode): ?>
                                            <?php if($this->input("INH_SP_FOOTER_BRAND_2", ["placeholder" => "Enter Product Category"])->isEmpty()): ?>
                                                    <?= $this->input("INH_SP_FOOTER_BRAND_2", ["placeholder" => "Enter Product Category"])->setDataFromResource($info['configTableName']) ?>
                                            <?php else: ?>
                                                    <?= $this->input("INH_SP_FOOTER_BRAND_2", ["placeholder" => "Enter Product Category"]); ?>
                                            <?php endif; ?>
                                    <?php else: ?>
                                            <?= $this->input("INH_SP_FOOTER_BRAND_2", ["placeholder" => "Enter Product Category"]) ?>
                                    <?php endif; ?>
                                    </h5>
                                </div>
                                <span class="logo">
                                    <img src="<?= $info['footer_logo_src']; ?>">
                                </span>
                            </footer>
                        </div>

        <article class="fullcontainer single">
            <?php
            
                foreach ($info['data'] as $tableName => $data) {
            ?>

                        <div class="inhsetting1">
 <div class="inhsetting-sidebar20">
                            <div class=" sidebar">
                            <ul>

                                <?php
                                if (is_array($info['categories'])) {
                                    foreach ($info['categories'] as $category) {
                                        $first = "";
                                        if ($tableName == $category['mainCategory'][0]['name']) {
                                            $first = "first";
                                        }
                                        
                                        echo "<li class='$first'>";

                                        if(isset($category['mainCategory'][0]['name']))
                                            echo "<p><b>" . $category['mainCategory'][0]['name'] . "</b></p>";
                                        else
                                            echo "<p</p>";

                                        if (is_array($category['subCategory']) && !empty($category['subCategory'])) {
                                            foreach ($category['subCategory'] as $k => $cat) {
                                                if ($cat['printable'] == 1) {
                                                    echo "<p>" . $cat['name'] . "</p>";
                                                }
                                            }
                                        }
                                        echo "</li>";
                                    }
                                }
                                ?>

                            </ul>
                        </div>
</div>
                        <div class="inhRight">
                            <?php if($tableName == 'Welding'): ?>
                                <h1 class="borderBottom block marginBottom5 contitech-black weldingSectionPageHeader">
                            <?php else: ?>
                                <h1 class="borderBottom block marginBottom5 contitech-black">
                            <?php endif; ?>
                                <?php if($this->editmode): ?>
                                        <?php if($this->input("INH_SP_CATAGORY", ["placeholder" => "Enter Product Category"])->isEmpty()): ?>
                                                <?= $this->input("INH_SP_CATAGORY", ["placeholder" => "Enter Product Category"])->setDataFromResource($info['configTableName']) ?>
                                        <?php else: ?>
                                                <?= $this->input("INH_SP_CATAGORY", ["placeholder" => "Enter Product Category"]); ?>
                                        <?php endif; ?>
                                <?php else: ?>
                                        <?= $this->input("INH_SP_CATAGORY", ["placeholder" => "Enter Product Category"]) ?>
                                <?php endif; ?>
                            </h1>

                                <?php
                                if ($this->editmode) {
                                    ?>
                                    <?php if($tableName == 'Welding'): ?>
                                        <p class=" borderBottom block weldingSectionPageBlock">
                                    <?php else: ?>
                                        <p class=" borderBottom block">
                                    <?php endif; ?>
                                    <?php
                                    echo $this->image('INH_SP_' . md5($tableName), ["width" => 250, "height" => 130]);
                                    ?>
                                    </p>
                                    <?php
                                } else {
                                    if(!$this->image('INH_SP_' . md5($tableName))->isEmpty())
                                    {
                                    ?>
                                        <?php if($tableName == 'Welding'): ?>
                                            <p class=" borderBottom block weldingSectionPageBlock">
                                        <?php else: ?>
                                            <p class=" borderBottom block">
                                        <?php endif; ?>
                                        <?php
                                        $imgSrcObj =  $this->image('INH_SP_' . md5($tableName));

                                        if($imgSrcObj)
                                        {
                                        ?>
                                        <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj,$this->imageWidth); ?>" width="250" height="130"/>
                                        <?php } ?>
                                        </p>
                                        <?php
                                    }
                                    ?>

                                <?php
                                } ?>
                            <?php if($tableName == 'Welding'): ?>
                                <table class="grid special marginBottom5 weldingSectionPageTable" cellspacing="0" cellpadding="0">
                            <?php else: ?>
                                <table class="grid special marginBottom5" cellspacing="0" cellpadding="0">
                            <?php endif; ?>
                                <thead>
                                    <tr class="head ">
                                        <td width = "80"></td>
                                        <?php
                                        foreach ($data['dispColumns'] as $key => $colInfo) {
                                            $colwidth =  $colInfo['colWidth'];
                                            echo "<td width = $colwidth>{$this->translate($colInfo['title'])}</td>";
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
                                        foreach ($data['dispColumns'] as $key => $colInfo) { 
                                            // p_r($colInfo);
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
                                                }else{
                                                    echo "<td>No</td>";
                                                    $td = true;
                                                }
                                            }
                                            else if ($colInfo['type'] == 'hoseMedia' && isset($row[$colInfo['fieldName']])) {
                                                if (in_array($colInfo['hoseMedia'], $row[$colInfo['fieldName']])) {
                                                    echo "<td>Yes</td>";
                                                    $td = true;
                                                }else{
                                                    echo "<td>No</td>";
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
                            <p class="small">&nbsp;<?php echo $this->wysiwyg('INH_PP_'.md5($tableName), ["width"=>"720", "placeholder"=>"Table Bottom Title"])?></p>
                            <?php }?>
                            <?php if(!$this->editmode && !$this->wysiwyg('INH_PP_'.md5($tableName))->isEmpty()) { ?>
                                <p class="small">&nbsp;<?php echo $this->wysiwyg('INH_PP_'.md5($tableName), ["width"=>"720", "placeholder"=>"Table Bottom Title"])?></p>
                            <?php }?>
                        </div>

                    </div>
            <?php } ?>

       </article>

    </div>
</div>

<?php if (!$info['containerRequest']): ?>
    <script type="text/javascript" src="/static/js/tableContinueLable.js"></script>
<?php endif; ?>

<?php } ?>