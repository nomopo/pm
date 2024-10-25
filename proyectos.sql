/*!999999\- enable the sandbox mode */
-- MariaDB dump 10.19  Distrib 10.6.18-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: neomorbius_proyectos
-- ------------------------------------------------------
-- Server version	10.6.18-MariaDB-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `citas`
--

DROP TABLE IF EXISTS `citas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cita` longtext NOT NULL,
  `autor` varchar(255) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citas`
--

LOCK TABLES `citas` WRITE;
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
INSERT INTO `citas` VALUES (1,'La vida es nueva cada día','Gregorio Marañón'),(2,'Desde que se cesa de luchar por ella, la vida ya no tiene sabor','Armando Palacios Valdés'),(3,'El arte de vivir consiste en conservar nuestra personalidad sin que la sociedad se incomode','Angel Gabinet'),(4,'El hombre que no piensa sino en vivir, no vive','Sócrates'),(5,'Aprendemos errando','Pietro Metastasio'),(6,'Cita siempre errores propios antes de referirte a los ajenos','Noel Clarasó'),(7,'Carpe Diem','Horacio'),(8,'Si la verdad es nuestro más preciado tesoro, bien haremos en economizarla','Horacio'),(9,'La vida no es un problema para ser resuelto, es un misterio para ser vivido','Anónimo'),(10,'Aquel que tiene un porqué para vivir se puede enfrentar a todos los cómos','Friedrich Nietzsche'),(11,'Lo importante no es tener muchas ideas, sino la idea oportuna en cada caso','Juan Zorrilla'),(12,'Una idea es verdad cuando aún no se ha impuesto',' Eugene Ionesco'),(13,'Las que conducen y arrastran al mundo no son las máquinas, sino las ideas','Víctor Hugo'),(14,'Muchos jóvenes se afanan por ideas y conceptos que tendrán en veinte años','Jean Paul Sartre'),(15,'Hay que intentar que las grandes ideas parezcan pequeñas, superficiales, cotidianas','Fernando Fernán Gomez'),(16,'Es difícil crear ideas y fácil crear palabras; de ahí el éxito de los filósofos','André Maurois'),(17,'Las civilizaciones se forjan con las ideas','Gustave Le Bon'),(18,'Nada hay más peligroso que una idea cuando no se tiene más que una','Alain'),(19,'Donde truena un hecho, ten la certeza de que ha relampagueado una idea','Ippolito Nievo'),(20,'Como los trenes, la buenas ideas llegan con retraso','Giovanni Guareschi'),(21,'Las ideas no duran mucho. Hay que hacer algo con ellas.','Santiago Ramón y Cajal'),(22,'Una de las ventajas de las buenas acciones es la de elevar el alma y disponerla a hacer otras mejores','Jean Jacques Rousseau'),(23,'Terrible es el error cuando usurpa el nombre de la ciencia','Jaime Luciano Balmes'),(24,'Una cosa es saber y otra saber enseñar','Cicerón'),(25,'No basta con alcanzar la sabiduría, es necesario saber utilizarla','Cicerón'),(26,'Lo que quiere el sabio, lo busca en sí mismo; el vulgo, lo busca en los demás','Confucio'),(27,'La mayor sabiduría que existe es conocerse a uno mismo','Galileo Galilei'),(28,'Sacar provecho de un buen consejo exige más sabiduría que darlo','John Churton Collins'),(29,'Se alcanza el éxito convirtiendo cada paso en una meta y cada meta en un paso','C. C. Cortéz'),(30,'No hay secretos para el éxito. Éste se alcanza preparándose, trabajando arduamente y aprendiendo del fracaso','Colin Powell'),(31,'Un tonto nunca se repone de un éxito','Oscar Wilde'),(32,'Más de uno le debe el éxito a su primera esposa, y su segunda esposa a su éxito','Jim Backus'),(33,'El éxito tiene muchos padres, pero el fracaso es huérfano','John Fitzgerald Kennedy'),(34,'Lo realmente importante no es llegar a la cima; sino saber mantenerse en ella','Alfred de Musset'),(35,'El requisito del éxito es la prontitud en las decisiones','Sir Francis Bacon'),(36,'En general, no nos basta con tener éxito; los demás deben fracasar','Maurice Saatchi'),(37,'El éxito no da ni quita la razón a las cosas','Antonio Cánovas del Castillo'),(38,'El éxito es facil de obtener. Lo difícil es merecerlo.','Albert Camus'),(39,'El éxito consiste en vercer el temor al fracaso','Charles Augustin Sainte-Beuve'),(40,'No hay pasión más ilusa y fanática que el odio','George Gordon'),(41,'Sólo le falta el tiempo a quien no sabe aprovecharlo','Jovellanos'),(42,'La alegría cuanto más se gasta, más queda','Ralph Waldo Emerson'),(43,'Se necesitan dos años para aprender a hablar y sesenta para aprender a callar','Ernest Hemingway'),(44,'En la vida hay algo peor que el fracaso: el no haber intentado nada','Franklin D. Roosvelt'),(45,'El éxito no se mide en el dinero, sino en la diferencia que marca en las personas','Michelle Obama'),(46,'Recuerda que eres tan bueno como lo mejor que hayas hecho en tu vida','Billy Wilder'),(47,'Un hoy vale por dos mañanas','Benjamin Franklin'),(48,'Aprendí que no se puede dar marcha atrás, que la esencia de la vida es ir hacia delante','Agatha Christie'),(49,'Tan pronto como uno es feliz, uno se convierte en moralista','Marcel Proust'),(50,'Pregúntate si eres feliz y dejarás de serlo','John Stuart Mill'),(51,'Si deseas que tus sueños se hagan realidad... DESPIERTA','Anónimo'),(52,'Si das pescado a un hombre hambriento lo nutrirás durante una jornada. Si le enseñas a pescar, le nutrirás toda la vida','Lao-Tsé'),(53,'La felicidad es no tener que pensar en ella','Séneca'),(54,'La felicidad está en la libertad, y la libertad en el coraje','Pericles'),(55,'Felicidad es no estar adolorido en el cuerpo ni preocupado en la mente','Thomas Jefferson'),(56,'El hombre que no ha amado apasionadamente ignora la mitad más bella de la vida','Stendhal'),(57,'En materia de amor y desamor somos como recién nacidos toda la vida','Eduard Punset'),(58,'No intentes convertirte en un hombre de éxito, sino en un hombre de valor','Albert Einstein'),(59,'El sabio no dice nunca todo lo que piensa, pero siempre piensa todo lo que dice','Aristóteles'),(60,'Tu tiempo es limitado, no lo malgastes viviendo la vida de otro','Steve Jobs'),(61,'Aferrarse a la ira es como beber veneno y espera que la otra persona muera','Buda'),(62,'Amurallar el propio sufrimiento es arriesgarte a que te devore desde el interior.','Frida Kahlo'),(63,'Reunirse es un comienzo, permanecer juntos es el progreso  trabajar juntos el éxito.','Henry Ford'),(64,'Elije un trabajo que ames y no tendrás que trabajar un día en tu vida','Confucio'),(65,'Se tú, e intenta ser feliz, pero sobre todo, sé tú','Charles Chaplin'),(66,'Nunca permitas que el sentido de la moral te impida hacer lo que está bien','Isaac Asimov'),(67,'No puedes tener una vida positiva y una mente negativa','Joyce Meyer'),(68,'Si caes y te levantas, no caíste. Solo tomaste impulso.','Alejandro Jodorowski'),(69,'La única parte dónde el éxito aparece antes que el trabajo es en el diccionario.','Vidal Sasoon'),(70,'La mejor forma de predecir el futuro es crearlo','Alan Kay'),(71,'La felicidad no es algo hecho. Proviene de tus propias acciones','Dalai Lama'),(72,'Si tú no sabes lo que vales, ve y consigue lo que mereces.','Rocky Balboa'),(73,'Amarse a uno mismo es el comienzo de un romance de toda la vida','Oscar Wilde'),(74,'¿Por qué contentarnos con vivir a rastras cuando sentimos el anhelo de volar?','Hellen Keller'),(75,'La posibilidad de poder realizar un sueño es lo que hace la vida interesante','Paulo Coelho'),(76,'El éxito consiste en ir de fracaso en fracaso sin perder el entusiasmo','Winston Churchill'),(77,'Iré a cualquier parte, siempre y cuando sea hacia delante','Ralph Waldo'),(78,'Cuando dejas de soñar, dejas de vivir','Malcom Forbes'),(79,'Empieza con amplitud, expándete más allá y nunca mires atrás','Arnold Schwarzenegger'),(80,'La felicidad muchas veces se escapa por una puerta que no sabías que dejaste abierta','John Barrymore'),(81,'El precio del éxito debe pagarse totalmente por adelantado','Mirian Tracy'),(82,'Haz lo que puedas, con lo que tengas, donde estés','Theodore Roosevelt'),(83,'El fracaso derrota a los perdedores e inspira a los ganadores','Anónimo'),(84,'Vuelve a intentarlo. Fracasa de nuevo. Fracasa mejor.','Samuel Beckett'),(85,'El mayor error que una persona puede cometer es tener miedo de cometer un error','Elbert Hubbard'),(86,'Por muy larga que sea la tormenta, el sol siempre vuelve a brillar entre las nubes','Khalil Gibran'),(87,'El fracaso es sólo la oportunidad de comenzar de nuevo de forma más inteligente','Henry Ford'),(88,'Lo que no me destruye me hace más fuerte','Friedrich Nietzsche'),(89,'Intenta y falla, pero nunca falles en intentarlo','Jared Leto'),(90,'La manera de empezar es dejar de hablar y empezar a hacer','Walt Disney'),(91,'El realismo es para pesimistas. Un optimista crea su propia realidad.','David Harley'),(92,'No olvides nunca que el primer beso no se da en la boca, sino con los ojos','O. K. Bernhnardt'),(93,'Un cobarde es incapaz de mostar amor; hacerlo está reservado para los valientes','Mahatma Gandhi'),(94,'En un beso, sabrás todo lo que he callado.','Pablo Neruda'),(95,'No sabrás todo lo que valgo hasta que no pueda ser junto a ti todo lo que soy.','Gregorio Marañón'),(96,'Ni la ausencia ni el tiempo son nada cuando se ama.','Alfred de Musset'),(97,'Un corazón es una riqueza que no se vende ni se compra, peor que se regala.','Gustave Flaubert'),(98,'La vida es lo que pasa mientras estas ocupado haciendo otros planes.','John Lenon'),(99,'Cualquier tonto puede saber. La clave está en entender.','Albert Einstein'),(100,'La libertad está en ser dueño de nuestra propia vida.','Platón'),(101,'No hay que ir para atrás ni para darse impulso','Lao Tsé');
/*!40000 ALTER TABLE `citas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  `nombreE` varchar(255) DEFAULT NULL,
  `cif` varchar(14) DEFAULT NULL,
  `direccionE` varchar(255) DEFAULT NULL,
  `poblacionE` varchar(255) DEFAULT NULL,
  `codigopostalE` varchar(255) DEFAULT NULL,
  `provinciaE` varchar(255) DEFAULT NULL,
  `telefonoE` varchar(255) DEFAULT NULL,
  `contactoE` varchar(255) DEFAULT NULL,
  `emailE` varchar(255) DEFAULT NULL,
  `observacionesE` text DEFAULT NULL,
  `igualF` varchar(255) DEFAULT NULL,
  `fechaalta` datetime DEFAULT NULL,
  `fechabaja` datetime DEFAULT NULL,
  `eliminada` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'','NREDES INGENIERIA','39720559L','MAS DE L\'ABELLÓ 10 2º 2ª','REUS','43204','TARRAGONA','977 270 400','NOE MORNEO','info@nredes.net','Llamar siempre ante de ir','igual','2023-04-01 00:00:00',NULL,0);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentos`
--

DROP TABLE IF EXISTS `documentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_documento` int(11) NOT NULL DEFAULT 0,
  `tipo` varchar(255) DEFAULT NULL,
  `datos` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentos`
--

LOCK TABLES `documentos` WRITE;
/*!40000 ALTER TABLE `documentos` DISABLE KEYS */;
INSERT INTO `documentos` VALUES (1,1,'logo','<img src=\"assets/img/logo.png\" width=\"200px\">'),(2,1,'empresa','Mª Isabel De Antonio Gómez <br> 977 270 400<br><a mailto=\'ideantonio@nredes.net\'>ideantonio@nredes.net</a>'),(3,1,'h1','<h1>DOCUMENTO DE CAPTACIÓN DE DATOS PERSONALES</h1>'),(4,1,'expediente','Nº Expediente: '),(5,1,'h2','Datos del cliente'),(6,1,'h2','Datos del Local'),(7,1,'h2','Información sobre Protección de datos de carácter personal'),(8,1,'texto','Responsable <strong>María Isabel De Antonio Gómez </strong>, con DNI: 39903482T, Dirección: Apartado de Correos 285, CP 43201 Reus (Tarragona). Teléfono: 977 270 400 y Correo Electrónico: info@nredes.net.'),(9,1,'li','<li>La finalidad del tratamiento de la información que nos facilita es dar el servicio</li>'),(10,1,'li','<li>Los datos proporcionados se conservarán mientras se mantenga la relación</li>'),(11,1,'li','<li>Los datos no se cederán a terceros salvo en los casos en que exista una obligación</li>'),(12,1,'li','<li>Usted tiene derecho a obtener la confirmación sobre si estamos tratando sus datos </li>'),(13,1,'li','<li>Así mismo, solicito su autorización para ofrecer servicios relacionados con los </li>'),(14,1,'checkbox','<input type=\'checkbox\' id=\'si\' value=\"SI\">SI'),(15,1,'checkbox','<input type=\'checkbox\' id=\'no\' value=\'NO\'>NO'),(16,1,'firma','Firma:'),(17,1,'fecha','date(\'dd/mm/Y\')'),(18,1,'pie','Per a més informació, consultar la Política de Privacidad a <a hef=\'nredes.net\'>NRedes.net</a>'),(19,2,'nie','<p>  amb NIE núm. '),(20,2,'domicilio',',  en nom i representació pròpia, i domicili fiscal a '),(21,2,'telefono',', amb telèfon '),(22,2,'mail',' i adreça electrònica </p>'),(23,2,'autorizo','<h3>Autoritzo a: </h3>'),(24,2,'empresa','<p>Mª Isabel De Antonio Gómez, amb NIF 39903482T i domicili a c/ Mas de l\'Abelló 10, 2º 2ª, CP 43204 de Reus (Tarragona) </p>'),(25,2,'para','<h3>PER A: </h3>'),(26,2,'representant','<p>Que actuï en el meu nom, representant-me davant de '),(27,2,'centro','pel següent tràmit: </p>'),(28,2,'fecha','<p>Signat a '),(29,2,'autoriza','<p>Persona que autoritza                                               Persona autoritzada</p>');
/*!40000 ALTER TABLE `documentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facturacion`
--

DROP TABLE IF EXISTS `facturacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facturacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `nombreP` varchar(255) DEFAULT NULL,
  `dni` varchar(14) DEFAULT NULL,
  `direccionP` varchar(255) DEFAULT NULL,
  `poblacionP` varchar(255) DEFAULT NULL,
  `codigopostalP` int(11) DEFAULT NULL,
  `provinciaEP` varchar(255) DEFAULT NULL,
  `telefonoP` bigint(20) DEFAULT NULL,
  `contactoP` varchar(255) DEFAULT NULL,
  `emailP` varchar(255) DEFAULT NULL,
  `observacionesP` text DEFAULT NULL,
  `eliminada` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facturacion`
--

LOCK TABLES `facturacion` WRITE;
/*!40000 ALTER TABLE `facturacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `facturacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presupuestos`
--

DROP TABLE IF EXISTS `presupuestos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presupuestos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `objetivo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presupuestos`
--

LOCK TABLES `presupuestos` WRITE;
/*!40000 ALTER TABLE `presupuestos` DISABLE KEYS */;
/*!40000 ALTER TABLE `presupuestos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyectos`
--

DROP TABLE IF EXISTS `proyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyectos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `direccion` varchar(255) DEFAULT '',
  `cpostal` int(11) DEFAULT NULL,
  `poblacion` varchar(255) DEFAULT NULL,
  `provincia` varchar(255) DEFAULT NULL,
  `tipoactividad` varchar(255) DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyectos`
--

LOCK TABLES `proyectos` WRITE;
/*!40000 ALTER TABLE `proyectos` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subtareas`
--

DROP TABLE IF EXISTS `subtareas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subtareas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tareas` int(11) NOT NULL DEFAULT 0,
  `subtarea` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subtareas`
--

LOCK TABLES `subtareas` WRITE;
/*!40000 ALTER TABLE `subtareas` DISABLE KEYS */;
/*!40000 ALTER TABLE `subtareas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tareas`
--

DROP TABLE IF EXISTS `tareas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tareas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proyecto` int(11) NOT NULL,
  `tareas` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tareas`
--

LOCK TABLES `tareas` WRITE;
/*!40000 ALTER TABLE `tareas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tareas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipodocumento`
--

DROP TABLE IF EXISTS `tipodocumento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipodocumento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipodocumento` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipodocumento`
--

LOCK TABLES `tipodocumento` WRITE;
/*!40000 ALTER TABLE `tipodocumento` DISABLE KEYS */;
INSERT INTO `tipodocumento` VALUES (1,'captacion'),(2,'encargo'),(3,'presupuesto'),(4,'autorización');
/*!40000 ALTER TABLE `tipodocumento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(250) DEFAULT NULL,
  `pass` varchar(250) DEFAULT NULL,
  `secret` varchar(250) DEFAULT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `apellidos` varchar(250) DEFAULT NULL,
  `dni` varchar(12) DEFAULT NULL,
  `telefono` int(12) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `alta` datetime DEFAULT NULL,
  `baja` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'ideantonio','1122','tolkien','Isabel','De Antonio','39903482T',977270400,'ideantonio@nredes.net','2022-04-24 00:00:00',NULL),(2,'nmoreno','1122','neomorbius','Noé','Moreno','39720559L',977270400,'nmoreno@nredes.net','2022-04-24 00:00:00',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'neomorbius_proyectos'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-25 18:02:29
