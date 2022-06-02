FROM registry-vpc.cn-beijing.aliyuncs.com/bluedot/php:7.4

WORKDIR /var/www/html

COPY . /var/www/html
COPY deploy/entrypoint.sh /usr/local/bin/entrypoint
COPY .env.production /var/www/html/.env

RUN chmod +x /usr/local/bin/entrypoint

EXPOSE 80 9000

ENTRYPOINT ["/usr/local/bin/entrypoint"]