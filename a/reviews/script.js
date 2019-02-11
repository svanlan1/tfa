var script = {
	run: function() {
		console.log('script loaded.');	
		script.reloadCKI();
		$('.addCharge').bind('click', function(e) {
			var cList = $('ol').eq(0),
				dList = $('ol').eq(1);
			var len = $(cList).find('textarea').length + 1,
				chargeLi = $('<li />').appendTo(cList),
				chargeLabel = $('<label />').attr({
					'for': 'charge_' + len
				}).text('Charge ' + len).appendTo(chargeLi),
				chargeTextarea = $('<textarea />').attr({
					'id': 'charge_' + len,
					'class': 'editor',
					'data-type': 'charge',
					'aria-label': 'Charge ' + len
				}).addClass('editor').appendTo(chargeLi);

			var len = $(dList).find('textarea').length + 1,
				defenseLi = $('<li />').appendTo(dList),
				defenseLabel = $('<label />').attr({
					'for': 'defense_' + len
				}).text('Defense ' + len).appendTo(defenseLi),
				defenseTextarea = $('<textarea />').attr({
					'id': 'defense_' + len,
					'class': 'editor',
					'data-type': 'defense',
					'aria-label': 'Defense ' + len 
				}).addClass('editor').appendTo(defenseLi);				

			script.reloadCKI();
		});

		$('#banner').bind('change', function(e) {
			var text = $(this).val().split('\\'),
				disp = text[text.length -1];
			$('.fileUpload span').text(disp);
		});

		$('.submit').bind('click', function(e) {			
			$('.editor').each(function() {
				CKEDITOR.instances[this.id].updateElement();
			});		
			
			var charges = [];
			$('textarea[data-type=charge]').each(function(i,v) {
				charges.push($(v).val());
			});
			var defenses = [];
			$('textarea[data-type=defense]').each(function(i,v) {
				defenses.push($(v).val());
			});

			var data = {
				"title": $('#title').val(),
				"trailer": $('#trailer').val(),
				"director": $('#director').val(),
				"charges": JSON.stringify(charges),
				"defenses": JSON.stringify(defenses),
				"closingarguments": $('#closingArguments').val(),
				"updated": new Date()
			}

			successFn = function(msg) {
				data.image = msg;
				script.submitReview(data);
			}
			if(global.util._validate()) {
				global.dialog._open('filmreviewsubmission');
				global.dialog._closeAction = function() {
					window.location.href = "/sandbox/a/";
				}				
				global.uploadImage($('#banner'), "filmreview", successFn, $('#title').val());
			} else {
				$('*[aria-invalid=true]').eq(0).focus();
				if($('#banner').attr('aria-invalid') === "true") {
					$('.preUpload').css({
						'box-shadow': '#c00 0 0 2px 1px'
					});
				}
				$('div[role=alert]').fadeIn();
			}
		});
	},

	reloadCKI: function() {
		$('.editor').each(function() {
			var $this = $(this),
				value = $this.val();
			try {
				CKEDITOR.replace(this.id);
			} catch(e) {
				console.log(e);
			}
				
		});			
	},

	submitReview: function(data) {
		$.ajax({
			url: '../../services/set/addFilmReview.php',
			method: 'POST',
			data: data,
			success: function(msg) {
				console.log(msg);
				if(msg === "Success") {
					$('.loader').hide();
					$('.showHide').css('display', 'block');
				}
			},
			error: function(e) {
				console.log(e);
			}
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
})