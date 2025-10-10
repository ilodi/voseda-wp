# Guía de Instalación en Windows con Docker

Esta guía te ayudará a configurar el proyecto Voseda en Windows usando Docker Desktop.

## Requisitos Previos

1. **Git para Windows**
   - Descargar desde: https://git-scm.com/download/win
   - Durante la instalación, selecciona "Use Git from the Windows Command Prompt"

2. **Docker Desktop para Windows**
   - Descargar desde: https://www.docker.com/products/docker-desktop
   - Requiere Windows 10/11 Pro, Enterprise o Education (64-bit)
   - Habilitar WSL 2 (Windows Subsystem for Linux 2) - Docker lo configurará automáticamente
   - Reiniciar después de la instalación

3. **Editor de Código** (opcional pero recomendado)
   - Visual Studio Code: https://code.visualstudio.com/

## Paso 1: Clonar el Repositorio

Abre PowerShell o Git Bash y ejecuta:

```bash
# Navega al directorio donde quieres el proyecto
cd C:\Users\TuUsuario\Proyectos

# Clona el repositorio
git clone <URL_DEL_REPOSITORIO> voseda
cd voseda
```

## Paso 2: Configurar Variables de Entorno

1. Copia el archivo de ejemplo:
   ```bash
   copy .env.example .env
   ```

2. (Opcional) Edita el archivo `.env` con tu editor favorito:
   ```bash
   notepad .env
   ```

3. Valores por defecto (funcionan sin cambios):
   ```env
   MYSQL_DATABASE=wordpress
   MYSQL_USER=wordpress
   MYSQL_PASSWORD=wordpress
   MYSQL_ROOT_PASSWORD=root
   WORDPRESS_PORT=8080
   WORDPRESS_DEBUG=false
   PHPMYADMIN_PORT=8081
   ```

## Paso 3: Iniciar el Proyecto

1. **Asegúrate de que Docker Desktop esté ejecutándose**
   - Abre Docker Desktop desde el menú de inicio
   - Espera a que el ícono de Docker en la bandeja del sistema esté verde

2. **Construir e iniciar los contenedores:**
   ```bash
   docker-compose up -d
   ```

   El flag `-d` ejecuta los contenedores en segundo plano.

3. **Verificar que todo esté corriendo:**
   ```bash
   docker-compose ps
   ```

   Deberías ver 3 contenedores en estado "Up":
   - `voseda_wp` (WordPress)
   - `voseda_db` (MariaDB)
   - `voseda_pma` (phpMyAdmin)

## Paso 4: Acceder a la Aplicación

Espera 1-2 minutos para que WordPress se configure completamente, luego accede a:

- **WordPress:** http://localhost:8080
- **phpMyAdmin:** http://localhost:8081
  - Usuario: `root`
  - Contraseña: `root`

## Comandos Útiles

### Ver logs en tiempo real
```bash
# Todos los servicios
docker-compose logs -f

# Solo WordPress
docker-compose logs -f wordpress

# Solo base de datos
docker-compose logs -f db
```

### Detener los contenedores
```bash
docker-compose stop
```

### Iniciar contenedores detenidos
```bash
docker-compose start
```

### Detener y eliminar contenedores (mantiene los datos)
```bash
docker-compose down
```

### Eliminar TODO (incluyendo base de datos)
```bash
docker-compose down -v
```

### Reconstruir contenedores
```bash
docker-compose up -d --build
```

### Acceder al contenedor de WordPress
```bash
docker exec -it voseda_wp bash
```

### Acceder al contenedor de la base de datos
```bash
docker exec -it voseda_db bash
```

## Trabajar con Git

### Configurar Git (primera vez)
```bash
git config --global user.name "Tu Nombre"
git config --global user.email "tu@email.com"
```

### Verificar cambios
```bash
git status
git diff
```

### Crear una rama nueva
```bash
git checkout -b nombre-de-tu-rama
```

### Guardar cambios
```bash
git add .
git commit -m "Descripción de los cambios"
```

### Sincronizar con el repositorio remoto
```bash
# Descargar cambios
git pull origin main

# Subir cambios
git push origin nombre-de-tu-rama
```

## Estructura del Proyecto

```
voseda/
├── .git/                 # Control de versiones
├── .env                  # Variables de entorno (NO se sube a Git)
├── .env.example          # Ejemplo de variables de entorno
├── docker-compose.yml    # Configuración de Docker
├── uploads.ini           # Configuración PHP para uploads
├── wp-content/           # Temas, plugins y uploads de WordPress
│   ├── themes/          # Temas personalizados
│   ├── plugins/         # Plugins personalizados
│   └── uploads/         # Archivos subidos (NO se sube a Git)
└── SETUP-WINDOWS.md      # Este archivo
```

## Solución de Problemas

### Error: "Puerto ya en uso"

Si el puerto 8080 u 8081 ya está en uso, edita el archivo `.env`:

```env
WORDPRESS_PORT=8090
PHPMYADMIN_PORT=8091
```

Luego reinicia:
```bash
docker-compose down
docker-compose up -d
```

### Error: "Cannot connect to Docker daemon"

- Verifica que Docker Desktop esté ejecutándose
- En Docker Desktop, ve a Settings > General y asegúrate de que "Use WSL 2" esté habilitado

### Los cambios en wp-content no se reflejan

Reinicia el contenedor de WordPress:
```bash
docker-compose restart wordpress
```

### Limpiar cache de Docker (si todo falla)

```bash
docker system prune -a
docker volume prune
```

Luego reconstruye:
```bash
docker-compose up -d --build
```

### Problemas de permisos en archivos

En Windows con WSL 2, Docker maneja los permisos automáticamente. Si tienes problemas:

1. Verifica que Docker Desktop use WSL 2 (Settings > General)
2. Asegúrate de que el proyecto esté en tu carpeta de usuario de Windows

### Base de datos no se conecta

Verifica el estado de salud de los contenedores:
```bash
docker-compose ps
```

Si el contenedor `db` no está "healthy", revisa los logs:
```bash
docker-compose logs db
```

## Optimización para Windows

El archivo `docker-compose.yml` incluye optimizaciones para Windows:

- **Volúmenes delegados:** Mejora el rendimiento de I/O
- **Health checks:** Asegura que los servicios estén listos
- **Configuración de MariaDB:** Optimizada para desarrollo local

## Siguiente Pasos

1. Importar una base de datos existente (si tienes):
   - Accede a phpMyAdmin: http://localhost:8081
   - Selecciona la base de datos `wordpress`
   - Ve a "Importar" y sube tu archivo `.sql`

2. Activar el tema Voseda:
   - Accede a WordPress: http://localhost:8080/wp-admin
   - Ve a "Apariencia > Temas"
   - Activa el tema Voseda

3. Comenzar a desarrollar:
   - Los cambios en `wp-content/` se reflejan automáticamente
   - Usa Git para controlar versiones de tu código

## Recursos Adicionales

- [Documentación de Docker](https://docs.docker.com/)
- [Documentación de WordPress](https://wordpress.org/documentation/)
- [Git - La Guía Simple](https://rogerdudler.github.io/git-guide/index.es.html)

## Soporte

Si encuentras problemas no cubiertos en esta guía:

1. Revisa los logs: `docker-compose logs -f`
2. Verifica que Docker Desktop esté actualizado
3. Consulta con el equipo de desarrollo
