UPDATE rendez_vous SET disponible = '0' WHERE id_rendez_vous = 6;
INSERT INTO reserver (id_rendez_vous, adresse_email) VALUES (6 , 'valentin.dronne@isen-ouest.yncrea.fr');
SELECT * FROM rendez_vous;