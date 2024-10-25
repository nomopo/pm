CREATE TABLE `pm`.`citas` (`id` int,`cita` longtext,`autor` varchar(255));

CREATE TABLE `pm`.`clientes` (`id` int,`tipo` varchar(1),`nombreE` varchar(255),`cif` varchar(14),`direccionE` varchar(255),`poblacionE` varchar(255),`codigopostalE` varchar(255),`provinciaE` varchar(255),`telefonoE` varchar(255),`contactoE` varchar(255),`emailE` varchar(255),`observacionesE` text,`igualF` int,`fechaalta` datetime,`fechabaja` datetime,`eliminada` int);

CREATE TABLE `pm`.`facturacion` (`id` int,`id_cliente` int,`nombreP` varchar(255),`dni` varchar(14),`direccionP` varchar(255),`poblacionP` varchar(255),`codigopostalP` int,`provinciaEP` varchar(255),`telefonoP` bigint,`contactoP` varchar(255),`emailP` varchar(255),`observacionesP` text,`eliminada` int);

CREATE TABLE `pm`.`presupuestos` (`id` int,`id_cliente` int,`id_proyecto` int,`fecha` datetime,`objetivo` text);

CREATE TABLE `pm`.`proyectos` (`id` int,`id_cliente` int,`direccion` varchar(255),`cpostal` int,`poblacion` varchar(255),`provincia` varchar(255),`tipoactividad` varchar(255),`observaciones` text);

CREATE TABLE `pm`.`tareas` (`id` int,`id_proyecto` int,`tareas` text);

CREATE TABLE `pm`.`subtareas` (`id` int,`id_tareas` int,`subtarea` text);

CREATE TABLE `pm`.`documentos` (`id` int,`id_documento` int,`tipo` varchar(255),`datos` text);

CREATE TABLE `pm`.`tipodocumento` (`id` int,`tipodocumento` varchar(250));

CREATE TABLE `pm`.`users` (`id` int,`user` varchar(250),`pass` varchar(250),`secret` varchar(250),`nombre` varchar(250),`apellidos` varchar(250),`dni` varchar(12),`telefono` int,`email` varchar(250),`alta` datetime,`baja` datetime);

ALTER TABLE `pm`.`tipodocumento` ADD FOREIGN KEY (`id`) REFERENCES `pm`.`documentos` (`id_documento`);

ALTER TABLE `pm`.`clientes` ADD FOREIGN KEY (`id`) REFERENCES `pm`.`facturacion` (`id_cliente`);

ALTER TABLE `pm`.`clientes` ADD FOREIGN KEY (`id`) REFERENCES `pm`.`presupuestos` (`id_cliente`);

ALTER TABLE `pm`.`proyectos` ADD FOREIGN KEY (`id`) REFERENCES `pm`.`presupuestos` (`id_proyecto`);

ALTER TABLE `pm`.`clientes` ADD FOREIGN KEY (`id`) REFERENCES `pm`.`proyectos` (`id_cliente`);

ALTER TABLE `pm`.`tareas` ADD FOREIGN KEY (`id`) REFERENCES `pm`.`subtareas` (`id_tareas`);

ALTER TABLE `pm`.`proyectos` ADD FOREIGN KEY (`id`) REFERENCES `pm`.`tareas` (`id_proyecto`);
