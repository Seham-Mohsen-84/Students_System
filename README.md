# Online Library Management System

This project is developed as part of the ITI Summer Training.  
The system is divided into two modules: **Admin** and **Student**.

---

## Features

### Admin Module
- Admin Dashboard
- View:
    - Borrowed books
    - All books
    - All users
- Add / Update / Delete books
- Search student by student ID
- View student details
- Update admin profile
- Authorization (only admins can perform these tasks)
- Admin Account : To add an Admin, you need to manually update the database. 
- Create a user (through registration or directly in DB), then set their role field to "admin".

### Student Module
- Student registration
- View all books and their details
- Borrow a book
- Student Dashboard (view borrowed books & return them)
- Update student profile
- View borrowed book with return date & time

---

## Requirements
- PHP >= 8.1
- Composer
- Laravel Framework
- MySQL Database
- Node.js & NPM

---
## Team Members

- ### Seham Mohsen

- ### Martina Ibrahim

---
## Installation

Follow these steps to set up the project locally:

```bash
# 1. Clone the repository
git clone <repository-url>

# 2. Navigate to project directory
cd <project-folder>

# 3. Install PHP dependencies
composer install

# 4. Copy .env file
cp .env.example .env

# 5. Generate application key
php artisan key:generate

# 6. Run database migrations
php artisan migrate

# 7. Install Node.js dependencies
npm install

# 8. Build assets
npm run build

# 9. Install Bootstrap (if not already installed)
npm install bootstrap

# 10. Build again after Bootstrap installation
npm run build

# 11. Start development server
php artisan serve
