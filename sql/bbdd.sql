CREATE TABLE Fecha(
    fechahorainicio datetime null,
    fechahorafin datetime null
)ENGINE=INNODB;

CREATE TABLE Criterios(
    idCriterio TINYINT AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(40) NOT NULL,
    CONSTRAINT pkcriterios PRIMARY KEY (idCriterio)
)ENGINE=INNODB;

CREATE TABLE Comparsa(
    idComparsa INT AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(40) NOT NULL,
    provincia VARCHAR(40) NULL,
    CONSTRAINT pkcomparsa PRIMARY KEY (idComparsa)
)ENGINE=INNODB;

CREATE TABLE Usuarios(
    idUsuario INT AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(40) NOT NULL,
    correo VARCHAR(40) NOT NULL,
    contrasenia VARCHAR(40) NOT NULL,
    tipo VARCHAR(40) NOT NULL,
    CONSTRAINT pkusuarios PRIMARY KEY (idUsuario)
)ENGINE=INNODB;

CREATE TABLE Juez(
    idUsuario INT AUTO_INCREMENT NOT NULL,
    CONSTRAINT pkjuez PRIMARY KEY (idUsuario),
    CONSTRAINT fkjuez_usuario FOREIGN KEY(idUsuario) REFERENCES Usuarios(idUsuario) ON DELETE CASCADE
)ENGINE=INNODB;

CREATE TABLE Administrador(
    idUsuario INT AUTO_INCREMENT NOT NULL,
    CONSTRAINT pkadministrador PRIMARY KEY (idUsuario),
    CONSTRAINT fkadministrador_usuario FOREIGN KEY(idUsuario) REFERENCES Usuarios(idUsuario) ON DELETE CASCADE
)ENGINE=INNODB;

CREATE TABLE Votacion(
    idVoto INT AUTO_INCREMENT NOT NULL,
    idJuez INT NOT NULL,
    idComparsa INT NOT NULL,
    CONSTRAINT pkvotacion PRIMARY KEY (idVoto),
    CONSTRAINT csujuez_comparsa UNIQUE INDEX(idJuez,idComparsa),
    CONSTRAINT fkvotacion_juez FOREIGN KEY(idJuez) REFERENCES Juez(idUsuario) ON DELETE CASCADE,
    CONSTRAINT fkvotacion_comparsa FOREIGN KEY(idComparsa) REFERENCES Comparsa(idComparsa) ON DELETE CASCADE
)ENGINE=INNODB;

CREATE TABLE Criterios_Votacion(
    idVoto INT AUTO_INCREMENT NOT NULL,
    idCriterio TINYINT NOT NULL,
    puntuacion TINYINT NOT NULL,
    CONSTRAINT pkcriterios_votacion PRIMARY KEY (idVoto,idCriterio),
    CONSTRAINT fkcriterios_votacion_votacion FOREIGN KEY(idVoto) REFERENCES Votacion(idVoto) ON DELETE CASCADE,
    CONSTRAINT fkcriterios_votacion_criterio FOREIGN KEY(idCriterio) REFERENCES Criterios(idCriterio) ON DELETE CASCADE
)ENGINE=INNODB;



CREATE UNIQUE INDEX nombrecriterio ON Criterios(nombre);
CREATE UNIQUE INDEX nombrecomparsa ON Comparsa(nombre); 