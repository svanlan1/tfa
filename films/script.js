var script = {
	films: {},
	run: function() {
		console.log('script loaded.');
		script.getFilms();
	},

	getFilms: function() {
		$.ajax({
			url: '../services/get/getFilms.php',
			method: 'GET',
			success: function(msg) {
				script.films = $.parseJSON(msg);
				console.log(script.films);
			},
			error: function(e) {
				console.log(e);
			}
		});		
	}
}
$(document).ready(function(e){
	script.run();
})