<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>DoodleLike</title>
		<link rel="stylesheet" href="https://www.iut-fbleau.fr/css/tacit.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	</head>

<body>

	<header>

		<h1> Compte connecté : <?=$nom?> <?=$prenom?></h1>

		<?php

			echo form_open('compte/disconnect_compte',array('method'=>'get','style'=>'text-align:left'));
			echo form_submit('','Déconnexion');
			echo form_close();
		?>

	</header>
	<main>