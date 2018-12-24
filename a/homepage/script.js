var script = {
	count: 0,
	run: function() {
		console.log('script loaded.');
	script.current = script.userData[script.currentUser];
	var href = window.location.href,
		hspl = href.split('/');
		if(hspl.indexOf('add.php') > -1) {
			script.buildForm();
		} else {
			script.draw();
		}
	},

	draw: function() {
		console.log("HOMEPAGE POSTS: ", script.data[6]);
	},

	buildForm: function() {
		 $('.editor').each(function() {
		 	var $this = $(this),
		 		value = $this.val();
		 	CKEDITOR.replace(this.id);
		 });

		// $('#adminAddHomepagePost .fileUpload').bind('click', function(e) {
		// 	script.count++;
		// 	$('#banner').click();
		// });
		$('#banner').bind('change', function(e) {
			var tempImage = document.querySelector('input[type="file"]').files[0];
			function getBase64(file) {
			   var reader = new FileReader();
			   reader.readAsDataURL(file);
			   reader.onload = function () {
			     // console.log(reader.result);
			     $('.preUpload img.bannerDisplay').attr('src', reader.result);
			   };
			   reader.onerror = function (error) {
			     console.log('Error: ', error);
			   };
			}

			var file = document.querySelector('input[type="file"]').files[0];
			getBase64(file);
		});

		$('.add_media').bind('click', function(e) {
			var clone = $('.clone').eq(0).clone();
			
			var newNum = $('.clone').length - 1;

			$(clone).find('label').eq(0).attr('for', 'platform-' + newNum);
			$(clone).find('select').eq(0).attr('id', 'platform-' + newNum);

			$(clone).find('label').eq(1).attr('for', 'media-' + newNum);
			$(clone).find('input').eq(0).attr({
				'aria-describedby': 'media-help-' + newNum,
				'id': 'media-' + newNum
			});
			$(clone).find('span').eq(1).attr('id', 'media-help-' + newNum);
			$(clone).css('padding-top', '25px').css('border-top', 'solid 1px #e9e9e9');
			$(clone).appendTo('.newArea');
		});

		$('.submit').bind('click', function(e) {
			$('.editor').each(function() {
				CKEDITOR.instances[this.id].updateElement();
			});
			var els = document.querySelectorAll(['input', 'select', 'textarea']),
				data = {},
				tempFeatured = {
					'pre': false,
					'post': false
				};
			$(els).each(function(i,v) {
				var name = $(v).attr('data-name');
				if(name !== "media") {
					if(name === "preLogin" || name === "postLogin") {
						var prop = $(v).prop('checked');
						data[name] = JSON.stringify(prop);
					} else if (name === "featured") {
						var id = $(v).attr('id');
						if(id === "exFeatured") {
							tempFeatured.post = $(v).prop('checked');
						} else if (id === "inFeatured") {
							tempFeatured.pre = $(v).prop('checked');
						}
					} else {
						data[name] = $(v).val();	
					}
				}
			});
			data['featured'] = JSON.stringify(tempFeatured);
			var tempArray = [];
			$('.clone').each(function(i,v) {
				var obj = {
					'platform': $(v).find('select').val(),
					'link': $(v).find('input').val()
				}
				tempArray.push(obj);
			});
			data['media'] = JSON.stringify(tempArray);
			data['posted'] = new Date();
			data['byline'] = script.current.firstname + ' ' + script.current.lastname;
			script.uploadBanner(data);
		});

	},

	uploadBanner: function(data) {
		var file_data = document.querySelector('input[type="file"]').files[0];   
		var form_data = new FormData();                 
		form_data.append('file', file_data);  
		var options = {
			"category": "headshot"
		}
		form_data.append('category', options);
		$.ajax({
		    url: '../../services/set/imageUpload.php', // point to server-side PHP script 
		    dataType: 'text',  // what to expect back from the PHP script, if anything
		    cache: false,
		    contentType: false,
		    processData: false,
		    data: form_data,                         
		    type: 'post',
		    success: function(msg){
		    	try {
		    		var parsed = $.parseJSON(msg);
		    		console.log(parsed.Error);
		    		$('.errorText').text(parsed.Error);
		    	} catch(e) {
		    		data.banner = msg;
			        script.addHomepagePost(data);
		    	}
		    },
		    error: function(e) {
		    	console.log(e);
		    }
		 });
	},

	addHomepagePost: function(data) {
		$.ajax({
		    data: data,
		    url: '/sandbox/services/set/addHomepagePost.php',
		    method: 'POST',
		    success: function(msg) {
		    	$('input textarea select').val('');
		    	window.location.href = '../../index.php';
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
		}
	}
	var int = setInterval(check, 10);
})