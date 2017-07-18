(function ($) {
	$( 'body' ).on( 'click', '.module-audio .track-title', function(){
		$( this ).closest( '.track' ).find( '.mejs-playpause-button' ).click();
		return false;
	}).on( 'builder_load_module_partial builder_toggle_frontend', function(){
            $('.module-audio audio').mediaelementplayer();
        } );
        
}(jQuery));