var homepage = {
	evcount: 0,
	getEvents: function() {
		$(homepage.events).each(function(i,v) {
			var now = new Date(),
				evdate = new Date(v.startDate);
			if(evdate > now) {
	    		var clone = $('.eventList').eq(0).find('li').eq(0).clone(),
	    			eventDate = v.startDate.split(' ')[0],
	    			startTime = v.startDate.split(' ')[1],
	    			endTime = v.endDate.split(' ')[1];
	    		$(clone).find('.eventTimes span').eq(0).text(eventDate);
	    		$(clone).find('h3 a').text(v['title']);
	    		$(clone).find('.eventTimes span').eq(1).find('strong').eq(0).text(startTime);
				$(clone).find('.eventTimes span').eq(1).find('strong').eq(1).text(endTime);
				if(v.details.length > 120) {
					v.details = v.details.substring(0,120) + '...';
				}
	    		$(clone).find('.eventLocation').text(v.details);
				$(clone).appendTo($('.eventList').eq(0));
				homepage.evcount++;
				if(homepage.evcount > 1) {
					return false;
				}
			}
		});
		$('.eventList').eq(0).find('li').eq(0).remove();
	},

	getHPData: function() {
		$(homepage.posts).each(function(i,v) {
			var dateSplit = v.posted.split(' '),
				postedDate = dateSplit[1] + ' ' + dateSplit[2] + ', ' + dateSplit[3],
				featured = $.parseJSON(v.featured);	        		
			if(featured.pre) {
				var cont = $('#filmSpotlight');
				var commentsNumber = getComments(v.id);
				function getComments(id) {
					var commentsCount = 0;
					$(homepage.comments).each(function(i,v) {
						if(v.postID === id) {
							commentsCount++;
						}
					});
					return commentsCount;
				}
				$(cont).find('h3 a').text(v.title);
				$(cont).find('h3 a').attr('href', 'story/index.php?id=' + v.id);
				$(cont).find('.byline').text('by ' + v.byline + ' on ' + postedDate);
				$(cont).find('.banner img').attr('src', '/sandbox/uploads/' + v.banner);
				$(cont).find('p').text(v.lead);
				$(cont).find('.commentsDisplay_number').text(commentsNumber);
				$('#filmSpotlight .loader').hide();
				$('#filmSpotlight .showHide').fadeIn();
			} else {
	    		if(i < 5) {
					var commentsNumber = getComments(v.id);
					function getComments(id) {
						var commentsCount = 0;
						$(homepage.comments).each(function(i,v) {
							if(v.postID === id) {
								commentsCount++;
							}
						});
						return commentsCount;
					}					
	    			var clone = $('#latestNews .sectionContent').eq(0).clone();
	    			$(clone).find('h3 a').attr('href', 'story/index.php?id=' + v.id).text(v.title);
	    			$(clone).find('.byline').text('by ' + v.byline + ' on ' + postedDate);
	    			$(clone).find('p').html(v.lead);
	    			if(v.banner.indexOf('youtube') > -1) {
	    				$(clone).find('iframe').attr('src', v.banner);
	    				$(clone).find('div.banner img').remove();	
	    			} else {
	    				$(clone).find('div.banner img').attr('src', '/sandbox/uploads/' + v.banner).attr('alt', '');
	    				$(clone).find('iframe').remove();
					}
					$(clone).find('.commentsDisplay_number').text(commentsNumber);
	    			
	    			$(clone).show().appendTo('#latestNews');
	    		} else {
	    			return false;
	    		}	        			
			}
		});
		$('#latestNews .loader').hide();
		$('#latestNews .showHide').fadeIn();
	},

	getWamFilms: function() {
		$(homepage.films).each(function(i,v) {
			var clone = $('#2018WamWinners ul li').eq(0).clone();
			if(v.tfa_category === "wam_sel_2018" && v.wam_prize === "winner") {
				$(clone).find('h3 a').text(v.name);
				$(clone).find('.description').text(v.descrip);
				$(clone).show().prependTo('#2018WamWinners ul');
				$(clone).find('h3 span img').attr('src', '/sandbox/images/first.svg').attr('title', '2018 Official Winner!');
			} else if (v.tfa_category === "wam_sel_2018" && v.wam_prize === "fanWinner") {
				$(clone).find('h3 a').text(v.name);
				$(clone).find('.description').text(v.descrip);
				$(clone).show().appendTo('#2018WamWinners ul');
				$(clone).find('h3 span img').attr('src', '/sandbox/images/first.svg').attr('title', '2018 WAM Fan Winner!');
			}
		});

	},

	getHomepage: function() {
	    $.ajax({
	        url: 'services/get/getHomepageData.php',
	        method: 'GET',
	        success: function(msg) {
	        	var p = $.parseJSON(msg);
	        	homepage.films = p.films;
	        	homepage.posts = p.homepage;
				homepage.events = p.events;
				homepage.comments = p.comments;
				homepage.getEvents();
				homepage.getHPData();
				homepage.getWamFilms();	        	
	        	console.log("HOMEPAGE DATA: ", $.parseJSON(msg));
	        },
	        error: function(e) {
	        	console.log(e);
	        }
	    });
	},

	run: function() {

		homepage.getHomepage();
		console.log('This is the homepage');
	}
}
$(document).ready(function(e) {
	homepage.run();
});