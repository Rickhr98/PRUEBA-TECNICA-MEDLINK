# Usa la imagen oficial de PHP
FROM php:8.2-cli

# Copia todo el contenido del repositorio al contenedor
WORKDIR /app
COPY . /app

# Da permisos de ejecución al script run.sh (si existe)
RUN chmod +x /app/run.sh

# Comando por defecto: ejecutar el script que corre todos los retos
CMD ["sh", "run.sh"]