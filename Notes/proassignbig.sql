-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2022 at 11:13 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proassignbig`
--

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `weight_theory` int(11) DEFAULT NULL,
  `weight_lab` int(11) DEFAULT NULL,
  `theory_constraint` int(11) DEFAULT NULL,
  `lab_constraint` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`id`, `subject_id`, `year`, `semester`, `teacher_id`, `weight_theory`, `weight_lab`, `theory_constraint`, `lab_constraint`) VALUES
(1, 3, 2022, 8, 1, 70, 30, NULL, NULL),
(2, 4, 2021, 3, 2, 70, 30, NULL, NULL),
(3, 13, 2021, 7, 3, 60, 40, NULL, NULL),
(4, 12, 2022, 6, 3, 70, 30, NULL, NULL),
(6, 1, 2021, 5, 1, 70, 30, NULL, NULL),
(7, 11, 2021, 1, 2, 70, 30, NULL, NULL),
(8, 2, 2022, 8, 1, 70, 30, NULL, NULL),
(9, 10, 2022, 4, 2, 70, 30, NULL, NULL),
(10, 7, 2021, 9, 2, NULL, NULL, NULL, NULL),
(11, 9, 2021, 7, 2, 60, 40, NULL, NULL),
(12, 8, 2022, 2, 2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prerequisite_subjects`
--

CREATE TABLE `prerequisite_subjects` (
  `subject_id` int(11) NOT NULL,
  `prerequisite_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prerequisite_subjects`
--

INSERT INTO `prerequisite_subjects` (`subject_id`, `prerequisite_id`) VALUES
(7, 9),
(9, 7),
(10, 8),
(13, 12);

-- --------------------------------------------------------

--
-- Table structure for table `statement`
--

CREATE TABLE `statement` (
  `id` int(11) NOT NULL,
  `lecture_id` int(11) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `grade_theory` float DEFAULT NULL,
  `grade_lab` float DEFAULT NULL,
  `final_grade` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statement`
--

INSERT INTO `statement` (`id`, `lecture_id`, `student_id`, `grade_theory`, `grade_lab`, `final_grade`) VALUES
(1, 1, '19245', 7, 8, 7.3),
(2, 2, '19108', 7, 8, 7.3),
(3, 3, '19245', 7.5, 8.5, 7.8),
(4, 4, '19108', 7.5, 8.5, 7.8),
(5, 6, '19245', 8, 8, 8),
(6, 7, '19108', 8, 8, 8),
(7, 8, '19245', 6.5, 8.5, 7.1),
(8, 9, '19108', 6.5, 8.5, 7.1),
(9, 10, '19245', 8, 9, 8.3),
(10, 11, '19108', 4, 4, 4),
(11, 12, '19245', 4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `registration_num` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`registration_num`, `name`, `surname`, `year`) VALUES
('19108', 'Konstantinos', 'Lales', 2019),
('19245', 'Georgios', 'Christodoulou', 2019);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `description`) VALUES
(1, 'Baseis dedomenon II', '\r\n\r\nOi foitites meta tin epityxi oloklirosi tou mathimatos:\r\n\r\n    Tha apoktisoun tin ikanotita na antilambanontai proxorimena zitimata se ena SDBD opos i diaxeirisi synallagon, o taytoxronismos kai i beltistopoiisi erotimaton\r\n    Na analyoun to anamenomeno kostos tis epexergasias erotimaton se ena SDBD\r\n    Na katanooun tis basikes arxes sxediasis kai anaptyxis systimaton pou xrisimopoioun baseis dedomenon,\r\n    Tha exoun tin ikanotita na dimiourgoun efarmoges gia mikres kai mesaies epixeiriseis\r\n\r\n'),
(2, ' 	Eyfyi Systimata Systaseon', '\r\n\r\nMe tin epityxi oloklirosi tou mathimatos, o foititis/tria tha mporei:\r\n\r\n    Na katanoei tis dexiotites, ta ergaleia kai tis texnikes pou apaitountai gia tin apotelesmatiki xrisi tis epistimis ton dedomeno\r\n    Na gnorizei texnikes texnitis noimosynis kai methodous gia tin efarmogi eyfyon systimaton systaseon\r\n    Na axiologisei ta ergaleia kai tis texnikes ston tomea tis epistimis ton dedomenon gia systaseis\r\n    Na epilyei problimata me ti xrisi epistimonikon methodon gia tin paroxi systaseon\r\n    Na efarmozei kainotomes texnikes exoryxis dedomenon\r\n    Na efarmozei texnikes mixanikis mathisis gia tin exagogi gnosis apo polyploka kai eterogeni dedomena\r\n    Na syntassei epistimonikes kai texnikes anafores\r\n     \r\n\r\n'),
(3, ' 	Anaktisi Pliroforias', '\r\n\r\nMe tin epityxi oloklirosi tou mathimatos, o foititis/tria tha:\r\n\r\n    Exei tin gnosi na diakrinei ti diafora metaxy anaktisis dedomenon kai anaktisis pliroforias, na analyei tin arxitektoniki enos systimatos anaktisis pliroforias kai na katannoei tis idiotites tou dyadikou, tou dianysmatikou kai tou pithanotikou montelou anaktisis pliroforias.\r\n    Exei tin dexiotita na efarmozei tis pio diadedomenes methodous deiktodotisis, anadrasis xristi kai epektasis erotimatos sta systimata anaktisis pliroforias.\r\n    Exei tin ikanotita na axiologei systimata anaktisis pliroforias kai na katannoei tis idiaiterotites tis anaktisis pliroforias ston Pagkosmio Isto kai tis texnikes web crawling.\r\n\r\n'),
(4, 'Ant. Programmatismos II', '\r\n\r\nParousiazontai kai analyontai ta basika xaraktiristika tis antikeimenostrafous sxediasis me xrisi tis glossas programmatismou Java. Skopos tou mathimatos einai:\r\n\r\n    I apoktisi gnoseon kai sxetikis empeirias oste oi foitites na einai ikanoi na xrisimopoioun me ton prosforotero tropo ta xaraktiristika tis glossas analoga me to problima.\r\n    I katanoisi kai diakrisi metaxy ton diaforetikon xaraktiristikon pou parexontai apo eyreos xrisimopoioumenes glosses antikeimenostrafous programmatismou, opos i C++ kai i Ruby.\r\n\r\nOi basikoi ekpaideytikoi stoxoi tou mathimatos pou antikatoptrizontai se mathisiaka apotelesmata einai:\r\n\r\n    I apoktisi kai i anaptyxi antikeimenostrafous programmatistikis skepsis. Touto symbalei stin exoikeiosi tou foititi me tis ennoies tis antikeimenostrafous sxediasis, anexartita apo tin ekastote platforma kai glossa programmatismou.\r\n    I apoktisi synolikis eikonas - gia to eyreos xrisimopoioumeno simera - periballon programmatismou Java, tis entoles tis glossas, tis dynatotites tis kai ta epimerous xaraktiristika tis (bibliothikes klaseon, domes dedomenon, k.t.l.). Ayto odigei se beltistes epiloges sti fasi tis analysis, tou sxediasmou kai tis ylopoiisis programmatistikon ergasion kai epitrepei ti dimiourgia efarmogon Java gia kathe ypologistiko periballon.\r\n    I kalliergeia tis analytikis antikeimenostafous programmatistikis skepsis kai tis ikanotitas embathynsis. Ayto boithaei stin antimetopisi problimaton pou syxna anakyptoun sti fasi tou sxediasmou kai ylopoiisis syntheton programmatistikon ergasion.\r\n\r\n'),
(7, 'Optikes Epikoinonies', ' Eisagogi stin ennoia ton optikon epikoinonion, optikes ines, eidi optikon inon (monotropes, polytropes, pyritiou, polymeron, bimatikou deikti diathlasis klp), kymatodigisi meso geo- metrikis optikis, exisoseis Maxwell, exisosi Helmholtz, egkarsioi tropoi metadosis stin ina, diaspora (taxytita omadas, kymatodigisis, ylikou), apoleies, eyros zonis, mi-grammikes optikes epidraseis entos tis inas: endofasiki diamorfosi, diamorfosi diastayromenis fasis kai mixi tessaron kymaton. Optikes piges epikoinoniakon systimaton: laser kai LED. Aythormiti kai exanagkasmeni ekpompi, katofli enaysis laser, diamikis tropoi kai typoi laser, thorybos, eyros zonis kathos kai texnikes diamorfosis. Optikoi dektes, kbantiki apo- dosi, thorybos, eyros zonis dekton, eyaisthisia, kyklomata apodiamorfosis kai enisxysis. Sxediasi kai axiologisi epikoinoniakon systimaton diaforon arxitektonikon. Texnikes sxediasis me skopo ti diaxeirisi isxyos, tou xronou anodou, tis diasporas. Analysi symfonon optikon systimaton kai poly-kanalon arxitektonikon.\r\nTo mathima prosferei mias eis bathos eisagogi stis optikes epikoinonies, analyontas toso tis themeliodeis optikes diataxeis (pompoi, dektes meso metaforas pliroforias) oso kai epitrepontas sto foititi na sxediasei realistikes optikes zeyxeis lambanontas ypopsi texnikous periorismous kai arxitektonikes.\r\n\r\nPio analytika me tin epityxi oloklirosi tou mathimatos oi foitites/tries tha\r\n\r\n    exoun ti gnosi na anagnorizoun ta basika meri enos optikou diktyou epikoinonion (pompoi-dektes-meso diadosis), na analyoun sximata diamorfosis stis optikes epikoinonies, ton fysikon mixanismon diadosis tis I/M aktinobolias entos kymatodigon, ton fysikon mixanismon tis exanagkasmenis ekpompis, aythormitis kai aporofisis, tis forasis optikon simaton.\r\n    THa exoun ti dexiotita na ekteloun basikous ypologismous se optikes zeyxeis opos to isozygio isxyos, oi apostaseis metaxy anagenniton-enisxyton, eyresi megistou eyrous zonis kathos kai eyaisthisias dekti. Na ypologizoun kai na antistathmizoun fainomena diasporas.\r\n    tha exoun tin ikanotita na sxediazoun optikes zeyxeis kai na axiologoun ti beltisti arxitektoniki, tis apaitoumenes prodiagrafes sta diafora stoixeia (laser, EDFA, DCF)  \r\n'),
(8, 'Theoria Kyklomaton', '\r\n\r\nSkopos tou sygkekrimenou mathimatos einai na parousiasei stous foitites tou protou etous spoudon tis basikes ennoies tis theorias kyklomaton, dinontas emfasi sta psifiaka ilektronika kyklomata. Oi foitites pou oloklironoun epityxos to mathima tha exoun epideixei:\r\n\r\n    Ikanotita na anagnorizoun kai na anaparistoun sximatika grammika kyklomata.\r\n    Ikanotita na efarmozoun to nomo reymaton kai to nomo taseon tou Kirchhoff, kathos kai to nomo tou Ohm se problimata me kyklomata.\r\n    Ikanotita na katanooun tin ennoia tis tasis enos kombou kyklomatos kai na efarmozoun ti methodo ton kombon gia tin analysi ilektrikon kyklomaton.\r\n     Ikanotita na aplopoioun kyklomata xrisimopoiontas isodynamies stoixeion se seira kai parallila, kathos kai ta isodynama kyklomata kata Thévenin kai Norton.\r\n    Ikanotita katanoisis ton pleonektimaton tis psifiakis epexergasias kai tou pos ayta prokyptoun mesa apo ti xrisi psifiakon kyklomaton.\r\n    Ikanotita na prosdiorizoun ti domi kai na katanooun tin aplousteymeni symperifora (montela S, SR kai SRC) ton tranzistor epidrasis pediou MOS (MOS Field Effect Transistors – MOSFETs).\r\n    Ikanotita na sxediazoun psifiakes pyles (toso NMOS, oso kai CMOS) xrisimopoiontas MOSFETs.\r\n    Ikanotita na ypologizoun tis taseis exodou kai ta perithoria thorybou ton psifiakon pylon kai na katanooun ti simasia tous.\r\n     Ikanotita na anagnorizoun kyklomata protis taxis me pyknotes kai pinia.\r\n    Ikanotita na analyoun kyklomata protis taxis kai na problepoun ti symperifora tous.\r\n     Ikanotita na ypologizoun tin kathysterisi psifiakon pylon pou odigoun alles pyles.\r\n     Ikanotita na katanooun tis ennoies tis energeias kai tis isxyos sta psifiaka kyklomata, na diakrinoun metaxy tis statikis kai tis dynamikis katanalosis isxyos, kathos kai na mporoun na tis ypologisoun (kai pali gia tin periptosi mias pylis pou odigei alles pyles).\r\n\r\n'),
(9, 'Psifiakes Epikoinonies', '\r\n\r\nSkopos tou mathimatos apotelei i exoikeiosi ton foititon me ti theoria ton sygxronon psifiakon epikoinonion kathos kai i embathynsi sti filosofia ton psifiakon systimaton epikpinonion. To mathima dinei ti dynatotita stous foitites na anaptyxoun tis ikanotites tous stin axiologisi epidosis ton epikoinoniakon systimaton meso Matlab kai Simulink kai na katanoisoun ti simasia basikon metrikon epidosis psifiakon epikoinoniakon systimaton. Telos, meso tis prosomoiosis sygxronon epikoinoniakon systimaton (psifiaki diamorfosi, kodikopoiisi OFDM, MIMO), oi foitites tha gnorisoun se bathos ton tropo leitourgias tous.\r\n\r\nPio analytika me tin epityxi oloklirosi tou mathimatos, o foititis/tria tha:\r\n\r\n    Exei ti gnosi na analyei tis epidoseis psifiakon systimaton epikoinonion (diasymboliki paremboli, pithanotita sfalmatos, fasmatiki apodosi), na analyei tous periorismous kai ta pleonektimata tis kathe texnikis, na axiologei tin beltisti lysi analoga me tin epidiokomeni efarmogi.\r\n    Exei tin dynatotita na efarmozei analysi pithanotitas sfalmatos ypo tin parousia thorybou gia sximata diamorfosis (PAM,PPM, PSK, QAM), na efarmozei texnikes beltistis forasis.\r\n    Mporei na ylopoiei sximata prosomoiosis enos plirous psifiakou tilepikoinoniakou systimatos, tha ypologizei parametrous opos BER synartisei tis arxitektonikis kai ton xaraktiristikon tou kanaliou.\r\n\r\n'),
(10, 'Hlektroniki', '\r\n\r\nOi foitites pou oloklironoun epityxos to mathima tha exoun epideixei:\r\n\r\n    Ikanotita na anagnorizoun mi grammika ilektrika stoixeia kai kyklomata, kathos kai na ta analyoun efarmozontas diafores methodous, kai sygkekrimena, analytiki epilysi, grafi- ki analysi, tmimatika grammiki analysi (piecewise linear analysis) kai epayxitiki analysi (incremental analysis).\r\n    Ikanotita na katanooun ta xaraktiristika ton imiagogikon diodon kai na pragmatopoi- oun analysi kyklomaton me diodous efarmozontas ti methodo assumed states.\r\n    Ikanotita na katanooun ti realistiki (mi diakoptiki) symperifora ton MOS Field Effect Transistors (MOSFETs) kai na prosdiorizoun to SU (Switch Unified) montelo gia ayta.\r\n    Ikanotita katanoisis tis leitourgias tou MOSFET san enisxyti, tis ennoias tis polosis tou tranzistor kai pos ayti epitygxanetai, kathos kai tis arxis leitourgias tou tranzistor ston koro.\r\n    Ikanotita na efarmozoun ton katallilo typo analysis (megalou i mikrou simatos) gia ton prosdiorismo tis symperiforas ton enisxyton, analoga me to an oi metaboles ton simaton eisodou einai megales i mikres.\r\n    Ikanotita na katanooun tis basikes arxes ton telestikon enisxyton kai na analyoun apla kyklomata me telestikous enisxytes.\r\n    Ikanotita katanoisis ton basikon arxon tis metatropis analogikou simatos se psifi- ako kai psifiakou simatos se analogiko.\r\n\r\n'),
(11, 'Domimenos Programmatismos', '\r\n\r\nMe tin epityxi oloklirosi tou mathimatos, o foititis/tria tha:\r\n\r\n    Exei tin gnosi na analyei programmata grammena sti glossa C kai na katannoei ti domi kai ti leitourgia tous.\r\n    Exei tin dexiotita na efarmozei tis arxes tou domimenou programmatismou gia ton entopismo kai ti diorthosi sfalmaton se programmata tis glossas C.\r\n    Exei tin ikanotita na sxediazei kai na anaptyssei programmata se glossa C.\r\n\r\n'),
(12, 'Asfaleia Pliroforiakon Systimaton', 'Skopos tou mathimatos einai, meta tin oloklirosi ti mathisiakis diadikasias oi foitites kai foititries na exoun katanoisei me plirotita ta themeliodi themata asfaleias pliroforiakon kai epikoinoniakon systimaton kai prostasias tis idiotikotitas, na gnorizoun se bathos themata dioikisis asfaleias pliroforiakon systimaton sto plaisio ton protypon kata ISO 2700X kai na diathetoun basikes gnoseis thematon asfaleias sto Diadiktyo kai stoixeion efarmosmenis kryptografias.\r\n\r\nMe tin epityxi oloklirosi tou mathimatos oi foitites:\r\n\r\n    THa exoun katannoisei basikes ennoies asfaleias kai montela asfaleias.\r\n    THa apoktisoun tin ikanotita efarmogis basikon methodon analysis epikindynotitas kai xrisis kai axiologisis basikis texnologias asfaleias pliroforiakon systimaton.\r\n'),
(13, 'Asfaleia Diktyon Ypologiston kai Epikoinonion', '\r\n\r\nI parousa didaktiki enotita estiazei se eisagogika themata Asfaleias Kiniton kai Asyrmaton Diktyon Epikoinonion. Analytikotera, oi basikoi ekpaideytikoi stoxoi tou mathimatos einai:\r\n\r\n    H apoktisi kai anaptyxi koultouras asfaleias se periballon kiniton kai asyrmaton diktyon epikoinonion.\r\n    H parousiasi kai analysi ton diaforon katigorion apeilon, ton simeion eypatheias, ton antimetron, kai ton methodon diasfalisis stis simantikoteres texnologies asyrmaton kai kypseloton diktyon epikoinonion.\r\n\r\nSe ayto to plaisio, oi foitites gnorizoun ta basika xaraktiristika asfaleias ton kiniton epikoinonion 2is, 3is kai 4is genias, kathos kai ta antistoixa pou anaptyssontai sta asyrmata diktya IEEE 802.11. I deyteri kyria synistosa tou mathimatos anaferetai stin apaitisi tis Idiotikotitas gia tous xristes ton en logo diktyon. Stoxos einai i gnorimia kai exoikeiosi ton foititon kai foititrion me ti sxetiki orologia kai tis basikes texnologies prostasias tis Idiotikotitas se periballon kiniton kai asyrmaton diktyon epikoinonion. O stoxos ton ergastiriakon efarmogon kai meleton periptosis einai na boithisoun tous foitites na mathoun na xrisimopoioun me beltisto tropo tis parapano texnologies asfaleias kai diafylaxis tis Idiotikotitas se periballon kiniton epikoinonion. O pyrinas ton didaktikon stoxon tis parousas enotitas einai i empedosi diaforetikis koultouras kai antilipsis asfaleias kai idiotikotitas se sxesi me to ensyrmato diktyako periballon. Se aytin tin kateythynsi, oi ergasies tou mathimatos ylopoiountai kanontas xrisi tis platformas Google Android i/kai iOS.\r\n\r\nMe tin epityxi oloklirosi tou mathimatos o foititis/tria tha einai se thesi na:\r\n\r\n    Antilambanetai tin idiaiterotita ton asyrmaton kai kiniton diktyon epikoinonion se sxesi me ta ensyrmata diktya se orous asfaleias kai idiotikotitas.\r\n    Gnorizei tis basikes texnologies asfaleias kai prostasias tis idiotikotitas tou xristi pou parexontai apo ta kypselota diktya epikoinonion kai ta asyrmata diktya texnologias IEEE 802.11.\r\n    Exei katanoisei tous basikous typous epitheseon pou mporoun na efarmostoun stous sygkekrimenous typous diktyon.\r\n    Gnorizei tis basikes arxitektonikes ton diktyon aytou tou typou.\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `Id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `rank` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`Id`, `name`, `surname`, `rank`) VALUES
(1, 'Panagiotis ', 'Symeonidis', 'Anaplirotis kathigitis'),
(2, 'Charis', 'Mesaritakis', 'Anaplirotis kathigitis'),
(3, 'Georgios', 'Stergiopoulos', 'Epikouros kathigitis');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `Id` int(11) NOT NULL,
  `Role` varchar(100) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `registration_num_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`login`, `password`, `email`, `Id`, `Role`, `teacher_id`, `registration_num_id`) VALUES
('admin', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', NULL, 1, 'administrator', NULL, NULL),
('ad', '8a9bcf1e51e812d0af8465a8dbcc9f741064bf0af3b3d08e6b0246437c19f7fb', NULL, 2, 'administrator', NULL, NULL),
('administr', '16ff58cc7e1b4252f8cb06c0939eee1f9d16824554a81147756a3d522ab789d4', NULL, 3, 'administrator', NULL, NULL),
('icsd19245', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', NULL, 4, 'student', NULL, '19245'),
('icsd19108', '4e6979372fe9f33255d774e1510b488f920cbd452daa7053eb05b7f126a9a80e', NULL, 5, 'student', NULL, '19108'),
('icsdpanagiotissym', '80ca80809c8a4345ec0427d5902c8311d5f6f829c48f82eda26fd7e74c28394a', NULL, 6, 'Teacher', 1, NULL),
('icsdcharismes', '249ada5d9f8c6717314796bab006b7f45448969273bfd31c7aaf1497ccac3b2e', NULL, 7, 'Teacher', 2, NULL),
('icsdgiorgosster', '249ada5d9f8c6717314796bab006b7f45448969273bfd31c7aaf1497ccac3b2e', NULL, 8, 'Teacher', 3, NULL),
('testuser', 'd5cb55480eb0a54adee678c3f60e47a8444d62a1ee6af701a1905154d67a415a', 'test@aegean.gr', 9, 'admin', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_1` (`subject_id`),
  ADD KEY `teacher_1` (`teacher_id`);

--
-- Indexes for table `prerequisite_subjects`
--
ALTER TABLE `prerequisite_subjects`
  ADD PRIMARY KEY (`subject_id`,`prerequisite_id`),
  ADD KEY `prerequisite_5` (`prerequisite_id`);

--
-- Indexes for table `statement`
--
ALTER TABLE `statement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lecture_2` (`lecture_id`),
  ADD KEY `student_2` (`student_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`registration_num`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `unique login` (`login`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `student_id` (`registration_num_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lecture`
--
ALTER TABLE `lecture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `statement`
--
ALTER TABLE `statement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lecture`
--
ALTER TABLE `lecture`
  ADD CONSTRAINT `subject_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prerequisite_subjects`
--
ALTER TABLE `prerequisite_subjects`
  ADD CONSTRAINT `prerequisite_5` FOREIGN KEY (`prerequisite_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_5` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `statement`
--
ALTER TABLE `statement`
  ADD CONSTRAINT `lecture_2` FOREIGN KEY (`lecture_id`) REFERENCES `lecture` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`registration_num`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `student_id` FOREIGN KEY (`registration_num_id`) REFERENCES `student` (`registration_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
