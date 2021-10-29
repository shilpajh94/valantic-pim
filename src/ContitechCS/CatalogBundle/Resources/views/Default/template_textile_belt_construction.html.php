<?php
    if (!isset($this->parentContainer)) {
        $this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
    }
?>
<?php if($this->editmode): ?>
<?= $this->relation("cbs_template_textile_belt_services_page", [
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
                <?= $this->input("TBS_title",["placeholder" =>"Enter Your  Title"]); ?>
            </div>
            <div class="print-pg-no"></div>
        </div>
        <footer id="footer">
            <div class="footer-logo"><img src="/static/cbs/images/continental_logo.png" alt="" /></div>
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
                    <?php endif; ?></h1>

                <p class="p-medium"><?php if($this->editmode): ?>
                    <?php if($this->textarea("TBS_ProductClaimSlogan")->isEmpty()): ?>
                    <?= $this->textarea("TBS_ProductClaimSlogan")->setDataFromResource($data['ProductClaimSlogan']) ?>
                    <?php else: ?>
                    <?= $this->textarea("TBS_ProductClaimSlogan"); ?>
                    <?php endif; ?>
                    <?php else: ?>
                    <?= $this->textarea("TBS_ProductClaimSlogan") ?>
                    <?php endif; ?> </p>

                <div class="colum-2 p-0">
                    <p>
                        <?php if($this->editmode): ?>
                        <?php if($this->wysiwyg("TBS_ShortText")->isEmpty()): ?>
                        <?= $this->wysiwyg("TBS_ShortText")->setDataFromResource($data['ShortText']) ?>
                        <?php else: ?>
                        <?= $this->wysiwyg("TBS_ShortText"); ?>
                        <?php endif; ?>
                        <?php else: ?>
                        <?= $this->wysiwyg("TBS_ShortText") ?>
                        <?php endif; ?>
                    </p>
                </div>

                <h3 class="orange"><?= $this->input("TBS_Header_title",["placeholder" =>"Enter Your  Heading"]); ?></h3>

                <?php
                        if($this->editmode)
                            {
                                if($this->image("TBS_ProductImage")->isEmpty())
                                    {
                                        echo $this->image("TBS_ProductImage")->setImage($data['ProductImage']);
                                    }
                                    else{
                                        echo $this->image("TBS_ProductImage");
                                    }
                                }
                                else
                                {
                                    $CSSImgSrcObj =  $this->image("TBS_ProductImage");
                                    if($CSSImgSrcObj)
                                    {
                                    ?>
                <img src="<?= $CSSImgSrcObj->getThumbnail('catalog_thumb'); ?>" class="features-images" alt="" />
                <?php
                                    }
                                }
                            ?>

                <h3 class="orange mb-0"><?= $this->input("BNE_Header_title",["placeholder" =>"Enter Your  Heading"]); ?>
                </h3>

                <?php
                        if($this->editmode)
                            {
                                if($this->image("TBS_ApplicationImage")->isEmpty())
                                    {
                                        echo $this->image("TBS_ApplicationImage")->setImage($data['ApplicationImage']);
                                    }
                                    else{
                                        echo $this->image("TBS_ApplicationImage");
                                    }
                                }
                                else
                                {
                                    $CSSImgSrcObj =  $this->image("TBS_ApplicationImage");
                                    if($CSSImgSrcObj)
                                    {
                                    ?>
                <img src="<?= $CSSImgSrcObj->getThumbnail('catalog_thumb'); ?>" class="features-images" alt="" />
                <?php
                                    }
                                }
                            ?>

                <h1 class="orange"><?= $this->input("TBA_Header_title",["placeholder" =>"Enter Your  Heading"]); ?></h1>

                <div class="table-data textile-table">
                    <table width="100%">
                        <thead>
                            <tr>
                                <th width="17.2%" align="left"><?= $this->input("Industry_Markets",[
                                    "placeholder" =>
                                    "Enter Your  Heading"]); ?></th>
                                <th width="9.2%">Fortress XP™</th>
                                <th width="9.2%">CONTI® Titan</th>
                                <th width="9.2%">Plylon Plus®</th>
                                <th width="9.2%">ContiFlex®</th>
                                <th width="9.2%">Spartan®</th>
                                <th width="9.2%">Wood Sawyer® Plus</th>
                                <th width="9.2%">Pathfinder® </th>
                                <th width="9.2%">TransConti</th>
                                <th width="9.2%">TexSteel®</th>
                            </tr>


                        </thead>
                        <tbody>
                            <tr align="center">
                                <td align="left">Coal and Prep Plants</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                            </tr>
                            <tr align="center">
                                <td align="left">Coal and Prep Plants</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                            </tr>
                            <tr align="center">
                                <td align="left">Coal and Prep Plants</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                            </tr>
                            <tr align="center">
                                <td align="left">Coal and Prep Plants</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                            </tr>
                            <tr align="center">
                                <td align="left">Coal and Prep Plants</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                            </tr>
                            <tr align="center">
                                <td align="left">Coal and Prep Plants</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                                <td>•</td>
                            </tr>
                            <tr align="center" class="white-bg">
                                <td align="left"><b>Page Number</b></td>
                                <td>10</td>
                                <td>17</td>
                                <td>23</td>
                                <td>33</td>
                                <td>37</td>
                                <td>40</td>
                                <td>48</td>
                                <td>53</td>
                                <td>56</td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <h3 class="mt-4"><?= $this->input("Example_Header",["placeholder" =>"Enter Your  ExampleTagLine"]); ?>
                </h3>

                <div class="table process-table">
                    <table width="100%">
                        <thead>
                            <tr align="right">
                                <th colspan="4" class="p-0">
                                    <?php
                                            if($this->editmode)
                                                {
                                                    if($this->image("TBS_fieldPhoto")->isEmpty())
                                                        {
                                                            echo $this->image("TBS_fieldPhoto")->setImage($data['fieldPhoto']);
                                                        }
                                                        else{
                                                            echo $this->image("TBS_fieldPhoto");
                                                        }
                                                    }
                                                    else
                                                    {
                                                        $CSSImgSrcObj =  $this->image("TBS_fieldPhoto");
                                                        if($CSSImgSrcObj)
                                                        {
                                                        ?>
                                    <img src="<?= $CSSImgSrcObj->getThumbnail('catalog_thumb'); ?>"
                                        class="features-images" alt="" />
                                    <?php
                                                        }
                                                    }
                                                ?>
                                </th>
                            </tr>
                            <tr align="left" valign="bottom">
                                <th width="25%">Process</th>
                                <th width="25%">Primary Crusher Mainline,<br /> Transfer, Overland, Pit Belt </th>
                                <th width="25%">Secondary Crusher Wash Plant</th>
                                <th width="25%">Stacker, Load Out, Radial Stacker</th>
                            </tr>


                        </thead>
                        <tbody>
                            <tr align="left">
                                <td>Continental Conveyor<br />
                                    Belt Recommendations</td>
                                <td>Fortress XP™<br />
                                    Plylon Plus®
                                </td>
                                <td>Plylon Plus®<br />
                                    CONTI®Titan (Single Ply)<br />
                                    ContiFlex®
                                </td>
                                <td>ContiFlex®<br />
                                    Spartan®
                                </td>
                            </tr>

                            <tr height="40">
                                <td>Typical Material Size</td>
                                <td>6 in. and higher</td>
                                <td>3 in. to 6 in.</td>
                                <td>3 in. and lower</td>

                            </tr>
                            <tr>
                                <td>Application Description</td>
                                <td>
                                    <ul>
                                        <li>High abuse and/or higher tension</li>
                                        <li>Critical belt lines where uptime is
                                            a premium</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li>High abuse and/or higher tension</li>
                                        <li>Critical belt lines where uptime is
                                            a premium</li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li>High abuse and/or higher tension</li>
                                        <li>Critical belt lines where uptime is
                                            a premium</li>
                                    </ul>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>

                <p class="note"><?= $this->textarea("Note",["placeholder" =>"Enter Your  Note"]); ?></p>

            </section>
        </main>
</div>
<?php endif; ?>