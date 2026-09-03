clear
./vendor/bin/pest
clear
exit
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
docker exec -it poo_web_quasar bash
exit
php artisan test
php artisan make:model Category -fsm
php artisan migrate
clear
php artisan migrate
php artisan db:seed CategorySeeder
php artisan db:seed CategorySeeder
php artisan db:seed --class=CategorySeeder
php artisan db:seed --class=CategorySeeder
php artisan optimize:clear
composer dump-autoload
clear
pdx
pdw
pwd
ls
php artisan optimize:clear
php artisan db:seed --class=CategorySeeder
exit
php artisan make:model Product -fsm
php artisan make:model Product -m
exit
exit
php artisan db:seed --class=OrderSeeder
php artisan migrate
php artisan make:request OrderStoreRequest
php artisan make:request OrderUpdateRequest
php artisan make:controller OrderController --api --pest
exit
