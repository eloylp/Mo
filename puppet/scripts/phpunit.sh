#!/usr/bin/env bash
wget https://phar.phpunit.de/phpunit.phar &> /dev/null
chmod +x phpunit.phar
sudo mv phpunit.phar /usr/local/bin/phpunit