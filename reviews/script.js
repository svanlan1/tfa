var script = {
	run: function() {
		console.log('script loaded.');
		$.ajax({
			url: '../services/get/getFilmReviews.php',
			get: 'GET',
			success: function(msg) {
				script.filmcourt = $.parseJSON(msg);
				console.log(script.filmcourt);
				$(script.filmcourt).each(function(i,v) {
					if(window.location.href.indexOf('review.php') === -1) {
						var li = $('<li />').appendTo('.sectionContent ul'),
							a = $('<a />').attr({
								'href': '/sandbox/reviews/review.php?id=' + v.id
							}).text(v.title).appendTo(li);
					}
				});
				if(window.location.href.indexOf('review.php') > -1) {
					r.run();
				}
			},
			error(e) {
				console.log(e);
			}
		});
	}
}
$(document).ready(function(e){
	
		script.run();

});