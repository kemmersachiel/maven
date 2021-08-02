-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2021 at 04:02 PM
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
-- Database: `maven_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `created`, `modified`) VALUES
(1, 'News', '2021-08-01 20:35:31', '2021-08-01 20:35:31'),
(2, 'Health', '2021-08-02 13:57:27', '2021-08-02 13:57:27'),
(3, 'Security', '2021-08-02 13:58:05', '2021-08-02 13:58:05'),
(4, 'Politics', '2021-08-02 13:58:15', '2021-08-02 13:58:15'),
(5, 'Government', '2021-08-02 14:00:25', '2021-08-02 14:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comments` varchar(100) NOT NULL,
  `user_id` int(50) NOT NULL,
  `post_id` int(50) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comments`, `user_id`, `post_id`, `created`, `modified`) VALUES
(1, 'In a related development, Igboho\'s trial in Benin Republic continues apace.', 1, 1, '2021-08-01 21:15:53', '2021-08-02 13:51:00'),
(2, 'Maven Contributors is an initiative to highlight diverse journalistic voices. Maven Contributors do ', 1, 5, '2021-08-02 13:55:10', '2021-08-02 13:55:10'),
(3, '“He was mistakenly shot by a security personnel, as they were pursuing the fleeing gunmen,” he said.', 1, 6, '2021-08-02 13:56:13', '2021-08-02 13:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `user_id` int(50) NOT NULL,
  `category_id` int(50) NOT NULL,
  `status` enum('approved','pending','rejected') NOT NULL DEFAULT 'approved',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `user_id`, `category_id`, `status`, `created`, `modified`) VALUES
(1, 'DSS bars journalists from covering trial of Igboho supporters', 'The supporters were arrested during a raid of Igboho\'s home on July 1, 2021. The DSS said it uncovered weapons inside the house during the raid.\r\n\r\nHowever, journalists were barred from covering proceedings as the supporters filed into the courtroom on Monday.\r\n\r\nThe supporters had been moved from Oyo to Abuja following the raid.\r\n\r\nThrough their lawyer, Pelumi Olajemgbesi, the suspects had filed an application asking the court to “inquire into the circumstances constituting grounds of their arrest and detention since July 2, 2021, and where it deems fit admit applicants on bail.\"\r\n\r\nThe Judge, Obiora Egwatu, had ruled that there was merit in the application and ordered the DSS to produce the applicants in court on July 29.\r\n\r\nHowever, the DSS failed to produce the applicants in court on the date fixed.\r\n\r\nOn July 29, the judge restated his earlier order and adjourned the case for August 2.\r\n\r\nHowever, only eight of the 12 suspects were brought to court on Monday, August 2.\r\n\r\nSpeaking to journalists immediately after the court session, Olajemgbese said the court has granted them leave to amend their processes.\r\n\r\n“We discovered that there are some errors in our document which we need to correct.\r\n\r\n“DSS did not come to court with all the 12 people arrested in Igboho’s house. They came here with just eight of them. Even when we visited the DSS facility, we were only allowed to see four of them,” Olajemgbese said.\r\n\r\nThe court has fixed August 4 for continuation of the trial.', 1, 3, 'approved', '2021-08-01 20:35:15', '2021-08-02 13:58:37'),
(2, 'Nigeria exits maritime organisation over electoral irregularities', 'Orjiekwe explained that this followed disregard for the rules of procedure regarding the eligibility of candidates nominated for the position of the organisation’s Secretary-General.\r\n\r\nHe added that the decision was reached at the 8th Bureau of Ministers and 15th General Assembly of MOWCA held in Kinshasa, Democratic Republic of Congo.\r\n\r\nAccording to him, Nigeria’s delegation expressed sadness at the outcome of the meeting, given Nigeria’s ardent and consistent support for MOWCA and its activities over the years.\r\n\r\n“Nigeria as a nation must take a stand against the promotion of illegality, disrespect for the rule of law and contravention of the rules regarding election of the Secretary-General of MOWCA.\r\n\r\n“Nigeria draws the attention of the General Assembly to the comment of MOWCA as presented by MOWCA secretariat in the annotated agenda circulated this week to the Committee of Experts’ meeting.\r\n\r\n“It confirmed that Nigeria is the only country that met the age eligibility criteria requirement that candidates must not exceed 55 years.\r\n\r\n“The candidate nominated by Nigeria was 55 years as at when nominations closed in 2020, while the candidates of Guinea was 60 years old and that of Benin was 62 years old.\r\n\r\n“By this, the Nigerian candidate and Director, Maritime Services, Federal Ministry of Transportation, Dr Paul Adalikwu was the only eligible candidate and should have been declared unopposed,’’ he said.\r\n\r\nOrjiekwe frowned at the “apparent willingness’’ of some member states to consider for elections candidates, who knowingly contravened the age criteria by more than five years in the case of Guinea and seven years by Benin.\r\n\r\nHe noted that no member states had supported MOWCA as much as Nigeria as the records showed.\r\n\r\n“She (Nigeria) has contributed more than five million dollars in the past 10 years with the organisation not employing a single Nigerian.\"', 1, 4, 'approved', '2021-08-02 13:51:51', '2021-08-02 13:58:53'),
(3, '2,471 people dead as FRSC records 5,320 crashes in Nigeria in 6 months', 'Kazeem said that the recorded crashes and deaths occurred between January and June 2021, adding that the corps had not relented in its efforts at reducing carnage on the highways.\r\n\r\nHe said that the 5,320 RTCs that occurred in the country involved a total of 8,808 vehicles, adding that 2,471 people were killed.\r\n\r\nHe said that 15,882 people sustained various injuries, while 15,398 were rescued from the crashes without injuries.\r\n\r\nThis, he said, brought to 33,751 the total number of people involved in the RTCs nationwide between January and June.\r\n\r\nKazeem noted that in the period under review available statistics showed that in January alone the FRSC recorded a total of 923 RTCs across the country.\r\n\r\nZone RS1, comprising Kaduna, Kano, Katsina and Jigawa, according to him, had the highest crashes, with 148.\r\n\r\nHe said in February a total of 808 RTCs were recorded nationwide with the most crashes, 121, happening in Zone RS2, comprising Lagos and Ogun.\r\n\r\n“In March, the corps recorded 959 RTCs with most crashes, 140, also occurring in Zone RS2.\r\n\r\n“In April, 955 RTCs occurred nationwide, with Zone RS 4, comprising Plateau, Nasarawa and Benue States recording 128, the highest in any zone.\r\n\r\n“In the month of May, we recorded 936 crashes across the country, with a total of 158 occurred in RS 2 Lagos zone.\r\n\r\n“In June, a total of 739 RTCs were recorded across the country.\r\n\r\nThe FRSC spokesman said that the corps also arrested 261,005 offenders nationwide between January and June for committing 281,765 road traffic offences.\r\n\r\nHe noted that mobile courts, set up by the FRSC, tried thousands of traffic offenders within the first half of the year.\r\n\r\nHe said convicts were appropriately sanctioned by the courts.', 1, 1, 'approved', '2021-08-02 13:52:43', '2021-08-02 13:52:43'),
(4, 'DSS fails to produce 4 out of 12 detained Igboho’s aides in court', 'The four detainees, who were not in court, include Abdullateef Ademola Onaolapo, Uthman Opeyemi Adelabu, Oluwafemi Olakunle and Opeyemi Tajudeen.\r\n\r\nThose in court were Amudat Babatunde, aka Lady K; Tajudeen Erinloye, Diekola Ademola Jubril, Abidemi Shittu, Jamiu Noah Oyetunji, Ayobami Donald, Raji Kazeem and Bamidele Sunday.\r\n\r\nThe News Agency of Nigeria (NAN) reports that the motion moved by Olajengbesi, marked: FHC/ABJ/CS/647/2021, was dated July 7 and filed July 8.\r\n\r\nWhen the matter was called, the applicants lawyer informed that he had a motion on notice, seeking the order of the court to amend the processes already filed.\r\n\r\nHe said the amendment was to allow him regularise the processes to reflect all that was needed after he had been able to gain accesses to his clients at the DSS facility.\r\n\r\nThe DSS Counsel, I. Awo, did not object the application.\r\n\r\nEgwuatu, who granted the prayer, adjourned the matter until Aug. 4 for hearing of the substantive matter.\r\n\r\nMeanwhile, Olajengbesi called the attention of the court to the fact that the security outfit did not come to the court with all the detainees.\r\n\r\nHe urged Justice Egwuatu to mandate the DSS to produce all the 12 detainees in court in the next adjourned date.', 1, 3, 'approved', '2021-08-02 13:53:23', '2021-08-02 13:59:11'),
(5, 'What Buhari, FCT must know about the poor street lighting in Abuja [Maven Contributor\'s Opinion]', 'President Muhammadu Buhari, Minister Muhammad Bello and the Federal Capital Territory Administration (FCTA) must know that the deplorable street lighting in Abuja is one of the factors causing accidents and fueling insecurity.\r\n\r\nI cannot grasp why several roads and streets across the city where the seat of power is domiciled, are enveloped in darkness day in, day out.\r\n\r\nAs personally observed, the categories of lighting are in three parts: The functioning, the fluctuating, the non-operating. The second and third are becoming the norm despite huge budgetary allocations.\r\n\r\nLeadership is commitment, hard work, performance, not convoys, escorts, sirens.\r\n\r\nGo round the councils - Abaji, AMAC, Bwari, Gwagwalada, Kuje, Kwali - at night. Tour locations in Apo, Dawaki, Garki, Gudu, Jabi, Kubwa, Life Camp, Lugbe, Utako, Wuse, Wuye, Zuba among others to see how the people suffer from the incompetence of fellow countrymen.\r\n\r\nFor highways that used to be bright from dusk to dawn, the reverse is the case now. Check Nnamdi Azikwe expressway, Sani Abacha way, and so on.\r\n\r\nIt is agonising, to say the least. You cannot visit countries\' capital cities and not feel sorry for Nigeria. Leave out the United States and Europe, Asia and Middle East, I\'m talking about Africa.\r\n\r\nThe happenings in the world\'s most populous black nation no longer surprise one. We are in a country where certain civil/public (supposed) servants enter office on the grounds of nomination/recommendation, not on the strength of brilliance/capability.\r\n\r\nThe jokes in this part of the world are innumerable, like exporting electricity even when millions live in darkness.\r\n\r\nI believe in the school of thought that Nigeria, the richest on the continent, ought to be a developed nation if it had more selfless individuals in positions of authority. Most are/were not leaders, they are/were mere elected and appointed officials. Oh and of course, those who attained control through the barrel of the gun.\r\n\r\nThe FCTA is the ministry that administers the republic\'s capital and I must stress unequivocally that its effort on public lighting is below par. Are Nigerians expected to protest over everything? The government infuriates while counselling that we remain patriotic. Why encourage the electorates to be nationalists when basic services aren\'t largely available?\r\n\r\nThe FCTA is giving the impression that it exists only for demolition, land allocation and road construction.\r\n\r\nThey can\'t even finish the works at Apo roundabout, Games Village-Area One intersection, Galadimawa, etc. These projects started years ago. Let\'s assume COVID-19 and economic downturn slowed down execution, did they affect lighting too?\r\n\r\nWho are the persons responsible for keeping roads and streets well-lit? Who are the ones tasked to confirm traffic lights function round-the-clock? Relevant directors and supervisors should be on the field more than in air-conditioned offices. Why are they not being probed for failing at their jobs? Why are heads not rolling for glaring neglect?\r\n\r\nThe current situation dents FCTA\'s image, there is no gentler way to put it. The management must diligently discharge its duties. It is unacceptable for the government to continually disregard the citizenry. The words on the lips of residents are that only highbrow areas in Abuja enjoy top quality service.\r\n\r\nGranted that places such as Asokoro, Guzape, Maitama and the likes are entitled to preferential treatment perhaps due to high tax remittances and occupation by \'big men\', the rest should not be overlooked.\r\n\r\nThe government must provide basic structures and facilities for all; the provisions must not be selective. This is common sense, this is the beauty of public administration.\r\n\r\nI appeal to President Buhari, Minister Bello, and the FCTA to replicate what they see abroad; Nigerians want to see change (the same APC mantra) in the coming weeks.\r\n\r\nBut if the authorities fail to prove that we are paramount, I leave them to their consciences and pray that government of the people, by the people, for the people, shall not perish from the earth. Many thanks to Abraham Lincoln.', 1, 1, 'approved', '2021-08-02 13:54:16', '2021-08-02 13:54:16'),
(6, 'Security agent accidentally shoots Ebubeagu personnel at APC congress in Ebonyi', 'The Commissioner of Police in the state, CP Aliyu Garba, told the News Agency of Nigeria (NAN) on Sunday that investigations had commenced on the incident.\r\n\r\n“We are still investigating the incident and we will brief the press at the end of the investigation,” he said.\r\n\r\nOther sources, however, gave NAN different versions of the incident, which made residents of the area scamper for safety.\r\n\r\nOne of the sources said that the Ebubeagu personnel was shot during an exchange of gunfire with some unknown gunmen who attempted to snatch the ward congress voting materials.\r\n\r\n“The Ebubeagu personnel, with the assistance of security agencies, engaged the unknown gunmen who later fled the scene, having being overpowered.\r\n\r\n“The personnel was hit during the crossfire, while efforts to revive him at the Alex-Ekwueme Federal Teaching Hospital Abakaliki yielded no result,” the source narrated.\r\n\r\nAnother source, however, said it was during the exchange of fire that a personnel of one of the security agencies accidentally shot the Ebubeagu operative.', 1, 3, 'approved', '2021-08-02 13:55:53', '2021-08-02 13:59:37'),
(7, 'COVID-19: NCDC announces 407 new infections in Nigeria', 'The new infections indicate a decrease from the 497 cases announced a day earlier.\r\n\r\nThe public health agency stated that the new figure raised the total confirmed infections in the country to 174,315 as of Aug. 1, 2021.\r\n\r\nThe NCDC said no new death was recorded on Sunday, thus the total fatalities remained 2,149.\r\n\r\nIt added that the 407 new cases were reported from Lagos-160, Akwa Ibom-75, Ondo-51, Abia-33, Oyo-29, Kaduna-18, Katsina-7 and Gombe-6.\r\n\r\nOthers are; Ogun-6, Ekiti-5, Delta-4, FCT-4, Ebonyi-3, Edo-2, Niger-2, while Bayelsa and Nasarawa recorded one case each.\r\n\r\nAccording to it, the figures include zero cases reported from Kano, Osun, Plateau, Rivers, and Sokoto states.\r\n\r\nThe NCDC said that 11 people recovered and were discharged from various isolation centres in the country on Sunday.\r\n\r\nThe agency noted that till date, 165,005 recoveries were recorded nationwide, while a multi-sectoral national emergency operations centre (EOC), activated at Level 2, continued to coordinate national response activities.\r\n\r\nThe agency noted that the country’s active cases stood at 7,151, as 2.4 million people were tested.\r\n\r\nThe centre stated that the increase in the number of COVID-19 cases in the country could be attributed to non-adherence to preventive measures by Nigerians.\r\n\r\n“Do your part to prevent further spread of the disease. TakeResponsibility,” it advised.', 1, 2, 'approved', '2021-08-02 13:57:53', '2021-08-02 13:57:53'),
(8, 'Lagos govt demolishes shanties on Lekki coastal road', 'Chairman of the State Environmental and Special Offences Unit (Task Force), CSP Shola Jejeloye, confirmed the demolition in a statement issued by Head, Public Affairs of the unit, Mr Femi Moliki, on Sunday in Lagos.\r\n\r\nAccording to Jejeloye, the task force is prepared to monitor and prevent future encroachments and illegal occupation of any part of Lekki coastal road.\r\n\r\nThe chairman said that the exercise was carried out to give way for the construction of the coastal road, linking Lekki to the Free Trade Zone.\r\n\r\nThe road, he said, would also serve as an alternative route to Lekki–Epe expressway, to enhance free flow of traffic on the corridor.\r\n\r\n”We have enlightened the occupants on the strategic nature of the road where they had built their shanties.\"\r\n\r\n\"Immediately it was cleared in 2019, they mobilised themselves and extended their occupation of the road.\"\r\n\r\n”They have turned it into hideouts for criminals. They sell drugs, some of which were seized during our assessment of the area, while traffic robbers and other dangerous criminals also dwell here.\r\n\r\n”These cannot be allowed to thrive in Lekki. The essence of the demolition is to monitor the place and safeguard it so that criminals don’t return there again,’’ he said.\r\n\r\nJejeloye expressed the state government’s commitment to decongesting Lekki– Epe expressway, hence the need to open up the road for residents and other law-abiding people to use.\r\n\r\nNAN reports that the state government had, on July 26, announced the identification of illegal structures and abandoned vehicles on Lekki/Ajah coastal road.\r\n\r\nIt noted that the illegal structures and abandoned vehicles were serving as hideouts for robbers operating in traffic.\r\n\r\nGovernment had also given owners of such illegal structures and abandoned vehicles in the area three days, starting from July 26, to remove them.', 1, 5, 'approved', '2021-08-02 14:00:48', '2021-08-02 14:00:48');

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `post_id` int(11) NOT NULL,
  `tags_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `tagname` varchar(100) NOT NULL,
  `user_id` int(50) NOT NULL,
  `post_id` int(50) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tagname`, `user_id`, `post_id`, `created`, `modified`) VALUES
(1, 'africa', 1, 1, '2021-08-01 21:16:12', '2021-08-01 21:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('regular','publisher','admin','','') NOT NULL DEFAULT 'admin',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created`, `modified`) VALUES
(1, 'Kemmer Sachiel', 'sachiel.kemmer@gmail.com', '$2y$10$2N57OhwlRMD8a4yPsDzpAO8EtAqeUboLvK0/RDzLriSxRTG25p5rC', 'admin', '2021-08-01 20:27:46', '2021-08-01 20:27:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_comment_key` (`user_id`),
  ADD KEY `post_key` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_key` (`user_id`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`post_id`,`tags_id`),
  ADD KEY `tags_key` (`tags_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_tags_key` (`user_id`),
  ADD KEY `post_tags_key` (`post_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `post_key` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `user_comment_key` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `user_key` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD CONSTRAINT `posts_key` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `tags_key` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `post_tags_key` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `user_tags_key` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
