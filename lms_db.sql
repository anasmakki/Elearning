-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2022 at 07:19 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms_db`
--

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_pass`) VALUES
(1, 'admin@gmail.com', 'admin');

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_desc`, `course_author`, `course_duration`, `course_original_price`, `course_price`, `course_img`) VALUES
(1, 'Front End Web Development', 'It only Includes HTML, CSS, Javascript, BOotstrap', 'Anas Makki', '3 Months', '4333', '3322', '../images/courseimages/frontend.png'),
(2, 'Back End Developement', 'In this course you will learn about php, python , laravel etc', 'Jamil Sultan', '5 Months', '5443', '3332', '../images/courseimages/backend.jpg'),
(3, 'Wordpress ', 'This course all about Wordpress Customization and theme development', 'Sharjeel Ahmad', '4 Months', '120', '98', '../images/courseimages/wordpress.jpg'),
(4, 'Machine Learning', 'In this course You will learn basics of machine learning', 'Mr Abrar', '1 Year', '4000', '3400', '../images/courseimages/ML.jpeg');

--
-- Dumping data for table `courseorder`
--

INSERT INTO `courseorder` (`co_id`, `order_id`, `stu_email`, `course_id`, `status`, `respmsg`, `amount`, `order_date`) VALUES
(1, 0, 'sana@gmail.com', 1, 'TRUE', 'Paid Successfully', '3322', '2022-03-21'),
(2, 0, 'anas@gmail.com', 3, 'TRUE', 'Paid Successfully', '98', '2022-03-21'),
(3, 0, 'anas@gmail.com', 4, 'TRUE', 'Paid Successfully', '3400', '2022-03-21');

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `f_content`, `stu_id`) VALUES
(1, 'This is very helpful Platform. I recommend all of you!', 2),
(2, 'Awesome Platform! I like it very much.', 1);

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `lesson_name`, `lesson_desc`, `lesson_link`, `course_id`, `course_name`) VALUES
(1, 'Intro to HTML', 'In this tutorial We will learn about html', '../lessonvid/', 1, 'Front End Web Development');

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `stu_name`, `stu_email`, `stu_pass`, `stu_occ`, `stu_img`) VALUES
(1, 'Anas Makki', 'anas@gmail.com', 'password', 'Student', '../images/studentimages/FILE129.JPG'),
(2, 'Sana Tehreem', 'sana@gmail.com', 'password', 'Businessman', '../images/studentimages/download.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
