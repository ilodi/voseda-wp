# Deployment desde WordPress Admin - La forma más fácil

## ✅ TODO DESDE EL PANEL DE WORDPRESS

No necesitas FTP, Forklift, ni nada complicado. Todo se puede hacer desde `https://voseda.com/wp-admin`

---

## 📦 PASO 1: Subir el Plugin del Footer Banner

### Opción A: Subir ZIP directamente (Recomendado)

1. Accede a `https://voseda.com/wp-admin`
2. Ve a **Plugins → Añadir nuevo**
3. Click en **Subir plugin** (arriba)
4. **Seleccionar archivo** → `voseda-footer-banner.zip`
5. **Instalar ahora**
6. **Activar plugin** (o déjalo, se activará solo con mu-plugins)

**Archivo a subir:**
```
/wp-content/plugins/voseda-footer-banner.zip
```

---

## 📝 PASO 2: Subir mu-plugins (Must-Use Plugins)

Aquí hay 2 opciones:

### Opción A: Plugin "Must Use Plugins Manager" (Más fácil)

1. **Instala el plugin helper:**
   - WordPress Admin → **Plugins → Añadir nuevo**
   - Busca: "Must Use Plugins Manager"
   - Instalar y activar

2. **Sube los mu-plugins:**
   - Ve a **Plugins → Must-Use Plugins**
   - Sube cada archivo:
     - `voseda-auto-activator.php`
     - `voseda-form-hardcode.php`
     - `voseda-cf7-styles.php`

### Opción B: File Manager de cPanel (También fácil)

1. **Accede a cPanel:**
   ```
   https://voseda.com:2083
   ```

2. **Busca "Administrador de archivos" / "File Manager"**

3. **Navega a:**
   ```
   /public_html/wp-content/
   ```

4. **Crea carpeta `mu-plugins`** si no existe:
   - Click en **+ Carpeta**
   - Nombre: `mu-plugins`

5. **Entra a la carpeta `mu-plugins/`**

6. **Sube archivos** (botón "Subir"):
   - `voseda-auto-activator.php`
   - `voseda-form-hardcode.php`
   - `voseda-cf7-styles.php`
   - `README.md` (opcional)

7. **Verifica permisos:**
   - Selecciona cada archivo
   - Click derecho → **Permisos**
   - Debe ser `644` (rw-r--r--)

---

## 🎨 PASO 3: Actualizar el Tema

### Opción A: Editor de WordPress (Más rápido)

1. **WordPress Admin → Apariencia → Editor de archivos de tema**

2. **IMPORTANTE:** Si aparece advertencia de seguridad, acepta

3. **En el panel derecho:**
   - Busca `page-contacto.php` en la lista
   - Click para abrir

4. **Reemplaza todo el contenido** con el nuevo archivo

5. **Actualizar archivo**

### Opción B: Plugin "File Manager" (Más visual)

1. **Instala plugin File Manager:**
   - Plugins → Añadir nuevo
   - Busca: "File Manager" by mndpsingh287
   - Instalar y activar

2. **Accede al File Manager:**
   - En el menú lateral aparece "File Manager"
   - Click para abrir

3. **Navega a:**
   ```
   wp-content/themes/voseda/
   ```

4. **Sube el nuevo `page-contacto.php`:**
   - Elimina el antiguo (opcional, mejor renombrar a `page-contacto-backup.php`)
   - Sube el nuevo

### Opción C: cPanel File Manager (Como backup)

1. cPanel → File Manager
2. Navega a: `/public_html/wp-content/themes/voseda/`
3. Selecciona `page-contacto.php`
4. **Editar** → Copia y pega el nuevo contenido
5. **Guardar**

---

## ✅ PASO 4: Verificar que todo funcione

### Checklist de verificación:

1. **Verifica mu-plugins activos:**
   ```
   WordPress Admin → Plugins → Must-Use
   ```
   Deberías ver:
   - Voseda Auto Activator
   - Voseda Form Hardcode Helper
   - Voseda Contact Form 7 Styles

2. **Verifica plugins normales activos:**
   ```
   WordPress Admin → Plugins
   ```
   Deberían estar activos:
   - ✅ Contact Form 7
   - ✅ Voseda Banner by IMaaS_Group

3. **Prueba la página de contacto:**
   ```
   https://voseda.com/contacto
   ```
   Debe mostrar el formulario Contact Form 7

4. **Prueba el footer banner:**
   - Scroll hasta abajo en cualquier página
   - Debe aparecer el banner
   - Configúralo en: **Footer Banner** (menú lateral)

---

## 🔧 CONFIGURACIÓN DEL FOOTER BANNER

1. **WordPress Admin → Footer Banner** (menú lateral)

2. **Configuración básica:**
   ```
   ☑ Banner habilitado
   Color de fondo: #000000 (o el que prefieras)
   Color de texto: #ffffff
   Texto principal: "Tu mensaje aquí"
   ```

3. **Configurar botón CTA:**
   ```
   Texto del botón: "Comenzar"
   URL del botón: https://voseda.com/contacto
   Color botón: #ff6b6b
   ```

4. **Subir imagen hover** (opcional):
   - Dimensiones recomendadas: 900x300px
   - Aparecerá al hacer hover sobre el banner

5. **Guardar cambios**

---

## 📧 CONFIGURACIÓN DE CONTACT FORM 7

### Configurar email de recepción:

1. **WordPress Admin → Contact → Contact Forms**

2. **Edita "Formulario contacto"**

3. **Pestaña "Mail":**
   ```
   A (destinatario): info@voseda.com
   De: [your-name] <wordpress@voseda.com>
   Asunto: Nuevo contacto desde Voseda.com
   Reply-To: [email]
   ```

4. **Mensaje (personaliza esto):**
   ```
   Nuevo mensaje de contacto:

   Nombre: [nombre]
   Empresa: [empresa]
   Email: [email]
   Teléfono: [telefono]
   País: [pais]
   Interés: [interes]

   Mensaje:
   [mensaje]

   ---
   Enviado desde https://voseda.com/contacto
   ```

5. **Guardar**

### Probar email funcionando:

**Instala WP Mail SMTP (recomendado):**

1. **Plugins → Añadir nuevo**
2. Busca: **"WP Mail SMTP"**
3. Instalar y activar
4. Configurar con tus credenciales de email
5. Enviar email de prueba

---

## 🎯 RESUMEN RÁPIDO - TODO DESDE WORDPRESS

### Tiempo estimado: 15 minutos

```
1. ✅ Subir plugin footer banner     [5 min]
   → Plugins → Añadir nuevo → Subir plugin

2. ✅ Subir mu-plugins                [5 min]
   → cPanel File Manager → mu-plugins/

3. ✅ Actualizar page-contacto.php    [3 min]
   → Apariencia → Editor de archivos

4. ✅ Configurar Contact Form 7       [2 min]
   → Contact → Contact Forms → Editar

5. ✅ Verificar todo funcione         [2 min]
   → Visitar voseda.com/contacto
```

---

## 🚫 PROBLEMAS COMUNES

### El editor de temas está deshabilitado

**Solución:** Usa cPanel File Manager o plugin "File Manager"

### No aparece Contact Form 7 en el formulario

**Solución:**
```
1. Verifica que CF7 esté instalado y activo
2. Verifica que mu-plugins estén subidos
3. Limpia caché (si usas plugin de caché)
```

### Los mu-plugins no aparecen

**Solución:**
```
1. Verifica carpeta: debe ser wp-content/mu-plugins/
2. Verifica archivos estén directamente en mu-plugins/
   (no en subcarpeta)
3. Permisos deben ser 644
```

### Footer banner no aparece

**Solución:**
```
1. WordPress Admin → Footer Banner
2. Verificar que esté habilitado
3. Limpiar caché del sitio
4. Refrescar con Ctrl+Shift+R
```

---

## 📱 MÉTODO ALTERNATIVO: WordPress App Mobile

Si prefieres hacerlo desde móvil:

1. **Descarga WordPress App** (iOS/Android)
2. Conecta tu sitio
3. Ve a **Plugins** → Instala desde ahí
4. Para archivos, usa cPanel mobile

---

## 💡 PLUGINS ÚTILES PARA DESARROLLO

### File Manager
- Gestionar archivos desde WordPress
- Editar código directamente
- Subir/descargar archivos

### Code Snippets
- Agregar código PHP sin editar functions.php
- Útil para funciones personalizadas

### WP Mail SMTP
- Configurar email correctamente
- Evitar que emails vayan a spam

---

## 🔐 SEGURIDAD

Después de subir todo:

1. **Desactiva el editor de temas:**
   - Edita `wp-config.php` y agrega:
   ```php
   define('DISALLOW_FILE_EDIT', true);
   ```

2. **Limita acceso a File Manager:**
   - Solo úsalo cuando necesites
   - Desactívalo después

3. **Backup regular:**
   - Instala plugin "UpdraftPlus"
   - Configura backups automáticos

---

## ✅ CHECKLIST FINAL

Después de completar todo:

- [ ] Plugin footer banner instalado y activo
- [ ] mu-plugins subidos (3 archivos .php)
- [ ] page-contacto.php actualizado
- [ ] Contact Form 7 activo y configurado
- [ ] Email de contacto configurado
- [ ] Formulario probado y funciona
- [ ] Footer banner visible y configurado
- [ ] Sitio revisado en móvil
- [ ] Backup creado

---

**¿Necesitas los archivos listos?**

Tengo preparados:
- ✅ voseda-footer-banner.zip (para Plugins → Subir)
- ✅ 3 archivos .php para mu-plugins (vía cPanel)
- ✅ page-contacto.php actualizado

**¿Prefieres que cree un ZIP único con todo?**
Puedo empaquetar todo en un solo archivo para que sea más fácil.

---

**Desarrollado por:** IMaaS Group
**Soporte:** https://voseda.com
**Última actualización:** Octubre 2025
