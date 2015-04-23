<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <title><?php if($title): echo $title; endif ?></title>
    <?php if($description) : ?> <meta name="description" content="<?=$description?>"><?php endif ?>
    <?php if($keywords) : ?>    <meta name="keywords" content="<?=$keywords?>"><?php endif ?>
    <link rel="canonical" href="<?=current_url()?>">
    <meta name="viewport" content="width=device-width">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="xmlrpc.php">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="1 days">
    <meta name="rating" content="general">
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?=$title?>" />
    <meta property="og:description" content="<?=$description?>" />
    <meta property="og:url" content="<?=current_url()?>" />
    <meta property="og:site_name" content="<?=$title?>" />
    <meta property="article:publisher" content="https://facebook.com/" />

    <link rel="stylesheet" href="/public/css/bootstrap.css">
    <link rel="stylesheet" href="/public/css/font-awesome.css">
    <link rel="stylesheet" href="/public/css/templatemo_style.css">
    <link rel="stylesheet" href="/public/css/templatemo_misc.css">
    <link rel="stylesheet" href="/public/css/flexslider.css">
    <link rel="stylesheet" href="/public/css/testimonails-slider.css">
    <?php if(isset($css) && is_array($css)): foreach ($css as $val): ?>
    <link rel="stylesheet" type="text/css" href="/public/css/<?php echo $val; ?>.css" />
    <?php endforeach; endif; ?>

    <script src="/public/js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
    <script src="/public/js/vendor/jquery-1.11.0.min.js"></script>
    <script src="/public/js/vendor/jquery.gmap3.min.js"></script>
    <script src="/public/js/plugins.js"></script>
    <script src="/public/js/main.js"></script>
    <?php if(isset($js) && is_array($js)): foreach ($js as $val): ?>
    <script type="text/javascript" src="/public/js/<?php echo $val; ?>.js"></script>
    <?php endforeach; endif; ?>
</head>
<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3&appId=315964285087351";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
        <header>
            <div id="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="home-account">
                                <a href="/">Trang chủ</a>
                                <a href="/tu-van-vay-tin-dung-tieu-dung/">Tư vấn vay tín dụng tiêu dùng</a>
                                <a href="/lien-he-vay-tin-dung-tieu-dung/">Liên hệ</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="cart-info">
                                <a class="text-hotline">Hotline: <?=$setting->hotline?></a>
                           </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('includes/nav');?>
        </header>