<?php
// Register Custom Post Type
function bee_pricing_table() {

	$bee_pricing_labels = array(
		'name'                  => _x( 'Pricing Tables', 'Post Type General Name', 'bee_pricing_table' ),
		'singular_name'         => _x( 'Pricing Table', 'Post Type Singular Name', 'bee_pricing_table' ),
		'menu_name'             => __( 'Pricing Table', 'bee_pricing_table' ),
		'name_admin_bar'        => __( 'Pricing Table', 'bee_pricing_table' ),
		'archives'              => __( 'Pricing Table Archives', 'bee_pricing_table' ),
		'parent_item_colon'     => __( 'Parent Item:', 'bee_pricing_table' ),
		'all_items'             => __( 'All Pricing Tables', 'bee_pricing_table' ),
		'add_new_item'          => __( 'Add New Pricing Table', 'bee_pricing_table' ),
		'add_new'               => __( 'Add New', 'bee_pricing_table' ),
		'new_item'              => __( 'New Pricing Table', 'bee_pricing_table' ),
		'edit_item'             => __( 'Edit Pricing Table', 'bee_pricing_table' ),
		'update_item'           => __( 'Update Pricing Table', 'bee_pricing_table' ),
		'view_item'             => __( 'View Pricing Table', 'bee_pricing_table' ),
		'search_items'          => __( 'Search Pricing Table', 'bee_pricing_table' ),
		'not_found'             => __( 'Not found', 'bee_pricing_table' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'bee_pricing_table' ),
		'featured_image'        => __( 'Featured Image', 'bee_pricing_table' ),
		'set_featured_image'    => __( 'Set featured image', 'bee_pricing_table' ),
		'remove_featured_image' => __( 'Remove featured image', 'bee_pricing_table' ),
		'use_featured_image'    => __( 'Use as featured image', 'bee_pricing_table' ),
		'insert_into_item'      => __( 'Insert into Pricing Table', 'bee_pricing_table' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Pricing Table', 'bee_pricing_table' ),
		'items_list'            => __( 'Pricing Table list', 'bee_pricing_table' ),
		'items_list_navigation' => __( 'Pricing Table list navigation', 'bee_pricing_table' ),
		'filter_items_list'     => __( 'Filter Pricing Table list', 'bee_pricing_table' ),
	);
	$bee_pricing_args = array(
		'label'                 => __( 'Pricing Table', 'bee_pricing_table' ),
		'description'           => __( 'Pricing Table Description', 'bee_pricing_table' ),
		'labels'                => $bee_pricing_labels,
		'supports'              => array( 'title', ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-slides',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'bee_pricing_table', $bee_pricing_args );

}


add_filter('screen_layout_columns', 'bee_pricing_table_screen_layout', 10, 2);
function bee_pricing_table_screen_layout($bee_pricing_columns, $bee_pricing_screen) {
	
       if ($bee_pricing_screen === 'bee_pricing_table'){
		$bee_pricing__columns[$bee_pricing_screen] = 1;
	}
	return $bee_pricing_columns;
}

add_filter( 'get_user_option_screen_layout_bee_pricing_table', 'tt_ptp_user_option_screen_layout_bee_pricing_tables' );
function tt_ptp_user_option_screen_layout_bee_pricing_tables() {
    
    $screen = get_current_screen();
	if ( 'bee_pricing_table' == $screen->id ) {
		 return 1;
	}
   
}

add_action( 'init', 'bee_pricing_table', 0 );

function bee_move_post_metaboxes( $post ) {
    global $wp_meta_boxes;

    remove_meta_box( 'submitdiv', 'bee_pricing_table', 'side' );
    add_meta_box( 'submitdiv', __( 'Publish' ), 'post_submit_meta_box', 'bee_pricing_table', 'normal', 'low' );
}
add_action( 'add_meta_boxes_bee_pricing_table', 'bee_move_post_metaboxes' );


add_action( 'cmb2_init', 'bee_pricing_table_to_tabs' );
function bee_pricing_table_to_tabs() {

	$prefix ='bee_pricing_';

	$bee_pricing_plan_sample = array(
								str_pad(__('e.g. 1 Domain', 'bee_pricing_table'), 40),
								str_pad(__('10,000 GB Bandwidth /mo ', 'bee_pricing_table'), 40),
								str_pad(__('Unlimited Softwares', 'bee_pricing_table'), 40),
								str_pad(__('Free SSL certificate', 'bee_pricing_table'), 40),
							);


	$bee_pricing_tab = new_cmb2_box( array(
		'id'           => 'bee_metabox_tabs',
		'title'        => 'Table Builder',
		'object_types' => array('bee_pricing_table'), // post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true // Show field names on the left
	) );

	$bee_pricingid = $bee_pricing_tab->add_field( array(
		'id'           => $prefix.'tab1_group',
		'type'         => 'group',
		'repeatable'   => true,
		'before_group' => '<div class="tab-content" id="tab-1">',
		'after_group'  => '</div>',
		'options'      => array(
			'group_title'   => 'Tables',
			'sortable'      => true, // beta
			 'add_button'    => 'Add Table ',
             'remove_button' => 'Remove Table',
			'show_as_tab'   => true
		)
	) );

	$bee_pricing_tab->add_group_field( $bee_pricingid, array(
		'name'         => __( 'Package', 'cmb2' ),
		'id'           => $prefix.'package',
		'type'         => 'text',
		'attributes'  => array(
        'placeholder' => 'e.g. Basic Plan',
        'required'    => 'required',
    ),
	) );
	
		$bee_pricing_tab->add_group_field( $bee_pricingid, array(
		'name'      => __( 'Featured', 'cmb2' ),
        'id'      => $prefix.'highlight',
        'desc' => 'Check  For Feature Plan',
        'type' => 'checkbox',
	) );
	
	$bee_pricing_tab->add_group_field( $bee_pricingid, array(
		'name'         => __( 'Price', 'cmb2' ),
		'id'           => $prefix.'price',
		'type'         => 'text',
		'attributes'  => array(
        'placeholder' =>'e.g. $35/mo',
        'required'    => 'required',
    ),
		
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );
	
	$bee_pricing_tab->add_group_field( $bee_pricingid, array(
		'name'         => __( 'Features', 'cmb2' ),
		'id'           => $prefix.'features',
		'type'         => 'textarea',
		'desc' => 'Enter one per line',
	    'attributes'  => array(
        'placeholder' =>implode('',$bee_pricing_plan_sample),
		 'rows'        => 3,
        'required'    => 'required',
    ),
	) );
		$bee_pricing_tab->add_group_field( $bee_pricingid, array(
		'name'         => __( 'Button Text', 'cmb2' ),
		'id'           => $prefix.'button',
		'type'         => 'text',
		'attributes'  => array(
        'placeholder' =>'e.g. Buy Now',
        'required'    => 'required',
    ),
		
	    'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );
		$bee_pricing_tab->add_group_field( $bee_pricingid, array(
		'name'         => __( 'URL', 'cmb2' ),
		'id'           => $prefix.'url',
		'type'         => 'text',
		'attributes'  => array(
        'placeholder' =>'http://yourdomain.com/buy',
        'required'    => 'required',
    ),
		
	    'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );

	$bee_pricingid2 = $bee_pricing_tab->add_field( array(
		'id'           => $prefix . 'tab2_group',
		'type'         => 'group',
		'repeatable'   => false,
		'before_group' => '<div class="tab-content" id="tab-2">',
		'after_group'  => '</div>',
		'options'      => array(
			'group_title'   => 'Style',
			'sortable'      => false, // beta
			'show_as_tab'   => true
		),
	) );
///General Table Style

$bee_pricing_tab->add_group_field( $bee_pricingid2, array(
    'name' => '<h3>General Table Style</h3>',
    
    'type' => 'title',
    'id'   => 'bee_pricing_genstyle'
) );	
	$bee_pricing_tab->add_group_field( $bee_pricingid2, array(
		'name'        => __( 'Header Color', 'cmb2' ),
		'id'          => 'bee_princg_headercolor',
		'type'        => 'colorpicker',
		
	) );
	$bee_pricing_tab->add_group_field( $bee_pricingid2, array(
		'name'        => __( 'Price Background Color', 'cmb2' ),
		'id'          => 'bee_princg_bgcolor',
		'type'        => 'colorpicker',
		
	) );
	$bee_pricing_tab->add_group_field( $bee_pricingid2, array(
		'name'        => __( 'Price Font Color', 'cmb2' ),
		'id'          => 'bee_princg_font_color',
		'type'        => 'colorpicker',
		
	) );
	$bee_pricing_tab->add_group_field( $bee_pricingid2, array(
		'name'        => __( 'Icon Color', 'cmb2' ),
		'id'          => 'bee_princg_icon_color',
		'type'        => 'colorpicker',
		
	) );
	$bee_pricing_tab->add_group_field( $bee_pricingid2, array(
		'name'        => __( 'Button  Color', 'cmb2' ),
		'id'          => 'bee_princg_button_color',
		'type'        => 'colorpicker',
		
	) );
	
	 $bee_pricing_tab->add_group_field( $bee_pricingid2, array(
		'name'        => __( 'Button Hover Color', 'cmb2' ),
		'id'          => 'bee_princg_btnfont_hover_color',
		'type'        => 'colorpicker',
		
	) ); 
     $bee_pricing_tab->add_group_field( $bee_pricingid2, array(
		'name'        => __( 'Button  Font Color', 'cmb2' ),
		'id'          => 'bee_princg_btnfont_color',
		'type'        => 'colorpicker',
		
	) );
	
///Featured Table Style
$bee_pricing_tab->add_group_field( $bee_pricingid2, array(
    'name' => '<h3>Featured Table Style</h3>',
    
    'type' => 'title',
    'id'   => 'bee_pricing_featurestyle'
) );
$bee_pricing_tab->add_group_field( $bee_pricingid2, array(
		'name'        => __( 'Featured Header Color', 'cmb2' ),
		'id'          => 'bee_princg_featured_header_color',
		'type'        => 'colorpicker',
		
	) );
$bee_pricing_tab->add_group_field( $bee_pricingid2, array(
		'name'        => __( 'Featured Price Background Color', 'cmb2' ),
		'id'          => 'bee_princg_featured_bg',
		'type'        => 'colorpicker',
		
	) );
	
	$bee_pricing_tab->add_group_field( $bee_pricingid2, array(
		'name'        => __( 'Featured Icon Color', 'cmb2' ),
		'id'          => 'bee_princg_featured_icon',
		'type'        => 'colorpicker',
		
	) );
	
	
	$bee_pricing_tab->add_group_field( $bee_pricingid2, array(
		'name'        => __( 'Featured Button Color', 'cmb2' ),
		'id'          => 'bee_princg_featured_button_color',
		'type'        => 'colorpicker',
		
	) );
		$bee_pricing_tab->add_group_field( $bee_pricingid2, array(
		'name'        => __( 'Featured Button Font Color', 'cmb2' ),
		'id'          => 'bee_princg_featured_button_font_color',
		'type'        => 'colorpicker',
		
	) );
	$bee_pricing_tab->add_group_field( $bee_pricingid2, array(
		'name'        => __( 'Featured Button  Hover Color', 'cmb2' ),
		'id'          => 'bee_princg_featured_button_font_hover_color',
		'type'        => 'colorpicker',
		
	) );	
	$bee_pricing_tab->add_group_field( $bee_pricingid2, array(
		'name'        => __( 'Featured Button  Hover Color', 'cmb2' ),
		'id'          => 'bee_princg_featured_button_font_hover_color',
		'type'        => 'colorpicker',
		
	) );		
	

}

add_action( 'cmb2_before_post_form_bee_metabox_tabs', 'tabs_cmb2', 10, 2 );
function tabs_cmb2( $object_id, $cmb2 ) {
	echo '<ul class="tabs-menu">';
	$i = 0;
	foreach( $cmb2->meta_box['fields'] as $field_name => $field ) {
		if( $field['type'] == 'group' && ( isset( $field['options']['show_as_tab'] ) && ( $field['options']['show_as_tab'] == true ) ) ){
			$class = ( $i == 0 ) ? ' class="current"' : '';
			$tab_num = $i+1;
			echo '<li'. $class .'><a href="#tab-' . $tab_num . '">' . $field['options']['group_title'] . '</a></li>';
		}
		$i++;
	}
	echo '</ul>';
}

add_action( 'admin_head', 'cmb2_tabs_style' );
function cmb2_tabs_style() {
?>
<script>

jQuery(document).ready(function() {
	jQuery(".tabs-menu a").click(function(event) {
		event.preventDefault();
		jQuery(this).parent().addClass("current");
		jQuery(this).parent().siblings().removeClass("current");
		var tab = jQuery(this).attr("href");
		jQuery(".tab-content").not(tab).css("display", "none");
		jQuery(tab).fadeIn();
	});
});
</script>
<?php
}
add_action( 'manage_bee_pricing_table_posts_custom_column', function ( $bee_pricing_column_name, $post_id ) 
{
$bee_pricing_table_code="";
    if ( $bee_pricing_column_name == 'bee_pricing_table_shortcode')
	$bee_pricing_table_code="[bee-pricing beeid="."'".get_the_ID()."'"."]";
        printf( '<input type="text" value="'.$bee_pricing_table_code.'" size="25" readonly />');
}, 10, 2 );


add_filter('manage_bee_pricing_table_posts_columns', function ( $bee_table_columns ) 
{
    if( is_array( $bee_table_columns ) && ! isset( $bee_table_columns['bee_pricing_table_shortcode'] ) )
        $bee_table_columns['bee_pricing_table_shortcode'] = __( 'Pricing Table Shortcode' );     
		 
    return $bee_table_columns;
} );
//Custom Css


