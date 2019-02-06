var post = {
	headshot: function() {
		if(localStorage.getItem('tfa_headshot') && localStorage.getItem('tfa_headshot') !== "") {
			$('#article_user .tfa_headshot, .addComment .tfa_headshot').css({
				'background': 'url("/sandbox/uploads/' + localStorage.getItem('tfa_headshot') + '") no-repeat',
				'background-size': 'cover'
			});
		} else if (!localStorage.getItem('tfa_headshot')) {
			if(!localStorage.getItem('headshotReminderToggle') || localStorage.getItem('headshotReminderToggle') !== "Y") {
				$('#headshotReminder').fadeIn('slow');
				$('.reminderModal').show();
			}
			post.headshotAction._highlight();
		}
	},

	getAll: function() {
	    function getUserData() {
	    	return global.util._buildCompleteUserObject(script.data);
	    }
	    $.ajax({
	        url: '/sandbox/services/get/getCurrentUserAll.php',
	        method: 'GET',
	        success: function(msg) {
	        	localStorage.setItem('tfa_headshot', '');
	        	script.data = $.parseJSON(msg);
	        	script.currentUser = script.data.currentMember;
	        	script.userData = getUserData();
	        	script.events = script.data.events;
	        	script.films = script.data.films;
	        	script.homepage = script.data.homepage;
				script.posts = script.data.posts;
				script.comments = script.data.comments;
    			if(script.found) {
					$('.publicProfile').show();
					$('.publicProfile a').attr('href', '/sandbox/profiles/?id=' + script.userData[script.currentUser].id);
    			}
	        	$('#article_user .loader').hide();
	        	$('#article_user .showHide').fadeIn();
				//console.log(script.data);
				// console.log(script.userData);
	        },
	        error: function(e) {
	        	console.log(e);
	        }
	    });		
	},

	getCurrentUserUploads: function() {
		$.ajax({
			url: '/sandbox/services/get/getCurrentUserUploads.php',
			method: 'GET',
			success: function(msg) {
				try{
					script.uploads = $.parseJSON(msg);
					$('.photoSection div, .hsphotoGallery div').remove();
					post.drawPhotoSection();
				} catch (e) {
					console.log(e);
				}
			},
			error: function(e) {

			}
		});
	},

	drawPhotoSection: function() {
		$(script.uploads).each(function(i,v) {
			var fn = v.filename,
				fnlc = fn.toLowerCase(),
				category = $.parseJSON(v.category).category;
			if(fnlc.indexOf('.jpg') > -1 || fnlc.indexOf('.png') > -1 || fnlc.indexOf('.gif') > -1 || fnlc.indexOf('.jpeg') > -1) {
				if(category === "headshot") {
					var div = $('<div />').addClass('photo-bg').css({'background': 'url("/sandbox/uploads/' + v.filename + '") no-repeat'}).attr({
						'tabindex': '0',
						'role': 'button'
					}).appendTo('.photoSection'),
						a = $('<a />').attr({
							'href': 'javascript:;',
							'class': 'indiPhoto'
						}).appendTo(div),
						img = $('<img />').addClass('screen-reader-only').attr('src', '/sandbox/uploads/' + v.filename).attr('alt', '').appendTo(a);

					var photoDiv = $('<div />').addClass('photo-bg').css({'background': 'url("/sandbox/uploads/' + v.filename + '") no-repeat'}).attr({
						'tabindex': '0',
						'role': 'button',
						'data-filename': fn
					}).appendTo('.hsphotoGallery'),
						photoA = $('<a />').attr({
							'href': 'javascript:;',
							'class': 'indiPhoto'
						}).appendTo(photoDiv),
						photoImg = $('<img />').addClass('screen-reader-only').attr('src', '/sandbox/uploads/' + v.filename).attr('alt', '').appendTo(photoA);

					$(div).bind('click', function(e) {
						$('div[data-dialog-id=photos]').find('div.showHide div img').attr('src', '/sandbox/uploads/' + v.filename);
						global.dialog._open('photos');
						global.dialog._closeAction = function() {
							$('div[data-dialog-id=photos] div img').attr('src', '');
						}
					});

					$(photoDiv).bind('click', function(e) {
						var fn = $(this).attr('data-filename');
						global.chooseHeadshotFromUploads(fn);
					});
				}
			}
		});
	},

	headshotAction: {
		_on: false,
		_highlight: function() {
			function getData() {
				if(post.headshotAction['_on']) {
					$('.tfa_headshot').css({
						'box-shadow': '#000 0 0 5px 2px'
					});						
					post.headshotAction['_on'] = false;
				} else {
					$('.tfa_headshot').css({
						'box-shadow': '#c00 0 0 25px 4px'
					});					
					post.headshotAction['_on'] = true;
				}
			}
			var id = setInterval(getData, 700);
		}
	}
}
$(document).ready(function(e) {
	post.getAll();
	post.getCurrentUserUploads();
});