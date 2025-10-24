# Configuración de Forklift para Voseda.com

## Paso 1: Obtener credenciales SFTP de Hostgator

### En cPanel de Hostgator:

1. Accede a tu cPanel: `https://voseda.com:2083`
2. Busca la sección **"Files"** → **"FTP Accounts"**
3. Puedes usar la cuenta principal o crear una nueva:

#### Opción A: Usar cuenta principal (más simple)
```
Host: voseda.com (o ftp.voseda.com)
Username: [tu usuario de cPanel]
Password: [tu contraseña de cPanel]
Port: 22 (SFTP)
```

#### Opción B: Crear cuenta FTP específica (más seguro)
1. En "FTP Accounts", haz clic en **"Add FTP Account"**
2. Configura:
   - Login: `deploy@voseda.com`
   - Password: [genera una segura]
   - Directory: `/public_html/wp-content`
   - Quota: Unlimited
3. Guarda las credenciales

### Verificar acceso SSH/SFTP

En Hostgator, verifica que SSH esté habilitado:
- cPanel → **"Security"** → **"SSH Access"**
- Si no está habilitado, contacta soporte de Hostgator

## Paso 2: Configurar Forklift

### Crear conexión favorita:

1. Abre **Forklift**
2. Presiona `Cmd + N` o ve a **"File → New Favorite"**
3. Completa los datos:

```
┌─────────────────────────────────────┐
│ Connection Settings                  │
├─────────────────────────────────────┤
│ Name: Voseda Production             │
│ Protocol: SFTP                      │
│ Server: voseda.com                  │
│ Port: 22                            │
│ Username: [tu-usuario]              │
│ Password: [tu-contraseña]           │
│ Remote Path: /public_html/wp-content│
│                                     │
│ ☑ Use Keychain                     │
│ ☐ Use SSH Key                      │
└─────────────────────────────────────┘
```

4. Haz clic en **"Connect"** para probar
5. Si conecta exitosamente, haz clic en **"Add to Favorites"**

## Paso 3: Configurar Sincronización

### Modo de Sincronización Recomendado:

En Forklift, usa el modo **"Synchronize"**:

1. Panel izquierdo (Local):
   ```
   /Users/lodi/Documents/imaas/sites/voseda/wp-content
   ```

2. Panel derecho (Remoto - conecta a "Voseda Production"):
   ```
   /public_html/wp-content
   ```

3. Haz clic en el icono de **sincronización** (↻) en la barra superior

### Configurar Filtros:

Haz clic en el engranaje de sincronización y agrega estos filtros:

**Excluir:**
```
*.zip
*.git
*.gitignore
.DS_Store
.env
node_modules/
*.scss
*.sass
*.map
*.log
debug.log
Thumbs.db
```

**Incluir (prioridad):**
```
mu-plugins/**/*.php
plugins/voseda-*/**
themes/voseda/**
```

## Paso 4: Workflow de Sincronización

### Primera sincronización (Setup inicial):

```
1. [CRÍTICO] Hacer backup en Hostgator primero
2. Sincronizar mu-plugins/ → Remoto
3. Verificar en WordPress que mu-plugins están activos
4. Sincronizar plugins/ → Remoto
5. Sincronizar themes/ → Remoto (si aplica)
```

### Sincronización diaria (Updates):

**Opción A: Sincronización selectiva (recomendado)**
1. En Forklift, navega a la carpeta específica que cambiaste
2. Selecciona la carpeta/archivo
3. Click derecho → **"Upload"** o arrastra al panel remoto

**Opción B: Sincronización completa**
1. Click en el botón de sincronización
2. Revisa los cambios en el diálogo
3. Selecciona **"Local → Remote"** (unidireccional)
4. Click **"Synchronize"**

## Paso 5: Atajos de Teclado en Forklift

```
Cmd + N         → Nueva conexión
Cmd + B         → Ver favoritos
Cmd + Shift + C → Comparar archivos
Cmd + T         → Nueva pestaña
Cmd + Y         → Sincronizar
Cmd + R         → Refresh/Reload
```

## Troubleshooting

### Error: "Connection refused" o "Connection timeout"

**Solución 1:** Verifica el puerto
- Prueba con puerto `22` (SFTP/SSH)
- Si no funciona, prueba puerto `21` pero cambia protocolo a FTP

**Solución 2:** IP directa
- En cPanel, busca la IP del servidor
- Usa la IP en lugar del dominio: `123.45.67.89`

**Solución 3:** Firewall
- Verifica que tu firewall local permita conexiones SSH/SFTP
- En Mac: System Settings → Network → Firewall

### Error: "Permission denied"

**Solución:** Verifica permisos en el servidor
```bash
# Conecta por SSH y ejecuta:
cd /home/usuario/public_html/wp-content
chmod 755 mu-plugins/
chmod 644 mu-plugins/*.php
chmod 755 plugins/
chmod -R 755 plugins/*/
chmod -R 644 plugins/*/*.php
```

### Los cambios no se reflejan en el sitio

**Solución 1:** Limpiar caché de WordPress
- WordPress admin → Plugins → busca plugin de caché
- O agrega este mu-plugin temporal:

```php
<?php
// mu-plugins/clear-cache.php
add_action('init', function() {
    if (isset($_GET['clear_cache']) && current_user_can('manage_options')) {
        wp_cache_flush();
        wp_die('Cache cleared!');
    }
});
```

Luego visita: `https://voseda.com/?clear_cache`

**Solución 2:** Caché de Hostgator
- En cPanel → busca "Cache Manager" o "LiteSpeed Cache"
- Purgar todo el caché

### Archivos se sobreescriben incorrectamente

**Solución:** Usa sincronización unidireccional
1. En Forklift, en el diálogo de sincronización
2. Selecciona **"Local → Remote"** (no bidireccional)
3. ☑ "Preview changes before syncing"

## Configuración Avanzada

### Usar SSH Key (más seguro):

1. Genera un par de llaves SSH (si no tienes):
   ```bash
   ssh-keygen -t rsa -b 4096 -C "deploy@voseda.com"
   ```

2. Copia la llave pública al servidor:
   ```bash
   ssh-copy-id usuario@voseda.com
   ```

3. En Forklift, edita el favorito:
   - ☑ Use SSH Key
   - Selecciona: `~/.ssh/id_rsa`

### Automatizar con Sync Scheduler:

Forklift 4 permite programar sincronizaciones:

1. Tools → **"Sync Scheduler"**
2. Agrega nueva tarea:
   - Local: `/path/to/local/wp-content`
   - Remote: Conexión favorita "Voseda Production"
   - Schedule: Cada hora / Cada 6 horas / etc.
   - Filter: Usar filtros configurados

## Alternativas a Forklift

Si prefieres otras herramientas:

### Transmit (Mac)
- Similar a Forklift
- Más visual
- $45 USD

### FileZilla (Gratis, Mac/Win/Linux)
- Más simple
- Menos features de sincronización
- Bueno para uploads manuales

### Cyberduck (Gratis, Mac/Win)
- Buen balance
- Sincronización básica
- Integración con editor de código

### VS Code con SFTP Extension
- Edita directamente en el servidor
- Auto-upload al guardar
- Ideal para cambios pequeños

## Backup antes de sincronizar

**SIEMPRE haz backup antes de sincronizar por primera vez:**

### Opción 1: cPanel Backup
1. cPanel → **"Files"** → **"Backup"**
2. Download **"Home Directory"**

### Opción 2: WordPress Plugin
1. Instala **"UpdraftPlus"** o **"BackWPup"**
2. Configura backup completo
3. Descarga el backup

### Opción 3: SSH Command
```bash
ssh usuario@voseda.com
cd /home/usuario/public_html
tar -czf backup-$(date +%Y%m%d).tar.gz wp-content/
```

---

**¿Listo para empezar?**

1. ✅ Obtén credenciales SFTP de Hostgator
2. ✅ Configura conexión en Forklift
3. ✅ Haz backup del sitio
4. ✅ Sincroniza `mu-plugins/` primero
5. ✅ Prueba en https://voseda.com
6. ✅ Sincroniza el resto

**Soporte:** IMaaS Group
**Última actualización:** Octubre 2025
