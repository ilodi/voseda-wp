# Solución: Banner muestra dimensiones antiguas (700x400)

## 🔍 Problema

Después de actualizar el plugin, el panel admin aún muestra "700x400px" en lugar de "1080x1080px".

## ✅ Causa

Esto se debe al **caché del navegador** o **caché de WordPress** que está mostrando la versión antigua de la página.

---

## 🚀 SOLUCIÓN RÁPIDA

### Opción 1: Limpiar caché del navegador (Más rápido)

**Chrome / Edge:**
```
1. Abre el panel admin: https://voseda.com/wp-admin
2. Presiona: Ctrl + Shift + R (Windows) o Cmd + Shift + R (Mac)
3. Esto fuerza recarga sin caché
```

**Safari:**
```
1. Cmd + Option + E (vaciar caché)
2. Luego Cmd + R (recargar)
```

**Firefox:**
```
1. Ctrl + Shift + R (Windows) o Cmd + Shift + R (Mac)
```

### Opción 2: Modo incógnito (Para verificar)

```
1. Abre ventana de incógnito/privada
2. Ve a: https://voseda.com/wp-admin
3. Login y ve a Footer Banner
4. Debe mostrar "1080x1080px"
```

---

## 🔧 SOLUCIÓN COMPLETA

### 1. Limpiar caché de WordPress

Si usas un plugin de caché (WP Super Cache, W3 Total Cache, etc.):

```
WordPress Admin → Plugins
→ Busca tu plugin de caché
→ Click en "Purge Cache" o "Clear Cache"
```

### 2. Subir plugin por ZIP (Forzar actualización)

**Paso a paso:**

1. **Desactiva el plugin actual:**
   ```
   WordPress Admin → Plugins
   → Busca "Voseda Banner"
   → Click "Desactivar"
   ```

2. **Elimina el plugin:**
   ```
   → Click "Eliminar"
   (No te preocupes, la configuración se guarda en la base de datos)
   ```

3. **Sube la nueva versión:**
   ```
   Plugins → Añadir nuevo
   → Subir plugin
   → Selecciona: voseda-footer-banner.zip (v1.1.1)
   → Instalar ahora
   ```

4. **Activa el plugin:**
   ```
   → Activar plugin
   ```

5. **Verifica la versión:**
   ```
   Ve a Footer Banner
   → Arriba debe decir: "v1.1.1"
   → Debe verse un banner morado/azul muy visible
   → Dice: "1080 x 1080 píxeles"
   ```

### 3. Limpiar caché del navegador

```
Ctrl + Shift + R (o Cmd + Shift + R en Mac)
```

---

## 📦 Archivo actualizado

**Versión:** v1.1.1
**Archivo:** voseda-footer-banner.zip (14 KB)
**Ubicación:** `/wp-content/plugins/voseda-footer-banner.zip`

---

## ✅ Cómo verificar que está actualizado

### 1. Versión del plugin

```
WordPress Admin → Footer Banner
→ Al lado del título debe decir: "v1.1.1"
```

### 2. Banner visual nuevo

Debe verse un banner morado/azul con:
```
📱 Usa imágenes de Instagram/Facebook directamente
🎯 DIMENSIONES CORRECTAS: 1080 x 1080 píxeles
```

### 3. En la sección de imagen

Debe decir:
```
📐 Dimensiones recomendadas: 1080x1080px
📱 Compatible con: Desktop, tablet, iPhone 15 Pro Max
```

---

## 🔄 Alternativa: Subir por FTP

Si prefieres actualizar por FTP:

### Paso 1: Backup

```
1. Conecta por FTP
2. Descarga: /public_html/wp-content/plugins/voseda-footer-banner/
3. Guarda como backup
```

### Paso 2: Reemplazar archivos

**Opción A - Reemplazar carpeta completa:**
```
1. Elimina: /public_html/wp-content/plugins/voseda-footer-banner/
2. Sube y extrae el nuevo ZIP
```

**Opción B - Reemplazar archivos específicos:**
```
Sube y reemplaza:
1. voseda-footer-banner.php (v1.1.1)
2. admin/settings-page.php (banner nuevo)
3. assets/css/style.css (responsive)
```

### Paso 3: Limpiar caché

```
1. WordPress Admin → Settings → Permalinks → Save
   (Esto refresca el sistema)
2. Si tienes plugin de caché, púrgalo
3. Ctrl + Shift + R en el navegador
```

---

## 🧪 Testing

### Checklist de verificación:

- [ ] Versión muestra v1.1.1
- [ ] Banner morado/azul visible en admin
- [ ] Dice "1080 x 1080 píxeles" claramente
- [ ] Sección de imagen menciona iPhone 15 Pro Max
- [ ] No aparece "700x400" en ningún lado

---

## 📱 Diferencias entre versiones

### Versión anterior (puede estar cacheada):
```
❌ Decía: 900x300px o 700x400px
❌ Banner amarillo simple
❌ Sin mención de iPhone 15 Pro Max
```

### Versión nueva (v1.1.1):
```
✅ Dice: 1080x1080px
✅ Banner morado/azul destacado
✅ Menciona Instagram/Facebook
✅ Optimizado para iPhone 15 Pro Max
✅ Incluye link a TinyPNG
```

---

## 💡 Por qué usar ZIP en lugar de sincronización

### Problemas con sincronización FTP:
- Puede no sobrescribir archivos correctamente
- Caché del servidor puede mantener versión antigua
- Permisos de archivos pueden causar problemas

### Ventajas de subir por ZIP desde WordPress:
- ✅ WordPress fuerza actualización completa
- ✅ Limpia automáticamente archivos antiguos
- ✅ Actualiza versión en base de datos
- ✅ Refresca caché interno

---

## 🆘 Si aún no funciona

### 1. Verifica permisos de archivos

```bash
# Por SSH o cPanel Terminal
chmod 755 /public_html/wp-content/plugins/voseda-footer-banner/
chmod 644 /public_html/wp-content/plugins/voseda-footer-banner/admin/settings-page.php
```

### 2. Verifica que no haya errores PHP

```
WordPress Admin → Tools → Site Health
→ Info → Server
→ Revisa errores PHP
```

### 3. Desactiva otros plugins temporalmente

A veces otros plugins de caché interfieren:
```
1. Desactiva todos los plugins excepto Voseda Banner
2. Verifica si se ve correctamente
3. Reactiva uno por uno para encontrar conflicto
```

### 4. Revisa console del navegador

```
1. F12 (abrir DevTools)
2. Tab "Console"
3. Busca errores en rojo
4. Toma screenshot y envía para soporte
```

---

## 📞 Soporte

Si después de todos estos pasos aún ves "700x400":

1. Toma screenshots de:
   - Panel admin de Footer Banner
   - Console del navegador (F12 → Console)
   - Plugins instalados y versiones

2. Verifica:
   - ¿Qué navegador usas?
   - ¿Tienes plugins de caché activos?
   - ¿La versión muestra v1.1.1?

---

## ✅ Resumen Ejecutivo

**TL;DR:**
1. Sube `voseda-footer-banner.zip` por WordPress Admin
2. Desactiva → Elimina → Sube nuevo → Activa
3. Ctrl + Shift + R para refrescar
4. Debe decir v1.1.1 y mostrar 1080x1080px

**Tiempo estimado:** 5 minutos

---

**Última actualización:** Octubre 2025
**Versión del plugin:** v1.1.1
