FROM php:8.1-fpm

# Instalar dependências e extensões necessárias
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libpq-dev \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_pgsql

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Definir diretório de trabalho
WORKDIR /var/www

# Copiar arquivos para o container
COPY . .

# Executar Composer install no build para preparar dependências do Laravel
RUN composer install

# Expor a porta 9000 para PHP-FPM
EXPOSE 9000

# Configurar PHP-FPM como comando padrão
CMD ["php-fpm"]