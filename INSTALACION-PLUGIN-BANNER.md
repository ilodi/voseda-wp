# 📦 Instalación del Plugin Voseda Footer Banner v1.2.0

## 📍 Ubicación del archivo ZIP

```
/Users/lodi/Documents/imaas/sites/voseda/voseda-footer-banner-v1.2.0.zip
```

**Tamaño:** 15 KB
**Versión:** 1.2.0
**Última actualización:** 24 de Octubre, 2025

---

## 🚀 Método 1: Instalación desde WordPress Admin (RECOMENDADO)

### Paso 1: Desactivar plugin anterior (si existe)

1. Ve a **WordPress Admin** → **Plugins**
2. Busca "Voseda Footer Banner" o "Voseda Banner"
3. Haz clic en **"Desactivar"**
4. **NO ELIMINES** el plugin todavía (conserva la configuración)

### Paso 2: Subir el nuevo plugin

1. Ve a **Plugins** → **Añadir nuevo**
2. Haz clic en **"Subir plugin"** (arriba)
3. Haz clic en **"Seleccionar archivo"**
4. Selecciona: `voseda-footer-banner-v1.2.0.zip`
5. Haz clic en **"Instalar ahora"**

### Paso 3: Activar el plugin

1. WordPress te preguntará si quieres **reemplazar** el plugin existente
2. Haz clic en **"Reemplazar plugin actual"**
3. Espera a que termine la instalación
4. Haz clic en **"Activar plugin"**

### Paso 4: Verificar

1. Ve a **Footer Banner** en el menú lateral
2. Verifica que la versión sea **v1.2.0** (aparece arriba del título)
3. Revisa que tu configuración anterior se haya mantenido

---

## 🔧 Método 2: Instalación vía FTP (Manual)

### Para HostGator o cualquier hosting con FTP:

1. **Conectarse por FTP** a tu servidor
2. Navegar a: `public_html/wp-content/plugins/`
3. **Hacer backup** de la carpeta actual:
   - Renombrar `voseda-footer-banner/` a `voseda-footer-banner-backup/`
4. **Descomprimir** el archivo `voseda-footer-banner-v1.2.0.zip` en tu computadora
5. **Subir** la carpeta `voseda-footer-banner/` completa al servidor
6. Ir al **WordPress Admin** → **Plugins**
7. Activar "Voseda Footer Banner"

---

## ✅ Verificación post-instalación

### 1. Verificar versión

- En **WordPress Admin** → **Footer Banner**
- Debe aparecer: **"Footer Banner v1.2.0"**

### 2. Probar nueva funcionalidad

1. En el campo **"Texto Principal"** escribe:
   ```
   Próximo evento [25 de Octubre] a las [6:00 PM]
   ```

2. Haz clic en **"Guardar configuración"**

3. Visita tu sitio web

4. En el footer, verifica que las palabras entre corchetes `[25 de Octubre]` y `[6:00 PM]` se vean:
   - Más grandes (1.05x)
   - En semi-negrita (font-weight: 600)

### 3. Verificar que no haya errores

- No debe aparecer ningún mensaje de error en WordPress
- El banner debe seguir funcionando exactamente igual
- La imagen hover debe funcionar correctamente
- El botón CTA debe funcionar

---

## 🆕 Nueva funcionalidad v1.2.0

### Texto destacado con `[texto]`

**Sintaxis:**
```
Usa corchetes para [destacar] palabras importantes
```

**Ejemplos:**

```
✅ Evento especial el [15 de Marzo]
✅ Descuento del [50%] este fin de semana
✅ Solo quedan [3 días] para inscribirte
✅ Horario: [Lunes a Viernes] de [9 AM a 6 PM]
✅ Nuevo curso [Marketing Digital] disponible
```

**Resultado visual:**
- El texto entre `[corchetes]` se mostrará **más grande** y **en negrita**
- Perfecto para destacar fechas, horarios, descuentos, números

---

## 📋 Archivos incluidos en el ZIP

```
voseda-footer-banner/
├── voseda-footer-banner.php         (archivo principal)
├── admin/
│   └── settings-page.php            (panel de administración)
├── public/
│   └── render-banner.php            (renderizado del banner)
└── assets/
    ├── css/
    │   ├── style.css                (estilos del banner)
    │   └── admin.css                (estilos del admin)
    └── js/
        ├── banner.js                (JavaScript del banner)
        └── admin.js                 (JavaScript del admin)
```

---

## 🔄 Rollback (si algo sale mal)

Si tienes algún problema, puedes volver a la versión anterior:

### Vía FTP:
1. Eliminar carpeta `voseda-footer-banner/`
2. Renombrar `voseda-footer-banner-backup/` a `voseda-footer-banner/`
3. Activar el plugin en WordPress

### Vía WordPress Admin:
1. Desactivar el plugin
2. Eliminar el plugin
3. Subir la versión anterior desde backup

---

## 🐛 Solución de problemas

### El plugin no se instala
- **Causa:** Permisos de archivos incorrectos
- **Solución:** Verificar permisos de la carpeta `wp-content/plugins/` (debe ser 755)

### La versión no se actualiza
- **Causa:** Caché de WordPress
- **Solución:** Desactivar y volver a activar el plugin

### El texto destacado no funciona
- **Causa:** Caché del navegador
- **Solución:** Limpiar caché (Ctrl+Shift+R o Cmd+Shift+R)

### Los estilos no se aplican
- **Causa:** Caché de CSS
- **Solución:** En el admin, ir a **Settings** → **Permalinks** y hacer clic en "Guardar cambios"

---

## 📞 Soporte

**Desarrollado por:** IMaaS Group
**Cliente:** VOSEDA
**Versión:** 1.2.0
**Fecha:** 24 de Octubre, 2025

Para soporte técnico, contactar al equipo de desarrollo.

---

## 📝 Changelog resumido

**v1.2.0 (24 Oct 2025)**
- ✨ Nueva funcionalidad: Texto destacado con sintaxis `[texto]`
- 🎨 Mejoras visuales en el panel de administración
- 📖 Documentación mejorada

**v1.1.1 (versión anterior)**
- 🖼️ Soporte para imágenes hover 1080x1080
- 🎨 Efecto glassmorphism
- ⏱️ Display delay configurable

---

## ✅ Checklist de instalación

- [ ] Hacer backup del plugin actual
- [ ] Descargar `voseda-footer-banner-v1.2.0.zip`
- [ ] Ir a WordPress Admin → Plugins → Añadir nuevo
- [ ] Subir archivo ZIP
- [ ] Reemplazar plugin existente
- [ ] Activar plugin
- [ ] Verificar versión v1.2.0
- [ ] Probar funcionalidad de texto destacado `[texto]`
- [ ] Verificar que el banner funciona correctamente
- [ ] Limpiar caché del navegador
- [ ] Verificar en producción (si aplica)

---

¡Listo para instalar! 🚀
