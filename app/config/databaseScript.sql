
CREATE DATABASE youdemy;
USE youdemy;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('student', 'teacher', 'admin') NOT NULL, 
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);



²
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) UNIQUE NOT NULL
);


CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    teacher_id INT,
    category_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (teacher_id) REFERENCES users(id) ON DELETE SET NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
);


CREATE TABLE tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) UNIQUE NOT NULL
);


CREATE TABLE course_tags (
    course_id INT,
    tag_id INT,
    PRIMARY KEY (course_id, tag_id),
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tags(id) ON DELETE CASCADE
);


CREATE TABLE enrollments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    course_id INT,
    enrollment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(255),
    FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);

CREATE TABLE contents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT NOT NULL,
    type ENUM('video', 'document') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);

CREATE TABLE videoContent (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content_id INT NOT NULL,
    video_url VARCHAR(255) NOT NULL,
    video_duration INT,
    FOREIGN KEY (content_id) REFERENCES contents(id) ON DELETE CASCADE
);

CREATE TABLE documentContent (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content_id INT NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    file_size VARCHAR(255) NOT NULL,
    FOREIGN KEY (content_id) REFERENCES contents(id) ON DELETE CASCADE
);


INSERT INTO users (username, email, password, role, first_name, last_name)
VALUES 
('admin', 'admin@youdemy.com', 'admin123', 'admin', 'Administrateur', 'Principal'),
('student1', 'student1@youdemy.com', 'student123', 'student', 'Jean', 'Dupont'),
('student2', 'student2@youdemy.com', 'student1234', 'student', 'Marie', 'Lemoine'),
('teacher1', 'teacher1@youdemy.com', 'teacher123', 'teacher', 'Marc', 'Lefevre'),
('teacher2', 'teacher2@youdemy.com', 'teacher1234', 'teacher', 'Émilie', 'Durand');



INSERT INTO categories (name) 
VALUES 
('Web Development'), 
('Data Science'), 
('Machine Learning'),
('Business Management'),
('Design');



INSERT INTO courses (title, description, teacher_id, category_id) 
VALUES 
('Introduction to HTML & CSS', 'Learn the basics of HTML and CSS to build websites.', 4, 1),
('JavaScript Basics', 'Understand the basics of JavaScript programming language.', 4, 1),
('Python for Data Analysis', 'Learn how to use Python for data analysis with real-world examples.', 5, 2),
('Machine Learning with Python', 'Understand the fundamentals of machine learning using Python.', 5, 3),
('Business Strategy', 'Master the strategies behind business development and management.', 4, 4);




INSERT INTO tags (name) 
VALUES 
('HTML'), 
('CSS'), 
('JavaScript'), 
('Python'), 
('Data Analysis'), 
('Machine Learning'), 
('Business Strategy'), 
('Marketing');



INSERT INTO course_tags (course_id, tag_id) 
VALUES 
(1, 1),
(1, 2),
(2, 3),
(3, 4),
(3, 5),
(4, 6),
(5, 7),
(5, 8);




INSERT INTO enrollments (student_id, course_id) 
VALUES 
(2, 1),
(2, 2),
(2, 3);


INSERT INTO enrollments (student_id, course_id) 
VALUES 
(3, 3),
(3, 4);