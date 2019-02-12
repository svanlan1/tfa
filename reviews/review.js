var r = {
    thisReview: {},
    run: function() {
        console.log('individual film review');
        r.id = window.location.href.split('?id=')[1];
        $(script.filmcourt).each(function(i,v) {
            if(v.id === r.id) {
                r.thisReview = v;
                return false;
            }
        });
        r.drawReview();
    },

    drawReview: function() {
        console.log(r.thisReview);
        $('#title').text(r.thisReview.title);
        $('#director').text(r.thisReview.director);
        $('<a />').attr({
            'href': r.thisReview.trailer,
            'target': '_blank',
            'aria-label': "Link to trailer for " + r.thisReview.title            
        }).text("Link").appendTo($('#trailer'));
        $('#updated').text(global.util._formatJSDate(r.thisReview.updated));
        $('#image').css({
            'background': "url('/sandbox/uploads/" + r.thisReview.image + "') 0% 0% / cover no-repeat"
        });
        $('#summary').text($(r.thisReview.summary).text());
        var charges = $.parseJSON(r.thisReview.charges);
        var defenses = $.parseJSON(r.thisReview.defenses);
        $(charges).each(function(i,v) {
            var li = $('<li />').appendTo('#charges'),
                h3 = $('<h3 />').text("Charge " + parseFloat(i+1) + ":  " + $(v).text()).appendTo(li),
                div = $('<div />').text($(defenses[i]).text()).appendTo(li);
        });
        $('#closingarguments').html(r.thisReview.closingarguments);
        $('.loader').hide();
        $('.sectionContent').fadeIn();
    }
}
$(document).ready(function(e){
    
    // r.run();
});