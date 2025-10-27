<?php
/**
 * Plugin Name: Voseda Form Helper
 * Description: Helper para usar Contact Form 7 en templates del tema
 * Version: 2.0.0
 * Author: IMaaS Group
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Renderizar formulario de contacto usando Contact Form 7
 * Uso en template: <?php voseda_render_contact_form(); ?>
 */
function voseda_render_contact_form($form_id = null) {
    // Contact Form 7 - ID de producción: 78a0090
    if (function_exists('wpcf7_contact_form')) {
        $default_form_id = $form_id ?: '78a0090';
        echo do_shortcode("[contact-form-7 id=\"{$default_form_id}\" title=\"Formulario contacto\"]");
        return;
    }

    // Si Contact Form 7 no está activo, mostrar mensaje
    echo '<div class="alert alert-warning">Por favor activa el plugin Contact Form 7 para ver el formulario.</div>';
}

/**
 * Shortcode para usar en el editor de WordPress
 * Uso: [voseda_form] o [voseda_form id="12345"]
 */
add_shortcode('voseda_form', 'voseda_form_shortcode');

function voseda_form_shortcode($atts) {
    $atts = shortcode_atts(array(
        'id' => null,
    ), $atts);

    ob_start();
    voseda_render_contact_form($atts['id']);
    return ob_get_clean();
}
