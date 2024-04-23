-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 18 avr. 2024 à 14:04
-- Version du serveur :  10.1.29-MariaDB
-- Version de PHP :  7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ivoire_service_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `acl_adminpro`
--

CREATE TABLE `acl_adminpro` (
  `id_adminpro` int(11) NOT NULL,
  `matricule` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `acl_blocmenu`
--

CREATE TABLE `acl_blocmenu` (
  `id_blocmenu` int(11) NOT NULL,
  `nom_blocmenu` varchar(50) NOT NULL DEFAULT '',
  `position_blocmenu` int(11) NOT NULL DEFAULT '0',
  `icone_blocmenu` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acl_blocmenu`
--

INSERT INTO `acl_blocmenu` (`id_blocmenu`, `nom_blocmenu`, `position_blocmenu`, `icone_blocmenu`) VALUES
(1, 'parametrages', 1, 'cog'),
(12, 'pack autos', 2, 'car'),
(13, 'gestions des utilisateurs', 3, 'user'),
(14, 'articles', 5, 'cart'),
(15, 'gestion de contenu', 6, 'building'),
(16, 'gestion des commandes', 4, 'gift'),
(17, 'gestions des messages', 7, 'bell');

-- --------------------------------------------------------

--
-- Structure de la table `acl_cat_profil`
--

CREATE TABLE `acl_cat_profil` (
  `id_cat_profil` int(11) NOT NULL,
  `nom_cat_profil` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `id_acl_utilisateur` int(11) NOT NULL DEFAULT '0',
  `module_droit_perso` varchar(50) NOT NULL DEFAULT '',
  `controller_droit_perso` varchar(50) NOT NULL DEFAULT '',
  `action_droit_perso` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `acl_droit_profil`
--

CREATE TABLE `acl_droit_profil` (
  `id_droit_profil` int(11) NOT NULL,
  `profil_id` int(11) NOT NULL DEFAULT '0',
  `module_droit_profil` varchar(50) NOT NULL DEFAULT '',
  `controller_droit_profil` varchar(50) NOT NULL DEFAULT '',
  `action_droit_profil` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(637, 1, 'message', 'message', 'get_messages');

-- --------------------------------------------------------

--
-- Structure de la table `acl_element_blocmenu`
--

CREATE TABLE `acl_element_blocmenu` (
  `id_element_blocmenu` int(11) NOT NULL,
  `blocmenu_id` int(11) NOT NULL DEFAULT '0',
  `liste_module_id` int(11) NOT NULL DEFAULT '0',
  `numero_element` int(11) NOT NULL DEFAULT '0',
  `nom_element` varchar(50) NOT NULL DEFAULT '',
  `modulenom_element` varchar(50) NOT NULL DEFAULT '',
  `blocmenu_nom` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acl_element_blocmenu`
--

INSERT INTO `acl_element_blocmenu` (`id_element_blocmenu`, `blocmenu_id`, `liste_module_id`, `numero_element`, `nom_element`, `modulenom_element`, `blocmenu_nom`) VALUES
(1, 1, 1, 1, 'configuration de base', 'configuration', 'parametrages'),
(2, 1, 2, 2, 'adminacl', 'adminacl', 'parametrages'),
(31, 12, 32, 1, 'configuration de vehicule', 'configvehicule', 'pack autos'),
(32, 12, 33, 2, 'vehicule', 'automobile', 'pack autos'),
(33, 13, 34, 1, 'utilisateurs', 'utilisateur', 'utilisateur'),
(35, 14, 36, 1, 'configuration article', 'article_config', 'articles'),
(36, 14, 35, 2, 'article', 'article', 'articles'),
(37, 15, 37, 1, 'contenu', 'admin_corporate', 'gestion de contenu'),
(38, 16, 38, 1, 'commandes', 'commandes', 'gestion des commandes'),
(39, 16, 39, 2, 'reservation', 'reservation', 'gestion des commandes'),
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(23, 'admin_corporate', 'admin_corporate', 'get_sliders', ''),
(24, 'admin_corporate', 'admin_corporate', 'add_slider', ''),
(25, 'admin_corporate', 'admin_corporate', 'get_slider_for_edit', ''),
(26, 'admin_corporate', 'admin_corporate', 'edit_slider', ''),
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
(42, 'article_config', 'article_config', 'get_categories', ''),
(43, 'article_config', 'article_config', 'add_category', ''),
(44, 'article_config', 'article_config', 'edit_category', ''),
(45, 'article_config', 'article_config', 'delete_category', ''),
(46, 'article_config', 'article_config', 'delete_cat_selected', ''),
(47, 'article_config', 'article_config', 'get_sous_categories', ''),
(48, 'article_config', 'article_config', 'get_sous_categories_by_cat', ''),
(49, 'article_config', 'article_config', 'add_sous_category', ''),
(50, 'article_config', 'article_config', 'edit_sous_category', ''),
(51, 'article_config', 'article_config', 'delete_sous_category', ''),
(52, 'article_config', 'article_config', 'delete_sous_cat_selected', ''),
(53, 'article_config', 'article_config', 'get_article_marque', ''),
(54, 'article_config', 'article_config', 'add_article_marque', ''),
(55, 'article_config', 'article_config', 'edit_article_marque', ''),
(56, 'article_config', 'article_config', 'delete_article_marque', ''),
(57, 'article_config', 'article_config', 'delete_article_marque_selected', ''),
(58, 'automobile', 'automobile', 'get_vehicule', 'vue de la liste des vehicules'),
(59, 'automobile', 'automobile', 'add_vehicule', 'vue de la liste des marques'),
(60, 'automobile', 'automobile', 'edit_vehicule', 'vue de la liste des marques'),
(61, 'automobile', 'automobile', 'delete_image', 'vue de la liste des marques'),
(62, 'automobile', 'automobile', 'delete_vehicule', ''),
(63, 'automobile', 'automobile', 'detail_vehicule', ''),
(64, 'automobile', 'automobile', 'get_model', ''),
(65, 'automobile', 'automobile', 'add_model', ''),
(66, 'automobile', 'automobile', 'delete_model', ''),
(67, 'automobile', 'automobile', 'edit_model', ''),
(68, 'automobile', 'automobile', 'get_moteur', ''),
(69, 'automobile', 'automobile', 'add_moteur', ''),
(70, 'automobile', 'automobile', 'delete_moteur', ''),
(71, 'automobile', 'automobile', 'edit_moteur', ''),
(72, 'automobile', 'automobile', 'get_couleur', ''),
(73, 'automobile', 'automobile', 'add_couleur', ''),
(74, 'automobile', 'automobile', 'delete_couleur', ''),
(75, 'automobile', 'automobile', 'edit_couleur', ''),
(76, 'commandes', 'commandes', 'get_commandes', ''),
(77, 'commandes', 'commandes', 'get_commande_detail', ''),
(78, 'commandes', 'commandes', 'edit_cmd_state', ''),
(79, 'configuration', 'configuration', 'get_module', 'vue de la liste des modules'),
(80, 'configuration', 'configuration', 'add_module', 'ajouter un module'),
(81, 'configuration', 'configuration', 'edit_module', 'editer un module'),
(82, 'configuration', 'configuration', 'delete_module', 'supprimer un module'),
(83, 'configuration', 'configuration', 'get_blocmenu', 'vue de la liste des blocs de module'),
(84, 'configuration', 'configuration', 'add_blocmenu', 'ajouter un bloc de module'),
(85, 'configuration', 'configuration', 'delete_blocmenu', 'supprimer un bloc de module'),
(86, 'configuration', 'configuration', 'edit_blocmenu', 'editer un bloc de module'),
(87, 'configuration', 'configuration', 'get_menu', 'vue de la liste des menus'),
(88, 'configuration', 'configuration', 'add_menu', 'ajouter un menu de bloc'),
(89, 'configuration', 'configuration', 'delete_menu', 'supprimer un menu de bloc'),
(90, 'configuration', 'configuration', 'edit_menu', 'editer un menu de bloc'),
(91, 'configuration', 'configuration', 'get_onglet', 'vue de la liste des onglets'),
(92, 'configuration', 'configuration', 'add_onglet', 'ajouter un onglet'),
(93, 'configuration', 'configuration', 'delete_onglet', 'supprimer un onglet'),
(94, 'configuration', 'configuration', 'edit_onglet', 'editer un onglet'),
(95, 'configuration', 'configuration', 'get_icone', 'vue de la liste des icones'),
(96, 'configuration', 'configuration', 'add_icone', 'ajouter une icone'),
(97, 'configuration', 'configuration', 'delete_icone', 'supprimer une icone'),
(98, 'configuration', 'configuration', 'edit_icone', 'editer une icone'),
(99, 'configuration', 'configuration', 'get_methodes_module', 'vue de la liste des methodes'),
(100, 'configvehicule', 'configvehicule', 'get_marque', 'vue de la liste des marques'),
(101, 'configvehicule', 'configvehicule', 'add_marque', 'vue de la liste des marques'),
(102, 'configvehicule', 'configvehicule', 'delete_marque', 'vue de la liste des marques'),
(103, 'configvehicule', 'configvehicule', 'edit_marque', 'vue de la liste des marques'),
(104, 'configvehicule', 'configvehicule', 'get_model', ''),
(105, 'configvehicule', 'configvehicule', 'add_model', ''),
(106, 'configvehicule', 'configvehicule', 'delete_model', ''),
(107, 'configvehicule', 'configvehicule', 'edit_model', ''),
(108, 'configvehicule', 'configvehicule', 'get_moteur', ''),
(109, 'configvehicule', 'configvehicule', 'add_moteur', ''),
(110, 'configvehicule', 'configvehicule', 'delete_moteur', ''),
(111, 'configvehicule', 'configvehicule', 'edit_moteur', ''),
(112, 'configvehicule', 'configvehicule', 'get_couleur', ''),
(113, 'configvehicule', 'configvehicule', 'add_couleur', ''),
(114, 'configvehicule', 'configvehicule', 'delete_couleur', ''),
(115, 'configvehicule', 'configvehicule', 'edit_couleur', ''),
(116, 'infoperso', 'infoperso', 'get_infoperso', 'infos personnelles'),
(117, 'information', 'information', 'get_information', 'liste des sliders'),
(118, 'information', 'information', 'add_information', ''),
(119, 'message', 'message', 'get_messages', ''),
(120, 'message', 'message', 'get_message', ''),
(121, 'reservation', 'reservation', 'get_reservations', ''),
(122, 'reservation', 'reservation', 'get_reservation', ''),
(123, 'reservation', 'reservation', 'edit_reserv_state', ''),
(124, 'utilisateur', 'utilisateur', 'get_users', 'liste des utilisateurs'),
(125, 'utilisateur', 'utilisateur', 'edit_statut_user', 'script active ou desactive statut utilisateur'),
(126, 'utilisateur', 'utilisateur', 'add_user', 'ajout utilisateur'),
(127, 'utilisateur', 'utilisateur', 'delete_user', 'suppression utilisateur'),
(128, 'utilisateur', 'utilisateur', 'edit_user', 'edit utilisateur'),
(129, 'utilisateur', 'utilisateur', 'edit_reinitpass', 'script active ou desactive statut utilisateur'),
(130, 'utilisateur', 'utilisateur', 'get_my_profil', '');

-- --------------------------------------------------------

--
-- Structure de la table `acl_liste_action_comment`
--

CREATE TABLE `acl_liste_action_comment` (
  `id_liste_action_comment` int(11) NOT NULL,
  `id_action_comment` int(11) NOT NULL,
  `nom_action_comment` varchar(50) NOT NULL,
  `commentaire` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `acl_liste_controller`
--

CREATE TABLE `acl_liste_controller` (
  `id_liste_controller` int(11) NOT NULL,
  `nom_module_controller` varchar(50) NOT NULL DEFAULT '',
  `nom_controller` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acl_liste_controller`
--

INSERT INTO `acl_liste_controller` (`id_liste_controller`, `nom_module_controller`, `nom_controller`) VALUES
(1, 'adminacl', 'adminacl'),
(2, 'administration', 'administration'),
(3, 'admin_corporate', 'admin_corporate'),
(4, 'article', 'article'),
(5, 'article_config', 'article_config'),
(6, 'automobile', 'automobile'),
(7, 'commandes', 'commandes'),
(8, 'configuration', 'configuration'),
(9, 'configvehicule', 'configvehicule'),
(10, 'infoperso', 'infoperso'),
(11, 'information', 'information'),
(12, 'message', 'message'),
(13, 'reservation', 'reservation'),
(14, 'utilisateur', 'utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `acl_liste_module`
--

CREATE TABLE `acl_liste_module` (
  `id_liste_module` int(11) NOT NULL,
  `designation_module` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acl_liste_module`
--

INSERT INTO `acl_liste_module` (`id_liste_module`, `designation_module`) VALUES
(1, 'configuration'),
(2, 'adminacl'),
(32, 'configvehicule'),
(33, 'automobile'),
(34, 'utilisateur'),
(35, 'article'),
(36, 'article_config'),
(37, 'admin_corporate'),
(38, 'commandes'),
(39, 'reservation'),
(40, 'infoperso'),
(41, 'message');

-- --------------------------------------------------------

--
-- Structure de la table `acl_liste_onglet`
--

CREATE TABLE `acl_liste_onglet` (
  `id_liste_onglet` int(11) NOT NULL,
  `nom_module_onglet` varchar(50) NOT NULL DEFAULT '',
  `id_liste_module_onglet` int(11) NOT NULL DEFAULT '0',
  `designation_onglet` varchar(50) NOT NULL DEFAULT '',
  `numero_ordre` int(11) NOT NULL DEFAULT '0',
  `action_url` varchar(100) NOT NULL DEFAULT '',
  `designationli` varchar(50) NOT NULL DEFAULT '',
  `divid` varchar(50) NOT NULL DEFAULT '',
  `leprofil` int(11) NOT NULL DEFAULT '0',
  `duplique_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(305, 'configvehicule', 32, 'marques', 1, 'get_marque', 'liget_marque', 'divget_marque', 0, 0),
(306, 'configvehicule', 32, 'marques', 1, 'get_marque', 'liget_marque', 'divget_marque', 1, 305),
(307, 'configvehicule', 32, 'model', 2, 'get_model', 'liget_model', 'divget_model', 0, 0),
(308, 'configvehicule', 32, 'model', 2, 'get_model', 'liget_model', 'divget_model', 1, 307),
(309, 'configvehicule', 32, 'moteurs', 3, 'get_moteur', 'liget_moteur', 'divget_moteur', 0, 0),
(310, 'configvehicule', 32, 'moteurs', 3, 'get_moteur', 'liget_moteur', 'divget_moteur', 1, 309),
(311, 'configvehicule', 32, 'couleurs', 4, 'get_couleur', 'liget_couleur', 'divget_couleur', 0, 0),
(312, 'configvehicule', 32, 'couleurs', 4, 'get_couleur', 'liget_couleur', 'divget_couleur', 1, 311),
(313, 'automobile', 33, 'vehicule', 1, 'get_vehicule', 'liget_vehicule', 'divget_vehicule', 0, 0),
(314, 'automobile', 33, 'vehicule', 1, 'get_vehicule', 'liget_vehicule', 'divget_vehicule', 1, 313),
(315, 'configuration', 1, 'blocmenu', 2, 'get_blocmenu', 'liget_blocmenu', 'divget_blocmenu', 2, 3),
(316, 'utilisateur', 34, 'profil', 2, 'get_my_profil', 'liget_my_profil', 'divget_my_profil', 0, 0),
(317, 'utilisateur', 34, 'liste utilisateur', 3, 'get_users', 'liget_users', 'divget_users', 0, 0),
(319, 'utilisateur', 34, 'liste utilisateur', 2, 'get_users', 'liget_users', 'divget_users', 2, 317),
(321, 'article_config', 36, 'catégories', 1, 'get_categories', 'liget_categories', 'divget_categories', 0, 0),
(323, 'article_config', 36, 'sous-categories', 2, 'get_sous_categories', 'liget_sous_categories', 'divget_sous_categories', 0, 0),
(324, 'article', 35, 'ajout article', 1, 'get_article_form', 'liget_article_form', 'divget_article_form', 0, 0),
(325, 'article', 35, 'ajout article', 1, 'get_article_form', 'liget_article_form', 'divget_article_form', 1, 324),
(326, 'article_config', 36, 'sous-categories', 1, 'get_sous_categories', 'liget_sous_categories', 'divget_sous_categories', 1, 323),
(327, 'article_config', 36, 'article marque', 3, 'get_article_marque', 'liget_article_marque', 'divget_article_marque', 0, 0),
(328, 'article_config', 36, 'article marque', 3, 'get_article_marque', 'liget_article_marque', 'divget_article_marque', 1, 327),
(329, 'article', 35, 'liste article', 2, 'get_articles', 'liget_articles', 'divget_articles', 0, 0),
(330, 'article', 35, 'liste article', 2, 'get_articles', 'liget_articles', 'divget_articles', 1, 329),
(331, 'article_config', 36, 'catégories', 1, 'get_categories', 'liget_categories', 'divget_categories', 1, 321),
(332, 'utilisateur', 34, 'utilisateurs', 1, 'get_users', 'liget_users', 'divget_users', 0, 0),
(333, 'utilisateur', 34, 'utilisateurs', 1, 'get_users', 'liget_users', 'divget_users', 1, 332),
(334, 'admin_corporate', 37, 'informations générales', 1, 'get_infos_gen', 'liget_infos_gen', 'divget_infos_gen', 0, 0),
(335, 'admin_corporate', 37, 'sliders', 2, 'get_sliders', 'liget_sliders', 'divget_sliders', 0, 0),
(336, 'admin_corporate', 37, 'offre spécial', 3, 'get_special_offer', 'liget_special_offer', 'divget_special_offer', 0, 0),
(337, 'admin_corporate', 37, 'informations générales', 1, 'get_infos_gen', 'liget_infos_gen', 'divget_infos_gen', 1, 334),
(338, 'admin_corporate', 37, 'sliders', 2, 'get_sliders', 'liget_sliders', 'divget_sliders', 1, 335),
(339, 'admin_corporate', 37, 'offre spécial', 3, 'get_special_offer', 'liget_special_offer', 'divget_special_offer', 1, 336),
(340, 'commandes', 38, 'mes commandes', 1, 'get_commandes', 'liget_commandes', 'divget_commandes', 0, 0),
(341, 'reservation', 39, 'mes reservations', 1, 'get_reservations', 'liget_reservations', 'divget_reservations', 0, 0),
(342, 'commandes', 38, 'mes commandes', 1, 'get_commandes', 'liget_commandes', 'divget_commandes', 1, 340),
(343, 'reservation', 39, 'mes reservations', 1, 'get_reservations', 'liget_reservations', 'divget_reservations', 1, 341),
(344, 'adminacl', 2, 'profils', 1, 'get_profils', 'liget_profils', 'divget_profils', 2, 2),
(345, 'adminacl', 2, 'profils', 1, 'get_profils', 'liget_profils', 'divget_profils', 1, 2),
(346, 'infoperso', 40, 'mon profil', 1, 'get_infoperso', 'liget_infoperso', 'divget_infoperso', 0, 0),
(347, 'infoperso', 40, 'mon profil', 1, 'get_infoperso', 'liget_infoperso', 'divget_infoperso', 1, 346),
(348, 'message', 41, 'boite de reception', 1, 'get_messages', 'liget_messages', 'divget_messages', 0, 0),
(349, 'message', 41, 'boite de reception', 1, 'get_messages', 'liget_messages', 'divget_messages', 1, 348);

-- --------------------------------------------------------

--
-- Structure de la table `acl_profils`
--

CREATE TABLE `acl_profils` (
  `id_profils` int(11) NOT NULL,
  `code_profils` varchar(50) NOT NULL DEFAULT '',
  `activation_profils` tinyint(1) NOT NULL DEFAULT '0',
  `profilparent_profils` int(11) NOT NULL DEFAULT '0',
  `nom_parent` varchar(50) NOT NULL DEFAULT '',
  `description_profils` varchar(100) NOT NULL DEFAULT '',
  `respo_role` tinyint(1) NOT NULL DEFAULT '0',
  `personnel_anvi` tinyint(1) NOT NULL DEFAULT '0',
  `est_restreint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `activation` tinyint(1) NOT NULL DEFAULT '0',
  `profil_user` int(11) NOT NULL DEFAULT '0',
  `contact_user` varchar(20) NOT NULL DEFAULT '',
  `email_user` varchar(50) NOT NULL DEFAULT '',
  `id_compte` int(11) NOT NULL DEFAULT '0',
  `est_respo` tinyint(1) NOT NULL DEFAULT '0',
  `deja_connecte` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acl_utilisateur`
--

INSERT INTO `acl_utilisateur` (`id_utilisateur`, `matricule`, `password`, `nom`, `prenom`, `nom_complet`, `civilite`, `sexe`, `laphoto`, `activation`, `profil_user`, `contact_user`, `email_user`, `id_compte`, `est_respo`, `deja_connecte`) VALUES
(1, 'bikouess', '5f4dcc3b5aa765d61d8327deb882cf99', 'assoumou', 'cedric', 'assoumou cedric', 'M.', 'm', '', 1, 1, '', '', 0, 0, 1),
(2, 'admin01', '0e698a8ffc1a0af622c7b4db3cb750cc', 'test', 'admin', 'test admin', 'M.', 'm', '', 1, 2, '', '', 0, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `app_article`
--

CREATE TABLE `app_article` (
  `article_id` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sous_category_id` int(11) NOT NULL,
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
  `date_add` date NOT NULL,
  `date_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `app_article`
--

INSERT INTO `app_article` (`article_id`, `designation`, `category_id`, `sous_category_id`, `description`, `prix`, `prix_promo`, `stock`, `garantie`, `sku`, `dimension`, `poids`, `marque_id`, `couleur_id`, `image_principale_article`, `date_add`, `date_update`) VALUES
(35, 'hp probook', 23, 9, '<p>Vide, quantum, inquam, fallare, Torquate. oratio me istius philosophi non offendit; nam et complectitur verbis, quod vult, et dicit plane, quod intellegam; et tamen ego a philosopho, si afferat eloquentiam, non asperner, si non habeat, non admodum flagitem. re mihi non aeque satisfacit, et quidem locis pluribus. sed quot homines, tot sententiae; falli igitur possumus.</p>', '150000', 130000, 26, 12, '1232FF232', '12321', '1', 6, 4, '2024_04_18_11_40_06_249672674.jpg', '2024-04-18', '0000-00-00'),
(40, 'ecran hp 12', 25, 0, '<p>Vide, quantum, inquam, fallare, Torquate. oratio me istius philosophi non offendit; nam et complectitur verbis, quod vult, et dicit plane, quod intellegam; et tamen ego a philosopho, si afferat eloquentiam, non asperner, si non habeat, non admodum flagitem. re mihi non aeque satisfacit, et quidem locis pluribus. sed quot homines, tot sententiae; falli igitur possumus.</p>', '30000', 10000, 8, 2, 'SDFFSGFSDGVSRF', '12', '1', 6, 3, '2024_04_18_11_39_10_1697600273.jpeg', '2024-04-18', '0000-00-00'),
(41, 'apple macbook pro a1278', 23, 9, '<p>Vide, quantum, inquam, fallare, Torquate. oratio me istius philosophi non offendit; nam et complectitur verbis, quod vult, et dicit plane, quod intellegam; et tamen ego a philosopho, si afferat eloquentiam, non asperner, si non habeat, non admodum flagitem. re mihi non aeque satisfacit, et quidem locis pluribus. sed quot homines, tot sententiae; falli igitur possumus.</p>', '400000', 350000, -1, 1, 'XQWFSGGFSGFDGBD', '12', '1', 8, 4, '2024_04_18_11_38_57_1231270375.jpg', '2024-04-18', '0000-00-00'),
(42, 'asus vivobook', 23, 9, '<p>QXFES DSFSDFV DFVS</p>', '250000', 0, 12, 1, 'SDS DFVDV DFV', '12', '1', 5, 4, '2024_04_18_11_38_46_1373027827.jpg', '2024-04-18', '0000-00-00'),
(43, 'cable hdmi', 22, 7, 'Ideo urbs venerabilis post superbas efferatarum gentium cervices oppressas latasque leges fundamenta libertatis et retinacula sempiterna velut frugi parens et prudens et dives Caesaribus tamquam liberis suis regenda patrimonii iura permisit.', '7000', 6000, 3, 1, 'SQFGRVBF  SFGVSFB ERFGBDSF', '12', '1', 9, 4, '2024_02_22_18_18_08_33876717.jpeg', '2024-02-22', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `app_article_marque`
--

CREATE TABLE `app_article_marque` (
  `article_marque_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_add` date NOT NULL,
  `date_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Structure de la table `app_automobile`
--

CREATE TABLE `app_automobile` (
  `id_auto` int(11) NOT NULL,
  `marque_id` varchar(250) NOT NULL,
  `model_id` varchar(250) NOT NULL,
  `moteur_id` varchar(250) NOT NULL,
  `annee_auto` varchar(100) NOT NULL,
  `carburant_auto` varchar(250) NOT NULL,
  `transmission_auto` varchar(250) NOT NULL,
  `kilometrage_auto` int(255) NOT NULL,
  `nb_place_auto` int(10) NOT NULL,
  `nb_porte_auto` int(10) NOT NULL,
  `climatisation_auto` int(10) NOT NULL,
  `en_location` varchar(250) NOT NULL,
  `prix_auto` int(255) NOT NULL,
  `image_principale_auto` varchar(250) NOT NULL,
  `description_auto` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `app_automobile`
--

INSERT INTO `app_automobile` (`id_auto`, `marque_id`, `model_id`, `moteur_id`, `annee_auto`, `carburant_auto`, `transmission_auto`, `kilometrage_auto`, `nb_place_auto`, `nb_porte_auto`, `climatisation_auto`, `en_location`, `prix_auto`, `image_principale_auto`, `description_auto`) VALUES
(19, '20', '34', '10', '', 'essence', 'manuel', 1300, 4, 4, 1, '2', 14000000, '2024_02_22_16_40_20_1231711125.png', '<p>Constantius post theatralis ludos atque circenses ambitioso editos apparatu diem sextum idus Octobres, qui imperii eius annum tricensimum terminabat, insolentiae pondera gravius librans, siquid dubium deferebatur aut falsum, pro liquido accipiens et conperto, inter alia excarnificatum Gerontium Magnentianae comitem partis exulari maerore multavit.</p>\r\n<p>Eminuit autem inter humilia supergressa iam impotentia fines mediocrium delictorum nefanda Clematii cuiusdam Alexandrini nobilis mors repentina; cuius socrus cum misceri sibi generum, flagrans eius amore, non impetraret, ut ferebatur, per palatii pseudothyrum introducta, oblato pretioso reginae monili id adsecuta est, ut ad Honoratum tum comitem orientis formula missa letali omnino scelere nullo contactus idem Clematius nec hiscere nec loqui permissus occideretur.</p>\r\n<p>At nunc si ad aliquem bene nummatum tumentemque ideo honestus advena salutatum introieris, primitus tamquam exoptatus suscipieris et interrogatus multa coactusque mentiri, miraberis numquam antea visus summatem virum tenuem te sic enixius observantem, ut paeniteat ob haec bona tamquam praecipua non vidisse ante decennium Romam.</p>'),
(20, '20', '35', '9', '', 'essence', 'auto', 4000, 4, 4, 1, '2', 80000000, '2024_02_22_16_45_45_1390492877.jpg', '<p class=\"ql-align-justify\"><strong>Nobody but JIMNY</strong></p>\r\n<p class=\"ql-align-justify\">Des caract&eacute;ristiques sans compromis d&eacute;finissent le Suzuki JIMNY comme une s&eacute;rieuse machine tout-terrain.</p>\r\n<p class=\"ql-align-justify\">Un ch&acirc;ssis en &eacute;chelle robuste, trois grands angles de caisse, des suspensions d\'essieux rigides &agrave; trois bras avec ressorts h&eacute;lico&iuml;daux et un 4x4 avec un transfert de gamme basse.</p>\r\n<p class=\"ql-align-justify\">Equip&eacute; d\'un moteur de 1,5 litre, il vous emm&egrave;ne o&ugrave; vous voulez avec une agilit&eacute; in&eacute;gal&eacute;e et un couple puissant quand vous en avez le plus besoin.</p>\r\n<p class=\"ql-align-justify\">Surmonter des fosses boueuses, man&oelig;uvrer &agrave; travers des bois denses, conqu&eacute;rir des rochers massifs avec ce petit tout-terrain qui sait ce qu\'est la vraie duret&eacute;.</p>\r\n<p class=\"ql-align-justify\">Construit pour affronter les conditions climatiques et les terrains les plus difficiles, le JIMNY va l&agrave; o&ugrave; les autres v&eacute;hicules craignent de s\'aventurer.</p>\r\n<p>Projecteurs &agrave; LED avec rondelles, pare-chocs optimis&eacute;s, garde au sol des roues augment&eacute;e pour franchir les obstacles avec assurance, rampe d\'acc&egrave;s pratique, laissez le JIMNY vous emmener dans vos aventures par tous les temps.</p>'),
(21, '20', '36', '12', '', 'gazol', 'manuel', 132000, 4, 4, 0, '1', 50000, '2024_02_22_16_48_45_1083807817.jpeg', '<p class=\"ql-align-justify\"><strong>Un partenaire solide</strong></p>\r\n<p class=\"ql-align-justify\">Le tout nouveau Carry est construit pour &ecirc;tre solide. De nombreuses mesures de protection contre la rouille et la corrosion vous pr&eacute;parent &agrave; travailler dans des conditions difficiles, tandis que des caract&eacute;ristiques de robustesse ajoutent &agrave; la solidit&eacute; de l\'ensemble.</p>\r\n<p class=\"ql-align-justify\">Quand le travail devient difficile, il faut un partenaire aussi dur que soi.</p>\r\n<p class=\"ql-align-justify\">Fort de plus de 40 ans d\'exp&eacute;rience des camions compacts Suzuki dans les environnements les plus rudes, le tout nouveau Carry est pr&ecirc;t &agrave; travailler pour vous.</p>\r\n<p class=\"ql-align-justify\">Pour pouvoir charger et transporter de gros meubles, il faut disposer de beaucoup d\'espace de chargement et d\'une tr&egrave;s grande capacit&eacute; de chargement. Plus important encore, vous devez avoir un acc&egrave;s pratique au lit des trois c&ocirc;t&eacute;s et pouvoir charger et d&eacute;charger sans vous fatiguer le dos. Ce ne sont l&agrave; que quelques-unes des raisons pour lesquelles vous avez besoin du tout nouveau Carry.</p>\r\n<p class=\"ql-align-justify\">Avec une longueur de 2 565 mm et une largeur de 1 660 mm, le grand lit de Carry permet de transporter facilement des objets longs aussi bien que larges. Et avec une hauteur de 1 160 mm jusqu\'au sommet de la cabine, m&ecirc;me les grandes charges peuvent &ecirc;tre transport&eacute;es sur la couchette.</p>\r\n<p class=\"ql-align-justify\">Le lit se trouve &agrave; une hauteur basse de 750 mm pour faciliter le chargement et le d&eacute;chargement. M&ecirc;me avec la porte ferm&eacute;e, une hauteur pratique de seulement 1 110 mm permet d\'acc&eacute;der facilement &agrave; votre &eacute;quipement.</p>\r\n<p>Pour un v&eacute;hicule de travail, une grande capacit&eacute; de chargement est essentielle. C\'est pourquoi le tout nouveau Carry peut transporter jusqu\'&agrave; 940 kg, passagers compris. Et gr&acirc;ce &agrave; la disposition de la cabine compl&egrave;te, m&ecirc;me &agrave; pleine charge, le Carry assure une bonne r&eacute;partition du poids entre les pneus avant et arri&egrave;re. 22 crochets de corde - Poteau d\'angle - Acc&egrave;s &agrave; trois c&ocirc;t&eacute;s - Ch&acirc;ssis personnalisable.</p>'),
(22, '20', '37', '11', '', 'essence', 'manuel', 2000, 4, 2, 1, '2', 52000000, '2024_02_22_16_51_14_1894592649.jpg', '<p><strong>Un int&eacute;rieur confortable et sophistiqu&eacute;</strong></p>\r\n<p>La premi&egrave;re chose qui attire votre attention &agrave; l&rsquo;int&eacute;rieur du Grand VITARA est le parfait &eacute;quilibre entre sa robustesse et sa sophistication. Les si&egrave;ges sont fabriqu&eacute;s avec des mat&eacute;riaux haut de gamme qui respirent l\'&eacute;l&eacute;gance. Des coussinets souples envelopp&eacute;s de cuir synth&eacute;tique avec doubles points argent&eacute;s sur le tableau de bord et les garnitures de portes lui conf&egrave;rent un aspect haut de gamme. En passant par des lumi&egrave;res d\'ambiance sur le tableau de bord, et le toit ouvrant panoramique qui vous permettent de profiter des trajets avec style.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Un design audacieux pour vos aventures</strong>.</p>\r\n<p>Son design expressif et robuste de SUV se distingue par sa calandre polygonale de grande taille aux motifs finement travaill&eacute;s.</p>\r\n<p>Les lignes imposantes de sa carrosserie &agrave;&nbsp;l\'arri&egrave;re ajoutent &agrave; son caract&egrave;re robuste une touche futuriste, de quoi vous permettre de d&eacute;passer les limites.</p>\r\n<p>Explorez l\'inconnu en imposant votre pr&eacute;sence partout o&ugrave; vous allez.</p>'),
(23, '20', '39', '11', '', 'essence', 'auto', 2700, 4, 2, 1, '2', 50000000, '2024_02_22_16_54_08_670545789.png', '<p class=\"ql-align-justify\"><strong>Un style et un confort qui vous procurent de l&rsquo;&eacute;motion.</strong></p>\r\n<p class=\"ql-align-justify\">L\'Alto vous accueille avec un int&eacute;rieur bicolore lorsque vous prenez le volant. &Eacute;l&eacute;gante et fonctionnelle, il est un parfait m&eacute;lange de design et de logique. De la cabine ergonomique &agrave; des si&egrave;ges confortables, des indicateurs de vitesse &agrave; lecture rapide aux commandes intuitives, tout est construit pour que vous puissiez avancer avec facilit&eacute;.</p>\r\n<p class=\"ql-align-justify\">&nbsp;</p>\r\n<p class=\"ql-align-justify\">La nouvelle grille de calandre &eacute;l&eacute;gante et les phares bien d&eacute;finis conf&egrave;rent &agrave; la nouvelle Alto un nouvel attrait, tandis que le pare-chocs et les ailes lat&eacute;rales de conception nouvelle accentuent l\'allure.</p>\r\n<p class=\"ql-align-justify\">Voici une voiture id&eacute;ale pour vos promenades. Que vous soyez dans une rue &eacute;troite ou sur une autoroute, elle se laisse conduire. L\'Alto est &eacute;galement con&ccedil;u pour votre plaisir de conduire soit total. C\'est pourquoi il est dot&eacute; de dispositifs de s&eacute;curit&eacute; qui assurent votre tranquillit&eacute; d\'esprit lorsque vous &ecirc;tes sur la route.</p>'),
(24, '17', '40', '10', '', 'gazol', 'manuel', 3500, 4, 2, 1, '2', 30000000, '2024_02_22_16_58_32_749417035.png', '<h4 class=\"slogan animated fadeInDown\">D&eacute;couvrez la Nouvelle STARLET, la premi&egrave;re citadine TOYOTA au design audacieux gr&acirc;ce &agrave; ses jantes en aluminium et ses phares &agrave; LED. Avec un moteur essence 1,5L disponible en boite manuelle ou automatique, ses 105 CH lui conf&egrave;rent une puissance id&eacute;ale pour une conduite dynamique en ville. Facilitez votre quotidien en connectant votre smartphone &agrave; l&rsquo;interface multim&eacute;dia de 9 pouces et en profitant de son coffre qui rend la STARLET fonctionnelle et agr&eacute;able lors de vos d&eacute;placements en ville en famille ou entre amis.</h4>'),
(25, '17', '41', '10', '', 'essence', 'auto', 5000, 2, 2, 1, '2', 70000000, '2024_02_22_17_00_16_467948477.jpeg', '<h4 class=\"slogan animated fadeInDown\">Avec 7 places, la nouvelle Toyota Rumion est astucieusement compacte, tout en &eacute;tant pratique, styl&eacute;e et extr&ecirc;mement confortable. Tout comme &agrave; l\'avant, les 2e et 3e rang&eacute;es accueillent les enfants et les adultes tout en laissant suffisamment de place pour les bagages. Cela fait de la Toyota Rumion la Flexible de la famille Toyota. Le tableau de bord sculpt&eacute;, l\'&eacute;cran tactile connect&eacute; de 7 pouces, et des si&egrave;ges en cuir (Deluxe uniquement) cr&eacute;ent ensemble un int&eacute;rieur &eacute;l&eacute;gant et sophistiqu&eacute; pour toute la famille.</h4>'),
(26, '17', '47', '10', '', 'essence', 'manuel', 15000, 4, 4, 1, '1', 70000, '2024_02_22_17_02_51_164029785.png', '<h4 class=\"slogan animated fadeInDown\">Fort<strong> d\'un h&eacute;ritage de 70 ans de conduite tout-terrain, le tout nouveau Toyota Land Cruiser 300 est plus puissant que jamais. Le roi du 4x4 est &eacute;quip&eacute; de moteurs V6 essence et diesel turbocompress&eacute;s nouvellement d&eacute;velopp&eacute;s. Tous deux offrent une puissance, un couple et un rendement nettement am&eacute;lior&eacute;s. Partir &agrave; l\'aventure n\'aura jamais &eacute;t&eacute; aussi facile gr&acirc;ce au multi-terrain s&eacute;lection (MTS) qui dispose d&rsquo;un mode automatique permettant de rouler sur tous types de route. La calandre chrom&eacute;e et les jantes aluminium de 20&rsquo;&rsquo; donnent au LC300 une allure robuste et &eacute;l&eacute;gante. Avec un int&eacute;rieur pratique au confort palatial, voyagez dans le luxe avec jusqu\'&agrave; 7 passagers et tous leurs bagages. Ce SUV est une prouesse technologique rare en termes de puissance, de s&eacute;curit&eacute; et de commodit&eacute; avec notamment le syst&egrave;me d\'info-divertissement multim&eacute;dia 12.3\" (selon la version). Alors prenez les commandes, partez &agrave; la conqu&ecirc;te de la ville avec style et appr&eacute;ciez la puissance. dff</strong></h4>'),
(27, '7', '28', '11', '2010', 'essence', 'manuel', 190, 2, 2, 1, '2', 15000, '2024_03_29_12_49_50_111794662.jpg', '<p><span class=\"d9FyLd\"><strong>Un gabarit de citadine et une allure de SUV</strong></span></p>\r\n<p><span class=\"hgKElc\">Avec sa calandre chrom&eacute;e en cinq parties, ses feux &agrave; LED aux contours anguleux, son capot sculpt&eacute; avec une partie centrale bomb&eacute;e, ses montants de pare-brise tr&egrave;s inclin&eacute;s et des plaques de protection avant et arri&egrave;re, l\'EcoSport affiche un style moderne et dynamique.</span></p>');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `app_category`
--

INSERT INTO `app_category` (`category_id`, `name`, `add_by`, `date_add`, `date_update`) VALUES
(22, 'accessoire', '', '2024-02-21 12:03:18', NULL),
(23, 'ordinateur portable', '', '2024-02-21 12:03:18', NULL),
(24, 'ordinateur bureau', '', '2024-02-21 12:03:18', NULL),
(25, 'moniteur', '', '2024-02-21 12:03:18', NULL);

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
  `statut_client` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `app_client`
--

INSERT INTO `app_client` (`id_client`, `nom_complet_client`, `pseudo_client`, `ville_client`, `commune_client`, `quartier_client`, `contact_client`, `email_client`, `password_client`, `statut_client`) VALUES
(8, 'Sinan Arnaud Cedric Emmanuel Assoumou', 'dox', 'Abidjan', 'Port-Bouët', 'Soghefia', '002250101010101', 'assoumouc06@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(9, 'hugues Ody', '', NULL, NULL, NULL, NULL, 'hugues@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(10, 'Peniel Assoumou', '', NULL, NULL, NULL, NULL, 'peniel@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `app_couleur`
--

CREATE TABLE `app_couleur` (
  `id_couleur` int(11) NOT NULL,
  `code_couleur` varchar(100) NOT NULL,
  `activation_couleur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(47, '2024_02_22_18_18_08_338767171.jpg', '2024_02_22_18_18_08_338767171.jpg', 43, '2024-02-22', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `app_img_automobile`
--

CREATE TABLE `app_img_automobile` (
  `id_img` int(11) NOT NULL,
  `auto_id` int(2) NOT NULL,
  `image_auto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `app_img_automobile`
--

INSERT INTO `app_img_automobile` (`id_img`, `auto_id`, `image_auto`) VALUES
(5, 5, '2024'),
(6, 5, '2024'),
(10, 7, '2024_02_21_18_25_46_118657452.jpeg'),
(11, 7, '2024_02_21_18_25_46_1186574521.jpeg'),
(12, 8, '2024_02_21_18_26_58_1045583611.jpeg'),
(13, 8, '2024_02_21_18_26_58_10455836111.jpeg'),
(14, 8, '2024_02_21_18_26_58_10455836111.png'),
(24, 12, '2024_02_22_16_21_50_1750385476.jpeg'),
(25, 12, '2024_02_22_16_21_50_17503854761.jpeg'),
(26, 12, '2024_02_22_16_21_50_17503854761.png'),
(27, 12, '2024_02_22_16_21_50_17503854762.jpeg'),
(28, 13, '2024_02_22_16_22_55_507497157.jpeg'),
(29, 13, '2024_02_22_16_22_55_5074971571.jpeg'),
(30, 13, '2024_02_22_16_22_55_5074971571.png'),
(31, 13, '2024_02_22_16_22_55_5074971572.jpeg'),
(32, 14, '2024_02_22_16_23_53_1226329590.jpeg'),
(33, 14, '2024_02_22_16_23_53_12263295901.jpeg'),
(34, 14, '2024_02_22_16_23_53_12263295901.png'),
(35, 14, '2024_02_22_16_23_53_12263295902.jpeg'),
(36, 15, '2024_02_22_16_24_03_1053801278.jpeg'),
(37, 15, '2024_02_22_16_24_03_10538012781.jpeg'),
(38, 15, '2024_02_22_16_24_03_10538012781.png'),
(39, 15, '2024_02_22_16_24_03_10538012782.jpeg'),
(40, 16, '2024_02_22_16_37_50_472757088.jpeg'),
(41, 16, '2024_02_22_16_37_50_4727570881.jpeg'),
(42, 16, '2024_02_22_16_37_50_4727570881.png'),
(43, 16, '2024_02_22_16_37_50_4727570882.jpeg'),
(44, 16, '2024_02_22_16_37_50_472757088.jpg'),
(45, 16, '2024_02_22_16_37_50_4727570881.jpg'),
(46, 17, '2024_02_22_16_38_04_1658712326.jpeg'),
(47, 17, '2024_02_22_16_38_04_16587123261.jpeg'),
(48, 17, '2024_02_22_16_38_04_16587123261.png'),
(49, 17, '2024_02_22_16_38_04_16587123262.jpeg'),
(50, 17, '2024_02_22_16_38_04_1658712326.jpg'),
(51, 17, '2024_02_22_16_38_04_16587123261.jpg'),
(52, 18, '2024_02_22_16_38_42_1498848649.jpeg'),
(53, 18, '2024_02_22_16_38_42_14988486491.jpeg'),
(54, 18, '2024_02_22_16_38_42_14988486491.png'),
(55, 18, '2024_02_22_16_38_42_14988486492.jpeg'),
(56, 18, '2024_02_22_16_38_42_1498848649.jpg'),
(57, 18, '2024_02_22_16_38_42_14988486491.jpg'),
(58, 19, '2024_02_22_16_40_20_1231711125.jpeg'),
(59, 19, '2024_02_22_16_40_20_12317111251.jpeg'),
(60, 19, '2024_02_22_16_40_20_12317111251.png'),
(61, 19, '2024_02_22_16_40_20_12317111252.jpeg'),
(62, 19, '2024_02_22_16_40_20_1231711125.jpg'),
(63, 19, '2024_02_22_16_40_20_12317111251.jpg');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `app_infos_gen`
--

INSERT INTO `app_infos_gen` (`infos_id`, `site_logo`, `site_mail_1`, `site_mail_2`, `contact_1`, `contact_2`, `facebook`, `location`, `date_add`, `date_update`) VALUES
(1, '2024_03_15_15_03_18_1630159766.png', 'infos@ivoire-lagune-services.com', 'infos@ivoire-lagune-services.com', '0778281752', '0202589788', 'https://www.facebook.com/mrdhalo8.1/', 'cote d\'ivoire, abidjan, port-bouet', '0000-00-00', '2024-03-15');

-- --------------------------------------------------------

--
-- Structure de la table `app_marque`
--

CREATE TABLE `app_marque` (
  `id_marque` int(11) NOT NULL,
  `code_marque` varchar(50) NOT NULL,
  `activation_marque` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `app_marque`
--

INSERT INTO `app_marque` (`id_marque`, `code_marque`, `activation_marque`) VALUES
(5, 'bmw', 1),
(7, 'ford', 1),
(11, 'peugeot', 1),
(12, 'citroen', 1),
(13, 'opel', 1),
(14, 'volkswagen', 1),
(15, 'mercedes', 1),
(16, 'audi', 1),
(17, 'toyota', 1),
(18, 'hyundai', 1),
(19, 'renault', 1),
(20, 'suzuki', 1),
(21, 'hummer', 1);

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
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `date_add` date NOT NULL,
  `date_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `app_messages`
--

INSERT INTO `app_messages` (`message_id`, `nom`, `email`, `telephone`, `objet`, `message`, `is_read`, `date_add`, `date_update`) VALUES
(1, 'hugh', 'hugh@gmail.com', '0504658852', '', 'yooooo', 1, '2024-03-13', '2024-03-13'),
(2, 'test', 'assoumggouc06@gmail.com', '2778798', 'CC', 'JMSKDSLF', 1, '2024-04-06', '0000-00-00'),
(3, 'Cedrc test', 'assoumouc06@gmail.com', '0748593565', 'fddf', 'sdcvfbg', 1, '2024-04-06', '0000-00-00'),
(4, 'Cedrc test', 'assoumouc06@gmail.com', '0748593565', 'fddf', 'CSFVBN', 1, '2024-04-06', '0000-00-00'),
(5, 'SINAN ARNAUD CEDRIC ASSOUMOU', 'assoumouc06@gmail.com', '0150222227', 'cc', 'salut', 1, '2024-04-18', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `app_model`
--

CREATE TABLE `app_model` (
  `id_model` int(11) NOT NULL,
  `code_model` varchar(50) NOT NULL,
  `marque_id` int(11) NOT NULL,
  `activation_model` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Structure de la table `app_moteur`
--

CREATE TABLE `app_moteur` (
  `id_moteur` int(11) NOT NULL,
  `code_moteur` varchar(100) NOT NULL,
  `activation_moteur` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `app_moteur`
--

INSERT INTO `app_moteur` (`id_moteur`, `code_moteur`, `activation_moteur`) VALUES
(9, 'v8', 1),
(10, 'v12', 1),
(11, '1jz-gte inline-6', 1),
(12, '2jz-gte inline-6', 1);

-- --------------------------------------------------------

--
-- Structure de la table `app_offer`
--

CREATE TABLE `app_offer` (
  `offer_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `date_fin` date NOT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT '1',
  `date_add` date NOT NULL,
  `date_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `app_sliders`
--

CREATE TABLE `app_sliders` (
  `slider_id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `slider_image` varchar(255) NOT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT '1',
  `bouton_label` varchar(20) NOT NULL,
  `lien_slider` varchar(255) NOT NULL,
  `date_update` date DEFAULT NULL,
  `date_add` date NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `app_sliders`
--

INSERT INTO `app_sliders` (`slider_id`, `titre`, `description`, `slider_image`, `statut`, `bouton_label`, `lien_slider`, `date_update`, `date_add`, `price`) VALUES
(1, 'hp probook', 'corei5', '2024_03_20_04_06_30_987226715.png', 1, 'Commander', 'http://localhost:8080/ivoire-lagune-services/boutique/article_detail/23', '2024-03-20', '2024-03-13', '100000'),
(2, 'vente', 'gdbf', '2024_04_18_03_57_59_2126018044.jpg', 1, 'hgj', 'hgj', NULL, '2024-04-18', 'hvgj');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `app_sous_category`
--

INSERT INTO `app_sous_category` (`sous_category_id`, `name`, `cat_id`, `date_add`, `date_update`) VALUES
(6, 'clé', 22, '2024-02-21', '2024-02-22'),
(7, 'cable', 22, '2024-02-21', '0000-00-00'),
(9, 'core ', 23, '2024-02-21', '0000-00-00');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(11, '160.120.165.140', '20240418113106', '20240418', 'CI', 'Abidjan');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `court_description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cms_infos_generale`
--

INSERT INTO `cms_infos_generale` (`id_info`, `contact1_info`, `contact2_info`, `email_info`, `localisation_info`, `logo_info`, `lien_facebook`, `lien_whatsapp`, `lien_tiktok`, `lien_instagram`, `lien_linkedIn`, `court_description`) VALUES
(1, '0101010101', '0150222227', 'infos@ivoire-lagune-services.ci', 'Côte d\'Ivoire, Abidjan, Port Bouet', '2024_04_18_13_03_48_1318720695.png', 'https://www.facebook.com/', 'sfdghtryu', 'dfsvsg', 'fdgh', 'sdfsf', 'dsfsLorem Ipsum is simply dummy text of the and typesetting industry. Lorem Ipsum is dummy text of the printing.');

-- --------------------------------------------------------

--
-- Structure de la table `cms_newletters`
--

CREATE TABLE `cms_newletters` (
  `id_newletters` int(11) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cms_newletters`
--

INSERT INTO `cms_newletters` (`id_newletters`, `email`) VALUES
(1, 'assoumouc06@gmail.com'),
(2, 'suzanne.koffi@gmail.com'),
(3, 'arnaudlebougeoir@hotmail.fr');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `gender` varchar(20) NOT NULL,
  `birth` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL,
  `nationality` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime DEFAULT NULL,
  `picture` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=desactivé; 1=activé'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `username`, `phone`, `address`, `profession`, `gender`, `birth`, `role`, `nationality`, `description`, `create_at`, `update_at`, `picture`, `password`, `status`) VALUES
(1, 'Ody Hugues', 'huguesody@gmail.com', 'huguesdev_45', '0506964552', '', NULL, 'Male', '20-04-2020', 'Admin', 'Canadienne', 'Just hugues ody', '2022-04-19 10:07:38', '2023-06-25 21:15:37', 'moon.jpg', '202cb962ac59075b964b07152d234b70', 1),
(2, 'Hugh Dev', 'huguesody@gmail.com', 'hugh_Dev06', '+2550506964552', '', '', 'Female', '20-04-2020', 'Admin', 'Ougandais', 'juste Hugh Dev\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit.', '2022-04-19 12:24:56', '2023-07-09 17:37:52', 'hugh.jpg', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(3, 'Stark Dev', 'ody@gmail.com', 'Stark_mk5', '+2550703584125', 'Cocody', '', 'Female', '', 'Editor', 'Canadienne', 'And me i am Iron Man', '2022-04-25 10:28:22', '2022-04-27 16:45:57', '331758.jpg', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(6, 'Amada Johnson', 'Johnson@gmail.com', 'Amada 77', '+255506964552', 'Cocody', 'Commercial', 'Female', '', 'Editor', 'Ivoirienne', '', '2022-04-27 16:50:42', NULL, 't6.jpg', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(7, '', 'qsdsqd@gmail.com', 'update', '', 'sdq', NULL, 'M', '', '', '', '', '2023-06-09 20:22:04', '2023-06-13 20:02:17', '', '', 1),
(8, '', 'qdssd@gmail.com', 'hugues@gmail.com', '', 'qdsqsd', NULL, 'M', '', '', '', '', '2023-06-09 20:30:23', NULL, '', '', 1),
(10, '', 'qsdsd@gmail.com', 'hugues@gmail.comdqssd', '', 'Cocody', NULL, 'M', '', '', '', '', '2023-06-09 20:32:31', NULL, '', '', 0),
(12, '', 'essaie@gmail.com', 'essaie', '', 'Cocody', NULL, 'M', '', '', '', '', '2023-06-12 18:34:31', NULL, '', '202cb962ac59075b964b07152d234b70', 1);

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
  ADD PRIMARY KEY (`article_id`);

--
-- Index pour la table `app_article_marque`
--
ALTER TABLE `app_article_marque`
  ADD PRIMARY KEY (`article_marque_id`);

--
-- Index pour la table `app_automobile`
--
ALTER TABLE `app_automobile`
  ADD PRIMARY KEY (`id_auto`);

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
-- Index pour la table `app_img_automobile`
--
ALTER TABLE `app_img_automobile`
  ADD PRIMARY KEY (`id_img`);

--
-- Index pour la table `app_marque`
--
ALTER TABLE `app_marque`
  ADD PRIMARY KEY (`id_marque`);

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
-- Index pour la table `app_moteur`
--
ALTER TABLE `app_moteur`
  ADD PRIMARY KEY (`id_moteur`);

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
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

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
  MODIFY `id_droit_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=638;

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
  MODIFY `id_liste_action` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT pour la table `acl_liste_action_comment`
--
ALTER TABLE `acl_liste_action_comment`
  MODIFY `id_liste_action_comment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `acl_liste_controller`
--
ALTER TABLE `acl_liste_controller`
  MODIFY `id_liste_controller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `acl_liste_module`
--
ALTER TABLE `acl_liste_module`
  MODIFY `id_liste_module` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `acl_liste_onglet`
--
ALTER TABLE `acl_liste_onglet`
  MODIFY `id_liste_onglet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=350;

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
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `app_article_marque`
--
ALTER TABLE `app_article_marque`
  MODIFY `article_marque_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `app_automobile`
--
ALTER TABLE `app_automobile`
  MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `app_img_automobile`
--
ALTER TABLE `app_img_automobile`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `app_marque`
--
ALTER TABLE `app_marque`
  MODIFY `id_marque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `app_messages`
--
ALTER TABLE `app_messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `app_model`
--
ALTER TABLE `app_model`
  MODIFY `id_model` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `app_moteur`
--
ALTER TABLE `app_moteur`
  MODIFY `id_moteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `app_sous_category`
--
ALTER TABLE `app_sous_category`
  MODIFY `sous_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `app_visiteur`
--
ALTER TABLE `app_visiteur`
  MODIFY `id_visiteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
