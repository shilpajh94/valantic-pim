<?php
    if (!isset($this->parentContainer)) {
        $this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
    }
?>
<?php if($this->editmode): ?>
<?= $this->relation("cbs_template_steelcord_belt_construction_page", [
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
    <div class="wrapper">
        <header id="header">
            <div class="header-sec">
                <div class="header-txt"><span class="first-title"><?= $this->translate('CS_header_title') ?></span>
                    <span class="second-title">
                        <?= $this->input("STBC_title",["placeholder" =>"Enter Your  Title"]); ?></span>
                </div>
                <div class="print-pg-no"></div>
            </div>
        </header>
        <footer id="footer" class="footer">
            <div class="footer-logo">
                <img src="<?= $footer_logo_src; ?>" alt="" width="150">
            </div>
        </footer>
        <main id="content" role="main">
            <section class="fortressxp-belts">
                <h1 class="orange">
                    <?php if($this->editmode): ?>
                    <?php if($this->input("Header_title")->isEmpty()): ?>
                    <?= $this->input("Header_title")->setDataFromResource($data['Name']) ?>
                    <?php else: ?>
                    <?= $this->input("Header_title"); ?>
                    <?php endif; ?>
                    <?php else: ?>
                    <?= $this->input("Header_title") ?>
                    <?php endif; ?>
                </h1>

                <p class="p-medium">
                    <?php if($this->editmode): ?>
                    <?php if($this->textarea("SCB_ProductClaimSlogan")->isEmpty()): ?>
                    <?= $this->textarea("SCB_ProductClaimSlogan")->setDataFromResource($data['ProductClaimSlogan']) ?>
                    <?php else: ?>
                    <?= $this->textarea("SCB_ProductClaimSlogan"); ?>
                    <?php endif; ?>
                    <?php else: ?>
                    <?= $this->textarea("SCB_ProductClaimSlogan") ?>
                    <?php endif; ?>
                </p>

                <p>
                    <?php if($this->editmode): ?>
                    <?php if($this->wysiwyg("SCB_ShortText")->isEmpty()): ?>
                    <?= $this->wysiwyg("SCB_ShortText")->setDataFromResource($data['ShortText']) ?>
                    <?php else: ?>
                    <?= $this->wysiwyg("SCB_ShortText"); ?>
                    <?php endif; ?>
                    <?php else: ?>
                    <?= $this->wysiwyg("SCB_ShortText") ?>
                    <?php endif; ?>
                </p>


                <h3 class="orange fnt20 my-4">
                    <?= $this->input("SubHeading_title",["placeholder" => "Enter Your  SubHeading"]); ?></h3>

                <?php
                    if($this->editmode)
                        {
                            if($this->image("SCB_ProductImage")->isEmpty())
                                {
                                    echo $this->image("SCB_ProductImage")->setImage($data['ProductImage']);
                                }
                                else{
                                    echo $this->image("SCB_ProductImage");
                                }
                            }
                            else
                            {
                                $CSSImgSrcObj =  $this->image("SCB_ProductImage");
                                if($CSSImgSrcObj)
                                {
                                ?>
                <img src="<?= $CSSImgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" class="w-100 mb-5" />
                <?php
                                }
                            }
                        ?>
                <h3 class="orange fnt20 mb-0">
                    <?= $this->input("SubHeading_title2",["placeholder" =>"Enter Your  SubHeading"]); ?>
                </h3>

                <?php
            if($this->editmode)
                {
                    if($this->image("SCB_ApplicationImage")->isEmpty())
                        {
                            echo $this->image("SCB_ApplicationImage")->setImage($data['ApplicationImage']);
                        }        
                        else{
                            echo $this->image("SCB_ApplicationImage");
                            }
                        }
                        else
                            {
                            $CSSImgSrcObj =  $this->image("SCB_ApplicationImage");
                                if($CSSImgSrcObj)
                                {
                                ?>
                <img src=" <?= $CSSImgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" class="mb-4" />
                <?php
                                }
                            }
                        ?>
                <div class="page-break"></div>
                <h2 class="orange mb-0"><?= $this->input("PPFB_title",["placeholder" =>"Enter Your  Heading"]); ?>

                    <span
                        class="sub-title"><?= $this->input("PPFB_SubHeading",["placeholder" =>"Enter Your  SubHeading"]); ?>
                    </span>
                </h2>


                <p class="p-medium">
                    <?= $this->input("PPFB_Content",["placeholder" =>"Enter Your  SubHeading"]); ?>
                </p>


                <h3 class="my-4"><?= $this->input("PPFB_Slogan",["placeholder" =>"Enter Your  Slogan"]); ?></h3>

                <h3 class="orange mb-0"><?= $this->input("ZGSC_title",["placeholder" =>"Enter Your  Heading"]);?> </h3>

                <p> <?= $this->wysiwyg("ZGSC_Content",["placeholder" =>"Enter Your  Description"]); ?></p>


                <h3 class="orange mb-0"><?= $this->input("ZGSC2_title",["placeholder" =>"Enter Your  Heading"]);?> </h3>

                <p><?= $this->wysiwyg("ZGSC2_Content",["placeholder" =>"Enter Your  Description"]); ?></p>

                <h3 class="orange mb-0"><?= $this->input("ORBC_title",["placeholder" =>"Enter Your  Heading"]);?> </h3>

                <p><?= $this->wysiwyg("ORBC_Content",["placeholder" =>"Enter Your  Description"]); ?> </p>

                <h3 class="my-4"><?= $this->input("BHE_title",["placeholder" => "Enter Your  Heading"]);?></h3>

                <h3 class="orange"><?= $this->input("PPSB_title",["placeholder" =>"Enter Your  Heading"]);?></h3>

                <p> <?= $this->wysiwyg("PPSB_Content",["placeholder" =>"Enter Your  Description"]); ?></p>

                <h3 class="orange"><?= $this->input("FSSMO_title",["placeholder" =>"Enter Your  Heading"]);?></h3>

                <p> <?= $this->wysiwyg("FSSMO_Content",["placeholder" =>"Enter Your  Description"]); ?> </p>
            </section>
        </main>
    </div>
    <?php endif; ?>