# Solución: Página de Contacto no carga

## 🔴 Problema

https://voseda.com/contacto/ no abre o muestra página en blanco

---

## ✅ SOLUCIÓN RÁPIDA

### Opción 1: Sincronizar archivo actualizado (Recomendado)

El archivo `page-contacto.php` ha sido actualizado con un fallback que funciona aunque los mu-plugins no estén cargados.

**Con Forklift:**
```
1. Sincroniza:
   Local:  /wp-content/themes/voseda/page-contacto.php
   Remoto: /public_html/wp-content/themes/voseda/page-contacto.php

2. Permisos: 644

3. Limpia caché
```

### Opción 2: Usar template simplificado (Plan B)

Si el problema persiste, usa `page-contacto-simple.php`:

**Con Forklift:**
```
1. Sube:
   Local:  /wp-content/themes/voseda/page-contacto-simple.php
   Remoto: /public_html/wp-content/themes/voseda/

2. En WordPress Admin:
   Páginas → Contacto → Editar
   → Template: "Contacto Simple"
   → Actualizar
```

---

## 🔍 Diagnóstico

### Posibles causas:

1. **Los mu-plugins no están sincronizados**
   - El archivo llama a `voseda_render_contact_form()`
   - Esta función está en `/mu-plugins/voseda-form-hardcode.php`
   - Si falta, causa error

2. **Contact Form 7 no está activo**
   - Verifica: WordPress Admin → Plugins
   - "Contact Form 7" debe estar activo

3. **Error de sintaxis PHP**
   - Ya corregido en la versión actualizada

4. **Caché mostrando versión antigua**
   - Limpia caché de WordPress
   - Limpia caché del navegador

---

## 🔧 CAMBIOS REALIZADOS en page-contacto.php

### Antes (causaba error):
```php
<?php voseda_render_contact_form(); ?>
```

### Ahora (con fallback):
```php
<?php
// Usar función helper si está disponible, si no usar shortcode directo
if (function_exists('voseda_render_contact_form')) {
    voseda_render_contact_form();
} else {
    // Fallback: usar shortcode directo
    echo do_shortcode('[contact-form-7 id="78a0090" title="Formulario contacto"]');
}
?>
```

### Beneficios:
- ✅ Funciona aunque mu-plugins no estén cargados
- ✅ Usa el helper si está disponible
- ✅ Fallback al shortcode de CF7 directamente
- ✅ No causa error fatal

---

## 📋 Checklist de Verificación

### 1. Verifica que Contact Form 7 esté activo

**WordPress Admin:**
```
Plugins → Contact Form 7 (debe estar activo)
```

Si no está activo:
```
→ Activar
```

### 2. Verifica que el formulario existe

**WordPress Admin:**
```
Contact → Contact Forms
→ Debe haber: "Formulario contacto" (ID: 78a0090)
```

### 3. Sincroniza mu-plugins (opcional pero recomendado)

**Con Forklift:**
```
Local:  /wp-content/mu-plugins/
Remoto: /public_html/wp-content/mu-plugins/

Archivos a subir:
- voseda-auto-activator.php
- voseda-form-hardcode.php
- voseda-cf7-styles.php
- README.md
```

### 4. Sincroniza page-contacto.php

```
Local:  /wp-content/themes/voseda/page-contacto.php
Remoto: /public_html/wp-content/themes/voseda/page-contacto.php
```

### 5. Limpia caché

**Si tienes plugin de caché:**
```
WordPress Admin → Plugin de caché
→ Purge All Cache / Clear All Cache
```

**Navegador:**
```
Ctrl + Shift + R (Windows)
Cmd + Shift + R (Mac)
```

### 6. Verifica permisos

**Por SSH o cPanel Terminal:**
```bash
chmod 644 /public_html/wp-content/themes/voseda/page-contacto.php
```

---

## 🐛 Debugging

### Ver errores PHP

**Opción 1 - Activar modo debug temporalmente:**

Edita `wp-config.php` (en la raíz):
```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);
```

Luego visita `/contacto/` y verás el error específico.

**Opción 2 - Ver log de errores:**
```
/public_html/wp-content/debug.log
```

### Probar shortcode directamente

**Crea una página de prueba:**
```
WordPress Admin → Páginas → Añadir nueva
Título: Test Contacto
Contenido: [contact-form-7 id="78a0090" title="Formulario contacto"]
→ Publicar
```

Si esta página funciona, el problema es el template.

---

## 🚀 SOLUCIÓN PASO A PASO

### Método 1: Actualizar template (Preferido)

```
1. Sincroniza page-contacto.php actualizado
2. Sincroniza mu-plugins/ (si no lo has hecho)
3. Limpia caché
4. Prueba https://voseda.com/contacto/
```

### Método 2: Template simplificado (Si método 1 falla)

```
1. Sube page-contacto-simple.php
2. WordPress Admin → Páginas → Contacto → Editar
3. Template → "Contacto Simple"
4. Actualizar
5. Prueba https://voseda.com/contacto/
```

### Método 3: Recrear página (Último recurso)

```
1. Crea nueva página: "Contacto Nuevo"
2. Slug: contacto-nuevo
3. Template: Contacto Simple
4. Contenido: Solo el shortcode de CF7
5. Publicar
6. Prueba primero /contacto-nuevo/
7. Si funciona, cambia el slug a "contacto"
```

---

## 📝 Archivos disponibles

### page-contacto.php (Actualizado)
- ✅ Con fallback al shortcode directo
- ✅ Funciona con y sin mu-plugins
- ✅ Incluye todas las animaciones y estilos
- ✅ **Usa este primero**

### page-contacto-simple.php (Respaldo)
- ✅ Versión minimalista
- ✅ Sin dependencias de mu-plugins
- ✅ Solo shortcode directo de CF7
- ✅ Sin animaciones JavaScript complejas
- ✅ **Usa este si el principal falla**

---

## ✅ Testing

Después de aplicar la solución:

### 1. Prueba la página
```
https://voseda.com/contacto/
```

### 2. Verifica elementos:
- [ ] Página carga sin error
- [ ] Se ve el hero con "Contacto"
- [ ] Formulario aparece
- [ ] Campos se muestran correctamente
- [ ] Botón "Enviar mensaje" visible

### 3. Prueba parámetro URL:
```
https://voseda.com/contacto/?interes=Ciberseguridad
```
- [ ] Campo "Interés principal" debe pre-seleccionar "Ciberseguridad"

### 4. Prueba envío:
- [ ] Completa formulario
- [ ] Click "Enviar"
- [ ] Mensaje de éxito aparece
- [ ] Email se recibe

---

## 📞 Si sigue sin funcionar

### Revisa estos puntos:

1. **Contact Form 7 instalado y activo**
   ```
   Plugins → Contact Form 7 (activo)
   ```

2. **Formulario existe con ID correcto**
   ```
   Contact → Contact Forms
   → "Formulario contacto" (78a0090)
   ```

3. **Template asignado correctamente**
   ```
   Páginas → Contacto → Template: "Contacto"
   ```

4. **Permalink funciona**
   ```
   Settings → Permalinks → Save Changes
   ```

5. **No hay conflicto de plugins**
   ```
   Desactiva otros plugins temporalmente
   Prueba solo con CF7 activo
   ```

---

## 🔄 Rollback (si nada funciona)

Si después de todo sigue sin funcionar:

### Opción 1: Restaurar versión anterior

Si tienes backup del template anterior:
```
Sube la versión antigua de page-contacto.php
```

### Opción 2: Crear página desde cero

```
1. Páginas → Añadir nueva
2. Título: Contacto
3. No uses template, usa el editor de Gutenberg
4. Agrega bloque de Shortcode
5. Pega: [contact-form-7 id="78a0090"]
6. Publica
```

### Opción 3: Soporte

Contacta soporte con:
- Screenshot del error
- Contenido de debug.log
- Lista de plugins activos
- Versión de WordPress

---

## 📄 Resumen Ejecutivo

**Archivo principal actualizado:**
- ✅ page-contacto.php (con fallback)

**Archivo de respaldo creado:**
- ✅ page-contacto-simple.php

**Para sincronizar:**
1. Sube page-contacto.php actualizado
2. (Opcional) Sube mu-plugins/
3. Limpia caché
4. Prueba

**Si falla:**
1. Usa page-contacto-simple.php
2. Cambia template en WordPress Admin
3. Prueba

---

**Última actualización:** Octubre 2025
**Archivos:** page-contacto.php (actualizado), page-contacto-simple.php (nuevo)
