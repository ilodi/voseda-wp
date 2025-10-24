# Información del Formulario de Contacto - Voseda

## Contact Form 7 - ID: 78a0090

### Shortcode del formulario:
```
[contact-form-7 id="78a0090" title="Formulario contacto"]
```

### Uso en PHP (hardcode):
```php
<?php voseda_render_contact_form(); ?>
```

### Uso en contenido de WordPress:
Simplemente pega el shortcode en cualquier página o post:
```
[contact-form-7 id="78a0090"]
```

---

## Campos del Formulario

Según tu formulario anterior en page-contacto.php, deberías tener estos campos configurados en Contact Form 7:

### Campos Requeridos:
1. **Nombre y Apellidos** (text, required)
   - name: `nombre`

2. **Empresa** (text, required)
   - name: `empresa`

3. **Email corporativo** (email, required)
   - name: `email`

4. **Teléfono** (tel, required)
   - name: `telefono`

5. **País** (text, required)
   - name: `pais`

6. **Interés principal** (select, required)
   - name: `interes`
   - Opciones:
     - Ciberseguridad
     - Redes
     - Data Center
     - Infraestructura
     - Consultoría
     - NOC/SOC
     - Otro

### Campos Opcionales:
7. **Mensaje** (textarea)
   - name: `mensaje`

---

## Configuración en Contact Form 7

### 1. Editar el formulario en WordPress Admin:
```
WordPress Admin → Contact → Contact Forms
→ Edita "Formulario contacto" (ID: 78a0090)
```

### 2. Código del formulario (ejemplo):
```html
<label>Nombre y Apellidos <span class="required">*</span>
    [text* nombre class:form-control]
</label>

<label>Empresa <span class="required">*</span>
    [text* empresa class:form-control]
</label>

<label>Email corporativo <span class="required">*</span>
    [email* email class:form-control]
</label>

<label>Teléfono <span class="required">*</span>
    [tel* telefono class:form-control]
</label>

<label>País <span class="required">*</span>
    [text* pais class:form-control]
</label>

<label>Interés principal <span class="required">*</span>
    [select* interes class:form-select "Selecciona una opción" "Ciberseguridad" "Redes" "Data Center" "Infraestructura" "Consultoría" "NOC/SOC" "Otro"]
</label>

<label>Mensaje
    [textarea mensaje class:form-control placeholder "Cuéntanos más sobre tu proyecto o consulta..."]
</label>

[submit class:btn class:btn-voseda class:btn-lg class:px-5 "Enviar mensaje"]
```

### 3. Configuración de Email (Mail tab):

**A (Destinatario):**
```
info@voseda.com
```
O el email que prefieras recibir los mensajes

**De (From):**
```
[your-name] <wordpress@voseda.com>
```

**Asunto (Subject):**
```
Nuevo mensaje de contacto desde Voseda.com
```

**Cuerpo del mensaje (Message Body):**
```
Nuevo mensaje recibido desde el formulario de contacto de Voseda.com

Nombre: [nombre]
Empresa: [empresa]
Email: [email]
Teléfono: [telefono]
País: [pais]
Interés principal: [interes]

Mensaje:
[mensaje]

---
Este mensaje fue enviado desde el formulario de contacto en https://voseda.com/contacto
```

**Reply-To:**
```
[email]
```

### 4. Mensajes de respuesta (Messages tab):

**Mensaje enviado correctamente:**
```
¡Gracias por contactarnos! Tu mensaje ha sido enviado correctamente. Nos pondremos en contacto contigo lo antes posible.
```

**Error al enviar:**
```
Hubo un problema al enviar tu mensaje. Por favor, intenta nuevamente o contáctanos directamente a info@voseda.com
```

**Error de validación:**
```
Por favor, completa todos los campos requeridos correctamente.
```

---

## Features Incluidos (voseda-cf7-styles.php)

### Estilos automáticos:
✅ Colores corporativos Voseda (#009045, #A3BD31)
✅ Inputs con border radius y transiciones
✅ Botón con gradiente verde
✅ Efectos hover y focus
✅ Mensajes de error/éxito estilizados
✅ Spinner de carga animado
✅ 100% responsive (móvil, tablet, desktop)

### JavaScript automático:
✅ Scroll suave a mensajes de éxito
✅ Pre-selección de interés vía URL (?interes=Ciberseguridad)
✅ Animaciones de aparición

---

## Uso Avanzado

### Pre-seleccionar campo "Interés" desde un link:

**Links en tu sitio:**
```html
<a href="https://voseda.com/contacto?interes=Ciberseguridad">
  Contactar sobre Ciberseguridad
</a>

<a href="https://voseda.com/contacto?interes=Redes">
  Contactar sobre Redes
</a>
```

El formulario pre-seleccionará automáticamente la opción del parámetro URL.

### Usar en otros templates:

**En cualquier archivo PHP del tema:**
```php
<?php
// Mostrar formulario con ID específico
voseda_render_contact_form('78a0090');

// O usar el ID por defecto
voseda_render_contact_form();
?>
```

**Como shortcode en Gutenberg:**
1. Agrega un bloque "Shortcode"
2. Pega: `[voseda_form]`

---

## Configuración SMTP (Recomendado)

Para asegurar que los emails lleguen correctamente, configura SMTP:

### Opción 1: Plugin WP Mail SMTP
```
1. Instala "WP Mail SMTP" desde Plugins → Añadir nuevo
2. Configura con tu proveedor de email
3. Recomendado: Gmail, SendGrid, o Amazon SES
```

### Opción 2: Hostgator Email
```
1. Crea una cuenta de email en cPanel: webmaster@voseda.com
2. Usa credenciales SMTP de Hostgator:
   - Host: mail.voseda.com
   - Port: 587 (TLS) o 465 (SSL)
   - Usuario: webmaster@voseda.com
   - Password: [tu password]
```

---

## Testing del Formulario

### 1. Prueba Local:
```
http://localhost/contacto
```

### 2. Prueba en Producción:
```
https://voseda.com/contacto
```

### Checklist de pruebas:
- [ ] Formulario se muestra correctamente
- [ ] Validación de campos requeridos funciona
- [ ] Email de prueba se recibe
- [ ] Mensaje de éxito aparece
- [ ] Scroll automático funciona
- [ ] Responsive en móvil
- [ ] Pre-selección URL funciona (?interes=Redes)

---

## Modificar el Formulario

### En WordPress Admin:
```
1. Contact → Contact Forms
2. Edit "Formulario contacto"
3. Modifica campos, agrega nuevos, etc.
4. Save
```

**Los cambios se aplican inmediatamente**, no necesitas subir archivos nuevos.

### Cambiar el ID del formulario:

Si necesitas usar otro formulario, edita:
```php
// mu-plugins/voseda-form-hardcode.php línea 23
$default_form_id = $form_id ?: 'TU-NUEVO-ID';
```

---

## Soporte y Documentación

**Contact Form 7 Docs:**
https://contactform7.com/docs/

**Tags disponibles:**
- `[text* tu-campo]` - Texto requerido
- `[email* tu-email]` - Email requerido
- `[tel tu-telefono]` - Teléfono
- `[select* tu-select "Opción 1" "Opción 2"]` - Select
- `[textarea tu-mensaje]` - Área de texto
- `[checkbox tu-checkbox "Acepto términos"]` - Checkbox
- `[file tu-archivo]` - Subir archivo

**Clases CSS disponibles (por voseda-cf7-styles.php):**
- `.form-control` - Para inputs y textareas
- `.form-select` - Para selects
- `.btn-voseda` - Para botones

---

**Desarrollado por:** IMaaS Group
**Última actualización:** Octubre 2025
**Dominio:** https://voseda.com
