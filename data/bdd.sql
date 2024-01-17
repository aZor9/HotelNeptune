CREATE TABLE utilisateurs(
   id INTEGER,
   adresse_mail TEXT,
   mot_de_passe TEXT,
   nom TEXT,
   prenom TEXT,
   numero_telephone TEXT,
   PRIMARY KEY(id)
);

CREATE TABLE chambres(
   numero_chambre TEXT,
   description TEXT NOT NULL,
   photo TEXT NOT NULL,
   nombre_lit_simple INTEGER,
   nombre_lit_double_1 INTEGER,
   prix NUMERIC,
   PRIMARY KEY(numero_chambre)
);

CREATE TABLE reservations(
   id TEXT,
   date_debut NUMERIC,
   date_fin NUMERIC,
   nombre_perssonnes INTEGER,
   numero_chambre TEXT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(numero_chambre) REFERENCES chambres(numero_chambre)
);

CREATE TABLE reserve(
   id INTEGER,
   id_1 TEXT,
   PRIMARY KEY(id, id_1),
   FOREIGN KEY(id) REFERENCES utilisateurs(id),
   FOREIGN KEY(id_1) REFERENCES reservations(id)
);

CREATE TABLE mettre_en_place(
   id INTEGER,
   numero_chambre TEXT,
   PRIMARY KEY(id, numero_chambre),
   FOREIGN KEY(id) REFERENCES utilisateurs(id),
   FOREIGN KEY(numero_chambre) REFERENCES chambres(numero_chambre)
);
