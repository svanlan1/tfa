var script = {
	run: function() {
		console.log('script loaded.');
		script.getComments();
		$('.addPost').bind('click', function(e) {
			global.dialog._open('post');
		});
		$('#addPostTextarea').bind('keydown', function(e) {
			var length = $(this).val().length,
				left = 256 - length;
			$('span.counter span').text(left);
		});

		$('.submitPost').bind('click', function(e) {
			var data = {
				'posttext': $('#addPostTextarea').val(),
				'favcount': 0
			}
			$.ajax({
				url: '../../services/set/addPost.php',
				method: 'POST',
				data: data,
				success: function(msg) {
					// script.getComments();
					global.dialog._closeAction = function(){
						console.log('added');
					}
					global.dialog._close();
					window.location.reload();
				},
				error: function(e) {

				}
			})
		});
	},

	getComments: function() {
		$.ajax({
			url: '../../services/get/getFeed.php',
			method: 'GET',
			success: function(msg) {
				script.data.feed = $.parseJSON(msg);
				script.drawComments();
			},
			error: function(e) {

			}
		});
	},

	drawComments: function() {
		$(script.data.feed).each(function(i,v) {
			var user = script.userData[v.memberID];
			var clone = $('.user_comment').eq(0).clone();
			$(clone).find('.tfa_headshot').css('background', 'url("/sandbox/uploads/' + user.headshot + '") 0% 0% / cover no-repeat');
			$(clone).find('.user_comment_name span.hname').text(user.plainname);
			$(clone).find('.user_comment_name a').attr({
				'href': '/sandbox/profiles/?id=' + v.memberID
			});
			global.util._addBadgesToUser(user, user, $(clone).find('.user_comment_name span.hname'));
			$(clone).find('.user_comment_text span.htext').text(v.posttext);
			$(clone).find('.user_comment_text span.byline').text(global.util._formatPHPDate(v.created, true));
			$(clone).show().appendTo('.previousComments');
		})
	}
}
$(document).ready(function(e) {
	function getData() {
		if(script.userData) {
			clearInterval(id);
			script.run();
		}
	}
	var id = setInterval(getData, 10);
});