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
        $md5Key = md5($catalogGroupKey);
?>
<div class="template">
<div class="segregate " id="subCover">

    <div id="pageHeader" class="alternate"></div>

        <div class="footer">
                <footer class="flex-center <?php echo $footer_class; ?>">
                        <span class="logo">
                        <b>
                        <?php if($this->editmode): ?>
                                <?php if($this->input("HHSC_Logo_Text1_{$md5Key}")->isEmpty()): ?>
                                        <?= $this->input("HHSC_Logo_Text1_{$md5Key}")->setDataFromResource('Hose') ?>
                                <?php else: ?>
                                        <?= $this->input("HHSC_Logo_Text1_{$md5Key}"); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->input("HHSC_Logo_Text1_{$md5Key}") ?>
                        <?php endif; ?>
                        </b>

                        <img src="<?= $footer_logo_src; ?>">
                        </span>
                        <div class="flex aligned">
                                <h5>
                                        <?php
                                        if($this->editmode)
                                                echo $this->image("HHSC_Footer_Image_{$md5Key}", ["width" => 40]);
                                        else{
                                                $imgSrcObj4 =  $this->image("HHSC_Footer_Image_{$md5Key}");
                                                if($imgSrcObj4)
                                                {
                                                ?>
                                                <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj4,$this->imageWidth); ?>" width="40"/>
                                                <?php
                                                }
                                        }
                                        ?>
                                        <font>
                                        <?php if($this->editmode): ?>
                                                <?php if($this->input("HHSC_Footer_{$md5Key}")->isEmpty()): ?>
                                                        <?= $this->input("HHSC_Footer_{$md5Key}")->setDataFromResource($catalogGroupKey) ?>
                                                <?php else: ?>
                                                        <?= $this->input("HHSC_Footer_{$md5Key}"); ?>
                                                <?php endif; ?>
                                        <?php else: ?>
                                                <?= $this->input("HHSC_Footer_{$md5Key}") ?>
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
                                                echo $this->image("HHSC_Footer_Image1_{$md5Key}", ["width" => 40]);
                                        else{
                                                $imgSrcObj3 =  $this->image("HHSC_Footer_Image1_{$md5Key}");
                                                if($imgSrcObj3)
                                                {
                                                ?>
                                                <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj3,$this->imageWidth); ?>" width="40"/>
                                                <?php
                                                }
                                        }
                                        ?>
                                        <font>
                                        <?php if($this->editmode): ?>
                                                <?php if($this->input("HHSC_Footer1_{$md5Key}")->isEmpty()): ?>
                                                        <?= $this->input("HHSC_Footer1_{$md5Key}")->setDataFromResource($catalogGroupKey) ?>
                                                <?php else: ?>
                                                        <?= $this->input("HHSC_Footer1_{$md5Key}"); ?>
                                                <?php endif; ?>
                                        <?php else: ?>
                                                <?= $this->input("HHSC_Footer1_{$md5Key}") ?>
                                        <?php endif; ?>
                                        </font>
                                </h5>
                        </div>
                        <span class="logo">
                                <b>
                                <?php if($this->editmode): ?>
                                        <?php if($this->input("HHSC_Logo_Text2_{$md5Key}")->isEmpty()): ?>
                                                <?= $this->input("HHSC_Logo_Text2_{$md5Key}")->setDataFromResource('Hose') ?>
                                        <?php else: ?>
                                                <?= $this->input("HHSC_Logo_Text2_{$md5Key}"); ?>
                                        <?php endif; ?>
                                <?php else: ?>
                                        <?= $this->input("HHSC_Logo_Text2_{$md5Key}") ?>
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
                        echo $this->image("HHSC_Image_{$md5Key}");
                else{
                        $imgSrcObj =  $this->image("HHSC_Image_{$md5Key}");
                        if($imgSrcObj)
                        {
                        ?>
                        <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj,$this->imageWidth); ?>"/>
                        <?php
                        }
                }?>
        </header>

        <nav class="marginBottom30">
            <h4><?= $this->input("HHSC_Heading_{$md5Key}"); ?></h4>
        </nav>
        <div class="fullcontainer single">
            <p class="marginBottom30">
            <?= $this->wysiwyg("HHSC_Description_{$md5Key}",["class"=>"marginBottom30"]); ?>
            </p>

            <div class="marginTop30">
                <?php
                if($this->editmode)
                        echo $this->image("HHSC_Title_Image_{$md5Key}");
                else{
                        $imgSrcObj2 =  $this->image("HHSC_Title_Image_{$md5Key}");
                        if($imgSrcObj2)
                        {
                        ?>
                        <img src="<?= $view['catalogTemplatingHelper']->getImageThumbnail($imgSrcObj2,$this->imageWidth); ?>" width="100%"/>
                        <?php
                        }
                }
                ?>
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
                        foreach($catalogGroupData as $md5brandKey => $brandData):
                        ?>

                        <?php if($incr%2==0): ?>
                        <tr class = 'tableNewFont'>
                        <?php else: ?>
                        <tr class="active tableNewFont">
                        <?php endif; ?>
                                <td><b><?= $brandData['brandName']; ?></b></td>
                                <td><?= $this->input("HHSC_Page_{$md5brandKey}") ?></td>
                                <td><?= $brandData['reinforcement']; ?></td>
                                <td><?= $brandData['tubeMaterialAtrributeString']; ?></td>
                                <td><?= $brandData['workingPressurePSIString']; ?></td>
                                <td><?= $brandData['rangeTemperatureF']; ?></td>
                                <td><?= $brandData['fittingFamily']; ?></td>
                                <td><?= $this->input("Construction_Type_{$md5brandKey}")->setDataFromResource($brandData['industryStandard']); ?></td>
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
