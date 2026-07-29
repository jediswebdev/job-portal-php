CREATE DATABASE IF NOT EXISTS job_portal_db
CREATE TABLE IF NOT EXISTS jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    job_type VARCHAR(255) NOT NULL,
    job_title VARCHAR(255) NOT NULL,
    job_description VARCHAR(255) NOT NULL,
    job_location VARCHAR(255) NOT NULL,
    job_salary VARCHAR(255) NOT NULL,
    company_name VARCHAR(255) NOT NULL,
    company_email VARCHAR(255) NOT NULL,
    company_description VARCHAR(255) NOT NULL,
    company_phone VARCHAR(255) NOT NULL,
    job_image VARCHAR(255) NOT NULL,
    listed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)
CREATE TABLE IF NOT EXISTS users (
    user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    user_type VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)
CREATE TABLE dev_profiles (
    dev_id SERIAL PRIMARY KEY,
    user_id INT UNIQUE NOT NULL REFERENCES users(user_id) ON DELETE CASCADE,
    full_name VARCHAR(150) NOT NULL,
    title VARCHAR(100), -- e.g., "Full Stack Engineer", "DevOps Specialist"
    github_url VARCHAR(255),
    bio TEXT,
    skills TEXT[], -- PostgreSQL array example (e.g., ['React', 'Node.js', 'PostgreSQL'])
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
