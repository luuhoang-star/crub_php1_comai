CREATE TABLE acc (
	id_acc int AUTO_INCREMENT PRIMARY KEY,
	user VARCHAR(255) NOT NULL,
	pass VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
);
CREATE TABLE category (
    id_cate INT  AUTO_INCREMENT;
    name_cate VARCHAR(255) NOT NULL
);
CREATE TABLE news (
    id_news INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    my_news TEXT,
    intro TEXT,
    detail TEXT,
    view INT DEFAULT 0
);
CREATE TABLE product (
    id_pro INT AUTO_INCREMENT PRIMARY KEY,
    name_pro VARCHAR(255) NOT NULL,
    img_pro VARCHAR(255),
    price DECIMAL(10, 2) NOT NULL,
    sale DECIMAL(10, 2),
    detail TEXT,
    id_cate INT
);
