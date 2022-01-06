-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th1 06, 2022 lúc 09:02 AM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project_thuongmaidientu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_login`
--

DROP TABLE IF EXISTS `admin_login`;
CREATE TABLE IF NOT EXISTS `admin_login` (
  `admin_username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `admin_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`admin_username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_login`
--

INSERT INTO `admin_login` (`admin_username`, `admin_password`, `admin_name`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 'Administrator');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_img` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(10) NOT NULL,
  `total_price` int(12) NOT NULL,
  `product_code` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=306 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `product_name`, `product_price`, `product_img`, `qty`, `total_price`, `product_code`) VALUES
(305, 16, 'Samsung Galaxy Book Flex', 1225, 'uploaded_20335ac8c9dc3d6c6c05498d2d7ee174.jpg', 1, 1225, 'p1015');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `listproducts`
--

DROP TABLE IF EXISTS `listproducts`;
CREATE TABLE IF NOT EXISTS `listproducts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manu_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image1` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `image2` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image3` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image4` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `feature` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `dimensions` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `display_size` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_code` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `listproducts`
--

INSERT INTO `listproducts` (`id`, `name`, `manu_id`, `type_id`, `price`, `image1`, `image2`, `image3`, `image4`, `description`, `feature`, `created_at`, `dimensions`, `display_size`, `product_code`) VALUES
(1, 'IPhone 12 64GB', 1, 2, 2569, 'iphone-12-do-1-1-org.jpg', 'iphone-12-do-4-org.jpg', 'iphone-12-den-1-1-org.jpg', 'iphone-12-trang-1-1-org.jpg', 'In the last months of 2020, Apple has officially introduced to users as well as iFan the new generation of iPhone 12 series with a series of breakthrough features, completely transformed design, powerful performance and one of them. The combination of these two quality sensors has created a professional camera system that is no different from real cameras, easily providing absolutely sharp images, high detail and variety of modes. shooting for flexible users to use.On the front of the iPhone 12, the notch is made more compact and also houses a Face ID sensor that can quickly and accurately identify faces.\r\nApple also gives people a range of personality and unique colors on their iPhones so that users have the right to choose from different styles. iPhone 12 is equipped with a 6.1-inch Super Retina XDR OLED screen, giving you a large experience space as well as engaging entertainment moments on an extremely high-quality screen.', 0, '2020-06-24 14:16:13', 'Length 146.7 mm - Width 71.5 mm - Thickness 7.4 mm - Weight 164 g', 'OLED6.1\"Super Retina XDR', 'p1000'),
(2, 'IPhone 13 Pro Max 128GB', 1, 2, 3398, 'iphone-13-pro-max-gold-1-1.jpg', 'iphone-13-pro-max-gold-2.jpg', 'iphone-13-pro-max-grey-2.jpg', 'iphone-13-pro-max-silver-2.jpg', 'iPhone 13 Pro Max 128GB - the most anticipated super product in the second half of 2021 from Apple. The device has a design that is not very groundbreaking when compared to its predecessor, inside this is still a product with a super beautiful screen, the refresh rate is upgraded to 120 Hz smoothly, the camera sensor has a larger size, With powerful performance and power from Apple A15 Bionic, ready to conquer any challenge with you. The device has a design that is not very groundbreaking when compared to its predecessor, inside this is still a product with a super beautiful screen, the refresh rate is upgraded to 120 Hz smoothly.', 0, '2021-04-21 14:16:13', 'Length 160.8 mm - Width 78.1 mm - Thickness 7.65 mm - Weight 240 g', 'OLED6.7\"Super Retina XDR', 'p1001'),
(3, 'IPhone XR 64GB', 1, 2, 1355, 'iphone-xr-den-1-1-org.jpg', 'iphone-xr-den-4-org.jpg', 'iphone-xr-xanh-1-1-org.jpg', 'iphone-xr-xanh-2-org.jpg', 'As an iPhone with an affordable price tag, suitable for more customers, the iPhone XR is still favored with a powerful Apple A12 chip, a notch screen, and water and dust resistance. As an iPhone with an affordable price tag, suitable for more customers, the iPhone XR is still favored with a powerful Apple A12 chip, a notch screen, and water and dust resistance.', 1, '2021-05-20 14:22:14', 'Length 150.9 mm - Width 75.7 mm - Thickness 8.3 mm - Weight 194 g', 'IPS LCD6.1\"Liquid Retina', 'p1002'),
(4, 'IPhone 12 Pro Max 128GB', 1, 2, 3199, 'iphone-12-pro-max-xanh-duong-1-org.jpg', 'iphone-12-pro-max-xanh-duong-4-org.jpg', 'iphone-12-pro-max-xanh-duong-5-org.jpg', 'iphone-12-pro-max-bac-4-org.jpg', 'iPhone 12 Pro Max 128 GB a super smartphone from Apple. The machine has a completely powerful performance that meets many needs from users and has a luxurious, square design. iPhone 12 Pro Max 128 has a completely powerful performance that meets many needs from users and has a luxurious. The machine has a completely powerful performance that meets many needs from users and has a luxurious, square design.', 1, '2021-04-24 14:22:14', 'Length 160.8 mm - Width 78.1 mm - Thickness 7.4 mm - Weight 228 g', 'OLED6.7\"Super Retina XDR', 'p1003'),
(5, 'IPhone SE 128GB (2020) ', 1, 2, 1240, 'iphone-se-2020-do-1-1-org.jpg', 'iphone-se-2020-do-4-org.jpg', 'iphone-se-2020-do-5-1-org.jpg', 'iphone-se-2020-do-12-org.jpg', 'iPhone SE 2020 when it was released has satisfied millions of Apple followers. The device has an ultra-compact design like the iPhone 8, the A13 Bionic chip for great performance like the iPhone 11, iPhone SE 2020 when it was released has satisfied millions of Apple followers. The device has an ultra-compact design like the iPhone 8, the A13 Bionic chip for great performance like the iPhone 11, but the iPhone SE 2020 has an unexpectedly good price. but the iPhone SE 2020 has an unexpectedly good price.', 0, '2020-10-21 14:27:12', 'Length 138.4 mm - Width 67.3 mm - Thickness 7.3 mm - Weight 148 g', 'IPS LCD4.7\"', 'p1004'),
(6, 'Samsung Galaxy Z Fold3 5G 512GB', 2, 2, 4520, 'samsung-galaxy-z-fold-3-green2-org.jpg', 'samsung-galaxy-z-fold-3-green3-org.jpg', 'samsung-galaxy-z-fold-3-green-gc-org.jpg', 'samsung-galaxy-z-fold-3-5-org.jpg', 'Galaxy Z Fold3 5G marks Samsung\'s new step in the high-end folding phone segment when it is improved in durability and valuable upgrades in performance configuration, promising to bring a breakthrough user experience for users. The 512 GB NV Me PC le SSD provides quick boot times and software in seconds, you can remove the default hard drive to install another upgrade stick up to 1 TB. Not stopping there, Acer laptops support 1 expansion M.2 PCI e SSD slot and 1 SATA HDD slot (upgradable up to 2 TB) so you can expand more storage space, turning your laptop into a huge archive without other supporting equipment.', 1, '2021-05-22 14:27:13', 'Length 158.2 mm - Width 128.1 mm - Thickness 6.4 mm - Weight 271 g', 'Dynamic AMOLED 2XMain 7.6\" & Sub 6.2\"Full HD+', 'p1005'),
(7, 'Samsung Galaxy A03s', 2, 2, 986, 'samsung-galaxy-a03s-black-gc-org.jpg', 'samsung-galaxy-a03s-black-2.jpg', 'samsung-galaxy-a03s-black-4.jpg', 'samsung-galaxy-a03s-white-gc-org.jpg', 'In order to give users more choices in the segment, Samsung has launched another low-cost phone called Galaxy A03s. The 512 GB NVMe PCle SSD provides quick boot times and software in seconds, you can remove the default hard drive to install another upgrade stick up to 1 TB. Not stopping there, Acer laptops support 1 expansion M.2 PCIe SSD slot and 1 SATA HDD slot (upgradable up to 2 TB) so you can expand more storage space, turning your laptop into a huge archive without other supporting equipment. Compared to its predecessor Galaxy A02s, the device will have some new upgrades, which promises to be a product worth your experience.', 0, '2019-12-28 14:32:17', '164 mm long - 7.6 mm wide - 9.1 mm thick - 196 g', 'PLS LCD6.5\"HD+', 'p1006'),
(8, 'Samsung Galaxy Z Fold2 5G', 2, 2, 4530, 'samsung-galaxy-z-fold-2-den-1-org.jpg', 'samsung-galaxy-z-fold-2-den-5-org.jpg', 'samsung-galaxy-z-fold-2-den-6-org.jpg', 'samsung-galaxy-z-fold-2-den-7-org.jpg', 'Galaxy Z Fold 2 is the official name of Samsung\'s horizontal folding screen phone. With many pioneering upgrades in design, performance and camera, the promise of this will be a successful product from the world\'s largest phone manufacturer.Expanding viewing angle up to 178 degrees thanks to IPS panel combined with LED Backlit screen for vivid images without consuming less power, providing a vivid image space, suitable for graphic designers. or like to watch movies.\r\nAcer ComfyView screen technology helps to prevent the screen from being shiny and bright, thereby providing good visibility in bright sunlight, helping to limit blue light that is harmful to the eyes.', 1, '2021-05-27 14:32:17', 'Length 159.2 mm - Width 128.2 mm - Thickness 6.9 mm - Weight 282 g', 'Main: Dynamic AMOLED 2X, Secondary: Super AMOLEDMain 7.59\" & Secondary 6.23\" Full HD+', 'p1007'),
(9, 'Samsung Galaxy Z Flip3 5G 128GB ', 2, 2, 1450, 'samsung-galaxy-z-flip-3-kem-1-org.jpg', 'samsung-galaxy-z-flip-3-kem-2-org.jpg', 'samsung-galaxy-z-flip-3-kem-5-org.jpg', 'samsung-galaxy-z-flip-3-kem-6-org.jpg', 'During the Galaxy Unpacked event on August 11, Samsung officially launched a new generation of folding screen phone called Galaxy Z Flip3 5G 128GB.The 512 GB NVMe PCle SSD provides quick boot times and software in seconds, you can remove the default hard drive to install another upgrade stick up to 1 TB. Not stopping there, Acer laptops support 1 expansion M.2 PCIe SSD slot and 1 SATA HDD slot (upgradable up to 2 TB) so you can expand more storage space, turning your laptop into a huge archive without other supporting equipment. This is a super product with a clamshell folding screen with many improvements and impressive parameters, the product will definitely attract a lot of attention from users, especially women.', 1, '2021-02-22 14:37:29', '166 mm long - 72.2 mm wide - 6.9 mm thick - 183 g', 'Dynamic AMOLED 2XMain 6.7\" & Sub 1.9\" Full HD +', 'p1008'),
(10, 'Samsung Galaxy A51 (6GB/128GB)', 2, 2, 749, 'samsung-galaxy-a51-bac-inox-1-org.jpg', 'samsung-galaxy-a51-xanh-ngoc-1-org.jpg', 'samsung-galaxy-a51-bac-inox-4-org.jpg', 'samsung-galaxy-a51-xanh-ngoc-5-org.jpg', 'According to Strategy Analytics, Galaxy A51 is the World\'s Best-Selling Android Smartphone in the first quarter of 2020, the device owns a cluster of 4 cameras, including a macro camera that takes close-ups for the first time on a Samsung smartphone, an infinity edge-to-edge screen and a back. Striking diamond pattern. The key travel matches the Fullsize design, so you can act quickly and accurately to gain an advantage in the game battle. Besides, the keyboard is also equipped with RGB color changing backlight, can adjust colors and effects easily from Nitro Sense software to create accents and add excitement to the experience.', 0, '2019-07-15 14:37:29', 'Length 158.4 mm - Width 73.7 mm - Thickness 7.9 mm - Weight 172 g', 'Super AMOLED6.5\"Full HD+', 'p1009'),
(11, 'Laptop Apple MacBook Air M1 2020', 1, 1, 2455, 'macbook-air-m1-2020-gold-02-org.jpg', 'macbook-air-m1-2020-gold-03-org.jpg', 'macbook-air-m1-2020-gold-07-org.jpg', 'macbook-air-m1-2020-silver-03-org.jpg', 'The Apple MacBook Air M1 2020 laptop belongs to a luxury high-end laptop line with powerful configuration, conquering the office and graphic features you desire, long battery life, thin and light design that will meet the needs of customers. your work requirements.Modern Wi-Fi 6 (802.11ax) and bluetooth 5.1 wireless connection for fast data transmission speed, low latency, stable internet connection during the game.\r\nAcer Nitro 5 Gaming AN515 57 727J i7 (NH.QD9SV.005.) is one of the gaming laptops chosen by many gamers because of its impressive design, along with powerful configuration with an attractive price, for sure. you cannot ignore.', 0, '2020-09-23 14:42:38', 'Length 304.1 mm - Width 212.4 mm - Thickness 4.1 mm to 16.1 mm - Weight 1.29 kg', '13.3\"Retina (2560 x 1600)', 'p1010'),
(12, 'Laptop Apple MacBook Pro 16 M1 Max 2021', 1, 1, 9625, 'apple-macbook-pro-16-m1-max-2021-1.jpg', 'apple-macbook-pro-16-m1-max-2021-2.jpg', 'apple-macbook-pro-16-m1-max-2021-bac-4.jpg', 'apple-macbook-pro-16-m1-max-2021-5-2.jpg', 'Impressive with Apple MacBook Pro 16 M1 Max 2021 wearing a unique \"new suit\", attracting all eyes with a notch screen that first appeared in the Mac line and hidden inside is a powerful configuration set. great from the advanced M1 Max chip. The NVIDIA GeForce RTX 3050Ti 4 GB discrete graphics card is built on the ground-breaking NVIDIA Turing architecture, for smooth gameplay and beautiful graphics effects. You can be entertained with games at high settings such as GTA V, The Witcher 3, LOL, CS: GO, PUBG, ... or render 2D, 3D videos on Photoshop, AI,... a smooth way. The 512 GB NVMe PCle SSD provides quick boot times and software in seconds, you can remove the default hard drive to install another upgrade stick up to 1 TB. Not stopping there, Acer laptops support 1 expansion M.2 PCIe SSD slot and 1 SATA HDD slot (upgradable up to 2 TB) so you can expand more storage space, turning your laptop into a huge archive without other supporting equipment.', 1, '2021-06-06 14:42:38', 'Length 355.7 mm - Width 248.1 mm - Thickness 16.8 mm - Weight 2.2 kg', '16.2 inchLiquid Retina XDR display (3456 x 2234)120Hz', 'p1011'),
(13, 'Laptop Apple MacBook Pro 14 M1 Pro 2021', 1, 1, 1540, 'apple-macbook-pro-14-m1-pro-2021-10-core-cpu-1.jpg', 'apple-macbook-pro-14-m1-pro-2021-10-core-cpu-2.jpg', 'apple-macbook-pro-14-m1-pro-2021-10-core-cpu-4.jpg', 'macbook-pro-14-m1-pro-2021-bac-3.jpg', 'Apple MacBook Pro 14-inch M1 Pro 2021 makes a strong impression when wearing a look with many new, unique and attractive innovations along with powerful, top-notch performance from the modern M1 Pro chip, meeting optimally meet the needs of technology, technicians as well as professional content creators.The Apple M1 Max chip brings a super power with a 10-core structure and an internal speed of up to 400 GB/s memory bandwidth for Apple\'s performance to be about 70% faster than its predecessor Apple M1, since then. gives you an amazing processing speed that helps to solve basic to complex office tasks on Office 365 software as well as professional graphics on Figma, Photoshop, AI, Pr, AutoCAD, ...\r\nIntegrated with the above modern CPU is a 32-core GPU graphics card for 4 times faster performance than M1, enhanced graphics processing capabilities, satisfying your creative passion, 2D design, Efficient 3D, excellent video rendering, and significant power savings, 70% less than PC/laptop 8-core chip.', 1, '2021-10-19 14:47:04', 'Length 312.6 mm - Width 221.2 mm - Thickness 15.5 mm - Weight 1.6 kg', '14.2 inchLiquid Retina XDR display (3024 x 1964)120Hz', 'p1012'),
(14, 'Laptop Apple MacBook Pro M1 2020', 1, 1, 3500, 'space-1-org.jpg', 'space-2-org.jpg', 'space-3-org.jpg', 'space-5-org.jpg', 'Apple Macbook Pro M1 2020 with extremely powerful performance integrated with Apple M1 chip first appeared on the Mac line, this laptop promises to bring you an unprecedented \"Pro\" product.32 GB RAM memory multi-tasking is extremely smooth, speeding up data access, reducing waiting time, all operations are responded to immediately, you can easily open many design software to edit many image files Complex image just rendered. The massive 1 TB SSD provides ample memory space, allowing you to store your personal documents, creative photos, videos, and your favorite movies, and at the same time. Open 8K videos instantly, or store hundreds of RAW images at once. The Mac OS operating system makes the computer interface highly aesthetic, inspiring to work immediately for users every time they turn on the device, convenient to operate, easy to use and a massive application store.', 0, '2020-11-20 14:47:04', 'Length 304.1 mm - Width 212.4 mm - Thickness 15.6 mm - Weight 1.4 kg', '13.3\"Retina (2560 x 1600)', 'p1013'),
(15, 'Samsung Notebook 9', 2, 1, 2450, 'uploaded_c100e833bf7ccb3d581c72939c3674f9.jpg', 'uploaded_8f7b691fef8aa96adfc944ffe06391b0.jpg', 'uploaded_1e9bc050c281b6be80d7ebc728b5078e.jpg', 'uploaded_c052010832f297d711f8c7fb7e2abb36.jpg', 'Samsung Notebook 9 is a product of Samsung, a famous brand of technology devices from Korea. The design of this laptop is one of its advantages, with a weight of only 0.84kg for the 13\" version and 1.29kg for the 15\" version, which is very convenient to carry when going out and easy to use. Easy to use anytime, anywhere. The screen refresh rate up to 120 Hz increases the refresh rate, automatically adjusts to match the movement of the displayed content, all movie animations are smooth and eye-catching, achieving remarkable efficiency when performing video games. Custom commands on graphics applications as well as the ability to fight entertainment games at medium - high settings.\r\nWide color range (P3) with 1 billion colors with good color reproduction, high contrast for colors that are always fresh and brilliant, large screen brightness to bring very vivid experience frames, like life. In addition, True Tone technology automatically adjusts color and brightness to suit the environment in use, ensuring image quality is always displayed accurately and most realistically.', 0, '2021-05-11 14:54:39', 'Length 355.7 mm - Width 248.1 mm - Thickness 16.8 mm - Weight 2.2 kg', '15.6\" LCD', 'p1014'),
(16, 'Samsung Galaxy Book Flex', 2, 1, 1225, 'uploaded_20335ac8c9dc3d6c6c05498d2d7ee174.jpg', 'uploaded_0d69be263aeb242d285747dc836c64d8.jpg', 'uploaded_aa281a6faf8b9fe45d92b109ced0919f.jpg', 'uploaded_87caa0968f68b96e0b59cb51ebcf677d.jpg', 'Laptop Samsung Galaxy Book Flex is a laptop running Windows 10 Home operating system, clocked at 3.7GHz to help it run smoothly and multitask. The laptop is equipped with a 13.3\" screen with IPS technology and a resolution of 1920 x 1080 pixels, providing sharp and realistic images. The Samsung Galaxy Book Flex laptop weighs only 1.2kg and is convenient to carry to work. everyday. The 6-speaker sound system includes 4 force-suppressing woofers for deeper, room-filling bass with up to 80% more bass, and 2 high-performance tweeters that deliver clearer, fuller vocals, more lively. Wide stereo sound combines Dolby Atmos technology to immerse you in music and movies with clear, detailed sound, full of width and depth. Features 3 studio-quality microphones with up to 60% lower noise that capture even the most subtle sounds, beam direction to keep your voice loud and clear, and a 1080p FaceTime HD camera with The wider lens allows capturing quality online images when making video calls via Google Meet, Line, Zoom, etc. to support learning and working remotely with optimal efficiency.', 1, '2021-08-30 14:54:39', 'Length 355.7 mm - Width 248.1 mm - Thickness 16.8 mm - Weight 2.2 kg', '16.2 inchLiquid Retina XDR display (3456 x 2234)120Hz', 'p1015'),
(17, 'Laptop Dell Vostro 3400 i5', 3, 1, 1420, 'dell-vostro-3400-i5-70253900-1.jpg', 'dell-vostro-3400-i5-70253900-2.jpg', 'dell-vostro-3400-i5-70253900-4.jpg', 'dell-vostro-3400-i5-70253900-13.jpg', 'With outstanding performance from the advanced Intel Gen 11 chip hidden inside a minimalist, elegant appearance, the Dell Vostro 3400 i5 laptop (70253900) will be one of the suggestions worth checking out and choosing buying. The Apple M1 Max chip brings a super power with a 10-core structure and an internal speed of up to 400 GB/s memory bandwidth for Apple\'s performance to be about 70% faster than its predecessor Apple M1, since then. gives you an amazing processing speed that helps to solve basic to complex office tasks on Office 365 software as well as professional graphics on Figma, Photoshop, AI, Pr, AutoCAD, ...\r\nIntegrated with the above modern CPU is a 32-core GPU graphics card for 4 times faster performance than M1, enhanced graphics processing capabilities, satisfying your creative passion, 2D design, Efficient 3D, excellent video rendering, and significant power savings, 70% less than PC/laptop 8-core chip.', 0, '2019-08-12 15:00:33', '328.7 mm long - 239.5 mm wide - 19.9 mm thick - 1.64 kg', '14\"Full HD (1920 x 1080)', 'p1016'),
(18, 'Laptop Dell Gaming G3 15 i7', 3, 1, 3250, 'dell-g3-15-i7-p89f002bwh-2-org.jpg', 'dell-g3-15-i7-p89f002bwh-1-org.jpg', 'dell-g3-15-i7-p89f002bwh-3-org.jpg', 'dell-g3-15-i7-p89f002bwh-4-org.jpg', 'Dell G3 15 i7 (P89F002BWH) laptop belongs to the line of gaming laptops with powerful configuration, elegant and very luxurious design, easy to choose for both people who go to read, go to work, is a good version to choose for both needs. demand for work, study and play games for entertainment. The screen refresh rate up to 120 Hz increases the refresh rate, automatically adjusts to match the movement of the displayed content, all movie animations are smooth and eye-catching, achieving remarkable efficiency when performing video games. Custom commands on graphics applications as well as the ability to fight entertainment games at medium - high settings.\r\nWide color range (P3) with 1 billion colors with good color reproduction, high contrast for colors that are always fresh and brilliant, large screen brightness to bring very vivid experience frames, like life. In addition, True Tone technology automatically adjusts color and brightness to suit the environment in use, ensuring image quality is always displayed accurately and most realistically.', 1, '2021-06-19 15:00:33', '364.46 mm long - 254 mm wide - 30.96 mm thick - 2.58 kg', '15.6\"Full HD (1920 x 1080)120Hz', 'p1017'),
(19, 'Apple Watch SE', 1, 5, 5692, 'untitled-1-org.jpg', 'se-40mm-vien-nhom-day-cao-su-hong-glr-1-org.jpg', 'se-40mm-vien-nhom-day-cao-su-hong-glr-2-org.jpg', 'se-40mm-vien-nhom-day-cao-su-hong-glr-3-org.jpg', 'Apple Watch SE 40mm aluminum frame with pink rubber band has a sturdy frame, rounded corners to make swiping and touching more comfortable. Ion-X strengthened glass with 1.57 inch size, clear display. Solid aluminum frame and high elastic rubber strap, smooth, comfortable to wear. WatchOS 7 makes performance the best it can be. The watch is suitable for many people of different ages with updated utility features in this operating system such as: Family Setup, hand washing recognition, screen sharing via iMessages, Siri quick translation, ...Helping users track, capture and improve their health, this Apple Watch 2021 also offers parameters such as: sleep tracking, calorie consumption, step counting, concentration monitoring blood oxygen,... and many other health care features.', 0, '2021-01-23 15:05:02', 'Length 40 mm - Width 34 mm - Thickness 10.7 mm - Weight 30.49g', 'OLED1.57 inch', 'p1018'),
(20, 'Apple Watch Series 7 LTE', 1, 5, 2154, 'apple-watch-series-7-lte-45mm-day-thep-bac-1.jpg', 'apple-watch-series-7-lte-45mm-day-thep-bac-2.jpg', 'apple-watch-series-7-lte-45mm-day-thep-vang-1.jpg', 'apple-watch-series-7-lte-45mm-day-thep-den-1.jpg', 'Apple Watch S7 LTE 45 mm has a sturdy, luxurious stainless steel frame with a soft curved design in the corner and 1.77-inch Sapphire glass (screen area increased by 20% compared to the old version). ), well protects the glass from impacts. The watch bezel is thinned by only 1.7 mm, creating a more overflowing feel (the border is 60% thinner than the Apple Watch S6).Users accidentally trip, lose balance and fall, Apple Watch will sound an alarm, after 15 seconds if the user does not handle the alarm, the watch will automatically send an emergency notification to the contact phone number. preset emergency contact. This is a great function that allows you to take better care of your family members, especially the elderly and young children.', 1, '2021-06-06 15:05:02', 'Length 45 mm - Width 38 mm - Thickness 10.7 mm - Weight 51.5g', 'OLED1.77 inch', 'p1019'),
(21, 'Samsung Galaxy Watch 3', 2, 5, 1544, 'samsung-galaxy-watch-3-45mm-bac-2-org.jpg', 'samsung-galaxy-watch-3-45mm-bac-3-org.jpg', 'samsung-galaxy-watch-3-45mm-bac-4-org.jpg', 'samsung-galaxy-watch-3-45mm-bac-5-org.jpg', 'Samsung Galaxy Watch 3 45mm silver steel border leather strap with 1.4-inch Super AMOLED panel and 360x360 pixels resolution, the watch has excellent display capabilities with vibrant colors, complete and clear display information. The bezel of the watch is made of sturdy and corrosion-resistant stainless steel. The watch is 5 ATM water resistant (according to ISO 22810:2010), can be used in shallow water activities such as swimming in a pool or in the sea, not recommended for scuba diving, surfing. waterboarding or other activities involving high-velocity water or submerging under shallow water. Turn on the waterproof lock feature before taking the product to swim, go to the rain, do not press the adjustment buttons, do not use in the sauna, hot bath.', 0, '2020-08-08 15:08:14', 'Length 46.2 mm - Width 45 mm - Thickness 11.1 mm - Weight 48.2g', 'SUPER AMOLED1.4 inch', 'p1020'),
(22, 'Samsung Galaxy Watch 4 LTE Classic 46mm', 2, 5, 560, 'samsung-galaxy-watch-4-lte-classic-46mm1-org.jpg', 'samsung-galaxy-watch-4-lte-classic-46mm2-org.jpg', 'samsung-galaxy-watch-4-lte-classic-46mm3-org.jpg', 'samsung-galaxy-watch-4-lte-classic-46mm4-1-org.jpg', 'Samsung Galaxy Watch 4 LTE Classic 46mm brings elegance and modernity with a sturdy stainless steel frame, SUPER AMOLED screen is covered by durable, good-strength Gorrilla Glass Dx+. The watch is 5 ATM water resistant (according to ISO 22810:2010), can be used in shallow water activities such as swimming in a pool or in the sea, not recommended for scuba diving, surfing. waterboarding or other activities involving high-velocity water or submerging under shallow water. Turn on the waterproof lock feature before taking the product to swim, go to the rain, do not press the adjustment buttons, do not use in the sauna, hot bath. Soft and lightweight silicone strap, high elasticity, waterproof, perforated design for users to breathe when wearing.', 1, '2021-07-10 15:08:14', 'Length 45.5 mm - Width 45.5 mm - Thickness 11 mm - Weight 52g', 'SUPER AMOLED1.36 inch', 'p1021'),
(23, 'Mi Watch', 5, 5, 860, 'xanh-1-org.jpg', 'xanh-2-org.jpg', 'xanh-3-org.jpg', 'mi-watch-1-org.jpg', 'This Mi Watch smart watch has a youthful, personality and sporty style. The watch is equipped with AMOLED screen technology with a size of 1.39 inches with a resolution of 454 x 454 pixels and a brightness of up to 450 nits to help users observe clear and quality information. Besides, the watch is also equipped with Gorilla Glass 3 tempered glass to limit scratches and increase durability for the device. With Siri assistant, the watch will bring you a more perfect experience. You can look up information, find an address or do anything you want with just a word. In this 2020 version, it supports some foreign languages ​​(no Vietnamese yet) with clear voice recognition, giving you more convenience.', 0, '2020-08-12 15:12:03', 'Length 53.3 mm - Width 45.9 mm - Thickness 11.8 mm - Weight 32g', 'AMOLED1.39 inch', 'p1022'),
(24, 'Mi Band 6', 5, 5, 92, 'mi-band-6-1-2-org.jpg', 'mi-band-6-2-1-org.jpg', 'mi-band-6-3-1-org.jpg', 'mi-band-6-8-org.jpg', 'The Mi Band 6 smart bracelet is the expected version of the Xiaomi house with an edge-to-edge screen design that gives you a better viewing angle. Scratch-resistant tempered glass surface and rubber strap with full wrist design, waterproof when worn, gives you a comfortable feeling all day long. You do not need to worry too much about the road when traveling or traveling alone thanks to the accurate GPS navigation feature built into this companion. You can easily know accurate information about your current location, distance traveled to help you be more proactive in long tripsThe watch is equipped with Samsung\'s breakthrough BioActive sensor, light sensor, geomagnetic sensor, accelerometer, etc. Thanks to these modern sensors, users can monitor and capture their status. Take a look at your own health more easily. Specifically, health indicators such as blood oxygen levels (SpO2), heart rate measurements or calories you have consumed.\r\nIn addition, the watch also comprehensively monitors your sleep, detects and analyzes your sleep stages, helping you improve your sleep better. Note, the sleep management function is only available when paired with a smartphone..', 0, '2019-03-15 15:12:03', 'Length 47.4 mm - Width 18.6 mm - Thickness 12.7 mm - Weight 12.8g', 'AMOLED1.56 inch', 'p1023'),
(25, 'Sony WF-C500 True Wireless Bluetooth Headset', 4, 4, 2530, 'bluetooth-true-wireless-sony-wf-c500-trang-2.jpg', 'bluetooth-true-wireless-sony-wf-c500-trang-3.jpg', 'bluetooth-true-wireless-sony-wf-c500-trang-4.jpg', 'bluetooth-true-wireless-sony-wf-c500-trang-7.jpg', 'The Sony WF-C500 True Wireless Bluetooth Headset is designed to be compact, with rounded edges to fit your ears for a comfortable wearing experience. You can optionally choose the right headset for your style and preferences with white, black, orange, and turquoise colors. Active Noise Cancellation: The headset will eliminate environmental sounds by using 2 microphones, 1 microphone facing out and 1 microphone facing in, to create a noise cancellation effect. This keeps your ears from being distracted by background noises, allowing you to immerse yourself in your own world of music or make important calls more focused.Transparency mode: In this mode, AirPods Pro allow outside sounds to enter your ears, making a connection with your surroundings quickly, microphones facing outwards and inwards undoing the isolation effect. acoustic isolation of the silicone earplugs so you hear everything naturally. Conversation Boost support focuses AirPods Pro on the person talking directly in front of you so you can hear them clearly even in very noisy surroundings.', 0, '2020-10-21 14:27:12', 'Bluetooth 5.0', '360 Reality AudioDSEE', 'p1024'),
(26, 'Headphone True Wireless Sony WF-1000XM4', 4, 4, 225, 'bluetooth-true-wireless-sony-wf-1000xm4-bme5-org.jpg', 'bluetooth-true-wireless-sony-wf-1000xm4-bme1-org.jpg', 'bluetooth-true-wireless-sony-wf-1000xm4-bme3-org.jpg', 'bluetooth-true-wireless-sony-wf-1000xm4-bme2-org.jpg', 'The Sony WF-1000XM4 True Wireless Bluetooth Headset is covered in a luxurious matte black color, with a compact design that is easy to carry around in your pocket. The charging box is designed with a gentle opening and closing magnet. The small housing size comes with 3 different sizes of soft earplugs for you to choose from to ensure comfortable wearing of in-ear headphones, tight grip on the ear and optimal noise cancellation support. On the other hand, the charging box has a rectangular shape that puts the headphones in a neat and secure standing style with a hinged design that fits snugly. Active Noise Cancellation: The headset will eliminate environmental sounds by using 2 microphones, 1 microphone facing out and 1 microphone facing in, to create a noise cancellation effect. This keeps your ears from being distracted by background noises, allowing you to immerse yourself in your own world of music or make important calls more focused.', 1, '2021-11-01 15:16:27', 'Noise Canceling HD QN1', 'Type-C', 'p1025'),
(27, 'True Wireless Galaxy Buds Pro Bluetooth Headset Silver', 2, 4, 345, 'tai-nghe-bluetooth-true-wireless-galaxy-buds-pro-bac-1-org.jpg', 'tai-nghe-bluetooth-true-wireless-galaxy-buds-pro-bac-3-org.jpg', 'tai-nghe-bluetooth-true-wireless-galaxy-buds-pro-bac-6-org.jpg', 'tai-nghe-bluetooth-true-wireless-galaxy-buds-pro-bac-7-org.jpg', 'The Samsung Buds Pro True Wireless Bluetooth Headset has a sleek and trendy look in two colors black and white. The new design takes on the classic headphone shape, which is able to alleviate the discomfort of long hours of use, and also fits securely in the ear when you exercise or exercise. This waterproof standard protects the Bluetooth headset from accidental rains when you move on the road, withstands sweat when you focus on training or playing sports. The small housing size comes with 3 different sizes of soft earplugs for you to choose from to ensure comfortable wearing of in-ear headphones, tight grip on the ear and optimal noise cancellation support. On the other hand, the charging box has a rectangular shape that puts the headphones in a neat and secure standing style with a hinged design that fits snugly.', 1, '2021-01-17 15:22:35', 'Type-C', 'Active Noise CancellationDolby Head Tracking', 'p1026'),
(28, 'Samsung Level U Pro Bluetooth Headset BN920C', 2, 4, 1340, 'tai-nghe-bluetooth-samsung-level-u-pro-bn920c-vang-1-org.jpg', 'tai-nghe-bluetooth-samsung-level-u-pro-bn920c-vang-2-org.jpg', 'tai-nghe-bluetooth-samsung-level-u-pro-bn920c-vang-5-org.jpg', 'tai-nghe-bluetooth-samsung-level-u-pro-bn920c-vang-7-org.jpg', 'The Samsung Level U Pro BN920C headset is luxuriously designed\r\nThe whole body of the headset is made of a plastic and rubber shell, the rubber part will help the headset contact the skin more smoothly and comfortably. The device has a maximum standby time of up to 300 hours and fully charges in just 1.5 hours via the common Micro USB port. Moreover, with the capacity of the charging box of 390 mAh, it prolongs the use time, allowing you to enjoy music and chat longer. On the charging box, there is a 4-level battery capacity indicator light for easy monitoring.Both earphones are already connected before factory, you don\'t need to connect them but in case they don\'t connect with each other (green and white light will blink continuously), you can reconnect by pressing hold the MFB button on both headphones at the same time, then press twice on the right headset until the left earphone flashes white, the right headset flashes green and white, then they have successfully connected.\r\nConnect a headset to the transmitter, take the headset out of the charging case, open the search function on the phone with Bluetooth enabled, select \"AT15\" and the connection is complete.\r\nConnect the 2 headphones to the transmitter, you take the 2 headphones out of the charging case, they will connect to each other, then go to the Bluetooth settings on the phone, find and select \"AT15\" and connect. The next time you use it, the phone and the headset will automatically connect.', 1, '2021-05-23 15:22:35', 'Use 9 hours - Charge 3 hours', 'NR/EC . Noise Reduction', 'p1027'),
(29, 'Camera IP Mi Home Xiaomi BHR4885GL', 5, 3, 78, 'camera-ip-mi-home-360-do-1080p-xiaomi-bhr4885gl-2-2-org.jpg', 'camera-ip-mi-home-360-do-1080p-xiaomi-bhr4885gl-3-1-org.jpg', 'camera-ip-mi-home-360-do-1080p-xiaomi-bhr4885gl-4-1-org.jpg', 'camera-ip-mi-home-360-do-1080p-xiaomi-bhr4885gl-6-1-org.jpg', 'Xiaomi Mi Home IP Camera BHR4885GL allows flexible use of multi-location drives with good anti-vibration ability, ensuring stability for observation data quality. The Logitech C505 is compactly crafted, weighing only 75 grams, with a luxurious black surface that blends perfectly with any device and living space. There is a USB cable length of 2 m and a common clip for you to conveniently arrange and change the webcam placement depending on different needs and usage situations. Webcam provides 720p video quality, 30 fps frame rate provides sharp, smooth frames, 60° diagonal field of view and the ability to fix focus, adjust lighting automatically according to the brightness of the environment for the image. True images, wide enough field of view to record in the office, at home.', 1, '2020-05-29 15:57:20', 'Length 11 cm - Width 7 cm - Height 11 cm', '108 degrees vertical rotation 360 degrees horizontal rotation', 'p1028'),
(30, 'Camera 1080P Xiaomi Mi Dash Cam 1S', 5, 3, 756, 'camera-hanh-trinh-1080p-xiaomi-mi-dash-cam-1s-den-1-org.jpg', 'camera-hanh-trinh-1080p-xiaomi-mi-dash-cam-1s-den-3-org.jpg', 'camera-hanh-trinh-1080p-xiaomi-mi-dash-cam-1s-den-4-org.jpg', 'camera-hanh-trinh-1080p-xiaomi-mi-dash-cam-1s-den-5-org.jpg', 'The Xiaomi Mi Dash Cam 1S Black camera creates sophistication in the car interior, ensuring a reliable data source for emergency use cases. Imou Cue 2E-D uses the H.265 image compression standard to reduce network bandwidth and storage usage by 50% with the same video quality to store more.\r\nSupport MicroSD memory card (up to 256GB) can store about 21 - 30 days of observation data. For larger storage needs, you can use an NVR or use a Cloud server to access stored data from anywhere and anytime you want.\r\nWhen the memory capacity is full, the oldest videos will be deleted to make room for new data. The 1080P Imou Cue 2E-D IP camera is small, delicate, and easy to hide in many different positions to get a good and safe viewing angle. Choose for compact desktop, shelf or wall mounting, and adjust the stand for the best viewing direction.', 0, '2020-02-15 15:57:20', 'Length 11 cm - Width 7 cm - Height 11 cm', 'LCD 2.7 inch', 'p1029'),
(31, 'Camera IP 1080P Xiaomi Mi Home Magnetic Mount', 5, 3, 610, 'ip-1080p-xiaomi-mi-home-magnetic-mount-qdj4065gl-1-org.jpg', 'ip-1080p-xiaomi-mi-home-magnetic-mount-qdj4065gl-3-org.jpg', 'ip-1080p-xiaomi-mi-home-magnetic-mount-qdj4065gl-5-org.jpg', 'ip-1080p-xiaomi-mi-home-magnetic-mount-qdj4065gl-8-org.jpg', 'You can choose Xiaomi Mi Home Magnetic Mount IP Camera QDJ4065GL for household space, or for public areas, office security systems...Equipped with a microphone and speakerphone, users can have 2-way conversations through the Imou Cue 2E-D, along with good noise filtering for clear, clear voice.\r\nIn addition, abnormal sounds such as baby crying, unusual pet noises, etc. will be recorded by Imou camera and broadcast warning messages to mobile devices for management so that users can recognize and deal with the information. timely and relevant information. The intelligent processor helps the Imou Cue 2E-D analyze and record unusual intrusions, automatically recording and storing the motion so that users can immediately watch this warning video instead of having to re-detect it. the whole video', 0, '2021-02-20 16:04:21', 'Full HD 1080p', '170° wide angle', 'p1030'),
(32, 'Camera 2K Xiaomi BHR4193GL', 5, 3, 1520, 'ip-mi-home-360-do-2k-pro-xiaomi-bhr4193gl-2-2-org.jpg', 'ip-mi-home-360-do-2k-pro-xiaomi-bhr4193gl-3-2-org.jpg', 'ip-mi-home-360-do-2k-pro-xiaomi-bhr4193gl-5-1-org.jpg', 'ip-mi-home-360-do-2k-pro-xiaomi-bhr4193gl-8-1-org.jpg', 'Mi Home 360 ​​Degree 2K Pro IP Camera Xiaomi BHR4193GL has a compact design, modern and sophisticated design, easy to use on a desk, shelf or ceiling mount, effective observation, good image quality, anti-vibration effective.Equipped with a microphone and speakerphone, users can have 2-way conversations through the Imou Cue 2E-D, along with good noise filtering for clear, clear voice.\r\nIn addition, abnormal sounds such as baby crying, unusual pet noises, etc. will be recorded by Imou camera and broadcast warning messages to mobile devices for management so that users can recognize and deal with the information. timely and relevant information.\r\nThe 1080P Imou Cue 2E-D IP camera is small, delicate, and easy to hide in many different positions to get a good and safe viewing angle. Choose for compact desktop, shelf or wall mounting, and adjust the stand for the best viewing direction.', 1, '2020-03-28 16:04:21', 'Length 12.5 cm - Width 7.7 cm - Height 12.5 cm', '2304 × 1296 2K', 'p1031'),
(33, 'Sony CyberShot DSC WX350', 4, 3, 452, 'sony-cybershot-dsc-wx350-may-anh-du-lich(1).jpg', 'sony-cybershot-dsc-wx350-may-anh-du-lich1.jpg', 'sony-cybershot-dsc-wx350-may-anh-du-lich4.jpg', 'sony-cybershot-dsc-wx350-may-anh-du-lich5.jpg', 'Sony\'s WX350 packs a 20x optical zoom into a surprisingly compact body - Sony claims it\'s the world\'s smallest and lightest camera. This Sony CyberShot DSC-WX350 camera has an 18 Megapixel sensor, 1080/50p/60p movie recording, built-in Wifi with NFC, and 10fps continuous shooting, making it quite capable for the price. Utility with 2-way talk, record abnormal sounds and broadcast alarms to mobile devices via Imou Life\r\nEquipped with a microphone and speakerphone, users can have 2-way conversations through the Imou Cue 2E-D, along with good noise filtering for clear, clear voice.\r\nIn addition, abnormal sounds such as baby crying, unusual pet noises, etc. will be recorded by Imou camera and broadcast warning messages to mobile devices for management so that users can recognize and deal with the information. timely and relevant information.', 1, '2020-10-24 16:15:19', 'Weight 137g', '20x optical zoom (25-500mm) 306x . digital zoom', 'p1032'),
(34, 'Sony CyberShot DSC WX350', 4, 3, 562, 'sony-cybershot-dsc-wx350-may-anh-du-lich(1).jpg', 'sony-cybershot-dsc-wx350-may-anh-du-lich1.jpg', 'sony-cybershot-dsc-wx350-may-anh-du-lich4.jpg', 'sony-cybershot-dsc-wx350-may-anh-du-lich5.jpg', 'Sony\'s WX350 packs a 20x optical zoom into a surprisingly compact body - Sony claims it\'s the world\'s smallest and lightest camera. This Sony CyberShot DSC-WX350 camera has an 18 Megapixel sensor, 1080/50p/60p movie recording, built-in Wifi with NFC, and 10fps continuous shooting, making it quite capable for the price. In parallel with the recording, the warning message is also transmitted immediately to the management mobile device, combined with the alarm sound on the camera (when selected to open) to confuse intruders, increase the level of alarm. security alert.Imou Life application can be installed on phones running Android and iOS operating systems, or on computers and laptops to make data control, remote monitoring and monitoring simple and effective.\r\nThe application is used via Wifi or 3G/4G connection and you only need to register via phone number or email. Supported manual angle adjustment with a flexible rotating stand, 89° horizontal, 46° vertical, 108° diagonal viewing angle selectable recording angle to cover the space to be monitored, suitable for indoor use.', 1, '2020-10-24 16:15:19', 'Weight 137g', '20x optical zoom (25-500mm) 306x . digital zoom', 'p1033');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `manu_id` int(11) NOT NULL AUTO_INCREMENT,
  `manu_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`manu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`manu_id`, `manu_name`) VALUES
(1, 'Apple'),
(2, 'SamSung'),
(3, 'Dell'),
(4, 'Sony'),
(5, 'Xiaomi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oders_list`
--

DROP TABLE IF EXISTS `oders_list`;
CREATE TABLE IF NOT EXISTS `oders_list` (
  `oder_id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(3) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `oders_list`
--

INSERT INTO `oders_list` (`oder_id`, `username`, `product_id`, `quantity`, `price`) VALUES
(123, 'minhtrung', 5, 1, 1240),
(123, 'minhtrung', 20, 1, 2154),
(123, 'minhtrung', 31, 2, 1220),
(124, 'minhtrung', 22, 1, 560),
(125, 'minhtrung', 16, 1, 1225),
(125, 'minhtrung', 13, 1, 1540),
(126, 'minhtrung', 18, 1, 3250),
(127, 'minhtrung', 25, 1, 2530),
(127, 'minhtrung', 3, 1, 1355),
(128, 'minhtrung', 27, 1, 345),
(128, 'minhtrung', 19, 1, 5692),
(129, 'minhtrung', 12, 1, 9625),
(130, 'minhtrung', 23, 1, 860),
(130, 'minhtrung', 4, 1, 3199),
(130, 'minhtrung', 7, 1, 986),
(131, 'trungnguyen', 27, 1, 345),
(132, 'trungnguyen', 34, 1, 562),
(132, 'trungnguyen', 3, 1, 1355),
(132, 'trungnguyen', 12, 1, 9625),
(133, 'trungnguyen', 16, 1, 1225),
(134, 'trungnguyen', 21, 1, 1544),
(135, 'register', 16, 3, 3675);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address_customer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `order_date` timestamp NOT NULL,
  `payment_mode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `amount_paid` int(12) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=136 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `fullname`, `email`, `address_customer`, `phone`, `order_date`, `payment_mode`, `username`, `amount_paid`) VALUES
(123, 'Nguyễn Thị Thuý Hằng', 'trung@gmail.com', '30C đường 16, TP. Bà Rịa', '0364002254', '2021-05-20 06:02:09', 'cod', 'minhtrung', 4614),
(124, 'Nguyễn Thị Thuý Hằng', 'trung@gmail.com', '30C đường 16, TP. Bà Rịa', '0364002254', '2021-05-26 06:03:01', 'cards', 'minhtrung', 560),
(125, 'Nguyễn Thị Thuý Hằng', 'trung@gmail.com', '30C đường 16, TP. Bà Rịa', '0364002254', '2021-06-03 06:06:57', 'netbanking', 'minhtrung', 2765),
(126, 'Nguyễn Thị Thuý Hằng', 'trung@gmail.com', '30C đường 16, TP. Bà Rịa', '0364002254', '2021-08-24 06:08:07', 'netbanking', 'minhtrung', 3250),
(127, 'Nguyễn Minh Trung', 'trung@gmail.com', '120 đường số 3, Tp. Hồ Chí Minh', '0364021232', '2021-08-30 06:09:38', 'cards', 'minhtrung', 3885),
(128, 'Võ Thị Trúc Tiên', 'trung@gmail.com', 'Đường số 10, Xã An Phước, Tp. Bà Rịa', '0364002213', '2021-08-31 09:42:00', 'cards', 'minhtrung', 6037),
(129, 'Nguyễn Thị Thuý Hằng', 'trung@gmail.com', '130A30C đường 16, TP. Bà Rịa', '0364002254', '2021-10-06 09:45:19', 'cod', 'minhtrung', 9625),
(130, 'Võ Thị Trúc Tiên', 'trung@gmail.com', 'Đường số 10, Xã An Phước, Tp. Bà Rịa', '0364002254', '2021-10-27 10:15:26', 'cod', 'minhtrung', 5045),
(131, 'Nguyen Minh Trung', 'trung@mail.com', '120 đường số 3, Tp. Hồ Chí Minh', '0364002254', '2021-10-29 10:23:28', 'cod', 'trungnguyen', 345),
(132, 'Nguyen Minh Trung', 'trung@mail.com', '120 đường số 3, Tp. Hồ Chí Minh	', '0364002254', '2021-10-31 10:25:25', 'cod', 'trungnguyen', 11542),
(133, 'Nguyen Minh Trung', 'trung@mail.com', '120 đường số 3, Tp. Hồ Chí Minh', '0364002254', '2021-12-23 10:26:58', 'cod', 'trungnguyen', 1225),
(134, 'Nguyen Minh Trung', 'trung@mail.com', '30C đường 16, TP. Bà Rịa', '0364002254', '2021-12-23 10:28:02', 'netbanking', 'trungnguyen', 1544),
(135, 'Trung Nè', 'vietnq191@gmail.com', '120A', '01234568934', '2021-12-23 17:08:05', 'cards', 'register', 3675);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `protypes`
--

DROP TABLE IF EXISTS `protypes`;
CREATE TABLE IF NOT EXISTS `protypes` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`type_id`, `type_name`) VALUES
(1, 'Laptop'),
(2, 'Smartphone'),
(3, 'Camera'),
(4, 'Earphone'),
(5, 'Smartwatch');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `name`, `username`, `password`, `email`, `phone`) VALUES
(1, 'Nguyễn Thị Thuý Hằng', 'minhtrung', 'e10adc3949ba59abbe56e057f20f883e', 'trung@gmail.com', '0364002254'),
(32, 'Nguyen Minh Trung', 'trungnguyen', '21232f297a57a5a743894a0e4a801fc3', 'trung@mail.com', '0364002254'),
(33, 'Anh Nguyễn', 'paxphoenix6@gmail.com', '898653c8424ae9683a3ed114d7394608', 'paxphoenix6@gmail.com', '01234568934'),
(36, 'Trung Nè', 'register', '9de4a97425678c5b1288aa70c1669a64', 'vietnq191@gmail.com', '01234568934');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
