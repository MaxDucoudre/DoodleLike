

<h2> Votre réunion : </h2>
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
</fieldset>
	</form>


		<?php 
		if($alldate != NULL) {
			$i = 0;
			foreach ($alldate as $date) {
			$horaire = "horaire".$i;

				?>
					<form action="add_horaire" method="get" accept-charset="utf8">
				<?php

				echo"
				</br>
				<fieldset>

				<legend>$date</legend>
				<label for='horaire'>Ajouter horaire </label>
				";

				if($date == date('d-m-Y')) {
					?>
						<input required type="time" id="<?=$horaire?>" name="<?=$horaire?>" min="<?php echo date('H:i');?>" value="<?php echo date('H:i');?>">
					<?php

					} else {
					?>
						<input required type="time" id="<?=$horaire?>" name="<?=$horaire?>" value="00:00">
					<?php

					}
					
					 $array_date[$i] = $date;
					$i++;
				echo"<button type='submit' id='envoyer_horaire' name='envoyer_horaire'>Ajouter horaire</button>";

					if(isset($allhoraire)) {
						foreach($allhoraire as $horaire) {
							echo"<p>";

							$this->load->model('model_date');
							if($this->model_date->getDateWithId(substr($horaire,0,3)) == $date) {
								echo substr($horaire,6,5);

							}


							
							echo"</p>";
						}
					}
					
					echo"
				</fieldset>
				</form>";

					}
				$_SESSION['dateAct'] = $array_date;

				}
			?>


</br>
<!--
		<label  for="horaire">Ajouter heure</label>
		<input required type="time" id="horaire" name="horaire" >

		<button type="submit" id="envoyer" name="envoyer">Ajouter</button>
-->



		<?php
			echo form_open('./../',array('method'=>'get','style'=>'text-align:left'));
			echo form_submit('','Accueil');
			echo form_close();
		?>
