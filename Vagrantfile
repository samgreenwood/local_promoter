Vagrant.configure("2") do |config|
    config.vm.define "govhack2015" do |govhack2015|
        govhack2015.vm.box = "ubuntu/trusty64"
        govhack2015.vm.network :private_network, ip: "10.10.10.10"
        govhack2015.vm.synced_folder ".", "/vagrant", :owner => 'www-data', :group => 'www-data', :mount_options => ["dmode=777","fmode=777"]
    end

    config.vm.provision "ansible" do |ansible|
        ansible.playbook = "provision.yml"
        ansible.extra_vars = {
            hostname: "govhack2015",
            dbuser: "root",
            dbpasswd: "root",
            install_mailcatcher: true,
            sites: [
                {
                    hostname: "govhack2015.local",
                    hostalias: "govhack2015.codium.local",
                    filesystem_root: "/vagrant",
                    document_root: "/vagrant/public",
                    queue: "yes"
                }
            ],
        }
    end
end
