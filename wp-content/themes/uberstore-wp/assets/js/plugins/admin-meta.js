jQuery(document).ready(function($){
	function checkFormat(){
		var format = $('#post-formats-select input:checked').attr('value');
		
		//only run on the posts page
		if(typeof format !== 'undefined'){
			
			$('#post-body div[id^=post_meta_]').hide();
			$('#post-body div[id^=post_meta_'+format+']').stop(true,true).fadeIn(500);
					
		}
	
	}
	$('#post-formats-select input').change(checkFormat);
	$(window).load(function(){
		checkFormat();
	});
	
	var thb_data = new FormData(),
			thb_once = false;
	
	thb_data.append( 'action', 'ocdi_import_demo_data' );
	thb_data.append( 'security', ocdi.ajax_nonce );
	
	function thb_ajaxCall() {
		var demo = $('input[name="option_tree[demo-select]"]:checked').val();

		thb_data.append( 'selected', demo );
		
		// AJAX call.
		$.ajax({
			method:     'POST',
			url:        ocdi.ajax_url,
			data:       thb_data,
			contentType: false,
			processData: false,
			beforeSend: function() {
				if (!thb_once) {
					$('#thb-import-messages').addClass('active').append( '<div class="notice notice-success"><p><strong>Starting Import</strong></p></div>' );
					thb_once = 1;
				}
			}
		})
		.done( function( response ) {
			if ( 'undefined' !== typeof response.status && 'newAJAX' === response.status ) {
				thb_ajaxCall( thb_data );
			} else {
				$( '#thb-import-messages' ).append( '<div class="error below-h2"><p>' + response.message + '</p></div>' );
			}
		})
		.fail( function( error ) {
			$('#thb-import-messages').append( '<div class="error thb-failed below-h2"> Error: ' + error.statusText + ' (' + error.status + ')' + '</div>' );
		});
	}
	
	$('#import-demo-content').on("click", function(e){
		$(this).addClass('disabled').attr('disabled', 'disabled').unbind('click');
		
		thb_ajaxCall(thb_data);
		
		e.preventDefault();
	});
});