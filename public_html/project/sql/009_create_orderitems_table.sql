--id, order_id, product_id, quantity, unit_price
CREATE TABLE IF NOT EXISTS OrderItems(
    id int AUTO_INCREMENT PRIMARY KEY,
    order_id int,
    product_id int,
    user_id int,
    quantity int,
    unit_price DECIMAL(10,2),
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES Products(id),
    FOREIGN KEY (order_id) REFERENCES Orders(id),
    FOREIGN KEY (user_id) REFERENCES Users(id),
    check(quantity > 0)
)