<?php
if (!isset($this->parentContainer)) {
    $this->extend('ContitechCSCatalogBundle:Layouts:layout.html.php');
}
?>

<?php if ($this->editmode) : ?>
    <?= $this->relation("cbs_template_transconti_product_page", [
        "types" => ["object"],
        "subtypes" => [
            "object" => ["object"]
        ],
        "classes" => ["CSCatalogTables"],
    ]);
    ?>
<?php endif; ?>

<?php if ($data) : ?>
    <div class="wrapper beltinfotable">
        <header id="header">
            <div class="header-sec">
                <div class="header-txt"><span class="first-title"><?= $this->translate('CS_header_title') ?></span>
                    <span class="second-title">
                        <?php if ($this->editmode) : ?>
                            <div class="attr-font">
                                Parent Attribute Name = Name
                            </div>
                        <?php endif; ?>
                        <?php
                        if ($this->input("PP_title")->isEmpty()) {
                            echo $this->input("PP_title", ['placeholder' => 'Enter your title'])->setDataFromResource($data['HierarchyNameLevel2']);
                        } else {
                            echo $this->input("PP_title", ['placeholder' => 'Enter your title']);
                        }
                        ?>
                    </span>
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
            <?php if ($this->editmode) : ?>
                <section class="fortressxp-belts">

                    <?php if ($this->editmode) : ?>
                        <div class="attr-font">Attribute Name = Name</div>
                    <?php endif; ?>
                    <h1 class="orange">

                        <?php if ($this->input("CS_ProductName")->isEmpty()) : ?>
                            <?= $this->input("CS_ProductName", ['placeholder' => 'Enter Product Name'])->setDataFromResource($data['ProductName']) ?>
                        <?php else : ?>
                            <?= $this->input("CS_ProductName", ['placeholder' => 'Enter Product Name']); ?>
                        <?php endif; ?>

                    </h1>

                    <div class="media media-transconti pt-0">
                        <div class="media-body">
                            <?php if ($this->editmode) : ?>
                                <div class="attr-font">Attribute Name = Short Text</div>
                            <?php endif; ?>
                            <p>
                                <?php if ($this->input("PP_ShortText")->isEmpty()) : ?>
                                    <?= $this->input("PP_ShortText", ['placeholder' => 'Enter Short Text'])->setDataFromResource($data['ShortText']) ?>
                                <?php else : ?>
                                    <?= $this->input("PP_ShortText", ['placeholder' => 'Enter Short Text']); ?>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>

                    <?php if ($data['FeaturesAndBenefits']) { ?>
                        <div class="feature-benefit-list feature-benefit-list-transconti">
                            <?php if ($this->editmode) : ?>
                                <div class="attr-font">Attribute Name = Name</div>
                            <?php endif; ?>
                            <h4>
                                <span class="orange">
                                    <strong>
                                        <?php if ($this->input("PPF_ProductName")->isEmpty()) : ?>
                                            <?= $this->input("PPF_ProductName", ["placeholder" => "Enter Product Name"])->setDataFromResource($data['ProductName']) ?>
                                        <?php else : ?>
                                            <?= $this->input("PPF_ProductName", ["placeholder" => "Enter Product Name"]); ?>
                                        <?php endif; ?>
                                    </strong>
                                </span>

                                <span class="light-black" style="color:black">
                                    <?= $this->input("PPF_FeatureBenefitsLabel", ['placeholder' => 'Features and Benefits']) ?>
                                </span>

                            </h4>

                            <ul>
                                <?php
                                foreach ($data['FeaturesAndBenefits'] as $key => $item) {
                                    if ($item) {
                                ?>
                                        <li><?= $item['FeatureName'] ?></li>
                                <?php
                                    }
                                }
                                ?>
                            </ul>

                            <p>
                                <?= $this->textarea("PPFB_Comment", ['placeholder' => 'Enter text']) ?>
                            </p>
                        </div>
                    <?php } ?>

                    <?php if ($data['Applications'] || $data['Markets'] || $data['CoverCompounds']) { ?>
                        <div class="table">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <?php if ($data['Markets']) { ?>
                                            <th width="30%" class="orange"><?= $this->translate('CS_Markets_Label') ?></th>
                                        <?php } ?>

                                        <?php if ($data['Applications']) { ?>
                                            <th width="30%" class="orange"><?= $this->translate('CS_Applications_Label') ?></th>
                                        <?php } ?>

                                        <?php if ($data['CoverCompounds']) { ?>
                                            <th width="30%" class="orange"><?= $this->translate('CS_Cover_Compounds_Label') ?></th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr valign="top">
                                        <?php if ($data['Markets']) { ?>
                                            <td>
                                                <?= $data['Markets'] ?>
                                            </td>
                                        <?php } ?>
                                        <?php if ($data['Applications']) { ?>
                                            <td>
                                                <?= $data['Applications'] ?>
                                            </td>
                                        <?php } ?>

                                        <?php if ($data['CoverCompounds']) { ?>
                                            <td>
                                                <?= $data['CoverCompounds'] ?>
                                                <p class="details"><?= $this->input("PP_CoverCompoundComment", ['placeholder' => 'Enter comment']) ?></p>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                </tbody>
                            </table>

                            <p class="note">
                                <?= $this->input("PP_ApplicationComment", ['placeholder' => 'Enter Application Comment']) ?>
                            </p>

                        </div>
                    <?php } ?>

                    <div class="labels">
                        <table width="100%">
                            <tr>
                                <th>
                                    <?= $this->input("PP_CostPerTon", ['placeholder' => 'Get a lower cost-per-ton conveyed']) ?>
                                </th>
                                <th class="orange-bg">
                                    <?= $this->input("PP_TensionRange", ['placeholder' => 'Tension Range: 330 – 1500 PIW']) ?>
                                </th>
                            </tr>
                        </table>
                    </div>

                </section>
            <?php else : ?>
                <section class="fortressxp-belts">
                    <?php if (!$this->input("CS_ProductName")->isEmpty()) : ?>
                        <h1 class="orange">
                            <?= $this->input("CS_ProductName", ['placeholder' => 'Enter Product Name']); ?>

                        </h1>
                    <?php endif; ?>

                    <?php $productImgSrcObj =  $this->image("PP_Product_Image"); ?>

                    <?php if (!$this->input("PP_ShortText")->isEmpty() || !empty($productImgSrcObj)) : ?>
                        <div class="media media-transconti pt-0">

                            <?php if (!$this->input("PP_ShortText")->isEmpty()) : ?>
                                <div class="media-body">
                                    <p>
                                        <?= $this->input("PP_ShortText", ['placeholder' => 'Enter Short Text']); ?>
                                    </p>
                                </div>
                            <?php endif; ?>
            
                        </div>
                    <?php endif; ?>

                    <?php if ($data['FeaturesAndBenefits']) : ?>
                        <?php if (!($this->input("PPF_ProductName")->isEmpty() || $this->input("PPF_FeatureBenefitsLabel")->isEmpty() || $this->textarea("PPFB_Comment")->isEmpty()) || $data['FeaturesAndBenefits']) : ?>
                            <div class="feature-benefit-list feature-benefit-list-transconti">
                                <?php if (!($this->input("PPF_ProductName")->isEmpty() || $this->input("PPF_FeatureBenefitsLabel")->isEmpty())) : ?>
                                    <h4>
                                        <?php if (!$this->input("PPF_ProductName")->isEmpty()) : ?>
                                            <span class="orange">
                                                <strong>
                                                    <?= $this->input("PPF_ProductName", ['placeholder' => 'Enter Product Name']); ?>
                                                </strong>
                                            </span>
                                        <?php endif; ?>

                                        <?php if (!$this->input("PPF_FeatureBenefitsLabel")->isEmpty()) : ?>
                                            <span class="features-benefit-black">
                                                <?= $this->input("PPF_FeatureBenefitsLabel", ['placeholder' => 'Enter Feature Benefits Label']); ?>
                                            </span>
                                        <?php endif; ?>
                                    </h4>
                                <?php endif; ?>

                                <?php if ($data['FeaturesAndBenefits']) : ?>
                                    <ul>
                                        <?php
                                        foreach ($data['FeaturesAndBenefits'] as $key => $item) {
                                            if ($item) {
                                        ?>
                                                <li><?= $item['FeatureName'] ?></li>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                <?php endif; ?>

                                <?php if (!$this->textarea("PPFB_Comment")->isEmpty()) : ?>
                                    <p>
                                        <?= $this->textarea("PPFB_Comment", ['placeholder' => 'Enter Comment']); ?>
                                    </p>
                                <?php endif; ?>

                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($data['Applications'] || $data['Markets'] || $data['CoverCompounds']) { ?>

                        <div class="table">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <?php if ($data['Markets']) { ?>
                                            <th width="30%" class="orange"><?= $this->translate('CS_Markets_Label') ?></th>
                                        <?php } ?>

                                        <?php if ($data['Applications']) { ?>
                                            <th width="30%" class="orange"><?= $this->translate('CS_Applications_Label') ?></th>
                                        <?php } ?>

                                        <?php if ($data['CoverCompounds']) { ?>
                                            <th width="30%" class="orange"><?= $this->translate('CS_Cover_Compounds_Label') ?></th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr valign="top">
                                        <?php if ($data['Markets']) { ?>
                                            <td>
                                                <?= $data['Markets'] ?>
                                            </td>
                                        <?php } ?>
                                        <?php if ($data['Applications']) { ?>
                                            <td>
                                                <?= $data['Applications'] ?>
                                            </td>
                                        <?php } ?>

                                        <?php if ($data['CoverCompounds']) { ?>
                                            <td>
                                                <?= $data['CoverCompounds'] ?>
                                                <p class="details"><?= $this->input("PP_CoverCompoundComment", ['placeholder' => 'Enter comment']) ?></p>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                </tbody>
                            </table>

                            <?php if (!$this->input("PP_ApplicationComment")->isEmpty()) : ?>
                                <p class="note">
                                    <?= $this->input("PP_ApplicationComment", ['placeholder' => 'Enter Application Comment']); ?>
                                </p>
                            <?php endif; ?>

                        </div>

                    <?php } ?>

                    <?php
                    $cbcImgSrcObj =  $this->image("PP_ConveyorBeltsComponents_Image");
                    if (!($this->input("PP_PowerOfFortressTechnology")->isEmpty() || $this->input("PP_ConveyorBeltsComponents")->isEmpty()) || $cbcImgSrcObj->getThumbnail('catalog_thumb') || $this->block("PP_ConveyorBeltsComponents_Points")->getCount()) { ?>
                        <div class="components-sec">
                            <?php if (!($this->input("PP_PowerOfFortressTechnology")->isEmpty() || $this->input("PP_ConveyorBeltsComponents")->isEmpty())) : ?>
                                <h3 class="orange">
                                    <?php if (!$this->input("PP_PowerOfFortressTechnology")->isEmpty()) : ?>
                                        <?= $this->input("PP_PowerOfFortressTechnology", ['placeholder' => 'Enter Application Comment']); ?>
                                    <?php endif; ?>
                                    <br />
                                    <?php if (!$this->input("PP_ConveyorBeltsComponents")->isEmpty()) : ?>
                                        <?= $this->input("PP_ConveyorBeltsComponents", ['placeholder' => 'Enter Conveyor Belts Components']); ?>
                                    <?php endif; ?>
                                </h3>
                            <?php endif; ?>
                            
                        </div>
                    <?php } ?>

                    <?php if (!($this->input("PP_CostPerTon")->isEmpty() || $this->input("PP_TensionRange")->isEmpty())) : ?>
                        <div class="labels">
                            <table width="100%">
                                <tr>
                                    <th>
                                        <?php if (!$this->input("PP_CostPerTon")->isEmpty()) : ?>
                                            <?= $this->input("PP_CostPerTon", ['placeholder' => 'Enter Cost Per Ton']); ?>
                                        <?php endif; ?>
                                    </th>
                                    <th class="orange-bg">
                                        <?php if (!$this->input("PP_TensionRange")->isEmpty()) : ?>
                                            <?= $this->input("PP_TensionRange", ['placeholder' => 'Enter Tension Range']); ?>
                                        <?php endif; ?>
                                    </th>
                                </tr>
                            </table>
                        </div>
                    <?php endif; ?>

                </section>
            <?php endif; ?>

            <?php if ($data['productTables']) : ?>
                <section class="belts-information">
                    <?php if ($this->editmode) : ?>
                        <div class="attr-font">Attribute Name = Name </div>
                    <?php endif; ?>
                    <h1 class="heading-info">
                        <span class="orange">
                            <?php if ($this->editmode) : ?>
                                <?php if ($this->input("PP_MoreInfoHeading")->isEmpty()) : ?>
                                    <?= $this->input("PP_MoreInfoHeading", ['placeholder' => 'Enter Heading'])->setDataFromResource($data['ProductName']) ?>
                                <?php else : ?>
                                    <?= $this->input("PP_MoreInfoHeading", ['placeholder' => 'Enter Heading']); ?>
                                <?php endif; ?>
                            <?php else : ?>
                                <?= $this->input("PP_MoreInfoHeading", ['placeholder' => 'Enter Heading']) ?>
                            <?php endif; ?>
                        </span>
                        <span class="light-black">
                            <?= $this->input("PP_MoreInfo", ['placeholder' => 'Belt Information']) ?>
                        </span>
                    </h1>

                    <?php if (isset($data['productTables']['Conveyor Belt Data'])) { ?>

                        <?php
                        $conveyorBeltDataArray = $data['productTables']['Conveyor Belt Data'];

                        foreach ($conveyorBeltDataArray as $chunkKey => $conveyorBeltData) {
                        ?>
                            <div class="new-page">
                                <?php if ($this->editmode) : ?>
                                    <div class="attr-font">Attribute Name = Name</div>
                                <?php endif; ?>
                                <h3 style="padding-top: 0px;">
                                    <?php if ($this->editmode) : ?>
                                        <?php if ($this->input("PP_Conveyor_Belt_Data_{$chunkKey}")->isEmpty()) : ?>
                                            <?= $this->input("PP_Conveyor_Belt_Data_{$chunkKey}", ['placeholder' => 'Enter Conveyor Belt Data'])->setDataFromResource($data['ProductName']) ?>
                                        <?php else : ?>
                                            <?= $this->input("PP_Conveyor_Belt_Data_{$chunkKey}", ['placeholder' => 'Enter Conveyor Belt Data']); ?>
                                        <?php endif; ?>

                                        <?php
                                        if ($this->input("CS_Conveyor_Belt_Data_{$chunkKey}")->isEmpty()) {
                                            echo $this->input("CS_Conveyor_Belt_Data_{$chunkKey}", ['placeholder' => 'Enter Conveyor Belt Data'])->setDataFromResource($this->translate("CS_Conveyor_Belt_Data"));
                                        } else {
                                            echo $this->input("CS_Conveyor_Belt_Data_{$chunkKey}", ['placeholder' => 'Enter Conveyor Belt Data']);
                                        }
                                        ?>

                                    <?php else : ?>
                                        <?= $this->input("PP_Conveyor_Belt_Data_{$chunkKey}", ['placeholder' => 'Enter Conveyor Belt Data']) ?>
                                        <?= $this->input("CS_Conveyor_Belt_Data_{$chunkKey}", ['placeholder' => 'Enter Conveyor Belt Data']) ?>
                                    <?php endif; ?>
                                </h3>

                                <div class="table-data">
                                    <?= $this->input("PP_Conveyor_Belt_Data_Head_Note_{$chunkKey}", ["placeholder" => "Table based on ISO 703 testing procedure."]); ?>
                                    <?php foreach ($conveyorBeltData as $key => $value) { ?>
                                        <table width="100%">
                                            <thead>
                                                <tr class="orange-bg">
                                                    <th align="left" colspan="<?= $value['theadfirstRowColspan'] ?>"><?= $this->translate($key) ?></th>
                                                </tr>
                                                <?php
                                                $theadSecondRow = $value['theadSecondRow'];
                                                ?>
                                                <tr class="grey-bg">
                                                    <?php
                                                    $firstKey = array_key_first($theadSecondRow);
                                                    foreach ($theadSecondRow as $key => $td) {
                                                        $style = '';
                                                        if ($firstKey == $key) {
                                                            $style = 'align="left" width="17.2%"';
                                                        } else {
                                                            // $style = 'width="9.2%"';
                                                        }
                                                    ?>
                                                        <th <?= $style; ?>><?= $td ?></th>
                                                    <?php
                                                    }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $tbody = $value['tbody'];

                                                foreach ($tbody as $key => $trows) {
                                                ?>
                                                    <tr align="center">
                                                        <?php
                                                        $firstKey = array_key_first($trows);
                                                        foreach ($trows as $key => $value) {
                                                            $style = '';
                                                            if ($firstKey == $key) {
                                                                $style = 'align="left"';
                                                                $value = $this->translate($value);
                                                            }
                                                        ?>
                                                            <td <?= $style; ?>><?= $value ?></td>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                </div>

                                <?php if ($this->editmode) : ?>
                                    <p class="table-notes" style="margin-bottom: 0px;">
                                        <?= $this->textarea("PP_Conveyor_Belt_Data_Comment_{$chunkKey}", ['placeholder' => 'Enter Conveyor Belt Data Comment']); ?>
                                    </p>
                                <?php else : ?>
                                    <?php if (!$this->textarea("PP_Conveyor_Belt_Data_Comment_{$chunkKey}")->isEmpty()) : ?>
                                        <p class="table-notes" style="margin-bottom: 0px;">
                                            <?= $this->textarea("PP_Conveyor_Belt_Data_Comment_{$chunkKey}", ['placeholder' => 'Enter Conveyor Belt Data Comment']) ?>
                                        </p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                    <?php
                        }
                    }
                    ?>

                    <?php if (isset($data['productTables']['Load Support – Maximum Belt Width Data'])) { ?>

                        <?php

                        $LoadSupportMaximumBeltWidthDataArr = $data['productTables']['Load Support – Maximum Belt Width Data'];

                        foreach ($LoadSupportMaximumBeltWidthDataArr as $chunkKey => $LoadSupportMaximumBeltWidthData) {
                        ?>
                            <div class="new-page" style="margin-top: 0px;">
                                <?php if ($this->editmode) : ?>
                                    <div class="attr-font">Attribute Name = Name</div>
                                <?php endif; ?>
                                <h3 style="padding-top: 0px;">
                                    <?php if ($this->editmode) : ?>
                                        <?php if ($this->input("PP_Load_Support_Maximum_Belt_{$chunkKey}")->isEmpty()) : ?>
                                            <?= $this->input("PP_Load_Support_Maximum_Belt_{$chunkKey}", ['placeholder' => 'Enter Load Support Maximum Belt'])->setDataFromResource($data['ProductName'] . ' ' . $this->translate('CS_Load_Support_Maximum_Belt_Width_Data')) ?>
                                        <?php else : ?>
                                            <?= $this->input("PP_Load_Support_Maximum_Belt_{$chunkKey}", ['placeholder' => 'Enter Load Support Maximum Belt']); ?>
                                        <?php endif; ?>
                                    <?php else : ?>
                                        <?= $this->input("PP_Load_Support_Maximum_Belt_{$chunkKey}", ['placeholder' => 'Enter Load Support Maximum Belt']) ?>
                                    <?php endif; ?>

                                </h3>

                                <div class="table-data" style="margin-bottom: 0px; margin-top: 0px;">
                                    <?= $this->input("PP_Load_Support_Maximum_Belt_Head_Note_{$chunkKey}", ["placeholder" => "Table based on ISO 703 testing procedure."]); ?>
                                    <?php


                                    foreach ($LoadSupportMaximumBeltWidthData as $key => $value) {

                                    ?>

                                        <table width="100%">
                                            <thead>
                                                <tr class="orange-bg">
                                                    <th colspan="<?= $value['theadfirstRowColspan'] ?>" align="left"><?= $this->translate($key) ?></th>
                                                </tr>

                                                <tr class="white-bg">
                                                    <?php
                                                    $theadSecondRowGroup = $value['theadSecondRowGroup'];
                                                    $firstKey = array_key_first($theadSecondRowGroup);
                                                    // $firstKey = array_key_first($theadSecondRow);
                                                    foreach ($theadSecondRowGroup as $key => $colspan) {
                                                        $style = '';
                                                        if ($firstKey == $key) {
                                                            $style = 'align="left"';
                                                        }

                                                    ?>
                                                        <th colspan="<?= $colspan ?>" <?= $style ?>><?= $this->translate($key) ?></th>
                                                    <?php
                                                    }
                                                    ?>
                                                </tr>

                                                <tr class="white-bg">
                                                    <?php
                                                    $theadSecondRow = $value['theadSecondRow'];
                                                    $firstKey = array_key_first($theadSecondRow);
                                                    foreach ($theadSecondRow as $key => $td) {
                                                        $style = '';
                                                        if ($firstKey == $key) {
                                                            $style = 'align="left" width="13.6%"';
                                                        } else {
                                                            $style = 'width="7.2%"';
                                                        }
                                                    ?>
                                                        <th <?= $style; ?>><?= $this->translate($td) ?></th>
                                                    <?php
                                                    }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $tbody = $value['tbody'];

                                                foreach ($tbody as $key => $trows) {
                                                ?>
                                                    <tr align="center">
                                                        <?php
                                                        $firstKey = array_key_first($trows);
                                                        foreach ($trows as $key => $value) {
                                                            $style = '';
                                                            if ($firstKey == $key) { ?>
                                                                <th align="left" class="grey-bg border-bottom-0" scope="row"><?= $value ?></th>
                                                            <?php } else { ?>
                                                                <td><?= $value ?></td>
                                                            <?php } ?>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                    <?php
                                    }

                                    ?>

                                </div>
                                <?php if ($this->editmode) : ?>
                                    <p class="table-notes" style="margin-bottom: 0px;">
                                        <?= $this->textarea("PP_Load_Support_Maximum_Belt_Comment_{$chunkKey}", ['placeholder' => 'Enter Load Support Maximum Belt Comment']); ?>
                                    </p>
                                <?php else : ?>
                                    <?php if (!$this->textarea("PP_Load_Support_Maximum_Belt_Comment_{$chunkKey}")->isEmpty()) : ?>
                                        <p class="table-notes" style="margin-bottom: 0px;">
                                            <?= $this->textarea("PP_Load_Support_Maximum_Belt_Comment_{$chunkKey}", ['placeholder' => 'Enter Load Support Maximum Belt Comment']) ?>
                                        </p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                    <?php
                        }
                    }
                    ?>

                    <?php if (isset($data['productTables']['Troughability Minimum Belt Width'])) { ?>

                        <?php

                        $TroughabilityMinimumBeltWidthArray = $data['productTables']['Troughability Minimum Belt Width'];

                        foreach ($TroughabilityMinimumBeltWidthArray as $chunkKey => $TroughabilityMinimumBeltWidth) {
                        ?>
                            <div class="new-page">
                                <?php if ($this->editmode) : ?>
                                    <div class="attr-font">Attribute Name = Name</div>
                                <?php endif; ?>
                                <h3>
                                    <strong>
                                        <?php if ($this->editmode) : ?>
                                            <?php if ($this->input("PP_Troughability_Minimum_Belt_Width_{$chunkKey}")->isEmpty()) : ?>
                                                <?= $this->input("PP_Troughability_Minimum_Belt_Width_{$chunkKey}", ['placeholder' => 'Enter Troughability Minimum Belt Width'])->setDataFromResource($data['ProductName'] . ' ' . $this->translate('CS_Troughability_Minimum_Belt_Width')) ?>
                                            <?php else : ?>
                                                <?= $this->input("PP_Troughability_Minimum_Belt_Width_{$chunkKey}", ['placeholder' => 'Enter Troughability Minimum Belt Width']); ?>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <?= $this->input("PP_Troughability_Minimum_Belt_Width_{$chunkKey}", ['placeholder' => 'Enter Troughability Minimum Belt Width']) ?>
                                        <?php endif; ?>

                                    </strong>
                                </h3>

                                <div class="table-data">
                                    <?= $this->input("PP_Troughability_Minimum_Belt_Width_Head_Note_{$chunkKey}", ["placeholder" => "Table based on ISO 703 testing procedure."]); ?>

                                    <?php


                                    foreach ($TroughabilityMinimumBeltWidth as $key => $value) {

                                    ?>
                                        <table width="100%">
                                            <thead>
                                                <tr class="orange-bg">
                                                    <th colspan="<?= $value['theadfirstRowColspan'] ?>" align="left"><?= $this->translate($key) ?></th>
                                                </tr>

                                                <tr class="grey-bg">
                                                    <?php
                                                    $theadSecondRow = $value['theadSecondRow'];
                                                    // $firstKey = array_key_first($theadSecondRow);
                                                    foreach ($theadSecondRow as $key => $td) {
                                                        if ($key < 1) {
                                                            continue;
                                                        }

                                                        $style = '';
                                                        if ($key == 1) {
                                                            $style = 'colspan="2" align="left"';
                                                        } else {
                                                            // $style = 'width="8.8%"';
                                                        }
                                                    ?>
                                                        <th <?= $style; ?>><?= $td ?></th>
                                                    <?php
                                                    }
                                                    ?>
                                                </tr>

                                            </thead>
                                            <tbody>
                                                <?php
                                                $tbody = $value['tbody'];
                                                $onlyOnce = false;
                                                $onlyOnceStyle = false;
                                                foreach ($tbody as $key => $trows) {
                                                ?>
                                                    <tr align="center">
                                                        <?php

                                                        $onlyOnceData = $trows[0];

                                                        unset($trows[0]);
                                                        if (!$onlyOnce) {
                                                        ?>
                                                            <th rowspan="3" class="border-0 w-20"><?= $this->translate($onlyOnceData) ?></th>
                                                        <?php
                                                            $onlyOnce = true;
                                                        }

                                                        $firstKey = array_key_first($trows);
                                                        foreach ($trows as $key => $value) {
                                                            $style = '';
                                                            if ($firstKey == $key) {
                                                                $style = 'align="left"';
                                                                $value = $this->translate($value);
                                                            }

                                                            if (!$onlyOnceStyle) {
                                                                $style .= ' class="border-right w-20"';
                                                                $onlyOnceStyle = true;
                                                            }
                                                        ?>
                                                            <td <?= $style; ?>><?= $value ?></td>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                    <?php
                                    }

                                    ?>

                                </div>
                                <?php if ($this->editmode) : ?>
                                    <p class="table-notes">
                                        <?= $this->textarea("PP_Troughability_Minimum_Belt_Width_Comment_{$chunkKey}", ['placeholder' => 'Enter Troughability Minimum Belt Width']); ?>
                                    </p>
                                <?php else : ?>
                                    <?php if (!$this->textarea("PP_Troughability_Minimum_Belt_Width_Comment_{$chunkKey}")->isEmpty()) : ?>
                                        <p class="table-notes">
                                            <?= $this->textarea("PP_Troughability_Minimum_Belt_Width_Comment_{$chunkKey}", ['placeholder' => 'Enter Troughability Minimum Belt Width']) ?>
                                        </p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                    <?php
                        }
                    }
                    ?>

                    <?php if (isset($data['productTables']['Minimum Pulley Diameters'])) { ?>

                        <?php
                        $MinimumPulleyDiametersArray = $data['productTables']['Minimum Pulley Diameters'];

                        foreach ($MinimumPulleyDiametersArray as $chunkKey => $MinimumPulleyDiameters) {
                        ?>
                            <div class="new-page">
                                <?php if ($this->editmode) : ?>
                                    <div class="attr-font">Attribute Name = Name</div>
                                <?php endif; ?>
                                <h3>
                                    <strong>
                                        <?php if ($this->editmode) : ?>
                                            <?php if ($this->input("PP_Minimum_Pulley_Diameters_{$chunkKey}")->isEmpty()) : ?>
                                                <?= $this->input("PP_Minimum_Pulley_Diameters_{$chunkKey}", ['placeholder' => 'Enter Minimum Pulley Diameters'])->setDataFromResource($data['ProductName'] . ' ' . $this->translate('CS_Minimum_Pulley_Diameters')) ?>
                                            <?php else : ?>
                                                <?= $this->input("PP_Minimum_Pulley_Diameters_{$chunkKey}", ['placeholder' => 'Enter Minimum Pulley Diameters']); ?>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <?= $this->input("PP_Minimum_Pulley_Diameters_{$chunkKey}", ['placeholder' => 'Enter Minimum Pulley Diameters']) ?>
                                        <?php endif; ?>

                                    </strong>
                                </h3>

                                <div class="table-data">
                                    <?= $this->input("PP_Minimum_Pulley_Diameters_Head_Note_{$chunkKey}", ["placeholder" => "Table based on ISO 703 testing procedure."]); ?>
                                    <?php

                                    foreach ($MinimumPulleyDiameters as $key => $value) {

                                    ?>

                                        <table width="100%">
                                            <thead>
                                                <tr align="left" class="orange-bg">
                                                    <th align="left" colspan="<?= $value['theadfirstRowColspan'] ?>">
                                                        <?= $this->translate($key) ?>
                                                    </th>
                                                </tr>
                                                <?php
                                                $theadSecondRow = $value['theadSecondRow'];
                                                ?>
                                                <tr class="grey-bg">
                                                    <?php
                                                    $firstKey = array_key_first($theadSecondRow);
                                                    foreach ($theadSecondRow as $key => $td) {
                                                        $style = '';
                                                        if ($firstKey == $key) {
                                                            $style = 'align="left" width="17.2%"';
                                                        }
                                                    ?>
                                                        <th <?= $style; ?>><?= $td ?></th>
                                                    <?php
                                                    }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $tbody = $value['tbody'];

                                                foreach ($tbody as $key => $trows) {
                                                ?>
                                                    <tr align="center">
                                                        <?php
                                                        $firstKey = array_key_first($trows);
                                                        foreach ($trows as $key => $value) {
                                                            $style = '';
                                                            if ($firstKey == $key) {
                                                                $style = 'align="left"';
                                                                $value = $this->translate($value);
                                                            }
                                                        ?>
                                                            <td <?= $style; ?>><?= $value ?></td>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <?php if ($this->editmode) : ?>
                                    <p class="table-notes">
                                        <?= $this->textarea("PP_Minimum_Pulley_Diameters_Comment_{$chunkKey}", ['placeholder' => 'Enter Minimum Pulley Diameters']); ?>
                                    </p>
                                <?php else : ?>
                                    <?php if (!$this->textarea("PP_Minimum_Pulley_Diameters_Comment_{$chunkKey}")->isEmpty()) : ?>
                                        <p class="table-notes">
                                            <?= $this->textarea("PP_Minimum_Pulley_Diameters_Comment_{$chunkKey}", ['placeholder' => 'Enter Minimum Pulley Diameters']) ?>
                                        </p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                    <?php
                        }
                    }
                    ?>

                    <?php if (isset($data['productTables']['Elevator Belt Data'])) { ?>

                        <?php
                        $ElevatorBeltDataArray = $data['productTables']['Elevator Belt Data'];

                        foreach ($ElevatorBeltDataArray as $chunkKey => $ElevatorBeltData) {

                        ?>
                            <div class="new-page">
                                <?php if ($this->editmode) : ?>
                                    <div class="attr-font">Attribute Name = Name</div>
                                <?php endif; ?>
                                <h3>
                                    <strong>
                                        <?php if ($this->editmode) : ?>
                                            <?php if ($this->input("PP_Elevator_Belt_Data_{$chunkKey}")->isEmpty()) : ?>
                                                <?= $this->input("PP_Elevator_Belt_Data_{$chunkKey}", ['placeholder' => 'Enter Elevator Belt Data'])->setDataFromResource($data['ProductName'] . ' ' . $this->translate('CS_Elevator_Belt_Data')) ?>
                                            <?php else : ?>
                                                <?= $this->input("PP_Elevator_Belt_Data_{$chunkKey}", ['placeholder' => 'Enter Elevator Belt Data']); ?>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <?= $this->input("PP_Elevator_Belt_Data_{$chunkKey}", ['placeholder' => 'Enter Elevator Belt Data']) ?>
                                        <?php endif; ?>

                                    </strong>
                                </h3>

                                <div class="table-data">
                                    <?= $this->input("PP_Elevator_Belt_Data_Head_Note_{$chunkKey}", ["placeholder" => "Table based on ISO 703 testing procedure."]); ?>
                                    <?php

                                    foreach ($ElevatorBeltData as $key => $value) {

                                    ?>

                                        <table width="100%">
                                            <thead>
                                                <tr align="left" class="orange-bg">
                                                    <th align="left" colspan="<?= $value['theadfirstRowColspan'] ?>"><?= $this->translate($key) ?></th>
                                                </tr>
                                                <?php
                                                $theadSecondRow = $value['theadSecondRow'];
                                                ?>
                                                <tr class="grey-bg">
                                                    <?php
                                                    $firstKey = array_key_first($theadSecondRow);
                                                    foreach ($theadSecondRow as $key => $td) {
                                                        $style = '';
                                                        if ($firstKey == $key) {
                                                            $style = 'align="left" width="17.2%"';
                                                        }
                                                    ?>
                                                        <th <?= $style; ?>><?= $td ?></th>
                                                    <?php
                                                    }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $tbody = $value['tbody'];

                                                foreach ($tbody as $key => $trows) {
                                                ?>
                                                    <tr align="center">
                                                        <?php
                                                        $firstKey = array_key_first($trows);
                                                        foreach ($trows as $key => $value) {
                                                            $style = '';
                                                            if ($firstKey == $key) {
                                                                $style = 'align="left"';
                                                                $value = $this->translate($value);
                                                            }
                                                        ?>
                                                            <td <?= $style; ?>><?= $value ?></td>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <?php if ($this->editmode) : ?>
                                    <p class="table-notes">
                                        <?= $this->textarea("PP_Elevator_Belt_Data_Comment_{$chunkKey}", ['placeholder' => 'Enter Elevator Belt Data Comment']); ?>
                                    </p>
                                <?php else : ?>
                                    <?php if (!$this->textarea("PP_Elevator_Belt_Data_Comment_{$chunkKey}")->isEmpty()) : ?>
                                        <p class="table-notes">
                                            <?= $this->textarea("PP_Elevator_Belt_Data_Comment_{$chunkKey}", ['placeholder' => 'Enter Elevator Belt Data Comment']) ?>
                                        </p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                    <?php
                        }
                    }
                    ?>

                    <?php if (isset($data['productTables']['Maximum Bucket Projection'])) { ?>

                        <?php
                        $MaximumBucketProjectionArray = $data['productTables']['Maximum Bucket Projection'];

                        foreach ($MaximumBucketProjectionArray as $chunkKey => $MaximumBucketProjection) {

                        ?>
                            <div class="new-page">
                                <?php if ($this->editmode) : ?>
                                    <div class="attr-font">Attribute Name = Name</div>
                                <?php endif; ?>
                                <h3>
                                    <strong>
                                        <?php if ($this->editmode) : ?>
                                            <?php if ($this->input("PP_Maximum_Bucket_Projection_{$chunkKey}")->isEmpty()) : ?>
                                                <?= $this->input("PP_Maximum_Bucket_Projection_{$chunkKey}", ['placeholder' => 'Enter Maximum Bucket Projection'])->setDataFromResource($data['ProductName'] . ' ' . $this->translate('CS_Maximum_Bucket_Projection')) ?>
                                            <?php else : ?>
                                                <?= $this->input("PP_Maximum_Bucket_Projection_{$chunkKey}", ['placeholder' => 'Enter Maximum Bucket Projection']); ?>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <?= $this->input("PP_Maximum_Bucket_Projection_{$chunkKey}", ['placeholder' => 'Enter Maximum Bucket Projection']) ?>
                                        <?php endif; ?>

                                    </strong>
                                </h3>

                                <div class="table-data">
                                    <?= $this->input("PP_Maximum_Bucket_Projection_Head_Note_{$chunkKey}", ["placeholder" => "Table based on ISO 703 testing procedure."]); ?>
                                    <?php

                                    foreach ($MaximumBucketProjection as $key => $value) {

                                    ?>

                                        <table width="100%">
                                            <thead>
                                                <tr align="left" class="orange-bg">
                                                    <th align="left" colspan="<?= $value['theadfirstRowColspan'] ?>"><?= $this->translate($key) ?></th>
                                                </tr>
                                                <?php
                                                $theadSecondRow = $value['theadSecondRow'];
                                                ?>
                                                <tr class="grey-bg">
                                                    <?php
                                                    $firstKey = array_key_first($theadSecondRow);
                                                    foreach ($theadSecondRow as $key => $td) {
                                                        $style = '';
                                                        if ($firstKey == $key) {
                                                            $style = 'align="left" width="17.2%"';
                                                            //$value = $this->translate($value);
                                                        }
                                                    ?>
                                                        <th <?= $style; ?>><?= $td ?></th>
                                                    <?php
                                                    }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $tbody = $value['tbody'];

                                                foreach ($tbody as $key => $trows) {
                                                ?>
                                                    <tr align="center">
                                                        <?php
                                                        $firstKey = array_key_first($trows);
                                                        foreach ($trows as $key => $value) {
                                                            $style = '';
                                                            if ($firstKey == $key) {
                                                                $style = 'align="left"';
                                                                $value = $this->translate($value);
                                                            }
                                                        ?>
                                                            <td <?= $style; ?>><?= $value ?></td>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <?php if ($this->editmode) : ?>
                                    <p class="table-notes">
                                        <?= $this->textarea("PP_Maximum_Bucket_Projection_Comment_{$chunkKey}", ['placeholder' => 'Enter Maximum Bucket Projection Comment']); ?>
                                    </p>
                                <?php else : ?>
                                    <?php if (!$this->textarea("PP_Maximum_Bucket_Projection_Comment_{$chunkKey}")->isEmpty()) : ?>
                                        <p class="table-notes">
                                            <?= $this->textarea("PP_Maximum_Bucket_Projection_Comment_{$chunkKey}", ['placeholder' => 'Enter Maximum Bucket Projection Comment']) ?>
                                        </p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                    <?php
                        }
                    }
                    ?>

                    <?php if (isset($data['productTables']['Standard Specifications'])) { ?>

                        <?php
                        $StandardSpecificationsArray = $data['productTables']['Standard Specifications'];

                        foreach ($StandardSpecificationsArray as $chunkKey => $StandardSpecifications) {

                        ?>
                            <div class="new-page">
                                <?php if ($this->editmode) : ?>
                                    <div class="attr-font">Attribute Name = Name</div>
                                <?php endif; ?>
                                <h3>
                                    <strong>
                                        <?php if ($this->editmode) : ?>
                                            <?php if ($this->input("PP_Standard_Specifications_{$chunkKey}")->isEmpty()) : ?>
                                                <?= $this->input("PP_Standard_Specifications_{$chunkKey}", ['placeholder' => 'Enter Standard Specifications'])->setDataFromResource($data['ProductName'] . ' ' . $this->translate('CS_Standard_Specifications')) ?>
                                            <?php else : ?>
                                                <?= $this->input("PP_Standard_Specifications_{$chunkKey}", ['placeholder' => 'Enter Standard Specifications']); ?>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <?= $this->input("PP_Standard_Specifications_{$chunkKey}", ['placeholder' => 'Enter Standard Specifications']) ?>
                                        <?php endif; ?>

                                    </strong>
                                </h3>

                                <div class="table-data">
                                    <?= $this->input("PP_Standard_Specifications_Head_Note_{$chunkKey}", ["placeholder" => "Table based on ISO 703 testing procedure."]); ?>
                                    <?php

                                    foreach ($StandardSpecifications as $key => $value) {

                                    ?>

                                        <table width="100%">
                                            <thead>
                                                <tr align="left" class="orange-bg">
                                                    <th align="left" colspan="<?= $value['theadfirstRowColspan'] ?>"><?= $this->translate($key) ?></th>
                                                </tr>
                                                <?php
                                                $theadSecondRow = $value['theadSecondRow'];
                                                ?>
                                                <tr class="grey-bg">
                                                    <?php
                                                    $firstKey = array_key_first($theadSecondRow);
                                                    foreach ($theadSecondRow as $key => $td) {
                                                        $style = '';
                                                        if ($firstKey == $key) {
                                                            $style = 'align="left" width="17.2%"';
                                                        }
                                                    ?>
                                                        <th <?= $style; ?>><?= $td ?></th>
                                                    <?php
                                                    }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $tbody = $value['tbody'];

                                                foreach ($tbody as $key => $trows) {
                                                ?>
                                                    <tr align="center">
                                                        <?php
                                                        $firstKey = array_key_first($trows);
                                                        foreach ($trows as $key => $value) {
                                                            $style = '';
                                                            if ($firstKey == $key) {
                                                                $style = 'align="left"';
                                                                $value = $this->translate($value);
                                                            }
                                                        ?>
                                                            <td <?= $style; ?>><?= $value ?></td>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <?php if ($this->editmode) : ?>
                                    <?= $this->textarea("PP_Standard_Specifications_Comment_{$chunkKey}", ['class' => 'note', 'placeholder' => 'Enter Standard Specifications']); ?>
                                <?php else : ?>
                                    <p class="table-notes"><?= $this->textarea("PP_Standard_Specifications_Comment_{$chunkKey}", ['placeholder' => 'Enter Standard Specifications']); ?></p>
                                <?php endif; ?>
                            </div>
                    <?php
                        }
                    }
                    ?>

                </section>
            <?php endif; ?>
        </main>
    </div>
<?php endif; ?>
