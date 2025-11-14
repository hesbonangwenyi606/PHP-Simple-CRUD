PHP Simple CRUD (SQLite)

A simple PHP project (no frameworks) demonstrating a Tasks CRUD app using SQLite and PDO. This project allows you to create, read, update, and delete tasks with a minimal setup.

Requirements

PHP 7.4 or higher (tested with PHP 8.2)

PDO SQLite extension enabled (pdo_sqlite)

Run locally (built-in PHP server)

Initialize the database (creates SQLite file and seeds an example task):

php init.php


Start the PHP built-in server from the project root:

php -S localhost:8000 -t public


Open in your browser:

http://localhost:8000

You should see the task list and be able to create, edit, and delete tasks.

Project Structure
php_simple_crud/
├── data/
│   └── database.sqlite   # SQLite database file (created by init.php)
├── public/
│   ├── index.php          # Task listing page
│   ├── create.php         # Add new task
│   ├── edit.php           # Edit existing task
│   ├── delete.php         # Delete task
│   └── assets/
│       └── style.css      # Optional styles
├── src/
│   ├── Database.php       # PDO SQLite connection class
│   └── Task.php           # Task CRUD class
├── init.php               # Creates and seeds SQLite database
└── README.md              # Project documentation

Features

Create new tasks with title and description

Read all tasks with timestamp

Update task title and description

Delete tasks

Fully functional CRUD using PDO and SQLite

Minimal Bootstrap 5 styling