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
                <div><strong>Conveying Solutions</strong> Textile Belts</div>
                <div class="print-pg-no"></div>
            </div>
        </header>
        <main id="content" role="main">
            <section class="fortressxp-belts">
                <h1 class="orange"><strong>Fortress XP™ Belts</strong>
                    <span class="sub-title">TexSteel® Will Take You There</span>
                    <!-- span tag add accroding to page 55 -->
                </h1>
                <p>A tough belt designed for tough conditions, CONTI® Titan is constructed to withstand demanding
                    operating
                    conditions. The unique, highly engineered, straight-warp carcass is designed to maximize resistance
                    to
                    extreme ripping, tearing, gouging and impact stresses. </p>

                <div class="media pt-0">
                    <div class="media-body">
                        <p>This rugged, fabric-reinforced conveyor belt withstands high-abuse applications.
                            It is made with a revolutionary Fortress™ technology weave design, and it holds
                            up to the most demanding applications, delivering up to three times longer life.
                            Fortress XP™ provides a lower cost-per-ton with unsurpassed system savings. </p>
                    </div>
                    <div class="seal-image"><img src="/static/cbs/images/woodsawyer.jpg" alt=""></div>
                </div>

                <p>A tough belt designed for tough conditions, CONTI® Titan is constructed to withstand demanding
                    operating
                    conditions. The unique, highly engineered, straight-warp carcass is designed to maximize resistance
                    to
                    extreme ripping, tearing, gouging and impact stresses. </p>

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
                <div class="table">
                    <table width="100%">
                        <thead>
                            <tr>
                                <th width="30%" class="orange">Markets</th>
                                <th width="30%" class="orange">Applications</th>
                                <th width="30%" class="orange">Cover Compounds</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr valign="top">
                                <td>
                                    <ul>
                                        <li><span class="orange">›</span> Aggregate</li>
                                        <li><span class="orange">›</span> Cement</li>
                                        <li><span class="orange">›</span> Coal</li>
                                        <li><span class="orange">›</span> Foundry</li>
                                        <li><span class="orange">›</span> Hard rock</li>
                                        <li><span class="orange">›</span> Pulp and paper</li>
                                        <li><span class="orange">›</span> Steel production</li>
                                        <li><span class="orange">›</span> Wood products</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li><span class="orange">›</span> Log debarkers</li>
                                        <li><span class="orange">›</span> Log decks</li>
                                        <li><span class="orange">›</span> Mainlines</li>
                                        <li><span class="orange">›</span> Pit belts</li>
                                        <li><span class="orange">›</span> Primary crushers</li>
                                        <li><span class="orange">›</span> Secondary crushers</li>
                                        <li><span class="orange">›</span> Ship unloaders</li>
                                        <li><span class="orange">›</span> Trash and recycling</li>
                                        <li><span class="orange">›</span> Any high abuse applications</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li><span class="orange">›</span> Monster Hide® Series</li>
                                        <li><span class="orange">›</span> Stacker® Series</li>
                                        <li><span class="orange">›</span> Solar-Shield® Classic</li>
                                    </ul>
                                    <p class="details">See pages 78–84 for more specific details.</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="note">See the process diagram for Aggregate, Hard Rock Mining, Sand and Gravel markets on
                        page 9 for alternative belt recommendations.</p>
                </div>

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

                <div class="featuring-sec">
                    <h2><span class="orange"><strong>Plylon Plus<sup>®</sup></strong></span> Featuring
                        Solar-Shield<sup>®</sup></h2>
                    <div class="media">
                        <img src="/static/cbs/images/solar-shield.jpg" alt="" class="features-images">
                        <div class="media-body">
                            <p>Solar-Shield® belts are part of the Plylon Plus® family. They’re
                                offered with polyester/nylon, polyester/polyester and fiberglass
                                fabric reinforcements to deliver high performance in extremely hot
                                material applications. </p>
                            <p><strong>Solar-Shield® Extreme compound with fiberglass reinforcement</strong>
                                The fiberglass option offers the highest degree of burn-through
                                resistance of any current available fabric reinforcement – resisting
                                “hot shots” burn-through up to 1,000˚F (538˚C).

                            <p class="note">See page 79 for more information on Solar-Shield®.</p>
                        </div>
                    </div>
                </div>

                <div class="belts-information">
                    <h1><span class="orange"><strong>Spartan®</strong></span> Belt Information</h1>
                    <h3><strong>Spartan® Conveyor Belt Data </strong></h3>
                    <div class="table-data w-80">
                        <table width="100%" class="white-bg">
                            <thead>
                                <tr class="grey-bg">
                                    <th align="left">Spartan®</th>
                                    <th>330/1</th>
                                    <th>440/1</th>
                                    <th>500/1</th>
                                    <th>500/1</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr align="center">
                                    <td align="left">Number of Plies</td>
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
                                </tr>
                                <tr align="center">
                                    <td align="left">Vulcanized & Fastener Rating (PIW)</td>
                                    <td>330</td>
                                    <td>440</td>
                                    <td>500</td>
                                    <td>500</td>
                                </tr>
                                <tr align="center">
                                    <td align="left">Nominal Carcass
                                        Gauge (in.) </td>
                                    <td>0.130</td>
                                    <td>0.151</td>
                                    <td>0.164</td>
                                    <td>0.164</td>
                                </tr>
                                <tr align="center">
                                    <td align="left">Nominal Carcass
                                        Weight (lb./sq. ft.) </td>
                                    <td>0.73</td>
                                    <td>0.85</td>
                                    <td>0.91</td>
                                    <td>0.91</td>
                                </tr>
                                <tr align="center">
                                    <td align="left">Approximate 1/32 in.
                                        Cover Weight (lb./sq. ft.) </td>
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
                                    <th colspan="5">Imperial</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr align="center">
                                    <td align="left">Number of Plies</td>
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
                                </tr>
                                <tr align="center">
                                    <td align="left">Vulcanized & Fastener Rating (PIW)</td>
                                    <td>330</td>
                                    <td>440</td>
                                    <td>500</td>
                                    <td>500</td>
                                </tr>
                                <tr align="center">
                                    <td align="left">Nominal Carcass
                                        Gauge (in.) </td>
                                    <td>0.130</td>
                                    <td>0.151</td>
                                    <td>0.164</td>
                                    <td>0.164</td>
                                </tr>
                                <tr align="center">
                                    <td align="left">Nominal Carcass
                                        Weight (lb./sq. ft.) </td>
                                    <td>0.73</td>
                                    <td>0.85</td>
                                    <td>0.91</td>
                                    <td>0.91</td>
                                </tr>
                                <tr align="center">
                                    <td align="left">Approximate 1/32 in.
                                        Cover Weight (lb./sq. ft.) </td>
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
                                    <th colspan="5">Imperial</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr align="center">
                                    <td align="left">Number of Plies</td>
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
                                </tr>
                                <tr align="center">
                                    <td align="left">Vulcanized & Fastener Rating (PIW)</td>
                                    <td>330</td>
                                    <td>440</td>
                                    <td>500</td>
                                    <td>500</td>
                                </tr>
                                <tr align="center">
                                    <td align="left">Nominal Carcass
                                        Gauge (in.) </td>
                                    <td>0.130</td>
                                    <td>0.151</td>
                                    <td>0.164</td>
                                    <td>0.164</td>
                                </tr>
                                <tr align="center">
                                    <td align="left">Nominal Carcass
                                        Weight (lb./sq. ft.) </td>
                                    <td>0.73</td>
                                    <td>0.85</td>
                                    <td>0.91</td>
                                    <td>0.91</td>
                                </tr>
                                <tr align="center">
                                    <td align="left">Approximate 1/32 in.
                                        Cover Weight (lb./sq. ft.) </td>
                                    <td>0.19</td>
                                    <td>0.19</td>
                                    <td>0.19</td>
                                    <td>0.19</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="note w-80">Spartan® rated belt tension can exceed 100%, with a maximum of 150%, during
                        starting and stopping conditions. Fastener size recommendation may vary due to cover thickness,
                        pulley
                        diameters and system tension. Consult your Sales Representative or fastener manufacturer. *P/P =
                        Poly/Poly. **Average permanent elongation values at 100% of rated belt tension are
                        based on ISO 9856 test procedure. Consult your Sales Representative or Distributor for
                        electrical and total elongation calculating. </p>

                </div>

                <div class="features-benefit-sec">
                    <h1 class="my-4"><span class="orange"><strong>Pathfinder® Plus</strong></span> Features and Benefits
                    </h1>
                    <div class="media">
                        <img src="/static/cbs/images/picture1.png" class="features-images" alt="">
                        <div class="media-body">
                            <h2 class="orange">Innovative fabric weave</h2>
                            <p>The new dual-layer twill fabric gives Fortress XP™ improved load bearing and impact
                                resistance.</p>
                        </div>
                    </div>
                    <div class="media">
                        <img src="/static/cbs/images/picture1.png" class="features-images" alt="">
                        <div class="media-body">
                            <h2 class="orange">Exceptional impact resistance</h2>
                            <p>Fortress XP™ has industry-leading impact resistance. Loading point impact damage can be
                                a major cause of belt failure. Design engineers used an enhanced Dynamic Impact Tester
                                to
                                simulate loading impact force and its effects on belting.</p>
                        </div>
                    </div>
                </div>

                <div class="features-benefit-sec">
                    <h1><span class="orange"><strong>TexSteel® </strong></span> Features and Benefits</h1>
                    <div class="d-flex">
                        <div class="left-colm">
                            <div class="media">
                                <img src="/static/cbs/images/picture1.png" class="features-images" alt="">
                                <div class="media-body">
                                    <h2 class="orange">Innovative fabric weave</h2>
                                    <p>The new dual-layer twill fabric gives Fortress XP™ improved load bearing and
                                        impact
                                        resistance.</p>
                                </div>
                            </div>
                            <div class="media">
                                <img src="/static/cbs/images/picture1.png" class="features-images" alt="">
                                <div class="media-body">
                                    <h2 class="orange">Exceptional impact resistance</h2>
                                    <p>Fortress XP™ has industry-leading impact resistance. Loading point impact damage
                                        can be
                                        a major cause of belt failure. Design engineers used an enhanced Dynamic Impact
                                        Tester
                                        to
                                        simulate loading impact force and its effects on belting.</p>
                                </div>
                            </div>
                        </div>
                        <div class="right-colm">
                            <div class="media">
                                <div class="media-body">
                                    <img src="/static/cbs/images/picture1.png" class="" alt="">
                                    <h2 class="orange">Lightweight</h2>
                                    <p>Fortress XP™ has industry-leading impact resistance. Loading point impact damage
                                        can be
                                        a major cause of belt failure. Design engineers used an enhanced Dynamic Impact
                                        Tester
                                        to
                                        simulate loading impact force and its effects on belting.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="full-image-sec">
                    <img src="/static/cbs/images/banner.jpg" alt="">
                </div>

                <h1 class="orange"><strong>CONTI® Alert</strong></h1>
                <h2 class="d-flex">A Visionary Idea in Conveyor Belt Monitoring <img src="/static/cbs/images/contialert.jpg" alt=""
                        style="margin-left: 22px; margin-bottom: 10px;"></h2>
                <p><b>Conti®Alert is the first and only conveyor belt innovation to let you see belt wear in real
                        time.<br />
                        The red bonding layer below the top cover is exposed when it's time to change the belt,
                        creating:</b></p>

                <div class="feature-benefit-list">
                    <h3 class="orange"><strong>Cost savings </strong></h3>
                    <ul>
                        <li><span class="orange">›</span> Identifying belt wear allows you to get the most out of your
                            current belt
                        </li>
                        <li><span class="orange">›</span> Knowing when to change your belt helps prevent downtime and
                            increase uptime
                        </li>
                    </ul>
                    <h3 class="orange"><strong>Cost savings </strong></h3>

                    <ul>
                        <li><span class="orange">›</span> Identifying belt wear allows you to get the most out of your
                            current belt
                        </li>
                        <li><span class="orange">›</span> Knowing when to change your belt helps prevent downtime and
                            increase uptime
                        </li>
                    </ul>
                </div>
                <div class="full-image-sec"><img src="/static/cbs/images/image22.jpg"></div>

                <p><b>Belt Specs</b><br />
                    Plylon Plus® 250/2, 375/3, 500/4 and 600/3 with a minimum 3/16" x 1/16" to a maximum of 3/8" x 1/8"
                    covers</p>
                <div class="feature-benefit-list">
                    <div class="media" style="margin: 5px 0px;">
                        <img src="/static/cbs/images/icon1.jpg" class="features-images" alt="">
                        <div class="media-body">
                            <p><b>Abrasion-resistant compound specs</b> <br />
                                Defender Plus®, Stacker®, Survivor® and Survivor® Plus
                            </p>
                        </div>
                    </div>
                    <div class="media" style="margin: 5px 0px;">
                        <img src="/static/cbs/images/icon1.jpg" class="features-images" alt="">
                        <div class="media-body">
                            <p><b>Abrasion-resistant compound specs</b> <br />
                                Defender Plus®, Stacker®, Survivor® and Survivor® Plus
                            </p>
                        </div>
                    </div>
                </div>

                <p><b>Belt Specs</b><br />
                    Plylon Plus® 250/2, 375/3, 500/4 and 600/3 with a minimum 3/16" x 1/16" to a maximum of 3/8" x 1/8"
                    covers</p>

            </section>
            <div class="page-break"></div>
            <section class="features-benefit-sec">
                <h1><span class="orange"><strong>Fortress XP™</strong></span> Features and Benefits</h1>
                <div class="media">
                    <img src="/static/cbs/images/picture1.png" class="features-images" alt="">
                    <div class="media-body">
                        <h2 class="orange">Innovative fabric weave</h2>
                        <p>The new dual-layer twill fabric gives Fortress XP™ improved load bearing and impact
                            resistance.</p>
                    </div>
                </div>
                <div class="media">
                    <img src="/static/cbs/images/picture1.png" class="features-images" alt="">
                    <div class="media-body">
                        <h2 class="orange">Exceptional impact resistance</h2>
                        <p>Fortress XP™ has industry-leading impact resistance. Loading point impact damage can be
                            a major cause of belt failure. Design engineers used an enhanced Dynamic Impact Tester
                            to
                            simulate loading impact force and its effects on belting.</p>
                    </div>
                </div>
                <div class="media">
                    <img src="/static/cbs/images/picture1.png" class="features-images" alt="">
                    <div class="media-body">
                        <h2 class="orange">High transverse tear strength </h2>
                        <p>The dual-layer twill fabric design enables high transverse tear strength. This minimizes
                            tears that
                            result from material punctures, as well as edge tears from misaligned belts.</p>
                    </div>
                </div>
                <div class="media">
                    <img src="/static/cbs/images/picture1.png" class="features-images" alt="">
                    <div class="media-body">
                        <h2 class="orange">High transverse tear strength </h2>
                        <p>The dual-layer twill fabric design enables high transverse tear strength. This minimizes
                            tears that
                            result from material punctures, as well as edge tears from misaligned belts.</p>
                    </div>
                </div>
                <div class="media">
                    <img src="/static/cbs/images/picture1.png" class="features-images" alt="">
                    <div class="media-body">
                        <h2 class="orange">High transverse tear strength </h2>
                        <p>The dual-layer twill fabric design enables high transverse tear strength. This minimizes
                            tears that
                            result from material punctures, as well as edge tears from misaligned belts.</p>
                    </div>
                </div>
                <div class="media">
                    <img src="/static/cbs/images/picture1.png" class="features-images" alt="">
                    <div class="media-body">
                        <h2 class="orange">High transverse tear strength </h2>
                        <p>The dual-layer twill fabric design enables high transverse tear strength. This minimizes
                            tears that
                            result from material punctures, as well as edge tears from misaligned belts.</p>
                    </div>
                </div>
            </section>
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