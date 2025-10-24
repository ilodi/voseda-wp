# Changelog - Voseda Footer Banner v1.2.0

**Fecha:** 24 de Octubre, 2025
**Versión anterior:** v1.1.1
**Versión actual:** v1.2.0

## 🎯 Nueva Funcionalidad: Texto Destacado

### Resumen
Se agregó soporte para destacar palabras o frases importantes usando la sintaxis `[texto]`.

### Cómo funciona

En el campo "Texto Principal" del panel de administración, ahora puedes usar corchetes `[]` para resaltar texto:

**Ejemplo:**
```
Únete a nuestro evento el [15 de Marzo] a las [5:00 PM]
```

**Resultado:**
El texto dentro de los corchetes se mostrará con:
- `font-weight: 600` (semi-negrita)
- `font-size: 1.05em` (5% más grande)

### Casos de uso
- Destacar fechas importantes
- Resaltar horarios
- Enfatizar datos numéricos
- Llamar la atención sobre palabras clave

## 📝 Archivos modificados

1. **voseda-footer-banner.php**
   - Versión actualizada: `1.1.1` → `1.2.0`
   - Descripción actualizada con nueva funcionalidad

2. **public/render-banner.php**
   - Nueva función: `voseda_fb_process_highlight_text()`
   - Procesamiento de texto con regex para convertir `[texto]` en `<span class="voseda-highlight">texto</span>`
   - Sanitización segura con `wp_kses()`

3. **assets/css/style.css**
   - Nuevo selector: `.voseda-banner-text .voseda-highlight`
   - Estilos:
     ```css
     .voseda-banner-text .voseda-highlight {
         font-weight: 600;
         font-size: 1.05em;
         color: inherit;
     }
     ```
   - Comentarios opcionales para agregar gradientes de color en el futuro

4. **admin/settings-page.php**
   - Nuevo tip/ayuda visual en el campo "Texto Principal"
   - Instrucciones claras sobre cómo usar la funcionalidad

## 🔒 Seguridad

- Se usa `preg_replace()` de forma segura para procesar el texto
- Se implementa `wp_kses()` para sanitizar HTML y permitir solo tags `<span>` con clase específica
- No hay riesgo de XSS o inyección de código

## 🧪 Testing

### Para probar en local:

1. Ir a **WordPress Admin** → **Footer Banner**
2. En "Texto Principal" escribir:
   ```
   Próximo evento [25 de Octubre] a las [6:00 PM]
   ```
3. Guardar cambios
4. Visitar el sitio y ver el banner en el footer
5. Las palabras entre corchetes deben verse más grandes y en semi-negrita

### Ejemplos de prueba:

```
✅ Evento especial el [15 de Marzo]
✅ Descuento del [50%] este fin de semana
✅ Solo quedan [3 días] para inscribirte
✅ Horario: [Lunes a Viernes] de [9 AM a 6 PM]
```

## 🚀 Despliegue a producción

### Opción A: Subir archivos modificados vía FTP
Archivos a subir:
```
wp-content/plugins/voseda-footer-banner/
├── voseda-footer-banner.php
├── public/render-banner.php
├── assets/css/style.css
└── admin/settings-page.php
```

### Opción B: Sincronizar todo el plugin
Subir toda la carpeta `voseda-footer-banner/` completa

### Opción C: Git (si tienes acceso SSH)
```bash
git add wp-content/plugins/voseda-footer-banner/
git commit -m "feat: Add text highlighting feature with [text] syntax v1.2.0"
git push origin main
```

## 📋 Checklist de despliegue

- [ ] Hacer backup del plugin actual en producción
- [ ] Subir archivos modificados a producción
- [ ] Ir al panel de administración de WordPress en producción
- [ ] Verificar que la versión se actualizó a `v1.2.0`
- [ ] Probar la funcionalidad con texto de ejemplo
- [ ] Verificar en navegadores: Chrome, Safari, Firefox, Mobile

## 🎨 Personalización adicional (opcional)

Si en el futuro quieres agregar color con gradiente al texto destacado, descomenta las líneas en `style.css`:

```css
.voseda-banner-text .voseda-highlight {
    font-weight: 600;
    font-size: 1.05em;
    /* Descomentar para gradiente verde VOSEDA */
    background: linear-gradient(135deg, rgb(23, 152, 58), rgb(125, 184, 27));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
```

## ✅ Compatibilidad

- WordPress: 5.0+
- PHP: 7.4+
- Navegadores: Chrome, Firefox, Safari, Edge (últimas 2 versiones)
- Responsive: ✅ Mobile, Tablet, Desktop

---

**Desarrollado por:** IMaaS Group
**Cliente:** VOSEDA
**Fecha:** Octubre 2025
