<?=validation_errors()?>

<?php
		$all_SondageofCompte = $this->model_sondage->getSondageofCompte($idCompte);

echo"<h2>Vos sondages : </h2>";
foreach($all_SondageofCompte as $sondage) {

?>
	<h3>
		<?php
		if($sondage['ouvert'] == FALSE) {
			echo"Statut : FERME";
		} else {
			echo"Statut : OUVERT";
		}


	?>
		</br>
			Titre : <?=$sondage['titre']?> 
		</br>
			Lieu : <?=$sondage['lieu']?>
		</br>
			Description : <?=$sondage['descriptif']?>
		</br>
			Durée : <?=$sondage['duree']?> minutes
		</br>
			Clé d'accès : <?=$sondage['cle']?>
	</h3>
	<?php
				$cle = $sondage['cle'];

		if($sondage['ouvert'] == TRUE) {
			echo"<form action='clore_sondage/$cle' method='get' accept-charset='utf8'>";

			echo form_submit('','Clore le sondage');
			echo form_close();
		} else {
			
			echo"<form action='resultat_sondage/$cle' method='get' accept-charset='utf8'>";
			echo form_submit('','Voir le résultat');
			echo form_close();
		}
}


			echo"</br>";
			echo form_open('./../',array('method'=>'get','style'=>'text-align:left'));
			echo form_submit('','Accueil');
			echo form_close();
		?>