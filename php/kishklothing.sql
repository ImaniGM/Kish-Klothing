DROP DATABASE IF EXISTS kishklothing;
CREATE DATABASE kishklothing;
USE kishklothing;

DROP TABLE IF EXISTS `User`;
CREATE TABLE `User`(
    `usern` char(20),
    `password` char(100),
    PRIMARY KEY (`usern`),
);
INSERT INTO `User`
VALUES (
        'owner',
        '$2y$10$DoEP/SyEBDokzAd1WUgIeO0YB1HcGdxZBg4IwynvkijQC/U3FT9lC'
    ),
    (
        'emp1',
        '$2y$10$MdotzPVF.B3z1V10MofQYuc7iqeOwi/gcW1A0gbUELuZ4h3MyOf2m'
    ),
    (
        'emp2',
        '$2y$10$3fwNSbE0Vi1IHr1rSnhqIOAhOtQ2or5EQpMd3RQwCkG/lFVc0FDGi'
    ),
    (
        'emp3',
        '$2y$10$/FTMcdeN2CDvkPgbi2/NgeP318HZDhR8B70R727fjx0CCOokZUhQy'
    ),
    (
        'emp4',
        '$2y$10$xeJUYNBRSPnK291pQf7Ww.o9fDqt7Boa/Ac3w4GXVqKZOz98zDPm6'
    );

DROP TABLE IF EXISTS `Materials`;
CREATE TABLE `Materials`(
    `matId` int(10) AUTO_INCREMENT PRIMARY KEY,
    `matName` char(50),
    `Quantity` int(20),
    `priceOfMaterial`float(10, 2),
    
);
INSERT INTO `Materials`
VALUES (
        1,
        'Cashmere',
        20,
        5000.00
    ),
    (
        2,
        'Cotton',
        500,
        1000.00
    ),
    (
        3,
        'Wool',
        100,
        2000.00
    ),
    (
        4,
        'Polyester',
        200,
        1500.00
    ),
    (
        5,
        'Linen',
        110,
        2500.00
    ),
    (
        6,
        'Canvas',
        50,
        2500.00
    ),
    (
        7,
        'Lace',
        110,
        1800.00
    ),
    (
        8,
        'Satin',
        30,
        2000.00
    ),
    (
        9,
        'Spandex',
        100,
        1000.00
    ),
    (
        10,
        'Silk',
        20,
        3000.00
    ),
    );
 

DROP TABLE IF EXISTS `Customer`;
CREATE TABLE `Customer`(
    `cusName` char(27),
    `contactNumber` int(11),
    `measurement` char(20),
    PRIMARY KEY (`cusName`)
);
INSERT INTO `Customer`
VALUES (
        'Oceanna Richards',
        2349876,
        '23'
    ),
    (
        'Christina Wong',
        9871234,
        '20'
    ),
    (
        'Ocean Richs',
        2345566,
        '30'
    ),
     (
        'Tim Tom',
        4569980,
        '60'
    ),
     );
