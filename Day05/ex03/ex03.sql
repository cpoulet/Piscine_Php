INSERT INTO ft_table SELECT NULL, nom, 'other', date_naissance FROM fiche_personne WHERE nom LIKE '%a%' AND length(nom) < 9 ORDER BY nom LIMIT 10;
