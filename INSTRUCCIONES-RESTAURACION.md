# Instrucciones de Restauración - VOSEDA WordPress

Este documento contiene las instrucciones para restaurar tu sitio WordPress después del reinicio de tu equipo.

## Estado Actual

Fecha de respaldo: 27 de octubre de 2025 - 13:25

### Repositorio Git
- **URL del repositorio**: https://github.com/ilodi/voseda-wp.git
- **Rama**: main
- **Último commit**: Sync WordPress site configuration and plugins

### Respaldos Creados

Los siguientes archivos se encuentran en la carpeta `backups/`:

1. **Base de datos** (RECOMENDADO):
   - `voseda_complete_backup_20251027_132556.sql.gz` (233 KB comprimido) ⭐
   - `voseda_complete_backup_20251027_132556.sql` (933 KB sin comprimir)
   - Incluye: tablas, triggers, routines, events

2. **Script de restauración automática**:
   - `restaurar-db.sh` - Script para restaurar la base de datos fácilmente

3. **Plugin de footer**:
   - Carpeta completa: `backups/voseda-footer-banner/`
   - Archivo ZIP: `backups/voseda-footer-banner-v1.2.0.zip`

4. **Must-use plugins**: `backups/mu-plugins/`

5. **Documentación**: `backups/README.md` - Guía detallada de los respaldos

## Pasos para Restaurar

### 1. Clonar el Repositorio

Después de reiniciar tu equipo, clona el repositorio en tu directorio de trabajo:

```bash
cd ~/Documents/imaas/sites/
git clone https://github.com/ilodi/voseda-wp.git voseda
cd voseda
```

### 2. Restaurar el Submódulo del Tema

El tema de Voseda está configurado como submódulo. Inicialízalo y actualízalo:

```bash
git submodule init
git submodule update
```

### 3. Configurar Docker

Los contenedores Docker que estaban corriendo eran:
- `voseda_db` - MariaDB 10.6
- `voseda_wp` - WordPress con PHP 8.2
- `voseda_pma` - phpMyAdmin

Levanta los contenedores:

```bash
docker-compose up -d
```

Espera a que los contenedores estén en estado "healthy" (puede tomar 1-2 minutos).

### 4. Restaurar la Base de Datos

#### Opción A: Restauración Automática (RECOMENDADA) ⭐

Usa el script de restauración que hace todo por ti:

```bash
cd backups
./restaurar-db.sh
```

El script automáticamente:
- Verifica que Docker está corriendo
- Encuentra el respaldo más reciente
- Descomprime y restaura la base de datos
- Te muestra las URLs de acceso

#### Opción B: Restauración Manual

Si prefieres hacerlo manualmente:

```bash
# Desde archivo comprimido (más rápido de transferir)
gunzip -c backups/voseda_complete_backup_20251027_132556.sql.gz | docker exec -i voseda_db mysql -u wordpress -pwordpress wordpress

# O desde archivo SQL sin comprimir
docker exec -i voseda_db mysql -u wordpress -pwordpress wordpress < backups/voseda_complete_backup_20251027_132556.sql
```

### 5. Verificar el Plugin de Footer

El plugin de footer (Voseda Footer Banner v1.2.0) ya debería estar en:
- `wp-content/plugins/voseda-footer-banner/`

Si no está, puedes restaurarlo desde:
- `backups/voseda-footer-banner/` (carpeta completa)
- `backups/voseda-footer-banner-v1.2.0.zip` (archivo ZIP)

Para instalar desde el ZIP:
1. Ve a WordPress Admin: http://localhost:8080/wp-admin
2. Plugins > Añadir nuevo > Subir plugin
3. Selecciona el archivo ZIP y actívalo

### 6. Verificar Must-Use Plugins

Los must-use plugins deberían estar en:
- `wp-content/mu-plugins/`

Si no están, cópialos desde `backups/mu-plugins/`:

```bash
cp -r backups/mu-plugins/* wp-content/mu-plugins/
```

### 7. Acceder al Sitio

Una vez que todo esté restaurado:

- **Sitio web**: http://localhost:8080
- **WordPress Admin**: http://localhost:8080/wp-admin
- **phpMyAdmin**: http://localhost:8081

## Información Adicional

### Archivos Importantes Incluidos en el Repositorio

- `CAMBIOS-DEGRADADO-TITULOS.md` - Documentación sobre cambios en degradados de títulos
- `SLIDER-CERTIFICACIONES.md` - Documentación sobre slider de certificaciones
- `wp-content/mu-plugins/` - Plugins de activación automática y estilos CF7
- `wp-content/plugins/contact-form-7/` - Plugin Contact Form 7 completo
- `wp-content/themes/voseda/` - Tema personalizado (submódulo)

### Credenciales de Docker (según docker-compose.yml)

Si necesitas las credenciales para la base de datos:
- **Usuario**: wordpress
- **Contraseña**: wordpress
- **Base de datos**: wordpress

### Verificación Post-Restauración

Después de restaurar, verifica:
1. El sitio carga correctamente en http://localhost:8080
2. Todos los plugins están activos en wp-admin
3. El tema Voseda está activo y funcional
4. El plugin de footer banner aparece en la parte inferior del sitio
5. Los formularios de Contact Form 7 funcionan correctamente

## Problemas Comunes

### Si los contenedores no inician
```bash
docker-compose down
docker-compose up -d
```

### Si necesitas reconstruir los contenedores
```bash
docker-compose down -v
docker-compose up -d --build
```

### Si necesitas verificar logs
```bash
docker-compose logs -f wordpress
docker-compose logs -f db
```

## Siguiente Paso

Una vez que hayas restaurado todo y verificado que funciona, puedes continuar trabajando normalmente. Todos los cambios que hagas podrás commitearlos y hacer push al repositorio:

```bash
git add .
git commit -m "Tu mensaje de commit"
git push origin main
```

---

**Nota**: Este documento fue generado automáticamente durante el proceso de respaldo del 27 de octubre de 2025.
