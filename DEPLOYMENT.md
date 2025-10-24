# Guía de Deployment - Voseda.com en Hostgator

## Configuración con Forklift

### Paso 1: Configurar conexión SFTP en Forklift

1. Abre Forklift
2. Ve a **Favorites → New Favorite**
3. Configura los siguientes datos:

```
Name: Voseda Production
Protocol: SFTP
Server: voseda.com (o la IP que te dé Hostgator)
Username: [tu usuario de cPanel]
Password: [tu contraseña de cPanel]
Remote Path: /public_html/wp-content
Port: 22 (por defecto)
```

4. Guarda el favorito

### Paso 2: Configurar sincronización

En Forklift, configura la sincronización local → remoto:

**Panel izquierdo (Local):**
```
/Users/lodi/Documents/imaas/sites/voseda/wp-content
```

**Panel derecho (Remoto):**
```
/public_html/wp-content (en Hostgator)
```

### Paso 3: Reglas de sincronización

Configura filtros para excluir:
- `*.zip`
- `*.git*`
- `.DS_Store`
- `node_modules/`
- `*.scss` (si usas)
- `*.map`

## Estrategia de Deployment

### Opción A: Sincronización Selectiva (Recomendado)

**Para desplegar cambios específicos:**

1. **Primera vez - Subir mu-plugins:**
   ```
   Local: wp-content/mu-plugins/
   → Remoto: /public_html/wp-content/mu-plugins/
   ```
   Esto activa el auto-activador de plugins

2. **Subir plugins personalizados:**
   ```
   Local: wp-content/plugins/voseda-footer-banner/
   → Remoto: /public_html/wp-content/plugins/voseda-footer-banner/
   ```

3. **Subir tema personalizado (si aplica):**
   ```
   Local: wp-content/themes/voseda/
   → Remoto: /public_html/wp-content/themes/voseda/
   ```

### Opción B: Sincronización Manual con ZIP (Alternativa)

Si prefieres subir manualmente:

1. Sube el `.zip` del plugin via WordPress admin
2. O sube via cPanel File Manager y descomprime

## Plugins Auto-Activados

El archivo `mu-plugins/voseda-auto-activator.php` activa automáticamente:

- ✅ `voseda-footer-banner` - Banner del footer
- Agrega más plugins editando el array `$required_plugins`

### Para agregar más plugins al auto-activador:

Edita `/wp-content/mu-plugins/voseda-auto-activator.php`:

```php
private $required_plugins = array(
    'voseda-footer-banner/voseda-footer-banner.php',
    'contact-form-7/wp-contact-form-7.php',  // Ejemplo
    // Agrega aquí los tuyos
);
```

## Formularios - Recomendaciones

Para formularios, te recomiendo usar uno de estos (todos compatibles con auto-activación):

### Opción 1: Contact Form 7 (Gratis, Popular)
```
Plugin: contact-form-7
Hardcode: Shortcode [contact-form-7 id="123"]
```

### Opción 2: WPForms Lite (Gratis, Visual)
```
Plugin: wpforms-lite
Hardcode: <?php echo do_shortcode('[wpforms id="123"]'); ?>
```

### Opción 3: Gravity Forms (Premium, Potente)
```
Plugin: gravityforms
Hardcode: <?php gravity_form(1, true, true, false, '', true); ?>
```

Para hardcodear en tu tema:

```php
// En single.php, page.php o donde necesites
<?php
if (shortcode_exists('contact-form-7')) {
    echo do_shortcode('[contact-form-7 id="123" title="Contacto"]');
}
?>
```

## Flujo de Trabajo Recomendado

### Desarrollo Local:
1. Haz cambios en local (Docker)
2. Prueba en `http://localhost`
3. Commitea a git (opcional)

### Deploy a Producción:
1. Abre Forklift
2. Conecta a "Voseda Production"
3. Sincroniza carpetas específicas:
   - `mu-plugins/` (primera vez)
   - `plugins/voseda-footer-banner/` (si hay cambios)
   - `themes/voseda/` (si hay cambios)
4. Verifica en https://voseda.com

## Comandos útiles en cPanel (Terminal SSH)

Si Hostgator te da acceso SSH:

```bash
# Ver plugins activos
wp plugin list --allow-root

# Activar plugin manualmente
wp plugin activate voseda-footer-banner --allow-root

# Limpiar caché
wp cache flush --allow-root
```

## Checklist Pre-Deployment

- [ ] Backup de base de datos hecho
- [ ] Backup de archivos críticos hecho
- [ ] Plugins probados en local
- [ ] URLs verificadas (https://voseda.com)
- [ ] Formularios testeados
- [ ] Permisos de archivos correctos (644 para archivos, 755 para carpetas)

## Troubleshooting

**Si un plugin no se activa automáticamente:**
1. Verifica que esté en `mu-plugins/voseda-auto-activator.php`
2. Revisa los logs: `/public_html/wp-content/debug.log`
3. Activa manualmente desde WordPress admin

**Si Forklift no conecta:**
1. Verifica credenciales en cPanel
2. Confirma que el puerto 22 (SSH/SFTP) esté abierto
3. Usa la IP en lugar del dominio si hay problemas DNS

## Contacto

**Hosting:** Hostgator USA
**Dominio:** https://voseda.com
**Desarrollador:** IMaaS Group

---
Última actualización: Octubre 2025
