SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS sistemadoctores;

USE sistemadoctores;

DROP TABLE IF EXISTS cita_medica;

CREATE TABLE `cita_medica` (
  `ID_Cita` int(9) NOT NULL AUTO_INCREMENT,
  `id_doctor` int(11) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `nombre_paciente` varchar(255) DEFAULT NULL,
  `Fecha_Cita` date DEFAULT NULL,
  `hora_Cita` time DEFAULT NULL,
  PRIMARY KEY (`ID_Cita`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

INSERT INTO cita_medica VALUES("13","1","1","pedro ","0001-11-01","02:02:00");
INSERT INTO cita_medica VALUES("15","1","2","pedro ","2019-05-22","05:55:00");
INSERT INTO cita_medica VALUES("17","1","2","kevinZ","2019-05-27","23:58:00");
INSERT INTO cita_medica VALUES("18","1","2","daniel","2019-05-22","23:55:00");



DROP TABLE IF EXISTS doctor;

CREATE TABLE `doctor` (
  `id_doctor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `paterno` varchar(15) DEFAULT NULL,
  `materno` varchar(15) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `ciudad` varchar(30) DEFAULT NULL,
  `calle` varchar(40) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_doctor`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO doctor VALUES("1","pedro ","piedra","pica","18","","jalisco","cd guzman","comonfor","22","pedro@gmail.com","123","4106553");
INSERT INTO doctor VALUES("2","Cark","Chavez","Calleja","25","Hombre","jalisco","guzman","ncjdsk,","12","carlos@gmail.com","123","41255555");
INSERT INTO doctor VALUES("3","jesus","Chavez","Calleja","23","Hombre","jalisco","guzman","CPMONFOTR","509","jesusadonaichavezcalleja@gmail.com","1234","3414362981");
INSERT INTO doctor VALUES("4","Jose Manuel","Galvan","Santos","60","Hombre","jalisco","guzman","Manuel M diguez","55","manuel@gmail.com","123","4125568");
INSERT INTO doctor VALUES("5","kevin","alcala","Zepeda","18","Hombre","jalisco","guzman","ijih","89","kevin@gmail.com","69","34111656");



DROP TABLE IF EXISTS historial;

CREATE TABLE `historial` (
  `id_receta` int(11) DEFAULT NULL,
  `id_doctor` int(11) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `nombreDoctor` varchar(20) DEFAULT NULL,
  `maternoDoctor` varchar(10) DEFAULT NULL,
  `paternoDoctor` varchar(10) DEFAULT NULL,
  `paciente` varchar(40) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `edad` int(11) DEFAULT NULL,
  `peso` int(11) DEFAULT NULL,
  `talla` int(11) DEFAULT NULL,
  `ta` varchar(8) DEFAULT NULL,
  `fe` varchar(8) DEFAULT NULL,
  `temp` int(11) DEFAULT NULL,
  `receta` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO historial VALUES("28","1","2","pedro ","pica","piedra","adonai","2019-05-02 10:33:36","18","10","10","180/80","80","80","1 andopilino cada 5hr");
INSERT INTO historial VALUES("29","1","2","pedro ","pica","piedra","adonai","2019-05-02 10:33:36","18","10","10","180/80","80","80","1 andopilino cada 5hr");
INSERT INTO historial VALUES("30","1","0","pedro ","pica","piedra","jose luis","2019-05-03 08:00:20","12","10","10","180/80","80","80","un adopilino cada 8hr y un paracetamol de 600gr cada 5 horas \nademas medicina para los huesos y las articulaciones");
INSERT INTO historial VALUES("31","1","2","pedro ","pica","piedra","pepe el toro","2019-05-04 21:50:01","20","10","10","180/80","80","80","es nuevo");
INSERT INTO historial VALUES("33","2","0","Cark","Calleja","Chavez","Angel Flores Fermin","2019-05-06 23:18:45","5","10","10","180/60","60","60","jos");
INSERT INTO historial VALUES("34","1","0","pedro ","pica","piedra","Carlos Daniel Chavez Calleja","2019-05-08 08:40:11","20","0","0","180/60","80","80","hola soy carlos");
INSERT INTO historial VALUES("35","1","2","pedro ","pica","piedra","Daniel Cuevas Bernal","2019-05-09 14:12:45","20","86","175","130/80","80","36","1 andopilino cada 12 hr durante toda la semana\n3 capsulas para la infexion \npomada para los huesoso");
INSERT INTO historial VALUES("36","1","0","pedro ","pica","piedra","holav ","2019-05-09 15:38:15","20","91","174","180/80","80","32","hola");



DROP TABLE IF EXISTS opiniones_doctores;

CREATE TABLE `opiniones_doctores` (
  `ID_Opinion` int(9) NOT NULL AUTO_INCREMENT,
  `descripcion_Opinion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_Opinion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO opiniones_doctores VALUES("2","Hola");



DROP TABLE IF EXISTS paciente;

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `paterno` varchar(15) DEFAULT NULL,
  `materno` varchar(15) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `tipoSangre` varchar(6) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `ciudad` varchar(30) DEFAULT NULL,
  `calle` varchar(40) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO paciente VALUES("2","daniel","bernal","cuevas","412225","18","on","O+","jalisco","cd guzman","Comonfor","12","daniel@gmail.com","123");
INSERT INTO paciente VALUES("3","Jesus","Chavez","Calleja","3414362981","23","","O-","jalisco","cd guzman","Prol.Comonfot","509","jesusadonaichavezcalleja@gmail.com","123");
INSERT INTO paciente VALUES("4","Jose Jose","Paz","Gutierrez","4123366","50","hombre","a+","jalisco","cd guzman","chamizal","11","jose123@gmail.com","123");



DROP TABLE IF EXISTS receta;

CREATE TABLE `receta` (
  `id_receta` int(11) NOT NULL AUTO_INCREMENT,
  `id_doctor` int(11) DEFAULT NULL,
  `nombreDoctor` varchar(20) DEFAULT NULL,
  `paternoDoctor` varchar(10) DEFAULT NULL,
  `maternoDoctor` varchar(20) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `paciente` varchar(40) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `edad` int(11) DEFAULT NULL,
  `peso` int(11) DEFAULT NULL,
  `talla` int(11) DEFAULT NULL,
  `ta` varchar(8) DEFAULT NULL,
  `fe` varchar(8) DEFAULT NULL,
  `temp` int(11) DEFAULT NULL,
  `receta` text,
  PRIMARY KEY (`id_receta`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

INSERT INTO receta VALUES("19","2","Cark","Chavez","Calleja","","jose manuel","2019-04-26 23:02:43","18","10","10","180/80","80","10","diacepan cada 8 hr 20gramos");
INSERT INTO receta VALUES("30","1","pedro ","piedra","pica","0","jose luis","2019-05-03 08:00:20","12","10","10","180/80","80","80","un adopilino cada 8hr y un paracetamol de 600gr cada 5 horas \nademas medicina para los huesos y las articulaciones");
INSERT INTO receta VALUES("31","1","pedro ","piedra","pica","2","pepe el toro","2019-05-04 21:50:01","20","10","10","180/80","80","80","es nuevo");
INSERT INTO receta VALUES("32","2","Cark","Chavez","Calleja","0","Carlos Daniel Chavez Calleja","2019-05-06 23:15:52","33","10","10","180/80","80","80","Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±\nÃ±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±\nÃ±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±\nÃ±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±Ã±");
INSERT INTO receta VALUES("33","2","Cark","Chavez","Calleja","0","Angel Flores Fermin","2019-05-06 23:18:45","5","10","10","180/60","60","60","jos");
INSERT INTO receta VALUES("34","1","pedro ","piedra","pica","0","Carlos Daniel Chavez Calleja","2019-05-08 08:40:11","20","0","0","180/60","80","80","hola soy carlos");
INSERT INTO receta VALUES("35","1","pedro ","piedra","pica","2","Daniel Cuevas Bernal","2019-05-09 14:12:45","20","86","175","130/80","80","36","1 andopilino cada 12 hr durante toda la semana\n3 capsulas para la infexion \npomada para los huesoso");
INSERT INTO receta VALUES("36","1","pedro ","piedra","pica","0","holav ","2019-05-09 15:38:15","20","91","174","180/80","80","32","hola");



DROP TABLE IF EXISTS usuario_doctor;

CREATE TABLE `usuario_doctor` (
  `id_doctor` int(11) NOT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_doctor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO usuario_doctor VALUES("1","pedro@gmail.com","123");
INSERT INTO usuario_doctor VALUES("2","carlos@gmail.com","123");
INSERT INTO usuario_doctor VALUES("3","jesusadonaichavezcalleja@gmail.com","1234");
INSERT INTO usuario_doctor VALUES("4","manuel@gmail.com","123");
INSERT INTO usuario_doctor VALUES("5","kevin@gmail.com","69");



DROP TABLE IF EXISTS usuario_paciente;

CREATE TABLE `usuario_paciente` (
  `id_paciente` int(11) NOT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO usuario_paciente VALUES("2","daniel@gmail.com","123");
INSERT INTO usuario_paciente VALUES("3","jesusadonaichavezcalleja@gmail.com","123");
INSERT INTO usuario_paciente VALUES("4","jose123@gmail.com","123");



SET FOREIGN_KEY_CHECKS=1;