# QA Platform - Web Forum

A simple web-based Q&A forum where users can ask questions and others can provide answers.

## Built With
- HTML, CSS,JS
- PHP
- MySQL
- XAMPP

## Features
- User registration and login
- Admin login
- Create and view threads
- Reply to threads
- Report threads for abuse
- Admin dashboard to manage users and reports

## How to Run
1. Install XAMPP
2. Clone or copy the project into `C:/xampp/htdocs/`
3. Open phpMyAdmin and import the database
4. Open your browser and go to `http://localhost/your-project-folder/login.html`

## Database
- Database name: `qaplatformdb`
- Tables: users, threads, replies, reports

## Default Admin Account
- Username: `admin`
- Password: `admin123`

## Project Structure
- `login.html` - Login page
- `regform.html` - Registration page
- `index.php` - Thread feed
- `create-thread.php` - Create a new thread
- `threadview.php` - View thread and replies
- `profile.php` - User profile
- `admin-dashboard.php` - Admin stats
- `admin-users.php` - Manage users
- `admin-reports.php` - Manage reports
- `404.php` - Error page
- `DBconnection.php` - Database connection
- `style.css` - Shared stylesheet
