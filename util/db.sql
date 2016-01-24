CREATE DATABASE IF NOT EXISTS project_db;
CREATE USER IF NOT EXISTS 'project_user'@'localhost' IDENTIFIED BY 'secretpassword';
GRANT ALL ON project_db.* TO 'project_user'@'localhost';
FLUSH PRIVILEGES;
