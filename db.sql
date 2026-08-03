CREATE DATABASE IF NOT EXISTS job_portal_db

CREATE TABLE IF NOT EXISTS users (
    user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    user_type VARCHAR(20) NOT NULL,
    profile_img_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)

CREATE TABLE IF NOT EXISTS recent_jobs (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    job_type VARCHAR(255) NOT NULL,
    job_title VARCHAR(255) NOT NULL,
    job_description TEXT NOT NULL,
    job_location TEXT NOT NULL,
    job_salary TEXT NOT NULL,
    company_name VARCHAR(255) NOT NULL,
    company_email VARCHAR(255) NOT NULL,
    company_description VARCHAR(255) NOT NULL,
    company_phone VARCHAR(255) NOT NULL,
    job_image VARCHAR(255) NOT NULL,
    listed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
)

CREATE TABLE IF NOT EXISTS jobs (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    job_type VARCHAR(255) NOT NULL,
    job_title VARCHAR(255) NOT NULL,
    job_description TEXT NOT NULL,
    job_location TEXT NOT NULL,
    job_salary TEXT NOT NULL,
    company_name VARCHAR(255) NOT NULL,
    company_email VARCHAR(255) NOT NULL,
    job_location VARCHAR(255) NOT NULL,
    salary_range VARCHAR(50),
    job_type VARCHAR(50),
    posted_by INT(6) UNSIGNED,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (posted_by) REFERENCES users(user_id)
)