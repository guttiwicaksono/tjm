( function($){
	"use strict"
	
	$( document ).ready( function() {	
		preyantechnosys_service_iconpicker()
	});
	
	function preyantechnosys_service_iconpicker(){
		
		var icons_array = [];
		$.each(
			preyantechnosys_specilas_listicons.preyantechnosys_service_icons_lists,
			function( icon_key, icon_val ) {
				var icon_key  = Object.entries( icon_val );			
				icons_array.push( {title:icon_key[0][0], searchTerms:icon_key[0][1]} )
			}
		);

		var options = {
			icons : icons_array,
			inputSearch: true,
		}
		$( '.kw_minemo_icons' ).iconpicker( options );
	}
	
})( jQuery );