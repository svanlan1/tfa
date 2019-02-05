var script = {
	run: function() {
		console.log('script loaded.');
		$('#sendSlingshotMessage').bind('click', function(e) {
			var dataObj = {
				"user": "0",
				"name": $('#fullname').val(),
				"message": $('#message').val(),
				"email": $('#emailAddress').val(),
				"senton": new Date(),
				"page": "slingshot"
			}
			$.ajax({
				url: '../services/set/sendMessage.php',
				type: 'POST',
				data: dataObj,
				success: function(msg) {
					console.log(msg);
				},
				error: function(e) {
					console.log(e);
				}
			})
		});
	}
}
$(document).ready(function(e){
	script.run();
})