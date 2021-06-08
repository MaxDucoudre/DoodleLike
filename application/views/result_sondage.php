<?=validation_errors()?>

</br>
Titre : <?=$titre?> 
</br>
Lieu : <?=$lieu?>
</br>
Description : <?=$descriptif?>
</br>
Durée : <?=$duree?> minutes
</br>
Clé d'accès : <?=$cle?>


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



<?php			
echo"</br>";
echo form_open('./../',array('method'=>'get','style'=>'text-align:left'));
echo form_submit('','Accueil');
echo form_close();
?>

