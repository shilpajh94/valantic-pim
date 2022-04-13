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
        %Text(tableContent);
        <?= $this->wysiwyg('signature'); ?>
    </div>
</body>
</html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Bulk Product Import Notification</title>
    </head>
    <body >


            <p>Hi %Text(FullName);,</p>
            <p class="header">Following %Text(tableContent); Bulk Product Import Definition has been Completed. Kindly look into it.</p>
            %Text(TableBody);
        </br>
            <p class="header">Regards,<br/>ContiTech AG Team</p>
    </body>
</html>