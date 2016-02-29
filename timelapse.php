<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Slideshow avec un effert Timelapse - picamera</title>
	<style>
		.timelapse {
		   width: 350px;
		   height: 200px;
		   overflow: hidden;
		   border: 3px solid #F2F2F2;
		   display: block;
		}

		.timelapse ul {
		   width: 400%;
		   height: 200px;
		   padding:0; 
		   margin:0;
		   list-style: none;
		}
		.timelapse li {
		   float: left;
		}
	</style>
</head>
<body>
	<h1>Slideshow avec un effert Timelapse - picamera</h1>

	<div class="timelapse">
	<?php
	$dir_nom = 'img/'; 
	$dir = opendir($dir_nom) or die('Erreur de listage : le répertoire n\'existe pas'); 
    $fichier = array();
	$dossier= array(); 
	 
	while($element = readdir($dir)) {
	    if($element != '.' && $element != '..') {
	        if (!is_dir($dir_nom.'/'.$element)) {$fichier[] = $element;}
	        else {$dossier[] = $element;}
	    }
	}
	closedir($dir);
	if(!empty($fichier)){
	    sort($fichier);
	    echo "\t\t<ul>\n";
	        foreach($fichier as $lien) {
	            echo "\t\t\t<li><img src=\"$dir_nom/$lien \" width=\"350\" height=\"200\" /></li>\n";
	        }
	    echo "\t\t</ul>";
	 }
	?>
	</div>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script type="text/javascript">
	   $(function(){
	      setInterval(function(){
	         $(".timelapse ul").animate({opacity:0.99},100,function(){
	            $(this).css({opacity:1}).find("li:last").after($(this).find("li:first"));
	         })
	      }, 1);
	   });
	</script>
</body>
</html>