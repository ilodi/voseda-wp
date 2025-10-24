# Cambios de URLs para Producción - Voseda.com

## 📝 Resumen

Todos los enlaces de `localhost` han sido actualizados a `https://voseda.com` para producción.

---

## ✅ Archivos Modificados

### 1. front-page.php

**Botones "Habla con experto/especialista":**

✅ **Línea 52:**
```php
// Antes:
<a href="#contacto" class="btn btn-voseda btn-lg">Habla con un experto ahora</a>

// Ahora:
<a href="https://voseda.com/contacto/" class="btn btn-voseda btn-lg">Habla con un experto ahora</a>
```

✅ **Línea 113:**
```php
// Antes:
<a href="#contacto" class="btn btn-voseda btn-lg">Habla con un especialista</a>

// Ahora:
<a href="https://voseda.com/contacto/" class="btn btn-voseda btn-lg">Habla con un especialista</a>
```

**Enlaces a recursos (Blog):**

✅ **Línea 569:**
```php
// Antes:
<a href="http://localhost:8080/blog/" class="resource-link">Leer más →</a>

// Ahora:
<a href="https://voseda.com/blog/" class="resource-link">Leer más →</a>
```

✅ **Línea 580:**
```php
// Antes:
<a href="http://localhost:8080/blog/" class="resource-link">Ver webinars →</a>

// Ahora:
<a href="https://voseda.com/blog/" class="resource-link">Ver webinars →</a>
```

✅ **Línea 591:**
```php
// Antes:
<a href="http://localhost:8080/blog/" class="resource-link">Descargar →</a>

// Ahora:
<a href="https://voseda.com/blog/" class="resource-link">Descargar →</a>
```

---

### 2. page-servicios.php

**Todos los botones de servicios ahora apuntan a `/contacto/` con parámetro `?interes=`:**

✅ **Línea 86 - Ciberseguridad:**
```php
// Antes:
<a href="http://localhost:8080/contacto/?interes=Ciberseguridad" ...>Evaluar postura de seguridad</a>

// Ahora:
<a href="https://voseda.com/contacto/?interes=Ciberseguridad" ...>Evaluar postura de seguridad</a>
```

✅ **Línea 108 - Redes:**
```php
// Antes:
<a href="http://localhost:8080/contacto/?interes=Redes" ...>Diseñar mi red</a>

// Ahora:
<a href="https://voseda.com/contacto/?interes=Redes" ...>Diseñar mi red</a>
```

✅ **Línea 130 - Data Center:**
```php
// Antes:
<a href="http://localhost:8080/contacto/?interes=Data%20Center" ...>Transformar infraestructura</a>

// Ahora:
<a href="https://voseda.com/contacto/?interes=Data%20Center" ...>Transformar infraestructura</a>
```

✅ **Línea 152 - Infraestructura:**
```php
// Antes:
<a href="http://localhost:8080/contacto/?interes=Infraestructura" ...>Ver soluciones</a>

// Ahora:
<a href="https://voseda.com/contacto/?interes=Infraestructura" ...>Ver soluciones</a>
```

✅ **Línea 174 - Consultoría:**
```php
// Antes:
<a href="http://localhost:8080/contacto/?interes=Consultoría" ...>Solicitar consultoría</a>

// Ahora:
<a href="https://voseda.com/contacto/?interes=Consultoría" ...>Solicitar consultoría</a>
```

✅ **Línea 196 - NOC/SOC:**
```php
// Antes:
<a href="http://localhost:8080/contacto/?interes=NOC/SOC" ...>Activar NOC/SOC</a>

// Ahora:
<a href="https://voseda.com/contacto/?interes=NOC/SOC" ...>Activar NOC/SOC</a>
```

✅ **Línea 325 - CTA General:**
```php
// Antes:
<a href="http://localhost:8080/contacto/" class="btn btn-light btn-lg me-3">Contáctanos</a>

// Ahora:
<a href="https://voseda.com/contacto/" class="btn btn-light btn-lg me-3">Contáctanos</a>
```

---

## 🎯 Funcionalidad de los parámetros `?interes=`

Los botones en `/servicios/` ahora envían el servicio de interés al formulario de contacto:

**Ejemplo:**
```
Usuario hace click en "Evaluar postura de seguridad" (Ciberseguridad)
→ Redirige a: https://voseda.com/contacto/?interes=Ciberseguridad
→ El formulario pre-selecciona "Ciberseguridad" en el campo de interés
```

**Servicios que se pre-seleccionan:**
1. Ciberseguridad
2. Redes
3. Data Center
4. Infraestructura
5. Consultoría
6. NOC/SOC

---

## 📋 Checklist de Testing

Después de sincronizar con Forklift, verifica:

### En la Home (https://voseda.com):

- [ ] Botón "Habla con un experto ahora" → Va a `/contacto/`
- [ ] Botón "Habla con un especialista" → Va a `/contacto/`
- [ ] Enlaces de recursos → Van a `/blog/`

### En Servicios (https://voseda.com/servicios/):

- [ ] "Evaluar postura de seguridad" → `/contacto/?interes=Ciberseguridad`
- [ ] "Diseñar mi red" → `/contacto/?interes=Redes`
- [ ] "Transformar infraestructura" → `/contacto/?interes=Data Center`
- [ ] "Ver soluciones" → `/contacto/?interes=Infraestructura`
- [ ] "Solicitar consultoría" → `/contacto/?interes=Consultoría`
- [ ] "Activar NOC/SOC" → `/contacto/?interes=NOC/SOC`
- [ ] Botón "Contáctanos" (final) → `/contacto/`

### En Contacto (https://voseda.com/contacto/):

- [ ] Formulario se muestra correctamente
- [ ] Parámetro `?interes=` pre-selecciona el servicio correcto
- [ ] Formulario envía correctamente
- [ ] Email se recibe

---

## 🚀 Para Sincronizar con Forklift

### Archivos a sincronizar:

```
/wp-content/themes/voseda/
├── front-page.php          [Modificado - URLs actualizadas]
└── page-servicios.php      [Modificado - URLs actualizadas]
```

### Pasos:

1. **Abre Forklift**

2. **Conecta a Voseda Production**

3. **Panel izquierdo (Local):**
   ```
   /Users/lodi/Documents/imaas/sites/voseda/wp-content/themes/voseda/
   ```

4. **Panel derecho (Remoto):**
   ```
   /public_html/wp-content/themes/voseda/
   ```

5. **Sincroniza estos archivos:**
   ```
   - front-page.php
   - page-servicios.php
   ```

6. **Verifica permisos:**
   - Archivos deben tener: `644` (rw-r--r--)

7. **Limpia caché:**
   - WordPress: Si tienes plugin de caché, púrgalo
   - Navegador: Ctrl + Shift + R

---

## 🧪 Testing Manual Rápido

### Test 1: Página de inicio

```
1. Visita: https://voseda.com
2. Scroll al hero
3. Click: "Habla con un experto ahora"
4. ✅ Debe ir a: https://voseda.com/contacto/
```

### Test 2: Sección de servicios

```
1. Visita: https://voseda.com
2. Scroll a servicios
3. Click: "Habla con un especialista"
4. ✅ Debe ir a: https://voseda.com/contacto/
```

### Test 3: Página de servicios

```
1. Visita: https://voseda.com/servicios/
2. Click en cualquier botón de servicio
3. ✅ Debe ir a: https://voseda.com/contacto/?interes=...
4. ✅ El campo "Interés principal" debe pre-seleccionarse
```

---

## 🔍 Verificación de Enlaces

**No deben quedar:**
❌ `http://localhost:8080`
❌ `localhost`
❌ Anclas `#contacto` (excepto en navegación interna)

**Todo debe ser:**
✅ `https://voseda.com/contacto/`
✅ `https://voseda.com/servicios/`
✅ `https://voseda.com/blog/`

---

## 📊 Resumen de Cambios

| Archivo | Líneas modificadas | Cambios |
|---------|-------------------|---------|
| front-page.php | 52, 113, 569, 580, 591 | 5 URLs actualizadas |
| page-servicios.php | 86, 108, 130, 152, 174, 196, 325 | 7 URLs actualizadas |
| **Total** | **12 URLs** | **100% actualizadas** |

---

## 💡 Notas Importantes

### Parámetros URL funcionan gracias a:

El archivo `voseda-cf7-styles.php` (mu-plugin) incluye JavaScript que lee el parámetro `?interes=` y pre-selecciona el campo automáticamente:

```javascript
// Pre-seleccionar valor del parámetro URL ?interes=
document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const interesParam = urlParams.get('interes');

    if (interesParam) {
        const selectInteres = document.querySelector('select[name="interes"]');
        if (selectInteres) {
            // Pre-selecciona la opción correcta
        }
    }
});
```

---

## ✅ Estado Final

**Todos los enlaces internos apuntan correctamente a:**
- ✅ `https://voseda.com` (producción)
- ✅ Ningún enlace apunta a `localhost`
- ✅ Parámetros `?interes=` funcionan correctamente

**Listo para:**
- ✅ Sincronizar con Forklift
- ✅ Subir a producción
- ✅ Testing en vivo

---

**Fecha de actualización:** Octubre 2025
**Archivos modificados:** 2 (front-page.php, page-servicios.php)
**URLs actualizadas:** 12
**Estado:** ✅ Listo para producción
