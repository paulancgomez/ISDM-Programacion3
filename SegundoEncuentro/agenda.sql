DROP DATABASE IF EXISTS agenda;

CREATE DATABASE agenda;

use agenda;

DROP TABLE IF EXISTS usuarios;

CREATE TABLE usuarios(
	idUsuario INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    apenom VARCHAR(60) NOT NULL,
    email VARCHAR(60) NOT NULL,
    usuario VARCHAR(60) NOT NULL,
    clave VARCHAR(60) NOT NULL
);

DROP TABLE IF EXISTS ventas_enca;

CREATE TABLE ventas_enca(
	idventas INT(11) AUTO_INCREMENT PRIMARY KEY,
    FechaEmision DATETIME NOT NULL,
    NroComprobante INT(11),
    Total DOUBLE,
    idUsuario INT(11),
    idCaja INT(11),
    idCliente INT(11)
);

DROP TABLE IF EXISTS ventas_item;

CREATE TABLE ventas_item(
	iddetVenta INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idVenta INT(11),
    Orden INT(11),
    idArticulo INT(11),
    Cantidad INT(11),
    Precio DOUBLE
);

DROP TABLE IF EXISTS articulos;

CREATE TABLE articulos(
	idarticulo INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    stockactual INT(10) NOT NULL,
	precio DOUBLE NOT NULL
);

INSERT INTO articulos(nombre, stockactual, precio)
VALUES ('Yerba Mate Amanda 500 gr', 15, 200),
	   ('Edulcorante 200 cc', 45, 100),
       ('Coca Cola 1,5 L', 35, 240),
       ('Fanta Naranja 1,5 L', 20, 200);

SELECT * FROM ventas_enca;
SELECT * FROM ventas_item;
SELECT * FROM articulos;