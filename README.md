Leave Management System (Laravel + CodeIgniter) – README
📌 Project Overview

The Leave Management System (LMS) is a web-based application built using Laravel and CodeIgniter frameworks.
It allows employees to apply for leave, managers to approve/reject requests, and administrators to manage users and leave policies.

This project simplifies the manual leave process and provides a digital, role-based platform for organizations.

🚀 Features
👨‍💼 Employee

Login & Dashboard

Apply for leave

View leave history

Track application status

👨‍🔧 Manager

Login & Manager Dashboard

View pending employee leaves

Approve / Reject leaves

Department-wise filtering

🛠 Admin

Login & Admin Dashboard

Add / Edit / Delete employees

Manage leave types

Set company policies

View all leave requests

🏗️ Tech Stack
Backend

Laravel 10+

CodeIgniter 4

PHP 8.x

MySQL

Frontend

Blade Templates

HTML5, CSS3

Laravel Breeze (Authentication)

TailwindCSS (Default Breeze styles)

Tools

Composer

phpMyAdmin

Git / GitHub

📁 Project Folder Structure
/lms-app
    /app
    /bootstrap
    /config
    /public
    /resources
    /routes
    /vendor
    /database

⚙️ Installation Guide (Local Environment)
1️⃣ Clone the Project
git clone https://github.com/your-repo/leave-management-system.git
cd leave-management-system

2️⃣ Install Dependencies
composer install

3️⃣ Create Environment File
cp .env.example .env

4️⃣ Update Database Credentials

Edit .env:

DB_DATABASE=lms
DB_USERNAME=root
DB_PASSWORD=

5️⃣ Generate App Key
php artisan key:generate

6️⃣ Run Migrations
php artisan migrate

7️⃣ Serve the Application
php artisan serve


App will run at:

http://localhost:8000
