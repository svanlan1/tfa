var script = {
	run: function() {
		$.ajax({
			url: '../../services/get/getAllMessages.php',
			type: 'GET',
			success: function(msg) {
				script.data.messages = $.parseJSON(msg).messages;
				console.log(script.data.messages);
				$(script.data.messages).each(function(i,v) {
					var tr = $('<tr />').appendTo('table tbody'),
						chkCell = $('<td />').appendTo(tr),
						chkBox = $('<input />').attr({
							'type': 'checkbox',
							'aria-label': 'Mark message from ' + v.name + ' as read.'
						}).appendTo(chkCell),
						nameCell = $('<td />').text(v.name).appendTo(tr),
						pageCell = $('<td />').text(v.page).appendTo(tr),
						msgCell = $('<td />').text(v.message).appendTo(tr),
						sentCell = $('<td />').text(global.util._formatJSDate(v.senton, false)).appendTo(tr);
					if(v.mread !== "Y") {
						$(tr).addClass('unread');
					}
				});
			},
			error: function(e) {
				console.log(e);
			}
		});
		console.log(script.data.messages);
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