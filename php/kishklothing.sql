DROP DATABASE IF EXISTS kishklothing;
CREATE DATABASE kishklothing;
USE kishklothing;

DROP TABLE IF EXISTS `User`;
CREATE TABLE `User`(
    `usern` char(20),
    `password` char(100),
    PRIMARY KEY (`usern`),
);
INSERT INTO `user` (`usern`, `password`) VALUES
('emp1', '$2y$10$MdotzPVF.B3z1V10MofQYuc7iqeOwi/gcW1A0gbUELuZ4h3MyOf2m'),
('emp2', '$2y$10$3fwNSbE0Vi1IHr1rSnhqIOAhOtQ2or5EQpMd3RQwCkG/lFVc0FDGi'),
('emp3', '$2y$10$/FTMcdeN2CDvkPgbi2/NgeP318HZDhR8B70R727fjx0CCOokZUhQy'),
('emp4', '$2y$10$xeJUYNBRSPnK291pQf7Ww.o9fDqt7Boa/Ac3w4GXVqKZOz98zDPm6'),
('owner', '$2y$10$DoEP/SyEBDokzAd1WUgIeO0YB1HcGdxZBg4IwynvkijQC/U3FT9lC');


DROP TABLE IF EXISTS `materials`;
CREATE TABLE `materials` (
  `matId` int(10) NOT NULL,
  `matName` char(50) DEFAULT NULL,
  `Quantity` int(20) DEFAULT NULL,
  `priceOfMaterial` float(10,2) DEFAULT NULL
) ;


INSERT INTO `materials` (`matId`, `matName`, `Quantity`, `priceOfMaterial`) VALUES
(1, 'Cashmere', 20, 5000.00),
(2, 'Cotton', 500, 1000.00),
(3, 'Wool', 100, 2000.00),
(4, 'Polyester', 200, 1500.00),
(5, 'Linen', 110, 2500.00),
(6, 'Canvas', 50, 2500.00),
(7, 'Lace', 110, 1800.00),
(8, 'Satin', 30, 2000.00),
(9, 'Spandex', 100, 1000.00),
(10, 'Silk', 20, 3000.00);
 

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `cusName` char(27) NOT NULL,
  `contactNumber` int(11) DEFAULT NULL,
  `measurement` char(20) DEFAULT NULL,
  `fabric` char(25) DEFAULT NULL
);


INSERT INTO `customer` (`cusName`, `contactNumber`, `measurement`, `fabric`) VALUES
('Christina Wong', 9871234, '20', 'Cotton'),
('Claire Hill', 8222618, '23', 'Cashmere'),
('Danielle Wheeler', 8758732, '26', 'Cotton'),
('Dean Walsh', 7117786, '22', 'Spandex'),
('Diana Morrow', 6668466, '28', 'Satin'),
('Glenna Wolf', 5457418, '27', 'Satin'),
('Griffith Crosby', 6754881, '19', 'Wool'),
('Iola Schwartz', 7795138, '24', 'Polyester'),
('Jolie Pierce', 187574, '23', 'Linen'),
('Kasper Kelley', 6500615, '20', 'Satin'),
('Levi Rivera', 5738471, '27', 'Cotton'),
('Lois Gamble', 7406446, '25', 'Cashmere'),
('Melvin Bush', 7049187, '26', 'Lace'),
('Oceanna Richards', 2349876, '23', 'Lace'),
('Ruby Strickland', 8314684, '28', 'Silk'),
('Sage Welp', 5647897, '20', 'Cotton'),
('Scarlet Delacruz', 8883259, '23', 'Polyester'),
('Uriah Joyner', 8241414, '27', 'Cashmere');

DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `orderNum` int(10) NOT NULL,
  `status` char(10) DEFAULT NULL
);

INSERT INTO `status` (`orderNum`, `status`) VALUES
(1, 'Complete'),
(2, 'In Progres'),
(3, 'Cancelled');