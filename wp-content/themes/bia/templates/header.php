	<style>

	body{
		background-color:#f42534;
	}

	body,html{
		transition:0.5s transform ease-in-out;
	}

	#splash{
		transition:1s all ease-in-out;
	}

	#form-filtres input[type="text"]{
		display:none;
	}

	.no-scroll{
		overflow-y:hidden;
	}

	.no-scroll #splash{
		transform:translateX(-250px);
	}


	.bouton:after{
		content:'';
		width:100%;
		height:1px;
		background-color:black;
		position:relative;
	}

	#side-menu{
		position:fixed;
		left:0;
		transition:1s left;
	}

	#side-menu.visually-hidden{
		left:100%;
	}

	#side-menu

	#side-menu .smaller, #side-menu .email, footer a{
		opacity:1;
		transition:0.5s opacity ease-in-out;
	}

	#side-menu .smaller:hover, #side-menu .email:hover, footer a:hover{
		opacity:0.5;
		color:white;
		text-decoration:none;
	}

	#side-menu .tel{
		margin-top:40px;
	}

	#side-menu .tel, #side-menu .email, footer a{
		font-size:18px;
		color: #fff;
    	letter-spacing: .05em;
	    -webkit-font-smoothing: antialiased;
	    font-family: apercu;
	    margin-bottom:0;
	    padding:5px 15px;
	}

	#side-menu .social{
		padding-left:15px;
		list-style-type:none;
		margin-top:40px;
	}

	#side-menu .social li{
		display:inline-block;
		margin-right:22px;
	}

	#side-menu .social li:last-of-type{
		margin-right:0;
	}

	#side-menu .social li a img{
		width:auto;
		height:18px;
		opacity:1;
		transition:0.3s opacity ease-in-out;
	}

	#side-menu .social li a:hover img{
		opacity:0.5;
	}

	li.bold a span.title-menu{
		position:relative;
		z-index:10;
		background-color:transparent;
		transition:0.3s color ease-in-out;
	}

	li.bold a span{
		position:absolute;
		left:0;
		top:0;
		z-index:9;
		width:0;
		height:100%;
		background-color:white;
		transition:0.3s width ease-in-out;
	}

	li.bold a:hover span{
		width:100%;
	}

	li.bold a:hover span.title-menu{
		width:auto;
		color:#f42534;
	}


	#barreH .nav>li>a:after{
		width:100%;
		height:1px;
		content:'';
		display:block;
		background-color:white;
		position:relative;
		top:15px;
		opacity:0;
		transition:0.3s all ease-in-out;
	}

	#barreH .nav>li>a:focus, #barreH .nav>li>a:hover{
		background-color:#f42534;
	}

	#barreH .nav>li>a:focus:after, #barreH .nav>li>a:hover:after, #barreH .nav>li.current-menu-item>a:after{
		opacity:1;
		top:2px;
	}

	#btMenu{
		position:absolute;
		right:25px;
		top:30px;
		cursor:pointer;
		opacity:1;
		z-index:999999999;
		transition:0.3s all ease-in-out;
	}

	#btMenu:hover{
		opacity:0.75;
	}

	#btMenu .barre{
		width:28px;
		height:3px;
		background-color:white;
		display:block;
		margin-bottom:8px;
		border-radius:100px;
		transform-origin:center center;
		opacity:1;
		transition: 0.5s all ease-in-out;
	}

	#btMenu.open-menu{
		margin-top:10px;
	}

	#btMenu.open-menu .barre{
		width:35px;
	}

	#btMenu.open-menu .barre:nth-child(1){
		transform:rotate(45deg);
	}

	#btMenu.open-menu .barre:nth-child(2){
		opacity:0;
	}

	#btMenu.open-menu .barre:nth-child(3){
		transform: rotate(-45deg);
   		margin-top: -22px;
	}

	#splash #side-menu .bold a{
		transition:0.3s color ease-in-out;
	}

	#splash #side-menu .bold a:hover{
		color:#f42534;
	}

	.cart{
		position:absolute;
		right:80px;
		top:30px;
		z-index:99999999;
		cursor:pointer;
	}

	.cart img{
		opacity:1;
		transition:0.3s opacity ease-in-out;
	}

	.cart .qty{
		width:25px;
		height:25px;
		background-color:white;
		text-align:center;
		font-size:0;
		display:block;
		border-radius:100%;
		float:right;
		margin-left:8px;
		padding-top:2px;
		position:relative;
		overflow:hidden;
	}

	.cart .qty:before{
		content: attr(data-qty);
		left:50%;
		color:#f42534;
		font-size:14px;
		transform:translate(-50%,0%);
		position:absolute;
		transition:0.3s transform ease-in-out;
	}

	.cart .qty:after{
		content: attr(data-qty);
		color:#c0a7a9;
		left:50%;
		font-size:14px;
		transform:translate(-50%,100%);
		position:absolute;
		transition:0.3s transform ease-in-out;
	}

	.cart:hover img{
		opacity:0.85;
	}

	.cart:hover .qty:after{
		transform:translate(-50%,0%);
	}

	.cart:hover .qty:before{
		transform:translate(-50%,-100%);
	}


	/* FOOTER */

	footer{
		padding-left:80px;
		padding-right:80px;
	}

	footer .information-contact{
		text-align:right;
	}

	footer .information-contact a{
		display:inline-block;
		font-size:16px;
	}

	#menu-footer-menu{
		float:left;
	}

	#menu-footer-menu li{
		display:inline-block;
		margin-right:20px;
	}

	#menu-footer-menu li:last-of-type{
		margin-right:0;
	}

	#menu-footer-menu li a{
		padding:0;
		opacity:1;
		transition:0.5s opacity ease-in-out;
		font-size:16px;
	}

	#menu-footer-menu li a:hover{
		background-color:transparent;
		opacity:0.5;
	}

	/* FIltres */

	.section-filtre button:after{
		display:inline-block;
		margin-left:15px;
		content:'+';
	    font-weight: bolder;
	    font-family: apercu;
	    font-size: larger;
	    -webkit-transition: all .5;
	    -webkit-transform-origin: 50% 0;
	   
	}

	.list-filtre .list-item:after{
		display:inline-block;
		margin-left:15px;
		content:'+';
	    font-weight: bolder;
	    font-family: apercu;
	    font-size: larger;
	    -webkit-transition: all .5;
	}

	.list-filtre .list-item.active:after{
		content:'-';
		color:#f42534;
	}

	.list-item:hover, .list-item.active{
		color:#f42534;
	}

	.list-filtre .col-sm-3{
		cursor:pointer;
	}

	/* Home.scss */

	.enSavoirPlus a{
		border-bottom:2px solid #f42534;
		opacity:1;
		transition:0.5s opacity ease-in-out;
	}

	.enSavoirPlus a:hover{
		text-decoration:none;
		opacity:0.75;
	}

	</style>
	<div id="btMenu">
		  	<span class="barre"></span>
		   	<span class="barre"></span>
		   	<span class="barre"></span>
		</div>
		<div class="cart">
		    	<a href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( "Voir le panier d'achats" ); ?>">
		    		<img width="30px" src='<?php echo get_template_directory_uri(); ?>/dist/images/cart.svg' alt="Panier" />
		    		<span class="qty" data-qty="<?php echo WC()->cart->get_cart_contents_count(); ?>"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
		    	</a>
		    </div>
		<div id="barreH">
			<!--a href="#" ><button >Menu<!--<?php echo _e('Contact','bia'); ?>--></button></a-->
			    <nav class="nav-primary">
		      <?php
		      if (has_nav_menu('top_navigation')) :
		        wp_nav_menu(['theme_location' => 'top_navigation', 'menu_class' => 'nav']);
		      endif;
		      ?>
		      
		    </nav>
		</div>
		<h1>Bia</h1>
		<a href="<?php echo get_home_url(); ?>"><img id="logo" src='<?php echo get_template_directory_uri(); ?>/dist/images/bia_logo.svg' alt="Logo Bia" /></a>
		<?php if(!is_singular('faq-article')){ ?>
		<div id="barreV">
			<ul class="social"> 
				<?php if(get_field('facebook','option')){ ?>
					<li><a href="<?php echo get_field('facebook','option') ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/facebook_white.svg" alt="Logo Facebook" /></a></li>
				<?php } ?>
				<?php if(get_field('instagram','option')){ ?>
					<li><a href="<?php echo get_field('instagram','option') ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/instagram_white.svg" alt="Logo Instagram" /></a></li>
				<?php } ?>
				<?php if(get_field('twitter','option')){ ?>
					<li><a href="<?php echo get_field('twitter','option') ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/twitter_white.svg" alt="Logo Twitter" /></a></li>
				<?php } ?>
				<?php if(get_field('linkedin','option')){ ?>
							<li><a href="<?php echo get_field('linkedin','option') ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/linkedin_white.svg" alt="Logo LinkedIn" /></a></li>
				<?php } ?>
			</ul>
		</div>
	<header id="splash" style="background-image: url(<?php echo get_field('image_splash'); ?>)">
		<?php } ?>
		<div id="splashTitre">
			<?php if(is_page('2')){ ?>
				<h2><?php echo _e('Formations en</br> activité physique','bia'); ?></h2>
			<?php }else{ ?>
				<h2><?php echo get_field('titre_splash'); ?></h2>
			<?php } ?>
			
		</div>
		<?php if(is_page('2')){ ?>
		<div class="enSavoirPlus">
			<img id="logoEncadre" src="<?php echo get_field('image_information') ?>" /> 
			<?php echo get_field('texte_information'); ?>
			<?php if(get_field('lien_evenement')){ ?>
				<a href="<?php echo get_field('lien_evenement'); ?>" target="_blank">En savoir plus</a>
			<?php } ?>
		</div>
		<?php } ?>
	</header>

		<div id="side-menu" class="container-fluid visually-hidden">
			<div class="row">
				<div id="p-gauche" class="col-sm-6">
					<span class="circle-image" style="background-image:url('<?php echo get_field('right_image','option'); ?>');"></span>

				</div>
				<div id="p-droite" class="col-sm-6">
					<?php
				      if (has_nav_menu('side_navigation')) :
				        wp_nav_menu(['theme_location' => 'side_navigation', 'menu_class' => 'nav', 'link_before' =>'<span class="title-menu">', 'link_after' => '</span><span></span>']);
				      endif;
				      ?>

				      <?php if(get_field('tel','option')){ ?>
				      	<p class="tel"><?php echo get_field('tel','option'); ?></p>
				      <?php } ?>
				      <?php if(get_field('email','option')){ ?>
				      <a href="mailto:<?php echo get_field('email','option'); ?>" class="email"><?php echo get_field('email','option'); ?></a>
				      <?php } ?>
				      <ul class="social"> 
						<?php if(get_field('facebook','option')){ ?>
							<li><a href="<?php echo get_field('facebook','option') ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/facebook_white.svg" alt="Logo Facebook" /></a></li>
						<?php } ?>
						<?php if(get_field('instagram','option')){ ?>
							<li><a href="<?php echo get_field('instagram','option') ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/instagram_white.svg" alt="Logo Instagram" /></a></li>
						<?php } ?>
						<?php if(get_field('twitter','option')){ ?>
							<li><a href="<?php echo get_field('twitter','option') ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/twitter_white.svg" alt="Logo Twitter" /></a></li>
						<?php } ?>
						<?php if(get_field('linkedin','option')){ ?>
							<li><a href="<?php echo get_field('linkedin','option') ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/linkedin_white.svg" alt="Logo LinkedIn" /></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
			
		</div>