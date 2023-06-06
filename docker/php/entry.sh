#!/bin/bash
supervisord -n -c /etc/supervisor/supervisord.conf & docker-php-entrypoint php-fpm