<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start("ob_gzhandler");
 ?>
 <html lang="ko">
 	<head>
 		<meta charset="utf-8">

     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

     <meta name="viewport" content="width=device-width, initial-scale=1">
 	  <meta name="description" content="<?=META_DESCRIPTION?>">
 		<meta name="keywords" content="<?=META_KEYWORD?>">
 		<meta name="author" content="<?=META_AUTHOR?>">

   	<meta http-equiv="cache-control" content="max-age=0">
 	  <meta http-equiv="cache-control" content="no-cache">
 	  <meta http-equiv="expires" content="0">
 	  <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT">
 	  <meta http-equiv="pragma" content="no-cache">

    <meta property="og:url" content="<?=META_URL?>" />
 		<meta property="og:type" content="<?=META_TYPE?>" />
 		<meta property="og:title" content="<?=META_TITLE?>" />
 		<meta property="og:description" content="<?=META_DESCRIPTION?>" />

 		<meta name="twitter:card" content="summary_large_image">
 		<meta name="twitter:title" content="<?=META_TITLE?>">
 		<meta name="twitter:description" content="<?=META_TITLE?>">
 		<meta property="og:image" content="assets/favicon/apple-icon-180x180.png">
 		<meta property="og:site_name" content="<?=META_TITLE?>">
 		<meta itemprop="name" content="<?=META_TITLE?>"/>
 		<meta itemprop="description" content="<?=META_TITLE?>">

    <link rel="apple-touch-icon" sizes="57x57" href="<?= ASSETS_DIR ?>/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= ASSETS_DIR ?>/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= ASSETS_DIR ?>/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= ASSETS_DIR ?>/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= ASSETS_DIR ?>/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= ASSETS_DIR ?>/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= ASSETS_DIR ?>/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= ASSETS_DIR ?>/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= ASSETS_DIR ?>/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?= ASSETS_DIR ?>/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= ASSETS_DIR ?>/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= ASSETS_DIR ?>/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= ASSETS_DIR ?>/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= ASSETS_DIR ?>/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= ASSETS_DIR ?>/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?= ASSETS_DIR ?>/build/css/materialize.css" rel="stylesheet">


 	  <title><?= APP_TITLE ?></title>

 		<script>
 		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
 		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
 		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
 		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
 		  ga('create', 'UA-77464118-1', 'auto');
 		  ga('send', 'pageview');
 		</script>


   </head>
 	<?=$content_for_layout?>
 </html>

<?php
ob_end_flush();
?>
