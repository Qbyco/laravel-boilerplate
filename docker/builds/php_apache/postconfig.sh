if [ ! -f "run" ]; then
    composer update
    cp .env.example .env
    php artisan key:generate

    mkdir storage/cache
    mkdir storage/framework

    mkdir storage/framework/cache
    mkdir storage/framework/sessions
    mkdir storage/framework/views

    chmod 777 -R bootstrap/cache storage

    touch run
fi

apache2 -DFOREGROUND