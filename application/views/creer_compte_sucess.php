<h1>
	Bienvenue <?=$nom?> <?=$prenom?> sur DoodleLike !
</h1>


		<?php

			echo form_open('doodlelike',array('method'=>'get','style'=>'text-align:left'));
			echo form_submit('','Accueil');
			echo form_close();
		?>
