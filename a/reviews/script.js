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
					'class': 'editor'
				}).addClass('editor').appendTo(chargeLi);

			var len = $(dList).find('textarea').length + 1,
				defenseLi = $('<li />').appendTo(dList),
				defenseLabel = $('<label />').attr({
					'for': 'defense_' + len
				}).text('Defense ' + len).appendTo(defenseLi),
				defenseTextarea = $('<textarea />').attr({
					'id': 'defense_' + len,
					'class': 'editor'
				}).addClass('editor').appendTo(defenseLi);				

			script.reloadCKI();
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