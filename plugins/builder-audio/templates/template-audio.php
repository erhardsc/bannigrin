<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * Template Music Playlist
 * 
 * Access original fields: $mod_settings
 */

$fields_default = array(
	'mod_title_playlist' => '',
	'music_playlist' => array(),
	'hide_download_audio' => 'yes',
	'add_css_audio' => '',
	'animation_effect' => '',
	'audio_buy_button_text' => '',
	'audio_buy_button_link' => ''
);

$fields_args = wp_parse_args( $mod_settings, $fields_default );
extract( $fields_args, EXTR_SKIP );
$animation_effect = $this->parse_animation_effect( $animation_effect, $fields_args );

$container_class = implode(' ', 
	apply_filters( 'themify_builder_module_classes', array(
		'module', 'module-' . $mod_name, $module_ID, $add_css_audio, $animation_effect
	), $mod_name, $module_ID, $fields_args )
);

$container_props = apply_filters( 'themify_builder_module_container_props', array(
	'id' => $module_ID,
	'class' => $container_class
), $fields_args, $mod_name, $module_ID );
?>
<!-- module audio -->
<div <?php echo $this->get_element_attributes( $container_props ); ?>>

	<?php do_action( 'themify_builder_before_template_content_render' ); ?>

	<?php if ( $mod_title_playlist != '' ): ?>
		<?php echo $mod_settings['before_title'] . wp_kses_post( apply_filters( 'themify_builder_module_title', $mod_title_playlist, $fields_args ) ) . $mod_settings['after_title']; ?>
	<?php endif; ?>

	<div class="album-playlist">
		<div class="jukebox">
			<ol class="tracklist">

			<?php foreach ( $music_playlist as $item ) : ?>
				<li class="track is-playable" itemprop="track" itemscope="" itemtype="http://schema.org/MusicRecording">
					<?php
						if( ! empty( $item['audio_buy_button_link'] ) || ! empty( $item['audio_buy_button_text'] ) ) {
							printf( '<a class="ui builder_button default track-buy" href="%s">%s</a>'
								, ! empty( $item['audio_buy_button_link'] ) ? $item['audio_buy_button_link'] : '#'
								, ! empty( $item['audio_buy_button_text'] ) ? $item['audio_buy_button_text'] : esc_html__( 'Buy now', 'builder-audio' ) );
						}
					?>
					<a class="track-title" href="#" itemprop="url"><span itemprop="name"><?php echo isset( $item['audio_name'] ) ? $item['audio_name'] : '' ; ?></span></a>
					<?php if( 'yes' != $hide_download_audio ) : ?><a href="<?php echo $item['audio_url']; ?>" class="builder-audio-download" download><i class="fa fa-download"></i></a><?php endif; ?>
					<?php echo wp_audio_shortcode( array( 'src' => $item['audio_url'] ) ); ?>
				</li>
			<?php endforeach; ?>

			</ol>
		</div><!-- .jukebox -->
	</div><!-- .album-playlist -->

	<?php do_action( 'themify_builder_after_template_content_render' ); ?>
</div>
<!-- /module audio -->
