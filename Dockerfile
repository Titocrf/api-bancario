FROM php:8.1-fpm

# Instalar dependências e extensões necessárias
RUN apt-get update && apt-get install -y \
<<<<<<< HEAD
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
=======
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
>>>>>>> develop

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Definir diretório de trabalho
WORKDIR /var/www

# Copiar arquivos para o container
COPY . .

<<<<<<< HEAD
# Executar Composer install no build para preparar dependências do Laravel
RUN composer install

# Expor a porta 9000 para PHP-FPM
EXPOSE 9000

=======
# Instalar dependências do Laravel (durante a construção)
RUN composer install

>>>>>>> develop
# Configurar PHP-FPM como comando padrão
CMD ["php-fpm"]