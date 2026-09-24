# Build dos assets do Vite
FROM node:22-alpine AS assets

WORKDIR /app

COPY package*.json ./
RUN npm ci

COPY vite.config.js ./
COPY resources ./resources

RUN npm run build


# Aplicação Laravel
FROM serversideup/php:8.5-fpm-nginx AS app

WORKDIR /var/www/html

COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader \
    --no-scripts

COPY . .

COPY --from=assets /app/public/build ./public/build

RUN mkdir -p \
    database \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache \
    && touch database/database.sqlite \
    && chown -R www-data:www-data \
        database \
        storage \
        bootstrap/cache \
        public/build \
    && chmod -R ug+rwX \
        database \
        storage \
        bootstrap/cache \
        public/build

ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr
ENV NGINX_WEBROOT=/var/www/html/public

# Automação Laravel no início do container
ENV AUTORUN_ENABLED=true
ENV AUTORUN_LARAVEL_MIGRATION=true
ENV AUTORUN_LARAVEL_MIGRATION_FORCE=true
ENV AUTORUN_LARAVEL_STORAGE_LINK=false

EXPOSE 8080
