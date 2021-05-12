<?php
if (!isset($this->parentContainer)) {
$this->extend('CatalogBundle:Layouts:layout.html.php');
}
?>
<?php if($this->editmode): ?>
        <?= $this->relation("template_hose_accessories_flanges", [
                "types" => ["object"],
                "subtypes" => [
                "object" => ["object"]
                ],
                "classes" => ["CatalogTables"],
        ]);
        ?>
<?php endif; ?>
<div class="template">
<div class="segregate">

<div id="pageHeader"></div>
        <span class="pageName">Hydraulic Hose</span>

   <div class="footer">
        <footer class="flex-center <?php echo $footer_class; ?>">
                        <span class="logo">
                                <b>
                                <?php if($this->editmode): ?>
                                        <?php if($this->input("HHAFC_Logo_Text1")->isEmpty()): ?>
                                                <?= $this->input("HHAFC_Logo_Text1")->setDataFromResource('Fittings') ?>
                                        <?php else: ?>
                                                <?= $this->input("HHAFC_Logo_Text1"); ?>
                                        <?php endif; ?>
                                <?php else: ?>
                                        <?= $this->input("HHAFC_Logo_Text1") ?>
                                <?php endif; ?>
                                </b>

                                <img src="<?= $footer_logo_src; ?>">
                        </span>

                        <div class="flex aligned">
                        <h5>
                    <?php if($this->editmode): ?>
                        <?php if($this->input("HHAFC_Footer_Title1")->isEmpty()): ?>
                                <?= $this->input("HHAFC_Footer_Title1")->setDataFromResource('Split Flanges') ?>
                        <?php else: ?>
                                <?= $this->input("HHAFC_Footer_Title1"); ?>
                        <?php endif; ?>
                <?php else: ?>
                                <?= $this->input("HHAFC_Footer_Title1") ?>
                <?php endif; ?>

                    <span>
                    <?php if($this->editmode): ?>
                        <?php if($this->input("HHAFC_Footer_SubTitle1")->isEmpty()): ?>
                                <?= $this->input("HHAFC_Footer_SubTitle1")->setDataFromResource('Code 61 / Code 62 Clamp Kits') ?>
                        <?php else: ?>
                                <?= $this->input("HHAFC_Footer_SubTitle1"); ?>
                        <?php endif; ?>
                        <?php else: ?>
                                        <?= $this->input("HHAFC_Footer_SubTitle1") ?>
                        <?php endif; ?>

                    </span>
                </h5>


                        </div>
                </footer>
        </div>
        <div class="footer1">
        <footer class="flex-center <?php echo $footer_class; ?>">

                        <div class="flex aligned">
                        <h5>
                    <?php if($this->editmode): ?>
                        <?php if($this->input("HHAFC_Footer_Title2")->isEmpty()): ?>
                                <?= $this->input("HHAFC_Footer_Title2")->setDataFromResource('Split Flanges') ?>
                        <?php else: ?>
                                <?= $this->input("HHAFC_Footer_Title2"); ?>
                        <?php endif; ?>
                <?php else: ?>
                                <?= $this->input("HHAFC_Footer_Title2") ?>
                <?php endif; ?>

                    <span>
                    <?php if($this->editmode): ?>
                        <?php if($this->input("HHAFC_Footer_SubTitle2")->isEmpty()): ?>
                                <?= $this->input("HHAFC_Footer_SubTitle2")->setDataFromResource('Code 61 / Code 62 Clamp Kits') ?>
                        <?php else: ?>
                                <?= $this->input("HHAFC_Footer_SubTitle2"); ?>
                        <?php endif; ?>
                        <?php else: ?>
                                        <?= $this->input("HHAFC_Footer_SubTitle2") ?>
                        <?php endif; ?>

                    </span>
                </h5>


                        </div>
                        <span class="logo">
                        <b>
                <?php if($this->editmode): ?>
                        <?php if($this->input("HHAFC_Logo_Text2")->isEmpty()): ?>
                                <?= $this->input("HHAFC_Logo_Text2")->setDataFromResource('Fittings') ?>
                        <?php else: ?>
                                <?= $this->input("HHAFC_Logo_Text2"); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("HHAFC_Logo_Text2") ?>
                <?php endif; ?>
                </b>
                <img src="<?= $footer_logo_src; ?>">
                        </span>
                </footer>
        </div>

    <article class="container single">
        <header>
            <h2 class="contitech-yellow"><?php echo $this->input("HHAFC_Title"); ?></h2>
            <p><?php echo $this->wysiwyg("HHAFC_Description"); ?></p>
        </header>
        <figure class="margin15 marginBottom30">
            <figcaption class="col-6">
                <h6 class="contitech-yellow"><?php echo $this->input("HHAFC_Sub_Title_1"); ?></h6>
                <ul class="list method ">

                <?php while($this->block("HHAFC_SectionFirst")->loop()) { ?>
                    <li><?php echo $this->input("HHAFC_SectionFirst_".$this->block("HHAFC_SectionFirst")->getCurrent()); ?></li>
                <?php } ?>

                </ul>
                <h6 class="contitech-yellow"><?php echo $this->input("HHAFC_Sub_Title_2"); ?></h6>
                <ul class="list">
                    <?php while($this->block("HHAFC_SectionSecond")->loop()) { ?>
                        <li><?php echo $this->input("HHAFC_SectionSecond_".$this->block("HHAFC_SectionFirst")->getCurrent()); ?></li>
                    <?php } ?>
                </ul>
            </figcaption>
            <span class="img-placeholder">
            <?php
                if($this->editmode)
                {
                        echo $this->image("HHAFC_Image", ["width" => 400, "height" => 300]);
                }
                else{
                        $imgSrcObj =  $this->image("HHAFC_Image");

                        if($imgSrcObj)
                        {
                        ?>
                        <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" height="300" width="400"/>
                        <?php
                        }
                } ?>
            </span>
        </figure>
        <?php

        if($data):
        foreach($data as $md5key => $brand):
        ?>
               <div class="marginBottom30 margin15" >
                    <h3 class="contitech-yellow paddingNo">
                    <?php 

                        if($this->editmode): 
                                if($this->input("HHAFC_BrandName_{$md5key}")->isEmpty()): 
                                echo $this->input("HHAFC_BrandName_{$md5key}")->setDataFromResource($brand['brandName']); 
                                else: 
                                echo $this->input("HHAFC_BrandName_{$md5key}"); 
                                endif; 
                        else:
                                echo $this->input("HHAFC_BrandName_{$md5key}");
                        endif; 
                        
                    ?>
                    </h3>
                    <h3 class="light paddingNo borderBottom">
                    <?php 
                    
                        if($this->editmode): 
                                if($this->wysiwyg("HHAFC_BrandName_Description_{$md5key}")->isEmpty()): 
                                echo $this->wysiwyg("HHAFC_BrandName_Description_{$md5key}")->setDataFromResource($brand['shortDescription']);
                                else: 
                                echo $this->wysiwyg("HHAFC_BrandName_Description_{$md5key}"); 
                                endif; 
                        else:
                                echo $this->wysiwyg("HHAFC_BrandName_Description_{$md5key}");
                        endif; 
                    
                    ?>
                    </h3>
                    <table class="grid special" cellspacing="0" cellpadding="0">
                        <thead>
                                <?php if($iconRequired == 'YES'): ?>
                                        <tr class="sub-head">
                                                <?php foreach($brand['columnsDataWithImages'] as $key => $c1data): ?>
                                                        <?php
                                                                $columnWidth = '';
                                                                $g1count = count($c1data);
                                                                $firstArray = array_shift($c1data);
                                                                if($firstArray['columnWidth'])
                                                                        $columnWidth = "width=".$firstArray['columnWidth']
                                                        ?>
                                                        <td colspan="<?= $g1count; ?>" <?php echo $columnWidth; ?>>
                                                        <?php if($firstArray['columnIcon']): ?>
                                                        <img src="<?= $firstArray['columnIcon'] ?>" width="45" height="45" />
                                                        <?php endif; ?>
                                                        </td>
                                                <?php endforeach; ?>
                                        </tr>
                                <?php endif; ?>

                                <tr class="head">
                                <?php foreach($brand['columnsDataWithImages'] as $key => $c2data): ?>

                                        <?php
                                                $columnWidth = '';
                                                $g2count = count($c2data);
                                                $first2Array = array_shift($c2data);
                                                if($first2Array['columnWidth'])
                                                        $columnWidth = "width=".$first2Array['columnWidth']
                                        ?>
                                        <td colspan="<?= $g2count; ?>"  <?php echo $columnWidth; ?>><?= $first2Array['columnLabel'] ?></td>

                                <?php endforeach; ?>
                                </tr>

                                <?php if($subHeaderRequired == 'YES'): ?>
                                        <tr class="sub-head">
                                                <?php foreach($brand['columnsDataWithImages'] as $key => $c3data): ?>
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
                                <?php foreach($brand['articlesData'] as $key => $element): ?>
                                        <?php if($incrRow%2==0): ?>
                                        <tr>
                                        <?php else: ?>
                                        <tr class="active">
                                        <?php endif; ?>
                                                <?php foreach($element as $ekey => $value): ?>
                                                        <td><?= $value; ?></td>
                                                <?php endforeach; ?>
                                        </tr>
                                        <?php $incrRow++ ?>
                                <?php endforeach; ?>
                        </tbody>
                        </table>
                        <p class="small"><?= $this->input('HHAFC_note' . $md5key, ['placeholder' => 'Enter comment']); ?></p>
               </div>
           <?php
            endforeach;
            endif;
            ?>

    </article>
</div>
</div>
<style>
li .pimcore_tag_input.empty{
    width: 200px;
}
.reverseColor .logo {
    background-color: #ffa500;
    color: #231f20;
}
</style>
