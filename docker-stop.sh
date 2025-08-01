#!/bin/bash

echo "🛑 Deteniendo proyecto CodeIgniter 4 con Docker..."

# Verificar si Docker Compose está disponible
if ! docker compose version &> /dev/null; then
    echo "❌ Docker Compose no está disponible."
    exit 1
fi

# Detener y remover contenedores
echo "🔄 Deteniendo servicios..."
docker compose down

echo ""
echo "✅ Servicios detenidos exitosamente!"
echo ""
echo "📋 Comandos útiles:"
echo "   🚀 Reiniciar servicios: ./docker-start.sh"
echo "   🗄️  Ver logs: docker compose logs -f"
echo "   🧹 Limpiar completamente: docker compose down -v"
echo ""
