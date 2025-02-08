-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: localhost    Database: ql_thuvien
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.27-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bosach`
--

DROP TABLE IF EXISTS `bosach`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bosach` (
  `MaBoSach` int(11) NOT NULL AUTO_INCREMENT,
  `TenBoSach` varchar(255) DEFAULT NULL,
  `MoTa` text DEFAULT NULL,
  `URL_HinhBoSach` varchar(255) DEFAULT NULL,
  `CreatedAt` datetime DEFAULT current_timestamp(),
  `UpdatedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`MaBoSach`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bosach`
--

LOCK TABLES `bosach` WRITE;
/*!40000 ALTER TABLE `bosach` DISABLE KEYS */;
INSERT INTO `bosach` VALUES (1,'Bộ truyện Dế Mèn Phiêu Lưu Ký','Tuyển tập các câu chuyện liên quan đến nhân vật Dế Mèn.','De-men-phieu-luu-ky.jpg','2024-11-26 13:58:54','2024-11-29 10:30:54'),(2,'Bộ truyện Harry Potter','Toàn bộ các tập truyện Harry Potter của J.K. Rowling.','ip_page_harry_potter_icon_3b529228e6.jpg','2024-11-26 13:58:54','2024-11-29 11:32:33'),(3,'Bộ truyện Chúa Tể Những Chiếc Nhẫn','Ba tập chính của loạt truyện Chúa Tể Những Chiếc Nhẫn.','bo-chua-te-cua-nhung-chiec-nhan.jpg','2024-11-26 13:58:54','2024-11-29 11:16:00'),(4,'Tác phẩm Nguyễn Du','Tuyển tập các tác phẩm nổi tiếng của Nguyễn Du.','nguyendu.jpg','2024-11-26 13:58:54','2024-11-29 11:33:14'),(5,'Sách kỹ năng sống','Bộ sách giúp phát triển kỹ năng sống và tư duy tích cực.',NULL,'2024-11-26 13:58:54','2024-11-26 13:58:54'),(6,'Tác phẩm George Orwell','Tuyển tập các tác phẩm của George Orwell.',NULL,'2024-11-26 13:58:54','2024-11-26 13:58:54'),(7,'Văn học kinh điển','Tuyển tập các tác phẩm văn học kinh điển thế giới.',NULL,'2024-11-26 13:58:54','2024-11-26 13:58:54'),(8,'Sách cho thiếu nhi','Các câu chuyện dành cho lứa tuổi thiếu nhi.',NULL,'2024-11-26 13:58:54','2024-11-26 13:58:54'),(9,'Tiểu thuyết Paulo Coelho','Tuyển tập các tiểu thuyết nổi tiếng của Paulo Coelho.',NULL,'2024-11-26 13:58:54','2024-11-26 13:58:54'),(10,'Sách Haruki Murakami','Các tác phẩm nổi bật của Haruki Murakami.',NULL,'2024-11-26 13:58:54','2024-11-26 13:58:54'),(11,'Những Người Khốn Khổ (Bộ 3 Tập)','Những người khốn khổ là câu chuyện về xã hội nước Pháp trong khoảng hơn 20 năm đầu thế kỉ 19 kể từ thời điểm Napoleon I lên ngôi và vài thập niên sau đó. Nhân vật chính của tiểu thuyết là Jean Valjean, một cựu tù khổ sai tìm cách chuộc lại những lỗi lầm gây ra thời trai trẻ. Bộ tiểu thuyết không chỉ nói tới bản chất của cái tốt, cái xấu, của luật pháp, mà tác phẩm còn là cuốn bách khoa thư đồ sộ về lịc sử, kiến trúc của Paris, nền chính trị, triết lý, luật pháp, công lý, tín ngưỡng của nước Pháp nửa đầu thế kỷ 19.','nhung-nguoi-khon-kho.jpg','2024-11-29 10:52:46','2024-11-29 10:53:28');
/*!40000 ALTER TABLE `bosach` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chitietmuonsach`
--

DROP TABLE IF EXISTS `chitietmuonsach`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chitietmuonsach` (
  `MaChiTietMuon` int(11) NOT NULL AUTO_INCREMENT,
  `MaMuonSach` int(11) DEFAULT NULL,
  `MaSachCaBiet` int(11) DEFAULT 0,
  `MaSach` int(11) DEFAULT NULL,
  `GiaMuon_Ngay` double DEFAULT NULL,
  `ThanhTien` double DEFAULT NULL,
  `TrangThai` enum('Đang mượn','Đã trả','Gia hạn','Chờ xác nhận') DEFAULT 'Đang mượn',
  `CreatedAt` datetime DEFAULT current_timestamp(),
  `UpdatedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`MaChiTietMuon`),
  KEY `MaSachCaBiet` (`MaSachCaBiet`),
  KEY `MaSach` (`MaSach`),
  KEY `chitietmuonsach_ibfk_1` (`MaMuonSach`),
  CONSTRAINT `chitietmuonsach_ibfk_1` FOREIGN KEY (`MaMuonSach`) REFERENCES `muonsach` (`MaMuonSach`) ON DELETE CASCADE,
  CONSTRAINT `chitietmuonsach_ibfk_2` FOREIGN KEY (`MaSachCaBiet`) REFERENCES `sachcabiet` (`MaSachCaBiet`) ON DELETE CASCADE,
  CONSTRAINT `chitietmuonsach_ibfk_3` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chitietmuonsach`
--

LOCK TABLES `chitietmuonsach` WRITE;
/*!40000 ALTER TABLE `chitietmuonsach` DISABLE KEYS */;
INSERT INTO `chitietmuonsach` VALUES (12,100000,NULL,100015,500,NULL,'Đang mượn','2024-12-02 10:35:00','2025-01-02 14:59:44'),(13,100001,NULL,100001,500,NULL,'Đang mượn','2024-12-02 16:14:28','2025-01-02 14:59:44'),(14,100002,NULL,100000,500,NULL,'Đã trả','2024-12-02 16:18:25','2025-01-02 14:59:44'),(15,100002,NULL,100003,500,NULL,'Đã trả','2024-12-02 16:18:25','2025-01-02 14:59:44'),(16,100003,NULL,100000,500,NULL,'Đã trả','2024-12-04 19:37:31','2025-01-02 14:59:44'),(17,100003,NULL,100003,500,NULL,'Đã trả','2024-12-04 19:37:31','2025-01-02 14:59:44'),(18,100004,NULL,100017,500,NULL,'Đã trả','2024-12-04 20:26:47','2025-01-02 14:59:44'),(19,100004,NULL,100036,500,NULL,'Đã trả','2024-12-04 20:26:47','2025-01-02 14:59:44'),(20,100005,NULL,100005,500,NULL,'Đã trả','2024-12-04 20:29:40','2025-01-02 14:59:44'),(21,100006,NULL,100008,500,110000,'Đã trả','2024-12-04 20:32:15','2025-01-05 16:05:24'),(22,100007,0,100010,500,78000,'Đã trả','2024-12-18 16:44:38','2025-01-05 15:56:37'),(23,100007,2,100021,500,78000,'Đã trả','2024-12-18 16:44:38','2025-01-05 15:56:37'),(24,100008,3,100002,500,NULL,'Đang mượn','2024-12-21 17:52:50','2025-01-02 14:59:44'),(25,100010,NULL,100011,500,NULL,'Đang mượn','2024-12-27 16:31:32','2025-01-02 14:59:44'),(26,100023,0,100000,500,49000,'Chờ xác nhận','2025-01-04 16:59:12','2025-01-04 16:59:12'),(27,100023,0,100016,500,49000,'Chờ xác nhận','2025-01-04 16:59:12','2025-01-04 16:59:12'),(28,100024,0,100036,500,99000,'Đang mượn','2025-01-05 21:22:20','2025-01-06 10:30:31'),(29,100025,0,100005,500,97000,'Chờ xác nhận','2025-01-06 15:58:04','2025-01-06 15:58:04'),(30,100026,0,100010,650,131300,'Đã trả','2025-01-06 16:03:12','2025-01-06 16:04:13'),(31,100026,0,100031,500,96000,'Đã trả','2025-01-06 16:03:12','2025-01-06 16:04:13');
/*!40000 ALTER TABLE `chitietmuonsach` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `danhmuc`
--

DROP TABLE IF EXISTS `danhmuc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `danhmuc` (
  `MaDanhMuc` int(11) NOT NULL AUTO_INCREMENT,
  `TenDanhMuc` varchar(100) DEFAULT NULL,
  `MoTa` text DEFAULT NULL,
  `URL_HinhDM` varchar(255) DEFAULT NULL,
  `CreatedAt` datetime DEFAULT current_timestamp(),
  `UpdatedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`MaDanhMuc`)
) ENGINE=InnoDB AUTO_INCREMENT=10010 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `danhmuc`
--

LOCK TABLES `danhmuc` WRITE;
/*!40000 ALTER TABLE `danhmuc` DISABLE KEYS */;
INSERT INTO `danhmuc` VALUES (0,'Đang cập nhật',NULL,NULL,'2024-11-25 21:52:09','2024-11-25 21:52:16'),(10000,'Văn học','Danh mục các tác phẩm văn học cổ điển và hiện đại.',NULL,'2024-11-25 22:09:05','2024-11-25 22:09:05'),(10001,'Khoa học','Sách về khoa học tự nhiên, ứng dụng, và khám phá.',NULL,'2024-11-25 22:09:05','2024-11-25 22:09:05'),(10002,'Lịch sử','Tài liệu lịch sử Việt Nam và thế giới.',NULL,'2024-11-25 22:09:05','2024-11-25 22:09:05'),(10003,'Kinh tế','Sách về kinh doanh, tài chính, và phát triển kinh tế.',NULL,'2024-11-25 22:09:05','2024-11-25 22:09:05'),(10004,'Kỹ năng sống','Hướng dẫn phát triển bản thân và kỹ năng mềm.',NULL,'2024-11-25 22:09:05','2024-11-25 22:09:05'),(10005,'CNTT','Tài liệu học tập và nghiên cứu về CNTT.',NULL,'2024-11-25 22:09:05','2024-11-28 14:34:28'),(10006,'Y học','Sách y khoa, chăm sóc sức khỏe, và nghiên cứu y học.',NULL,'2024-11-25 22:09:05','2024-11-25 22:09:05'),(10007,'Thiếu nhi','Sách dành cho trẻ em và thanh thiếu niên.',NULL,'2024-11-25 22:09:05','2024-11-25 22:09:05'),(10008,'Ngoại ngữ','Tài liệu học ngoại ngữ: Anh, Pháp, Nhật, Hàn...',NULL,'2024-11-25 22:09:05','2024-11-25 22:09:05'),(10009,'Nghệ thuật','Sách về hội họa, âm nhạc, nhiếp ảnh, và nghệ thuật khác.',NULL,'2024-11-25 22:09:05','2024-11-25 22:09:05');
/*!40000 ALTER TABLE `danhmuc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `giohang`
--

DROP TABLE IF EXISTS `giohang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `giohang` (
  `MaTaiKhoan` int(11) NOT NULL,
  `MaSach` int(11) NOT NULL,
  `GiaMuon` decimal(10,2) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `ThanhTien` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`MaTaiKhoan`,`MaSach`),
  KEY `MaSach` (`MaSach`),
  CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `taikhoan` (`MaTaiKhoan`) ON DELETE CASCADE,
  CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `giohang`
--

LOCK TABLES `giohang` WRITE;
/*!40000 ALTER TABLE `giohang` DISABLE KEYS */;
/*!40000 ALTER TABLE `giohang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lichsuxem`
--

DROP TABLE IF EXISTS `lichsuxem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lichsuxem` (
  `MaLichSuXem` int(11) NOT NULL AUTO_INCREMENT,
  `MaTaiKhoan` int(11) DEFAULT NULL,
  `MaSach` int(11) DEFAULT NULL,
  `NgayXem` date DEFAULT curdate(),
  PRIMARY KEY (`MaLichSuXem`),
  KEY `MaTaiKhoan` (`MaTaiKhoan`),
  KEY `MaSach` (`MaSach`),
  CONSTRAINT `lichsuxem_ibfk_1` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `taikhoan` (`MaTaiKhoan`),
  CONSTRAINT `lichsuxem_ibfk_2` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lichsuxem`
--

LOCK TABLES `lichsuxem` WRITE;
/*!40000 ALTER TABLE `lichsuxem` DISABLE KEYS */;
/*!40000 ALTER TABLE `lichsuxem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `muonsach`
--

DROP TABLE IF EXISTS `muonsach`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `muonsach` (
  `MaMuonSach` int(11) NOT NULL AUTO_INCREMENT,
  `MaTaiKhoan` int(11) DEFAULT NULL,
  `NgayMuon` date DEFAULT curdate(),
  `NgayDuKienTra` datetime DEFAULT NULL,
  `HanTra` datetime DEFAULT NULL,
  `NgayGiaHan` datetime DEFAULT NULL,
  `NgayTraThuc` datetime DEFAULT NULL,
  `SoLuongSachMuon` int(3) DEFAULT 0,
  `TongTien` double DEFAULT 0,
  `TrangThai` enum('Đang mượn','Đã trả','Chờ xác nhận','Đang vận chuyển','Gia hạn') DEFAULT 'Đang mượn',
  `PhuongThucThanhToan` enum('Chuyển khoản','Tiền mặt','Tiền trong tài khoản thư viện') DEFAULT 'Tiền mặt',
  `CreatedAt` datetime DEFAULT current_timestamp(),
  `UpdatedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`MaMuonSach`),
  KEY `MaTaiKhoan` (`MaTaiKhoan`),
  CONSTRAINT `muonsach_ibfk_1` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `taikhoan` (`MaTaiKhoan`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=100027 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `muonsach`
--

LOCK TABLES `muonsach` WRITE;
/*!40000 ALTER TABLE `muonsach` DISABLE KEYS */;
INSERT INTO `muonsach` VALUES (100000,100001,'2024-12-02','2024-12-02 00:00:00','2024-12-02 00:00:00',NULL,NULL,1,70000,'Đã trả','Tiền mặt','2024-12-02 10:35:00','2025-01-05 17:42:02'),(100001,100000,'2024-12-02','2024-12-02 00:00:00','2024-12-02 00:00:00',NULL,NULL,1,125000,'Đã trả','Tiền mặt','2024-12-02 16:14:28','2025-01-05 17:42:58'),(100002,100000,'2024-12-02','2024-12-02 00:00:00','2024-12-02 00:00:00',NULL,NULL,2,95000,'Gia hạn','Tiền mặt','2024-12-02 16:18:25','2025-01-05 17:43:05'),(100003,100000,'2024-12-04','2024-12-08 00:00:00','2024-12-08 00:00:00',NULL,NULL,2,99000,'Đã trả','Tiền mặt','2024-12-04 19:37:31','2025-01-05 17:43:10'),(100004,100004,'2024-12-04','2024-12-04 00:00:00','2024-12-04 00:00:00',NULL,NULL,2,217000,'Đã trả','Chuyển khoản','2024-12-04 20:26:47','2025-01-05 17:43:16'),(100005,100005,'2024-12-04','2024-12-04 00:00:00','2024-12-04 00:00:00',NULL,NULL,1,95000,'Đã trả','Tiền mặt','2024-12-04 20:29:40','2025-01-05 17:43:21'),(100006,100002,'2024-12-01','2024-12-03 00:00:00','2024-12-03 00:00:00',NULL,'2025-01-05 16:11:26',1,110000,'Đã trả','Tiền mặt','2024-12-04 20:32:14','2025-01-05 17:43:26'),(100007,100000,'2024-12-18','2024-12-18 00:00:00','2025-01-02 14:22:00','2025-01-04 00:00:00',NULL,2,608000,'Đã trả','Tiền mặt','2024-12-18 16:44:38','2025-01-05 15:56:37'),(100008,100010,'2024-12-21','2024-12-22 00:00:00','2024-12-22 00:00:00',NULL,NULL,1,140500,'Đang mượn','Tiền mặt','2024-12-21 17:52:50','2025-01-05 17:43:30'),(100010,100012,'2024-12-27','2024-12-29 00:00:00','2024-12-29 00:00:00',NULL,NULL,1,151000,'Đang mượn','Tiền mặt','2024-12-27 16:31:32','2025-01-05 17:43:34'),(100023,100004,'2025-01-04','2025-01-12 00:00:00','2025-01-12 16:48:59',NULL,NULL,2,98000,'Chờ xác nhận','Tiền mặt','2025-01-04 16:59:12','2025-01-04 16:59:12'),(100024,100000,'2025-01-05','2025-01-09 21:22:13','2025-01-09 21:22:13',NULL,NULL,1,99000,'Đang mượn','Tiền mặt','2025-01-05 21:22:19','2025-01-06 10:30:30'),(100025,100000,'2025-01-06','2025-01-10 15:57:02','2025-01-10 15:57:02',NULL,NULL,1,97000,'Chờ xác nhận','Tiền mặt','2025-01-06 15:58:04','2025-01-06 15:58:04'),(100026,100000,'2025-01-06','2025-01-08 16:02:12','2025-01-08 16:02:12',NULL,'2025-01-06 16:04:13',2,227300,'Đã trả','Tiền mặt','2025-01-06 16:03:12','2025-01-06 16:04:13');
/*!40000 ALTER TABLE `muonsach` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhanvien`
--

DROP TABLE IF EXISTS `nhanvien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nhanvien` (
  `MaNhanVien` int(11) NOT NULL AUTO_INCREMENT,
  `MaTaiKhoan` int(11) DEFAULT NULL,
  `NgayVaoLam` date DEFAULT curdate(),
  `ChucVu` varchar(100) DEFAULT NULL,
  `CreatedAt` datetime DEFAULT current_timestamp(),
  `UpdatedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`MaNhanVien`),
  KEY `MaTaiKhoan` (`MaTaiKhoan`),
  CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `taikhoan` (`MaTaiKhoan`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhanvien`
--

LOCK TABLES `nhanvien` WRITE;
/*!40000 ALTER TABLE `nhanvien` DISABLE KEYS */;
INSERT INTO `nhanvien` VALUES (1,100000,'2024-10-08','Chủ thư viện','2024-10-08 14:57:37','2024-10-08 14:57:37'),(2,100001,'2024-10-08','Thư kí của chủ thư viện 1','2024-10-08 14:58:34','2024-11-10 10:48:12'),(11,100003,'2024-01-01','Thủ thư','2024-11-25 22:00:10','2024-11-25 22:00:10'),(12,100004,'2023-12-01','Hỗ trợ độc giả','2024-11-25 22:00:10','2024-11-25 22:00:10'),(13,100006,'2023-11-20','Quản lý mượn sách','2024-11-25 22:00:10','2024-11-25 22:00:10'),(14,100007,'2023-11-15','Nhân viên kỹ thuật','2024-11-25 22:00:10','2024-11-25 22:00:10'),(15,100013,'2023-10-10','Nhân viên thư viện','2024-11-25 22:00:10','2024-11-25 22:00:10'),(16,100015,'2023-09-30','Quản lý kho sách','2024-11-25 22:00:10','2024-11-25 22:00:10'),(17,100018,'2023-08-20','Hỗ trợ mượn sách','2024-11-25 22:00:10','2024-11-25 22:00:10'),(18,100020,'2023-07-15','Kiểm tra chất lượng sách','2024-11-25 22:00:10','2024-11-25 22:00:10');
/*!40000 ALTER TABLE `nhanvien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phieuphat`
--

DROP TABLE IF EXISTS `phieuphat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `phieuphat` (
  `MaPhieuPhat` int(11) NOT NULL AUTO_INCREMENT,
  `MaTaiKhoan` int(11) DEFAULT NULL,
  `MaChiTietMuon` int(11) DEFAULT NULL,
  `MaSachCaBiet` int(11) DEFAULT NULL,
  `SoTienPhat` double NOT NULL DEFAULT 0,
  `NgayPhat` date DEFAULT curdate(),
  `TrangThai` enum('Chưa thanh toán','Đã thanh toán') DEFAULT 'Chưa thanh toán',
  PRIMARY KEY (`MaPhieuPhat`),
  KEY `MaTaiKhoan` (`MaTaiKhoan`),
  KEY `MaChiTietMuon` (`MaChiTietMuon`),
  KEY `MaSachCaBiet` (`MaSachCaBiet`),
  CONSTRAINT `FK_phieuphat_sachcabiet` FOREIGN KEY (`MaPhieuPhat`) REFERENCES `sachcabiet` (`MaSachCaBiet`),
  CONSTRAINT `phieuphat_ibfk_1` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `taikhoan` (`MaTaiKhoan`),
  CONSTRAINT `phieuphat_ibfk_2` FOREIGN KEY (`MaChiTietMuon`) REFERENCES `chitietmuonsach` (`MaChiTietMuon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phieuphat`
--

LOCK TABLES `phieuphat` WRITE;
/*!40000 ALTER TABLE `phieuphat` DISABLE KEYS */;
/*!40000 ALTER TABLE `phieuphat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sach`
--

DROP TABLE IF EXISTS `sach`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sach` (
  `MaSach` int(11) NOT NULL AUTO_INCREMENT,
  `TenSach` varchar(255) DEFAULT NULL,
  `MoTa` text DEFAULT NULL,
  `NhaXuatBan` varchar(100) DEFAULT NULL,
  `NgayXuatBan` date DEFAULT NULL,
  `ISBN` varchar(20) DEFAULT NULL,
  `URL_HinhSach` varchar(255) DEFAULT NULL,
  `LuotLuu` int(11) DEFAULT 0,
  `LuotXem` int(11) DEFAULT 0,
  `LuotThich` int(11) DEFAULT 0,
  `CoLoi` tinyint(1) DEFAULT 0,
  `ViTriSach` varchar(100) DEFAULT NULL,
  `GhimSach` tinyint(1) DEFAULT 0,
  `MaBoSach` int(11) DEFAULT NULL,
  `TongSL` int(11) NOT NULL,
  `SLConLai` int(11) NOT NULL,
  `DonGia` double DEFAULT NULL,
  `CreatedAt` datetime DEFAULT current_timestamp(),
  `UpdatedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`MaSach`),
  KEY `MaBoSach` (`MaBoSach`),
  CONSTRAINT `sach_ibfk_1` FOREIGN KEY (`MaBoSach`) REFERENCES `bosach` (`MaBoSach`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=100040 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sach`
--

LOCK TABLES `sach` WRITE;
/*!40000 ALTER TABLE `sach` DISABLE KEYS */;
INSERT INTO `sach` VALUES (100000,'Dế Mèn Phiêu Lưu Ký - full','Phần tiếp theo của câu chuyện Dế Mèn.','NXB Kim Đồng','1951-01-01','9786041121400','de-men-phieu-lu-ky.png',80,2000,500,0,'Kệ A1',0,1,50,46,45000,'2024-11-26 13:59:17','2024-12-10 21:56:30'),(100001,'Harry Potter và Phòng Chứa Bí Mật','Tập 2 của loạt truyện Harry Potter.','Bloomsbury','1998-07-02','9780747538493','harry-potter-va-phong-chua-bi-mat-(tap-02)_20712_18442.jpg',500,10000,7500,0,'Kệ B1',0,2,200,180,125000,'2024-11-26 13:59:17','2024-12-02 16:15:17'),(100002,'Chúa Tể Những Chiếc Nhẫn - Hai Tòa Tháp','Tập 2 của bộ Chúa Tể Những Chiếc Nhẫn.','NXB Văn Học','1954-11-11','9780062326317','haitoathap-chuatenhungchiecnhan.jpg',300,8000,4000,0,'Kệ B2',0,3,100,90,140000,'2024-11-26 13:59:17','2024-11-29 10:42:25'),(100003,'Nguyễn Du - Văn Tế Thập Loại Chúng Sinh','Tác phẩm thơ nổi tiếng của Nguyễn Du.','NXB Văn Học','1820-05-01','9786041121417','van-te-thap-loai-chung-sinh-cua-dai-thi-hao-nguyen-du.jpg',150,3000,2000,0,'Kệ C1',0,4,100,96,50000,'2024-11-26 13:59:17','2024-12-10 21:56:30'),(100005,'1984','Tiểu thuyết chống dystopia của George Orwell.','Secker & Warburg','1949-06-08','9780451524935','georgeorwellxobeygiantprintset-1984coverbyshepardfairey.jpg',250,8000,5000,0,'Kệ C2',1,6,120,100,95000,'2024-11-26 13:59:17','2024-12-18 16:02:52'),(100006,'Những Người Khốn Khổ - Phần 1','Tập đầu của tác phẩm văn học kinh điển.','NXB Văn Học','1862-01-01','9786041121431','hh_bia_1_nhung_nguoi_khon_kho_1_.jpg',100,2500,800,0,'Kệ D1',0,11,100,85,70000,'2024-11-26 13:59:17','2024-11-29 10:54:16'),(100008,'Rừng Nauy','Tiểu thuyết nổi tiếng của Haruki Murakami.','NXB Văn Học','1987-01-01','9786041121434','rungnauy004.jpg',220,6000,3500,0,'Kệ E1',0,10,200,183,110000,'2024-11-26 13:59:17','2025-01-05 16:11:26'),(100009,'Nhà giả kim','Tác phẩm của Paulo Coelho.','NXB Trẻ','1994-01-01','9786041121435','nha-gia-kim.jpg',90,2000,800,0,'Kệ A2',0,9,120,110,80000,'2024-11-26 13:59:17','2024-11-29 11:01:43'),(100010,'Harry Potter và Tên Tù Nhân Ngục Azkaban','Tập 3 của loạt truyện Harry Potter.','Bloomsbury','1999-07-08','9780747542155','harry-potter-va-ten-tu-nhan-nguc-azkaban-tap-3.jpg',550,11000,8500,0,'Kệ B1',1,2,200,190,130000,'2024-11-26 13:59:26','2025-01-06 16:04:14'),(100011,'Chúa Tể Những Chiếc Nhẫn - Nhà Vua Trở Về','Tập 3 của bộ Chúa Tể Những Chiếc Nhẫn.','NXB Văn Học','1955-10-20','9780062326355','chua-te-nhung-chiec-nhan-nha-vua-tro-ve-tai-ban-2021.jpg',350,9000,5000,0,'Kệ B2',1,3,100,85,150000,'2024-11-26 13:59:26','2024-11-29 11:03:17'),(100012,'Nguyễn Du - Thơ Văn Chọn Lọc','Tuyển tập thơ văn đặc sắc của Nguyễn Du.','NXB Văn Học','1815-05-01','9786041121500','vh-ndc-tho-chon-loc.jpg',120,2500,1800,0,'Kệ C1',0,4,80,75,50000,'2024-11-26 13:59:26','2024-11-29 11:06:31'),(100013,'Hành Trình Về Phương Đông','Tác phẩm kỹ năng sống được yêu thích.','NXB Trẻ','1970-01-01','9786041121517','hanhtrinhvephuongdong.jpg',200,6000,4000,0,'Kệ C2',0,5,150,140,100000,'2024-11-26 13:59:26','2024-11-29 11:07:28'),(100014,'Animal Farm','Tác phẩm trào phúng của George Orwell.','Secker & Warburg','1945-08-17','9780451526342','animal-farm.jpg',300,7500,5000,0,'Kệ C2',1,6,150,130,85000,'2024-11-26 13:59:26','2024-11-29 11:08:28'),(100015,'Những Người Khốn Khổ - Phần 2','Phần tiếp theo của tác phẩm kinh điển.','NXB Văn Học','1862-01-01','9786041121531','hh_bia_1_nhung_nguoi_khon_kho_2.jpg',120,3000,1000,0,'Kệ D1',0,11,80,75,70000,'2024-11-26 13:59:26','2024-12-02 10:35:28'),(100016,'Dế Mèn Phiêu Lưu Ký - Truyện Ngắn','Các câu chuyện nhỏ trong loạt Dế Mèn.','NXB Kim Đồng','1955-01-01','9786041121547','de-men-phieu-lu-ky.png',80,2000,600,0,'Kệ A1',0,1,50,45,45000,'2024-11-26 13:59:26','2024-11-29 11:09:44'),(100017,'Kafka Bên Bờ Biển','Tiểu thuyết nổi bật của Haruki Murakami.','NXB Văn Học','2002-01-01','9786041121558','Kafka_bên_bờ_biển.jpg',700,7000,5000,0,'Kệ E1',0,10,180,170,120000,'2024-11-26 13:59:26','2024-12-04 20:27:17'),(100018,'Zahir','Tác phẩm sâu sắc của Paulo Coelho.','NXB Trẻ','2005-01-01','9786041121567','zahir.jpg',100,3000,1500,0,'Kệ A2',0,9,120,115,90000,'2024-11-26 13:59:26','2024-11-29 11:10:50'),(100019,'Khu Rừng Đom Đóm','Một tác phẩm nổi bật của thiếu nhi.','NXB Kim Đồng','1995-01-01','9786041121578','rungdomdom.jpg',120,2500,1000,0,'Kệ A3',0,8,100,90,60000,'2024-11-26 13:59:26','2024-11-29 11:11:42'),(100021,'Harry Potter và Chiếc Cốc Lửa','Tập 4 của loạt truyện Harry Potter.','Bloomsbury','2000-07-08','9780747550990','Harry_Potter_và_Chiếc_cốc_lửa_bìa.jpg',600,12000,9500,0,'Kệ B1',1,2,180,170,135000,'2024-11-26 14:03:26','2025-01-05 15:56:37'),(100023,'Tuyển tập văn tế Đại thi hào Nguyễn Du (Hội Kiều học tuyển chọn và giới thiệu)','Tác phẩm nổi bật của Nguyễn Du.','NXB Văn Học','1819-01-01','9786041121590','tuyen-tap-van-te-dai-thi-hao-nguyen-du-hoi-kieu-hoc-tuyen-chon-va-gioi-thieu.jpg',100,2500,800,0,'Kệ C1',0,4,80,70,52000,'2024-11-26 14:03:26','2024-11-29 11:18:20'),(100024,'Nghệ Thuật Sống Hạnh Phúc','Một cuốn sách truyền cảm hứng.','NXB Trẻ','2010-01-01','9786041121600','nghe-thuat-song-hanh-phuc.png',220,4500,2500,0,'Kệ C2',0,5,200,190,97000,'2024-11-26 14:03:26','2024-11-29 11:19:41'),(100025,'1984 - Phiên Bản Đặc Biệt','Tái bản của tác phẩm kinh điển George Orwell.','Secker & Warburg','2020-01-01','9780451526355','1984-dac-biet.jpg',150,5000,3000,0,'Kệ C2',1,6,150,140,110000,'2024-11-26 14:03:26','2024-11-29 11:20:32'),(100026,'Những Người Khốn Khổ - Phần 3','Phần cuối của tác phẩm kinh điển.','NXB Văn Học','1862-12-01','9786041121611','hh_bia_1_nhung_nguoi_khon_kho_3.jpg',200,5000,2000,0,'Kệ D1',0,11,100,95,72000,'2024-11-26 14:03:26','2024-11-29 10:56:48'),(100028,'Haruki Murakami - Tuyển Tập Truyện','Một tuyển tập truyện ngắn nổi bật của Haruki Murakami.','NXB Văn Học','1995-01-01','9786041121630','Haruki Murakami - Tuyển Tập Truyện.jpg',230,6000,3500,0,'Kệ E1',0,10,180,170,115000,'2024-11-26 14:03:26','2024-11-29 11:22:56'),(100029,'Những Ngọn Gió Qua Rừng','Một tác phẩm thiếu nhi đáng yêu.','NXB Kim Đồng','2000-01-01','9786041121640',NULL,120,2000,800,0,'Kệ A3',0,8,100,90,60000,'2024-11-26 14:03:26','2024-11-26 14:03:26'),(100030,'Harry Potter và Hội Phượng Hoàng','Tập 5 của loạt truyện Harry Potter.','Bloomsbury','2003-07-08','9780747551001','Harry_Potter_và_Hội_phượng_hoàng.jpg',650,13000,10000,0,'Kệ B1',1,2,200,190,140000,'2024-11-26 14:03:26','2024-11-29 11:24:30'),(100031,'Tình Yêu Và Cuộc Sống','Tác phẩm truyền cảm hứng về tình yêu và cuộc sống.','NXB Trẻ','2015-01-01','9786041121650','Tình Yêu Và Cuộc Sống.jpg',180,4000,2500,0,'Kệ C2',0,5,200,190,95000,'2024-11-26 14:03:26','2025-01-06 16:04:14'),(100036,'Bí Mật Hạnh Phúc','Cuốn sách truyền cảm hứng và khám phá bí mật hạnh phúc.','NXB Trẻ','2012-01-01','9786041121700','Bí Mật Hạnh Phúc.jpg',150,3000,2000,0,'Kệ C2',0,5,150,139,97000,'2024-11-26 14:03:26','2025-01-06 10:30:31'),(100037,'Haruki Murakami - Người tình Sputnik','Một tác phẩm đặc sắc của Haruki Murakami.','NXB Văn Học','1998-01-01','9786041121710','Haruki Murakami - nguoitinh.jpg',240,6200,3800,0,'Kệ E1',0,10,200,190,130000,'2024-11-26 14:03:26','2024-11-29 11:30:36');
/*!40000 ALTER TABLE `sach` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sachcabiet`
--

DROP TABLE IF EXISTS `sachcabiet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sachcabiet` (
  `MaSachCaBiet` int(11) NOT NULL AUTO_INCREMENT,
  `MaSach` int(11) DEFAULT NULL,
  `MoTa` text DEFAULT NULL,
  `SoHieuBanSao` varchar(50) DEFAULT NULL,
  `TrangThai` enum('Có sẵn','Đã mượn','Bị lỗi','Đang bảo quản') DEFAULT 'Có sẵn',
  `CreatedAt` datetime DEFAULT current_timestamp(),
  `UpdatedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`MaSachCaBiet`),
  UNIQUE KEY `SoHieuBanSao` (`SoHieuBanSao`),
  KEY `MaSach` (`MaSach`),
  CONSTRAINT `sachcabiet_ibfk_1` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sachcabiet`
--

LOCK TABLES `sachcabiet` WRITE;
/*!40000 ALTER TABLE `sachcabiet` DISABLE KEYS */;
INSERT INTO `sachcabiet` VALUES (0,NULL,NULL,'Không có lỗi','Có sẵn','2024-12-29 23:34:45','2024-12-29 23:35:04'),(1,100010,'Rách bìa','hrp3-1','Có sẵn','2024-12-28 21:35:11','2024-12-28 22:13:47'),(2,100021,'Rách trang 12','hrp4-1','Có sẵn','2024-12-28 22:46:57','2024-12-28 22:47:24'),(3,100002,'Bẩn trang 25','ctncn2-1','Có sẵn','2024-12-29 23:22:47','2024-12-29 23:23:24'),(5,100011,'Móp bìa sách','ctncn3-1','Bị lỗi','2025-01-05 15:42:51','2025-01-05 15:42:51'),(6,100008,'Rách giấy trang 123','rnu-1','Bị lỗi','2025-01-05 16:05:24','2025-01-05 16:05:24');
/*!40000 ALTER TABLE `sachcabiet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sachdanhmuc`
--

DROP TABLE IF EXISTS `sachdanhmuc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sachdanhmuc` (
  `MaSach` int(11) NOT NULL,
  `MaDanhMuc` int(11) NOT NULL,
  PRIMARY KEY (`MaSach`,`MaDanhMuc`),
  KEY `MaDanhMuc` (`MaDanhMuc`),
  CONSTRAINT `FK_sachdanhmuc_danhmuc` FOREIGN KEY (`MaDanhMuc`) REFERENCES `danhmuc` (`MaDanhMuc`) ON DELETE CASCADE,
  CONSTRAINT `sachdanhmuc_ibfk_1` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sachdanhmuc`
--

LOCK TABLES `sachdanhmuc` WRITE;
/*!40000 ALTER TABLE `sachdanhmuc` DISABLE KEYS */;
INSERT INTO `sachdanhmuc` VALUES (100000,10000),(100000,10007),(100001,10000),(100001,10008),(100002,10000),(100002,10008),(100003,10000),(100003,10002),(100006,10000),(100006,10002),(100008,10000),(100008,10009),(100009,10007),(100009,10009),(100010,10000),(100010,10008),(100011,10004),(100011,10009),(100012,10000),(100012,10002),(100013,10000),(100013,10002),(100014,10000),(100014,10007),(100015,10000),(100015,10009),(100016,10004),(100016,10006),(100017,10000),(100017,10009),(100018,10001),(100018,10004),(100019,10000),(100019,10002);
/*!40000 ALTER TABLE `sachdanhmuc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sachluu`
--

DROP TABLE IF EXISTS `sachluu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sachluu` (
  `MaTaiKhoan` int(11) NOT NULL,
  `MaSach` int(11) NOT NULL,
  PRIMARY KEY (`MaTaiKhoan`,`MaSach`),
  KEY `sachluu_ibfk_2` (`MaSach`),
  CONSTRAINT `sachluu_ibfk_1` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `taikhoan` (`MaTaiKhoan`),
  CONSTRAINT `sachluu_ibfk_2` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sachluu`
--

LOCK TABLES `sachluu` WRITE;
/*!40000 ALTER TABLE `sachluu` DISABLE KEYS */;
INSERT INTO `sachluu` VALUES (100000,100011);
/*!40000 ALTER TABLE `sachluu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sachtacgia`
--

DROP TABLE IF EXISTS `sachtacgia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sachtacgia` (
  `MaSach` int(11) NOT NULL,
  `MaTacGia` int(11) NOT NULL,
  PRIMARY KEY (`MaSach`,`MaTacGia`),
  KEY `MaTacGia` (`MaTacGia`),
  CONSTRAINT `sachtacgia_ibfk_1` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`) ON DELETE CASCADE,
  CONSTRAINT `sachtacgia_ibfk_2` FOREIGN KEY (`MaTacGia`) REFERENCES `tacgia` (`MaTacGia`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sachtacgia`
--

LOCK TABLES `sachtacgia` WRITE;
/*!40000 ALTER TABLE `sachtacgia` DISABLE KEYS */;
INSERT INTO `sachtacgia` VALUES (100000,100011),(100001,100012),(100002,100014),(100003,100018),(100005,100021),(100006,100015),(100008,100024),(100009,100013),(100010,100012),(100011,100014),(100012,100018),(100013,100013),(100014,100021),(100015,100015),(100016,100011),(100017,100024),(100018,100013),(100019,100011),(100021,100012),(100023,100018),(100024,100013),(100025,100021),(100026,100015),(100028,100024),(100029,100011),(100030,100012),(100031,100013),(100036,100013),(100037,100024);
/*!40000 ALTER TABLE `sachtacgia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tacgia`
--

DROP TABLE IF EXISTS `tacgia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tacgia` (
  `MaTacGia` int(11) NOT NULL AUTO_INCREMENT,
  `TenTacGia` varchar(255) DEFAULT NULL,
  `TieuSu` text DEFAULT NULL,
  `CreatedAt` datetime DEFAULT current_timestamp(),
  `UpdatedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`MaTacGia`)
) ENGINE=InnoDB AUTO_INCREMENT=100030 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tacgia`
--

LOCK TABLES `tacgia` WRITE;
/*!40000 ALTER TABLE `tacgia` DISABLE KEYS */;
INSERT INTO `tacgia` VALUES (0,'Đang cập nhật',NULL,'2024-11-25 21:56:12','2024-11-25 21:56:37'),(100010,'Nguyễn Nhật Ánh','Nhà văn nổi tiếng với các tác phẩm dành cho thanh thiếu niên.','2024-11-26 13:52:45','2024-11-26 13:52:45'),(100011,'Tô Hoài','Nhà văn Việt Nam với tác phẩm nổi tiếng \"Dế Mèn Phiêu Lưu Ký\".','2024-11-26 13:52:45','2024-11-26 13:52:45'),(100012,'J.K. Rowling','Tác giả người Anh, nổi tiếng với loạt truyện \"Harry Potter\".','2024-11-26 13:52:45','2024-11-26 13:52:45'),(100013,'Paulo Coelho','Nhà văn Brazil với tác phẩm \"Nhà Giả Kim\".','2024-11-26 13:52:45','2024-11-26 13:52:45'),(100014,'J.R.R. Tolkien','Tác giả của \"Chúa Tể Những Chiếc Nhẫn\".','2024-11-26 13:52:45','2024-11-26 13:52:45'),(100015,'Victor Hugo','Nhà văn Pháp nổi tiếng với tác phẩm \"Những Người Khốn Khổ\".','2024-11-26 13:52:45','2024-11-26 13:52:45'),(100016,'Lỗ Tấn','Nhà văn Trung Quốc với các tác phẩm phản ánh xã hội.','2024-11-26 13:52:45','2024-11-26 13:52:45'),(100017,'Fyodor Dostoevsky','Nhà văn Nga với tác phẩm \"Tội Ác và Trừng Phạt\".','2024-11-26 13:52:45','2024-11-26 13:52:45'),(100018,'Nguyễn Du','Tác giả truyện thơ \"Truyện Kiều\".','2024-11-26 13:52:45','2024-11-26 13:52:45'),(100019,'Nam Cao','Nhà văn hiện thực phê phán nổi tiếng của Việt Nam.','2024-11-26 13:52:45','2024-11-26 13:52:45'),(100020,'Hemingway','Nhà văn Mỹ nổi tiếng với \"Ông Già và Biển Cả\".','2024-11-26 13:52:45','2024-11-26 13:52:45'),(100021,'George Orwell','Tác giả của \"Trại Súc Vật\" và \"1984\".','2024-11-26 13:52:45','2024-11-26 13:52:45'),(100022,'Lev Tolstoy','Tác giả của \"Chiến Tranh và Hòa Bình\".','2024-11-26 13:52:45','2024-11-26 13:52:45'),(100023,'Nguyễn Huy Thiệp','Nhà văn Việt Nam với các tác phẩm hiện thực.','2024-11-26 13:52:45','2024-11-26 13:52:45'),(100024,'Haruki Murakami','Nhà văn Nhật Bản nổi tiếng với \"Rừng Nauy\".','2024-11-26 13:52:45','2024-11-26 13:52:45'),(100025,'Gabriel Garcia Marquez','Tác giả người Colombia, nổi tiếng với \"Trăm Năm Cô Đơn\".','2024-11-26 13:52:45','2024-11-26 13:52:45'),(100026,'Nguyễn Trãi','Danh nhân văn hóa và nhà thơ lớn của Việt Nam.','2024-11-26 13:52:45','2024-11-26 13:52:45'),(100027,'Albert Camus','Nhà văn Pháp với tác phẩm \"Kẻ Xa Lạ\".','2024-11-26 13:52:45','2024-11-26 13:52:45'),(100028,'Charles Dickens','Nhà văn Anh với tác phẩm \"Oliver Twist\".','2024-11-26 13:52:45','2024-11-26 13:52:45'),(100029,'Ngô Thừa Ân','Tác giả của \"Tây Du Ký\".','2024-11-26 13:52:45','2024-11-26 13:52:45');
/*!40000 ALTER TABLE `tacgia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taikhoan`
--

DROP TABLE IF EXISTS `taikhoan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `taikhoan` (
  `MaTaiKhoan` int(11) NOT NULL AUTO_INCREMENT,
  `TenDangNhap` varchar(50) DEFAULT NULL,
  `MatKhauHash` varchar(255) DEFAULT NULL,
  `MaVaiTro` int(11) DEFAULT 1,
  `MaTrangThai` int(11) DEFAULT 3,
  `HoTen` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Cccd` varchar(13) DEFAULT NULL,
  `DienThoai` varchar(20) DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `URL_HinhNguoiDung` varchar(255) DEFAULT NULL,
  `CreatedAt` datetime DEFAULT current_timestamp(),
  `UpdatedAt` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`MaTaiKhoan`),
  UNIQUE KEY `TenDangNhap` (`TenDangNhap`),
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `Cccd` (`Cccd`),
  KEY `MaVaiTro` (`MaVaiTro`),
  KEY `MaTrangThai` (`MaTrangThai`),
  CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`MaVaiTro`) REFERENCES `vaitro` (`MaVaiTro`),
  CONSTRAINT `taikhoan_ibfk_2` FOREIGN KEY (`MaTrangThai`) REFERENCES `trangthai` (`MaTrangThai`)
) ENGINE=InnoDB AUTO_INCREMENT=100030 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taikhoan`
--

LOCK TABLES `taikhoan` WRITE;
/*!40000 ALTER TABLE `taikhoan` DISABLE KEYS */;
INSERT INTO `taikhoan` VALUES (100000,'huy','123',3,1,'Thái Anh Huy','huy@gmail.com','456879546154','0839557570','Vinh - Nghệ An','user.png','2024-10-08 13:40:54','2024-10-08 13:46:50'),(100001,'quynh','123',2,2,'Nguyễn Thị Thúy Quỳnh','khoai@gmail.com','456789451234','01234567891','Phan Thiết - Bình Thuận','user.png','2024-10-08 13:46:46','2024-12-10 14:34:22'),(100002,'thai','123',1,1,'Lữ Quang Thái','thai@gmail.com','153987561254','01554687984','Vinh - Nghệ An','user.png','2024-10-08 13:51:34','2024-12-10 21:02:34'),(100003,'nguyenvana','hashedpassword1',1,1,'Nguyễn Văn An','nguyenvana@gmail.com','012345678901','0912345678','Hà Nội',NULL,'2024-11-25 21:58:59','2024-12-21 16:11:31'),(100004,'tranthib','hashedpassword2',1,1,'Trần Thị Bình','tranthib@gmail.com','012345678902','0923456789','Hồ Chí Minh',NULL,'2024-11-25 21:58:59','2024-11-25 21:58:59'),(100005,'leminhc','hashedpassword3',2,1,'Lê Minh Châu','leminhc@gmail.com','012345678903','0933456780','Đà Nẵng',NULL,'2024-11-25 21:58:59','2024-11-25 21:58:59'),(100006,'phamvand','hashedpassword4',2,1,'Phạm Văn Đại','phamvand@gmail.com','012345678904','0943456781','Hải Phòng',NULL,'2024-11-25 21:58:59','2024-11-25 21:58:59'),(100007,'hoangthie','hashedpassword5',1,1,'Hoàng Thị Em','hoangthie@gmail.com','012345678905','0953456782','Cần Thơ',NULL,'2024-11-25 21:58:59','2024-11-25 21:58:59'),(100008,'dangquangf','hashedpassword6',2,1,'Đặng Quang Phúc','dangquangf@gmail.com','012345678906','0963456783','Nha Trang',NULL,'2024-11-25 21:58:59','2024-11-25 21:58:59'),(100009,'trinhminhg','hashedpassword7',2,1,'Trịnh Minh Giang','trinhminhg@gmail.com','012345678907','0973456784','Huế',NULL,'2024-11-25 21:58:59','2024-11-25 21:58:59'),(100010,'vothih','hashedpassword8',1,2,'Võ Thị Hằng','vothih@gmail.com','012345678908','0983456785','Quảng Ninh',NULL,'2024-11-25 21:58:59','2024-11-25 21:58:59'),(100011,'nguyenthii','hashedpassword9',3,1,'Nguyễn Thị Ý','nguyenthii@gmail.com','012345678909','0993456786','Hà Tĩnh',NULL,'2024-11-25 21:58:59','2024-11-25 21:58:59'),(100012,'tranvanj','hashedpassword10',1,3,'Trần Văn Khang','tranvanj@gmail.com','012345678910','0903456787','Bắc Ninh',NULL,'2024-11-25 21:58:59','2024-12-10 21:36:11'),(100013,'ngothik','hashedpassword11',2,1,'Ngô Thị Kim','ngothik@gmail.com','012345678911','0913456788','Thanh Hóa',NULL,'2024-11-25 21:58:59','2024-11-25 21:58:59'),(100014,'doanvand','hashedpassword12',1,3,'Đoàn Văn Dũng','doanvand@gmail.com','012345678912','0923456789','Đắk Lắk',NULL,'2024-11-25 21:58:59','2024-12-10 21:03:14'),(100015,'ngoclyl','hashedpassword13',2,1,'Ngọc Ly Lan','ngoclyl@gmail.com','012345678913','0933456790','Phú Quốc',NULL,'2024-11-25 21:58:59','2024-11-25 21:58:59'),(100016,'phamthim','hashedpassword14',1,1,'Phạm Thị Mai','phamthim@gmail.com','012345678914','0943456791','Quảng Nam',NULL,'2024-11-25 21:58:59','2024-11-25 21:58:59'),(100017,'hoangthun','hashedpassword15',2,1,'Hoàng Thúy Ngân','hoangthun@gmail.com','012345678915','0953456792','Nam Định',NULL,'2024-11-25 21:58:59','2024-11-25 21:58:59'),(100018,'dinhvant','hashedpassword16',1,1,'Đinh Văn Tâm','dinhvant@gmail.com','012345678916','0963456793','Lâm Đồng',NULL,'2024-11-25 21:58:59','2024-11-25 21:58:59'),(100019,'nguyenthio','hashedpassword17',2,1,'Nguyễn Thị Oanh','nguyenthio@gmail.com','012345678917','0973456794','Tiền Giang',NULL,'2024-11-25 21:58:59','2024-11-25 21:58:59'),(100020,'buitongp','hashedpassword18',1,1,'Bùi Tống Phương','buitongp@gmail.com','012345678918','0983456795','Long An',NULL,'2024-11-25 21:58:59','2024-12-10 21:01:11'),(100021,'hoangquocq','hashedpassword19',1,1,'Hoàng Quốc Quân','hoangquocq@gmail.com','012345678919','0993456796','Bình Dương',NULL,'2024-11-25 21:58:59','2024-11-25 21:58:59'),(100022,'vudangr','hashedpassword20',2,1,'Vũ Đăng Nhật','vudangr@gmail.com','012345678920','0903456797','Vĩnh Long',NULL,'2024-11-25 21:58:59','2024-11-25 21:58:59'),(100023,'vinh','123',1,1,NULL,'123@gmail.com','123515234',NULL,NULL,NULL,'2024-12-10 15:58:04','2024-12-10 16:00:38'),(100024,'123','12345678',1,1,'huy','123','123','123','123','ava.jpg','2024-12-10 16:10:01','2024-12-10 18:22:56'),(100025,'vinh123','123',1,1,'Phạm Quang Vinh','vinh@gmail.com','827149721834','0812347129','vinh','anh-den-ngau.jpeg','2024-12-10 16:11:42','2024-12-10 16:11:42'),(100029,'1234','123',1,1,'123','1234','1234','123','123','ava.jpg','2024-12-10 16:45:46','2024-12-10 21:02:39');
/*!40000 ALTER TABLE `taikhoan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trangthai`
--

DROP TABLE IF EXISTS `trangthai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trangthai` (
  `MaTrangThai` int(11) NOT NULL AUTO_INCREMENT,
  `TenTrangThai` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`MaTrangThai`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trangthai`
--

LOCK TABLES `trangthai` WRITE;
/*!40000 ALTER TABLE `trangthai` DISABLE KEYS */;
INSERT INTO `trangthai` VALUES (1,'Hoạt động'),(2,'Khóa'),(3,'Chờ xác nhận');
/*!40000 ALTER TABLE `trangthai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vaitro`
--

DROP TABLE IF EXISTS `vaitro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vaitro` (
  `MaVaiTro` int(11) NOT NULL AUTO_INCREMENT,
  `TenVaiTro` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`MaVaiTro`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vaitro`
--

LOCK TABLES `vaitro` WRITE;
/*!40000 ALTER TABLE `vaitro` DISABLE KEYS */;
INSERT INTO `vaitro` VALUES (1,'Độc giả'),(2,'Nhân viên'),(3,'Admin');
/*!40000 ALTER TABLE `vaitro` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-08 16:02:59
