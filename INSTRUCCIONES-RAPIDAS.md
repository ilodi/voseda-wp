# 🚀 INSTRUCCIONES RÁPIDAS - Voseda.com

## TODO DESDE WORDPRESS - Sin FTP, sin complicaciones

---

## 📦 ARCHIVOS QUE NECESITAS

Tienes 3 archivos listos:

```
1. voseda-footer-banner.zip      [Plugin del footer]
2. mu-plugins-voseda.zip          [Must-Use Plugins]
3. page-contacto.php              [Página actualizada]
```

**Ubicación en tu Mac:**
```
/Users/lodi/Documents/imaas/sites/voseda/wp-content/
```

---

## ⚡ PASO A PASO (15 minutos)

### 1️⃣ Subir Plugin del Footer (5 min)

```
1. Ve a: https://voseda.com/wp-admin
2. Click: Plugins → Añadir nuevo
3. Click: Subir plugin
4. Selecciona: voseda-footer-banner.zip
5. Click: Instalar ahora
6. Click: Activar plugin (o sáltalo, se activa solo)
```

**✅ LISTO:** Ya tienes el plugin del footer instalado

---

### 2️⃣ Subir Must-Use Plugins (5 min)

**Opción A - cPanel (Más fácil):**

```
1. Ve a: https://voseda.com:2083
2. Usuario/Contraseña: [tus credenciales Hostgator]
3. Busca: "Administrador de archivos"
4. Navega a: public_html/wp-content/
5. Si no existe carpeta "mu-plugins", créala:
   - Click: + Carpeta
   - Nombre: mu-plugins
6. Entra a la carpeta mu-plugins/
7. Click: Subir
8. Selecciona: mu-plugins-voseda.zip
9. Espera que suba
10. Click derecho en el .zip → Extraer
11. Extrae a: /public_html/wp-content/mu-plugins/
12. Elimina el .zip
```

**Opción B - Plugin File Manager:**

```
1. WordPress Admin → Plugins → Añadir nuevo
2. Busca: "File Manager"
3. Instala el de "mndpsingh287"
4. Ve a: File Manager (menú lateral)
5. Navega a: wp-content/
6. Crea carpeta: mu-plugins (si no existe)
7. Entra a mu-plugins/
8. Sube y extrae: mu-plugins-voseda.zip
```

**✅ VERIFICAR:**
```
WordPress Admin → Plugins → Must-Use
```
Deberías ver 3 plugins listados ahí.

---

### 3️⃣ Actualizar Página de Contacto (3 min)

**Opción A - Editor de WordPress:**

```
1. WordPress Admin → Apariencia → Editor de archivos de tema
2. Busca en la lista: page-contacto.php
3. Abre tu archivo local:
   /wp-content/themes/voseda/page-contacto.php
4. Copia TODO el contenido
5. Pégalo en el editor (reemplazar todo)
6. Click: Actualizar archivo
```

**Opción B - cPanel:**

```
1. cPanel → Administrador de archivos
2. Navega a: public_html/wp-content/themes/voseda/
3. Selecciona: page-contacto.php
4. Click: Editar
5. Borra todo y pega el nuevo contenido
6. Guardar
```

**✅ LISTO:** Página actualizada con Contact Form 7

---

### 4️⃣ Configurar Contact Form 7 (2 min)

```
1. WordPress Admin → Contact → Contact Forms
2. Edita: "Formulario contacto"
3. Tab "Mail":
   - A: info@voseda.com (o tu email preferido)
   - Asunto: Nuevo contacto desde Voseda
4. Guardar
```

**✅ LISTO:** Formulario configurado

---

### 5️⃣ VERIFICAR TODO (2 min)

```
1. Visita: https://voseda.com/contacto
   ✅ ¿Se ve el formulario Contact Form 7?

2. Scroll al footer de cualquier página
   ✅ ¿Se ve el banner?

3. WordPress Admin → Plugins
   ✅ Contact Form 7 activo
   ✅ Voseda Banner activo

4. WordPress Admin → Plugins → Must-Use
   ✅ 3 mu-plugins listados
```

**Si todo tiene ✅, estás listo para producción**

---

## 🎨 PERSONALIZAR FOOTER BANNER

```
WordPress Admin → Footer Banner (menú lateral)

Configuración básica:
- ☑ Banner habilitado
- Texto: "Tu mensaje aquí"
- Botón CTA: "Comenzar"
- URL: https://voseda.com/contacto

Opcional:
- Sube imagen (900x300px) para efecto hover
- Ajusta colores
- Delay de aparición
```

---

## ❓ SOLUCIÓN DE PROBLEMAS

### No veo el formulario en /contacto

**Solución:**
1. Verifica Contact Form 7 esté activo: Plugins
2. Limpia caché: Plugins → busca "cache" → Purge
3. Refresca: Ctrl+Shift+R

### Los mu-plugins no aparecen

**Verifica estructura de carpetas:**
```
/public_html/wp-content/mu-plugins/
  ├── voseda-auto-activator.php
  ├── voseda-form-hardcode.php
  ├── voseda-cf7-styles.php
  └── README.md
```

**NO debe ser:**
```
/mu-plugins/mu-plugins-voseda/archivo.php  ❌ INCORRECTO
```

**Debe ser:**
```
/mu-plugins/archivo.php  ✅ CORRECTO
```

Si están en subcarpeta, muévelos al nivel de mu-plugins/

### Footer banner no aparece

```
1. WordPress Admin → Footer Banner
2. Verifica: ☑ Banner habilitado
3. Guarda cambios
4. Refresca página
```

---

## 📧 CONFIGURAR EMAIL (Recomendado)

Para que los emails lleguen correctamente:

```
1. Plugins → Añadir nuevo
2. Busca: "WP Mail SMTP"
3. Instalar y activar
4. Configurar con tu proveedor de email
5. Enviar email de prueba
```

**Proveedores compatibles:**
- Gmail (gratis, fácil)
- SendGrid (gratis hasta 100/día)
- Hostgator Mail (incluido en tu hosting)

---

## ✅ CHECKLIST FINAL

- [ ] voseda-footer-banner.zip subido e instalado
- [ ] mu-plugins-voseda.zip subido y extraído
- [ ] page-contacto.php actualizado
- [ ] Contact Form 7 configurado con tu email
- [ ] https://voseda.com/contacto funciona
- [ ] Footer banner visible
- [ ] Email de prueba enviado y recibido
- [ ] Sitio revisado en móvil

---

## 🆘 NECESITAS AYUDA?

**Lee estos archivos (en orden):**

1. **DEPLOYMENT-WORDPRESS.md** ← Guía completa desde WP
2. **CONTACT-FORM-INFO.md** ← Info del formulario
3. **DEPLOYMENT-ALTERNATIVES.md** ← Otras opciones (FileZilla, etc)

**Soporte:**
- IMaaS Group
- Email: [tu email de soporte]

---

## 🎉 ¡ESO ES TODO!

**Resumen:**
1. ✅ Plugin footer → WordPress Admin
2. ✅ mu-plugins → cPanel (extraer ZIP)
3. ✅ page-contacto.php → Editor de tema
4. ✅ Configurar email en Contact Form 7
5. ✅ Verificar que funcione

**Tiempo total: ~15 minutos**

**Sin necesidad de:**
❌ Forklift
❌ FileZilla
❌ Línea de comandos
❌ SSH/FTP

**Todo desde el navegador** 🎊

---

**Última actualización:** Octubre 2025
**Sitio:** https://voseda.com
