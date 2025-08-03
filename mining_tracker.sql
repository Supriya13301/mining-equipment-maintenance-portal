CREATE DATABASE IF NOT EXISTS mining_tracker;
USE mining_tracker;
CREATE TABLE equipment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(100),
    brand VARCHAR(100),
    purchase_date DATE,
    hours_used INT
);
CREATE TABLE maintenance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    equipment_id INT,
    service_date DATE,
    notes TEXT,
    status VARCHAR(50),
    FOREIGN KEY (equipment_id) REFERENCES equipment(id)
);