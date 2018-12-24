var script = {
	run: function() {
		$('.register').bind('click', function(e) {
			$(this).attr('disabled', 'true');
			var data = {
				'username': $('#username').val(),
				'email': $('#email').val(),
				'password': $('#password').val(),
				'passwordConfirm': $('#passwordConfirm').val()
			};
			$.ajax({
			    data: data,
			    url: '/sandbox/services/core/register.php',
			    method: 'POST',
			    success: function(msg) {
					console.log(msg);
					alert('You have succesfully registered.  You cannot login until you confirm your email address.  Please check your email from a registration email from TFA.')
					window.location.href = "/sandbox/";
			    },
			    error: function(e) {
			    	alert('failure');
			    	console.log(e);
			    }
			});								
		});
	}
}
$(document).ready(function(e){
	script.run();
})