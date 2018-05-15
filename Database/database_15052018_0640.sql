-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2018 at 01:38 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `0306151249_0306151264`
--

-- --------------------------------------------------------

--
-- Table structure for table `bai_viet`
--

CREATE TABLE `bai_viet` (
  `ma_bai_viet` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_nguoi_viet` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_chu_bai_viet` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung_bai_viet` text COLLATE utf8_unicode_ci NOT NULL,
  `binh_luan_bai_viet` tinyint(1) NOT NULL,
  `hinh_anh_bai_viet` tinyint(1) NOT NULL,
  `nop_tep` tinyint(1) NOT NULL,
  `khao_sat_y_kien` tinyint(1) NOT NULL,
  `ma_loai_bai_viet` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_dang` datetime NOT NULL,
  `thoi_gian_an_bai_viet` datetime NOT NULL,
  `thoi_gian_sua` datetime NOT NULL,
  `nguoi_sua` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bai_viet_khao_sat`
--

CREATE TABLE `bai_viet_khao_sat` (
  `ma_bai_viet` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_bat_dau` datetime NOT NULL,
  `thoi_gian_ket_thuc` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bai_viet_nop_tep`
--

CREATE TABLE `bai_viet_nop_tep` (
  `ma_bai_viet` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_bat_dau` datetime NOT NULL,
  `thoi_gian_ket_thuc` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bao_cao`
--

CREATE TABLE `bao_cao` (
  `ma_bao_cao` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_bao_cao` datetime NOT NULL,
  `nguoi_bao_cao` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_ly_do_bao_cao` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `ma_loai_bao_cao` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Cho biết báo cáo cái gì (bc nhóm, hay acc, hay bình luận,...)',
  `ma_doi_tuong_vi_pham` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Cho biết chính xác đối tượng nào bị báo cáo',
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan_bai_viet`
--

CREATE TABLE `binh_luan_bai_viet` (
  `ma_binh_luan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_bai_viet` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_nguoi_binh_luan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung_binh_luan` text COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_tao` datetime NOT NULL,
  `thoi_gian_sua` datetime NOT NULL,
  `nguoi_sua` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan_cap_2`
--

CREATE TABLE `binh_luan_cap_2` (
  `ma_binh_luan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_binh_luan_cap_2` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_nguoi_binh_luan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung_binh_luan` text COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_tao` datetime NOT NULL,
  `thoi_gian_sua` datetime NOT NULL,
  `nguoi_sua` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cam_xuc`
--

CREATE TABLE `cam_xuc` (
  `ma_cam_xuc` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `ten_cam_xuc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_tao` datetime NOT NULL,
  `thoi_gian_sua` datetime NOT NULL,
  `nguoi_tao` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_sua` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cam_xuc_bai_viet`
--

CREATE TABLE `cam_xuc_bai_viet` (
  `ma_cam_xuc` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `ma_bai_viet` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_tai_khoan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `thoi_gian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cam_xuc_binh_luan`
--

CREATE TABLE `cam_xuc_binh_luan` (
  `ma_cam_xuc` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `ma_binh_luan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_tai_khoan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `thoi_gian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cau_hoi_gia_nhap_nhom`
--

CREATE TABLE `cau_hoi_gia_nhap_nhom` (
  `ma_cau_hoi` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_nhom` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung_cau_hoi` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_tao` datetime NOT NULL,
  `thoi_gian_sua` datetime NOT NULL,
  `nguoi_tao` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_sua` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chuc_vu_trong_nhom`
--

CREATE TABLE `chuc_vu_trong_nhom` (
  `ma_chuc_vu` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `ten_chuc_vu` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_tao` datetime NOT NULL,
  `thoi_gian_sua` datetime NOT NULL,
  `nguoi_tao` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_sua` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gioi_tinh`
--

CREATE TABLE `gioi_tinh` (
  `ma_gioi_tinh` int(1) NOT NULL,
  `ten_gioi_tinh` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_tao` datetime NOT NULL,
  `thoi_gian_sua` datetime NOT NULL,
  `nguoi_tao` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_sua` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hinh_anh_bai_viet`
--

CREATE TABLE `hinh_anh_bai_viet` (
  `ma_bai_viet` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_hinh_anh` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `duong_dan_anh` varchar(350) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lich_su_tim_kiem`
--

CREATE TABLE `lich_su_tim_kiem` (
  `ma_lich_su_tim_kiem` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_tai_khoan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung_tim_kiem` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian` datetime NOT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loai_bai_viet`
--

CREATE TABLE `loai_bai_viet` (
  `ma_loại_bai_viet` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `ten_loai_bai_viet` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_tao` datetime NOT NULL,
  `thoi_gian_sua` datetime NOT NULL,
  `nguoi_tao` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_xoa` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loai_bao_cao`
--

CREATE TABLE `loai_bao_cao` (
  `ma_loai_bao_cao` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `ten_loai_bao_cao` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '1 là acc, 2 là group, 2 là admin,...',
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loai_nhom`
--

CREATE TABLE `loai_nhom` (
  `ma_loai_nhom` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `ten_loai_nhom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_tao` datetime NOT NULL,
  `thoi_gian_sua` datetime NOT NULL,
  `nguoi_tao` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_sua` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loai_noi_nhan_bao_cao`
--

CREATE TABLE `loai_noi_nhan_bao_cao` (
  `ma_loai_noi_nhan` tinyint(1) NOT NULL,
  `ten_loai_noi_nhan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loai_thong_bao`
--

CREATE TABLE `loai_thong_bao` (
  `ma_loai_thong_bao` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `ten_loai_thong_bao` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `thoi_gian_tao` datetime NOT NULL,
  `thoi_gian_sua` datetime NOT NULL,
  `nguoi_tao` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_sua` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ly_do_bao_cao`
--

CREATE TABLE `ly_do_bao_cao` (
  `ma_ly_do` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_tao` datetime NOT NULL,
  `thoi_gian_sua` datetime NOT NULL,
  `nguoi_tao` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_sua` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nghe_nghiep`
--

CREATE TABLE `nghe_nghiep` (
  `ma_nghe_nghiep` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ten_nghe_nghiep` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_tao` datetime NOT NULL,
  `thoi_gian_sua` datetime NOT NULL,
  `nguoi_tao` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_sua` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_chon_y_kien`
--

CREATE TABLE `nguoi_chon_y_kien` (
  `ma_y_kien` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_tai_khoan_chon` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian` datetime NOT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `ma_tai_khoan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ho_ten_lot` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_sinh` date NOT NULL,
  `ma_gioi_tinh` int(1) NOT NULL,
  `anh_dai_dien` varchar(350) COLLATE utf8_unicode_ci NOT NULL,
  `anh_bia` varchar(350) COLLATE utf8_unicode_ci NOT NULL,
  `gioi_thieu` varchar(150) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `ma_nghe_nghiep` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_sua` datetime NOT NULL,
  `nguoi_sua` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhom`
--

CREATE TABLE `nhom` (
  `ma_nhom` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_gia_nhap` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ten_nhom` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `anh` varchar(350) COLLATE utf8_unicode_ci NOT NULL,
  `ma_tai_khoan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_loai_nhom` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `gioi_thieu_nhom` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_tao` datetime NOT NULL,
  `thoi_gian_tham_gia` datetime NOT NULL,
  `thoi_gian_het_han_tham_gia` datetime NOT NULL,
  `thoi_gian_sua` datetime NOT NULL,
  `nguoi_sua` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `noi_nhan_bao_cao`
--

CREATE TABLE `noi_nhan_bao_cao` (
  `ma_bao_cao` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_noi_nhan` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ma_loai_noi_nhan` tinyint(1) NOT NULL COMMENT '1 là tài khoản, 2 là nhóm, 3 là admin,...',
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE `quyen` (
  `ma_quyen` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `ten_quyen` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_tao` datetime NOT NULL,
  `thoi_gian_sua` datetime NOT NULL,
  `nguoi_tao` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_sua` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `ma_tai_khoan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ten_tai_khoan` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `quyen` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_tao` datetime NOT NULL,
  `thoi_gian_sua` datetime NOT NULL,
  `nguoi_sua` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoan_bi_chan`
--

CREATE TABLE `tai_khoan_bi_chan` (
  `ma_tai_khoan_bi_chan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_tai_khoan_chan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_chan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tep`
--

CREATE TABLE `tep` (
  `ma_tep` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ten_tep` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `duong_dan_tep` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_tao` datetime NOT NULL,
  `thoi_gian_sua` datetime NOT NULL,
  `nguoi_tao` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_sua` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tep_duoc_nop`
--

CREATE TABLE `tep_duoc_nop` (
  `ma_bai_viet` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_nguoi_nop` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_tep` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_nop` datetime NOT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thanh_vien_bi_cam_cua_nhom`
--

CREATE TABLE `thanh_vien_bi_cam_cua_nhom` (
  `ma_nhom` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_tai_khoan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_cam` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ly_do` int(11) NOT NULL,
  `thoi_gian_cam` datetime NOT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thanh_vien_cho_phe_duyet`
--

CREATE TABLE `thanh_vien_cho_phe_duyet` (
  `ma_nhom` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_tai_khoan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_moi` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_phe_duyet` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_cho_phe_duyet` datetime NOT NULL,
  `trang_thai` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thanh_vien_nhom`
--

CREATE TABLE `thanh_vien_nhom` (
  `ma_nhom` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_tai_khoan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_chuc_vu` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_vao_nhom` datetime NOT NULL,
  `thoi_gian_thoat_nhom` datetime NOT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thong_bao`
--

CREATE TABLE `thong_bao` (
  `ma_thong_bao` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_loai_thong_bao` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_tao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thong_bao_nguoi_dung`
--

CREATE TABLE `thong_bao_nguoi_dung` (
  `ma_thong_bao` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_nguoi_nhan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_bai_viet` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_binh_luan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung_thong_bao` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thong_bao_nhom`
--

CREATE TABLE `thong_bao_nhom` (
  `ma_thong_bao` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_nguoi_vao_nhom` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_nhom` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tra_loi_gia_nhap_nhom`
--

CREATE TABLE `tra_loi_gia_nhap_nhom` (
  `ma_cau_hoi` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_nguoi_tra_loi` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung_tra_loi` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_tra_loi` datetime NOT NULL,
  `thoi_gian_sua` datetime NOT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `y_kien_binh_chon_bai_viet`
--

CREATE TABLE `y_kien_binh_chon_bai_viet` (
  `ma_y_kien` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_bai_viet` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung_y_kien` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_tao_y_kien` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_tao` datetime NOT NULL,
  `thoi_gian_sua` datetime NOT NULL,
  `nguoi_sua` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bai_viet`
--
ALTER TABLE `bai_viet`
  ADD PRIMARY KEY (`ma_bai_viet`);

--
-- Indexes for table `bai_viet_khao_sat`
--
ALTER TABLE `bai_viet_khao_sat`
  ADD PRIMARY KEY (`ma_bai_viet`);

--
-- Indexes for table `bai_viet_nop_tep`
--
ALTER TABLE `bai_viet_nop_tep`
  ADD PRIMARY KEY (`ma_bai_viet`);

--
-- Indexes for table `bao_cao`
--
ALTER TABLE `bao_cao`
  ADD PRIMARY KEY (`ma_bao_cao`);

--
-- Indexes for table `binh_luan_bai_viet`
--
ALTER TABLE `binh_luan_bai_viet`
  ADD PRIMARY KEY (`ma_binh_luan`);

--
-- Indexes for table `binh_luan_cap_2`
--
ALTER TABLE `binh_luan_cap_2`
  ADD PRIMARY KEY (`ma_binh_luan_cap_2`);

--
-- Indexes for table `cam_xuc`
--
ALTER TABLE `cam_xuc`
  ADD PRIMARY KEY (`ma_cam_xuc`);

--
-- Indexes for table `cam_xuc_bai_viet`
--
ALTER TABLE `cam_xuc_bai_viet`
  ADD PRIMARY KEY (`ma_cam_xuc`,`ma_bai_viet`,`ma_tai_khoan`);

--
-- Indexes for table `cam_xuc_binh_luan`
--
ALTER TABLE `cam_xuc_binh_luan`
  ADD PRIMARY KEY (`ma_cam_xuc`,`ma_binh_luan`,`ma_tai_khoan`);

--
-- Indexes for table `cau_hoi_gia_nhap_nhom`
--
ALTER TABLE `cau_hoi_gia_nhap_nhom`
  ADD PRIMARY KEY (`ma_cau_hoi`,`ma_nhom`);

--
-- Indexes for table `chuc_vu_trong_nhom`
--
ALTER TABLE `chuc_vu_trong_nhom`
  ADD PRIMARY KEY (`ma_chuc_vu`);

--
-- Indexes for table `gioi_tinh`
--
ALTER TABLE `gioi_tinh`
  ADD PRIMARY KEY (`ma_gioi_tinh`);

--
-- Indexes for table `hinh_anh_bai_viet`
--
ALTER TABLE `hinh_anh_bai_viet`
  ADD PRIMARY KEY (`ma_hinh_anh`);

--
-- Indexes for table `lich_su_tim_kiem`
--
ALTER TABLE `lich_su_tim_kiem`
  ADD PRIMARY KEY (`ma_lich_su_tim_kiem`);

--
-- Indexes for table `loai_bai_viet`
--
ALTER TABLE `loai_bai_viet`
  ADD PRIMARY KEY (`ma_loại_bai_viet`);

--
-- Indexes for table `loai_bao_cao`
--
ALTER TABLE `loai_bao_cao`
  ADD PRIMARY KEY (`ma_loai_bao_cao`);

--
-- Indexes for table `loai_nhom`
--
ALTER TABLE `loai_nhom`
  ADD PRIMARY KEY (`ma_loai_nhom`);

--
-- Indexes for table `loai_noi_nhan_bao_cao`
--
ALTER TABLE `loai_noi_nhan_bao_cao`
  ADD PRIMARY KEY (`ma_loai_noi_nhan`);

--
-- Indexes for table `loai_thong_bao`
--
ALTER TABLE `loai_thong_bao`
  ADD PRIMARY KEY (`ma_loai_thong_bao`);

--
-- Indexes for table `ly_do_bao_cao`
--
ALTER TABLE `ly_do_bao_cao`
  ADD PRIMARY KEY (`ma_ly_do`);

--
-- Indexes for table `nghe_nghiep`
--
ALTER TABLE `nghe_nghiep`
  ADD PRIMARY KEY (`ma_nghe_nghiep`);

--
-- Indexes for table `nguoi_chon_y_kien`
--
ALTER TABLE `nguoi_chon_y_kien`
  ADD PRIMARY KEY (`ma_y_kien`);

--
-- Indexes for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`ma_tai_khoan`);

--
-- Indexes for table `nhom`
--
ALTER TABLE `nhom`
  ADD PRIMARY KEY (`ma_nhom`);

--
-- Indexes for table `noi_nhan_bao_cao`
--
ALTER TABLE `noi_nhan_bao_cao`
  ADD PRIMARY KEY (`ma_bao_cao`,`ma_noi_nhan`);

--
-- Indexes for table `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`ma_quyen`);

--
-- Indexes for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`ma_tai_khoan`);

--
-- Indexes for table `tai_khoan_bi_chan`
--
ALTER TABLE `tai_khoan_bi_chan`
  ADD PRIMARY KEY (`ma_tai_khoan_bi_chan`,`ma_tai_khoan_chan`);

--
-- Indexes for table `tep`
--
ALTER TABLE `tep`
  ADD PRIMARY KEY (`ma_tep`);

--
-- Indexes for table `tep_duoc_nop`
--
ALTER TABLE `tep_duoc_nop`
  ADD PRIMARY KEY (`ma_bai_viet`,`ma_nguoi_nop`,`ma_tep`);

--
-- Indexes for table `thanh_vien_bi_cam_cua_nhom`
--
ALTER TABLE `thanh_vien_bi_cam_cua_nhom`
  ADD PRIMARY KEY (`ma_nhom`,`ma_tai_khoan`);

--
-- Indexes for table `thanh_vien_cho_phe_duyet`
--
ALTER TABLE `thanh_vien_cho_phe_duyet`
  ADD PRIMARY KEY (`ma_nhom`,`ma_tai_khoan`,`thoi_gian_cho_phe_duyet`);

--
-- Indexes for table `thanh_vien_nhom`
--
ALTER TABLE `thanh_vien_nhom`
  ADD PRIMARY KEY (`ma_nhom`,`ma_tai_khoan`);

--
-- Indexes for table `thong_bao`
--
ALTER TABLE `thong_bao`
  ADD PRIMARY KEY (`ma_thong_bao`);

--
-- Indexes for table `thong_bao_nguoi_dung`
--
ALTER TABLE `thong_bao_nguoi_dung`
  ADD PRIMARY KEY (`ma_thong_bao`);

--
-- Indexes for table `thong_bao_nhom`
--
ALTER TABLE `thong_bao_nhom`
  ADD PRIMARY KEY (`ma_thong_bao`);

--
-- Indexes for table `tra_loi_gia_nhap_nhom`
--
ALTER TABLE `tra_loi_gia_nhap_nhom`
  ADD PRIMARY KEY (`ma_cau_hoi`,`ma_nguoi_tra_loi`);

--
-- Indexes for table `y_kien_binh_chon_bai_viet`
--
ALTER TABLE `y_kien_binh_chon_bai_viet`
  ADD PRIMARY KEY (`ma_y_kien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
