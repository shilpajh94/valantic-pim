<?php
if (!isset($this->parentContainer)) {
    $this->extend('CatalogBundle:Layouts:layout.html.php');
}
?>

<?php
if ($data) : 
    $fittingGasketHeaders = array('316 SS', 'Aluminum', 'Brass');
?>
    <div class="template">
        <section class="segregate">
            <!-- Footer -->

            <div class="footer">
                <footer class="footerNew">
                    <p class="tableFooter" >
                        <?= $this->textarea("Chemical_Chart_Data_Comment", ['placeholder' => 'Enter Chemical Chart Data Comment']); ?>
                    </p>
                    <div class="page-logo"> <img src="<?= $footer_logo_src ?>" class="logoImage">  </div>
                </footer>
            </div>

            <div class="footer1">
                <p class="tableFooter">
                    <?= $this->textarea("Chemical_Chart_Data_Comment1", ['placeholder' => 'Enter Chemical Chart Data Comment']); ?>
                </p>
                <footer class="footerNew">
                    <div class="page-logo"> <img src="<?= $footer_logo_src ?>" class="logoImage"> </div>
                </footer>
            </div>

            <!-- End Footer-->

            <div class="wrapper padding">
                <article class="container page-break-inside-avoid">

                    <!-- Starting grid here -->
                    <div class="inhRight">
                        <h1 class="borderBottom block contitech-black">Chemical Charts
                        </h1>

                        <div class="flex flex-end">
                            <div style=" width:10%">
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
                                        <p><b> </b> </p>
                                        <p style="margin-top: 2px;"><b>B </b> = Nitrile </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table class="grid chart" style=" border-top: 1px solid black;" cellspacing="0" cellpadding="0">
                            <thead>
                                <?php $tdCount = count($tubeMaterialheaders); ?>
                                <!-- Main header -->
                                <tr class="heading">
                                    <td width="" colspan="2"></td>
                                    <td colspan="<?php echo $tdCount; ?>">Continental Chemical Hose / Hose Tube Polymer</td>
                                    <td colspan="4" class="apex">Insta-Lock Fitting/Metal</td>
                                </tr>

                                <tr class="sub-head">
                                    
                                    <td width="" class="widthxl1"></td>
                                    <td width="" class="widthxl2"><?= $this->input("Temp", ["placeholder" => "Temperature"]); ?></td>
                                    <?php 
                                    for($i=1;$i<=$tdCount;$i++) {
                                    ?>
                                    <td width="" class="widthxl"><?= $this->input("Brand_".$i, ["placeholder" => "Brand"]); ?></td>
                                    <?php
                                    }
                                    ?>
                                    <td width="" class="apex widthxl"></td>
                                    <td width="" class="apex widthxl"></td>
                                    <td width="" class="apex widthxl"></td>
                                    <td width="" class="apex widthxl"></td>
                                </tr>

                                <tr class="head">
                                    <td width=""></td>
                                    <td width=""><?= $this->input("TempUnit", ["placeholder" => "TempUnit"]); ?></td>

                                    <?php
                                    if ($tubeMaterialheaders) {
                                        foreach ($tubeMaterialheaders as $key => $values) { ?>
                                            <td width=""><?= $values; ?></td>
                                    <?php }
                                    } 
                                    foreach($fittingGasketHeaders as $k => $fittingGasketHeader) {
                                    ?>
                                    <td width="" class="apex"><?php echo $fittingGasketHeader; ?></td>
                                    <?php } ?>
                                    <td width="" class="apex">Gasket</td>
                                </tr>
                            </thead>
                            <tbody class="tableNewFont">

                                <?php
                               // p_r($data);
                                if ($data) {
                                    foreach ($data as $key => $productData) { ?>                                          
                                        <?php 
                                        $first_character = substr($productData['chemicalName'] , 0, 1);
                                        if($first_character != $firstCharacterCheck){ ?>
                                            <tr>
                                                <td colspan="<?php echo $tdCount + 2 + 4; ?>">
                                                    <h4>
                                                        <?php echo $first_character; ?>
                                                    </h4>
                                                </td>
                                            </tr>
                                        <?php }
                                        $firstCharacterCheck = $first_character;
                                            
                                        ?>
                                            
                                        <tr class="">
                                            <?php
                                            $j = 0;
                                            //p_r($productData);
                                            foreach ($productData as $key1 => $value) {
                                                if($productData['tubeMaterial'] && $key1 != 'chemicalName' && $key1 != 'temperatureRating'){
                                                    if ($key1 == 'tubeMaterial') {
                                                        foreach ($tubeMaterialheaders as $key2 => $value2) {
                                                        
                                                            if (array_key_exists($value2, $value)) {
                                                                foreach ($value as $key3 => $value3) {
                                                                    if ($value2 == $key3) {
                                                                        if($value3 == null || $value3 == ""){?>
                                                                            <td><?php echo "X"; ?></td>
                                                                        <?php } else { ?>
                                                                            <td><?php echo $value3; ?></td>
                                                                        <?php  }
                                                                    }
                                                                }
                                                            } else {
                                                                ?>
                                                                <td><?php echo "X"; ?></td>
                                                                <?php
                                                            }
                                                        }
                                                        $j++;
                                                    } elseif ($key1 == 'fittingMaterial') {
                                                        if(empty($value)){
                                                            for ($f=0;$f<count($fittingGasketHeaders);$f++){
                                                                ?>
                                                                <td class="apex"><?php echo "X"; ?></td>
                                                                <?php
                                                            }
                                                        } else {
                                                            //foreach ($fittingMaterialheaders as $key2 => $value2) {
                                                            foreach ($fittingGasketHeaders as $key2 => $value2) {
                                                                if (array_key_exists($value2, $value)) {
                                                                    foreach ($value as $key3 => $value3) {
                                                                        if ($value2 == $key3) {
                                                                            if($value3 == null || $value3 == ""){
                                                                                ?>
                                                                                <td class="apex"><?php echo "X"; ?></td>
                                                                            <?php }else{
                                                                                ?>
                                                                                <td class="apex"><?php echo $value3; ?></td>
                                                                            <?php    
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                                else {
                                                                    ?>
                                                                    <td class="apex"><?php echo "X"; ?></td>
                                                            <?php
                                                                }
                                                            }
                                                        }
                                                        $j++;
                                                    } elseif($key1 == 'gasket'){
                                                        if($value){
                                                            $j++;
                                                            ?>
                                                            <td class="apex"><?php echo $value; ?></td>
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <td class="apex"><?php echo ""; ?></td>
                                                            <?php
                                                        }
                                                        
                                                    }
                                                }
                                                elseif(!$productData['tubeMaterial'] && $productData['fittingMaterial'] && $productData['gasket'] && $key1 != 'chemicalName' && $key1 != 'temperatureRating'){
                                                    if ($key1 == 'tubeMaterial') {
                                                        if(empty($value)){
                                                            for ($t=0;$t<$tdCount;$t++){
                                                                ?>
                                                                <td><?php echo "X"; ?></td>
                                                                <?php
                                                            }
                                                        }
                                                        
                                                    }
                                                    elseif ($key1 == 'fittingMaterial') {
                                                        if(empty($value)){
                                                            for ($f=0;$f<count($fittingGasketHeaders);$f++){
                                                                ?>
                                                                <td class="apex"><?php echo "X"; ?></td>
                                                                <?php
                                                            }
                                                        } else {
                                                            //foreach ($fittingMaterialheaders as $key2 => $value2) {
                                                            foreach ($fittingGasketHeaders as $key2 => $value2) {
                                                                if (array_key_exists($value2, $value)) {
                                                                    foreach ($value as $key3 => $value3) {
                                                                        if ($value2 == $key3) {
                                                                            if($value3 == null || $value3 == ""){
                                                                                ?>
                                                                                <td class="apex"><?php echo "X"; ?></td>
                                                                            <?php }else{
                                                                                ?>
                                                                                <td class="apex"><?php echo $value3; ?></td>
                                                                            <?php    
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                                else {
                                                                    ?>
                                                                    <td class="apex"><?php echo "X"; ?></td>
                                                            <?php
                                                                }
                                                            }
                                                        }
                                                        $j++;
                                                    } elseif($key1 == 'gasket'){
                                                        if($value){
                                                            $j++;
                                                            ?>
                                                            <td class="apex"><?php echo $value; ?></td>
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <td class="apex"><?php echo ""; ?></td>
                                                            <?php
                                                        }
                                                        
                                                    } 
                                                    $j++;
                                                }
                                                elseif(!$productData['tubeMaterial'] && !$productData['fittingMaterial'] && $productData['gasket'] && $key1 != 'chemicalName' && $key1 != 'temperatureRating'){
                                                    if ($key1 == 'tubeMaterial') {
                                                        if(empty($value)){
                                                            for ($t=0;$t<$tdCount;$t++){
                                                                ?>
                                                                <td><?php echo "X"; ?></td>
                                                                <?php
                                                            }
                                                        }
                                                        
                                                    }
                                                    elseif($key1 == 'fittingMaterial'){
                                                        if(empty($value)){
                                                            for ($t=0;$t<3;$t++){
                                                                ?>
                                                                <td class="apex"><?php echo "X"; ?></td>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                    elseif($key1 == 'gasket'){
                                                        if($value){
                                                            $j++;
                                                            ?>
                                                            <td class="apex"><?php echo $value; ?></td>
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <td class="apex"><?php echo ""; ?></td>
                                                            <?php
                                                        }
                                                        
                                                    } 
                                                    $j++;
                                                }
                                                elseif ($key1 == 'chemicalName' || $key1 == 'temperatureRating') {
                                                    ?>
                                                    <td class="tabletd"><?php echo $value; ?></td>
                                                    <?php
                                                } ?>
                                            <?php
                                            }
                                            if ($j == 0) {
                                                ?>
                                                    <td colspan="<?php echo $tdCount + 4; ?>" class=""><?php echo "<b>No Hose Recommended For This Application <b>"; ?></td>
                                                <?php
                                            } 
                                            ?>
                                        </tr>
                                <?php }
                                }  ?>

                            </tbody>
                        </table>  
                    </div>
                </article>
            </div>         
        </section>    
    </div>
<?php endif; ?>

<script type="text/javascript" src="/static/js/tableContinueLable.js"></script>

<style>

    /* .chart.grid tbody tr{
        border-bottom:0 !important;
        border-top:0 !important;

    }

    .chart.grid tbody td{
        border-left: 5px solid white;
        border-right: 5px solid white;
        border-bottom:1px solid black !important;
    } */

    .tableFooter{
        padding: 0 40px;
        margin: 25px 0;
    }
    .page-logo {
        margin-right: 45px;
    }
    .footerNew{
        background: #fff;
        flex-wrap: nowrap !important;
        display: flex;
        align-items: flex-end;
        flex-direction: column;
    }
    .logoImage{
        max-width: 150px;
    }

    .inhRight h1 {
        margin: 0;
        padding: 0 !important;
        font-size: 30px !important;
    }

    .widthxl1{
        width:90px !important;
        word-wrap: break-word !important;
    }
    .widthxl2 {
        width:40px !important;
    }
    .widthxl{
        width:50px !important;   
    }

    h6 {
        font-size: 10px;
        margin-bottom: 0px;
        padding-bottom: 0px;
    }

    .chart.grid .sub-head td {
        border-bottom: 0 !important;
        padding: 5px 2px 0px 2px;
        word-break: break-all !important;
        vertical-align: bottom;
        /* border:1px solid red; */
        height: auto !important;
        word-wrap: break-word !important;
        font-size: 7px;
        font-weight: 950;
    }

    .chart.grid .head td {
        word-break: break-all !important;
        vertical-align: bottom;
        padding: 5px 2px 0px 2px;
        /* border:1px solid green; */
        height: auto !important;
        word-wrap: break-word !important;
        font-size: 7px;
        font-weight: 950;
        padding-top: 0px;
    }

    .tableNewFont td{
        font-size: 7px;
    }

    .heading td {
        vertical-align: middle;
        font-weight: bold !important;
        font-size: 7px !important;
        /* word-spacing: -1px;
        letter-spacing: 0px; */
    }

    .chart.grid {
        margin-top: 0;
        table-layout: unset;
    }

    .chart.grid td {
        height: auto;
        /* word-break:break-all !important; */
    }

    .apex {
        background: #f0f0f0;  
    }

    .chart h4 {
        padding: 0px;
        font-size: 10px;
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
        font-size: 9px;
        word-spacing: -1px;
    }

    @media print {
        .chart.grid{
            margin-top:-20px;
        }
    }
</style>