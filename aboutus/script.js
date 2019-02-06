var script = {
	execArr:  [],
	run: function() {
		$.ajax({
	        url: '/sandbox/services/get/getAllExecInfo.php',
	        method: 'GET',
	        success: function(msg) {
				script.execs = $.parseJSON(msg).members;
				$(script.execs).each(function(i,v) {
					$.ajax({
						url: '/sandbox/services/get/getUser.php',
						method: 'GET',
						data: {"id": v.memberID},
						success: function(msg) {
							script.drawExec($.parseJSON(msg));
						},
						error: function(e) {
							console.log(e);
						}
					});
				});
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
					'background': 'url("/sandbox/uploads/' + info.meminfo[0].headshot + '") no-repeat',
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