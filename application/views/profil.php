<?=validation_errors()?>
<div class="containerfooter"> 

	<?php
	$all_SondageofCompte = $this->model_sondage->getSondageofCompte($idCompte);

	echo"<h2 class='sondage'>Vos sondages : </h2>";
	if($all_SondageofCompte != null) {
		foreach($all_SondageofCompte as $sondage) {
			echo "<fieldset>";
			?>
		<p class="titre"><?=$sondage['titre']?></p>

			<?php
			if($sondage['ouvert'] == FALSE) {

				echo"<p class='testfermer'>FERME</p>";
			} else {

				echo"<p class='testouvert'>OUVERT</p>";
			}


			?>


	</br>
	<h4>
		Lieu : <?=$sondage['lieu']?></h4>
		<h4>Description : <?=$sondage['descriptif']?></h4>
		<h4>Durée : <?=$sondage['duree']?> minutes</h4>
		<h4>Clé d'accès : <?=$sondage['cle']?></h4>
	</p>
	<?php
	$cle = $sondage['cle'];

	if($sondage['ouvert'] == TRUE) {
		echo"<form action='clore_sondage/$cle' method='get' accept-charset='utf8'>";

		echo form_submit('','Clore le sondage','class="input3"');
		echo form_close();
	} else {

		echo"<form action='resultat_sondage/$cle' method='get' accept-charset='utf8'>";
		echo form_submit('','Voir le résultat','class="input3"');
		echo form_close();
	}
	echo "</fieldset>";
	echo "</br>";

}
} else {
	echo"<h4>Aucun sondage a votre actif !</h4>";

}
?>
