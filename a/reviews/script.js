var script = {
	edit: false,
	run: function() {
		console.log('script loaded.');	
		script.reloadCKI();
		$('.addCharge').bind('click', function(e) {
			script.addCharge();
			script.reloadCKI();	
		});

		$('#banner').bind('change', function(e) {
			var text = $(this).val().split('\\'),
				disp = text[text.length -1];
			$('.fileUpload span').text(disp);
		});

		$('.submit, .update').bind('click', function(e) {			
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
				"summary": $('#summary').val(),
				"updated": new Date()
			}
			if(script.edit) {
				data['image'] = $('.homepage .preUpload img').attr('data-image');
			}

			successFn = function(msg) {
				if(script.edit) {
					script.updateReview(data, msg);
				} else {
					data.image = msg;
					script.submitReview(data);
				}
				
			}
			if(global.util._validate()) {
				global.dialog._open('filmreviewsubmission');
				global.dialog._closeAction = function() {
					window.location.href = "/a/";
				}
				if(!script.edit) {
					global.uploadImage($('#banner'), "filmreview", successFn, $('#title').val());
				} else {
					successFn();
				}
				
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
					$('.showHide').removeAttr('style');
					$('.showHide').css('display', 'block');
				}
			},
			error: function(e) {
				console.log(e);
			}
		});
	},

	updateReview: function(data) {
		data.id = script.thisId;
		$.ajax({
			url: '../../services/set/updateFilmReview.php',
			method: 'POST',
			data: data,
			success: function(msg) {
				if(msg === "Success") {
					$('.loader').hide();
					$('div[data-dialog-id=filmreviewsubmission] .showHide').removeAttr('style');
					$('div[data-dialog-id=filmreviewsubmission] .showHide').css('display', 'block');
				}
			},
			error: function(e) {
				console.log(e);
			}
		})
	},
	
	addCharge: function(charge, defense) {
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
		if(charge) {
			$(chargeTextarea).val(charge);
		}

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
		if(defense) {
			$(defenseTextarea).val(defense);
		}
					
	},

	getReviews: function() {
		$.ajax({
			url: '/services/get/getFilmReviews.php',
			method: 'GET',
			success: function(msg) {
				script.reviews = $.parseJSON(msg);
				$(script.reviews).each(function(i,v) {
					var li = $('<li />').appendTo('.currentReviews');
					var imgdiv = $('<div />').addClass('dispImg').css({
							'background': 'url("/uploads/' + v.image + '")  0% 0% / cover no-repeat'
						}).appendTo(li),
						contentDiv = $('<div />').addClass('dispContent').appendTo(li);

					$('<h3 />').text(v.title).appendTo(contentDiv);
					$('<a />').attr({
						'href': '/reviews/review.php?id=' + v.id,
						'target': '_block'
					}).text("View review").appendTo(contentDiv);
					$('<a />').attr('href', 'edit.php?id=' + v.id).text("Edit review").appendTo(contentDiv);
					$(v.summary).appendTo(contentDiv);
				})
			},
			error: function(e) {
				console.log(e);
			}
		});
	},

	getReview: function(id) {
		script.thisId = id;
		$.ajax({
			url: '/services/get/getFilmReview.php',
			data: {
				"id": id
			},
			method: 'GET',
			success: function(msg) {
				script.thisReview = $.parseJSON(msg)[0];
				console.log(script.thisReview);
				$('.preUpload').html('<img src="/uploads/' + script.thisReview.image + '" data-image="'+script.thisReview.image+'" alt="" />');
				$('#title').val(script.thisReview.title);
				$('#trailer').val(script.thisReview.trailer);
				$('#director').val(script.thisReview.director);
				$('#summary').val(script.thisReview.summary);
				script.thisReview.charges = $.parseJSON(script.thisReview.charges);
				script.thisReview.defenses = $.parseJSON(script.thisReview.defenses);
				$(script.thisReview.charges).each(function(i,v) {
					var len = parseFloat(i+1);
					if(i === 0) {
						$('textarea[data-name=charge_' + len).val(v);
						$('textarea[data-name=defense_' + len).val(script.thisReview.defenses[0]);
					} else {
						script.addCharge(v, script.thisReview.defenses[i]);
						script.reloadCKI();	
					}
				});
				$('#closingArguments').val(script.thisReview.closingarguments);
			},
			error: function(e) {
				console.log(e);
			}
		});
	}
}
$(document).ready(function(e){
	function check() {
		if(script.data) {
			clearInterval(int);
			script.run();
			if(window.location.href.indexOf('add.php') === -1 && window.location.href.indexOf('edit.php') === -1) {
				script.getReviews();
			} else if (window.location.href.indexOf('edit.php') > -1) {
				script.edit = true;
				script.getReview(window.location.href.split('?id=')[1]);
			}
		}
	}
	var int = setInterval(check, 10);
})