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

SELECT * FROM usuarios;


