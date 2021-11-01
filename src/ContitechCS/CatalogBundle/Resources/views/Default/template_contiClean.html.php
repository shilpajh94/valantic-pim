<?php
if (!isset($this->parentContainer)) {
$this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
}
?>

<?php if($this->editmode): ?>
        <?= $this->relation("cbs_conti_clean", [
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
                    <?php if($this->input("ContiC_HierarchyNameLevel1")->isEmpty()): ?>
                            <?= $this->input("ContiC_HierarchyNameLevel1")->setDataFromResource($data['HierarchyNameLevel1']) ?>
                    <?php else: ?>
                            <?= $this->input("ContiC_HierarchyNameLevel1"); ?>
                    <?php endif; ?>
            <?php else: ?>
                    <?= $this->input("ContiC_HierarchyNameLevel1") ?>
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
                    <?php if($this->input("ContiC_ProductName")->isEmpty()): ?>
                            <?= $this->input("ContiC_ProductName")->setDataFromResource($data['Name']) ?>
                    <?php else: ?>
                            <?= $this->input("ContiC_ProductName"); ?>
                    <?php endif; ?>
            <?php else: ?>
                    <?= $this->input("ContiC_ProductName") ?>
            <?php endif; ?>
            
            
            </strong>
            
            </h1>

            <span class="sub-title">
                <?php if($this->editmode): ?>
                        <?php if($this->input("ContiC_TitleTagSlogan")->isEmpty()): ?>
                                <?= $this->input("ContiC_TitleTagSlogan")->setDataFromResource($data['ProductClaimSlogan']) ?>
                        <?php else: ?>
                                <?= $this->input("ContiC_TitleTagSlogan"); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("ContiC_TitleTagSlogan") ?>
                <?php endif; ?>
            
            </span>

                
                
            <div class="media pt-0">
                    <?php if($this->editmode): ?>
                        <div class="media-body">
                            <p>
                            <?php if($this->wysiwyg("ContiC_ShortText")->isEmpty()): ?>
                                    <?= $this->wysiwyg("ContiC_ShortText")->setDataFromResource($data['ShortText']) ?>
                            <?php else: ?>
                                    <?= $this->wysiwyg("ContiC_ShortText"); ?>
                            <?php endif; ?>
                            </p>
                        </div>
                    <?php else: ?>
                        <?php if(!$this->wysiwyg("ContiC_ShortText")->isEmpty()): ?>
                            <div class="media-body">
                                <p>
                                <?= $this->wysiwyg("ContiC_ShortText") ?>
                                </p>
                            </div>
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
                                if($this->image("ContiC_BannerImage")->isEmpty())
                                {
                                    echo $this->image("ContiC_BannerImage")->setImage($data['ApplicationImage']);
                                }
                                else{
                                    echo $this->image("ContiC_BannerImage");
                                }
                            ?>
                        </div>
                        <?php
                    }
                    else
                    {
                        $ppBannerImgSrcObj =  $this->image("ContiC_BannerImage");
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
            <h3 class="orange">
                            <?= $this->input("ContiC_BenefitsLabel", ['placeholder'=>'ContiClean® Benefits']) ?>
                </h3>
            <div class="feature-benefit-list">
                
                <ul>
                    <?php 
                        foreach ($data['Benefits'] as $key => $item) {
                            ?>
                                <li><span class="orange">›</span> <?= $item ?></li>
                            <?php
                        }
                    ?>
                </ul>
            </div>
            <div class="components-sec">
                <div class="media">
                    <div class="media-img">
                        <?php 

                            if($this->editmode)
                            {
                                ?>
                                <div class="seal-image">
                                <?php
                                if($this->image("ContiC_FrictionImage")->isEmpty())
                                {
                                    echo $this->image("ContiC_FrictionImage")->setImage($data['reportImage']);
                                }
                                else{
                                    echo $this->image("ContiC_FrictionImage");
                                }
                                ?>
                                </div>
                                <?php
                                
                            }
                            else
                            {
                                $ContiC_FrictionImageObj =  $this->image("ContiC_FrictionImage");
                                if($ContiC_FrictionImageObj)
                                {
                                ?>
                                <img src="<?= $ContiC_FrictionImageObj->getThumbnail('catalog_thumb'); ?>" alt=""/>
                                <?php
                                }
                            }
                            
                        ?>
                    </div>

                    <div class="media-body">
                        <h3><?= $this->input("ContiC_CoeficientofFrictionLabel", ['placeholder'=>'Coeficient of Friction Text']) ?></h3>
                        <ul class="components">
                            <?php while($this->block("ContiC_Friction_Points")->loop()) { ?>
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