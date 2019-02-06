var script = {
	run: function() {
		script._get();
	},

	_get: function() {
		$.ajax({
			url: '/sandbox/services/get/getFilms.php',
			method: 'GET',
			async: 'true',
			success: function(msg) {
				script.results = $.parseJSON(msg);
				console.log(script.results);
				var url = window.location.href;
				if(url.indexOf('all.php') > -1) {
					script._draw();
				} else {
					script._drawList();
				}
			},
			error: function(e) {
				console.log(e);
			}
		});
	},
	_set: function() {

	},
	_drawList: function() {
		sortArr = function() {
			script.results.sort(function(a, b){
				var keyA = new Date(a.subdate),
					keyB = new Date(b.subdate);
				// Compare the 2 dates
				if(keyA < keyB) return -1;
				if(keyA > keyB) return 1;
				return 0;
			});			
		}		
		sortArr();
		var i = 0,
			rArr = [];
		while(i < 5) {
			var rn = global.util._generateRandomNumber(script.results.length-1);
			
			if(rArr.indexOf(rn) === -1) {
				var res = script.results[rn],
					c = $('.container ul'),
					li = $('<li />').appendTo(c);
				var image = $('<div />').addClass('thisPoster').appendTo(li),
					descDiv = $('<div />').addClass('thisInfo').appendTo(li);

					var src = 'https://www.youtube.com/embed/';
					if(res.link && res.link.split('=').length > 1) {
						src += res.link.split('=')[1].split('&')[0];
					} else if (res.link.split('/').length > 1) {
						var test = res.link.split('/');
						$(test).each(function(j,k) {
							if(k.indexOf('http') < 0 && k !== "" && k.indexOf('youtu') < 0) {
								src += k;
							}
						});
					}				
				if(res.poster === "") {
					var clone = $('.screen-reader-only').find('iframe').eq(0).clone();
					$(clone).attr('src', src);
					$(clone).appendTo(image);
				} else {
					$('<img />').attr('src', res.poster).attr('alt', res.name).appendTo(image);
				}

				$('<h4 />').text(res.name).appendTo(descDiv);
				$('<span />').addClass('submittedDate').text("posted on " + global.util._formatJSDate(res.subdate, false)).appendTo(descDiv);
				$(descDiv).append('<div class="half"><strong>Directed by</strong><span>'+res.director+'</span></div>');
				$(descDiv).append('<div class="half"><strong>Written by</strong><span>'+res.writer+'</span></div>')
				$('<div />').addClass('descrip').text(res.descrip).appendTo(descDiv);

				i++;
				rArr.push(rn);
			}
			
		}
	},

	_draw: function() {
		$(script.results).each(function(i,v) {
			//if(v.tfa_category === "na" || v.tfa_category === "" || v.tfa_category === "slingshot") {
				var src = 'https://www.youtube.com/embed/';
				if(v.link && v.link.split('=').length > 1) {
					src += v.link.split('=')[1].split('&')[0];
				} else if (v.link.split('/').length > 1) {
					var test = v.link.split('/');
					$(test).each(function(j,k) {
						if(k.indexOf('http') < 0 && k !== "" && k.indexOf('youtu') < 0) {
							src += k;
						}
					});
				}
				try {
					
				} catch(e) {
					src = 'https://www.youtube.com/embed/';
					
					console.log(e);
				}					
				var clone = $('#filmsDisplay div.film').eq(0).clone();
				$(clone).find('iframe').attr('src', src);
				$(clone).find('.filmTitle').text('"' + v.name + '"');
				$(clone).find('.instructions').text(v.director);
				$(clone).show().appendTo('#filmsDisplay');
			//}
		});
		$('div.film').eq(0).remove();
	}
}
$(document).ready(function(e){
	script.run();
})