<?=validation_errors()?>
<?=form_open('compte/create_compte',array())?>

<div class="container3"> 
 <section class="hero" id="hero">
    <h2 class="hero_header">Doodle <span class="light">Like</span></h2><br>
    <p class="tagline">Créer un compte</p>
  </section>


	<h2 class="info">Pseudonyme :</h2>
	<input value="<?=set_value('login')?>" id="login" name="login" placeholder="Login"  required type="text">

	<h2 class="info">Nom :</h2>
	<input value="<?=set_value('nom')?>" id="nom" name="nom" placeholder="Nom"  required type="text">

	<h2 class="info">Prenom :</h2>
	<input value="<?=set_value('prenom')?>" id="prenom" name="prenom" placeholder="Prénom"  required type="text">

	<h2 class="info" >Email :</h2>
	<input value="<?=set_value('email')?>" id="email" name="email" placeholder="Adresse Mail" required type="email">

	<h2 class="info" >Mots de Passe :</h2>
	<input value="<?=set_value('password')?>" id="password" name="password" placeholder="Password" required type="password">
	<br>
	<button type="submit" id="envoyer" name="envoyer" class="input2">Créer</button>

</form>
