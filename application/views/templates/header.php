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

  <!-- Navigation -->
    <h4 class="logo">Doodle Like</h4>

  
  	<nav>
  		<ul>  			
  			<li>

  			<?php
			echo form_open('./../',array('method'=>'get','style'=>'text-align:left'));
			echo form_submit('','Accueil','class="input1"');
			echo form_close();
			?>
  			</li>
  			<li>
  				 		<?php
						echo form_open('compte/connect_compte',array('method'=>'get','style'=>'text-align:left'));
				
						echo form_submit('','Se connecter','class="input1"');

						echo form_close();
		?>
	</li><li>
		       	<?php    
			echo form_open('compte/create_compte',array('method'=>'get','style'=>'text-align:left'));
			echo form_submit('','Créer un compte','class="input1"');
			echo form_close();
		?>
  	
  			</li>

  		</ul>
  	</nav>
 
  		

 

					






			
	</header>
	<main>
		