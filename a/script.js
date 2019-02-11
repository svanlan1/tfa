var script = {
	run: function() {
		console.log('script loaded.');
		$.ajax({
			url: '../services/get/getAll.php',
			method: 'GET',
			success: function(msg) {
				script.adminData = $.parseJSON(msg);
				console.log(script.adminData);
				$('#memberInfo td').eq(2).text(script.adminData.members.length);
				$('#newsfeedInfo td').eq(2).text(script.adminData.posts.length);
				var messagesLength = script.adminData.messages.length + script.adminData.member_messages.length;
				$('#messagesInfo td').eq(2).text(messagesLength);
				$('#homepageVisits td').eq(2).text(script.adminData.counter.length);
				$('#filmsPosted td').eq(2).text(script.adminData.films.length);
				$('#imagesUploaded td').eq(2).text(script.adminData.uploads.length);
			},
			error: function(e) {
				console.log(e);
			}
		});
	}
}
$(document).ready(function(e){
	function check() {
		if(script.data) {
			clearInterval(int);
			script.run();
		}
	}
	var int = setInterval(check, 10);
})