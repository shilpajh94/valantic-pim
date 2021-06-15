<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Continental</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid black;
            height: 100%;
            

        }


        th {
            font-weight: bold;
            text-align: left;
            border-collapse: collapse;
            padding: 6px;
            border: 2px solid black;
            font-family: "Lucida Sans Unicode", Arial;

        }

        td,
        tr {
            padding: 6px;
            text-align: left;
            border-collapse: collapse;
            border: 2px solid black;
            font-family: "Lucida Sans Unicode", Arial;
  

        }
        tr:nth-child(even) {background-color: #f2f2f2;}
    </style>
</head>

<body>
    <?php
    $siopArray = $content;

    ?>
    <table>
        <tr>
            <th>#</th>
            <th>SIOP NAME</th>
            <th>PRODUCT ID</th>
            <th>ARTICLE NUMBER</th>
        </tr>
        <?php
        $index = 0;

        foreach ($siopArray as $siopData) { ?>
           
                <?php

                foreach ($siopData['newProducts'] as $newProducts) {
                ?>
                  <tr>
                    <td>
                        <?= ++$index ?>
                    </td>
                    <td>
                        <?= $siopData['siopName'] ?>
                    </td>
                    <td>
                        <?= $newProducts['oo_id'] ?>
                    </td>
                    <td>
                        <?= $newProducts['articleNumber'] ?>
                    </td>
            </tr>
        <?php
                } ?>
        
    <?php } ?>

    </table>
</body>

</html>