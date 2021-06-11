 <div class="containerfooter"> 

  <section class="hero" id="hero">
    <h2 class="hero_header">Doodle <span class="light">Like</span></h2><br>
    <p class="tagline">Bonjour <?=$nom?> <?=$prenom?> ! Connection réussie</p>

    <?php
			echo form_open('./',array('method'=>'get','style'=>'text-align:left'));
			echo form_submit('','Retour','class="input3"');
			echo form_close();
		?>
  </section>


