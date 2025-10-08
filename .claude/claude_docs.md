# VOSEDA - Proyecto WordPress

## Descripción del Proyecto

Sitio web corporativo para VOSEDA, empresa especializada en tecnología que ofrece soluciones de:
- Ciberseguridad integral
- Redes empresariales y SD-WAN
- Centro de datos e infraestructura crítica
- Servicios profesionales
- Colaboración y trabajo híbrido
- NOC/SOC impulsado por IA

## Estructura del Proyecto

```
voseda/
├── docker-compose.yml          # Configuración Docker para WordPress
├── uploads.ini                 # Configuración de uploads PHP
├── wp-content/
│   └── themes/
│       └── voseda/            # Tema personalizado (trabajo principal aquí)
│           ├── style.css      # Estilos principales del tema (873 líneas)
│           ├── functions.php  # Funcionalidades del tema
│           ├── header.php     # Cabecera y navegación
│           ├── footer.php     # Pie de página
│           ├── front-page.php # Página de inicio
│           ├── page-nosotros.php # Página "Nosotros"
│           ├── index.php      # Template por defecto
│           ├── NOTES.md       # Notas técnicas importantes
│           ├── assets/
│           │   ├── css/
│           │   │   └── custom.css
│           │   ├── js/
│           │   │   ├── main.js
│           │   │   └── loader.js
│           │   ├── logo/      # Logos de VOSEDA (SVG/PNG)
│           │   ├── partner_logo/ # Logos de partners (Cisco, Nutanix, etc.)
│           │   ├── partner/   # Certificaciones ISO
│           │   └── img/       # Imágenes de background
│           └── inc/
│               └── class-wp-bootstrap-navwalker.php
```

## Tecnologías Utilizadas

### Stack Principal
- **WordPress**: CMS base
- **PHP**: Backend
- **Bootstrap 5.3.2**: Framework CSS (CDN)
- **GSAP 3.12.2**: Animaciones
- **Vimeo**: Videos de background
- **Google Fonts**: Poppins (100-900)

### Framework y Librerías
- Bootstrap Icons 1.11.0
- Custom CSS con variables CSS para colores corporativos
- JavaScript vanilla para interacciones

## Colores Corporativos

```css
:root {
  --voseda-green: #009045;      /* Verde principal */
  --voseda-light: #A3BD31;      /* Verde lima secundario */
  --voseda-gray: #5B5B5F;       /* Gris texto */
  --voseda-light-green: #CCE9DA; /* Verde claro */
  --voseda-dark-gray: #646464;  /* Gris oscuro */
}
```

## Características del Tema

### 1. Cortinilla de Carga (Preloader)
- Video Vimeo de fondo (ID: 1124283265)
- Logo VOSEDA blanco con texto
- Duración: 4 segundos
- Fade out animado con GSAP
- Archivo: `assets/js/loader.js`

### 2. Hero Section
- Video background de Vimeo en loop
- Overlay oscuro semitransparente
- Título y subtítulo con animaciones
- CTA "Habla con un experto ahora"
- Responsive en todos los dispositivos

### 3. Navegación
- Bootstrap navbar fixed-top
- Logo SVG (48px height)
- Menú WordPress integrado
- Efecto scroll (cambio de background)
- Subrayado animado en links activos
- Mobile responsive con hamburger menu

### 4. Secciones de Contenido
- **Introducción**: 4 cards de servicios principales
- **Diferenciadores**: Por qué elegir VOSEDA
- **Resultados Medibles**: 3 bloques numerados
- **Impacto Real**: 6 métricas con iconos
- **Soluciones**: 6 tarjetas de servicios
- **Partners**: Grid de logos con hover effect (grayscale → color)
- **FAQ**: Accordion Bootstrap
- **Recursos**: Blog, Webinars, Whitepapers
- **CTA Final**: Formulario de contacto

### 5. Animaciones
- GSAP para reveal animations
- Fade in up en hero section
- Scroll-triggered animations (temporalmente desactivadas)
- Hover effects en cards y botones
- Smooth scroll para anchors

## Configuración de WordPress

### Páginas Creadas Automáticamente
El tema crea estas páginas al activarse:
1. Inicio (página estática de inicio)
2. Nosotros
3. Servicios
4. Blog
5. Contacto

### Menús Registrados
- `mi_menu`: Menú principal de navegación

### Theme Supports
- `title-tag`
- `post-thumbnails`
- `html5` (search-form, comment-form, etc.)
- Upload de archivos SVG permitido

## Archivos Importantes

### NOTES.md
Contiene soluciones técnicas exitosas para:
- Cache busting (usar `time()` en lugar de `filemtime()`)
- Navbar WordPress con Bootstrap
- Videos responsive sin franjas
- Partner logos con hover effects
- Decisiones de arquitectura

### functions.php
- Enqueue de scripts y estilos
- Creación automática de páginas
- Registro de menús y theme supports
- Helper function `voseda_logo_uri()`

### style.css (873 líneas)
- Variables CSS para colores
- Reset de estilos WordPress
- Preloader/cortinilla
- Hero con video
- Navbar responsive
- Cards y servicios
- Footer
- Responsive breakpoints

## Assets

### Logos
- `logo.svg`: Logo principal
- `logo.png`: Logo PNG
- `logo-white.svg`: Logo blanco
- `logo-white-txt.svg`: Logo blanco con texto (cortinilla)
- `logo-grey.svg`: Logo gris
- `isotipo-logo.svg`: Isotipo

### Partner Logos
- cisco.png
- cohesity.png
- firemon.png
- gigamon.png
- nutanix.png
- panduit.png
- tenable.png

### Certificaciones
- ISO-27.webp
- ISO-20.webp
- LOGO-CISCO-PARTNER-1.webp

### Imágenes de Background
- bk-1.jpg (sección Impacto)
- bk-2.jpg (sección CTA)
- bk-3.jpg

## Videos Vimeo

### Video Principal
- **ID**: 1124283265
- **Uso**: Cortinilla y Hero background
- **Parámetros**: `?background=1&autoplay=1&loop=1&muted=1&controls=0`

## Mejores Prácticas Implementadas

### 1. Cache Busting
```php
wp_enqueue_style('voseda-custom', $theme_uri . '/assets/css/custom.css', array('voseda-bootstrap-css'), time());
```

### 2. Videos Responsive
```css
.hero-video-bg iframe {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 100vw;
  height: 100vh;
  pointer-events: none;
}
```

### 3. Partner Logos con Hover
```css
.partner-logo img {
  filter: grayscale(100%);
  transition: all 0.3s ease;
}
.partner-logo:hover img {
  filter: grayscale(0%);
  transform: scale(1.05);
}
```

## Pendientes y Mejoras Futuras

### Por Implementar
- [ ] Reactivar animaciones GSAP (temporalmente desactivadas)
- [ ] Crear página de Servicios detallada
- [ ] Implementar Blog funcional
- [ ] Formulario de contacto funcional
- [ ] Integración de Google Analytics
- [ ] SEO optimization
- [ ] Lazy loading de imágenes
- [ ] Optimización de performance
- [ ] Multilanguage support (opcional)

### Optimizaciones Técnicas
- [ ] Minificar CSS/JS
- [ ] Optimizar imágenes (WebP)
- [ ] Implementar cache del navegador
- [ ] Critical CSS inline
- [ ] Defer JavaScript no crítico
- [ ] CDN para assets estáticos

## Comandos Útiles

### Docker
```bash
docker-compose up -d    # Iniciar WordPress
docker-compose down     # Detener WordPress
docker-compose logs     # Ver logs
```

### WordPress CLI (si está instalado)
```bash
wp theme activate voseda
wp menu create "Menu Principal"
wp plugin list
```

## Notas de Desarrollo

1. **Siempre usar `time()` para cache busting** durante desarrollo
2. **Verificar NOTES.md** antes de hacer cambios en navbar o videos
3. **No eliminar `all-colage.png`** de partner_logo (aunque no se usa)
4. **Mantener estructura de clases Bootstrap** para consistencia
5. **Respetar variables CSS** para colores corporativos

## Contacto

- **Cliente**: VOSEDA
- **Sitio**: https://voseda.com
- **Tema**: Custom WordPress Theme
- **Versión**: 1.0.0

## Referencias Útiles

- Bootstrap 5 Docs: https://getbootstrap.com/docs/5.3/
- GSAP Docs: https://greensock.com/docs/
- WordPress Theme Development: https://developer.wordpress.org/themes/
- Vimeo Player API: https://developer.vimeo.com/player/sdk
