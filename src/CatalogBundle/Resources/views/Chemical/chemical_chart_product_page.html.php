<?php
if (!isset($this->parentContainer)) {
    $this->extend('CatalogBundle:Layouts:layout.html.php');
}
?>

<?php

if ($data) : ?>
    <div class="template">
        <section class="segregate">

            <div id="pageHeader"></div>

            <div class="footer">
                <footer class="flex-center <?php echo $footer_class; ?>">
                    <span class="logo">
                        <b>
                            <?php if ($this->editmode) : ?>
                                <?php if ($this->input("HHFP_Logo_Text1")->isEmpty()) : ?>
                                    <?= $this->input("HHFP_Logo_Text1")->setDataFromResource('Hose') ?>
                                <?php else : ?>
                                    <?= $this->input("HHFP_Logo_Text1"); ?>
                                <?php endif; ?>
                            <?php else : ?>
                                <?= $this->input("HHFP_Logo_Text1") ?>
                            <?php endif; ?>
                        </b>
                        <img src="<?= $footer_logo_src; ?>">
                    </span>
                    <div class="flex aligned ">
                        <h5>
                            <span>

                            </span>
                        </h5>
                        <div class="compatible">
                            <b>

                            </b>
                        </div>
                    </div>
                </footer>
            </div>

            <div class="footer1">
                <footer class="flex-center <?php echo $footer_class; ?>">
                    <div class="flex aligned ">
                        <h5>
                            <span>

                            </span>
                        </h5>
                    </div>
                </footer>
            </div>

            <div class="wrapper padding">
                <article class="container page-break-inside-avoid">

                    <!-- Starting grid here -->
                    <div class="inhRight">
                        <h1 class="borderBottom block marginBottom5 contitech-black">Chemical Charts
                        </h1>

                        <div class="flex flex-end">
                            <div style =" width:10%">
                            </div>
                            <div class="col-6">
                                <h6>Rating Scale</h6>
                                <div class="flex"> 
                                    <div class="col-6">
                                        <p><b>A</b> = May be used for Continuous Service</p>
                                        <p><b>I</b> = Insufficient data, contact customer service</p>
                                    </div>
                                    <div class="col-6">
                                        <p><b>B</b> = May be used for Intermittent Service</p>
                                        <p><b>X</b> = Do not use</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <h6>Gasket</h6>
                                <div class="flex">
                                    <div class="col-5">
                                        <p><b>T </b> = Teflon® </p>
                                        <p><b>V</b> = Viton®</p>
                                    </div>
                                    <div class="col-5">
                                        <p><b>N</b> = Polychloroprene</p>
                                        <p><b>S</b> = Silicone</p>
                                        
                                    </div>
                                    <div class="col-2">
                                        <p><b> </b> </p>
                                        <p><b> </b> </p>
                                        <p><b>B </b> = Nitrile </p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <table class="grid special marginBottom5 chart" cellspacing="0" cellpadding="0">
                            <thead>
                                <tr class="main-head">
                                    <td width="" colspan="2"></td>
                                    <td colspan="11">Continental Chemical Hose / Hose Tube Polymer</td>
                                    <td colspan="4" class="apex">Insta-Lock Fitting/Metal</td>
                                </tr>

                                <tr class="sub-head">
                                    <td width=""></td>
                                    <td width="">Temp</td>
                                    <td width="">Fabchem</td>
                                    <td width="">Gray Flexwing</td>
                                    <td width="">Yellow Flexwing</td>
                                    <td width="">Tan Flexwing</td>
                                    <td width="">Orange Flexwing</td>
                                    <td width="">Flexwing Petroleum</td>
                                    <td>Flexwing & ExtremeFlex Brown</td>
                                    <td>Purple Flexwing & ExtremeFlex Purple</td>
                                    <td>Blue Flexwing & Green</td>
                                    <td>Chem One® & Viper</td>
                                    <td>Hi-Per, Conti Chem Superior FEP & Teflon</td>
                                    <td width="" class="apex"></td>
                                    <td width="" class="apex"></td>
                                    <td width="" class="apex"></td>
                                    <td width="" class="apex"></td>
                                </tr>
                                <tr class="head">
                                    <td width=""></td>
                                    <td width="">(°F)*</td>
                                    <td width="">UHMWPE</td>
                                    <td width="">Butyl</td>
                                    <td width="">Hypalon</td>
                                    <td width="">NR</td>
                                    <td width="">Viton</td>
                                    <td width="">Nitrile</td>
                                    <td width="">CPE</td>
                                    <td width="">EPDM</td>
                                    <td width="">XLPE</td>
                                    <td width="">Alphasyn</td>
                                    <td width="">Teflon</td>
                                    <td width="" class="apex">316&nbsp;SS</td>
                                    <td width="" class="apex">Aluminum</td>
                                    <td width="" class="apex">Brass</td>
                                    <td width="" class="apex">Gasket</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="17">
                                        <h4>A</h4>
                                    </td>
                                </tr>
                                <?php
                                $i = 0;
                                if ($data) {
                                    foreach ($data as $key => $productData) { 
                                        if($productData['tubeMaterial'] == null || $productData['fittingMaterial'] == null || $productData['gasket'] == " ") {
                                            ?>
                                            <tr class=" tableNewFont">
                                                <?php foreach($productData as $key1 => $value){ ?>
                                                    <td><?php echo $value; ?></td>
                                                <?php } ?>
                                                <td><?php echo "";?></td>  
                                            </tr>
                                        <?php } else { ?>
                                            <tr class=" tableNewFont">
                                                <?php foreach ($productData as $key1 => $value) {
                                                    if ($key1 == 'tubeMaterial' || $key1 == 'fittingMaterial') {
                                                        //dd($value);
                                                        if($value == null) { ?>
                                                        <td><?php echo "";?></td>
                                                        <?php } else {
                                                            foreach($value as $key3 => $value3){ ?>
                                                            <td><?php echo $value3; ?></td>
                                                        <?php } }?>
                                                    <?php } else { ?>
                                                        <td><?php echo $value; ?></td>
                                                    <?php  }
                                                } ?>
                                            </tr>
                                        <?php }
                                        $i++;
                                    } 
                                } ?>

                            </tbody>
                        </table>

                        <span class="tableFooter">
                            *Fahrenheit to Celsius conversion key: 100°F (38°C), 125°F (52°C), 150°F (66°C), 275°F (135°C) and 500°F (260°C).
                            <br />This chemical chart is offered as a guide only. There are many variables to be considered with each application. Ratings are for tube polymer only! For an explanation
                            of ratings, see the initial page of these Chemical Charts in Appendix B. Contact customer service for chemicals or polymers not listed at 800-235-4632.
                        </span>
                    </div>
                </article>
            </div>

            <!-- Footer -->
            <!-- End Footer-->
        </section>
        <div class="hide">
        </div>
    </div>
<?php endif; ?>

<script type="text/javascript" src="/static/js/tableContinueLable.js"></script>

<style>
    .inhRight h1 {
        margin: 0;
        padding: 0 !important;
        font-size: 30px !important;
    }

    h6 {
        font-size: 10px; 
        margin-bottom: 0px;
        padding-bottom: 0px;
        /* border: 1px solid green; */
    }

    .chart.grid .sub-head td {
        border-bottom: 0 !important;
        padding: 5px 2px 0px 2px;
        word-break: break-all !important;
        vertical-align: bottom;
        /* border:1px solid red; */
        height: auto !important;
        word-wrap: break-word !important;
        font-size: 8px;
    }

    .chart.grid .head td {
        word-break: break-all !important;
        vertical-align: bottom;
        padding: 5px 0px 0px 1px;
        /* border:1px solid green; */
        height: auto !important;
        word-wrap: break-word !important;
        font-size: 8px;
        padding-top: 0px;
    }

    .tableNewFont tr {
        font-size: 8px;
    }
    .chart.grid {
        margin-top: 0;
        /* table-layout: unset; */
    }

    .chart.grid td {
        height: auto;
        /* word-break:break-all !important; */
        font-size: 10px;
    }

    .apex {
        background: #f0f0f0;
    }

    .chart h4 {
        padding: 0px;
        font-size: 10px;
    }

    .main-head td {
        border-top: 1px solid #737373;
        /* font-family: 'ContinentalStagSansLCG-Medium'; */
        font-size: 2px;
        font-weight: bold;
        vertical-align: bottom;
        word-spacing: -1px;
    }

    .flex-end {
        justify-content: flex-end;
    }

    .flex-end .col-6 {
        /* width:48%; */
        flex: 1;
        /* border:1px solid red; */
        width: 30%;
        /* margin-top: 0px; */
    }

    .flex-end .col-8 {
        max-width: 60%;
        flex: 1;
        padding-right: 0px;
    }

    .flex-end .col-4 {
        max-width: 35%;
        flex: 1;
    }

    .flex-end p {
        padding: 2px 6px 2px 0px;
        font-size: 10px;
        word-spacing: -1px;
    }

    .chart td:first-child {
        min-width: 100px;
        width: 100px;
        word-wrap: break-word !important;
        /* word-break: normal; */
        /* white-space: pre; */
    }
</style>