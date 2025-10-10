<?php
/**
 * Renderizado del banner en el footer
 *
 * Este archivo contiene la función que genera el HTML del banner
 * que se inyecta en el footer del sitio
 */

// Evitar acceso directo al archivo
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Función para renderizar el banner en el footer
 *
 * @param array $options Array con todas las opciones del banner
 */
function voseda_fb_render_banner($options) {

    // Extraer opciones
    $bg_color = isset($options['bg_color']) ? $options['bg_color'] : '#000000';
    $text_color = isset($options['text_color']) ? $options['text_color'] : '#ffffff';
    $button_bg_color = isset($options['button_bg_color']) ? $options['button_bg_color'] : '#ff6b6b';
    $button_text_color = isset($options['button_text_color']) ? $options['button_text_color'] : '#ffffff';
    $main_text = isset($options['main_text']) ? $options['main_text'] : '';
    $button_url = isset($options['button_url']) ? $options['button_url'] : '#';
    $button_text = isset($options['button_text']) ? $options['button_text'] : 'Comenzar';
    $bg_image = isset($options['bg_image']) ? $options['bg_image'] : '';
    $enable_marquee = isset($options['enable_marquee']) ? $options['enable_marquee'] : '0';
    $enable_glass_effect = isset($options['enable_glass_effect']) ? $options['enable_glass_effect'] : '1';

    // Determinar clases CSS
    $banner_classes = array('voseda-footer-banner');

    if ($enable_marquee === '1') {
        $banner_classes[] = 'voseda-banner-marquee';
    }

    if ($enable_glass_effect === '1') {
        $banner_classes[] = 'voseda-glass-effect';
    }

    // Construir estilos inline
    $banner_styles = array();

    // Color de fondo
    $banner_styles[] = 'background-color: ' . esc_attr($bg_color) . ';';

    // Ya no usamos la imagen como background del banner
    // La imagen solo aparece en hover como elemento flotante

    // Color de texto
    $banner_styles[] = 'color: ' . esc_attr($text_color) . ';';

    // Estilos del botón
    $button_styles = array(
        'background-color: ' . esc_attr($button_bg_color) . ';',
        'color: ' . esc_attr($button_text_color) . ';',
    );

    // Convertir arrays de estilos a strings
    $banner_style_string = implode(' ', $banner_styles);
    $button_style_string = implode(' ', $button_styles);

    // Renderizar el HTML del banner
    ?>
    <div class="<?php echo esc_attr(implode(' ', $banner_classes)); ?>" style="<?php echo esc_attr($banner_style_string); ?>">
        <div class="voseda-banner-overlay"></div>

        <?php if (!empty($bg_image)): ?>
            <!-- Imagen flotante que aparece en hover -->
            <div class="voseda-banner-hover-image" style="background-image: url(<?php echo esc_url($bg_image); ?>);"></div>
        <?php else: ?>
            <!-- Placeholder gris si no hay imagen -->
            <div class="voseda-banner-hover-image voseda-banner-no-image"></div>
        <?php endif; ?>

        <div class="voseda-banner-content">
            <div class="voseda-banner-inner">
                <?php if (!empty($main_text)): ?>
                    <div class="voseda-banner-text">
                        <?php echo nl2br(esc_html($main_text)); ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($button_text) && !empty($button_url)): ?>
                    <div class="voseda-banner-button-wrapper">
                        <a
                            href="<?php echo esc_url($button_url); ?>"
                            target="_blank" rel="noopener noreferrer"
                            class="voseda-banner-button"
                            style="<?php echo esc_attr($button_style_string); ?>"
                        >
                            <?php echo esc_html($button_text); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php
}
