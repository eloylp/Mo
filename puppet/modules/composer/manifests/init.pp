class composer {
  exec { "install_composer":
    command => "curl -sS https://getcomposer.org/installer | php && sudo mv composer.phar /usr/local/bin/composer",
    path    => "/usr/local/bin/:/bin/:/usr/bin"
  }
}