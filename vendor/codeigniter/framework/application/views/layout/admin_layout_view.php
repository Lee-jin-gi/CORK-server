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

    <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?=ASSETS_DIR?>/build/css/ghpages-materialize.css" rel="stylesheet">
    <link href="<?=ASSETS_DIR?>/css/style.css" rel="stylesheet">


 	  <title>App title</title>

 		<script>
 		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
 		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
 		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
 		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
 		  ga('create', 'UA-77464118-1', 'auto');
 		  ga('send', 'pageview');
 		</script>


   </head>



<header>
   <nav class="top-nav">
     <div class="container">
       <div class="nav-wrapper"><a class="page-title">CORK - ADMIN</a></div>
     </div>
   </nav>


   <div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a></div>
   <ul id="nav-mobile" class="side-nav fixed" style="transform: translateX(-100%);">
     <li class="logo"><a id="logo-container" href="http://materializecss.com/" class="brand-logo">
         <object id="front-page-logo" type="image/svg+xml" data="res/materialize.svg">Your browser does not support SVG</object></a></li>
     <li class="no-padding">
       <ul class="collapsible collapsible-accordion">
         <li class="bold active"><a class="collapsible-header active waves-effect waves-teal">게시판</a>
           <div class="collapsible-body" style="display: block;">
             <ul>
               <li><a href="/admin/board/list">게시판 열람</a></li>
               <li><a href="/admin/board/write">게시글 추가</a></li>
               <li><a href="/admin/debate/list">토론 게시판 열람</a></li>
               <li><a href="/admin/debate/write">토론 게시글 추가</a></li>
             </ul>
           </div>
         </li>
         <li class="bold"><a class="collapsible-header waves-effect waves-teal">유저 관리</a>
           <div class="collapsible-body">
             <ul>
               <li><a href="/admin/user/list?type=all">전체 사용자 열람</a></li>
               <li><a href="/admin/user/list?type=sns">SNS 사용자 열람</a></li>
               <li><a href="/admin/user/list?type=email">일반 사용자 열람</a></li>

             </ul>
           </div>
         </li>
         <li class="bold"><a class="collapsible-header waves-effect waves-teal">단위 테스트</a>
           <div class="collapsible-body">
             <ul>
               <li><a href="/unit/debate?offset=0&limit=100">토론게시판 단위 테스트</a></li>
               <li><a href="/unit/debate_reply?offset=0&limit=100">토론게시판 댓글 단위 테스트</a></li>
               <li><a href="/unit/debate_back?offset=0&limit=100">토론게시판 백업 단위 테스트</a></li>
               <li><a href="/unit/board?offset=0&limit=100">일반게시판 단위 테스트</a></li>
               <li><a href="/unit/board_reply?offset=0&limit=100">일반게시판 댓글 단위 테스트</a></li>
               <li><a href="/unit/law?offset=0&limit=100">헌법 단위 테스트</a></li>
               <li><a href="/unit/law_model?offset=0&limit=100">판례 단위 테스트</a></li>
               <li><a href="/unit/log?offset=0&limit=100">로그 단위 테스트</a></li>
               <li><a href="/unit/user?offset=0&limit=100">사용자 단위 테스트</a></li>
               <li><a href="/unit/user_info?offset=0&limit=100">사용자 정보 단위 테스트</a></li>
             </ul>
           </div>
         </li>
       </ul>
     </li>
   </ul>
 </header>


 	<?=$content_for_layout?>
 </html>

<?php
ob_end_flush();
?>
