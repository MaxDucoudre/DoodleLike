<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>DoodleLike</title>
		<link rel="stylesheet" href="<?=base_url('assets/css/style.css');?>">

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