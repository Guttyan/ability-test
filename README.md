# ability-test

## 環境構築
1. docker-compose up -d --build
2. docker-compose exec php bash
3. composer create-project "laravel/laravel=8.*" . --prefer-dist
4. php artisan make:controller ContactController
5. php artisan make:migration create_contacts_table`
6. php artisan migrate
7. php artisan make:model Contact
8. php artisan make:request ContactRequest
9. php artisan make:migration
10. create_categories_table
11. php artisan migrate:fresh
12. php artisan make:model Category
13. php artisan make:seeder CategoriesTableSeeder
14. php artisan db:seed
15. php artisan make:factory ContactFactory
16. php artisan make:seeder ContactsTableSeeder
17. php artisan db:seed

## 使用技術
* Laravel 8.83.27
* PHP 7.4.9
* MySQL 8.0.26

## ER図
![index drawio](https://github.com/Guttyan/ability-test/assets/141023258/cf1acbe9-62e4-4c81-b935-2a877e5590ff)

## URL
* 開発環境:http://localhost/
* phpMyAdmin:http://localhost:8080/
