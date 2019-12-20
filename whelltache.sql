use whelltache;

SELECT
utilisateur.nom,
utilisateur.age,
utilisateur.password,
civilite.libelle

FROM utilisateur
INNER JOIN civilite  ON civilite.id = utilisateur.civilite_id;