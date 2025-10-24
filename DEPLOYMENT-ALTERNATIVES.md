# Alternativas de Deployment para Hostgator

## Problema: Forklift no conecta con Hostgator

Hostgator puede tener restricciones con algunos clientes SFTP/FTP. Aquí tienes alternativas probadas:

---

## ✅ OPCIÓN 1: FileZilla (Más Confiable y Gratis)

### Por qué FileZilla es mejor para Hostgator:
- ✅ Compatible 100% con Hostgator
- ✅ Gratis y open source
- ✅ Soporte FTP, FTPS, y SFTP
- ✅ Sincronización de directorios
- ✅ Mac, Windows, Linux

### Instalación:

**Mac:**
```bash
brew install --cask filezilla
```

**Manual:**
Descarga desde: https://filezilla-project.org/download.php?type=client

### Configuración para Hostgator:

1. **Abre FileZilla**

2. **Archivo → Gestor de sitios** (o Cmd+S)

3. **Nuevo sitio → Nombra: "Voseda Production"**

4. **Configuración General:**
```
Protocolo: FTP - Protocolo de transferencia de archivos
Host: ftp.voseda.com (o voseda.com)
Puerto: 21
Cifrado: Usar FTP explícito sobre TLS si está disponible
Tipo de acceso: Normal
Usuario: [tu usuario de cPanel]
Contraseña: [tu contraseña de cPanel]
```

5. **Configuración Avanzada (pestaña Avanzado):**
```
Directorio remoto por defecto: /public_html/wp-content
Directorio local por defecto: /Users/lodi/Documents/imaas/sites/voseda/wp-content
```

6. **Conectar**

### Usar FileZilla para sincronizar:

#### Método 1: Sincronización de directorios
1. Conecta al servidor
2. **Navegación → Comparación de directorios → Activar**
3. Selecciona los archivos resaltados (diferentes)
4. Click derecho → **Subir**

#### Método 2: Arrastrar y soltar
1. Panel izquierdo: Navega a tu carpeta local
2. Panel derecho: Navega a la carpeta remota
3. Arrastra carpetas/archivos de izquierda a derecha

#### Método 3: Cola de transferencia
1. Click derecho en archivo/carpeta local
2. **Añadir archivos a la cola**
3. Procesar cola

### Filtros para FileZilla:

**Editar → Filtros de nombres de archivo:**

```
Excluir:
*.zip
*.git*
.DS_Store
.env
node_modules
*.scss
*.map
*.log
debug.log
Thumbs.db
```

---

## ✅ OPCIÓN 2: cPanel File Manager (Más Simple)

### Ventajas:
- ✅ Ya está instalado (navegador web)
- ✅ No requiere configuración
- ✅ 100% compatible
- ✅ Extractor de ZIP integrado

### Cómo usar:

1. **Accede a cPanel:**
   ```
   https://voseda.com:2083
   o
   https://gator1234.hostgator.com:2083
   ```

2. **Busca "Administrador de archivos" / "File Manager"**

3. **Navega a:** `/public_html/wp-content`

### Subir mu-plugins:

1. En File Manager, ve a `/public_html/wp-content/`
2. Si no existe carpeta `mu-plugins`, créala:
   - **+ Nueva carpeta** → `mu-plugins`
3. Entra a `mu-plugins/`
4. **Subir** → Selecciona los 4 archivos .php
5. Espera que termine
6. Verifica permisos (644 para archivos)

### Subir plugin del footer (método ZIP):

1. En File Manager, ve a `/public_html/wp-content/plugins/`
2. **Subir** → `voseda-footer-banner.zip`
3. Una vez subido, selecciónalo
4. **Extraer** → Extraer a `/public_html/wp-content/plugins/`
5. Elimina el .zip después de extraer

### Subir tema actualizado:

1. Ve a `/public_html/wp-content/themes/voseda/`
2. Selecciona `page-contacto.php` existente
3. **Editar** o **Eliminar**
4. **Subir** el nuevo `page-contacto.php`

---

## ✅ OPCIÓN 3: WP-CLI + SSH (Para avanzados)

Si Hostgator te da acceso SSH:

### Verificar acceso SSH:

```bash
ssh usuario@voseda.com
```

Si conecta, tienes acceso SSH.

### Subir archivos con SCP:

```bash
# Subir mu-plugins
scp -r ~/Documents/imaas/sites/voseda/wp-content/mu-plugins/* \
  usuario@voseda.com:/home/usuario/public_html/wp-content/mu-plugins/

# Subir plugin
scp -r ~/Documents/imaas/sites/voseda/wp-content/plugins/voseda-footer-banner \
  usuario@voseda.com:/home/usuario/public_html/wp-content/plugins/

# Subir tema
scp ~/Documents/imaas/sites/voseda/wp-content/themes/voseda/page-contacto.php \
  usuario@voseda.com:/home/usuario/public_html/wp-content/themes/voseda/
```

### Activar plugins con WP-CLI:

```bash
ssh usuario@voseda.com
cd /home/usuario/public_html
wp plugin activate contact-form-7 --allow-root
wp plugin activate voseda-footer-banner --allow-root
wp plugin list --allow-root
```

---

## ✅ OPCIÓN 4: Cyberduck (Alternativa a Forklift)

### Ventajas:
- ✅ Gratis y open source
- ✅ Mejor compatibilidad que Forklift con Hostgator
- ✅ Interfaz similar a Forklift

### Instalación:

```bash
brew install --cask cyberduck
```

O descarga desde: https://cyberduck.io/download/

### Configuración:

1. **Abrir conexión** (icono +)
2. **FTP-SSL (Explicit AUTH TLS)**
3. Completa:
```
Servidor: ftp.voseda.com
Usuario: [tu usuario]
Contraseña: [tu contraseña]
Ruta: /public_html/wp-content
```
4. Conectar

### Sincronizar con Cyberduck:

1. **Archivo → Sincronizar**
2. Selecciona carpeta local y remota
3. Elige dirección: **Upload** (↑)
4. Opciones:
   - ☑ Comparar checksums
   - ☑ Preservar permisos
5. **Continuar**

---

## ✅ OPCIÓN 5: VS Code con SFTP Extension

### Ideal para ediciones rápidas en producción

### Instalación:

1. Abre VS Code
2. Extensions → Busca "SFTP" de Natizyskunk
3. Instalar

### Configuración:

1. Abre tu proyecto local en VS Code
2. **Cmd+Shift+P** → `SFTP: Config`
3. Edita `.vscode/sftp.json`:

```json
{
    "name": "Voseda Production",
    "host": "ftp.voseda.com",
    "protocol": "ftp",
    "port": 21,
    "username": "tu-usuario",
    "password": "tu-contraseña",
    "remotePath": "/public_html/wp-content",
    "uploadOnSave": false,
    "ignore": [
        ".vscode",
        ".git",
        ".DS_Store",
        "*.zip",
        "node_modules"
    ]
}
```

### Uso:

- **Subir archivo:** Click derecho → `SFTP: Upload`
- **Subir carpeta:** Click derecho → `SFTP: Upload Folder`
- **Sincronizar:** `SFTP: Sync Local -> Remote`
- **Auto-upload:** Cambia `uploadOnSave: true`

---

## 🎯 MI RECOMENDACIÓN

### Para ti, sugiero esta combinación:

**1. FileZilla para deployment inicial** (subir todo por primera vez)
- Más confiable con Hostgator
- Gratis
- Fácil de usar

**2. VS Code SFTP para cambios pequeños** (ediciones diarias)
- Editas local y subes automáticamente
- Perfecto para archivos individuales
- No necesitas cambiar de app

**3. cPanel File Manager como backup** (si todo falla)
- Siempre funciona
- No requiere nada instalado

---

## 🚀 Quick Start con FileZilla

### Paso 1: Instalar y configurar (5 min)
```bash
brew install --cask filezilla
```

### Paso 2: Crear conexión (ver arriba)

### Paso 3: Primera sincronización
```
1. Local:  /wp-content/mu-plugins/
   Remoto: /public_html/wp-content/mu-plugins/
   [Arrastrar carpeta]

2. Local:  /wp-content/plugins/voseda-footer-banner/
   Remoto: /public_html/wp-content/plugins/
   [Arrastrar carpeta]

3. Local:  /wp-content/themes/voseda/page-contacto.php
   Remoto: /public_html/wp-content/themes/voseda/
   [Arrastrar archivo]
```

### Paso 4: Verificar
```
https://voseda.com/contacto
```

---

## Troubleshooting

### Error: "Connection refused" en FileZilla

**Prueba estos hosts en orden:**
1. `ftp.voseda.com`
2. `voseda.com`
3. IP del servidor (búscala en cPanel)
4. `gatorXXXX.hostgator.com` (tu servidor Hostgator)

**Cambiar puerto:**
- Puerto 21 (FTP normal)
- Puerto 990 (FTPS)

### Error: "530 Login incorrect"

1. Verifica usuario/contraseña en cPanel
2. Crea una cuenta FTP específica en cPanel:
   - cPanel → **FTP Accounts**
   - **Add FTP Account**
   - Usuario: `deploy@voseda.com`
   - Directory: `/public_html/wp-content`

### FileZilla muy lento

**En Configuración → Transferencias:**
- Limitar número de conexiones simultáneas: 2
- Subir/Descargar máximo: 2

### Permisos incorrectos después de subir

**En FileZilla, después de subir:**
```
Click derecho → Permisos de archivo →
Carpetas: 755 (rwxr-xr-x)
Archivos: 644 (rw-r--r--)
```

---

## Contacto con Soporte de Hostgator

Si nada funciona, contacta soporte:

**Chat/Ticket:**
```
"Hola, necesito ayuda para conectar por FTP/SFTP a mi sitio voseda.com.
¿Pueden confirmarme:
1. Host correcto para FTP
2. Puerto a usar
3. Si SFTP está habilitado
4. Credenciales correctas"
```

**Teléfono:** Busca en cPanel el número de soporte

---

**Última actualización:** Octubre 2025
**Recomendación:** FileZilla + VS Code SFTP
