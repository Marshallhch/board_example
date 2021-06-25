-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 21-06-19 07:40
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
-- 테이블 구조 `bor_mem`
--

CREATE TABLE `bor_mem` (
  `BOR_mem_idx` int(11) NOT NULL COMMENT '고유번호',
  `BOR_mem_id` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT '회원 아이디',
  `BOR_mem_name` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT '회원 이름',
  `BOR_mem_email` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '회원 이메일',
  `BOR_mem_pf` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '프로필 사진',
  `BOR_mem_pass` varchar(80) CHARACTER SET utf8 NOT NULL COMMENT '회원 비밀번호',
  `BOR_mem_job` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT '회원 직업',
  `BOR_mem_regi_day` varchar(30) CHARACTER SET utf8mb4 NOT NULL COMMENT '가입일'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `bor_mem`
--
ALTER TABLE `bor_mem`
  ADD PRIMARY KEY (`BOR_mem_idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `bor_mem`
--
ALTER TABLE `bor_mem`
  MODIFY `BOR_mem_idx` int(11) NOT NULL AUTO_INCREMENT COMMENT '고유번호';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
