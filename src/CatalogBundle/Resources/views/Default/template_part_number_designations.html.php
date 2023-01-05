<?php
if (!isset($this->parentContainer)) {
    $this->extend('CatalogBundle:Layouts:layout.html.php');
}
?>

<?php if ($this->editmode): ?>
    <?=$this->relations("page_number_designations", [
        "types" => ["object"],
        "subtypes" => [
            "object" => ["object"]
        ],
        "classes" => ["CatalogTables"],
    ]);
    ?>
<?php endif; ?>
<div class="template">
<div>
    <div id="pageHeader"></div>
    <span class="pageName">Hydraulic Hose</span>
    <div class="footer">
        <footer class="flex-center <?php echo $footer_class; ?>">
            <span class="logo">
                <b>
                    <?php if($this->editmode): ?>
                        <?php if($this->input("PBD_Logo_Text1")->isEmpty()): ?>
                                <?= $this->input("PBD_Logo_Text1")->setDataFromResource('Hose') ?>
                        <?php else: ?>
                                <?= $this->input("PBD_Logo_Text1"); ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <?= $this->input("PBD_Logo_Text1") ?>
                    <?php endif; ?>
                </b>
                <img src="<?= $footer_logo_src; ?>">
            </span>
            <div class="flex aligned ">
                <h5>
                <?php if($this->editmode): ?>
                <?php if($this->input("PBD_Title1")->isEmpty()): ?>
                        <?= $this->input("PBD_Title1")->setDataFromResource('General Information') ?>
                <?php else: ?>
                        <?= $this->input("PBD_Title1"); ?>
                <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("PBD_Title1") ?>
                <?php endif; ?>
                
                <span>
                <?php if($this->editmode): ?>
                <?php if($this->input("PBD_SubTitle1")->isEmpty()): ?>
                        <?= $this->input("PBD_SubTitle1")->setDataFromResource('Part Number Designations') ?>
                <?php else: ?>
                        <?= $this->input("PBD_SubTitle1"); ?>
                <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("PBD_SubTitle1") ?>
                <?php endif; ?>
                
                </span>
                </h5>
            </div>
        </footer>
    </div>
    <div class="footer1">
        <footer class="flex-center <?php echo $footer_class; ?>">
            <div class="flex aligned ">
                <h5>
                <?php if($this->editmode): ?>
                <?php if($this->input("PBD_Title2")->isEmpty()): ?>
                        <?= $this->input("PBD_Title2")->setDataFromResource('General Information') ?>
                <?php else: ?>
                        <?= $this->input("PBD_Title2"); ?>
                <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("PBD_Title2") ?>
                <?php endif; ?>
                
                <span>
                <?php if($this->editmode): ?>
                <?php if($this->input("PBD_SubTitle2")->isEmpty()): ?>
                        <?= $this->input("PBD_SubTitle2")->setDataFromResource('Part Number Designations') ?>
                <?php else: ?>
                        <?= $this->input("PBD_SubTitle2"); ?>
                <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("PBD_SubTitle2") ?>
                <?php endif; ?>
                
                </span>
                </h5>
            </div>
            <span class="logo">
                <b>
                    <?php if($this->editmode): ?>
                        <?php if($this->input("PBD_Logo_Text2")->isEmpty()): ?>
                                <?= $this->input("PBD_Logo_Text2")->setDataFromResource('Hose') ?>
                        <?php else: ?>
                                <?= $this->input("PBD_Logo_Text2"); ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <?= $this->input("PBD_Logo_Text2") ?>
                    <?php endif; ?>
                </b>
                <img src="<?= $footer_logo_src; ?>">
            </span>
        </footer>
    </div>

    <div class="wrapper partDesignation">
        <article class="fullcontainer">
            <header class="content partNumber">
                <h3><?= $this->input("PBD_Heading")->setDataFromResource('Part Number Designations') ?></h3>
            </header>
            <?php if ($data): ?>
                <section class="">
                    <table  class="part_number_table" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr class="row top">
                                <td></td>   
                                <td>description</td>     
                                <td>page</td>     
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            
                            foreach ($data as $key => $brandData) {
                                ?>

                                <tr class="row full">
                                    <td colspan="3"><?= $key; ?></td>
                                </tr>


                                <?php
                                $rowcount = 0;
                                foreach ($brandData as $bkey => $brand) {
                                    $md5key = md5($key.$bkey);
                                    ?>
                                    <?php if ((count($brandData) - 1) == $rowcount): ?>
                                        <tr class="row borderLess">
                                        <?php else: ?>
                                        <tr class="row">
                                        <?php endif; ?>
                                        <td>
                                        
                                        <?php 
                                            if($this->editmode): 
                                                if($this->input("PND_FamilyName_{$md5key}")->isEmpty()): 
                                                    echo $this->input("PND_FamilyName_{$md5key}")->setDataFromResource($bkey);
                                                else: 
                                                    echo $this->input("PND_FamilyName_{$md5key}"); 
                                                endif; 
                                            else:
                                                echo $this->input("PND_FamilyName_{$md5key}");
                                            endif; 
                                        ?>
                                        
                                        </td>   
                                        <td>

                                        <?php 
                                            if($this->editmode): 
                                                if($this->input("PND_IndustryStandard_{$md5key}")->isEmpty()): 
                                                    echo $this->input("PND_IndustryStandard_{$md5key}")->setDataFromResource($brand[0]);
                                                else: 
                                                    echo $this->input("PND_IndustryStandard_{$md5key}"); 
                                                endif; 
                                            else:
                                                echo $this->input("PND_IndustryStandard_{$md5key}");
                                            endif; 
                                        ?>

                                        </td>     
                                        <td><?= $this->input("PND_PageNumber_{$md5key}"); ?></td>     
                                    </tr>

                                    <?php
                                    $rowcount++;
                                }
                            }
                            ?>


                        </tbody>
                    </table>
                </section>
            <?php endif; ?>
        </article>
    </div>
</div>
<div class="hide">
    <?php
        $hydraulic_hose_text_list = implode(PHP_EOL, $hydraulic_hose_text);
        $hydraulic_hose_details_text = implode(PHP_EOL, $hydraulic_hose_details);
        echo $this->textarea('hydraulic_hose_details')->setDataFromResource($hydraulic_hose_details_text);
    ?>
</div>
</div>