class nginx {
# Install the nginx package. This relies on apt-get update
  package { 'nginx':
    ensure => 'present',
    require => Exec['apt-update'],
  }

# Make sure that the nginx service is running
  service { 'nginx':
    ensure => running,
    require => Package['nginx'],
  }

  # Add a upstream for php-fpm
  file { 'phpupstream':
    path => "/etc/nginx/conf.d/upstream.conf",
    ensure => file,
    require => Package['nginx'],
    content => template('nginx/php-upstream.erb'),
    notify  => Service[nginx]
  }

  # Disable the default nginx vhost
  file { 'default-nginx-disable':
    path => '/etc/nginx/sites-enabled/default',
    ensure => absent,
    require => Package['nginx'],
  }



  # Add a vhost template for synfony
  file { 'vagrant-nginx-symfony':
    path => "/etc/nginx/sites-available/symfony",
    ensure => file,
    require => Package['nginx'],
    content => template('nginx/symfony.erb'),
    notify  => Service[nginx]
  }


  # Symlink our vhost in sites-enabled to symfony enable it
  file { 'vagrant-nginx-symfonyx-enable':
    path => "/etc/nginx/sites-enabled/symfony",
    target => "/etc/nginx/sites-available/symfony",
    ensure => link,
    notify => Service['nginx'],
    require => [
      File['default-nginx-disable'],
    ],
  }
}