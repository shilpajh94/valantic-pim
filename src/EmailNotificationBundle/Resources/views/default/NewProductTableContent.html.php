<?php
    $siopArray = $content;
    ?>
    <table style=" width: 100%;border-collapse: collapse;border: 2px solid black;height: 100%;">
        <tr>
            <th style="font-weight: bold;text-align: left;border-collapse: collapse;padding: 6px;border: 2px solid black;font-family: Lucida Sans Unicode, Arial;">#</th>
            <th style="font-weight: bold;text-align: left;border-collapse: collapse;padding: 6px;border: 2px solid black;font-family: Lucida Sans Unicode, Arial;">SIOP NAME</th>
            <th style="font-weight: bold;text-align: left;border-collapse: collapse;padding: 6px;border: 2px solid black;font-family: Lucida Sans Unicode, Arial;">PIMCORE PRODUCT ID</th>
            <th style="font-weight: bold;text-align: left;border-collapse: collapse;padding: 6px;border: 2px solid black;font-family: Lucida Sans Unicode, Arial;">ARTICLE NUMBER</th>
        </tr>
        <?php
        $index = 0;
        foreach ($siopArray as $siopData) { ?>
                <?php
                foreach ($siopData['newProducts'] as $newProducts) {
                ?>
                  <tr style="padding: 6px;text-align: left;border-collapse: collapse;border: 2px solid black;font-family:Lucida Sans Unicode, Arial;">
                    <td style="padding: 6px;text-align: left;border-collapse: collapse;border: 2px solid black;font-family:Lucida Sans Unicode, Arial;">
                        <?= ++$index ?>
                    </td>
                    <td style="padding: 6px;text-align: left;border-collapse: collapse;border: 2px solid black;font-family:Lucida Sans Unicode, Arial;">
                        <?= $siopData['siopName'] ?>
                    </td>
                    <td style="padding: 6px;text-align: left;border-collapse: collapse;border: 2px solid black;font-family:Lucida Sans Unicode, Arial;">
                        <?= $newProducts['oo_id'] ?>
                    </td>
                    <td style="padding: 6px;text-align: left;border-collapse: collapse;border: 2px solid black;font-family:Lucida Sans Unicode, Arial;">
                        <?= $newProducts['articleNumber'] ?>
                    </td>
            </tr>
        <?php
                } ?>
    <?php } ?>
    </table>