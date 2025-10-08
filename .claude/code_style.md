# Guía de Estilo de Código - VOSEDA Theme

## Principios Generales

1. **Mantener consistencia** con el código existente
2. **Documentar decisiones técnicas** en NOTES.md
3. **Usar variables CSS** para colores corporativos
4. **Seguir convenciones de WordPress** para temas
5. **Mobile-first approach** en CSS responsive

## PHP (WordPress)

### Naming Conventions
```php
// Functions: voseda_nombre_funcion()
function voseda_enqueue_assets() { }

// Variables: snake_case
$theme_uri = get_template_directory_uri();

// Constants: MAYÚSCULAS
define('VOSEDA_VERSION', '1.0.0');
```

### WordPress Hooks
```php
// Usar after_setup_theme para configuración del tema
add_action('after_setup_theme', 'voseda_setup');

// Usar wp_enqueue_scripts para assets
add_action('wp_enqueue_scripts', 'voseda_enqueue_assets');
```

### Template Tags
```php
// Siempre escapar output
echo esc_html($variable);
echo esc_url($url);
echo esc_attr($attribute);

// Usar get_template_directory_uri() para assets
$logo_url = get_template_directory_uri() . '/assets/logo/logo.svg';
```

## CSS

### Variables CSS
```css
/* SIEMPRE usar variables para colores corporativos */
:root {
  --voseda-green: #009045;
  --voseda-light: #A3BD31;
  --voseda-gray: #5B5B5F;
  --voseda-light-green: #CCE9DA;
  --voseda-dark-gray: #646464;
}

/* Usar en lugar de colores hardcoded */
.elemento {
  color: var(--voseda-green);
  background-color: var(--voseda-light);
}
```

### Estructura de Secciones
```css
/* Usar comentarios para separar secciones */
/* ========================================
   Nombre de la Sección
======================================== */
```

### Naming Conventions
```css
/* BEM-like para componentes */
.partner-logo { }
.partner-logo__image { }
.partner-logo--grayscale { }

/* Prefijo voseda- para clases custom */
.voseda-loader { }
.voseda-section { }

/* Bootstrap utility classes cuando sea posible */
.bg-voseda-green { }
.text-voseda-green { }
```

### Orden de Propiedades
```css
.elemento {
  /* Positioning */
  position: relative;
  top: 0;
  left: 0;
  z-index: 1;

  /* Box Model */
  display: flex;
  width: 100%;
  height: auto;
  margin: 0;
  padding: 1rem;

  /* Typography */
  font-family: 'Poppins', sans-serif;
  font-size: 1rem;
  color: var(--voseda-green);

  /* Visual */
  background-color: white;
  border: 1px solid #ddd;
  border-radius: 0.5rem;

  /* Animation */
  transition: all 0.3s ease;
}
```

### Responsive Design
```css
/* Mobile-first: estilos base para móvil */
.hero-title {
  font-size: 1.75rem;
}

/* Tablets */
@media (min-width: 768px) {
  .hero-title {
    font-size: 2.25rem;
  }
}

/* Desktop */
@media (min-width: 992px) {
  .hero-title {
    font-size: 3rem;
  }
}
```

## JavaScript

### Naming Conventions
```javascript
// Variables: camelCase
const heroSection = document.querySelector('.hero-section');

// Constants: UPPER_SNAKE_CASE
const LOADER_DURATION = 4000;

// Functions: camelCase
function initSmoothScroll() { }
```

### Estructura de Archivos

#### loader.js
```javascript
// Solo lógica del preloader/cortinilla
// Se carga primero (before main.js)
```

#### main.js
```javascript
// Funcionalidades principales
// - Smooth scroll
// - Navbar scroll effect
// - Mobile menu
// - Active link detection
```

### Event Listeners
```javascript
// Usar addEventListener en lugar de onclick
document.addEventListener('DOMContentLoaded', function() {
  // Código aquí
});

// Usar event delegation para elementos dinámicos
document.addEventListener('click', function(e) {
  if (e.target.matches('.menu-link')) {
    // Handle click
  }
});
```

### GSAP Animations
```javascript
// Usar GSAP para animaciones complejas
gsap.to('.element', {
  duration: 1,
  opacity: 0,
  y: -20,
  ease: 'power2.out'
});

// Scroll-triggered animations
gsap.from('.reveal-text', {
  scrollTrigger: '.reveal-text',
  duration: 1,
  y: 30,
  opacity: 0
});
```

## HTML (PHP Templates)

### Indentación
```html
<!-- 2 espacios de indentación -->
<section class="hero-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>Título</h1>
      </div>
    </div>
  </div>
</section>
```

### Bootstrap Grid
```html
<!-- Usar sistema de grid de Bootstrap -->
<div class="row g-4">
  <div class="col-md-6 col-lg-4">
    <!-- Contenido -->
  </div>
</div>
```

### Clases de Animación
```html
<!-- Agregar clases para animaciones GSAP -->
<h1 class="hero-title reveal-text">Título</h1>
<div class="card reveal-item">Card</div>
<img class="reveal-image" src="..." alt="...">
```

### Accesibilidad
```html
<!-- Siempre incluir alt en imágenes -->
<img src="logo.svg" alt="VOSEDA Logo">

<!-- Usar semantic HTML -->
<header>
<nav>
<main>
<section>
<article>
<footer>

<!-- ARIA labels cuando sea necesario -->
<button aria-label="Cerrar menú">×</button>
```

## Comentarios

### PHP
```php
/**
 * Descripción de la función
 *
 * @param string $param Descripción del parámetro
 * @return void
 */
function voseda_funcion($param) { }

// Comentario de una línea para explicar lógica
```

### CSS
```css
/* ========================================
   Sección Principal
======================================== */

/* Comentario de subsección */

/* TODO: Implementar hover effect */
```

### JavaScript
```javascript
/**
 * Inicializa el smooth scroll
 * @returns {void}
 */
function initSmoothScroll() { }

// Comentario de una línea
```

## Assets

### Organización de Archivos
```
assets/
├── css/
│   └── custom.css          # CSS adicional (no en style.css)
├── js/
│   ├── loader.js           # Cortinilla
│   └── main.js             # Funcionalidad principal
├── logo/                   # Logos de VOSEDA
├── partner_logo/           # Logos de partners
├── partner/                # Certificaciones
└── img/                    # Imágenes generales
```

### Naming de Archivos
```
// Archivos: kebab-case
logo-white-txt.svg
partner-logo.png
bk-1.jpg

// Prefer descriptive names
hero-background.jpg  ✓
img1.jpg             ✗
```

## Performance

### Optimización de Imágenes
```html
<!-- Usar WebP cuando sea posible -->
<picture>
  <source srcset="image.webp" type="image/webp">
  <img src="image.jpg" alt="Descripción">
</picture>

<!-- Lazy loading -->
<img src="image.jpg" alt="Descripción" loading="lazy">
```

### Cache Busting
```php
// SIEMPRE usar time() durante desarrollo
wp_enqueue_style('voseda-custom', $uri . '/custom.css', array(), time());

// Usar versión del tema en producción
wp_enqueue_style('voseda-custom', $uri . '/custom.css', array(), VOSEDA_VERSION);
```

### Script Loading
```php
// Scripts en footer cuando sea posible (último parámetro: true)
wp_enqueue_script('voseda-main', $uri . '/main.js', array('jquery'), time(), true);
```

## Testing

### Browsers a Soportar
- Chrome (últimas 2 versiones)
- Firefox (últimas 2 versiones)
- Safari (últimas 2 versiones)
- Edge (últimas 2 versiones)
- Mobile Safari (iOS 14+)
- Chrome Mobile (Android 10+)

### Responsive Breakpoints
```css
/* Bootstrap 5 breakpoints */
/* xs: < 576px (default, mobile) */
/* sm: ≥ 576px */
@media (min-width: 576px) { }

/* md: ≥ 768px (tablets) */
@media (min-width: 768px) { }

/* lg: ≥ 992px (desktop) */
@media (min-width: 992px) { }

/* xl: ≥ 1200px */
@media (min-width: 1200px) { }

/* xxl: ≥ 1400px */
@media (min-width: 1400px) { }
```

## Git Workflow

### Commits
```bash
# Mensajes descriptivos en español o inglés
git commit -m "Add: Sección de testimonios"
git commit -m "Fix: Navbar scroll effect en mobile"
git commit -m "Update: Colores corporativos"
git commit -m "Refactor: Optimizar código de animaciones"
```

### Branches
```bash
# Feature branches
feature/seccion-testimonios
feature/formulario-contacto

# Bug fixes
fix/navbar-mobile
fix/video-responsive

# Improvements
improve/performance
improve/seo
```

## Documentación

### Actualizar NOTES.md
Cada vez que resuelvas un problema importante:
```markdown
### N. Título del Problema
**Problema**: Descripción breve

**Solución exitosa**: Código o explicación
```

### Comentar en el Código
```php
// IMPORTANTE: No cambiar este orden, afecta el z-index
wp_enqueue_script('voseda-loader', ..., array('voseda-gsap'));
```

## Checklist Pre-Deploy

- [ ] Cambiar `time()` a versión del tema en enqueues
- [ ] Minificar CSS/JS
- [ ] Optimizar imágenes
- [ ] Probar en todos los navegadores
- [ ] Probar en mobile/tablet/desktop
- [ ] Verificar accesibilidad (WCAG 2.1 AA)
- [ ] Verificar SEO (meta tags, titles, descriptions)
- [ ] Probar formularios
- [ ] Verificar links rotos
- [ ] Backup de base de datos
- [ ] Actualizar documentación

## Referencias

- [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)
- [Bootstrap 5 Documentation](https://getbootstrap.com/docs/5.3/)
- [GSAP Documentation](https://greensock.com/docs/)
- [CSS-Tricks: Complete Guide to Flexbox](https://css-tricks.com/snippets/css/a-guide-to-flexbox/)
