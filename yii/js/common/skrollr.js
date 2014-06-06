var animateStart = function() {
    var isUglyIe = $.browser.msie && $.browser.version <= 8,
        isIphone = navigator.userAgent.toLowerCase().indexOf('iphone') > 0,
        isIpad = navigator.userAgent.toLowerCase().indexOf('ipad') > 0,
        isAndroid = navigator.userAgent.indexOf('Android') >= 0,
        isMobile = isIphone || isIpad || isAndroid;

    // if using mobile or ugly ie, stop the animation
    if(isUglyIe || isMobile) return;

    $('[' + "data-animate" + ']')
        .each(function() {
            var $dom = $(this);
            var tar = $dom.data('animate');
            var browser = $dom.data('browser');
            var style = $dom.data('style');
            var time = parseInt($dom.data('time'));
            var delay = $dom.data('delay') || 0;
            var easing = $dom.data('easing');
            var begin = $dom.data('begin');
            tar = tar.split(';');
            var tarCss = {}, tmp;

            for (var i = tar.length - 1; i >= 0; i--) {
                tmp = tar[i].split(':');
                if (tmp.length == 2)
                    tarCss[tmp[0]] = $.trim(tmp[1]);
            }

            style = style.split(';');
            var styleCss = {}, tmp;
            for (var i = style.length - 1; i >= 0; i--) {
                tmp = style[i].split(':');
                if (tmp.length == 2)
                    styleCss[tmp[0]] = $.trim(tmp[1]);
            }

            $dom.css(styleCss).delay(delay)
                .animate(tarCss, time, easing);
            if (begin) {
                setTimeout(function() {
                    animation_begins[begin].call($dom);
                }, delay);
            }
        });

    skrollr.init({
        smoothScrollingDuration: 200,
        smoothScrolling: true,
        forceHeight: false
    })
}
