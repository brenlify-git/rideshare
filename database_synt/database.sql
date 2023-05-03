#User
#Passenger
#Car_Driver
#CashIn_Fund
#CashOut_Fund
#Car_Description
#Car_SeatDescription
#Carpool_Booking
#Feedback

CREATE DATABASE carpool;

USE CARPOOL;

CREATE TABLE `User` (
  `userID` INT(11) NOT NULL AUTO_INCREMENT,
  `firstName` VARCHAR(255) NOT NULL,
  `middleName` VARCHAR(255),
  `lastName` VARCHAR(255) NOT NULL,
  `contactNumber` VARCHAR(11) NOT NULL,
  `registrationTime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userType` VARCHAR(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `street` VARCHAR(255) NOT NULL,
  `barangay` VARCHAR(255) NOT NULL,
  `municipality` VARCHAR(255) NOT NULL,
  `province` VARCHAR(255) NOT NULL,
  `idType` VARCHAR(255) NOT NULL,
  `idNumber` VARCHAR(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verifyToken` varchar(255) NOT NULL,
  `verifyStatus` varchar(255) NOT NULL DEFAULT 'Not Yet Verified',
  PRIMARY KEY (`userID`)
);


CREATE TABLE `Passenger` (
  `passengerID` INT(11) NOT NULL AUTO_INCREMENT,
  `userID` INT(11) NOT NULL,
  `e_walletNumber` VARCHAR(255) NOT NULL,
  `e_walletBalance` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`passengerID`),
  FOREIGN KEY (userID) REFERENCES User (userID)
);

CREATE TABLE `Car_Driver` (
  `driverID` INT(11) NOT NULL AUTO_INCREMENT,
  `userID` INT(11) NOT NULL,
  `licenseNumber` VARCHAR(255) NOT NULL,
  `ownerBalance` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`driverID`),
  FOREIGN KEY (userID) REFERENCES User (userID)
);

CREATE TABLE `CashIn_Fund` (
  `cashInID` INT(11) NOT NULL AUTO_INCREMENT,
  `passengerID` INT(11) NOT NULL,
  `cashInFrom` VARCHAR(255) NOT NULL,
  `cashInAmount` DECIMAL(10,2) NOT NULL,
  `cashInAccessToken` VARCHAR(255) NOT NULL,
  `cashInTime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cashInStatus` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`cashInID`),
  FOREIGN KEY (`passengerID`) REFERENCES `Passenger`(`passengerID`)
);


CREATE TABLE `CashOut_Fund` (
  `cashOutID` INT(11) NOT NULL AUTO_INCREMENT,
  `driverID` INT(11) NOT NULL,
  `cashOutTo` VARCHAR(255) NOT NULL,
  `cashOutAmount` DECIMAL(10,2) NOT NULL,
  `cashOutAccessToken` VARCHAR(255) NOT NULL,
  `cashOutTime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cashOutStatus` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`cashOutID`),
  FOREIGN KEY (`driverID`) REFERENCES `Car_Driver`(`driverID`)
);

CREATE TABLE `Car_Description` (
  `carID` INT(11) NOT NULL AUTO_INCREMENT,
  `userID` INT(11) NOT NULL,
  `carColor` VARCHAR(255) NOT NULL,
  `manufacturer` VARCHAR(255) NOT NULL,
  `carType` VARCHAR(255) NOT NULL,
  `carSeatCapacity` INT(11) NOT NULL,
  `carRegister` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `plateNumber` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`carID`),
  FOREIGN KEY (`userID`) REFERENCES `user`(`userID`)
);

CREATE TABLE `Car_SeatDescription` (
  `seatID` INT(11) NOT NULL AUTO_INCREMENT,
  `carID` INT(11) NOT NULL,
  `availableSeatType` VARCHAR(255) NOT NULL,
  `seatFare` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`seatID`),
  FOREIGN KEY (`carID`) REFERENCES `Car_Description`(`carID`)
);

CREATE TABLE `Carpool_Booking` (
  `bookingID` INT(11) NOT NULL AUTO_INCREMENT,
  `userID` INT(11) NOT NULL,
  `passengerID` INT(11) NOT NULL,
  `carID` INT(11) NOT NULL,
  `seatID` INT(11) NOT NULL,
  `bookingTime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `departureTime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `routePickupPoint` VARCHAR(255) NOT NULL,
  `routeDropoffPoint` VARCHAR(255) NOT NULL,
  `tripStatus` VARCHAR(255) NOT NULL,
  `overallPayment` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`bookingID`),
  FOREIGN KEY (`seatID`) REFERENCES `Car_SeatDescription`(`seatID`),
  FOREIGN KEY (`carID`) REFERENCES `Car_Description`(`carID`),
  FOREIGN KEY (`userID`) REFERENCES `user`(`userID`),
  FOREIGN KEY (`passengerID`) REFERENCES `Passenger`(`passengerID`)
);

CREATE TABLE `Feedback` (
  `feedbackID` INT(11) NOT NULL AUTO_INCREMENT,
  `bookingID`  INT(11) NOT NULL,
  `rating`  INT(11) NOT NULL,
  `comment` VARCHAR(255) NOT NULL,
  `feedbackTime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`feedbackID`),
  FOREIGN KEY (`bookingID`) REFERENCES `Carpool_Booking`(`bookingID`)
);

INSERT INTO `user` (`userID`, `firstName`, `middleName`, `lastName`, `contactNumber`, `registrationTime`, `userType`, `email`, `street`, `barangay`, `municipality`, `province`, `idType`, `idNumber`, `username`, `password`, `verifyToken`, `verifyStatus`) VALUES
(1000, 'Brenley Ian', 'Del Rosario', 'Robles', '09776812713', '2023-04-19 10:57:12', 'Passenger', 'brenlify.mail@gmail.com', 'Saint Mary', 'Balite', 'Malolos', 'Bulacan', 'UMID', '999-345635-53535', 'brenlify-pool', 'bren123', 'osduf297ryiwy347ryfh87eyriuhf97erguof985yreog', 'Verified'),
(1001, 'Raven Lorenz', 'Caoc', 'Cruz', '09734647454', '2023-04-19 10:57:12', 'Admin', 'raven.mail@gmail.com', 'Aldama', 'Birhen Delos Flores', 'Baliwag', 'Bulacan', 'UMID', '999-345635-53535', 'ravenn', 'raven123', 'osduf297ryiwy347ryfh87eyriuhf97erguof985yreog', 'Verified');

INSERT INTO `car_description` (`carID`, `userID`, `carColor`, `manufacturer`, `carType`, `carSeatCapacity`, `carRegister`, `plateNumber`) VALUES
(2, 1000, 'BLUE', 'Honda', 'SUV', 4, '2023-05-02 00:49:32', 'fg-r');



#REPORTS

#This report will show all the cashin transaction that is defined as "Succesful" 

SELECT cashIn_fund.cashInID, user.firstName, user.middleName, user.lastName, passenger.e_walletNumber, cashIn_fund.cashInFrom, cashIn_fund.cashInAmount, cashIn_fund.cashInAccessToken, cashIn_fund.cashInTime, cashIn_fund.cashInStatus
FROM cashIn_fund
INNER JOIN passenger ON cashIn_fund.passengerID = passenger.passengerID
INNER JOIN User ON passenger.userID = user.userID
WHERE cashIn_fund.cashInStatus = 'Successful'
ORDER BY cashIn_fund.cashInTime DESC;


#Reports for viewing all the carpool books of a single user, I will be utilizing this for checking all the past bookings of a specific passenger and they can view it on their history logs.

SELECT carpoolBook.bookingID, carpoolBook.bookingTime, carpoolBook.departureTime, carpoolBook.routePickupPoint, carpoolBook.routeDropoffPoint, seatDetails.availableSeatType as seatLocation, seatDetails.seatFare, carpoolBook.tripStatus, carpoolBook.overallPayment, passengerUserDets.userID AS passengerID,
passengerUserDets.firstName AS passengerFirstName, passengerUserDets.middleName AS passengerMiddleName,
passengerUserDets.lastName AS passengerLastName, passengerDetails.e_walletBalance AS passengerBalance,
passengerUserDets.email AS passengerEmail, passengerUserDets.contactNumber AS passengerContactNumber,
driverUserDets.userID AS driverID, carDriver.licenseNumber, driverUserDets.firstName AS driverFirstName,
driverUserDets.middleName AS driverMiddleName, driverUserDets.lastName AS driverLastName,
driverUserDets.contactNumber AS driverContactNumber, driverUserDets.email AS driverEmail
FROM carpool_booking carpoolBook
INNER JOIN passenger passengerDetails ON carpoolBook.passengerID = passengerDetails.passengerID
INNER JOIN car_driver carDriver ON carpoolBook.driverID = carDriver.driverID
INNER JOIN user driverUserDets ON carDriver.userID = driverUserDets.userID
INNER JOIN user passengerUserDets ON passengerDetails.userID = passengerUserDets.userID
INNER JOIN car_seatdescription seatDetails ON carpoolBook.seatID = seatDetails.seatID
WHERE passengerUserDets.userID = 1002 AND (tripStatus = 'Accepted' OR tripStatus = 'On Going' OR tripStatus = 'Succesful');

#This report shows all the transactions recorded for the Month of April, we can also see here the standings of each driver that varies on the total number of bookings they made.

SELECT MONTH(carpoolBook.bookingTime) AS Month, carDriver.driverID, userDetails.firstName, userDetails.middleName, userDetails.lastName,
COUNT(carpoolBook.bookingID) AS TotalBookings
FROM carpool_booking carpoolBook
INNER JOIN car_driver carDriver ON carpoolBook.driverID = carDriver.driverID
INNER JOIN user userDetails ON carDriver.userID = userDetails.userID
WHERE MONTH(carpoolBook.bookingTime) = 4
GROUP BY carDriver.driverID
ORDER BY TotalBookings DESC





