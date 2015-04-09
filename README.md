symfony
=======

A Symfony project created on March 20, 2015, 9:26 am.<br/>
php app/console doctrine:database:create <br/>

Создание yml файлов на основе БД
php app/console doctrine:mapping:import AcmeShagtvBundle yml <br/>

php app/console doctrine:mapping:convert annotation ./src <br/>

генерация моделей
php app/console doctrine:generate:entities AcmeShagtvBundle <br/>

Очистка кеша
php app/console cache:clear  --env=prod --no-debug

php app/console generate:doctrine:crud