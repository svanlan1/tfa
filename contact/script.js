var script = {
	run: function() {
		console.log('script loaded.');
		$('#sendGeneralContact').bind('click', function(e) {
			var dataObj = {
				"user": "0",
				"name": $('#fullname').val(),
				"message": $('#message').val(),
				"email": $('#emailAddress').val(),
				"senton": new Date(),
				"page": "general contact"
			}
			$.ajax({
				url: '../services/set/sendMessage.php',
				type: 'POST',
				data: dataObj,
				success: function(msg) {
					console.log(msg);
					$('input textarea').html('');
					global.dialog._open('messagesent');
					global.dialog._closeAction = function() {
						window.location.href = "/sandbox/";
					}
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