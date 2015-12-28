class php {

# Install the php5-fpm and php5-cli packages
  package { ['php5-fpm','php5-cli', 'php5-memcached', 'php5-apcu', 'php5-mcrypt', 'php5-intl', 'php-pear', 'php5-dev', 'php5-sqlite']:
    ensure => present,
    require => Exec['apt-update'],
  }

  package { ['php5-mysql', 'php5-curl']:
    ensure => present,
    require => Package['php5-fpm'],
  }


# Make sure php5-fpm is running
  service { 'php5-fpm':
    ensure => running,
    require => Package['php5-fpm'],
  }

  file { 'www.conf':
    path => '/etc/php5/fpm/pool.d/www.conf',
    ensure => file,
    require => Package['php5-fpm'],
    source => 'puppet:///modules/php/www.conf',
    notify => Service['php5-fpm'],
  }

  file { 'php.ini':
    path => '/etc/php5/fpm/php.ini',
    ensure => file,
    require => Package['php5-fpm'],
    source => 'puppet:///modules/php/php.ini',
    notify => Service['php5-fpm'],
  }

  file { 'php-cli.ini':
    path => '/etc/php5/cli/php.ini',
    ensure => file,
    require => Package['php5-cli'],
    source => 'puppet:///modules/php/php.ini',
  }

}