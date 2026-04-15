FROM php:8.3-apache

# Dépendances système
RUN apt-get update && apt-get install -y \
    git curl unzip \
    libpng-dev libjpeg-dev libpq-dev libzip-dev \
    libfreetype6-dev libwebp-dev \
    && rm -rf /var/lib/apt/lists/*

# Extensions PHP requises par Drupal
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_pgsql pgsql zip opcache exif

# Apache mod_rewrite + AllowOverride pour Drupal
RUN a2enmod rewrite && \
    sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf && \
    sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/sites-available/000-default.conf

# Augmenter les limites PHP
RUN echo "memory_limit=256M\nupload_max_filesize=64M\npost_max_size=64M\nmax_execution_time=300" \
    > /usr/local/etc/php/conf.d/drupal.ini

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copier le projet
COPY . /var/www/html/
WORKDIR /var/www/html

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Permissions
RUN chown -R www-data:www-data /var/www/html \
    && mkdir -p sites/default/files/config_sync \
    && chmod -R 777 sites/default/files

# Script de démarrage
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 80
ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]
