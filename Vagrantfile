Vagrant.configure("2") do |config|
    config.vm.define "localpromoter" do |localpromoter|
        localpromoter.vm.box = "ubuntu/trusty64"
        localpromoter.vm.network :private_network, ip: "10.10.10.10"
        localpromoter.vm.synced_folder ".", "/vagrant", :owner => 'www-data', :group => 'www-data', :mount_options => ["dmode=777","fmode=777"]
    end

    config.vm.provision "ansible" do |ansible|
        ansible.playbook = "provision.yml"
        ansible.extra_vars = {
            hostname: "localpromoter",
            dbuser: "root",
            dbpasswd: "root",
            install_mailcatcher: true,
            sites: [
                {
                    hostname: "localpromoter.local",
                    hostalias: "localpromoter.codium.local",
                    filesystem_root: "/vagrant",
                    document_root: "/vagrant/public",
                    queue: "yes"
                }
            ],
        }
    end
end
