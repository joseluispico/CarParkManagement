# CarParkManagement

# Summary
CarPark System Management - Web app written with PHP/JavaScript/HTML/CSS/JS/MAMP programming language to simulate a CarPark Management System. 

<strong><h1>Overview</h1></strong>

This project was designed as part of the subject System Design in my University. It provides admin and operators with abilities to register entry/exit of cars in a simulated CarPark I feel proud to make it public since it can help others. 

<strong><h1>Features</h1></strong>

<strong>User Self-Registration</strong>: This feature allows users to self register in the system by adding username, password, name, lastname, and type of user. 
Roles segregation: There are two dashboards, one for Operator roles and other for Admin roles. 

<strong>User Management</strong>: This feature is available only for admins and it allows them to view the list of users registered in the system as well as adding new user and deleting existing accounts. 

<strong>User Reports</strong>: This feature list all existing accounts using dataTable plugin and providing the ability to print csv and pdf files with the list of existing users. 

<strong>CarPark slots Entry registration</strong: This feature is available for Operators and Administrators. It provides them with abilities to register car entries in the simulated car park. The Data required is a plac number, car model and whether is a car or a truck. Then, the system will register automatically the date/time in the database and generate a ticket to print. 
  
<strong> CarPark slot Exit registration</strong>: This functionality will allow both, admin and operators to register car exits by inputting the ticket number or the plac in case the customer has lost the ticket number. This will add a re-charge in their total payment amount in a printing receipt. 

<strong>CarPark Reports</carpark>: There are 4 ways of pulling out reports, whether it is daily, weekly, monthly or in a period of time modality. All reports shows the list of cars that have been in the carpark, including those who already checked out. 

<strong>CSV printing Reports</strong>: This functionality is available accross all reports to allow CSV printing functions with Javascript.

<strong><h1>Installation</h1></strong>
To run the application:
1. Install MAMP or WAMPP.
2. Download the GitHub zip file or clone the repository onto your local workstation:
<ul>
<li>zip file https://github.com/joseluispico/simon_game/archive/refs/heads/main.zip</li>
<li>git clone https://git@github.com:joseluispico/simon_game.git</li>
</ul>

3. Extract files in C:\xampp\htdocs.
4. Download the database and import it to your local mysql database. 
5. Open a browser window and navigate to the index.php file in your application's directory.
6. Register yourself and access to the system. 

The English version of this project is available upon request. Please feel free to contact me if you need any assistance.🙃
