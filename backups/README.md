# Respaldos VOSEDA WordPress

Este directorio contiene los respaldos del sitio WordPress VOSEDA.

## Contenido

### Base de Datos
- `voseda_complete_backup_20251027_132556.sql.gz` - Respaldo completo comprimido (233 KB)
  - Incluye: tablas, triggers, routines, events
  - Compresión: ~75% del tamaño original
  - **Archivo recomendado para restauración**

- `voseda_complete_backup_20251027_132556.sql` - Respaldo completo sin comprimir (933 KB)
- `voseda_db_backup_20251027_130636.sql` - Respaldo básico (932 KB)

### Plugins
- `voseda-footer-banner/` - Plugin de footer banner completo
- `voseda-footer-banner-v1.2.0.zip` - Plugin empaquetado (15 KB)
- `mu-plugins/` - Must-use plugins

### Script de Restauración
- `restaurar-db.sh` - Script automático para restaurar la base de datos

## Uso del Script de Restauración

### Restauración Rápida (Recomendada)

```bash
cd backups
./restaurar-db.sh
```

El script automáticamente:
1. Verifica que Docker está corriendo
2. Busca el archivo de respaldo más reciente
3. Descomprime (si es necesario) y restaura la base de datos
4. Te muestra las URLs para acceder al sitio

### Restauración Manual

Si prefieres restaurar manualmente:

#### Desde archivo comprimido (.gz)
```bash
gunzip -c voseda_complete_backup_20251027_132556.sql.gz | docker exec -i voseda_db mysql -u wordpress -pwordpress wordpress
```

#### Desde archivo SQL
```bash
docker exec -i voseda_db mysql -u wordpress -pwordpress wordpress < voseda_complete_backup_20251027_132556.sql
```

## Requisitos Previos

Antes de restaurar, asegúrate de que:

1. Docker está corriendo
2. Los contenedores están levantados:
   ```bash
   docker-compose up -d
   ```
3. Espera a que los contenedores estén "healthy" (~1-2 minutos)

## Verificación Post-Restauración

Después de restaurar, verifica:
- ✅ Sitio accesible en http://localhost:8080
- ✅ Admin accesible en http://localhost:8080/wp-admin
- ✅ Plugins activos y funcionando
- ✅ Tema Voseda activo
- ✅ Footer banner visible

## Tamaños de Archivos

| Archivo | Tamaño | Compresión |
|---------|--------|------------|
| voseda_complete_backup_*.sql.gz | 233 KB | 75% |
| voseda_complete_backup_*.sql | 933 KB | - |
| voseda-footer-banner-v1.2.0.zip | 15 KB | - |

## Notas Importantes

- Los archivos `.sql` y `.gz` están en `.gitignore` y NO se subirán al repositorio
- Guarda estos archivos en un lugar seguro fuera del repositorio
- El archivo comprimido `.gz` es más fácil de transferir y almacenar
- El script `restaurar-db.sh` funciona con archivos comprimidos y sin comprimir

## Credenciales de Base de Datos

- Usuario: `wordpress`
- Contraseña: `wordpress`
- Base de datos: `wordpress`
- Host: `voseda_db` (dentro de Docker)
- Puerto: `3306` (interno)

---

**Fecha de creación**: 27 de octubre de 2025
**Generado automáticamente durante el proceso de respaldo**
