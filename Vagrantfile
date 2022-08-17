# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure("2") do |config|
  # The most common configuration options are documented and commented below.
  # For a complete reference, please see the online documentation at
  # https://docs.vagrantup.com.

  # Every Vagrant development environment requires a box. You can search for
  # boxes at https://vagrantcloud.com/search.
  config.vm.box = "ubuntu/focal64"

  # Instead of configuring the VM using the default template from runnning
  # Vagrant init, we are configuring one using the method shown in David's
  # Vagrant file for his multiple VMs.
  config.vm.define "publicwebserver" do |publicwebserver|
    publicwebserver.vm.hostname = "publicwebserver"
    
    # Port forwarding to allow host computer to connect to the specified localhost IP
    # address through port 8080.
    publicwebserver.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"

    # Setting up private network so that, eventually, our three VMs will be able
    # to connect to each other.
    publicwebserver.vm.network "private_network", ip: "192.168.56.11"

    # Neccessary line as we are developing in the labs...
    publicwebserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

    # Provisioning commands for shell.
    # This allows the apache server to be created and gets all of the appropriate
    # configuration tools to run from the .conf file in the same directory
    publicwebserver.vm.provision "shell", inline: <<-SHELL
      apt-get update
      apt-get install -y apache2 php libapache2-mod-php

      # Change VM's webserver's config to use shared folder and 
      # look inside wasteless.conf
      cp /vagrant/wasteless.conf /etc/apache2/sites-available/
      # activate wasteless configuration
      a2ensite wasteless
      # disable default website provided with Apache
      a2dissite 000-default
      # restart webserver to get all of our website configurations
      service apache2 restart
    SHELL
  end
end
