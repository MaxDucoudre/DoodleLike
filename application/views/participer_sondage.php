<?=validation_errors()?>

<div class="containerfooter">

	<?=form_open('sondage/participate_sondage/',array())?>

	<section class="hero" id="hero">
		<h2 class="hero_header">Doodle <span class="light">Like</span></h2><br>
		<p class="tagline">Participer au sondage</p>
	</section>

	<?php
	$compte = $_SESSION['compte'];
	?>
	
	<?php
	if(isset($_SESSION['connected'])) {
		if($_SESSION['connected']) {
			?>
			<h2 class="info">Nom :</h2>
			<input value="<?=$compte['nom']?>" id='nom' name='nom' placeholder='Nom' required type='text'>
		</br>

		<h2 class="info">Prenom :</h2>
		<input value="<?=$compte['prenom']?>" id='prenom' name='prenom' placeholder='Prénom' required type='text'>
		<?php
	} else {
		?>
		<h2 class="info">Nom :</h2>
		<input id='nom' name='nom' placeholder='Nom' required type='text'>
	</br>

	<h2 class="info">Prenom :</h2>
	<input id='prenom' name='prenom' placeholder='Prénom' required type='text'>
	<?php

}
} else {
	?>
	<h2 class="info">Nom :</h2>
	<input id='nom' name='nom' placeholder='Nom' required type='text'>
</br>

<h2 class="info">Prenom :</h2>
<input id='prenom' name='prenom' placeholder='Prénom' required type='text'>
<?php
}


?>

</br></br>


<?php




if($alldate != NULL) {
	$i=0;

	foreach ($alldate as $date) {

		$idDate = $this->model_date->getIdDatefromDate($cleSondage, $date);
		$allHoraireOfDate = $this->model_horaire->getHoraireofDate($idDate);

		if($allHoraireOfDate != null) {
					echo"<fieldset>";
					echo"<legend><h4>$date</h4></legend>";

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
			echo"</fieldset>";

	}

	echo"</br>";
}
$_SESSION['numberOfHoraire'] = $i;
$_SESSION['horaireAct'] = $horaire_array;
}
?>



<button type="submit" id="envoyer" name="envoyer" class="input2">Valider</button>


</form>