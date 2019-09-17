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
						var li = $('<li />').appendTo('.currentReviews');
						var imgdiv = $('<div />').addClass('dispImg').css({
								'background': 'url("/uploads/' + v.image + '")  0% 40% / cover no-repeat'
							}).appendTo(li),
							contentDiv = $('<div />').addClass('dispContent').appendTo(li);
	
						var h3 = $('<h3 />').addClass('filmCourtTitleH3').appendTo(contentDiv);
						$('<a />').attr('href', '/reviews/review.php?id=' + v.id).text(v.title).appendTo(h3);
						var summaryDiv = $('<div />').addClass('dispSummary').html(v.summary).appendTo(contentDiv);
						$('<a />').attr({
							'href': '/reviews/review.php?id=' + v.id,
							'aria-label': 'Read review of ' + v.title
						}).text("Read more").appendTo(summaryDiv);
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