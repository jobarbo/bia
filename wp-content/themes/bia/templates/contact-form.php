            <!--div id="formulaireInscription">
							<p>Pour rester à l'affut de nos offres et de nos formations à venir.</p>
							<form action="action_page.php">
  								
  								<input type="text" name="firstname" placeholder="Prénom">
  								
  								<input type="text" name="lastname" placeholder="Nom">
  								
  								<input type="text" name="regio" placeholder="Ville"><br>
  								
  								<input type="text" name="titre" placeholder="Courriel">
  							
  								<input type="text" name="interet" placeholder="Profession">
  								<span class="formSelect">
  									<select name="interet" id="sources" class="custom-select sources" placeholder="Intérêts">
  										<option value="0">Nutrition</option>
	  									<option value="1">Psychologie sportive</option>
  									</select><br>
  								</span>
  								
  								<button type="submit" class="submit" value="S'inscrire">S'inscrire</button>
							</form>
						</div-->

<div id="formulaireInscription">
  <p class="formText"><?php echo get_field('intro_formulaire',2); ?></p>
  <div id="mc_embed_signup">
    <form action="//biaformations.us13.list-manage.com/subscribe/post?u=5651c764d0b83a317b47e6201&amp;id=44a1134806" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
      <div id="mc_embed_signup_scroll">
        <input type="text" value="" name="FNAME" class="required" id="mce-FNAME"  placeholder="Prénom">
        <input type="text" value="" name="LNAME" class="required" id="mce-LNAME" placeholder="Nom">
        <input type="text" value="" name="VILLE" class="required" id="mce-VILLE" placeholder="Ville"><br>
        <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Courriel">
        <input type="text" value="" name="PROFFES" class="required" id="mce-PROFFES" placeholder="Profession">
        <div id="listInterets">
           <p>Intérêts </p>
            
        </div>
        <ul id="list-interet">
              <li><input type="checkbox" value="2" name="group[6841][2]" id="mce-group[6841]-6841-0"><label for="mce-group[6841]-6841-0">Yoga</label></li>
              <li><input type="checkbox" value="4" name="group[6841][4]" id="mce-group[6841]-6841-1"><label for="mce-group[6841]-6841-1">Pilates</label></li>
              <li><input type="checkbox" value="8" name="group[6841][8]" id="mce-group[6841]-6841-2"><label for="mce-group[6841]-6841-2">Course à pied</label></li>
              <li><input type="checkbox" value="16" name="group[6841][16]" id="mce-group[6841]-6841-3"><label for="mce-group[6841]-6841-3">Cardio-Vélo</label></li>
              <li><input type="checkbox" value="32" name="group[6841][32]" id="mce-group[6841]-6841-4"><label for="mce-group[6841]-6841-4">Pédagogie</label></li>
              <li><input type="checkbox" value="64" name="group[6841][64]" id="mce-group[6841]-6841-5"><label for="mce-group[6841]-6841-5">Éducation motrice</label></li>
              <li><input type="checkbox" value="128" name="group[6841][128]" id="mce-group[6841]-6841-6"><label for="mce-group[6841]-6841-6">Nutrition</label></li>
              <li><input type="checkbox" value="256" name="group[6841][256]" id="mce-group[6841]-6841-7"><label for="mce-group[6841]-6841-7">Psychologie</label></li>
              <li><input type="checkbox" value="512" name="group[6841][512]" id="mce-group[6841]-6841-8"><label for="mce-group[6841]-6841-8">Cross training</label></li>
              <li><input type="checkbox" value="1024" name="group[6841][1024]" id="mce-group[6841]-6841-9"><label for="mce-group[6841]-6841-9">Physiologie de l'exercice</label></li>
              <li><input type="checkbox" value="2048" name="group[6841][2048]" id="mce-group[6841]-6841-10"><label for="mce-group[6841]-6841-10">Préparation physique</label></li>
              <li><input type="checkbox" value="4096" name="group[6841][4096]" id="mce-group[6841]-6841-11"><label for="mce-group[6841]-6841-11">Analyse biomécanique</label></li>
              <li><input type="checkbox" value="8192" name="group[6841][8192]" id="mce-group[6841]-6841-12"><label for="mce-group[6841]-6841-12">Anatomie</label></li>
              <li><input type="checkbox" value="16384" name="group[6841][16384]" id="mce-group[6841]-6841-13"><label for="mce-group[6841]-6841-13">Haltérophilie</label></li>
              <li><input type="checkbox" value="32768" name="group[6841][32768]" id="mce-group[6841]-6841-14"><label for="mce-group[6841]-6841-14">Posture</label></li>           
              <li><input type="checkbox" value="65536" name="group[6841][65536]" id="mce-group[6841]-6841-15"><label for="mce-group[6841]-6841-15">Clientèle spécifique</label></li>
              <li><input type="checkbox" value="131072" name="group[6841][131072]" id="mce-group[6841]-131072-16"><label for="mce-group[6841]-131072-16">Sport d'endurance</label></li>
              <li><input type="checkbox" value="262144" name="group[6841][262144]" id="mce-group[6841]-262144-17"><label for="mce-group[6841]-262144-17">Littératie Physique</label></li>
              <li><input type="checkbox" value="524288" name="group[6841][524288]" id="mce-group[6841]-524288-18"><label for="mce-group[6841]-524288-18">Autres intérêts</label></li>
            </ul>
        <div id="mce-responses" class="clear">
          <div class="response" id="mce-error-response" style="display:none"></div>
          <div class="response" id="mce-success-response" style="display:none"></div>
        </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_5651c764d0b83a317b47e6201_44a1134806" tabindex="-1" value=""></div>
        <div class="clear"><span class="triangleRouge"><input class="submit" type="submit" value="S'inscrire" name="subscribe" id="mc-embedded-subscribe" class="button"></span></div>
      </div>
    </form>
  </div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='VILLE';ftypes[3]='text';fnames[0]='EMAIL';ftypes[0]='email';fnames[4]='PROFFES';ftypes[4]='text';fnames[6]='INT';ftypes[6]='dropdown';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->
</div>

