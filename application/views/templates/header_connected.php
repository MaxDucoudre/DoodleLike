<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>DoodleLike</title>
		<?php 
		echo link_tag('css/style.css');
		?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
<body>

	<header>
		 <h4 class="logo">Doodle Like <span class="light"><?=$nom?> <?=$prenom?></span></h4>
		

  	<nav>
  		<ul>
  			  <li>

  			<?php
			echo form_open('./',array('method'=>'get','style'=>'text-align:left'));
			echo form_submit('','Accueil','class="input1"');
			echo form_close();
			?>
  			</li>

  			<li>
		  		<?php
					echo form_open('compte/profil',array('method'=>'get','style'=>'text-align:left'));
					echo form_submit('','Vos sondages','class="input1"');
					echo form_close();

				?>
	</li><li>
		       			<?php

			echo form_open('compte/disconnect_compte',array('method'=>'get','style'=>'text-align:left'));
			echo form_submit('','Déconnexion','class="input1"');
			echo form_close();
		?>
  	
  			</li>

  		</ul>
  	</nav>


	</header>
	<main>