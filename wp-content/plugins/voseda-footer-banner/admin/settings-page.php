<?php
/**
 * Página de configuración del plugin Voseda Footer Banner
 *
 * Este archivo contiene el formulario de configuración que se muestra
 * en el panel de administración de WordPress
 */

// Evitar acceso directo al archivo
if (!defined('ABSPATH')) {
    exit;
}

// Verificar permisos
if (!current_user_can('manage_options')) {
    wp_die(__('No tienes permisos suficientes para acceder a esta página.'));
}

// Guardar configuraciones si se envió el formulario
if (isset($_POST['voseda_fb_save_settings']) && check_admin_referer('voseda_fb_settings_save', 'voseda_fb_nonce')) {

    // Array de opciones a guardar
    $options_to_save = array(
        'enabled',
        'bg_color',
        'text_color',
        'button_bg_color',
        'button_text_color',
        'main_text',
        'button_url',
        'button_text',
        'bg_image',
        'enable_marquee',
        'enable_glass_effect',
        'display_delay',
    );

    // Guardar cada opción
    foreach ($options_to_save as $option) {
        $option_name = Voseda_Footer_Banner::OPTION_PREFIX . $option;

        if (isset($_POST[$option_name])) {
            // Sanitizar según el tipo de dato
            if (in_array($option, array('main_text'))) {
                $value = sanitize_textarea_field($_POST[$option_name]);
            } elseif ($option === 'button_url') {
                $value = esc_url_raw($_POST[$option_name]);
            } else {
                $value = sanitize_text_field($_POST[$option_name]);
            }

            update_option($option_name, $value);
        } else {
            // Para checkboxes no marcados
            if (in_array($option, array('enabled', 'enable_marquee', 'enable_glass_effect'))) {
                update_option($option_name, '0');
            }
        }
    }

    // Mostrar mensaje de éxito
    echo '<div class="notice notice-success is-dismissible"><p><strong>Configuración guardada correctamente.</strong></p></div>';
}

// Obtener valores actuales
$enabled = get_option(Voseda_Footer_Banner::OPTION_PREFIX . 'enabled', '1');
$bg_color = get_option(Voseda_Footer_Banner::OPTION_PREFIX . 'bg_color', '#000000');
$text_color = get_option(Voseda_Footer_Banner::OPTION_PREFIX . 'text_color', '#ffffff');
$button_bg_color = get_option(Voseda_Footer_Banner::OPTION_PREFIX . 'button_bg_color', '#ff6b6b');
$button_text_color = get_option(Voseda_Footer_Banner::OPTION_PREFIX . 'button_text_color', '#ffffff');
$main_text = get_option(Voseda_Footer_Banner::OPTION_PREFIX . 'main_text', 'Únete a nuestra comunidad');
$button_url = get_option(Voseda_Footer_Banner::OPTION_PREFIX . 'button_url', '#');
$button_text = get_option(Voseda_Footer_Banner::OPTION_PREFIX . 'button_text', 'Comenzar');
$bg_image = get_option(Voseda_Footer_Banner::OPTION_PREFIX . 'bg_image', '');
$enable_marquee = get_option(Voseda_Footer_Banner::OPTION_PREFIX . 'enable_marquee', '0');
$enable_glass_effect = get_option(Voseda_Footer_Banner::OPTION_PREFIX . 'enable_glass_effect', '1');
$display_delay = get_option(Voseda_Footer_Banner::OPTION_PREFIX . 'display_delay', '0');
?>

<div class="wrap voseda-footer-banner-settings">
    <h1>
        <?php echo esc_html(get_admin_page_title()); ?>
        <span style="font-size: 14px; color: #666; font-weight: normal; margin-left: 10px;">
            v<?php echo VOSEDA_FB_VERSION; ?>
        </span>
    </h1>

    <p>
        Configura el banner que se mostrará en el footer de todas las páginas del sitio.
        Este banner incluye texto personalizado, un botón de llamada a la acción y una imagen flotante que aparece al pasar el mouse.
    </p>
    <div style="background: #fff3cd; border-left: 4px solid #ffc107; padding: 12px 15px; margin: 15px 0;">
        <strong>✨ Nueva funcionalidad:</strong> Al pasar el mouse sobre el banner, se mostrará una imagen flotante del evento (900x300px recomendado).
    </div>

    <form method="post" action="">
        <?php wp_nonce_field('voseda_fb_settings_save', 'voseda_fb_nonce'); ?>

        <table class="form-table" role="presentation">
            <tbody>
                <!-- Activar/Desactivar Banner -->
                <tr>
                    <th scope="row">
                        <label for="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>enabled">
                            Activar Banner
                        </label>
                    </th>
                    <td>
                        <label>
                            <input
                                type="checkbox"
                                name="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>enabled"
                                id="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>enabled"
                                value="1"
                                <?php checked($enabled, '1'); ?>
                            >
                            Mostrar el banner en el footer del sitio
                        </label>
                    </td>
                </tr>

                <!-- Activar Efecto Marquesina -->
                <tr>
                    <th scope="row">
                        <label for="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>enable_marquee">
                            Efecto Marquesina (Blur)
                        </label>
                    </th>
                    <td>
                        <label>
                            <input
                                type="checkbox"
                                name="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>enable_marquee"
                                id="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>enable_marquee"
                                value="1"
                                <?php checked($enable_marquee, '1'); ?>
                            >
                            Activar efecto de marquesina flotante con blur (estilo Pentagram)
                        </label>
                        <p class="description">
                            Cuando está activado, el banner se muestra con position: fixed en la parte inferior con efecto blur.
                        </p>
                    </td>
                </tr>

                <!-- Activar Efecto Cristal (Glass) -->
                <tr>
                    <th scope="row">
                        <label for="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>enable_glass_effect">
                            Efecto Cristal (Glassmorphism)
                        </label>
                    </th>
                    <td>
                        <label>
                            <input
                                type="checkbox"
                                name="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>enable_glass_effect"
                                id="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>enable_glass_effect"
                                value="1"
                                <?php checked($enable_glass_effect, '1'); ?>
                            >
                            Activar efecto de cristal translúcido con backdrop-filter
                        </label>
                        <p class="description">
                            Aplica un fondo translúcido con efecto de desenfoque (glassmorphism). Desactívalo si prefieres un fondo sólido.
                        </p>
                    </td>
                </tr>

                <!-- Tiempo de Espera (Delay) -->
                <tr>
                    <th scope="row">
                        <label for="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>display_delay">
                            Tiempo de Espera
                        </label>
                    </th>
                    <td>
                        <select
                            name="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>display_delay"
                            id="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>display_delay"
                            class="regular-text"
                        >
                            <option value="0" <?php selected($display_delay, '0'); ?>>Mostrar inmediatamente</option>
                            <option value="3000" <?php selected($display_delay, '3000'); ?>>Mostrar después de 3 segundos</option>
                            <option value="6000" <?php selected($display_delay, '6000'); ?>>Mostrar después de 6 segundos</option>
                            <option value="10000" <?php selected($display_delay, '10000'); ?>>Mostrar después de 10 segundos</option>
                            <option value="60000" <?php selected($display_delay, '60000'); ?>>Mostrar después de 1 minuto</option>
                        </select>
                        <p class="description">
                            Selecciona cuándo debe aparecer el banner después de cargar la página. Útil para campañas y evitar interrumpir la lectura inmediata.
                        </p>
                    </td>
                </tr>

                <!-- Separador -->
                <tr>
                    <th colspan="2">
                        <h2>Colores</h2>
                        <hr>
                    </th>
                </tr>

                <!-- Color de Fondo -->
                <tr>
                    <th scope="row">
                        <label for="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>bg_color">
                            Color de Fondo
                        </label>
                    </th>
                    <td>
                        <input
                            type="text"
                            name="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>bg_color"
                            id="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>bg_color"
                            value="<?php echo esc_attr($bg_color); ?>"
                            class="voseda-color-picker"
                        >
                        <p class="description">
                            Selecciona el color de fondo del banner. Si tienes una imagen de fondo, este color se mezclará con la imagen.
                        </p>
                    </td>
                </tr>

                <!-- Color de Texto -->
                <tr>
                    <th scope="row">
                        <label for="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>text_color">
                            Color de Texto
                        </label>
                    </th>
                    <td>
                        <input
                            type="text"
                            name="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>text_color"
                            id="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>text_color"
                            value="<?php echo esc_attr($text_color); ?>"
                            class="voseda-color-picker"
                        >
                        <p class="description">
                            Color del texto principal del banner.
                        </p>
                    </td>
                </tr>

                <!-- Color de Fondo del Botón -->
                <tr>
                    <th scope="row">
                        <label for="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>button_bg_color">
                            Color de Fondo del Botón
                        </label>
                    </th>
                    <td>
                        <input
                            type="text"
                            name="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>button_bg_color"
                            id="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>button_bg_color"
                            value="<?php echo esc_attr($button_bg_color); ?>"
                            class="voseda-color-picker"
                        >
                        <p class="description">
                            Color de fondo del botón CTA.
                        </p>
                    </td>
                </tr>

                <!-- Color de Texto del Botón -->
                <tr>
                    <th scope="row">
                        <label for="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>button_text_color">
                            Color de Texto del Botón
                        </label>
                    </th>
                    <td>
                        <input
                            type="text"
                            name="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>button_text_color"
                            id="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>button_text_color"
                            value="<?php echo esc_attr($button_text_color); ?>"
                            class="voseda-color-picker"
                        >
                        <p class="description">
                            Color del texto del botón CTA.
                        </p>
                    </td>
                </tr>

                <!-- Separador -->
                <tr>
                    <th colspan="2">
                        <h2>Contenido</h2>
                        <hr>
                    </th>
                </tr>

                <!-- Texto Principal -->
                <tr>
                    <th scope="row">
                        <label for="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>main_text">
                            Texto Principal
                        </label>
                    </th>
                    <td>
                        <textarea
                            name="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>main_text"
                            id="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>main_text"
                            rows="3"
                            class="large-text"
                        ><?php echo esc_textarea($main_text); ?></textarea>
                        <p class="description">
                            Texto que se mostrará en el banner. Puedes usar múltiples líneas.
                        </p>
                    </td>
                </tr>

                <!-- Texto del Botón -->
                <tr>
                    <th scope="row">
                        <label for="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>button_text">
                            Texto del Botón
                        </label>
                    </th>
                    <td>
                        <input
                            type="text"
                            name="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>button_text"
                            id="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>button_text"
                            value="<?php echo esc_attr($button_text); ?>"
                            class="regular-text"
                        >
                        <p class="description">
                            Texto que aparecerá en el botón CTA.
                        </p>
                    </td>
                </tr>

                <!-- URL del Botón -->
                <tr>
                    <th scope="row">
                        <label for="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>button_url">
                            URL del Botón
                        </label>
                    </th>
                    <td>
                        <input
                            type="url"
                            name="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>button_url"
                            id="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>button_url"
                            value="<?php echo esc_attr($button_url); ?>"
                            class="large-text"
                            placeholder="https://ejemplo.com"
                        >
                        <p class="description">
                            URL a la que redirigirá el botón cuando se haga clic.
                        </p>
                    </td>
                </tr>

                <!-- Imagen de Hover -->
                <tr>
                    <th scope="row">
                        <label for="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>bg_image">
                            Imagen Hover (Evento)
                        </label>
                    </th>
                    <td>
                        <input
                            type="text"
                            name="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>bg_image"
                            id="<?php echo Voseda_Footer_Banner::OPTION_PREFIX; ?>bg_image"
                            value="<?php echo esc_attr($bg_image); ?>"
                            class="regular-text"
                            readonly
                        >
                        <button type="button" class="button" id="voseda_fb_upload_image">
                            Seleccionar Imagen
                        </button>
                        <button type="button" class="button" id="voseda_fb_remove_image">
                            Eliminar Imagen
                        </button>
                        <p class="description">
                            <strong>Imagen flotante del evento que aparece al pasar el mouse sobre el banner.</strong><br>
                            📐 <strong>Dimensiones recomendadas:</strong> Ancho mínimo <strong>900px</strong> / Alto mínimo <strong>300px</strong><br>
                            💡 Esta imagen se mostrará automáticamente arriba del banner cuando el usuario pase el mouse.<br>
                            Si no seleccionas ninguna imagen, se mostrará un cuadro gris placeholder al hacer hover.
                        </p>
                        <div id="voseda_fb_image_preview" style="margin-top: 10px;">
                            <?php if ($bg_image): ?>
                                <img src="<?php echo esc_url($bg_image); ?>" style="max-width: 300px; height: auto; display: block; border: 2px solid #ddd; border-radius: 4px;">
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>

        <p class="submit">
            <input
                type="submit"
                name="voseda_fb_save_settings"
                id="submit"
                class="button button-primary"
                value="Guardar Cambios"
            >
        </p>
    </form>
</div>
