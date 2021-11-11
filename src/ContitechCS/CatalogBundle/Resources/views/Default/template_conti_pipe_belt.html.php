<?php
if (!isset($this->parentContainer)) {
$this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
}
?>
<?php if($this->editmode): ?>
        <?= $this->relation("cbs_conti_pipe_belt", [
                "types" => ["object"],
                "subtypes" => [
                "object" => ["object"]
                ],
                "classes" => ["CSCatalogTables"],
        ]);
        ?>
<?php endif; ?>
<?php if($data): ?>
    <?php 

    $parentProductData = $data['parentProductData'];
    $childProductData = $data['childProductData'];
    ?>
    <div class="wrapper">
        <header id="header">
            <div class="header-sec">
                <div class="header-txt">
                    <b>
                        <?php if($this->editmode): ?>
                                <?php if($this->input("CPB_HierarchyNameLevel1")->isEmpty()): ?>
                                        <?= $this->input("CPB_HierarchyNameLevel1")->setDataFromResource($parentProductData['HierarchyNameLevel1']) ?>
                                <?php else: ?>
                                        <?= $this->input("CPB_HierarchyNameLevel1"); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->input("CPB_HierarchyNameLevel1") ?>
                        <?php endif; ?>
                    </b>
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
                            <?php if($this->input("CPBParent_ProductName")->isEmpty()): ?>
                                    <?= $this->input("CPBParent_ProductName")->setDataFromResource($parentProductData['Name']) ?>
                            <?php else: ?>
                                    <?= $this->input("CPBParent_ProductName"); ?>
                            <?php endif; ?>
                    <?php else: ?>
                            <?= $this->input("CPBParent_ProductName") ?>
                    <?php endif; ?>
                
                    <span class="sub-title">
                        <?php if($this->editmode): ?>
                                <?php if($this->input("CPBParent_ProductClaimSlogan")->isEmpty()): ?>
                                        <?= $this->input("CPBParent_ProductClaimSlogan")->setDataFromResource($parentProductData['ProductClaimSlogan']) ?>
                                <?php else: ?>
                                        <?= $this->input("CPBParent_ProductClaimSlogan"); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->input("CPBParent_ProductClaimSlogan") ?>
                        <?php endif; ?>
                    
                    </span>
                </h1>
                
                <p>
                    <?php if($this->editmode): ?>
                            <?php if($this->wysiwyg("CPBParent_ShortText")->isEmpty()): ?>
                                    <?= $this->wysiwyg("CPBParent_ShortText")->setDataFromResource($parentProductData['ShortText']) ?>
                            <?php else: ?>
                                    <?= $this->wysiwyg("CPBParent_ShortText"); ?>
                            <?php endif; ?>
                    <?php else: ?>
                            <?= $this->wysiwyg("CPBParent_ShortText") ?>
                    <?php endif; ?>
                </p>

                <?php if($parentProductData['Applications']): ?>
                <div class="table">
                    <table width="100%">
                        <thead>
                            <tr>
                                <th class="orange" colspan="3"><?= $this->translate('CS_Typical_Applications_Label') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr valign="top">

                                <?php 
                                $applications = $parentProductData['Applications'];

                                $chunk_app = array_chunk($applications,5);

                                foreach($chunk_app as $arr)
                                {
                                    ?>
                                        <td>
                                            <ul>
                                                <?php
                                                  foreach($arr as $val)
                                                  {
                                                    ?>
                                                        <li>
                                                            <span class="orange">›</span>
                                                            <?= $val;?>
                                                        <li>
                                                    <?php
                                                  }  
                                                ?>
                                            </ul>
                                        </td>   
                                    <?php
                                }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>


                <h3 class="orange">
                    <?php if($this->editmode): ?>
                            <?php if($this->input("CPBParentConveyor_Belt_Components_Label")->isEmpty()): ?>
                                    <?= $this->input("CPBParentConveyor_Belt_Components_Label",['placeholder'=>'Conveyor Belt Components']) ?>
                            <?php else: ?>
                                    <?= $this->input("CPBParentConveyor_Belt_Components_Label"); ?>
                            <?php endif; ?>
                    <?php else: ?>
                            <?= $this->input("CPBParentConveyor_Belt_Components_Label") ?>
                    <?php endif; ?>
                    
                </h3>

                <?php
                    if($this->editmode)
                    {
                        if($this->image("CPBParent_ProductImage")->isEmpty())
                        {
                            echo $this->image("CPBParent_ProductImage")->setImage($parentProductData['ProductImage']);
                        }
                        else{
                            echo $this->image("CPBParent_ProductImage");
                        }
                    }
                    else
                    {
                        $CPBParent_ProductImageObj =  $this->image("CPBParent_ProductImage");
                        if($CPBParent_ProductImageObj->getThumbnail('catalog_thumb'))
                        {
                        ?>
                        <img src="<?= $CPBParent_ProductImageObj->getThumbnail('catalog_thumb'); ?>" alt="" width="280">
                        <?php
                        }
                    }
                ?>

                <h2>
                    <span class="orange">
                        <?php if($this->editmode): ?>
                                <?php if($this->input("CPBChild_ProductNameBeltInfo")->isEmpty()): ?>
                                        <?= $this->input("CPBChild_ProductNameBeltInfo")->setDataFromResource($childProductData['Name']) ?>
                                <?php else: ?>
                                        <?= $this->input("CPBChild_ProductNameBeltInfo"); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->input("CPBChild_ProductNameBeltInfo") ?>
                        <?php endif; ?>
                    </span> 
                    
                    <?php if($this->editmode): ?>
                            <?php if($this->input("CPBChild_BeltInfoLabel")->isEmpty()): ?>
                                    <?= $this->input("CPBChild_BeltInfoLabel",['placeholder'=>'Belt Information']) ?>
                            <?php else: ?>
                                    <?= $this->input("CPBChild_BeltInfoLabel"); ?>
                            <?php endif; ?>
                    <?php else: ?>
                            <?= $this->input("CPBChild_BeltInfoLabel") ?>
                    <?php endif; ?>
            
                </h2>

                <h3 class="orange mb-0">
                    <?php if($this->editmode): ?>
                            <?php if($this->input("CPBChild_ProductClaimSlogan")->isEmpty()): ?>
                                    <?= $this->input("CPBChild_ProductClaimSlogan")->setDataFromResource($childProductData['ProductClaimSlogan']) ?>
                            <?php else: ?>
                                    <?= $this->input("CPBChild_ProductClaimSlogan"); ?>
                            <?php endif; ?>
                    <?php else: ?>
                            <?= $this->input("CPBChild_ProductClaimSlogan") ?>
                    <?php endif; ?>
                </h3>
                <p>
                    
                    <?php if($this->editmode): ?>
                            <?php if($this->wysiwyg("CPBChild_ShortText")->isEmpty()): ?>
                                    <?= $this->wysiwyg("CPBChild_ShortText")->setDataFromResource($childProductData['ShortText']) ?>
                            <?php else: ?>
                                    <?= $this->wysiwyg("CPBChild_ShortText"); ?>
                            <?php endif; ?>
                    <?php else: ?>
                            <?= $this->wysiwyg("CPBChild_ShortText") ?>
                    <?php endif; ?> 
                </p>


                <div class="feature-benefit-list">

                    <?php if($this->editmode): ?>
                        <?php if($this->wysiwyg("CPBChild_Benefits")->isEmpty()): ?>
                                <?= $this->wysiwyg("CPBChild_Benefits")->setDataFromResource($childProductData['Benefits']) ?>
                        <?php else: ?>
                                <?= $this->wysiwyg("CPBChild_Benefits"); ?>
                        <?php endif; ?>
                    <?php else: ?>
                            <?= $this->wysiwyg("CPBChild_Benefits") ?>
                    <?php endif; ?>
                </div>
                
                <?php
                    if($this->editmode)
                    {
                        if($this->image("CPBChild_ProductImage")->isEmpty())
                        {
                            echo $this->image("CPBChild_ProductImage")->setImage($parentProductData['ProductImage']);
                        }
                        else{
                            echo $this->image("CPBChild_ProductImage");
                        }
                    }
                    else
                    {
                        $CPBChild_ProductImageObj =  $this->image("CPBChild_ProductImage");
                        if($CPBChild_ProductImageObj->getThumbnail('catalog_thumb'))
                        {
                        ?>
                        <img src="<?= $CPBChild_ProductImageObj->getThumbnail('catalog_thumb'); ?>" alt="" width="280">
                        <?php
                        }
                    }
                ?>

                <div class="belts-information">
                    <h3>ContiPipe™ and MegaPipe® Sizes</h3>
                    <div class="table-data contipipe-table w-80">
                        <table width="100%">
                            <thead>
                                <tr align="left" class="orange-bg">
                                    <th colspan="10">&nbsp;</th>
                                </tr>
                                <tr class="grey-bg">
                                    <th colspan="2">Diameter</th>
                                    <th colspan="2">Belt Width</th>
                                    <th colspan="2">Type</th>
                                </tr>
                                <tr>
                                    <th width="16.5%">in.</th>
                                    <th width="16.5%">mm</th>
                                    <th width="16.5%">in.</th>
                                    <th width="16.5%">mm</th>
                                    <th width="16.5%">Fabric</th>
                                    <th width="16.5%">Steel</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr align="center">
                                    <td>5.9</td>
                                    <td>150</td>
                                    <td>23.6</td>
                                    <td>600</td>
                                    <td>•</td>
                                    <td></td>
                                </tr>
                                <tr align="center">
                                    <td>5.9</td>
                                    <td>150</td>
                                    <td>23.6</td>
                                    <td>600</td>
                                    <td>•</td>
                                    <td></td>
                                </tr>
                                <tr align="center">
                                    <td>5.9</td>
                                    <td>150</td>
                                    <td>23.6</td>
                                    <td>600</td>
                                    <td>•</td>
                                    <td></td>
                                </tr>
                                <tr align="center">
                                    <td>5.9</td>
                                    <td>150</td>
                                    <td>23.6</td>
                                    <td>600</td>
                                    <td>•</td>
                                    <td>•</td>
                                </tr>
                                <tr align="center">
                                    <td>5.9</td>
                                    <td>150</td>
                                    <td>23.6</td>
                                    <td>600</td>
                                    <td>•</td>
                                    <td>•</td>
                                </tr>
                                <tr align="center">
                                    <td>5.9</td>
                                    <td>150</td>
                                    <td>23.6</td>
                                    <td>600</td>
                                    <td>•</td>
                                    <td>•</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <p class="note w-80">
                    <?php if($this->editmode): ?>
                        <?php if($this->input("CPBChild_Note")->isEmpty()): ?>
                                <?= $this->input("CPBChild_Note",['placeholder'=>'notes']) ?>
                        <?php else: ?>
                                <?= $this->input("CPBChild_Note"); ?>
                        <?php endif; ?>
                    <?php else: ?>
                            <?= $this->input("CPBChild_Note") ?>
                    <?php endif; ?>
                    </p>
                </div>
            </section>

        </main>
    </div>
<?php endif; ?>