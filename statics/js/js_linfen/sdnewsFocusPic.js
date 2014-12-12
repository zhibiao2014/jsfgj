/*jilei.liu*/

function Tab(hot, container, on_class) {
    on_class = on_class || 'on';
    hot.mouseenter(function() {
        var i = $(this).index();
        $(this).parent().children().not($(this).addClass(on_class)).removeClass(on_class);
        container.not($(container.get(i)).show()).hide();
    });
}

//autoSlide
function autoSlide(tabs, targets, delay, on_class) {
    delay = delay || 3000;
    on_class = on_class || 'on';
    var num = targets.length;
    function slide() {
        var i = tabs.index(tabs.parent().find('.' + on_class + ''));
        return window.setInterval(function() {
            if (i == num) { i = 0; }
            tabs.not($(tabs.get(i)).addClass(on_class)).removeClass(on_class);
            targets.not($(targets.get(i)).show()).hide();
            i++;
        }, delay);
    }
    var auto = slide();
    targets.hover(function() {
        auto = clearInterval(auto);
    }, function() {
        auto = slide();
    });
    tabs.hover(function() {
        auto = clearInterval(auto);
    }, function() {
        auto = slide();
    });
}

Tab($('.showtab a'), $('.show_box .showpic'));
autoSlide($('.showtab a'), $('.show_box .showpic'));