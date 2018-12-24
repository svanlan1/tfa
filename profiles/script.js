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
				script.drawProfilePics();
				script.drawOtherProfileThings();
			}
		});
	},

	drawProfilePics: function() {
		var headshot = script.profile.meminfo[0].headshot;
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
			}
		});
	},

	drawOtherProfileThings: function() {
		$('.headshotName').text(script.profile.meminfo[0].firstname + " " + script.profile.meminfo[0].lastname);
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