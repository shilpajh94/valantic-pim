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
        <!-- <footer id="footer">
            <div class="footer-logo"><img src="images/continental_logo.png" alt="" /></div>
        </footer> -->
        <main id="content" role="main">
            <section class="fortressxp-belts">
                <h1 class="orange"><?= $this->input("CCSM_Header_title",[
                    "placeholder" =>
                    "Enter Your  Heading"]); ?>
                    <span class="sub-title"><?= $this->input("CCSM_SubHeader_title",[
                    "placeholder" =>
                    "Enter Your  SubHeading"]); ?></span>
                </h1>
                <p class="p-medium"><?= $this->textarea("CCSM_Content", [
                    "placeholder" =>
                    "Enter Your  Description"
                ]);?> </p>

                <p class="p-medium"><b><?= $this->wysiwyg("CCSM_Content2", [
                    "placeholder" =>
                    "Enter Your  Description"
                ]);?></b></p>


                <div class="full-image-sec">
                    <?php

                        if($this->editmode)
                        {
                            echo $this->image("Belt_Image");
                        }
                        else
                        {
                            $imgSrcObj =  $this->image("Belt_Image");
                            if($imgSrcObj)
                            {
                            ?>
                    <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" />
                    <?php
                        }
                    }
                    ?>
                </div>

                <div class="colum-2 p-0">


                    <div class="conticlean-tab">
                        <div class="row">
                            <div class="col">
                                <h3 class="orange"><?= $this->input("CCSM_Header", [
                                    "placeholder" =>
                                    "Enter Your  TableHead"
                                ]);?></h3>
                                <ul>
                                    <?php
                                    while($this->block("CCSM_Header_Points")->loop()) { ?>
                                    <li><span class="orange">›</span><?= $this->input("CCSM_Header_Points",[
                                        "placeholder" =>
                                        "Enter Your Points"
                                    ]);?> </li>
                                    <?php
                                    } ?>
                                </ul>
                            </div>
                            <div class="col">
                                <h3 class="orange"><?= $this->input("CCSM_Header2", [
                                    "placeholder" =>
                                    "Enter Your  TableHead"
                                ]);?></h3>
                                <ul class="materials-list">
                                    <?php
                                    while($this->block("CCSM_Header_Points2")->loop()) { ?>
                                    <li><span class="orange">›</span><?= $this->input("CCSM_Header_Points2",[
                                        "placeholder" =>
                                        "Enter Your Points"
                                    ]);?> </li>
                                    <?php
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- <table width="100%">
                                <thead>
                                    <tr>
                                        <th width="50%" class="orange">ContiClean® Benefits</th>
                                        <th width="50%" class="orange" colspan="2">Materials</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr valign="top">
                                        <td>
                                            
                                        </td>
                                        <td>
                                            <ul>
                                                <li><span class="orange">›</span> Alumina</li>
                                                <li><span class="orange">›</span> Cement</li>
                                                <li><span class="orange">›</span> Coal</li>
                                                <li><span class="orange">›</span> Gypsum</li>
                                                <li><span class="orange">›</span> Limestone</li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul>
                                                <li><span class="orange">›</span> Potash</li>
                                                <li><span class="orange">›</span> Salt</li>
                                                <li><span class="orange">›</span> Sand</li>
                                                <li><span class="orange">›</span> Silica</li>
                                                <li><span class="orange">›</span> Tailings</li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table> -->



                    <div class="nexcolumtarget">
                        <div class="feature-benefit-list">
                            <h3 class="orange"><?= $this->input("CCSM_Header3", [
                                "placeholder" =>
                                "Enter Your  TableHead"
                            ]);?> </h3>
                            <ul>
                                <?php
                                while($this->block("CCSM_Header_Points3")->loop()) { ?>
                                <li><span class="orange">›</span> <i><?= $this->input("CCSM_Header_Points3",[
                                    "placeholder" =>
                                    "Enter Your Points"
                                ]);?> </i></li>
                                <?php
                                } ?>
                            </ul>
                        </div>
                        <?php

                            if($this->editmode)
                            {
                                echo $this->image("ContiClean_Graph_Image");
                            }
                            else
                            {
                                $imgSrcObj =  $this->image("ContiClean_Graph_Image");
                                if($imgSrcObj)
                                {
                                ?>
                        <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" class="w-100" />
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>


                <div class="page95 pg-6">
                    <?php

                        if($this->editmode)
                        {
                            echo $this->image("ContiClean_Image");
                        }
                        else
                        {
                            $imgSrcObj =  $this->image("ContiClean_Image");
                            if($imgSrcObj)
                            {
                            ?>
                    <img src="<?= $imgSrcObj->getThumbnail('catalog_thumb'); ?>" alt="" class="w-100" />
                    <?php
                        }
                    }
                    ?>
                </div>


            </section>

        </main>
        <footer id="footer">
            <div class="footer-logo"><img src="images/continental_logo.png" alt="" /></div>
        </footer>
    </div>