<?php
if (!isset($this->parentContainer)) {
$this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
}
?>
<div class="wrapper">
    <header id="header">
        <div class="header-sec">
            <div class="header-txt"><b>Conveying Solutions</b></div>
            <div class="print-pg-no"></div>
        </div>
    </header>
    <main id="content" role="main">
        <section class="wood-product-applications">
            <?php if($this->editmode): ?>
            <?php if($this->input("CBS_WPA_Heading")->isEmpty()): ?>
            <h1 class="orange">
                <strong><?= $this->input("CBS_WPA_Heading")->setDataFromResource('Wood Product Applications'); ?></strong>
            </h1>
            <?php else: ?>
            <h1 class="orange"><strong><?= $this->input("CBS_WPA_Heading"); ?></strong></h1>
            <?php endif; ?>
            <?php else: ?>
            <h1 class="orange"><strong><?= $this->input("CBS_WPA_Heading") ?></strong></h1>
            <?php endif; ?>
            <div class="table-data wpa-table">
                <table width="100%">
                    <thead>
                        <tr>
                            <th width="20%">Service<br /> Required</th>
                            <th width="20%">Product<br /> Options</th>
                            <th width="20%">Special Service Construction</th>
                            <th width="20%">Top Cover Options*</th>
                            <th width="20%">Application Requirements</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <ul class="components">
                                    <?php while($this->block("WPA_ServiceRequired_Points")->loop()) { ?>
                                    <li><?= $this->input("sp_points", ['placeholder' => 'Enter comment']) ?></li>
                                    <?php } ?>
                                </ul>
                            </td>
                            <td>
                                <?php while($this->block("WP_ServiceRequired_Points")->loop()) { ?>
                                <li><?= $this->input("sp_points", ['placeholder' => 'Enter comment']) ?></p>
                                    <?php } ?>
                                    <p>Fortress XP™</p>
                                    <p>Wood Sawyer® Plus</p>
                            </td>
                            <td>
                                <p>660/2</p>
                                <p>600/3 Poly/Poly Heavy Skims</p>
                            </td>
                            <td>
                                <p>Monster Hide® Plus</p>
                                <p>Stacker® Plus</p>
                                <p>Defender® Plus</p>
                            </td>
                            <td>
                                <p>Severe Impact</p>
                                <p>Cut and Gouge</p>
                                <p>Low Coefficient of Friction</p>
                                <p>Sliderback Pulley Cover**</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <ul>
                                    <?php while($this->block("WPA_Service_Points")->loop()) { ?>
                                    <li><?= $this->input("sp_points", ['placeholder' => 'Enter comment']) ?></li>
                                    <?php } ?>
                                </ul>
                            </td>
                            <td>
                                <p>Wood Sawyer® Plus</p>
                                <p>Wood Sawyer® </p>
                            </td>
                            <td>
                                <p>125 PIW Poly/Nylon </p>
                                <p>Plain Weave</p>
                                <p>110 PIW Poly/Poly</p>
                            </td>
                            <td>
                                <p>Gold Plus</p>
                                <p>Gold Classic</p>
                                <p>Defender® Plus</p>
                            </td>
                            <td>
                                <p>Terpene and Oil</p>
                                <p>Cleated Belts for High Incline Service</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <ul>
                                    <?php while($this->block("Service_Points")->loop()) { ?>
                                    <li><?= $this->input("sp_points", ['placeholder' => 'Enter comment']) ?></li>
                                    <?php } ?>
                                </ul>
                            </td>
                            <td>
                                <p>Fortress XP™</p>
                                <p>Wood Sawyer® Plus</p>
                            </td>
                            <td>
                                <p>660/2</p>
                                <p>600/3 Poly/Poly Heavy Skims</p>
                            </td>
                            <td>
                                <p>Monster Hide® Plus</p>
                                <p>Stacker® Plus</p>
                                <p>Defender® Plus</p>
                            </td>
                            <td>
                                <p>Severe Impact</p>
                                <p>Cut and Gouge</p>
                                <p>Low Coefficient of Friction</p>
                                <p>Sliderback Pulley Cover**</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <ul>
                                    <?php while($this->block("NService_Points")->loop()) { ?>
                                    <li><?= $this->input("sp_points", ['placeholder' => 'Enter comment']) ?></li>
                                    <?php } ?>
                                </ul>
                            </td>
                            <td>
                                <p>Wood Sawyer® Plus</p>
                                <p>Wood Sawyer® </p>
                            </td>
                            <td>
                                <p>125 PIW Poly/Nylon </p>
                                <p>Plain Weave</p>
                                <p>110 PIW Poly/Poly</p>
                            </td>
                            <td>
                                <p>Gold Plus</p>
                                <p>Gold Classic</p>
                                <p>Defender® Plus</p>
                            </td>
                            <td>
                                <p>Terpene and Oil</p>
                                <p>Cleated Belts for High Incline Service</p>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <p class="note mb-0">
                <?php if($this->editmode): ?>
                <?php if($this->input("NOTE_Mb_ShortText")->isEmpty()): ?>
                <?= $this->input("NOTE_Mb_ShortText")->setDataFromResource('*Top cover options are relative to amount of terpene in the wood type.'); ?>
                <?php else: ?>
                <?= $this->input("NOTE_Mb_ShortText"); ?>
                <?php endif; ?>
                <?php else: ?>
                <?= $this->input("NOTE_Mb_ShortText") ?>
                <?php endif; ?>
            </p>
            <p class="note">
                <?php if($this->editmode): ?>
                <?php if($this->input("NOTE_ShortText")->isEmpty()): ?>
                <?= $this->input("NOTE_ShortText")->setDataFromResource('**Sliderback compound is not recommended for variable speed drive systems.'); ?>
                <?php else: ?>
                <?= $this->input("NOTE_ShortText"); ?>
                <?php endif; ?>
                <?php else: ?>
                <?= $this->input("NOTE_ShortText") ?>
                <?php endif; ?>
            </p>


            <?php if($this->editmode): ?>
            <?php if($this->input("CBS_WPF_Heading")->isEmpty()): ?>
            <h1 class="orange">
                <strong><?= $this->input("CBS_WPF_Heading")->setDataFromResource('Wood Product Facilities'); ?></strong>
            </h1>
            <?php else: ?>
            <h1 class="orange"><strong><?= $this->input("CBS_WPF_Heading"); ?></strong></h1>
            <?php endif; ?>
            <?php else: ?>
            <h1 class="orange"><strong><?= $this->input("CBS_WPF_Heading") ?></strong></h1>
            <?php endif; ?>

            <?php if($this->editmode): ?>
            <?php if($this->input("CBS_TPPF_Heading")->isEmpty()): ?>
            <h1 class="orange">
                <?= $this->input("CBS_TPPF_Heading")->setDataFromResource('Typical Pulp and Paper Facility'); ?>
            </h1>
            <?php else: ?>
            <h1 class="orange"><?= $this->input("CBS_TPPF_Heading"); ?></h1>
            <?php endif; ?>
            <?php else: ?>
            <h1 class="orange"><?= $this->input("CBS_TPPF_Heading") ?></h1>
            <?php endif; ?>

            <?php

                    if($this->editmode)
                    {
                        echo $this->image("PP_Image");
                    }
                    else
                    {
                        $imgSrcObj =  $this->image("PP_Image");
                        if($imgSrcObj)
                        {
                        ?>
            <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" />
            <?php
                    }
                }
            ?>



            <?php if($this->editmode): ?>
            <?php if($this->input("CBS_CBRT_Heading")->isEmpty()): ?>
            <h1 class="orange">
                <?= $this->input("CBS_CBRT_Heading")->setDataFromResource('ContiRoll Conveyor Belts for Roll Transport'); ?>
            </h1>
            <?php else: ?>
            <h1 class="orange"><?= $this->input("CBS_CBRT_Heading"); ?></h1>
            <?php endif; ?>
            <?php else: ?>
            <h1 class="orange"><?= $this->input("CBS_CBRT_Heading") ?></h1>
            <?php endif; ?>
            <div class="environment-quality-sec">
                <div class="media">
                    <div class="media-body">
                        <p>
                            <?php

                                    if($this->editmode)
                                    {
                                        echo $this->image("Conti_Roll_T_Image");
                                    }
                                    else
                                    {
                                        $imgSrcObj =  $this->image("Conti_Roll_T_Image");
                                        if($imgSrcObj)
                                        {
                                        ?>
                            <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" />
                            <?php
                                    }
                                }
                            ?>

                            <?php

                                    if($this->editmode)
                                    {
                                        echo $this->image("Conti_Roll_U_Image");
                                    }
                                    else
                                    {
                                        $imgSrcObj =  $this->image("Conti_Roll_U_Image");
                                        if($imgSrcObj)
                                        {
                                        ?>
                            <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" />
                            <?php
                                    }
                                }
                            ?>
                        </p>
                        <p>
                        <p class="note">
                            <?php if($this->editmode): ?>
                            <?php if($this->input("CBRT_ShortText")->isEmpty()): ?>
                            <?= $this->input("CBRT_ShortText")->setDataFromResource('Designed for paper mills, these profiled paper roll belts withstand the
                            rigors of heavy-duty use. They are available with profiles to prevent
                            the rolls from moving while reducing black rubber stains. Continental
                            produces these belts with fabric or steelcord carcasses. '); ?>
                            <?php else: ?>
                            <?= $this->input("CBRT_ShortText"); ?>
                            <?php endif; ?>
                            <?php else: ?>
                            <?= $this->input("CBRT_ShortText") ?>
                            <?php endif; ?>
                        </p>

                        <p class="page-details">
                            <?php if($this->editmode): ?>
                            <?php if($this->input("CBRT_Note_ShortText")->isEmpty()): ?>
                            <?= $this->input("CBRT_Note_ShortText")->setDataFromResource('See page 93 for more technical information on ContiRoll profiles.'); ?>
                            <?php else: ?>
                            <?= $this->input("CBRT_Note_ShortText"); ?>
                            <?php endif; ?>
                            <?php else: ?>
                            <?= $this->input("CBRT_Note_ShortText") ?>
                            <?php endif; ?>
                        </p>

                    </div>

                    <?php

                            if($this->editmode)
                            {
                                echo $this->image("CBRT_Section_Image");
                            }
                            else
                            {
                                $imgSrcObj =  $this->image("CBRT_Section_Image");
                                if($imgSrcObj)
                                {
                                ?>
                    <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" width="184" height="282" />
                    <?php
                                }
                            }
                        ?>
                </div>
            </div>
            <?php if($this->editmode): ?>
            <?php if($this->input("CBS_TSF_Heading")->isEmpty()): ?>
            <h1 class="orange">
                <?= $this->input("CBS_TSF_Heading")->setDataFromResource('Typical Sawmill Facility'); ?>
            </h1>
            <?php else: ?>
            <h1 class="orange"><?= $this->input("CBS_TSF_Heading"); ?></h1>
            <?php endif; ?>
            <?php else: ?>
            <h1 class="orange"><?= $this->input("CBS_TSF_Heading") ?></h1>
            <?php endif; ?>

            <?php

                    if($this->editmode)
                    {
                        echo $this->image("TSF_Section_Image");
                    }
                    else
                    {
                        $imgSrcObj =  $this->image("TSF_Section_Image");
                        if($imgSrcObj)
                        {
                        ?>
            <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" />
            <?php
                    }
                }
            ?>

        </section>

    </main>
    <footer id="footer1">
        <div class="footer-logo"><img src="/static/cbs/images/continental_logo.png" alt="" /></div>
    </footer>
</div>