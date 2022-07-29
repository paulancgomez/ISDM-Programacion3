SHOW DATABASES;

DROP DATABASE IF EXISTS drugstore;

CREATE DATABASE drugstore;

USE drugstore;

DROP TABLE IF EXISTS articulos;

CREATE TABLE articulos(
	idArticulos INT AUTO_INCREMENT,
    detalle VARCHAR(50),
    precio DECIMAL(10,2),
    PRIMARY KEY (idArticulos)
);

INSERT INTO articulos (detalle, precio)
VALUES ('Yerba Amanda', 34.5),
       ('Sprite Cero', NULL),
       ('Chicles Beldent', NULL), 
       ('Mermelada', 15.5), 
       ('Fideos Rivoli', NULL),
       ('Sprite', NULL),
       ('Yerba', NULL),
       ('Coca', NULL);