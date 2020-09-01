<?php
if (!isset($this->parentContainer)) {
    $this->extend('CatalogBundle:Layouts:layout.html.php');
}
?>
<?php if ($this->editmode): ?>
    <?=
    $this->relation("template_hose_accessories_oring", [
        "types" => ["object"],
        "subtypes" => [
            "object" => ["object"]
        ],
        "classes" => ["CatalogTables"],
    ]);
    ?>
<?php endif; ?>
<?php
if ($data):
    extract($data);
    ?> 
    <div class="template">  
        <section class="" id="oRing">
            <div id="pageHeader"></div>
            <span class="pageName">Hydraulic Hose</span>
            <div class="footer">
                <footer class="flex-center <?php echo $footer_class; ?>">
                    <span class="logo">
                        <b>
                        <?php if($this->editmode): ?>
                                <?php if($this->input("HHAO_Logo_Text1")->isEmpty()): ?>
                                        <?= $this->input("HHAO_Logo_Text1")->setDataFromResource('Fittings') ?>
                                <?php else: ?>
                                        <?= $this->input("HHAO_Logo_Text1"); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->input("HHAO_Logo_Text1") ?>
                        <?php endif; ?>
                        </b>
                        <img src="<?= $footer_logo_src; ?>">
                    </span>
                    <div class="flex aligned">

                    <h5>
                    <?php if($this->editmode): ?>
                        <?php if($this->input("HHAO_Footer_Title1")->isEmpty()): ?>
                                <?= $this->input("HHAO_Footer_Title1")->setDataFromResource('Fitting Accessories') ?>
                        <?php else: ?>
                                <?= $this->input("HHAO_Footer_Title1"); ?>
                        <?php endif; ?>
                <?php else: ?>
                                <?= $this->input("HHAO_Footer_Title1") ?>
                <?php endif; ?>
    
                    <span>
                    <?php if($this->editmode): ?>
                        <?php if($this->input("HHAO_Footer_SubTitle1")->isEmpty()): ?>
                                <?= $this->input("HHAO_Footer_SubTitle1")->setDataFromResource('O-Rings') ?>
                        <?php else: ?>
                                <?= $this->input("HHAO_Footer_SubTitle1"); ?>
                        <?php endif; ?>
                        <?php else: ?>
                                        <?= $this->input("HHAO_Footer_SubTitle1") ?>
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
                        <?php if($this->input("HHAO_Footer_Title2")->isEmpty()): ?>
                                <?= $this->input("HHAO_Footer_Title2")->setDataFromResource('Fitting Accessories') ?>
                        <?php else: ?>
                                <?= $this->input("HHAO_Footer_Title2"); ?>
                        <?php endif; ?>
                <?php else: ?>
                                <?= $this->input("HHAO_Footer_Title2") ?>
                <?php endif; ?>
    
                    <span>
                    <?php if($this->editmode): ?>
                        <?php if($this->input("HHAO_Footer_SubTitle2")->isEmpty()): ?>
                                <?= $this->input("HHAO_Footer_SubTitle2")->setDataFromResource('O-Rings') ?>
                        <?php else: ?>
                                <?= $this->input("HHAO_Footer_SubTitle2"); ?>
                        <?php endif; ?>
                        <?php else: ?>
                                        <?= $this->input("HHAO_Footer_SubTitle2") ?>
                        <?php endif; ?>
                    
                    </span>
                </h5>
                    </div>
                    <span class="logo">
                        <b>
                        <?php if($this->editmode): ?>
                                <?php if($this->input("HHAO_Logo_Text2")->isEmpty()): ?>
                                        <?= $this->input("HHAO_Logo_Text2")->setDataFromResource('Fittings') ?>
                                <?php else: ?>
                                        <?= $this->input("HHAO_Logo_Text2"); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->input("HHAO_Logo_Text2") ?>
                        <?php endif; ?>
                        </b>
                        <img src="<?= $footer_logo_src; ?>">
                    </span>
                </footer>
            </div>

            <div class="single">
                <header>
                    <h1 class="oRing">
                        <?php
                        if ($this->input("HHAO_Heading")->isEmpty()) {
                            echo $this->input("HHAO_Heading")->setDataFromResource("Fitting Accessories: O-Rings");
                        } else {
                            echo $this->input("HHAO_Heading");
                        }
                        ?>
                    </h1>
                </header>
                <table cellpadding="0" cellspacing="0" class="orings">
                  
                    <tr>
                        <td valign="top" width="30%">
&nbsp;
                        <div class="description">
                            <?= $this->image("HHAO_Image", ["width" => 200])->setImage($imageObj); ?>
                            <div class="material-desc">
<table cellspacing="0" cellpadding="0">
                                <?php if ($materialString): ?>

 <tr>
  <td valign="top"><?= $this->translate('Material') ?></td>
<td valign="top"><?= $materialString ?></td>
 </tr>

                               <?php endif; ?>
                                <?php if ($hardness): ?>
                                    <tr>
                                        <td valign="top"><?= $this->translate('Hardness') ?> </td>
                                       <td valign="top"> <?= $hardness ?></td>

                                    </tr>
                                <?php endif; ?>
                                <?php if ($tempratureRange): ?>
                                    <tr>
                                        <td valign="top"><?= $this->translate('Temprature Range') ?> </td>
                                     <td valign="top">   <?= $tempratureRange ?></td>
                                    </tr>
                                <?php endif; ?>
</table>
                            </div>
</div>
                        
                        </td>

                        <td width="70%">

                            <?php
                            $tableCount = 0;
                            if ($brandData):
                                foreach ($brandData as $key => $brand):
                                    extract($brand); ?>
                                    <div class="marginBottom50">
                                        <h3 class="contitech-yellow">
                                            <?php echo $this->input("HHAO_BrandName_{$tableCount}")->setDataFromResource($brandName); ?>
                                        </h3>
                                        <table class="grid inh" cellspacing="0" cellpadding="0">
                                            <thead>
                                                <?php if ($iconRequired == 'YES'): ?>
                                                    <tr class="sub-head">
                                                        <?php foreach ($columnsDataWithImages as $key => $columnsData): ?>
                                                            <td><img src="<?= $columnsData['columnIcon'] ?>" width="45" height="45" /></td>
                                                        <?php endforeach; ?>
                                                    </tr>
                                                    <?php endif; ?>
                                                    <tr class="head">
                                                        <?php foreach ($columnsDataWithImages as $key => $columnsData): ?>
                                                            <td><?= $columnsData['columnLabel'] ?></td>
                                                        <?php endforeach; ?>
                                                    </tr>
                                            </thead>      
                                            <?php $incrRow = 1; ?>        
                                            <?php foreach ($articlesData as $key => $element): ?>
                                                    <?php if ($incrRow % 2 == 0): ?>
                                                        <tr>
                                                    <?php else: ?>
                                                        <tr class="active">
                                                    <?php endif; ?>
                                                            <?php foreach ($element as $ekey => $value): ?>
                                                                <td><?= $value; ?></td>
                                                            <?php endforeach; ?>
                                                        </tr>
                                                    <?php $incrRow++ ?>
                                            <?php endforeach; ?>

                                        </table>
                                    </div>
                                    <?php $tableCount++;
                                endforeach;
                            endif; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </section>
    </div>
<?php endif; ?>