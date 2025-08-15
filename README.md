Database:
-- Crea la base de datos
CREATE DATABASE IF NOT EXISTS bienesraices_crud;
USE bienesraices_crud;

-- Tabla de usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Tabla de vendedores
CREATE TABLE IF NOT EXISTS vendedores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL
);

-- Tabla de propiedades
CREATE TABLE IF NOT EXISTS propiedades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    imagen VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    habitaciones INT NOT NULL,
    wc INT NOT NULL,
    estacionamiento INT NOT NULL,
    creado DATE NOT NULL,
    vendedores_id INT NOT NULL,
    FOREIGN KEY (vendedores_id) REFERENCES vendedores(id)
);
