<?php
/**
 * Plugin Name: Voseda Banner by IMaaS_Group
 * Plugin URI: https://voseda.com
 * Description: Plugin para inyectar un banner personalizable en el footer del sitio con opciones de colores, texto, imagen y CTA. Optimizado para imágenes 1080x1080px. Soporta [texto] para destacar palabras.
 * Version: 1.2.0
 * Author: IMaaS Group
 * Author URI: https://imaasgroup.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: voseda-footer-banner
 * Requires at least: 5.0
 * Requires PHP: 7.4
 */

// Evitar acceso directo al archivo
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Clase principal del plugin Voseda  Banner
 */
class Voseda_Footer_Banner {

    /**
     * Versión del plugin
     */
    const VERSION = '1.2.0';

    /**
     * Instancia única del plugin (Singleton)
     */
    private static $instance = null;

    /**
     * Prefijo para las opciones de la base de datos
     */
    const OPTION_PREFIX = 'voseda_footer_banner_';

    /**
     * Constructor privado (Singleton)
     */
    private function __construct() {
        $this->define_constants();
        $this->init_hooks();
    }

    /**
     * Obtener instancia única del plugin
     */
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Definir constantes del plugin
     */
    private function define_constants() {
        define('VOSEDA_FB_VERSION', self::VERSION);
        define('VOSEDA_FB_PLUGIN_DIR', plugin_dir_path(__FILE__));
        define('VOSEDA_FB_PLUGIN_URL', plugin_dir_url(__FILE__));
        define('VOSEDA_FB_PLUGIN_BASENAME', plugin_basename(__FILE__));
    }

    /**
     * Inicializar hooks del plugin
     */
    private function init_hooks() {
        // Hook de activación del plugin
        register_activation_hook(__FILE__, array($this, 'activate'));

        // Hook de desactivación del plugin
        register_deactivation_hook(__FILE__, array($this, 'deactivate'));

        // Cargar archivos necesarios
        add_action('plugins_loaded', array($this, 'load_plugin_files'));

        // Inicializar panel de administración
        if (is_admin()) {
            add_action('admin_menu', array($this, 'add_admin_menu'));
            add_action('admin_init', array($this, 'register_settings'));
            add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));
        }

        // Renderizar el banner en el frontend
        add_action('wp_footer', array($this, 'render_footer_banner'), 999);
        add_action('wp_enqueue_scripts', array($this, 'enqueue_frontend_scripts'));
    }

    /**
     * Cargar archivos del plugin
     */
    public function load_plugin_files() {
        // Cargar archivo de renderizado del banner
        require_once VOSEDA_FB_PLUGIN_DIR . 'public/render-banner.php';

        // El archivo settings-page.php se carga solo cuando se necesita
        // en el método render_settings_page() mediante include
    }

    /**
     * Función que se ejecuta al activar el plugin
     */
    public function activate() {
        // Establecer valores por defecto
        $defaults = array(
            self::OPTION_PREFIX . 'enabled' => '1',
            self::OPTION_PREFIX . 'bg_color' => '#000000',
            self::OPTION_PREFIX . 'text_color' => '#ffffff',
            self::OPTION_PREFIX . 'button_bg_color' => '#ff6b6b',
            self::OPTION_PREFIX . 'button_text_color' => '#ffffff',
            self::OPTION_PREFIX . 'main_text' => 'Únete a nuestra comunidad',
            self::OPTION_PREFIX . 'button_url' => '#',
            self::OPTION_PREFIX . 'button_text' => 'Comenzar',
            self::OPTION_PREFIX . 'bg_image' => '',
            self::OPTION_PREFIX . 'enable_marquee' => '0',
            self::OPTION_PREFIX . 'enable_glass_effect' => '1',
            self::OPTION_PREFIX . 'display_delay' => '0',
        );

        foreach ($defaults as $key => $value) {
            if (get_option($key) === false) {
                add_option($key, $value);
            }
        }
    }

    /**
     * Función que se ejecuta al desactivar el plugin
     */
    public function deactivate() {
        // No eliminamos las opciones para preservar la configuración
        // Si el usuario quiere eliminar datos, debe desinstalar el plugin
    }

    /**
     * Añadir menú en el panel de administración
     */
    public function add_admin_menu() {
        add_menu_page(
            'Footer Banner',                     // Título de la página
            'Footer Banner',                     // Título del menú
            'manage_options',                    // Capacidad requerida
            'voseda-footer-banner',              // Slug del menú
            array($this, 'render_settings_page'), // Función callback
            'dashicons-megaphone',               // Icono (dashicon)
            30                                    // Posición en el menú (después de Comentarios)
        );
    }

    /**
     * Renderizar la página de configuración
     */
    public function render_settings_page() {
        if (!current_user_can('manage_options')) {
            return;
        }

        // Incluir el archivo de la página de configuración
        include VOSEDA_FB_PLUGIN_DIR . 'admin/settings-page.php';
    }

    /**
     * Registrar configuraciones del plugin
     */
    public function register_settings() {
        // Registrar grupo de opciones
        $settings_group = 'voseda_footer_banner_settings';

        // Registrar cada opción individualmente
        $options = array(
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

        foreach ($options as $option) {
            register_setting(
                $settings_group,
                self::OPTION_PREFIX . $option,
                array(
                    'type' => 'string',
                    'sanitize_callback' => array($this, 'sanitize_option'),
                )
            );
        }
    }

    /**
     * Sanitizar opciones antes de guardarlas
     */
    public function sanitize_option($value) {
        // Sanitización básica
        if (is_string($value)) {
            return sanitize_text_field($value);
        }
        return $value;
    }

    /**
     * Cargar scripts y estilos en el panel de administración
     */
    public function enqueue_admin_scripts($hook) {
        // Cargar solo en la página de configuración del plugin
        if ('toplevel_page_voseda-footer-banner' !== $hook) {
            return;
        }

        // Cargar WordPress color picker
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');

        // Cargar WordPress media uploader
        wp_enqueue_media();

        // Cargar estilos del admin
        wp_enqueue_style(
            'voseda-fb-admin-css',
            VOSEDA_FB_PLUGIN_URL . 'assets/css/admin.css',
            array(),
            VOSEDA_FB_VERSION
        );

        // Script personalizado para el admin
        wp_enqueue_script(
            'voseda-fb-admin',
            VOSEDA_FB_PLUGIN_URL . 'assets/js/admin.js',
            array('jquery', 'wp-color-picker'),
            VOSEDA_FB_VERSION,
            true
        );
    }

    /**
     * Cargar scripts y estilos en el frontend
     */
    public function enqueue_frontend_scripts() {
        // Verificar si el banner está habilitado
        $enabled = get_option(self::OPTION_PREFIX . 'enabled', '1');

        if ($enabled !== '1') {
            return;
        }

        // Cargar estilos del banner
        wp_enqueue_style(
            'voseda-footer-banner',
            VOSEDA_FB_PLUGIN_URL . 'assets/css/style.css',
            array(),
            VOSEDA_FB_VERSION
        );

        // Cargar script del banner para delay
        wp_enqueue_script(
            'voseda-footer-banner-js',
            VOSEDA_FB_PLUGIN_URL . 'assets/js/banner.js',
            array('jquery'),
            VOSEDA_FB_VERSION,
            true
        );

        // Pasar delay al JavaScript
        $display_delay = get_option(self::OPTION_PREFIX . 'display_delay', '0');
        wp_localize_script(
            'voseda-footer-banner-js',
            'vosedaBannerConfig',
            array(
                'delay' => intval($display_delay)
            )
        );
    }

    /**
     * Renderizar el banner en el footer
     */
    public function render_footer_banner() {
        // Verificar si el banner está habilitado
        $enabled = get_option(self::OPTION_PREFIX . 'enabled', '1');

        if ($enabled !== '1') {
            return;
        }

        // Obtener todas las opciones
        $options = array(
            'bg_color' => get_option(self::OPTION_PREFIX . 'bg_color', '#000000'),
            'text_color' => get_option(self::OPTION_PREFIX . 'text_color', '#ffffff'),
            'button_bg_color' => get_option(self::OPTION_PREFIX . 'button_bg_color', '#ff6b6b'),
            'button_text_color' => get_option(self::OPTION_PREFIX . 'button_text_color', '#ffffff'),
            'main_text' => get_option(self::OPTION_PREFIX . 'main_text', 'Únete a nuestra comunidad'),
            'button_url' => get_option(self::OPTION_PREFIX . 'button_url', '#'),
            'button_text' => get_option(self::OPTION_PREFIX . 'button_text', 'Comenzar'),
            'bg_image' => get_option(self::OPTION_PREFIX . 'bg_image', ''),
            'enable_marquee' => get_option(self::OPTION_PREFIX . 'enable_marquee', '0'),
            'enable_glass_effect' => get_option(self::OPTION_PREFIX . 'enable_glass_effect', '1'),
            'display_delay' => get_option(self::OPTION_PREFIX . 'display_delay', '0'),
        );

        // Renderizar el banner usando el template
        voseda_fb_render_banner($options);
    }
}

/**
 * Inicializar el plugin
 */
function voseda_footer_banner_init() {
    return Voseda_Footer_Banner::get_instance();
}

// Iniciar el plugin
voseda_footer_banner_init();
