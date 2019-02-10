var script = {
	run: function() {
		$.ajax({
			url: '../../services/get/getEvents.php',
			method: 'GET',
			success: function(msg){
				var res = $.parseJSON(msg);
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
		

		$('#addEvent').bind('click', function(e) {
			getData = function() {
				var file = $('#bannerUpload');
				var file_data = file[0].files[0];   
				var form_data = new FormData();                  
				form_data.append('file', file_data);
				form_data.append('title', $('#eventName').val()); 
				var options = {
					"category": "event"
				}
				form_data.append('category', JSON.stringify(options));
				if(file_data) {
					return form_data;
				} else {
					return "ERROR";
				}			
			}

			successFn = function(msg) {
				console.log(msg);
				script.addEvent(msg);
			}
			global.uploadImage($('#bannerUpload'), "event", successFn, $('#eventName').val());
			

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