var script = {
	execArr:  [],
	execCount: 0,
	run: function() {
		$.ajax({
	        url: '/services/get/getAllExecInfo.php',
	        method: 'GET',
	        success: function(msg) {
				script.data = $.parseJSON(msg);
				script.execs = script.data.members;
				global.util._sortObject(script.execs, "username");
				script.minutes = script.data.minutes;
				$(script.execs).each(function(i,v) {
					$.ajax({
						url: '/services/get/getUser.php',
						method: 'GET',
						data: {"id": v.memberID},
						success: function(msg) {
							script.drawExec($.parseJSON(msg));
							script.execCount++;
							if(script.execCount === script.execs.length) {
								$('.r80 .loader').hide();
								$('.r80 .showHide').fadeIn();
							}							
						},
						error: function(e) {
							console.log(e);
						}
					});
				});
				$(script.minutes).each(function(i,v) {
					var ul = $('.eventList'),
						li = $('<li />').appendTo(ul),
						h3 = $('<h3 />').text(v.dateMet).appendTo(li),
						a = $('<a />').text('Link to minutes').appendTo(li);
					if(v.file !== "") {
						$(a).attr("href", "/uploads/scripts/" + v.file);
					} else {
						$(a).attr("href", v.link);
					}
					$(a).attr('target', '_blank');
					$('<span />').addClass('screen-reader-only').text(', opens in a new window').appendTo(a);
				});
				$('.r20 .loader').hide();
				$('.r80 .showHide').fadeIn();
				console.log(script.execArr);
			},
			error: function(e) {
				console.log(e);
			}
		});
	},

	drawExec: function(info) {
		if(info.meminfo.length > 0) {
			var $div = $('<div />').addClass('execMember').appendTo('#Executives .sectionContent');
			if(info.meminfo[0].headshot !== "") {
				var $avatar = $('<div />').addClass('avatar').css({
					'background': 'url("/uploads/' + info.meminfo[0].headshot + '") no-repeat',
					'background-position': 'top center',
					'background-size': 'cover'
				}).appendTo($div)
			} else {
				var $avatar = $('<div />').addClass('avatar').appendTo($div);
			}
			var $profileLink = $('<a />').attr({
					'href': '../profiles/?id=' + info.meminfo[0].memberID,
					'target': '_blank',
					'class': 'profileLink'
				}).text("View profile").appendTo($div),
				$h3 = $('<h3 />').text(info.meminfo[0].firstname + " " + info.meminfo[0].lastname).appendTo($div),
				$p = $('<p />').text(info.meminfo[0].exec_profile).appendTo($div)
		}
	}
}
$(document).ready(function(e){
	script.run();
})