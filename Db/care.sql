-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2020 at 03:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `care`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `Id` int(11) NOT NULL,
  `Day` varchar(50) DEFAULT NULL,
  `Date` date NOT NULL,
  `PatientId` int(11) NOT NULL,
  `DoctorId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`Id`, `Day`, `Date`, `PatientId`, `DoctorId`) VALUES
(5, 'Tue', '2020-09-01', 20, 19),
(24, 'Sat', '2020-09-26', 21, 19),
(25, 'Sat', '2020-09-26', 23, 14),
(26, 'Sat', '2020-09-26', 23, 14),
(27, 'Mon', '2020-09-28', 23, 14),
(28, 'Mon', '2020-09-28', 23, 14),
(29, 'Mon', '2020-09-28', 23, 14),
(30, 'Mon', '2020-09-28', 23, 14),
(31, 'Wed', '2020-09-30', 28, 14),
(32, 'Wed', '2020-09-30', 28, 14),
(33, 'Fri', '2020-10-02', 28, 14),
(34, 'Thu', '2020-10-08', 21, 19),
(35, 'Sat', '2020-10-31', 40, 25),
(36, 'Wed', '2020-10-14', 23, 14),
(37, 'Sat', '2020-10-17', 38, 19);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`Id`, `Name`) VALUES
(1, 'Islamabad'),
(2, 'Karachi'),
(3, 'Lahore');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`Id`, `Name`, `Email`, `Subject`, `Message`) VALUES
(3, 'faizain@gmail.com', 'Faizan', 'dnkvns', ' vsdmvms dv');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone Number` bigint(20) NOT NULL,
  `FromTime` varchar(50) NOT NULL,
  `EndTime` varchar(50) NOT NULL,
  `FromDay` varchar(50) NOT NULL,
  `EndDay` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctoravailability`
--

CREATE TABLE `doctoravailability` (
  `Id` int(11) NOT NULL,
  `Day` varchar(20) NOT NULL,
  `FromTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `DoctorId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctoravailability`
--

INSERT INTO `doctoravailability` (`Id`, `Day`, `FromTime`, `EndTime`, `DoctorId`) VALUES
(9, 'Sun', '09:00:00', '11:00:00', 14),
(10, 'Mon', '12:00:00', '18:00:00', 14),
(12, 'Mon', '07:00:00', '09:30:00', 15),
(14, 'Tue', '15:00:00', '18:00:00', 19),
(15, 'Thu', '18:00:00', '20:00:00', 19),
(17, 'Fri', '15:00:00', '17:30:00', 14),
(18, 'Sat', '15:00:00', '17:00:00', 19),
(20, 'Wed', '13:00:00', '18:30:00', 19),
(21, 'Sat', '08:00:00', '20:00:00', 25),
(22, 'Wed', '08:00:00', '18:00:00', 14);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Contact` bigint(20) DEFAULT NULL,
  `SpecialityId` int(11) DEFAULT NULL,
  `Details` text DEFAULT NULL,
  `Photo` text DEFAULT NULL,
  `CityId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`Id`, `Name`, `Contact`, `SpecialityId`, `Details`, `Photo`, `CityId`) VALUES
(14, 'Shahid Ashraf', 3337654321, 3, 'PHD doctor!!!!!!!!', '../uploading/../uploading/d4.png', 1),
(19, 'Aslamuddin Shah', 3302324221, 4, 'Good Doctor..!!', '../uploading/d3.png', 2),
(22, 'Rashid Siddique', 3452035987, 5, 'PHD Doctor', 'dr-1.jpg', 3),
(25, 'Dr Alam', 3212213213, 6, 'Good Doctor!!', '../uploading/../uploading/download.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `Id` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `ShortDiscription` varchar(1000) NOT NULL,
  `Content` varchar(10000) NOT NULL,
  `Author` varchar(50) NOT NULL,
  `PublishedOn` date NOT NULL,
  `NewsCover` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`Id`, `Title`, `ShortDiscription`, `Content`, `Author`, `PublishedOn`, `NewsCover`) VALUES
(25, 'THIS IS A STANDARD POST WITH IMAGE', 'SOURIAU’s expertise in the medical field is based on over 100 years experience in challenging sectors such as aerospace, defense and high-value precision industry', 'SOURIAU’s expertise in the medical field is based on over 100 years experience in challenging sectors such as aerospace, defense and high-value precision industry. Beyond reliable and safe solutions, we provide you with international support adapted to the most demanding markets. Choosing our range of medical solutions is placing your trust in SOURIAU’s quality and expertise\r\n\r\nOur vast portfolio of medical connectors and cable assembly solutions will help fulfill the design challenges of your medical electronic equipment  whether it requires sealing for wet applications, design durability to withstand the rigors of sterilization or even infallible signal and power performance. For your more complex design needs, we also offer customizable solutions supported by our global team of engineering and product experts.', 'Alex', '2020-10-10', 'banierre.jpg'),
(26, 'Influenza drug shows promise against SARS-CoV-2', 'Researchers have found that high doses of a drug called favipiravir strongly inhibit SARS-CoV-2 in hamsters. Favipiravir also prevented infection in healthy animals that had exposure to an infected cage mate.', 'It takes many years to develop a potent antiviral drug from scratch for a particular viral infection. Throughout the pandemic of COVID-19 — the disease that SARS-CoV-2 causes — researchers and clinicians have, therefore, had to focus on repurposing existing drugs.\r\n\r\nEarly on in the outbreak, one of the consequences of this was the wide administration of the antimalarial drug hydroxychloroquine to seriously ill patients.\r\n\r\nIn the absence of a proven animal model of COVID-19, doctors were relying on evidence from experiments using cell cultures, which suggested that the drug worked.\r\n\r\nIn June 2020, however, the first conclusive results from clinical research involving humans revealed that hydroxychloroquine was ineffective.\r\n\r\nVirologists at the Rega Institute for Medical Research in Leuven, Belgium, have now developed a model of COVID-19 in Syrian hamsters, which they hope will provide more reliable information before the results of clinical trials become available.\r\n\r\nThey have already used their animal model to test different doses of favipiravir, an antiviral drug that has had approval in Japan since 2014 to treat pandemic influenza infections.', 'Andrew', '2020-10-16', 'GettyImages-1263899936_header-1024x575.jpg'),
(27, 'Air pollution linked to markers of neurodegenerative disease', 'Scientists recently found that the brains of young people exposed to air pollution display the markers of neurodegenerative diseases in their brain stems.', 'A new study has shown that young adults and children exposed to air pollution have the markers of Alzheimer’s disease, Parkinson’s disease, and motor neuron disease in their brain stems.\r\n\r\nAlongside these markers were nanoparticles that appeared to originate from vehicles’ internal combustion and braking systems.\r\n\r\nThe research, which appears in the journal Environmental Research, highlights the need to do more to protect young people from the effects of air pollution to avoid “a global neurodegenerative epidemic.”', 'Roy', '2020-10-16', 'GettyImages-180408620_header-1024x575.jpg'),
(28, 'Drinking coffee may protect some people against Parkinson’s', 'A recent study found lower levels of caffeine in the blood of people with Parkinson’s disease. The study compared people with Parkinson’s who carry a particular genetic mutation known to increase Parkinson’s risk with people who carry the same mutation but do not have the disease.\r\n\r\n', 'Parkinson’s disease is a progressive brain disorder characterized by tremors, rigidity in the limbs and torso, and movement and balance problems. People with the condition also have an increased risk of depression and dementia.\r\n\r\nAccording to the U.S. National Library of Medicine, more than 1 million people in North America and more than 4 million people worldwide have Parkinson’s disease. In the United States, about 60,000 people receive a diagnosis each year.\r\n\r\nAround 15% of people with the disease have a family history of Parkinson’s, which suggests they inherited genes that increased their risk of developing the condition. However, most cases result from a complex, poorly understood interaction of genetic and environmental factors.\r\n\r\nSeveral environmental factors, such as head trauma, chemicals, and drugs, have associations with increased risk, whereas exercise has associations with reduced risk.\r\n\r\nA 2010 review of previous research found that the more caffeine people regularly consumed, the lower their risk of developing Parkinson’s.\r\n\r\nAnother study showed that people with Parkinson’s who have no genetic risk factors for the disease have lower caffeine levels in their blood than people without the disease.\r\n\r\nA team led by researchers at Massachusetts General Hospital in Boston, MA, set out to discover whether coffee might also protect people with a mutation in the LRRK2 gene. Having this gene increases the risk of developing the disease but does not guarantee it.\r\n\r\nThe researchers compared people with and without Parkinson’s disease. Both groups contained people with and without a mutation in the LRRK2 gene.\r\n\r\nThe researchers found that the differences in the blood caffeine levels between people with Parkinson’s and those without were greater among individuals with this genetic mutation.\r\n\r\n', 'Dr Grace', '2020-10-16', 'GettyImages-1026611720_header-1024x575.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `Id` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `OrderId` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`Id`, `ProductId`, `OrderId`, `Price`, `Quantity`) VALUES
(58, 1, 25, 22, 3),
(59, 4, 25, 10, 2),
(60, 1, 26, 22, 3),
(62, 4, 28, 10, 2),
(63, 1, 28, 22, 3),
(66, 1, 30, 22, 3),
(67, 4, 30, 10, 2),
(68, 5, 30, 15, 2),
(69, 5, 31, 15, 2),
(70, 8, 32, 30, 1),
(71, 6, 32, 90, 1),
(76, 4, 35, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Id` int(11) NOT NULL,
  `SessionId` varchar(50) NOT NULL,
  `Amount` varchar(50) DEFAULT NULL,
  `OrderDate` datetime NOT NULL,
  `CustomerName` varchar(50) DEFAULT NULL,
  `Address` varchar(500) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Phone` bigint(20) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Id`, `SessionId`, `Amount`, `OrderDate`, `CustomerName`, `Address`, `Email`, `Phone`, `City`) VALUES
(25, 'it4o204s2gat6osrjbi4f9gr3g', '42', '2020-10-10 20:48:08', 'Ali Raza', 'DHA Karachi', 'ali@gmail.com', 11223127182, 'Karachi'),
(26, 'j3mi88bk855hv33m0rj9iqs2dq', '44', '2020-10-12 08:51:16', 'Ali Raza', 'Malir', 'ali@gmail.com', 8078989, 'Karachi'),
(27, 'd1lm25g2sr13cvo45taa4d6rhj', '44', '2020-10-12 20:48:39', 'Usama', 'Malir', 'usama@gmail.com', 3000000000, 'Karachi'),
(28, 'qgiitv4tj7scpr13lrmeub79im', '32', '2020-10-13 23:09:19', 'Hassan', 'DHA', 'hassan@gmail.com', 37654321, 'lahore'),
(30, 'viup5u6obplict4mmdfksainos', '116', '2020-10-14 09:03:44', 'deer', 'korangi', 'deer@gmail.com', 23001, 'Karachi'),
(31, '0nm0blctom3ldh24c06np3k1og', '30', '2020-10-14 09:53:39', 'Zeeshan', 'Malir', 'zeeshan@gmail.com', 37896543, 'Karachi'),
(32, 'fj189jc3bofeop06ide78jrh84', '120', '2020-10-16 02:23:12', 'Alam', 'kk', 'alam@gmail.com', 235325, 'lahore'),
(35, 'oolgf1nage3jk4kgo0pe6eeh3v', '10', '2020-10-16 11:33:56', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Contact` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`Id`, `Name`, `Contact`) VALUES
(20, 'Qadir', 3102012423),
(21, 'Hamza', 3132296543),
(23, 'Ali Raza', 3132296541),
(28, 'Meer', 3032424244),
(29, 'Saad', 141242385),
(32, 'Rayyan', 213253246),
(35, 'Hammad', 21400675),
(36, 'Shah', 9576945),
(37, 'Huma', 2123456789),
(38, 'deer', 3001234567),
(39, 'Usama', 3123090000),
(40, 'Unaib', 3101213144);

-- --------------------------------------------------------

--
-- Table structure for table `productcategories`
--

CREATE TABLE `productcategories` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productcategories`
--

INSERT INTO `productcategories` (`Id`, `Name`) VALUES
(1, 'Antipyretics'),
(2, 'Paracetamol '),
(3, 'A-Hydrocort '),
(4, 'Abilify (aripiprazole)'),
(5, 'abciximab-injection'),
(6, 'acetic acid-otic'),
(7, 'Adlyxin lixisenatide');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` int(11) NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `Photo` varchar(50) NOT NULL,
  `Details` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Id`, `Name`, `Price`, `CategoryId`, `Photo`, `Details`) VALUES
(1, 'Aspirin', 22, 1, 'Aspirin-Tablets-100mg-10X3-Medipharm-OEM.jpg', 'guhgjhvxsjhc!!!'),
(4, 'Panadol', 10, 2, 'panadol.jpg', 'jkdbvjksdb'),
(5, 'Panadol Extra', 15, 2, 'Panadol_Extra_Solubles.jpg', 'aa'),
(6, 'Adlyxin lixisenatide', 90, 7, 'lyxumia-injection-500x500.jpg', 'aaa'),
(7, 'Hydrocortistone', 60, 6, 'images.jpg', 'aa'),
(8, 'Reo Pro', 30, 5, '2704-large_default-600x600.jpg', 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `specialities`
--

CREATE TABLE `specialities` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specialities`
--

INSERT INTO `specialities` (`Id`, `Name`) VALUES
(1, 'Neurologist'),
(2, 'Cardiologist'),
(3, ' Dermatologist'),
(4, 'Homeopathic'),
(5, 'Orthopedist'),
(6, 'Psychiatrist');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(50) NOT NULL,
  `UserTypeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Email`, `Password`, `UserTypeId`) VALUES
(2, 'admin@gmail.com', '123', 1),
(14, 'shahid@gmail.com', '123', 2),
(19, 'aslam@gmail.com', '123', 2),
(20, 'qadir@gmail.com', '123', 3),
(21, 'hamza@gmail.com', '123', 3),
(22, 'rashid@gmail.com', '123', 2),
(23, 'ali@gmail.com', '123', 3),
(24, 'admin2@gmail.com', '123', 1),
(25, 'alam@gmail.com', '123', 2),
(28, 'meer@gmail.com', '123', 3),
(29, 'saad@gmail.com', '123', 3),
(32, 'rayyan@gmail.com', '123', 3),
(35, 'hammad@gmail.com', '123', 3),
(36, 'shah@gmail.com', '123', 3),
(37, 'hum@gmail.com', '123', 3),
(38, 'deer@gmail.com', '123', 3),
(39, 'usama@gmail.com', '123', 3),
(40, 'unaib@gmail.com', '123', 3);

-- --------------------------------------------------------

--
-- Table structure for table `usertypeid`
--

CREATE TABLE `usertypeid` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertypeid`
--

INSERT INTO `usertypeid` (`Id`, `Name`) VALUES
(1, 'Admin'),
(2, 'Doctor'),
(3, 'Patient');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ForeingnKey4` (`DoctorId`),
  ADD KEY `ForeingnKey5` (`PatientId`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `doctoravailability`
--
ALTER TABLE `doctoravailability`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ForeingnKey3` (`DoctorId`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ForeingnKey2` (`SpecialityId`),
  ADD KEY `dx1` (`CityId`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `p1` (`ProductId`),
  ADD KEY `o1` (`OrderId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `productcategories`
--
ALTER TABLE `productcategories`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `categorytoproduct` (`CategoryId`);

--
-- Indexes for table `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `ForeingnKey1` (`UserTypeId`);

--
-- Indexes for table `usertypeid`
--
ALTER TABLE `usertypeid`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctoravailability`
--
ALTER TABLE `doctoravailability`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `productcategories`
--
ALTER TABLE `productcategories`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `specialities`
--
ALTER TABLE `specialities`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `usertypeid`
--
ALTER TABLE `usertypeid`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `ForeingnKey4` FOREIGN KEY (`DoctorId`) REFERENCES `doctors` (`Id`),
  ADD CONSTRAINT `ForeingnKey5` FOREIGN KEY (`PatientId`) REFERENCES `patients` (`Id`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderid` FOREIGN KEY (`OrderId`) REFERENCES `orders` (`Id`),
  ADD CONSTRAINT `pid` FOREIGN KEY (`ProductId`) REFERENCES `products` (`Id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `categorytoproduct` FOREIGN KEY (`CategoryId`) REFERENCES `productcategories` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
