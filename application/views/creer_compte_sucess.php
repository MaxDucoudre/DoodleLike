<h1>
	Bienvenue <?=$nom?> <?=$prenom?> sur DoodleLike !
</h1>


		<?php

			echo form_open('./..',array('method'=>'get','style'=>'text-align:left'));
			echo form_submit('','Retour');
			echo form_close();
		?>
