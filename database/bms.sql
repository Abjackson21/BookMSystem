

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";



CREATE TABLE IF NOT EXISTS `admin` (
  `a_id` int(4) NOT NULL AUTO_INCREMENT,
  `a_unm` varchar(30) NOT NULL,
  `a_pwd` varchar(30) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;



INSERT INTO `admin` (`a_id`, `a_unm`, `a_pwd`) VALUES
(1, 'Admin', 'admin1234');



CREATE TABLE IF NOT EXISTS `book` (
  `b_id` int(10) NOT NULL AUTO_INCREMENT,
  `b_nm` varchar(50) NOT NULL,
  `b_desc` longtext NOT NULL,
  `b_price` int(4) NOT NULL,
  `b_img` varchar(50) NOT NULL,
  `b_time` int(20) NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;



INSERT INTO `book` (`b_id`, `b_nm`, `b_desc`, `b_price`, `b_img`, `b_time`) VALUES
(15, 'Octavia Spencer - Detective',  'This is Detective Book About Ninja', 7, 'book_img/d.jpg', 1673827200),
(16, 'Percy jackson',  'Greek mythology exist in modern time        ', 5, 'book_img/percy.jpg', 1673827200),
(18, 'A Dictionary of Architecture',  'Containing over 5,000 entries from Aalto to ziggurat, this is the most comprehensive and up-to-date dictionary of architecture in paperback. Beautifully illustrated and written in a clear and concise style, it is an invaluable work of reference for both students of architecture and the general reader, as well as professional architects. Covers all periods of Western architectural history, from ancient times to the present day Concise biographies of leading architects, from Brunelleschi and Imhotep to Le Corbusier and Richard Rogers Over 250 illustrations specially drawn for this volume                   ', 30, 'book_img/ARC9.jpg', 1673827200),
(19, 'CAT Book', 'Book about Competitive Exam CAT.\r\nIn CAT Collegians are Eligible for Give Exam.', 14, 'book_img/CAT.jpg', 1673827200),
(20, 'Visual Basic 2005', 'VB.Net Connectivity.', 25, 'book_img/comp8.jpg',1673827200),
(21, 'HTML for World Wide Web', 'HTML uses tags,it''s not case sensitive,work with own html tags which must be enclosed.           ', 15, 'book_img/0201354934.jpg', 1554090473),
(22, 'A TEXTBOOK OF COST AND MANAGEMENT ACCOUNTING ',  'Student friendly and examination oriented approach # Innovative, comprehensive and systematic presentation of the subject matter # Use of diagrams and exhibits to help students understand concepts easily and clearly # Around 500 solved problems and illustrations with working notes # Solved and unsolved practical questions from various university and professional examinations like BCom, MCom, CA, CS, ICWA, etc. # Objective type questions and select theory questions # Ideal for self study.                                ', 25, 'book_img/busi7.jpg', 1673827200),
(23, 'Spider Man',  'Peter Parker gets bit by a radioactive spider, gets spider like power and calls himself spiderman                                            ', 10, 'book_img/comic1.jpg', 1673827200),
(24, 'The Mad, Mad World of Cricket',  'The funny side of the gentleman?s game', 10, 'book_img/c1.jpg', 1673827200),
(26, 'BILL DAVE MANAGEMENT',  'This book is about management by Bill Dave', 5, 'book_img/MANAGEMENT2.jpg', 1673827200);



CREATE TABLE IF NOT EXISTS `contact` (
  `c_id` int(4) NOT NULL AUTO_INCREMENT,
  `c_fnm` varchar(100) NOT NULL,
  `c_mno` int(10) NOT NULL,
  `c_email` varchar(60) NOT NULL,
  `c_msg` longtext NOT NULL,
  `c_time` varchar(20) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

INSERT INTO `contact` (`c_id`, `c_fnm`, `c_mno`, `c_email`, `c_msg`, `c_time`) VALUES
(1, 'John Smith', 9876543211, 'johnsmith@example.com', 'Question about your books.', 1673827200),
(2, 'Jane Doe', 1234567891, 'janedoe@example.com', 'Inquiry about book availability.', 1673827200),
(3, 'Michael Johnson', 9876543212, 'michaelj@example.com', 'Feedback on your service.', 1673827200),
(4, 'Emily Davis', 1234567892, 'emilydavis@example.com', 'Issue with my order.', 1673827200),
(5, 'David Wilson', 9876543213, 'davidwilson@example.com', 'Book recommendation request.', 1673827200),
(6, 'Olivia Thompson', 1234567893, 'oliviathompson@example.com', 'General inquiry.', 1673827200),
(7, 'Daniel Anderson', 9876543214, 'danielanderson@example.com', 'Question about shipping.', 1673827200),
(8, 'Sophia Martinez', 1234567894, 'sophiamartinez@example.com', 'Problem with my account.', 1673827200),
(9, 'Matthew Taylor', 9876543215, 'matthewtaylor@example.com', 'Feedback on your website.', 1673827200),
(10, 'Ava Brown', 1234567895, 'avabrown@example.com', 'Inquiry about book recommendations.', 1673827200),
(11, 'Ethan Martinez', 9876543216, 'ethanmartinez@example.com', 'Question about returns.', 1673827200),
(12, 'Isabella Anderson', 1234567896, 'isabellaanderson@example.com', 'Request for assistance.', 1673827200),
(13, 'Alexander Johnson', 9876543217, 'alexanderj@example.com', 'Feedback on your customer service.', 1673827200);






CREATE TABLE IF NOT EXISTS `order` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_name` varchar(30) NOT NULL,
  `o_address` varchar(200) NOT NULL,
  `o_pincode` int(20) NOT NULL,
  `o_city` varchar(30) NOT NULL,
  `o_state` varchar(30) NOT NULL,
  `o_mobile` int(20) NOT NULL,
  `o_rid` int(8) NOT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`o_id`, `o_name`, `o_address`, `o_pincode`, `o_city`, `o_state`, `o_mobile`, `o_rid`) VALUES
(39, 'Sakif Hossain', 'Johor Bahru', 81300, 'Skudai', 'Johor', 0183917551, 1);



CREATE TABLE IF NOT EXISTS `register` (
  `r_id` int(8) NOT NULL AUTO_INCREMENT,
  `r_fnm` varchar(100) NOT NULL,
  `r_unm` varchar(50) NOT NULL,
  `r_pwd` varchar(30) NOT NULL,
  `r_cno` varchar(10) NOT NULL,
  `r_email` varchar(60) NOT NULL,
  `r_question` varchar(100) NOT NULL,
  `r_answer` varchar(50) NOT NULL,
  `r_time` varchar(20) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;


INSERT INTO `register` (`r_id`, `r_fnm`, `r_unm`, `r_pwd`, `r_cno`, `r_email`, `r_question`, `r_answer`, `r_time`) VALUES
(1, 'John Smith', 'johnsmith', 'john123', '9876543211', 'johnsmith@example.com', 'What is your favorite book?', 'To Kill a Mockingbird', 1673827200),
(2, 'Jane Doe', 'janedoe', 'jane123', '1234567891', 'janedoe@example.com', 'What is your favorite color?', 'Green', 1673827200),
(3, 'Michael Johnson', 'michaelj', 'michael123', '9876543212', 'michaelj@example.com', 'What is your pet\'s name?', 'Buddy', 1673827200),
(4, 'Emily Davis', 'emilydavis', 'emily123', '1234567892', 'emilydavis@example.com', 'What is your favorite food?', 'Pizza', 1673827200),
(5, 'David Wilson', 'davidwilson', 'david123', '9876543213', 'davidwilson@example.com', 'What is your favorite movie?', 'The Shawshank Redemption', 1673827200),
(6, 'Olivia Thompson', 'oliviathompson', 'olivia123', '1234567893', 'oliviathompson@example.com', 'What is your favorite animal?', 'Dolphin', 1673827200),
(7, 'Daniel Anderson', 'danielanderson', 'daniel123', '9876543214', 'danielanderson@example.com', 'What is your favorite sport?', 'Football', 1673827200),
(8, 'Sophia Martinez', 'sophiamartinez', 'sophia123', '1234567894', 'sophiamartinez@example.com', 'What is your favorite hobby?', 'Painting', 1673827200),
(9, 'Matthew Taylor', 'matthewtaylor', 'matthew123', '9876543215', 'matthewtaylor@example.com', 'What is your favorite movie?', 'Inception', 1673827200),
(10, 'Ava Brown', 'avabrown', 'ava123', '1234567895', 'avabrown@example.com', 'What is your favorite book?', 'Pride and Prejudice', 1673827200),
(11, 'Ethan Martinez', 'ethanmartinez', 'ethan123', '9876543216', 'ethanmartinez@example.com', 'What is your favorite color?', 'Blue', 1673827200),
(12, 'Isabella Anderson', 'isabellaanderson', 'isabella123', '1234567896', 'isabellaanderson@example.com', 'What is your favorite food?', 'Sushi', 1673827200),
(13, 'Alexander Johnson', 'alexanderj', 'alexander123', '9876543217', 'alexanderj@example.com', 'What is your favorite animal?', 'Tiger', 1673827200);







