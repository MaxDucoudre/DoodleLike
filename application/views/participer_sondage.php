<?=validation_errors()?>
<?=form_open('sondage/participate_sondage',array())?>
<fieldset>

	<legend>Créer un sondage</legend>


	<?php


	if(!isset($_SESSION['connected']) || !$_SESSION['connected']) {
		echo"
		<label  for='nom'>Nom</label>
		<input value='<?=set_value('nom')?>' id='nom' name='nom' placeholder='Nom'  required type='text'>

		<label  for='prenom'>Prénom</label>
		<input value='<?=set_value('prenom')?>'' id='prenom' name='prenom' placeholder='Prénom'  required type='text'>
		";
	}
	?>


	<label  for="participate">S'inscrire</label>
	<input value="<?=set_value('participate')?>" id="participate" name="participate"  required type="checkbox">



	<button type="submit" id="envoyer" name="envoyer">Valider</button>

</fieldset>
</form>



		<?php
			echo form_open('./../',array('method'=>'get','style'=>'text-align:left'));
			echo form_submit('','Accueil');
			echo form_close();
		?>