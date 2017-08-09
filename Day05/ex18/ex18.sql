SELECT id_distrib, nom FROM distrib WHERE id_distrib BETWEEN 62 AND 71 OR id_distrib IN (42, 88, 89, 90) OR nom REGEXP '^[^yY]*[yY][^yY]*[yY][^yY]*$' LIMIT 5 OFFSET 2;
