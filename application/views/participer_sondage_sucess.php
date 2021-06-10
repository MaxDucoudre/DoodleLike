<?=validation_errors()?>

<div class="containerfooter"> 

  <section class="hero" id="hero">
    <h2 class="hero_header">Doodle <span class="light">Like</span></h2><br>
    <p class="tagline">Votre participation a été prise en compte ! Merci </p>

    <?php
			echo form_open('./../',array('method'=>'get','style'=>'text-align:left'));
			echo form_submit('','Retour','class="input3"');
			echo form_close();
		?>
  </section>
