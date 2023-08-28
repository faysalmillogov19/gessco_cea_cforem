-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 22 mai 2023 à 12:54
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `scolarite`
--

-- --------------------------------------------------------

--
-- Structure de la table `affectation_enseignants`
--

CREATE TABLE `affectation_enseignants` (
  `id` int(11) NOT NULL,
  `module_specialite` int(11) NOT NULL,
  `enseignant` int(11) NOT NULL COMMENT 'stocke id personne',
  `type_affectation` int(11) NOT NULL,
  `date_affectation` date DEFAULT NULL,
  `date_arret` date DEFAULT NULL,
  `statut` int(11) DEFAULT NULL,
  `pays` int(11) NOT NULL,
  `ville` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `affectation_enseignants`
--

INSERT INTO `affectation_enseignants` (`id`, `module_specialite`, `enseignant`, `type_affectation`, `date_affectation`, `date_arret`, `statut`, `pays`, `ville`, `updated_at`, `created_at`) VALUES
(2, 11, 11, 1, NULL, NULL, 1, 0, 0, '2022-11-29', '2022-11-29'),
(3, 10, 11, 1, '2022-11-30', NULL, 1, 42, 1, '2022-11-29', '2022-11-29'),
(4, 10, 11, 1, '2022-11-28', NULL, 1, 1, 1, '2022-11-29', '2022-11-29'),
(5, 11, 11, 1, '2022-12-21', NULL, 1, 1, 1, '2022-12-12', '2022-12-12'),
(6, 15, 11, 1, '2023-04-14', NULL, 1, 5, 1, '2023-04-06', '2023-04-06'),
(7, 17, 11, 1, '2023-05-16', NULL, 2, 36, 1, '2023-05-17', '2023-05-17'),
(8, 19, 16, 1, '2023-05-16', NULL, 2, 1, 1, '2023-05-17', '2023-05-17'),
(9, 21, 11, 1, NULL, NULL, 1, 1, 1, '2023-05-17', '2023-05-17');

-- --------------------------------------------------------

--
-- Structure de la table `annee_academiques`
--

CREATE TABLE `annee_academiques` (
  `id` int(11) NOT NULL,
  `code` text DEFAULT NULL,
  `libelle` text NOT NULL,
  `description` text DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annee_academiques`
--

INSERT INTO `annee_academiques` (`id`, `code`, `libelle`, `description`, `updated_at`, `created_at`) VALUES
(1, '2019-2018', '2018-2019', 'Année 2018 2019', '2022-11-14', '2022-11-13'),
(3, '2020', '2019-2020', 'Année en cours 2020', '2022-11-14', '2022-11-14');

-- --------------------------------------------------------

--
-- Structure de la table `diplomes`
--

CREATE TABLE `diplomes` (
  `id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `code` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `diplomes`
--

INSERT INTO `diplomes` (`id`, `libelle`, `code`, `description`, `updated_at`, `created_at`) VALUES
(1, 'BAC', 'BAC', NULL, '0000-00-00', '0000-00-00'),
(2, 'LICENCE', 'LICENCE', NULL, '0000-00-00', '0000-00-00'),
(3, 'MASTER', 'MASTER', NULL, '0000-00-00', '0000-00-00'),
(4, 'DOCTORAT', 'DOCTORAT', NULL, '0000-00-00', '0000-00-00'),
(5, 'PROFESSORAT', 'PROFESSORAT', NULL, '0000-00-00', '0000-00-00'),
(6, 'CERTIFICAT', 'CERTIFICAT', NULL, '0000-00-00', '0000-00-00'),
(7, 'FORMATION PROFESSIONNELLE', 'FORMATION PROFESSIONNELLE', NULL, '0000-00-00', '0000-00-00'),
(8, 'BEPC', 'BEPC', 'BEPC', '0000-00-00', '0000-00-00'),
(9, 'CAP', 'CAP', NULL, '0000-00-00', '0000-00-00'),
(10, 'CEP', 'CEP', NULL, '0000-00-00', '0000-00-00'),
(11, 'AUCUN', 'AUCUN', NULL, '0000-00-00', '0000-00-00'),
(12, 'BEP', 'BEP', NULL, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `dossiers`
--

CREATE TABLE `dossiers` (
  `id` int(11) NOT NULL,
  `personne` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `fichier` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `dossiers`
--

INSERT INTO `dossiers` (`id`, `personne`, `libelle`, `fichier`, `created_at`, `updated_at`) VALUES
(2, 2, 'Curiculum vitae', 'uploads/pieces_jointes/05-08-23-11-31-581683545518.pdf', '2023-05-08', '2023-05-08'),
(3, 2, 'Cnib', 'uploads/pieces_jointes/05-08-23-11-55-211683546921.pdf', '2023-05-08', '2023-05-08'),
(5, 2, 'extrait de naissance', 'uploads/pieces_jointes/05-16-23-02-24-191684247059.pdf', '2023-05-16', '2023-05-16'),
(6, 2, 'Lettre de demande d\'incription', 'uploads/pieces_jointes/05-17-23-09-20-381684315238.pdf', '2023-05-17', '2023-05-17');

-- --------------------------------------------------------

--
-- Structure de la table `element_constitutifs`
--

CREATE TABLE `element_constitutifs` (
  `id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `code` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `element_constitutifs`
--

INSERT INTO `element_constitutifs` (`id`, `libelle`, `code`, `description`, `updated_at`, `created_at`) VALUES
(2, 'Communication et rédaction administrative', 'CRA', NULL, '2022-11-27', '2022-11-27'),
(3, 'Gestion financière', 'GFM', NULL, '2022-11-27', '2022-11-27'),
(4, 'Marketing fondamental', 'MAF', NULL, '2022-11-27', '2022-11-27'),
(5, 'Management des hommes et des équipes', 'MHE', NULL, '2022-11-27', '2022-11-27'),
(6, 'Gestion des projets et management du risque', 'GPM', NULL, '2022-11-27', '2022-11-27'),
(7, 'Management stratégique et opérationnel', 'MSO', NULL, '2022-11-27', '2022-11-27'),
(8, 'Management de la qualité', 'MAQ', NULL, '2022-11-27', '2022-11-27'),
(9, 'Bonnes pratiques pharmaceutiques (BPF, BPD, BPL, BPC, …)', 'BPP', NULL, '2022-11-27', '2022-11-27'),
(10, 'Contrôle de Qualité au laboratoire (Méthodes instrumentales et séparatives, validation de méthodes)', 'CQL', NULL, '2022-11-27', '2022-11-27'),
(11, 'Qualité thérapeutique des médicaments', 'QTM', NULL, '2022-11-27', '2022-11-27'),
(12, 'Assurance qualité des produits pharmaceutiques', 'APP', NULL, '2022-11-27', '2022-11-27'),
(13, 'OSS', 'Organisation du système de santé', NULL, '2022-11-27', '2022-11-27'),
(14, 'Initiation à l’épidémiologie', 'INE', NULL, '2022-11-27', '2022-11-27'),
(15, 'Economie de la santé (pharmaco-économie, assurance maladie)', 'ECS', NULL, '2022-11-27', '2022-11-27'),
(16, 'Veille sanitaire et organisation des vigilances', 'VSO', NULL, '2022-11-27', '2022-11-27'),
(17, 'Mesure de l\'amélioration de la qualité dans les soins de santé', 'MAQ', NULL, '2022-11-27', '2022-11-27'),
(18, 'Hygiène et sécurité au travail', 'HST', NULL, '2022-11-27', '2022-11-27'),
(19, 'Dispositifs médicaux et autres produits de santé', 'DIM', NULL, '2022-11-27', '2022-11-27'),
(20, 'Système d’Inspection : Outils, organisation, préparation, réalisation', 'SYI', NULL, '2022-11-27', '2022-11-27'),
(21, 'Système d\'Homologation : Format CTD et médicaments génériques', 'CTD', NULL, '2022-11-27', '2022-11-27'),
(22, 'Lutte contre la contrefaçon des médicaments', 'LCM', NULL, '2022-11-27', '2022-11-27'),
(23, 'Statistiques et Mesures des incertitudes', 'SMI', NULL, '2022-11-27', '2022-11-27'),
(24, 'Qualification des équipements et Validation des méthodes analytiques', 'QVA', NULL, '2022-11-27', '2022-11-27'),
(25, 'Progrès des techniques d\'analyses physico-chimiques dans les sciences pharmaceutiques et biomédicales', 'PTA', NULL, '2022-11-27', '2022-11-27'),
(26, 'Méthodes d\'analyses microbiologiques et biologiques', 'MAM', NULL, '2022-11-27', '2022-11-27'),
(27, 'Prélèvement et préparation des échantillons pharmaceutiques et alimentaires', 'PEB', NULL, '2022-11-27', '2022-11-27'),
(28, 'Prélèvement et préparation des échantillons biologiques', 'PPE', NULL, '2022-11-27', '2022-11-27'),
(29, 'Présentation et interpretation des résultats', 'PIR', NULL, '2022-11-27', '2022-11-27'),
(30, 'Etudes de stabilité des produits de santé et des aliments', 'EST', NULL, '2022-11-27', '2022-11-27'),
(31, 'Conception des laboratoire de contrôle', 'CLC', NULL, '2022-11-27', '2022-11-27'),
(32, 'Organisation du contrôle de qualité (en fabrication, en labo, en post-marketing, …) des produits de santé au niveau pays', 'OCQ', NULL, '2022-11-27', '2022-11-27'),
(33, 'Management des risques et des décisions', 'MRD', NULL, '2022-11-27', '2022-11-27'),
(34, 'Anglais scientifique', 'ANS', NULL, '2022-11-27', '2022-11-27'),
(35, 'Informatique médical et pharmaceutique', 'IMP', NULL, '2022-11-27', '2022-11-27'),
(36, 'Recherche en santé, Essai clinique, Bioéthique', 'RSE', NULL, '2022-11-27', '2022-11-27'),
(37, 'Propriété intellectuelle, brevets et marques', 'PIB', NULL, '2022-11-27', '2022-11-27'),
(38, 'Bio-statistiques, plans d\'expérience et Information Scientifique (Etudes de cas)', 'BST', NULL, '2022-11-27', '2022-11-27'),
(39, 'Validation du protocole de recherche du Mémoire', 'VPR', NULL, '2022-11-27', '2022-11-27'),
(40, 'Stage pratique dans une structure agrée', 'SPS', NULL, '2022-11-27', '2022-11-27'),
(41, 'Conception et rédaction du mémoire', 'CRMP', NULL, '2022-11-27', '2022-11-27'),
(42, 'Soutenance du mémoire', 'SOM', NULL, '2022-11-27', '2022-11-27'),
(43, 'Complément de Physico-chimie', 'CPC', NULL, '2022-11-27', '2022-11-27'),
(44, 'Formulation et fabrication des formes pharmaceutiques : liquides, semi-solides et solides', 'FFP', NULL, '2022-11-27', '2022-11-27'),
(45, 'Conditionnement pharmaceutique', 'COP', NULL, '2022-11-27', '2022-11-27'),
(46, 'Production des matières premières issues des plantes', 'PMP', NULL, '2022-11-27', '2022-11-27'),
(47, 'Biotechnologie et production des médicaments', 'BPM', NULL, '2022-11-27', '2022-11-27'),
(48, 'Biopharmacie avancée', 'BIA', NULL, '2022-11-27', '2022-11-27'),
(49, 'Etude de Bioéquivalence : Conception, réalisation, rapport', 'ETB', NULL, '2022-11-27', '2022-11-27'),
(50, 'Systèmes bio-adhésif, pulmonaire, dermique', 'SBA', NULL, '2022-11-27', '2022-11-27'),
(51, 'Nanomédicaments', 'NAN', NULL, '2022-11-27', '2022-11-27'),
(52, 'Conception des usines de productions, plans techniques et électriques', 'CUP', NULL, '2022-11-27', '2022-11-27'),
(53, 'Equipements, outils et qualification', 'EOQ', NULL, '2022-11-27', '2022-11-27'),
(54, 'Procédés industriels  : validation, maitrise statistique, transposition d’échelle, Nettoyage et validation', 'PIV', NULL, '2022-11-27', '2022-11-27'),
(55, 'Description des produits cosmétiques', 'DPC', NULL, '2022-11-27', '2022-11-27'),
(56, 'Technologie des produits cosmétiques', 'TPC', NULL, '2022-11-27', '2022-11-27'),
(57, 'Expérimentations, objectivations et risques', 'EOR', NULL, '2022-11-27', '2022-11-27'),
(58, 'Contrôle de Qualité pré et post marketing', 'CQM', NULL, '2022-11-27', '2022-11-27'),
(59, 'Homologation des produits cosmétiques', 'HPC', NULL, '2022-11-27', '2022-11-27'),
(60, 'Anatomie, Biologie et physiologie de la peau', 'ABP', NULL, '2022-11-27', '2022-11-27'),
(61, 'Pathologies et Allergologie Cutanées', 'PAC', NULL, '2022-11-27', '2022-11-27'),
(62, 'conseils et pratiques dermatologiques', 'CPD', NULL, '2022-11-27', '2022-11-27'),
(63, 'Conseils et pratiques esthétiques', 'CPE', NULL, '2022-11-27', '2022-11-27'),
(64, 'Conseils et pratiques cosmétologiques', 'CPC', NULL, '2022-11-27', '2022-11-27'),
(65, 'Usage rationnel du médicament : outils, méthodes et techniques', 'URM', NULL, '2022-11-27', '2022-11-27'),
(66, 'Pathologies et intrants des programmes de santé', 'PIP', NULL, '2022-11-27', '2022-11-27'),
(67, 'Cycle de Gestion de la chaine d’approvisionnement', 'CGC', NULL, '2022-11-27', '2022-11-27'),
(68, 'Gestion des achats et des stocks', 'GAS', NULL, '2022-11-27', '2022-11-27'),
(69, 'Vigilances Thérapeutiques', 'VIT', NULL, '2022-11-27', '2022-11-27'),
(70, 'Information et publicité sur les produits pharmaceutiques :  organisation, techniques et outils', 'IPP', NULL, '2022-11-27', '2022-11-27'),
(71, 'Logistique de la santé : Concept de base, planification, programmation des opération, suivi - évaluation', 'LOS', NULL, '2022-11-27', '2022-11-27'),
(72, 'Gestion des moyens de transport', 'GMT', NULL, '2022-11-27', '2022-11-27'),
(73, 'Gestion des infrastructures, équipements et  matériels', 'GIE', NULL, '2022-11-27', '2022-11-27'),
(74, 'Méthodologie en pharmaco-thérapeutique', 'MPT', NULL, '2022-11-27', '2022-11-27'),
(75, 'Protocoles thérapeutiques-Médicaments de prédilection', 'PTM', NULL, '2022-11-27', '2022-11-27'),
(76, 'Gestion des différentes composantes de la pharmacothérapie', 'GDC', NULL, '2022-11-27', '2022-11-27'),
(77, 'Méthodes analytiques des différents dossiers thérapeutiques en Pharmacie clinique', 'MAP', NULL, '2022-11-27', '2022-11-27'),
(78, 'Essais thérapeutiques médicamenteux', 'ETM', NULL, '2022-11-27', '2022-11-27'),
(79, 'Préparation des médicaments hospitaliers : Collyres, Nutrition parentérale, solutés, préparations magistrales', 'PMH', NULL, '2022-11-27', '2022-11-27'),
(80, 'Préparation des cytotoxiques : dilution,  reconstitutions, conditions opératoires et de conservation', 'PRC', NULL, '2022-11-27', '2022-11-27'),
(81, 'Thérapie génique, cellulaire et transplantation d’organes', 'TGC', NULL, '2022-11-27', '2022-11-27'),
(82, 'Radiopharmacie', 'RDP', NULL, '2022-11-27', '2022-11-27');

-- --------------------------------------------------------

--
-- Structure de la table `element_scolarites`
--

CREATE TABLE `element_scolarites` (
  `id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `code` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `type_element_scolarite` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `element_scolarites`
--

INSERT INTO `element_scolarites` (`id`, `libelle`, `code`, `description`, `type_element_scolarite`, `updated_at`, `created_at`) VALUES
(1, 'FRAIS INSCRIPTION UNIVERSITAIRE', 'FRAIS INSCRIPTION UNIVERSITAIRE', 'FRAIS INSCRIPTION UNIVERSITAIRE', 1, '2022-11-20', '2022-11-20'),
(2, 'FRAIS DE FORMATION ET LABORATOIRE', 'FRAIS DE FORMATION ET LABORATOIRE', 'FRAIS DE FORMATION ET LABORATOIRE', 2, '2022-11-20', '2022-11-20');

-- --------------------------------------------------------

--
-- Structure de la table `enseignants`
--

CREATE TABLE `enseignants` (
  `id` int(11) NOT NULL,
  `personnel` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `type_enseignant` int(11) NOT NULL,
  `num_autorisation_enseigner` text DEFAULT NULL,
  `date_autorisation_enseigner` date DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `enseignants`
--

INSERT INTO `enseignants` (`id`, `personnel`, `grade`, `type_enseignant`, `num_autorisation_enseigner`, `date_autorisation_enseigner`, `updated_at`, `created_at`) VALUES
(3, 2, 1, 1, NULL, NULL, '2022-11-22', '2022-11-22'),
(4, 7, 1, 1, '00222', '2007-12-06', '2022-11-23', '2022-11-23');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `id` int(11) NOT NULL,
  `personne` int(11) NOT NULL,
  `matricule` text DEFAULT NULL,
  `travail_anterieur` text DEFAULT NULL,
  `travail_pendant` text DEFAULT NULL,
  `travail_apres` text DEFAULT NULL,
  `source_financement` text DEFAULT NULL,
  `type_bourse` int(11) NOT NULL,
  `handicap` text DEFAULT NULL,
  `antecedant_medicaux` text DEFAULT NULL,
  `alergies` text DEFAULT NULL,
  `profession` int(11) DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`id`, `personne`, `matricule`, `travail_anterieur`, `travail_pendant`, `travail_apres`, `source_financement`, `type_bourse`, `handicap`, `antecedant_medicaux`, `alergies`, `profession`, `updated_at`, `created_at`) VALUES
(2, 2, '0000', 'ministere de la sante', 'ministere de la sante', '1993-02-23', 'Salaire', 2, 'Non', 'Non parvenu', NULL, 2, '2022-11-16', '2022-11-16'),
(3, 3, '000002', NULL, NULL, NULL, 'Salaire', 2, NULL, NULL, NULL, 1, '2022-11-16', '2022-11-16'),
(4, 4, '2023', NULL, NULL, NULL, 'Salaire', 1, NULL, NULL, NULL, 2, '2022-11-17', '2022-11-17');

-- --------------------------------------------------------

--
-- Structure de la table `export_notes`
--

CREATE TABLE `export_notes` (
  `id` int(11) NOT NULL,
  `nom_complet` text NOT NULL,
  `matricule` text NOT NULL,
  `module_specialite` text NOT NULL,
  `note` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `export_notes`
--

INSERT INTO `export_notes` (`id`, `nom_complet`, `matricule`, `module_specialite`, `note`, `created_at`, `updated_at`) VALUES
(31, 'Ouedraogo Rodigues', '2023', '9', 16, '2023-05-17', '2023-05-17');

-- --------------------------------------------------------

--
-- Structure de la table `filieres`
--

CREATE TABLE `filieres` (
  `id` int(11) NOT NULL,
  `code` text DEFAULT NULL,
  `libelle` text NOT NULL,
  `description` text DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `filieres`
--

INSERT INTO `filieres` (`id`, `code`, `libelle`, `description`, `updated_at`, `created_at`) VALUES
(5, 'AQC', 'Assurance qualité et contrôle qualité des médicaments et des aliments', NULL, '2022-11-20', '2022-11-20'),
(6, 'BFI', 'Biopharmacie, formulation et ingénierie phrmaceutiques', NULL, '2022-11-20', '2022-11-20'),
(7, 'DEC', 'Dermopharmacie et cosmétologie', NULL, '2022-11-20', '2022-11-20'),
(8, 'GAP', 'Gestion des Approvisionnements pharmaceutique et Logistique de santé', NULL, '2022-11-20', '2022-11-20'),
(9, 'PHH', 'Pharmacie hospitalière', NULL, '2022-11-20', '2022-11-20'),
(10, 'PPC', 'Pharmacologie et Pharmacie cliniques', NULL, '2022-11-20', '2022-11-20'),
(11, 'REP', 'Règlementation pharmaceutique', NULL, '2022-11-20', '2022-11-20'),
(12, 'TCU', 'Toxicologie clinique, d\'urgence, environnemental et en milieu de travail', NULL, '2022-11-20', '2022-11-20'),
(13, 'PMP', 'Phytothérapie, médecine et pharmacopée traditionnelles', NULL, '2022-11-20', '2022-11-20'),
(14, 'TEM', 'Toxicologie environnementale et en milieu de travail', NULL, '2022-11-20', '2022-11-20');

-- --------------------------------------------------------

--
-- Structure de la table `frais_inscriptions`
--

CREATE TABLE `frais_inscriptions` (
  `id` int(11) NOT NULL,
  `specialite` int(11) NOT NULL,
  `element_scolarite` int(11) NOT NULL,
  `montant_etudiant_uemoa` double DEFAULT NULL,
  `montant_salarie_uemoa` double DEFAULT NULL,
  `montant_etudiant_autre` double DEFAULT NULL,
  `montant_boursier_total` double DEFAULT NULL,
  `montant_boursier_partiel` double DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `frais_inscriptions`
--

INSERT INTO `frais_inscriptions` (`id`, `specialite`, `element_scolarite`, `montant_etudiant_uemoa`, `montant_salarie_uemoa`, `montant_etudiant_autre`, `montant_boursier_total`, `montant_boursier_partiel`, `updated_at`, `created_at`) VALUES
(1, 4, 1, 1500000, 1000000, 20000000, 20000000, 200000, '2022-12-02', '2022-12-02'),
(3, 4, 2, 1000000, 1500000, 2000000, 1000000, 1015000, '2022-12-05', '2022-12-05'),
(4, 6, 1, 1000000, 1500000, 1250000, 500000, 750000, '2023-03-27', '2023-03-27'),
(5, 6, 2, 500000, 500000, 500000, 500000, 500000, '2023-03-27', '2023-03-27'),
(6, 8, 1, 1000000, 1500000, 2000000, 250000, 500000, '2023-04-06', '2023-04-06'),
(7, 8, 2, 500000, 500000, 500000, 0, 0, '2023-04-06', '2023-04-06'),
(8, 9, 1, 1000000, 1500000, 2000000, 0, 500000, '2023-05-17', '2023-05-17'),
(9, 9, 2, 1000000, 1000000, 500000, 0, 0, '2023-05-17', '2023-05-17');

-- --------------------------------------------------------

--
-- Structure de la table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `code` text DEFAULT NULL,
  `libelle` text NOT NULL,
  `description` text DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `grades`
--

INSERT INTO `grades` (`id`, `code`, `libelle`, `description`, `updated_at`, `created_at`) VALUES
(1, 'M2', 'Master', 'Niveau master', '2022-11-14', '2022-11-14'),
(2, 'Dr A', 'Assistant', 'Dr', '2022-11-14', '2022-11-14'),
(3, 'MA', 'Maitre assistant', 'Dr avec de l\'experience', '2022-11-14', '2022-11-14'),
(5, 'Pr', 'Professeur', NULL, '2022-11-20', '2022-11-20');

-- --------------------------------------------------------

--
-- Structure de la table `groupe_sanguins`
--

CREATE TABLE `groupe_sanguins` (
  `id` int(11) NOT NULL,
  `libelle` varchar(10) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `groupe_sanguins`
--

INSERT INTO `groupe_sanguins` (`id`, `libelle`, `updated_at`, `created_at`) VALUES
(1, 'Inconnu', '0000-00-00', '0000-00-00'),
(2, 'A-', '0000-00-00', '0000-00-00'),
(3, 'A+', '0000-00-00', '0000-00-00'),
(4, 'AB-', '0000-00-00', '0000-00-00'),
(5, 'AB+', '0000-00-00', '0000-00-00'),
(6, 'B-', '0000-00-00', '0000-00-00'),
(7, 'B+', '0000-00-00', '0000-00-00'),
(8, 'O-', '0000-00-00', '0000-00-00'),
(9, 'O+', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

CREATE TABLE `inscriptions` (
  `id` int(11) NOT NULL,
  `etudiant` int(11) NOT NULL,
  `specialite` int(11) NOT NULL,
  `code_inscription` text NOT NULL,
  `date` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `inscriptions`
--

INSERT INTO `inscriptions` (`id`, `etudiant`, `specialite`, `code_inscription`, `date`, `updated_at`, `created_at`) VALUES
(3, 4, 6, '', '2022-12-16', '2022-12-09', '2022-12-09'),
(4, 4, 4, '2022-12-09', '2022-12-07', '2022-12-09', '2022-12-09'),
(5, 3, 4, '2022-12-19', '2022-12-20', '2022-12-19', '2022-12-19'),
(6, 2, 4, '2023-03-22', '2023-03-16', '2023-03-22', '2023-03-22'),
(7, 2, 8, '2023-04-06', '2023-04-06', '2023-04-06', '2023-04-06'),
(8, 4, 8, '2023-04-06', '2023-04-05', '2023-04-06', '2023-04-06'),
(9, 4, 9, '2023-05-17', '2023-05-15', '2023-05-17', '2023-05-17');

-- --------------------------------------------------------

--
-- Structure de la table `mentions`
--

CREATE TABLE `mentions` (
  `id` int(11) NOT NULL,
  `cote` varchar(2) NOT NULL,
  `libelle` text NOT NULL,
  `max` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mentions`
--

INSERT INTO `mentions` (`id`, `cote`, `libelle`, `max`, `created_at`, `updated_at`) VALUES
(1, 'A', 'mention très bien', 16, '0000-00-00', '0000-00-00'),
(2, 'B', 'mention bien', 15, '0000-00-00', '0000-00-00'),
(3, 'C', 'mention assez bien', 13, '0000-00-00', '0000-00-00'),
(4, 'D', 'mention passable', 11, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `module_specialites`
--

CREATE TABLE `module_specialites` (
  `id` int(11) NOT NULL,
  `specialite` int(11) NOT NULL,
  `element_constitutif` int(11) NOT NULL,
  `unite_enseignement` int(11) NOT NULL,
  `semestre` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `theorie` decimal(10,0) NOT NULL,
  `td` decimal(10,0) NOT NULL,
  `tp` decimal(10,0) NOT NULL,
  `observation` text DEFAULT NULL,
  `date_arret` date DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `module_specialites`
--

INSERT INTO `module_specialites` (`id`, `specialite`, `element_constitutif`, `unite_enseignement`, `semestre`, `credit`, `theorie`, `td`, `tp`, `observation`, `date_arret`, `updated_at`, `created_at`) VALUES
(17, 8, 2, 1, 1, 3, '10', '10', '10', NULL, NULL, '2023-05-03', '2023-05-03'),
(18, 8, 3, 1, 2, 4, '30', '10', '0', NULL, NULL, '2023-05-03', '2023-05-03'),
(19, 9, 2, 1, 1, 3, '10', '10', '10', NULL, NULL, '2023-05-17', '2023-05-17'),
(20, 9, 3, 1, 1, 5, '30', '10', '10', NULL, NULL, '2023-05-17', '2023-05-17'),
(21, 9, 10, 2, 2, 4, '30', '10', '0', NULL, NULL, '2023-05-17', '2023-05-17');

-- --------------------------------------------------------

--
-- Structure de la table `niveaux`
--

CREATE TABLE `niveaux` (
  `id` int(11) NOT NULL,
  `code` text NOT NULL,
  `libelle` text NOT NULL,
  `description` text NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `niveaux`
--

INSERT INTO `niveaux` (`id`, `code`, `libelle`, `description`, `updated_at`, `created_at`) VALUES
(1, 'L1', 'Licence 1', 'NIveaux L1', '2022-11-14', '2022-11-14'),
(3, 'L2', 'Licence 2', 'Niv L2', '2022-11-14', '2022-11-14'),
(4, 'L3', 'Licence 3', '3eme année universitaire', '2022-11-14', '2022-11-14');

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `inscription` int(11) NOT NULL,
  `module_specialite` int(11) NOT NULL,
  `note` decimal(10,0) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id`, `inscription`, `module_specialite`, `note`, `updated_at`, `created_at`) VALUES
(1, 4, 10, '18', '2022-12-12', '2022-12-12'),
(2, 4, 11, '17', '2022-12-12', '2022-12-12'),
(3, 6, 10, '16', '2023-03-23', '2023-03-23'),
(4, 6, 11, '16', '2023-03-25', '2023-03-25'),
(7, 5, 11, '18', '2023-03-25', '2023-03-25'),
(8, 8, 16, '15', '2023-04-06', '2023-04-06'),
(9, 7, 16, '16', '2023-04-06', '2023-04-06'),
(10, 5, 10, '12', '2023-04-30', '2023-04-30'),
(11, 7, 17, '15', '2023-05-17', '2023-05-03'),
(12, 8, 17, '16', '2023-05-03', '2023-05-03'),
(13, 7, 18, '12', '2023-05-08', '2023-05-08'),
(14, 9, 19, '16', '2023-05-17', '2023-05-17');

-- --------------------------------------------------------

--
-- Structure de la table `orientations`
--

CREATE TABLE `orientations` (
  `id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `code` text NOT NULL,
  `description` text NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `orientations`
--

INSERT INTO `orientations` (`id`, `libelle`, `code`, `description`, `updated_at`, `created_at`) VALUES
(1, 'RECHERCHE', 'R', 'RECHERCHE', '2022-11-21', '2022-11-21'),
(2, 'Professionnel', 'P', 'Professionnel', '2022-11-21', '2022-11-21'),
(3, 'Recherche /Professionnel', 'RP', 'Recherche /Professionnel', '2022-11-21', '2022-11-21');

-- --------------------------------------------------------

--
-- Structure de la table `paiements`
--

CREATE TABLE `paiements` (
  `id` int(11) NOT NULL,
  `inscription` int(11) NOT NULL,
  `montant` decimal(10,0) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `paiements`
--

INSERT INTO `paiements` (`id`, `inscription`, `montant`, `date`, `updated_at`, `created_at`) VALUES
(1, 4, '200000', '2022-11-30', '2022-12-10', '2022-12-10'),
(2, 4, '-200000', '2022-11-29', '2022-12-10', '2022-12-10'),
(3, 5, '100000', '2022-12-13', '2022-12-19', '2022-12-19'),
(4, 6, '2000000', '2023-03-09', '2023-03-22', '2023-03-22'),
(5, 8, '100000', '2023-04-05', '2023-04-06', '2023-04-06'),
(6, 8, '-100000', '2023-04-06', '2023-04-06', '2023-04-06'),
(7, 8, '200000', '2023-04-06', '2023-04-06', '2023-04-06'),
(8, 7, '200000', '2023-05-16', '2023-05-16', '2023-05-16'),
(9, 7, '20000', '2023-05-16', '2023-05-17', '2023-05-17'),
(10, 9, '100000', '2023-05-17', '2023-05-17', '2023-05-17');

-- --------------------------------------------------------

--
-- Structure de la table `paiement_etudiants`
--

CREATE TABLE `paiement_etudiants` (
  `id` int(11) NOT NULL,
  `etudiant` int(11) NOT NULL,
  `montant` double NOT NULL,
  `date` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id` int(11) NOT NULL,
  `code` text NOT NULL,
  `alpha2` text NOT NULL,
  `alpha3` text NOT NULL,
  `nom_en_gb` text NOT NULL,
  `nom_fr_fr` text NOT NULL,
  `uemoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `code`, `alpha2`, `alpha3`, `nom_en_gb`, `nom_fr_fr`, `uemoa`) VALUES
(1, '4', 'AF', 'AFG', 'Afghanistan', 'Afghanistan', 0),
(2, '8', 'AL', 'ALB', 'Albania', 'Albanie', 0),
(3, '10', 'AQ', 'ATA', 'Antarctica', 'Antarctique', 0),
(4, '12', 'DZ', 'DZA', 'Algeria', 'Algérie', 0),
(5, '16', 'AS', 'ASM', 'American Samoa', 'Samoa Américaines', 0),
(6, '20', 'AD', 'AND', 'Andorra', 'Andorre', 0),
(7, '24', 'AO', 'AGO', 'Angola', 'Angola', 0),
(8, '28', 'AG', 'ATG', 'Antigua and Barbuda', 'Antigua-et-Barbuda', 0),
(9, '31', 'AZ', 'AZE', 'Azerbaijan', 'Azerbaïdjan', 0),
(10, '32', 'AR', 'ARG', 'Argentina', 'Argentine', 0),
(11, '36', 'AU', 'AUS', 'Australia', 'Australie', 0),
(12, '40', 'AT', 'AUT', 'Austria', 'Autriche', 0),
(13, '44', 'BS', 'BHS', 'Bahamas', 'Bahamas', 0),
(14, '48', 'BH', 'BHR', 'Bahrain', 'Bahreïn', 0),
(15, '50', 'BD', 'BGD', 'Bangladesh', 'Bangladesh', 0),
(16, '51', 'AM', 'ARM', 'Armenia', 'Arménie', 0),
(17, '52', 'BB', 'BRB', 'Barbados', 'Barbade', 0),
(18, '56', 'BE', 'BEL', 'Belgium', 'Belgique', 0),
(19, '60', 'BM', 'BMU', 'Bermuda', 'Bermudes', 0),
(20, '64', 'BT', 'BTN', 'Bhutan', 'Bhoutan', 0),
(21, '68', 'BO', 'BOL', 'Bolivia', 'Bolivie', 0),
(22, '70', 'BA', 'BIH', 'Bosnia and Herzegovina', 'Bosnie-Herzégovine', 0),
(23, '72', 'BW', 'BWA', 'Botswana', 'Botswana', 0),
(24, '74', 'BV', 'BVT', 'Bouvet Island', 'Île Bouvet', 0),
(25, '76', 'BR', 'BRA', 'Brazil', 'Brésil', 0),
(26, '84', 'BZ', 'BLZ', 'Belize', 'Belize', 0),
(27, '86', 'IO', 'IOT', 'British Indian Ocean Territory', 'Territoire Britannique de l\'Océan Indien', 0),
(28, '90', 'SB', 'SLB', 'Solomon Islands', 'Îles Salomon', 0),
(29, '92', 'VG', 'VGB', 'British Virgin Islands', 'Îles Vierges Britanniques', 0),
(30, '96', 'BN', 'BRN', 'Brunei Darussalam', 'Brunéi Darussalam', 0),
(31, '100', 'BG', 'BGR', 'Bulgaria', 'Bulgarie', 0),
(32, '104', 'MM', 'MMR', 'Myanmar', 'Myanmar', 0),
(33, '108', 'BI', 'BDI', 'Burundi', 'Burundi', 0),
(34, '112', 'BY', 'BLR', 'Belarus', 'Bélarus', 0),
(35, '116', 'KH', 'KHM', 'Cambodia', 'Cambodge', 0),
(36, '120', 'CM', 'CMR', 'Cameroon', 'Cameroun', 0),
(37, '124', 'CA', 'CAN', 'Canada', 'Canada', 0),
(38, '132', 'CV', 'CPV', 'Cape Verde', 'Cap-vert', 0),
(39, '136', 'KY', 'CYM', 'Cayman Islands', 'Îles Caïmanes', 0),
(40, '140', 'CF', 'CAF', 'Central African', 'République Centrafricaine', 0),
(41, '144', 'LK', 'LKA', 'Sri Lanka', 'Sri Lanka', 0),
(42, '148', 'TD', 'TCD', 'Chad', 'Tchad', 0),
(43, '152', 'CL', 'CHL', 'Chile', 'Chili', 0),
(44, '156', 'CN', 'CHN', 'China', 'Chine', 0),
(45, '158', 'TW', 'TWN', 'Taiwan', 'Taïwan', 0),
(46, '162', 'CX', 'CXR', 'Christmas Island', 'Île Christmas', 0),
(47, '166', 'CC', 'CCK', 'Cocos (Keeling) Islands', 'Îles Cocos (Keeling)', 0),
(48, '170', 'CO', 'COL', 'Colombia', 'Colombie', 0),
(49, '174', 'KM', 'COM', 'Comoros', 'Comores', 0),
(50, '175', 'YT', 'MYT', 'Mayotte', 'Mayotte', 0),
(51, '178', 'CG', 'COG', 'Republic of the Congo', 'République du Congo', 0),
(52, '180', 'CD', 'COD', 'The Democratic Republic Of The Congo', 'République Démocratique du Congo', 0),
(53, '184', 'CK', 'COK', 'Cook Islands', 'Îles Cook', 0),
(54, '188', 'CR', 'CRI', 'Costa Rica', 'Costa Rica', 0),
(55, '191', 'HR', 'HRV', 'Croatia', 'Croatie', 0),
(56, '192', 'CU', 'CUB', 'Cuba', 'Cuba', 0),
(57, '196', 'CY', 'CYP', 'Cyprus', 'Chypre', 0),
(58, '203', 'CZ', 'CZE', 'Czech Republic', 'République Tchèque', 0),
(59, '204', 'BJ', 'BEN', 'Benin', 'Bénin', 1),
(60, '208', 'DK', 'DNK', 'Denmark', 'Danemark', 0),
(61, '212', 'DM', 'DMA', 'Dominica', 'Dominique', 0),
(62, '214', 'DO', 'DOM', 'Dominican Republic', 'République Dominicaine', 0),
(63, '218', 'EC', 'ECU', 'Ecuador', 'Équateur', 0),
(64, '222', 'SV', 'SLV', 'El Salvador', 'El Salvador', 0),
(65, '226', 'GQ', 'GNQ', 'Equatorial Guinea', 'Guinée Équatoriale', 0),
(66, '231', 'ET', 'ETH', 'Ethiopia', 'Éthiopie', 0),
(67, '232', 'ER', 'ERI', 'Eritrea', 'Érythrée', 0),
(68, '233', 'EE', 'EST', 'Estonia', 'Estonie', 0),
(69, '234', 'FO', 'FRO', 'Faroe Islands', 'Îles Féroé', 0),
(70, '238', 'FK', 'FLK', 'Falkland Islands', 'Îles (malvinas) Falkland', 0),
(71, '239', 'GS', 'SGS', 'South Georgia and the South Sandwich Islands', 'Géorgie du Sud et les Îles Sandwich du Sud', 0),
(72, '242', 'FJ', 'FJI', 'Fiji', 'Fidji', 0),
(73, '246', 'FI', 'FIN', 'Finland', 'Finlande', 0),
(74, '248', 'AX', 'ALA', 'Åland Islands', 'Îles Åland', 0),
(75, '250', 'FR', 'FRA', 'France', 'France', 0),
(76, '254', 'GF', 'GUF', 'French Guiana', 'Guyane Française', 0),
(77, '258', 'PF', 'PYF', 'French Polynesia', 'Polynésie Française', 0),
(78, '260', 'TF', 'ATF', 'French Southern Territories', 'Terres Australes Françaises', 0),
(79, '262', 'DJ', 'DJI', 'Djibouti', 'Djibouti', 0),
(80, '266', 'GA', 'GAB', 'Gabon', 'Gabon', 0),
(81, '268', 'GE', 'GEO', 'Georgia', 'Géorgie', 0),
(82, '270', 'GM', 'GMB', 'Gambia', 'Gambie', 0),
(83, '275', 'PS', 'PSE', 'Occupied Palestinian Territory', 'Territoire Palestinien Occupé', 0),
(84, '276', 'DE', 'DEU', 'Germany', 'Allemagne', 0),
(85, '288', 'GH', 'GHA', 'Ghana', 'Ghana', 0),
(86, '292', 'GI', 'GIB', 'Gibraltar', 'Gibraltar', 0),
(87, '296', 'KI', 'KIR', 'Kiribati', 'Kiribati', 0),
(88, '300', 'GR', 'GRC', 'Greece', 'Grèce', 0),
(89, '304', 'GL', 'GRL', 'Greenland', 'Groenland', 0),
(90, '308', 'GD', 'GRD', 'Grenada', 'Grenade', 0),
(91, '312', 'GP', 'GLP', 'Guadeloupe', 'Guadeloupe', 0),
(92, '316', 'GU', 'GUM', 'Guam', 'Guam', 0),
(93, '320', 'GT', 'GTM', 'Guatemala', 'Guatemala', 0),
(94, '324', 'GN', 'GIN', 'Guinea', 'Guinée', 0),
(95, '328', 'GY', 'GUY', 'Guyana', 'Guyana', 0),
(96, '332', 'HT', 'HTI', 'Haiti', 'Haïti', 0),
(97, '334', 'HM', 'HMD', 'Heard Island and McDonald Islands', 'Îles Heard et Mcdonald', 0),
(98, '336', 'VA', 'VAT', 'Vatican City State', 'Saint-Siège (état de la Cité du Vatican)', 0),
(99, '340', 'HN', 'HND', 'Honduras', 'Honduras', 0),
(100, '344', 'HK', 'HKG', 'Hong Kong', 'Hong-Kong', 0),
(101, '348', 'HU', 'HUN', 'Hungary', 'Hongrie', 0),
(102, '352', 'IS', 'ISL', 'Iceland', 'Islande', 0),
(103, '356', 'IN', 'IND', 'India', 'Inde', 0),
(104, '360', 'ID', 'IDN', 'Indonesia', 'Indonésie', 0),
(105, '364', 'IR', 'IRN', 'Islamic Republic of Iran', 'République Islamique d\'Iran', 0),
(106, '368', 'IQ', 'IRQ', 'Iraq', 'Iraq', 0),
(107, '372', 'IE', 'IRL', 'Ireland', 'Irlande', 0),
(108, '376', 'IL', 'ISR', 'Israel', 'Israël', 0),
(109, '380', 'IT', 'ITA', 'Italy', 'Italie', 0),
(110, '384', 'CI', 'CIV', 'Côte d\'Ivoire', 'Côte d\'Ivoire', 1),
(111, '388', 'JM', 'JAM', 'Jamaica', 'Jamaïque', 0),
(112, '392', 'JP', 'JPN', 'Japan', 'Japon', 0),
(113, '398', 'KZ', 'KAZ', 'Kazakhstan', 'Kazakhstan', 0),
(114, '400', 'JO', 'JOR', 'Jordan', 'Jordanie', 0),
(115, '404', 'KE', 'KEN', 'Kenya', 'Kenya', 0),
(116, '408', 'KP', 'PRK', 'Democratic People\'s Republic of Korea', 'République Populaire Démocratique de Corée', 0),
(117, '410', 'KR', 'KOR', 'Republic of Korea', 'République de Corée', 0),
(118, '414', 'KW', 'KWT', 'Kuwait', 'Koweït', 0),
(119, '417', 'KG', 'KGZ', 'Kyrgyzstan', 'Kirghizistan', 0),
(120, '418', 'LA', 'LAO', 'Lao People\'s Democratic Republic', 'République Démocratique Populaire Lao', 0),
(121, '422', 'LB', 'LBN', 'Lebanon', 'Liban', 0),
(122, '426', 'LS', 'LSO', 'Lesotho', 'Lesotho', 0),
(123, '428', 'LV', 'LVA', 'Latvia', 'Lettonie', 0),
(124, '430', 'LR', 'LBR', 'Liberia', 'Libéria', 0),
(125, '434', 'LY', 'LBY', 'Libyan Arab Jamahiriya', 'Jamahiriya Arabe Libyenne', 0),
(126, '438', 'LI', 'LIE', 'Liechtenstein', 'Liechtenstein', 0),
(127, '440', 'LT', 'LTU', 'Lithuania', 'Lituanie', 0),
(128, '442', 'LU', 'LUX', 'Luxembourg', 'Luxembourg', 0),
(129, '446', 'MO', 'MAC', 'Macao', 'Macao', 0),
(130, '450', 'MG', 'MDG', 'Madagascar', 'Madagascar', 0),
(131, '454', 'MW', 'MWI', 'Malawi', 'Malawi', 0),
(132, '458', 'MY', 'MYS', 'Malaysia', 'Malaisie', 0),
(133, '462', 'MV', 'MDV', 'Maldives', 'Maldives', 0),
(134, '466', 'ML', 'MLI', 'Mali', 'Mali', 1),
(135, '470', 'MT', 'MLT', 'Malta', 'Malte', 0),
(136, '474', 'MQ', 'MTQ', 'Martinique', 'Martinique', 0),
(137, '478', 'MR', 'MRT', 'Mauritania', 'Mauritanie', 0),
(138, '480', 'MU', 'MUS', 'Mauritius', 'Maurice', 0),
(139, '484', 'MX', 'MEX', 'Mexico', 'Mexique', 0),
(140, '492', 'MC', 'MCO', 'Monaco', 'Monaco', 0),
(141, '496', 'MN', 'MNG', 'Mongolia', 'Mongolie', 0),
(142, '498', 'MD', 'MDA', 'Republic of Moldova', 'République de Moldova', 0),
(143, '500', 'MS', 'MSR', 'Montserrat', 'Montserrat', 0),
(144, '504', 'MA', 'MAR', 'Morocco', 'Maroc', 0),
(145, '508', 'MZ', 'MOZ', 'Mozambique', 'Mozambique', 0),
(146, '512', 'OM', 'OMN', 'Oman', 'Oman', 0),
(147, '516', 'NA', 'NAM', 'Namibia', 'Namibie', 0),
(148, '520', 'NR', 'NRU', 'Nauru', 'Nauru', 0),
(149, '524', 'NP', 'NPL', 'Nepal', 'Népal', 0),
(150, '528', 'NL', 'NLD', 'Netherlands', 'Pays-Bas', 0),
(151, '530', 'AN', 'ANT', 'Netherlands Antilles', 'Antilles Néerlandaises', 0),
(152, '533', 'AW', 'ABW', 'Aruba', 'Aruba', 0),
(153, '540', 'NC', 'NCL', 'New Caledonia', 'Nouvelle-Calédonie', 0),
(154, '548', 'VU', 'VUT', 'Vanuatu', 'Vanuatu', 0),
(155, '554', 'NZ', 'NZL', 'New Zealand', 'Nouvelle-Zélande', 0),
(156, '558', 'NI', 'NIC', 'Nicaragua', 'Nicaragua', 0),
(157, '562', 'NE', 'NER', 'Niger', 'Niger', 1),
(158, '566', 'NG', 'NGA', 'Nigeria', 'Nigéria', 0),
(159, '570', 'NU', 'NIU', 'Niue', 'Niué', 0),
(160, '574', 'NF', 'NFK', 'Norfolk Island', 'Île Norfolk', 0),
(161, '578', 'NO', 'NOR', 'Norway', 'Norvège', 0),
(162, '580', 'MP', 'MNP', 'Northern Mariana Islands', 'Îles Mariannes du Nord', 0),
(163, '581', 'UM', 'UMI', 'United States Minor Outlying Islands', 'Îles Mineures Éloignées des États-Unis', 0),
(164, '583', 'FM', 'FSM', 'Federated States of Micronesia', 'États Fédérés de Micronésie', 0),
(165, '584', 'MH', 'MHL', 'Marshall Islands', 'Îles Marshall', 0),
(166, '585', 'PW', 'PLW', 'Palau', 'Palaos', 0),
(167, '586', 'PK', 'PAK', 'Pakistan', 'Pakistan', 0),
(168, '591', 'PA', 'PAN', 'Panama', 'Panama', 0),
(169, '598', 'PG', 'PNG', 'Papua New Guinea', 'Papouasie-Nouvelle-Guinée', 0),
(170, '600', 'PY', 'PRY', 'Paraguay', 'Paraguay', 0),
(171, '604', 'PE', 'PER', 'Peru', 'Pérou', 0),
(172, '608', 'PH', 'PHL', 'Philippines', 'Philippines', 0),
(173, '612', 'PN', 'PCN', 'Pitcairn', 'Pitcairn', 0),
(174, '616', 'PL', 'POL', 'Poland', 'Pologne', 0),
(175, '620', 'PT', 'PRT', 'Portugal', 'Portugal', 0),
(176, '624', 'GW', 'GNB', 'Guinea-Bissau', 'Guinée-Bissau', 1),
(177, '626', 'TL', 'TLS', 'Timor-Leste', 'Timor-Leste', 0),
(178, '630', 'PR', 'PRI', 'Puerto Rico', 'Porto Rico', 0),
(179, '634', 'QA', 'QAT', 'Qatar', 'Qatar', 0),
(180, '638', 'RE', 'REU', 'Réunion', 'Réunion', 0),
(181, '642', 'RO', 'ROU', 'Romania', 'Roumanie', 0),
(182, '643', 'RU', 'RUS', 'Russian Federation', 'Fédération de Russie', 0),
(183, '646', 'RW', 'RWA', 'Rwanda', 'Rwanda', 0),
(184, '654', 'SH', 'SHN', 'Saint Helena', 'Sainte-Hélène', 0),
(185, '659', 'KN', 'KNA', 'Saint Kitts and Nevis', 'Saint-Kitts-et-Nevis', 0),
(186, '660', 'AI', 'AIA', 'Anguilla', 'Anguilla', 0),
(187, '662', 'LC', 'LCA', 'Saint Lucia', 'Sainte-Lucie', 0),
(188, '666', 'PM', 'SPM', 'Saint-Pierre and Miquelon', 'Saint-Pierre-et-Miquelon', 0),
(189, '670', 'VC', 'VCT', 'Saint Vincent and the Grenadines', 'Saint-Vincent-et-les Grenadines', 0),
(190, '674', 'SM', 'SMR', 'San Marino', 'Saint-Marin', 0),
(191, '678', 'ST', 'STP', 'Sao Tome and Principe', 'Sao Tomé-et-Principe', 0),
(192, '682', 'SA', 'SAU', 'Saudi Arabia', 'Arabie Saoudite', 0),
(193, '686', 'SN', 'SEN', 'Senegal', 'Sénégal', 1),
(194, '690', 'SC', 'SYC', 'Seychelles', 'Seychelles', 0),
(195, '694', 'SL', 'SLE', 'Sierra Leone', 'Sierra Leone', 0),
(196, '702', 'SG', 'SGP', 'Singapore', 'Singapour', 0),
(197, '703', 'SK', 'SVK', 'Slovakia', 'Slovaquie', 0),
(198, '704', 'VN', 'VNM', 'Vietnam', 'Viet Nam', 0),
(199, '705', 'SI', 'SVN', 'Slovenia', 'Slovénie', 0),
(200, '706', 'SO', 'SOM', 'Somalia', 'Somalie', 0),
(201, '710', 'ZA', 'ZAF', 'South Africa', 'Afrique du Sud', 0),
(202, '716', 'ZW', 'ZWE', 'Zimbabwe', 'Zimbabwe', 0),
(203, '724', 'ES', 'ESP', 'Spain', 'Espagne', 0),
(204, '732', 'EH', 'ESH', 'Western Sahara', 'Sahara Occidental', 0),
(205, '736', 'SD', 'SDN', 'Sudan', 'Soudan', 0),
(206, '740', 'SR', 'SUR', 'Suriname', 'Suriname', 0),
(207, '744', 'SJ', 'SJM', 'Svalbard and Jan Mayen', 'Svalbard etÎle Jan Mayen', 0),
(208, '748', 'SZ', 'SWZ', 'Swaziland', 'Swaziland', 0),
(209, '752', 'SE', 'SWE', 'Sweden', 'Suède', 0),
(210, '756', 'CH', 'CHE', 'Switzerland', 'Suisse', 0),
(211, '760', 'SY', 'SYR', 'Syrian Arab Republic', 'République Arabe Syrienne', 0),
(212, '762', 'TJ', 'TJK', 'Tajikistan', 'Tadjikistan', 0),
(213, '764', 'TH', 'THA', 'Thailand', 'Thaïlande', 0),
(214, '768', 'TG', 'TGO', 'Togo', 'Togo', 1),
(215, '772', 'TK', 'TKL', 'Tokelau', 'Tokelau', 0),
(216, '776', 'TO', 'TON', 'Tonga', 'Tonga', 0),
(217, '780', 'TT', 'TTO', 'Trinidad and Tobago', 'Trinité-et-Tobago', 0),
(218, '784', 'AE', 'ARE', 'United Arab Emirates', 'Émirats Arabes Unis', 0),
(219, '788', 'TN', 'TUN', 'Tunisia', 'Tunisie', 0),
(220, '792', 'TR', 'TUR', 'Turkey', 'Turquie', 0),
(221, '795', 'TM', 'TKM', 'Turkmenistan', 'Turkménistan', 0),
(222, '796', 'TC', 'TCA', 'Turks and Caicos Islands', 'Îles Turks et Caïques', 0),
(223, '798', 'TV', 'TUV', 'Tuvalu', 'Tuvalu', 0),
(224, '800', 'UG', 'UGA', 'Uganda', 'Ouganda', 0),
(225, '804', 'UA', 'UKR', 'Ukraine', 'Ukraine', 0),
(226, '807', 'MK', 'MKD', 'The Former Yugoslav Republic of Macedonia', 'L\'ex-République Yougoslave de Macédoine', 0),
(227, '818', 'EG', 'EGY', 'Egypt', 'Égypte', 0),
(228, '826', 'GB', 'GBR', 'United Kingdom', 'Royaume-Uni', 0),
(229, '833', 'IM', 'IMN', 'Isle of Man', 'Île de Man', 0),
(230, '834', 'TZ', 'TZA', 'United Republic Of Tanzania', 'République-Unie de Tanzanie', 0),
(231, '840', 'US', 'USA', 'United States', 'États-Unis', 0),
(232, '850', 'VI', 'VIR', 'U.S. Virgin Islands', 'Îles Vierges des États-Unis', 0),
(233, '854', 'BF', 'BFA', 'Burkina Faso', 'Burkina Faso', 1),
(234, '858', 'UY', 'URY', 'Uruguay', 'Uruguay', 0),
(235, '860', 'UZ', 'UZB', 'Uzbekistan', 'Ouzbékistan', 0),
(236, '862', 'VE', 'VEN', 'Venezuela', 'Venezuela', 0),
(237, '876', 'WF', 'WLF', 'Wallis and Futuna', 'Wallis et Futuna', 0),
(238, '882', 'WS', 'WSM', 'Samoa', 'Samoa', 0),
(239, '887', 'YE', 'YEM', 'Yemen', 'Yémen', 0),
(240, '891', 'CS', 'SCG', 'Serbia and Montenegro', 'Serbie-et-Monténégro', 0),
(241, '894', 'ZM', 'ZMB', 'Zambia', 'Zambie', 0);

-- --------------------------------------------------------

--
-- Structure de la table `personnels`
--

CREATE TABLE `personnels` (
  `id` int(11) NOT NULL,
  `personne` int(11) NOT NULL,
  `profession` int(11) NOT NULL,
  `situation_matrimoniale` int(11) NOT NULL,
  `num_cnss` text DEFAULT NULL,
  `enfant` int(11) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personnels`
--

INSERT INTO `personnels` (`id`, `personne`, `profession`, `situation_matrimoniale`, `num_cnss`, `enfant`, `created_at`, `updated_at`) VALUES
(2, 11, 0, 1, NULL, 0, '2022-11-22', '2022-11-22'),
(3, 12, 0, 1, '0003', 0, '2022-11-22', '2022-11-22'),
(4, 13, 0, 1, '0003', 0, '2022-11-22', '2022-11-22'),
(5, 14, 1, 3, NULL, 0, '2022-11-22', '2022-11-23'),
(6, 15, 2, 1, '0003', 0, '2022-11-22', '2022-11-22'),
(7, 16, 0, 1, NULL, 2, '2022-11-23', '2022-11-23');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE `personnes` (
  `id` int(11) NOT NULL,
  `nom_complet` text NOT NULL,
  `date_naissance` text NOT NULL,
  `lieu_naissance` text NOT NULL,
  `sexe` int(11) NOT NULL,
  `nationalite` int(11) NOT NULL,
  `adresse` text DEFAULT NULL,
  `email` text NOT NULL,
  `telephone1` text NOT NULL,
  `telephone2` text DEFAULT NULL,
  `groupe_sanguin` int(11) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `type_piece` int(11) NOT NULL,
  `num_piece` text NOT NULL,
  `date_etablissement` date NOT NULL,
  `date_expire` date NOT NULL,
  `lieu_etablissement` text NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`id`, `nom_complet`, `date_naissance`, `lieu_naissance`, `sexe`, `nationalite`, `adresse`, `email`, `telephone1`, `telephone2`, `groupe_sanguin`, `photo`, `type_piece`, `num_piece`, `date_etablissement`, `date_expire`, `lieu_etablissement`, `updated_at`, `created_at`) VALUES
(2, 'Ki Yves Thierry', '1993-02-23', 'ouagadougou', 1, 1, NULL, 'ki@yves.com', '0000222', NULL, 6, 'uploads/personnes/photos/11-16-22-12-21-491668601309.jpg', 1, 'B45555', '2022-11-22', '2022-11-23', 'Banfora', '2022-11-16', '2022-11-16'),
(3, 'Ki willy', '2022-11-29', 'Ouaga', 1, 233, NULL, 'email@email.com', '000000', NULL, 1, 'uploads/personnes/photos/11-16-22-01-07-521668604072.jpg', 2, 'RRR000022', '2022-04-14', '2022-11-29', 'Ouagadougou', '2022-11-16', '2022-11-16'),
(4, 'Ouedraogo Rodigues', '2022-11-18', 'Ouahigouya', 1, 233, NULL, 'email@email.com', '00000000', NULL, 4, 'uploads/personnes/photos/11-17-22-01-07-181668690438.jpg', 1, 'B45555', '2022-11-18', '2022-11-18', 'ONI BF', '2022-11-17', '2022-11-17'),
(11, 'Ouattara Issa', '2022-11-23', 'Bobo', 1, 1, NULL, 'hhhh@hh', '0000222', NULL, 1, 'uploads/personnes/photos/11-22-22-08-55-441669150544.jpg', 1, 'RRR000022', '2022-11-24', '2022-11-15', 'Ouagadougou', '2022-11-22', '2022-11-22'),
(12, 'traore seydou daouda', '2022-11-23', 'Ouahigouya', 1, 151, NULL, 'secretaire@secretaire', '000000', '11111', 9, 'uploads/personnes/photos/11-22-22-09-16-431669151803.jpg', 1, 'RRR000022', '2022-11-24', '2022-11-28', 'Banfora', '2022-11-22', '2022-11-22'),
(13, 'traore seydou daouda', '2022-11-23', 'Ouahigouya', 1, 151, NULL, 'secretaire@secretaire', '000000', '11111', 9, 'uploads/personnes/photos/11-22-22-09-17-181669151838.jpg', 1, 'RRR000022', '2022-11-24', '2022-11-28', 'Banfora', '2022-11-22', '2022-11-22'),
(14, 'Ouedraogo Rodigues', '2022-11-23', 'Ouahigouya', 1, 1, NULL, 'secretaire@secretaire', '000000', '11111', 9, 'uploads/personnes/photos/11-23-22-09-27-191669195639.PNG', 1, 'RRR000022', '2022-11-24', '2022-11-28', 'Banfora', '2022-11-23', '2022-11-22'),
(15, 'traore seydou daouda', '2022-11-23', 'Ouahigouya', 1, 151, NULL, 'secretaire@secretaire', '000000', '11111', 9, 'uploads/personnes/photos/11-22-22-09-18-301669151910.jpg', 1, 'RRR000022', '2022-11-24', '2022-11-28', 'Banfora', '2022-11-22', '2022-11-22'),
(16, 'Bassole Didier', '2022-11-17', 'Reo', 1, 1, NULL, 'email@email.com', '77777777', NULL, 1, 'uploads/personnes/photos/11-23-22-10-47-211669200441.PNG', 1, 'B753333', '2022-11-16', '2022-11-15', 'oni bf', '2022-11-23', '2022-11-23');

-- --------------------------------------------------------

--
-- Structure de la table `professions`
--

CREATE TABLE `professions` (
  `id` int(11) NOT NULL,
  `libelle` text DEFAULT NULL,
  `code` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `professions`
--

INSERT INTO `professions` (`id`, `libelle`, `code`, `description`, `updated_at`, `created_at`) VALUES
(1, 'neant', NULL, 'Soin infirmier', '2022-11-15', '2022-11-15'),
(2, 'dentiste', NULL, 'chirurgie dentaire', '2022-11-15', '2022-11-15');

-- --------------------------------------------------------

--
-- Structure de la table `repartition_academiques`
--

CREATE TABLE `repartition_academiques` (
  `id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `code` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `repartition_academiques`
--

INSERT INTO `repartition_academiques` (`id`, `libelle`, `code`, `description`, `updated_at`, `created_at`) VALUES
(1, 'Semestre 1', 'S1', 'Premiere partie de l\'annee academique', '2022-11-17', '2022-11-17'),
(2, 'Semestre 2', 'S2', 'Deuxième partie de l’année académique', '2022-11-17', '2022-11-17'),
(3, 'Semestre 3', 'S3', NULL, '2022-11-27', '2022-11-27'),
(4, 'Semestre 4', 'S 4', NULL, '2022-11-27', '2022-11-27');

-- --------------------------------------------------------

--
-- Structure de la table `repondants`
--

CREATE TABLE `repondants` (
  `id` int(11) NOT NULL,
  `personne` int(11) NOT NULL,
  `nom_complet_repondant` text NOT NULL,
  `adresse_repondant` text DEFAULT NULL,
  `telephone_repondant` text NOT NULL,
  `email_repondant` text DEFAULT NULL,
  `profession_repondant` text DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `repondants`
--

INSERT INTO `repondants` (`id`, `personne`, `nom_complet_repondant`, `adresse_repondant`, `telephone_repondant`, `email_repondant`, `profession_repondant`, `updated_at`, `created_at`) VALUES
(2, 2, 'Ki Willy Alfred', 'BBB', '22222', 'email@email.com', 'Trader', '2022-11-16', '2022-11-16'),
(3, 3, 'Ki Ali', NULL, '22222', NULL, 'Fonctionnaire', '2022-11-16', '2022-11-16'),
(4, 4, 'Ouedraogo Albert', NULL, '111111', NULL, 'Enseignant', '2022-11-17', '2022-11-17');

-- --------------------------------------------------------

--
-- Structure de la table `reponse_binaires`
--

CREATE TABLE `reponse_binaires` (
  `id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `code` text DEFAULT NULL,
  `valeur` tinyint(1) DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reponse_binaires`
--

INSERT INTO `reponse_binaires` (`id`, `libelle`, `code`, `valeur`, `updated_at`, `created_at`) VALUES
(1, 'Oui', 'True', 1, '0000-00-00', '0000-00-00'),
(2, 'Non', 'False', 0, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `sexes`
--

CREATE TABLE `sexes` (
  `id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sexes`
--

INSERT INTO `sexes` (`id`, `libelle`, `updated_at`, `created_at`) VALUES
(1, 'Masculin', '0000-00-00', '0000-00-00'),
(2, 'Feminin', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `situation_matrimoniales`
--

CREATE TABLE `situation_matrimoniales` (
  `id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `description` text DEFAULT NULL,
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `situation_matrimoniales`
--

INSERT INTO `situation_matrimoniales` (`id`, `libelle`, `description`, `updated_at`, `created_at`) VALUES
(1, 'celibataire', NULL, '0000-00-00', '0000-00-00'),
(2, 'Marie(e)', NULL, '0000-00-00', '0000-00-00'),
(3, 'Divorce(e)', NULL, '0000-00-00', '0000-00-00'),
(4, 'Veuf(Veuve)', NULL, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `specialites`
--

CREATE TABLE `specialites` (
  `id` int(11) NOT NULL,
  `type_formation` int(11) NOT NULL,
  `annee_academique` int(11) NOT NULL,
  `orientation` int(11) NOT NULL,
  `responsable` int(11) NOT NULL COMMENT 'stocke id personne ',
  `filiere` int(11) NOT NULL,
  `montant` int(11) DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL,
  `Code` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `specialites`
--

INSERT INTO `specialites` (`id`, `type_formation`, `annee_academique`, `orientation`, `responsable`, `filiere`, `montant`, `updated_at`, `created_at`, `Code`, `description`) VALUES
(4, 1, 1, 1, 16, 6, 2000000, '2022-11-28', '2022-11-27', NULL, 'RECHERCHE'),
(6, 1, 1, 2, 16, 5, NULL, '2023-03-27', '2022-12-09', 'BB', 'Professionnel'),
(7, 3, 1, 2, 16, 7, NULL, '2023-03-27', '2023-03-27', NULL, NULL),
(8, 2, 1, 3, 11, 11, 20000, '2023-04-06', '2023-04-06', NULL, NULL),
(9, 1, 3, 2, 16, 7, NULL, '2023-05-17', '2023-05-17', '4', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `statuts`
--

CREATE TABLE `statuts` (
  `id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `code` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `statuts`
--

INSERT INTO `statuts` (`id`, `libelle`, `code`, `description`, `updated_at`, `created_at`) VALUES
(1, 'indefini', NULL, NULL, '0000-00-00', '0000-00-00'),
(2, 'actif', NULL, NULL, '0000-00-00', '0000-00-00'),
(3, 'non actif', NULL, NULL, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `type_affectation_enseignants`
--

CREATE TABLE `type_affectation_enseignants` (
  `id` int(11) NOT NULL,
  `libelle` text DEFAULT NULL,
  `code` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_affectation_enseignants`
--

INSERT INTO `type_affectation_enseignants` (`id`, `libelle`, `code`, `description`, `updated_at`, `created_at`) VALUES
(1, 'pricipal', NULL, NULL, '0000-00-00', '0000-00-00'),
(2, 'reserve', 'reserve', NULL, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `type_bourses`
--

CREATE TABLE `type_bourses` (
  `id` int(11) NOT NULL,
  `libelle` text DEFAULT NULL,
  `code` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `total` tinyint(1) DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_bourses`
--

INSERT INTO `type_bourses` (`id`, `libelle`, `code`, `description`, `total`, `updated_at`, `created_at`) VALUES
(1, 'Aucune', 'Aucune', NULL, 2, '0000-00-00', '0000-00-00'),
(2, 'Bourse Totale', 'BT', 'Prends en charge tous les frais', 1, '2022-11-15', '2022-11-15'),
(3, 'Bourse partielle', 'BP', 'Couvre les frais a hauteur de 300.000 F', 2, '2022-11-15', '2022-11-15');

-- --------------------------------------------------------

--
-- Structure de la table `type_depenses`
--

CREATE TABLE `type_depenses` (
  `id` int(11) NOT NULL,
  `signe` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `code` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_depenses`
--

INSERT INTO `type_depenses` (`id`, `signe`, `libelle`, `code`, `description`, `updated_at`, `created_at`) VALUES
(1, 1, 'Entree', 'Debit', NULL, '0000-00-00', '0000-00-00'),
(2, -1, 'Sortie', 'Credit', NULL, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `type_element_scolarites`
--

CREATE TABLE `type_element_scolarites` (
  `id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `code` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_element_scolarites`
--

INSERT INTO `type_element_scolarites` (`id`, `libelle`, `code`, `description`, `updated_at`, `created_at`) VALUES
(1, 'Total', NULL, NULL, '2022-11-20', '2022-11-20'),
(2, 'Partielle', NULL, NULL, '2022-11-20', '2022-11-20');

-- --------------------------------------------------------

--
-- Structure de la table `type_enseignants`
--

CREATE TABLE `type_enseignants` (
  `id` int(11) NOT NULL,
  `code` text DEFAULT NULL,
  `libelle` text NOT NULL,
  `description` text DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_enseignants`
--

INSERT INTO `type_enseignants` (`id`, `code`, `libelle`, `description`, `updated_at`, `created_at`) VALUES
(1, 'PM', 'Permanent', 'Enseignant assigne a l\'universite', '2022-11-14', '2022-11-14'),
(3, 'VC', 'Vacataire', 'Enseignant non permanent', '2022-11-14', '2022-11-14');

-- --------------------------------------------------------

--
-- Structure de la table `type_formations`
--

CREATE TABLE `type_formations` (
  `id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `code` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_formations`
--

INSERT INTO `type_formations` (`id`, `libelle`, `code`, `description`, `updated_at`, `created_at`) VALUES
(1, 'FORMATION DE BASE', 'FB', NULL, '2022-11-21', '2022-11-21'),
(2, 'FORMATION SPECIALISEE', 'FS', NULL, '2022-11-21', '2022-11-21'),
(3, 'FORMATION CONTINUE CERTIFIANTE', 'FCC', NULL, '2022-11-21', '2022-11-21'),
(4, 'ETUDES DOCTORALES', 'ED', NULL, '2022-11-21', '2022-11-21');

-- --------------------------------------------------------

--
-- Structure de la table `type_pieces`
--

CREATE TABLE `type_pieces` (
  `id` int(11) NOT NULL,
  `libelle` text DEFAULT NULL,
  `code` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_pieces`
--

INSERT INTO `type_pieces` (`id`, `libelle`, `code`, `description`, `updated_at`, `created_at`) VALUES
(1, 'CNIB', 'cnib', 'Carte d’identité Burkinabe', '2022-11-15', '2022-11-15'),
(2, 'Passport', 'passport', 'Passport', '2022-11-15', '2022-11-15'),
(4, 'Extrait de naissance', 'Extrait de naissance', NULL, '0000-00-00', '0000-00-00'),
(5, 'Permis de conduire', 'Permis de conduire', NULL, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `unite_enseignements`
--

CREATE TABLE `unite_enseignements` (
  `id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `code` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `unite_enseignements`
--

INSERT INTO `unite_enseignements` (`id`, `libelle`, `code`, `description`, `updated_at`, `created_at`) VALUES
(1, 'GESTION ET MANAGEMENT', 'GEM', 'GESTION ET MANAGEMENT', '2022-11-23', '2022-11-23'),
(2, 'QUALITOLOGIE DES MEDICAMENTS', 'QUM', 'QUALITOLOGIE DES MEDICAMENTS', '2022-11-23', '2022-11-23'),
(3, 'NOTION DE SANTE PUBLIQUE ET SYSTEMES DE  SANTE', 'NSP', 'NOTION DE SANTE PUBLIQUE ET SYSTEMES DE  SANTE', '2022-11-23', '2022-11-23'),
(4, 'PRATIQUES REGLEMENTAIRES EN MATIERE DE QUALITE', 'PRM', 'PRATIQUES REGLEMENTAIRES EN MATIERE DE QUALITE', '2022-11-23', '2022-11-23'),
(5, 'FONDEMENTS EN PHARMACOLOGIE', 'FOP', 'FONDEMENTS EN PHARMACOLOGIE', '2022-11-23', '2022-11-23'),
(6, 'CONCEPTS DE BASE EN TOXICOLOGIE', 'PRT', 'CONCEPTS DE BASE EN TOXICOLOGIE', '2022-11-23', '2022-11-23'),
(7, 'FONDEMENTAUX DU CONTROLE DE QUALITE', 'FCQ', 'FONDEMENTAUX DU CONTROLE DE QUALITE', '2022-11-23', '2022-11-23'),
(8, 'PRODUITS COSMETIQUES', 'PRC', 'PRODUITS COSMETIQUES', '2022-11-23', '2022-11-23'),
(9, 'GESTION DES APPROVISONNEMENTS', 'GEA', 'GESTION DES APPROVISONNEMENTS', '2022-11-23', '2022-11-23'),
(10, 'PROCEDURES EN PHARMACOTHERAPIE /PHARMACIE CLINIQUE', 'PPC', 'PROCEDURES EN PHARMACOTHERAPIE /PHARMACIE CLINIQUE', '2022-11-23', '2022-11-23'),
(11, 'DROIT DE LA SANTE', 'DOS', 'DROIT DE LA SANTE', '2022-11-23', '2022-11-23'),
(12, 'PRISE EN CHARGE DES INTOXICATIONS AIGUES', 'PIA', 'PRISE EN CHARGE DES INTOXICATIONS AIGUES', '2022-11-23', '2022-11-23'),
(13, 'MEDECINE ET PHARMACOPEE TRADITIONNELLE', 'MPT', 'MEDECINE ET PHARMACOPEE TRADITIONNELLE', '2022-11-23', '2022-11-23'),
(14, 'PRATIQUES DE LABORATOIRE', 'PRL', 'PRATIQUES DE LABORATOIRE', '2022-11-23', '2022-11-23'),
(15, 'BIOPHARMACIE ET SYSTEMES INNOVANTS D’ADMINISTRATION DES MEDICAMENTS', 'BSI', 'BIOPHARMACIE ET SYSTEMES INNOVANTS D’ADMINISTRATION DES MEDICAMENTS', '2022-11-23', '2022-11-23'),
(16, 'DERMATOLOGIE APPLIQUEE A LA COSMETOLOGIE', 'DAC', 'DERMATOLOGIE APPLIQUEE A LA COSMETOLOGIE', '2022-11-23', '2022-11-23'),
(17, 'VIGILANCES THERAPEUTIQUES ET SURVEILLANCE DU MARCHE', 'VTS', 'VIGILANCES THERAPEUTIQUES ET SURVEILLANCE DU MARCHE', '2022-11-23', '2022-11-23'),
(19, 'PRATIQUE DE VIGILANCES THERAPEUTIQUES ET D\'USAGE RATIONNEL', 'PVT', 'PRATIQUE DE VIGILANCES THERAPEUTIQUES ET D\'USAGE RATIONNEL', '2022-11-23', '2022-11-23'),
(20, 'ANALYTIQUES  TOXICOLOGIQUES', 'ANT', 'ANALYTIQUES  TOXICOLOGIQUES', '2022-11-23', '2022-11-23'),
(21, 'MATIERE PREMIERES  VEGETALE', 'MPV', 'MATIERE PREMIERES  VEGETALE', '2022-11-23', '2022-11-23'),
(22, 'MANAGEMENT DU CONTROLE DE QUALITE', 'MCQ', 'MANAGEMENT DU CONTROLE DE QUALITE', '2022-11-23', '2022-11-23'),
(23, 'INGENIERIE PHARMACEUTIQUE', 'INP', 'INGENIERIE PHARMACEUTIQUE', '2022-11-23', '2022-11-23'),
(24, 'PRATIQUES EN DERMOCOSMETOLOGIE ET EN ESTHETIQUE', 'PDE', 'PRATIQUES EN DERMOCOSMETOLOGIE ET EN ESTHETIQUE', '2022-11-23', '2022-11-23'),
(25, 'LOGISTIQUE DE SANTE', 'LOS', 'LOGISTIQUE DE SANTE', '2022-11-23', '2022-11-23'),
(26, 'TECHNOLOGIES PHARMACEUTIQUES ET HOSPITALIERES', 'TPH', 'TECHNOLOGIES PHARMACEUTIQUES ET HOSPITALIERES', '2022-11-23', '2022-11-23'),
(27, 'SIGNALISATIONS CELLULAIRES ET MOLECULAIRES ET ANALYTIQUE PHARMACOLOGIQUE', 'SCM', 'SIGNALISATIONS CELLULAIRES ET MOLECULAIRES ET ANALYTIQUE PHARMACOLOGIQUE', '2022-11-23', '2022-11-23'),
(28, 'REGLEMENTATION ET LICENCES PHARMACEUTIQUES', 'RCP', 'REGLEMENTATION ET LICENCES PHARMACEUTIQUES', '2022-11-23', '2022-11-23'),
(29, 'SUPPORTS BIOLOGIQUES D’ACTIONS DES TOXIQUES ET INVESTIGATIONS TOXICOLOGIQUES', 'SBA', 'SUPPORTS BIOLOGIQUES D’ACTIONS DES TOXIQUES ET INVESTIGATIONS TOXICOLOGIQUES', '2022-11-23', '2022-11-23'),
(30, 'TECHNOLOGIE PHARMACEUTIQUE APPLIQUEE AU DEVELOPPEMENT DES PHYTOMEDICAMENTS', 'TPA', 'TECHNOLOGIE PHARMACEUTIQUE APPLIQUEE AU DEVELOPPEMENT DES PHYTOMEDICAMENTS', '2022-11-23', '2022-11-23'),
(31, 'HYGIENE HOSPITALIERE', 'HYH', 'HYGIENE HOSPITALIERE', '2022-11-23', '2022-11-23'),
(32, 'INVESTIGATIONS PHARMACOLOGIQUES', 'IPC', 'INVESTIGATIONS PHARMACOLOGIQUES', '2022-11-23', '2022-11-23'),
(33, 'RISQUES TOXICOLOGIQUES EN MILIEU DE TRAVAIL', 'RTM', 'RISQUES TOXICOLOGIQUES EN MILIEU DE TRAVAIL', '2022-11-23', '2022-11-23'),
(34, 'PHYTOTHERAPIE', 'PHY', 'PHYTOTHERAPIE', '2022-11-23', '2022-11-23'),
(35, 'STAGE ET MEMOIRE', 'STM', 'STAGE ET MEMOIRE', '2022-11-23', '2022-11-23'),
(36, 'CONCEPTS EN PHARMACOTHERAPEUTIQUE ET PHARMACOLOGIE', 'CPP', 'CONCEPTS EN PHARMACOTHERAPEUTIQUE ET PHARMACOLOGIE', '2022-11-23', '2022-11-23'),
(37, 'ANGLAIS SCIENTIFIQUE  ET BIO-INFORMATIQUE', 'ASB', 'ANGLAIS SCIENTIFIQUE  ET BIO-INFORMATIQUE', '2022-11-23', '2022-11-23'),
(38, 'METHODOLOGIE DE LA RECHERCHE', 'MER', 'MÉTHODOLOGIE DE LA RECHERCHE', '2022-11-23', '2022-11-23'),
(39, 'GESTION DU RISQUE TOXICOLOGIQUE EN MILIEU DE TRAVAIL', 'GRT', 'GESTION DU RISQUE TOXICOLOGIQUE EN MILIEU DE TRAVAIL', '2022-11-23', '2022-11-23'),
(40, 'VIGILANCES EN MILIEU DU TRAVAIL', 'VMT', 'VIGILANCES EN MILIEU DU TRAVAIL', '2022-11-23', '2022-11-23'),
(41, 'ANALYTIQUE TOXICOLOGIQUE EN MILIEU PROFESSIONNEL', 'ATM', 'ANALYTIQUE TOXICOLOGIQUE EN MILIEU PROFESSIONNEL', '2022-11-23', '2022-11-23'),
(42, 'RECHERCHE-DEVELOPPEMENT DES PHYTOMÉDICAMENTS', 'RDP', 'RECHERCHE-DEVELOPPEMENT DES PHYTOMÉDICAMENTS', '2022-11-23', '2022-11-23'),
(43, 'TECHNOLOGIES INDUSTRIELLES (PHARMACOTECHNIE)', 'TIP', 'TECHNOLOGIES INDUSTRIELLES (PHARMACOTECHNIE)', '2022-11-23', '2022-11-23'),
(44, 'RECHERCHE-DEVELOPPEMENT DES PHYTOMÉDICAMENTS', 'RDP', 'RECHERCHE-DEVELOPPEMENT DES PHYTOMÉDICAMENTS', '2022-11-23', '2022-11-23');

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE `villes` (
  `id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `code` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `villes`
--

INSERT INTO `villes` (`id`, `libelle`, `code`, `description`, `updated_at`, `created_at`) VALUES
(1, 'Ouagadougou', 'Ouagadougou', NULL, '2022-11-29', '2022-11-29'),
(2, 'Bobo Dioulasso', 'Bobo', NULL, '2022-11-29', '2022-11-29'),
(3, 'Koudougou', 'Koudougou', NULL, '2022-11-29', '2022-11-29'),
(4, 'Dedougou', 'Dedougou', NULL, '2022-11-29', '2022-11-29'),
(5, 'Banfora', 'Banfora', NULL, '2022-11-29', '2022-11-29');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `affectation_enseignants`
--
ALTER TABLE `affectation_enseignants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `annee_academiques`
--
ALTER TABLE `annee_academiques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `diplomes`
--
ALTER TABLE `diplomes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `dossiers`
--
ALTER TABLE `dossiers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `element_constitutifs`
--
ALTER TABLE `element_constitutifs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `element_scolarites`
--
ALTER TABLE `element_scolarites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `enseignants`
--
ALTER TABLE `enseignants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `export_notes`
--
ALTER TABLE `export_notes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `filieres`
--
ALTER TABLE `filieres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `frais_inscriptions`
--
ALTER TABLE `frais_inscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groupe_sanguins`
--
ALTER TABLE `groupe_sanguins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mentions`
--
ALTER TABLE `mentions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `module_specialites`
--
ALTER TABLE `module_specialites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `niveaux`
--
ALTER TABLE `niveaux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orientations`
--
ALTER TABLE `orientations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paiement_etudiants`
--
ALTER TABLE `paiement_etudiants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personnels`
--
ALTER TABLE `personnels`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `professions`
--
ALTER TABLE `professions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `repartition_academiques`
--
ALTER TABLE `repartition_academiques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `repondants`
--
ALTER TABLE `repondants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reponse_binaires`
--
ALTER TABLE `reponse_binaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sexes`
--
ALTER TABLE `sexes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `situation_matrimoniales`
--
ALTER TABLE `situation_matrimoniales`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `specialites`
--
ALTER TABLE `specialites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `statuts`
--
ALTER TABLE `statuts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_affectation_enseignants`
--
ALTER TABLE `type_affectation_enseignants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_bourses`
--
ALTER TABLE `type_bourses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_depenses`
--
ALTER TABLE `type_depenses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_element_scolarites`
--
ALTER TABLE `type_element_scolarites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_enseignants`
--
ALTER TABLE `type_enseignants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_formations`
--
ALTER TABLE `type_formations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_pieces`
--
ALTER TABLE `type_pieces`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `unite_enseignements`
--
ALTER TABLE `unite_enseignements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `affectation_enseignants`
--
ALTER TABLE `affectation_enseignants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `annee_academiques`
--
ALTER TABLE `annee_academiques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `diplomes`
--
ALTER TABLE `diplomes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `dossiers`
--
ALTER TABLE `dossiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `element_constitutifs`
--
ALTER TABLE `element_constitutifs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT pour la table `element_scolarites`
--
ALTER TABLE `element_scolarites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `enseignants`
--
ALTER TABLE `enseignants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `export_notes`
--
ALTER TABLE `export_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `filieres`
--
ALTER TABLE `filieres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `frais_inscriptions`
--
ALTER TABLE `frais_inscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `groupe_sanguins`
--
ALTER TABLE `groupe_sanguins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `mentions`
--
ALTER TABLE `mentions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `module_specialites`
--
ALTER TABLE `module_specialites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `niveaux`
--
ALTER TABLE `niveaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `orientations`
--
ALTER TABLE `orientations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `paiements`
--
ALTER TABLE `paiements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `paiement_etudiants`
--
ALTER TABLE `paiement_etudiants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT pour la table `personnels`
--
ALTER TABLE `personnels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `professions`
--
ALTER TABLE `professions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `repartition_academiques`
--
ALTER TABLE `repartition_academiques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `repondants`
--
ALTER TABLE `repondants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `reponse_binaires`
--
ALTER TABLE `reponse_binaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `sexes`
--
ALTER TABLE `sexes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `situation_matrimoniales`
--
ALTER TABLE `situation_matrimoniales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `specialites`
--
ALTER TABLE `specialites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `statuts`
--
ALTER TABLE `statuts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `type_affectation_enseignants`
--
ALTER TABLE `type_affectation_enseignants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `type_bourses`
--
ALTER TABLE `type_bourses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `type_depenses`
--
ALTER TABLE `type_depenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `type_element_scolarites`
--
ALTER TABLE `type_element_scolarites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `type_enseignants`
--
ALTER TABLE `type_enseignants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `type_formations`
--
ALTER TABLE `type_formations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `type_pieces`
--
ALTER TABLE `type_pieces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `unite_enseignements`
--
ALTER TABLE `unite_enseignements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
