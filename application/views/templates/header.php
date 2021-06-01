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