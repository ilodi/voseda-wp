# 🎨 Aplicación de Degradado a Títulos

**Fecha:** 24 de Octubre, 2025
**Cambios:** Estilo de degradado aplicado a títulos principales

---

## ✅ Cambios Aplicados

### **Estilo de Degradado:**

El degradado que se está usando es la clase `.title-gradient` definida en `custom.css`:

```css
.section-title.title-gradient {
    color: transparent !important;
    background: linear-gradient(290deg, rgba(163, 189, 48, 1) 0%, rgba(1, 144, 69, 1) 70%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
```

**Colores:**
- Inicio: `rgba(163, 189, 48, 1)` (Verde lima VOSEDA)
- Final: `rgba(1, 144, 69, 1)` (Verde oscuro VOSEDA)
- Dirección: `290deg`

---

## 📄 Archivos Modificados

### 1. **page-nosotros.php** (7 títulos)

**Línea 64 - Título principal de intro:**
```html
<h2 class="section-title title-gradient text-center mb-5">Más que una empresa tecnológica: tu socio en transformación digital</h2>
```

**Línea 87 - Título sección "Lo que nos define":**
```html
<h2 class="section-title title-gradient mb-4">Lo que nos define</h2>
```

**Líneas 94, 101, 108, 115, 122 - Subtítulos de características:**
```html
<h4 class="fw-bold mb-3 title-gradient">Cultura centrada en el cliente</h4>
<h4 class="fw-bold mb-3 title-gradient">Expertise comprobado</h4>
<h4 class="fw-bold mb-3 title-gradient">Operación 24/7</h4>
<h4 class="fw-bold mb-3 title-gradient">Tecnología estratégica</h4>
<h4 class="fw-bold mb-3 title-gradient">Alianzas sólidas</h4>
```

---

### 2. **page-servicios.php** (6 títulos)

**Línea 77:**
```html
<h3 class="text-voseda-green title-gradient">Ciberseguridad integral</h3>
```

**Línea 99:**
```html
<h3 class="text-voseda-green title-gradient">Redes Empresariales</h3>
```

**Línea 121:**
```html
<h3 class="text-voseda-green title-gradient">Centro de Datos</h3>
```

**Línea 143:**
```html
<h3 class="text-voseda-green title-gradient">Infraestructura y cableado</h3>
```

**Línea 165:**
```html
<h3 class="text-voseda-green title-gradient">Servicios Profesionales</h3>
```

**Línea 187:**
```html
<h3 class="text-voseda-green title-gradient">NOC/SOC (24x7)</h3>
```

---

## 🎯 Títulos con Degradado

### **Página Home (ya tenía):**
✅ "Desde ciberseguridad hasta infraestructura crítica, resolvemos lo imposible para que tu empresa avance sin límites."

### **Página Nosotros (NUEVO - 7 títulos):**
✅ "Más que una empresa tecnológica: tu socio en transformación digital"
✅ "Lo que nos define"
✅ Cultura centrada en el cliente
✅ Expertise comprobado
✅ Operación 24/7
✅ Tecnología estratégica
✅ Alianzas sólidas

### **Página Servicios (NUEVO - 6 títulos):**
✅ Ciberseguridad integral
✅ Redes Empresariales
✅ Centro de Datos
✅ Infraestructura y cableado
✅ Servicios Profesionales
✅ NOC/SOC (24x7)

---

## 🧪 Para Probar en Local

1. **Refrescar navegador:**
   ```
   Mac: Cmd + Shift + R
   Windows: Ctrl + Shift + R
   ```

2. **Verificar páginas:**
   - `http://localhost:8080/nosotros/`
   - `http://localhost:8080/servicios/`

3. **Qué esperar:**
   - Los títulos ahora tienen degradado verde lima → verde oscuro
   - Mismo efecto que el título del home
   - Transición suave de colores

---

## 📦 Para Subir a Producción (FTP)

### **Archivos a subir:**

```
1. wp-content/themes/voseda/page-nosotros.php
2. wp-content/themes/voseda/page-servicios.php
3. wp-content/themes/voseda/assets/css/custom.css
```

**NOTA:** Se agregó estilo CSS para h3 y h4 con degradado.

### **Pasos FTP:**

1. Conectar a HostGator vía FTP
2. Ir a `public_html/wp-content/themes/voseda/`
3. **Hacer backup:**
   - Descargar `page-nosotros.php` → renombrar a `page-nosotros.php.backup`
   - Descargar `page-servicios.php` → renombrar a `page-servicios.php.backup`
4. **Subir archivos nuevos:**
   - Subir `page-nosotros.php`
   - Subir `page-servicios.php`
5. **Verificar en producción:**
   - Visitar `https://voseda.com/nosotros/`
   - Visitar `https://voseda.com/servicios/`
6. **Limpiar caché:**
   - Navegador: Ctrl+Shift+R
   - WordPress: Si tienes plugin de caché, limpiarlo

---

## 🔄 Cómo Revertir

Si algo sale mal:

### **Por FTP:**
1. Eliminar los archivos nuevos
2. Renombrar los backups quitando `.backup`

### **Manual:**
Solo quitar la clase `title-gradient` de los títulos:

```html
<!-- De esto: -->
<h2 class="section-title title-gradient text-center mb-5">Título</h2>

<!-- A esto: -->
<h2 class="section-title text-center mb-5">Título</h2>
```

---

## 📊 Resumen

| Página | Títulos Modificados | Estado |
|--------|---------------------|--------|
| **Home** | 1 (ya tenía) | ✅ Sin cambios |
| **Nosotros** | 7 nuevos (2 h2 + 5 h4) | ✅ Aplicado |
| **Servicios** | 6 nuevos (6 h3) | ✅ Aplicado |
| **CSS** | +14 líneas (h3/h4 gradient) | ✅ Aplicado |
| **Total** | 14 títulos con degradado | ✅ Completado |

---

## ✅ Checklist

**ANTES de subir a producción:**
- [ ] Probado en local
- [ ] Títulos se ven con degradado verde
- [ ] No hay errores visuales
- [ ] Cliente aprueba el estilo

**AL subir a producción:**
- [ ] Backup de archivos descargados
- [ ] Archivos subidos vía FTP
- [ ] Verificado en voseda.com
- [ ] Caché limpiado

**DESPUÉS de verificar:**
- [ ] Todo funciona correctamente
- [ ] Degradado se ve bien
- [ ] Sin errores de consola
- [ ] Cliente satisfecho con los cambios

---

## 🎨 Ejemplo Visual

**Efecto esperado:**
```
Ciberseguridad integral
└─ Verde lima → Verde oscuro (degradado suave)
```

**Compatibilidad:**
- ✅ Chrome / Edge / Brave (webkit)
- ✅ Firefox (moz)
- ✅ Safari (webkit)
- ✅ Móviles (todos los navegadores)

---

**Tiempo estimado de subida:** 5 minutos
**Riesgo:** Muy bajo (solo cambios visuales)
**Impacto:** Alto (títulos más atractivos, consistencia visual)

---

_Desarrollado por IMaaS Group para VOSEDA_
_Octubre 24, 2025_
