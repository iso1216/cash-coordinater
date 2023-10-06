# Use an official PHP image as the base image
FROM php:8.2-fpm

# Set the working directory in the container
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql zip

# Copy the application code into the container
COPY . /var/www/html

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install NPM and Node.js (if needed for your Laravel project)
# RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
# RUN apt-get install -y nodejs

# Install application dependencies using Composer
RUN composer install

# Expose port if necessary (if you want to access PHP-FPM directly)
# EXPOSE 9000

# Define the command to run when the container starts
CMD ["php-fpm"]
