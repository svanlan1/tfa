var script = {
	run: function() {
		$.ajax({
			url: '../../services/get/getEvents.php',
			method: 'GET',
			success: function(msg){
				var res = $.parseJSON(msg);
				global.util._sortObject(res, 'endDate');
				$(res).each(function(i,v) {
					var ul = $('#prevevents'),
						li = $('<li />').appendTo(ul),
						h4 = $('<h4 />').text(v.title).appendTo(li),
						evdate = v.startDate.split(' ')[0],
						evtimes = v.startDate.split(' ')[1] + ' - ' + v.endDate.split(' ')[1],
						dateSpan = $('<span />').addClass('evdate').text(evtimes).appendTo(li),
						evspan = $('<span />').addClass('evdate').text(evdate).appendTo(h4),
						deetp = $('<p />').text(v.details).appendTo(li);
					console.log(v);
				})
			},
			error: function(e) {
				console.log(e);
			}
		});

		$('#bannerUpload').bind('change', function(e) {
			var text = $(this).val().split('\\'),
				disp = text[text.length -1];
			$('.fileUpload span').text(disp);
		});
		

		$('#addEvent').bind('click', function(e) {
			successFn = function(msg) {
				console.log(msg);
				script.addEvent(msg);
			}
			if(global.util._validate()) {
				global.uploadImage($('#bannerUpload'), "event", successFn, $('#eventName').val());
			} else {
				$('*[aria-invalid=true]').eq(0).focus();
			}
		});
	},

	addEvent: function(msg) {
		var data = {
			"details": $('#eventDetails').val(),
			"endDate": $('#eventDate').val() + ' ' + $('#endTime').val(),
			"gmaps": $('#linkToGmaps').val(),
			"location": $('#location').val(),
			"meetup": $('#linkToMeetup').val(),
			"photo": msg,
			"startDate": $('#eventDate').val() + ' ' + $('#startTime').val(),
			"title": $('#eventName').val(),
			"url": $('#linkToFacebook').val()
		}
		$.ajax({
			url: '../../services/set/addEvent.php',
			method: 'POST',
			data: data,
			success: function(m) {
				console.log(m);
				if(m === "Success") {
					window.location.href = "/sandbox/events/";
				}
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
});