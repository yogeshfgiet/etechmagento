
$(function() {
    $(".link-reorder").click(function() {
        var element = $(this);
        var del_id = element.attr("id");
        var info = 'id=' + del_id;

        var baseUrl = window.location.href;
        var parent = $(this).parents('tr');

        if (confirm("Are you sure you want to delete this?"))
        {
            $.ajax({
                type: "POST",
                url: baseUrl + "index",
                data: info,
                success: function() {

                    parent.slideUp(300, function() {
                        parent.remove();
                    });

                }
            });


        }
        return false;


    });
});
$(function() {
    $('#slides').slides({
        preload: true,
        play: 5000,
        pause: 2500,
        hoverPause: true
    });

});


$(document).ready(function(){
    var thetimeout;
    $('#shop').mouseover(function() {
        clearTimeout(thetimeout);
        $('.subMenu').slideDown();
    });
    $('#shop').mouseleave(function() {
        thetimeout = setTimeout(function() {
            $('.subMenu').slideUp(800);
        });
    });
});

 $(function() {
$( "#slider-range" ).slider({
range: true,
min: 0,
max: 1000,
values: [ 75, 500 ],
slide: function( event, ui ) {
$( "#amount" ).val( "Rs   " + ui.values[ 0 ] + " - Rs" + ui.values[ 1 ] );
}
});
$( "#amount" ).val( "Rs" + $( "#slider-range" ).slider( "values", 0 ) +
" -     Rs" + $( "#slider-range" ).slider( "values", 1 ) );
});




