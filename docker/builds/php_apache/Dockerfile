FROM ubuntu:14.04

RUN apt-get update

# Apache2 setup
RUN apt-get install -y apache2

# Create necessary apache2 dirs
RUN rm -rf /var/www/html \
            && mkdir -p /var/lock/apache2 \
                        /var/run/apache2 \
                        /var/log/apache2 \
                        /app/public \
            && chown -R www-data:www-data /var/lock/apache2 \
                                          /var/run/apache2 \
                                          /var/log/apache2 \
                                          /app

# Enable apache modules and prefork
RUN a2dismod mpm_event \
    && a2enmod mpm_prefork \
               rewrite

# Apache conf
RUN mv /etc/apache2/apache2.conf /etc/apache2/apache2.conf.dist \
    && rm /etc/apache2/conf-enabled/* \
          /etc/apache2/sites-enabled/*

COPY ./config/apache2.conf /etc/apache2/apache2.conf

RUN apt-get update

# PHP 5.6 setup
RUN apt-get install -y git \
                       curl
RUN apt-get update
RUN apt-get install -y libapache2-mod-php5 \
                       php5-common \
                       php5-json \
                       php5-mysqlnd \
                       php5-gd \
                       php5-mcrypt \
                       php5-curl \
                       php5-xdebug \
                       php5-dev \
                       libcurl3 \
                       libpcre3-dev \
                       libcurl4-openssl-dev


# Install mongo
RUN git clone https://github.com/mongodb/mongo-php-driver.git
WORKDIR mongo-php-driver
RUN git submodule sync && git submodule update --init
RUN phpize
RUN ./configure
RUN make all -j 5
RUN make install



# Enable php mod mcrypt
WORKDIR /
RUN php5enmod mcrypt

# Copy conf files
COPY ./config/php5.conf /etc/php5/apache2/php.ini
COPY ./config/php5.cli.conf /etc/php5/cli/php.ini
COPY ./config/20-xdebug.ini /etc/php5/apache2/conf.d/20-xdebug.ini

# Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

WORKDIR /app

COPY ./postconfig.sh /postconfig.sh

EXPOSE 80
EXPOSE 443

CMD ["apache2", "-DFOREGROUND"]