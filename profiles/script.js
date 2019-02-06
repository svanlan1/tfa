var thisUser;
var script = {
	run: function() {
		console.log('loaded.');
	},

	getUser: function() {
		var options = {
			'id': window.location.href.split('?id=')[1]
		}
		$.ajax({
			data: options,
			url: '/sandbox/services/get/getUser.php',
			method: 'GET',
			success: function(msg) {
				script.profile = $.parseJSON(msg);
				thisUser = global.util._buildOneUserObject(script.profile.members[0], script.profile.meminfo[0]);
				console.log(thisUser);
				script.drawProfilePics();
				script.drawOtherProfileThings();

			}
		});
	},

	drawProfilePics: function() {
		var headshot = thisUser.headshot;
		$('.tfa_profile_headshot').css({
			'background': 'url("/sandbox/uploads/' + headshot + '") no-repeat',
			'background-size': 'cover'
		});

		$(script.profile.uploads).each(function(i,v) {
			var cat = $.parseJSON(v.category);
			if(cat.category === "headshot" && v.filename !== headshot) {
				var clone = $('.profile .photoGallery div').eq(0).clone();
				$(clone).find('img').attr('src', '/sandbox/uploads/' + v.filename);
				$(clone).removeClass('none').appendTo('.profile .photoGallery');

				var side = $('.sidePhotoGallery div').eq(0).clone();
				$(side).find('img').attr('src', '/sandbox/uploads/' + v.filename);
				$(side).removeClass('none').appendTo('.sidePhotoGallery');
			} else if (v.filename === headshot) {
				var side = $('.sidePhotoGallery div').eq(0).clone();
				$(side).find('img').attr('src', '/sandbox/uploads/' + v.filename);
				$(side).removeClass('none').appendTo('.sidePhotoGallery');				
			}
			$(side).find('img').bind('click', function(e) {
				headshot = $(this).attr('src');
				$('.tfa_profile_headshot').css({
					'background': 'url("' + headshot + '") no-repeat',
					'background-size': 'cover'
				});					
			});			
		});
	},

	drawOtherProfileThings: function() {
		$('.headshotName span').text(thisUser.firstname + " " + thisUser.lastname);
		global.util._addBadgesToUser(script.profile.meminfo[0], script.profile.members[0], $('.headshotName div'));
		$('#location').text(thisUser.city);
		$('#primaryRole').text(thisUser.role);
		$('#secondaryRole').text(thisUser.secondaryrole);
		$('#bio').text(thisUser.bio);
		var ps = thisUser.personalsite;
		if(ps.indexOf('http://') === -1 || ps.indexOf('https://') === -1) {
			ps = "http://" + thisUser.personalsite;
		}
		$('#personalSite').append('<a href="' + ps + '" target="_blank">' + ps + '</a>');
	}
}
$(document).ready(function(e){
	script.getUser();
	function getData() {
		if(script.userData) {
			clearInterval(id);	
		}

		if(script.intervalCount > 1000) {
			clearInterval(id);
		}
		script.intervalCount++;
	}
	var id = setInterval(getData, 10);
})