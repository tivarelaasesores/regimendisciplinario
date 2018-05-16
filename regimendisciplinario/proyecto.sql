-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: proyecto
-- ------------------------------------------------------
-- Server version	5.7.21-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `addendum`
--

DROP TABLE IF EXISTS `addendum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addendum` (
  `Id_Addendum` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Contrato` int(11) NOT NULL,
  `Cedula_Juridica` varchar(20) NOT NULL,
  `Id_Empleado` varchar(20) NOT NULL,
  `Nombre` varchar(150) NOT NULL,
  `Fecha_Subida` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Ruta` varchar(250) NOT NULL,
  PRIMARY KEY (`Id_Addendum`),
  KEY `FK_Addendum_Contratos` (`Id_Contrato`),
  KEY `FK_Addendum_Empresas` (`Cedula_Juridica`),
  KEY `FK_Addendum_Empleados` (`Id_Empleado`),
  CONSTRAINT `FK_Addendum_Contratos` FOREIGN KEY (`Id_Contrato`) REFERENCES `contratos` (`Id_Contrato`),
  CONSTRAINT `FK_Addendum_Empleados` FOREIGN KEY (`Id_Empleado`) REFERENCES `empleados` (`Id_Empleado`),
  CONSTRAINT `FK_Addendum_Empresas` FOREIGN KEY (`Cedula_Juridica`) REFERENCES `empresas` (`Cedula_Juridica`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addendum`
--

LOCK TABLES `addendum` WRITE;
/*!40000 ALTER TABLE `addendum` DISABLE KEYS */;
/*!40000 ALTER TABLE `addendum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `Id_Categoria` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`Id_Categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `Id_Cliente` varchar(20) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido1` varchar(100) DEFAULT NULL,
  `Apellido2` varchar(100) DEFAULT NULL,
  `Correo` varchar(150) DEFAULT NULL,
  `Direccion` varchar(250) DEFAULT NULL,
  `Telefono1` int(11) DEFAULT NULL,
  `Telefono2` int(11) DEFAULT NULL,
  `Cedula_Juridica` varchar(50) DEFAULT NULL,
  `Usuario` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Id_Cliente`),
  KEY `FK_Clientes_Empresas` (`Cedula_Juridica`),
  KEY `FK_Clientes_Usuarios` (`Usuario`),
  CONSTRAINT `FK_Clientes_Empresas` FOREIGN KEY (`Cedula_Juridica`) REFERENCES `empresas` (`Cedula_Juridica`),
  CONSTRAINT `FK_Clientes_Usuarios` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES ('116090059','Steven','Morera','Hernandez','smore@varelaasesores.com','Curridabat',78524136,44798521,NULL,'admin'),('4658392924','Pablo','Soto','De Carlo','ti@varelaasesores.com','San Jose',87451597,0,NULL,'psoto');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contratos`
--

DROP TABLE IF EXISTS `contratos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contratos` (
  `Id_Contrato` int(11) NOT NULL AUTO_INCREMENT,
  `Cedula_Juridica` varchar(20) NOT NULL,
  `Id_Puesto` int(11) NOT NULL,
  `Nombre` varchar(150) NOT NULL,
  `Fecha_Publicacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Ruta` varchar(250) NOT NULL,
  PRIMARY KEY (`Id_Contrato`,`Cedula_Juridica`),
  KEY `FK_Contratos_Empresas` (`Cedula_Juridica`),
  KEY `FK_Contratos_Puestos` (`Id_Puesto`),
  CONSTRAINT `FK_Contratos_Empresas` FOREIGN KEY (`Cedula_Juridica`) REFERENCES `empresas` (`Cedula_Juridica`),
  CONSTRAINT `FK_Contratos_Puestos` FOREIGN KEY (`Id_Puesto`) REFERENCES `puestos` (`Id_Puesto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contratos`
--

LOCK TABLES `contratos` WRITE;
/*!40000 ALTER TABLE `contratos` DISABLE KEYS */;
/*!40000 ALTER TABLE `contratos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentos`
--

DROP TABLE IF EXISTS `documentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documentos` (
  `Id_Documento` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Empleado` varchar(20) NOT NULL,
  `Nombre` varchar(150) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Fecha_Subida` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Id_Categoria` int(11) NOT NULL,
  `Ruta` varchar(250) NOT NULL,
  PRIMARY KEY (`Id_Documento`,`Id_Empleado`),
  KEY `FK_Documentos_Categorias` (`Id_Categoria`),
  KEY `FK_Documentos_Empleado` (`Id_Empleado`),
  CONSTRAINT `FK_Documentos_Categorias` FOREIGN KEY (`Id_Categoria`) REFERENCES `categorias` (`Id_Categoria`),
  CONSTRAINT `FK_Documentos_Empleado` FOREIGN KEY (`Id_Empleado`) REFERENCES `empleados` (`Id_Empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentos`
--

LOCK TABLES `documentos` WRITE;
/*!40000 ALTER TABLE `documentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `documentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleados`
--

DROP TABLE IF EXISTS `empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleados` (
  `Id_Empleado` varchar(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido1` varchar(100) NOT NULL,
  `Apellido2` varchar(100) NOT NULL,
  `Correo` varchar(150) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Direccion` varchar(250) NOT NULL,
  `Telefono1` int(11) NOT NULL,
  `Telefono2` int(11) DEFAULT NULL,
  `Foto` blob,
  `Usuario` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Id_Empleado`),
  KEY `FK_Empleados_Usuarios` (`Usuario`),
  CONSTRAINT `FK_Empleados_Usuarios` FOREIGN KEY (`Usuario`) REFERENCES `usuarios` (`Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresas` (
  `Cedula_Juridica` varchar(20) NOT NULL,
  `Nombre` varchar(150) NOT NULL,
  `Correo` varchar(150) NOT NULL,
  `Direccion` varchar(250) NOT NULL,
  `Telefono1` int(11) NOT NULL,
  `Telefono2` int(11) DEFAULT NULL,
  `Foto` blob,
  `Estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Cedula_Juridica`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES ('1548653242','Inciensa','inciencia@empresa.com','Tres Rios, La Union, 500m E Terramall',12548795,0,NULL,1),('3004589753','Patitos S.A','patitossa@empresa.com','En algun lugar',24846587,54682435,NULL,1);
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expediente_laboral`
--

DROP TABLE IF EXISTS `expediente_laboral`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expediente_laboral` (
  `Id_Empleado` varchar(20) NOT NULL,
  `Cedula_Juridica` varchar(20) NOT NULL,
  `Fecha_Ingreso` date NOT NULL,
  `Fecha_Salida` date DEFAULT NULL,
  `Jefe_Inmediato` varchar(200) NOT NULL,
  `Id_Puesto` int(11) NOT NULL,
  `Tipo_Contrato` varchar(100) NOT NULL,
  `Salario_Bruto` double(10,2) NOT NULL,
  `Horas_Extras` int(11) NOT NULL,
  `Total_Extras` double(10,2) NOT NULL,
  `Descuento` double(10,2) NOT NULL,
  `Salario_Neto` double(10,2) NOT NULL,
  PRIMARY KEY (`Id_Empleado`,`Cedula_Juridica`),
  KEY `FK_ExpedienteL_Puestos` (`Id_Puesto`),
  KEY `FK_ExpedienteL_Empresas` (`Cedula_Juridica`),
  CONSTRAINT `FK_ExpedienteL_Empleados` FOREIGN KEY (`Id_Empleado`) REFERENCES `empleados` (`Id_Empleado`),
  CONSTRAINT `FK_ExpedienteL_Empresas` FOREIGN KEY (`Cedula_Juridica`) REFERENCES `empresas` (`Cedula_Juridica`),
  CONSTRAINT `FK_ExpedienteL_Puestos` FOREIGN KEY (`Id_Puesto`) REFERENCES `puestos` (`Id_Puesto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expediente_laboral`
--

LOCK TABLES `expediente_laboral` WRITE;
/*!40000 ALTER TABLE `expediente_laboral` DISABLE KEYS */;
/*!40000 ALTER TABLE `expediente_laboral` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puestos`
--

DROP TABLE IF EXISTS `puestos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `puestos` (
  `Id_Puesto` int(11) NOT NULL AUTO_INCREMENT,
  `Cedula_Juridica` varchar(20) NOT NULL,
  `Nombre` varchar(200) NOT NULL,
  `Salario` double(10,2) NOT NULL,
  `Tipo_Jornada` varchar(150) NOT NULL,
  `Pago_Hora` double(10,2) NOT NULL,
  `Pago_Extra` double(10,2) NOT NULL,
  `Estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id_Puesto`,`Cedula_Juridica`),
  KEY `FK_Puestos_Empresas` (`Cedula_Juridica`),
  CONSTRAINT `FK_Puestos_Empresas` FOREIGN KEY (`Cedula_Juridica`) REFERENCES `empresas` (`Cedula_Juridica`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puestos`
--

LOCK TABLES `puestos` WRITE;
/*!40000 ALTER TABLE `puestos` DISABLE KEYS */;
INSERT INTO `puestos` VALUES (1,'1548653242','Programador/a',250000.00,'Diurna',31250.00,10000.00,1),(2,'3004589753','Administrador/a',400000.00,'Diurna',50000.00,20000.00,1);
/*!40000 ALTER TABLE `puestos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro_emp_contrato`
--

DROP TABLE IF EXISTS `registro_emp_contrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registro_emp_contrato` (
  `Id_Contrato` int(11) NOT NULL,
  `Cedula_Juridica` varchar(20) NOT NULL,
  `Id_Empleado` varchar(20) NOT NULL,
  `Fecha_Subida` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Ruta` varchar(250) NOT NULL,
  PRIMARY KEY (`Id_Contrato`,`Cedula_Juridica`,`Id_Empleado`) USING BTREE,
  KEY `FK_REC_Empresas` (`Cedula_Juridica`),
  KEY `FK_REC_Empleado` (`Id_Empleado`),
  CONSTRAINT `FK_REC_Contratos` FOREIGN KEY (`Id_Contrato`) REFERENCES `contratos` (`Id_Contrato`),
  CONSTRAINT `FK_REC_Empleado` FOREIGN KEY (`Id_Empleado`) REFERENCES `empleados` (`Id_Empleado`),
  CONSTRAINT `FK_REC_Empresas` FOREIGN KEY (`Cedula_Juridica`) REFERENCES `empresas` (`Cedula_Juridica`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro_emp_contrato`
--

LOCK TABLES `registro_emp_contrato` WRITE;
/*!40000 ALTER TABLE `registro_emp_contrato` DISABLE KEYS */;
/*!40000 ALTER TABLE `registro_emp_contrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `Id_Rol` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrador'),(2,'Manager'),(3,'Empleado');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `Usuario` varchar(30) NOT NULL,
  `Contrasena` varchar(20) NOT NULL,
  `Id_Rol` int(11) NOT NULL,
  `Estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`Usuario`),
  KEY `FK_Usuarios_Roles` (`Id_Rol`),
  CONSTRAINT `FK_Usuarios_Roles` FOREIGN KEY (`Id_Rol`) REFERENCES `roles` (`Id_Rol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('admin','admin12345',1,0),('empleado','empleado12',3,1),('manager','manager123',2,1),('psoto','asdfg1994',1,1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'proyecto'
--
/*!50003 DROP PROCEDURE IF EXISTS `Insert_Clientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Insert_Clientes`(IN `v_Id` VARCHAR(20), IN `v_Nombre` VARCHAR(50), IN `v_Apellido1` VARCHAR(100), IN `v_Apellido2` VARCHAR(100), IN `v_Correo` VARCHAR(150), IN `v_Direccion` VARCHAR(250), IN `v_Telefono1` INT, IN `v_Telefono2` INT, IN `v_CedulaJuridica` VARCHAR(20), IN `v_Usuario` VARCHAR(30))
    NO SQL
Insert into Clientes (Id_Cliente, Nombre, Apellido1, Apellido2, Correo, Cedula_Juridica, Direccion, Telefono1, Telefono2, Usuario)
Values(v_ID,v_Nombre,v_Apellido1,v_Apellido2,v_Correo,v_CedulaJuridica,v_Direccion,v_Telefono1,v_Telefono2,v_Usuario) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Insert_Empleados` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Insert_Empleados`(
	v_Id_Empleado varchar(20),
	v_Nombre varchar(50),
	v_Apellido1 varchar(100),
	v_Apellido2 varchar(100),
	v_Correo varchar(150),
	v_FechaNacimiento date,
	v_Direccion varchar(250),
	v_Telefono1 int,
	v_Telefono2 int,
	v_Foto blob,
	v_Usuario varchar(30)
)
BEGIN
Insert into Empleados(Id_Empleado, Nombre, Apellido1, Apellido2, Correo, Fecha_Nacimiento, Direccion, Telefono1, Telefono2, Foto, Usuario)
		Values(v_Id_Empleado, v_Nombre, v_Apellido1, v_Apellido2, v_Correo, v_FechaNacimiento, v_Direccion, v_Telefono1, v_Telefono2, v_Foto, v_Usuario);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Insert_Empresas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Insert_Empresas`(IN `v_CedulaJuridica` VARCHAR(20), IN `v_Nombre` VARCHAR(150), IN `v_Correo` VARCHAR(150), IN `v_Direccion` VARCHAR(200), IN `v_Telefono1` INT, IN `v_Telefono2` INT, IN `v_Foto` BLOB)
    NO SQL
Insert into Empresas(Cedula_Juridica, Nombre, Correo, Direccion, Telefono1, Telefono2, Foto)
Values(v_CedulaJuridica, v_Nombre, v_Correo, v_Direccion, v_Telefono1, v_Telefono2, v_Foto) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Insert_ExpedienteL` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Insert_ExpedienteL`(IN `v_IdEmpleado` VARCHAR(20), IN `v_CedulaJuridica` VARCHAR(20), IN `v_FechaIngreso` DATE, IN `v_FechaSalida` DATE, IN `v_Jefe` VARCHAR(200), IN `v_IdPuesto` INT, IN `v_TipoContrato` VARCHAR(100), IN `v_SalarioBruto` DOUBLE(10,2), IN `v_HorasExtras` INT, IN `v_TotalExtras` DOUBLE(10,2), IN `v_Descuentos` DOUBLE(10,2), IN `v_SalarioNeto` DOUBLE(10,2))
    NO SQL
Insert into Expediente_Laboral (Id_Empleado, Cedula_Juridica, Fecha_Ingreso, Fecha_Salida, Jefe_Inmediato, Id_Puesto, Tipo_Contrato, Salario_Bruto, Horas_Extras, Total_Extras, Descuento, Salario_Neto)
Values(v_IdEmpleado, v_CedulaJuridica, v_FechaIngreso, v_FechaSalida, v_Jefe, v_IdPuesto, v_TipoContrato, v_SalarioBruto, v_HorasExtras, v_TotalExtras, v_Descuentos, v_SalarioNeto) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Insert_Roles` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Insert_Roles`(IN `v_Name` VARCHAR(50))
    NO SQL
Insert into Roles(Descripcion)
Values (v_Name) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Insert_Usuarios` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Insert_Usuarios`(IN `v_Usuario` VARCHAR(30), IN `v_Contrasena` VARCHAR(10), IN `v_Rol` INT)
    NO SQL
Insert into Usuarios(Usuario, Contrasena, Id_Rol)
Values (v_Usuario,v_Contrasena, v_Rol) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Select_G_Clientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Select_G_Clientes`(IN `v_Busqueda` VARCHAR(250))
    NO SQL
Select c.Id_Cliente, c.Nombre, c.Apellido1 as 'ApellidoP', c.Apellido2 as 'ApellidoM', c.Correo, e.Nombre as "Empresa", c.Usuario, c.Direccion, c.Telefono1, c.Telefono2
From Clientes c
LEFT JOIN Empresas e On c.Cedula_Juridica = e.Cedula_Juridica
INNER JOIN Usuarios u On c.Usuario = u.Usuario
WHERE u.Estado = 1 AND (c.Id_Cliente like Concat(v_Busqueda,'%') OR Concat(c.Nombre,' ',c.Apellido1,' ',c.Apellido2) like Concat('%',v_Busqueda,'%') OR c.Correo like Concat(v_Busqueda,'%') Or c.Usuario like Concat(v_Busqueda,'%')) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Select_G_ClientesComplete` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Select_G_ClientesComplete`(IN `v_Busqueda` VARCHAR(250))
    NO SQL
Select c.Id_Cliente, c.Nombre, c.Apellido1 as 'ApellidoP', c.Apellido2 as 'ApellidoM', c.Correo, e.Nombre as "Empresa", c.Usuario, c.Direccion, c.Telefono1, c.Telefono2
From Clientes c
LEFT JOIN Empresas e On c.Cedula_Juridica = e.Cedula_Juridica
INNER JOIN Usuarios u On c.Usuario = u.Usuario
WHERE c.Id_Cliente like Concat(v_Busqueda,'%') OR Concat(c.Nombre,' ',c.Apellido1,' ',c.Apellido2) like Concat('%',v_Busqueda,'%') OR c.Correo like Concat(v_Busqueda,'%') Or c.Usuario like Concat(v_Busqueda,'%') ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Select_G_Empleados` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Select_G_Empleados`(
	v_Busqueda varchar(150)
)
Begin
	Select e.Id_Empleado, e.Nombre, e.Apellido1 As 'ApellidoP', e.Apellido2 As 'ApellidoM', e.Correo, e.Fecha_Nacimiento as 'Fecha Nacimiento', e.Direccion, e.Telefono1, e.Telefono2, e.Foto, e.Usuario 
	From Empleados e
	INNER JOIN Usuarios u On e.Usuario = u.Usuario
	WHERE u.Estado = 1 And (e.Id_Empleado like Concat(v_Busqueda,'%') OR Concat(e.Nombre,' ',e.Apellido1,' ',e.Apellido2) like Concat('%',v_Busqueda,'%') OR 
	Correo like Concat(v_Busqueda,'%') Or e.Usuario like Concat(v_Busqueda,'%'));
End ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Select_G_Empresas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Select_G_Empresas`(IN `v_Busqueda` varchar(150))
    NO SQL
Select Cedula_Juridica as 'Cedula Juridica', Nombre, Correo, Telefono1, Telefono2, Direccion, Foto  From Empresas
WHERE Estado = 1 And (Cedula_Juridica like Concat(v_Busqueda,'%') OR Nombre like Concat(v_Busqueda,'%') OR Correo like Concat(v_Busqueda,'%')) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Select_G_EmpresasComplete` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Select_G_EmpresasComplete`(IN `v_Busqueda` VARCHAR(150))
    NO SQL
Select Cedula_Juridica as 'Cedula Juridica', Nombre, Correo, Telefono1, Telefono2, Direccion, Foto  From Empresas
WHERE (Cedula_Juridica like Concat(v_Busqueda,'%') OR Nombre like Concat(v_Busqueda,'%') OR Correo like Concat(v_Busqueda,'%')) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Select_G_ExpedienteL` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Select_G_ExpedienteL`(
	v_Busqueda varchar(150)
)
Begin
	Select el.Id_Empleado, Concat(e.Nombre,' ',e.Apellido1,' ',Apellido2) as 'Empleado', em.Nombre as 'Empresa', el.Fecha_Ingreso as 'Fecha Ingreso', el.Fecha_Salida as 'Fecha Salida', el.Jefe_inmediato as 'Jefe Inmediato', pu.Nombre as 'Puesto', el.Tipo_Contrato as 'Tipo Contrato', el.Salario_Bruto as 'Salario Bruto', el.Horas_Extras as 'Horas Extra', el.Total_Extras as 'Total Extras', el.Descuento, el.Salario_Neto as 'Salario Neto'
	From Expediente_Laboral el
	INNER JOIN Empleados e On el.Id_Empleado = e.Id_Empleado
	INNER JOIN Empresas em On el.Cedula_Juridica = em.Cedula_Juridica
	INNER JOIN Puestos pu On el.Id_Puesto = pu.Id_Puesto
	INNER JOIN Usuarios u On u.Usuario = e.Usuario 
	Where (em.Estado = 1 And u.Estado = 1) And (el.Id_Empleado like Concat(v_Busqueda,'%') Or Concat(e.Nombre,' ',Apellido2,' ',e.Apellido2) like Concat('%',v_Busqueda,'%') Or
	em.Nombre like Concat(v_Busqueda,'%') Or el.Cedula_Juridica like Concat(v_Busqueda,'%'));
End ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Select_G_Puestos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Select_G_Puestos`(
	v_Busqueda varchar(200)
)
Begin
	Select p.Id_Puesto, e.Nombre as 'Empresa', p.Nombre, p.Salario, p.Tipo_Jornada, p.Pago_Hora, p.Pago_Extra
	From Puestos p
	INNER JOIN Empresas e On p.Cedula_Juridica = e.Cedula_Juridica
	Where p.Estado = 1 And (p.Nombre like Concat(v_Busqueda,'%') or e.Nombre like Concat(v_Busqueda,'%'));
End ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Select_G_Roles` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Select_G_Roles`()
    NO SQL
SELECT * FROM roles ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Select_G_Usuarios` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Select_G_Usuarios`(IN `v_Usuario` VARCHAR(30))
    NO SQL
Select Usuario, r.Descripcion as 'Rol' From Usuarios u 	INNER JOIN roles r On u.Id_Rol = r.Id_Rol 
Where Estado = 1 And Usuario like Concat(v_Usuario,'%') ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Select_G_UsuariosComplete` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Select_G_UsuariosComplete`(IN `V_Usuario` VARCHAR(30))
    NO SQL
Select Usuario, r.Descripcion as 'Rol' From Usuarios u
INNER JOIN roles r On u.Id_Rol = r.Id_Rol
Where Usuario like Concat(v_Usuario,'%') ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Select_Log_Usuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Select_Log_Usuario`(IN `v_Usuario` VARCHAR(30), IN `v_Contrasena` VARCHAR(10))
    NO SQL
SELECT Usuario, Contrasena, r.Descripcion AS 'Rol' From usuarios u 
INNER JOIN roles r ON u.Id_Rol = r.Id_Rol
WHERE Usuario = v_Usuario AND Contrasena = v_Contrasena ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Select_Roles` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Select_Roles`()
    NO SQL
Select * From roles ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Update_Clientes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_Clientes`(IN `v_Id` VARCHAR(20), IN `v_Nombre` VARCHAR(50), IN `v_Apellido1` VARCHAR(100), IN `v_Apellido2` VARCHAR(100), IN `v_Correo` VARCHAR(150), IN `v_Direccion` VARCHAR(250), IN `v_Telefono1` INT, IN `v_Telefono2` INT, IN `v_CedulaJuridica` VARCHAR(20), IN `v_Usuario` VARCHAR(30))
    NO SQL
Update Clientes set Nombre = v_Nombre, Apellido1 = v_Apellido1, Apellido2 = v_Apellido2, Correo = v_Correo, Cedula_Juridica=v_CedulaJuridica, Direccion=v_Direccion, Telefono1=v_Telefono1,	Telefono2=v_Telefono2, Usuario=v_Usuario
Where Id_Cliente = v_Id ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Update_Roles` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_Roles`(IN `v_IdRol` INT, IN `v_Name` VARCHAR(50))
    NO SQL
Update Roles set Descripcion = v_Name
Where Id_Rol = IdRol ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Update_Usuarios` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_Usuarios`(IN `v_Usuario` VARCHAR(30), IN `v_Contrasena` VARCHAR(10), IN `v_Rol` INT, IN `v_State` BOOLEAN)
    NO SQL
Update Usuarios set Rol = v_Rol,
Estado = v_State
Where Usuario = v_Usuario and Contrasena=v_Contrasena ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `Update_Usuario_Pass` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `Update_Usuario_Pass`(IN `v_Usuario` VARCHAR(30), IN `v_Contrasena` VARCHAR(10), IN `v_NContrasena` VARCHAR(10))
    NO SQL
Update Usuarios set Contrasena = v_NContrasena
Where Usuario = v_Usuario and Contrasena=v_Contrasena ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-24 17:04:10
