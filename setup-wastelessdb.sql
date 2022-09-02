CREATE TABLE leftovers (
    leftovers_ID INT NOT NULL AUTO_INCREMENT,
    restaurant_name VARCHAR(50) NOT NULL,
    address VARCHAR(50) NOT NULL,
    description VARCHAR(100) NOT NULL,
    price VARCHAR(10) NOT NULL,
    latest_collection DATE NOT NULL,
    PRIMARY KEY (leftovers_ID)
);

INSERT INTO leftovers VALUES ("Sushi Station", "70 Albany Street", "teriyaki tofu rice balls", "$1.99", 2022-09-3);
INSERT INTO leftovers VALUES ("New World", "133 Great King Street", "giraffe bread/rolls", "$2.99", 2022-09-5);
