var script = {
	run: function() {
		console.log('script loaded.');
		$.ajax({
			url: '../services/get/getLoginPage.php',
			method: 'GET',
			success: function(msg) {
				var rsp = $.parseJSON(msg);
				script.members = rsp.members;
				script.films = rsp.films;
				$('#membersnumber').text(script.members.length);
				$('#filmsnumber').text(script.films.length);
			},
			error: function(e) {
				console.log(e);
			}
		})
	}
}
$(document).ready(function(e){
	script.run();
})