<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
</head>

<body>

	<style type="text/css">
		body {
			padding:0;
            margin: 0;
			font-family: "Lucida Sans Unicode", Arial;
			font-size: 14px;
		}

       #site {
           margin: 0 auto;
           width: 600px;
           padding: 30px 0 0 0;
       }

		h1, h2, h3 {
			font-size: 18px;
			padding: 0 0 5px 0;
            border-bottom: 1px solid #001428;
            margin-bottom: 5px;
		}

        h3 {
            font-size: 14px;
            padding: 15px 0 5px 0;
            margin-bottom: 5px;
            border-color: #cccccc;
        }

		p {
			padding: 0 0 5px 0;
		}
		
		a {
			color: #000;
		}

        strong {
            font-weight: bold;
            color: #005c24;
        }

        
        table td{
            /*font-size:40px;*/
             font-size: 1.5em;
            padding: 0.15em;
        }
        .header td{
            
            vertical-align: middle;
        }
        .wrapper {
            width: 151.18px;   /* 1240 */
            height: 94.48px;  /* 1748 */ 
            margin: auto;
            border:  solid 1px #ddd;
        }
        .align-right{
            text-align: right; 
        }
        #logo {
            text-align: center;
            padding: 0 0 10px 0;
        }

	</style>

    <div id="site">
        <h1><?= $this->input("headline"); ?></h1>
        <p>
            <?= $this->wysiwyg("content"); ?>
             
            <?= $this->wysiwyg("signature"); ?>
        </p>

    </div>
</body>
</html>