var script = {
	runStart: function() {
		$('.addResource').bind('click', function(e) {
			//global.dialog._open('addResource');
			window.location.href = '/p/resources/add/'
		});

		$('div[data-dialog-id=addResource] .dialog .add').bind('click', function(e) {
			script.addResourceImage();
		});

		$('#resourcePhotoUpload').bind('change	', function(e) {
			var filename = document.querySelector('#resourcePhotoUpload').files[0].name;
			$('div[data-dialog-id=addResource] .fileUpload span').text(filename);
		});
	},

	addResource: function(filename) {
		var photos = {
			'name': filename
		}
		var data = {
			'type': $('#resourceType').val(),
			'description': $('#resourceDescription').val(),
			'dateAdded': new Date(),
			'name': $('#resourceName').val(),
			'photos': JSON.stringify(photos),
			'plainname': script.userData[script.currentUser].plainname
		}
		$.ajax({
		    data: data,
		    url: '/services/set/addResource.php',
		    method: 'POST',
		    success: function(msg) {
				$('div[data-dialog-id=addResource] div.loader').hide();
				$('div[data-dialog-id=addResource] div.successfullyUploaded').fadeIn();
				setTimeout(function() {
					global.dialog._close();
					global.dialog._closeAction = function() {
						$('div[data-dialog-id=addResource] div[role=document]').show();
						$('.dialog input, .dialog select, .dialog textarea').val('')
						$('div.successfullyUploaded').hide();
					}
				}, 2000)
	    	}, 
	    	error: function(e) {
	    		console.log(e);
	    	}
	    });
	},

	addResourceImage: function() {
		var file = $('div[data-dialog-id=addResource] input[type=file]'),
			category = "resource",
			successFn = function(msg) {
				console.log(msg);
				script.addResource(msg);
			}
		$('div[data-dialog-id=addResource] div[role=document]').hide();
		$('div[data-dialog-id=addResource] div.loader').show();
		if(file[0].files[0]) {
			var fn = global.uploadImage(file, category, successFn, $('#resourceName').val());
		}
	},

	getResourceByType: function() {
		$.ajax({
		    data: {type: script['type']},
		    url: '/services/get/getResourceByType.php',
		    method: 'GET',
		    success: function(msg) {
		    	script.resources = $.parseJSON(msg).resources;
		    	$(script.resources).each(function(i,v) {
		    		var photos = $.parseJSON(v.photos);
		    		var clone = $('.binderList li').eq(0).clone();
		    		if(v.type === "location") {
		    			$(clone).find('.binderLink i').text('landscape');	
		    		} else {
		    			$(clone).find('.binderLink i').text('camera_alt');
		    		}
		    		$(clone).find('.binderLink').attr('data-image-path', photos.name);
		    		$(clone).find('.binderLink').bind('click', function(e) {
						$('div[data-dialog-id=photos]').find('div.showHide div img').attr('src', '/uploads/' + photos.name);
						global.dialog._open('photos');
						global.dialog._closeAction = function() {
							$('div[data-dialog-id=photos] div img').attr('src', '');
						}
		    		});	

		    		$(clone).find('.binderInfo span').eq(0).text(v.name);
		    		$(clone).find('.binderInfo span').eq(1).text(v.description);
		    		$(clone).find('.binderInfo span').eq(2).text(v.plainname).attr('data-memberID', v.memberID);
		    		
		    		$(clone).show().appendTo('.binderList');
		    	});
		    },
		    error: function(e) {

		    }	
		});
	}
}
$(document).ready(function(e){
	script.runStart();
	script['type'] = window.location.href.split('/')[6].split('?type=')[1];
	$('<span />').addClass('instructions').css('margin-left', '5px').text(script['type']).appendTo('#resourcesLanding h2');
	function getData() {
		if(script.userData) {
			clearInterval(id);
			if(script['type']) {
				script.getResourceByType();
			}
		}
	}
	var id = setInterval(getData, 10);
})