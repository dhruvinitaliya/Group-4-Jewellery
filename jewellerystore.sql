SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `jewellerystore`;
USE `jewellerystore`;

CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `shopping_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `jewelry_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`),
  KEY `cart_jewelry_key` (`jewelry_id`),
  KEY `cart_user_key` (`user_id`),
  CONSTRAINT `cart_user_key` FOREIGN KEY (`user_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `cart_jewelry_key` FOREIGN KEY (`jewelry_id`) REFERENCES `jewelry_catalog` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `jewelry_catalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `jewelry_catalog` (`id`, `name`, `price`, `description`, `image_url`) VALUES
(1, 'Diamond Necklace', '499.99', 'Elegant diamond necklace with gold chain.', 'jewelry_1.png'),
(2, 'Gold Bracelet', '299.99', 'Stylish gold bracelet with intricate design.', 'jewelry_2.png'),
(3, 'Pearl Earrings', '120', 'Classic pearl earrings.', 'jewelry_3.png'),
(4, 'Ruby Ring', '399.99', 'Luxurious ruby ring with a gold band.', 'jewelry_5.jpg'),
(5, 'Emerald Bracelet', '299.99', 'Elegant emerald bracelet with silver clasp.', 'jewelry_6.jpg'),
(6, 'Sapphire Earrings', '199.99', 'Stunning sapphire earrings with diamond accents.', 'jewelry_7.jpg'),
(7, 'Amethyst Pendant', '149.99', 'Beautiful amethyst pendant with a silver chain.', 'jewelry_8.jpg'),
(8, 'Topaz Necklace', '249.99', 'Exquisite topaz necklace with a gold chain.', 'jewelry_9.jpg'),
(9, 'Opal Ring', '349.99', 'Enchanting opal ring with a platinum band.', 'jewelry_10.jpg');
 

CREATE TABLE `jewelry_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customers_order_ibfk_1` (`user_id`),
  CONSTRAINT `customers_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


COMMIT;
