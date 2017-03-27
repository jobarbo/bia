<?php
/**
 * Additional Customer Details
 *
 * This is extra customer data which can be filtered by plugins. It outputs below the order item table.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-customer-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $woocommerce, $post, $bia_sent_to_customer;
$order = new WC_Order($post->ID);

$first_name = $order->billing_first_name;
$last_name = $order->billing_last_name;

?>
<div style="width:50%; float:left;">
	<h2><?php _e( 'Customer details', 'woocommerce' ); ?></h2>
	
	    <?php foreach ( $fields as $field ) : ?>
	        <p><strong><?php echo wp_kses_post( $field['label'] ); ?>:</strong> <span class="text"><?php echo wp_kses_post( $field['value'] ); ?></span></p>
	    <?php endforeach; ?>

	    <?php

	    	echo '<p>';

	    	echo '<strong>Nom du client:</strong> '. $first_name . ' ' . $last_name . '<br>';
	    	echo '<strong>Profession:</strong> '. get_post_meta( $order->id, 'Profession', true )."<br/>";
	    	echo '<strong>Employeur:</strong> '. get_post_meta( $order->id, 'Employeur', true )."<br/>";

	    	echo '</p>';

	    	if( $bia_sent_to_customer !== true ) {
	    		echo '<p>';
		    	echo '<strong>Allergie au lactose:</strong> '. returnTextMeta('Lactose', $order)."<br/>";
		    	echo '<strong>Allergie au gluten:</strong> '. returnTextMeta('Gluten', $order)."<br/>";
		    	echo '<strong>Végétarien:</strong> '. returnTextMeta('Végétarien', $order) ."<br/>";
		    	echo "<hr>";
		    	echo '<strong>Autres:</strong> '. get_post_meta( $order->id, 'Autres', true )."<br/>";
		    	echo "<hr>";
		    	echo "<strong>Inscription à l'infolettre:</strong> ". returnTextMeta("Inscription à l'infolettre", $order) ."<br/>";
		    	echo '<strong>Autorisation photo:</strong> '. returnTextMeta("Autorisation photo", $order) ."<br/>";
	    	}

	    	echo '</p>';
	    ?>

</div>
<div style="width:50%;  float:left;">
	<h2><?php _e( 'Détails du vendeur', 'bia' ); ?></h2>
	<p><strong>Bia Formations</strong><br/>389 ch. du Tour-du-Lac · Lac-Beauport,<br/>Qc G3B0T8 · Canada</p>
	<p><strong>TPS:</strong> 757533922 RT0001<br><strong>TVQ:</strong> 1223880106 TQ0001</p>


	<?php 
	    if( $bia_sent_to_customer !== true ) {
			echo '<p><strong>Commentaires:</strong> '. get_post_meta( $order->id, 'Commentaires', true ) . '</p>';
		}

		if( $bia_sent_to_customer === true ) { $bia_sent_to_customer = false; }
	?>

</div>