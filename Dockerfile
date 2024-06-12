FROM composer:2.2.21
WORKDIR /var/www/html
RUN apk update && apk add bash openrc procps nodejs npm
COPY entrypoint.sh /usr/local/bin
RUN chmod +x /usr/local/bin/entrypoint.sh
