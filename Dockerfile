# Utiliser une image officielle PHP avec Apache
FROM php:8.2-apache

# Copier les fichiers de l'application dans le répertoire de travail
COPY . /var/www/html

# Donner les permissions nécessaires
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Installer les extensions PHP nécessaires (par exemple : PDO MySQL)
RUN docker-php-ext-install pdo pdo_mysql

# Exposer le port 80 pour Apache
EXPOSE 80
