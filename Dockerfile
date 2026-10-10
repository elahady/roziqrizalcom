# Build frontend assets
FROM node:20-alpine AS assets
WORKDIR /app
COPY package*.json ./
RUN npm ci
COPY resources resources
COPY vite.config.js ./
RUN npm run build

# Production image: PHP-FPM + nginx bundled (serversideup/php)
FROM serversideup/php:8.3-fpm-nginx AS production

WORKDIR /var/www/html

USER root
COPY --chown=www-data:www-data . .
COPY --from=assets --chown=www-data:www-data /app/public/build ./public/build

RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress \
    && mkdir -p database \
    && touch database/database.sqlite \
    && mkdir -p storage/framework/sessions storage/framework/views \
       storage/framework/cache/data storage/app/public storage/logs \
    && chown -R www-data:www-data storage bootstrap/cache database

USER www-data

ENV APP_ENV=production
ENV LOG_CHANNEL=stderr
