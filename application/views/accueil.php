<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<!-- Main -->
<div class="container"> 

  <!-- Accueil Section -->
  <section class="hero" id="hero">
    <h2 class="hero_header">Doodle <span class="light">Like</span></h2>
    <p class="tagline">Créé ou rejoindre un sondage</p>
  </section>
  <!-- Section sur les sondages -->
		<?php
		if (isset($badkey)) {
			if($badkey) {
				echo"<p class='invalidecle'>Clé invalide !</p>";
			    
			}
		}

		if (isset($isActive)) {
			if(!$isActive) {
				echo"<p class='invalidecle'>Sondage encore actif !</p>";
				echo"</br>";
			}
		}

		if (isset($isclosed)) {
			if($isclosed) {
				echo"<p class='invalidecle'>Sondage cloturé !</p>";
				echo"</br>";
			}
		}


			echo form_open('sondage/participate_sondage/',array('method'=>'get','style'=>'text-align:left'));
		?>

		
			<input value='<?=set_value('cle')?>' id='cle' name='cle' placeholder='Clé du sondage' required type='text'>

		<?php
			echo"</br>";
			echo form_submit('','Rejoindre Sondage','class="input3"');
			echo form_close();
			echo"</br>";



			echo form_open('sondage/results/',array('method'=>'get','style'=>'text-align:left'));
		?>
			<input value='<?=set_value('cle')?>' id='cle' name='cle' placeholder='Clé du sondage' required type='text'>


		<?php
			echo"</br>";
			echo form_submit('','Afficher Résultats','class="input3"');
			echo form_close();
			echo"</br>";
		?>





<?php 		

	if(isset($_SESSION['connected'])) {
		if($_SESSION['connected'] == true) {

				echo form_open('sondage/create_sondage',array('method'=>'get','style'=>'text-align:left'));
				echo form_submit('','Créer sondage','class="input3"');
				echo form_close();
		}
	}

?>


