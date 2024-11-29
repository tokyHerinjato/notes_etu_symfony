-- located on notes_etu from PostgreSQL (All right reserved).

create database notes_etu;

\c notes_etu;

CREATE TABLE etudiant(
   idEtudiant SERIAL PRIMARY KEY,
   nom VARCHAR(50) ,
   prenom VARCHAR(50) ,
   dtn DATE,
   etu VARCHAR(50) ,
   filiere VARCHAR(50) 
);

CREATE TABLE semestre(
   idSemestre SERIAL PRIMARY KEY,
   nom VARCHAR(50) 
);

CREATE TABLE matiere(
   idMatiere SERIAL PRIMARY KEY,
   nom VARCHAR(50) ,
   code VARCHAR(50) ,
   idSemestre INT,
   credit int,
   FOREIGN KEY(idSemestre) REFERENCES semestre(idSemestre)
);

CREATE TABLE examen(
   idExamen SERIAL PRIMARY KEY,
   daty DATE,
   idMatiere INT,
   FOREIGN KEY(idMatiere) REFERENCES matiere(idMatiere)
);

CREATE TABLE etudiantSemestre(
   idEtudiant INT,
   idSemestre INT,
   PRIMARY KEY(idEtudiant, idSemestre),
   FOREIGN KEY(idEtudiant) REFERENCES etudiant(idEtudiant),
   FOREIGN KEY(idSemestre) REFERENCES semestre(idSemestre)
);

CREATE TABLE etudiantExamen(
   idEtudiant INT,
   idExamen INT,
   FOREIGN KEY(idEtudiant) REFERENCES etudiant(idEtudiant),
   FOREIGN KEY(idExamen) REFERENCES examen(idExamen)
);

create table bilanGeneral(
   idEtudiant int,
   idSemestre int,
   idMatiere int,
   note double precision,
   FOREIGN KEY(idEtudiant) REFERENCES etudiant(idEtudiant),
   FOREIGN KEY(idSemestre) REFERENCES semestre(idSemestre),
   FOREIGN KEY(idMatiere) REFERENCES matiere(idMatiere)
);

insert into etudiant

insert into semestre (nom) values ('Semester 1'), ('Semester 2'), ('Semester 3'), ('Semester 4'), ('Semester 5'), ('Semester 6');

insert into matiere (nom, code, idSemestre, credit) values
('Informatique de base', 'INFO107', 1, 4),
('introduction au web', 'INFO104', 1, 5),
('Programmation procedurale', 'INFO101', 1, 7),
('Analyse mathematique', 'MTH102', 1, 6),
('Arithmetique', 'MTH101', 1, 4),
('Techniques de communication', 'ORG101', 1, 4),

('Base de données relationnelles', 'INFO102', 2, 5),
('Bases de admin systeme', 'INFO103', 2, 5),
('Maintenance materiel et logiciel', 'INFO105', 2, 4),
('Complements de programmation', 'INFO106', 2, 6),
('Calcul vectoriel et matriciel', 'MTH103', 2, 6),
('Probabilite et statistique', 'MTH105', 2, 4);

 
INSERT INTO etudiant (nom, prenom, dtn, etu, filiere) VALUES
('Rabe', 'Jean', '2000-05-15', 'ETU123', 'Informatique'),
('Rakoto', 'Marie', '1999-11-30', 'ETU124', 'Mathématiques'),
('Andry', 'Paul', '2001-03-22', 'ETU125', 'Informatique');

-- Insertion de relations étudiant-semestre
INSERT INTO etudiantSemestre (idEtudiant, idSemestre) VALUES
(1, 1), (1, 2), 
(2, 1), (2, 2),
(3, 1), (3, 2);

-- Insertion de données dans la table examen
INSERT INTO examen (daty, idMatiere) VALUES
('2024-01-10', 1),
('2024-01-15', 2),
('2024-01-20', 3);

-- Insertion de relations étudiant-examen
INSERT INTO etudiantExamen (idEtudiant, idExamen) VALUES
(1, 1), (1, 2), 
(2, 1), (3, 3);