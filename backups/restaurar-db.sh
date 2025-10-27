#!/bin/bash

# Script de Restauración de Base de Datos - VOSEDA WordPress
# Uso: ./restaurar-db.sh

set -e

echo "=== Restauración de Base de Datos VOSEDA ==="
echo ""

# Colores para output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Verificar que Docker está corriendo
if ! docker ps &> /dev/null; then
    echo -e "${RED}Error: Docker no está corriendo${NC}"
    exit 1
fi

# Verificar que el contenedor de base de datos existe
if ! docker ps -a | grep -q voseda_db; then
    echo -e "${RED}Error: El contenedor voseda_db no existe${NC}"
    echo "Primero ejecuta: docker-compose up -d"
    exit 1
fi

# Verificar que el contenedor está corriendo
if ! docker ps | grep -q voseda_db; then
    echo -e "${YELLOW}El contenedor voseda_db no está corriendo. Iniciando...${NC}"
    docker start voseda_db
    echo "Esperando 10 segundos para que MySQL inicie..."
    sleep 10
fi

# Buscar el archivo de respaldo más reciente
BACKUP_FILE=$(ls -t voseda_complete_backup_*.sql.gz 2>/dev/null | head -1)

if [ -z "$BACKUP_FILE" ]; then
    BACKUP_FILE=$(ls -t voseda_complete_backup_*.sql 2>/dev/null | head -1)
fi

if [ -z "$BACKUP_FILE" ]; then
    BACKUP_FILE=$(ls -t voseda_db_backup_*.sql 2>/dev/null | head -1)
fi

if [ -z "$BACKUP_FILE" ]; then
    echo -e "${RED}Error: No se encontró ningún archivo de respaldo${NC}"
    exit 1
fi

echo -e "${GREEN}Archivo de respaldo encontrado: $BACKUP_FILE${NC}"
echo ""

# Preguntar confirmación
read -p "¿Deseas restaurar la base de datos desde este archivo? (s/n): " -n 1 -r
echo ""
if [[ ! $REPLY =~ ^[SsYy]$ ]]; then
    echo "Operación cancelada"
    exit 0
fi

echo -e "${YELLOW}Restaurando base de datos...${NC}"
echo ""

# Restaurar según el tipo de archivo
if [[ $BACKUP_FILE == *.gz ]]; then
    echo "Descomprimiendo y restaurando..."
    gunzip -c "$BACKUP_FILE" | docker exec -i voseda_db mysql -u wordpress -pwordpress wordpress
else
    echo "Restaurando desde archivo SQL..."
    docker exec -i voseda_db mysql -u wordpress -pwordpress wordpress < "$BACKUP_FILE"
fi

if [ $? -eq 0 ]; then
    echo ""
    echo -e "${GREEN}=== Restauración completada exitosamente ===${NC}"
    echo ""
    echo "Puedes acceder a:"
    echo "- Sitio web: http://localhost:8080"
    echo "- WordPress Admin: http://localhost:8080/wp-admin"
    echo "- phpMyAdmin: http://localhost:8081"
else
    echo ""
    echo -e "${RED}Error durante la restauración${NC}"
    exit 1
fi
