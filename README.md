# Steps to run the project.
- on the root of the project run composer to install dependencies

```
composer install
```

- copy .env.example and rename it with .env

```
cp .env.example .env
```

- run migration and seed the data
```
php artisan migrate --seed
```

# XML format location
- you will be able to find the xml format in sample-xml folder on the root of the project.
