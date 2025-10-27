<?php
/**
 * Plugin Name: Voseda Contact Form 7 Styles
 * Description: Estilos personalizados para Contact Form 7 en Voseda
 * Version: 1.0.0
 * Author: IMaaS Group
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Agregar estilos personalizados para Contact Form 7
 */
add_action('wp_head', 'voseda_cf7_custom_styles');

function voseda_cf7_custom_styles() {
    // Solo cargar en páginas con Contact Form 7
    if (!function_exists('wpcf7_enqueue_scripts')) {
        return;
    }
    ?>
    <style>
        /* Estilos personalizados para Contact Form 7 - Voseda */

        /* Formulario general */
        .wpcf7 {
            width: 100%;
        }

        .wpcf7-form {
            margin: 0;
        }

        /* Grupos de campos */
        .wpcf7-form p {
            margin-bottom: 1.5rem;
        }

        /* Labels */
        .wpcf7-form label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #1a1a1a;
            font-size: 0.95rem;
        }

        /* Inputs y Textareas */
        .wpcf7-form input[type="text"],
        .wpcf7-form input[type="email"],
        .wpcf7-form input[type="tel"],
        .wpcf7-form input[type="url"],
        .wpcf7-form input[type="number"],
        .wpcf7-form input[type="date"],
        .wpcf7-form textarea,
        .wpcf7-form select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            background-color: #fff;
        }

        .wpcf7-form input:focus,
        .wpcf7-form textarea:focus,
        .wpcf7-form select:focus {
            outline: none;
            border-color: #009045; /* voseda-green */
            box-shadow: 0 0 0 3px rgba(0, 144, 69, 0.1);
        }

        /* Select personalizado */
        .wpcf7-form select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23333' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            padding-right: 2.5rem;
        }

        /* Textarea */
        .wpcf7-form textarea {
            min-height: 120px;
            resize: vertical;
        }

        /* Botón de envío */
        .wpcf7-form input[type="submit"],
        .wpcf7-form button[type="submit"] {
            background: linear-gradient(135deg, #009045 0%, #A3BD31 100%);
            color: white;
            padding: 1rem 2.5rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            width: auto;
            display: inline-block;
        }

        .wpcf7-form input[type="submit"]:hover,
        .wpcf7-form button[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 144, 69, 0.3);
        }

        .wpcf7-form input[type="submit"]:active,
        .wpcf7-form button[type="submit"]:active {
            transform: translateY(0);
        }

        /* Mensajes de validación */
        .wpcf7-not-valid-tip {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: block;
        }

        .wpcf7-form-control-wrap {
            position: relative;
            display: block;
        }

        span.wpcf7-not-valid {
            border-color: #dc3545 !important;
        }

        /* Mensajes de respuesta */
        .wpcf7-response-output {
            margin: 1.5rem 0;
            padding: 1rem;
            border-radius: 4px;
            border: none;
            font-weight: 500;
        }

        .wpcf7-mail-sent-ok {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .wpcf7-mail-sent-ng,
        .wpcf7-validation-errors,
        .wpcf7-acceptance-missing {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .wpcf7-spam-blocked {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }

        /* Spinner de carga */
        .wpcf7-spinner {
            margin-left: 10px;
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(0, 144, 69, 0.2);
            border-top-color: #009045;
            border-radius: 50%;
            animation: wpcf7-spin 0.6s linear infinite;
        }

        @keyframes wpcf7-spin {
            to { transform: rotate(360deg); }
        }

        /* Checkboxes y Radio buttons */
        .wpcf7-form input[type="checkbox"],
        .wpcf7-form input[type="radio"] {
            width: auto;
            margin-right: 0.5rem;
        }

        .wpcf7-list-item {
            display: block;
            margin-bottom: 0.5rem;
        }

        .wpcf7-list-item label {
            display: inline;
            font-weight: normal;
            cursor: pointer;
        }

        /* Campos requeridos con asterisco */
        .wpcf7-form .required {
            color: #dc3545;
            margin-left: 2px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .wpcf7-form input[type="submit"],
            .wpcf7-form button[type="submit"] {
                width: 100%;
                padding: 1rem;
            }
        }

        /* Animación de aparición del formulario */
        .contact-form-wrapper .wpcf7 {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Integración con el tema Voseda */
        .contact-form-wrapper {
            background: white;
            padding: 2.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        /* Scroll suave a mensajes de éxito */
        .wpcf7-mail-sent-ok {
            scroll-margin-top: 100px;
        }
    </style>
    <?php
}

/**
 * Agregar script para scroll suave a mensajes
 */
add_action('wp_footer', 'voseda_cf7_scroll_script');

function voseda_cf7_scroll_script() {
    if (!function_exists('wpcf7_enqueue_scripts')) {
        return;
    }
    ?>
    <script>
    document.addEventListener('wpcf7mailsent', function(event) {
        // Scroll suave al mensaje de éxito
        setTimeout(function() {
            const responseOutput = event.target.querySelector('.wpcf7-response-output');
            if (responseOutput) {
                responseOutput.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        }, 100);
    }, false);

    // Pre-seleccionar valor del parámetro URL ?interes=
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const interesParam = urlParams.get('interes');

        if (interesParam) {
            const selectInteres = document.querySelector('select[name="interes"]');
            if (selectInteres) {
                const options = selectInteres.options;
                for (let i = 0; i < options.length; i++) {
                    if (options[i].value === interesParam) {
                        selectInteres.selectedIndex = i;
                        break;
                    }
                }
            }
        }
    });
    </script>
    <?php
}
