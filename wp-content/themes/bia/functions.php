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
  'lib/customizer.php' // Theme customizer
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

