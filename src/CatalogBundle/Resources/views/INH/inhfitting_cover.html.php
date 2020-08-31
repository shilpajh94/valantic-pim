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

<?php
// if($groupData):
?>
<div class="seggregate">

    <div id="pageHeader"></div>
        <span  class="pageName">
                <?php 
                if($this->editmode){
                        echo $this->input("INH_Fitting_Cover_Header")->setDataFromResource($selectedCategory); 
                }else{
                        echo $this->input("INH_Fitting_Cover_Header");
                }                
                ?>
        </span>

    <article class="fullcontainer ">
       
        <div class="flex noWrap">
                <div class="sidebar">
                <ul>
                                        <?php
                                        if (is_array($categories)) {
                                            foreach ($categories as $category) {
                                                $catNames = array_column($category, 'name');
                                                $first = "";
                                                foreach ($catNames as $cn) {
                                                    if ($selectedCategory == $cn) {
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
                <div class="grow-2 width80" >
                        <h2 class="borderBottom marginBottom5 flex-center">
                            <?php 
                            if ($this->editmode) {
                                echo $this->input('INH_Fitting_Cover_brandName')->setDataFromResource($selectedCategory);
                            } else {
                                echo $this->input('INH_Fitting_Cover_brandName');
                            }
                            ?>  

                                                    
                        </h2>
                        <span class="img-placeholder marginBottom15">
                        <?php
                                echo $this->image("INH_Fitting_MainImage", ["class"=> "alignRight", "width" => 300, "height" => 200]);
                        ?>  
                        </span>
                        <?php if($templateBrandDtata): ?>
                            <table class="grid special marginBottom5" cellpadding="0" cellspacing="0">
                                <tbody>
                                        
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
                                                        <td><?= $this->input("dfg_{$incrRow}"); ?></td>
                                                        <?php foreach($element as $ekey => $value): ?>
                                                                        <td><?= $value ?></td>
                                                        <?php endforeach; ?>
                                                </tr>
                                                <?php $incrRow++ ?>
                                        <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                </div>
                
        </div>
       
               
               
       
      
    </article>
    <footer class="flex <?php echo $footer_class; ?>">
        <span class="logo">
                <img src="<?= $footer_logo_src; ?>">
        </span>
    </footer>
</div>
<?php //endif; ?>
