$(document).ready(function() {
    var aImgs = $('#mycarousel li img');

    $('#mycarousel').jcarousel({
        wrap: 'circular'
    });

    aImgs.live({
        'mouseenter':function(){
            aImgs.css({
                'opacity' : 0.7
            })

            $(this).css({
                'opacity' : 1
            })
        },
        'mouseleave':function(){
            aImgs.css({
                'opacity' : 1
            })
        }
    })
})
