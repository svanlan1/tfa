var script = {
	run: function() {
		console.log('script loaded.');
	}
}

$(document).ready(function(e) {
	function getData() {
		if(script.userData) {
			clearInterval(id);
			script.run();
		}
	}
	var id = setInterval(getData, 10);
});