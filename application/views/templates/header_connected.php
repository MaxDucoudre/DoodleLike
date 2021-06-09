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

		<h1> Compte connecté : <?=$nom?> <?=$prenom?></h1>

		<?php
			echo form_open('compte/profil',array('method'=>'get','style'=>'text-align:left'));
			echo form_submit('','Profil');
			echo form_close();

			echo form_open('compte/disconnect_compte',array('method'=>'get','style'=>'text-align:left'));
			echo form_submit('','Déconnexion');
			echo form_close();
		?>

	</header>
	<main>