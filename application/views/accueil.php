<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

		<h1>DoodleLike</h1>


		<form>
			<input type="button" value="Rejoindre sondage">
		</form>

<?php 		

	if(isset($_SESSION['connected'])) {
		if($_SESSION['connected'] == true) {

				echo form_open('sondage/create_sondage',array('method'=>'get','style'=>'text-align:left'));
				echo form_submit('','Créer sondage');
				echo form_close();
		}
	}

?>
