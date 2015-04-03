<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title><?php if($title): echo $title; endif ?></title>
	    <?php if($description) : ?> <meta name="description" content="<?=$description?>"><?php endif ?>
	    <?php if($keywords) : ?>    <meta name="keywords" content="<?=$keywords?>"><?php endif ?>
	    <?php if($canonical) : ?>   <link rel="canonical" href="<?=$canonical?>"><?php endif ?>
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0" />
		<link rel="stylesheet" href="/public/sp/css/style.css" type="text/css"/>
        <link href="/public/sp/css/demo.css" rel="stylesheet" type="text/css" />
	</head>
	<body id="<?php echo $pageID?>">
<!--
	Author Details
	==============

	Author: Mobifreaks
	Author URL: http://mobifreaks.com

	Attribution( is must on every page, where this work is used. should be visible to naked eye and Search engine bot[ means should not use noindex, nofollow relations ]):

	// a healty attribution looks like following
	<a href="http://mobifreaks.com" target="_blank">Design by Mobifreaks</a>

	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/

	if any regards of infringement, may lead to lawsuit under Digital Millennium Copyright Act (DMCA)

	For Attribution removal request. please consider contacting us through http://mobifreaks.com/feedback/ or mail us at support[at]mobifreaks.com
 -->
		<div class="wrap">
		<header class="header">
			<div class="logo"><a href="index.html"><img src="/public/sp/images/logo.png" alt=""/></a></div>
			<div class="menu-but"><a href="#menu"><img src="/public/sp/images/menu.png"/></a></div>
			<br class="clearfix"/>
		</header>
			<hr class="separator"/>