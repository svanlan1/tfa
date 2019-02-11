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
        $('.filmposter img').attr('src', '/sandbox/uploads/' + r.thisReview.image);
        $('.sectionContent h3').text(r.thisReview.title);
        $('#director span').text(r.thisReview.director);
        $('<a />').attr({
            'href': r.thisReview.trailer,
            'target': '_blank'
        }).text(r.thisReview.trailer).appendTo($('#trailer span'));
        $('#updated span').text(global.util._formatJSDate(r.thisReview.updated));
        var charges = $.parseJSON(r.thisReview.charges);
        var defenses = $.parseJSON(r.thisReview.defenses);
        $(charges).each(function(i,v) {
            $('<dt />').text('Charge ' + parseFloat(i+1)).appendTo('.charges dl');
            $('<dd />').html(v).appendTo('.charges dl');
        });
        $(defenses).each(function(i,v) {
            $('<dt />').text('Defense ' + parseFloat(i+1)).appendTo('.defenses dl');
            $('<dd />').html(v).appendTo('.defenses dl');
        });
        $('.closingarguments p').html(r.thisReview.closingarguments);
    }
}
$(document).ready(function(e){
    
    // r.run();
});