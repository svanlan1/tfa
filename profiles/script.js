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
				console.log(script.profile);
				script.thisProfileInfo = {
					'member': script.profile.members[0],
					'meminfo': script.profile.meminfo[0]
				}
				script.drawProfilePics();
				script.drawOtherProfileThings();

			}
		});
	},

	drawProfilePics: function() {
		var headshot = script.thisProfileInfo.meminfo.headshot;
		$('.tfa_profile_headshot').css({
			'background': 'url("/sandbox/uploads/' + headshot + '") no-repeat',
			'background-size': 'cover'
		});

		console.log(script.profile.meminfo[0]);
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
		$('.headshotName span').text(script.profile.meminfo[0].firstname + " " + script.profile.meminfo[0].lastname);
		global.util._addBadgesToUser(script.thisProfileInfo.meminfo, script.thisProfileInfo.member, $('.headshotName div'));
		$('#location').text(script.thisProfileInfo.meminfo.city);
		$('#primaryRole').text(script.thisProfileInfo.meminfo.role);
		$('#secondaryRole').text(script.thisProfileInfo.meminfo.secondaryrole);
		$('#bio').text(script.thisProfileInfo.meminfo.bio);
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