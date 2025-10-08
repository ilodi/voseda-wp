# VOSEDA - Sitio Web Corporativo

![VOSEDA Logo](wp-content/themes/voseda/assets/logo/logo.svg)

> Tecnología que protege, conecta y transforma tu negocio.

## 📋 Descripción

Sitio web corporativo para VOSEDA, empresa líder en soluciones de ciberseguridad, infraestructura de redes, data centers y servicios tecnológicos empresariales.

## 🚀 Características

### Tema WordPress Personalizado
- ✅ Diseño moderno y minimalista
- ✅ Totalmente responsive (mobile-first)
- ✅ Animaciones GSAP suaves
- ✅ Video backgrounds (Vimeo)
- ✅ Cortinilla de carga animada
- ✅ Hero section impactante
- ✅ Secciones modulares
- ✅ Integración con Bootstrap 5
- ✅ SEO optimizado
- ✅ Performance optimizado

### Secciones Implementadas
1. **Hero con Video Background** - Impacto visual inmediato
2. **Servicios Principales** - 4 cards destacadas
3. **Diferenciadores** - Por qué elegir VOSEDA
4. **Resultados Medibles** - Métricas de impacto
5. **Logros y Achievements** - 3 indicadores clave
6. **Partners Tecnológicos** - Logos con hover effect
7. **Impacto Real** - 6 estadísticas con iconos
8. **Soluciones** - 6 servicios detallados
9. **FAQ** - Preguntas frecuentes (accordion)
10. **Recursos** - Blog, webinars, whitepapers
11. **CTA Final** - Call to action con contacto

## 🛠️ Stack Tecnológico

### Backend
- **WordPress** 6.x
- **PHP** 7.4+
- **MySQL** 5.7+

### Frontend
- **HTML5** Semantic
- **CSS3** con variables custom
- **JavaScript** (Vanilla + GSAP)
- **Bootstrap** 5.3.2
- **Google Fonts** (Poppins)
- **Bootstrap Icons** 1.11.0

### Herramientas
- **Docker** + Docker Compose
- **Git** para control de versiones
- **GSAP** 3.12.2 para animaciones
- **Vimeo** para videos

## 🎨 Colores Corporativos

```css
--voseda-green: #009045      /* Verde principal */
--voseda-light: #A3BD31      /* Verde lima secundario */
--voseda-gray: #5B5B5F       /* Gris texto */
--voseda-light-green: #CCE9DA /* Verde claro */
--voseda-dark-gray: #646464  /* Gris oscuro */
```

## 📁 Estructura del Proyecto

```
voseda/
├── docker-compose.yml          # Configuración Docker
├── uploads.ini                 # Configuración PHP uploads
├── README.md                   # Este archivo
├── .gitignore                  # Git ignore rules
├── .claude/                    # Documentación de Claude
│   ├── claude_docs.md         # Documentación del proyecto
│   ├── code_style.md          # Guía de estilo
│   └── prompts.md             # Prompts útiles
└── wp-content/
    └── themes/
        └── voseda/            # Tema personalizado
            ├── style.css      # Estilos principales (873 líneas)
            ├── functions.php  # Funciones del tema
            ├── header.php     # Cabecera
            ├── footer.php     # Pie de página
            ├── front-page.php # Página de inicio
            ├── page-nosotros.php # Página nosotros
            ├── index.php      # Template por defecto
            ├── NOTES.md       # Notas técnicas importantes
            ├── screenshot.png # Screenshot del tema
            ├── assets/        # Assets (CSS, JS, imágenes, logos)
            └── inc/           # Includes (navwalker, etc.)
```

## 🚀 Instalación y Configuración

### Requisitos Previos
- Docker Desktop instalado
- Git instalado
- Editor de código (VS Code recomendado)

### Instalación Local

1. **Clonar el repositorio**
```bash
git clone [URL_DEL_REPO]
cd voseda
```

2. **Iniciar Docker**
```bash
docker-compose up -d
```

3. **Acceder a WordPress**
- URL: `http://localhost:8000`
- Admin: `http://localhost:8000/wp-admin`

4. **Configuración inicial**
- Completar instalación de WordPress
- Activar el tema "VOSEDA"
- Los menús y páginas se crean automáticamente

### Configuración de Desarrollo

1. **Activar modo desarrollo**
   - En `functions.php`, `time()` está activo para cache busting

2. **Editar archivos del tema**
   - CSS: `wp-content/themes/voseda/style.css`
   - JS: `wp-content/themes/voseda/assets/js/`
   - PHP: `wp-content/themes/voseda/*.php`

3. **Ver cambios en tiempo real**
   - Los cambios CSS/JS se reflejan inmediatamente
   - Recarga el navegador (Cmd/Ctrl + R)

## 📝 Desarrollo

### Comandos Docker Útiles

```bash
# Iniciar contenedores
docker-compose up -d

# Detener contenedores
docker-compose down

# Ver logs
docker-compose logs

# Ver logs en tiempo real
docker-compose logs -f

# Reiniciar contenedores
docker-compose restart

# Acceder a la shell de WordPress
docker-compose exec wordpress bash

# Acceder a MySQL
docker-compose exec db mysql -u wordpress -p
```

### Workflow de Desarrollo

1. **Hacer cambios** en los archivos del tema
2. **Recargar navegador** para ver cambios
3. **Testear en diferentes dispositivos** (responsive)
4. **Commit y push** de cambios

### Agregar Nuevas Secciones

```php
<!-- En front-page.php o crear nuevo template -->
<section class="nueva-seccion py-6">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="section-title reveal-text">Título</h2>
        <!-- Contenido -->
      </div>
    </div>
  </div>
</section>
```

### Agregar Nuevos Estilos

```css
/* En style.css */
/* ========================================
   Nueva Sección
======================================== */
.nueva-seccion {
  background-color: var(--voseda-green);
  color: white;
}
```

## 🎯 Testing

### Testing Manual
- [ ] Probar en Chrome, Firefox, Safari, Edge
- [ ] Probar en mobile (iPhone, Android)
- [ ] Probar en tablet (iPad)
- [ ] Verificar animaciones
- [ ] Verificar videos
- [ ] Verificar formularios
- [ ] Verificar navegación
- [ ] Verificar links

### Performance Testing
```bash
# Usar Google PageSpeed Insights
https://pagespeed.web.dev/

# Usar GTmetrix
https://gtmetrix.com/
```

## 📦 Deployment

### Pre-Deploy Checklist

1. **Optimización de código**
   - [ ] Cambiar `time()` a versión del tema en functions.php
   - [ ] Minificar CSS y JavaScript
   - [ ] Optimizar imágenes (usar WebP)
   - [ ] Eliminar archivos no utilizados

2. **Testing final**
   - [ ] Probar todas las páginas
   - [ ] Verificar formularios
   - [ ] Verificar links externos
   - [ ] Verificar responsive
   - [ ] Verificar SEO (meta tags)

3. **Seguridad**
   - [ ] Actualizar WordPress a última versión
   - [ ] Actualizar plugins
   - [ ] Verificar permisos de archivos
   - [ ] Configurar SSL/HTTPS
   - [ ] Implementar security headers

4. **Backup**
   - [ ] Backup de base de datos
   - [ ] Backup de archivos
   - [ ] Documentar proceso de restore

### Deploy a Producción

```bash
# 1. Crear ZIP del tema
cd wp-content/themes
zip -r voseda-theme.zip voseda/

# 2. Subir a servidor
# - Via FTP/SFTP o
# - Via panel de hosting o
# - Via WordPress admin (Apariencia > Temas > Subir tema)

# 3. Activar tema en producción
# - WordPress Admin > Apariencia > Temas > Activar "VOSEDA"
```

## 📚 Documentación

### Para Desarrolladores
- `/.claude/claude_docs.md` - Documentación completa del proyecto
- `/.claude/code_style.md` - Guía de estilo de código
- `/.claude/prompts.md` - Prompts útiles para desarrollo
- `/wp-content/themes/voseda/NOTES.md` - Decisiones técnicas

### Para Clientes
- Crear manual de usuario (TODO)
- Video tutorial de edición (TODO)
- Guía de mantenimiento (TODO)

## 🤝 Contribución

### Git Workflow

```bash
# Crear nueva rama para feature
git checkout -b feature/nombre-feature

# Hacer cambios y commits
git add .
git commit -m "Add: Descripción del cambio"

# Push a repositorio
git push origin feature/nombre-feature

# Crear Pull Request
```

### Mensajes de Commit

```bash
# Formato recomendado
Add: [nueva funcionalidad]
Update: [actualización de código]
Fix: [corrección de bug]
Refactor: [mejora de código sin cambio funcional]
Docs: [cambios en documentación]
Style: [cambios de formato/estilo]
```

## 🐛 Troubleshooting

### Problema: Los cambios CSS no se reflejan
**Solución**: Hard refresh del navegador (Cmd+Shift+R en Mac, Ctrl+Shift+R en Windows)

### Problema: Videos no se reproducen
**Solución**: Verificar que el ID de Vimeo sea correcto y que el video sea público

### Problema: Error 500 en WordPress
**Solución**: Revisar logs en `wp-content/debug.log` o logs de Docker

### Problema: Navbar no funciona en mobile
**Solución**: Verificar que Bootstrap JS esté cargado correctamente

### Problema: Animaciones GSAP no funcionan
**Solución**: Verificar que GSAP se cargue antes que main.js

## 📞 Soporte

### Contacto VOSEDA
- **Web**: https://voseda.com
- **Email**: info@voseda.com

### Equipo de Desarrollo
- **Developer**: [Tu nombre]
- **Email**: [Tu email]
- **Repositorio**: [URL del repo]

## 📄 Licencia

Este tema es propiedad de VOSEDA y está protegido bajo licencia propietaria.

## 🔄 Changelog

### Version 1.0.0 (2025-10-07)
- ✅ Tema base implementado
- ✅ Hero section con video
- ✅ Cortinilla animada
- ✅ Todas las secciones principales
- ✅ Navbar responsive
- ✅ Footer completo
- ✅ Partners section
- ✅ FAQ accordion
- ✅ Responsive design
- ✅ Animaciones GSAP
- ✅ Documentación completa

### Próximas Versiones (Roadmap)
- [ ] v1.1.0 - Blog funcional
- [ ] v1.2.0 - Formulario de contacto
- [ ] v1.3.0 - Página de servicios detallada
- [ ] v1.4.0 - Integración con Google Analytics
- [ ] v1.5.0 - Multilanguage support
- [ ] v2.0.0 - Gutenberg blocks customizados

## 🎓 Recursos Útiles

- [WordPress Developer Handbook](https://developer.wordpress.org/)
- [Bootstrap 5 Documentation](https://getbootstrap.com/docs/5.3/)
- [GSAP Documentation](https://greensock.com/docs/)
- [PHP Documentation](https://www.php.net/docs.php)
- [CSS-Tricks](https://css-tricks.com/)
- [MDN Web Docs](https://developer.mozilla.org/)

---

**Desarrollado con ❤️ para VOSEDA**

*Última actualización: 2025-10-07*
