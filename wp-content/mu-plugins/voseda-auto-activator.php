<?php
/**
 * Plugin Name: Voseda Auto Activator
 * Description: Activa automáticamente los plugins esenciales de Voseda en producción
 * Version: 1.0.0
 * Author: IMaaS Group
 *
 * Este plugin se carga automáticamente desde mu-plugins
 * No requiere activación manual
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}

class Voseda_Auto_Activator {

    /**
     * Lista de plugins que deben estar siempre activos
     * Formato: 'ruta/del/plugin.php'
     */
    private $required_plugins = array(
        'voseda-footer-banner/voseda-footer-banner.php',
        'contact-form-7/wp-contact-form-7.php',
        // Agrega aquí más plugins que necesites activar automáticamente
        // Ejemplo: 'wpforms-lite/wpforms.php',
    );

    /**
     * Constructor
     */
    public function __construct() {
        // Hook para verificar y activar plugins
        add_action('admin_init', array($this, 'auto_activate_plugins'));

        // Prevenir desactivación de plugins requeridos (opcional)
        // add_filter('plugin_action_links', array($this, 'remove_deactivate_link'), 10, 2);
    }

    /**
     * Activar automáticamente los plugins requeridos
     */
    public function auto_activate_plugins() {
        // Solo ejecutar en el admin
        if (!is_admin()) {
            return;
        }

        // Obtener plugins activos
        $active_plugins = get_option('active_plugins', array());
        $needs_update = false;

        foreach ($this->required_plugins as $plugin) {
            // Verificar si el plugin existe
            $plugin_path = WP_PLUGIN_DIR . '/' . $plugin;

            if (file_exists($plugin_path) && !in_array($plugin, $active_plugins)) {
                // Agregar a la lista de activos
                $active_plugins[] = $plugin;
                $needs_update = true;

                // Log para debugging (opcional)
                error_log("Voseda Auto Activator: Activando plugin {$plugin}");
            }
        }

        // Actualizar la lista de plugins activos si hubo cambios
        if ($needs_update) {
            update_option('active_plugins', $active_plugins);

            // Forzar recarga de plugins
            do_action('activated_plugin', $plugin);
        }
    }

    /**
     * Remover link de desactivación para plugins requeridos (opcional)
     */
    public function remove_deactivate_link($actions, $plugin_file) {
        if (in_array($plugin_file, $this->required_plugins)) {
            // Remover el link de desactivación
            unset($actions['deactivate']);

            // Agregar nota informativa
            $actions['required'] = '<span style="color: #d63638;">Requerido</span>';
        }

        return $actions;
    }
}

// Inicializar el auto-activador
new Voseda_Auto_Activator();
