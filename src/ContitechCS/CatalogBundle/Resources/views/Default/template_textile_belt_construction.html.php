<?php
    if (!isset($this->parentContainer)) {
        $this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
    }
?>
<?php if($this->editmode): ?>
<?= $this->relation("cbs_template_textile_belt_services_page", [
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
            <div class="header-txt"><span class="first-title"><?= $this->translate('header_title') ?></span>
                <span class="second-title">
                    <?= $this->input("TBS_title",["placeholder" =>"Enter Your  Title"]); ?></span>
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
                    <?php endif; ?></h1>

                <p class="p-medium"><?php if($this->editmode): ?>
                    <?php if($this->textarea("TBS_ProductClaimSlogan")->isEmpty()): ?>
                    <?= $this->textarea("TBS_ProductClaimSlogan")->setDataFromResource($data['ProductClaimSlogan']) ?>
                    <?php else: ?>
                    <?= $this->textarea("TBS_ProductClaimSlogan"); ?>
                    <?php endif; ?>
                    <?php else: ?>
                    <?= $this->textarea("TBS_ProductClaimSlogan") ?>
                    <?php endif; ?> </p>

                <div class="colum-2 p-0 mb-5">
                    <p>
                        <?php if($this->editmode): ?>
                        <?php if($this->wysiwyg("TBS_ShortText")->isEmpty()): ?>
                        <?= $this->wysiwyg("TBS_ShortText")->setDataFromResource($data['ShortText']) ?>
                        <?php else: ?>
                        <?= $this->wysiwyg("TBS_ShortText"); ?>
                        <?php endif; ?>
                        <?php else: ?>
                        <?= $this->wysiwyg("TBS_ShortText") ?>
                        <?php endif; ?>
                    </p>
                </div>

                <h2 class="orange mb-4"><?= $this->input("TBS_Header_title",["placeholder" =>"Enter Your  Heading"]); ?></h2>

                <?php
                        if($this->editmode)
                            {
                                if($this->image("TBS_ProductImage")->isEmpty())
                                    {
                                        echo $this->image("TBS_ProductImage")->setImage($data['ProductImage']);
                                    }
                                    else{
                                        echo $this->image("TBS_ProductImage");
                                    }
                                }
                                else
                                {
                                    $CSSImgSrcObj =  $this->image("TBS_ProductImage");
                                    if($CSSImgSrcObj)
                                    {
                                    ?>
                <img src="<?= $CSSImgSrcObj->getThumbnail('catalog_thumb'); ?>" class="mb-4" alt="" />
                <?php
                                    }
                                }
                            ?>

                <h2 class="orange mb-0"><?= $this->input("BNE_Header_title",["placeholder" =>"Enter Your  Heading"]); ?>
                </h2>

                <?php
                        if($this->editmode)
                            {
                                if($this->image("TBS_ApplicationImage")->isEmpty())
                                    {
                                        echo $this->image("TBS_ApplicationImage")->setImage($data['ApplicationImage']);
                                    }
                                    else{
                                        echo $this->image("TBS_ApplicationImage");
                                    }
                                }
                                else
                                {
                                    $CSSImgSrcObj =  $this->image("TBS_ApplicationImage");
                                    if($CSSImgSrcObj)
                                    {
                                    ?>
                <img src="<?= $CSSImgSrcObj->getThumbnail('catalog_thumb'); ?>" class="w-100 mb-4" alt="" />
                <?php
                                    }
                                }
                            ?>

                <h1 class="orange"><?= $this->input("TBA_Header_title",["placeholder" =>"Enter Your  Heading"]); ?></h1>

                <div class="table-data textile-table">
                    <?= $this->area('myArea', ['type' => 'textile-belt-applications-areabrick']); ?>
                </div>

                <h3 class="mt-4"><?= $this->input("Example_Header",["placeholder" =>"Enter Your  ExampleTagLine"]); ?>
                </h3>

                <div class="table process-table">
                    <?= $this->area('myArea2', ['type' => 'example-of-aggregate-areabrick','params' =>
                        [
                            'example-of-aggregate-areabrick' => [
                                'data' => $data
                            ]
                        ]
                    ]); ?>
                </div>

                <p class="note"><?= $this->textarea("Note",["placeholder" =>"Enter Your  Note"]); ?></p>

            </section>
        </main>
</div>
<?php endif; ?>