DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS projects;
DROP TABLE IF EXISTS categories;

CREATE TABLE IF NOT EXISTS users (
    id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    login VARCHAR(20) NOT NULL UNIQUE,
    mdp VARCHAR(255) NOT NULL,
    admin BOOLEAN DEFAULT 0,
    PRIMARY KEY (id)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

-- mdp root = root
INSERT INTO users (login, mdp, admin) VALUES
('root', '$2y$10$Z2moSqCik0FJ83N2tdL6sOP5FK.XoVkArELu1JPTqzgVBY9P3LX3y', 1);

CREATE TABLE IF NOT EXISTS projects (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(40) NOT NULL,
    price FLOAT NOT NULL,
    categorie SMALLINT UNSIGNED NOT NULL,
    description TEXT DEFAULT NULL,
    image VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (id)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

-- image should be added
INSERT INTO projects (name, price, categorie, description) VALUES
('42 Commandements', 0.5, 1, "Bienvenue à 42, jeune cadet ! Avant d'entamer ton cursus, il est temps de savoir ce que l on attends de toi tout au long de ta scolarité."),
('Piscine Reloaded', 8, 1, "Revoyez les bases de la piscine avec une suite d'exercices tirée des sujets de celle-ci."),
('Libft', 42, 1, "Ce premier projet en tant qu'étudiant de 42 va vous faire consolider vos acquis de piscine. Vous allez recoder un certain nombre de fonctions de la librairie C standard, ainsi que d'autres fonctions utilitaires que vous réutiliserez tout au long de votre cursus."),
('Fillit', 30, 1, "Fillit est un projet vous permettant de découvrir et/ou de vous familiariser avec une problématique récurrente en programmation : la recherche d'un solution optimale parmi un très grand nombre de possibilités, dans un délai raisonnable. Dans le cas de ce projet, il s'agira d'agencer des Tetriminos entre eux et de déterminer le plus petit carré possible pouvant les accueillir."),
('Get_Next_Line', 50, 1, "Qu'il s'agisse d'un fichier, de l'entrée standard, ou même plus tard d'une connexion réseau, vous aurez toujours besoin de lire du contenu ligne par ligne. Il est donc temps de vous attaquer à cette fonction, indispensable pour un certain nombre de vos prochains projets."),
('ft_printf', 200, 2, "Vous en avez assez de faire vos affichages en alternant ft_putstr et ft_putnbr ? Vous n'avez pas le droit d'utiliser printf ? Recodez le votre ! Ce sera l'occasion de découvrir une feature du C - les fonctions variadiques - et de vous entrainer à la gestion fine des options d'affichage. Vous aurez ensuite le droit d'utiliser votre printf dans tous vos projets ultérieurs."),
('filler', 120, 2, "Créez votre joueur pour affronter d’autres étudiants sur le célèbre (ou pas) plateau du Filler. Le principe est simple : deux joueurs s’affrontent sur un plateau, et doivent placer, tour à tour, la pièce que le maître du jeu (fourni sous la forme d’un exécutable Ruby) leur donne, gagnant ainsi des points. La partie s’arrête dès qu’une pièce ne peut plus être placée. Petit projet ludique !"),
('Push_swap', 150, 2, "Ce projet vous demande de trier des données sur une pile, avec un set d’instructions limité, en moins de coups possibles. Pour le réussir, vous devrez manipuler différents algorithmes de tri et choisir la (ou les ?) solution la plus appropriée pour un classement optimisé des données."),
('Lem-in', 150, 2, "Votre colonie de foumis doit se déplacer d'un point à un autre. Mais comment faire pour que cela prenne le moins de temps possible ? Ce projet vous fait découvrir les algorithmes de parcours de graphe : votre programme devra sélectionner intelligemment les chemins et les mouvements précis qui doivent être empruntés par ces fourmis."),
('Corewar', 500, 2, "Ce projet vous invite à créer une arène virtuelle et à y faire s’affronter des programmes codés dans un langage simpliste. Vous allez ainsi aborder la conception d’une VM (avec les instructions qu’elle reconnait, les registres, etc), et les problématiques de compilation d’un langage assembleur en bytecode. Avec, en bonus, le plaisir de faire s’affronter vos champions sur votre arène !"),
('ft_ls', 100, 3, "Pour tout connaitre du filesystem, de la façon dont sont rangés les fichiers et répertoires, codez par vous-même une des commandes les plus utilisées : ls ."),
('minishell', 150, 3, "Premier palier de réalisation d'un shell, vous devrez pour ce projet réaliser un mini-shell capable de prompter l'utilisateur pour une commande, rechercher le binaire sur la machine, et l'exécuter. Vous devrez également implémenter quelques builtins basiques."),
('21sh', 200, 3, "Vous allez repartir de votre minishell et le rendre plus robuste pour vous approcher petit à petit d'un vrai shell fonctionnel. Vous allez ici ajouter divers features, telles que la gestion du multi-commande, des différentes redirections, ainsi que l'édition de ligne pour pouvoir éditer la ligne de commande à la volée."),
('42sh', 500, 3, "Ce projet consiste à créer de toutes pièces un shell complet, en reprenant le travail effectué sur votre 21sh. Un jeu minimum de fonctionnalités vous sont demandées, à partir duquel vous allez constuire votre propre shell abouti - en allant potentiellement jusqu'au job control et au shell script. Ce projet vous permet donc de voir ou revoir une très large palette des fonctionnalités UNIX (et POSIX) standard."),
('Camagru', 200, 5, "Ce premier projet vous remet dans le bain après la piscine PHP : vous allez devoir réaliser, en PHP, un petit site Instagram-like permettant à des utilisateurs de réaliser et partager des photo-montages. Vous allez ainsi implémenter, à mains nues (les frameworks sont interdits), les fonctionnalités de base rencontrées sur la majorité des sites possédant une base utilisateur."),
('Matcha', 250, 5, "Ce second projet vous introduit à un outil plus évolué pour réaliser vos applications web : le micro-framework. Nous vous invitons à réaliser, dans le langage de votre choix, un site de rencontres. Les interactions entre utilisateurs seront au coeur du projet !"),
('Hypertube', 500, 5, "Dernier projet de sa série, le projet Hypertube vous invite à découvrir une catégorie d outil extrêmement puissante : les frameworks MVC. Vous apprendrez à manipuler un MVC, dans le langage de votre choix, pour réaliser un site de streaming de video téléchargées via le protocole BitTorrent.");

CREATE TABLE IF NOT EXISTS categories (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(40) NOT NULL,
    value SMALLINT UNSIGNED NOT NULL UNIQUE,
    PRIMARY KEY (id)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

INSERT INTO categories (name, value) VALUES
('Base', 1),
('Algo', 2),
('System', 3),
('Graphic', 4),
('Web', 5);

