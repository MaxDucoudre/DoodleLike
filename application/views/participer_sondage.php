<?=validation_errors()?>


<?=form_open('sondage/participate_sondage/',array())?>
<fieldset>
	<legend>Participer au sondage</legend>

	<?php
	$compte = $_SESSION['compte'];
	?>
	
	<?php
	if(isset($_SESSION['connected'])) {
		if($_SESSION['connected']) {
			?>
			<label  for='nom'>Nom</label>
			<input value="<?=$compte['nom']?>" id='nom' name='nom' placeholder='Nom' required type='text'>
		</br>

		<label  for='prenom'>Prénom</label>
		<input value="<?=$compte['prenom']?>" id='prenom' name='prenom' placeholder='Prénom' required type='text'>
		<?php
	} else {
		?>
		<label  for='nom'>Nom</label>
		<input id='nom' name='nom' placeholder='Nom' required type='text'>
	</br>

	<label  for='prenom'>Prénom</label>
	<input id='prenom' name='prenom' placeholder='Prénom' required type='text'>
	<?php

}
} else {
	?>
	<label  for='nom'>Nom</label>
	<input id='nom' name='nom' placeholder='Nom' required type='text'>
</br>

<label  for='prenom'>Prénom</label>
<input id='prenom' name='prenom' placeholder='Prénom' required type='text'>
<?php
}


?>

</br></br>


<?php




if($alldate != NULL) {
	$i=0;

	foreach ($alldate as $date) {
		echo"$date";
		$idDate = $this->model_date->getIdDatefromDate($cleSondage, $date);
		$allHoraireOfDate = $this->model_horaire->getHoraireofDate($idDate);

		foreach ($allHoraireOfDate as $horaire) {
			$horaire = substr($horaire,4,5);
			$horaire_array[$i] = $horaire;

			?>
		</br>
		<label  for="participate_horaire"><?php echo"$horaire"?></label>
		<input id="<?php echo"$i"?>" name="<?php echo"$i"?>" type="checkbox">
		<?php
		$i++;
	}
	echo"</br></br>";
}
$_SESSION['numberOfHoraire'] = $i;
$_SESSION['horaireAct'] = $horaire_array;
}
?>



<button type="submit" id="envoyer" name="envoyer">Valider</button>

</fieldset>
</form>



<?php
echo form_open('./../',array('method'=>'get','style'=>'text-align:left'));
echo form_submit('','Accueil');
echo form_close();
?>