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

add_filter( 'woocommerce_add_error', function( $message ) {
    $message = str_replace("is a required field","est un champ requis",$message );
    $message = str_replace("Billing","",$message );
    return $message;
});

// remove Order Notes from checkout field in Woocommerce
add_filter( 'woocommerce_checkout_fields' , 'alter_woocommerce_checkout_fields' );
function alter_woocommerce_checkout_fields( $fields ) {
     unset($fields['order']['order_comments']);
     return $fields;
}

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


/**
 * Add the field to the checkout
 */
add_action( 'woocommerce_after_order_notes', 'my_custom_checkout_field' );

function my_custom_checkout_field( $checkout ) {

    echo '<h3 class="titreSection">' . __('Information<br/>complementaire') . '</h3><div class="white-bloc">';

    woocommerce_form_field( 'profession', array(
        'type'          => 'text',
        'label'         => __(''),
        'placeholder'   => __('Profession *'),
        'class' => array('form-row-first'),
        'required'  => true,
        ), $checkout->get_value( 'profession' ));

    woocommerce_form_field( 'employeur', array(
        'type'          => 'text',
        'label'         => __(''),
        'placeholder'   => __('Employeur'),
        'class' => array('form-row-last'),
        'required'  => false,
        ), $checkout->get_value( 'employeur' ));

    woocommerce_form_field( 'size_shirt', array(
        'type'          => 'text',
        'label'         => __(''),
        'placeholder'   => __('Grandeur de chandail*'),
        'class' => array('form-row-first'),
        'required'  => true,
        ), $checkout->get_value( 'size_shirt' ));

    echo "<br/>";
    echo '<span class="clear"></span>';
    echo "<div id='allergies-section'>";
    echo "<h4>".__('Allergies et préférences alimentaire:')."</h4>";
      echo "<div class='checkbox-container'>";
    woocommerce_form_field( 'lactose', array(
        'type'          => 'checkbox',
        'label'         => __('Sans lactose'),
        'class' => array('allergies-checkbox'),
        'required'  => false,
        ), $checkout->get_value( 'lactose' ));

    woocommerce_form_field( 'gluten', array(
        'type'          => 'checkbox',
        'label'         => __('Sans gluten'),
        'class' => array('allergies-checkbox'),
        'required'  => false,
        ), $checkout->get_value( 'gluten' ));

    woocommerce_form_field( 'vege', array(
        'type'          => 'checkbox',
        'label'         => __('Végétarien'),
        'class' => array('allergies-checkbox'),
        'required'  => false,
        ), $checkout->get_value( 'vege' ));

    echo '</div>';
    

    woocommerce_form_field( 'other', array(
        'type'          => 'text',
        'label'         => __(''),
        'placeholder'   => __('Autres'),
        'class' => array('form-row-first'),
        ), $checkout->get_value( 'other' ));

    echo '</div>';
    echo '<span class="clear"></span>';

    woocommerce_form_field( 'comments', array(
        'type'          => 'textarea',
        'label'         => __(''),
        'placeholder'   => __('Questions / Commentaires'),
        'class' => array('comments-section'),
        ), $checkout->get_value( 'comments' ));

    echo "J’autorise, par la présente, la diffusion de toute image ou vidéo de ma personne, en tout ou en partie, individuellement ou avec d’autres images ou vidéos sur le site Web de biaformations.com et sur d’autres sites officiels, ainsi qu’à des fins médiatiques et commerciales, y compris lors de présentations promotionnelles, de campagnes de publicité et de formations en ligne. J’autorise également la publication diffusion de toute image ou vidéo de ma personne, en tout ou en partie, individuellement ou avec d’autres images ou vidéos sur les réseaux sociaux.";

    woocommerce_form_field( 'photo', array(
        'type'          => 'checkbox',
        'label'         => __('Autorisation photo'),        
        'class' => array('auth-photo'),
        'required'  => true,
        ), $checkout->get_value( 'photo' ));

    woocommerce_form_field( 'newsletter', array(
        'type'          => 'checkbox',
        'label'         => __("Inscription à l'infolettre"),        
        'class' => array('newsletter'),
        'required'  => false,
        ), $checkout->get_value( 'newsletter' ));    

    echo '</div>';

}


/**
 * Process the checkout
 */
add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');

function my_custom_checkout_field_process() {
    // Check if set, if its not set add an error.
    if ( ! $_POST['profession'] )
        wc_add_notice( __( 'Vous devez ajouter une profession.' ), 'error' );

    if ( ! $_POST['size_shirt'] )
      wc_add_notice( __( 'Vous devez saisir une grandeur de chandail.' ), 'error' );

    if ( ! $_POST['photo'] )
      wc_add_notice( __( 'Vous devez autoriser de vous faire prendre en photo.' ), 'error' );
}


/**
 * Update the order meta with field value
 */
add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta' );

function my_custom_checkout_field_update_order_meta( $order_id ) {
    if ( ! empty( $_POST['profession'] ) ) {
        update_post_meta( $order_id, 'Profession', sanitize_text_field( $_POST['profession'] ) );
    }
    if ( ! empty( $_POST['employeur'] ) ) {
        update_post_meta( $order_id, 'Employeur', sanitize_text_field( $_POST['employeur'] ) );
    }
    if ( ! empty( $_POST['size_shirt'] ) ) {
        update_post_meta( $order_id, 'Grandeur chandail', sanitize_text_field( $_POST['size_shirt'] ) );
    }
    if ( ! empty( $_POST['other'] ) ) {
        update_post_meta( $order_id, 'Autres', sanitize_text_field( $_POST['other'] ) );
    }
    if ( ! empty( $_POST['comments'] ) ) {
        update_post_meta( $order_id, 'Commentaires', sanitize_text_field( $_POST['comments'] ) );
    }
    if ( ! empty( $_POST['lactose'] ) ) {
        update_post_meta( $order_id, 'Lactose', sanitize_text_field( $_POST['lactose'] ) );
    }
    if ( ! empty( $_POST['gluten'] ) ) {
        update_post_meta( $order_id, 'Gluten', sanitize_text_field( $_POST['gluten'] ) );
    }
    if ( ! empty( $_POST['vege'] ) ) {
        update_post_meta( $order_id, 'Végétarien', sanitize_text_field( $_POST['vege'] ) );
    }
    if ( ! empty( $_POST['photo'] ) ) {
        update_post_meta( $order_id, 'Autorisation photo', sanitize_text_field( $_POST['photo'] ) );
    }
    if ( ! empty( $_POST['newsletter'] ) ) {
        update_post_meta( $order_id, "Inscription à l'infolettre", sanitize_text_field( $_POST['newsletter'] ) );
    }
}


/**
 * Display field value on the order edit page
 */
add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );

function my_custom_checkout_field_display_admin_order_meta($order){
    echo "<hr>";
    echo '<p><strong>'.__('Profession').':</strong> ' . get_post_meta( $order->id, 'Profession', true ) . '</p>';
    echo '<p><strong>'.__('Employeur').':</strong> ' . get_post_meta( $order->id, 'Employeur', true ) . '</p>';
    echo '<p><strong>'.__('Grandeur Chandail').':</strong> ' . get_post_meta( $order->id, 'Grandeur chandail', true ) . '</p>';
    echo "<hr>";
    echo '<p><strong>'.__('Allergies et préférences alimentaire : ').'</strong></p>';
    echo '<p><strong>'.__('Lactose').':</strong> ' . get_post_meta( $order->id, 'Lactose', true ) . '</p>';
    echo '<p><strong>'.__('Gluten').':</strong> ' . get_post_meta( $order->id, 'Gluten', true ) . '</p>';
    echo '<p><strong>'.__('Végétarien').':</strong> ' . get_post_meta( $order->id, 'Végétarien', true ) . '</p>';
    echo '<p><strong>'.__('Autres').':</strong> ' . get_post_meta( $order->id, 'Autres', true ) . '</p>';
    echo "<hr>";
    echo '<p><strong>'.__('Commentaires').':</strong> ' . get_post_meta( $order->id, 'Commentaires', true ) . '</p>';
    echo '<p><strong>'.__('Infolettre ?').':</strong> ' . get_post_meta( $order->id, "Inscription à l'infolettre", true ) . '</p>';
}




/* Create coupon programatically */
function after_order_paid( $order_id ) {
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
                                                true,
                                                false,
                                                false
                                               );
      } catch(Mailchimp_Error $e) {
         error_log($e);
      }


    }


    //Newsletter aggreement
    $newsletterAgreement = get_post_meta( $order_id, "Inscription à l'infolettre", true );
   
    if($newsletterAgreement == '1' || $newsletterAgreement == 1 || $newsletterAgreement == true){
      try {
      
          $apikey = '7c4ae8f6c5f3ae101a5e88514817ff06-us13';
          $listid = '44a1134806';
          
          $profession = get_post_meta( $order_id, "Profession", true );
          $merge_vars = array("FNAME"=>$order->billing_first_name,"LNAME"=>$order->billing_last_name,"PROFFES"=>$profession,'VILLE'=>$order->billing_city);
          $MailChimp = new Mailchimp($apikey);
          $result = $MailChimp->lists->subscribe($listid,
                                                  array('email'=>$order->billing_email),
                                                  $merge_vars,
                                                  false,
                                                  true,
                                                  false,
                                                  false
                                                 );
        } catch(Mailchimp_Error $e) {
           error_log($e);
        }
    }
  


}
add_action( 'woocommerce_payment_complete', 'after_order_paid' );
