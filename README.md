# Core PHP Student Management System

This is a simple **CRUD (Create, Read, Update, Delete)** application built with **Core PHP and MySQL** to manage student records.

## Features

- Add new student
- View all students
- Edit existing student
- Delete student record

## Technologies Used

- Core PHP (no framework)
- MySQL
- HTML/CSS (basic styling)


## Database Setup

1. Create a MySQL database (e.g., `students_crud`).
2. Run the following SQL to create the `students` table:

```sql
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    class_division VARCHAR(50) NOT NULL,
    roll_number VARCHAR(20) NOT NULL
);
