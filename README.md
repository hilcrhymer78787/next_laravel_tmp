git clone https://github.com/hilcrhymer78787/next_laravel_tmp.git

cd next_laravel_tmp

docker-compose up -d --build

docker-compose exec app bash

cp .env.example .env

composer install

php artisan key:generate

php artisan migrate:refresh --seed

もう一つターミナルを開く

docker-compose exec next bash

cp .env.example .env

npm install

npm run dev

<!-- node v16.13.2 -->