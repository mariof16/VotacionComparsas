-- Insertar un usuario
INSERT INTO Usuarios (nombre, correo, contrasenia, tipo)
VALUES ('Mario', 'mario@gmail.com', '1234', 'administrador');

-- Obtener el id del usuario recién insertado
SET @usuario_id = LAST_INSERT_ID();

-- Insertar el id del usuario en la tabla Juez
INSERT INTO Administrador (idUsuario) VALUES (@usuario_id);

-- Insertar un usuario
INSERT INTO Usuarios (nombre, correo, contrasenia, tipo)
VALUES ('Juez1', 'juez1@gmail.com', '1234', 'juez');

-- Obtener el id del usuario recién insertado
SET @usuario_id = LAST_INSERT_ID();

-- Insertar el id del usuario en la tabla Juez
INSERT INTO Juez (idUsuario) VALUES (@usuario_id);

-- Insertar un usuario
INSERT INTO Usuarios (nombre, correo, contrasenia, tipo)
VALUES ('Juez2', 'juez2@gmail.com', '1234', 'juez');

-- Obtener el id del usuario recién insertado
SET @usuario_id = LAST_INSERT_ID();

-- Insertar el id del usuario en la tabla Juez
INSERT INTO Juez (idUsuario) VALUES (@usuario_id);

-- Insertar un usuario
INSERT INTO Usuarios (nombre, correo, contrasenia, tipo)
VALUES ('Juez3', 'juez3@gmail.com', '1234', 'juez');

-- Obtener el id del usuario recién insertado
SET @usuario_id = LAST_INSERT_ID();

-- Insertar el id del usuario en la tabla Juez
INSERT INTO Juez (idUsuario) VALUES (@usuario_id);