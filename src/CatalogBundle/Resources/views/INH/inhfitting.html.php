<?php
if (!isset($this->parentContainer)) {
    $this->extend('CatalogBundle:Layouts:layout.html.php');
}
?>

<?php if ($this->editmode): ?>
    <?=
    $this->relation("inh_fitting_page", [
        "types" => ["object"],
        "subtypes" => [
            "object" => ["object"]
        ],
        "classes" => ["CatalogTables"],
    ]);
    ?>
<?php endif; ?>

<?php
if($groupData):
?>
<div class="template">
        <div class="segregate inh">

                <div id="pageHeader"></div>
                <span class="pageName">
                <?php 
                if($this->editmode){
                        echo $this->input("INH_Fitting_Header")->setDataFromResource($groupData['siop3Category']."/".$groupData['siop4Category']); 
                }else{
                        echo $this->input("INH_Fitting_Header");
                }                
                ?>
                </span>

                <div class="footer">
                        <footer class="flex-center <?php echo $footer_class; ?>">
                                <span class="logo">
                                        <img src="<?= $footer_logo_src; ?>">
                                </span>
                                <div class="flex aligned"></div>
                        </footer>
                </div>
                <div class="footer1">
                        <footer class="flex-center <?php echo $footer_class; ?>">
                                <div class="flex aligned"></div>
                                <span class="logo">
                                        <img src="<?= $footer_logo_src; ?>">
                                </span>
                        </footer>
                </div>

                <article class="fullcontainer single">
                        <div class="inhsetting1">
                            <div class="inhsetting-sidebar sidebar">
                                        <ul>
                                                <?php
                                                if (is_array($groupData['categories'])) {
                                                        foreach ($groupData['categories'] as $category) {
                                                        $catNames = array_column($category, 'name');
                                                        $first = "";
                                                        foreach ($catNames as $cn) {
                                                                if ($groupData['selectedCategory'] == $cn) {
                                                                $first = "first";
                                                                }
                                                        }
                                                        echo "<li class='$first'>";
                                                        if (is_array($category) && !empty($category)) {
                                                                foreach ($category as $k => $cat) {
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
                                        <header class=" white">
                                                <h1>
                                                        <?php 
                                                        if ($this->editmode) {
                                                                echo $this->input('INH_Fitting_brandName')->setDataFromResource($groupData['brandName']);
                                                        } else {
                                                                echo $this->input('INH_Fitting_brandName');
                                                        }
                                                        ?>
                                                </h1>
                                                <aside class="ptgHead">
                                                        <div>
                                                                <?php
                                                                if($this->editmode){
                                                                        echo $this->wysiwyg("INH_Fitting_LongDescription", ['placeholder'=>"Enter Marketting Description"])->setDataFromResource($groupData['longDescription']); 
                                                                }else{
                                                                        echo $this->wysiwyg("INH_Fitting_LongDescription", ['placeholder'=>"Enter Marketting Description"]);
                                                                }                
                                                                ?>
                                                        </div>
                                                        <span class="imageHolder">
                                                        <?php
                                                        if($this->editmode){
                                                                echo $this->image("INH_Fitting_MainImage", ["width" => 400, "height" => 200])->setImage($groupData['mainImageObj']); 
                                                        }else{
                                                                echo $this->image("INH_Fitting_MainImage", ["width" => 400, "height" => 200]);
                                                        }
                                                        ?>

                                                        <?php
                                                        if($this->editmode){
                                                                echo $this->image("INH_Fitting_ProfileDimension", ["width" => 400, "height" => 200])->setImage($groupData['ProfileDimensionImageObj']); 
                                                        }else{
                                                                echo $this->image("INH_Fitting_ProfileDimension", ["width" => 400, "height" => 200]);
                                                        }
                                                        ?>
                                                        </span>
                                                </aside>
                                        </header>
                                        <section class="content">
                                        <?php if($groupData['safetyFeatures'] || !empty(trim($groupData['material'])) || !empty(trim($groupData['pressureRating'])) || !empty(trim($groupData['brandingLayline'])) || !empty(trim($groupData['orderCodes']))): ?>  
                                                <menu class="flex">
                                                        <?php if(!empty(trim($groupData['material'])) || !empty(trim($groupData['pressureRating'])) || !empty(trim($groupData['brandingLayline'])) || !empty(trim($groupData['orderCodes']))): ?>
                                                                <div class="specs col-6">
                                                                        <h6><?= $this->translate('specs') ?></h6>
                                                                        <div class="spec-requirement">
                                                                                <div>
                                                                        
                                                                                        <?php if(!empty(trim($groupData['material']))): ?>
                                                                                        <p>
                                                                                                <b><?= $this->translate('Materials') ?></b>
                                                                                                <?= $groupData['material'] ?>
                                                                                        </p>
                                                                                        <?php endif; ?>

                                                                                        <?php if(!empty(trim($groupData['pressureRating']))): ?>
                                                                                        <p>                
                                                                                                <b><?= $this->translate('Pressure Rating') ?></b>
                                                                                                <?= $groupData['pressureRating'] ?>
                                                                                        </p>
                                                                                        <?php endif; ?>

                                                                                        <?php if(!empty(trim($groupData['brandingLayline']))): ?>
                                                                                        <p>              
                                                                                                <b><?= $this->translate('Branding') ?></b>
                                                                                                <?= $groupData['brandingLayline']; ?>
                                                                                        </p>
                                                                                        <?php endif; ?>

                                                                                        <?php if(!empty(trim($groupData['orderCodes']))): ?>
                                                                                        <p>              
                                                                                                <b><?= $this->translate('Order Codes') ?></b>
                                                                                                <?= $groupData['orderCodes']; ?>
                                                                                        </p>
                                                                                        <?php endif; ?>
                                                                                </div>
                                                                        </div>
                                                                </div> 
                                                        <?php endif; ?>

                                                        <?php if($groupData['safetyFeatures']): ?>
                                                                <div class="feature col-6">
                                                                        <h6><?= $this->translate('Key features + Benefits') ?></h6>
                                                                        <div>
                                                                                <?php foreach($groupData['safetyFeatures'] as $key => $feature): ?>
                                                                                        <p  class="flex">
                                                                                                <?php if($feature['iconSrc']): ?>
                                                                                                <img src="<?= $feature['iconSrc'] ?>" />
                                                                                                <?php endif; ?>
                                                                                                <font> <?= $feature['name'] ?></font>
                                                                                        </p>
                                                                                <?php endforeach; ?>

                                                                        </div>
                                                                </div>
                                                        
                                                        <?php endif; ?>

                                                </menu>
                                        <?php endif; ?>
                                        <?php if($groupData['data']): ?>
                                        <!-- <table class="grid" cellpadding="0" cellspacing="0"> -->
                                        <table class="grid special inh" cellspacing="0" cellpadding="0">
                                                <thead>
                                                        <?php if($groupData['iconRequired'] == 'YES'): ?>
                                                                <tr class="sub-head">
                                                                        <?php foreach($groupData['columnsDataWithImages'] as $key => $c1data): ?>
                                                                                <?php 
                                                                                        $g1count = count($c1data);
                                                                                        $firstArray = array_shift($c1data);
                                                                                ?>
                                                                                <td colspan="<?= $g1count; ?>"><img src="<?= $firstArray['columnIcon'] ?>" width="45" height="45" /></td>
                                                                        <?php endforeach; ?>
                                                                </tr>
                                                        <?php endif; ?>

                                                        <tr class="head">
                                                                <?php foreach($groupData['columnsDataWithImages'] as $key => $c2data): ?>
                                                                        <?php 
                                                                                $g2count = count($c2data);
                                                                                $first2Array = array_shift($c2data);
                                                                        ?>
                                                                        <td colspan="<?= $g2count; ?>"><?= $first2Array['columnLabel'] ?></td>
                                                                <?php endforeach; ?>
                                                        </tr>

                                                        <?php if($groupData['subHeaderRequired'] == 'YES'): ?>
                                                                <tr class="sub-head">
                                                                        <?php foreach($groupData['columnsDataWithImages'] as $key => $c3data): ?>
                                                                                <?php  foreach($c3data as $c3key => $c3value): ?>
                                                                                        <?php if($c3value['unitName']): ?>
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
                                                        <?php foreach($groupData['data'] as $key => $element): ?>
                                                                <?php if($incrRow%2==0): ?>
                                                                <tr>
                                                                <?php else: ?>
                                                                <tr class="active">
                                                                <?php endif; ?>
                                                                        <?php foreach($element as $ekey => $value): ?>
                                                                                        <td><?= $value ?></td>
                                                                        <?php endforeach; ?>
                                                                </tr>
                                                                <?php $incrRow++ ?>
                                                        <?php endforeach; ?>
                                                </tbody>
                                        </table>
                                        <?php endif; ?>
                                        <p class="small"><?php echo $this->input('INH_Fitting_Comment',['placeholder'=>"Enter comment"]); ?></p>
                                        </section>
                                </div>
                        </div>
                </article>
        </div>
</div>
<?php endif; ?>

<script>
    var rows = document.querySelectorAll(".inhsetting1");
    rows.forEach(function (row) {
        var rowDescriptions = ro.layout.getBoxDescriptions(row);
        var rowDescription = rowDescriptions[0];
        const onLeftPage = rowDescription.pageLeft;
        row.className = row.className +" "+  (onLeftPage ? "inhsettingLeft" : "inhsettingRight");
    });
</script>
