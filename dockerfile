# Usa la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Copia los archivos del proyecto al directorio raíz de Apache
COPY . /var/www/html/

# Da permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expone el puerto (Render usará $PORT automáticamente)
EXPOSE 80

# Comando por defecto (Apache con PHP)
CMD ["apache2-foreground"]
