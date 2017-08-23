FROM phpdockerio/php71-fpm:latest

# Install selected extensions and other stuff
RUN apt-get update \
	&& apt-get install -y \
	curl \
	zip \
	unzip \
	git \
	software-properties-common \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && apt-get -y --no-install-recommends install \
    php7.1-mysql \
    php-redis \
    php-igbinary \
    php-imagick \
    php7.1-mbstring \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

WORKDIR "/var/www"

COPY docker/php-fpm/php-ini-overrides.ini /etc/php/7.1/fpm/conf.d/99-overrides.ini

EXPOSE 9000

ADD ./ /var/www