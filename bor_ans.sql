-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 21-06-27 09:11
-- 서버 버전: 10.4.19-MariaDB
-- PHP 버전: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `test`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `bor_ans`
--

CREATE TABLE `bor_ans` (
  `BOR_ans_idx` int(11) NOT NULL COMMENT '고유번호',
  `BOR_ans_comm_num` int(11) NOT NULL COMMENT '답글 대상글 번호',
  `BOR_ans_con` text CHARACTER SET utf8 NOT NULL COMMENT '답글 내용',
  `BOR_ans_reg` varchar(15) NOT NULL COMMENT '답글 등록일'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `bor_ans`
--
ALTER TABLE `bor_ans`
  ADD PRIMARY KEY (`BOR_ans_idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `bor_ans`
--
ALTER TABLE `bor_ans`
  MODIFY `BOR_ans_idx` int(11) NOT NULL AUTO_INCREMENT COMMENT '고유번호';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
