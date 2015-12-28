class phpunit {
  exec {  "install_phpunit":
    command => "wget https://phar.phpunit.de/phpunit.phar && sudo mv phpunit.phar /usr/local/bin/phpunit",
    path    => "/usr/local/bin/:/bin/:/usr/bin"
  }
}