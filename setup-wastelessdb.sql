CREATE TABLE leftovers (
    leftovers_ID INT NOT NULL AUTO_INCREMENT,
    restaurant_name VARCHAR2(50) NOT NULL,
    address VARCHAR2(50) NOT NULL,
    description VARCHAR2(100) NOT NULL,
    price VARCHAR2(10) NOT NULL,
    latest_collection DATE NOT NULL,
    PRIMARY KEY (leftovers_ID)
);

INSERT INTO leftovers VALUES ('Sushi Poke Bento', 'George Street', 'Leftover salmon suhsi',
'$20', '03-04-2021: 11-23-33','DD-MM-YYYY: hh24-mi-ss');