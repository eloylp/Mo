exec { 'apt-update':
  command => 'apt-get update',
  path => '/usr/bin',
}

package { ['vim', 'curl', 'ruby-compass', 'git', 'nfs-common', 'wkhtmltopdf', 'sendmail', 'libxml2-utils', 'nano', 'acl']:
  ensure => present,
  require => Exec['apt-update'],
}

file { '/var/www/mo/profiler':
  ensure => 'directory',
}

file { '/home/vagrant/.bash_aliases':
  source => 'puppet:///modules/server/dot/.bash_aliases',
  ensure => 'file',
}


file { '/home/vagrant/.bash_git':
  source => 'puppet:///modules/server/dot/.bash_git',
  ensure => 'file',
}

file { '/home/vagrant/.vimrc':
  source => 'puppet:///modules/server/dot/.vimrc',
  ensure => 'file',
}

include nginx, memcached, php, xdebug, composer, bower, phpunit, mariadb, rabbitmq