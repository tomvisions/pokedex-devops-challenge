FROM composer:2.2.21
WORKDIR /var/www/html
RUN apk update && apk add bash openrc procps nodejs npm
# INSTALL COMPOSER

#COPY package*.json /var/www/html
#COPY composer* /var/www/html
COPY . .
RUN composer install
RUN npm ci
RUN cp .env.example .env
#COPY .env.example .env
#RUN composer install
#UN bash
#UN curl -s https://getcomposer.org/installer | php && alias composer='php composer.phar' # &&  composer install
#RUN which composer
#RUN alias composer='php composer.phar'
#RUN composer install

#RUN apk add --no-cache libstdc++ bash; \
#    echo 'source $HOME/.profile;' >> $HOME/.zshrc; \
#    curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.35.1/install.sh | bash; \
#    echo 'export NVM_NODEJS_ORG_MIRROR=https://unofficial-builds.nodejs.org/download/release;' >> $HOME/.profile; \
#    echo 'nvm_get_arch() { nvm_echo "x64-musl"; }' >> $HOME/.profile; \
#    NVM_DIR="$HOME/.nvm"; source $HOME/.nvm/nvm.sh; source $HOME/.profile; \
#    nvm -v \
#    nvm install 20
#RUN npm ci
COPY entrypoint.sh /usr/local/bin
RUN chmod +x /usr/local/bin/entrypoint.sh

CMD ["/bin/bash", "/usr/local/bin/entrypoint.sh"]
 #php artisan serve
