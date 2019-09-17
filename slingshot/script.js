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

		$('#other').bind('change', function(e) {
			let prop = $(this).prop('checked');
			if(prop) {
				$('.otherFieldDisplay').show();
			} else {
				$('.otherFieldDisplay').hide();
			}
		});

		$('.register').bind('click', function(e) {
			$(this).attr('disabled', 'disabled');
			let dataObj = {
				"name": $('#fullname').val(),
				"email": $('#email').val(),
				"bio": $('#shortbio').val(),
				"interests": [],
				"equipment": $('#equipment').val()
			}
			$('fieldset input[type=checkbox]').each(function(i,v) {
				if($(v).prop('checked')) {
					dataObj["interests"].push($(v).attr('id'));
				}
			});
			if($('#otherField').val() !== "") {
				dataObj["interests"].push($('#otherField').val());
			}
			if(global.util._validate() && dataObj.interests.length > 0) {
				$.ajax({
					url: '../services/set/addSlingshotParticipant.php',
					type: 'POST',
					data: dataObj,
					success: function(msg) {
						alert("Success!  We will be in contact shortly!");
						window.location.href = "http://www.tacomafilmalliance.com/";
					},
					error: function(e) {
						alert("Something went wrong.  Please try again later");
					}
				});				
			} else {
				alert("You must fill out all fields on this form, including at least 1 role.")
			}
			


		});
	}
}
$(document).ready(function(e){
	script.run();
})