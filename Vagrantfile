unless Vagrant.has_plugin?("vagrant-hostsupdater")
    system "vagrant plugin install vagrant-hostsupdater"
end

require 'yaml'
dir = File.dirname(File.expand_path(__FILE__))
configValues = YAML.load_file("#{dir}/puppet/config.yml")
cfg = configValues['config']

Vagrant.require_version '>= 1.6.0'

Vagrant.configure('2') do |config|
  config.vm.box     = "#{cfg['vm']['box']}"
  config.vm.box_url = "#{cfg['vm']['box_url']}"

  config.vm.hostname = "#{cfg['vm']['hostname']}"

  config.vm.network 'private_network', ip: "#{cfg['vm']['network']['ip']}"

  config.vm.synced_folder ".", "/var/www/mo", owner: "vagrant", group: 10010, create: true
  config.vm.synced_folder "./app/logs", "/var/www/mo/app/logs", owner: "vagrant", group: "www-data", create: true, mount_options:["dmode=775,fmode=775"]
  config.vm.synced_folder "./app/cache", "/var/www/mo/app/cache",  owner: "vagrant", group: "www-data", create: true, mount_options:["dmode=775,fmode=775"]


  config.vm.provision :shell do |shell|
    shell.path = "puppet/scripts/addGroup.sh"
    shell.args = "developers"
  end

  config.vm.provider :virtualbox do |virtualbox|
      virtualbox.customize ['modifyvm', :id, '--memory', "#{cfg['vm']['memory']}"]
      virtualbox.customize ['modifyvm', :id, '--cpus', "#{cfg['vm']['cpus']}"]
      virtualbox.customize ['modifyvm', :id, '--name', "#{cfg['vm']['hostname']}"]
  end

  system "puppet module install AlexCline-fstab --modulepath 'puppet/modules'"

  config.vm.provision :puppet do |puppet|
       puppet.manifests_path = 'puppet/manifests'
       puppet.module_path = 'puppet/modules'
       puppet.manifest_file = 'init.pp'
       puppet.facter = {}
       puppet.facter['vagrant_config'] = cfg
       puppet.facter['vm_hostname'] = "#{cfg['vm']['hostname']}"

  end

  config.vm.provision "fix-no-tty", type: "shell" do |s|
       s.privileged = false
       s.inline = "sudo sed -i '/tty/!s/mesg n/tty -s \\&\\& mesg n/' /root/.profile"
  end
  config.vm.provision "shell", path: "puppet/scripts/composer.sh"
  config.vm.provision "shell", path: "puppet/scripts/phpunit.sh"
  config.vm.provision "shell", path: "puppet/scripts/bower_install.sh"

#  config.vm.provision "shell", path: "puppet/scripts/bower_install.sh", privileged: false

# This file is auto-generated during the composer install
$parameters = <<"SCRIPT";
parameters:
    database_driver: #{cfg['parameters']['database_driver']}
    database_host: #{cfg['parameters']['database_host']}
    database_port: #{cfg['parameters']['database_port']}
    database_name: #{cfg['parameters']['database_name']}
    database_user: #{cfg['parameters']['database_user']}
    database_password: #{cfg['parameters']['database_password']}
    mailer_transport: #{cfg['parameters']['mailer_transport']}
    mailer_host: #{cfg['parameters']['mailer_host']}
    mailer_user: #{cfg['parameters']['mailer_user']}
    mailer_password: #{cfg['parameters']['mailer_password']}
    locale: #{cfg['parameters']['locale']}
    secret: #{cfg['parameters']['secret']}
SCRIPT

  File.open("#{dir}/app/config/parameters.yml", 'w+') {|f| f.write($parameters) }

  config.vm.provision "shell", path: "puppet/scripts/symfony.sh"
end
