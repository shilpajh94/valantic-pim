<?php
if (!isset($this->parentContainer)) {
$this->extend('CatalogBundle:Layouts:layout.html.php');
}
?>
<?php if($this->editmode): ?>
        <?= $this->relation("template_hose_accessories_sleeving", [
                "types" => ["object"],
                "subtypes" => [
                "object" => ["object"]
                ],
                "classes" => ["CatalogTables"],
        ]);
        ?>
<?php endif; ?>
<div class="template">
<section class="segregate">
<div id="pageHeader"></div>
        <span class="pageName">Hydraulic Hose</span>


<div class="footer">
    <footer class="flex-center <?php echo $footer_class; ?>">
 <span class="logo">
            <b>
                <?php if($this->editmode): ?>
                        <?php if($this->input("HHAS_Logo_Text1")->isEmpty()): ?>
                                <?= $this->input("HHAS_Logo_Text1")->setDataFromResource('Hose') ?>
                        <?php else: ?>
                                <?= $this->input("HHAS_Logo_Text1"); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("HHAS_Logo_Text1") ?>
                <?php endif; ?>
                </b>
                <img src="<?= $footer_logo_src; ?>">
    </span>
    <div class="flex aligned">
                    <h5>
                    <?php if($this->editmode): ?>
                        <?php if($this->input("HHAS_Footer_Title1")->isEmpty()): ?>
                                <?= $this->input("HHAS_Footer_Title1")->setDataFromResource('Hose Accessories') ?>
                        <?php else: ?>
                                <?= $this->input("HHAS_Footer_Title1"); ?>
                        <?php endif; ?>
                <?php else: ?>
                                <?= $this->input("HHAS_Footer_Title1") ?>
                <?php endif; ?>

                    <span>
                    <?php if($this->editmode): ?>
                        <?php if($this->input("HHAS_Footer_SubTitle1")->isEmpty()): ?>
                                <?= $this->input("HHAS_Footer_SubTitle1")->setDataFromResource('Protective Sleeving / Protective Wrap') ?>
                        <?php else: ?>
                                <?= $this->input("HHAS_Footer_SubTitle1"); ?>
                        <?php endif; ?>
                        <?php else: ?>
                                        <?= $this->input("HHAS_Footer_SubTitle1") ?>
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
                        <?php if($this->input("HHAS_Footer_Title2")->isEmpty()): ?>
                                <?= $this->input("HHAS_Footer_Title2")->setDataFromResource('Hose Accessories') ?>
                        <?php else: ?>
                                <?= $this->input("HHAS_Footer_Title2"); ?>
                        <?php endif; ?>
                <?php else: ?>
                                <?= $this->input("HHAS_Footer_Title2") ?>
                <?php endif; ?>

                    <span>
                    <?php if($this->editmode): ?>
                        <?php if($this->input("HHAS_Footer_SubTitle2")->isEmpty()): ?>
                                <?= $this->input("HHAS_Footer_SubTitle2")->setDataFromResource('Protective Sleeving / Protective Wrap') ?>
                        <?php else: ?>
                                <?= $this->input("HHAS_Footer_SubTitle2"); ?>
                        <?php endif; ?>
                        <?php else: ?>
                                        <?= $this->input("HHAS_Footer_SubTitle2") ?>
                        <?php endif; ?>

                    </span>
                </h5>
    </div>
   <span class="logo">
                <b>
                <?php if($this->editmode): ?>
                        <?php if($this->input("HHAS_Logo_Text2")->isEmpty()): ?>
                                <?= $this->input("HHAS_Logo_Text2")->setDataFromResource('Hose') ?>
                        <?php else: ?>
                                <?= $this->input("HHAS_Logo_Text2"); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("HHAS_Logo_Text2") ?>
                <?php endif; ?>
                </b>
                <img src="<?= $footer_logo_src; ?>">
        </span>

    </footer>

</div>

<div class="wrapper">
 <article class="container noBorder">
    <section class="content single">
    <?php
        if($data):
        $onlyOneTitle = false;
        foreach($data as $md5key => $brand):
        ?>

       <figure class="justify-between">

           <figcaption>
                <?php if(!$onlyOneTitle): ?>
                <h2>
                <?php
                if ($this->input("HHAS_HeadingRight_{$md5key}")->isEmpty()) {
                        echo $this->input("HHAS_HeadingRight_{$md5key}")->setDataFromResource("Hose Accessories");
                } else {
                        echo $this->input("HHAS_HeadingRight_{$md5key}");
                }
                ?>
                </h2>
                <?php
                $onlyOneTitle = true;
                endif;
                ?>

                <h4 class="contitech-yellow">

                <?php
                        echo $this->input("HHAS_BrandNameRight_{$md5key}")->setDataFromResource($brand['brandName']);
                ?>
                </h4>

                <span>
                <?php
                        echo $this->wysiwyg("HHAS_LongDescriptionRight_{$md5key}")->setDataFromResource($brand['longDescription']);
                ?>
                </span>

                <?php if(!empty(trim($brand['materialString'])) || !empty(trim($brand['colorString'])) || !empty(trim($brand['availableLengthString'])) || (!empty(trim($brand['temperatureRangeFAndC']))) ): ?>
                   <menu>
                   <div class="specs">
                        <h6><?= $this->translate('specs') ?></h6>
                        <div class="spec-requirement">

                           <?php if($brand['safetyFeatures'] || !empty(trim($brand['materialString'])) || (!empty(trim($brand['temperatureRangeFAndC'])))): ?>

                                <?php if ($brand['safetyFeatures']): ?>
                                        <div>
                                        <?php foreach ($brand['safetyFeatures'] as $key => $feature): ?>
                                                <p  class="flex">
                                                <font class="is-highlight"> <?= $feature['name'] ?></font>
                                                </p>
                                        <?php endforeach; ?>

                                        </div>
                                <?php endif; ?>

                            <div>
                                <?php if(!empty(trim($brand['temperatureRangeFAndC']))): ?>
                                <p class="small">
                                        <b><?= $this->translate('Temperature Range') ?></b>
                                        <?= $brand['temperatureRangeFAndC'] ?>
                                </p>
                                <?php endif; ?>
                                <?php if(!empty(trim($brand['materialString']))): ?>
                                        <p class="small">
                                                <b><?= $this->translate('Material') ?></b>
                                                <?= $brand['materialString'] ?>
                                        </p>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty(trim($brand['colorString'])) || !empty(trim($brand['availableLengthString']))): ?>
                            <div>
                                <?php if(!empty(trim($brand['colorString']))): ?>
                                        <p class="small">
                                        <b><?= $this->translate('Color') ?></b>
                                        <?= $brand['colorString'] ?>
                                        </p>
                                <?php endif; ?>
                                <?php if(!empty(trim($brand['availableLengthString']))): ?>
                                        <p class="small">
                                        <b><?= $this->translate('Available Lengths') ?></b>
                                        <?= "Continuous ".$brand['availableLengthString']."' rolls" ?>
                                </p>
                                <?php endif; ?>

                            </div>
                            <?php endif; ?>

                        </div>
                   </div>
</menu>
                   <?php endif; ?>
           </figcaption>
                <?php
                if ($this->editmode) {
                echo $this->image("HHAS_Image_{$md5key}", ["width" => 200, "height" => 200])->setImage($brand['imageObj']);
                } else {
                        if(!$this->image("HHAS_Image_{$md5key}")->isEmpty())
                                $imgSrcObj = $this->image("HHAS_Image_{$md5key}");

                        if($imgSrcObj)
                        {
                        ?>
                        <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" height="200" width="200"/>
                        <?php
                        }
                }
                ?>
       </figure>
       <table class="grid" cellspacing="0" cellpadding="0">
                <thead>
                        <?php if($brand['iconRequired'] == 'YES'): ?>
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

                        <?php if($brand['subHeaderRequired'] == 'YES'): ?>
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

        </table>
        <p class="small"><?= $this->input('HHAS_note_' . $md5key, ['placeholder' => 'Enter comment']); ?></p>
        <?php
        endforeach;
        endif;
        ?>
</section>
    </article>
</div>





</section>

    </div>
