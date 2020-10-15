<?php
if (!isset($this->parentContainer)) {
$this->extend('CatalogBundle:Layouts:layout.html.php');
}
?>

<?php if($this->editmode): ?>
        <?= $this->relation("template_hose_product_page", [
                "types" => ["object"],
                "subtypes" => [
                "object" => ["object"]
                ],
                "classes" => ["CatalogTables"],
        ]);
        ?>
<?php endif; ?>

<?php
if($data):
foreach($data as $catalogGroupKey => $catalogGroupData):
?>
<div class="template">
<div class="segregate " id="subCover">

    <div id="pageHeader" class="alternate"></div>

        <div class="footer">
                <footer class="flex-center <?php echo $footer_class; ?>">
                        <span class="logo">
                        <b>
                        <?php if($this->editmode): ?>
                                <?php if($this->input("HHSC_Logo_Text1")->isEmpty()): ?>
                                        <?= $this->input("HHSC_Logo_Text1")->setDataFromResource('Hose') ?>
                                <?php else: ?>
                                        <?= $this->input("HHSC_Logo_Text1"); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->input("HHSC_Logo_Text1") ?>
                        <?php endif; ?>
                        </b>

                        <img src="<?= $footer_logo_src; ?>">
                        </span>
                        <div class="flex aligned">
                                <h5>
                                        <?php
                                        if($this->editmode)
                                                echo $this->image("HHSC_Footer_Image", ["width" => 40]);
                                        else{
                                                $imgSrcObj4 =  $this->image("HHSC_Footer_Image");
                                                if($imgSrcObj4)
                                                {
                                                ?>
                                                <img src="<?= $imgSrcObj4->getThumbnail('catalog_thumb'); ?>" width="40"/>
                                                <?php
                                                }
                                        }
                                        ?>
                                        <font>
                                        <?php if($this->editmode): ?>
                                                <?php if($this->input("HHSC_Footer")->isEmpty()): ?>
                                                        <?= $this->input("HHSC_Footer")->setDataFromResource($catalogGroupKey) ?>
                                                <?php else: ?>
                                                        <?= $this->input("HHSC_Footer"); ?>
                                                <?php endif; ?>
                                        <?php else: ?>
                                                <?= $this->input("HHSC_Footer") ?>
                                        <?php endif; ?>
                                        </font>
                                </h5>

                        </div>
                </footer>
        </div>

        <div class="footer1">
                <footer class="flex-center <?php echo $footer_class; ?>">
                        <div class="flex aligned">
                                <h5>
                                        <?php
                                        if($this->editmode)
                                                echo $this->image("HHSC_Footer_Image1", ["width" => 40]);
                                        else{
                                                $imgSrcObj3 =  $this->image("HHSC_Footer_Image1");
                                                if($imgSrcObj3)
                                                {
                                                ?>
                                                <img src="<?= $imgSrcObj3->getThumbnail('catalog_thumb'); ?>" width="40"/>
                                                <?php
                                                }
                                        }
                                        ?>
                                        <font>
                                        <?php if($this->editmode): ?>
                                                <?php if($this->input("HHSC_Footer1")->isEmpty()): ?>
                                                        <?= $this->input("HHSC_Footer1")->setDataFromResource($catalogGroupKey) ?>
                                                <?php else: ?>
                                                        <?= $this->input("HHSC_Footer1"); ?>
                                                <?php endif; ?>
                                        <?php else: ?>
                                                <?= $this->input("HHSC_Footer1") ?>
                                        <?php endif; ?>
                                        </font>
                                </h5>
                        </div>
                        <span class="logo">
                                <b>
                                <?php if($this->editmode): ?>
                                        <?php if($this->input("HHSC_Logo_Text2")->isEmpty()): ?>
                                                <?= $this->input("HHSC_Logo_Text2")->setDataFromResource('Hose') ?>
                                        <?php else: ?>
                                                <?= $this->input("HHSC_Logo_Text2"); ?>
                                        <?php endif; ?>
                                <?php else: ?>
                                        <?= $this->input("HHSC_Logo_Text2") ?>
                                <?php endif; ?>
                                </b>
                                <img src="<?= $footer_logo_src; ?>">
                        </span>
                </footer>
        </div>

    <article class="containerAll noBorder coverPage">
        <header class="dark ">
                <?php
                if($this->editmode)
                        echo $this->image("HHSC_Image");
                else{
                        $imgSrcObj =  $this->image("HHSC_Image");
                        if($imgSrcObj)
                        {
                        ?>
                        <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>"/>
                        <?php
                        }
                }?>
        </header>

        <nav class="marginBottom30">
            <h4><?= $this->input("HHSC_Heading"); ?></h4>
        </nav>
        <div class="fullcontainer single">
            <p class="marginBottom30">
            <?= $this->wysiwyg("HHSC_Description",["class"=>"marginBottom30"]); ?>
            </p>

            <div class="bg marginTop30">
                        <span>
                        <?php
                        if($this->editmode)
                                echo $this->image("HHSC_Title_Image", ["width" => 50]);
                        else{
                                $imgSrcObj2 =  $this->image("HHSC_Title_Image");
                                if($imgSrcObj2)
                                {
                                ?>
                                <img src="<?= $imgSrcObj2->getThumbnail('catalog_thumb'); ?>" width="50"/>
                                <?php
                                }
                        }
                        ?>
                        </span>
                        <h3>
                        <?php if($this->editmode): ?>
                                <?php if($this->input("HHSC_Title")->isEmpty()): ?>
                                        <?= $this->input("HHSC_Title")->setDataFromResource($catalogGroupKey) ?>
                                <?php else: ?>
                                        <?= $this->input("HHSC_Title"); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->input("HHSC_Title") ?>
                        <?php endif; ?>
                        </h3>
            </div>
            <table cellspacing="0" cellpadding="0" class="grid">
                   <thead>
                    <tr class="head noBorder">
                           <td></td>
                            <td><?= $this->translate('Page') ?></td>
                            <td><?= $this->translate('Construction') ?></td>
                            <td><?= $this->translate('Inner Tube') ?></td>
                            <td><?= $this->translate('Working Pressure (psi)') ?></td>
                            <td><?= $this->translate('Temperature Range') ?></td>
                            <td><?= $this->translate('Fitting Series') ?></td>
                            <td><?= $this->translate('Approvals') ?></td>
                            <td><?= $this->translate('Packaging') ?></td>
                    </tr>
                    </thead>
                    <?php
                        if($data):
                        $incr = 1;
                        foreach($catalogGroupData as $brandName => $brandData):
                        ?>

                        <?php if($incr%2==0): ?>
                        <tr>
                        <?php else: ?>
                        <tr class="active">
                        <?php endif; ?>

                                <td><b><?= $brandData['brandName']; ?></b></td>
                                <td><?= $this->input("HHSC_Page_{$incr}") ?></td>
                                <td><?= $brandData['reinforcement']; ?></td>
                                <td><?= $brandData['tubeMaterialAtrributeString']; ?></td>
                                <td><?= $brandData['workingPressurePSIString']; ?></td>
                                <td><?= $brandData['temperatureRangeFAndC']; ?></td>
                                <td><?= $brandData['fittingFamily']; ?></td>
                                <td><?= $brandData['industryStandard']; ?></td>
                                <td><?= $brandData['CatalogPackaging']; ?></td>
                        </tr>

                        <?php
                        $incr++;
                        endforeach;
                        endif;
                        ?>

            </table>

        </div>

    </article>

</div>

<?php
endforeach;
endif;
?>
</div>
