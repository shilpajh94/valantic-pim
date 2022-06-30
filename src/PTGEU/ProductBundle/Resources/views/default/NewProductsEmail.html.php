<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            padding: 0;
            margin: 0;
            font-family: "Lucida Sans Unicode", Arial;
            font-size: 14px;
            float: left;
            color: black;
        }
        h1 {

            font-size: 16px;
            font-family: "Lucida Sans Unicode", Arial;
            padding: 0 0 5px 0;
            border-bottom: 1px solid #001428;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div>
        <h1><?= $this->input('headline'); ?></h1>
        <?= $this->wysiwyg('content'); ?>
        <?= $this->wysiwyg('signature'); ?>
    </div>
</body>
</html>