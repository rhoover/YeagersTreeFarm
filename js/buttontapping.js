(function($) {
    $.event.special.tap = {
        setup: function(data, namespaces) {
            var $elem = $(this);
            $elem.bind('touchstart', $.event.special.tap.handler)
                 .bind('touchmove', $.event.special.tap.handler)
                 .bind('touchend', $.event.special.tap.handler);
        },

        teardown: function(namespaces) {
            var $elem = $(this);
            $elem.unbind('touchstart', $.event.special.tap.handler)
                 .unbind('touchmove', $.event.special.tap.handler)
                 .unbind('touchend', $.event.special.tap.handler);
        },

        handler: function(event) {
            event.preventDefault();
            var $elem = $(this);
            $elem.data(event.type, 1);
            if (event.type === 'touchend' && !$elem.data('touchmove')) {
                // set event type to "tap"
                event.type = 'tap';
                // let $ handle the triggering of "tap" event handlers
                $.event.handle.apply(this, arguments);
            } else if ($elem.data('touchend')) {
                // reset our data attributes because our event is over
                $elem.removeData('touchstart touchmove touchend');
            }
        }
    };

//specific to menu button
$('#mobilemenubutton').bind('tap click', function() {
    $('.mainmenu').slideToggle();
});

//specific to back button
$('#backbutton').bind('tap click', function() {
    history.back();
});

})(jQuery);

