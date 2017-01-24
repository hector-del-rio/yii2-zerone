(function ($) {
    'use strict';

    $.fn.zoomImage = function () {
        var style = this.currentStyle || window.getComputedStyle(this, false);
        var url = style.backgroundImage.slice(4, -1).replace(/"/g, "");

        if (!url || $(this.parentNode).is('.zerone-image-container.empty')) {

            return;

        }

        window.open(url, '_blank');

    };

})(window.jQuery);