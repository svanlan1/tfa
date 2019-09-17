$(document).ready(function(e) {
    $('#addField').bind('click', function(e) {
        var newLen = $('input[data-param]').length;
        var d1 = $('<div />').addClass('half').appendTo('.parameters'),
            d2 = $('<div />').addClass('half').appendTo('.parameters'),
            in1 = $('<input />').attr({
                'type': 'text',
                'aria-label': 'Paramter ' + newLen,
                'data-param': newLen,
                'placeholder': "Param " + newLen
            }).appendTo(d1),
            in2 = $('<input />').attr({
                'type': 'text',
                'aria-label': 'Value ' + newLen,
                'data-value': newLen,
                'placeholder': "Value " + newLen
            }).appendTo(d2);
    })

    getData = function() {
        var dataobj = {};
        $('.parameters div.half').each(function(i,v) {
            var p = $(v).find('input[data-param=' + i + ']').val(),
                val = $(v).find('input[data-value=' + i + ']').val();
            dataobj[p] = val;
        });
        return dataobj;
    }


    $('.test').bind('click', function(e) {
        $.ajax({
            url: '/services/' + $('#type').val() + '/' + $('#address').val(),
            method: $('#type').val().toUpperCase(),
            data: getData,
            success: function(msg) {
                $('#results').text(msg);
            },
            error: function(e){
                $('#results').text(e);
            }
        });
    });
});