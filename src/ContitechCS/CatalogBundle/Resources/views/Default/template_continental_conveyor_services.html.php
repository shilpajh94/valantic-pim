<?php
if (!isset($this->parentContainer)) {
$this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
}
?>
<?php if($this->editmode): ?>
    <?= $this->relation("cbs_template_belt_services_page", [
            "types" => ["object"],
            "subtypes" => [
            "object" => ["object"]
            ],
            "classes" => ["CSCatalogCategory"],
    ]);
    ?>
<?php endif; ?>
<?php if($data): ?>
<div class="wrapper">
    <header id="header">
        <div class="header-sec">
            <div class="header-txt"><b>Conveying Solutions</b></div>
            <div class="print-pg-no"></div>
        </div>
    </header>
    <!-- <footer id="footer" >
            <div class="footer-logo"><img src="images/continental_logo.png" alt="" /></div>
        </footer> -->
    <main id="content" role="main">
        <section class="fortressxp-belts">
            <h1 class="orange">

                <?php if($this->editmode): ?>
                <?php if($this->input("CCS_Name")->isEmpty()): ?>
                <?= $this->input("CCS_Name")->setDataFromResource($data['Name']) ?>
                <?php else: ?>
                <?= $this->input("CCS_Name"); ?>
                <?php endif; ?>
                <?php else: ?>
                <?= $this->input("CCS_Name") ?>
                <?php endif; ?>

                <span class="sub-title">
                    <?php if($this->editmode): ?>
                    <?php if($this->input("CCS_ProductClaimSlogan")->isEmpty()): ?>
                    <?= $this->input("CCS_ProductClaimSlogan")->setDataFromResource($data['ProductClaimSlogan']) ?>
                    <?php else: ?>
                    <?= $this->input("CCS_ProductClaimSlogan"); ?>
                    <?php endif; ?>
                    <?php else: ?>
                    <?= $this->input("CCS_ProductClaimSlogan") ?>
                    <?php endif; ?>

                </span>

            </h1>

            <p class="p-medium">

                <?php if($this->editmode): ?>
                <?php if($this->textarea("CSS_ShortText")->isEmpty()): ?>
                <?= $this->textarea("CSS_ShortText")->setDataFromResource($data['ShortText']) ?>
                <?php else: ?>
                <?= $this->textarea("CSS_ShortText"); ?>
                <?php endif; ?>
                <?php else: ?>
                <?= $this->textarea("CSS_ShortText") ?>
                <?php endif; ?>
            </p>

            <div class="features-benefit-sec ccs-service">
                <?php if($data['childrenData']) {
                    foreach ($data['childrenData'] as $key => $child) {

                    ?>
                <div class="media">
                    <?php
                                if($this->editmode)
                                {
                                    if($this->image("CSS_Images_{$key}")->isEmpty())
                                    {
                                        echo $this->image("CSS_Images_{$key}")->setImage($child['ProductImage']);
                                    }
                                    else{
                                        echo $this->image("CSS_Images_{$key}");
                                    }
                                }
                                else
                                {
                                    $CSSImgSrcObj =  $this->image("CSS_Images_{$key}");
                                    if($CSSImgSrcObj)
                                    {
                                    ?>
                    <img src="<?= $CSSImgSrcObj->getThumbnail('catalog_thumb'); ?>" class="features-images" alt="" />
                    <?php
                                    }
                                }
                            ?>

                    <div class="media-body">
                        <h2 class="orange">
                            <?php if($this->editmode): ?>
                            <?php if($this->input("CSS_Name_{$key}")->isEmpty()): ?>
                            <?= $this->input("CSS_Name_{$key}")->setDataFromResource($child['Name']) ?>
                            <?php else: ?>
                            <?= $this->input("CSS_Name_{$key}"); ?>
                            <?php endif; ?>
                            <?php else: ?>
                            <?= $this->input("CSS_Name_{$key}") ?>
                            <?php endif; ?>
                        </h2>
                        <p>
                            <?php if($this->editmode): ?>
                            <?php if($this->input("CSS_LongText_{$key}")->isEmpty()): ?>
                            <?= $this->input("CSS_LongText_{$key}")->setDataFromResource($child['LongText']) ?>
                            <?php else: ?>
                            <?= $this->input("CSS_LongText_{$key}"); ?>
                            <?php endif; ?>
                            <?php else: ?>
                            <?= $this->input("CSS_LongText_{$key}") ?>
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
                <?php
                    }
                } ?>


            </div>

        </section>
    </main>
    <footer id="footer1">
        <div class="footer-logo"><img src="images/continental_logo.png" alt="" /></div>
    </footer>

</div>
<?php endif; ?>