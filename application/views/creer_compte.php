<?=validation_errors()?>
<?=form_open('compte/create_compte',array())?>
<fieldset>

	<legend>Créer un compte</legend>

	<label  for="login">Pseudonyme</label>
	<input value="<?=set_value('login')?>" id="login" name="login" placeholder="Login"  required type="text">

	<label  for="nom">Nom</label>
	<input value="<?=set_value('nom')?>" id="nom" name="nom" placeholder="Nom"  required type="text">

	<label  for="prenom">Prénom</label>
	<input value="<?=set_value('prenom')?>" id="prenom" name="prenom" placeholder="Prénom"  required type="text">

	<label  for="email">Email</label>
	<input value="<?=set_value('email')?>" id="email" name="email" placeholder="Adresse Mail" required type="email">

	<label  for="email">Mot de passe</label>
	<input value="<?=set_value('password')?>" id="password" name="password" placeholder="Password" required type="password">

	<button type="submit" id="envoyer" name="envoyer">Créer</button>
</fieldset>
</form>
