var script = {
	runStart: function() {

		var href = window.location.href,
			spl = href.split('?tab=');
		if(spl.length > 1) {
			var tab = spl[spl.length-1];
			$('a[aria-selected]').attr('aria-selected', 'false');
			$('a[data-id=' + tab + ']').attr('aria-selected', 'true');
			if(tab === 'myBinder') {
				$('#myBinderDiv').css('display', 'flex');
			}			
		}


		$('a[role=tab]').unbind('click');
        $('#' + $('ul[role=tabset] a[aria-selected=true]').attr('aria-controls')).show();
        $('a[role=tab]').bind('click', function(e) {
        	$('div[role=tabpanel]').hide();
			$('a[role=tab]').attr('aria-selected', 'false');
			if($(this).attr('aria-controls') === 'myBinderDiv') {
				$('#' + $(this).attr('aria-controls')).css('display', 'flex');
			}
        	$('#' + $(this).attr('aria-controls')).fadeIn();
        	$(this).attr('aria-selected', 'true');
        });	

		$('#role').bind('change', function(e) {
			script.roleEvent($(this).val());
		});	

		$('#secondaryrole').bind('change', function(e) {
			script.secRoleEvent($(this).val());
		});        

        $('.submit').bind('click', function(e) {
        	function validate(els) {
        		var bool = true;
        		$(els).each(function(i,v) {
        			if($(v).attr('aria-required') === 'true' && $(v).val() === "") {
        				bool = false;
        				$(v).attr('aria-invalid', 'true');
        				$('#' + $(v).attr('aria-describedby')).show();
        			} else {
        				$(v).attr('aria-invalid', 'false');
        				$('#' + $(v).attr('aria-describedby')).hide();
        			}
        		});
        		if(!bool) {
        			$('*[aria-invalid=true]').eq(0).focus();
        		}
        		return bool;
        	}
        	var els = document.querySelectorAll(['input', 'select', 'textarea']);
        	var validated = validate(els);
			var priRoleBio = {},
				secRoleBio = {},
				priElements = $('#primaryRoleInfo').find('input:visible, select:visible, textarea:visible'),
				secElements = $('#secondaryRoleInfo').find('input:visible, select:visible, textarea:visible');
			for(var i=0; i<priElements.length; i++) {
				var label = priElements[i].getAttribute('data-label');
				priRoleBio[label] = priElements[i].value;
			}

			for(var i=0; i<secElements.length; i++) {
				var label = secElements[i].getAttribute('data-label');
				secRoleBio[label] = secElements[i].value;				
			}

			var dataObj = {
			    	'firstname': $('#firstname').val(),
			    	'lastname': $('#lastname').val(),
			    	'city': $('#city').val(),
			    	'phone': $('#phone').val(),
			    	'bio': $('#bio').val(),
			    	'role': $('#role').val(),
			    	'secondaryrole': $('#secondaryrole').val(),
			    	'exec_profile': $('#exec_profile').val(),
			    	'reel': $('#reel').val(),
			    	'personalsite': $('#personalsite').val(),
			    	'prirolebio': JSON.stringify(priRoleBio),
			    	'secrolebio': JSON.stringify(secRoleBio)
			    };
			if(validated) {
				if(script.found) {
					script.updateProfile(dataObj, '/sandbox/services/set/updateMemberInfo.php');
				} else {
					script.updateProfile(dataObj, '/sandbox/services/set/addMemberInfo.php');
				}
			}
        });
	},

	roleEvent: function(val) {
		if(val === "actor" || val === "actress") {
			$('#primaryRoleInfo .role_info').hide();
			$('#primaryRoleInfo #actorInfo').fadeIn();
		} else if (val === "writer" || val === "director" || val === "cinematographer" || val === "editor" || val === "assistantdirector" || val === "producer") {
			$('#primaryRoleInfo .role_info').hide();
			$('#productionInfo').fadeIn();
		} else if (val === "music" || val === "sound") {
			$('#primaryRoleInfo .role_info').hide();
			$('#soundInfo').fadeIn();
		} else if (val === "locations" || val === "") {
			$('#primaryRoleInfo .role_info').hide();
			$('#otherInfo').fadeIn();
		} else {
			$('#primaryRoleInfo .role_info').hide();
		}
	},

	secRoleEvent: function(val) {
		if(val === "actor" || val === "actress") {
			$('#secondaryRoleInfo .role_info').hide();
			$('#secondaryRoleInfo #sec_actorInfo').fadeIn();
		} else if (val === "writer" || val === "director" || val === "cinematographer" || val === "editor" || val === "assistantdirector" || val === "producer") {
			$('#secondaryRoleInfo .role_info').hide();
			$('#sec_productionInfo').fadeIn();
		} else if (val === "music" || val === "sound") {
			$('#secondaryRoleInfo .role_info').hide();
			$('#sec_soundInfo').fadeIn();
		} else if (val === "locations" || val === "") {
			$('#secondaryRoleInfo .role_info').hide();
			$('#sec_otherInfo').fadeIn();
		} else {
			$('#secondaryRoleInfo .role_info').hide();
		}
	},

	drawBinder: function() {
		if(script.allUserData.uploads.length > 0) {
			$('#myBinderDiv div[role=alert]').hide();
			$(script.allUserData.uploads).each(function(i,v) {
				var filetype = v.filename.split('.')[1];
				if(v.category !== "") {
					var cat = $.parseJSON(v.category);
					if(cat.category !== "headshot" && cat.category !== "resource" && filetype === 'pdf') {
						var clone = $('#myBinderDiv .papers').eq(0).clone();
						$(clone).find('.title a span').text(v.title);
						$(clone).find('.title a').attr('href', '/sandbox/uploads/scripts/' + v.filename).attr('target', '_blank');
						$(clone).find('.byline').text(v.filename.split('.')[1]);
						$(clone).removeClass('none').appendTo('#myBinderDiv')
					}
				}
				
				if(filetype === 'png' || filetype === 'jpg' || filetype === 'jpeg' || filetype === 'gif') {
					script.drawPhotos(v);
				}				
			});
			if($('#myPhotosDiv .myPhotoGallery div').length === 0) {
				$('#myPhotosDiv .loader').hide();
				$('#myPhotosDiv div[role=alert]').fadeIn();
			} else {
				$('#myPhotosDiv .loader').hide();
				$('#myPhotosDiv .myPhotoGallery').fadeIn();
			}

		} else {
			$('#myPhotosDiv .loader').hide();
			$('#myPhotosDiv div[role=alert]').fadeIn();
		}
	},

	drawResources: function() {
		if(script.allUserData.resources.length > 0) {
			$('#myResourcesDiv div[role=alert]').hide();
			$(script.allUserData.resources).each(function(i,v) {
				var photo = $.parseJSON(v.photos),
					photoName = photo.name,
					filetype = photo.name.split('.')[1],
					href = '/sandbox/uploads/' + photoName;
				if(v.type === "location") {
					var iText = "landscape";
				} else {
					var iText = "camera_alt";
				}
				var clone = $('#myResourcesDiv ul.binderList li').eq(0).clone();
				$(clone).find('.binderLink i').text(iText);
				$(clone).find('.binderDetail').eq(0).text(v.name);
				$(clone).find('.binderDetail').eq(1).text(v.description);
				$(clone).find('.binderIcon a').attr('href', href);
				$(clone).show().appendTo('#myResourcesDiv .binderList');
			});
		}
	},

	drawPhotos: function(v) {
		if(v) {
			if(!v.filename) {
				if(v.plainname) {
					v.filename = $.parseJSON(v.photos).name;
				}
			}
			var div = $('<div />').appendTo('.myPhotoGallery'),
			img = $('<img />').attr('src', '/sandbox/uploads/' + v.filename).appendTo(div);
		}
	},

	drawFilms: function() {

	},

	drawPosts: function() {

	},

	getCurrentUser: function() {
	    $.ajax({
	        url: '/sandbox/services/get/getCurrentUser.php',
	        method: 'GET',
	        success: function(msg) {
	        	script.allUserData = $.parseJSON(msg);
	        	script.drawPhotos();
	        	script.drawPosts();
	        	script.drawFilms();
	        	script.drawBinder();
	        	script.drawResources();
	        },
	        error: function(e) {
	        	console.log(e);
	        }
	    });
	},

	populate: function() {
		var cur = script.userData[script.currentUser];
		if(cur['isAdmin'] !== "Y") {
			$('.exec').remove();
		}
		for(var x in cur) {
			if(x !== "headshot") {
				$('#' + x).val(cur[x]);
			}
			if(x === "role") {
				script.roleEvent(cur[x]);
				console.log(cur[x]);
				for(var y in cur['prirolebio']) {
					$('#primaryRoleInfo *[data-label=' + y + ']').val(cur['prirolebio'][y]);
				}
			} else if (x === 'secondaryrole') {
				script.secRoleEvent(cur[x]);
				for(var y in cur['secrolebio']) {
					$('#secondaryRoleInfo *[data-label=' + y + ']').val(cur['secrolebio'][y]);
				}
			}			
		}
	},

	updateProfile: function(data, url) {
		$.ajax({
		    data: data,
		    url: url,
		    method: 'POST',
		    success: function(msg) {
				if(msg === "Success") {
					location.reload();
				}	
		    },
		    error: function(msg){
		    	alert('Failed');
		    }
		});		
	}
}

$(document).ready(function(e) {
	script.runStart();
	script.getCurrentUser();
	function getData() {
		if(script.userData) {
			clearInterval(id);
			script.populate();
		}
	}
	var id = setInterval(getData, 10);
});