# Waste Less

This project combines the power of three VMs to create a proof of concept web app for reducing food waste.

In essence, the reason for separating the three VMs is scalability. Each will require different resources to be fully optimised if Waste Less is to operate on a large scale.

Clients open the first VM - a public-facing web app at http://127.0.0.1:8080/ which is an apache web server - to, in the case of restaurants, fill out a form detailing any leftover food they will have, at what price they would like to sell it and when and where to pick it up. In the case of customers, they will be able to see a list of available leftover food.

Administrators can open the second VM - an admin web app at http://127.0.0.1:8081/ which is also an apache web server - and delete leftover food entries.

Both web servers are linked to the third VM - a MySQL database that stores all leftover food entries.

TO RUN:
1. Clone the latest wasteless repository from the link.
2. Run "vagrant up" - ensuring you are in the correct repository.
3. Navigate to either of the above localhost:portnumber links to test the VMs' functionalities.

FOR DEVELOPERS:

Follow the above steps to run the VMs. If you want to make changes to the applications' functionality (not the Vagrant file), best practice is to ssh into your desired VM from the command line (e.g. "vagrant ssh adminserver"). From here, you can make changes to the PHP files - or even add new ones. An example of a useful addition would be to extend the capability of the admin web page (currently it only supports deletion and is insecure - a login page would be a sensible addition).

As mentioned, the webpages will update automatically and so completely rebooting the VMs would be very inefficient and unnecessary. However, if for some reason things went awry, it would be worth beginning your trouble shooting by rebooting (vagrant destroy/vagrant up).

For changes to the vagrant file (e.g., adding a fourth VM), the safest option is to vagrant destroy/vagrant up to test your changes. Ideally though, you should try to avoid destroying your VMs – so if you can reprovision them while running that is preferred. For example, in some situations, like changing the network configurations, vagrant reload will be a more efficient approach. Again, the same applies where a complete reboot will be a good place to start troubleshooting if things do not work as expected.