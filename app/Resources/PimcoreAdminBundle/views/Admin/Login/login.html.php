<?php use AppBundle\Lib\UtilsHelper;?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Continental</title>
    <link href="/static/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/static/css/login.css">


</head>
<body>
    <div class="background">
        <div class="wrapper">
    <div class="logo"><img src="/static/images/logo.jpg" alt="logo" ></div>
    <div class="contact"><!--<img src="/static/images/contact.png">--></div>
    <div class="contact-form">
        <!--<h4><img src="/static/images/heading.png"> </h4>-->
        <form method="post" action="<?= $view->router()->path('pimcore_admin_login_check') ?>" autocomplete="off">

            <?php if ($this->error) { ?>
                <div class="body error">
                    <?= $this->translate($this->error) ?>
                </div>
            <?php } ?>

            <?php if (false) { ?>
            <div class="body error">
                Due to Maintenance, ContiContentCloud is not available.
                Inconvenience is deeply regretted.
            </div>
            <?php } ?>
            
            
            <div class="input-group username">
           
            <input type="text" name="username" placeholder="<?= $this->translate("Username"); ?>" required autofocus/>
            <div class="input-group password">
           
            <input type="password" name="password" placeholder="<?= $this->translate("Password"); ?>" required/>

            <button type="submit" class="login-btn">Login</button>
<!--            <a href="#">Forgot Password?</a>-->

        </form>
</div>

    </div>
    </div>
</body>
</html>
