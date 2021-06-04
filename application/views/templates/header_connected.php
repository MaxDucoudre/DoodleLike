<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>DoodleLike</title>
	</head>
<body>

	<header>

		<h1> Compte connecté : <a href="/index"> <?=$nom?> <?=$prenom?></a></h1>

		<?php

			echo form_open('compte/disconnect_compte',array('method'=>'get','style'=>'text-align:left'));
			echo form_submit('','Déconnexion');
			echo form_close();
		?>

	</header>
	<main>