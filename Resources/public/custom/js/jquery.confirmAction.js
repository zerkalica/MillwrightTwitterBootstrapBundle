(function($) {

    $.fn.confirmAction = function(settings) {
        var options = $.extend({}, $.fn.confirmAction.defaults, settings);

        return $(this).bind('click', (function() {
            var link    = $(this);
            var title   = link.attr('title');
            var message = title ? title : 'Вы уверены';
            var ok      = confirm(message + ' ?');
            if (ok) {
                var url = link.attr('href');
                $.ajax({
                    url: url,
                    data: options.ajaxParams,
                    success: function(responseText, textStatus, XMLHttpRequest) {
                        options.onOk();
                    }
                });
            } else {
                options.onCancel();
            }

            return false;
        }));
    };

    $.extend($.fn.confirmAction, {
        defaults: {
            ajaxParams: {
                approve: 1,
                format: 'json'
            },
            onOk: function() {

            },
            onCancel: function() {

            }
        }
    });

}(jQuery));
