# 会計管理アプリ(仮完成)
- 商品を追加し会計の管理が行えるアプリケーション
- 現状ベータ版になっているので今後機能追加予定

## 初回セットアップ

```sh
# 作業ディレクトリで作業してください
cp .env.example .env
#　以下はまとめてコピペ実行してください
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
```

## 起動手順

```sh
docker-compose up -d
docker-compose exec laravel.test npm run dev
```

## 停止方法

```sh
docker-compose down
```

## URL
アプリ：http://localhost/

phpMyAdmin: http://localhost:8080/

## コマンドリファレンス

```sh
# MySQLコンソールにログイン
docker-compose exec mysql mysql -u sail -p'password' example_app

# キャッシュ削除
docker-compose exec laravel.test php artisan cache:clear
docker-compose exec laravel.test php artisan config:clear
docker-compose exec laravel.test php artisan route:clear
docker-compose exec laravel.test php artisan view:clear
docker-compose exec laravel.test php artisan clear-compiled

# Laravel実行コンテナにログイン
docker-compose exec laravel.test /bin/bash
