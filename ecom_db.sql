-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2016 at 10:48 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Electric Guitars'),
(2, 'Bass Guitars');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_transaction_id` int(11) NOT NULL,
  `order_amt` int(11) NOT NULL,
  `order_currency` text NOT NULL,
  `order_st` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_transaction_id`, `order_amt`, `order_currency`, `order_st`) VALUES
(19, 6, 1199, 'USD', 'Completed'),
(20, 9, 199, 'USD', 'Completed'),
(21, 9, 199, 'USD', 'Completed'),
(22, 9, 199, 'USD', 'Completed'),
(23, 9, 199, 'USD', 'Completed'),
(24, 9, 199, 'USD', 'Completed'),
(25, 9, 199, 'USD', 'Completed'),
(26, 9, 199, 'USD', 'Completed'),
(27, 9, 199, 'USD', 'Completed'),
(28, 9, 199, 'USD', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_description_short` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_category_id`, `product_price`, `product_quantity`, `product_description`, `product_description_short`, `product_image`) VALUES
(62, 'Epiphone Les Paul II', 1, 500, 5, 'We all know that deep down, most guitarists love classic designs. That''s why we made the new Les Paul Ultra-III with the same look and classic features of a traditional Les Paul along with new technology to give you a guitar that''s still a real Les Paul b', 'Where Tradition Meets Technology\r\nWe all know that deep down, most guitarists love classic designs. That''s why we made the new Les Paul Ultra-III with the same look and classic features of a traditional Les Paul along with new technology to give you a gui', 'epiphone.jpg'),
(63, 'ESP LTD EC-10', 1, 199, 10, '	\r\nThis sculpted single-cutaway basswood axe is ready for action. A set of LH-100 pickups provide sonic firepower via 3-way toggle while the Tune-o-matic-style bridge with stopbar tailpiece keeps you locked in tune. The bolt-on maple neck with a thin, U-s', '	\r\nThis sculpted single-cutaway basswood axe is ready for action. A set of LH-100 pickups provide sonic firepower via 3-way toggle while the Tune-o-matic-style bridge with stopbar tailpiece keeps you locked in tune. The bolt-on maple neck with a thin, U-s', 'ESP_ltd_ec10.jpeg'),
(64, 'Fender Squier Telecaster', 1, 210, 10, 'The Squier Affinity Series Telecaster Electric Guitar, the quintessential rockabilly, blues, and country solidbody. This is a modern Telecaster with the same classic shape it had in the ''50s! Covered die-cast chrome machine heads provide tuning stability ', 'The Squier Affinity Series Telecaster Electric Guitar, the quintessential rockabilly, blues, and country solidbody. This is a modern Telecaster with the same classic shape it had in the ''50s! Covered die-cast chrome machine heads provide tuning stability ', 'fender.jpeg'),
(65, 'Fender Stratocaster HSS', 1, 700, 5, 'The Fender American Deluxe Stratocaster HSS, called by some a Fat Strat, an electric guitar that is instantly comfortable, and it gives you irresistible tone and playability. You won''t believe your fingers and ears.\r\n\r\nSamarium Cobalt Noiseless pickups\r\n\r', 'The Fender American Deluxe Stratocaster HSS, called by some a Fat Strat, an electric guitar that is instantly comfortable, and it gives you irresistible tone and playability. You won''t believe your fingers and ears.', 'strato.jpeg'),
(66, 'Jackson JS32 Flying V', 1, 249, 10, 'The sleek JS32 Rhoads electric guitar has a basswood body, bolt-on maple speed neck with graphite reinforcement, compound-radius (12â€-16â€) bound rosewood fingerboard with 24 jumbo frets and pearloid sharkfin inlays, and bound headstock. Other features', 'The sleek JS32 Rhoads electric guitar has a basswood body, bolt-on maple speed neck with graphite reinforcement, compound-radius (12â€-16â€) bound rosewood fingerboard with 24 jumbo frets and pearloid sharkfin inlays.', 'jackson.jpeg'),
(67, 'ESP EX-50 Explorer', 1, 180, 15, 'The aggressively stylish ESP LTD EX50. This guitar features a large, resonant body and hot ESP LH-100 humbuckers for superior tone. This is another easy to play instrument with 22 extra jumbo frets on a Rosewood fingerboard. ESP has spent years perfecting', 'The aggressively stylish ESP LTD EX50. This guitar features a large, resonant body and hot ESP LH-100 humbuckers for superior tone. This is another easy to play instrument with 22 extra jumbo frets on a Rosewood fingerboard. ESP has spent years perfecting', 'explorer.png'),
(68, 'Ibanez KIKOSP2', 1, 150, 10, 'Kiko (MEGADETH) brings his unique heavy sound to the Ibanez range with this kick-ass signature guitar.\r\n\r\nKiko Loureiro is a killer guitarist. Whether he''s playing metal or jazz fusion, Kiko''s always spot on with his tone and technique, and his signature ', 'Kiko (MEGADETH) brings his unique heavy sound to the Ibanez range with this kick-ass signature guitar.\r\n\r\nKiko Loureiro is a killer guitarist. Whether he''s playing metal or jazz fusion, Kiko''s always spot on with his tone and technique, and his signature ', 'kiko.jpeg'),
(69, 'Fender Precision Bass', 2, 600, 5, 'The American Standard Precision Bass has a high-mass vintage bridge, Fender Custom Shop ''60s Precision Bass split single-coil pickup, thinner finish undercoat that lets the body breathe and improves resonance, improved Fender tuners that are 30 percent li', 'The American Standard Precision Bass has a high-mass vintage bridge, Fender Custom Shop ''60s Precision Bass split single-coil pickup, thinner finish undercoat that lets the body breathe and improves resonance, improved Fender tuners that are 30 percent li', 'precision.jpeg'),
(70, 'Ibanez Fieldy Bass', 2, 700, 5, 'Ibanez has unleashed the new K5WH Limited Edition Fieldy signature bass in order to celebrate the 20th anniversary of Korn''s debut. White finish and painted maple fingerboard to match. The massive low end and sustain that Fieldy is known for is provided b', 'Ibanez has unleashed the new K5WH Limited Edition Fieldy signature bass in order to celebrate the 20th anniversary of Korn''s debut. White finish and painted maple fingerboard to match. The massive low end and sustain that Fieldy is known for is provided b', 'fieldy.jpeg'),
(71, 'Peavey Grind Bass', 2, 350, 10, 'Get boutique quality at an unbelievable price! For starters you''ll get an all neck-through-body design laminated from mahogany and maple with a rosewood fingerboard. Beautifully crafted.\r\n\r\nPeavey Grind Bass 4 BXP Features:\r\n\r\n35 inch scale\r\n4-string\r\n24 ', 'Get boutique quality at an unbelievable price! For starters you''ll get an all neck-through-body design laminated from mahogany and maple with a rosewood fingerboard. Beautifully crafted.', 'peavey.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_title` text NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `order_id`, `product_id`, `product_title`, `product_price`, `product_quantity`) VALUES
(26, 20, 63, 'ESP LTD EC-10', 199, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(512) NOT NULL,
  `mobile` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `address`, `mobile`) VALUES
(26, 'tester', 'tester@test.com', '824a4030f306ee108055750331bf7723', '245, Behind Casa De Vinho, Candolim', 7095458521),
(27, 'user1', 'user1@gmail.com', '9d737c7d6d3bb2ca08954cf34228bdd7', '321 , Next to ICICI Bank, Penha Da Franca', 9823858321),
(28, 'johndoe', 'johndoe@yahoo.com', '30ed07ab19d0791dcde8f6e718cd067c', '2nd Street, Near Aldeia De Goa.', 7645933498);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
