<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Continental</title>
    <link rel="icon" type="image/png" href="/static/cbs/images/favicon.ico" />
    <link rel="stylesheet" href="/static/cbs/css/global.css" />
    <link rel="stylesheet" href="/static/cbs/css/style.css" />
    <link rel="stylesheet" href="/static/cbs/css/print_style.css" media="print" />
    <?php if ($this->printermarks) { ?>
            <link rel="stylesheet" type="text/css" href="/static/cbs/css/print-printermarks.css" />
    <?php } ?>

    <?php if($this->editmode){ ?>
        <link rel="stylesheet" href="/static/cbs/css/editmode.css" />
    <?php } ?>
</head>
<body>

        <!-- content part  -->
        <?php $this->slots()->output('_content') ?>

</body>
</html>
