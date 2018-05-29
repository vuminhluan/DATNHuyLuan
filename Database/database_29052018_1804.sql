-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2018 at 01:04 PM
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

--
-- Dumping data for table `bai_viet`
--

INSERT INTO `bai_viet` (`ma_bai_viet`, `ma_nguoi_viet`, `ma_chu_bai_viet`, `noi_dung_bai_viet`, `binh_luan_bai_viet`, `hinh_anh_bai_viet`, `nop_tep`, `khao_sat_y_kien`, `ma_loai_bai_viet`, `thoi_gian_dang`, `thoi_gian_an_bai_viet`, `thoi_gian_sua`, `nguoi_sua`) VALUES
('TK00000001', 'N000000001', '', 'DAUTIEN', 1, 1, 1, 1, '1', '2018-05-10 00:00:00', '2018-05-11 00:00:00', '2018-05-25 00:00:00', 'N000000001');

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
-- Table structure for table `chuc_vu_cua_thanh_vien_trong_nhom`
--

CREATE TABLE `chuc_vu_cua_thanh_vien_trong_nhom` (
  `ma_nhom` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ma_tai_khoan` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ma_chuc_vu` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_them_chuc_vu` datetime NOT NULL,
  `thoi_gian_huy_bo_chuc_vu` datetime NOT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- Dumping data for table `gioi_tinh`
--

INSERT INTO `gioi_tinh` (`ma_gioi_tinh`, `ten_gioi_tinh`, `thoi_gian_tao`, `thoi_gian_sua`, `nguoi_tao`, `nguoi_sua`) VALUES
(1, 'Nam', '2018-05-19 08:04:00', '2018-05-19 08:04:00', 'TK00000001', 'TK00000001'),
(2, 'Nữ', '2018-05-19 08:05:00', '2018-05-19 08:05:00', 'TK00000001', 'TK00000001');

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
  `ngay_sinh` date DEFAULT NULL,
  `ma_gioi_tinh` int(1) DEFAULT NULL,
  `anh_dai_dien` varchar(350) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anh_bia` varchar(350) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gioi_thieu` varchar(150) CHARACTER SET utf32 COLLATE utf32_unicode_ci DEFAULT NULL,
  `ma_nghe_nghiep` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoi_gian_sua` datetime NOT NULL,
  `nguoi_sua` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`ma_tai_khoan`, `ho_ten_lot`, `ten`, `ngay_sinh`, `ma_gioi_tinh`, `anh_dai_dien`, `anh_bia`, `gioi_thieu`, `ma_nghe_nghiep`, `thoi_gian_sua`, `nguoi_sua`) VALUES
('TK00000001', 'Vũ Minh', 'Luân', '1997-07-14', 1, 'default-avatar.jpg', 'default-banner.png', 'Tôi là Admin.\r\nHí Hí Hí', 'Admin', '2018-05-19 10:23:52', 'TK00000002'),
('TK00000002', 'Tôi Là', 'Ai', '2003-03-20', 1, 'default-avatar.jpg', 'default-banner.png', 'Tôi là ai và ai là tôi mặc kệ cứ bay nào ! Hihi Đồ ngốc', NULL, '2018-05-19 14:41:03', 'TK00000002'),
('TK00000003', 'Nguyễn Văn', 'Tèo', NULL, NULL, 'default-avatar.jpg', 'default-banner.png', NULL, NULL, '2018-05-17 22:19:54', 'TK00000003'),
('TK00000004', 'Phạm Văn', 'Ba', NULL, NULL, 'default-avatar.jpg', 'default-banner.png', NULL, NULL, '2018-05-17 22:22:28', 'TK00000004'),
('TK00000005', 'Vô Hiệu', 'Hóa', NULL, NULL, 'default-avatar.jpg', 'default-banner.png', NULL, NULL, '2018-05-18 23:54:14', 'TK00000005'),
('TK00000006', 'Hô Hô', 'Hô', '2018-05-13', 2, 'default-avatar.jpg', 'default-banner.png', 'Đã được kích hoạt Hí hí', NULL, '2018-05-19 15:24:12', 'TK00000006'),
('TK00000007', 'Sơn Tùng', 'MTP', '1998-05-24', 1, 'default-avatar.jpg', 'default-banner.png', '', NULL, '2018-05-24 23:20:19', 'TK00000007'),
('TK00000008', 'Người Dùng', 'Mẫu', NULL, NULL, 'default-avatar.jpg', 'default-banner.png', NULL, NULL, '2018-05-23 23:20:09', 'TK00000008'),
('TK00000009', 'Tài Khoản', 'Mới', NULL, NULL, 'default-avatar.jpg', '02afc70eca16d142111bb79639096b55.jpeg', NULL, NULL, '2018-05-26 23:03:17', 'TK00000009'),
('TK00000010', 'Test Mail', 'MarkDown', NULL, NULL, 'default-avatar.jpg', 'default-banner.jpg', NULL, NULL, '2018-05-26 19:25:42', 'TK00000010'),
('TK00000011', 'Họ Và', 'Tên', NULL, NULL, 'default-avatar.jpg', 'default-banner.jpg', NULL, NULL, '2018-05-26 20:07:00', 'TK00000011');

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

--
-- Dumping data for table `nhom`
--

INSERT INTO `nhom` (`ma_nhom`, `ma_gia_nhap`, `ten_nhom`, `anh`, `ma_tai_khoan`, `ma_loai_nhom`, `gioi_thieu_nhom`, `thoi_gian_tao`, `thoi_gian_tham_gia`, `thoi_gian_het_han_tham_gia`, `thoi_gian_sua`, `nguoi_sua`, `trang_thai`) VALUES
('NH00000001', '0000', '0000', '0000', 'N000000001', '0000', '', '2018-05-25 00:00:00', '2018-05-25 00:00:00', '2018-05-25 00:00:00', '2018-05-25 00:00:00', 'N000000001', 1),
('NH00000002', '0000', 'MyGroup', 'no', 'TK00000009', 'LN01', 'Describe something', '2001-01-01 00:00:00', '2001-01-01 00:00:00', '2001-01-01 00:00:00', '2001-01-01 00:00:00', 'N000001', 1);

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

--
-- Dumping data for table `quyen`
--

INSERT INTO `quyen` (`ma_quyen`, `ten_quyen`, `thoi_gian_tao`, `thoi_gian_sua`, `nguoi_tao`, `nguoi_sua`) VALUES
('Q0001', 'Admin', '2018-05-16 07:15:00', '2018-05-16 07:15:00', 'TK00000001', 'TK00000001'),
('Q0002', 'Người dùng', '2018-05-16 07:20:00', '2018-05-16 07:20:00', 'TK00000001', 'TK00000001');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan_google`
--

CREATE TABLE `taikhoan_google` (
  `ma_tai_khoan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_taikhoan_google` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `ma_tai_khoan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ten_tai_khoan` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `so_dien_thoai` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quyen` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_tao` datetime NOT NULL,
  `thoi_gian_sua` datetime NOT NULL,
  `nguoi_sua` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tai_khoan`
--

INSERT INTO `tai_khoan` (`ma_tai_khoan`, `ten_tai_khoan`, `email`, `mat_khau`, `remember_token`, `so_dien_thoai`, `quyen`, `thoi_gian_tao`, `thoi_gian_sua`, `nguoi_sua`, `trang_thai`) VALUES
('TK00000001', 'vuminhluan', 'vuminhluan1407@gmail.com', '$2y$10$8klKqxaRMfUZOQa0XoU2muGkknShUkAprAMKXtWdZWrgEG/G9F2NS', 'sHiXeuP46nXVrBMoFuFKxmEpq8Gy6pd0i3tZshVqeCRQvXsVbwEfJsQ4ybva', NULL, 'Q0001', '2018-05-17 20:21:52', '2018-05-17 20:21:52', 'TK00000001', 2),
('TK00000002', 'nguoidung001', 'nguoidung001@gmail.com', '$2y$10$x5kyR.0y4LLYmfPLLzHbFuEfsMmyeUnuTTJ0EBl6E1gbTPa9ZP1oe', 'JKGJsAcaCovfR8rsxZPJJTsoODlGr43mafG05churCH5sojLzADjjCazqdJW', NULL, 'Q0002', '2018-05-17 20:23:06', '2018-05-17 20:23:06', 'TK00000002', 2),
('TK00000003', 'teo123', 'teo@gmail.com', '$2y$10$GeNFVqA3fYC1kw4vkW/W5eY4cpDFyJ85vh4an4Q.VcsQX6qBTfi.K', '4RfCtsKeC4J7h866oaOzON44BkL6REz1cwbxo7B5nwWO0b9fxcDEFM7DXsid', NULL, 'Q0002', '2018-05-17 22:19:54', '2018-05-17 22:19:54', 'TK00000003', 1),
('TK00000004', 'vanba123', 'ba@gmail.com', '$2y$10$Rp3dYGbYPIfmF1iKscQaX.IdeMfWvhe39UL9EZq17ZooF/RukUk3O', '3I5QVO0ue9O8QHqMYUfjjRdJL0GC4NdyEBCXEmUzYtJcfUlyttAWfYFW3ups', NULL, 'Q0002', '2018-05-17 22:22:28', '2018-05-17 22:22:28', 'TK00000004', 3),
('TK00000005', 'vohieuhoa', 'vuminhluantest4@gmail.com', '$2y$10$Cj2lgVSxe4AHGBVjyT9PSuH91XRIH8l7bG04M1Bn3ywPq7H/urM/K', 'OpOWdna32OwLB5zIOIV45B21vjiWPijHVMUyvvNjUHNU9z8Sr3aPtO8d2woH', NULL, 'Q0002', '2018-05-18 23:54:14', '2018-05-18 23:54:14', 'TK00000005', 2),
('TK00000006', 'taikhoan001', 'vuminhluantest3@gmail.com', '$2y$10$G6rXVyywXssH22pQbjvkzewEzyTjJxuA/YSyZygB.5FFgWHVVuqvG', 'ghN0nJbCQt9MMmQDAvjkuUpc70Sgq9LlZck2hwRYSUlsAeeuVOUHnF4VvrHL', NULL, 'Q0002', '2018-05-19 02:44:57', '2018-05-19 15:15:09', 'TK00000006', 2),
('TK00000007', 'taikhoan1408', 'vuminhluantest10@gmail.com', '$2y$10$kOxiyLoK2ettqaNBb97zqOMZ8t61jYIic79Jt8qJFUd24WcO3Wru6', '3M9W7k5Qnzpu0oTQcLG7SBWXhQSlXjP5X4DiXuUtHToZ6qFzj1FTPuOTGuru', '0981770697', 'Q0002', '2018-05-19 15:40:33', '2018-05-24 23:23:13', 'TK00000007', 2),
('TK00000008', 'taikhoan000', 'vuminhluantest9@gmail.com', '$2y$10$yMcIUUjFdK2KdRnrTttF.ePqLesUNy6hR9Ieo.xcs0GA5B.YhiZ0e', 'FadXKKU5XwrS7pPKtcA5yORRla9qlU7jxd1h92FMP2raJsiF15w3zsZ6YUrj', '0981771111', 'Q0002', '2018-05-23 08:46:18', '2018-05-23 23:19:23', 'TK00000008', 2),
('TK00000009', 'taikhoan111', 'vuminhluantest1@gmail.com', '$2y$10$f9GrCGuq2ojuBuFPzggFc.mRuPfZ8G3pSbqjpw3yFSz4mbY0IkLKC', 'x4FEUF6c9kgBmadc0fXyCEvj4VvPC5OzdDyE2R0HgsvRbXTobpI578pWx42E', '0981770642', 'Q0002', '2018-05-26 08:52:19', '2018-05-26 19:16:29', 'TK00000009', 2),
('TK00000010', 'taikhoan222', 'vuminhluan97@gmail.com', '$2y$10$NORxDrHjvrlAa6KQnLTZh.tnDH7Gka0dVwAoAVLinAsn.FR1F40na', 'ZvTudezBg728MBRuGBBDoAdFInKn8SN7ZIUjWCG9U6JFr0B6yme5mjVxAcGR', NULL, 'Q0002', '2018-05-26 19:25:42', '2018-05-26 19:26:02', 'TK00000010', 2),
('TK00000011', 'yahoo123', 'vuminhluantest2@gmail.com', '$2y$10$9S6zqypc0/40G5T6QX8Bv.2K5QpO3dfxf//GgpWJQpW3IfYVWIZ2K', '98LiQYbN3TfghBMD5jsZJ17pTQMnWUCqxJkllNDdE4LpTD5VXvetwreIDJ8Y', NULL, 'Q0002', '2018-05-26 20:07:00', '2018-05-27 08:24:38', 'TK00000011', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoan_bi_chan`
--

CREATE TABLE `tai_khoan_bi_chan` (
  `ma_tai_khoan_bi_chan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ma_tai_khoan_chan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_chan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tai_khoan_bi_chan`
--

INSERT INTO `tai_khoan_bi_chan` (`ma_tai_khoan_bi_chan`, `ma_tai_khoan_chan`, `thoi_gian_chan`) VALUES
('TK00000005', 'TK00000009', '2018-05-27 09:46:49'),
('TK00000006', 'TK00000009', '2018-05-24 11:25:40');

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

--
-- Dumping data for table `thanh_vien_nhom`
--

INSERT INTO `thanh_vien_nhom` (`ma_nhom`, `ma_tai_khoan`, `ma_chuc_vu`, `thoi_gian_vao_nhom`, `thoi_gian_thoat_nhom`, `trang_thai`) VALUES
('NH00000002', 'TK00000009', 'CV01', '2001-01-01 00:00:00', '2001-01-01 00:00:00', 1);

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
-- Table structure for table `tinnhan_lienhe`
--

CREATE TABLE `tinnhan_lienhe` (
  `ma` int(11) NOT NULL,
  `ho_va_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tin_nhan` text COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_tao` datetime NOT NULL,
  `thoi_gian_sua` datetime NOT NULL,
  `nguoi_sua` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trang_thai` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tinnhan_lienhe`
--

INSERT INTO `tinnhan_lienhe` (`ma`, `ho_va_ten`, `email`, `tin_nhan`, `thoi_gian_tao`, `thoi_gian_sua`, `nguoi_sua`, `trang_thai`) VALUES
(1, 'Người Dùng Thử', 'vuminhluantest1@gmail.com', 'Đây là tin nhắn đầu tiên <3', '2018-05-26 21:06:21', '2018-05-26 21:06:21', NULL, 1),
(2, 'Họ Và Tên', 'hovaten@gmail.com', 'Đây là tin nhắn liên hệ thứ 2 ....', '2018-05-26 21:36:09', '2018-05-26 21:36:09', NULL, 1),
(3, 'Tên Và Họ', 'hovaten@gmail.com', 'Đây là tin nhắn thứ 3.', '2018-05-26 21:37:22', '2018-05-26 21:37:22', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_tai_khoan`
--

CREATE TABLE `trang_thai_tai_khoan` (
  `ma_trang_thai` int(3) NOT NULL,
  `ten_trang_thai` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_tao` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_tao` datetime NOT NULL,
  `nguoi_sua` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `thoi_gian_sua` datetime NOT NULL,
  `trang_thai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trang_thai_tai_khoan`
--

INSERT INTO `trang_thai_tai_khoan` (`ma_trang_thai`, `ten_trang_thai`, `nguoi_tao`, `thoi_gian_tao`, `nguoi_sua`, `thoi_gian_sua`, `trang_thai`) VALUES
(1, 'Chưa kích hoạt', 'TK00000001', '2018-05-16 08:02:00', 'TK00000001', '2018-05-16 08:02:00', 1),
(2, 'Đang hoạt động', 'TK00000001', '2018-05-16 07:58:00', 'TK00000001', '2018-05-16 07:58:00', 1),
(3, 'Khóa', 'TK00000001', '2018-05-16 07:59:00', 'TK00000001', '2018-05-16 07:59:00', 1),
(4, 'Vô hiệu hóa', 'TK00000001', '2018-05-16 08:00:00', 'TK00000001', '2018-05-16 08:00:00', 1),
(5, 'Vi phạm', 'TK00000001', '2018-05-17 00:00:00', 'TK00000001', '2018-05-17 00:00:00', 1);

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
-- Indexes for table `taikhoan_google`
--
ALTER TABLE `taikhoan_google`
  ADD PRIMARY KEY (`ma_taikhoan_google`);

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
-- Indexes for table `tinnhan_lienhe`
--
ALTER TABLE `tinnhan_lienhe`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `trang_thai_tai_khoan`
--
ALTER TABLE `trang_thai_tai_khoan`
  ADD PRIMARY KEY (`ma_trang_thai`);

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

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tinnhan_lienhe`
--
ALTER TABLE `tinnhan_lienhe`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
