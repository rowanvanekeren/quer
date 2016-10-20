-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 20 okt 2016 om 09:49
-- Serverversie: 5.6.26
-- PHP-versie: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quer`
--

--
-- Gegevens worden geëxporteerd voor tabel `advertisements`
--

INSERT INTO `advertisements` (`id`, `user_id`, `event_id`, `private_description`, `price`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Wij willen graag 3 tickets voor in blok 139 (stoeltjes naast elkaar natuurlijk).  Wij kunnen zelf geen tickets bestellen omdat we dan op school zijn. Prijs per ticket is €65, dus voor 3 tickets komt het totaal op €195.', '195.0000', 1, '2016-10-06 08:40:44', '2016-10-06 08:40:44'),
(3, 2, 3, 'Ik wil graag zeker zijn van een plekje 24 april.  Wie wil er voor mij que''en voor 2 tickets in blok 122? (Prijs per ticket is €39)', '78.0000', 0, '2016-10-09 15:42:08', '2016-10-17 09:46:46'),
(4, 2, 4, 'Wij zijn met 5 vriendinnen die supergraag tickets willen voor Enrique.  Blok maakt niet zoveel uit (tussen 144 en 153), maar de plaatsen moeten wel naast elkaar zijn.', '245.0000', 1, '2016-10-09 16:02:50', '2016-10-09 16:02:50'),
(5, 2, 5, 'Wij hadden graag 2 combitickets!', '438.8000', 1, '2016-10-16 15:17:30', '2016-10-16 15:17:30');

--
-- Gegevens worden geëxporteerd voor tabel `categories`
--

INSERT INTO `categories` (`id`, `categorie`, `active`, `created_at`, `updated_at`) VALUES
(1, 'concerttickets', 1, NULL, NULL),
(2, 'festival', 1, NULL, NULL);

--
-- Gegevens worden geëxporteerd voor tabel `contracts`
--

INSERT INTO `contracts` (`id`, `quer_id`, `applicant_id`, `attachment`, `price`, `phase_id`, `advertisement_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, '25.5000', 1, 4, 1, '2016-10-09 19:55:06', '2016-10-09 19:55:06'),
(2, 3, 2, NULL, '15.0000', 1, 4, 1, '2016-10-13 06:00:45', '2016-10-13 06:00:45'),
(3, 3, 2, NULL, '10.0000', 2, 3, 1, '2016-10-16 16:57:21', '2016-10-17 09:46:46'),
(4, 4, 2, NULL, '22.0000', 3, 3, 1, '2016-10-17 09:06:09', '2016-10-17 09:46:46');

--
-- Gegevens worden geëxporteerd voor tabel `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `location`, `city`, `url`, `date_start_sell`, `date_event`, `image`, `tags`, `categorie_id`, `code`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Tickets Adele Sportpaleis', 'Volgend jaar is het zover. Adele komt naar België!\r\nOp 15 mei zet Adele het Sportpaleis op stelten met ook haar nieuwe hits "Hello" and "Send My Love".\r\nBelgië is het vierde land dat ze aandoet tijdens haar Europese tournee.\r\nWil jij er ook bij zijn?  Zorg dan dat je beschikbaar bent tijdens de start van de ticketverkoop, vrijdag 28 oktober om 9u30.', NULL, NULL, NULL, '2016-10-28 09:30:00', '2016-10-15 19:00:00', NULL, 'adele,sportpaleis,teleticket', 1, 1, 1, NULL, NULL),
(3, 'Concert The Script', 'The Script Scriptonize tour komt op 24 april naar het Sportpaleis.  Om 18u30 begint Milow in het voorprogramma en dan om 19u is het zover, The Script ! Voor het eerst sinds 3 jaar in België!', 'Sportpaleis', 'Antwerpen', '', '2016-11-09 09:30:00', '2017-04-24 18:30:00', '09-10-2016_3.jpg', 'script,sportpaleis,april', 1, 1, 1, '2016-10-09 15:40:43', '2016-10-09 15:40:43'),
(4, 'Enrique Iglesias Sex and Love Tour', 'Op 20 februari 2017 houdt de ‘Sex and Love Tour’ van Enrique Iglesias halt in het Sportpaleis. Wereldster Enrique brengt een wel zeer bijzondere gast mee. Voor het Europese luik van haar ‘Demi World Tour’ zal Demi Lovato als special guest optreden bij haar persoonlijke vriend Enrique. Fans van beide artiesten mogen zich nu al verheugen op een unieke avond vol topentertainment.', 'Sportpaleis', 'Antwerpen', 'https://www.sportpaleis.be/nl/kalender/2014-2015/enrique-iglesias', '2016-11-20 19:30:00', '2017-02-20 18:30:00', '09-10-2016_4.jpg', 'enrique,iglesias,sportpaleis,sex,and,love,februari', 1, 1, 1, '2016-10-09 16:00:36', '2016-10-09 16:00:36'),
(5, 'Rock Werchter 2017', 'Rock Werchter is een pop- en rockfestival dat elk jaar plaatsvindt in het dorpje Werchter, een deelgemeente van het Vlaams-Brabantse Rotselaar. Het Belgische muziekfestival vindt plaats in het laatste weekend van juni of het eerste van juli. Het is het grootste van België en een van de grootste en bekendste van de wereld.', 'Haachtsesteenweg 21', 'Rotselaar', 'http://www.rockwerchter.be/nl/nieuws/detail/er-zit-meer-in-je-ticket-registreer-en-win', '2017-01-06 09:30:00', '2017-07-01 09:00:00', '16-10-2016_5.jpg', 'rock werchter,festival', 2, 1, 1, '2016-10-16 15:11:51', '2016-10-16 15:11:51');

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_10_03_131149_events', 1),
('2016_10_03_131236_advertisements', 1),
('2016_10_03_131308_phases', 1),
('2016_10_03_131327_contracts', 1),
('2016_10_03_131625_reviews', 1),
('2016_10_03_131831_usr_adv', 1),
('2016_10_03_142134_categories', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_10_03_131149_events', 1),
('2016_10_03_131236_advertisements', 1),
('2016_10_03_131308_phases', 1),
('2016_10_03_131327_contracts', 1),
('2016_10_03_131625_reviews', 1),
('2016_10_03_131831_usr_adv', 1),
('2016_10_03_142134_categories', 1);

--
-- Gegevens worden geëxporteerd voor tabel `phases`
--

INSERT INTO `phases` (`id`, `phase_number`, `phase_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'in_anticipation', NULL, NULL),
(2, 5, 'cancelled', NULL, NULL),
(3, 10, 'agreement', NULL, NULL),
(4, 15, 'transfer', NULL, NULL);

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `country`, `city`, `postal_code`, `street`, `house_number`, `phone_number`, `email`, `password`, `is_admin`, `image`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sarah', 'Jehin', 'Sarah', 'Belgium', 'Hulshout', '2235', 'Sarah', '17', '0123456789', 'sarah.jehin@belgacom.net', '$2y$10$i6sp43WzylfJjNYz67J6C.Kv5Q2.sl5/0c1.ehBqoXVHqsEE8fWia', 1, '09-10-2016_Sarah.jpg', 1, 'ZU0TFW0aDG7G2aqgdaemdZBnedlqdfJVr6sa7QBkEc53rNbGvcAnqGMeePs0', '2016-10-05 08:16:41', '2016-10-09 20:21:27'),
(2, 'Sarah', 'Jehin', 'SarahJ', 'Belgium', 'Hollywood', '1000', 'Bruiselane', '22', '0123456789', 'sarah@quer.be', '$2y$10$D8CocQLI5RUg1bHg97xrNOJuv5SpvWWK40/83PnEZCbmGdH9Ok/oG', 1, '09-10-2016_SarahJ.jpg', 1, '9EWBqsd9DmDjTG7b5kCviFdrlBBWsm7Anp94vrcu99vkiUpV5Sw6XxynCzDA', '2016-10-09 15:36:32', '2016-10-17 10:12:51'),
(3, 'Savannah', 'Summers', 'Savannah', 'United States', 'Great Falls', '1254', 'Highendlane', '100', '0123456789', 'sunny_savannah@qtest.com', '$2y$10$lxaXSHch4c8VqeHzxLSvaenat3E64KXNJQyfEoQw1xRwldgHA0j.O', 0, '13-10-2016_Savannah.jpg', 1, '3BoKLIver9s5neGU7PsXhzU6IMh7E215jzR6OmFKzv2b3ukpbRcj1C1L25NL', '2016-10-13 05:59:49', '2016-10-16 16:57:34'),
(4, 'Lucas', 'McLaren', 'LucasMcL', 'België', 'Westerlo', '2260', 'Kapelstraat', '6', '498005544', 'lucasmcl@qtest.com', '$2y$10$RB1BPKUPFk1StxeiHqXILuQLUHnsAJU2myG/ttDLXeeyQOlmP6126', 0, '17-10-2016_LucasMcL.jpg', 1, 'ZZsLSlvNWbVkuVyg2UfXieN0dc6QMJQOI6AbJiwQAHlfQEN7ndaSfoCF1Nsp', '2016-10-17 08:49:32', '2016-10-17 09:35:00');

--
-- Gegevens worden geëxporteerd voor tabel `usr_adv`
--

INSERT INTO `usr_adv` (`id`, `advertisement_id`, `user_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 1, '2016-10-09 15:42:08', '2016-10-09 15:42:08'),
(2, 4, 2, 1, '2016-10-09 16:02:50', '2016-10-09 16:02:50');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
