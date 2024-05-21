-- Insertion des médecins avec leurs IDs
INSERT INTO public.Medecin (id_medecin, Adresse_Email, Nom, Prenom, Telephone, Localisation, mot_de_passe, Specialite, id_genre) VALUES
(1, 'docjohndoe@example.com', 'Doe', 'John', 98743210, '123 Rue de Paris, Paris', 'docpassword123', 'Cardiologue', 1),
(2, 'docjanedoe@example.com', 'Doe', 'Jane', 87652109, '456 Rue de Lyon, Lyon', 'docpassword456', 'Dermatologue', 0),
(3, 'docalexsmith@example.com', 'Smith', 'Alex', 76521098, '789 Rue de Marseille, Marseille', 'docpassword789', 'Généraliste', 0),
(4, 'docmariecurie@example.com', 'Curie', 'Marie', 65430987, '123 Rue de Lille, Lille', 'docpassword101', 'Oncologue', 0),
(5, 'docalberteinstein@example.com', 'Einstein', 'Albert', 54329876, '456 Rue de Bordeaux, Bordeaux', 'docpassword202', 'Neurologue', 1),
(6, 'doccharlesdarwin@example.com', 'Darwin', 'Charles', 43218765, '789 Rue de Nantes, Nantes', 'docpassword303', 'Généticien', 1);

-- Insertion des rendez-vous
INSERT INTO public.rendez_vous (Date, Heure, id_medecin, disponible) VALUES
('2024-06-01', '10:00:00+02', 1, '1'),
('2024-06-02', '11:00:00+02', 2, '1'),
('2024-06-03', '12:00:00+02', 3, '1'),
('2024-06-04', '13:00:00+02', 4, '1'),
('2024-06-05', '14:00:00+02', 5, '1'),
('2024-06-06', '15:00:00+02', 6, '1'),
('2024-06-07', '09:00:00+02', 1, '1'),
('2024-06-08', '10:30:00+02', 2, '1'),
('2024-06-09', '11:45:00+02', 3, '1'),
('2024-06-10', '13:15:00+02', 4, '1'),
('2024-06-11', '14:30:00+02', 5, '1'),
('2024-06-12', '15:00:00+02', 6, '1'),
('2024-06-13', '09:00:00+02', 1, '1'),
('2024-06-14', '10:00:00+02', 2, '1'),
('2024-06-15', '11:00:00+02', 3, '1'),
('2024-06-16', '12:00:00+02', 4, '1'),
('2024-06-17', '13:00:00+02', 5, '1'),
('2024-06-18', '14:00:00+02', 6, '1');
