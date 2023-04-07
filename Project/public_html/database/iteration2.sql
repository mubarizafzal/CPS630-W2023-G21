SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
--
-- Database: `iteration2`
--
-- --------------------------------------------------------

--
-- Table structure for table `user`
--
CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) AUTO_INCREMENT NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `salt` varchar(25) NOT NULL,
  `name` text NOT NULL,
  `telephone` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `citycode` text NOT NULL,
  `balance` float DEFAULT 0,
  `admin` tinyint(1),
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------
--
-- Table structure for table `order_placed`
--

CREATE TABLE IF NOT EXISTS `order_placed` (
  `id` int(11) AUTO_INCREMENT NOT NULL,
  `user_id` int(11) NOT NULL,
  `shopping_cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `date_issued` date NOT NULL,
  `date_received` date NOT NULL,
  `total` int(11) NOT NULL,
  `pay_code` varchar(11) NOT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert data in table 'order_placed'

INSERT INTO `order_placed` (`id`, `user_id`, `shopping_cart_id`, `item_id`, `trip_id`, `date_issued`, `date_received`, `total`, `pay_code`) VALUES
(1, 1, 1, 1 ,1, 2023-02-06, 2023-03-16, 197, 'PAY01'),
(2, 2, 2, 2 ,2, 2023-01-09, 2023-02-15, 197, 'PAY02'),
(3, 3, 3, 3 ,3, 2023-12-12, 2023-12-30, 197, 'PAY03');

-- --------------------------------------------------------
--
-- Table structure for table `shopping_cart`
--

CREATE TABLE IF NOT EXISTS `shopping_cart` (
  `id` int(11) AUTO_INCREMENT NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `store_code` varchar(11),
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert data in table 'shopping_cart'

INSERT INTO `shopping_cart` (`id`, `user_id`, `item_id`, `quantity`, `total`, `store_code`) VALUES
(1, 1, 1, 3, 928, NULL),
(2, 2, 2, 2, 481, NULL),
(3, 3, 3, 3, 197, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) AUTO_INCREMENT NOT NULL,
  `name` varchar(100) NOT NULL,
  `genre` varchar(100) NOT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert data into category
INSERT INTO `category` (`id`, `name`, `genre`) VALUES
(1, 'Beds', 'bed'),
(2, 'Sofas', 'sofa'),
(3, 'Bookcases & Shelves', 'shelf'),
(4, 'Desks', 'desk');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) AUTO_INCREMENT NOT NULL,
  `category_id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `keyword` varchar(200) NOT NULL,
  `dept_code` int(11) NOT NULL,
  `made_in` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `code` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `counter` int(11) NOT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert data in table 'items'
INSERT INTO `items` (`id`, `category_id`, `item_name`, `keyword`, `dept_code`, `made_in`, `price`, `description`, `code`, `photo`, `counter`) VALUES
(1, 1, 'MALM', 'bed', 001, 'Canada', 329, '<p>A clean design with solid wood veneer. Place the bed on its own or with the headboard against a wall. If you need space for extra bedding, add MALM bed storage boxes on casters.</p>\r\n', 'malm-bed-frame-high-black-brown', 'malm-bed-frame-high-black-brown.jpg', '2'),
(2, 1, 'KLEPPSTAD', 'bed', 001, 'Canada', 179, '<p>KLEPPSTAD has a stylish and modern design with a metal bed frame and a cozy textile headboard. Easy to both buy and take home since it’s sold as two compact packages. So practical and convenient!</p>\r\n', 'kleppstad-bed-frame-white-vissle-beige', 'kleppstad-bed-frame-white-vissle-beige.jpg', '4'),
(3, 1, 'SONGESAND', 'bed', 001, 'Canada', 259, '<p>A sturdy bed frame with soft, profile edges and high legs. A classic shape that will last for many years. Add SONGESAND bed underbed storage boxes to store extra bedding without taking up more space.</p>\r\n', 'songesand-bed-frame-white', 'songesand-bed-frame-white.jpg', '10'),
(4, 1, 'SLATTUM', 'bed', 001, 'Canada', 219, '<p>Upholstered in soft woven fabric that brings a cozy feeling into your bedroom. The headboard is a comfy backrest for late night reading. And what’s more, it all comes in 1 package. Convenient, right?</p>\r\n', 'slattum-upholstered-bed-frame-knisa-light-gray', 'slattum-upholstered-bed-frame-knisa-light-gray.jpg', '4'),
(5, 1, 'BRIMNES', 'bed', 001, 'Canada', 529, '<p>A bed frame with hidden storage in several places – perfect if you live in a small space. The BRIMNES series has several smart solutions that help you save space.</p>\r\n', 'brimnes-bed-frame-with-storage-headboard-black', 'brimnes-bed-frame-with-storage-headboard-black.jpg', '2'),
(6, 2, 'KIVIK', 'sofa', 001, 'Canada', 1599, '<p>Cuddle up in the comfortable KIVIK sofa. The generous size, low armrests and pocket springs with foam that adapts to the body invites you and your guests to many hours of socialising and relaxation.</p>\r\n', 'kivik-loveseat-with-chaise-tallmyra-white-black', 'kivik-loveseat-with-chaise-tallmyra-white-black.jpg', '4'),
(7, 2, 'GLOSTAD', 'sofa', 001, 'Canada', 249, '<p>It should be easy to get a sofa and GLOSTAD sofa is easy to buy, bring home, assemble and live with. So you can enjoy more time and space to hang out with friends and family and do other important things.</p>\r\n', 'glostad-loveseat-knisa-dark-gray', 'glostad-loveseat-knisa-dark-gray.jpg', '2'),
(8, 2, 'LINANAS', 'sofa', 001, 'Canada', 399, '<p>This cover is made from Vissle fabric in polyester, which is dope-dyed. It’s a durable material with a smooth weave and a nice two-tone effect.</p>\r\n', 'linanaes-sofa-vissle-dark-gray', 'linanaes-sofa-vissle-dark-gray.jpg', '4'),
(9, 2, 'MORABO', 'sofa', 001, 'Canada', 899, '<p>Warm and welcoming, neat and stylish. The supporting seat cushions, the cover’s soft finish and the tight fit gives this sofa a perfect balance between its comfort, functions and look.</p>\r\n', 'morabo-sofa-gunnared-dark-gray-wood', 'morabo-sofa-gunnared-dark-gray-wood.jpg', '2'),
(10, 2, 'FRIHETEN', 'sofa', 001, 'Canada', 1199, '<p>After a good night’s sleep, you can effortlessly convert your bedroom or guest room into a living room again. The built-in storage is easy to access and spacious enough to store bedding, books and PJs.</p>\r\n', 'friheten-corner-sofa-bed-with-storage-skiftebo-dark-gray', 'friheten-corner-sofa-bed-with-storage-skiftebo-dark-gray.jpg', '4'),
(11, 3, 'KALLAX', 'shelf', 001, 'Canada', 109, '<p>Standing or lying – the KALLAX series adapts to taste, space, needs and budget. Smooth surfaces and rounded corners give a feel of quality and you can personalize the shelving unit with inserts and boxes.</p>\r\n', 'kallax-shelf-unit-white', 'kallax-shelf-unit-white.jpg', '10'),
(12, 3, 'BAGGEBO', 'shelf', 001, 'Canada', 219, '<p>Design with clean lines that matches your existing decor or other items in the BAGGEBO storage series. The neat look, with shelves and a back panel in metal and mesh, makes eye-catchers of what you store.</p>\r\n', 'baggebo-shelf-unit-metal-white', 'baggebo-shelf-unit-metal-white.jpg', '4'),
(13, 3, 'LAIVA', 'shelf', 001, 'Canada', 39, '<p>Open storage is just as much about reflecting who you are as organizing all your things. In this bookcase, you can display your favourite books and objects. The shallow depth is perfect for smaller spaces.</p>\r\n', 'laiva-bookcase-black-brown', 'laiva-bookcase-black-brown.jpg', '2'),
(14, 3, 'BILLY', 'shelf', 001, 'Canada', 249, '<p>It is estimated that every five seconds, one BILLY bookcase is sold somewhere in the world. Pretty impressive considering we launched BILLY in 1979. It’s the booklovers choice that never goes out of style.</p>\r\n', 'billy-bookcase-with-glass-doors-dark-blue', 'billy-bookcase-with-glass-doors-dark-blue.jpg', '4'),
(15, 4, 'SANDSBERG', 'desk', 001, 'Canada', 59.99, '<p>This table for 4 blends a warm wood expression with sturdy metal in a slim design that’s pleasing to the eye even in smaller spaces. Pair it with SANDSBERG chair to create a welcoming and coordinated look.</p>\r\n', 'sandsberg-table-black', 'sandsberg-table-black.jpg', '2'),
(16, 4, 'LINNMON', 'desk', 001, 'Canada', 74, '<p>Mix and match your choice of table top and legs – or choose this ready-made combination. Strong and light-weight, made with a technique that uses less raw materials, reducing the impact on the environment.</p>\r\n', 'linnmon-adils-table-white', 'linnmon-adils-table-white.jpg', '4'),
(17, 4, 'MICKE', 'desk', 001, 'Canada', 159, '<p>A clean and simple look that fits just about anywhere. You can combine it with other desks or drawer units in the MICKE series to extend your work space. The clever design at the back hides messy cables.</p>\r\n', 'micke-desk-white', 'micke-desk-white.jpg', '2'),
(18, 4, 'LAGKAPTEN', 'desk', 001, 'Canada', 358, '<p>Limited space doesn’t mean you have to say no to studying or working from home. This desk takes up little floor space yet still has two drawer units where you can store papers and other things.</p>\r\n', 'lagkapten-alex-desk-white', 'lagkapten-alex-desk-white.jpg', '4');

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `dailyitems` (
  `id` int(11) AUTO_INCREMENT NOT NULL,
  `category_id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `keyword` varchar(200) NOT NULL,
  `dept_code` int(11) NOT NULL,
  `made_in` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `code` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `counter` int(11) NOT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `dailyitems` (`id`, `category_id`, `item_name`, `keyword`, `dept_code`, `made_in`, `price`, `description`, `code`, `photo`, `counter`) VALUES
(1, 1, `item_name`, 'bed', 001, 'Canada', 299, `description`, 'day1', 'day1.jpg', `counter`),
(2, 1, `item_name`, 'bed', 001, 'Canada', 299, `description`, 'day2', 'day2.jpg', `counter`),
(3, 1, `item_name`, 'bed', 001, 'Canada', 199, `description`, 'day3', 'day3.jpg', `counter`),
(4, 2, `item_name`, 'sofa', 001, 'Canada', 199, `description`, 'day4', 'day4.jpg', `counter`),
(5, 2, `item_name`, 'sofa', 001, 'Canada', 399, `description`, 'day5', 'day5.jpg', `counter`),
(6, 2, `item_name`, 'sofa', 001, 'Canada', 399, `description`, 'day6', 'day6.jpg', `counter`),
(7, 3, `item_name`, 'sofa', 001, 'Canada', 499, `description`, 'day7', 'day7.jpg', `counter`),
(8, 3, `item_name`, 'sofa', 001, 'Canada', 499, `description`, 'day8', 'day8.jpg', `counter`),
(9, 3, `item_name`, 'sofa', 001, 'Canada', 199, `description`, 'day9', 'day9.jpg', `counter`);



CREATE TABLE IF NOT EXISTS `items2` (
  `id` int(11) AUTO_INCREMENT NOT NULL,
  `category_id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `keyword` varchar(200) NOT NULL,
  `dept_code` int(11) NOT NULL,
  `made_in` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `code` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `counter` int(11) NOT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert data in table 'items'
INSERT INTO `items2` (`id`, `category_id`, `item_name`, `keyword`, `dept_code`, `made_in`, `price`, `description`, `code`, `photo`, `counter`) VALUES
(1, 1, 'MALM', 'bed', 001, 'Canada', 329, '<p>A clean design with solid wood veneer. Place the bed on its own or with the headboard against a wall. If you need space for extra bedding, add MALM bed storage boxes on casters.</p>\r\n', 'malm-bed-frame-high-black-brown', 'malm-bed-frame-high-black-brown.jpg', '2'),
(2, 1, 'KLEPPSTAD', 'bed', 001, 'Canada', 179, '<p>KLEPPSTAD has a stylish and modern design with a metal bed frame and a cozy textile headboard. Easy to both buy and take home since it’s sold as two compact packages. So practical and convenient!</p>\r\n', 'kleppstad-bed-frame-white-vissle-beige', 'kleppstad-bed-frame-white-vissle-beige.jpg', '4'),
(3, 1, 'SONGESAND', 'bed', 001, 'Canada', 259, '<p>A sturdy bed frame with soft, profile edges and high legs. A classic shape that will last for many years. Add SONGESAND bed underbed storage boxes to store extra bedding without taking up more space.</p>\r\n', 'songesand-bed-frame-white', 'songesand-bed-frame-white.jpg', '10'),
(4, 1, 'SLATTUM', 'bed', 001, 'Canada', 219, '<p>Upholstered in soft woven fabric that brings a cozy feeling into your bedroom. The headboard is a comfy backrest for late night reading. And what’s more, it all comes in 1 package. Convenient, right?</p>\r\n', 'slattum-upholstered-bed-frame-knisa-light-gray', 'slattum-upholstered-bed-frame-knisa-light-gray.jpg', '4'),
(5, 1, 'BRIMNES', 'bed', 001, 'Canada', 529, '<p>A bed frame with hidden storage in several places – perfect if you live in a small space. The BRIMNES series has several smart solutions that help you save space.</p>\r\n', 'brimnes-bed-frame-with-storage-headboard-black', 'brimnes-bed-frame-with-storage-headboard-black.jpg', '2'),
(6, 2, 'KIVIK', 'sofa', 001, 'Canada', 1599, '<p>Cuddle up in the comfortable KIVIK sofa. The generous size, low armrests and pocket springs with foam that adapts to the body invites you and your guests to many hours of socialising and relaxation.</p>\r\n', 'kivik-loveseat-with-chaise-tallmyra-white-black', 'kivik-loveseat-with-chaise-tallmyra-white-black.jpg', '4'),
(7, 2, 'GLOSTAD', 'sofa', 001, 'Canada', 249, '<p>It should be easy to get a sofa and GLOSTAD sofa is easy to buy, bring home, assemble and live with. So you can enjoy more time and space to hang out with friends and family and do other important things.</p>\r\n', 'glostad-loveseat-knisa-dark-gray', 'glostad-loveseat-knisa-dark-gray.jpg', '2'),
(8, 2, 'LINANAS', 'sofa', 001, 'Canada', 399, '<p>This cover is made from Vissle fabric in polyester, which is dope-dyed. It’s a durable material with a smooth weave and a nice two-tone effect.</p>\r\n', 'linanaes-sofa-vissle-dark-gray', 'linanaes-sofa-vissle-dark-gray.jpg', '4'),
(9, 2, 'MORABO', 'sofa', 001, 'Canada', 899, '<p>Warm and welcoming, neat and stylish. The supporting seat cushions, the cover’s soft finish and the tight fit gives this sofa a perfect balance between its comfort, functions and look.</p>\r\n', 'morabo-sofa-gunnared-dark-gray-wood', 'morabo-sofa-gunnared-dark-gray-wood.jpg', '2'),
(10, 2, 'FRIHETEN', 'sofa', 001, 'Canada', 1199, '<p>After a good night’s sleep, you can effortlessly convert your bedroom or guest room into a living room again. The built-in storage is easy to access and spacious enough to store bedding, books and PJs.</p>\r\n', 'friheten-corner-sofa-bed-with-storage-skiftebo-dark-gray', 'friheten-corner-sofa-bed-with-storage-skiftebo-dark-gray.jpg', '4'),
(11, 3, 'KALLAX', 'shelf', 001, 'Canada', 109, '<p>Standing or lying – the KALLAX series adapts to taste, space, needs and budget. Smooth surfaces and rounded corners give a feel of quality and you can personalize the shelving unit with inserts and boxes.</p>\r\n', 'kallax-shelf-unit-white', 'kallax-shelf-unit-white.jpg', '10'),
(12, 3, 'BAGGEBO', 'shelf', 001, 'Canada', 219, '<p>Design with clean lines that matches your existing decor or other items in the BAGGEBO storage series. The neat look, with shelves and a back panel in metal and mesh, makes eye-catchers of what you store.</p>\r\n', 'baggebo-shelf-unit-metal-white', 'baggebo-shelf-unit-metal-white.jpg', '4'),
(13, 3, 'LAIVA', 'shelf', 001, 'Canada', 39, '<p>Open storage is just as much about reflecting who you are as organizing all your things. In this bookcase, you can display your favourite books and objects. The shallow depth is perfect for smaller spaces.</p>\r\n', 'laiva-bookcase-black-brown', 'laiva-bookcase-black-brown.jpg', '2'),
(14, 3, 'BILLY', 'shelf', 001, 'Canada', 249, '<p>It is estimated that every five seconds, one BILLY bookcase is sold somewhere in the world. Pretty impressive considering we launched BILLY in 1979. It’s the booklovers choice that never goes out of style.</p>\r\n', 'billy-bookcase-with-glass-doors-dark-blue', 'billy-bookcase-with-glass-doors-dark-blue.jpg', '4'),
(15, 4, 'SANDSBERG', 'desk', 001, 'Canada', 59.99, '<p>This table for 4 blends a warm wood expression with sturdy metal in a slim design that’s pleasing to the eye even in smaller spaces. Pair it with SANDSBERG chair to create a welcoming and coordinated look.</p>\r\n', 'sandsberg-table-black', 'sandsberg-table-black.jpg', '2'),
(16, 4, 'LINNMON', 'desk', 001, 'Canada', 74, '<p>Mix and match your choice of table top and legs – or choose this ready-made combination. Strong and light-weight, made with a technique that uses less raw materials, reducing the impact on the environment.</p>\r\n', 'linnmon-adils-table-white', 'linnmon-adils-table-white.jpg', '4'),
(17, 4, 'MICKE', 'desk', 001, 'Canada', 159, '<p>A clean and simple look that fits just about anywhere. You can combine it with other desks or drawer units in the MICKE series to extend your work space. The clever design at the back hides messy cables.</p>\r\n', 'micke-desk-white', 'micke-desk-white.jpg', '2'),
(18, 4, 'LAGKAPTEN', 'desk', 001, 'Canada', 358, '<p>Limited space doesn’t mean you have to say no to studying or working from home. This desk takes up little floor space yet still has two drawer units where you can store papers and other things.</p>\r\n', 'lagkapten-alex-desk-white', 'lagkapten-alex-desk-white.jpg', '4');





--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) AUTO_INCREMENT NOT NULL,
  `product_rating` int(11) NOT NULL,
  `overall_rating` int(11) NOT NULL,
  `product_rated` varchar(30) NOT NULL,
  `review` text NOT NULL,
  `customer_name` text NOT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert data into review
INSERT INTO `review` (`id`, `product_rating`, `overall_rating`, `product_rated`, `review`, `customer_name`) VALUES
(1, '5', '5', 'LINANAS sofa', 'I recently ordered a reclaimed LINANAS sofa from Green Delivery E-commerce, and I`m thrilled with my purchase! The online shopping experience was a breeze, and their commitment to sustainable practices makes me feel great about supporting their business. Plus, their customer service is top-notch - they were able to answer all my questions about the materials used in their products. Highly recommend!', 'Susan T.'),
(2, '4', '5', 'LAIVA shelf', 'I bought a stylish bookshelf from Green Delivery E-commerce last month. Although I had some doubts about the assembly process, it turned out to be quite easy with the instructions provided. The shelf looks fantastic in my living room and has received numerous compliments. The shipping was fast, but I did find the packaging to be a bit excessive. Overall, a good experience!', 'Mark H.'),
(3, '5', '5', 'SANDSBERG desk', 'Green Delivery E-commerce has become my go-to store for furniture. I`ve purchased a desk, bed frame, and a couple of accent chairs, and I`m in love with all of them. Their modern designs and eco-friendly materials are a breath of fresh air in the furniture market. The quality of the products is outstanding, and their green delivery options are a bonus. Keep up the great work!', 'Jessica L.'),
(4, '3', '3', 'MICKE desk', 'I ordered an office desk from Green Delivery E-commerce, and while the quality of the desk itself was good, there were some issues with the delivery. The package arrived a few days later than expected, and there were some minor scratches on one of the legs. I contacted customer service, and they offered me a discount on my next purchase, which was nice. Overall, a decent experience, but there`s room for improvement.', 'Brian K.'),
(5, '5', '4', 'KIVIK sofa', 'I can`t say enough good things about Green Delivery E-commerce! I was searching for the perfect, eco-friendly sofa, and I found it on their website. The fabric choices were amazing, and I love that they use recycled materials. When the sofa arrived, it was even more beautiful in person. The delivery team was professional and ensured everything was in perfect condition before leaving. I will definitely be shopping here again!', 'Samantha P.'),
(6, '4', '4', 'BAGGEBO shelf', 'I ordered a shelf from Green Delivery E-commerce, and I`m quite satisfied with my purchase. The prices were competitive, and the quality of the products met my expectations. The only issue I faced was that one of the screws was missing from the TV stand package. However, customer service was responsive and sent the missing part promptly. Overall, a good experience, and I will consider them for future purchases.', 'Alex M.'),
(7, '5', '5', 'GLOSTAD sofa', 'I`ve been a loyal customer of Green Delivery E-commerce for the past two years, and they never disappoint. Their selection of eco-friendly furniture is vast, and the quality is always top-notch. I recently bought an outdoor dining set made from recycled materials, and it looks fantastic in my backyard. Their customer service team is always ready to help with any questions or concerns, making it a smooth shopping experience every time', 'Lucy R.');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `id` int(11) AUTO_INCREMENT NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `day_of_week` INT NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  PRIMARY KEY(id, day_of_week)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert data into branch
INSERT INTO `branch` (`id`, `name`, `address`, `day_of_week`, `open_time`, `close_time`) VALUES
(1, 'ECOM Vaughan', '200 Interchange Way', 0, '10:00:00', '19:00:00'),
(1, 'ECOM Vaughan', '200 Interchange Way', 1, '10:00:00', '21:00:00'),
(1, 'ECOM Vaughan', '200 Interchange Way', 3, '10:00:00', '21:00:00'),
(1, 'ECOM Vaughan', '200 Interchange Way', 7, '10:00:00', '20:00:00'),
(2, 'ECOM North York', '15 Provost Dr', 1, '8:00:00', '18:00:00'),
(2, 'ECOM North York', '15 Provost Dr', 2, '8:00:00', '18:00:00'),
(2, 'ECOM North York', '15 Provost Dr', 4, '8:00:00', '18:00:00'),
(2, 'ECOM North York', '15 Provost Dr', 6, '8:00:00', '18:00:00'),
(3, 'ECOM Etobicoke', '1475 The Queensway', 1, '6:00:00', '19:00:00'),
(3, 'ECOM Etobicoke', '1475 The Queensway', 3, '6:00:00', '19:00:00'),
(3, 'ECOM Etobicoke', '1475 The Queensway', 4, '6:00:00', '19:00:00'),
(3, 'ECOM Etobicoke', '1475 The Queensway', 6, '7:00:00', '19:00:00');


-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE IF NOT EXISTS `trip` (
  `id` int(11) AUTO_INCREMENT NOT NULL,
  `branch_id` int(11) NOT NULL,
  `truck_id` int(11) NOT NULL,
  `source_code` varchar(11) NOT NULL,
  `dest_code` varchar(11) NOT NULL,
  `distance_km` int(11) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert data into trip

INSERT INTO `trip` (`id`, `truck_id`, `source_code`, `dest_code`, `distance_km`, `price`) VALUES
(1, 101, 'SOURCE1', 'DEST1', 100, 859), 
(2, 202, 'SOURCE2', 'DEST2', 45, 332);


-- --------------------------------------------------------

--
-- Table structure for table `truck`
--
CREATE TABLE IF NOT EXISTS `truck` (
  `id` int(11) AUTO_INCREMENT NOT NULL,
  `trip_id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `avail_code` int(11) NOT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert data into truck

INSERT INTO `truck` (`id`, `item_name`, `avail_code`) VALUES
(1, 101, 123),
(2, 202, 456),
(3, 303, 789);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `card_no` text NOT NULL,
  `salt` text NOT NULL,
  `exp_year` text NOT NULL,
  `cvc` text NOT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
