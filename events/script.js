var script = {
	run: function() {
		console.log("EVENTS:", script.events);
		var futureEvents = [],
			pastEvents = [];
		$(script.events).each(function(i,v) {
			var rightNow = new Date(),
				startDate = new Date(v.startDate),
				endDate = new Date(v.endDate);
			if(endDate > rightNow) {
				futureEvents.push(v);
			} else {
				pastEvents.push(v);
			}
		});
		console.log('Future events: ' + futureEvents);
		console.log('Past events: ' + pastEvents);
		$(futureEvents).each(function(i,v) {
			var clone = $('#upcomingEvents .sectionContent').eq(0).clone();
			$(clone).find('h3').text(v.startDate + ' - ' + v.title);
			$(clone).find('div.banner img').attr('src', v.photo);
			$(clone).find('p').text(v.details);
			$(clone).find('.byline').text('@' + v.location);
			if(v.gmaps !== "") {
				$(clone).find('.maps').attr({
					'href': v.gmaps,
					'title': 'Directions to ' + v.location + ' on Google Maps, opens in a new window',
					'target': '_blank'
				});
			} else {
				$(clone).find('.maps').remove();
			}

			if(v.meetup !== "") {
				$(clone).find('.meetup').attr({
					'href': v.meetup,
					'title': 'Meetup event for ' + v.title + ', opens in a new window',
					'target': '_blank'
				});
			} else {
				$(clone).find('.meetup').remove();
			}

			$(clone).find('.meetup').attr('href', v.meetup).attr('title', 'Meetup event for ' + v.title);
			$(clone).appendTo('#upcomingEvents');
		});
		$(pastEvents).each(function(i,v) {
			var li = $('<li />').appendTo('ul.eventList');
			var strong = $('<strong />').text(v.title).appendTo(li),
				byline = $('<div />').addClass('byline').text(v.startDate).appendTo(li);
		});
		$('#upcomingEvents .sectionContent').eq(0).remove();
		$('.loader').hide();
		$('.showHide').fadeIn();
	},

	getEvents: function() {
		console.log('the user is not logged in');
	    $.ajax({
	        url: '/sandbox/services/get/getEvents.php',
	        method: 'GET',
	        success: function(msg) {
	        	script.events = $.parseJSON(msg);
	        	console.log(script.events);
	        	script.run();
	        },
	        error: function(e) {

	        }	
        });	
	}
}
$(document).ready(function(e){
	function getData() {
		if(inc < 21) {
			if(script.events) {
				clearInterval(id);
				script.run();
			} else {
				inc++;
			}
		} else {
			clearInterval(id);
			script.getEvents();
		}
	}
	var id = setInterval(getData, 10),
		inc = 0;	
})