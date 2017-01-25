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

?>
<div style="width:50%; float:left;">
	<h2><?php _e( 'Customer details', 'woocommerce' ); ?></h2>
	
	    <?php foreach ( $fields as $field ) : ?>
	        <p><strong><?php echo wp_kses_post( $field['label'] ); ?>:</strong> <span class="text"><?php echo wp_kses_post( $field['value'] ); ?></span></p>
	    <?php endforeach; ?>
</div>
<div style="width:50%;  float:left;">
	<h2><?php _e( 'Détails du vendeur', 'bia' ); ?></h2>
	<p>Bia Formations<br/>389 ch. du Tour-du-Lac · Lac-Beauport,<br/>Qc G3B0T8 · Canada</p>
</div>