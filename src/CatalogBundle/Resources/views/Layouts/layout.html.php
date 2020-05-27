<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Template</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" />
    <link href="/static/css/print_style.css" rel="stylesheet"  type="text/css"/>
</head>
<body>
        <!-- include header  -->
        <?php echo $this->inc($this->document->getProperty('header'),['name1'=>$name1]) ?>
        <?php //echo  $this->template("CatalogBundle:Include:header.html.php", ["param1" => "value1"]) ?>

        <!-- content part  -->
        <?php $this->slots()->output('_content') ?>
        
        <!-- include footer  -->
        <?php echo $this->inc($this->document->getProperty('footer')) ?>
        <?php //echo $this->template("CatalogBundle:Include:footer.html.php", ["param2" => "value2"]) ?>
</body>
</html>