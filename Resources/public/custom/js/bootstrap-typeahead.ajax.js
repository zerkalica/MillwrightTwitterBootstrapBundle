(function($) {
    var typeahead = $.fn.typeahead;

    $.extend(typeahead.defaults, {
        url: null,
        ajaxParams: null
    });

    typeahead.defaults.source = {
        source: function(typeahead, query) {
            var url = this.options.url||this.$element.attr('data-url');

            if (url) {
                var params  = (typeof this.options.ajaxParams == "function") ? this.options.ajaxParams() : this.options.ajaxParams;

                $.extend(true, params, {
                    autocomplete: {
                        data: query
                    }
                });
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: params,
                    success: function(data, textStatus, jqXHR) {
                        typeahead.process(data);
                    }
                });
            }
        }
    };
}(jQuery));
