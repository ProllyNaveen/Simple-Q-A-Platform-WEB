# QA Platform - Web Forum

A simple web-based Q&A forum where users can ask questions and others can provide answers.

## Built With
- HTML, CSS, JavaScript
- PHP
- MySQL
- XAMPP

## Features
- User registration and login
- Admin login with separate dashboard
- Create and view threads with images
- Reply to threads
- Like threads
- Report threads for abuse
- Admin dashboard to manage users and reports
- Ban and unban users
- Profile management with profile picture
- Delete own threads
- Session protection on all pages

## How to Run
1. Install XAMPP
2. Clone or copy the project into `C:/xampp/htdocs/`
3. Open phpMyAdmin and create the database using the SQL provided
4. Open your browser and go to `http://localhost/Simple-Q-A-Platform-WEB/index.php`

## Database
- Database name: `qaplatformdb`
- Tables: users, threads, replies, reports, likes

## Default Admin Account
- Username: `admin`
- Password: Change via generatehash.php after setup

## Project Structure
- `index.php` - Login page
- `regform.php` - Registration page
- `feed.php` - Thread feed
- `createpost.php` - Create a new thread
- `threadview.php` - View thread and replies
- `profile.php` - User profile
- `report.php` - Report a thread
- `admindashboard.php` - Admin dashboard
- `addadmin.php` - Add new admin
- `success.php` - Registration success page
- `logoutpage.php` - Logout page
- `404.php` - Error page
- `DBconnection.php` - Database connection
- `session.php` - Session protection
- `adminsession.php` - Admin session protection
- `style.css` - Shared stylesheet
- `uploads/` - Uploaded images folder
