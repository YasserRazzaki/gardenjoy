-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.32 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage des données de la table gardenjoy.favoris : ~0 rows (environ)

-- Listage des données de la table gardenjoy.tutorials : ~4 rows (environ)
INSERT INTO `tutorials` (`id`, `title`, `description`, `image`, `author`, `created_at`) VALUES
	(6, 'Ninho', 'test', 'https://media.sproutsocial.com/uploads/2022/06/profile-picture.jpeg', 'Ninho', '2024-05-02 18:37:24'),
	(7, 'Jul', 'test', 'https://media.sproutsocial.com/uploads/2022/06/profile-picture.jpeg', 'Jul', '2024-05-02 18:37:40'),
	(8, 'Yasser', 'I\'m him', 'https://media.sproutsocial.com/uploads/2022/06/profile-picture.jpeg', 'Maes', '2024-05-02 18:40:20'),
	(20, 'Maes', 'OMERTA', 'https://media.sproutsocial.com/uploads/2022/06/profile-picture.jpeg', 'Yasser Razzaki', '2024-05-02 19:00:48');

-- Listage des données de la table gardenjoy.utilisateurs : ~7 rows (environ)
INSERT INTO `utilisateurs` (`id`, `nom`, `email`, `mot_de_passe`, `ville`, `code_postal`, `image_profil`, `date_inscription`) VALUES
	(1, 'Yasser Razzaki', 'mail@hotmail.fr', '320000', 'Béziers', '34500', 'https://www.hdwallpapers.in/download/different_team_football_players_hd_football-HD.jpg', '2024-05-01 14:35:07'),
	(2, 'Leo dubois', 'mail@hotmail.com', 'pNTjeUcZufms6xH', 'Béziers', '34500', 'image2', '2024-05-01 14:49:54'),
	(4, 'Ninho', 'ninho@mail.com', 'ninhoo', 'Béziers', '34500', '', '2024-05-01 14:57:46'),
	(5, 'Jul', 'jul@mail.com', 'pNTjeUcZufms6xH', 'Béziers', '34500', 'image2', '2024-05-01 15:00:54'),
	(6, 'Maes', 'maes@gmail.com', 'pNTjeUcZufms6xH', 'Béziers', '34500', 'image3', '2024-05-01 15:02:50'),
	(8, 'Otacos', 'otacos@mail.fr', 'pNTjeUcZufms6xH', 'Béziers', '34500', 'image3', '2024-05-01 15:04:39'),
	(9, 'EnjoyTacos', 'enjoy@mail.fr', 'pNTjeUcZufms6xH', 'Béziers', '34500', 'image3', '2024-05-01 15:06:40');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
