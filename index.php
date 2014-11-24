<?php 

/** index.php
 *
 *@author: Daniel Swiatek
 *@email:	post@daniel-swiatek.de
 *
 **/
 
error_reporting(E_ALL);
ini_set('display_errors', 'On');

include_once 'include/data.inc.php';
include_once 'include/dataOOP.inc.php';
include_once 'OOP/Classes/Helper.php';
include_once 'OOP/Classes/GalleryCollection.php';
include_once 'OOP/Classes/GalleryImage.php';
include_once 'OOP/Classes/GalleryImageComment.php';

//var_dump($_GET);
if(isset($_GET['ImgUiD'])){
	$ImgUiD = $_GET['ImgUiD'];
} else 
	$ImgUiD = false;

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="Daniel Swiatek" />
        <link rel="stylesheet" type="text/css" href="style/main.css" />
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
           <script src="/js/comment.js" type="text/javascript"></script>
      
        <title>Fotogalerie</title>
    </head>

<body>
<div class="wrapper">
  <div class="header">
    <div class="brand"><a href="index.php">Fotogalerie</a></div>
    <div class="nav">
      <ul>
        <li><a href="http://zeit.de" >Zeit</a></li>
        <li><a href="http://sh.dlrg.de" >DLRG</a></li>
        <li><a href="http://elearning.fh-flensburg.de" >StudIp</a></li>
        <li><a href="https://google.de">Google</a></li>
      </ul>
    </div>
  </div>
  <div class="container">
    <div class="inner">
      <div class="content">
        <div class="main">
        
         <?php if(!$ImgUiD){
			$Collection = new GalleryCollection();
			echo $Collection->Render();
			 }
		 		else{
				$item = new GalleryImage($ImgUiD);
				echo $item->Render();
				}?>
        </div>
      </div>
      <div class="sidebar">
        <div class="widget">
          <h2>Sidebar</h2>
          <ul>
            <li>Menu Item</li>
            <li>Menu Item</li>
            <li>Menu Item</li>
          </ul>
        </div>
        <!--sidebar widget end--> 
      </div>
      <!--sidebar end--> 
    </div>
    <!--inner end--> 
  </div>
  <!--container end-->
  <div class="footer">
    <div class="copy">&copy; 2014 Daniel Swiatek - 530805</div>
    <div class="nav">
      <ul>
        <li>Kontakt</li>
        <li>Impressum</li>
      </ul>
    </div>
  </div>
</div>
<!--wrapper end-->
</body>
</html>
