<?=validation_errors()?>
<?=form_open('sondage/create_sondage',array())?>

<div class="containerfooter"> 

  <!-- Accueil Section -->
  <section class="hero" id="hero">
    <h2 class="hero_header">Doodle <span class="light">Like</span></h2><br>
    <p class="tagline">Créer un sondage</p>
  </section>

	<h2 class="info">Titre :</h2>
	<input value="<?=set_value('titre')?>" id="titre" name="titre" placeholder="Titre"  required type="text">

	<h2 class="info">Lieu :</h2>
	<input value="<?=set_value('lieu')?>" id="lieu" name="lieu" placeholder="Lieu"  required type="text">

	<h2 class="info">Descriptif :</h2>
	<input value="<?=set_value('descriptif')?>" id="descriptif" name="descriptif" placeholder="Descriptif"  required type="text">

	<h2 class="info">Durée :</h2>
	<input value="<?=set_value('duree')?>" id="duree" name="duree" placeholder="Durée (minutes)"  required type="number">

<br>
	<button type="submit" id="envoyer" name="envoyer" class="input2">Créer</button>

</form>
