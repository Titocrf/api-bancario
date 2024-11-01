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
  procps \
  unzip \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install gd zip pdo pdo_pgsql

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Definir diretório de trabalho
WORKDIR /var/www

# Copiar arquivos para o container
COPY . .

# Instalar dependências do Laravel (durante a construção)
RUN composer install

# Configurar PHP-FPM como comando padrão
CMD ["php-fpm"]