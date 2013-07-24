/*
* Normalized hide address bar for iOS & Android
* (c) Scott Jehl, scottjehl.com
* MIT License
*/
(function( win ){
	var doc = win.document;

	// If there's a hash, or addEventListener is undefined, stop here
	if( !location.hash && win.addEventListener ){

		//scroll to 1
		window.scrollTo( 0, 1 );
		var scrollTop = 1,
			getScrollTop = function(){
				return win.pageYOffset || doc.compatMode === "CSS1Compat" && doc.documentElement.scrollTop || doc.body.scrollTop || 0;
			},

			//reset to 0 on bodyready, if needed
			bodycheck = setInterval(function(){
				if( doc.body ){
					clearInterval( bodycheck );
					scrollTop = getScrollTop();
					win.scrollTo( 0, scrollTop === 1 ? 0 : 1 );
				}	
			}, 15 );

		win.addEventListener( "load", function(){
			setTimeout(function(){
				//at load, if user hasn't scrolled more than 20 or so...
				if( getScrollTop() < 20 ){
					//reset to hide addr bar at onload
					win.scrollTo( 0, scrollTop === 1 ? 0 : 1 );
				}
			}, 0);
		} );
	}
})( this );


$(window).ready(function() {
	$("#getGeo").click(initiate_geolocation);
});
function initiate_geolocation() {
	navigator.geolocation.getCurrentPosition(handle_geolocation_query);
};
function handle_errors(error) {
	switch(error.code) {
		case error.PERMISSION_DENIED: alert("User did not share geolocation data.");
		break;
		case error.POSITION_UNAVAILABLE: alert("Position Unavailable.");
		break;
		case error.TIMEOUT: alert("Geolocation Time Out.");
		break;
		default: alert("Unknown Error.");
		break;
	}
};

function handle_geolocation_query(position) {

	// assign output of getCurrentPosition to vars
	// so we can work with them easier
	var lat = position.coords.latitude;
	var lon = position.coords.longitude;

	// Send lat & lon vars to hidden form fields
	document.getElementById('lat').value = lat;
	document.getElementById('lon').value = lon;

};