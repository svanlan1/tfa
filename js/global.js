var global = {
	run: function() {
		global.ticker._getTickerData();
		global.setEvents();
		var num = parseFloat(window.location.href.split('/').length - 2),
			page = window.location.href.split('/')[num];
		switch(page) {
			case 'aboutus':
				break;
			case 'films':
				if(window.location.href.indexOf('/p/films') === -1) {
					global.films._events();
					global.films._get();
				}
				break;
			case 'wam':
				break;
			case 'slingshot':
				break;
			case 'events':
				break;
			case 'reviews':
				global.reviews._get();
				break;
			case 'login':
				global.login._events();
				break;
			case 'register':
			default:
				break;
		}
	},

	setEvents: function() {
		$('.hasSubmenu').bind('click', function(e) {
			if($(this).find('a').eq(0).attr('aria-expanded')) {
				$('ul.submenu').slideUp('fast');
				$('nav a[aria-expanded]').attr('aria-expanded', 'false');
			}
			var sm = $(this).find('ul.submenu'),
				ex = $(this).find('a').eq(0).attr('aria-expanded'),
				run = true;
			if(global.previouslyClicked) {
				if($(this).is(global.previouslyClicked)) {
					run = false;
				}
			}
			global.previouslyClicked = $(this);
			if(run) {
				if(ex === "false") {
					console.log($(this));
					$(this).find('a').eq(0).attr('aria-expanded', 'true');
					$(sm).slideDown();
				} else {
					// $(this).find('a').eq(0).attr('aria-expanded', 'false');
					$('nav a[aria-expanded]').attr('aria-expanded', 'false');
					$(sm).slideUp();
					$('div[role=banner], main').unbind('click');
				}
			} else {
				run = true;
				global.previouslyClicked = false;
			}
		});

		$('div[role=banner], main').bind('click', function(e) {
			$('ul.submenu').slideUp('fast');
			$('nav a[aria-expanded]').attr('aria-expanded', 'false');	
			$(global.previouslyClicked = $(this));				
		});		

		$('.popover').bind('mouseover focus', function(e) {
			var container = $('<div />').attr({
				'role': 'tooltip',
				'aria-label': $(this).attr('data-title')
			}).addClass('tooltip').text($(this).attr('data-text'));
			if(e.type === "focus") {
				$(container).css({
					'left': $(this).offset().left + 70,
					'top': $(this).offset().top
				}).appendTo('body');
			} else {
				$(container).css({
					'left': e.pageX + 20,
					'top': e.pageY
				}).appendTo('body');
			}
		}).bind('mouseout blur', function(e) {
			$('.tooltip').remove();
		});	

		$('a.search').bind('click', function(e) {
		    var searchValue = $('a.search').next().val();
		    if(searchValue !== "") {
		    	global.search._get(searchValue);
		    	$('a.search').next().val('');
		    }		
		});
		$('input[type=search]').bind('keypress', function(e) {
			var kp = e.which;
			if(kp === 13 && $(this).val() !== "") {
				global.search._get($(this).val());
				$(this).val('');
			}
		});
		$('a.closeDialog').bind('click', function(e) {
			global.dialog._close();
		});

		$('a.photoGallery').bind('click', function(e) {
			var ex = $(this).attr('aria-expanded');
			if(ex === "true") {
				$(this).attr('aria-expanded', 'false');
				$(this).find('i').text('add_circle_outline');
				$('.photoSection').slideUp('fast');
			} else {
				$(this).attr('aria-expanded', 'true');
				$(this).find('i').text('remove_circle_outline');
				$('.photoSection').slideDown('fast');				
			}
		});

		$('.closeReminder').bind('click', function(e) {
			$('#' + $(this).attr('data-close')).hide();
			localStorage.setItem('headshotReminderToggle', 'Y')
			$('.reminderModal').fadeOut();
		})

		$('.fileUpload').bind('click', function(e) {
			$(this).prev().click();
		});

		$('#article_user .tfa_headshot').bind('click', function(e) {
			global.dialog._open('headshot');
		});

		$('#headshot').bind('change', function(e) {
			var tempImage = document.querySelector('div[data-dialog-id=headshot] input[type="file"]').files[0];
			function getBase64(file) {
			   var reader = new FileReader();
			   reader.readAsDataURL(file);
			   reader.onload = function () {
			     // console.log(reader.result);
			     $('div[data-dialog-id=headshot] .fileUpload span').text(tempImage.name);
			   };
			   reader.onerror = function (error) {
			     console.log('Error: ', error);
			   };
			}

			var file = document.querySelector('div[data-dialog-id=headshot] input[type="file"]').files[0];
			getBase64(file);
		});

		$('.changeHeadshot').bind('click', function(e) {
			if(script.found) {
				$('div[role=document]').hide();
				$('div[data-dialog-id=headshot] div.loader').fadeIn();
				var file_data = document.querySelector('input[type="file"]').files[0];   
				var form_data = new FormData();                  
				form_data.append('file', file_data); 
				var options = {
					"category": "headshot"
				}
				form_data.append('category', JSON.stringify(options));
				if(file_data) {
					$.ajax({
					    url: '/sandbox/services/set/imageUploadProfilePic.php', // point to server-side PHP script 
					    dataType: 'text',  // what to expect back from the PHP script, if anything
					    cache: false,
					    contentType: false,
					    processData: false,
					    data: form_data,                         
					    type: 'post',
					    success: function(msg){
					    	try {
					    		var parsed = $.parseJSON(msg);
					    		// console.log(parsed.Error);
					    		$('.errorText h3 span').text(parsed.Error);
					    		$('.errorText p').text(parsed['longDesc']);
					    		$('.errorText').show();
								$('div[data-dialog-id=headshot] div.loader').hide();
								$('div[role=document]').fadeIn();					    		
					    	} catch(e) {
					    		localStorage.setItem('tfa_headshot', msg);
								$('#article_user .tfa_headshot, .addComment .tfa_headshot').css({
									'background': 'url("/sandbox/uploads/' + localStorage.getItem('tfa_headshot') + '") no-repeat',
									'background-size': 'cover'
								});	
								post.getCurrentUserUploads();
								global.dialog._closeAction = function() {
									console.log('Successfully changed headshot.');
								}
								global.dialog._close();
					    	}
					    },
					    error: function(e) {
					    	console.log(e);
					    }
					 });
				}
			} else {
				alert('Update your profile first, you heathen.');
			}		
		});	

		$('.expandSection').bind('click', function(e) {
			var x = $(this).attr('aria-expanded'),
				c = $(this).attr('aria-controls');
			if(x === "false") {
				$('#' + c).slideDown('fast');
				$(this).attr('aria-expanded', 'true');
				$(this).find('i').text('remove_circle_outline');
			} else {
				$('#' + c).slideUp('fast');
				$(this).attr('aria-expanded', 'false');				
				$(this).find('i').text('add_circle_outline');
			}
		});
	},

	chooseHeadshotFromUploads: function(fn) {
	    var data = {
	    	'profilepic': fn
	    };

	    $.ajax({
	        data: data,
	        url: '/sandbox/services/set/updateHeadshot.php',
	        method: 'POST',
	        success: function(msg) {
				global.dialog._closeAction = function() {
					$('#headshot').val('');
				}
	    		localStorage.setItem('tfa_headshot', fn);
				$('#article_user .tfa_headshot, .addComment .tfa_headshot').css({
					'background': 'url("/sandbox/uploads/' + localStorage.getItem('tfa_headshot') + '") no-repeat',
					'background-size': 'cover'
				});					
				global.dialog._close();
	        },
	        error: function(e) {

	        }
	    });
	},

	uploadImage: function(file, category, successFn, title) {
		var file_data = file[0].files[0];   
		var form_data = new FormData();                  
		form_data.append('file', file_data);
		form_data.append('title', title); 
		var options = {
			"category": category
		}
		form_data.append('category', JSON.stringify(options));
		if(file_data) {
			$.ajax({
			    url: '/sandbox/services/set/imageUpload.php',
			    dataType: 'text',
			    cache: false,
			    contentType: false,
			    processData: false,
			    data: form_data,                         
			    type: 'post',
			    success: function(msg){
			    	successFn(msg);
			    	return msg;
			    },
			    error: function(e) {
			    	console.log(e);
			    	return "ERROR";
			    }
			 });
		} else {
			return "ERROR";
		}
	},

	dialog: {
		_set: function() {
			$('body').bind('keydown', function(e) {
				var kp = e.which;
				if(kp === 27) {
					global.dialog._close();
				}
			});
		},

		_unset: function() {
			$('body').unbind('click keypress');
		},

		_open: function(id) {
			$('.modal').show();
			$('div[data-dialog-id=' + id + ']').fadeIn('fast');
			window.scroll({
			  top: 10, 
			  left: 0, 
			  behavior: 'smooth'
			});			
			global.dialog._set();
		},

		_close: function() {
			$('.dialog').hide();
			$('.modal').fadeOut();
			global.dialog._unset();
			global.dialog._closeAction();
			global.dialog._closeAction = "";
		}
	},

	films: {
		_events: function() {

		},

		_get: function() {
		    $.ajax({
		        url: '/sandbox/services/get/getFilms.php',
		        method: 'GET',
		        success: function(msg) {
		        	global.films.results = $.parseJSON(msg);
		        	console.log(global.films.results);
		        	global.films._draw();
		        },
		        error: function(e) {
		        	console.log(e);
		        }
		    });
		},
		_set: function() {

		},
		_draw: function() {
			$(global.films.results).each(function(i,v) {
				if(v.tfa_category === "na" || v.tfa_category === "" || v.tfa_category === "slingshot") {
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
				}
			});
			$('div.film').eq(0).remove();
		}
	},

	reviews: {
		_get: function() {
			console.log("This is the films review page");
		}
	},

	login: {
		_events: function() {
			document.getElementsByClassName('login')[0].addEventListener("click", function() {
				function validate() {
					var username = document.getElementById('username'),
						usernameError = document.getElementById('usernameErrorMsg'),
						password = document.getElementById('password'),
						passwordError = document.getElementById('passwordErrorMsg');
					if(username.value !== "" && password.value !== "") {
						return true;
					} else {
						if(username.value === "") {
							username.setAttribute('aria-invalid', 'true');
							usernameError.style.display = "block";
						} else {
							username.setAttribute('aria-invalid', 'false');
							usernameError.style.display = "none";
						}
						if(password.value === "") {
							password.setAttribute('aria-invalid', 'true');
							passwordError.style.display = "block";
						} else {
							password.setAttribute('aria-invalid', 'false');
							passwordError.style.display = "none";
						}
						return false;
					}
				}

				function login() {
					$.ajax({
					    data: {
					    	'username': $('#username').val(),
					    	'password': $('#password').val()
					    },
					    url: '/sandbox/services/core/login.php',
					    method: 'POST',
					    success: function(msg) {
							window.location.href = "/sandbox/p/home/";
					    },
					    error: function(e) {
					    	alert('failure');
					    	console.log(e);
					    }
					});					
				}




				if(validate()) {
					login();
				} else {
					document.querySelector('input[aria-invalid=true]').focus();
				}
			});
			$('input').bind('keydown', function(e) {
				if(e.which === 13) {
					$('.login').click();
				}
			})
		}
	},

	search: {
		_get: function(searchValue) {
		    $.ajax({
		        url: '/sandbox/services/get/searchAll.php',
		        data: {
		        	'search': searchValue
		        },
		        method: 'POST',
		        success: function(msg) {
		        	localStorage.setItem('searchResults', msg);
		        	global.search._display();
		        },
		        error: function(e) {
		        	console.log(e);
		        }	
	        });
		},

		_display: function() {
			var res = $.parseJSON(localStorage.getItem('searchResults'));
			console.log(res);
			localStorage.setItem('searchResults', '');
			global.dialog._open('search');
			
			var resultsLength = parseFloat(res[0].length) + parseFloat(res[1].length);
			$('.dialog .byline').text(resultsLength + ' total results');
			if(res[0].length > 0 || res[1].length > 0) {
				$('.dialog .results .members').show();
				$([res[0], res[1]]).each(function(i,v) {
					$(v).each(function(j,k) {
						$('<li />').text(k.memberID).appendTo('.results .members ul');
					});
				});
			}

			global.dialog._closeAction = function() {
				$('div[data-dialog-id=search] ul').html('');
				$('.dialog .byline').text('');
				$('.dialog .results div').hide();
			}

			$('.loader').hide();
			$('.dialog .showHide').fadeIn();
		}
	},

	ticker: {
		_getTickerData: function() {
			$.ajax({
				url: '/sandbox/services/get/getTicker.php',
				method: 'GET',
				success: function(msg) {
					global.ticker.text = $.parseJSON(msg)[0]['text'];
					$('#socialMedia span').text(global.ticker.text);
				},
				error: function(e) {
					console.log(e);
				}
			});
		}
	},

	util: {
		_generateRandomNumber(number) {
			return Math.floor((Math.random() * number) + 1);
		},

		_formatJSDate: function(dateValue, timeBool) {
			if(dateValue !== "") {
				var splits = dateValue.split(' '),
					day = splits[0],
					month = splits[1],
					date = splits[2],
					year = splits[3],
					ts = splits[4].split(':'),
					time = ts[0] + ":" + ts[1],
					ampm = "am";
				if(parseFloat(ts[0] - 12) > 0) {
					ampm = "pm";
					time = parseFloat(ts[0]-12) + ":" + ts[1];
				}
				if(!timeBool) {
					return month + ' ' + date + ', ' + year;
				} else {
					return month + ' ' + date + ', ' + year + ' at ' + time + ampm;
				}
			}
		},

		_formatPHPDate: function(dateValue, timeBool) {
			var mons = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
			
			if(dateValue && dateValue !== "") {
				var spl = dateValue.split(' '),
					dt = spl[0],
					dts = dt.split('-'),
					tt = spl[1],
					tts = tt.split(':'),
					mon = parseFloat(dts[1]) - 1,
					ampm = "am";
				if(parseFloat(tts[0]) > 12) {
					ampm = "pm";
					tts[0] = parseFloat(tts[0]) - 12;
				} else if (tts[0] === "12") {
					ampm = "pm";
				}
				if(timeBool) {
					return 'on ' + mons[mon] + ' ' + dts[2] + ', ' + dts[0] + ' at ' + tts[0] + ':' + tts[1] + ampm;
				} else {
					return 'on ' + mons[mon] + ' ' + dts[2] + ', ' + dts[0]
				}
				
			}
		},

		_addBadgesToUser: function(meminfo, member, element) {
			
			if(member.isAdmin === 'Y') {
				$('<img />').attr({
					'src': '/sandbox/images/exec.svg',
					'alt': 'Film Alliance Executive',
					'title': 'Film Alliance Executive'
				}).appendTo(element);
			}

			if(member.isReviewer === 'Y') {
				$('<img />').attr({
					'src': '/sandbox/images/law.svg',
					'alt': 'Film Court Associate',
					'title': 'Film Court Associate'
				}).appendTo(element);
			}

			if(meminfo.role === "director" || meminfo.secondaryrole === "director") {
				$('<img />').attr({
					'src': '/sandbox/images/director.svg',
					'alt': 'Director',
					'title': 'Director'
				}).appendTo(element);
			}

			if(meminfo.slingshot === "Y") {
				$('<img />').attr({
					'src': '/sandbox/images/slingshot-badge.svg',
					'alt': 'Slingshot',
					'title': 'Slingshot'
				}).appendTo(element);
			}

			if(meminfo.role === 'actor' || meminfo.secondaryrole === 'actor' || meminfo.role === 'actress' || meminfo.secondaryrole === 'actress') {
				$('<img />').attr({
					'src': '/sandbox/images/theatre.svg',
					'alt': 'Thespian',
					'title': 'Thespian'
				}).appendTo(element);		    					
			}

			if(meminfo.role === "writer" || meminfo.secondaryrole === "writer") {
				$('<img />').attr({
					'src': '/sandbox/images/writer.svg',
					'alt': 'Writer',
					'title': 'Writer'
				}).appendTo(element);		    					
			}

			if(meminfo.role === "editor" || meminfo.secondaryrole === "editor") {
				$('<img />').attr({
					'src': '/sandbox/images/editor.svg',
					'alt': 'Editor',
					'title': 'Editor'
				}).appendTo(element);		    					
			}	

			if(meminfo.role === "sound" || meminfo.secondaryrole === "sound" || meminfo.role === "music" || meminfo.secondaryrole === "music") {
				$('<img />').attr({
					'src': '/sandbox/images/sound.svg',
					'alt': 'Musician',
					'title': 'Musician'
				}).appendTo(element);		    					
			}	

			if(meminfo.role === "producer" || meminfo.secondaryrole === "producer") {
				$('<img />').attr({
					'src': '/sandbox/images/producer.svg',
					'alt': 'Producer',
					'title': 'Producer'
				}).appendTo(element);		    					
			}

		},

		_buildOneUserObject: function(member, meminfo) {
			var v = meminfo,
				k = member,
				prb = "",
				srb = "";
			if(v.prirolebio !== "") {
				prb = $.parseJSON(v.prirolebio);
			}
			if(v.secrolebio !== "") {
				srb = $.parseJSON(v.secrolebio);
			}				
			memberObj = {
				'id': v.memberID,
				'firstname': v.firstname,
				'lastname': v.lastname,
				'bio': v.bio,
				'email': k.email,
				'username': k.username,
				'headshot': v.headshot,
				'city': v.city,
				'isAdmin': k.isAdmin,
				'isReviewer': k.isReviewer,
				'role': v.role,
				'prirolebio': prb,
				'secondaryrole': v.secondaryrole,
				'secrolebio': srb,
				'personalsite': v.personalsite,
				'reel': v['reel'],
				'phone': v.phone,
				'exec_profile': v.exec_profile,
				'plainname': v.firstname + ' ' + v.lastname,
				'slingshot': v.slingshot
			};
			return memberObj;
		},

		_buildCompleteUserObject: function(data) {
			var members = data.members,
				memInfo = data.meminfo,
				memberObj = {},
				found = false;
			$(memInfo).each(function(i,v) {
				var id = v.memberID;
				if(id === script.currentUser) {
					found = true;
					if(v.headshot !== "") {
						localStorage.setItem('tfa_headshot', v.headshot);
					}
					$('#article_user h3').eq(1).find('span').eq(0).text(v.firstname + ' ' + v.lastname);
				}
				$(members).each(function(j,k) {
					if(k.memberID === id) {
						var prb = "",
							srb = "";
						if(v.prirolebio !== "") {
							prb = $.parseJSON(v.prirolebio);
						}
						if(v.secrolebio !== "") {
							srb = $.parseJSON(v.secrolebio);
						}
						memberObj[id] = {
							'id': v.memberID,
							'firstname': v.firstname,
							'lastname': v.lastname,
							'bio': v.bio,
							'email': k.email,
							'username': k.username,
							'headshot': v.headshot,
							'city': v.city,
							'isAdmin': k.isAdmin,
							'isReviewer': k.isReviewer,
							'role': v.role,
							'prirolebio': prb,
							'secondaryrole': v.secondaryrole,
							'secrolebio': srb,
							'personalsite': v.personalsite,
							'reel': v['reel'],
							'phone': v.phone,
							'exec_profile': v.exec_profile,
							'plainname': v.firstname + ' ' + v.lastname,
							'slingshot': v.slingshot
						};
						if(id === script.currentUser) {
							global.util._addBadgesToUser(v,k,$('#article_user h3').eq(1).find('span').eq(1));
						}

					}
					if(found) {
						script.found = true;
					}
				});
			});
		if(!script.found) {
			$('#notification').fadeIn('slow');
			script.found = false;
		} else {
			$('#notification').hide();
			script.found = true;
		}	    	
		/** User Navigation Fillings **/
		post.headshot();
		if($('#article_user h3').eq(0).text() === "") {
			$('#article_user h3').eq(0).text('Guest');
		}
		return memberObj;
		}
	}
}
$(document).ready(function(e) {
	global.run();
});