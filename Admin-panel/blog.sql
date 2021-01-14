-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 13 Haz 2016, 05:27:46
-- Sunucu sürümü: 5.6.17
-- PHP Sürümü: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `blog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE IF NOT EXISTS `kategoriler` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_adi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_aciklama` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`kategori_id`, `kategori_adi`, `kategori_aciklama`) VALUES
(1, 'php', 'php ile ilgili dersler'),
(2, 'css', 'css ile ilgili dersler'),
(3, 'html', 'html ile ilgili dersler');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `konular`
--

CREATE TABLE IF NOT EXISTS `konular` (
  `konu_id` int(11) NOT NULL AUTO_INCREMENT,
  `konu_ekleyen` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `konu_baslik` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `konu_aciklama` varchar(1200) COLLATE utf8_turkish_ci NOT NULL,
  `konu_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `konu_durum` int(11) NOT NULL,
  `konu_kategori` int(11) NOT NULL,
  `konu_hit` int(11) NOT NULL,
  PRIMARY KEY (`konu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=249 ;

--
-- Tablo döküm verisi `konular`
--

INSERT INTO `konular` (`konu_id`, `konu_ekleyen`, `konu_baslik`, `konu_aciklama`, `konu_tarih`, `konu_durum`, `konu_kategori`, `konu_hit`) VALUES
(82, 'mehmet', 'Php Dersleri 36 Sayfalama Yapımı', 'bu videomuzda gelişmiş sayfalama yapımını gorucez bu sayfalama yontemini sitenizde istediğiniz gibi kullanabilirsiniz iyi seyirler videomuzu asagıdan izleyebilir derste kullanılan kodların tamamını indirme linklerinide videonun açıklama kısmında bulabilirsiniz...', '2016-06-06 17:42:42', 1, 1, 4),
(83, 'mehmet', 'Pc Toplama Rehberi Soru Cevap', 'PC TOPLAMA SORU,CEVAP\r\n\r\nmerhaba arkadaslar bu videomuzda pc toplama ile ilgili sıkçca sorulan sorulara cevap veriyoruz iyi seyirler....', '2016-06-06 17:43:26', 1, 2, 9),
(84, 'mehmet', 'Kurumsal Firma Scripti Kurulum Ve İndirme Linki', 'kurumsal Firma Scripti İndir..\r\nBugunku videomuzda mukemmel bir kurumsal firma scriptini kurmayı gorucez arkadaslar scriptin indirme linkleri ve kurulum anlatımı videoda anlatılmıstır iyi seyirler youtube kanalıma abone olmayı unutmayın..\r\n', '2016-06-06 17:48:23', 0, 1, 0),
(85, 'mehmet', '174 Tane Site Kurulumu Tamamen Ücretsiz', '<img src=''http://i.hizliresim.com/kvn8Gm.png''/>\r\nÜcretsiz 174 Site Kurulumu\r\n\r\n\r\nbu videoda tamamen istediğiniz gibi duzenleyebileceğiniz tam 174 farklı site kurulumunu anlattık her kosisini duzenleme yapabileceginiz scriptler okadar basitki ayrıca tamamı full türkce videoyu izleyince zaten anlıcaksınız iyi seyirler...nasıl kurulum yapılcagı indirilcegi videoda anlatılmıstır...', '2016-06-06 17:49:12', 1, 1, 2),
(86, 'mehmet', 'Site logosu nasıl yapılır ?', '<img src=''http://i.hizliresim.com/v4nN6v.png''/>\r\nSite Logosu Yapmak\r\nbu videomuzda en kolay bir sekilde site logosu nasıl yapılır bunu anlattım videoyu asagıdan izleyebilir kanalımıza abone olarak yeni gelismelerden haberdar olabilirsiniz iyi seyirler videoyu asagıdan izleyebilirsiniz....', '2016-06-06 17:56:58', 1, 1, 5),
(157, 'mehmet', 'tavsan kebabı', '<img src="http://i.hizliresim.com/X4dGn6.jpg">\r\ngta 5 video game', '2016-06-11 02:20:40', 1, 1, 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesajlar`
--

CREATE TABLE IF NOT EXISTS `mesajlar` (
  `mesaj_id` int(11) NOT NULL AUTO_INCREMENT,
  `mesaj_kime` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj_gonderen` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj_konu` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj_aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `mesaj_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`mesaj_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=99 ;

--
-- Tablo döküm verisi `mesajlar`
--

INSERT INTO `mesajlar` (`mesaj_id`, `mesaj_kime`, `mesaj_gonderen`, `mesaj_konu`, `mesaj_aciklama`, `mesaj_tarih`) VALUES
(95, 'mehmet', 'mehmet', 'dfsf', 'sdfdfsf', '2016-02-21 14:03:30'),
(96, 'mehmet', 'mehmet', 'dfsf', 'sdfdfsf', '2016-02-21 14:03:35'),
(97, 'mehmet', 'mehmet', 'dfsf', 'sdfdfsf', '2016-02-21 14:03:37'),
(98, 'mehmet', 'mehmet', 'dfsf', 'sdfdfsf', '2016-02-21 14:03:39');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE IF NOT EXISTS `uyeler` (
  `uye_id` int(11) NOT NULL AUTO_INCREMENT,
  `uye_adi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `uye_sifre` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `uye_eposta` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `uye_durum` int(11) NOT NULL,
  `uye_onay` int(11) NOT NULL,
  PRIMARY KEY (`uye_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`uye_id`, `uye_adi`, `uye_sifre`, `uye_eposta`, `uye_durum`, `uye_onay`) VALUES
(1, 'mehmet', '1234', 'mehmet@hotmail.com', 1, 1),
(2, 'osman', '12', 'osman@hotmail.com', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE IF NOT EXISTS `yorumlar` (
  `yorum_id` int(11) NOT NULL AUTO_INCREMENT,
  `yorum_ekleyen` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `yorum_eposta` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `yorum_mesaj` text COLLATE utf8_turkish_ci NOT NULL,
  `yorum_konu_id` int(11) NOT NULL,
  `yorum_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `yorum_onay` int(11) NOT NULL,
  PRIMARY KEY (`yorum_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=33 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
