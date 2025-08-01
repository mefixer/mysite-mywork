#!/bin/bash

echo "🐳 Configurando proyecto CodeIgniter 4 con Docker..."

# Verificar si Docker Compose está instalado
if ! command -v docker &> /dev/null; then
    echo "❌ Docker no está instalado. Por favor instala Docker primero."
    exit 1
fi

# Verificar si Docker Compose está disponible
if ! docker compose version &> /dev/null; then
    echo "❌ Docker Compose no está disponible. Por favor instala Docker Desktop o Docker Compose."
    exit 1
fi

# Copiar archivo de configuración de entorno si no existe .env
if [ ! -f .env ]; then
    echo "📝 Copiando archivo de configuración de entorno..."
    cp .env.docker .env
    echo "✅ Archivo .env creado desde .env.docker"
else
    echo "⚠️  El archivo .env ya existe. Si quieres usar la configuración Docker, copia manualmente .env.docker a .env"
fi

# Construir y ejecutar los contenedores
echo "🚀 Construyendo y levantando los contenedores..."
docker compose up -d --build

# Esperar a que los servicios estén listos
echo "⏳ Esperando a que los servicios estén listos..."
sleep 10

# Mostrar el estado de los contenedores
echo "📊 Estado de los contenedores:"
docker compose ps

echo ""
echo "🎉 ¡Proyecto levantado exitosamente!"
echo ""
echo "📋 URLs disponibles:"
echo "   🌐 Aplicación CodeIgniter 4: http://localhost:8080"
echo "   🗄️  phpMyAdmin: http://localhost:8081"
echo ""
echo "🔐 Credenciales de la base de datos:"
echo "   Host: db (desde la aplicación) / localhost:3306 (desde el host)"
echo "   Database: ci4_database"
echo "   Usuario: ci4_user"
echo "   Contraseña: ci4_password"
echo "   Root password: root_password"
echo ""
echo "🛠️  Comandos útiles:"
echo "   Parar servicios: docker compose down"
echo "   Ver logs: docker compose logs -f"
echo "   Reiniciar: docker compose restart"
echo "   Acceder al contenedor: docker compose exec web bash"
echo ""
