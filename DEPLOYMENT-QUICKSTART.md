# Quick Start - Deployment a Hostgator

## Orden de Subida (IMPORTANTE - sigue este orden)

### 1️⃣ BACKUP PRIMERO
```
cPanel → Backup → Download Full Backup
```

### 2️⃣ Subir mu-plugins (PRIMERO)
**Forklift:**
```
Local:  /wp-content/mu-plugins/
Remoto: /public_html/wp-content/mu-plugins/

Archivos a subir:
✅ voseda-auto-activator.php
✅ voseda-form-hardcode.php
✅ voseda-cf7-styles.php
✅ README.md
```

**¿Por qué primero?** Estos archivos activan automáticamente los plugins necesarios.

### 3️⃣ Subir Plugin Footer Banner
**Opción A - WordPress Admin (Más fácil):**
```
1. Accede a https://voseda.com/wp-admin
2. Plugins → Añadir nuevo → Subir plugin
3. Selecciona: voseda-footer-banner.zip
4. Instalar ahora
5. (No es necesario activar, se activa automáticamente)
```

**Opción B - Forklift:**
```
Local:  /wp-content/plugins/voseda-footer-banner/
Remoto: /public_html/wp-content/plugins/voseda-footer-banner/
```

### 4️⃣ Verificar Contact Form 7
**En WordPress Admin:**
```
1. Ve a Plugins
2. Verifica que "Contact Form 7" esté activo
3. Si no está activo, el mu-plugin lo activará automáticamente
```

### 5️⃣ Subir Tema Actualizado
**Forklift:**
```
Local:  /wp-content/themes/voseda/page-contacto.php
Remoto: /public_html/wp-content/themes/voseda/page-contacto.php
```

### 6️⃣ Verificar funcionamiento
```
✅ Visita: https://voseda.com/contacto
✅ Prueba el formulario
✅ Verifica el footer banner
✅ Revisa en móvil
```

---

## Resumen de lo que hace cada archivo

### mu-plugins/voseda-auto-activator.php
- Auto-activa Contact Form 7
- Auto-activa Footer Banner
- No requiere activación manual

### mu-plugins/voseda-form-hardcode.php
- Helper para insertar formularios
- Ya configurado con ID: 78a0090
- Uso: `<?php voseda_render_contact_form(); ?>`

### mu-plugins/voseda-cf7-styles.php
- Estilos Voseda para Contact Form 7
- Colores corporativos automáticos
- Animaciones y efectos
- Scroll suave a mensajes

### plugins/voseda-footer-banner/
- Banner del footer con glassmorphism
- Hover image effect
- Panel admin: Footer Banner

### themes/voseda/page-contacto.php
- Página de contacto actualizada
- Usa Contact Form 7 automáticamente
- Código limpio y simplificado

---

## Comandos útiles Forklift

### Conectar a Voseda Production:
```
1. Abre Forklift
2. Cmd + B (Favoritos)
3. Selecciona "Voseda Production"
```

### Sincronizar carpetas:
```
1. Panel izq: Local → wp-content/mu-plugins
2. Panel der: Remoto → public_html/wp-content/mu-plugins
3. Arrastra carpeta → Panel derecho
4. O usa Cmd + Y (Sync)
```

---

## Troubleshooting

### Contact Form 7 no aparece
**Solución:**
```bash
# SSH en Hostgator
wp plugin activate contact-form-7 --allow-root

# O manualmente en WordPress Admin
Plugins → Contact Form 7 → Activar
```

### Footer Banner no aparece
**Verifica:**
1. Plugin activado: WordPress Admin → Plugins
2. Configuración: Footer Banner → Banner habilitado
3. Limpia caché: Si usas plugin de caché

### Formulario sin estilos
**Verifica:**
1. Archivo subido: mu-plugins/voseda-cf7-styles.php
2. Permisos: 644 (rw-r--r--)
3. Limpia caché del navegador: Ctrl+Shift+R

### mu-plugins no funcionan
**Verifica permisos SSH:**
```bash
chmod 755 /public_html/wp-content/mu-plugins/
chmod 644 /public_html/wp-content/mu-plugins/*.php
```

---

## Checklist Pre-Producción

Antes de subir a Hostgator:

- [ ] Backup de base de datos hecho
- [ ] Backup de archivos hecho
- [ ] Contact Form 7 instalado en Hostgator
- [ ] Credenciales Forklift configuradas
- [ ] Archivos probados en local

Durante el deployment:

- [ ] mu-plugins subidos primero
- [ ] Plugins subidos
- [ ] Tema actualizado
- [ ] Plugins verificados activos
- [ ] Página de contacto funciona

Después del deployment:

- [ ] Formulario probado
- [ ] Email de prueba recibido
- [ ] Banner footer visible
- [ ] Responsive verificado
- [ ] Caché limpiado

---

**¿Necesitas ayuda?**
- Lee: FORKLIFT-SETUP.md (Configuración detallada)
- Lee: DEPLOYMENT.md (Guía completa)
- Soporte: IMaaS Group

**Última actualización:** Octubre 2025
