# ability-test

## 環境構築
Dockerビルド  
 1.git clone https://github.com/Guttyan/ability-test.git  
 2.docker-compose up -d --build

Laravel環境構築
1. docker-compose exec php bash
2. composer install
3. .env.exampleファイルから.envを作成し、環境変数を変更
4. php key:generate
5. php artisan migrate
6. php artisan db:seed

## 使用技術
* Laravel 8.83.27
* PHP 7.4.9
* MySQL 8.0.26

## ER図
![index drawio](https://github.com/Guttyan/ability-test/assets/141023258/cf1acbe9-62e4-4c81-b935-2a877e5590ff)

## URL
* 開発環境:http://localhost/
* phpMyAdmin:http://localhost:8080/
