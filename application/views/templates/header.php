<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>DoodleLike</title>
      	<link href="../css/style.css" rel="stylesheet" type="text/css">
		<?php echo link_tag('assets/css/style.css', 'icon', 'text/css');?>

	</head>

<body>

	<header>
    <h4 class="logo">Doodle Like</h4>
    </a>
    <nav>
      <ul>
        <li>
			<a href="index.html">
				<button class="button2" id="Accueil">Accueil</button>
			</a>
        </li>
        <li>
			<a href="SeConnecter.html">
          <button class="button2" id="connexion">Se connecter</button>
			</a>
        </li>
      </ul>
    </nav>

		<?php    
			echo form_open('compte/create_compte',array('method'=>'get','style'=>'text-align:left'));
			echo form_submit('','Créer un compte');
			echo form_close();
		?>

		<?php
			echo form_open('compte/connect_compte',array('method'=>'get','style'=>'text-align:left'));
			echo form_submit('','Se connecter');
			echo form_close();
		?>
	</header>
	<main>