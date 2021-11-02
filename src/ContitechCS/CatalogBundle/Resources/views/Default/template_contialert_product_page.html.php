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
            <div class="header-txt"><strong>
            
            <?php if($this->editmode): ?>
                    <?php if($this->input("ContiA_HierarchyNameLevel1")->isEmpty()): ?>
                            <?= $this->input("ContiA_HierarchyNameLevel1")->setDataFromResource($data['HierarchyNameLevel1']) ?>
                    <?php else: ?>
                            <?= $this->input("ContiA_HierarchyNameLevel1"); ?>
                    <?php endif; ?>
            <?php else: ?>
                    <?= $this->input("ContiA_HierarchyNameLevel1") ?>
            <?php endif; ?>
            
            </strong> 
        </div>
            <div class="print-pg-no"></div>
        </div>
    </header>
    
    <main id="content" role="main">
        <section class="fortressxp-belts">
            <h1 class="orange">
            
            <strong>
            <?php if($this->editmode): ?>
                    <?php if($this->input("ContiA_ProductName")->isEmpty()): ?>
                            <?= $this->input("ContiA_ProductName")->setDataFromResource($data['Name']) ?>
                    <?php else: ?>
                            <?= $this->input("ContiA_ProductName"); ?>
                    <?php endif; ?>
            <?php else: ?>
                    <?= $this->input("ContiA_ProductName") ?>
            <?php endif; ?>
            
            
            </strong>
            
            </h1>

            <span class="sub-title">
                <?php if($this->editmode): ?>
                        <?php if($this->input("ContiA_TitleTagSlogan")->isEmpty()): ?>
                                <?= $this->input("ContiA_TitleTagSlogan")->setDataFromResource($data['ProductClaimSlogan']) ?>
                        <?php else: ?>
                                <?= $this->input("ContiA_TitleTagSlogan"); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("ContiA_TitleTagSlogan") ?>
                <?php endif; ?>
            
            </span>

                
                
            <div class="media pt-0">
                    <?php if($this->editmode): ?>
                        <div class="media-body">
                            <p>
                            <?php if($this->wysiwyg("ContiA_ShortText")->isEmpty()): ?>
                                    <?= $this->wysiwyg("ContiA_ShortText")->setDataFromResource($data['ShortText']) ?>
                            <?php else: ?>
                                    <?= $this->wysiwyg("ContiA_ShortText"); ?>
                            <?php endif; ?>
                            </p>
                        </div>
                    <?php else: ?>
                        <?php if(!$this->wysiwyg("ContiA_ShortText")->isEmpty()): ?>
                            <div class="media-body">
                                <p>
                                <?= $this->wysiwyg("ContiA_ShortText") ?>
                                </p>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php
                        if($this->editmode)
                        {
                            ?>
                            <div class="seal-image">
                            <?php
                            if($this->image("ContiA_Product_Image")->isEmpty())
                            {
                                echo $this->image("ContiA_Product_Image")->setImage($data['ProductImage']);
                            }
                            else{
                                echo $this->image("ContiA_Product_Image");
                            }
                            ?>
                            </div>
                            <?php
                            
                        }
                        else
                        {
                            $ContiAProductImageObj =  $this->image("ContiA_Product_Image");
                            if($ContiAProductImageObj)
                            {
                            ?>
                            <div class="seal-image">
                            <img src="<?= $ContiAProductImageObj->getThumbnail('catalog_thumb'); ?>" alt=""/>
                            </div>
                            <?php
                            }
                        }
                    ?>
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

            
            <div class="components-sec">
                <div class="media">
                    <div class="media-img">
                        <?php 

                            if($this->editmode)
                            {
                                ?>
                                <div class="seal-image">
                                <?php
                                if($this->image("ContiA_FrictionImage")->isEmpty())
                                {
                                    echo $this->image("ContiA_FrictionImage")->setImage($data['reportImage']);
                                }
                                else{
                                    echo $this->image("ContiA_FrictionImage");
                                }
                                ?>
                                </div>
                                <?php
                                
                            }
                            else
                            {
                                $ContiA_FrictionImageObj =  $this->image("ContiA_FrictionImage");
                                if($ContiA_FrictionImageObj)
                                {
                                ?>
                                <img src="<?= $ContiA_FrictionImageObj->getThumbnail('catalog_thumb'); ?>" alt=""/>
                                <?php
                                }
                            }
                            
                        ?>
                    </div>

                    <div class="media-body">
                        <h3><?= $this->input("ContiA_CoeficientofFrictionLabel", ['placeholder'=>'Coeficient of Friction Text']) ?></h3>
                        <ul class="components">
                            <?php while($this->block("ContiA_Friction_Points")->loop()) { ?>
                                <li><?= $this->input("CCF_points", ['placeholder' => 'Enter comment']) ?></p1>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
	    </section>
        </main>
        <footer id="footer" class="footer">
            <div class="footer-logo">
            <img src="<?= $footer_logo_src; ?>" alt="" width="150">
            </div>
        </footer>
    
</div>
<?php endif; ?>