var script = {
	run: function() {
		$('.tfa_profile_headshot').css({
			background: 'url("/sandbox/uploads/' + localStorage.getItem('tfa_headshot') + '") no-repeat',
			'background-size': 'cover'
		});
	}
}
$(document).ready(function(e){
	script.run();
})