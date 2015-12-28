#!/usr/bin/env bash
symfony_dir=/var/www/mo
php $symfony_dir/app/console doctrine:schema:update --dump-sql --force
