var post = {
	headshot: function() {
		if(localStorage.getItem('tfa_headshot') && localStorage.getItem('tfa_headshot') !== "") {
			$('.tfa_headshot').css({
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
	    	var members = script.data.members,
	    		memInfo = script.data.meminfo,
	    		memberObj = {},
	    		found = false;
	    	$(memInfo).each(function(i,v) {
	    		var id = v.memberID;
	    		if(id === script.currentUser) {
	    			found = true;
	    			if(v.headshot !== "") {
	    				localStorage.setItem('tfa_headshot', v.headshot);
	    			}
					$('#article_user h3').eq(1).text(v.firstname + ' ' + v.lastname);
	    		}
	    		$(members).each(function(j,k) {
	    			if(k.memberID === id) {
	    				memberObj[id] = {
	    					'id': v.memberID,
	    					'firstname': v.firstname,
	    					'lastname': v.lastname,
	    					'bio': v.bio,
	    					'email': k.email,
	    					'username': k.username,
	    					'headshot': v.headshot,
	    					'city': v.city,
	    					'isAdmin': k.isAdmin,
	    					'role': v.role,
	    					'prirolebio': v.prirolebio,
	    					'secondaryrole': v.secondaryrole,
	    					'secrolebio': v.secrolebio,
	    					'personalsite': v.personalsite,
	    					'reel': v['reel'],
	    					'phone': v.phone,
	    					'exec_profile': v.exec_profile,
	    					'plainname': v.firstname + ' ' + v.lastname
	    				};
	    				if(id === script.currentUser) {
	    					global.util._addBadgesToUser(v,k,$('#article_user h3').eq(1));
	    				}

	    			}
	    			if(found) {
	    				script.found = true;
	    			}
	    		});
	    	});
    		if(!script.found) {
    			$('#notification').fadeIn('slow');
    			script.found = false;
    		} else {
    			$('#notification').hide();
    			script.found = true;
    		}	    	
	    	/** User Navigation Fillings **/
	    	post.headshot();
	    	if($('#article_user h3').eq(0).text() === "") {
	    		$('#article_user h3').eq(0).text('Guest');
	    	}
	    	return memberObj;
	    }
	    $.ajax({
	        url: '/sandbox/services/get/getAll.php',
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
	        	console.log(script.data);
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