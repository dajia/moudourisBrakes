<?php
/*
Plugin Name: WP Image Carousel
Plugin URI:  http://itzoovim.com/plugins/wordpress-image-carousel/
Description: Adds an image scroller to your site.
Version: 1.0.2
Author: Ziv, Itzoovim
Author URI: http://itzoovim.com/
*/
// Add settings link on plugin page
function settings_link($links)
{ 
  $settings_link = '<a href="options-general.php?page=options-general.php_wpic_options">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'settings_link' );
require_once('admin-page-class/admin-page-class.php');
$config = array(
    'menu'=> 'settings',                 //sub page to settings page
    'page_title' => 'WPIC Options',   //The name of this page
    'capability' => 'edit_themes',       // The capability needed to view the page
    'option_group' => 'wpic_options',    //the name of the option to create in the database
    'id' => 'admin_page',                // Page id, unique per page
    'fields' => array(),                 // list of fields (can be added by field arrays)
    'local_images' => false,             // Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => false            //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
); 
 /**
 * Initiate your admin page
 */
$options_panel = new BF_Admin_Page_Class($config);
/**
 * define your admin page tabs listing
 */
$options_panel->OpenTabs_container('');
$options_panel->TabsListing(array(
   'links' => array(
   'options_1' =>  __('Basic Options')
   )
));
// Open admin page first tab with the id options_1
$options_panel->OpenTab('options_1');

/**
* Add fields to your admin page first tab
*
* Simple options:
* input text, checbox, select, radio
* textarea
*/
$data = get_option('wpic_options');
//title
$options_panel->Title('Thank you for downloading and installing this plugin! In this page you can setup your default settings for the image carousel.</br> If you are not sure what to do, or what everything in here does, check the installation tab in the plugin\'s download at page located <a href="#" target="_blank">here</a>.');

$options_panel->addParagraph('<h3>Your shortcode: </h3><a href="'.$_SERVER['PHP_SELF'].'?page=options-general.php_wpic_options">Refresh</a> <span> [wpic color="'.$data['color'].'" visible="'.$data['visible'].'" width="'.$data['width'].'" height="'.$data['height'].'" speed="'.$data['wait'].'" auto="'.$data['switch'].'" ][/wpic]</span>');

//select field
$options_panel->addSelect('color',array('blue'=>'Blue','green'=>'Green','gray'=>'Gray','lightbrown'=>'Lightbrown','navy'=>'Navy','orange'=>'Orange','pink'=>'Pink','purple'=>'Purple','red'=>'Red','yellow'=>'Yellow'),array('name'=> ' </br>Select the default color of WPIC', 'std'=> array('selectkey2')));

//select field
$options_panel->addSelect('visible',array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10'),array('name'=> ' </br>Select the default amount of visible images', 'std'=> array('selectkey2')));

//text field
$options_panel->addText('width',array('name'=> '</br>Default Image Width <strong>*</strong>'));

$options_panel->addText('height',array('name'=> '</br>Default Image Height <strong>*</strong>'));

$options_panel->addText('wait',array('name'=> '</br>Default Transition Time <strong>*</strong> <sub>in Milliseconds</sub>'));

$options_panel->addText('switch',array('name'=> '</br>Default Switch Transition Time <strong>**</strong> <sub>in Milliseconds</sub>'));

$options_panel->addParagraph("</br></br><h3>* Enter a clean number with no units. No need for ms/%/px.</h3>");

$options_panel->addParagraph("<h3>** Enter 0 to disable automatic image switching. The amount of time to wait between each automatic slide change. Enter a clean number with no units. No need for ms/%/px.</h3>");
// Close first tab
$options_panel->CloseTab();
$pluginurl = plugins_url('',__FILE__)."/";
if (!is_admin())
    add_action("wp_enqueue_scripts", "wps_register_scripts", 0); 
function wps_register_scripts()
{  
    wp_enqueue_script('jquery');       
    wp_register_script('jcarousellite_script',  plugins_url('js/jcarousellite_1.0.1.js', __FILE__),array('jquery'),'',False);  
    wp_enqueue_script('jcarousellite_script');	
    wp_register_style( 'wpic', plugins_url('css/style.css', __FILE__) );
    wp_enqueue_style( 'wpic' );
    
}
function wpic($atts, $content = null)
{
   extract(shortcode_atts(array(
      'color' => $data['color'],
      'visible' => $data['visible'],
	  'width' => $data['width'],
	  'height' => $data['height'],
	  'speed' => $data['wait'],
	  'auto' => $data['switch'],
	  'arrows' => "1"
   ), $atts));
   
   $data = get_option('wpic_options');
   
   if ($color == null)
   $color = $data['color'];
   
   if ($visible == null)
   $visible = $data['visible'];
   
   if ($width == null)
   $width = $data['width'];
   
   if ($height == null)
   $height = $data['height'];
   
   if ($speed == null)
   $speed = $data['wait'];
   
   if ($auto == null)
   $auto = $data['switch'];
   
   if ($auto == 0)
   $auto = "null";
   
   if ($arrows == null)
   $arrows = "1";
      
   $return_string = " <script type=\"text/javascript\">\n
   jQuery(document).ready(function($) {\n
    $(\".wpic_content\").jCarouselLite({\n
        btnNext: \".wpic_next\",\n
		auto: ".$auto.",\n
        speed:".$speed.",\n
		visible:".$visible.",\n
        btnPrev: \".wpic_prev\"\n
    });\n
});\n
</script>\n";
$pluginurl = plugins_url('',__FILE__)."/";
if ($arrows == "0") {
	$return_string .= "<div class=\"wpic_container\">\n
<div class=\"wpic_navigation\" style=\"margin-bottom:7px;float: left;width: ".(string)((int)$visible * (int)$width )."px;\">\n
</div>\n<div style=\"clear: both;\"></div>\n        
<div class=\"wpic_content\">\n
<ul class=\"wpic_gallery\">\n";
}
else
{
	$return_string .= "<div class=\"wpic_container\">\n
<div class=\"wpic_navigation\" style=\"margin-bottom:7px;float: left;width: ".(string)((int)$visible * (int)$width )."px;\">\n
<button style=\"float:right; background: url(".$pluginurl."images/styles/".$color."/next.png) no-repeat;\" class=\"wpic_next\"></button>\n
<button style=\"float: right; background: url(".$pluginurl."images/styles/".$color."/prev.png) no-repeat;\" class=\"wpic_prev\"></button>\n
</div>\n
<div style=\"clear: both;\"></div>\n        
<div class=\"wpic_content\">\n
<ul class=\"wpic_gallery\">\n";
}


$remove = array("<p>", "</p>", "&nbsp;","<br>","</br>","<p>&nbsp;</p>");
$content = str_replace($remove,"",$content);
$images = explode("/!", $content);   
foreach ($images as $image)
{
	$remove = array("<p>", "</p>", "&nbsp;","<br>","</br>","<p>&nbsp;</p>","nbsp","&",";","&nbsp;");
    $image = str_replace($remove,"",$image);
    $return_string .= "<li style=\"height: ".($height)."px;margin: 0px;padding: 0px;top: 0px; bottom: 0px;\">".$image."</li>\n";
}
$return_string = str_replace("<p>&nbsp;</p>","",$return_string);
$return_string .= "</ul>\n</div>\n";
$return_string .= "</div>\n";
   return $return_string;
}
function register_wps()
{
add_shortcode('wpic', 'wpic');
}
add_action( 'init', 'register_wps');