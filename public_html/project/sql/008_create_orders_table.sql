 --id, user_id, created, total_price, address, payment_method, money_received, first_name, last_name
 CREATE TABLE IF NOT EXISTS Orders(
    id int AUTO_INCREMENT PRIMARY KEY,
    user_id int,
    total_price DECIMAL(10, 2),
    address VARCHAR(255),
    payment_method VARCHAR(60),
    money_received DECIMAL(10, 2),
    first_name VARCHAR(60),
    last_name VARCHAR(60),
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(id)
)