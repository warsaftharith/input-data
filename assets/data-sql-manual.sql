CREATE TABLE `tbl_mahasiswa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `npm` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `tbl_pengguna` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

LOCK TABLES `tbl_mahasiswa` WRITE;
/*!40000 ALTER TABLE `tbl_mahasiswa` DISABLE KEYS */;
INSERT INTO `tbl_mahasiswa` VALUES (14,'202011999','Dito','Pendidikan IPA','sisi@gmail.con','Amerisya usyara'),(15,'20201736639','Bq dina','Pendidikan Informatika','dina@gmail.com','Amerisya usyara'),(16,'20201838749','Warsa','Pendidikan Informatika','warsa@gmail.com','Amerisya usyara'),(17,'123456789','dadidu','Pendidikan Biologi','arts.gourdes.0z@icloud.com','amerisya usyara'),(19,'22233344555121','dadidu','Pendidikan Informatika','arts.gourdes.0z@icloud.com','asd');
/*!40000 ALTER TABLE `tbl_mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;
