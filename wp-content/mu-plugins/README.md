# Must-Use Plugins (mu-plugins) - Voseda

Los **Must-Use Plugins** son plugins que WordPress carga automáticamente sin necesidad de activarlos desde el panel de administración. Son ideales para funcionalidad crítica que siempre debe estar activa.

## Plugins Incluidos

### 1. voseda-auto-activator.php
**Propósito:** Activa automáticamente plugins esenciales al cargar WordPress

**Configuración:**
```php
private $required_plugins = array(
    'voseda-footer-banner/voseda-footer-banner.php',
    // Agrega más plugins aquí
);
```

**Características:**
- ✅ Activa plugins automáticamente al cargar el admin
- ✅ Verifica que el plugin exista antes de intentar activarlo
- ✅ Registra errores en el log para debugging
- ⚙️ (Opcional) Puede prevenir desactivación de plugins críticos

### 2. voseda-form-hardcode.php
**Propósito:** Helper para incrustar formularios en cualquier parte del sitio

**Uso en templates PHP:**
```php
<?php voseda_render_contact_form(); ?>
```

**Uso como shortcode:**
```
[voseda_form]
[voseda_form id="123"]
```

**Plugins de formularios soportados:**
- Contact Form 7
- WPForms
- Gravity Forms
- Ninja Forms
- Formulario HTML personalizado (fallback)

**Ejemplo en tema:**
```php
<!-- En page-contacto.php -->
<div class="contact-section">
    <h2>Contáctanos</h2>
    <?php voseda_render_contact_form(); ?>
</div>
```

## Ventajas de mu-plugins

1. **Carga automática:** No necesitan activación manual
2. **Prioridad alta:** Se cargan antes que los plugins normales
3. **No se pueden desactivar:** Ideales para funcionalidad crítica
4. **Independientes del tema:** Funcionan con cualquier tema

## Instalación en Hostgator

### Via Forklift (Recomendado):
1. Conecta a tu servidor SFTP
2. Sincroniza la carpeta completa:
   ```
   Local: /wp-content/mu-plugins/
   Remoto: /public_html/wp-content/mu-plugins/
   ```

### Via cPanel:
1. Accede al File Manager
2. Navega a `/public_html/wp-content/`
3. Crea la carpeta `mu-plugins` si no existe
4. Sube los archivos `.php` dentro de `mu-plugins/`

### Via WordPress Admin (NO FUNCIONA):
Los mu-plugins NO aparecen en la lista normal de plugins.
Para verificar que están activos, ve a:
**Plugins → Must-Use** en el panel de WordPress

## Agregar nuevos mu-plugins

Simplemente coloca el archivo `.php` directamente en la carpeta `mu-plugins/`:

```
wp-content/
└── mu-plugins/
    ├── voseda-auto-activator.php
    ├── voseda-form-hardcode.php
    └── tu-nuevo-plugin.php  ← Aquí
```

**IMPORTANTE:** Los mu-plugins en subcarpetas NO se cargan automáticamente.
Debe ser un archivo `.php` directamente en `mu-plugins/`.

## Debugging

Si algo no funciona:

1. **Verifica que los archivos existen:**
   ```bash
   ls -la /public_html/wp-content/mu-plugins/
   ```

2. **Activa el modo debug en wp-config.php:**
   ```php
   define('WP_DEBUG', true);
   define('WP_DEBUG_LOG', true);
   define('WP_DEBUG_DISPLAY', false);
   ```

3. **Revisa el log:**
   ```
   /public_html/wp-content/debug.log
   ```

4. **Permisos correctos:**
   - Archivos: `644` (rw-r--r--)
   - Carpeta: `755` (rwxr-xr-x)

## Mantenimiento

- ✅ Estos archivos se actualizan automáticamente al sincronizar con Forklift
- ✅ No requieren activación después de actualizar
- ✅ Los cambios se aplican inmediatamente

---

**Desarrollado por IMaaS Group para Voseda.com**
Última actualización: Octubre 2025
