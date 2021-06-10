<?=validation_errors()?>
 <div class="containerfooter"> 

</br><p class="titre"><p class="titre"><?=$titre?></p>

</br><h4>
Lieu : <?=$lieu?></h4>
<h4>
Description : <?=$descriptif?></h4>
<h4>
Durée : <?=$duree?> minutes</h4>
<h4>
Clé d'accès : <?=$cle?></h4>


<?php
$alldate = $this->model_date->getDatefromSondage($cle);
$allparticipant;
foreach($alldate as $date) {
	echo"<fieldset>";
	echo"<h4>$date</h4>";

	$idDate = $this->model_date->getIdDatefromDate($cle, $date);
	$allhoraire = $this->model_horaire->getHoraireofDate($idDate);
	foreach($allhoraire as $horaire) {

		$horaire = substr($horaire, 4,5);

		$idHoraire = $this->model_horaire->getidHoraireFromDateAndHoraire($idDate, $horaire);
		$allparticipant = $this->model_reponse->getReponseofHoraire($idHoraire);		
		$numberofparticipant = $this->model_reponse->countParticipantInHoraire($idHoraire);
		echo"<fieldset>";

		echo"<p>$horaire : $numberofparticipant réponse(s)</p>";



		if($numberofparticipant != 0) {
			foreach($allparticipant as $participant) {

				echo "<p>$participant</p>";
			}

		}
			echo"</fieldset>";




	}
		echo"</fieldset>";

}



?>

