class xdebug {
  # Install the php5-fpm and php5-cli packages
  package { ['php5-xdebug']:
    ensure => present,
    require => [Exec['apt-update'], Package['php5-fpm']]
  }

  file { 'xdebug-ini':
    path => '/etc/php5/mods-available/xdebug.ini',
    ensure => file,
    require => [Package['nginx'], Package['php5-fpm']],
    source => 'puppet:///modules/xdebug/xdebug.ini',
  }

  file { 'xdebug-enable':
    path => '/etc/php5/fpm/conf.d/20-xdebug.ini',
    target => '/etc/php5/mods-available/xdebug.ini',
    ensure => link,
    require => [
      File['xdebug-ini']
    ],
    notify  => Service['php5-fpm']
  }

  exec { 'delete_xdebug.ini_cli':
    command  =>  'rm /etc/php5/cli/conf.d/20-xdebug.ini',
    path => ":/usr/bin:/bin:/usr/sbin:/sbin",
    onlyif   =>  ['grep -c xdebug.so /etc/php5/cli/conf.d/20-xdebug.ini'],
    require => [
      File['xdebug-ini']
    ],
  }
}