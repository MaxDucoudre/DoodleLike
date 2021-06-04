<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

		<h1>DoodleLike</h1>



		<?php
		if (isset($badkey)) {
			if($badkey) {
				echo"Clé invalide ! ";
			}
		}

			echo form_open('sondage/participate_sondage/',array('method'=>'get','style'=>'text-align:left'));
		?>
			<input value='<?=set_value('cle')?>' id='cle' name='cle' placeholder='Clé du sondage' required type='text'>

		<?php
			echo form_submit('','Rejoindre Sondage');
			echo form_close();
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
