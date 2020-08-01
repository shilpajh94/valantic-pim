<?php
$this->extend('CatalogBundle:Layouts:layout.html.php',['name1'=>'Name from Extend']);
?>

<?php if($this->editmode): ?>
        <?= $this->relations("page_number_designations", [
                "types" => ["object"],
                "subtypes" => [
                "object" => ["object"]
                ],
                "classes" => ["CatalogTables"],
        ]); 
        ?>
<?php endif; ?>


    
        <div id="pageHeader"></div>
        <span class="pageName">Hydraulic Hose</span>



<div class="footer">
<footer class="flex-center ">
<span class="logo">
        <b>Hose</b>
        <img src="/CatalogImages/logo_new.png">
</span>


<div class="flex aligned ">
                <h5 class="">
                General Information
                <span>Part Number Designations</span>
                </h5>

        
</div>
</footer>

 </div>

<div class="footer1">
<footer class="flex-center ">



<div class="flex aligned ">
                <h5>
                General Information
                <span>Part Number Designations</span>
                </h5>

        
</div>

<span class="logo">
        <b>Hose</b>
        <img src="/CatalogImages/logo_new.png">
</span>
</footer>

 </div>

<div class="wrapper partDesignation">

<article class="fullcontainer">
      <header class="content partNumber">
          <h3><?= $this->input("PBD_Heading")->setDataFromResource('Part Number Designations') ?></h3>
      </header>
      <section class="">
         
        <table  class="part_number_table" cellspacing="0" cellpadding="0">
                <thead>
                        <tr class="row top">
                           <td></td>   
                           <td>description</td>     
                           <td>page</td>     
                        </tr>
                </thead>
                <tbody>

                <?php 
                                $incr = 1;
                                foreach ($data as $key => $brandData) { 
                                ?>
                                
                                        <tr class="row full">
                                        <td colspan="3"><?= $key; ?></td>
                                        </tr>
                                        
                                        
                                        <?php 
                                        $rowcount = 0;
                                        foreach ($brandData as $bkey => $brand) { 
                                                
                                        ?>
                                                <?php if((count($brandData)-1) == $rowcount): ?>
                                                        <tr class="row borderLess">
                                                <?php else: ?>
                                                        <tr class="row">
                                                <?php endif; ?>
                                                        <td><?= $this->input("PND_FamilyName_{$incr}")->setDataFromResource($bkey); ?></td>   
                                                        <td><?= $this->input("PND_IndustryStandard_{$incr}")->setDataFromResource($brand[0]); ?></td>     
                                                        <td><?= $this->input("PND_PageNumber_{$incr}"); ?></td>     
                                                </tr>
                                                
                                        <?php 
                                        $rowcount++;
                                        $incr++;

                                        }

                                        ?>

                                <?php
                                
                                

                                }
                                 ?>


                </tbody>
        </table>
      </section>
    </article>

</div>


