CREATE TABLE leftovers (
    leftovers_ID INT NOT NULL AUTO_INCREMENT,
    restaurant_name VARCHAR(50) NOT NULL,
    address VARCHAR(50) NOT NULL,
    description VARCHAR(100) NOT NULL,
    price VARCHAR(10) NOT NULL,
    latest_collection DATE NOT NULL,
    PRIMARY KEY (leftovers_ID)
);