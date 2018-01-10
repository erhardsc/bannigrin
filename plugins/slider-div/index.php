<?php
/*
Plugin Name: Slider Div
Plugin URI:
Description: Dynamic slider div that shows widget content after a link click
Version: .1
Author: Grayson Erhard
Author URI: https://graysonerhard.com
License: GPLv2 or later
Text Domain: slider-div
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_action('wp_enqueue_scripts', 'slider_scripts');
function slider_scripts() {

  wp_register_script('slider-div', plugin_dir_url(__FILE__) .'assets/js/slider-div.js', array('jquery'), false, true);
  wp_register_script('autosize', plugin_dir_url(__FILE__) .'assets/js/autosize.min.js', array('jquery'), false, true);

  wp_enqueue_script('slider-div');
  wp_enqueue_script('autosize');

}

add_action( 'widgets_init', 'slider_widget_admin_area' );
function slider_widget_admin_area() {
  register_sidebar( array(
      'name' => __( 'Slider Div', 'prettycreative' ),
      'id' => 'slider',
      'description' => __( '', 'prettycreative' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4 class="widgettitle">',
      'after_title'   => '</h4>',
  ) );
}


add_action('get_footer', 'display_slider_widget');
function display_slider_widget() {
  ?>
  <div id="slider" class="slider">
	  <section id="close_slider" class="widget widget_text">
		  <div class="textwidget">
			  <a href="#/" class="close" data-wpel-link="internal"><i class="fa fa-times-circle fa-2x"></i></a>
			</div>
		</section>
		
		<section id="sexy-woo-messages" class="widget widget_text">
		  <div class="textwidget"></div>
		</section>
		
  	<?php dynamic_sidebar('slider'); ?>
  	<section id="sexy-woo-cart">
	  	<h4>CART</h4>
	  	<div id="sexy-woo-cart-container">
  			<?php echo do_shortcode('[woocommerce_cart]'); ?>
	  	</div>
        <a href="#" class="cart_plus plus_btn"><span>+</span></a>
  	</section>
  	<section id="sexy-woo-checkout">
	  	<h4>CHECKOUT</h4>
  		<?php echo do_shortcode('[woocommerce_checkout]'); ?>
  		<a href="#" class="checkout_plus plus_btn"><span>+</span></a>
  	</section>
  	
  </div>
  <?php
}