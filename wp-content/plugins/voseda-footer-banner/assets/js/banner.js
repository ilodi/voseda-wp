/**
 * JavaScript Frontend para Voseda Footer Banner
 * Maneja el delay de aparición del banner
 */

(function($) {
    'use strict';

    $(document).ready(function() {

        // Obtener el banner
        var $banner = $('.voseda-footer-banner');

        if ($banner.length === 0) {
            return;
        }

        // Obtener el delay desde la configuración de WordPress
        var delay = (typeof vosedaBannerConfig !== 'undefined' && vosedaBannerConfig.delay)
            ? parseInt(vosedaBannerConfig.delay, 10)
            : 0;

        // Si el delay es 0, mostrar inmediatamente
        if (delay === 0) {
            $banner.addClass('voseda-banner-visible');
            return;
        }

        // Ocultar el banner inicialmente
        $banner.addClass('voseda-banner-hidden');

        // Mostrar el banner después del delay especificado
        setTimeout(function() {
            $banner.removeClass('voseda-banner-hidden').addClass('voseda-banner-visible');
        }, delay);

    });

})(jQuery);
