-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 03 May 2019, 19:03:25
-- Sunucu sürümü: 10.1.21-MariaDB
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `veritabani`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `icerikler`
--

CREATE TABLE `icerikler` (
  `icerik_tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL,
  `seo` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `img` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `konu` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `metin` varchar(5000) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `icerikler`
--

INSERT INTO `icerikler` (`icerik_tarih`, `id`, `seo`, `img`, `konu`, `metin`) VALUES
('2019-03-26 22:58:08', 1, 'ornek-icerik-buraya-tikla-yaziya-git', 'http://localhost/php_yorum/img/likes.jpg', 'Örnek İçerik Buraya Tıkla Yazıya Git', 'ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et d ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et d ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et d '),
('2018-04-26 22:58:08', 2, 'web-site-nasil-yapilir', 'http://localhost/php_yorum/img/site.jpg', 'Web Site Nasıl Yapılıraaaa', 'Kontrol yazısıdır dikkate almayınız. Deneme Devam '),
('2018-03-26 22:58:08', 4, 'ornek', 'http://localhost/php_yorum/img/likes.jpg', 'ornek', 'Örnek yazı.Örnek yazı.Örnek yazı.Örnek yazı.');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `icerikler`
--
ALTER TABLE `icerikler`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seo` (`seo`),
  ADD UNIQUE KEY `seo_2` (`seo`),
  ADD UNIQUE KEY `seo_3` (`seo`),
  ADD KEY `img_3` (`img`),
  ADD KEY `img_4` (`img`);
ALTER TABLE `icerikler` ADD FULLTEXT KEY `img` (`img`);
ALTER TABLE `icerikler` ADD FULLTEXT KEY `img_2` (`img`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `icerikler`
--
ALTER TABLE `icerikler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
