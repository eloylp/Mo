class bower {
# Note the new setup script name for Node.js v0.12
  exec { 'get_node':
    command => "curl -sL https://deb.nodesource.com/setup_0.12 | sudo bash -",
    path    => "/usr/local/bin/:/bin/:/usr/bin"
  }

# Then install with:
  #sudo apt-get install -y nodejs
  # Install the nodejs package. This relies on apt-get update
  package { 'nodejs':
    ensure => 'present',
    require => [Exec['apt-update'], Exec['get_node']]
  }

/*  # Instalamos npm siempre que nodejs esté presente.
  package { ['npm']:
    ensure => present,
    require => Package['nodejs'],
  }

  # Creación del enlace simbólico, nodejs en debian se instala como nodejs y para ejecutar comandos es
  file { 'symlink':
    target => "/usr/bin/nodejs",
    path => "/usr/local/bin/node",
    require => Package['nodejs'],
    ensure => link
  }*/

# Instalación de bower.
  exec { 'install_bower':
    command => "npm install bower -g",
    path    => "/usr/local/bin/:/bin/:/usr/bin",
    require => Package['nodejs']
  }
}