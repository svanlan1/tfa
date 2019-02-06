var script = {
	run: function() {
		console.log('script loaded.');
		$('#sendFeedback').bind('click', function(e) {
			var user = script.userData[script.currentUser];
			if($('#anonymous').prop('checked')) {
				var userId = "0",
					fullname = "Anonymous",
					email = "none@ofyourbusiness.com";
			} else {
				var userId = user.id,
					fullname = user.firstname + " " + user.lastname,
					email = user.email;
			}

			var dataObj = {
				"user": userId,
				"name": fullname,
				"message": $('#message').val(),
				"email": email,
				"senton": new Date(),
				"page": "feedback"
			}
			$.ajax({
				url: '../../services/set/sendMessage.php',
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