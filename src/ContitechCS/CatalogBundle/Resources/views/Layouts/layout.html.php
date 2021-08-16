<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Template</title>
    <!--
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" />
    -->
    <link href="/static/cbs/css/print_style.css" rel="stylesheet"  type="text/css"/>
    <?php if ($this->printermarks) { ?>
            <link rel="stylesheet" type="text/css" href="/static/css/print-printermarks.css" />
    <?php } ?>
</head>
<body>

        <!-- content part  -->
        <?php $this->slots()->output('_content') ?>

</body>
</html>
