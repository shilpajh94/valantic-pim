<?php
if (!isset($this->parentContainer)) {
    $this->extend('CatalogBundle:Layouts:layout.html.php');
}
?>

<?php if ($this->editmode): ?>
    <?=
    $this->relations("inh_fitting_cover_page", [
        "types" => ["object"],
        "subtypes" => [
            "object" => ["object"]
        ],
        "classes" => ["CatalogTables"],
    ]);
    ?>
<?php endif; ?>


<div class="template">
<div class="segregate inhSettingN">

   <div id="pageHeader"></div>
    <span  class="pageName">
        <?= $selectedCategory; ?>
    </span>
        <div class="footer">
            <footer class="flex-center <?php echo $footer_class; ?>">
                <span class="logo">
                        <img src="<?= $footer_logo_src; ?>">
                </span>
                <div class="flex-center aligned">
                    <h5>
                    <?php if($this->editmode): ?>
                            <?php if($this->input("INH_Fitting_Cover_Category", ["placeholder" => "Enter Fitting Category"])->isEmpty()): ?>
                                    <?= $this->input("INH_Fitting_Cover_Category", ["placeholder" => "Enter Fitting Category"])->setDataFromResource($selectedCategory) ?>
                            <?php else: ?>
                                    <?= $this->input("INH_Fitting_Cover_Category", ["placeholder" => "Enter Fitting Category"]); ?>
                            <?php endif; ?>
                    <?php else: ?>
                            <?= $this->input("INH_Fitting_Cover_Category", ["placeholder" => "Enter Fitting Category"]) ?>
                    <?php endif; ?>
                    </h5>
                </div>
            </footer>
        </div>
        <div class="footer1">
            <footer class="flex-center <?php echo $footer_class; ?>">
                <div class="flex-center aligned">
                    <h5>
                        <?php if($this->editmode): ?>
                                <?php if($this->input("INH_Fitting_Cover_Category1", ["placeholder" => "Enter Fitting Category"])->isEmpty()): ?>
                                        <?= $this->input("INH_Fitting_Cover_Category1", ["placeholder" => "Enter Fitting Category"])->setDataFromResource($selectedCategory) ?>
                                <?php else: ?>
                                        <?= $this->input("INH_Fitting_Cover_Category1", ["placeholder" => "Enter Fitting Category"]); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->input("INH_Fitting_Cover_Category1", ["placeholder" => "Enter Fitting Category"]) ?>
                        <?php endif; ?>
                    </h5>
                </div>
                <span class="logo">
                        <img src="<?= $footer_logo_src; ?>">
                </span>
            </footer>
        </div>

        <article class="fullcontainer single">


                    <div class="inhsetting1">
 <div class="inhsetting-sidebar">
                        <div class="sidebar">
                            <ul>
                                <?php
                                if (is_array($categories)) {
                                    foreach ($categories as $category) {
                                        $first = "";
                                        if ($selectedCategory == $category['mainCategory'][0]['name']) {
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
                        <div class=" inhRight">

                            <h1 class="borderBottom block marginBottom5 contitech-yellow">
                                <?php if($this->editmode): ?>
                                    <?php if($this->input("INH_Fitting_Cover_brandName", ["placeholder" => "Enter Fitting Category"])->isEmpty()): ?>
                                            <?= $this->input("INH_Fitting_Cover_brandName", ["placeholder" => "Enter Fitting Category"])->setDataFromResource($selectedCategory) ?>
                                    <?php else: ?>
                                            <?= $this->input("INH_Fitting_Cover_brandName", ["placeholder" => "Enter Fitting Category"]); ?>
                                    <?php endif; ?>
                                <?php else: ?>
                                        <?= $this->input("INH_Fitting_Cover_brandName", ["placeholder" => "Enter Fitting Category"]) ?>
                                <?php endif; ?>
                            </h1>

                            <?php
                                if ($this->editmode) {
                                    ?>
                                    <p class=" borderBottom block">
                                    <?php
                                    echo $this->image('INH_Fitting_Cover_DefaultImage', ["width" => 600, "height" => 200]);
                                    ?>
                                    </p>
                                    <?php
                                } else {
                                    if(!$this->image('INH_Fitting_Cover_DefaultImage')->isEmpty())
                                    {
                                    ?>
                                        <p class=" borderBottom block">
                                        <?php
                                        $imgSrcObj = $this->image('INH_Fitting_Cover_DefaultImage');
                                        if($imgSrcObj)
                                        {
                                        ?>
                                        <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" width="600" height="200"/>
                                        <?php } ?>
                                        </p>
                                        <?php
                                    }
                                    ?>

                            <?php
                                } ?>

                            <table class="grid special marginBottom5" cellspacing="0" cellpadding="0">
                                        <tr class="head">
                                                <td></td>
                                                <td>page</td>
                                                <?php foreach($featuresMaterials as $mkey => $material): ?>
                                                        <td><?= $material; ?></td>
                                                <?php endforeach; ?>
                                        </tr>
                                        <?php $incrRow = 1; ?>
                                        <?php foreach($templateBrandDtata as $key => $element): ?>
                                                <?php if($incrRow%2==0): ?>
                                                <tr>
                                                <?php else: ?>
                                                <tr class="active">
                                                <?php endif; ?>
                                                        <td><?= $key; ?></td>
                                                        <td><?= $this->input("page_{$incrRow}"); ?></td>
                                                        <?php foreach($element as $ekey => $value): ?>
                                                                        <td><?= $value ?></td>
                                                        <?php endforeach; ?>
                                                </tr>
                                                <?php $incrRow++ ?>
                                        <?php endforeach; ?>

                            </table>
                            <?php if($this->editmode) {?>
                            <p class="small">*<?php echo $this->input('INH_Fitting_Cover_Table_Bottom_Text', ["placeholder"=>"Table Bottom Title"])?></p>
                            <?php }?>
                            <?php if(!$this->editmode && !$this->input('INH_Fitting_Cover_Table_Bottom_Text')->isEmpty()) { ?>
                                <p class="small">*<?php echo $this->input('INH_Fitting_Cover_Table_Bottom_Text', ["placeholder"=>"Table Bottom Title"])?></p>
                            <?php }?>
                        </div>

                    </div>



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
