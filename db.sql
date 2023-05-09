CREATE DATABASE gestion_achats;

CREATE TABLE produits (
    idProduit INT PRIMARY KEY AUTO_INCREMENT,
    nomProduit VARCHAR(255) NOT NULL,
    prixProduit DECIMAL(10, 2) NOT NULL,
    datePreemption DATE NOT NULL,
    nomFournisseur VARCHAR(255) NOT NULL
);
