-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 24, 2023 lúc 03:00 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `data_crawler`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `annotations`
--

CREATE TABLE `annotations` (
  `annotation_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `length` int(11) NOT NULL,
  `offset` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `annotation_type`
--

CREATE TABLE `annotation_type` (
  `type_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baidang`
--

CREATE TABLE `baidang` (
  `pmid` int(11) NOT NULL,
  `created` bigint(255) NOT NULL,
  `authors` varchar(244) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `accessions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `baidang`
--

INSERT INTO `baidang` (`pmid`, `created`, `authors`, `accessions`, `title`, `text`) VALUES
(36232774, 1666197264661, '\"Long M\", \"You C\", \"Song Q\", \"Hu LXJ\", \"Guo Z\", \"Yao Q\", \"Hou W\", \"Sun W\", \"Liang B\", \"Zhou X\",  \"Liu Y\", \"Hu T\"', '\"gene@6942\", \"gene@2099\", \"gene@3854\", \"gene@7033\", \"gene@4240\", \"gene@6280\", \"chemical@MESH:D004958\", \"gene@3852\" \"chemical@MESH:D005557\", \"gene@2064\", \"gene@389816\",\"gene@367\", \"disease@MESH:D001943\", \"gene@4250\", \"gene@5241\", \"gene@3169;3170;3171\", \"sp', 'AR Expression Correlates with Distinctive Clinicopathological and Genomic Features in Breast Cancer Regardless of ESR1 Expression Status', 'Androgen receptor (AR) expression is frequently observed in breast cancer, but its association with estrogen receptor (ER) expression in breast cancer remains unclear. This study analyzed the clinicopathological and molecular features associated with AR negativity in both ER-positive and ER-negative breast cancer, trying to elucidate the molecular correlation between AR and ER. Our results showed that AR negativity was associated with different clinicopathological characteristics and molecular features in ER-positive and ER-negative breast cancer. Moreover, AR-positive breast cancer has better clinicopathological features than AR-negative breast cancer, especially in the ER-negative subtype. These results suggest that the role of AR in ER-negative breast cancer is distinctive from that in ER-positive breast cancer.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_baidang`
--

CREATE TABLE `chitiet_baidang` (
  `id` int(11) NOT NULL,
  `pmid` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `offset` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiet_baidang`
--

INSERT INTO `chitiet_baidang` (`id`, `pmid`, `text`, `offset`) VALUES
(1, 36232774, 'Breast cancer was the most common malignancy in women, of which 70-80% of cases expressed steroid hormone receptors, including estrogen receptor (ER) and progesterone receptor (PR). ER-positive breast cancer was estrogen-dependent and was primarily driven by the activated ER pathway, which was also effectively used as a therapeutic target. As another hormonal receptor, the androgen receptor (AR) was expressed in 70-85% of all breast cancer cases, and that ratio was about 10-63% in triple-negative breast cancer (TNBC), which did not express ER, PR, or HER2. On the other hand, for ER-positive breast cancer, AR was expressed in 70-95% of cases, varying in different studies. The expression of AR was related to a good prognosis in early breast cancer in terms of both disease-free survival and overall survival. Moreover, in ER-positive and ER-negative cancer, the expression of AR was reported to have opposite prognostic values as AR expression was correlated with increased DFS in luminal breast cancer and decreased DFS in triple-negative breast cancer (TNBC).', 980);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `indexing`
--

CREATE TABLE `indexing` (
  `id` int(11) NOT NULL,
  `pmid` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offset` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `indexing`
--

INSERT INTO `indexing` (`id`, `pmid`, `name`, `offset`) VALUES
(1, 36232774, 'Introduction', 1),
(2, 36232774, 'Results', 2),
(3, 36232774, 'Discussion', 3),
(4, 36232774, 'Materials And Methods', 4),
(5, 36232774, 'Conclusions', 5),
(6, 36232774, 'Author Contributions', 6);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `annotations`
--
ALTER TABLE `annotations`
  ADD PRIMARY KEY (`annotation_id`);

--
-- Chỉ mục cho bảng `baidang`
--
ALTER TABLE `baidang`
  ADD PRIMARY KEY (`pmid`);

--
-- Chỉ mục cho bảng `chitiet_baidang`
--
ALTER TABLE `chitiet_baidang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `indexing`
--
ALTER TABLE `indexing`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `annotations`
--
ALTER TABLE `annotations`
  MODIFY `annotation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chitiet_baidang`
--
ALTER TABLE `chitiet_baidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `indexing`
--
ALTER TABLE `indexing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
