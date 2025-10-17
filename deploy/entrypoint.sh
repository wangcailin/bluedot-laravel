#!/usr/bin/env bash

set -e

rm /etc/nginx/sites-enabled/*
cp deploy/nginx.conf /etc/nginx/conf.d/nginx.conf

cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini
sed -i 's/;opcache.enable=1/opcache.enable=1/g' /usr/local/etc/php/php.ini
sed -i 's/upload_max_filesize = 2M/upload_max_filesize = 200M/g' /usr/local/etc/php/php.ini
sed -i 's/post_max_size = 8M/post_max_size = 200M/g' /usr/local/etc/php/php.ini
sed -i 's/memory_limit = 128M/memory_limit = 256M/g' /usr/local/etc/php/php.ini
sed -i 's/max_execution_time = 30/max_execution_time = 300/g' /usr/local/etc/php/php.ini

cd /var/www/html

chown -R www-data:www-data storage && chmod -R 777 storage/
chown -R www-data:www-data bootstrap/cache && chmod -R 777 bootstrap/cache

echo "cron"
cp deploy/crontab /etc/cron.d/
chmod 0644 /etc/cron.d/crontab
crontab  /etc/cron.d/crontab
cron -f &

echo "supervisor"
cp deploy/supervisor.conf  /etc/supervisor/conf.d/
supervisord -c /etc/supervisor/supervisord.conf
supervisorctl update
supervisorctl start laravel-queue:*

echo 'cache'
php artisan config:cache
php artisan route:cache
php artisan event:cache

# 后台启动
php-fpm -D && nginx -g 'daemon off;'