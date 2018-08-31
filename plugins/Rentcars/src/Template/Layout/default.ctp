<!DOCTYPE html>
<html>
<head>


	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php 
		 echo $this->Element('ogMeta');
	 ?>

    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,900&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="icon" href="/img/favicon.png">
	<title><?= $this->fetch('title'); ?> – Megatanienajmowanie</title>

	    <?php
	   	echo $this->Meta->meta();
	    echo $this->Layout->feed();
	    echo $this->Html->css(array(
	        '/css/style.css',
	    ));
	    echo $this->Layout->js();
	    echo $this->Html->script(array(
	        '/js/app.min.js',
	    ));
	    ?>

	    <?php
	    echo $this->Blocks->get('css');
	    echo $this->Blocks->get('script');
	    ?>
</head>
<body id="page-top">
                <?php
                // debug($title_for_layout);
                echo $this->Layout->sessionFlash();

                echo $this->Element('header');
                echo  $this->Element('socialBar'); 
                echo $this->fetch('content');
                
                echo $this->Element('footer');
                
                ?>

                <?php

                 //echo $this->Menus->menu('main', array('dropdown' => true)); 
                 // $this->Regions->blocks('right'); 
                ?>


    <?php
    echo $this->Html->script(array(
        '/js/app.min.js',
    ));
    ?>
	<script>
//		$( document ).ready(function() {
//		    setTimeout(function() {
//		        $('div.message').fadeOut('fast');
//		    }, 5000);
//		});
    </script>
</body>
</html>
