

<h2> Votre réunion :
	<h3>
			Titre : <?=$sondage['titre']?>
		</br>
			Lieu : <?=$sondage['lieu']?>
		</br>
			Description : <?=$sondage['descriptif']?>
		</br>
			Durée : <?=$sondage['duree']?> minutes
		</br>
			Clé d'accès : <?=$sondage['cle']?>
		</br>
			Créateur : <?=$login?> (<?=$prenom?> <?=$nom?>)
	</h3>

<?=form_open('sondage/add_date',array());?>
<fieldset>

	<legend>Ajouter des choix</legend>

		<label  for="date">Ajouter jour</label>
		<input required type="date" id="date" name="date" value="<?php echo date('Y-m-d');?>" min="<?php echo date('Y-m-d');?>" max="2030-01-01" >

		<button type="submit" id="envoyer" name="envoyer">Ajouter</button>
		</br>

</form>


		<?php 
		if($alldate != NULL) {
			foreach ($alldate as $date) {

				form_open('sondage/add_horaire',array());
				echo"</br>";
				echo"<fieldset>";
				echo"<legend>$date</legend>";
				echo"
					<label for='horaire'>Ajouter horaire</label>
					";

					if(substr($date, 8, 2) == date('d')) {
				
						echo"
						<input required type='time' id='horaire' name='horaire' min='date('H:i')' value='date('H:i')'>
						";
					} else {
						echo"
						<input required type='time' id='horaire' name='horaire' value='date('H:i')'>
						";
					}

					echo"
					<button type='submit' id='envoyer' name='envoyer'>Ajouter horaire</button>
					";


				echo"</fieldset>";
				echo"</form>";
					}
				}
		?>
</fieldset>
</br>
<!--
		<label  for="horaire">Ajouter heure</label>
		<input required type="time" id="horaire" name="horaire" >

		<button type="submit" id="envoyer" name="envoyer">Ajouter</button>
-->



		<?php
			echo form_open('./../',array('method'=>'get','style'=>'text-align:left'));
			echo form_submit('','Retour');
			echo form_close();
		?>
