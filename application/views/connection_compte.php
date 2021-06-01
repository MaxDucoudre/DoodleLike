<?=validation_errors()?>
<?=form_open('compte/connect_compte',array())?>
<fieldset>

	<legend>Connection à DoodleLike</legend>

	<label  for="login">Login</label>
	<input value="<?=set_value('login')?>" id="login" name="login" placeholder="Login"  required type="text">

	<label  for="email">Mot de passe</label>
	<input value="<?=set_value('password')?>" id="password" name="password" placeholder="Password" required type="password">

	<button type="submit" id="envoyer" name="envoyer">Se connecter</button>
</fieldset>
</form>
