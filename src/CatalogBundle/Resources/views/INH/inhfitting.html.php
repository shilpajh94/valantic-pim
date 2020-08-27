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
<div class="seggregate">

    <div id="pageHeader"></div>
        <span  class="pageName">
                <?php 
                if($this->editmode){
                        echo $this->input("INH_Fitting_Header")->setDataFromResource($groupData['siop3Category']."/".$groupData['siop4Category']); 
                }else{
                        echo $this->input("INH_Fitting_Header");
                }                
                ?>
        </span>

    <article class="fullcontainer ">
       
        <div class="flex noWrap">
                <div class="sidebar">
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
                <div class="grow-2 width80" >
                        <h2 class="borderBottom marginBottom5 flex-center">
                            <?php 
                            if ($this->editmode) {
                                echo $this->input('INH_Fitting_brandName')->setDataFromResource($groupData['brandName']);
                            } else {
                                echo $this->input('INH_Fitting_brandName');
                            }
                            ?>  

                                                    
                        </h2>
                        <span class="img-placeholder marginBottom15">
                        <?php
                                if($this->editmode){
                                        echo $this->image("INH_Fitting_MainImage", ["class"=> "alignRight", "width" => 300, "height" => 200])->setImage($groupData['mainImageObj']); 
                                }else{
                                        echo $this->image("INH_Fitting_MainImage", ["class"=> "alignRight", "width" => 300, "height" => 200]);
                                }                
                            ?>  
                        </span>
                        <?php if($groupData['safetyFeatures'] || !empty(trim($groupData['longDescription'])) || !empty(trim($groupData['material'])) || !empty(trim($groupData['pressureRating'])) || !empty(trim($groupData['brandingLayline'])) || !empty(trim($groupData['orderCodes']))): ?>
                        <h3 class="light"><?= $this->translate('Product specification') ?></h3>
                        <div class="flex  specs-details">
                            <div class="col-6">
                                <?php if(!empty(trim($groupData['longDescription']))): ?>
                                <p>
                                    <b><?= $this->translate('Application') ?></b>
                                    <?php
                                    if($this->editmode){
                                            echo $this->wysiwyg("INH_Fitting_LongDescription", ['placeholder'=>"Enter Marketting Description"])->setDataFromResource($groupData['longDescription']); 
                                    }else{
                                            echo $this->wysiwyg("INH_Fitting_LongDescription", ['placeholder'=>"Enter Marketting Description"]);
                                    }                
                                    ?>
                                </p>
                                <?php endif; ?>
                                <?php if(!empty(trim($groupData['material']))): ?>
                                <p>
                                    <b><?= $this->translate('Materials') ?></b>
                                    <?php
                                    if($this->editmode){
                                            echo $this->input("INH_Fitting_Material", ['placeholder'=>"Enter Material"])->setDataFromResource($groupData['material']); 
                                    }else{
                                            echo $this->input("INH_Fitting_Material", ['placeholder'=>"Enter Material"]);
                                    }                
                                    ?>
                                </p>
                                <?php endif; ?>
                                <?php if(!empty(trim($groupData['pressureRating']))): ?>
                                <p>    
                                    <b><?= $this->translate('Pressure Rating') ?></b>
                                    <?php
                                    if($this->editmode){
                                            echo $this->input("INH_Fitting_PressureRating", ['placeholder'=>"Enter Pressure Rating"])->setDataFromResource($groupData['pressureRating']); 
                                    }else{
                                            echo $this->input("INH_Fitting_PressureRating", ['placeholder'=>"Enter Pressure Rating"]);
                                    }                
                                    ?>
                                </p>
                                <?php endif; ?>
                                <?php if(!empty(trim($groupData['brandingLayline']))): ?>
                                <p>
                                    <b><?= $this->translate('Branding') ?></b>
                                    <?php
                                    if($this->editmode){
                                            echo $this->input("INH_Fitting_brandingLayline",['placeholder'=>"Enter Branding"])->setDataFromResource($groupData['brandingLayline']); 
                                    }else{
                                            echo $this->input("INH_Fitting_brandingLayline",['placeholder'=>"Enter Branding"]);
                                    }                
                                    ?>
                                </p>
                                <?php endif; ?>
                                <?php if(!empty(trim($groupData['orderCodes']))): ?>
                                <p>    
                                    <b><?= $this->translate('Order Codes') ?></b>
                                    <?php
                                    if($this->editmode){
                                            echo $this->input("INH_Fitting_OrderCodes",['placeholder'=>"Enter Order Codes"])->setDataFromResource($groupData['orderCodes']); 
                                    }else{
                                            echo $this->input("INH_Fitting_OrderCodes",['placeholder'=>"Enter Order Codes"]);
                                    }                
                                    ?>
                                </p>
                                <?php endif; ?>
                            </div>
                            <div class="col-6">
                                <div class="flex">
                                        <div class="col-6">
                                        <?php
                                        if($this->editmode){
                                                echo $this->image("INH_Fitting_ProfileDimension", ["width" => 300, "height" => 200])->setImage($groupData['ProfileDimensionImageObj']); 
                                        }else{
                                                echo $this->image("INH_Fitting_ProfileDimension", ["width" => 300, "height" => 200]);
                                        }                
                                        ?>
                                        </div>
                                        
                                        <?php if($groupData['safetyFeatures']): ?>
                                        <div class="col-6">
                                                <div class="feature">
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
                                        </div>
                                        <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if($groupData['data']): ?>
                            <table class="grid special marginBottom5" cellpadding="0" cellspacing="0">
                                
                                
                                <tbody>
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
                </div>
                
        </div>
       
               
               
       
      
    </article>
    <footer class="flex <?php echo $footer_class; ?>">
        <span class="logo">
                <img src="<?= $footer_logo_src; ?>">
        </span>
    </footer>
</div>
<?php endif; ?>
