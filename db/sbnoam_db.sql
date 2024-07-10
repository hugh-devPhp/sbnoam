-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 10 juil. 2024 à 20:49
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sbnoam_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `acl_adminpro`
--

CREATE TABLE `acl_adminpro` (
  `id_adminpro` int(11) NOT NULL,
  `matricule` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `acl_blocmenu`
--

CREATE TABLE `acl_blocmenu` (
  `id_blocmenu` int(11) NOT NULL,
  `nom_blocmenu` varchar(50) NOT NULL DEFAULT '',
  `position_blocmenu` int(11) NOT NULL DEFAULT 0,
  `icone_blocmenu` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `acl_blocmenu`
--

INSERT INTO `acl_blocmenu` (`id_blocmenu`, `nom_blocmenu`, `position_blocmenu`, `icone_blocmenu`) VALUES
(1, 'parametrages', 1, 'cog'),
(13, 'gestions des utilisateurs', 2, 'user'),
(14, 'articles', 3, 'cart'),
(15, 'gestion de contenu', 4, 'building'),
(17, 'gestions des messages', 5, 'bell');

-- --------------------------------------------------------

--
-- Structure de la table `acl_cat_profil`
--

CREATE TABLE `acl_cat_profil` (
  `id_cat_profil` int(11) NOT NULL,
  `nom_cat_profil` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `acl_cat_profil`
--

INSERT INTO `acl_cat_profil` (`id_cat_profil`, `nom_cat_profil`) VALUES
(1, 'super admin'),
(2, 'admin normal'),
(3, 'employe');

-- --------------------------------------------------------

--
-- Structure de la table `acl_droit_perso`
--

CREATE TABLE `acl_droit_perso` (
  `id_droit_perso` int(11) NOT NULL,
  `id_acl_utilisateur` int(11) NOT NULL DEFAULT 0,
  `module_droit_perso` varchar(50) NOT NULL DEFAULT '',
  `controller_droit_perso` varchar(50) NOT NULL DEFAULT '',
  `action_droit_perso` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `acl_droit_profil`
--

CREATE TABLE `acl_droit_profil` (
  `id_droit_profil` int(11) NOT NULL,
  `profil_id` int(11) NOT NULL DEFAULT 0,
  `module_droit_profil` varchar(50) NOT NULL DEFAULT '',
  `controller_droit_profil` varchar(50) NOT NULL DEFAULT '',
  `action_droit_profil` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `acl_droit_profil`
--

INSERT INTO `acl_droit_profil` (`id_droit_profil`, `profil_id`, `module_droit_profil`, `controller_droit_profil`, `action_droit_profil`) VALUES
(17, 1, 'configuration', 'configuration', 'get_module'),
(18, 1, 'configuration', 'configuration', 'add_blocmenu'),
(19, 1, 'configuration', 'configuration', 'add_icone'),
(20, 1, 'configuration', 'configuration', 'add_menu'),
(21, 1, 'configuration', 'configuration', 'add_module'),
(22, 1, 'configuration', 'configuration', 'add_onglet'),
(23, 1, 'configuration', 'configuration', 'delete_blocmenu'),
(24, 1, 'configuration', 'configuration', 'delete_icone'),
(25, 1, 'configuration', 'configuration', 'delete_menu'),
(26, 1, 'configuration', 'configuration', 'delete_module'),
(27, 1, 'configuration', 'configuration', 'delete_onglet'),
(28, 1, 'configuration', 'configuration', 'edit_blocmenu'),
(29, 1, 'configuration', 'configuration', 'edit_icone'),
(30, 1, 'configuration', 'configuration', 'edit_menu'),
(31, 1, 'configuration', 'configuration', 'edit_module'),
(32, 1, 'configuration', 'configuration', 'edit_onglet'),
(33, 1, 'configuration', 'configuration', 'get_blocmenu'),
(34, 1, 'configuration', 'configuration', 'get_icone'),
(35, 1, 'configuration', 'configuration', 'get_menu'),
(36, 1, 'configuration', 'configuration', 'get_methodes_module'),
(37, 1, 'configuration', 'configuration', 'get_onglet'),
(84, 1, 'adminacl', 'adminacl', 'get_droitonglet'),
(85, 1, 'adminacl', 'adminacl', 'get_action'),
(87, 1, 'adminacl', 'adminacl', 'active_action'),
(88, 1, 'adminacl', 'adminacl', 'add_droit_onglet'),
(89, 1, 'adminacl', 'adminacl', 'add_dupliquerdroit'),
(90, 1, 'adminacl', 'adminacl', 'add_profil'),
(91, 1, 'adminacl', 'adminacl', 'deletelot_ongletaffecte'),
(92, 1, 'adminacl', 'adminacl', 'delete_ongletprofil'),
(93, 1, 'adminacl', 'adminacl', 'delete_onglet_parprofil'),
(94, 1, 'adminacl', 'adminacl', 'delete_profil'),
(95, 1, 'adminacl', 'adminacl', 'desactive_action'),
(96, 1, 'adminacl', 'adminacl', 'detail_droitonglet'),
(97, 1, 'adminacl', 'adminacl', 'edit_commentaire_action'),
(98, 1, 'adminacl', 'adminacl', 'edit_ongletprofil'),
(99, 1, 'adminacl', 'adminacl', 'edit_onglet_parprofil'),
(100, 1, 'adminacl', 'adminacl', 'edit_profil'),
(101, 1, 'adminacl', 'adminacl', 'edit_statut_profil'),
(102, 1, 'adminacl', 'adminacl', 'get_ongletparprofil'),
(103, 1, 'utilisateur', 'utilisateur', 'get_users'),
(104, 1, 'utilisateur', 'utilisateur', 'add_user'),
(105, 1, 'utilisateur', 'utilisateur', 'delete_user'),
(106, 1, 'utilisateur', 'utilisateur', 'edit_reinitpass'),
(107, 1, 'utilisateur', 'utilisateur', 'edit_statut_user'),
(108, 1, 'utilisateur', 'utilisateur', 'edit_user'),
(111, 1, 'infoperso', 'infoperso', 'get_infoperso'),
(112, 5, 'infoperso', 'infoperso', 'edit_infoperso'),
(113, 5, 'infoperso', 'infoperso', 'edit_motpass'),
(114, 5, 'infoperso', 'infoperso', 'get_infoperso'),
(115, 1, 'modelepage', 'modelepage', 'get_modelepage'),
(569, 1, 'adminacl', 'adminacl', 'get_droitprofil'),
(570, 1, 'configvehicule', 'configvehicule', 'get_marque'),
(571, 2, 'configvehicule', 'configvehicule', 'add_marque'),
(572, 1, 'configvehicule', 'configvehicule', 'add_marque'),
(573, 1, 'configvehicule', 'configvehicule', 'delete_marque'),
(574, 1, 'configvehicule', 'configvehicule', 'edit_marque'),
(575, 1, 'configvehicule', 'configvehicule', 'get_model'),
(576, 1, 'configvehicule', 'configvehicule', 'add_model'),
(577, 1, 'configvehicule', 'configvehicule', 'delete_model'),
(578, 1, 'configvehicule', 'configvehicule', 'edit_model'),
(579, 1, 'configvehicule', 'configvehicule', 'get_moteur'),
(580, 1, 'configvehicule', 'configvehicule', 'add_moteur'),
(581, 1, 'configvehicule', 'configvehicule', 'delete_moteur'),
(582, 1, 'configvehicule', 'configvehicule', 'edit_moteur'),
(583, 1, 'configvehicule', 'configvehicule', 'get_couleur'),
(584, 1, 'configvehicule', 'configvehicule', 'add_couleur'),
(585, 1, 'configvehicule', 'configvehicule', 'delete_couleur'),
(586, 1, 'configvehicule', 'configvehicule', 'edit_couleur'),
(587, 1, 'automobile', 'automobile', 'get_vehicule'),
(588, 2, 'configuration', 'configuration', 'get_blocmenu'),
(589, 2, 'utilisateur', 'utilisateur', 'add_user'),
(590, 2, 'utilisateur', 'utilisateur', 'delete_user'),
(591, 2, 'utilisateur', 'utilisateur', 'edit_reinitpass'),
(592, 2, 'utilisateur', 'utilisateur', 'edit_statut_user'),
(593, 2, 'utilisateur', 'utilisateur', 'edit_user'),
(595, 2, 'utilisateur', 'utilisateur', 'get_users'),
(597, 1, 'article', 'article', 'delete_category'),
(598, 1, 'article', 'article', 'get_categories'),
(599, 1, 'article', 'article', 'delete_cat_selected'),
(600, 1, 'article', 'article', 'add_category'),
(601, 1, 'article', 'article', 'edit_category'),
(602, 1, 'article', 'article', 'add_article'),
(603, 1, 'article_config', 'article_config', 'add_category'),
(604, 1, 'article_config', 'article_config', 'add_sous_category'),
(605, 1, 'article_config', 'article_config', 'delete_category'),
(606, 1, 'article_config', 'article_config', 'delete_cat_selected'),
(607, 1, 'article_config', 'article_config', 'delete_sous_category'),
(608, 1, 'article_config', 'article_config', 'delete_sous_cat_selected'),
(609, 1, 'article_config', 'article_config', 'edit_category'),
(610, 1, 'article_config', 'article_config', 'edit_sous_category'),
(612, 1, 'article_config', 'article_config', 'get_sous_categories'),
(613, 1, 'article', 'article', 'get_article'),
(614, 1, 'article_config', 'article_config', 'add_article_marque'),
(615, 1, 'article_config', 'article_config', 'delete_article_marque'),
(616, 1, 'article_config', 'article_config', 'delete_article_marque_selected'),
(617, 1, 'article_config', 'article_config', 'edit_article_marque'),
(618, 1, 'article_config', 'article_config', 'get_article_marque'),
(619, 1, 'article_config', 'article_config', 'get_sous_categories_by_cat'),
(620, 1, 'article', 'article', 'get_articles'),
(621, 1, 'article', 'article', 'get_article_form'),
(622, 1, 'article', 'article', 'delete_article'),
(623, 1, 'article', 'article', 'delete_article_selected'),
(624, 1, 'article', 'article', 'edit_article'),
(625, 1, 'article_config', 'article_config', 'get_categories'),
(626, 1, 'admin_corporate', 'admin_corporate', 'get_infos_gen'),
(627, 1, 'admin_corporate', 'admin_corporate', 'get_sliders'),
(628, 1, 'admin_corporate', 'admin_corporate', 'get_special_offer'),
(629, 1, 'commandes', 'commandes', 'get_commandes'),
(630, 1, 'reservation', 'reservation', 'get_reservation'),
(631, 1, 'reservation', 'reservation', 'edit_reserv_state'),
(632, 1, 'reservation', 'reservation', 'get_reservations'),
(633, 1, 'commandes', 'commandes', 'edit_cmd_state'),
(634, 1, 'commandes', 'commandes', 'get_commande_detail'),
(635, 2, 'adminacl', 'adminacl', 'get_profils'),
(636, 1, 'adminacl', 'adminacl', 'get_profils'),
(637, 1, 'message', 'message', 'get_messages'),
(638, 1, 'article_config', 'article_config', 'get_collections');

-- --------------------------------------------------------

--
-- Structure de la table `acl_element_blocmenu`
--

CREATE TABLE `acl_element_blocmenu` (
  `id_element_blocmenu` int(11) NOT NULL,
  `blocmenu_id` int(11) NOT NULL DEFAULT 0,
  `liste_module_id` int(11) NOT NULL DEFAULT 0,
  `numero_element` int(11) NOT NULL DEFAULT 0,
  `nom_element` varchar(50) NOT NULL DEFAULT '',
  `modulenom_element` varchar(50) NOT NULL DEFAULT '',
  `blocmenu_nom` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `acl_element_blocmenu`
--

INSERT INTO `acl_element_blocmenu` (`id_element_blocmenu`, `blocmenu_id`, `liste_module_id`, `numero_element`, `nom_element`, `modulenom_element`, `blocmenu_nom`) VALUES
(1, 1, 1, 1, 'configuration de base', 'configuration', 'parametrages'),
(2, 1, 2, 2, 'adminacl', 'adminacl', 'parametrages'),
(33, 13, 34, 1, 'utilisateurs', 'utilisateur', 'utilisateur'),
(35, 14, 36, 1, 'configuration article', 'article_config', 'articles'),
(36, 14, 35, 2, 'article', 'article', 'articles'),
(37, 15, 37, 1, 'contenu', 'admin_corporate', 'gestion de contenu'),
(40, 13, 40, 2, 'infos perso', 'infoperso', 'gestions des utilisateurs'),
(41, 17, 41, 1, 'messageries', 'message', 'gestions des messages');

-- --------------------------------------------------------

--
-- Structure de la table `acl_icone`
--

CREATE TABLE `acl_icone` (
  `id_icone` int(11) NOT NULL,
  `nom_icone` varchar(50) NOT NULL DEFAULT '',
  `code_icone` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `acl_icone`
--

INSERT INTO `acl_icone` (`id_icone`, `nom_icone`, `code_icone`) VALUES
(1, 'tv', 'tv'),
(2, 'tete utilisateur', 'user'),
(3, 'calendrier', 'calendar'),
(4, 'serveur', 'server'),
(5, 'reglage', 'cog'),
(6, 'cloche', 'bell'),
(7, 'cadeau', 'gift'),
(8, 'vehicule', 'car'),
(9, 'telechargement', 'upload'),
(10, 'building', 'building'),
(14, 'argent', 'money'),
(15, 'cloud telechargement', 'cloud-download'),
(16, 'plusieurs utilisateurs', 'user-x'),
(17, 'chariot', 'cart'),
(18, 'histogramme', 'bar-chart'),
(19, 'cadre histogramme', 'bar-chart-square');

-- --------------------------------------------------------

--
-- Structure de la table `acl_liste_action`
--

CREATE TABLE `acl_liste_action` (
  `id_liste_action` int(11) NOT NULL,
  `nom_module_action` varchar(50) NOT NULL DEFAULT '',
  `nom_controller_action` varchar(50) NOT NULL DEFAULT '',
  `nom_action` varchar(50) NOT NULL DEFAULT '',
  `description_action` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `acl_liste_action`
--

INSERT INTO `acl_liste_action` (`id_liste_action`, `nom_module_action`, `nom_controller_action`, `nom_action`, `description_action`) VALUES
(1, 'adminacl', 'adminacl', 'get_profils', 'liste des profils'),
(2, 'adminacl', 'adminacl', 'edit_statut_profil', 'script active ou desactive statut profil'),
(3, 'adminacl', 'adminacl', 'add_profil', 'ajout de profil'),
(4, 'adminacl', 'adminacl', 'delete_profil', 'suppression de profil'),
(5, 'adminacl', 'adminacl', 'edit_profil', 'edit de profil'),
(6, 'adminacl', 'adminacl', 'get_droitonglet', 'liste des onglets et droits'),
(7, 'adminacl', 'adminacl', 'add_droit_onglet', 'ajout des droits profil aux onglets'),
(8, 'adminacl', 'adminacl', 'detail_droitonglet', 'detail des profils ayant vue sur onglet'),
(9, 'adminacl', 'adminacl', 'delete_onglet_parprofil', 'supprime droit a un onglet'),
(10, 'adminacl', 'adminacl', 'deletelot_ongletaffecte', 'supprime droit a une collection onglet'),
(11, 'adminacl', 'adminacl', 'edit_onglet_parprofil', 'edit la position onglet par profil'),
(12, 'adminacl', 'adminacl', 'get_action', 'liste des methodes et description'),
(13, 'adminacl', 'adminacl', 'edit_commentaire_action', 'edit de commentaire'),
(14, 'adminacl', 'adminacl', 'get_droitprofil', 'liste des droits de profil'),
(15, 'adminacl', 'adminacl', 'desactive_action', 'desactiver les actions'),
(16, 'adminacl', 'adminacl', 'active_action', 'activer les actions'),
(17, 'adminacl', 'adminacl', 'add_dupliquerdroit', 'duplication des droits de profil'),
(18, 'adminacl', 'adminacl', 'get_ongletparprofil', 'liste des onglets per profil'),
(19, 'adminacl', 'adminacl', 'edit_ongletprofil', 'editer un onglet de profil'),
(20, 'adminacl', 'adminacl', 'delete_ongletprofil', 'supprimer un onglet de profil'),
(21, 'admin_corporate', 'admin_corporate', 'get_infos_gen', ''),
(22, 'admin_corporate', 'admin_corporate', 'edit_infos_gen', ''),
(23, 'admin_corporate', 'admin_corporate', 'add_information', ''),
(24, 'admin_corporate', 'admin_corporate', 'get_sliders', ''),
(25, 'admin_corporate', 'admin_corporate', 'add_slider', ''),
(26, 'admin_corporate', 'admin_corporate', 'get_slider_for_edit', ''),
(27, 'admin_corporate', 'admin_corporate', 'delete_slider', ''),
(28, 'admin_corporate', 'admin_corporate', 'get_special_offer', ''),
(29, 'admin_corporate', 'admin_corporate', 'add_special_offer', ''),
(30, 'admin_corporate', 'admin_corporate', 'get_special_offer_edit', ''),
(31, 'admin_corporate', 'admin_corporate', 'edit_special_offer', ''),
(32, 'admin_corporate', 'admin_corporate', 'delete_special_offer', ''),
(33, 'article', 'article', 'get_article_form', ''),
(34, 'article', 'article', 'get_articles', ''),
(35, 'article', 'article', 'add_article', ''),
(36, 'article', 'article', 'delete_article', ''),
(37, 'article', 'article', 'delete_article_selected', ''),
(38, 'article', 'article', 'edit_article', ''),
(39, 'article', 'article', 'edit_data_article', ''),
(40, 'article', 'article', 'delete_article_image', ''),
(41, 'article', 'article', 'detail_article', ''),
(42, 'article_config', 'article_config', 'get_collections', ''),
(43, 'article_config', 'article_config', 'add_collections', ''),
(44, 'article_config', 'article_config', 'get_categories', ''),
(45, 'article_config', 'article_config', 'add_category', ''),
(46, 'article_config', 'article_config', 'edit_category', ''),
(47, 'article_config', 'article_config', 'delete_category', ''),
(48, 'article_config', 'article_config', 'delete_cat_selected', ''),
(49, 'article_config', 'article_config', 'get_sous_categories', ''),
(50, 'article_config', 'article_config', 'get_sous_categories_by_cat', ''),
(51, 'article_config', 'article_config', 'add_sous_category', ''),
(52, 'article_config', 'article_config', 'edit_sous_category', ''),
(53, 'article_config', 'article_config', 'delete_sous_category', ''),
(54, 'article_config', 'article_config', 'delete_sous_cat_selected', ''),
(55, 'article_config', 'article_config', 'get_article_marque', ''),
(56, 'article_config', 'article_config', 'add_article_marque', ''),
(57, 'article_config', 'article_config', 'edit_article_marque', ''),
(58, 'article_config', 'article_config', 'delete_article_marque', ''),
(59, 'article_config', 'article_config', 'delete_article_marque_selected', ''),
(60, 'commandes', 'commandes', 'get_commandes', ''),
(61, 'commandes', 'commandes', 'get_commande_detail', ''),
(62, 'commandes', 'commandes', 'edit_cmd_state', ''),
(63, 'configuration', 'configuration', 'get_module', 'vue de la liste des modules'),
(64, 'configuration', 'configuration', 'add_module', 'ajouter un module'),
(65, 'configuration', 'configuration', 'edit_module', 'editer un module'),
(66, 'configuration', 'configuration', 'delete_module', 'supprimer un module'),
(67, 'configuration', 'configuration', 'get_blocmenu', 'vue de la liste des blocs de module'),
(68, 'configuration', 'configuration', 'add_blocmenu', 'ajouter un bloc de module'),
(69, 'configuration', 'configuration', 'delete_blocmenu', 'supprimer un bloc de module'),
(70, 'configuration', 'configuration', 'edit_blocmenu', 'editer un bloc de module'),
(71, 'configuration', 'configuration', 'get_menu', 'vue de la liste des menus'),
(72, 'configuration', 'configuration', 'add_menu', 'ajouter un menu de bloc'),
(73, 'configuration', 'configuration', 'delete_menu', 'supprimer un menu de bloc'),
(74, 'configuration', 'configuration', 'edit_menu', 'editer un menu de bloc'),
(75, 'configuration', 'configuration', 'get_onglet', 'vue de la liste des onglets'),
(76, 'configuration', 'configuration', 'add_onglet', 'ajouter un onglet'),
(77, 'configuration', 'configuration', 'delete_onglet', 'supprimer un onglet'),
(78, 'configuration', 'configuration', 'edit_onglet', 'editer un onglet'),
(79, 'configuration', 'configuration', 'get_icone', 'vue de la liste des icones'),
(80, 'configuration', 'configuration', 'add_icone', 'ajouter une icone'),
(81, 'configuration', 'configuration', 'delete_icone', 'supprimer une icone'),
(82, 'configuration', 'configuration', 'edit_icone', 'editer une icone'),
(83, 'configuration', 'configuration', 'get_methodes_module', 'vue de la liste des methodes'),
(84, 'infoperso', 'infoperso', 'get_infoperso', 'infos personnelles'),
(85, 'information', 'information', 'get_information', 'liste des sliders'),
(86, 'information', 'information', 'add_information', ''),
(87, 'message', 'message', 'get_messages', ''),
(88, 'message', 'message', 'get_message', ''),
(89, 'reservation', 'reservation', 'get_reservations', ''),
(90, 'reservation', 'reservation', 'get_reservation', ''),
(91, 'reservation', 'reservation', 'edit_reserv_state', ''),
(92, 'utilisateur', 'utilisateur', 'get_users', 'liste des utilisateurs'),
(93, 'utilisateur', 'utilisateur', 'edit_statut_user', 'script active ou desactive statut utilisateur'),
(94, 'utilisateur', 'utilisateur', 'add_user', 'ajout utilisateur'),
(95, 'utilisateur', 'utilisateur', 'delete_user', 'suppression utilisateur'),
(96, 'utilisateur', 'utilisateur', 'edit_user', 'edit utilisateur'),
(97, 'utilisateur', 'utilisateur', 'edit_reinitpass', 'script active ou desactive statut utilisateur'),
(98, 'utilisateur', 'utilisateur', 'get_my_profil', '');

-- --------------------------------------------------------

--
-- Structure de la table `acl_liste_action_comment`
--

CREATE TABLE `acl_liste_action_comment` (
  `id_liste_action_comment` int(11) NOT NULL,
  `id_action_comment` int(11) NOT NULL,
  `nom_action_comment` varchar(50) NOT NULL,
  `commentaire` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `acl_liste_controller`
--

CREATE TABLE `acl_liste_controller` (
  `id_liste_controller` int(11) NOT NULL,
  `nom_module_controller` varchar(50) NOT NULL DEFAULT '',
  `nom_controller` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `acl_liste_controller`
--

INSERT INTO `acl_liste_controller` (`id_liste_controller`, `nom_module_controller`, `nom_controller`) VALUES
(1, 'adminacl', 'adminacl'),
(2, 'administration', 'administration'),
(3, 'admin_corporate', 'admin_corporate'),
(4, 'article', 'article'),
(5, 'article_config', 'article_config'),
(6, 'commandes', 'commandes'),
(7, 'configuration', 'configuration'),
(8, 'infoperso', 'infoperso'),
(9, 'information', 'information'),
(10, 'message', 'message'),
(11, 'reservation', 'reservation'),
(12, 'utilisateur', 'utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `acl_liste_module`
--

CREATE TABLE `acl_liste_module` (
  `id_liste_module` int(11) NOT NULL,
  `designation_module` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `acl_liste_module`
--

INSERT INTO `acl_liste_module` (`id_liste_module`, `designation_module`) VALUES
(1, 'configuration'),
(2, 'adminacl'),
(34, 'utilisateur'),
(35, 'article'),
(36, 'article_config'),
(37, 'admin_corporate'),
(40, 'infoperso'),
(41, 'message');

-- --------------------------------------------------------

--
-- Structure de la table `acl_liste_onglet`
--

CREATE TABLE `acl_liste_onglet` (
  `id_liste_onglet` int(11) NOT NULL,
  `nom_module_onglet` varchar(50) NOT NULL DEFAULT '',
  `id_liste_module_onglet` int(11) NOT NULL DEFAULT 0,
  `designation_onglet` varchar(50) NOT NULL DEFAULT '',
  `numero_ordre` int(11) NOT NULL DEFAULT 0,
  `action_url` varchar(100) NOT NULL DEFAULT '',
  `designationli` varchar(50) NOT NULL DEFAULT '',
  `divid` varchar(50) NOT NULL DEFAULT '',
  `leprofil` int(11) NOT NULL DEFAULT 0,
  `duplique_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `acl_liste_onglet`
--

INSERT INTO `acl_liste_onglet` (`id_liste_onglet`, `nom_module_onglet`, `id_liste_module_onglet`, `designation_onglet`, `numero_ordre`, `action_url`, `designationli`, `divid`, `leprofil`, `duplique_id`) VALUES
(1, 'configuration', 1, 'module', 1, 'get_module', 'liget_module', 'divget_module', 0, 0),
(2, 'adminacl', 2, 'profils', 1, 'get_profils', 'liget_profils', 'divget_profils', 0, 0),
(3, 'configuration', 1, 'blocmenu', 2, 'get_blocmenu', 'liget_blocmenu', 'divget_blocmenu', 0, 0),
(4, 'configuration', 1, 'menu', 3, 'get_menu', 'liget_menu', 'divget_menu', 0, 0),
(5, 'configuration', 1, 'onglet', 4, 'get_onglet', 'liget_onglet', 'divget_onglet', 0, 0),
(6, 'configuration', 1, 'icone', 5, 'get_icone', 'liget_icone', 'divget_icone', 0, 0),
(7, 'configuration', 1, 'liste des methodes', 6, 'get_methodes_module', 'liget_methodes_module', 'divget_methodes_module', 0, 0),
(10, 'adminacl', 2, 'droit par onglet', 2, 'get_droitonglet', 'liget_droitonglet', 'divget_droitonglet', 0, 0),
(11, 'adminacl', 2, 'description des actions', 3, 'get_action', 'liget_action', 'divget_action', 0, 0),
(12, 'adminacl', 2, 'permission des profils', 4, 'get_droitprofil', 'liget_droitprofil', 'divget_droitprofil', 0, 0),
(13, 'adminacl', 2, 'onglets par profil', 5, 'get_ongletparprofil', 'liget_ongletparprofil', 'divget_ongletparprofil', 0, 0),
(24, 'configuration', 1, 'module', 1, 'get_module', 'liget_module', 'divget_module', 1, 1),
(26, 'configuration', 1, 'blocmenu', 2, 'get_blocmenu', 'liget_blocmenu', 'divget_blocmenu', 1, 3),
(27, 'configuration', 1, 'icone', 5, 'get_icone', 'liget_icone', 'divget_icone', 1, 6),
(28, 'configuration', 1, 'menu', 3, 'get_menu', 'liget_menu', 'divget_menu', 1, 4),
(29, 'configuration', 1, 'liste des methodes', 6, 'get_methodes_module', 'liget_methodes_module', 'divget_methodes_module', 1, 7),
(30, 'configuration', 1, 'onglet', 4, 'get_onglet', 'liget_onglet', 'divget_onglet', 1, 5),
(47, 'adminacl', 2, 'droit par onglet', 2, 'get_droitonglet', 'liget_droitonglet', 'divget_droitonglet', 1, 10),
(48, 'adminacl', 2, 'description des actions', 3, 'get_action', 'liget_action', 'divget_action', 1, 11),
(50, 'adminacl', 2, 'onglets par profil', 5, 'get_ongletparprofil', 'liget_ongletparprofil', 'divget_ongletparprofil', 1, 13),
(304, 'adminacl', 2, 'permission des profils', 2, 'get_droitprofil', 'liget_droitprofil', 'divget_droitprofil', 1, 12),
(307, 'configvehicule', 32, 'model', 1, 'get_model', 'liget_model', 'divget_model', 0, 0),
(308, 'configvehicule', 32, 'model', 1, 'get_model', 'liget_model', 'divget_model', 1, 307),
(311, 'configvehicule', 32, 'couleurs', 2, 'get_couleur', 'liget_couleur', 'divget_couleur', 0, 0),
(312, 'configvehicule', 32, 'couleurs', 2, 'get_couleur', 'liget_couleur', 'divget_couleur', 1, 311),
(315, 'configuration', 1, 'blocmenu', 2, 'get_blocmenu', 'liget_blocmenu', 'divget_blocmenu', 2, 3),
(316, 'utilisateur', 34, 'profil', 2, 'get_my_profil', 'liget_my_profil', 'divget_my_profil', 0, 0),
(317, 'utilisateur', 34, 'liste utilisateur', 3, 'get_users', 'liget_users', 'divget_users', 0, 0),
(319, 'utilisateur', 34, 'liste utilisateur', 2, 'get_users', 'liget_users', 'divget_users', 2, 317),
(324, 'article', 35, 'ajout article', 1, 'get_article_form', 'liget_article_form', 'divget_article_form', 0, 0),
(325, 'article', 35, 'ajout article', 1, 'get_article_form', 'liget_article_form', 'divget_article_form', 1, 324),
(329, 'article', 35, 'liste article', 2, 'get_articles', 'liget_articles', 'divget_articles', 0, 0),
(330, 'article', 35, 'liste article', 2, 'get_articles', 'liget_articles', 'divget_articles', 1, 329),
(332, 'utilisateur', 34, 'utilisateurs', 1, 'get_users', 'liget_users', 'divget_users', 0, 0),
(333, 'utilisateur', 34, 'utilisateurs', 1, 'get_users', 'liget_users', 'divget_users', 1, 332),
(334, 'admin_corporate', 37, 'informations générales', 1, 'get_infos_gen', 'liget_infos_gen', 'divget_infos_gen', 0, 0),
(335, 'admin_corporate', 37, 'sliders', 2, 'get_sliders', 'liget_sliders', 'divget_sliders', 0, 0),
(336, 'admin_corporate', 37, 'offre spécial', 3, 'get_special_offer', 'liget_special_offer', 'divget_special_offer', 0, 0),
(337, 'admin_corporate', 37, 'informations générales', 1, 'get_infos_gen', 'liget_infos_gen', 'divget_infos_gen', 1, 334),
(338, 'admin_corporate', 37, 'sliders', 2, 'get_sliders', 'liget_sliders', 'divget_sliders', 1, 335),
(339, 'admin_corporate', 37, 'offre spécial', 3, 'get_special_offer', 'liget_special_offer', 'divget_special_offer', 1, 336),
(344, 'adminacl', 2, 'profils', 1, 'get_profils', 'liget_profils', 'divget_profils', 2, 2),
(345, 'adminacl', 2, 'profils', 1, 'get_profils', 'liget_profils', 'divget_profils', 1, 2),
(346, 'infoperso', 40, 'mon profil', 1, 'get_infoperso', 'liget_infoperso', 'divget_infoperso', 0, 0),
(347, 'infoperso', 40, 'mon profil', 1, 'get_infoperso', 'liget_infoperso', 'divget_infoperso', 1, 346),
(348, 'message', 41, 'boite de reception', 1, 'get_messages', 'liget_messages', 'divget_messages', 0, 0),
(349, 'message', 41, 'boite de reception', 1, 'get_messages', 'liget_messages', 'divget_messages', 1, 348),
(350, 'article_config', 36, 'collections', 1, 'get_collections', 'liget_collections', 'divget_collections', 0, 0),
(351, 'article_config', 36, 'collections', 1, 'get_collections', 'liget_collections', 'divget_collections', 1, 350);

-- --------------------------------------------------------

--
-- Structure de la table `acl_profils`
--

CREATE TABLE `acl_profils` (
  `id_profils` int(11) NOT NULL,
  `code_profils` varchar(50) NOT NULL DEFAULT '',
  `activation_profils` tinyint(1) NOT NULL DEFAULT 0,
  `profilparent_profils` int(11) NOT NULL DEFAULT 0,
  `nom_parent` varchar(50) NOT NULL DEFAULT '',
  `description_profils` varchar(100) NOT NULL DEFAULT '',
  `respo_role` tinyint(1) NOT NULL DEFAULT 0,
  `personnel_anvi` tinyint(1) NOT NULL DEFAULT 0,
  `est_restreint` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `acl_profils`
--

INSERT INTO `acl_profils` (`id_profils`, `code_profils`, `activation_profils`, `profilparent_profils`, `nom_parent`, `description_profils`, `respo_role`, `personnel_anvi`, `est_restreint`) VALUES
(1, 'superviseur', 1, 0, '', 'super administrateur du systeme', 1, 0, 0),
(2, 'administrateur', 1, 0, '', 'administrateur central du systeme', 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `acl_utilisateur`
--

CREATE TABLE `acl_utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `matricule` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `nom` varchar(50) NOT NULL DEFAULT '',
  `prenom` varchar(100) NOT NULL DEFAULT '',
  `nom_complet` varchar(100) NOT NULL DEFAULT '',
  `civilite` varchar(5) NOT NULL DEFAULT 'M.',
  `sexe` varchar(1) NOT NULL DEFAULT 'm',
  `laphoto` varchar(250) NOT NULL,
  `activation` tinyint(1) NOT NULL DEFAULT 0,
  `profil_user` int(11) NOT NULL DEFAULT 0,
  `contact_user` varchar(20) NOT NULL DEFAULT '',
  `email_user` varchar(50) NOT NULL DEFAULT '',
  `id_compte` int(11) NOT NULL DEFAULT 0,
  `est_respo` tinyint(1) NOT NULL DEFAULT 0,
  `deja_connecte` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `acl_utilisateur`
--

INSERT INTO `acl_utilisateur` (`id_utilisateur`, `matricule`, `password`, `nom`, `prenom`, `nom_complet`, `civilite`, `sexe`, `laphoto`, `activation`, `profil_user`, `contact_user`, `email_user`, `id_compte`, `est_respo`, `deja_connecte`) VALUES
(1, 'hugh', 'c88a45cebe37ef31231604ff583105be', 'ody', 'hugh', 'ody hugh', 'M.', 'm', '', 1, 1, '', '', 0, 0, 1),
(2, 'admin01', '0e698a8ffc1a0af622c7b4db3cb750cc', 'test', 'admin', 'test admin', 'M.', 'm', '', 1, 2, '', '', 0, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `app_article`
--

CREATE TABLE `app_article` (
  `article_id` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `collection_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `prix` varchar(255) NOT NULL,
  `prix_promo` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `garantie` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `dimension` varchar(255) NOT NULL,
  `poids` varchar(255) NOT NULL,
  `marque_id` int(11) NOT NULL,
  `couleur_id` int(11) NOT NULL,
  `image_principale_article` varchar(255) NOT NULL,
  `vues` int(11) NOT NULL,
  `date_add` date NOT NULL,
  `date_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `app_article`
--

INSERT INTO `app_article` (`article_id`, `designation`, `collection_id`, `description`, `prix`, `prix_promo`, `stock`, `garantie`, `sku`, `dimension`, `poids`, `marque_id`, `couleur_id`, `image_principale_article`, `vues`, `date_add`, `date_update`) VALUES
(44, 'bague', 0, '', '15000', 12000, 5, 2, '9782226473448', '11,5 cm × 18,0 cm × 1,3 cm', '2', 5, 0, '2024_05_11_23_44_48_748176927.jpeg', 1, '2024-05-11', '0000-00-00'),
(45, 'colier', 0, '', '15000', 0, 100, 5, '9782073035059', '14,1 cm × 20,6 cm × 2,0 cm', '55', 5, 0, '2024_05_11_23_46_18_1541961303.jpeg', 6, '2024-05-11', '0000-00-00'),
(46, 'colier', 0, '', '15000', 0, 100, 5, '9782073035059', '14,1 cm × 20,6 cm × 2,0 cm', '55', 5, 0, '2024_05_11_23_46_18_1541961303.jpeg', 2, '2024-05-11', '0000-00-00'),
(47, 'colier', 0, '', '15000', 0, 100, 5, '9782073035059', '14,1 cm × 20,6 cm × 2,0 cm', '55', 5, 0, '2024_05_11_23_46_18_1541961303.jpeg', 2, '2024-05-11', '0000-00-00'),
(48, 'bague', 0, '', '15000', 12000, 5, 2, '9782226473448', '11,5 cm × 18,0 cm × 1,3 cm', '2', 5, 0, '2024_05_11_23_44_48_748176927.jpeg', 1, '2024-05-11', '0000-00-00'),
(49, 'colier', 0, '', '15000', 0, 100, 5, '9782073035059', '14,1 cm × 20,6 cm × 2,0 cm', '55', 5, 0, '2024_05_11_23_46_18_1541961303.jpeg', 2, '2024-05-11', '0000-00-00'),
(50, 'colier', 0, '', '15000', 0, 100, 5, '9782073035059', '14,1 cm × 20,6 cm × 2,0 cm', '55', 5, 0, '2024_05_11_23_46_18_1541961303.jpeg', 2, '2024-05-11', '0000-00-00'),
(51, 'colier', 0, '', '15000', 0, 100, 5, '9782073035059', '14,1 cm × 20,6 cm × 2,0 cm', '55', 5, 0, '2024_05_11_23_46_18_1541961303.jpeg', 2, '2024-05-11', '0000-00-00'),
(52, 'bague', 0, '', '15000', 12000, 5, 2, '9782226473448', '11,5 cm × 18,0 cm × 1,3 cm', '2', 5, 0, '2024_05_11_23_44_48_748176927.jpeg', 4, '2024-05-11', '0000-00-00'),
(53, 'colier', 0, '', '15000', 0, 100, 5, '9782073035059', '14,1 cm × 20,6 cm × 2,0 cm', '55', 5, 0, '2024_05_11_23_46_18_1541961303.jpeg', 2, '2024-05-11', '0000-00-00'),
(54, 'colier', 0, '', '15000', 0, 100, 5, '9782073035059', '14,1 cm × 20,6 cm × 2,0 cm', '55', 5, 0, '2024_05_11_23_46_18_1541961303.jpeg', 2, '2024-05-11', '0000-00-00'),
(55, 'colier', 0, '', '15000', 0, 100, 5, '9782073035059', '14,1 cm × 20,6 cm × 2,0 cm', '55', 5, 0, '2024_05_11_23_46_18_1541961303.jpeg', 2, '2024-05-11', '0000-00-00'),
(56, 'bague', 0, '', '15000', 12000, 5, 2, '9782226473448', '11,5 cm × 18,0 cm × 1,3 cm', '2', 5, 0, '2024_05_11_23_44_48_748176927.jpeg', 1, '2024-05-11', '0000-00-00'),
(57, 'colier', 0, '', '15000', 0, 100, 5, '9782073035059', '14,1 cm × 20,6 cm × 2,0 cm', '55', 5, 0, '2024_05_11_23_46_18_1541961303.jpeg', 2, '2024-05-11', '0000-00-00'),
(58, 'colier', 0, '', '15000', 0, 100, 5, '9782073035059', '14,1 cm × 20,6 cm × 2,0 cm', '55', 5, 0, '2024_05_11_23_46_18_1541961303.jpeg', 2, '2024-05-11', '0000-00-00'),
(59, 'colier', 0, '', '15000', 0, 100, 5, '9782073035059', '14,1 cm × 20,6 cm × 2,0 cm', '55', 5, 0, '2024_05_11_23_46_18_1541961303.jpeg', 2, '2024-05-11', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `app_article_marque`
--

CREATE TABLE `app_article_marque` (
  `article_marque_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_add` date NOT NULL,
  `date_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `app_article_marque`
--

INSERT INTO `app_article_marque` (`article_marque_id`, `name`, `date_add`, `date_update`) VALUES
(5, 'asus', '2024-02-21', '2024-02-22'),
(6, 'hp', '2024-02-21', '0000-00-00'),
(7, 'lenovo', '2024-02-21', '0000-00-00'),
(8, 'macbook', '2024-02-21', '0000-00-00'),
(9, 'dell', '2024-02-21', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `app_blog_article`
--

CREATE TABLE `app_blog_article` (
  `article_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `article_content` text NOT NULL,
  `edit_pseudo` varchar(255) NOT NULL,
  `etat` int(11) NOT NULL COMMENT '1=Publié; 0=Brouillon',
  `article_image` varchar(255) NOT NULL,
  `category` text NOT NULL,
  `article_like` int(11) DEFAULT 0,
  `create_at` datetime NOT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `app_blog_article`
--

INSERT INTO `app_blog_article` (`article_id`, `title`, `article_content`, `edit_pseudo`, `etat`, `article_image`, `category`, `article_like`, `create_at`, `update_at`) VALUES
(1, 'First Article', '<h1 style=\"text-align:center\"><span style=\"color:#1abc9c\"><u><em><strong>Iron Man Attack of Technovor 2</strong></em></u></span></h1>\r\n', 'huguesdev_45', 0, 'Iron_Man.jpg', 'Sport', NULL, '2022-04-19 12:29:17', '2022-04-19 13:53:34'),
(6, 'Cinema', '<h1 style=\"text-align:center\"><span style=\"color:#2ecc71\"><u><em><strong><span style=\"font-family:Times New Roman,Times,serif\">Iron man 3</span></strong></em></u></span></h1>\r\n\r\n<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>\r\n\r\n<p>Dignissimos magni dolorum,</p>\r\n\r\n<p>dolore ad vero veniam perspiciatis velit exercitationem aliquid ab</p>\r\n', 'huguesdev_45', 1, '331758.jpg', 'World news', NULL, '2022-04-19 13:55:43', '2022-04-19 16:44:19'),
(7, 'World_news 1', '<p style=\"text-align:center\">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>\r\n\r\n<p style=\"text-align:center\">Dignissimos magni dolorum,</p>\r\n\r\n<p style=\"text-align:center\">dolore ad vero veniam perspiciatis velit exercitationem aliquid</p>\r\n\r\n<p style=\"text-align:center\">ab tempora sit accusantium tenetur sunt aut porro quo autem quae?</p>\r\n', 'hugh_Dev06', 1, 'c1.jpg', 'World_news', NULL, '2022-04-19 16:37:10', NULL),
(8, 'World_news 2', '<p style=\"text-align:center\">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>\r\n\r\n<p style=\"text-align:center\">Dignissimos magni dolorum,</p>\r\n\r\n<p style=\"text-align:center\">dolore ad vero veniam perspiciatis velit exercitationem aliquid</p>\r\n\r\n<p style=\"text-align:center\">ab tempora sit accusantium tenetur sunt aut porro quo autem quae?</p>\r\n', 'hugh_Dev06', 1, 'c22.jpg', 'World_news', NULL, '2022-04-19 16:41:39', NULL),
(9, 'World_news 3', '<p style=\"text-align:center\">Lorem, ipsum dolor sit amet consectetur adipisicing elit</p>\r\n\r\n<p>Dignissimos magni dolorum,&nbsp; &nbsp; dolore ad vero veniam perspiciatis velit exercitationem aliquid</p>\r\n\r\n<p>ab tempora sit accusantium tenetur sunt aut porro quo autem quae?</p>\r\n', 'hugh_Dev06', 1, 'c33.jpg', 'World_news', NULL, '2022-04-19 16:41:57', '2022-04-25 13:49:25'),
(10, 'World_news 4', '<p style=\"text-align:center\">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>\r\n\r\n<p>Dignissimos magni dolorum,&nbsp; dolore ad vero veniam perspiciatis velit exercitationem aliquid ab tempora sit accusantium tenetur sunt aut porro quo autem quae?&nbsp;velit exercitationem aliquid ab tempora sit accusantium tenetur sunt aut porro quo autem quae?&nbsp;velit exercitationem aliquid ab tempora sit accusantium tenetur sunt aut porro quo autem quae?velit exercitationem aliquid ab tempora sit accusantium tenetur sunt aut porro quo autem quae?velit exercitationem aliquid ab tempora sit accusantium tenetur sunt aut porro quo autem quae?velit exercitationem aliquid ab tempora sit accusantium tenetur sunt aut porro quo autem quae?velit exercitationem aliquid ab tempora sit accusantium tenetur sunt aut porro quo autem quae?velit exercitationem aliquid ab tempora sit accusantium tenetur sunt aut porro quo autem quae?</p>\r\n', 'hugh_Dev06', 1, 'c44.jpg', 'World_news', 1, '2022-04-19 16:42:26', '2022-04-25 13:51:18'),
(11, 'World_news 5', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>\r\n\r\n<p>Dignissimos magni dolorum,</p>\r\n\r\n<p>dolore ad vero veniam perspiciatis velit exercitationem aliquid</p>\r\n\r\n<p>ab tempora sit accusantium tenetur sunt aut porro quo autem quae?</p>\r\n', 'hugh_Dev06', 1, '286148.jpg', 'World_news,Culture', NULL, '2022-04-19 17:12:21', '2022-04-21 13:27:05'),
(12, 'Cinema 1 ', '<p>Marverl Moon knight</p>\r\n\r\n<p>Nulla quis lorem neque, mattis venenatis lectus.</p>\r\n\r\n<p>In interdum ullamcorper dolor eu mattis.</p>\r\n\r\n<p>Marverl Moon knight</p>\r\n\r\n<p>Nulla quis lorem neque, mattis venenatis lectus.</p>\r\n\r\n<p>In interdum ullamcorper dolor eu mattis.</p>\r\n\r\n<p>Marverl Moon knight</p>\r\n\r\n<p>Nulla quis lorem neque, mattis venenatis lectus.</p>\r\n\r\n<p>In interdum ullamcorper dolor eu mattis.</p>\r\n\r\n<p>Marverl Moon knight</p>\r\n\r\n<p>Nulla quis lorem neque, mattis venenatis lectus.</p>\r\n\r\n<p>In interdum ullamcorper dolor eu mattis.</p>\r\n\r\n<p>Marverl Moon knight</p>\r\n\r\n<p>Nulla quis lorem neque, mattis venenatis lectus.</p>\r\n\r\n<p>In interdum ullamcorper dolor eu mattis.</p>\r\n\r\n<p>Marverl Moon knight</p>\r\n\r\n<p>Nulla quis lorem neque, mattis venenatis lectus.</p>\r\n\r\n<p>In interdum ullamcorper dolor eu mattis.</p>\r\n\r\n<p>Marverl Moon knight</p>\r\n\r\n<p>Nulla quis lorem neque, mattis venenatis lectus.</p>\r\n\r\n<p>In interdum ullamcorper dolor eu mattis.</p>\r\n\r\n<p>Marverl Moon knight</p>\r\n\r\n<p>Nulla quis lorem neque, mattis venenatis lectus.</p>\r\n\r\n<p>In interdum ullamcorper dolor eu mattis.</p>\r\n', 'huguesdev_45', 1, 'moon.jpg', 'Divertissement,Cinema', NULL, '2022-04-20 12:13:07', '2022-04-20 17:14:23'),
(15, 'Cinema 2', '<p>Lorem ipsum dolor sit amet, consectetur Nulla</p>\r\n\r\n<p>quis lorem neque, mattis venenatis lectus.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur Nulla</p>\r\n\r\n<p>quis lorem neque, mattis venenatis lectus.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur Nulla</p>\r\n\r\n<p>quis lorem neque, mattis venenatis lectus.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur Nulla</p>\r\n\r\n<p>quis lorem neque, mattis venenatis lectus.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur Nulla</p>\r\n\r\n<p>quis lorem neque, mattis venenatis lectus.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur Nulla</p>\r\n\r\n<p>quis lorem neque, mattis venenatis lectus.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur Nulla</p>\r\n\r\n<p>quis lorem neque, mattis venenatis lectus.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur Nulla</p>\r\n\r\n<p>quis lorem neque, mattis venenatis lectus.</p>\r\n', 'huguesdev_45', 1, 'm3.jpg', 'Divertissement,Cinema', NULL, '2022-04-20 13:23:09', '2022-04-20 17:28:44'),
(16, 'cinema 3', '<p>Lorem ipsum dolor sit amet, consectetur Nulla</p>\r\n\r\n<p>quis lorem neque, mattis venenatis lectus.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur Nulla</p>\r\n\r\n<p>quis lorem neque, mattis venenatis lectus.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur Nulla</p>\r\n\r\n<p>quis lorem neque, mattis venenatis lectus.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur Nulla</p>\r\n\r\n<p>quis lorem neque, mattis venenatis lectus.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur Nulla</p>\r\n\r\n<p>quis lorem neque, mattis venenatis lectus.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur Nulla</p>\r\n\r\n<p>quis lorem neque, mattis venenatis lectus.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur Nulla</p>\r\n\r\n<p>quis lorem neque, mattis venenatis lectus.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur Nulla</p>\r\n\r\n<p>quis lorem neque, mattis venenatis lectus.</p>\r\n', 'huguesdev_45', 1, 'm1.jpg', 'Divertissement,Cinema', NULL, '2022-04-20 13:26:13', '2022-04-20 17:17:21'),
(17, 'cinema 4', '<p><span style=\"font-size:18px\"><span style=\"font-family:Comic Sans MS,cursive\">Lorem ipsum dolor sit </span></span>amet, consectetur Nulla&nbsp; quis lorem neque, mattis venenatis lectus.&nbsp; Lorem ipsum dolor sit amet, consectetur Nulla&nbsp; &nbsp;quis lorem neque, mattis venenatis lectus.&nbsp;<span style=\"color:#1abc9c\"> &nbsp;Lorem ipsum dolor sit amet, </span>consectetur Nulla&nbsp; quis lorem neque, mattis venenatis lectus.&nbsp; Lorem ipsum dolor sit amet, consectetur Nulla&nbsp; quis lorem neque, mattis venenatis lectus. Lorem ipsum dolor sit amet, consectetur Nulla quis lorem neque, mattis venenatis lectus. Lorem ipsum dolor sit amet, consectetur <span style=\"background-color:#f1c40f\">Nulla quis lorem neque, mattis venenatis lectus.</span></p>\r\n', 'huguesdev_45', 1, 'm2.jpg', 'Divertissement,Cinema', NULL, '2022-04-20 13:27:56', '2022-04-25 11:20:36'),
(18, 'Lorem ipsum dolor sit amet, consectetur ', '<p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper</p>\r\n\r\n<p>dolor eu mattis.Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor eu mattis.Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor eu mattis.Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor eu mattis.Nulla quis lorem neque, mattis ven</p>\r\n\r\n<p>enatis lectus. In interdum ullamcorper dolor eu mattis.Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor eu mattis.Nulla quis lorem neque, mattis venenatis lectus.</p>\r\n\r\n<p>In interdum ullamcorper dolor eu mattis.Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor eu mattis.Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor eu mattis.</p>\r\n', 'huguesdev_45', 1, 'a2.jpg', 'Annonces', NULL, '2022-04-20 17:54:32', NULL),
(19, 'Lorem ipsum do , consectetur consectetur', '<h1 style=\"text-align:center\"><strong><em><span style=\"color:#1abc9c\">Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper</span></em></strong></h1>\r\n\r\n<p><em><u><span style=\"color:#e74c3c\">dolor eu mattis.Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor eu mattis.Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor eu mattis.Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor eu mattis.Nulla quis lorem neque, mattis ven</span></u></em></p>\r\n\r\n<p>enatis lectus. In interdum ullamcorper dolor eu mattis.Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor eu mattis.Nulla quis lorem neque, mattis venenatis lectus.</p>\r\n\r\n<p>In interdum ullamcorper dolor eu mattis.Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor eu mattis.Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor eu mattis.</p>\r\n', 'huguesdev_45', 1, 'a3.jpg', 'Annonces,Livres', 1, '2022-04-20 17:55:38', '2022-04-21 13:01:15'),
(20, 'consectetur, Lorem ipsum dolor sit amet, ', '<p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper</p>\r\n\r\n<p>dolor eu mattis.Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor eu mattis.Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor eu mattis.Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor eu mattis.Nulla quis lorem neque, mattis ven</p>\r\n\r\n<p>enatis lectus. In interdum ullamcorper dolor eu mattis.Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor eu mattis.Nulla quis lorem neque, mattis venenatis lectus.</p>\r\n\r\n<p>In interdum ullamcorper dolor eu mattis.Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor eu mattis.Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor eu mattis.</p>\r\n', 'huguesdev_45', 1, 'a1.jpg', 'Blogs,Livres', NULL, '2022-04-20 17:56:19', '2023-05-09 11:17:44');

-- --------------------------------------------------------

--
-- Structure de la table `app_category`
--

CREATE TABLE `app_category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `add_by` varchar(255) NOT NULL,
  `date_add` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `app_category`
--

INSERT INTO `app_category` (`category_id`, `name`, `add_by`, `date_add`, `date_update`) VALUES
(22, 'accessoire', '', '2024-02-21 12:03:18', NULL),
(23, 'bague', '', '2024-02-21 12:03:18', '2024-04-26 20:30:18'),
(24, 'bracelet', '', '2024-02-21 12:03:18', '2024-04-26 20:30:26'),
(25, 'boucle', '', '2024-02-21 12:03:18', '2024-04-26 20:30:35');

-- --------------------------------------------------------

--
-- Structure de la table `app_client`
--

CREATE TABLE `app_client` (
  `id_client` int(11) NOT NULL,
  `nom_complet_client` varchar(250) NOT NULL,
  `pseudo_client` varchar(250) NOT NULL,
  `ville_client` varchar(250) DEFAULT NULL,
  `commune_client` varchar(250) DEFAULT NULL,
  `quartier_client` varchar(250) DEFAULT NULL,
  `contact_client` varchar(250) DEFAULT NULL,
  `email_client` varchar(250) NOT NULL,
  `password_client` varchar(250) NOT NULL,
  `statut_client` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `app_client`
--

INSERT INTO `app_client` (`id_client`, `nom_complet_client`, `pseudo_client`, `ville_client`, `commune_client`, `quartier_client`, `contact_client`, `email_client`, `password_client`, `statut_client`) VALUES
(8, 'Sinan Arnaud Cedric Emmanuel Assoumou', 'dox', 'Abidjan', 'Port-Bouët', 'Soghefia', '002250101010101', 'assoumouc06@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(9, 'hugues Ody', '', NULL, NULL, NULL, NULL, 'hugues@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(10, 'Peniel Assoumou', '', NULL, NULL, NULL, NULL, 'peniel@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1);

-- --------------------------------------------------------

--
-- Structure de la table `app_collection`
--

CREATE TABLE `app_collection` (
  `id_collection` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_creation` date DEFAULT NULL,
  `image_princ` varchar(255) NOT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT 1,
  `date_add` date NOT NULL,
  `date_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `app_collection`
--

INSERT INTO `app_collection` (`id_collection`, `name`, `date_creation`, `image_princ`, `statut`, `date_add`, `date_update`) VALUES
(1, 'Elégance', '0000-00-00', '2024_04_26_20_22_21_727966680.jpeg', 1, '2024-04-26', '0000-00-00'),
(2, 'Distinction', '0000-00-00', '2024_04_26_20_25_05_393788079.jpeg', 1, '2024-04-26', '0000-00-00'),
(3, 'Weeding', '2024-05-01', '2024_05_06_00_55_48_531446058.jpeg', 1, '2024-05-06', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `app_commande`
--

CREATE TABLE `app_commande` (
  `id_commande` int(250) NOT NULL,
  `numero_commande` varchar(250) NOT NULL,
  `montant_commande` varchar(250) NOT NULL,
  `nb_article_commande` varchar(250) NOT NULL,
  `date_commande` varchar(250) NOT NULL,
  `id_client_commande` varchar(250) NOT NULL,
  `nom_recepteur` varchar(250) NOT NULL,
  `ville_recepteur` varchar(250) NOT NULL,
  `commune_recepteur` varchar(250) NOT NULL,
  `quartier_recepteur` varchar(250) NOT NULL,
  `contact_recepteur` int(250) NOT NULL,
  `description_livraison` longtext NOT NULL,
  `mode_livraison` varchar(250) NOT NULL,
  `statut_comande` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `app_commande_article`
--

CREATE TABLE `app_commande_article` (
  `id_cmd_article` int(11) NOT NULL,
  `id_cmd` int(11) NOT NULL,
  `client_id` varchar(250) NOT NULL,
  `id_article` int(11) NOT NULL,
  `designation_article` varchar(250) NOT NULL,
  `quantite_article` varchar(250) NOT NULL,
  `image_article` varchar(250) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `date_add` varchar(250) NOT NULL,
  `date_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `app_couleur`
--

CREATE TABLE `app_couleur` (
  `id_couleur` int(11) NOT NULL,
  `code_couleur` varchar(100) NOT NULL,
  `activation_couleur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `app_couleur`
--

INSERT INTO `app_couleur` (`id_couleur`, `code_couleur`, `activation_couleur`) VALUES
(3, 'rouge', 1),
(4, 'marron', 1);

-- --------------------------------------------------------

--
-- Structure de la table `app_image`
--

CREATE TABLE `app_image` (
  `image_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `article_id` int(11) NOT NULL,
  `date_add` date NOT NULL,
  `date_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `app_image`
--

INSERT INTO `app_image` (`image_id`, `name`, `path`, `article_id`, `date_add`, `date_update`) VALUES
(1, '2024_02_16_10_33_47_1807497291.jpg', '2024_02_16_10_33_47_1807497291.jpg', 0, '2024-02-16', '0000-00-00'),
(2, '2024_02_16_10_36_42_148109692.jpg', '2024_02_16_10_36_42_148109692.jpg', 0, '2024-02-16', '0000-00-00'),
(3, '2024_02_16_10_37_11_1559835.jpg', '2024_02_16_10_37_11_1559835.jpg', 0, '2024-02-16', '0000-00-00'),
(4, '2024_02_16_10_41_16_1399204316.jpg', '2024_02_16_10_41_16_1399204316.jpg', 0, '2024-02-16', '0000-00-00'),
(5, '2024_02_16_11_02_13_1574451537.jpg', '2024_02_16_11_02_13_1574451537.jpg', 0, '2024-02-16', '0000-00-00'),
(6, '2024_02_16_11_02_33_1159634993.jpg', '2024_02_16_11_02_33_1159634993.jpg', 0, '2024-02-16', '0000-00-00'),
(7, '2024_02_16_11_15_54_250147812.jpg', '2024_02_16_11_15_54_250147812.jpg', 0, '2024-02-16', '0000-00-00'),
(8, '2024_02_16_11_16_31_475932856.jpg', '2024_02_16_11_16_31_475932856.jpg', 0, '2024-02-16', '0000-00-00'),
(9, '2024_02_16_11_17_25_22445101.jpg', '2024_02_16_11_17_25_22445101.jpg', 0, '2024-02-16', '0000-00-00'),
(10, '2024_02_16_11_19_01_212487741.jpg', '2024_02_16_11_19_01_212487741.jpg', 0, '2024-02-16', '0000-00-00'),
(11, '2024_02_16_11_19_37_2145998121.jpg', '2024_02_16_11_19_37_2145998121.jpg', 0, '2024-02-16', '0000-00-00'),
(12, '2024_02_16_11_33_00_1897411350.jpg', '2024_02_16_11_33_00_1897411350.jpg', 0, '2024-02-16', '0000-00-00'),
(13, '2024_02_16_13_32_14_1640810218.jpg', '2024_02_16_13_32_14_1640810218.jpg', 0, '2024-02-16', '0000-00-00'),
(14, '2024_02_16_13_33_10_326728526.jpg', '2024_02_16_13_33_10_326728526.jpg', 0, '2024-02-16', '0000-00-00'),
(15, '2024_02_16_13_37_33_1335145566.jpg', '2024_02_16_13_37_33_1335145566.jpg', 0, '2024-02-16', '0000-00-00'),
(16, '2024_02_16_13_39_07_940111364.jpg', '2024_02_16_13_39_07_940111364.jpg', 0, '2024-02-16', '0000-00-00'),
(17, '2024_02_16_13_39_40_1529493602.jpg', '2024_02_16_13_39_40_1529493602.jpg', 0, '2024-02-16', '0000-00-00'),
(18, '2024_02_16_13_41_30_2028056375.jpg', '2024_02_16_13_41_30_2028056375.jpg', 0, '2024-02-16', '0000-00-00'),
(19, '2024_02_16_13_42_19_857248902.jpg', '2024_02_16_13_42_19_857248902.jpg', 0, '2024-02-16', '0000-00-00'),
(20, '2024_02_16_13_44_14_5510991991.jpg', '2024_02_16_13_44_14_5510991991.jpg', 0, '2024-02-16', '0000-00-00'),
(21, '2024_02_16_13_46_08_9388818521.jpg', '2024_02_16_13_46_08_9388818521.jpg', 0, '2024-02-16', '0000-00-00'),
(22, '2024_02_16_13_48_42_1045811722.jpg', '2024_02_16_13_48_42_1045811722.jpg', 0, '2024-02-16', '0000-00-00'),
(23, '2024_02_16_13_52_59_747421261.jpg', '2024_02_16_13_52_59_747421261.jpg', 0, '2024-02-16', '0000-00-00'),
(24, '2024_02_16_13_53_58_2140529212.jpg', '2024_02_16_13_53_58_2140529212.jpg', 0, '2024-02-16', '0000-00-00'),
(25, '2024_02_16_13_58_31_1281980177.jpg', '2024_02_16_13_58_31_1281980177.jpg', 0, '2024-02-16', '0000-00-00'),
(26, '2024_02_16_15_02_29_18275174071.jpg', '2024_02_16_15_02_29_18275174071.jpg', 22, '2024-02-16', '0000-00-00'),
(27, '2024_02_16_15_05_20_10442424341.jpg', '2024_02_16_15_05_20_10442424341.jpg', 23, '2024-02-16', '0000-00-00'),
(28, '2024_02_16_15_05_20_10442424342.jpg', '2024_02_16_15_05_20_10442424342.jpg', 23, '2024-02-16', '0000-00-00'),
(29, '2024_02_16_15_05_20_10442424343.jpg', '2024_02_16_15_05_20_10442424343.jpg', 23, '2024-02-16', '0000-00-00'),
(30, '2024_02_19_10_28_17_2748199861.jpg', '2024_02_19_10_28_17_2748199861.jpg', 25, '2024-02-19', '0000-00-00'),
(31, '2024_02_19_10_32_24_18033807371.jpg', '2024_02_19_10_32_24_18033807371.jpg', 26, '2024-02-19', '0000-00-00'),
(32, '2024_02_19_10_36_30_11695347901.jpg', '2024_02_19_10_36_30_11695347901.jpg', 27, '2024-02-19', '0000-00-00'),
(33, '2024_02_19_10_36_30_11695347902.jpg', '2024_02_19_10_36_30_11695347902.jpg', 27, '2024-02-19', '0000-00-00'),
(34, '2024_02_19_10_36_30_11695347903.jpg', '2024_02_19_10_36_30_11695347903.jpg', 27, '2024-02-19', '0000-00-00'),
(35, '2024_02_19_10_36_30_11695347904.jpg', '2024_02_19_10_36_30_11695347904.jpg', 27, '2024-02-19', '0000-00-00'),
(36, '2024_02_20_18_42_50_10273315391.jpg', '2024_02_20_18_42_50_10273315391.jpg', 28, '2024-02-20', '0000-00-00'),
(37, '2024_02_20_18_51_08_11361892081.jpg', '2024_02_20_18_51_08_11361892081.jpg', 31, '2024-02-20', '0000-00-00'),
(38, '2024_02_20_18_57_32_5965945661.jpg', '2024_02_20_18_57_32_5965945661.jpg', 32, '2024-02-20', '0000-00-00'),
(39, '2024_02_21_12_44_42_4525165151.jpeg', '2024_02_21_12_44_42_4525165151.jpeg', 33, '2024-02-21', '0000-00-00'),
(40, '2024_02_21_18_40_26_1055005634.jpeg', '2024_02_21_18_40_26_1055005634.jpeg', 34, '2024-02-21', '0000-00-00'),
(41, '2024_02_22_17_19_31_3183734341.jpeg', '2024_02_22_17_19_31_3183734341.jpeg', 39, '2024-02-22', '0000-00-00'),
(45, '2024_02_22_18_18_08_338767171.jpeg', '2024_02_22_18_18_08_338767171.jpeg', 43, '2024-02-22', '0000-00-00'),
(46, '2024_02_22_18_18_08_33876717.jpg', '2024_02_22_18_18_08_33876717.jpg', 43, '2024-02-22', '0000-00-00'),
(47, '2024_02_22_18_18_08_338767171.jpg', '2024_02_22_18_18_08_338767171.jpg', 43, '2024-02-22', '0000-00-00'),
(48, '2024_05_11_23_44_48_748176927.png', '2024_05_11_23_44_48_748176927.png', 44, '2024-05-11', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `app_infos_gen`
--

CREATE TABLE `app_infos_gen` (
  `infos_id` int(11) NOT NULL,
  `site_logo` varchar(255) NOT NULL,
  `site_mail_1` varchar(255) NOT NULL,
  `site_mail_2` varchar(255) NOT NULL,
  `contact_1` varchar(255) NOT NULL,
  `contact_2` varchar(255) NOT NULL,
  `facebook` varchar(225) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date_add` date NOT NULL,
  `date_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `app_infos_gen`
--

INSERT INTO `app_infos_gen` (`infos_id`, `site_logo`, `site_mail_1`, `site_mail_2`, `contact_1`, `contact_2`, `facebook`, `location`, `date_add`, `date_update`) VALUES
(1, '2024_03_15_15_03_18_1630159766.png', 'infos@ivoire-lagune-services.com', 'infos@ivoire-lagune-services.com', '0778281752', '0202589788', 'https://www.facebook.com/mrdhalo8.1/', 'cote d\'ivoire, abidjan, port-bouet', '0000-00-00', '2024-03-15');

-- --------------------------------------------------------

--
-- Structure de la table `app_messages`
--

CREATE TABLE `app_messages` (
  `message_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `objet` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `date_add` date NOT NULL,
  `date_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `app_messages`
--

INSERT INTO `app_messages` (`message_id`, `nom`, `email`, `telephone`, `objet`, `message`, `is_read`, `date_add`, `date_update`) VALUES
(1, 'hugh', 'hugh@gmail.com', '0504658852', '', 'yooooo', 1, '2024-03-13', '2024-03-13'),
(2, 'test', 'assoumggouc06@gmail.com', '2778798', 'CC', 'JMSKDSLF', 1, '2024-04-06', '0000-00-00'),
(3, 'Cedrc test', 'assoumouc06@gmail.com', '0748593565', 'fddf', 'sdcvfbg', 1, '2024-04-06', '0000-00-00'),
(4, 'Cedrc test', 'assoumouc06@gmail.com', '0748593565', 'fddf', 'CSFVBN', 1, '2024-04-06', '0000-00-00'),
(5, 'SINAN ARNAUD CEDRIC ASSOUMOU', 'assoumouc06@gmail.com', '0150222227', 'cc', 'salut', 1, '2024-04-18', '0000-00-00'),
(6, 'Hugues-Devallois Ody', 'huguesody@gmail.com', '506964552', 'test', 'Messages test', 0, '2024-04-29', '0000-00-00'),
(7, 'Hugues-Devallois Ody', 'huguesody@gmail.com', '506964552', 'test2', 'messages test', 0, '2024-04-29', '0000-00-00'),
(8, 'Hugues-Devallois Ody', 'huguesody@gmail.com', '506964552', 'test3', 'messages test3', 0, '2024-04-29', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `app_model`
--

CREATE TABLE `app_model` (
  `id_model` int(11) NOT NULL,
  `code_model` varchar(50) NOT NULL,
  `marque_id` int(11) NOT NULL,
  `activation_model` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `app_model`
--

INSERT INTO `app_model` (`id_model`, `code_model`, `marque_id`, `activation_model`) VALUES
(12, 'a1', 16, 1),
(13, 'a3', 16, 1),
(14, 'a4', 16, 1),
(15, 'a4 allroad', 16, 1),
(16, 'a5', 16, 1),
(17, 'a6 allroa', 16, 1),
(18, 'a7', 16, 1),
(19, 'g01', 5, 1),
(20, 'x5', 5, 1),
(21, 'x6', 5, 1),
(22, 'g11', 5, 1),
(23, 'g20', 5, 1),
(24, 'g42', 5, 1),
(25, 'bronco', 7, 1),
(26, 'ecosport', 7, 1),
(27, 'expedition', 7, 1),
(28, 'explorer', 7, 1),
(29, 'f150', 7, 1),
(30, 'fiesta', 7, 1),
(31, 'focus', 7, 1),
(32, 'galaxy', 7, 1),
(33, 'gt', 7, 1),
(34, 'celerio', 20, 1),
(35, 'jimy', 20, 1),
(36, 'super carry', 20, 1),
(37, 'grand vitara', 20, 1),
(38, 'alto', 0, 1),
(39, 'alto', 20, 1),
(40, 'starlet', 17, 1),
(41, 'rumion', 17, 1),
(42, 'belta', 17, 1),
(43, 'urban cruiser', 17, 1),
(44, 'new corolla', 17, 1),
(45, 'rav4', 17, 1),
(46, 'lc prado', 17, 1),
(47, 'land cruiser', 17, 1);

-- --------------------------------------------------------

--
-- Structure de la table `app_offer`
--

CREATE TABLE `app_offer` (
  `offer_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `date_fin` date NOT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT 1,
  `date_add` date NOT NULL,
  `date_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `app_offer`
--

INSERT INTO `app_offer` (`offer_id`, `article_id`, `date_fin`, `statut`, `date_add`, `date_update`) VALUES
(5, 40, '0000-00-00', 1, '2024-03-20', '0000-00-00'),
(6, 41, '2024-04-26', 1, '2024-04-18', '2024-04-18');

-- --------------------------------------------------------

--
-- Structure de la table `app_panier`
--

CREATE TABLE `app_panier` (
  `id_panier` int(11) NOT NULL,
  `article_id` int(250) NOT NULL,
  `quantite_panier` int(250) NOT NULL,
  `client_id` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `app_reservation`
--

CREATE TABLE `app_reservation` (
  `id_reserv` int(11) NOT NULL,
  `numero_reserv` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `prix_reserv` varchar(255) NOT NULL,
  `date_debut` datetime DEFAULT NULL,
  `date_fin` datetime DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `destination` varchar(255) NOT NULL,
  `moyen_paiement` varchar(255) NOT NULL,
  `id_vehicule` int(11) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `date_add` date NOT NULL,
  `date_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `app_sliders`
--

CREATE TABLE `app_sliders` (
  `slider_id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `slider_image` varchar(255) DEFAULT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT 1,
  `bouton_label` varchar(20) DEFAULT NULL,
  `lien_slider` varchar(255) DEFAULT NULL,
  `date_update` date DEFAULT NULL,
  `date_add` date NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `app_sliders`
--

INSERT INTO `app_sliders` (`slider_id`, `titre`, `description`, `slider_image`, `statut`, `bouton_label`, `lien_slider`, `date_update`, `date_add`, `price`) VALUES
(3, '1', NULL, '2024_04_26_19_10_31_2140079356.jpeg', 1, NULL, NULL, NULL, '2024-04-26', ''),
(4, '2', NULL, '2024_04_26_19_11_22_1393608072.jpeg', 1, NULL, NULL, NULL, '2024-04-26', ''),
(5, NULL, NULL, '2024_04_26_19_18_31_1011276162.jpeg', 1, NULL, NULL, NULL, '2024-04-26', ''),
(6, NULL, NULL, '2024_04_26_19_18_47_2718208.jpeg', 1, NULL, NULL, NULL, '2024-04-26', ''),
(7, NULL, NULL, '2024_04_26_19_18_58_1101328869.jpeg', 1, NULL, NULL, NULL, '2024-04-26', ''),
(9, NULL, NULL, '2024_04_26_19_22_32_1604348887.jpeg', 1, NULL, NULL, NULL, '2024-04-26', '');

-- --------------------------------------------------------

--
-- Structure de la table `app_sous_category`
--

CREATE TABLE `app_sous_category` (
  `sous_category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `date_add` date NOT NULL,
  `date_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `app_sous_category`
--

INSERT INTO `app_sous_category` (`sous_category_id`, `name`, `cat_id`, `date_add`, `date_update`) VALUES
(6, 'clé', 22, '2024-02-21', '2024-02-22'),
(7, 'clé usb', 22, '2024-02-21', '2024-04-26'),
(9, 'bague en pierre', 23, '2024-02-21', '2024-04-26');

-- --------------------------------------------------------

--
-- Structure de la table `app_visiteur`
--

CREATE TABLE `app_visiteur` (
  `id_visiteur` int(11) NOT NULL,
  `visiteur_ip` varchar(250) DEFAULT NULL,
  `visiteur_date` varchar(250) NOT NULL,
  `visiteur_date1` varchar(150) NOT NULL,
  `visiteur_pays` varchar(250) NOT NULL,
  `visiteur_ville` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `app_visiteur`
--

INSERT INTO `app_visiteur` (`id_visiteur`, `visiteur_ip`, `visiteur_date`, `visiteur_date1`, `visiteur_pays`, `visiteur_ville`) VALUES
(2, '160.120.165.140', '20240321173938', '20240321', 'CI', 'Abidjan'),
(3, '160.120.165.140', '20240326095118', '20240326', 'CI', 'Abidjan'),
(4, '160.120.165.140', '20240329084612', '20240329', 'CI', 'Abidjan'),
(5, '160.120.165.140', '20240404170145', '20240404', 'CI', 'Abidjan'),
(6, '38.199.209.129', '20240404225129', '20240404', 'CI', 'Abidjan'),
(7, '160.120.165.140', '20240405110648', '20240405', 'CI', 'Abidjan'),
(8, '38.199.209.129', '20240406043639', '20240406', 'CI', 'Abidjan'),
(9, '38.199.209.129', '20240418011626', '20240418', 'CI', 'Abidjan'),
(10, NULL, '20240418012539', '20240418', 'CI', 'Abidjan'),
(11, '160.120.165.140', '20240418113106', '20240418', 'CI', 'Abidjan'),
(12, '160.120.165.140', '20240423155805', '20240423', 'CI', 'Abidjan'),
(13, '160.120.165.140', '20240424171225', '20240424', 'CI', 'Abidjan'),
(14, '160.120.184.47', '20240425000227', '20240425', 'CI', 'Abidjan'),
(15, '160.120.165.140', '20240425181709', '20240425', 'CI', 'Abidjan'),
(16, '160.120.165.140', '20240426162408', '20240426', 'CI', 'Abidjan'),
(17, '160.120.184.47', '20240427113858', '20240427', 'CI', 'Abidjan'),
(18, '160.120.165.140', '20240429174810', '20240429', 'CI', 'Abidjan'),
(19, '160.120.165.140', '20240502130117', '20240502', 'CI', 'Abidjan'),
(20, '160.120.184.47', '20240506001525', '20240506', 'CI', 'Abidjan'),
(21, NULL, '20240507221002', '20240507', '', ''),
(22, '160.120.184.47', '20240507221054', '20240507', 'CI', 'Abidjan'),
(23, NULL, '20240508000653', '20240508', '', ''),
(24, '160.120.184.47', '20240508010842', '20240508', 'CI', 'Abidjan'),
(25, '160.120.184.47', '20240508010840', '20240508', 'CI', 'Abidjan'),
(26, '160.120.184.47', '20240511121744', '20240511', 'CI', 'Abidjan'),
(27, '160.120.165.140', '20240514163038', '20240514', 'CI', 'Abidjan'),
(28, '102.67.253.88', '20240529211003', '20240529', 'CI', 'Abidjan'),
(29, '160.120.165.140', '20240530122116', '20240530', 'CI', 'Abidjan'),
(30, '160.120.184.47', '20240629105643', '20240629', 'CI', 'Abidjan'),
(31, '160.120.184.47', '20240707192840', '20240707', 'CI', 'Abidjan');

-- --------------------------------------------------------

--
-- Structure de la table `cms_contact`
--

CREATE TABLE `cms_contact` (
  `id_contact` int(11) NOT NULL,
  `nom_contact` varchar(250) NOT NULL,
  `tel_contact` varchar(250) NOT NULL,
  `email_contact` varchar(250) NOT NULL,
  `objet_contact` varchar(250) NOT NULL,
  `message_contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `cms_contact`
--

INSERT INTO `cms_contact` (`id_contact`, `nom_contact`, `tel_contact`, `email_contact`, `objet_contact`, `message_contact`) VALUES
(1, 'Cedrc test', '0748593565', 'assoumouc06@gmail.com', 'CC', 'wdqsdqs'),
(2, 'SINAN ARNAUD CEDRIC ASSOUMOU', '0150222227', 'assoumouc06@gmail.com', 'dssds', 'sdss'),
(3, 'SINAN ARNAUD CEDRIC ASSOUMOU', '0150222227', 'assoumouc06@gmail.com', 'zdsd', 'sdsdssd');

-- --------------------------------------------------------

--
-- Structure de la table `cms_infos_generale`
--

CREATE TABLE `cms_infos_generale` (
  `id_info` int(11) NOT NULL,
  `contact1_info` varchar(250) NOT NULL,
  `contact2_info` varchar(250) NOT NULL,
  `email_info` varchar(250) NOT NULL,
  `localisation_info` varchar(250) NOT NULL,
  `logo_info` varchar(250) NOT NULL,
  `lien_facebook` varchar(250) NOT NULL,
  `lien_whatsapp` varchar(250) NOT NULL,
  `lien_tiktok` varchar(250) NOT NULL,
  `lien_instagram` varchar(250) NOT NULL,
  `lien_linkedIn` varchar(250) NOT NULL,
  `court_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `cms_infos_generale`
--

INSERT INTO `cms_infos_generale` (`id_info`, `contact1_info`, `contact2_info`, `email_info`, `localisation_info`, `logo_info`, `lien_facebook`, `lien_whatsapp`, `lien_tiktok`, `lien_instagram`, `lien_linkedIn`, `court_description`) VALUES
(1, '+225 07 78 70 17 73', '', 'shinebynoam@gmail.com', 'Côte d\'Ivoire, Abidjan, Port Bouet', '2024_04_26_18_10_29_1701873116.png', 'https://www.facebook.com/', '', '', '', '', 'Bienvenue chez SHYNE BY NOAME, votre destination en ligne pour des bijoux et accessoires uniques et inspirants. Nous nous engageons à créer des pièces magnifiques qui racontent des histoires et captivent votre imagination. Chez SHYNE BY NOAME, chaque bijou est méticuleusement conçu avec amour et soin, alliant artisanat traditionnel et style contemporain. Nos collections variées vous offrent un éventail de choix, des pièces délicates pour le quotidien aux créations audacieuses pour les occasions spéciales. Nous croyons en la beauté intemporelle des détails et nous nous efforçons d\'offrir à nos SHYNÉS des bijoux qui expriment votre individualité et votre élégance personnelle. Explorez notre sélection et laissez-vous inspirer par notre passion pour l\'art de la joaillerie. Découvrez votre prochain trésor chez SHYNE BY NOAME.');

-- --------------------------------------------------------

--
-- Structure de la table `cms_newletters`
--

CREATE TABLE `cms_newletters` (
  `id_newletters` int(11) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `cms_newletters`
--

INSERT INTO `cms_newletters` (`id_newletters`, `email`) VALUES
(1, 'assoumouc06@gmail.com'),
(2, 'suzanne.koffi@gmail.com'),
(3, 'arnaudlebougeoir@hotmail.fr');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acl_adminpro`
--
ALTER TABLE `acl_adminpro`
  ADD PRIMARY KEY (`id_adminpro`);

--
-- Index pour la table `acl_blocmenu`
--
ALTER TABLE `acl_blocmenu`
  ADD PRIMARY KEY (`id_blocmenu`);

--
-- Index pour la table `acl_cat_profil`
--
ALTER TABLE `acl_cat_profil`
  ADD PRIMARY KEY (`id_cat_profil`);

--
-- Index pour la table `acl_droit_perso`
--
ALTER TABLE `acl_droit_perso`
  ADD PRIMARY KEY (`id_droit_perso`);

--
-- Index pour la table `acl_droit_profil`
--
ALTER TABLE `acl_droit_profil`
  ADD PRIMARY KEY (`id_droit_profil`);

--
-- Index pour la table `acl_element_blocmenu`
--
ALTER TABLE `acl_element_blocmenu`
  ADD PRIMARY KEY (`id_element_blocmenu`);

--
-- Index pour la table `acl_icone`
--
ALTER TABLE `acl_icone`
  ADD PRIMARY KEY (`id_icone`);

--
-- Index pour la table `acl_liste_action`
--
ALTER TABLE `acl_liste_action`
  ADD PRIMARY KEY (`id_liste_action`);

--
-- Index pour la table `acl_liste_action_comment`
--
ALTER TABLE `acl_liste_action_comment`
  ADD PRIMARY KEY (`id_liste_action_comment`);

--
-- Index pour la table `acl_liste_controller`
--
ALTER TABLE `acl_liste_controller`
  ADD PRIMARY KEY (`id_liste_controller`);

--
-- Index pour la table `acl_liste_module`
--
ALTER TABLE `acl_liste_module`
  ADD PRIMARY KEY (`id_liste_module`);

--
-- Index pour la table `acl_liste_onglet`
--
ALTER TABLE `acl_liste_onglet`
  ADD PRIMARY KEY (`id_liste_onglet`);

--
-- Index pour la table `acl_profils`
--
ALTER TABLE `acl_profils`
  ADD PRIMARY KEY (`id_profils`);

--
-- Index pour la table `acl_utilisateur`
--
ALTER TABLE `acl_utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- Index pour la table `app_article`
--
ALTER TABLE `app_article`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `collection_id` (`collection_id`),
  ADD KEY `collection_id_2` (`collection_id`);

--
-- Index pour la table `app_article_marque`
--
ALTER TABLE `app_article_marque`
  ADD PRIMARY KEY (`article_marque_id`);

--
-- Index pour la table `app_blog_article`
--
ALTER TABLE `app_blog_article`
  ADD PRIMARY KEY (`article_id`);

--
-- Index pour la table `app_category`
--
ALTER TABLE `app_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Index pour la table `app_client`
--
ALTER TABLE `app_client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `app_collection`
--
ALTER TABLE `app_collection`
  ADD PRIMARY KEY (`id_collection`);

--
-- Index pour la table `app_commande`
--
ALTER TABLE `app_commande`
  ADD PRIMARY KEY (`id_commande`);

--
-- Index pour la table `app_commande_article`
--
ALTER TABLE `app_commande_article`
  ADD PRIMARY KEY (`id_cmd_article`);

--
-- Index pour la table `app_couleur`
--
ALTER TABLE `app_couleur`
  ADD PRIMARY KEY (`id_couleur`);

--
-- Index pour la table `app_image`
--
ALTER TABLE `app_image`
  ADD PRIMARY KEY (`image_id`);

--
-- Index pour la table `app_messages`
--
ALTER TABLE `app_messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Index pour la table `app_model`
--
ALTER TABLE `app_model`
  ADD PRIMARY KEY (`id_model`);

--
-- Index pour la table `app_offer`
--
ALTER TABLE `app_offer`
  ADD PRIMARY KEY (`offer_id`);

--
-- Index pour la table `app_panier`
--
ALTER TABLE `app_panier`
  ADD PRIMARY KEY (`id_panier`);

--
-- Index pour la table `app_reservation`
--
ALTER TABLE `app_reservation`
  ADD PRIMARY KEY (`id_reserv`),
  ADD UNIQUE KEY `id_reserv` (`id_reserv`);

--
-- Index pour la table `app_sliders`
--
ALTER TABLE `app_sliders`
  ADD PRIMARY KEY (`slider_id`),
  ADD UNIQUE KEY `slider_id` (`slider_id`);

--
-- Index pour la table `app_sous_category`
--
ALTER TABLE `app_sous_category`
  ADD PRIMARY KEY (`sous_category_id`);

--
-- Index pour la table `app_visiteur`
--
ALTER TABLE `app_visiteur`
  ADD PRIMARY KEY (`id_visiteur`);

--
-- Index pour la table `cms_contact`
--
ALTER TABLE `cms_contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Index pour la table `cms_infos_generale`
--
ALTER TABLE `cms_infos_generale`
  ADD PRIMARY KEY (`id_info`);

--
-- Index pour la table `cms_newletters`
--
ALTER TABLE `cms_newletters`
  ADD PRIMARY KEY (`id_newletters`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acl_adminpro`
--
ALTER TABLE `acl_adminpro`
  MODIFY `id_adminpro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `acl_blocmenu`
--
ALTER TABLE `acl_blocmenu`
  MODIFY `id_blocmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `acl_cat_profil`
--
ALTER TABLE `acl_cat_profil`
  MODIFY `id_cat_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `acl_droit_perso`
--
ALTER TABLE `acl_droit_perso`
  MODIFY `id_droit_perso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `acl_droit_profil`
--
ALTER TABLE `acl_droit_profil`
  MODIFY `id_droit_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=639;

--
-- AUTO_INCREMENT pour la table `acl_element_blocmenu`
--
ALTER TABLE `acl_element_blocmenu`
  MODIFY `id_element_blocmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `acl_icone`
--
ALTER TABLE `acl_icone`
  MODIFY `id_icone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `acl_liste_action`
--
ALTER TABLE `acl_liste_action`
  MODIFY `id_liste_action` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT pour la table `acl_liste_action_comment`
--
ALTER TABLE `acl_liste_action_comment`
  MODIFY `id_liste_action_comment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `acl_liste_controller`
--
ALTER TABLE `acl_liste_controller`
  MODIFY `id_liste_controller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `acl_liste_module`
--
ALTER TABLE `acl_liste_module`
  MODIFY `id_liste_module` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `acl_liste_onglet`
--
ALTER TABLE `acl_liste_onglet`
  MODIFY `id_liste_onglet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=352;

--
-- AUTO_INCREMENT pour la table `acl_profils`
--
ALTER TABLE `acl_profils`
  MODIFY `id_profils` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `acl_utilisateur`
--
ALTER TABLE `acl_utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `app_article`
--
ALTER TABLE `app_article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT pour la table `app_article_marque`
--
ALTER TABLE `app_article_marque`
  MODIFY `article_marque_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `app_blog_article`
--
ALTER TABLE `app_blog_article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `app_category`
--
ALTER TABLE `app_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `app_client`
--
ALTER TABLE `app_client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `app_collection`
--
ALTER TABLE `app_collection`
  MODIFY `id_collection` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `app_commande`
--
ALTER TABLE `app_commande`
  MODIFY `id_commande` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `app_commande_article`
--
ALTER TABLE `app_commande_article`
  MODIFY `id_cmd_article` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `app_couleur`
--
ALTER TABLE `app_couleur`
  MODIFY `id_couleur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `app_image`
--
ALTER TABLE `app_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `app_messages`
--
ALTER TABLE `app_messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `app_model`
--
ALTER TABLE `app_model`
  MODIFY `id_model` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `app_offer`
--
ALTER TABLE `app_offer`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `app_panier`
--
ALTER TABLE `app_panier`
  MODIFY `id_panier` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `app_reservation`
--
ALTER TABLE `app_reservation`
  MODIFY `id_reserv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `app_sliders`
--
ALTER TABLE `app_sliders`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `app_sous_category`
--
ALTER TABLE `app_sous_category`
  MODIFY `sous_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `app_visiteur`
--
ALTER TABLE `app_visiteur`
  MODIFY `id_visiteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `cms_contact`
--
ALTER TABLE `cms_contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `cms_infos_generale`
--
ALTER TABLE `cms_infos_generale`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `cms_newletters`
--
ALTER TABLE `cms_newletters`
  MODIFY `id_newletters` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
