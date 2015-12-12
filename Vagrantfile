require 'yaml'

params = YAML::load_file("./Vagrantparams.yml")

Vagrant.configure("2") do |config|
  config.vm.box = "centos64-x86_64-20131030"
  config.vm.box_url = "https://github.com/2creatives/vagrant-centos/releases/download/v0.1.0/centos64-x86_64-20131030.box"
  config.vm.hostname = "bookstore.dev"
  config.vm.network "private_network", :ip => params['ip']
  config.vm.synced_folder ".", "/vagrant", :nfs => params['nfs']

  config.vm.provider :virtualbox do |vb|
      vb.customize [
          "modifyvm", :id,
          "--chipset", "ich9",
          "--natdnsproxy1", "on",
          "--natdnshostresolver1", "on",
          "--memory", params['memory'],
          "--cpus", params['cpu']
      ]
  end

  config.vm.provision "ansible" do |ansible|
      ansible.sudo = true
      ansible.host_key_checking = false
      ansible.playbook = "provisioning/install.yml"
      ansible.inventory_path = "provisioning/hosts"
      ansible.limit = "vagrant"
      ansible.verbose = "vvv"
  end
end
