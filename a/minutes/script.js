var script = {
	run: function() {
		console.log('script loaded.');
		$('div[data-disp=initial]').show();

		$('div[data-disp=initial] input[type=radio]').bind('change', function(e) {
			if($(this).attr('id') === 'mtypefile') {
				$('div[data-disp=link]').hide();
				$('div[data-disp=upload]').fadeIn();
			} else {
				$('div[data-disp=upload]').hide();
				$('div[data-disp=link]').fadeIn();
			}
			$('div[data-disp=type]').fadeIn();
		});

		$('div[data-disp=type] input[type=radio]').bind('change', function(e) {
			if($(this).attr('id') === 'execsonly') {
				$('div[data-disp=wednesday]').hide();
				$('div[data-disp=monday]').fadeIn();
			} else {
				$('div[data-disp=monday]').hide();
				$('div[data-disp=wednesday]').fadeIn();
			}
		});

		var nextMeetings = global.util._getSpecificDates(0, 14, 2, 3);
		console.log(nextMeetings);
		$(nextMeetings.first).each(function(i,v) {
			$('<option />').attr({
				"value": v
			}).text(v).appendTo('#mondays');
		});

		$(nextMeetings.third).each(function(i,v) {
			$('<option />').attr({
				"value": v
			}).text(v).appendTo('#wednesdays');
		});



		getData = function() {
			var file = $('#minuteUpload');
			var file_data = file[0].files[0];   
			var form_data = new FormData();                  
			form_data.append('file', file_data);
			form_data.append('title', $('select:visible').val()); 
			var options = {
				"category": "minutes"
			}
			form_data.append('category', JSON.stringify(options));
			if(file_data) {
				return form_data;
			} else {
				return "ERROR";
			}			
		}
		//var data = getData();
		//global.util._uploadFile(data);
		$('.addMinutes').bind('click', function(e) {
			var data = getData();
			global.util._uploadFile(data);
			console.log(script.tempFileName);
			script.addMinutesRow();
		});

	},

	addMinutesRow: function() {
		var mdata = {
			"file": script.tempFileName,
			"dateMet": $('select:visible').val(),
			"link": $('#linkToMinutes').val()
		}
		$.ajax({
			url: '../../services/set/addMinutes.php',
			method: 'POST',
			data: mdata,
			success: function(msg) {
				if(msg === "Success") {
					window.location.href = "/sandbox/a/";
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