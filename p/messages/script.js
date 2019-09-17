var script = {
	run: function() {
		script.getMessages();
		$('.rounded').bind('click', function(e) {
			global.dialog._open('sendMessage');
			global.dialog._closeAction = function(e) {
				$('#sendToMember').val('');
				$('.msgSearchResults').hide();
				$('#userMessageText').val('');
			}
		});

		$('#sendToMember').bind('keyup', function(e) {
			var val = $(this).val().toLowerCase();
			$('.msgSearchResults ul').html('');
			for(var x in script.userData) {
				var v = script.userData[x];
				var pn = v.plainname.toLowerCase();
				if(pn.indexOf(val) > -1) {
					$('.msgSearchResults').show();
					var li = $('<li />').attr({
						'tabindex': '0',
						'role': 'button',
						'aria-label': 'Send message to ' + v.plainname,
						'data-memberid': v.id,
						'data-pn': v.plainname
					}).addClass('msgSearchResultLi').appendTo('.msgSearchResults ul');
					var hs = $('<span />').addClass('searchHeadshot').css({
						'background': 'url("/uploads/' + v.headshot + '") 0% 0% / cover no-repeat'
					}).appendTo(li);
					var pnspan = $('<span />').text(v.plainname).appendTo(li);
					var badgespan = $('<span />').appendTo(li);
					global.util._addBadgesToUser(v,v, badgespan);
					$(li).bind('click', function(e) {
						var id = $(this).attr('data-memberid'),
							plnm = $(this).attr('data-pn');
						$('#sendToMember').attr('data-sendto', id);
						$('#sendToMember').val(plnm);
						$('.msgSearchResults').hide();
						$('.msgSearchResults ul').html('');
					});
				}
			}
		});

		$('.replyToMsg').bind('click', function(e) {
			$('.replyDiv').slideDown('slow');
		});

		$('.add').bind('click', function(e) {
			var data = {
				"sentTo": $('#sendToMember').attr('data-sendto'),
				"sent": new Date(),
				"message": $('#userMessageText').val(),
				"replies": "{}"
			}
			$.ajax({
				url: '../../services/set/userSendMessage.php',
				method: 'POST',
				data: data,
				success: function(msg) {
					if(msg === "Success") {
						global.dialog._close();
						script.getMessages();
					}
				},
				error: function(e) {
					console.log(e);
				}
			})
		});

		$('#sentMsgs').bind('click', function(e) {
			$('#recMsgs').attr('aria-selected', 'false');
			$(this).attr('aria-selected', 'true');
			$('#receivedMsgs').hide();
			$('#sentMsgsTable').fadeIn();
		});

		$('#recMsgs').bind('click', function(e) {
			$('#sentMsgs').attr('aria-selected', 'false');
			$(this).attr('aria-selected', 'true');
			$('#sentMsgsTable').hide();
			$('#receivedMsgs').fadeIn();
		});		
	},

	getMessages: function() {
		$('#receivedMsgs tbody tr').remove();
		$('#sentMsgsTable tbody tr').remove();
		$.ajax({
			url: '../../services/get/getUserMessages.php',
			method: 'GET',
			success: function(msg) {
				script.userMessages = $.parseJSON(msg);
				$(script.userMessages.received).each(function(i,v) {
					var tbody = $('#receivedMsgs tbody'),
						tr = $('<tr />').appendTo(tbody),
						chkCell = $('<td />').appendTo(tr),
						chkbox = $('<input />').attr({
							'type': 'checkbox',
							'aria-label': 'Select message from ' + script.userData[v.memberID].plainname,
							'id': 'msg_chk_' + i
						}).appendTo(chkCell),
						fromCell = $('<td />').text(script.userData[v.memberID].plainname).appendTo(tr),
						sentCell = $('<td />').text(global.util._formatJSDate(v.senton, true)).appendTo(tr),
						msgCell = $('<td />').text(v.messagetext.substring(0, 150)).appendTo(tr);
					if(v.toread === "N") {
						$(tr).addClass('unread');
					}
					$(tr).bind('click', function(e) {
						if(v.toread === "N") {
							var data = {
								"id": v.id,
								"toread": "Y"
							}
							$.ajax({
								url: '../../services/set/updateMessageAsRead.php',
								method: 'POST',
								data: data,
								success: function(msg) {
									console.log("AS READ: " + msg);
								},
								error: function(e) {
									console.log("AS READ: " + e);
								}
							});
							$(this).removeClass('unread');
							var len = $('#receivedMsgs tbody tr.unread').length;
							if(len === 0) {
								$('.unreadmessages').remove();
							}
						}
						$('div[data-dialog-id=readmessage] .fromheadshot').css({
							'background': 'url("/uploads/' + script.userData[v.memberID].headshot + '")  0% 0% / cover no-repeat'
						});
						$('div[data-dialog-id=readmessage] .fromname').text(script.userData[v.memberID].plainname);
						$('div[data-dialog-id=readmessage] .msgdetails').text(global.util._formatJSDate(v.senton, true));
						$('div[data-dialog-id=readmessage] p').text(v.messagetext);
						global.dialog._open('readmessage');
						global.dialog._closeAction = function() {
							$('div[data-dialog-id=readmessage] p').text('');
							$('.replyDiv').hide();
							console.log('closed message dialog');
						}
					})
				});

				$(script.userMessages.sent).each(function(i,v) {
					var tbody = $('#sentMsgsTable tbody'),
						tr = $('<tr />').appendTo(tbody),
						chkCell = $('<td />').appendTo(tr),
						chkbox = $('<input />').attr({
							'type': 'checkbox',
							'aria-label': 'Select message to ' + script.userData[v.memberID].plainname,
							'id': 'msg_chk_' + i
						}).appendTo(chkCell),
						fromCell = $('<td />').text(script.userData[v.sentTo].plainname).appendTo(tr),
						sentCell = $('<td />').text(global.util._formatJSDate(v.senton, true)).appendTo(tr),
						msgCell = $('<td />').text(v.messagetext.substring(0, 150)).appendTo(tr);
					if(v.toread === "N") {
						$(tr).addClass('unread');
					}
				});				
			},
			error: function(e) {
				console.log(e);
			}
		})
	}
}

$(document).ready(function(e) {
	function getData() {
		if(script.userData) {
			clearInterval(id);
			script.run();
		}
	}
	var id = setInterval(getData, 10);
});