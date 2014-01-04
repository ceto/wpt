<?php
/**
 * Custom functions
 */


/********* Custom Post Types for Bauparzellen Management ****************/


/**
 * Apartment Definition
*/
function create_bauparzellen() {
  $labels = array(
    'name' => 'Bauparzellens',
    'singular_name' => 'Bauparzellen',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Bauparzellen',
    'edit_item' => 'Edit Bauparzellen',
    'new_item' => 'New Bauparzellen',
    'all_items' => 'All Bauparzellens',
    'view_item' => 'View Bauparzellen',
    'search_items' => 'Search Bauparzellens',
    'not_found' =>  'No Bauparzellens found',
    'not_found_in_trash' => 'No Bauparzellens found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Bauparzellen'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'bauparzellen' ),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title'  )
  ); 

  register_post_type( 'bauparzellen', $args );
}
add_action( 'init', 'create_bauparzellen' ); 

/********* END OF Custom Post Types for Bauparzellen Management ****************/

/********* Custom MetaBoxes for Bauparzellen Management ****************/

/**
 * Apartment Metaboxes
*/
add_filter( 'cmb_meta_boxes', 'cmb_bauparzellen' );
function cmb_bauparzellen( array $meta_boxes ) {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_meta_';

  $meta_boxes[] = array(
    'id'         => 'bmeta',
    'title'      => 'Additional details for this Bauparzellen',
    'pages'      => array( 'bauparzellen'), // Post type
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    'fields'     => array(

    array(
      'name' => __('Status'),
      'id'   => $prefix . 'status',
      'type' => 'radio_inline',
      'options' => array(
          array('name' => 'Available', 'value' => 'available',),
          array('name' => 'Reserved', 'value' => 'reserved',),
          array('name' => 'Sold', 'value' => 'sold',)
      )
    ),

    array(
        'name' => 'Size',
        'id'   => $prefix . 'size',
        'type' => 'text_small',
    ),
    array(
        'name' => 'Price',
        'id'   => $prefix . 'price',
        'type' => 'text_small',
    ),
    array(
        'name' => 'Link',
        'id'   => $prefix . 'link',
        'type' => 'text_medium',
    ),

    array(
        'name' => 'SVG Definition',
        'desc' => 'Experimental! Do not change it!',
        'id'   => $prefix . 'svgdata',
        'type' => 'textarea_small',
    ),
   
    ),
  );


  return $meta_boxes;
}

/********* End of Custom MetaBoxes for Bauparzellen Management ****************/

/********* Custom Post Types for Apartment Management ****************/


/**
 * Apartment Definition
*/
function create_apartment() {
  $labels = array(
    'name' => 'Apartments',
    'singular_name' => 'Apartment',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Apartment',
    'edit_item' => 'Edit Apartment',
    'new_item' => 'New Apartment',
    'all_items' => 'All Apartments',
    'view_item' => 'View Apartment',
    'search_items' => 'Search Apartments',
    'not_found' =>  'No Apartments found',
    'not_found_in_trash' => 'No Apartments found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Apartments'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'apartments' ),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  ); 

  register_post_type( 'apartment', $args );
}
add_action( 'init', 'create_apartment' ); 

/********* END OF Custom Post Types for Apartment Management ****************/


/********* Custom MetaBoxes for Apartment Management ****************/

/**
 * Apartment Metaboxes
*/
add_filter( 'cmb_meta_boxes', 'cmb_apartment' );
function cmb_apartment( array $meta_boxes ) {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_meta_';

  $meta_boxes[] = array(
    'id'         => 'ameta',
    'title'      => 'Additional details for this apartment',
    'pages'      => array( 'apartment'), // Post type
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    'fields'     => array(

    array(
      'name' => __('Status'),
      'id'   => $prefix . 'status',
      'type' => 'radio_inline',
      'options' => array(
          array('name' => 'Frei', 'value' => 'frei',),
          array('name' => 'Reserved', 'value' => 'reserved',),
          array('name' => 'Verkauft', 'value' => 'verkauft',)
      )
    ),
    array(
      'name' => __('Lage'),
      'id'   => $prefix . 'lage',
      'type' => 'radio_inline',
      'options' => array(
          array('name' => 'EG', 'value' => 'EG',),
          array('name' => '1. OG', 'value' => '1. OG',),
          array('name' => '2. OG', 'value' => '2. OG',),
          array('name' => '3. OG', 'value' => '3. OG',),
          array('name' => '4. OG', 'value' => '4. OG',),
          array('name' => '5. OG', 'value' => '5. OG',),
          array('name' => '6. OG', 'value' => '6. OG',)
      )
    ),

    array(
        'name' => 'Wohnfläche',
        'id'   => $prefix . 'wnf',
        'type' => 'text_small',
    ),
    array(
        'name' => 'Balkon',
        'id'   => $prefix . 'balkon',
        'type' => 'text_small',
    ),
    array(
        'name' => 'Terasse',
        'id'   => $prefix . 'terasse',
        'type' => 'text_small',
    ),
    array(
        'name' => 'Garten',
        'id'   => $prefix . 'garten',
        'type' => 'text_small',
    ),
    
    array(
        'name' => 'Kaufpreis',
        'id'   => $prefix . 'price',
        'type' => 'text_small',
    ),
    
    array(
        'name' => 'TG',
        'id'   => $prefix . 'tg',
        'type' => 'text_small',
    ),
    array(
        'name' => 'AP',
        'id'   => $prefix . 'ap',
        'type' => 'text_medium',
    ),
    array(
        'name' => 'Keller',
        'id'   => $prefix . 'keller',
        'type' => 'text_medium',
    ),

    array(
      'name' => 'Floor map',
      'desc' => 'Upload an image or enter an URL.',
      'id' => $prefix . 'floormap',
      'type' => 'file',
      'save_id' => true, // save ID using true
      'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
    ),

    array(
      'name' => 'Downloadable PDF',
      'desc' => 'Upload a PDF Document.',
      'id' => $prefix . 'pdf',
      'type' => 'file',
      'save_id' => true, // save ID using true
      'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
    ),

    array(
        'name' => 'SVG Definition',
        'desc' => 'Experimental! Do not change it!',
        'id'   => $prefix . 'svgdata',
        'type' => 'textarea_small',
    ),
   
    ),
  );


  return $meta_boxes;
}

/********* End of Custom MetaBoxes for Apartment Management ****************/

/************* Custom Taxonomies for Apartment Management *********/

add_action( 'init', 'create_object_taxonomies', 0 );

function create_object_taxonomies() {
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'              => _x( 'Objects', 'taxonomy general name' ),
    'singular_name'     => _x( 'Object', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Objects' ),
    'all_items'         => __( 'All Objects' ),
    'parent_item'       => __( 'Parent Object' ),
    'parent_item_colon' => __( 'Parent Object:' ),
    'edit_item'         => __( 'Edit Object' ),
    'update_item'       => __( 'Update Object' ),
    'add_new_item'      => __( 'Add New Object' ),
    'new_item_name'     => __( 'New Object Name' ),
    'menu_name'         => __( 'Object' ),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'object' ),
  );

  register_taxonomy( 'object', array( 'apartment' ), $args );
}

/********* Custom Tax Meta for Apartment Management ****************/

require_once("tmc/Tax-meta-class.php");
if (is_admin()){
  $prefix = '_meta_';
  $config = array(
    'id' => 'ometa',          // meta box id, unique per meta box
    'title' => 'Additional details for building and floor',          // meta box title
    'pages' => array('object'),        // taxonomy name, accept categories, post_tag and custom taxonomies
    'context' => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'fields' => array(),            // list of meta fields (can be added by field arrays)
    'local_images' => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => '/wp-content/themes/wpt/lib/tmc'          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );
  $my_meta =  new Tax_Meta_Class($config);
  //$my_meta->addRadio($prefix.'status',array('radiokey1'=>'Free','radiokey2'=>'Sold','radiokey3'=>'Reserved'),array('name'=> __('Status','roots'), 'std'=> array('radiokey1')));
  //$my_meta->addText($prefix.'area',array('name'=> __('Area','roots')));
  $my_meta->addTextarea($prefix.'svgdata',array('name'=> __('SVG Data','roots')));
  $my_meta->addImage($prefix.'image',array('name'=> __('Image of this item ','roots')));
  $my_meta->addWysiwyg($prefix.'content',array('name'=> __('Content editor ','tax-meta')));
  //$my_meta->addFile($prefix.'attach',array('name'=> __('File Attachement ','tax-meta')));

  //Finish Meta Box Decleration
  $my_meta->Finish();
}



/********* Custom MetaBoxes for Regular Pages and Posts ****************/


add_filter( 'cmb_meta_boxes', 'cmb_page_metaboxes' );
function cmb_page_metaboxes( array $meta_boxes ) {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_cmb_';

  $meta_boxes['page_metabox'] = array(
    'id'         => 'page_metabox',
    'title'      => __( 'Additional Content', 'root' ),
    'pages'      => array( 'page', 'post'), // Post type
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    //'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
    'fields'     => array(
      array(
        'name' => __( 'Main Subtitle', 'root' ),
        'desc' => __( 'Add your own subtitle (optional)', 'root' ),
        'id'   => $prefix . 'subtitle',
        'type' => 'text',
        // 'repeatable' => true,
        // 'on_front' => false, // Optionally designate a field to wp-admin only
      ),
      array(
        'name' => __( 'Title of Content Below', 'root' ),
        'desc' => __( 'Additional content title (optional)', 'root' ),
        'id'   => $prefix . 'title',
        'type' => 'text',
        // 'repeatable' => true,
        // 'on_front' => false, // Optionally designate a field to wp-admin only
      ),
      array(
        'name'    => __( 'Content Below', 'root' ),
        'desc'    => __( 'Additional content. Below the main content, or left column in posts (optional)', 'root' ),
        'id'      => $prefix . 'test_wysiwyg',
        'type'    => 'wysiwyg',
      ),
    ),
  );
  // Add other metaboxes as needed

  return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
function cmb_initialize_cmb_meta_boxes() {
  if ( ! class_exists( 'cmb_Meta_Box' ) )
    require_once 'cmb/init.php';

}



add_filter('the_content', 'bs_fix_shortcodes');
// Intelligently remove extra P and BR tags around shortcodes that WordPress likes to add
function bs_fix_shortcodes($content){   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );
    $content = strtr($content, $array);
    return $content;
}


add_action( 'init', 'add_shortcodes' );
function add_shortcodes() {
  add_shortcode('tabs', 'bs_tabs' );
  add_shortcode('tab', 'bs_tab' );
  add_shortcode('collapsibles', 'bs_collapsibles' );
  add_shortcode('collapse', 'bs_collapse' );
}


/*--------------------------------------------------------------------------------------
  *
  * bs_collapsibles
  *
  * @author Filip Stefansson
  * @since 1.0
  *
  *-------------------------------------------------------------------------------------*/
function bs_collapsibles( $atts, $content = null ) {

  if( isset($GLOBALS['collapsibles_count']) )
    $GLOBALS['collapsibles_count']++;
  else
    $GLOBALS['collapsibles_count'] = 0;

  $defaults = array();
  extract( shortcode_atts( $defaults, $atts ) );

  // Extract the tab titles for use in the tab widget.
  preg_match_all( '/collapse title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );

  $tab_titles = array();
  if( isset($matches[1]) ){ $tab_titles = $matches[1]; }

  $output = '';

  if( count($tab_titles) ){
    $output .= '<div class="panel-group" id="accordion-' . $GLOBALS['collapsibles_count'] . '">';
    $output .= do_shortcode( $content );
    $output .= '</div>';
  } else {
    $output .= do_shortcode( $content );
  }

  return $output;
}




/*--------------------------------------------------------------------------------------
  *
  * bs_collapse
  *
  * @author Filip Stefansson
  * @since 1.0
  *
  *-------------------------------------------------------------------------------------*/
function bs_collapse( $atts, $content = null ) {

  if( !isset($GLOBALS['current_collapse']) )
    $GLOBALS['current_collapse'] = 0;
  else
    $GLOBALS['current_collapse']++;

  extract(shortcode_atts(array(
    "title" => '',
    "type" => 'default',
    "state" => false
  ), $atts));

  if ($state == "active")
    $state = 'in';

  return '<div class="panel panel-' . $type . '"><div class="panel-heading"><h3 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-' . $GLOBALS['collapsibles_count'] . '" href="#collapse_' . $GLOBALS['current_collapse'] . '_'. sanitize_title( $title ) .'">' . $title . '</a></h3></div><div id="collapse_' . $GLOBALS['current_collapse'] . '_'. sanitize_title( $title ) .'" class="panel-collapse collapse ' . $state . '"><div class="panel-body">' . do_shortcode($content) . ' </div></div></div>';
}

/*--------------------------------------------------------------------------------------
  *
  * bs_tabs
  *
  * @author Filip Stefansson
  * @since 1.0
  * Modified by TwItCh twitch@designweapon.com
  * Now acts a whole nav/tab/pill shortcode solution!
  *-------------------------------------------------------------------------------------*/
function bs_tabs( $atts, $content = null ) {

  if( isset($GLOBALS['tabs_count']) )
    $GLOBALS['tabs_count']++;
  else
    $GLOBALS['tabs_count'] = 0;

  $defaults = array('class' => 'nav-tabs');
  extract( shortcode_atts( $defaults, $atts ) );


  // Extract the tab titles for use in the tab widget.
  preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );

  $tab_titles = array();
  if( isset($matches[1]) ){ $tab_titles = $matches[1]; }

  $output = '';

  if( count($tab_titles) ){
    $output .= '<ul class="nav ' . $class . '" id="custom-tabs-'. rand(1, 100) .'">';

    $i = 0;
    foreach( $tab_titles as $tab ){
      if($i == 0)
        $output .= '<li class="active">';
      else
        $output .= '<li>';

      $output .= '<a href="#custom-tab-' . $GLOBALS['tabs_count'] . '-' . sanitize_title( $tab[0] ) . '"  data-toggle="tab">' . $tab[0] . '</a></li>';
      $i++;
    }

      $output .= '</ul>';
      $output .= '<div class="tab-content">';
      $output .= do_shortcode( $content );
      $output .= '</div>';
  } else {
    $output .= do_shortcode( $content );
  }

  return $output;
}

/*--------------------------------------------------------------------------------------
  *
  * bs_tab
  *
  * @author Filip Stefansson
  * @since 1.0
  *
  *-------------------------------------------------------------------------------------*/
function bs_tab( $atts, $content = null ) {

  if( !isset($GLOBALS['current_tabs']) ) {
    $GLOBALS['current_tabs'] = $GLOBALS['tabs_count'];
    $state = 'active in';
  } else {

    if( $GLOBALS['current_tabs'] == $GLOBALS['tabs_count'] ) {
      $state = '';
    } else {
      $GLOBALS['current_tabs'] = $GLOBALS['tabs_count'];
      $state = 'active in';
    }
  }

  $defaults = array( 'title' => 'Tab');
  extract( shortcode_atts( $defaults, $atts ) );

  return '<div id="custom-tab-' . $GLOBALS['tabs_count'] . '-'. sanitize_title( $title ) .'" class="tab-pane fade ' . $state . '">'. do_shortcode( $content ) .'</div>';
}


// add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
// add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

// function remove_width_attribute( $html ) {
//    $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
//    return $html;
// }