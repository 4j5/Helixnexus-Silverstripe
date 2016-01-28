CREATE DATABASE IF NOT EXISTS project_db;
GRANT ALL PRIVILEGES  ON project_db.*
TO 'project_user'@'localhost' IDENTIFIED BY 'secretpassword' 
WITH GRANT OPTION;
FLUSH PRIVILEGES;
