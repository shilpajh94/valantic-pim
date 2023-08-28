<?php
if (!isset($this->parentContainer)) {
    $this->extend('PTGEUCatalogBundle:Layouts:layout.html.php');
}
?>

<?php if($this->editmode): ?>
        <?= $this->relation("ptg_eu_product_page", [
                "types" => ["object"],
                "subtypes" => [
                "object" => ["object"]
                ],
                "classes" => ["PTGEUCatalogCategory"],
        ]);
        ?>
<?php endif; ?>

<?php
if($groupData){
?>
<article class="template page-break-after-always">
        <span  class="pageName">
                <?= $groupData['siop5Category']; ?>
        </span>
        <div class="footer">
                <footer class="flex-center <?php echo $footer_class; ?>">
                        <span class="logo">
                                <img src="<?= $footer_logo_src; ?>" alt="footer image">
                        </span>
                        <div class="flex aligned ">
                                <h5>
                                        <?php
                                        if($this->editmode){
                                                if(!$this->input("PTG_Footer_BrandName")->isEmpty())
                                                {
                                                        echo $this->input("PTG_Footer_BrandName");
                                                }
                                                else
                                                {
                                                        echo $this->input("PTG_Footer_BrandName")->setDataFromResource($groupData['brandName']);
                                                }
                                                        
                                        }else{
                                                echo $this->input("PTG_Footer_BrandName");
                                        }
                                        ?>
                                
                                        <span>
                                        <?php
                                        if($this->editmode){
                                                if(!$this->input("PTG_Footer_HoseType")->isEmpty())
                                                {
                                                        echo $this->input("PTG_Footer_HoseType");
                                                }
                                                else
                                                {
                                                        echo $this->input("PTG_Footer_HoseType")->setDataFromResource($groupData['siop5Category']);
                                                }
                                                        

                                                echo "/";
                                                
                                                if(!$this->input("PTG_Footer_HoseType2")->isEmpty())
                                                {
                                                        echo $this->input("PTG_Footer_HoseType2");
                                                }
                                                else
                                                {
                                                        echo $this->input("PTG_Footer_HoseType2")->setDataFromResource($groupData['siop6siop7Category']);
                                                }
                                                        
                                        }else{
                                                echo $this->input("PTG_Footer_HoseType")."/".$this->input("PTG_Footer_HoseType2");
                                        }
                                        ?>
                                        </span>
                        
                
                                </h5>
                                <div class="sets">
                                        <strong>
                                                <?php
                                                if($this->editmode){
                                                        if(!$this->input("PTG_Footer_Compatibility")->isEmpty())
                                                        {
                                                                echo $this->input("PTG_Footer_Compatibility");
                                                        }
                                                        else
                                                        {
                                                                echo $this->input("PTG_Footer_Compatibility")->setDataFromResource('Compatible fittings');
                                                        }
                                                                
                                                }else{
                                                        echo $this->input("PTG_Footer_Compatibility");
                                                }
                                                ?>
                                        </strong>
                                                <?php
                                                $compatibility_description = "All fittings compatible with ".$groupData['brandName']." are listed in Section 1 (starting on page 131).";
                                                if($this->editmode){
                                                        if(!$this->input("PTG_Footer_Compatibility_Description")->isEmpty())
                                                        {
                                                                echo $this->input("PTG_Footer_Compatibility_Description");
                                                        }
                                                        else
                                                        {
                                                                echo $this->input("PTG_Footer_Compatibility_Description")->setDataFromResource($compatibility_description);
                                                        }
                                                                
                                                }else{
                                                        echo $this->input("PTG_Footer_Compatibility_Description");
                                                }
                                                ?>
                                </div>
                        </div>
                </footer>
        </div>

        <div class="footer1">
                <footer class="flex-center <?php echo $footer_class; ?>">
                        <div class="flex aligned ">
                                <div class="sets">
                                        <strong>
                                                <?php
                                                        if($this->editmode){
                                                                if(!$this->input("PTG_Footer_Compatibility1")->isEmpty())
                                                                {
                                                                        echo $this->input("PTG_Footer_Compatibility1");
                                                                }
                                                                else
                                                                {
                                                                        echo $this->input("PTG_Footer_Compatibility1")->setDataFromResource('Compatible fittings');
                                                                }
                                                                        
                                                        }else{
                                                                echo $this->input("PTG_Footer_Compatibility1");
                                                        }
                                                ?>
                                        </strong>

                                        <?php
                                        $compatibility_description = "All fittings compatible with ".$groupData['brandName']." are listed in Section 1 (starting on page 131).";
                                        if($this->editmode){
                                                if(!$this->input("PTG_Footer_Compatibility1_Description")->isEmpty())
                                                {
                                                        echo $this->input("PTG_Footer_Compatibility1_Description");
                                                }
                                                else
                                                {
                                                        echo $this->input("PTG_Footer_Compatibility1_Description")->setDataFromResource($compatibility_description);
                                                }
                                        }else{
                                                echo $this->input("PTG_Footer_Compatibility1_Description");
                                        }
                                        ?>
                                </div>
                                <h5>
                                        <?php
                                                if($this->editmode){
                                                        if(!$this->input("PTG_Footer_BrandName1")->isEmpty())
                                                        {
                                                                echo $this->input("PTG_Footer_BrandName1");
                                                        }
                                                        else
                                                        {
                                                                echo $this->input("PTG_Footer_BrandName1")->setDataFromResource($groupData['brandName']);
                                                        }
                                                                
                                                }else{
                                                        echo $this->input("PTG_Footer_BrandName1");
                                                }
                                        ?>

                                        <span>

                                                <?php

                                                if($this->editmode){
                                                        if(!$this->input("PTG_Footer_HoseType1")->isEmpty())
                                                        {
                                                                echo $this->input("PTG_Footer_HoseType1");
                                                        }
                                                        else
                                                        {
                                                                echo $this->input("PTG_Footer_HoseType1")->setDataFromResource($groupData['siop5Category']);
                                                        }
                                                                

                                                        echo "/";
                                                        
                                                        if(!$this->input("PTG_Footer_HoseType3")->isEmpty())
                                                        {
                                                                echo $this->input("PTG_Footer_HoseType3");
                                                        }
                                                        else
                                                        {
                                                                echo $this->input("PTG_Footer_HoseType3")->setDataFromResource($groupData['siop6siop7Category']);
                                                        }
                                                                
                                                }else{
                                                        echo $this->input("PTG_Footer_HoseType1")."/".$this->input("PTG_Footer_HoseType3");
                                                }

                                                ?>

                                        </span>
                                </h5>
                        </div>

                        <span class="logo">
                                <img src="<?= $footer_logo_src; ?>" alt="footer image">
                        </span>
                </footer>
        </div>
                
        <header class="content white">
                <h1>
                        <?php
                                if($this->editmode){
                                        if(!$this->input("PTG_Heading")->isEmpty())
                                        {
                                                echo $this->input("PTG_Heading");
                                        }
                                        else
                                        {
                                                echo $this->input("PTG_Heading")->setDataFromResource($groupData['brandName']);
                                        }
                                                
                                }else{
                                        echo $this->input("PTG_Heading");
                                }
                        ?>
                </h1>

                <aside class="row justify-between ">
                        <div class="col-8">
                                <?php
                                if($this->editmode){
                                        if(!$this->wysiwyg("PTG_LongDescription")->isEmpty())
                                        {
                                                echo $this->wysiwyg("PTG_LongDescription");
                                        }
                                        else
                                        {
                                                echo $this->wysiwyg("PTG_LongDescription")->setDataFromResource($groupData['longDescription']);
                                        }
                                                
                                }else{
                                        echo $this->wysiwyg("PTG_LongDescription");
                                }
                                ?>
                        </div>
                        <div class="col-4 d-flex flex-column">
                        <?php
                        if($this->editmode){
                                if(!$this->image("HHPP_Image_Left")->isEmpty())
                                {
                                        echo $this->image("HHPP_Image_Left", ["width" => 200, "height" => 200]);
                                }
                                else
                                {
                                        echo $this->image("HHPP_Image_Left", ["width" => 200, "height" => 200])->setImage($groupData['mainImageObj']);
                                }
                                        
                        }else{
                                $imgSrcObj1 = $this->image("HHPP_Image_Left");

                                if($view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj1,$this->imageWidth))
                                {
                                ?>
                                <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj1,$this->imageWidth); ?>"width="200" height="200" alt="product image"/>
                                <?php
                                }
                        }
                        ?>

                        <?php
                        if($this->editmode){
                                if(!$this->image("Drawing_Picture")->isEmpty())
                                {
                                        echo $this->image("Drawing_Picture",["width" => 200, "height" => 200]);
                                }
                                else
                                {
                                        echo $this->image("Drawing_Picture", ["width" => 200, "height" => 200])->setImage($groupData['technicalDrawing1Obj']);
                                }
                        }else{
                                $imgSrcObj2 = $this->image("Drawing_Picture");

                                if($view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj2,$this->imageWidth))
                                {
                                ?>
                                <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj2,$this->imageWidth); ?>"width="200" height="200" alt="technical drawring"/>
                                <?php
                                }
                        }
                        ?>
                        </div>
                </aside>
        </header>

        <section class="content">
               
                <?php if($groupData['safetyFeatures'] || !empty(trim($groupData['material'])) || !empty(trim($groupData['reinforcement'])) || !empty(trim($groupData['temperatureRange']))): ?>
                        
                        <menu class="flex">
                                <?php if($groupData['safetyFeatures']): ?>
                                        <div class="feature mr-4">
                                                <h6><?= $this->translate('PTGEU_features') ?></h6>
                                                <div >
                                                        <?php foreach($groupData['safetyFeatures'] as $key => $feature): ?>
                                                                <p  class="flex center">
                                                                        <?php if($groupData['isAnyIconFeatureAvailable']): ?>
                                                                                <?php if($feature['iconSrc']): ?>
                                                                                <img src="<?= $feature['iconSrc'] ?>" alt=""/>
                                                                                <?php else: ?>
                                                                                        <span class="mr-40"></span>
                                                                                <?php endif;?>
                                                                        <?php endif; ?>

                                                                        <span class="ptb-5"><?= $feature['name'] ?></span>
                                                                </p>
                                                        <?php endforeach; ?>
                                                </div>
                                        </div>
                                <?php endif; ?>

                                <?php if(!empty(trim($groupData['material'])) || !empty(trim($groupData['reinforcement'])) || !empty(trim($groupData['temperatureRange']))): ?>
                                        <div class="specs">
                                                <h6><?= $this->translate('PTGEU_specs') ?></h6>
                                                <div>
                                                        <?php if(!empty(trim($groupData['material']))): ?>
                                                                <p>
                                                                        <strong><?= $this->translate('PTGEU_Material') ?></strong>
                                                                        <?= $groupData['material'] ?>
                                                                </p>
                                                        <?php endif; ?>
                                                        
                                                        <?php if(!empty(trim($groupData['reinforcement']))): ?>
                                                                <p>
                                                                        <strong><?= $this->translate('PTGEU_Reinforcement') ?></strong>
                                                                        <?= $groupData['reinforcement'] ?>
                                                                </p>
                                                        <?php endif; ?>

                                                        <?php if(!empty(trim($groupData['temperatureRange']))): ?>
                                                                <p>
                                                                        <strong><?= $this->translate('PTGEU_Temperature_Range') ?></strong>
                                                                        <?= $groupData['temperatureRange']; ?>
                                                                </p>
                                                        <?php endif; ?>

                                                        <?php if(!empty(trim($groupData['heatAndOilResistant']))): ?>
                                                                <p>
                                                                        <strong><?= $this->translate('PTGEU_HeatAndOilResistant') ?></strong>
                                                                        <?= $groupData['heatAndOilResistant']; ?>
                                                                </p>
                                                        <?php endif; ?>

                                                        <?php if(!empty(trim($groupData['staticConductive']))): ?>
                                                                <p>
                                                                        <strong><?= $this->translate('PTGEU_StaticConductivity') ?></strong>
                                                                        <?= $groupData['staticConductive']; ?>
                                                                </p>
                                                        <?php endif; ?>

                                                        <?php if(!empty(trim($groupData['performance']))): ?>
                                                                <p>
                                                                        <strong><?= $this->translate('PTGEU_Performance') ?></strong>
                                                                        <?= $groupData['performance']; ?>
                                                                </p>
                                                        <?php endif; ?>
                                                </div>
                                        </div> 
                                <?php endif; ?>
                        </menu>

                <?php endif; ?>
                
                <div class="page-break-after-always"></div>
                <?php

                $tableNoteCount = 0;
                foreach($groupData['data'] as $articleGroupKey => $articleGroupData)
                {
                        ?>

                        <table aria-describedby="articleTable" class="table page-break-inside-always continueLable">
                                <thead>

                                        <?php if($groupData['iconRequired'] == 'YES'): ?>
                                                <tr>
                                                        <?php foreach($groupData['columnsDataWithImages'] as $key => $c1data): ?>
                                                                <?php
                                                                        $columnWidth = '';
                                                                        $g1count = count($c1data);
                                                                        $firstArray = array_shift($c1data);
                                                                        if($firstArray['columnWidth'])
                                                                        {
                                                                                $columnWidth = "width=".$firstArray['columnWidth'];
                                                                        }
                                                                                
                                                                ?>
                                                                <th scope="outer" colspan="<?= $g1count; ?>" <?php echo $columnWidth; ?>>
                                                                <?php if($firstArray['columnIcon']): ?>
                                                                <img src="<?= $firstArray['columnIcon'] ?>" width="45" height="45" alt="icon image"/>
                                                                <?php endif; ?>
                                                                </th>
                                                        <?php endforeach; ?>
                                                </tr>
                                        <?php endif; ?>

                                        <tr class="border-bottom">
                                                <?php foreach($groupData['columnsDataWithImages'] as $key => $c2data): ?>
                                                        <?php
                                                                $columnWidth = '';
                                                                $g2count = count($c2data);
                                                                $first2Array = array_shift($c2data);
                                                                if($first2Array['columnWidth'])
                                                                {
                                                                        $columnWidth = "width=".$first2Array['columnWidth'];
                                                                }
                                                        ?>
                                                        <th scope="outer" colspan="<?= $g2count; ?>" <?php echo $columnWidth; ?>><?= $first2Array['columnLabel'] ?></th>
                                                <?php endforeach; ?>
                                        </tr>

                                        <?php if($groupData['subHeaderRequired'] == 'YES'): ?>
                                                <tr>
                                                        <?php foreach($groupData['columnsDataWithImages'] as $key => $c3data): ?>
                                                                <?php  foreach($c3data as $c3key => $c3value): ?>
                                                                        <?php if($c3value['unitName']): ?>
                                                                                <th scope="outer"><?= $c3value['unitName'] ?></th>
                                                                        <?php else: ?>
                                                                                <th scope="outer"></th>
                                                                        <?php endif; ?>
                                                                <?php endforeach; ?>
                                                        <?php endforeach; ?>
                                                </tr>
                                        <?php endif; ?>
                                </thead>

                                <tbody>
                                        <?php $incrRow = 1; ?>
                                        <?php foreach($articleGroupData as $key => $element): ?>
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

                        <?php
                        $tableNoteCount++;

                } ?>
        </section>

</article>

<?php if (!$containerRequest): ?>
        <script type="text/javascript" src="/static/js/tableContinueLable.js"></script>
<?php endif; ?>

<?php } ?>

