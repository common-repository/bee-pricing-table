<?php
// Front View

function bee_pricng_table_front($bee_pricing_table_id)

{

extract(shortcode_atts(array(
      'beeid' => ''
      
   ), $bee_pricing_table_id));

 $bee_pricing_table_datas = get_post_meta( $beeid, 'bee_pricing_tab1_group', true );
 
 
 
 wp_enqueue_style(
		'bee-pricing-custom-style',
		  plugin_dir_url( __FILE__ )  . 'includes/bee_pricing_table_css.css');
	$bee_princg_style_css = get_post_meta( $beeid, 'bee_pricing_tab2_group', true );
foreach ( (array) $bee_princg_style_css as $key => $bee_princg_style ) {

////GET All Table Values

     $bee_princg_headercolor = isset( $bee_princg_style['bee_princg_headercolor'] ) ? wpautop( $bee_princg_style['bee_princg_headercolor'] ) : '';
	 $bee_princg_featured_header_color=isset( $bee_princg_style['bee_princg_featured_header_color'] ) ? wpautop( $bee_princg_style['bee_princg_featured_header_color'] ) : '';
	 $bee_princg_bgcolor=isset( $bee_princg_style['bee_princg_bgcolor'] ) ? wpautop( $bee_princg_style['bee_princg_bgcolor'] ) : '';
	 $bee_princg_font_color=isset( $bee_princg_style['bee_princg_font_color'] ) ? wpautop( $bee_princg_style['bee_princg_font_color'] ) : '';
	 
	  $bee_princg_icon_color=isset( $bee_princg_style['bee_princg_icon_color'] ) ? wpautop( $bee_princg_style['bee_princg_icon_color'] ) : '';
	$bee_princg_button_color=isset( $bee_princg_style['bee_princg_button_color'] ) ? wpautop( $bee_princg_style['bee_princg_button_color'] ) : '';
	$bee_princg_btnfont_hover_color=isset( $bee_princg_style['bee_princg_btnfont_hover_color'] ) ? wpautop( $bee_princg_style['bee_princg_btnfont_hover_color'] ) : '';
	
	$bee_princg_featured_bg=isset( $bee_princg_style['bee_princg_featured_bg'] ) ? wpautop( $bee_princg_style['bee_princg_featured_bg'] ) : '';
	$bee_princg_featured_icon=isset( $bee_princg_style['bee_princg_featured_icon'] ) ? wpautop( $bee_princg_style['bee_princg_featured_icon'] ) : '';
	 
	 $bee_princg_featured_button_color=isset( $bee_princg_style['bee_princg_featured_button_color'] ) ? wpautop( $bee_princg_style['bee_princg_featured_button_color'] ) : '';
     $bee_princg_featured_button_hover_color=isset( $bee_princg_style['bee_princg_featured_button_font_hover_color'] ) ? wpautop( $bee_princg_style['bee_princg_featured_button_font_hover_color'] ) : '';
	 }
$bee_princg_headercolor=str_ireplace('<p>','', $bee_princg_headercolor);
$bee_princg_headercolor=str_ireplace('</p>','', $bee_princg_headercolor);

$bee_princg_featured_header_color=str_ireplace('<p>','', $bee_princg_featured_header_color);
$bee_princg_featured_header_color=str_ireplace('</p>','', $bee_princg_featured_header_color);

$bee_princg_bgcolor=str_ireplace('<p>','', $bee_princg_bgcolor);
$bee_princg_bgcolor=str_ireplace('</p>','', $bee_princg_bgcolor);

$bee_princg_featured_button_color=str_ireplace('<p>','', $bee_princg_featured_button_color);
$bee_princg_featured_button_color=str_ireplace('</p>','', $bee_princg_featured_button_color);

$bee_princg_featured_button_hover_color=str_ireplace('<p>','', $bee_princg_featured_button_hover_color);
$bee_princg_featured_button_hover_color=str_ireplace('</p>','', $bee_princg_featured_button_hover_color);

$bee_princg_font_color=str_ireplace('<p>','', $bee_princg_font_color);
$bee_princg_font_color=str_ireplace('</p>','', $bee_princg_font_color);


$bee_princg_icon_color=str_ireplace('<p>','', $bee_princg_icon_color);
$bee_princg_icon_color=str_ireplace('</p>','', $bee_princg_icon_color);


$bee_princg_button_color=str_ireplace('<p>','', $bee_princg_button_color);
$bee_princg_button_color=str_ireplace('</p>','', $bee_princg_button_color);

$bee_princg_btnfont_hover_color=str_ireplace('<p>','', $bee_princg_btnfont_hover_color);
$bee_princg_btnfont_hover_color=str_ireplace('</p>','', $bee_princg_btnfont_hover_color);

$bee_princg_featured_bg=str_ireplace('<p>','', $bee_princg_featured_bg);
$bee_princg_featured_bg=str_ireplace('</p>','', $bee_princg_featured_bg);

$bee_princg_featured_icon=str_ireplace('<p>','', $bee_princg_featured_icon);
$bee_princg_featured_icon=str_ireplace('</p>','', $bee_princg_featured_icon);

$bee_pricing_table_css = "
	
.bee-pricing-title {

background:{$bee_princg_headercolor}!important;
	
	}
	
 .bee-pricing-table .price{
 background:{$bee_princg_bgcolor}!important;
 color:{$bee_princg_font_color}!important;
 }
 
.beetable-list li:before{
color:{$bee_princg_icon_color}!important;
}
.beetable-buy .bee-pricing-action{
background:{$bee_princg_button_color}!important;
}
 .beetable-buy .bee-pricing-action:hover{
background:{$bee_princg_btnfont_hover_color}!important;
}


.bee-pricing-table.recommended .bee-pricing-title{
	background:{$bee_princg_featured_header_color}!important;
}
.bee-pricing-table.recommended .price{
	background:{$bee_princg_featured_bg}!important;
}
	
.bee_princg_featured_header_color{
 background:{$bee_princg_featured_header_color}!important;
 }

.bee-pricing-table.recommended li:before{ 
color:{$bee_princg_featured_icon}!important;
}
 
 
 .bee-pricing-table.recommended .bee-pricing-action{
 background:{$bee_princg_featured_button_color}!important;
 } 
 
 .recommended .beetable-buy .bee-pricing-action:hover{
 background:{$bee_princg_featured_button_hover_color}!important;
 }
				";
   wp_add_inline_style( 'bee-pricing-custom-style', $bee_pricing_table_css );


 
 
  ?>
 
 <div class="bee-pricing-wrapper clearfix">
	
<?php 
foreach ( (array) $bee_pricing_table_datas as $key => $bee_pricing_table_data ) {

////GET All Table Values

     $bee_pricing_pack_features = isset( $bee_pricing_table_data['bee_pricing_features'] ) ? wpautop( $bee_pricing_table_data['bee_pricing_features'] ) : '';
	 $bee_pricing_pack = isset( $bee_pricing_table_data['bee_pricing_package'] ) ? wpautop( $bee_pricing_table_data['bee_pricing_package'] ) : '';
	 $bee_pricing_price = isset( $bee_pricing_table_data['bee_pricing_price'] ) ? wpautop( $bee_pricing_table_data['bee_pricing_price'] ) : '';
	 $bee_pricing_button = isset( $bee_pricing_table_data['bee_pricing_button'] ) ? wpautop( $bee_pricing_table_data['bee_pricing_button'] ) : '';
	 $bee_pricing_button_url = isset( $bee_pricing_table_data['bee_pricing_url'] ) ? wpautop( $bee_pricing_table_data['bee_pricing_url'] ) : '';
	 $bee_pricing_button_highlight = isset( $bee_pricing_table_data['bee_pricing_highlight'] ) ? wpautop( $bee_pricing_table_data['bee_pricing_highlight'] ) : '';
	
	
	$bee_pricing_button_highlight=str_ireplace('<p>','', $bee_pricing_button_highlight);
    $bee_pricing_button_highlight=str_ireplace('</p>','', $bee_pricing_button_highlight);
	
	
	if(trim($bee_pricing_button_highlight)=="on")
	{
	 $bee_pricing_featured="recommended";
	}
	else
	{
	$bee_pricing_featured="";
	}
	 
//Get All Table Style 
	 $bee_pricing_button_url = isset( $bee_pricing_table_data['bee_pricing_url'] ) ? wpautop( $bee_pricing_table_data['bee_pricing_url'] ) : '';
		  

///Remove unwanterd tags
 $bee_pricing_button_url = str_ireplace('<p>','', $bee_pricing_button_url);
 $bee_pricing_button_url = str_ireplace('</p>','', $bee_pricing_button_url);
 
 $bee_pricing_pack=str_ireplace('<p>','', $bee_pricing_pack);
 $bee_pricing_pack=str_ireplace('</p>','', $bee_pricing_pack);
  $bee_pricing_price = str_ireplace('<p>','', $bee_pricing_price);
  $bee_pricing_price = str_ireplace('</p>','', $bee_pricing_price);

 ?>
	<div class="bee-pricing-table <?php echo $bee_pricing_featured; ?>">
			<h3 class="bee-pricing-title"><?php echo $bee_pricing_pack; ?></h3>
			<div class="price"><?php echo $bee_pricing_price; ?></div>

       <?php
	   
	 $bee_pricing_pack_features = explode("\n", $bee_pricing_pack_features);

echo '<ul class="beetable-list">';
foreach( $bee_pricing_pack_features as $index => $bee_pricing_pack_feature )
{
    $bee_pricing_pack_features[$index] = $bee_pricing_pack_feature;
	if(!empty($bee_pricing_pack_features[$index]))
	{
	
	$bee_pricing_pack_features[$index]=str_ireplace('<p>','',$bee_pricing_pack_features[$index]);
$bee_pricing_pack_features[$index]=str_ireplace('</p>','',$bee_pricing_pack_features[$index]);  
	 echo  "<li>".trim($bee_pricing_pack_features[$index])."</li>";
	 }
}
	  
 echo "</ul>";
 	$bee_pricing_button=str_ireplace('<p>','',$bee_pricing_button);
$bee_pricing_button=str_ireplace('</p>','',$bee_pricing_button);  
 ?>
 
 <div class="beetable-buy">
				
				<a href="<?php echo $bee_pricing_button_url;?>" class="bee-pricing-action"><?php echo $bee_pricing_button; ?></a>
			</div></div>
<?php 
}
 echo "	</div>";
	}
	
add_shortcode( 'bee-pricing', 'bee_pricng_table_front' );