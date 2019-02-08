var script = {
	intervalCount: 0,
	runStory: function() {
		var storyId = window.location.href.split('?id=')[1],
			category = window.location.href.split('&cat=')[1];
		var options = {
			storyID: storyId,
			category: category
		}
	    $.ajax({
			data: options,
	        url: '/sandbox/services/get/getHomepageStory.php',
	        method: 'GET',
	        success: function(msg) {
				var story = $.parseJSON(msg).homepage[0];
				script.storyComments = $.parseJSON(msg).comments;
				$('#currentStory h2 span').text(story.title);
				$('#currentStory .sectionContent div.storyContent').html(story.post);
				$('.storyBanner').css({
					'background': 'url("/sandbox/uploads/' + story.banner + '") no-repeat',
					'background-size': 'cover',
					'background-position': '0'
				});
				$('.storySetup .byline').text('by ' +  story.byline + ' on ' + global.util._formatJSDate(story.posted));
				$('.storySetup .lede').text(story.lead);
				$('title').text(story.title + ' - Tacoma Film Alliance');
			},
			error: function(e) {
				console.log(e);
			}
		});

		$('.register').bind('click', function(e) {
			window.location.href = '/sandbox/register/';
		});	

		$('.actionAddComment').bind('click', function(e) {
			$(this).parent().remove();
			$('.commentsToggle').fadeIn();
		})
	},

	populate: function() {
		$('.userAddComment h3 span').text(script.userData[script.currentUser].plainname);
	},

	drawThisComment: function(options, user, where, current) {
		var div = $('<div />').addClass('user_comment');
		if(where === "prepend") {
			$(div).prependTo('.previousComments');
		} else {
			$(div).appendTo('.previousComments');
		}

		if(current) {
			var timestamp = global.util._formatJSDate(new Date().toString(), true);
		} else {
			var timestamp = global.util._formatJSDate(options.commentTime, true);
		}
		

		var headshot = $('<div />').addClass('tfa_headshot').appendTo(div),
			name = $('<h4 />').addClass('user_comment_name').text(script.userData[user].plainname).appendTo(div),
			date = $('<span />').addClass('byline').text(timestamp).appendTo(div),
			comment = $('<p />').addClass('user_comment_text').text(options.comment).appendTo(div);
		if(script.userData[user].headshot) {
			$(headshot).css({
				'background': 'url("/sandbox/uploads/' + script.userData[user].headshot + '") no-repeat',
				'background-size': 'cover'
			});
		}
	}
}
$(document).ready(function(e){
	script.runStory();
	function getData() {
		if(script.userData) {
			clearInterval(id);
			script.populate();
			$('button.addComment').bind('click', function(e) {
				$(this).attr('disabled', 'true');
				var options = {
					comment: $('#userComment').val(),
					commentTime: new Date(),
					category: "homepage",
					children: "[]",
					childOf: "",
					postID: window.location.href.split('?id=')[1]
				}
				$.ajax({
					data: options,
					url: '/sandbox/services/set/addCommentToPost.php',
					method: 'POST',
					success: function(msg) {
						$('.addComment').hide();
						script.drawThisComment(options, script.currentUser, "prepend", true);
					}
				});
			});
			$(script.storyComments).each(function(i,v) {
				script.drawThisComment(v, v.memberID, "append");
			});				
		}

		if(script.intervalCount > 1000) {
			clearInterval(id);
		}
		script.intervalCount++;
	}
	var id = setInterval(getData, 10);
})