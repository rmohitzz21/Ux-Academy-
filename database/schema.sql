-- ========================================
-- UX Academy Database Schema
-- ========================================
-- Run this file in phpMyAdmin or MySQL CLI

-- Create database
CREATE DATABASE IF NOT EXISTS ux_academy;
USE ux_academy;

-- ========================================
-- Contacts Table (for contact form submissions)
-- ========================================
CREATE TABLE IF NOT EXISTS contacts (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  phone VARCHAR(20) NOT NULL,
  subject VARCHAR(255) NOT NULL,
  message LONGTEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  status ENUM('new', 'read', 'replied') DEFAULT 'new',
  admin_notes TEXT,
  ip_address VARCHAR(45),
  user_agent VARCHAR(500),
  INDEX idx_created (created_at),
  INDEX idx_email (email),
  INDEX idx_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- Form Submissions Table (for all form types)
-- ========================================
CREATE TABLE IF NOT EXISTS form_submissions (
  id INT PRIMARY KEY AUTO_INCREMENT,
  form_type VARCHAR(50) NOT NULL,
  form_data JSON NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  ip_address VARCHAR(45),
  user_agent VARCHAR(500),
  status ENUM('received', 'processing', 'completed') DEFAULT 'received',
  INDEX idx_created (created_at),
  INDEX idx_form_type (form_type)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- Rate Limiting Table (for spam prevention)
-- ========================================
CREATE TABLE IF NOT EXISTS rate_limits (
  id INT PRIMARY KEY AUTO_INCREMENT,
  ip_address VARCHAR(45) NOT NULL,
  form_type VARCHAR(50) NOT NULL,
  submission_count INT DEFAULT 1,
  first_submission TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  last_submission TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY unique_ip_form (ip_address, form_type),
  INDEX idx_last_submission (last_submission)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- Activity Logs Table (for debugging)
-- ========================================
CREATE TABLE IF NOT EXISTS activity_logs (
  id INT PRIMARY KEY AUTO_INCREMENT,
  action VARCHAR(100) NOT NULL,
  details LONGTEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  ip_address VARCHAR(45),
  INDEX idx_created (created_at),
  INDEX idx_action (action)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
