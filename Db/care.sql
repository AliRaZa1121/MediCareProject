-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2020 at 12:28 PM
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
(15, NULL, '2020-09-23', 20, 14),
(22, NULL, '2020-09-20', 23, 14),
(23, NULL, '2020-09-23', 20, 14),
(24, 'Sat', '2020-09-26', 21, 19),
(25, 'Sat', '2020-09-26', 23, 14),
(26, 'Sat', '2020-09-26', 23, 14),
(27, 'Mon', '2020-09-28', 23, 14),
(28, 'Mon', '2020-09-28', 23, 14),
(29, 'Mon', '2020-09-28', 23, 14),
(30, 'Mon', '2020-09-28', 23, 14);

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
(1, 'aliraxa987@gmail.com', 'Zara Jeans', 'D', 'Hello');

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
(10, 'Wed', '12:00:00', '15:00:00', 14),
(12, 'Mon', '07:00:00', '09:30:00', 15),
(14, 'Tue', '15:00:00', '18:00:00', 19),
(15, 'Thu', '18:00:00', '20:00:00', 19),
(17, 'Fri', '15:00:00', '17:30:00', 14),
(18, 'Sat', '15:00:00', '17:00:00', 19),
(19, 'Mon', '18:00:00', '19:30:00', 14);

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
(14, 'Shahid Ashraf', 3031234567, 3, 'PHD doctor!!!!!!!!!!!!!!!!!', '../uploading/d4.png', 1),
(19, 'Aslamuddin Shah', 3302324221, 4, 'Good Doctor..!!', '../uploading/d3.png', 2),
(22, 'Rashid Siddique', 3452035987, 5, 'PHD Doctor', 'dr-1.jpg', 3),
(25, 'Dr Alam', 30312342, 6, 'Good Doctor', 'download.jpg', 2);

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
(19, 'Pakistan\'s fight against COVID-19: A success story?', 'Picture a developing country facing a mix of social, political and economic troubles. Imagine this country is also faced by intermittent but incessant episodes of social unrest fueled by issues ranging from sectarian violence to gender inequality. Knee-deep in debt, this country also has a weak healthcare system crippled by everything from low budgetary allocation to corruption. What happens when a pandemic hits such a country?', 'The answer to this hypothetical question might not be very pleasing. However, how things have shaped for this country in the real world is nothing short of a miracle. Under the spotlight today is Pakistan – a country that seems to be emerging victorious in its fight against COVID-19 – a pandemic that has brought even the likes of the United States to its knees.\r\n\r\nThe virus started picking up pace in Pakistan in May, with the country reporting between 989 (May 2) and 3,039 (May 30) cases on a daily basis. The peak hit on June 13 when as many as 6,825 cases were reported in a single day. Since the middle of June, the number of new cases has declined steadily, with the figure falling below 1,000 in August and below 600 in September.\r\nThe increase in testing capacity, decrease in number of daily cases and deaths, and mobilization of the state machinery to keep safe a population that does not respond well to government directives were all achieved amid a critical period on the Islamic lunar calendar. The Muslim holy month of fasting, Ramadan, and the ensuing festival, Eid al Fitr, fell in May; one of the largest Muslim festivals involving mass animal slaughter, Eid al Adha, chose the end of July; and the Islamic month of mourning, Muharram, marking the martyrdom anniversary of one of the holiest figures in Islam, began at the end of August.\r\n\r\nThe increase in testing capacity, decrease in number of daily cases and deaths, and mobilization of the state machinery to keep safe a population that does not respond well to government directives were all achieved amid a critical period on the Islamic lunar calendar. The Muslim holy month of fasting, Ramadan, and the ensuing festival, Eid al Fitr, fell in May; one of the largest Muslim festivals involving mass animal slaughter, Eid al Adha, chose the end of July; and the Islamic month of mourning, Muharram, marking the martyrdom anniversary of one of the holiest figures in Islam, began at the end of August.\r\n\r\n', 'Anas Raza', '2020-09-17', '173798.jpg'),
(21, 'Got fatigue? Study further pinpoints brain regions that may control it', 'Scientists at Johns Hopkins Medicine using MRI scans and computer modeling say they have further pinpointed areas of the human brain that regulate efforts to deal with fatigue.', 'The findings, they say, could advance the development of behavioral and other strategies that increase physical performance in healthy people, and also illuminate the neural mechanisms that contribute to fatigue in people with depression, multiple sclerosis and stroke.\r\n\r\nResults of the research were published online Aug. 12 in Nature Communications.\r\n\r\n\"We know the physiologic processes involved in fatigue, such as lactic acid build-up in muscles, but we know far less about how feelings of fatigue are processed in the brain and how our brain decides how much and what kind of effort to make to overcome fatigue,\" says Vikram Chib, Ph.D., assistant professor of biomedical engineering at the Johns Hopkins University School of Medicine and research scientist at the Kennedy Krieger Institute.\r\n\r\nKnowing the brain regions that control choices about fatigue-moderating efforts can help scientists find therapies that precisely alter those choices, says Chib. \"It might not be ideal for your brain to simply power through fatigue,\" says Chib. \"It might be more beneficial for the brain to be more efficient about the signals it\'s sending.\"\r\n\r\nFor the study, Chib first developed a novel way to objectively quantify how people \"feel\" fatigue, a difficult task because rating systems can vary from person to person. Physicians often ask their patients to rate their fatigue on a scale of 1 to 7, but like pain scales, such ratings are subjective and varied.\r\n\r\nTo standardize the metric for fatigue, Chib asked 20 study participants to make risk-based decisions about exerting a specific physical effort. The average age of participants was 24 and ranged from 18 to 34. Nine of the 20 were female.\r\n\r\nThe 20 participants were asked to grasp and squeeze a sensor after training them to recognize a scale of effort. For example, zero was equal to no effort and 50 units of effort were equal to half the participant\'s maximum force. The participants learned to associate units of effort with how much to squeeze, which helped to standardize the effort level among individuals.\r\n\r\nThe participants repeated the grip exercises for 17 blocks for 10 trials each, until they were fatigued, then were offered one of two choices for making each effort. One was a random (\"risky\") choice based on a coin flip, offering the chance to exert no effort or a predetermined effort level. The other choice was a predetermined set effort level. By introducing uncertainty, the researchers were tapping in to how each subject valued their effort -- a way, in effect, of shedding light on how their brains and minds decided how much effort to make.\r\n\r\nBased on whether the participant chose a risky option versus the predetermined one, the researchers used computerized programs to measure how participants felt about the prospect of exerting particular amounts of effort while they were fatigued.\r\n\r\n\"Unsurprisingly, we found that people tend to be more risk averse -- to avoid -- effort,\" says Chib. Most of the participants (19 of 20) opted for the risk-free choice of a predetermined effort level. This means that, when fatigued, participants were less willing to take the chance of having to exert large amounts of effort.\r\n\r\n\"The predetermined amount had to get pretty high in relative effort for participants to choose the coin toss option,\" says Chib.\r\n\r\nAmong a separate group of 10 people trained on the gripping system but not given numerous, fatiguing trials, there was no significant tendency toward picking either the risky coin toss or defined effort.\r\n\r\nChib\'s research team also evaluated participants\' brain activity during the gripping exercises using functional magnetic resonance imaging (fMRI) scans, which track blood flow through the brain and show which neurons are firing most often.\r\n\r\nChib\'s team confirmed previous findings that brain activity when participants chose between the two options seemed to increase in all participants in an area of the brain\'s known as the insula.\r\n\r\nAlso using fMRI scans, they took a closer look at the motor cortex of the brain when the participants were fatigued. This region of the brain is responsible for exerting the effort itself.\r\n\r\nThe researchers found that the motor cortex was deactivated at the time participants \"decided\" between the two effort choices. That finding is consistent, Chib says, with previous studies showing that when people perform repeated fatiguing exertions, motor cortex activity is decreased, associated with fewer signals being sent down to the muscles.\r\n\r\nParticipants whose motor cortex activity changed the least, in response to fatiguing exertion, were the ones who were most risk averse in their effort choices and were most fatigued. This suggests that fatigue might arise from a miscalibration between what an individual thinks they are able to achieve and the actual activity in motor cortex.\r\n\r\nEssentially, the body attunes to the motor cortex when fatigued, because if the brain kept sending more signals to muscles to act, physiological constraints would begin to take over, for example, increased lactic acid, contributing to even more fatigue.\r\n\r\nThese findings, says Chib, may advance the search for therapies -- physical or chemical -- that target this pathway in healthy people to advance performance and in people with conditions that are associated with fatigue.\r\n\r\nFunding for the research was provided by the Eunice Kennedy Shriver National Institute of Child Health and Human Development of the National Institutes of Health (R01HD097619), the National Institutes of Health\'s National Institute of Mental Health (R56MH113627, R01MH119086).\r\n\r\nIn addition to Chib, other scientists who conducted the study include Patrick Hogan, Steven Chen and Wen Wen Teh from Johns Hopkins.', 'Alex', '2020-09-20', '200826113713_1_540x360.jpg'),
(22, 'How Dantu blood group protects against malaria, and how all humans could benefit????????', 'The secret of how the Dantu genetic blood variant helps to protect against malaria has been revealed for the first time by scientists at the Wellcome Sanger Institute, the University of Cambridge and the KEMRI-Wellcome Trust Research Programme, Kenya. The team found that red blood cells in people with the rare Dantu blood variant have a higher surface tension that prevents them from being invaded by the world\'s deadliest malaria parasite, Plasmodium falciparum', 'The findings, published today (16 September) in Nature, could also be significant in the wider battle against malaria. Because the surface tension of human red blood cells increases as they age, it may be possible to design drugs that imitate this natural process to prevent malaria infection or reduce its severity.\r\n\r\nMalaria remains a major global health problem causing an estimated 435,000 deaths per year, with 61 per cent occurring in children under five years of age. P. falciparum is responsible for the deadliest form of malaria and is particularly prevalent in Africa, accounting for 99.7 per cent of African malaria cases and 93 per cent of global malaria deaths in 2017.\r\n\r\nIn 2017, researchers discovered that the rare Dantu blood variant, which is found regularly only in parts of East Africa, provides some degree of protection against severe malaria. The intention behind this new study was to explain why.\r\n\r\nRed blood cell samples were collected from 42 healthy children in Kilifi, Kenya, who had either one, two or zero copies of the Dantu gene. The researchers then observed the ability of parasites to invade the cells in the laboratory, using multiple tools including time-lapse video microscopy to identify the specific step at which invasion was impaired.\r\n\r\nAnalysis of the characteristics of the red blood cell samples indicated that the Dantu variant created cells with a higher surface tension -- like a drum with a tighter skin. At a certain tension, malaria parasites were no longer able to enter the cell, halting their lifecycle and preventing their ability to multiply in the blood.\r\n\r\nDr Silvia Kariuki, of the KEMRI-Wellcome Trust Research Programme, Kenya, said: \"Malaria parasites utilise a specific \'lock-and-key\' mechanism to infiltrate human red blood cells. When we set out to explain how the Dantu variant protects against these parasites, we expected to find subtle changes in the way this molecular mechanism works, but the answer turned out to be much more fundamental. The Dantu variant actually slightly increases the tension of the red blood cell surface. It\'s like the parasite still has the key to the lock, but the door is too heavy for it to open.\"\r\n\r\nThe Dantu blood group has a novel \'chimeric\' protein that is expressed on the surface of red blood cells, and alters the balance of other surface proteins. In Kilifi, a town on the Kenyan coast, 10 per cent of the population have one copy of the Dantu gene, which confers up to 40 per cent protection against malaria. One per cent of the population have two copies, conferring up to 70 per cent protection. By contrast, the best malaria vaccines currently provide 35 per cent protection.\r\n\r\nBecause humans have evolved alongside malaria for tens of thousands of years, some people in the worst affected areas have developed genetic resistance to the disease. The most famous example is sickle cell trait, which confers 80 per cent resistance to malaria, but can cause serious illness in those with two copies of the gene. There is currently no evidence that the Dantu variant is accompanied by other health complications.\r\n\r\nDr Alejandro Marin-Menendez, of the Wellcome Sanger Institute, said: \"The fact that we see the most protective adaptations in areas where malaria is most prevalent tells us a lot about how these parasites have influenced human evolution. Malaria is still an incredibly destructive disease, but evolutionary adaptations like sickle cell trait and the Dantu variant may partially explain why the mortality rate is much lower than the rate of infection. We\'ve been fighting malaria parasites for as long as we\'ve been human, so there may be other adaptations and mechanisms yet to be discovered.\"\r\n\r\nResearchers suggest one of the most significant implications of the study stems from the fact that the surface tension of human red blood cells varies naturally, generally increasing during their approximately 90-day lifespan. This means a proportion of all of our red blood cells are naturally resistant to infection by malaria parasites, and it may be possible to develop drugs that take advantage of this process.\r\n\r\nDr Viola Introini, of the University of Cambridge, said: \"The explanation for how Dantu protects against malaria is potentially very important. The red cell membrane only needs to be slightly more tense than usual to block malaria parasites from entering. Developing a drug that emulates this increased tension could be a simple but effective way to prevent or treat malaria. This would depend on the increase in cell tension not having unintended consequences, of course. But evidence from the natural protection already seen in Dantu people, who don\'t seem to suffer negative side effects, is promising.\"\r\n\r\n', 'Benjamin ', '2020-09-20', 'maldownload.jpg');

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
(29, 'Saad', 141242385);

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
(14, 'shahid@gmail.com', '12345', 2),
(19, 'aslam@gmail.com', '123', 2),
(20, 'qadir@gmail.com', '123', 3),
(21, 'hamza@gmail.com', '123', 3),
(22, 'rashid@gmail.com', '123', 2),
(23, 'ali@gmail.com', '123', 3),
(24, 'admin2@gmail.com', '123', 1),
(25, 'alam@gmail.com', '123', 2),
(28, 'meer@gmail.com', '123', 3),
(29, 'saad@gmail.com', '123', 3);

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
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`Id`);

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctoravailability`
--
ALTER TABLE `doctoravailability`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `specialities`
--
ALTER TABLE `specialities`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
