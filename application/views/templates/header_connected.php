<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>DoodleLike</title>
		<link rel="stylesheet" href="<?=base_url('assets/css/style.css');?>">
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