<?php
    $siopArray = $content;
    ?>
    <table style=" width: 100%;border-collapse: collapse;border: 2px solid black;height: 100%;">
        <tr>
            <th style="font-weight: bold;text-align: left;border-collapse: collapse;padding: 6px;border: 2px solid black;font-family: Lucida Sans Unicode, Arial;">#</th>
            <th style="font-weight: bold;text-align: left;border-collapse: collapse;padding: 6px;border: 2px solid black;font-family: Lucida Sans Unicode, Arial;">SAP Number</th>
            <th style="font-weight: bold;text-align: left;border-collapse: collapse;padding: 6px;border: 2px solid black;font-family: Lucida Sans Unicode, Arial;">SAP Material Description</th>
            <th style="font-weight: bold;text-align: left;border-collapse: collapse;padding: 6px;border: 2px solid black;font-family: Lucida Sans Unicode, Arial;">SIOP Level 3</th>
            <th style="font-weight: bold;text-align: left;border-collapse: collapse;padding: 6px;border: 2px solid black;font-family: Lucida Sans Unicode, Arial;">SIOP Level 4</th>
            <th style="font-weight: bold;text-align: left;border-collapse: collapse;padding: 6px;border: 2px solid black;font-family: Lucida Sans Unicode, Arial;">Brand Name</th>
            <th style="font-weight: bold;text-align: left;border-collapse: collapse;padding: 6px;border: 2px solid black;font-family: Lucida Sans Unicode, Arial;">Completion Percentage</th>

        </tr>
        <?php
        $index = 0;
        $addedProductsInTemplate = [];
        foreach ($siopArray as $siopData) { ?>
                <?php
                foreach ($siopData['newProducts'] as $newProduct) {
                    $productId = $newProduct['productId'];
                    if(in_array($productId,$addedProductsInTemplate)){
                        continue;
                    }
                    $addedProductsInTemplate[] = $productId;

                ?>
                  <tr style="padding: 6px;text-align: left;border-collapse: collapse;border: 2px solid black;font-family:Lucida Sans Unicode, Arial;">
                    <td style="padding: 6px;text-align: left;border-collapse: collapse;border: 2px solid black;font-family:Lucida Sans Unicode, Arial;">
                        <?= ++$index ?>
                    </td>
                    <td style="padding: 6px;text-align: left;border-collapse: collapse;border: 2px solid black;font-family:Lucida Sans Unicode, Arial;">
                        <?= $newProduct['articleNumber'] ?>
                    </td>
                    <td style="padding: 6px;text-align: left;border-collapse: collapse;border: 2px solid black;font-family:Lucida Sans Unicode, Arial;">
                        <?= $newProduct['sapDescription'] ?>
                    </td>
                    <td style="padding: 6px;text-align: left;border-collapse: collapse;border: 2px solid black;font-family:Lucida Sans Unicode, Arial;">
                        <?= $newProduct['SIOP3Description'] ?>
                    </td>
                    <td style="padding: 6px;text-align: left;border-collapse: collapse;border: 2px solid black;font-family:Lucida Sans Unicode, Arial;">
                        <?= $newProduct['SIOP4Description'] ?>
                    </td>
                    <td style="padding: 6px;text-align: left;border-collapse: collapse;border: 2px solid black;font-family:Lucida Sans Unicode, Arial;">
                        <?= $newProduct['brandName'] ?>
                    </td>
                    <td style="padding: 6px;text-align: left;border-collapse: collapse;border: 2px solid black;font-family:Lucida Sans Unicode, Arial;">
                        <?= $newProduct['CompletenessPercentage'] ?>
                    </td>
            </tr>
        <?php
                } ?>
    <?php } ?>
    </table>