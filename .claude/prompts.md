# Prompts Útiles para el Proyecto VOSEDA

## Prompts para Desarrollo

### Crear Nueva Sección
```
Necesito crear una nueva sección llamada "[nombre]" en la página de inicio con:
- Título: [título]
- Descripción: [descripción]
- Layout: [2 columnas / 3 columnas / full width]
- Elementos: [cards / grid / accordion / etc]
- Background: [color / imagen / video]
- Animaciones: [sí / no]

Debe seguir el estilo visual del resto del sitio y usar los colores corporativos de VOSEDA.
```

### Crear Nueva Página
```
Necesito crear una nueva página de WordPress llamada "[nombre]" con template personalizado que incluya:
- Hero section con [características]
- [N] secciones de contenido
- Integración con el header/footer existente
- Responsive design
- Animaciones GSAP

Por favor crea el archivo page-[slug].php siguiendo la estructura de front-page.php.
```

### Modificar Estilos
```
Necesito modificar los estilos de [elemento/sección]:
- [Cambio 1]: [descripción]
- [Cambio 2]: [descripción]
- [Cambio 3]: [descripción]

Asegúrate de mantener la consistencia con el resto del tema y usar las variables CSS de VOSEDA.
```

### Optimizar Performance
```
Analiza el tema VOSEDA y sugiere optimizaciones de performance para:
- Tiempo de carga
- Core Web Vitals
- Tamaño de assets
- Lazy loading
- Minificación

Implementa las mejoras prioritarias manteniendo la funcionalidad actual.
```

### Agregar Funcionalidad
```
Necesito agregar [funcionalidad] al tema que:
- [Requisito 1]
- [Requisito 2]
- [Requisito 3]

Debe integrarse con WordPress sin conflictos con plugins existentes.
```

## Prompts para Debugging

### Problemas de CSS
```
El [elemento] no se ve bien en [dispositivo/navegador]:
- Problema: [descripción del problema]
- Comportamiento esperado: [descripción]
- Comportamiento actual: [descripción]

Revisa el CSS relacionado y propón una solución manteniendo la compatibilidad con otros navegadores.
```

### Problemas de JavaScript
```
La funcionalidad de [nombre] no está funcionando:
- Error en consola: [error]
- Pasos para reproducir: [pasos]
- Comportamiento esperado: [descripción]

Revisa el código JavaScript y soluciona el error.
```

### Problemas de WordPress
```
Tengo un problema con [funcionalidad de WordPress]:
- Descripción del problema: [descripción]
- Plugins activos: [lista]
- Versión de WordPress: [versión]

Analiza el código del tema y propón una solución.
```

## Prompts para Contenido

### Agregar Contenido Editable
```
Necesito hacer editable la sección [nombre] usando:
- [ ] Gutenberg blocks
- [ ] ACF (Advanced Custom Fields)
- [ ] Custom Post Types
- [ ] Customizer

Implementa la solución más adecuada para que el cliente pueda editar fácilmente.
```

### Crear Custom Post Type
```
Necesito crear un Custom Post Type llamado "[nombre]" para:
- [Descripción del contenido]
- Campos personalizados: [lista]
- Taxonomías: [categorías/tags custom]
- Template de archivo
- Template single

Incluye toda la funcionalidad en functions.php y crea los templates necesarios.
```

### Integrar Blog
```
Necesito implementar una sección de blog funcional con:
- Listado de posts con paginación
- Single post template
- Sidebar con widgets
- Categorías y tags
- Búsqueda
- Comments

Usa el diseño y colores de VOSEDA.
```

## Prompts para SEO y Marketing

### Optimización SEO
```
Optimiza el tema VOSEDA para SEO:
- Meta tags dinámicos
- Open Graph para redes sociales
- Schema.org markup
- XML Sitemap
- Breadcrumbs
- Canonical URLs

Implementa las mejores prácticas sin depender de plugins pesados.
```

### Integrar Analytics
```
Integra Google Analytics 4 en el tema:
- Tag Manager o código directo
- Tracking de eventos personalizados
- Conversiones en formularios
- Scroll tracking

Debe ser fácil de configurar por el cliente.
```

### Formularios de Contacto
```
Crea un formulario de contacto funcional con:
- Campos: [lista de campos]
- Validación del lado del cliente
- Validación del lado del servidor
- Envío por email
- Mensaje de confirmación
- Protección anti-spam
- Responsive design

Usa Contact Form 7 o PHP nativo según prefieras.
```

## Prompts para Diseño

### Ajustar Responsive
```
Revisa el responsive design del tema en:
- Mobile (< 576px)
- Tablet (768px)
- Desktop (992px+)

Identifica y corrige problemas de:
- Overflow horizontal
- Tamaños de fuente
- Espaciado
- Imágenes
- Videos
- Navegación móvil
```

### Mejorar Accesibilidad
```
Audita y mejora la accesibilidad del tema VOSEDA:
- Contraste de colores (WCAG AA)
- Navegación por teclado
- Screen readers
- ARIA labels
- Focus states
- Skip links
- Semantic HTML

Implementa las mejoras necesarias para cumplir WCAG 2.1 AA.
```

### Agregar Animaciones
```
Necesito agregar animaciones GSAP a:
- [Elemento 1]: [tipo de animación]
- [Elemento 2]: [tipo de animación]
- [Elemento 3]: [tipo de animación]

Las animaciones deben ser sutiles, mejorar la UX y no afectar el performance.
```

## Prompts para Mantenimiento

### Actualizar Dependencias
```
Revisa y actualiza las dependencias del tema:
- Bootstrap [versión actual] → [versión nueva]
- GSAP [versión actual] → [versión nueva]
- Otros CDN o librerías

Verifica que no haya breaking changes y prueba todas las funcionalidades.
```

### Documentar Código
```
Necesito documentar el código del tema VOSEDA:
- Agregar PHPDoc a todas las funciones
- Comentar secciones complejas
- Actualizar NOTES.md con nuevas decisiones
- Crear guía para el cliente

Genera documentación clara y completa.
```

### Crear Child Theme
```
Crea un child theme de VOSEDA para:
- Personalización del cliente sin tocar el tema base
- Actualizaciones seguras
- Override de templates específicos

Incluye functions.php y style.css del child theme.
```

## Prompts para Testing

### Probar Navegadores
```
Necesito un reporte de compatibilidad del tema en:
- Chrome (Windows/Mac)
- Firefox (Windows/Mac)
- Safari (Mac/iOS)
- Edge (Windows)
- Chrome Mobile (Android)

Identifica y documenta problemas visuales o funcionales.
```

### Probar Performance
```
Analiza el performance del tema VOSEDA:
- PageSpeed Insights
- GTmetrix
- Lighthouse
- WebPageTest

Genera un reporte con métricas y sugerencias de mejora priorizadas.
```

### Probar Seguridad
```
Audita la seguridad del tema:
- Validación y sanitización de inputs
- Escapado de outputs
- Nonces en formularios
- SQL injection prevention
- XSS prevention
- CSRF protection

Identifica vulnerabilidades y propón soluciones.
```

## Prompts Específicos de VOSEDA

### Actualizar Partners
```
Necesito actualizar la sección de partners:
- Agregar logo de [nombre]: [URL o archivo]
- Eliminar logo de [nombre]
- Cambiar orden de logos
- Actualizar hover effects

Mantén el efecto grayscale → color actual.
```

### Modificar Hero Video
```
Cambiar el video del hero section:
- Nuevo video ID de Vimeo: [ID]
- Ajustar duración de cortinilla
- Modificar overlay opacity
- Cambiar texto del CTA

Asegura que el video sea responsive y se vea bien en todos los dispositivos.
```

### Ajustar Colores
```
El cliente quiere ajustar los colores corporativos:
- Verde principal: [nuevo color]
- Verde secundario: [nuevo color]
- Gris: [nuevo color]

Actualiza las variables CSS y verifica que todos los elementos se vean bien con los nuevos colores.
```

### Agregar Certificación
```
Agregar nueva certificación a la sección de partners:
- Nombre: [nombre]
- Logo: [archivo]
- URL: [enlace]
- Posición: [después de X]

Mantén el formato y diseño de las certificaciones existentes.
```

## Prompts para Entrega

### Preparar para Producción
```
Prepara el tema VOSEDA para producción:
1. Cambiar time() a versión del tema
2. Minificar CSS y JavaScript
3. Optimizar imágenes
4. Generar documentación para el cliente
5. Crear ZIP del tema
6. Instrucciones de instalación

Crea un checklist de todo lo necesario para el deploy.
```

### Documentación para Cliente
```
Crea documentación para el cliente que explique:
- Cómo editar contenido
- Cómo agregar páginas
- Cómo cambiar logos y colores
- Cómo agregar partners
- Cómo gestionar menús
- Troubleshooting básico

En formato PDF o documento de texto fácil de seguir.
```

### Manual de Mantenimiento
```
Genera un manual de mantenimiento que incluya:
- Estructura de archivos
- Cómo actualizar WordPress sin romper el tema
- Cómo hacer backups
- Plugins recomendados
- Plugins a evitar
- Contactos de soporte

Debe ser comprensible para un usuario no técnico.
```

## Prompts Avanzados

### Migración a Gutenberg
```
Necesito migrar las secciones hardcodeadas a Gutenberg blocks:
- [Sección 1]
- [Sección 2]
- [Sección 3]

Crea custom blocks que permitan editar:
- Textos
- Imágenes
- Colores
- Layouts

Mantén el diseño actual pero hazlo totalmente editable.
```

### Internacionalización
```
Prepara el tema para internacionalización:
- Envolver todos los strings en __() y _e()
- Crear archivo .pot
- Soporte para RTL
- Date/time localization

Genera los archivos de traducción base para español e inglés.
```

### Integración con WooCommerce
```
Necesito integrar WooCommerce con el tema VOSEDA:
- Diseño de shop page
- Single product template
- Cart y checkout personalizados
- Colores y estilos consistentes con el tema

Mantén la identidad visual de VOSEDA en todo el proceso de compra.
```

## Plantillas de Respuesta Esperada

Cuando hagas un prompt, Claude debería:

1. **Confirmar entendimiento**
   - "Entiendo que necesitas [resumen del requerimiento]"

2. **Proponer solución**
   - "Voy a [acción] utilizando [tecnología/método]"

3. **Mostrar código**
   - Código limpio, comentado y siguiendo las guías de estilo

4. **Explicar cambios**
   - Qué se modificó y por qué

5. **Testing sugerido**
   - Cómo probar que funciona correctamente

6. **Próximos pasos** (si aplica)
   - Qué más se podría hacer relacionado

## Notas Importantes

- Siempre menciona si necesitas archivos adicionales (imágenes, videos, etc.)
- Pregunta si tienes dudas antes de implementar
- Sugiere alternativas cuando sea apropiado
- Mantén la documentación actualizada (NOTES.md, code_style.md)
- Considera el impacto en performance de cada cambio
- Piensa en la experiencia del cliente al editar contenido
