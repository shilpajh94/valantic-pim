<?php
if (!isset($this->parentContainer)) {
$this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
}
?>

<?php if($this->editmode): ?>
        <?= $this->relation("cbs_template_product_page", [
                "types" => ["object"],
                "subtypes" => [
                "object" => ["object"]
                ],
                "classes" => ["CSCatalogTables"],
        ]);
        ?>
<?php endif; ?>
<div class="wrapper">
        <header id="header">
            <div class="header-sec">
                <div><strong>Conveying Solutions</strong> 
                <?php if($this->editmode): ?>
                        <?php if($this->input("PP_HierarchyNameLevel2")->isEmpty()): ?>
                                <?= $this->input("PP_HierarchyNameLevel2")->setDataFromResource($data['HierarchyNameLevel2']) ?>
                        <?php else: ?>
                                <?= $this->input("PP_HierarchyNameLevel2"); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("PP_HierarchyNameLevel2") ?>
                <?php endif; ?>
            </div>
                <div class="print-pg-no"></div>
            </div>
        </header>
        <?php 
            //p_r($data);
        ?>
        <main id="content" role="main">
            <section class="fortressxp-belts">
                <h1 class="orange">
                
                <strong>
                

                <?php if($this->editmode): ?>
                        <?php if($this->input("PP_ProductName")->isEmpty()): ?>
                                <?= $this->input("PP_ProductName")->setDataFromResource($data['ProductName']) ?>
                        <?php else: ?>
                                <?= $this->input("PP_ProductName"); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("PP_ProductName") ?>
                <?php endif; ?>
                
                
                </strong>
                    <span class="sub-title">TexSteel® Will Take You There</span>
                    <!-- span tag add accroding to page 55 -->
                </h1>

                <p>
                
                <?php if($this->editmode): ?>
                        <?php if($this->input("PP_ShortText")->isEmpty()): ?>
                                <?= $this->input("PP_ShortText")->setDataFromResource($data['ShortText']) ?>
                        <?php else: ?>
                                <?= $this->input("PP_ShortText"); ?>
                        <?php endif; ?>
                <?php else: ?>
                        <?= $this->input("PP_ShortText") ?>
                <?php endif; ?>

                </p>

                <div class="media pt-0">
                    <div class="media-body">
                        <p>

                        <?php if($this->editmode): ?>
                                <?php if($this->input("PP_LongText")->isEmpty()): ?>
                                        <?= $this->input("PP_LongText")->setDataFromResource($data['LongText']) ?>
                                <?php else: ?>
                                        <?= $this->input("PP_LongText"); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->input("PP_LongText") ?>
                        <?php endif; ?>
                        
                        </p>
                    </div>
                    <div class="seal-image"><img src="/static/cbs/images/woodsawyer.jpg" alt=""></div>
                </div>

                <div class="feature-benefit-list">
                    <h3><span class="orange"><strong>CONTI<sup>®</sup> Titan</strong></span> Features and Benefits</h3>
                    <!-- <p>CONTI<sup>®</sup> Titan is available in operating tensions up to 1500 PIW in 2-ply design.
                        Combined with one of Continental’s
                        high-performance covers, CONTI® Titan will provide the lowest cost of ownership in demanding
                        applications.</p> -->

                    <ul>
                        <li><span class="orange">›</span> High-strength with exceptional dimensional stability</li>
                        <li><span class="orange">›</span> Rip and tear resistance that is 2-3 times that of conventional
                            conveyor belting</li>
                        <li><span class="orange">›</span> Impact resistance that far exceeds conventional conveyor
                            belting
                        </li>
                        <li><span class="orange">›</span> Outstanding puncture resistance
                        </li>
                        <li><span class="orange">›</span> Excellent flexibility and load support
                        </li>
                    </ul>
                    <p>CONTI<sup>®</sup> Titan is available in operating tensions up to 1500 PIW in 2-ply design.
                        Combined with one of Continental’s
                        high-performance covers, CONTI® Titan will provide the lowest cost of ownership in demanding
                        applications.</p>

                    <!-- <h3><strong>Designed for Extreme Environments </strong></h3>
                        <p>Phoenix Phoenocord® conveyor belts are available up to a breaking strength of 10,000 N/mm and a width of 3,200 mm.
                            Belts can be manufactured in lengths weighing up to an incredible 60 metric tons. With decades of experience and
                            outstanding research and development, Phoenix Phoenocord® belts have been proven to handle the most extreme
                            conveyor belt applications. </p> -->

                </div>
                <?php if($data['IsApplicationAvailable'] && $data['IsMarketsAvailable']){ ?>


                <div class="table">
                    <table width="100%">
                        <thead>
                            <tr>
                                <?php if($data['IsMarketsAvailable']){ ?>
                                    <th width="30%" class="orange">Markets</th>
                                <?php } ?>

                                <?php if($data['IsApplicationAvailable']){ ?>
                                    <th width="30%" class="orange">Applications</th>
                                <?php } ?>

                                <th width="30%" class="orange">Cover Compounds</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr valign="top">
                                <?php if($data['IsMarketsAvailable']){ ?>
                                    <td>
                                        <?= $data['Markets'] ?>                                        
                                    </td>
                                <?php } ?>
                                <?php if($data['IsApplicationAvailable']){ ?>
                                    <td>
                                        <?= $data['Applications'] ?>
                                    </td>
                                <?php } ?>

                                <td>
                                    <ul>
                                        <li><span class="orange">›</span> Monster Hide® Series</li>
                                        <li><span class="orange">›</span> Stacker® Series</li>
                                        <li><span class="orange">›</span> Solar-Shield® Classic</li>
                                    </ul>
                                    <p class="details"><?= $this->input("PP_CoverCompoundComment", ['placeholder' => 'Enter comment']) ?></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="note">
                    <?= $this->input("PP_ApplicationComment", ['placeholder' => 'Enter comment']) ?>
                    </p>
                </div>

                <?php } ?>

                <div class="components-sec">
                    <h2 class="orange">Fortified with the Power of Fortress™ Technology <br />
                        Conveyor Belt Components</h2>
                    <div class="media">
                        <div class="media-img"><img src="/static/cbs/images/image2.jpg" alt="" class=""></div>
                        <div class="media-body">
                            <ul class="components">
                                <li>Dual-Layer Twill Weave Design.
                                </li>
                                <li>Fabric technology advancements
                                    for improved yarn design and increased yarn strength.</li>
                                <li>More abuse-resistant fabric design
                                    to reduce catastrophic failures.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="labels">
                    <table width="100%">
                        <tr>
                            <th>Get a lower cost-per-ton conveyed</th>
                            <th class="orange-bg">Tension Range: 330 – 1500 PIW</th>
                        </tr>
                    </table>
                </div>

            <?php if($data['IsFeaturesAndBenefitAvailable']){ ?>
            <section class="features-benefit-sec">
                <h1>
                    <span class="orange">
                        <strong>

                        <?php if($this->editmode): ?>
                                <?php if($this->input("PP_FeatureText")->isEmpty()): ?>
                                        <?= $this->input("PP_FeatureText")->setDataFromResource($data['ProductName']) ?>
                                <?php else: ?>
                                        <?= $this->input("PP_FeatureText"); ?>
                                <?php endif; ?>
                        <?php else: ?>
                                <?= $this->input("PP_FeatureText") ?>
                        <?php endif; ?>
                        
                        </strong>
                    </span>
                    
                    <?php if($this->input("PP_FeaturesBeneFit")->isEmpty()): ?>
                            <?= $this->input("PP_FeaturesBeneFit")->setDataFromResource('Features and Benefits') ?>
                    <?php else: ?>
                            <?= $this->input("PP_FeaturesBeneFit"); ?>
                    <?php endif; ?>
                
                </h1>

                <?php if($data['FeaturesAndBenefits']) { 
                    foreach ($data['FeaturesAndBenefits'] as $fkey => $feature) {
                        $md5FeatureNameKey = $feature['FeatureName'];
                    ?>
                        <div class="media">

                            <?php
                                if($feature['FeatureImage'])
                                {
                                ?>
                                <img src="<?= $feature['FeatureImage']->getThumbnail('catalog_thumb'); ?>" class="features-images" alt="">
                                <?php
                                }
                            ?>
                            
                            <div class="media-body">
                                <h2 class="orange">
                                    <?= $feature['FeatureName']; ?>
                                </h2>
                                <p>
                                    <?= $feature['FeatureDescription']; ?>
                                </p>
                            </div>
                        </div>
                <?php 
                    }
                } ?>
            </section>
            <?php } ?>
            <div class="page-break"></div>
            <section class="belts-information">
                <h1><span class="orange"><strong>Fortress XP™</strong></span> Belt Information</h1>
                <h3><strong>Fortress XP™ Conveyor Belt Data</strong></h3>
                <div class="table-data">
                    <table width="100%">
                        <thead>
                            <tr align="left" class="orange-bg">
                                <th colspan="10">Imperial</th>
                            </tr>
                            <tr class="grey-bg">
                                <th align="left" width="21.1%">Fortress XP™</th>
                                <th>330/1</th>
                                <th>440/1</th>
                                <th>500/1</th>
                                <th>625/1</th>
                                <th>660/2</th>
                                <th>880/2</th>
                                <th>1000/2</th>
                                <th>1250/2</th>
                                <th>1500/2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td align="left">Number of Plies</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                            </tr>
                            <tr align="center">
                                <td align="left">Fabric Type*</td>
                                <td>P/N/N</td>
                                <td>P/N/N</td>
                                <td>P/N/N</td>
                                <td>P/N/N</td>
                                <td>P/N/N</td>
                                <td>P/N/N</td>
                                <td>P/N/N</td>
                                <td>P/N/N</td>
                                <td>P/N/N</td>
                            </tr>
                            <tr align="center">
                                <td align="left">Vulcanized & Fastener Rating (PIW)</td>
                                <td>330</td>
                                <td>440</td>
                                <td>500</td>
                                <td>625</td>
                                <td>660</td>
                                <td>880</td>
                                <td>1000</td>
                                <td>1250</td>
                                <td>1500</td>
                            </tr>
                            <tr align="center">
                                <td align="left">Nominal Carcass
                                    Gauge (in.) </td>
                                <td>0.130</td>
                                <td>0.151</td>
                                <td>0.164</td>
                                <td>0.181</td>
                                <td>0.280</td>
                                <td>0.329</td>
                                <td>0.357</td>
                                <td>0.389</td>
                                <td>0.447</td>
                            </tr>
                            <tr align="center">
                                <td align="left">Nominal Carcass
                                    Weight (lb./sq. ft.) </td>
                                <td>0.73</td>
                                <td>0.85</td>
                                <td>0.91</td>
                                <td>1.21</td>
                                <td>1.61 </td>
                                <td>2.08 </td>
                                <td>2.20</td>
                                <td>2.17</td>
                                <td>2.33</td>
                            </tr>
                            <tr align="center">
                                <td align="left">Approximate 1/32 in.
                                    Cover Weight (lb./sq. ft.) </td>
                                <td>0.19</td>
                                <td>0.19</td>
                                <td>0.19</td>
                                <td>0.19</td>
                                <td>0.19</td>
                                <td>0.19</td>
                                <td>0.19</td>
                                <td>0.19</td>
                                <td>0.19</td>
                            </tr>

                        </tbody>
                    </table>
                    <table width="100%">
                        <thead>
                            <tr align="left" class="orange-bg">
                                <th colspan="10">Imperial</th>
                            </tr>
                            <tr class="grey-bg">
                                <th align="left" width="21.1%">Fortress XP™</th>
                                <th>330/1</th>
                                <th>440/1</th>
                                <th>500/1</th>
                                <th>625/1</th>
                                <th>660/2</th>
                                <th>880/2</th>
                                <th>1000/2</th>
                                <th>1250/2</th>
                                <th>1500/2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td align="left">Number of Plies</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                            </tr>
                            <tr align="center">
                                <td align="left">Fabric Type*</td>
                                <td>P/N/N</td>
                                <td>P/N/N</td>
                                <td>P/N/N</td>
                                <td>P/N/N</td>
                                <td>P/N/N</td>
                                <td>P/N/N</td>
                                <td>P/N/N</td>
                                <td>P/N/N</td>
                                <td>P/N/N</td>
                            </tr>
                            <tr align="center">
                                <td align="left">Vulcanized & Fastener Rating (PIW)</td>
                                <td>330</td>
                                <td>440</td>
                                <td>500</td>
                                <td>625</td>
                                <td>660</td>
                                <td>880</td>
                                <td>1000</td>
                                <td>1250</td>
                                <td>1500</td>
                            </tr>
                            <tr align="center">
                                <td align="left">Nominal Carcass
                                    Gauge (in.) </td>
                                <td>0.130</td>
                                <td>0.151</td>
                                <td>0.164</td>
                                <td>0.181</td>
                                <td>0.280</td>
                                <td>0.329</td>
                                <td>0.357</td>
                                <td>0.389</td>
                                <td>0.447</td>
                            </tr>
                            <tr align="center">
                                <td align="left">Nominal Carcass
                                    Weight (lb./sq. ft.) </td>
                                <td>0.73</td>
                                <td>0.85</td>
                                <td>0.91</td>
                                <td>1.21</td>
                                <td>1.61 </td>
                                <td>2.08 </td>
                                <td>2.20</td>
                                <td>2.17</td>
                                <td>2.33</td>
                            </tr>
                            <tr align="center">
                                <td align="left">Approximate 1/32 in.
                                    Cover Weight (lb./sq. ft.) </td>
                                <td>0.19</td>
                                <td>0.19</td>
                                <td>0.19</td>
                                <td>0.19</td>
                                <td>0.19</td>
                                <td>0.19</td>
                                <td>0.19</td>
                                <td>0.19</td>
                                <td>0.19</td>
                            </tr>
                        </tbody>

                    </table>
                </div>
                <p class="note">*P/N/N = Poly/Nylon/Nylon and EPP = Polyester/Polyamide/Polyamide. **Average permanent
                    elongation values at 100% of rated belt tension are based on ISO 9856 test procedure. Consult your
                    Sales
                    Representative or Distributor for elastic and total elongation calculations specific to each system
                    based on Minuteman® calculations.</p>


                <div class="table-data mt-4">
                    <table width="100%">
                        <thead>
                            <tr align="left" class="orange-bg">
                                <th colspan="13">Imperial</th>
                            </tr>
                            <tr class="white-bg">
                                <th align="left">Material Weight</th>
                                <th colspan="3">0-40 lb./cu. ft.</th>
                                <th colspan="3">41-80 lb./cu. ft. </th>
                                <th colspan="3">81-120 lb./cu. ft.</th>
                                <th colspan="3">Over 120 lb./cu. ft.</th>
                            </tr>
                            <tr class="white-bg">
                                <th align="left">Trough Angle</th>
                                <th>20</th>
                                <th>35</th>
                                <th>45</th>
                                <th>20</th>
                                <th>35</th>
                                <th>45</th>
                                <th>20</th>
                                <th>35</th>
                                <th>45</th>
                                <th>20</th>
                                <th>35</th>
                                <th>45</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <th align="left" class="grey-bg border-bottom-0" scope="row">330/1</th>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                            </tr>
                            <tr align="center">
                                <th align="left" class="grey-bg border-bottom-0" scope="row">330/1</th>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                            </tr>
                            <tr align="center">
                                <th align="left" class="grey-bg border-bottom-0" scope="row">330/1</th>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                            </tr>
                            <tr align="center">
                                <th align="left" class="grey-bg border-bottom-0" scope="row">330/1</th>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                            </tr>
                            <tr align="center">
                                <th align="left" class="grey-bg border-bottom-0" scope="row">330/1</th>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                            </tr>
                            <tr align="center">
                                <th align="left" class="grey-bg border-bottom-0" scope="row">330/1</th>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                            </tr>

                        </tbody>
                    </table>
                    <table width="100%">
                        <thead>
                            <tr align="left" class="orange-bg">
                                <th colspan="13">Imperial</th>
                            </tr>
                            <tr class="white-bg">
                                <th align="left">Material Weight</th>
                                <th colspan="3">0-40 lb./cu. ft.</th>
                                <th colspan="3">41-80 lb./cu. ft. </th>
                                <th colspan="3">81-120 lb./cu. ft.</th>
                                <th colspan="3">Over 120 lb./cu. ft.</th>
                            </tr>
                            <tr class="white-bg">
                                <th align="left">Trough Angle</th>
                                <th>20</th>
                                <th>35</th>
                                <th>45</th>
                                <th>20</th>
                                <th>35</th>
                                <th>45</th>
                                <th>20</th>
                                <th>35</th>
                                <th>45</th>
                                <th>20</th>
                                <th>35</th>
                                <th>45</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <th align="left" class="grey-bg border-bottom-0" scope="row">330/1</th>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                            </tr>
                            <tr align="center">
                                <th align="left" class="grey-bg border-bottom-0" scope="row">330/1</th>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                            </tr>
                            <tr align="center">
                                <th align="left" class="grey-bg border-bottom-0" scope="row">330/1</th>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                            </tr>
                            <tr align="center">
                                <th align="left" class="grey-bg border-bottom-0" scope="row">330/1</th>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                            </tr>
                            <tr align="center">
                                <th align="left" class="grey-bg border-bottom-0" scope="row">330/1</th>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                            </tr>
                            <tr align="center">
                                <th align="left" class="grey-bg border-bottom-0" scope="row">330/1</th>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                            </tr>

                        </tbody>
                    </table>

                </div>
                <p class="note">*P/N/N = Poly/Nylon/Nylon and EPP = Polyester/Polyamide/Polyamide. **Average permanent
                    elongation values at 100% of rated belt tension are based on ISO 9856 test procedure. Consult your
                    Sales
                    Representative or Distributor for elastic and total elongation calculations specific to each system
                    based on Minuteman® calculations.</p>



                <div class="table-data mt-4 w-80">
                    <table width="100%">
                        <thead>
                            <tr align="left" class="orange-bg">
                                <th colspan="11">Imperial</th>
                            </tr>
                            <tr class="grey-bg">
                                <th align="left" colspan="2">Fortress XP™</th>
                                <th>330/1</th>
                                <th>440/1</th>
                                <th>500/1</th>
                                <th>625/1</th>
                                <th>660/2</th>
                                <th>880/2</th>
                                <th>1000/2</th>
                                <th>1000/2</th>
                                <th>1000/2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td rowspan="3" class="border-0 w-20">Idlers</td>
                                <td align="left" class="border-right w-20">20 degree</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                            </tr>
                            <tr align="center">
                                <td align="left">20 degree</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                            </tr>
                            <tr align="center">
                                <td align="left">20 degree</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                            </tr>


                        </tbody>
                    </table>
                    <table width="100%">
                        <thead>
                            <tr align="left" class="orange-bg">
                                <th colspan="11">Imperial</th>
                            </tr>
                            <tr class="grey-bg">
                                <th align="left" colspan="2">Fortress XP™</th>
                                <th>330/1</th>
                                <th>440/1</th>
                                <th>500/1</th>
                                <th>625/1</th>
                                <th>660/2</th>
                                <th>880/2</th>
                                <th>1000/2</th>
                                <th>1000/2</th>
                                <th>1000/2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td rowspan="3" class="border-0 w-20">Idlers</td>
                                <td align="left" class="border-right w-20">20 degree</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                            </tr>
                            <tr align="center">
                                <td align="left">20 degree</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                            </tr>
                            <tr align="center">
                                <td align="left">20 degree</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                                <td>20</td>
                                <td>35</td>
                                <td>45</td>
                            </tr>


                        </tbody>
                    </table>


                </div>
                <p class="note w-80">*P/N/N = Poly/Nylon/Nylon and EPP = Polyester/Polyamide/Polyamide. **Average permanent
                    elongation values at 100% of rated belt tension are based on ISO 9856 test procedure. Consult your
                    Sales
                    Representative or Distributor for elastic and total elongation calculations specific to each system
                    based on Minuteman® calculations.</p>



            </section>
        </main>
        <footer id="footer" class="footer">
            <img src="/static/cbs/images/continental_logo.png" alt="" class="img-fluid" width="150">
        </footer>
    </div>