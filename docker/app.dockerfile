FROM php:7.0.4-fpm

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- \
        --filename=composer \
        --install-dir=/usr/local/bin && \
        echo "alias composer='composer'" >> /root/.bashrc

RUN apt-get update && apt-get install -y libmcrypt-dev \
    mysql-client libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install mcrypt pdo_mysql
#    && apt-get install -y cron\
#    && touch /var/log/cron.log
#    && crontab /etc/cron.d/hello-cron\
#    && chmod 0644 /etc/cron.d/hello-cron\
#    && touch /var/log/cron.log

WORKDIR /var/www/app
CMD ["php-fpm"]

# Run the command on container startup
#CMD cron && tail -f /var/log/cron.log