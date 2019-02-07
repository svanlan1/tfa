var script = {
	run: function() {
		console.log('script loaded.');
		$('#updateTicker').bind('click', function(e) {
			var data = {
				text: $('#ticker').val(),
				dateAdded: new Date()
			}
			$.ajax({
				url: '../../services/set/addTicker.php',
				method: 'POST',
				data: data,
				success: function(msg) {
					window.location.href = '/sandbox/a/'
				},
				error: function(e) {
					console.log(e);
				}
			})
		});

		$.ajax({
			url: '../../services/get/getAllTickers.php',
			method: 'GET',
			success: function(msg){
				var res = $.parseJSON(msg).tickers;
				$(res).each(function(i,v) {
					var ul = $('#prevticks'),
						li = $('<li />').attr({
							'tabindex': 0,
							'role': 'button',
							'data-date-added': v.dateAdded,
							'data-submittedby': v.memberID,
							'data-ticker-id': v.id
						}).appendTo(ul),
						textspan = $('<span />').addClass('textspan').text(v.text).appendTo(li),
						datespan = $('<span />').addClass('datespan').text(global.util._formatJSDate(v.dateAdded, true)).appendTo(li);
					$(li).bind('click', function(e) {
						$('#ticker').val($(this).find('.textspan').text());
					});
				})
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