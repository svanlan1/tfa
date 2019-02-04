var script = {
	run: function() {
		script._get();
	},

	_get: function() {
		$.ajax({
			url: '/sandbox/services/get/getFilms.php',
			method: 'GET',
			success: function(msg) {
				script.results = $.parseJSON(msg);
				console.log(script.results);
				script._draw();
			},
			error: function(e) {
				console.log(e);
			}
		});
	},
	_set: function() {

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