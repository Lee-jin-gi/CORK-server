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

     <li class="bold"><a href="about.html" class="waves-effect waves-teal">About</a></li>
     <li class="bold"><a href="getting-started.html" class="waves-effect waves-teal">Getting Started</a></li>
     <li class="no-padding">
       <ul class="collapsible collapsible-accordion">
         <li class="bold"><a class="collapsible-header  waves-effect waves-teal">CSS</a>
           <div class="collapsible-body">
             <ul>
               <li><a href="color.html">Color</a></li>
               <li><a href="grid.html">Grid</a></li>
               <li><a href="helpers.html">Helpers</a></li>
               <li><a href="media-css.html">Media</a></li>
               <li><a href="pulse.html">Pulse</a></li>
               <li><a href="sass.html">Sass</a></li>
               <li><a href="shadow.html">Shadow</a></li>
               <li><a href="table.html">Table</a></li>
               <li><a href="css-transitions.html">Transitions</a></li>
               <li><a href="typography.html">Typography</a></li>
             </ul>
           </div>
         </li>
         <li class="bold active"><a class="collapsible-header active waves-effect waves-teal">게시판</a>
           <div class="collapsible-body" style="display: block;">
             <ul>
               <li><a href="/admin/board/list">게시판 열람</a></li>
               <li><a href="/admin/board/write">게시글 추가</a></li>
               <li><a href="chips.html">Chips</a></li>
               <li><a href="collections.html">Collections</a></li>
               <li><a href="footer.html">Footer</a></li>
               <li><a href="forms.html">Forms</a></li>
               <li><a href="icons.html">Icons</a></li>
               <li><a href="navbar.html">Navbar</a></li>
               <li><a href="pagination.html">Pagination</a></li>
               <li><a href="preloader.html">Preloader</a></li>
             </ul>
           </div>
         </li>
         <li class="bold"><a class="collapsible-header  waves-effect waves-teal">JavaScript</a>
           <div class="collapsible-body">
             <ul>
               <li><a href="carousel.html">Carousel</a></li>
               <li><a href="collapsible.html">Collapsible</a></li>
               <li><a href="dialogs.html">Dialogs</a></li>
               <li><a href="dropdown.html">Dropdown</a></li>
               <li><a href="feature-discovery.html">FeatureDiscovery</a></li>
               <li><a href="media.html">Media</a></li>
               <li><a href="modals.html">Modals</a></li>
               <li><a href="parallax.html">Parallax</a></li>
               <li><a href="pushpin.html">Pushpin</a></li>
               <li><a href="scrollfire.html">ScrollFire</a></li>
               <li><a href="scrollspy.html">Scrollspy</a></li>
               <li><a href="side-nav.html">SideNav</a></li>
               <li><a href="tabs.html">Tabs</a></li>
               <li><a href="transitions.html">Transitions</a></li>
               <li><a href="waves.html">Waves</a></li>
             </ul>
           </div>
         </li>
       </ul>
     </li>
     <li class="bold"><a href="http://materializecss.com/mobile.html" class="waves-effect waves-teal">Mobile</a></li>
     <li class="bold"><a href="showcase.html" class="waves-effect waves-teal">Showcase</a></li>
     <li class="bold"><a href="themes.html" class="waves-effect waves-teal">Themes</a></li>
   </ul>
 </header>


 	<?=$content_for_layout?>
 </html>

<?php
ob_end_flush();
?>
