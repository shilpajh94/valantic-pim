<?php
if (!isset($this->parentContainer)) {
$this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
}
?>
<div class="wrapper">
    <header id="header">
        <div class="header-sec">
            <div class="header-txt"><strong>Conveying Solutions</strong></div>
            <div class="print-pg-no"></div>
        </div>
    </header>
    <main id="content" role="main">
        <section class="fortressxp-belts">
            <?php if($this->editmode): ?>
            <?php if($this->input("CBS_QAE_Heading")->isEmpty()): ?>
            <h1 class="orange">
                <strong><?= $this->input("CBS_QAE_Heading")->setDataFromResource('Quality and the Environment'); ?></strong>
            </h1>
            <?php else: ?>
            <h1 class="orange"><strong><?= $this->input("CBS_QAE_Heading"); ?></strong></h1>
            <?php endif; ?>
            <?php else: ?>
            <h1 class="orange"><strong><?= $this->input("CBS_QAE_Heading") ?></strong></h1>
            <?php endif; ?>
            <p>
                <?php if($this->editmode): ?>
                <?php if($this->input("QAE_ShortText")->isEmpty()): ?>
                <?= $this->input("QAE_ShortText")->setDataFromResource('Continental’s corporate philosophy is to act in an environmentally friendly and quality conscious way.
It’s why we continually work to optimize our products by developing energy-optimized conveyor belts.'); ?>
                <?php else: ?>
                <?= $this->input("QAE_ShortText"); ?>
                <?php endif; ?>
                <?php else: ?>
                <?= $this->input("QAE_ShortText") ?>
                <?php endif; ?>
            </p>

            <div class="full-image-sec">
                <?php 

                        if($this->editmode)
                        {
                            echo $this->image("QAE_Full_Section_Image");
                        }
                        else
                        {
                            $imgSrcObj =  $this->image("QAE_Full_Section_Image");
                            if($imgSrcObj)
                            {
                            ?>
                <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" />
                <?php
                        }
                    }
                ?>
            </div>
            <?php if($this->editmode): ?>
            <?php if($this->input("CBS_QAE_HeadingName")->isEmpty()): ?>
            <h3 class="orange"><?= $this->input("CBS_QAE_HeadingName")->setDataFromResource('Environment'); ?></h3>
            <?php else: ?>
            <h3 class="orange"><?= $this->input("CBS_QAE_HeadingName"); ?></h3>
            <?php endif; ?>
            <?php else: ?>
            <h3 class="orange"><?= $this->input("CBS_QAE_HeadingName") ?></h3>
            <?php endif; ?>
            <div class="environment-quality-sec">
                <p>
                    <?php if($this->editmode): ?>
                    <?php if($this->input("QAE_EnvShortText")->isEmpty()): ?>
                    <?= $this->input("QAE_EnvShortText")->setDataFromResource('Continental conveyor belts do more than transport materials in large quantities. They do it with higher efficiency, greatly
reduced CO2 emissions, and lower energy consumption, all with no negative impact on the environment. In certain
circumstances, they can also generate electric power. It’s why our belts are wear resistant, offer low-maintenance, are
nearly noise-free and require little energy usage. This lowers your overall expense in the long term.');?>
                    <?php else: ?>
                    <?= $this->input("QAE_EnvShortText"); ?>
                    <?php endif; ?>
                    <?php else: ?>
                    <?= $this->input("QAE_EnvShortText") ?>
                    <?php endif; ?>
                </p>
                <div class="media">
                    <div class="media-body">
                        <p>

                            <?php if($this->editmode): ?>
                            <?php if($this->input("QAE_Env2ShortText")->isEmpty()): ?>
                            <?= $this->input("QAE_Env2ShortText")->setDataFromResource('A special rubber compound minimizes rolling resistance, thus
lowering energy consumption in the conveying of materials by
30%. CO2 emissions are also significantly reduced. With a 5,000m
conveyor belt with a 30,000 ton capacity per hour savings of
8,900 ton CO2 per year can be achieved. The energy saved equals
approximately the energy consumption of 6,500 private households
per year.');?>
                            <?php else: ?>
                            <?= $this->input("QAE_Env2ShortText"); ?>
                            <?php endif; ?>
                            <?php else: ?>
                            <?= $this->input("QAE_Env2ShortText") ?>
                            <?php endif; ?>

                        </p>
                        <?php if($this->editmode): ?>
                        <?php if($this->input("CBS_QAE_HeadingNameSecond")->isEmpty()): ?>
                        <h3 class="orange">
                            <?= $this->input("CBS_QAE_HeadingNameSecond")->setDataFromResource('Quality'); ?></h3>
                        <?php else: ?>
                        <h3 class="orange"><?= $this->input("CBS_QAE_HeadingNameSecond"); ?></h3>
                        <?php endif; ?>
                        <?php else: ?>
                        <h3 class="orange"><?= $this->input("CBS_QAE_HeadingNameSecond") ?></h3>
                        <?php endif; ?>
                        <p>
                            <?php if($this->editmode): ?>
                            <?php if($this->input("QAE_QtShortText")->isEmpty()): ?>
                            <?= $this->input("QAE_QtShortText")->setDataFromResource('With our uncompromising quality assurance program, we
monitor all stages of the entire process – from the initial
inquiry to delivery – in accordance with stringent ISO 9001
guidelines.');?>
                            <?php else: ?>
                            <?= $this->input("QAE_QtShortText"); ?>
                            <?php endif; ?>
                            <?php else: ?>
                            <?= $this->input("QAE_QtShortText") ?>
                            <?php endif; ?>

                        </p>
                    </div>
                    <div class="bannersec">
                        <?php 

            if($this->editmode)
            {
                echo $this->image("QAE_Section_Image");
            }
            else
            {
                $imgSrcObj =  $this->image("QAE_Section_Image");
                if($imgSrcObj)
                {
                ?>
                        <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" />
                        <?php
                }
            }
        ?>
                    </div>

                </div>
            </div>

        </section>
    </main>
    <footer id="footer" class="footer">
        <img src="<?= $footer_logo_src; ?>" alt="" class="img-fluid" width="150">
    </footer>
</div>