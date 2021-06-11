<?=validation_errors()?>
<?=form_open('compte/connect_compte',array())?>


<div class="container2"> 

  <!-- Accueil Section -->
  <section class="hero" id="hero">
    <h2 class="hero_header">Doodle <span class="light">Like</span></h2><br>
    <p class="tagline">Connection à DoodleLike</p>
  </section>

<?php
	if(isset($_SESSION['badpassword'])) {
		if($_SESSION['badpassword']) {
			echo"<p class='invalidecle'>Identifiants incorrects !</p>";

		}
	}
?>

	<h2 class="info">Login :</h2>
	<input value="<?=set_value('login')?>" id="login" name="login" placeholder="Login"  required type="text">
	<br>
	<h2 class="info" id="mdp">Mots de Passe :</h2>
	<input value="<?=set_value('password')?>" id="password" name="password" placeholder="Password" required type="password">
	<br>
	<button type="submit" id="envoyer" name="envoyer" class="input2">Se connecter</button>
</form>
