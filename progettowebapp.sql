-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Lug 18, 2024 alle 00:04
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progettowebapp`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(17, 5, 1, 3),
(28, 2, 4, 1),
(30, 2, 5, 1),
(31, 2, 3, 1),
(32, 2, 1, 3),
(33, 15, 1, 1),
(35, 15, 18, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image_url`) VALUES
(1, 'IPHONE 11 64 GB', 'La perfetta quantità di tutto:\nUn nuovo sistema a doppia fotocamera, per inquadrare più cose intorno a te. Il chip per smart­phone più veloce che ci sia, insieme a una batteria che ti dà una giornata intera di libertà, per fare più cose ancora più a lungo. E la più alta qualità video mai raggiunta da uno smart­phone, per ricordi più belli che mai.\n\nFare una brutta foto sta diventando impossibile:\nUn sistema a doppia fotocamera tutto nuovo. Passa dal grandangolo all’ultra-grandangolo e trova l’inquadratura perfetta per tutte le tue foto. L’interfaccia ridisegnata sfrutta la nuova fotocamera ultra-grandangolare per mostrarti quello che succede al di fuori dell’inquadratura e permetterti, se vuoi, di includerlo nello scatto.', 720.00, 'https://data.clickforshop.it/imgprodotto/apple-iphone-15-smartphone-6-1-memoria-256-gb-ios-17-apple-colore-green_428937.jpg'),
(2, 'IPHONE 11 PRO 64 GB', 'Un rivoluzionario sistema a tripla fotocamera con tantissime funzioni in più e la stessa facilità d’uso di sempre. Un passo avanti senza precedenti in fatto di autonomia. E un chip straordinario, che sfrutta ancora di più l’apprendimento automatico per ridefinire i limiti di ciò che uno smart­phone può fare. È nato il primo iPhone così potente da meritarsi il nome Pro.', 920.00, 'https://data.clickforshop.it/imgprodotto/apple-iphone-15-plus-smartphone-6-7-memoria-128-gb-ios-17-apple-colore-blue_430774.jpg'),
(3, 'IPHONE 11 PRO 256 GB', 'Un rivoluzionario sistema a tripla fotocamera con tantissime funzioni in più e la stessa facilità d’uso di sempre. Un passo avanti senza precedenti in fatto di autonomia. E un chip straordinario, che sfrutta ancora di più l’apprendimento automatico per ridefinire i limiti di ciò che uno smart­phone può fare. È nato il primo iPhone così potente da meritarsi il nome Pro.', 1100.00, 'https://data.clickforshop.it/imgprodotto/apple-iphone-15-smartphone-6-1-memoria-256-gb-ios-17-apple-colore-green_428937.jpg'),
(4, 'IPHONE 11 128 GB', 'Un nuovo sistema a doppia fotocamera, per inquadrare più cose intorno a te. Il chip per smart­phone più veloce che ci sia, insieme a una batteria che ti dà una giornata intera di libertà, per fare più cose ancora più a lungo. E la più alta qualità video mai raggiunta da uno smart­phone, per ricordi più belli che mai.', 800.00, 'https://data.clickforshop.it/imgprodotto/apple-iphone-15-smartphone-6-1-memoria-128-gb-ios-17-apple-colore-rosa_430716.jpg'),
(5, 'IPHONE 13 128 GB', 'Un nuovo sistema a doppia fotocamera, per inquadrare più cose intorno a te. Il chip per smart­phone più veloce che ci sia.', 900.00, 'https://data.clickforshop.it/imgprodotto/apple-iphone-15-pro-smartphone-6-1-memoria-256-gb-ios-17-apple-colore-titanium-natural_429042.jpg'),
(6, 'IPHONE 15 PRO', 'Super Retina XDR\r\nOLED all‑screen da 6,1\" (diagonale)\r\n2556×1179 pixel a 460 ppi\r\nIl display di iPhone 15 Pro è un rettangolo dagli angoli arrotondati; se si considera il corrispondente rettangolo con gli angoli retti, la diagonale misura 6,12\" (la superficie effettiva di visualizzazione è inferiore).', 1350.00, 'https://data.clickforshop.it/imgprodotto/apple-iphone-15-pro-smartphone-6-1-memoria-128-gb-ios-17-apple-colore-titanium-blue_428915.jpg'),
(7, 'IPHONE 15', 'Super Retina XDR\r\nOLED all‑screen da 6,1\" (diagonale)\r\n2556×1179 pixel a 460 ppi\r\nIl display di iPhone 15 è un rettangolo dagli angoli arrotondati; se si considera il corrispondente rettangolo con gli angoli retti, la diagonale misura 6,12\" (la superficie effettiva di visualizzazione è inferiore).', 900.00, 'https://data.clickforshop.it/imgprodotto/apple-iphone-15-smartphone-6-1-memoria-128-gb-ios-17-apple-colore-blue_430432.jpg'),
(8, 'IPHONE 14 Pro Max', 'Display Super Retina XDR\r\nOLED da 6,7\" (diagonale)\r\n2778×1284 pixel a 458 ppi\r\nTrue Tone e ampio spettro cromatico.', 850.00, 'https://data.clickforshop.it/imgprodotto/apple-iphone-15-pro-max-smartphone-6-7-memoria-512-gb-ios-17-apple-colore-titanium-white_430443.jpg'),
(9, 'IPHONE 13 Pro', 'Display Super Retina XDR\r\nOLED da 6,1\" (diagonale)\r\n2532×1170 pixel a 460 ppi\r\nTrue Tone e ProMotion.', 800.00, 'https://data.clickforshop.it/imgprodotto/apple-iphone-13-5g-smartphone-6-1-memoria-128-gb-ios-15-colore-midnight_377491.jpg'),
(10, 'IPHONE 12 Pro Max', 'Display Super Retina XDR\r\nOLED da 6,7\" (diagonale)\r\n2778×1284 pixel a 458 ppi\r\nTrue Tone e ampio spettro cromatico.', 799.00, 'https://data.clickforshop.it/imgprodotto/apple-iphone-15-pro-max-smartphone-6-7-memoria-512-gb-ios-17-apple-colore-titanium-white_430443.jpg'),
(11, 'IPHONE 15 PRO', 'Super Retina XDR\r\nOLED all‑screen da 6,1\" (diagonale)\r\n2556×1179 pixel a 460 ppi\r\nIl display di iPhone 15 Pro è un rettangolo dagli angoli arrotondati; se si considera il corrispondente rettangolo con gli angoli retti, la diagonale misura 6,12\" (la superficie effettiva di visualizzazione è inferiore).', 1350.00, 'https://data.clickforshop.it/imgprodotto/apple-iphone-15-pro-smartphone-6-1-memoria-128-gb-ios-17-apple-colore-titanium-blue_428915.jpg'),
(12, 'IPHONE 15 PRO Max', 'Display Super Retina XDR\r\nOLED da 6,7\" (diagonale)\r\n2796×1290 pixel a 460 ppi\r\nProMotion e True Tone.', 1500.00, 'https://data.clickforshop.it/imgprodotto/apple-iphone-15-pro-max-smartphone-6-7-memoria-512-gb-ios-17-apple-colore-titanium-white_430443.jpg'),
(13, 'IPHONE 13', 'Display Super Retina XDR\r\nOLED da 6,1\" (diagonale)\r\n2532×1170 pixel a 460 ppi\r\nTrue Tone e HDR10.', 750.00, 'https://data.clickforshop.it/imgprodotto/apple-iphone-13-5g-smartphone-6-1-memoria-128-gb-ios-15-colore-midnight_377491.jpg'),
(14, 'IPHONE 14', 'Display Super Retina XDR\r\nOLED da 6,1\" (diagonale)\r\n2532×1170 pixel a 460 ppi\r\nTrue Tone e ampio spettro cromatico.', 799.00, 'https://data.clickforshop.it/imgprodotto/apple-iphone-15-smartphone-6-1-memoria-128-gb-ios-17-apple-colore-blue_430432.jpg'),
(15, 'COVER IPHONE 15', 'Proteggi il tuo iPhone 15 con questa elegante cover in silicone. Resistente e leggera, offre una protezione ottimale contro urti e graffi, mantenendo un design sottile e raffinato.', 45.00, 'https://data.clickforshop.it/imgprodotto/iphone15-plus-si-case-sunshine_428241.jpg'),
(16, 'COVER IPHONE 14 Pro Max', 'Questa cover in pelle per iPhone 14 Pro Max è realizzata con materiali di alta qualità, offrendo una protezione superiore. Il suo design elegante e il colore blu notte aggiungono un tocco di classe al tuo dispositivo.', 50.00, 'https://data.clickforshop.it/imgprodotto/apple-mwyg2zm-a-cover-in-pelle-per-iphone-11-pro-colore-blu-notte_327775.jpg'),
(17, 'COVER IPHONE 13 Pro', 'La cover in silicone per iPhone 13 Pro è perfetta per proteggere il tuo telefono da urti e cadute. Disponibile in un accattivante colore rosso, aggiunge stile e sicurezza al tuo dispositivo.', 40.00, 'https://data.clickforshop.it/imgprodotto/iphone-13-si-case-red_374117.jpg'),
(18, 'COVER IPHONE 12 Pro Max', 'Proteggi il tuo iPhone 12 Pro Max con questa cover resistente e leggera. Realizzata in silicone di alta qualità, offre una presa confortevole e una protezione eccellente contro urti e graffi.', 42.00, 'https://data.clickforshop.it/imgprodotto/iphone15-promax-sicase-lightblue_428282.jpg'),
(19, 'COVER IPHONE 15 PRO', 'Questa cover per iPhone 15 PRO è il perfetto connubio tra stile e funzionalità. Il suo design elegante e la protezione avanzata la rendono indispensabile per chi vuole mantenere il proprio dispositivo al sicuro e alla moda.', 55.00, 'https://data.clickforshop.it/imgprodotto/iphone15-pro-si-case-pink_428259.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `repairs`
--

CREATE TABLE `repairs` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `estimated_completion` date DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `repairs`
--

INSERT INTO `repairs` (`id`, `description`, `status`, `start_date`, `estimated_completion`, `user_id`) VALUES
(20, 'sdcsdvd', 'In Attesa', '2024-07-18', NULL, 15);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `username`, `email`, `password`, `role`) VALUES
(1, 'peppe', 'peppe', 'peppe', 'peppe@gmail.com', '$2y$10$71k47reEKaaUUpbNVmCSduxDNJCXdtuAVuY7WaHWIaM.Ovo514cFi', 'admin'),
(2, 'admin', 'admin', 'admin', 'admin@gmail.com', '$2y$10$7ghKFo/mSLQKDwFCauGk7eVQeIMG2A1FW7JLsDXzRslj17DIzuIyO', 'superadmin'),
(4, 'Giuseppe', 'paippo', 'paippo', 'paippo@gmail.com', '$2y$10$zOfge5badPZDxxEK4Now0.Ugkahtmwc8uWKXO46YqhwRUCzcAS/PS', 'user'),
(5, 'pippo', 'pippo', 'pippo', 'pippo@gmail.com', '$2y$10$uBmFZsMqENEwEcshBYjz3e18cZ90NwpOn4qRgvIkCMMMp6/T/R7ru', 'user'),
(14, 'paolo', 'paolo', 'paolo', 'paolo@gmail.com', '$2y$10$KrxLCSknwssqaRe03kvyf.DQt0A8IaMFFwDutz54E65eEFNPSKhh.', 'admin'),
(15, 'Giuseppe', 'Di Vincenzo', 'giuseppedivi', 'divi@gmail.com', '$2y$10$WQewNEMA2j/zz96U/Vn/teWWVP/4TOtXEKWAWo/ftu70VymnkVn52', 'user');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indici per le tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `repairs`
--
ALTER TABLE `repairs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT per la tabella `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT per la tabella `repairs`
--
ALTER TABLE `repairs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Limiti per la tabella `repairs`
--
ALTER TABLE `repairs`
  ADD CONSTRAINT `repairs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
