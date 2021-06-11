  
<div class="containerfooter"> 
  <section class="hero" id="hero">
    <h2 class="hero_header">Doodle <span class="light">Like</span></h2><br>
    <p class="tagline">Votre réunion :</p>
  </section>

  		</br>
			<p class="titre"><?=$sondage['titre']?></p>
		</br>
		<h4>
			Lieu : <?=$sondage['lieu']?></h4>
		<h4>
			Description : <?=$sondage['descriptif']?></h4>
		<h4>
			Durée : <?=$sondage['duree']?> minutes</h4>
		<h4>
			Clé d'accès : <?=$sondage['cle']?></h4>
		<h4>
			Créateur : <?=$login?> (<?=$prenom?> <?=$nom?>)</h4>

<?=form_open('sondage/add_date',array());?>
<fieldset>

	<legend>Ajouter des choix</legend>

		<label  for="date">Ajouter jour</label>
		<input required type="date" id="date" name="date" value="<?php echo date('Y-m-d');?>" min="<?php echo date('Y-m-d');?>" max="2030-01-01" >

		<button type="submit" id="envoyer" name="envoyer" class="input2">Ajouter</button>
		</br>
</fieldset>
	</form>


		<?php 
		if($alldate != NULL) {
			$i = 0;
			foreach ($alldate as $date) {

				echo"<fieldset>";

			$horaire = "horaire".$i;

				?>
					<form action="add_horaire" method="get" accept-charset="utf8">
				<?php

				echo"
				</br>

				<legend>$date</legend>
				<label for='horaire'>Ajouter horaire </label>
				";

				if($date == date('d-m-Y')) {
				echo"<fieldset>";

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
				echo"<button type='submit' id='envoyer_horaire' name='envoyer_horaire 'class='input2''>Ajouter horaire</button>";

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
					echo"</fieldset>";
					echo"</br>";

					
					echo"
				</form>";

				echo"</fieldset>";
				echo"</br>";

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
			echo form_open('sondage/ouvrir',array('method'=>'get','style'=>'text-align:left'));
			echo form_submit('','Valider','class="input3"');
			echo form_close();
		?>
