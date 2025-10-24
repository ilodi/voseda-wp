# Voseda Footer Banner - Changelog v1.1.0

## 🎉 Actualización v1.1.0 - Soporte para Imágenes 1080x1080

**Fecha:** Octubre 2025
**Tipo:** Feature Update

---

## ✨ Nuevas Características

### 📱 Soporte para Imágenes Cuadradas 1080x1080px

El plugin ahora está optimizado para imágenes en formato cuadrado (1080x1080px), el formato estándar de redes sociales (Instagram, Facebook, LinkedIn).

**Ventajas:**
- ✅ Usa la misma imagen de tus posts en redes sociales
- ✅ No necesitas crear imágenes en múltiples formatos
- ✅ Ahorra tiempo y recursos de diseño
- ✅ Consistencia visual entre web y redes sociales

### 🖼️ Object-fit: Cover Automático

La imagen ahora usa `background-size: cover` con `background-position: center` para:
- ✅ Ajustarse automáticamente a cualquier tamaño de pantalla
- ✅ Mantener proporciones sin distorsión
- ✅ Centrar el contenido principal de la imagen
- ✅ Verse perfecta en desktop, tablet y móvil

### 📱 Optimización para iPhone 15 Pro Max

Añadido soporte específico para:
- iPhone 15 Pro Max (430x932px)
- iPhone 15 Pro / 14 Pro (393x852px)
- iPhone SE y dispositivos pequeños (375px)
- Todos los dispositivos móviles modernos

**Mejoras móviles:**
- Altura de imagen optimizada por dispositivo
- Posicionamiento ajustado para evitar gesture bar
- Tamaños de fuente específicos por pantalla
- Border-radius adaptativo

---

## 🔧 Cambios Técnicos

### CSS Actualizado (`style.css`)

**Imagen hover principal:**
```css
.voseda-banner-hover-image {
    height: 400px; /* Aumentado de 300px */
    background-size: cover; /* Ya existía, mejorado */
    background-position: center center; /* Centrado perfecto */
    image-rendering: -webkit-optimize-contrast; /* Mejor calidad */
}
```

**Responsive por dispositivo:**
```css
/* Tablets */
@media (max-width: 768px) {
    .voseda-banner-hover-image {
        height: 350px;
    }
}

/* Móviles estándar */
@media (max-width: 480px) {
    .voseda-banner-hover-image {
        height: 300px;
    }
}

/* iPhone 15 Pro Max */
@media (max-width: 430px) and (min-height: 900px) {
    .voseda-banner-hover-image {
        height: 340px;
    }
}

/* iPhone 15 Pro / 14 Pro */
@media (max-width: 393px) and (min-height: 850px) {
    .voseda-banner-hover-image {
        height: 320px;
    }
}

/* iPhone SE y pequeños */
@media (max-width: 375px) {
    .voseda-banner-hover-image {
        height: 280px;
    }
}
```

### Documentación Actualizada

**Admin panel (`settings-page.php`):**
- Actualizada recomendación de dimensiones de 900x300px a 1080x1080px
- Añadida información sobre `object-fit: cover`
- Documentado soporte para iPhone 15 Pro Max
- Mejoradas las instrucciones visuales

---

## 📦 Archivos Modificados

```
voseda-footer-banner/
├── voseda-footer-banner.php        [v1.1.0 - header y VERSION]
├── assets/css/style.css             [responsive + image optimizations]
└── admin/settings-page.php          [documentación actualizada]
```

---

## 🚀 Cómo Actualizar

### Método 1: Desde WordPress Admin (Recomendado)

1. **Desactiva el plugin actual:**
   ```
   WordPress Admin → Plugins → Voseda Banner
   → Desactivar
   ```

2. **Sube la nueva versión:**
   ```
   Plugins → Añadir nuevo → Subir plugin
   → Selecciona: voseda-footer-banner.zip (v1.1.0)
   → Instalar ahora
   → Reemplazar plugin actual
   ```

3. **Activa el plugin:**
   ```
   → Activar plugin
   ```

4. **Verifica la versión:**
   ```
   Footer Banner → Debe decir v1.1.0
   ```

### Método 2: Por FTP/cPanel

1. **Backup del plugin actual:**
   ```
   Descarga: /public_html/wp-content/plugins/voseda-footer-banner/
   ```

2. **Elimina el plugin antiguo:**
   ```
   Borra carpeta: voseda-footer-banner/
   ```

3. **Sube el nuevo plugin:**
   ```
   Sube y extrae: voseda-footer-banner.zip
   En: /public_html/wp-content/plugins/
   ```

4. **Activa desde WordPress Admin**

### Método 3: Con Must-Use Plugins (Auto-activación)

Si tienes el `voseda-auto-activator.php` instalado:
- El plugin se activará automáticamente después de subir
- No necesitas activarlo manualmente

---

## 🎨 Recomendaciones de Imagen

### Dimensiones Ideales: 1080x1080px

**Por qué este tamaño:**
- ✅ Formato cuadrado estándar de Instagram
- ✅ Compatible con Facebook posts
- ✅ Funciona en LinkedIn
- ✅ Misma imagen para web y redes sociales

### Formatos Soportados:
- **JPG** - Recomendado para fotos (menor peso)
- **PNG** - Para imágenes con transparencias o texto
- **WebP** - Formato moderno (mejor compresión)

### Peso Recomendado:
- **Máximo:** 500KB
- **Óptimo:** 200-300KB
- **Herramientas:** TinyPNG, Squoosh, ImageOptim

### Contenido de la Imagen:
- Centra el contenido principal (se usa `cover`)
- Evita texto importante en los bordes
- Mantén el foco en el centro de la imagen
- Prueba en móvil para verificar recortes

---

## 🧪 Testing

### Prueba en estos dispositivos:

**Desktop:**
- [ ] Chrome (1920x1080)
- [ ] Safari (1440x900)
- [ ] Firefox (1920x1080)

**Tablet:**
- [ ] iPad (768x1024)
- [ ] iPad Pro (1024x1366)
- [ ] Android tablets (800x1280)

**Móvil:**
- [ ] iPhone 15 Pro Max (430x932)
- [ ] iPhone 15 Pro (393x852)
- [ ] iPhone SE (375x667)
- [ ] Samsung Galaxy S23 (360x800)
- [ ] Pixel 7 (412x915)

### Checklist de verificación:

- [ ] Imagen se ve completa sin recortes extraños
- [ ] Banner responsive funciona correctamente
- [ ] Hover funciona en desktop
- [ ] Banner no tapa contenido importante en móvil
- [ ] Velocidad de carga aceptable (<3 segundos)
- [ ] Imagen se centra correctamente

---

## 🐛 Problemas Conocidos y Soluciones

### La imagen se ve cortada en móvil

**Solución:** Asegúrate de que el contenido principal de tu imagen esté centrado. La imagen usa `object-fit: cover` y se centra automáticamente.

### La imagen no aparece en hover

**Verifica:**
1. Imagen subida correctamente en Footer Banner
2. URL de imagen válida
3. Caché del navegador limpio (Ctrl+Shift+R)
4. Console del navegador sin errores

### El banner tapa el gesture bar en iPhone

**Ya solucionado en v1.1.0:**
```css
@media (max-width: 430px) and (min-height: 900px) {
    .voseda-footer-banner {
        bottom: 16px; /* Ajustado para evitar gesture bar */
    }
}
```

---

## 💡 Consejos de Uso

### Reutiliza tus imágenes de redes sociales:

1. **Instagram:**
   - Usa el mismo post cuadrado (1080x1080)
   - Descarga la imagen original
   - Súbela al banner

2. **Eventos/Webinars:**
   - Crea un diseño cuadrado
   - Úsalo en Instagram, LinkedIn, Facebook
   - Mismo diseño en el banner del sitio

3. **Promociones:**
   - Diseño único en 1080x1080
   - Multi-canal (web + redes)
   - Ahorra tiempo de diseño

---

## 🔄 Compatibilidad

### Versiones de WordPress:
- ✅ WordPress 5.0+
- ✅ WordPress 6.0+
- ✅ WordPress 6.4+ (última)

### PHP:
- ✅ PHP 7.4+
- ✅ PHP 8.0+
- ✅ PHP 8.2+

### Navegadores:
- ✅ Chrome 90+
- ✅ Safari 14+
- ✅ Firefox 88+
- ✅ Edge 90+
- ✅ iOS Safari 14+
- ✅ Chrome Mobile

---

## 📝 Notas de Migración

### De v1.0.3 a v1.1.0:

**Cambios que afectan:**
- ✅ Dimensiones de imagen ahora 1080x1080 (antes 900x300)
- ✅ Altura de imagen hover aumentada
- ✅ Responsive mejorado

**NO afecta:**
- ✅ Configuración existente se mantiene
- ✅ Colores, textos, botones igual
- ✅ No requiere re-configuración
- ✅ Compatible con v1.0.3

**Recomendación:**
Si ya tienes una imagen 900x300, sigue funcionando perfectamente. Pero considera cambiar a 1080x1080 para mejor calidad en móviles.

---

## 📞 Soporte

**Desarrollado por:** IMaaS Group
**Sitio:** https://voseda.com
**Versión:** 1.1.0
**Última actualización:** Octubre 2025

---

## 🎯 Próximas Versiones (Roadmap)

### v1.2.0 (Planeado)
- [ ] Soporte para video en lugar de imagen
- [ ] Múltiples imágenes rotativas
- [ ] Animaciones personalizables
- [ ] Analytics integrado

### v1.3.0 (Futuro)
- [ ] A/B testing de banners
- [ ] Programación de banners por fecha
- [ ] Segmentación por página
- [ ] Editor visual drag & drop

---

**¿Tienes sugerencias?** Envíanos tus ideas para futuras versiones.
