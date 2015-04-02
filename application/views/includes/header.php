<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<!-- templatemo 417 grill -->
<!-- 
Grill Template 
http://www.templatemo.com/preview/templatemo_417_grill 
-->
<head>
    <meta charset="utf-8">
    <title><?php if($title): echo $title; endif ?></title>
    <?php if($description) : ?> <meta name="description" content="<?=$description?>"><?php endif ?>
    <?php if($keywords) : ?>    <meta name="keywords" content="<?=$keywords?>"><?php endif ?>
    <?php if($canonical) : ?>   <link rel="canonical" href="<?=$canonical?>"><?php endif ?>
    <meta name="viewport" content="width=device-width">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    
    <link rel="index contents" href="/" title="">
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="/css/templatemo_style.css">
    <link rel="stylesheet" href="/css/templatemo_misc.css">
    <link rel="stylesheet" href="/css/flexslider.css">
    <link rel="stylesheet" href="/css/testimonails-slider.css">
    <?php if(isset($css) && is_array($css)): foreach ($css as $val): ?>
    <link rel="stylesheet" type="text/css" href="/css/<?php echo $val; ?>.css" />
    <?php endforeach; endif; ?>

    <script src="/js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
    <script src="/js/vendor/jquery-1.11.0.min.js"></script>
    <script src="/js/vendor/jquery.gmap3.min.js"></script>
    <script src="/js/plugins.js"></script>
    <script src="/js/main.js"></script>
    <?php if(isset($js) && is_array($js)): foreach ($js as $val): ?>
    <script type="text/javascript" src="/js/<?php echo $val; ?>.js"></script>
    <?php endforeach; endif; ?>
</head>
<body id="<?php echo $pageID?>">
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
    <![endif]-->

        <header>
            <div id="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="home-account">
                                <a href="#">Home</a>
                                <a href="#">My account</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="cart-info">
                                <i class="fa fa-shopping-cart"></i>
                                (<a href="#">5 items</a>) in your cart (<a href="#">$45.80</a>)
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('includes/nav');?>
        </header>