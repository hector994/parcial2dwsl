CREATE DATABASE `db_ventas2`;
USE `db_ventas2`;

CREATE TABLE IF NOT EXISTS `detalle_factura` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` int DEFAULT NULL,
  `venta` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`)
)

CREATE TABLE IF NOT EXISTS `encabezado_factura` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) 
ALTER TABLE `detalle_factura` ADD CONSTRAINT `detalle_factura_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `encabezado_factura` (`codigo`) ON DELETE RESTRICT ON UPDATE RESTRICT;