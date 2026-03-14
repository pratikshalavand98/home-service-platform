Cloud Based Home Service Platform

Cloud Based Home Service Platform is a web application where users can book home services such as electrician, plumber, cleaning, and repair services online. The platform allows users to easily find service providers and schedule appointments.

📌 Project Description

This project provides an online platform where users can:

Register and login

Search for service providers

Book home services

Manage bookings

The application is developed using PHP and MySQL and deployed on cloud servers.

🚀 Technologies Used

Frontend

HTML

CSS

Bootstrap

JavaScript

Backend

PHP

MySQL

Cloud & DevOps Tools

Amazon Web Services (EC2)

Docker

GitHub

Git

✨ Features

User Registration and Login

Service Provider Listing

Book Home Services

Booking Management

Admin Dashboard

Cloud Deployment Support

📂 Project Structure
HSP/
│
├── admin/
├── css/
├── js/
├── images/
├── includes/
├── db/
├── services/
├── mainpage.php
└── index.php
⚙️ Local Installation (XAMPP)
Step 1 Install XAMPP

Download and install XAMPP.

Step 2 Move Project Folder

Copy the project folder to:

D:\xampp\htdocs\HSP
Step 3 Start Services

Open XAMPP Control Panel and start:

Apache

MySQL

Step 4 Import Database

Open browser

Go to

http://localhost/phpmyadmin

Create database:

hsp

Import file:

db/hsp.sql
Step 5 Run Project

Open browser and run:

http://localhost/HSP/mainpage.php
☁️ Cloud Deployment (AWS EC2)

This project can also be deployed on cloud using **Amazon Web Services EC2 instance.

Step 1 Update Server
sudo apt update
Step 2 Install Required Packages
sudo apt install apache2 mysql-server php libapache2-mod-php php-mysql git -y
Step 3 Start Apache Server
sudo systemctl start apache2
Step 4 Go to Web Directory
cd /var/www/html
Step 5 Remove Default Apache Page
sudo rm index.html
Step 6 Clone Project from GitHub
sudo git clone https://github.com/pratikshalavand98/home-service-platform.git
Step 7 Copy Project Files
sudo cp -r home-service-platform/* /var/www/html/
Step 8 Set Folder Permissions
sudo chmod -R 755 /var/www/html
sudo chown -R www-data:www-data /var/www/html
Step 9 Create Database
sudo mysql

Then run:

CREATE DATABASE hsp;
EXIT;
Step 10 Import Database
sudo mysql hsp < /var/www/html/db/hsp.sql
Step 11 Restart Apache
sudo systemctl restart apache2
Step 12 Access Website

Open browser and visit:

http://YOUR-EC2-PUBLIC-IP

Your project will now be live on the cloud.

👩‍💻 Author

Pratiksha Lavand
