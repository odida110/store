
DROP TABLE IF EXISTS author, publishing_house, category, store ;

CREATE TABLE author (
    id INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
    name varchar(100) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

CREATE TABLE publishing_house (
    id INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
    name varchar(100) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

CREATE TABLE category (
    id INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
    name varchar(100) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

CREATE TABLE store (
    id INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
    name varchar(100) NOT NULL,
    adress YEAR NOT NULL,
    mobile_number int NOT NULL,
    image varchar(300) NOT NULL,
    author_id INT(6) UNSIGNED NOT NULL,
    publishing_house_id INT(6) UNSIGNED NOT NULL,
    category_id INT(6) UNSIGNED NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

ALTER TABLE store ADD CONSTRAINT `author_id` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`);
ALTER TABLE store ADD CONSTRAINT `publishing_house_id` FOREIGN KEY (`publishing_house_id`) REFERENCES `publishing_house` (`id`);
ALTER TABLE store ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);


INSERT INTO `author` (`id`, `name`) VALUES (1, 'asmaa');

INSERT INTO `publishing_house` (`id`, `name`) VALUES (1, 'Almadhoun');

INSERT INTO `category` (`id`, `name`) VALUES (1, 'public');


INSERT INTO `store` (`id`, `name`, `adress`, `mobile_number`, `image`, `author_id`, `publishing_house_id`, `category_id`) VALUES 
(1, 'sport', 2020, 1, 'public/11',  1,1,1);



-------------------------------------------------------------------------------
CREATE TABLE store (
    id INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
    name varchar(100) NOT NULL,
    adress varchar(255) NOT NULL,
    mobile_number int NOT NULL,
    image varchar(300) NOT NULL,
    category_id INT(6) UNSIGNED NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);







CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `review_table` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
(6, 'John Smith', 4, 'Nice Product, Value for money', 1621935691),
(7, 'Peter Parker', 5, 'Nice Product with Good Feature.', 1621939888),
(8, 'Donna Hubber', 1, 'Worst Product, lost my money.', 1621940010);





ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);




ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
