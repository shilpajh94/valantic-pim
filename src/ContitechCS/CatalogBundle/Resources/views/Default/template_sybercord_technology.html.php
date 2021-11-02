<?php
     if (!isset($this->parentContainer)) {
    $this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
    }
?>
<?php if($this->editmode): ?>
<?= $this->relation("cbs_template_sybercord_technology_construction_page", [
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
            <div class="header-txt"><strong>Conveying Solutions</strong>
                <?= $this->input("ST_title",["placeholder" =>"Enter Your  Title"]); ?></div>
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
            <h2 class="d-flex sub-title" style="justify-content: space-between;">
                <?php if($this->editmode): ?>
                <?php if($this->textarea("ST_ProductClaimSlogan")->isEmpty()): ?>
                <?= $this->textarea("ST_ProductClaimSlogan")->setDataFromResource($data['ProductClaimSlogan']) ?>
                <?php else: ?>
                <?= $this->textarea("ST_ProductClaimSlogan"); ?>
                <?php endif; ?>
                <?php else: ?>
                <?= $this->textarea("ST_ProductClaimSlogan") ?>
                <?php endif; ?>

                <?php
                if($this->editmode)
                    {
                        if($this->image("ST_LogoImage")->isEmpty())
                            {
                                echo $this->image("ST_LogoImage")->setImage($data['LogoImage']);
                            }        
                            else{
                                echo $this->image("ST_LogoImage");
                                }
                            }
                            else
                                {
                                $CSSImgSrcObj =  $this->image("ST_LogoImage");
                                    if($CSSImgSrcObj)
                                    {
                                    ?>
                <img src=" <?= $CSSImgSrcObj->getThumbnail('catalog_thumb'); ?>" alt=""
                    style="margin-right: 22px; margin-bottom: 0px;" width="200" />
                <?php
                                    }
                                }
                ?>
            </h2>



            <div class="environment-quality-sec">

                <div class="media">
                    <div class="media-body pr-4">
                        <p>
                            <?php if($this->editmode): ?>
                            <?php if($this->textarea("ST_ShortText")->isEmpty()): ?>
                            <?= $this->textarea("ST_ShortText")->setDataFromResource($data['ShortText']) ?>
                            <?php else: ?>
                            <?= $this->textarea("ST_ShortText"); ?>
                            <?php endif; ?>
                            <?php else: ?>
                            <?= $this->textarea("ST_ShortText") ?>
                            <?php endif; ?>
                        </p>


                        <?php
                        if($this->editmode)
                            {
                            if($this->image("ST_ProductImage")->isEmpty())
                                {
                                    echo $this->image("ST_ProductImage")->setImage($data['ProductImage']);
                                }
                                else{
                                    echo $this->image("ST_ProductImage");
                                    }
                                }
                                else{
                                    $CSSImgSrcObj =  $this->image("ST_ProductImage");
                                    if($CSSImgSrcObj)
                                        {
                                            ?>
                        <img src="<?= $CSSImgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" class="w-100" />
                        <?php
                                        }
                                    }
                        ?>
                        </p>
                    </div>
                    <?php
                    if($this->editmode)
                        {
                            if($this->image("ST_ApplicationImage")->isEmpty())
                                {
                                    echo $this->image("ST_ApplicationImage")->setImage($data['ApplicationImage']);
                                }        
                                else{
                                    echo $this->image("ST_ApplicationImage");
                                    }
                                }
                                else
                                    {
                                    $CSSImgSrcObj =  $this->image("ST_ApplicationImage");
                                        if($CSSImgSrcObj)
                                        {
                                        ?>
                    <img src=" <?= $CSSImgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" class="features-images"
                        width="200" />
                    <?php
                                        }
                                    }
                                ?>
                </div>
            </div>


            <div class="feature-benefit-list">
                <h3 class="black-bold">
                    <?= $this->input("ST_advantage_heading",["placeholder" => "Enter Your  Heading"]); ?></h3>
                <ul>
                    <?php 
                        foreach ($data['Features'] as $key => $item) {
                            ?>
                    <li><span class="orange">›</span> <?= $item ?></li>
                    <?php
                        }
                    ?>
                </ul>
            </div>


            <div class="colum-2 p-0">
                <div class="feature-benefit-list my-0">
                    <h3><?= $this->input("ST_application_heading",["placeholder" => "Enter Your  Heading"]); ?></h3>
                    <ul>
                        <li><span class="orange">›</span>
                            <?php if($this->editmode): ?>
                            <?php if($this->input("application_points")->isEmpty()): ?>
                            <?= $this->input("application_points")->setDataFromResource($data['CSProductApplications']) ?>
                            <?php else: ?>
                            <?= $this->input("application_points"); ?>
                            <?php endif; ?>
                            <?php else: ?>
                            <?= $this->input("application_points") ?>
                            <?php endif; ?>
                        </li>
                    </ul>

                    <div class="nexcolumtarget">
                        <h3><?= $this->input("ST_product_range_heading",["placeholder" => "Enter Your  Heading"]); ?>
                        </h3>
                        <ul>
                            <li><span
                                    class="orange">›</span><?= $this->input("ST_product_range_content",["placeholder" => "Enter Your Points"]); ?>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </section>
    </main>
</div>
<?php endif; ?>