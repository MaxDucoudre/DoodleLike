<h1>
	Bonjour <?=$nom?> <?=$prenom?> ! Connection réussie
</h1>


		<?php
			echo form_open('./../',array('method'=>'get','style'=>'text-align:left'));
			echo form_submit('','Retour');
			echo form_close();
		?>
