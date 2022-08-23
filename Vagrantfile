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
      apt-get install -y apache2 php libapache2-mod-php php-mysql
      # Covering ourselves incase php unsuccessfully installs
      apt-get install php-mysql

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

  config.vm.define "adminserver" do |adminserver|
    # Naming the admin server
    adminserver.vm.hostname = "adminserver"

    # Port forwarding to allow host computer to connect to the specified localhost IP
    # address through port 8081.
    adminserver.vm.network "forwarded_port", guest: 80, host: 8081, host_ip: "127.0.0.1"

    # Setting up private network so that, eventually, our three VMs will be able
    # to connect to each other.
    adminserver.vm.network "private_network", ip: "192.168.56.12"

    # Neccessary line as we are developing in the labs...
    adminserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

    # Provisioning commands for shell.
    # This allows the apache server to be created and gets all of the appropriate
    # configuration tools to run from the .conf file in the same directory
    adminserver.vm.provision "shell", inline: <<-SHELL
      apt-get update
      apt-get install -y apache2 php libapache2-mod-php php-mysql
      # Covering ourselves incase php unsuccessfully installs
      apt-get install php-mysql

      # Change VM's webserver's config to use shared folder and 
      # look inside wasteless.conf
      cp /vagrant/admin.conf /etc/apache2/sites-available/
      # activate wasteless configuration
      a2ensite admin
      # disable default website provided with Apache
      a2dissite 000-default
      # restart webserver to get all of our website configurations
      service apache2 restart
    SHELL
  end

  config.vm.define "dbserver" do |dbserver|
    # Naming the Database server
    dbserver.vm.hostname = "dbserver"

    # Creating the private network/linking it to IP address
    dbserver.vm.network "private_network", ip: "192.168.56.13"
    dbserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]
    
    # Provisioning commands for shell, this time for database.
    dbserver.vm.provision "shell", inline: <<-SHELL
      apt-get update
      
      # Creating MySQL password
      export MYSQL_PWD='password'
      
      # Answering prompt to enter MySQL root password
      echo "mysql-server mysql-server/root_password password $MYSQL_PWD" | debconf-set-selections
      echo "mysql-server mysql-server/root_password_again password $MYSQL_PWD" | debconf-set-selections

      # Installing db server
      apt-get -y install mysql-server
      # Covering ourselves incase php unsuccessfully installs
      apt-get install php-mysql

      service mysql start

      # Running setup commands to get database ready to use
      echo "FLUSH PRIVILEGES" | mysql
      echo "CREATE DATABASE wastelessdb;" | mysql
      echo "CREATE USER 'webuser'@'%' IDENTIFIED BY 'password';" | mysql
      echo "GRANT ALL PRIVILEGES ON wastelessdb.* TO 'webuser'@'%'" | mysql

      # Ensuring mysql comand will try to use MYSQL_PWD as db password.
      export MYSQL_PWD='password'

      # Run sql within setup-wastelesdb.sql file
      cat /vagrant/setup-wastelessdb.sql | mysql -u webuser wastelessdb

      # Allowing webserving VM to conect with database VM
      sed -i'' -e '/bind-address/s/127.0.0.1/0.0.0.0/' /etc/mysql/mysql.conf.d/mysqld.cnf

      # restart MySQL server so that it picks up changes
      service mysql restart
    SHELL
  end

end
