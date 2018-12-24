var script = {
	run: function() {
		$('.addScript').bind('click', function(e) {
			global.dialog._open('scriptUpload');
		});

		$('#scriptUpload').bind('change', function(e) {
			var tempImage = document.querySelector('div[data-dialog-id=scriptUpload] input[type="file"]').files[0];
			function getBase64(file) {
			   var reader = new FileReader();
			   reader.readAsDataURL(file);
			   reader.onload = function () {
			     // console.log(reader.result);
			     $('.fileUpload span').text(tempImage.name);
			   };
			   reader.onerror = function (error) {
			     console.log('Error: ', error);
			   };
			}

			var file = document.querySelector('div[data-dialog-id=scriptUpload] input[type="file"]').files[0];
			getBase64(file);
		});


		$('.scriptUpload').bind('click', function(e) {
			script.uploadScript();
		})
	},

	getSlingshotData: function() {

	},

	uploadScript: function() {
		$('div[data-dialog-id=scriptUpload] div[role=document]').hide();
		$('div[data-dialog-id=scriptUpload] .loader').fadeIn();
		var options = {
			"category": "slingshot",
			"project": $('#ssProject').val()
		};
		var scriptTitle = $('#ssTitle').val();
		var file_data = document.querySelector('div[data-dialog-id=scriptUpload] input[type="file"]').files[0];   
		var form_data = new FormData();                 
		form_data.append('file', file_data); 
		form_data.append('category', JSON.stringify(options));
		form_data.append('title', scriptTitle);
		$.ajax({
		    url: '../../services/set/scriptUpload.php', // point to server-side PHP script 
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
		    		$('div[data-dialog-id=scriptUpload] .errorText h3 span').text(parsed.Error);
		    		$('div[data-dialog-id=scriptUpload] .errorText .longDesc').text(parsed['longDesc']);
		    		$('div[data-dialog-id=scriptUpload] .errorText').show();
		    		$('div[data-dialog-id=scriptUpload] .loader').hide();
		    		$('div[data-dialog-id=scriptUpload] div[role=document]').fadeIn();
		    	} catch(e) {
		    		global.dialog._closeAction = function() {
		    			$('div[data-dialog-id=scriptUpload] .errorText h3 span').text('');
		    			$('div[data-dialog-id=scriptUpload] .errorText .longDesc').text('');
		    			$('div[data-dialog-id=scriptUpload] .errorText').hide();
		    		}
		    		$('div[data-dialog-id=scriptUpload] .loader').hide();
		    		$('.successfullyUploaded').fadeIn( 300 );;
		    		setTimeout(function(e) {
		    			$('.successfullyUploaded').hide();
			    		global.dialog._close();
			    		console.log(msg);		    			
		    		}, 1000)
		    	}
		    },
		    error: function(e) {
		    	console.log(e);
		    }
		 });		
	},

	createSlingshotProject: function() {

	}
}
$(document).ready(function(e){
	script.run();
})