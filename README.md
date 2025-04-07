# PHP User Management System

Simple user system with Admin and Regular roles using PHP OOP and MySQL.

## Features
- Register and login with sessions
- Admin and Regular user roles
- Uses abstract class, interface, trait, and namespaces
- Database storage via PDO

## Setup
1. Import `init.sql` into MySQL.
2. Open `register.php` to create users.
3. Login at `login.php`.
4. After login, you’re redirected to `dashboard.php`.

## Structure
- `App/` folder: OOP classes (User, Admin, DB, etc.)
- `register.php`, `login.php`, `dashboard.php`: Frontend

## Version
- `v1.0`: Basic working system
