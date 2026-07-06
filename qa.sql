-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2025 at 04:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(5) NOT NULL,
  `ad_name` varchar(30) NOT NULL,
  `ad_email` varchar(20) NOT NULL,
  `ad_phno` varchar(13) NOT NULL,
  `ad_pass` varchar(30) NOT NULL,
  `ad_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_name`, `ad_email`, `ad_phno`, `ad_pass`, `ad_img`) VALUES
(1, 'admin', 'mehulpatel@gamil.com', '8200739265', '1111', 'mehul.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `a_id` int(5) NOT NULL,
  `ser_id` int(5) NOT NULL,
  `cus_id` int(5) NOT NULL,
  `a_addre` varchar(50) NOT NULL,
  `a_city` varchar(30) NOT NULL,
  `a_date` date NOT NULL,
  `a_status` varchar(30) NOT NULL,
  `wor_id` int(5) NOT NULL,
  `cancel_reason` varchar(255) DEFAULT NULL,
  `rating` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`a_id`, `ser_id`, `cus_id`, `a_addre`, `a_city`, `a_date`, `a_status`, `wor_id`, `cancel_reason`, `rating`) VALUES
(54, 1, 15, 'nakhatrana', 'kutch', '2025-12-12', 'completed', 1, NULL, 4),
(56, 1, 15, 'nkt', 'nkt', '2025-12-19', 'completed', 1, NULL, 4),
(57, 2, 15, 'nkt', 'nkt', '2025-12-19', 'cancel', 1, 'the', NULL),
(58, 1, 15, 'nkt', 'nkt', '2025-12-19', 'working', 1, NULL, NULL),
(59, 21, 2, 'nkt', 'nkt', '2025-12-19', 'requested', 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(5) NOT NULL,
  `cus_name` varchar(30) NOT NULL,
  `cus_email` varchar(30) NOT NULL,
  `cus_phno` varchar(13) NOT NULL,
  `password` varchar(8) NOT NULL,
  `city` varchar(30) NOT NULL,
  `cus_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `cus_email`, `cus_phno`, `password`, `city`, `cus_img`) VALUES
(1, 'vishw patel', 'patelvishw@gmail.com', '8200739265', '1010', 'ahmedabad', 'profile.png'),
(2, 'kishan', 'kishanbhatt4417@gmail.com', '6565345121', '1234', 'jamnagar', ''),
(3, 'dhirendra', 'dhirendra04@gmail.com', '5545225454', '12345', 'gandhinagar', ''),
(4, 'pooja', 'pooja123@gmail.com', '5446516444', '123456', 'ahemdabad', ''),
(5, 'mehul', 'mmehul12@gmail.com', '6353950096', '1234567', 'kutch', ''),
(6, 'raghav', 'raghavbts001@gmail.com', '5452154159', '12345678', 'modasa', ''),
(7, 'apurv', 'apurv@gamil.com', '8200457865', '', 'ahmedabad', ''),
(8, 'apurv', 'apurv@gamil.com', '8200457865', '1212', 'ahmedabad', ''),
(9, 'arpit', 'a@gmail.com', '1273483347', '123', 'ahmedabad', ''),
(10, 'vedant', 'vedant@gmail.com', '0123456789', '1010', 'ahmedabad', ''),
(11, 'Varun', 'varun@gmail.com', '9664770623', '123456', 'ahmedabad', ''),
(12, 'dhirendra', 'dhiren@gmail.com', '8153854671', '1234', 'gandhinagar', ''),
(13, 'mehul patel', 'mehhulpattel', '9408334062', '1111', 'nakhatrana', ''),
(14, 'shyam bhatt', 'shayambhatt@gmail.com', '9313945700', '8520', 'jamnagar', ''),
(15, 'mehul patel', 'shayambhatt@gmail.com', '9408334062', '12345', 'jamnagar', '');

-- --------------------------------------------------------

--
-- Table structure for table `cus_payment`
--

CREATE TABLE `cus_payment` (
  `p_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `a_id` varchar(150) DEFAULT NULL,
  `p_number` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cus_payment`
--

INSERT INTO `cus_payment` (`p_id`, `cus_id`, `a_id`, `p_number`, `amount`) VALUES
(22, 15, '57', '9FA566542C5206133', 44),
(23, 15, '58', '2E588485GA662734M', 140),
(24, 2, '59', '38R14449XC0919026', 64);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `f_phno` varchar(13) NOT NULL,
  `text` varchar(300) NOT NULL,
  `a_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `ser_id` int(5) NOT NULL,
  `ser_name` varchar(50) NOT NULL,
  `ser_category` varchar(50) NOT NULL,
  `ser_section` varchar(50) NOT NULL,
  `ser_price` int(5) NOT NULL,
  `ser_img` varchar(255) NOT NULL,
  `ser_time` varchar(50) NOT NULL,
  `ser_des` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`ser_id`, `ser_name`, `ser_category`, `ser_section`, `ser_price`, `ser_img`, `ser_time`, `ser_des`) VALUES
(1, 'switchbox installation', 'electrician', 'switch & socket', 350, 'Switchbox installation.jpg', '15 min', 'ser_des'),
(2, 'switch -socket replacement', 'electrician', 'switch & socket', 109, 'switch -socket replacement.jpg', '', 'ser_des'),
(3, 'ac switchbox installation', 'electrician', 'switch & socket', 369, 'ac switchbox installation.jpg', '', 'Labour charges for installation of one AC switch box\r\n\r\nProcurement of spare parts (at extra cost)\r\n\r\nMinor wiring up to 2m, if needed\r\n\r\nFree revisit in case the issue reoccurs within 30 days\r\n\r\nQA warranty & damage cover*\r\nMajor wiring (more than 2m)/ new wiring (at extra cost)\r\n'),
(4, 'switchboard installation', 'electrician', 'switch & socket', 279, 'switchboard installation.jpg', '', 'Labour charges for installation of one switchboard (up to twelve switches)\r\n\r\nProcurement of spare parts (at extra cost)\r\n\r\nMinor wiring up to 2m, if needed\r\n\r\nClean-up after the service\r\nQA warranty & damage cover*\r\nMajor wiring (more than 2m)/ new wiring (at extra cost)'),
(5, 'switchboard-switchbox repair', 'electrician', 'switch & socket', 110, 'switchboard-switchbox repair.jpg', '', '\r\nLabour charges for inspection and repair of one switchboard\r\n\r\nProcurement of spare parts (at extra cost)\r\n\r\nMinor wiring up to 2m, if needed\r\n\r\nClean-up after the service\r\n\r\nQA warranty & damage cover*\r\nMajor wiring (more than 2m)/ new wiring (at extra cost)\r\n'),
(6, 'ceiling fan installation', 'electrician', 'fan', 139, 'ceiling fan installation.jpg', '', 'Installation of ceiling, exhaust or wall fan\r\n\r\nProcurement of spare parts (at extra cost)\r\n\r\nMinor wiring up to 2m, if needed\r\n\r\nClean-up after the service\r\n\r\nQA warranty & damage cover*\r\nMajor wiring (more than 2m)/ new wiring (at extra cost)\r\n'),
(8, 'decorative ceiling fan installation', 'electrician', 'fan', 469, 'decorative ceiling fan installation.jpg', ' ', 'Installation of fan with in-built light, music, etc.\r\n\r\nProcurement of spare parts (at extra cost)\r\n\r\nMinor wiring up to 2m, if needed\r\n\r\nClean-up after the service\r\n\r\nUC warranty & damage cover*\r\nMajor wiring (more than 2m)/ new wiring (at extra cost)\r\n'),
(10, 'fan replacement', 'electrician', 'fan', 239, 'fan replacement.jpg', '', 'Replacement of ceiling, exhaust or wall fan\r\n\r\nProcurement of spare parts (at extra cost)\r\n\r\nMinor wiring up to 2m, if needed\r\n\r\nClean-up after the service\r\n\r\nUC warranty & damage cover*\r\nMajor wiring (more than 2m)/ new wiring (at extra cost)'),
(12, 'ceiling fan regulator replacement', 'electrician', 'fan', 99, 'ceiling fan regulator replacement.jpg', '', 'Replacement of one ceiling fan regulator\r\n\r\nProcurement of spare parts (at extra cost)\r\n\r\nMinor wiring up to 2m, if needed\r\n\r\nUC warranty & damage cover*\r\nMajor wiring (more than 2m)/ new wiring (at extra cost)\r\n'),
(13, 'ceiling light installation', 'electrician', 'light', 219, 'ceiling light installation.jpg', '', 'This service doesn’t include the cost of spare parts. Although, our electricians can procure the required items for an additional cost (at market rate) '),
(14, 'tubelight Installation-Repair', 'electrician', 'light', 119, 'tubelight Installation-Repair.jpg', '', 'The material is to be provided by customers. Although, our electricians can procure the required items for an additional cost (at market rate)'),
(15, 'wall light installation', 'electrician', 'light', 119, 'wall light installation.jpg', '', 'This service doesn’t include the cost of spare parts. Although, our electricians can procure the required items for an additional cost (at market rate) '),
(16, 'false ceiling light installation', 'electrician', 'light', 219, 'false ceiling light installation.jpg', '', 'Installation of one decorative wall light, ceiling light or bed lamp\r\n\r\nProcurement of spare parts (at extra cost)\r\n\r\nMinor wiring up to 2m, if needed\r\n\r\nClean-up after the service\r\n\r\nUC warranty & damage cover\r\nMajor wiring (more than 2m)/ new wiring (at extra cost)'),
(17, 'Bulb/CFL/LED installation', 'electrician', 'light', 129, 'Bulb installation .jpg', '', 'Installation of up to five bulbs\r\n\r\nProcurement of spare parts (at extra cost)\r\n\r\nMinor wiring up to 2m, if needed\r\n\r\nClean-up after the service\r\n\r\nUC warranty & damage cover*\r\nInstallation of bulb holder'),
(18, 'Bulb/tubelight holder installation', 'electrician', 'light', 109, 'Bulb-tubelight holder installation.jpg', '', 'Installation of one bulb holder\r\n\r\nProcurement of spare parts (at extra cost)\r\n\r\nMinor wiring up to 2m, if needed\r\n\r\nClean-up after the service\r\n\r\nUC warranty & damage cover*'),
(19, 'Replace CFL to LED', 'electrician', 'light', 169, 'Replace CFL to LED.jpg', '', 'Replacement of one CFL bulb/ tube light to LED bulb/ tube light\r\n\r\nProcurement of spare parts (at extra cost)\r\n\r\nUC warranty & damage cover*\r\n\r\nCeiling light replacement'),
(20, 'bathroom holder & hanger installations', 'plumber', 'bath fitting', 148, 'bathroom holder & hanger installations.jpg', '', 'Small fittings installation (towel hangers, holders, towel shelves, and soap dispensers)\r\n\r\nProcurement of spare parts (at extra cost)\r\n\r\nLabour charges for one fitting\r\n\r\nUC warranty & damage cover*\r\n\r\nWarranty on spare parts provided or sourced by UC\r\nMajor masonry work like tiling, cementing, granite installation etc.\r\n\r\nWarranty on spare parts provided by customers'),
(21, 'shower installation', 'plumber', 'bath fitting', 159, 'shower installation.jpg', '', 'Single knob/ inlet tap repair (kitchen sink, wash basin, bathroom)\r\n\r\nStuck or leaking tap\r\n\r\nProcurement of tap, spare parts ?(at extra cost)\r\n\r\nUC Warranty support (*conditions apply)\r\n\r\nUC Damage cover (*conditions apply)\r\nRepair/installation of mixer taps \r\n\r\nMajor masonry work like tiling, granite installation etc.'),
(22, 'washbasin pipe leakage', 'plumber', 'basin & sink', 139, 'washbasin pipe leakage.jpg', '', 'Single knob/ inlet tap repair (kitchen sink, wash basin, bathroom)\r\n\r\nStuck or leaking tap\r\n\r\nProcurement of tap, spare parts ?(at extra cost)\r\n\r\nUC Warranty support (*conditions apply)\r\n\r\nUC Damage cover (*conditions apply)'),
(23, 'wash basin installation', 'plumber', 'basin & sink', 459, 'wash basin installation.jpg', '', 'Removal of old wash basin and installation of new one (table-top, wall-mounted)\r\n\r\nSingle knob/inlet tap installation\r\n\r\nInlet and outlet piping installation\r\n\r\nProcurement of spare parts (at extra cost)\r\n\r\nUC warranty & damage cover*'),
(24, 'wash basin blockage removal', 'plumber', 'basin & sink', 209, 'wash basin blockage removal.jpg', '', 'Cleaning and removal of waste from wash basin strainer, waste pipe\r\n\r\nProcurement of spare parts (at extra cost)\r\n\r\n Clean up after the service\r\n\r\nFree revisit in case the issue occurs within 30 days\r\n\r\nUC warranty & damage cover*'),
(25, 'drainage pipe blockage removal', 'plumber', 'drainage pipes', 409, 'drainage pipe blockage removal.jpg', '', '\r\nUnclogging and waste removal of underground, in-wall blockage\r\n\r\nProcurement of spare parts (at extra cost)\r\n\r\nUC warranty & damage cover*\r\n\r\nWarranty on spare parts provided or sourced by UC'),
(26, 'drain cover installation', 'plumber', 'drainage pipes', 168, 'drain cover installation.jpg', '', 'Warranty on spare parts provided by customer \r\n\r\nProcurement of spare parts (at extra cost)\r\n\r\nClean up after the service\r\n\r\nFree revisit in case the issue occurs within 30 days\r\n\r\nUC warranty & damage cover*\r\n\r\n'),
(27, 'balcony drainage pipe cleaning', 'plumber', 'drainage pipes', 309, 'balcony drainage pipe cleaning.jpg', '', 'Unclogging and waste removal of underground, in-wall blockage\r\n\r\nProcurement of spare parts (at extra cost)\r\n\r\nUC warranty & damage cover*\r\n\r\nMajor masonry work like tiling, cementing, granite installation etc.\r\n\r\nWarranty on spare parts provided or sourced by UC'),
(28, 'cupboard hinge service (up to two)', 'carpenter', 'cupboard & drawer', 179, 'cupboard hinge service.jpg', '', 'Installation or replacement of two cupboard hinges\r\n\r\nIf repair is not possible, replacement would be done\r\n\r\nProcurement of spare parts (at extra cost)\r\n\r\nClean-up after the service\r\n\r\nUC warranty & damage cover*'),
(29, 'drawer channel repair (one set)', 'carpenter', 'cupboard & drawer', 168, 'drawer channel repair.jpg', '', '\r\nAdjustment of one channel set to remove movement obstructions \r\n\r\nIf adjustment is not possible, replacement would be done\r\n\r\nProcurement of spare parts (at extra cost)\r\n\r\nClean-up after the service\r\n\r\nUC warranty & damage cover*\r\n\r\n'),
(30, 'drawer channel replacement (one set)', 'carpenter', 'cupboard & drawer', 249, 'drawer channel replacement.jpg', '', 'Installation or replacement of one channel set\r\n\r\nClean-up after the service\r\n\r\nUC warranty & damage cover*\r\n\r\nWarranty on spare parts provided or sourced by UC'),
(31, 'cupboard handle installation/replacement', 'carpenter', 'cupboard & drawer', 89, 'cupboard handle installation-replacement.jpg', '', 'Installation or replacement of one handle\r\n\r\nProcurement of spare parts (at extra cost)\r\n\r\nClean-up after the service\r\n\r\nUC warranty & damage cover*\r\n\r\nWarranty on spare parts provided or sourced by UC'),
(32, 'cupboard lock installation', 'carpenter', 'cupboard & drawer', 249, 'cupboard lock installation.jpg', '', 'installation of one new lock\r\n\r\nMultiple locks\' installation (at extra cost)\r\n\r\nProcurement of spare parts (at extra cost)\r\n\r\nClean-up after the service\r\n\r\nUC warranty & damage cover*'),
(33, 'cupboard lock replacement', 'carpenter', 'cupboard & drawer', 169, 'cupboard lock replacement.jpg', '', 'Replacement of one existing lock\r\n\r\nMultiple locks\' replacement (at extra cost)\r\n\r\nProcurement of spare parts (at extra cost)\r\n\r\nClean-up after the service\r\n\r\nUC warranty & damage cover*\r\n\r\n'),
(34, 'cupboard lock repair', 'carpenter', 'cupboard & drawer', 199, 'cupboard lock repair.jpg', '', 'Adjustment of one lock to remove movement obstructions\r\n\r\nMultiple locks\' repair (at extra cost)\r\n\r\nClean-up after the service\r\n\r\nUC warranty & damage cover*\r\n\r\nWarranty on spare parts provided or sourced by UC'),
(35, 'cupboard sliding door repair', 'carpenter', 'cupboard & drawer', 399, 'cupboard sliding door repair.jpg', '', 'Repair work of sliding door’s channel\r\n\r\nReplacement of bearings \r\n\r\nProcurement of spare parts (at extra cost)\r\n\r\nClean-up after the service\r\n\r\nUC warranty & damage cover*'),
(36, 'Plastic buffer installation (up to four)', 'carpenter', 'furniture repair', 119, 'Plastic buffer installation.jpg', '', 'Procurement of spare parts (at extra cost)\r\n\r\nClean-up after the service\r\n\r\nProcurement of spare parts (at extra cost)\r\n\r\nClean-up after the service\r\n\r\nUC warranty & damage cover*'),
(37, 'table/chair wheels fitting', 'carpenter', 'furniture repair', 119, 'table-chair wheels fitting.jpg', '', 'Procurement of spare parts (at extra cost)\r\n\r\nClean-up after the service\r\n\r\nUC warranty & damage cover*\r\n\r\n'),
(38, 'book a carpenter', 'carpenter', 'Looking for something else?', 149, 'book a carpenter.jpg', '', 'Includes inspection charges\r\n\r\nActual prices based on scope of work and rate card\r\n\r\n'),
(39, 'Minor Repair/Installation ', 'carpenter', 'looking for something else?', 150, 'Minor Repair-Installation.jpg\r\n', '', 'Book an expert carpenter for on-site issue inspection\r\n\r\nActual prices based on scope of work and rate card'),
(40, 'Haircut for men', 'salon', 'haircut & beard styling', 256, 'Haircut for men.jpg', '30', 'Removal of all the hair strands, sanitisation of tools and clean up of the surrounding area'),
(41, 'Kids Haircut (Boys)', 'salon', 'haircut & beard styling', 259, 'Kids Haircut (Boys).jpg', '30 min', 'Spraying of water, followed by cutting of hair as per the desired hair style  with the cape on\r\nRemoval of all the hair strands, sanitisation of tools and clean up of the surrounding area'),
(42, 'Clean Shave (Gillette)', 'salon', 'haircut & beard styling', 149, 'Clean Shave (Gillette).jpg', '20 min', 'Disposable towels, cape, and single-use products\r\nPost service cleanup guaranteed with no hair left behind on the floor\r\nOur stylists are trained to style your beard to flatter your face shape'),
(43, 'Beard Trimming & Styling', 'salon', 'haircut & beard styling', 149, 'Beard Trimming & Styling.jpg', '25 min', 'Disposable towels, cape, and single-use products\r\nPost service cleanup guaranteed with no hair left behind on the floor\r\nOur stylists are trained to style your beard to flatter your face shape'),
(44, 'Beard Colour with Product', 'salon', 'haircut & beard styling', 199, 'Beard Colour with Product.jpg', '30 min', 'Our professionals come equipped with all that is required for a seamless service experience like hair colour, masks, capes, disposable towels, single-use products, etc.'),
(45, 'Biotique hair color', 'salon', 'Hair Color ', 539, 'Biotique hair color.jpg', '30 min', 'The professional will bring the hair colour you select along with all the other relevant tools. Please ensure you have a comfortable chair handy.'),
(46, 'Godrej Professionals Hair Color', 'salon', 'hair color', 399, 'Godrej Professionals Hair Color.jpg', '', 'The professional will bring the hair colour you select along with all the other relevant tools. Please ensure you have a comfortable chair handy.'),
(47, 'Haircut for women\'s', 'salon', 'haircut & beard styling', 800, 'Haircut for women\'s.jpg', '30', 'Removal of all the hair strands, sanitisation of tools and clean up of the surrounding area'),
(48, 'Hair colour/ mehendi for women', 'salon', 'hair color', 600, 'Hair colour-mehendi for women.jpg', '', 'The professional will bring the hair colour you select along with all the other relevant tools. Please ensure you have a comfortable chair handy.'),
(49, 'Bleach', 'salon', 'Face care', 299, 'Bleach.jpg', '20 min', 'This service is best suited for unwanted hair growth on the skin. It lightens the hair on face, arms, body to achieve a brighter skin tone'),
(50, 'Detan', 'salon', 'Face care', 349, 'Detan.jpg', '20 min', 'We use Raaga detan which is suitable for all skin types.The service especially treats sun-tanned skin and makes the skin lighter. The pack used is enriched with milk, honey, tomato, lemon, bilberry 7 grapefruit extracts and essential oils.'),
(51, 'Cleanup', 'salon', 'Face care', 1299, 'Cleanup.jpg', '40 min', 'Face massage for better blood circulation. Caffeine cleansing gel for face & neck cleansing.Scrub application & massage with wet fingers for 3-4 mins. Wiping the face with a damp sponge.Face steam to open the pores. Painless blackhead removal with an ultrasonic skin scrubber spatula.'),
(52, 'Face & Neck Detan', 'salon', 'Face care', 699, 'Face & Neck Detan.jpg', '30 min', 'Face massage for better blood circulation. Cleansing milk to remove dirt, dust & oil.Scrub application & massage with wet fingers for 3-4 mins. Wiping the face with a damp sponge.Detan mask application with a brush. Dry head massage while the mask dries'),
(53, 'Classic bathroom cleaning', 'Cleaning', 'Bathroom & Kitchen cleaning', 399, 'Classic bathroom cleaning.jpg', '60 min', ''),
(54, 'Intense bathroom cleaning', 'Cleaning', 'Bathroom & Kitchen cleaning', 499, 'Intense bathroom cleaning.jpg', '1hr 20 min', ''),
(55, 'Complete kitchen cleaning', 'Cleaning', 'Bathroom & Kitchen cleaning', 1779, 'Complete kitchen cleaning.jpg', '1hr 20 min', 'Stain removal of kitchen tiles, slab, sink, floor, exhaust, window, fan, etc.\r\nIncludes removing and placing back of utensils.\r\n\r\n'),
(56, 'Chimney cleaning', 'Cleaning', 'Bathroom & Kitchen cleaning', 499, 'Chimney cleaning.jpg', '1hr 30 min', '\r\nDegreasing and stain removal of one chimney\'s exteriors'),
(57, 'Single Door Fridge', 'Cleaning', 'Bathroom & Kitchen cleaning', 349, 'Single Door Fridge.jpg', '60 min ', ''),
(58, 'Double  Door Fridge', 'Cleaning', 'Bathroom & Kitchen cleaning', 499, 'Double  Door Fridge.jpg', '1hr 30 min', ''),
(59, '2 Ceiling fan cleaning', 'Cleaning', ' Mini services', 98, '2 Ceiling fan cleaning.jpg', '30 min', 'Removal of dust using dry cloth\r\nSpraying chemical and scrubbing the surfaces to remove stains.\r\nWiping the surface using a damp microfiber cloth.'),
(60, 'Ceiling fan cleaning', 'Cleaning', ' Mini services', 49, 'Ceiling fan cleaning.jpg', '15 min', 'Removal of dust using dry cloth\r\nSpraying chemical and scrubbing the surfaces to remove stains.\r\nWiping the surface using a damp microfiber cloth.'),
(61, 'Kitchen sink cleaning', 'Cleaning', ' Mini services', 99, 'Kitchen sink cleaning.jpg\r\n', '15 min', 'Removal of stains & spots using cleaner\r\nWiping the surface using microfiber cloth'),
(62, 'Utensil removal & placing back', 'Cleaning', ' Mini services', 399, 'Utensil removal & placing back.jpg', '60 min', ''),
(63, 'Gas stove cleaning', 'Cleaning', ' Mini services', 99, 'Gas stove cleaning.jpg', '15 min', 'Cleaning of one gas stove.\r\nRemoval of stains.'),
(64, 'Microwave cleaning', 'Cleaning', ' Mini services', 150, 'Microwave cleaning.jpg\r\n', '15 min', ''),
(65, 'Carpet cleaning', 'Cleaning', 'Sofa & Carpet Cleaning', 600, 'Carpet cleaning.jpg', '60 min', ''),
(66, 'Single Bed Mattress', 'Cleaning', 'Sofa & Carpet Cleaning', 399, 'Single Bed Mattress.jpg\r\n', '30 min', ''),
(67, 'Double  Bed Mattress', 'Cleaning', 'Sofa & Carpet Cleaning', 699, 'Double  Bed Mattress.jpg', '60 min', ''),
(68, 'Cushions (set of 5)', 'Cleaning', 'Sofa & Carpet Cleaning', 149, 'Cushions.jpg', '15 min', ''),
(69, 'Sofa cleaning', 'Cleaning', 'Sofa & Carpet Cleaning', 839, 'Sofa cleaning.jpg', '45 min', '');

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `wor_id` int(5) NOT NULL,
  `wor_name` varchar(25) NOT NULL,
  `wor_email` varchar(30) NOT NULL,
  `wor_phno` varchar(13) NOT NULL,
  `profession` varchar(25) NOT NULL,
  `password` varchar(8) NOT NULL,
  `wor_city` varchar(15) NOT NULL,
  `wor_address` varchar(100) NOT NULL,
  `wor_status` varchar(11) NOT NULL DEFAULT 'available',
  `wor_image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`wor_id`, `wor_name`, `wor_email`, `wor_phno`, `profession`, `password`, `wor_city`, `wor_address`, `wor_status`, `wor_image`) VALUES
(1, 'kuldeep ', '', '8247854852', 'electrician', '1010', 'ahmedabad', 'sarkhej pakwan cross road,ahmedabad', 'requested', 'person.jpg'),
(2, 'pratham', '', '1010101010', 'electrician', '1212', 'gandhinagar', 'gandhinagar', 'available', 'person.jpg'),
(3, 'tejas', '', '1245154584', 'electrician', '2020', 'ahmedabad', 'ahmedabad', 'available', ''),
(11, 'jinesh', 'jinesh11@gmail.com', '5563623890', 'plumber', '1020', 'ahmedabad', 'D-270 ADISHWARNAGAR SOCIETY NARODA Ahmedabad (M Corp.) (Part)', 'available', ''),
(12, 'vivek', 'vivek0112@gmail.com', '5454565454', 'plumber', '1111', 'ahmedabad', 'D-270 ADISHWARNAGAR SOCIETY NARODA Ahmedabad (M Corp.) (Part)', 'requested', ''),
(13, 'jayesh', 'jayesh011@gmail.com', '2314584871', 'salon', 'jayesh01', 'gandhinagar', 'sector11', 'available', ''),
(14, 'lokesh', 'lokesh001@gmail.com', '5656452224', 'cleaner', 'kvcjdicj', 'Ahmedabad (M Co', 'B-301 ANJANEE RESIDENCY NEW NARODA Ahmedabad (M Corp.) (Part)', 'available', ''),
(15, 'dhiresh', 'dhiresh007@gmail.com', '5641513154', 'cleaner', 'difcjii', 'jamnagar', 'jamanagar', 'available', ''),
(16, 'rakesh', 'mehul112@gmail.com', '5646455456', 'salon', 'jhvbdsc', 'District*', 'D-270 A', 'available', ''),
(17, 'chintan', 'chintan11@gmail.com', '1546123426', 'carpenter', 'jvnfnvfn', 'jamanagar', 'jamanagar', 'available', ''),
(19, 'priyank', 'priyank007@gmail.com', '5454545752', 'cleaner', 'ciudhcdn', 'ahmedabad', 'D-270 ADISHWARNAGAR SOCIETY NARODA Ahmedabad (M Corp.) (Part)', 'available', '');

-- --------------------------------------------------------

--
-- Table structure for table `worker_pay`
--

CREATE TABLE `worker_pay` (
  `pay_id` int(11) NOT NULL,
  `w_id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`),
  ADD UNIQUE KEY `a_phno` (`ad_phno`);
ALTER TABLE `admin` ADD FULLTEXT KEY `a_name` (`ad_name`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `ser_id` (`ser_id`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `wor_id` (`wor_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `cus_payment`
--
ALTER TABLE `cus_payment`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ser_id`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`wor_id`);

--
-- Indexes for table `worker_pay`
--
ALTER TABLE `worker_pay`
  ADD KEY `a_id` (`a_id`),
  ADD KEY `w_id` (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `a_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cus_payment`
--
ALTER TABLE `cus_payment`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `ser_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `worker`
--
ALTER TABLE `worker`
  MODIFY `wor_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `worker_pay`
--
ALTER TABLE `worker_pay`
  ADD CONSTRAINT `worker_pay_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `appointment` (`a_id`),
  ADD CONSTRAINT `worker_pay_ibfk_2` FOREIGN KEY (`w_id`) REFERENCES `worker` (`wor_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
