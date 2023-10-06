# Use the official Laravel Sail PHP 8.2 image as the base image
FROM laravelsail/php82-composer:latest

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the application code into the container
COPY . /var/www/html

# Expose ports (if needed)
# EXPOSE 80
# EXPOSE 5173

# Define environment variables (if needed)
# ENV WWWUSER=${WWWUSER}
# ENV LARAVEL_SAIL=1
# ENV XDEBUG_MODE=${SAIL_XDEBUG_MODE:-off}
# ENV XDEBUG_CONFIG=${SAIL_XDEBUG_CONFIG:-client_host=host.docker.internal}
# ENV IGNITION_LOCAL_SITES_PATH=${PWD}

# Install any additional PHP extensions or dependencies (if needed)
# RUN docker-php-ext-install pdo pdo_mysql

# Optionally, run additional setup commands here (if needed)

# Define the command to run when the container starts
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]
