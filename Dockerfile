docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install

docker-compose up -d

docker-compose exec laravel.test php artisan key:generate

docker-compose exec laravel.test php artisan migrate:fresh

docker-compose exec laravel.test npm install

docker-compose exec laravel.test npm run dev
