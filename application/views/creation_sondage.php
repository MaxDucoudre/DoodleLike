<?=validation_errors()?>
<?=form_open('sondage/create_sondage',array())?>
<fieldset>

	<legend>Créer un sondage</legend>

	<label  for="titre">Titre</label>
	<input value="<?=set_value('titre')?>" id="titre" name="titre" placeholder="Titre"  required type="text">

	<label  for="lieu">Lieu</label>
	<input value="<?=set_value('lieu')?>" id="lieu" name="lieu" placeholder="Lieu"  required type="text">

	<label  for="descriptif">Descriptif</label>
	<input value="<?=set_value('descriptif')?>" id="descriptif" name="descriptif" placeholder="Descriptif"  required type="text">

	<label  for="duree">Durée</label>
	<input value="<?=set_value('duree')?>" id="duree" name="duree" placeholder="Durée (minutes)"  required type="number">


	<button type="submit" id="envoyer" name="envoyer">Créer</button>
</fieldset>
</form>
