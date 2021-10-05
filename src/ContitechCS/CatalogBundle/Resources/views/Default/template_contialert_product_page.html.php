<?php
if (!isset($this->parentContainer)) {
$this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
}
?>
<div class="wrapper">
        <header id="header">
            <div class="header-sec">
                <div><strong>Conveying Solutions</strong> 
                <?php if($this->input("Conti_Alert_header_title")->isEmpty()): ?>
                        <?= $this->input("Conti_Alert_header_title")->setDataFromResource('Textile Belts'); ?>
                    <?php else: ?>
                        <?= $this->input("Conti_Alert_header_title"); ?>
                    <?php endif; ?>
                </div>
                <div class="print-pg-no"></div>
            </div>
        </header>    
        <main id="content" role="main">
        <section class="fortressxp-belts">
            <?php if($this->editmode): ?>
                <?php if($this->input("CBS_Conti_Alert_Heading")->isEmpty()): ?>
                    <h1 class="orange"><strong><?= $this->input("CBS_Conti_Alert_Heading")->setDataFromResource('CONTI® Alert'); ?></strong></h1>
                <?php else: ?>
                    <h1 class="orange"><strong><?= $this->input("CBS_Conti_Alert_Heading"); ?></strong></h1>
                <?php endif; ?>
            <?php else: ?>
                <h1 class="orange"><strong><?= $this->input("CBS_Conti_Alert_Heading") ?></strong></h1>
            <?php endif; ?>
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

            <div class="feature-benefit-list">
                <h2><span class="orange"><strong>CONTI®Alert</strong></span> Information</h2>
                <p><b>Belt Specs</b><br />
                    Plylon Plus® 250/2, 375/3, 500/4 and 600/3 with a minimum 3/16" x 1/16" to a maximum of 3/8" x
                    1/8" covers</p>

                <div class="media" style="margin: 5px 0px;">
                    <img src="images/icon1.jpg" class="features-images" alt="">
                    <div class="media-body">
                        <p><b>Abrasion-resistant compound specs</b> <br />
                            Defender Plus®, Stacker®, Survivor® and Survivor® Plus
                        </p>
                    </div>
                </div>
                <div class="media" style="margin: 5px 0px;">
                    <img src="images/icon1.jpg" class="features-images" alt="">
                    <div class="media-body">
                        <p><b>Abrasion-resistant compound specs</b> <br />
                            Defender Plus®, Stacker®, Survivor® and Survivor® Plus
                        </p>
                    </div>
                </div>
                <p><b>Belt Specs</b><br />
                    Plylon Plus® 250/2, 375/3, 500/4 and 600/3 with a minimum 3/16" x 1/16" to a maximum of 3/8" x
                    1/8" covers</p>
            </div>
        </section>
        <div class="page-break"></div>
    </main>
    <footer id="footer" class="footer">
        <img src="/static/cbs/images/continental_logo.png" alt="" class="img-fluid" width="150">
    </footer>
</div>