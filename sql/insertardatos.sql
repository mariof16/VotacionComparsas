-- Insertar usuarios
INSERT INTO Usuarios (nombre, correo, contrasenia, tipo)
VALUES ('Admin', 'admin@gmail.com', '1234', 'administrador');
SET @usuario_id = LAST_INSERT_ID();
INSERT INTO Administrador (idUsuario) VALUES (@usuario_id);

INSERT INTO Usuarios (nombre, correo, contrasenia, tipo)
VALUES ('Juez1', 'juez1@gmail.com', '1234', 'juez');
SET @usuario_id = LAST_INSERT_ID();
INSERT INTO Juez (idUsuario) VALUES (@usuario_id);

INSERT INTO Usuarios (nombre, correo, contrasenia, tipo)
VALUES ('Juez2', 'juez2@gmail.com', '1234', 'juez');
SET @usuario_id = LAST_INSERT_ID();
INSERT INTO Juez (idUsuario) VALUES (@usuario_id);

INSERT INTO Usuarios (nombre, correo, contrasenia, tipo)
VALUES ('Juez3', 'juez3@gmail.com', '1234', 'juez');
SET @usuario_id = LAST_INSERT_ID();
INSERT INTO Juez (idUsuario) VALUES (@usuario_id);

-- Insertar criterios
INSERT INTO Criterios (nombre) VALUES ('Gorro');
INSERT INTO Criterios (nombre) VALUES ('Baile');
INSERT INTO Criterios (nombre) VALUES ('Musica');
INSERT INTO Criterios (nombre) VALUES ('Maquillaje');