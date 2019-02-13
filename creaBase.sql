CREATE DATABASE IF NOT EXISTS bac;

CREATE TABLE IF NOT EXISTS User (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(30),
    prenom VARCHAR(30),
    adresse VARCHAR(50),
    cp VARCHAR(5),
    ville VARCHAR(30),
    telephone VARCHAR(30),
    mail VARCHAR(50),
	login VARCHAR(30),
	mdp VARCHAR(30))
ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS TypeProduit (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	libelle VARCHAR(30))
ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE CategorieProduit (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	idType INT NOT NULL REFERENCES TypeProduit(id),
	libelle VARCHAR(30))
ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS Produit (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	image VARCHAR(100),
	nom VARCHAR(30),
	prix INT,
	idType INT NOT NULL REFERENCES TypeProduit(id),
	idCategorie INT NOT NULL REFERENCES CategorieProduit(id))
ENGINE = InnoDB DEFAULT CHARSET = utf8;	

CREATE TABLE IF NOT EXISTS Commande (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	idUser INT NOT NULL REFERENCES User(id),
	code VARCHAR(50),
	prix INT,
	etat VARCHAR(10))
ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS Contient (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	idCommande INT NOT NULL REFERENCES Commande(id),
	idProduit INT NOT NULL REFERENCES Produit(id),
	quantite INT)
ENGINE = InnoDB DEFAULT CHARSET = utf8;

INSERT INTO User VALUES (1,'admin','admin','admin', 'admin', 'admin', 'admin', 'admin', 'root', 'ini01');
INSERT INTO TypeProduit VALUES (1,'Radiateur'),(2,'Climatisation'),(3,'Plancher chauffant'),(4,'Pompe à chaleur');
INSERT INTO CategorieProduit VALUES 
(1,1,'Radiateur à inertie'),(2,1,'Radiateur rayonnant'),(3,1,'Convecteur'),(4,1,' Radiateurs à fluide caloporteur'),(5,1,'Sèche serviettes'),(6,1,'Radiateurs Chauffage Central'),(7,1,'Accumulateurs'),(8,1,'Radiateurs en pierre'),(9,1,'Radiateur électrique à fort pouvoir d inertie'),(10,1,'Radiateur électrique à inertie en verre'),
(11,2,'Climatiseurs Mono Split'),(12,2,'Climatiseurs Bi-splits'),(13,2,'Climatiseurs Tri-splits'),(14,2,'Climatiseurs Quadri-splits'),(15,2,'Unites Interieures pour Climatiseurs'),(17,2,'Unites Exterieures pour Climatiseurs'),(18,2,'Climatiseurs mobiles'),(19,2,'Climatisation gainable'),
(20,3,'Planchers et plafonds chauffants électriques'),(21,3,'Plancher chauffant hydraulique'),
(22,4,'Pompe à chaleur air/eau'),(23,4,'Pompes à chaleur de piscines');
INSERT INTO Produit VALUES (1,'img1','nom1',1500,1,1),(2,'img2','nom2',2000,1,3),(3,'img3','nom3',1000,2,11),(4,'img4','nom4',2500,2,13);