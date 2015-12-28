class rabbitmq {
  # Install the rabbitmq-server
  package { ['rabbitmq-server']:
    ensure => present,
    require => Exec['apt-update'],
  }

  # Run rabbitmq-server
  service { 'run-rabbitmq-server':
    name => 'rabbitmq-server',
    ensure  => running,
    require => Package['rabbitmq-server'],
  }

  # Add a plugin rabbitmq_management
  exec {  "rabbitmq_plugin":
    path        => "/usr/bin:/usr/sbin:/bin",
    environment => "HOME=/etc/rabbitmq",
    command     => "rabbitmq-plugins enable rabbitmq_management",
    notify  => Service["run-rabbitmq-server"],
    require => Package['rabbitmq-server'],
    user => root,
  }

  # add user test
  exec {  "rabbitmq_add_user_test":
    command => "rabbitmqctl add_user test test",
    path => ":/usr/bin:/bin:/usr/sbin:/sbin",
    onlyif => ["rabbitmqctl list_users | grep -c test"],
    notify  => Service["run-rabbitmq-server"],
    require => Package['rabbitmq-server'],
    user => root,
  }

  exec {  "rabbitmq_add_user_test_tag":
    command => "rabbitmqctl set_user_tags test administrator",
    path => ":/usr/bin:/bin:/usr/sbin:/sbin",
    onlyif => ["rabbitmqctl list_users | grep -c test"],
    require  => Exec['rabbitmq_add_user_test'],
    notify  => Service["run-rabbitmq-server"],
    user => root,
  }

  exec {  "rabbitmq_add_user_test_set_permissions ":
    command => 'rabbitmqctl set_permissions -p / test ".*" ".*" ".*" ',
    path => ":/usr/bin:/bin:/usr/sbin:/sbin",
    onlyif => ["rabbitmqctl list_permissions | grep -c test"],
    require  => Exec['rabbitmq_add_user_test'],
    notify  => Service["run-rabbitmq-server"],
    user => root,
  }

  exec {  "rabbitmq_add_user_guest_set_permissions ":
    command => 'rabbitmqctl set_permissions -p / guest ".*" ".*" ".*" ',
    path => ":/usr/bin:/bin:/usr/sbin:/sbin",
    onlyif => ["rabbitmqctl list_permissions | grep -c guest"],
    require  => Exec['rabbitmq_plugin'],
    notify  => Service["run-rabbitmq-server"],
    user => root,
  }
}
