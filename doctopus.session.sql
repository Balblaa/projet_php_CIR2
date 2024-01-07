UPDATE rendez_vous SET disponible = '1' WHERE id_rendez_vous = 4;

SELECT * FROM rendez_vous;
SELECT * FROM utilisateur u, reserver r, rendez_vous rv
WHERE u.adresse_email = r.adresse_email
AND r.id_rendez_vous = rv.id_rendez_vous;

SELECT * FROM medecin;