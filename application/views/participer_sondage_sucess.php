<?=validation_errors()?>


<p> Votre participation a été prise en compte ! Merci </p>
		<?php
			echo form_open('./../',array('method'=>'get','style'=>'text-align:left'));
			echo form_submit('','Accueil');
			echo form_close();
		?>