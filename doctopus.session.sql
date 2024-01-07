SELECT r.adresse_email, rv.date, rv.heure, m.nom, m.specialite, m.localisation
FROM medecin m, reserver r, rendez_vous rv
WHERE r.id_rendez_vous = rv.id_rendez_vous
AND m.id_medecin = rv.id_medecin ;
AND 
ORDER BY rv.date, rv.heure, m.nom ;