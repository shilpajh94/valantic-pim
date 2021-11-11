<?php
if (!isset($this->parentContainer)) {
$this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
}
?>

<?php if($this->editmode): ?>
        <?= $this->relation("cbs_conti_alert", [
                "types" => ["object"],
                "subtypes" => [
                "object" => ["object"]
                ],
                "classes" => ["CSCatalogTables"],
        ]);
        ?>
<?php endif; ?>

<?php if($data): ?>
<div class="wrapper">
        <header id="header">
            <div class="header-sec">
                <div class="header-txt">
                <div class="header-txt"><span class="first-title"><?= $this->translate('header_title') ?></span>
                <span class="second-title">
                    <?= $this->input("ContiA_title",["placeholder" =>"Enter Your  Title"]); ?></span>
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
            <h1 class="orange mb-0">
            <?php if($this->editmode): ?>
                    <?php if($this->input("ContiA_ProductName")->isEmpty()): ?>
                            <?= $this->input("ContiA_ProductName")->setDataFromResource($data['Name']) ?>
                    <?php else: ?>
                            <?= $this->input("ContiA_ProductName"); ?>
                    <?php endif; ?>
            <?php else: ?>
                    <?= $this->input("ContiA_ProductName") ?>
            <?php endif; ?>
            </h1>

            <h2 class="d-flex sub-title" style="justify-content: space-between; align-items:center; padding-bottom:0px;">
                <?php if($this->editmode): ?>
                        <?php if($this->input("ContiA_TitleTagSlogan")->isEmpty()): ?>
                                <?= $this->input("ContiA_TitleTagSlogan")->setDataFromResource($data['ProductClaimSlogan']) ?>
                        <?php else: ?>
                                <?= $this->input("ContiA_TitleTagSlogan"); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("ContiA_TitleTagSlogan") ?>
                <?php endif; ?>
            
                <?php
                        if($this->editmode)
                        {
                            ?>
                            <?php
                            if($this->image("ContiA_Product_Image")->isEmpty())
                            {
                                echo $this->image("ContiA_Product_Image")->setImage($data['ProductImage']);
                            }
                            else{
                                echo $this->image("ContiA_Product_Image");
                            }
                            ?>
                            <?php
                            
                        }
                        else
                        {
                            $ContiAProductImageObj =  $this->image("ContiA_Product_Image");
                            if($ContiAProductImageObj)
                            {
                            ?>
                            <img src="<?= $ContiAProductImageObj->getThumbnail('catalog_thumb'); ?>" alt="" style="width:200px" />
                            <?php
                            }
                        }
                    ?>
                    
                    </h2>

                
                
            <div class="feature-benefit-list">
                    <?php if($this->editmode): ?>
                            <p>
                            <?php if($this->wysiwyg("ContiA_ShortText")->isEmpty()): ?>
                                    <?= $this->wysiwyg("ContiA_ShortText")->setDataFromResource($data['ShortText']) ?>
                            <?php else: ?>
                                    <?= $this->wysiwyg("ContiA_ShortText"); ?>
                            <?php endif; ?>
                            </p>
                    <?php else: ?>
                        <?php if(!$this->wysiwyg("ContiA_ShortText")->isEmpty()): ?>
                                <p>
                                <?= $this->wysiwyg("ContiA_ShortText") ?>
                                </p>
                        <?php endif; ?>
                    <?php endif; ?>
                  
            </div>
            <div class="feature-benefit-list">
                
                <div class="table">
                    <table width="100%">
                        <thead>
                            <tr>
                                <?php if($data['Material']){ ?>
                                    <th width="30%" class="orange"><?= $this->translate('CS_Material_Label') ?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr valign="top">
                                <?php if($data['Material']){ ?>
                                    <td>
                                        <?= $data['Material'] ?>                                        
                                    </td>
                                <?php } ?>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
            <?php 
                    if($this->editmode)
                    {
                        ?>
                        <div class="full-image-sec">
                            <?php
                                if($this->image("ContiA_BannerImage")->isEmpty())
                                {
                                    echo $this->image("ContiA_BannerImage")->setImage($data['ApplicationImage']);
                                }
                                else{
                                    echo $this->image("ContiA_BannerImage");
                                }
                            ?>
                        </div>
                        <?php
                    }
                    else
                    {
                        $ppBannerImgSrcObj =  $this->image("ContiA_BannerImage");
                        if($ppBannerImgSrcObj)
                        {
                        ?>
                        <div class="full-image-sec">
                            <img src="<?= $ppBannerImgSrcObj->getThumbnail('catalog_thumb'); ?>" alt=""/>
                        </div>
                        <?php
                        }
                    }
            ?>

<h2>
                <span class="orange">
                <?php if($this->editmode): ?>
                        <?php if($this->input("ContiA_MoreInfoHeading")->isEmpty()): ?>
                                <?= $this->input("ContiA_MoreInfoHeading")->setDataFromResource($data['Name']) ?>
                        <?php else: ?>
                                <?= $this->input("ContiA_MoreInfoHeading"); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("ContiA_MoreInfoHeading") ?>
                <?php endif; ?>
                
                
                </span> 
<span class="light-black">
                <?php if($this->editmode): ?>
                        <?php if($this->input("ContiA_MoreInfo")->isEmpty()): ?>
                                <?= $this->input("ContiA_MoreInfo", ['placeholder'=>'Belt Information']) ?>
                        <?php else: ?>
                                <?= $this->input("ContiA_MoreInfo"); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("ContiA_MoreInfo") ?>
                <?php endif; ?>
                </span>
                </h2>

                <p><b>
                    <?php if($this->editmode): ?>
                            <?php if($this->input("ContiA_BeltSpecsLabel")->isEmpty()): ?>
                                    <?= $this->input("ContiA_BeltSpecsLabel", ['placeholder'=>'Belt Specs']) ?>
                            <?php else: ?>
                                    <?= $this->input("ContiA_BeltSpecsLabel"); ?>
                            <?php endif; ?>
                    <?php else: ?>
                            <?= $this->input("ContiA_BeltSpecsLabel") ?>
                    <?php endif; ?>
                
            
                </b>
                <br />

                    <?php if($this->editmode): ?>
                            <?php if($this->input("ContiA_BeltSpecsDescription")->isEmpty()): ?>
                                    <?= $this->input("ContiA_BeltSpecsDescription", ['placeholder'=>'Belt Specs Description']) ?>
                            <?php else: ?>
                                    <?= $this->input("ContiA_BeltSpecsDescription"); ?>
                            <?php endif; ?>
                    <?php else: ?>
                            <?= $this->input("ContiA_BeltSpecsDescription") ?>
                    <?php endif; ?>
                </p>
                <div class="feature-benefit-list">
                    <div class="media" style="margin: 5px 0px;">
                        <?php
                        if($this->editmode)
                        {
                            ?>
                                <?php
                                    if($this->image("ContiA_feature1")->isEmpty())
                                    {
                                        echo $this->image("ContiA_feature1");
                                    }
                                    else{
                                        echo $this->image("ContiA_feature1");
                                    }
                                ?>
                            <?php
                        }
                        else
                        {
                            $ContiA_feature1Obj =  $this->image("ContiA_feature1");
                            if($ContiA_feature1Obj)
                            {
                            ?>
                                <img src="<?= $ContiA_feature1Obj->getThumbnail('catalog_thumb'); ?>" class="features-images"  alt=""/>
                            <?php
                            }
                        }
                        ?>
                        
                        <div class="media-body">
                            <p><b>
                            <?php if($this->editmode): ?>
                                    <?php if($this->input("ContiA_Feature1Label")->isEmpty()): ?>
                                            <?= $this->input("ContiA_Feature1Label", ['placeholder'=>'Feature 1 Label']) ?>
                                    <?php else: ?>
                                            <?= $this->input("ContiA_Feature1Label"); ?>
                                    <?php endif; ?>
                            <?php else: ?>
                                    <?= $this->input("ContiA_Feature1Label") ?>
                            <?php endif; ?>
                            </b> <br />
                                <?php if($this->editmode): ?>
                                        <?php if($this->input("ContiA_Feature1Desc")->isEmpty()): ?>
                                                <?= $this->input("ContiA_Feature1Desc", ['placeholder'=>'Feature 1 Desc']) ?>
                                        <?php else: ?>
                                                <?= $this->input("ContiA_Feature1Desc"); ?>
                                        <?php endif; ?>
                                <?php else: ?>
                                        <?= $this->input("ContiA_Feature1Desc") ?>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                    <div class="media" style="margin: 5px 0px;">

                        <?php
                        if($this->editmode)
                        {
                            ?>
                                <?php
                                    if($this->image("ContiA_feature2")->isEmpty())
                                    {
                                        echo $this->image("ContiA_feature2");
                                    }
                                    else{
                                        echo $this->image("ContiA_feature2");
                                    }
                                ?>
                            <?php
                        }
                        else
                        {
                            $ContiA_feature2Obj =  $this->image("ContiA_feature2");
                            if($ContiA_feature2Obj)
                            {
                            ?>
                                <img src="<?= $ContiA_feature2Obj->getThumbnail('catalog_thumb'); ?>" class="features-images"  alt=""/>
                            <?php
                            }
                        }
                        ?>

                        <div class="media-body">
                        <p><b>
                            <?php if($this->editmode): ?>
                                    <?php if($this->input("ContiA_Feature2Label")->isEmpty()): ?>
                                            <?= $this->input("ContiA_Feature2Label", ['placeholder'=>'Feature 2 Label']) ?>
                                    <?php else: ?>
                                            <?= $this->input("ContiA_Feature2Label"); ?>
                                    <?php endif; ?>
                            <?php else: ?>
                                    <?= $this->input("ContiA_Feature2Label") ?>
                            <?php endif; ?>
                            </b> <br />
                                <?php if($this->editmode): ?>
                                        <?php if($this->input("ContiA_Feature2Desc")->isEmpty()): ?>
                                                <?= $this->input("ContiA_Feature2Desc", ['placeholder'=>'Feature 2 Desc']) ?>
                                        <?php else: ?>
                                                <?= $this->input("ContiA_Feature2Desc"); ?>
                                        <?php endif; ?>
                                <?php else: ?>
                                        <?= $this->input("ContiA_Feature2Desc") ?>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>

                <p>
                    <b>

                    <?php if($this->editmode): ?>
                            <?php if($this->input("ContiA_AvailabilityLabel")->isEmpty()): ?>
                                    <?= $this->input("ContiA_AvailabilityLabel", ['placeholder'=>'CONTI®Alert Availability']) ?>
                            <?php else: ?>
                                    <?= $this->input("ContiA_AvailabilityLabel"); ?>
                            <?php endif; ?>
                    <?php else: ?>
                            <?= $this->input("ContiA_AvailabilityLabel") ?>
                    <?php endif; ?>
            
                    </b><br />

                    <?php if($this->editmode): ?>
                            <?php if($this->input("ContiA_AvailabilityDesc")->isEmpty()): ?>
                                    <?= $this->input("ContiA_AvailabilityDesc", ['placeholder'=>'CONTI®Alert Availability Description']) ?>
                            <?php else: ?>
                                    <?= $this->input("ContiA_AvailabilityDesc"); ?>
                            <?php endif; ?>
                    <?php else: ?>
                            <?= $this->input("ContiA_AvailabilityDesc") ?>
                    <?php endif; ?>
                </p>

	    </section>
        </main>
        <footer id="footer" class="footer">
            <div class="footer-logo">
            <img src="<?= $footer_logo_src; ?>" alt="" width="150">
            </div>
        </footer>
    
</div>
<?php endif; ?>