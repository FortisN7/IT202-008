-- Active: 1677286264512@@db.ethereallab.app@3306@nff4
CREATE TABLE IF NOT EXISTS Products(
    -- (id, name, description, category, stock, unit_price, image, visibility, created, modified)
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE,
    description VARCHAR(255) DEFAULT '',
    category VARCHAR(255) DEFAULT '',
    stock INT DEFAULT 0 check (stock >= 0),
    unit_price DECIMAL(10, 2) DEFAULT 0.00 check (unit_price >= 0.00),
    image VARCHAR(255) DEFAULT 'https://upload.wikimedia.org/wikipedia/commons/d/d1/Image_not_available.png',
    visibility BOOLEAN DEFAULT 0,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);