/**
 * JavaScript para la página de administración del plugin
 * Voseda Footer Banner
 *
 * Este archivo maneja la funcionalidad del color picker y media uploader
 * en la página de configuración del plugin
 */

(function($) {
    'use strict';

    // Esperar a que el DOM esté listo
    $(document).ready(function() {

        /**
         * Inicializar WordPress Color Picker
         */
        if ($.fn.wpColorPicker) {
            $('.voseda-color-picker').wpColorPicker({
                // Opciones del color picker
                change: function(event, ui) {
                    // Callback cuando cambia el color (opcional)
                },
                clear: function() {
                    // Callback cuando se limpia el color (opcional)
                }
            });
        }

        /**
         * Media Uploader para la imagen de fondo
         */
        var mediaUploader;

        // Botón para abrir el media uploader
        $('#voseda_fb_upload_image').on('click', function(e) {
            e.preventDefault();

            // Si el media uploader ya existe, abrirlo
            if (mediaUploader) {
                mediaUploader.open();
                return;
            }

            // Crear un nuevo media uploader
            mediaUploader = wp.media({
                title: 'Seleccionar Imagen de Fondo',
                button: {
                    text: 'Usar esta imagen'
                },
                multiple: false,
                library: {
                    type: 'image'
                }
            });

            // Cuando se selecciona una imagen
            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();

                // Establecer la URL de la imagen
                $('#voseda_footer_banner_bg_image').val(attachment.url);

                // Mostrar preview de la imagen
                $('#voseda_fb_image_preview').html(
                    '<img src="' + attachment.url + '" style="max-width: 300px; height: auto; display: block;">'
                );
            });

            // Abrir el media uploader
            mediaUploader.open();
        });

        // Botón para eliminar imagen
        $('#voseda_fb_remove_image').on('click', function(e) {
            e.preventDefault();

            // Limpiar el campo de URL
            $('#voseda_footer_banner_bg_image').val('');

            // Limpiar el preview
            $('#voseda_fb_image_preview').html('');
        });

    });

})(jQuery);
