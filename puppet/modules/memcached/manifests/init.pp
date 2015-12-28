class memcached {
  # Install the memcached package. This relies on apt-get update
  package { 'memcached':
    ensure => 'present',
    require => Exec['apt-update']
  }

  # Make sure that the memcached service is running
  service { 'memcached':
    ensure => running,
    require => Package['memcached'],
  }

  # Cambios que se aplican al fichero de configuración de memcached
  file { 'memcached.conf':
    path => '/etc/memcached.conf',
    ensure => file,
    require => Package['memcached'],
    source => 'puppet:///modules/memcached/memcached.conf',
    notify => Service['memcached'],
  }
}