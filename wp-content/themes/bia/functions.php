<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php', // Theme customizer
  'lib/mailchimp.php' // Mailchimp
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

if( function_exists('acf_add_options_page') ) {
 
  $option_page = acf_add_options_page(array(
    'page_title'  => 'Options du thème',
    'menu_title'  => 'Options du thème',
    'menu_slug'   => 'theme-general-settings',
    'capability'  => 'manage_options',
    'redirect'  => false
  ));
 
}

add_filter( 'comment_form_default_fields', 'comment_placeholders' );

/**
 * Change default fields, add placeholder and change type attributes.
 *
 * @param  array $fields
 * @return array
 */
function comment_placeholders( $fields )
{
    
    $fields['author'] = '<div class="cont-field"><input placeholder="'._x('Prénom & Nom','bia').'" type="text" name="author" id="author" class="comments-author"  /></div>';

    $fields['email'] = '<div class="cont-field"><input placeholder="'._x('Adresse courriel','bia').'" type="email" name="email" id="email" class="comments-email"  /></div><span class="clear"></span>';
    $fields['url'] = '';

    return $fields;
}

// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {
       global $post;
  return '</br><a class="bouton" href="'. get_permalink($post->ID) . '"> Lire la suite</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function my_header_add_to_cart_fragment( $fragments ) {
 
    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?><span class="qty" data-qty="<?php echo WC()->cart->get_cart_contents_count(); ?>"></span><?php
 
    $fragments['span.qty'] = ob_get_clean();
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment' );


function wp_exist_post_by_title( $title ) {
    global $wpdb;
    $return = $wpdb->get_row( "SELECT ID FROM wp_posts WHERE post_title = '" . $title . "' && post_status = 'publish' && post_type = 'post' ", 'ARRAY_N' );
    if( empty( $return ) ) {
        return false;
    } else {
        return true;
    }
}



/* Create coupon programatically */
function generate_promo_code( $order_id ) {
   $order = new WC_Order( $order_id );
    $items = $order->get_items(); 
    foreach ( $items as $item ) {
      $product_id = $item['product_id'];
      
      if ( $product_id == 351 ){
        $hasClubBia = true;
      }
    }
   
    
    
    // execute code here
   if($hasClubBia){
      $coupon_code = 'club-bia-'.$order_id; // Code
      $amount = '5'; // Amount
      $discount_type = 'percent'; // Type: fixed_cart, percent, fixed_product, percent_product
      $email = $order->billing_email;
                  
      $coupon = array(
        'post_title' => $coupon_code,
        'post_content' => '',
        'post_status' => 'publish',
        'post_author' => 1,
        'post_type'   => 'shop_coupon'
      );
                  
      $new_coupon_id = wp_insert_post( $coupon );
        
                  
      // Add meta
      update_post_meta( $new_coupon_id, 'discount_type', $discount_type );
      update_post_meta( $new_coupon_id, 'coupon_amount', $amount );
      update_post_meta( $new_coupon_id, 'individual_use', 'no' );
      update_post_meta( $new_coupon_id, 'product_ids', '' );
      update_post_meta( $new_coupon_id, 'exclude_product_ids', '' );
      update_post_meta( $new_coupon_id, 'usage_limit', '' );
      update_post_meta( $new_coupon_id, 'expiry_date', '' );
      update_post_meta( $new_coupon_id, 'product_categories', array('7') );
      update_post_meta( $new_coupon_id, 'customer_email', $email);
      update_post_meta( $new_coupon_id, 'apply_before_tax', 'yes' );
      update_post_meta( $new_coupon_id, 'free_shipping', 'no' );

      try {
    
        $apikey = '7c4ae8f6c5f3ae101a5e88514817ff06-us13';
        $listid = '364867b1d9';
        $merge_vars = array();
        $MailChimp = new Mailchimp($apikey);
        $result = $MailChimp->lists->subscribe($listid,
                                                array('email'=>$order->billing_email),
                                                $merge_vars,
                                                false,
                                                false,
                                                false,
                                                false
                                               );
      } catch(Mailchimp_Error $e) {
      
      }


    }
}
add_action( 'woocommerce_payment_complete',
'generate_promo_code' );
