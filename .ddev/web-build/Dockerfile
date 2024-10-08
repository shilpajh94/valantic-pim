# Based on https://ddev.readthedocs.io/en/stable/users/extend/customizing-images/#adding-extra-dockerfiles-for-webimage-and-dbimage

# See https://github.com/ddev/ddev/issues/6047 for the next 3 lines
RUN update-alternatives --set php /usr/bin/php${DDEV_PHP_VERSION}
RUN ln -sf /usr/sbin/php-fpm${DDEV_PHP_VERSION} /usr/sbin/php-fpm
RUN export PHP_INI=/etc/php/${DDEV_PHP_VERSION}/fpm/php.ini

ENV COMPOSER_HOME=/usr/local/composer

RUN which php
RUN php -v
RUN composer global require phpstan/phpstan:^1.0
RUN composer global require friendsofphp/php-cs-fixer:^3.68
RUN composer global require rector/rector:^1.0

RUN export PATH=/usr/local/composer/vendor/bin:$PATH

# Make `COMPOSER_HOME` writable if regular users need to use it.
# RUN chmod -R ugo+rw $COMPOSER_HOME
# Now turn it off, because ordinary users will want to be using the default.
# ENV COMPOSER_HOME=""
