<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<link href="././css/style.css" rel="stylesheet" type="text/css">

<section class="hero" id="hero">
    <h2 class="hero_header">Doodle <span class="light">Like</span></h2>
    <p class="tagline">Créé ou rejoindre un sondage</p>
</section>



		<?php
		if (isset($badkey)) {
			if($badkey) {
				echo"Clé invalide !";
				echo"</br>";
			}
		}

		if (isset($isActive)) {
			if(!$isActive) {
				echo"Sondage encore actif !";
				echo"</br>";
			}
		}

		if (isset($isclosed)) {
			if($isclosed) {
				echo"Sondage cloturé !";
				echo"</br>";
			}
		}


			echo form_open('sondage/participate_sondage/',array('method'=>'get','style'=>'text-align:left'));
		?>
			<input value='<?=set_value('cle')?>' id='cle' name='cle' placeholder='Clé du sondage' required type='text'>

		<?php
			echo form_submit('','Rejoindre Sondage');
			echo form_close();
			echo"</br>";



			echo form_open('sondage/results/',array('method'=>'get','style'=>'text-align:left'));
		?>
			<input value='<?=set_value('cle')?>' id='cle' name='cle' placeholder='Clé du sondage' required type='text'>

		<?php
			echo form_submit('','Afficher Résultats');
			echo form_close();
			echo"</br>";
		?>





<?php 		

	if(isset($_SESSION['connected'])) {
		if($_SESSION['connected'] == true) {

				echo form_open('sondage/create_sondage',array('method'=>'get','style'=>'text-align:left'));
				echo form_submit('','Créer sondage');
				echo form_close();
		}
	}

?>
