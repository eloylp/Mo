class mariadb {
# Install mysql
  package { ['mariadb-server']:
    ensure => present,
    require => Exec['apt-update'],
  }

# Run mysql
  service { 'mysql':
    ensure  => running,
    require => Package['mariadb-server'],
  }

# Use a custom mysql configuration file
  file { '/etc/mysql/my.cnf':
    source  => 'puppet:///modules/mariadb/my.cnf',
    require => Package['mariadb-server'],
    notify  => Service['mysql'],
  }

# We set the root password here
  exec { 'set-mysql-password':
    unless  => 'mysqladmin -uroot -p3355 status',
    command => "mysqladmin -uroot password 3355",
    path    => ['/bin', '/usr/bin'],
    require => Service['mysql']
  }


  exec { "create-db":
    unless => "/usr/bin/mysql -uroot -p3355 twiggy",
    command => "/usr/bin/mysql -uroot -p3355 -e \"create database twiggy;\"",
    require => [Service['mysql'], Exec['set-mysql-password']]
  }

  exec { "grant-db":
    unless => "/usr/bin/mysql -uroot twiggy -p3355",
    command => "/usr/bin/mysql -uroot -e \"GRANT ALL ON *.* to 'root'@'%' IDENTIFIED BY '3355' WITH GRANT OPTION; FLUSH PRIVILEGES;\"",
    require => [Service['mysql'], Exec['create-db']]
  }


}
