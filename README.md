# Waste Less

This project combines the power of three VMs to create a proof of concept web app for reducing food waste.

Clients open the first VM - a public-facing web app at http://127.0.0.1:8080/ which is an apache web server - to, in the case of restaurants, fill out a form detailing any leftover food they will have, at what price they would like to sell it and when and where to pick it up. In the case of customers, they will be able to see a list of available leftover food.

Administrators can open the second VM - an admin web app at http://127.0.0.1:8081/ which is also an apache web server - and delete leftover food entries.

Both web servers are linked to the third VM - a MySQL database that stores all leftover food entries.

TO RUN:
1. Clone the latest wasteless repository from the link.
2. Run "vagrant up" - ensuring you are in the correct repository.
3. Navigate to either of the above localhost:portnumber links to test the VMs' functionalities.