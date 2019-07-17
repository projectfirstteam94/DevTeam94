-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 01, 2017 lúc 06:27 SA
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlybanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitiethoadon`
--

CREATE TABLE `tbl_chitiethoadon` (
  `Id` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Id_SanPham` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenSanPham` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KichCo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `ThanhTien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_chitiethoadon`
--

INSERT INTO `tbl_chitiethoadon` (`Id`, `Id_SanPham`, `TenSanPham`, `KichCo`, `SoLuong`, `ThanhTien`) VALUES
('HD00', 'SP10', 'Quần Thu Nữ', 'M', 3, 495000),
('HD00', 'SP13', 'Quần Bò Nữ Mỹ', 'M', 1, 180000),
('HD01', 'SP01', 'Áo Phong Nam Đẹp', 'M', 2, 170000),
('HD01', 'SP02', 'Áo Phong Nam Hàn', 'XL', 2, 20000),
('HD02', 'SP06', 'Quần Thun Nam', 'M', 3, 375000),
('HD03', 'SP12', 'Sơ Mi Nữ Hàn Quốc', 'L', 2, 360000),
('HD04', 'SP10', 'Quần Thu Nữ', 'M', 2, 330000),
('HD05', 'SP19', 'Sơ Mi Nam Hàn Quốc', 'S', 1, 220000),
('HD06', 'SP17', 'Sơ Mi Nữ ', 'S', 2, 500000),
('HD07', '', '', '', 0, 0),
('HD09', 'SP04', 'Quần Bò Nam Nhập Từ Mỹ', 'X', 1, 350000),
('HD09', 'SP08', 'Sơ Mi Nam Hàng Việt Nam', 'L', 3, 600000),
('HD09', 'SP08', 'Sơ Mi Nam Hàng Việt Nam', 'M', 2, 400000),
('HD10', 'SP17', 'Sơ Mi Nữ ', 'M', 1, 250000),
('HD10', 'SP17', 'Sơ Mi Nữ ', 'L', 2, 500000),
('HD10', 'SP18', 'Sơ Mi Nữ', 'M', 3, 720000),
('HD10', 'SP18', 'Sơ Mi Nữ', 'L', 2, 480000),
('HD11', 'SP18', 'Sơ Mi Nữ', 'X', 2, 480000),
('HD11', 'SP18', 'Sơ Mi Nữ', 'L', 2, 480000),
('HD11', 'SP18', 'Sơ Mi Nữ', 'XL', 2, 480000),
('HD12', 'SP02', 'Áo Phong Nam Hàn', 'M', 1, 10000),
('HD12', 'SP07', 'Quần Thu Nam Hàn Quốc', 'X', 2, 300000),
('HD12', 'SP11', 'Sơ Mi Nam Hàn Quốc', 'L', 2, 700000),
('HD13', 'SP02', 'Áo Phong Nam Hàn', 'X', 5, 50000),
('HD13', 'SP02', 'Áo Phong Nam Hàn', 'L', 3, 30000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmucsanpham`
--

CREATE TABLE `tbl_danhmucsanpham` (
  `Id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Comment` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmucsanpham`
--

INSERT INTO `tbl_danhmucsanpham` (`Id`, `Name`, `Comment`) VALUES
('thoitrangnam', 'Thoi Trang Nam', 'Danh muc nay de lua tat ca cac loai san pham thuoc danh muc thoi trang nam'),
('thoitrangnu', 'Thoi Trang Nu', 'Danh muc nay de lua tat ca cac loai san pham thuoc danh muc thoi trang nu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_doanhthu`
--

CREATE TABLE `tbl_doanhthu` (
  `Ngay` date NOT NULL,
  `TongHoaDon` int(11) NOT NULL,
  `TongTien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giamgia`
--

CREATE TABLE `tbl_giamgia` (
  `Id` int(11) NOT NULL,
  `Id_SanPham` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GiaGoc` double NOT NULL,
  `GiamBaoNhieu` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hoadon`
--

CREATE TABLE `tbl_hoadon` (
  `Id` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Id_KhacHang` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgayLap` date NOT NULL,
  `ThanhTien` double NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `TrangThai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_hoadon`
--

INSERT INTO `tbl_hoadon` (`Id`, `Id_KhacHang`, `NgayLap`, `ThanhTien`, `SoLuong`, `TrangThai`) VALUES
('HD00', '0', '2017-06-07', 675000, 4, 1),
('HD01', '0', '2017-06-07', 190000, 4, 1),
('HD02', '0', '2017-06-07', 375000, 3, 1),
('HD03', 'KH1', '2017-06-07', 360000, 2, 1),
('HD04', 'KH1', '2017-06-07', 330000, 2, 1),
('HD05', 'KH1', '2017-06-07', 220000, 1, 1),
('HD06', 'KH11', '2017-06-07', 500000, 2, 1),
('HD07', 'KH12', '2017-06-07', 0, 0, 1),
('HD08', 'KH13', '2017-06-07', 1925000, 7, 1),
('HD09', 'KH14', '2017-06-07', 1350000, 6, 1),
('HD10', 'KH15', '2017-06-07', 1950000, 8, 1),
('HD11', 'KH17', '2017-06-07', 1440000, 6, 0),
('HD12', 'KH1', '2017-06-07', 1010000, 5, 0),
('HD13', 'KH18', '2017-06-08', 80000, 8, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khachang`
--

CREATE TABLE `tbl_khachang` (
  `Id` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Birthday` date DEFAULT NULL,
  `Sex` int(1) DEFAULT NULL,
  `Phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_khachang`
--

INSERT INTO `tbl_khachang` (`Id`, `Name`, `Birthday`, `Sex`, `Phone`, `Email`, `Address`) VALUES
('0', 'Phan Đình Lai', '1994-08-19', 1, '0966782524', 'phandinhlai94@gmail.com', 'Hoa Thành,Yên Thành,Nghệ An'),
('001', 'Tương', '0000-00-00', 1, 'phandinhlai', 'phandinhlai94@gmail.com', 'Nghệ An'),
('KH1', 'Phan Đình Tương', '1992-08-20', 1, '0123456789', 'phandinhtuong92@gmail.com', 'Nghệ An'),
('KH10', 'Phan Thị Ánh', NULL, 0, '0966782524', 'phanthianh87@gmail.com', 'Thành Phố Hồ Chí Minh'),
('KH11', 'Phan Thị Ánh', NULL, 0, '0966782524', 'phanthianh87@gmail.com', 'Thành Phố Hồ Chí Minh'),
('KH12', 'Phan Đình Tương', NULL, 0, '01234567', 'phandinhtuong92@gmail.com', 'Vinh,Nghệ An'),
('KH13', 'Phan Đình Tương', NULL, 0, '0966782524', 'phandinhtuong92@gmail.com', '0966782524'),
('KH14', 'Phan Đình Tương', NULL, 0, '0966782524', 'phandinhtuong92@gmail.com', '0966782524'),
('KH15', 'Phan Thị Ánh', NULL, 0, '01324567', 'phanthianh87@gmail.com', 'Yên Thành,Nghệ An'),
('KH17', 'Phan Thị Ánh', NULL, 0, '0124356365', 'phanthianh87@gmail.com', 'Thành Phố Hồ Chí Minh'),
('KH18', 'Phan Đình Tương', NULL, 0, '012222', 'phandinhtuong92@gmail.com', 'Thành Phố Hồ Chí Minh'),
('KH2', 'Phan Đình Tương', '1992-08-20', 1, '0124522', 'phandinhtuong92gmail.com', 'Yên Thành Nghệ An '),
('KH3', 'Phan Đình Sáng', NULL, 1, '012456457', 'phandinhsang89@gmail.com', 'Nghệ An'),
('KH4', 'Phan Thị Ánh', NULL, 0, '012457855', 'phanthianh87@gmail.com', 'Thành Phố Hồ Chí Minh'),
('KH5', 'Phan Đình Sáng', NULL, 0, '123123123', 'phandinhsang89@gmail.com', 'Thành Phố Hồ Chí Minh'),
('KH6', 'Phan Đình Sáng', NULL, 0, '123123123', 'phandinhsang89@gmail.com', 'Thành Phố Hồ Chí Minh'),
('KH7', 'Phan Thị Ánh', NULL, 0, '0966782524', 'phanthianh87@gmail.com', 'Thành Phố Hồ Chí Minh'),
('KH8', 'Phan Đình Tương', NULL, 0, '12321324', 'phandinhtuong92@gmail.com', 'Nghệ An'),
('KH9', 'Phan Thị Ánh', NULL, 0, '0123456789', 'phanthianh87@gmail.com', 'Nghệ An');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khuyenmai`
--

CREATE TABLE `tbl_khuyenmai` (
  `MaSP` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GiaKhuyenMai` double NOT NULL,
  `PhanTram` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_khuyenmai`
--

INSERT INTO `tbl_khuyenmai` (`MaSP`, `GiaKhuyenMai`, `PhanTram`) VALUES
('SP01', 65000, NULL),
('SP02', 85000, NULL),
('SP03', 75000, NULL),
('SP05', 200000, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_loaisanpham`
--

CREATE TABLE `tbl_loaisanpham` (
  `Id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Id_DanhMuc` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Comment` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_loaisanpham`
--

INSERT INTO `tbl_loaisanpham` (`Id`, `Id_DanhMuc`, `Name`, `Comment`) VALUES
('aophongnam', 'thoitrangnam', 'Áo Phông Nam', 'áo phông dành cho nam'),
('aophongnu', 'thoitrangnu', 'Áo Phông Nữ', 'áo phông dành cho nữ'),
('quanbonam', 'thoitrangnam', 'Quần Bò Nam', 'Quần bò dành cho nam'),
('quanbonu', 'thoitrangnu', 'Quần Bò Nữ', 'Quần bò dành cho nữ'),
('quanthunnam', 'thoitrangnam', 'Quần Thun Nam', 'Quần thu dành cho nam'),
('quanthunnu', 'thoitrangnu', 'Quần Thun Nữ', 'Quần thu dành cho nữ'),
('sominam', 'thoitrangnam', 'Áo Sơ Mi Nam', 'Sơ mi dành cho nam'),
('sominu', 'thoitrangnu', 'Áo Sơ Mi Nữ', 'áo sơ mi dành cho nu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_luongsanpham`
--

CREATE TABLE `tbl_luongsanpham` (
  `MaSP` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KichCo` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_luongsanpham`
--

INSERT INTO `tbl_luongsanpham` (`MaSP`, `KichCo`, `SoLuong`) VALUES
('SP01', 'S', 65),
('SP01', 'M', 50),
('SP01', 'L', 50),
('SP01', 'XL', 20),
('SP02', 'S', 50),
('SP02', 'M', 50),
('SP02', 'L', 50),
('SP02', 'XL', 10),
('SP03', 'S', 100),
('SP03', 'M', 100),
('SP03', 'L', 100),
('SP03', 'XL', 10),
('SP05', 'S', 100),
('SP05', 'M', 100),
('SP05', 'L', 100),
('SP05', 'XL', 20),
('SP04', 'S', 200),
('SP04', 'M', 250),
('SP04', 'L', 200),
('SP04', 'XL', 50),
('SP06', 'S', 100),
('SP06', 'M', 200),
('SP06', 'L', 200),
('SP06', 'XL', 50),
('SP07', 'S', 100),
('SP07', 'M', 200),
('SP07', 'L', 200),
('SP07', 'XL', 50),
('SP08', 'S', 50),
('SP08', 'M', 200),
('SP08', 'L', 200),
('SP08', 'XL', 30),
('SP09', 'S', 100),
('SP09', 'M', 100),
('SP09', 'L', 100),
('SP09', 'XL', 50),
('SP10', 'S', 100),
('SP10', 'M', 100),
('SP10', 'L', 100),
('SP10', 'XL', 50),
('SP11', 'S', 120),
('SP11', 'M', 120),
('SP11', 'L', 120),
('SP11', 'XL', 40),
('SP12', 'S', 80),
('SP12', 'M', 80),
('SP12', 'L', 80),
('SP12', 'XL', 40),
('SP23', 'S', 140),
('SP23', 'M', 140),
('SP23', 'L', 140),
('SP23', 'XL', 50),
('SP13', 'S', 120),
('SP13', 'M', 120),
('SP13', 'L', 120),
('SP13', 'XL', 50),
('Sp14', 'S', 120),
('Sp14', 'M', 120),
('Sp14', 'L', 120),
('Sp14', 'XL', 50),
('SP15', 'S', 100),
('SP15', 'M', 100),
('SP15', 'L', 100),
('SP15', 'XL', 40),
('SP16', 'S', 100),
('SP16', 'M', 100),
('SP16', 'L', 100),
('SP16', 'XL', 50),
('SP17', 'S', 100),
('SP17', 'M', 100),
('SP17', 'L', 101),
('SP17', 'XL', 50),
('SP18', 'S', 100),
('SP18', 'M', 100),
('SP18', 'L', 100),
('SP18', 'XL', 50),
('SP19', 'S', 100),
('SP19', 'M', 100),
('SP19', 'L', 100),
('SP19', 'XL', 50),
('SP20', 'S', 100),
('SP20', 'M', 100),
('SP20', 'L', 100),
('SP20', 'XL', 50);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nguoidung`
--

CREATE TABLE `tbl_nguoidung` (
  `Id` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MatKhau` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Quyen` int(1) NOT NULL,
  `TrangThai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_nguoidung`
--

INSERT INTO `tbl_nguoidung` (`Id`, `Ten`, `MatKhau`, `Quyen`, `TrangThai`) VALUES
('HK00', 'phandinhlai', 'pdl19081994', 1, 0),
('KH1', 'phandinhtuong', 'tuong', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_quanlysanpham`
--

CREATE TABLE `tbl_quanlysanpham` (
  `Id_SanPham` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DaBan` int(11) NOT NULL,
  `DangCon` int(11) NOT NULL,
  `LuotXem` int(11) NOT NULL,
  `TrangThai` tinyint(1) NOT NULL,
  `GiaNhapVao` double NOT NULL,
  `GiaBan` double NOT NULL,
  `DoanhThu` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `Ma` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LoaiSP` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GiaNhap` double NOT NULL,
  `GiaBan` double NOT NULL,
  `NhaCC` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgayNhap` date DEFAULT NULL,
  `NgayHH` date DEFAULT NULL,
  `Anh` blob,
  `ChuThich` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`Ma`, `Ten`, `LoaiSP`, `GiaNhap`, `GiaBan`, `NhaCC`, `NgayNhap`, `NgayHH`, `Anh`, `ChuThich`) VALUES
('SP01', 'Áo Phong Nam Đẹp', 'aophongnam', 65000, 85000, 'Việt Nam', '2017-06-03', NULL, 0x616f70686f6e676e616d312e6a7067, 'Sản Xuất Tại Việt Nam'),
('SP02', 'Áo Phong Nam Hàn', 'aophongnam', 85000, 10000, 'Hàn Quốc', '2017-06-03', NULL, 0x616f70686f6e676e616d352e6a7067, 'Sản Xuất Tại Hàn Quốc. Là Mẫu Mới Nhất Về Việt Nam'),
('SP03', 'Áo Phông Nữ Đẹp', 'aophongnu', 75000, 95000, 'Việt Nam', '2017-06-03', NULL, 0x616f70686f6e676e75312e6a7067, 'Áo Phông Nữ Dược Sản Xuất Tại Việt Nam'),
('SP04', 'Quần Bò Nam Nhập Từ Mỹ', 'quanbonam', 250000, 350000, 'Mỹ', '2017-06-07', NULL, 0x7175616e626f6e616d312e6a706720202020202020202020, 'Quần bò nhập khẩu từ mỹ'),
('SP05', 'Quần Bò Nữ Hàn', 'quanbonu', 200000, 250000, 'Hàn Quốc', '2017-06-07', NULL, 0x7175616e626f6e75312e6a7067, 'Quần bó hàn quốc chất lượng cao. hàng xuất khẫu mấu mới nhất'),
('SP06', 'Quần Thun Nam', 'quanthunnam', 75000, 125000, 'Việt Nam', '2017-06-07', NULL, 0x7175616e7468756e6e616d2e6a7067, 'Quần thun nam sản xuất tại việt nam'),
('SP07', 'Quần Thu Nam Hàn Quốc', 'quanthunnam', 125000, 150000, 'Hàn Quốc', '2017-06-07', NULL, 0x7175616e7468756e6e616d342e6a7067, 'Quần Thu Được Sản Xuất Tại Hàn Quốc'),
('SP08', 'Sơ Mi Nam Hàng Việt Nam', 'sominam', 150000, 200000, 'Việt Nam', '2017-06-07', NULL, 0x736f6d696e616d322e6a7067, 'Sơ mi nam mẫu mới nhất. Hàng việt nam chất lượng cao'),
('SP09', 'Sơ Mi Nữ Việt Nam', 'sominu', 145000, 185000, 'Việt Nam', '2017-06-08', NULL, 0x736f6d696e75332e6a706720, 'Sơ mi nữ chất lượng cao. Hàng xuất khẩu. lô mới nhập về '),
('SP10', 'Quần Thu Nữ', 'quanthunnu', 125000, 165000, 'Việt Nam', '2017-06-07', NULL, 0x7175616e7468756e6e75372e6a7067, 'Hàng Việt Nam Xuất Khẩu'),
('SP11', 'Sơ Mi Nam Hàn Quốc', 'sominam', 250000, 350000, 'Hàn Quốc', '2017-06-07', NULL, 0x736f6d696e616d392e6a7067, 'Sơ mi nam  hàn quốc. hàng xuất khẩu chất lượng cao'),
('SP12', 'Sơ Mi Nữ Hàn Quốc', 'sominu', 150000, 180000, 'Hàn Quốc', '2017-06-07', NULL, 0x736f6d696e75312e6a7067, 'Sơ mi nữ nhập từ hàn quốc'),
('SP13', 'Quần Bò Nữ Mỹ', 'quanbonu', 120000, 180000, 'Hàn Quốc', '2017-06-07', NULL, 0x7175616e626f6e75342e6a7067, 'Quần bò nữ nhập từ hàn quốc lô mới nhất'),
('Sp14', 'Quần Thu Nam Việt Nam', 'quanthunnam', 150000, 180000, 'Việt Nam', '2017-06-07', NULL, 0x7175616e7468756e6e616d362e6a7067, 'Hàng Việt Nam chất lượng cao'),
('SP15', 'Áo Phông Nữ', 'aophongnu', 150000, 175000, 'Việt Nam', '2017-06-07', NULL, 0x616f70686f6e676e75332e6a7067, 'Hàng việt nam chất lượng cao'),
('SP16', 'Quần Bò Nam Mỹ', 'quanbonam', 145000, 200000, 'Mỹ', '2017-06-07', NULL, 0x7175616e626f6e616d372e6a7067, 'Hàng Mỹ Chất lượng cao. mẫu mỡi nhất'),
('SP17', 'Sơ Mi Nữ ', 'sominu', 190000, 250000, 'Hàn Quốc', '2017-06-08', NULL, 0x736f6d696e75352e6a706720, 'Sơ mi nữ hàn quốc chất lượng cao'),
('SP18', 'Sơ Mi Nữ', 'sominu', 175000, 240000, 'Hàn Quốc', '2017-06-07', NULL, 0x736f6d696e75342e6a7067, 'Sơ mi nữ nhập từ hàn quốc'),
('SP19', 'Sơ Mi Nam Hàn Quốc', 'sominam', 140000, 220000, 'Hàn Quốc', '2017-06-07', NULL, 0x736f6d696e616d342e6a7067, 'Sơ mi nam giành cho văn phòng'),
('SP20', 'Quần Bò Nữ', 'quanbonu', 200000, 250000, 'Hàn Quốc', '2017-06-07', NULL, 0x7175616e626f6e75352e6a7067, 'Quần bò chất lượng cao'),
('SP23', 'Quần Bò Nam Hàn Quốc', 'quanbonam', 230000, 280000, 'Hàn Quốc', '2017-06-07', NULL, 0x7175616e626f6e616d322e6a7067, 'Quầ bò mẫu mới nhất nhập từ hàn quốc');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_danhmucsanpham`
--
ALTER TABLE `tbl_danhmucsanpham`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `tbl_doanhthu`
--
ALTER TABLE `tbl_doanhthu`
  ADD PRIMARY KEY (`Ngay`);

--
-- Chỉ mục cho bảng `tbl_giamgia`
--
ALTER TABLE `tbl_giamgia`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `tbl_khachang`
--
ALTER TABLE `tbl_khachang`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `tbl_loaisanpham`
--
ALTER TABLE `tbl_loaisanpham`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `tbl_luongsanpham`
--
ALTER TABLE `tbl_luongsanpham`
  ADD KEY `MaSP` (`MaSP`);

--
-- Chỉ mục cho bảng `tbl_nguoidung`
--
ALTER TABLE `tbl_nguoidung`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`Ma`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_giamgia`
--
ALTER TABLE `tbl_giamgia`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_luongsanpham`
--
ALTER TABLE `tbl_luongsanpham`
  ADD CONSTRAINT `tbl_luongsanpham_ibfk_1` FOREIGN KEY (`MaSP`) REFERENCES `tbl_sanpham` (`Ma`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
