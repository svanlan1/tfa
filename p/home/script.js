var script = {
	runStart: function() {
		console.log('Post log in home screen loaded.');
		script.drawNews();
	},

	drawNews: function() {
		$(script.homepage).each(function(i,v) {
			var dateSplit = v.posted.split(' '),
				postedDate = dateSplit[1] + ' ' + dateSplit[2] + ', ' + dateSplit[3],
				featured = $.parseJSON(v.featured);	        		
			if(featured.post) {
				var cont = $('#filmSpotlight');
				var commentsNumber = getComments(v.id);
				function getComments(id) {
					var commentsCount = 0;
					$(script.comments).each(function(i,v) {
						if(v.postID === id) {
							commentsCount++;
						}
					});
					return commentsCount;
				}
				$(cont).find('h3 a').text(v.title);
				$(cont).find('h3 a').attr('href', '/story/index.php?id=' + v.id);
				$(cont).find('.byline').text('by ' + v.byline + ' on ' + postedDate);
				$(cont).find('.banner img').attr('src', '/uploads/' + v.banner);
				$(cont).find('p').text(v.lead);
				$(cont).find('.commentsDisplay_number').text(commentsNumber);
				$('#filmSpotlight .loader').hide();
				$('#filmSpotlight .showHide').fadeIn();
			} else {
				var commentsNumber = getComments(v.id);
				function getComments(id) {
					var commentsCount = 0;
					$(script.comments).each(function(i,v) {
						if(v.postID === id) {
							commentsCount++;
						}
					});
					return commentsCount;
				}					
				var clone = $('#latestNews .sectionContent').eq(0).clone();
				$(clone).find('h3 a').attr('href', '/story/index.php?id=' + v.id).text(v.title);
				$(clone).find('.byline').text('by ' + v.byline + ' on ' + postedDate);
				$(clone).find('p').html(v.lead);
				if(v.banner.indexOf('youtube') > -1) {
					$(clone).find('iframe').attr('src', v.banner);
					$(clone).find('div.banner img').remove();	
				} else {
					$(clone).find('div.banner img').attr('src', '/uploads/' + v.banner).attr('alt', '');
					$(clone).find('iframe').remove();
				}
				$(clone).find('.commentsDisplay_number').text(commentsNumber);
				
				$(clone).show().appendTo('#latestNews');
	    			        			
			}
		});
		$('#latestNews .loader').hide();
		$('#latestNews .showHide').fadeIn();		
	}
}
$(document).ready(function(e){
	function getData() {
		if(script.userData) {
			clearInterval(id);
			script.runStart();
		}
	}
	var id = setInterval(getData, 10);
})