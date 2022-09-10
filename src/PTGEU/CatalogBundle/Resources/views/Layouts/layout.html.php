<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Continental</title>
    <!-- <link href="/static/ptgeu/css/print_style.css" rel="stylesheet"  type="text/css"/> -->
    <link href="/static/ptgeu/css/global.css" rel="stylesheet"  type="text/css"/>
    <link href="/static/ptgeu/css/style.css" rel="stylesheet"  type="text/css"/>
    <?php if ($this->printermarks) { ?>
            <link rel="stylesheet" type="text/css" href="/static/ptgeu/css/print-printermarks.css" />
    <?php } ?>

    <?php if($this->editmode){ ?>
        <link rel="stylesheet" href="/static/ptgeu/css/editmode.css" />
    <?php } ?>

    <style type="text/css">
        <?php  
            if($this->imageQuality && $this->imageQuality !== 'Original'  )
            {
                ?>
                    img {
                        -ro-image-recompression: jpeg(<?= $this->imageQuality ?>)
                    }
                <?php
            }
        ?>
    </style>
</head>
<body>
        <!-- content part  -->
        <?php $this->slots()->output('_content') ?>
</body>
</html>
