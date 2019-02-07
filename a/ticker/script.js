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
		})
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