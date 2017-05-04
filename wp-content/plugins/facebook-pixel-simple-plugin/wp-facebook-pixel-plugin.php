<?php
/*
Plugin Name: Simple Facebook Pixel Plugin
Plugin URI: http://jonathanmartin.ca
Description: ** Activate only on production. Adds a Facebook Pixel tracking code to the <head> of your theme, by hooking to wp_head.
Author: Jonathan Martin
Version: 1.0
 */

function wpmambo_facebook_pixel() { ?>
	<!-- Facebook Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
	n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
	document,'script','https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '556614377863236'); // Insert your pixel ID here.
	fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=556614377863236&ev=PageView&noscript=1"
	/></noscript>
	<!-- DO NOT MODIFY -->
	<!-- End Facebook Pixel Code -->
<?php }
	add_action( 'wp_head', 'wpmambo_facebook_pixel', 10 );
?>