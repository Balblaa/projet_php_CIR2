# Doctopus

Doctopus est coder en html, css, javascript, php en cours de communication web. C'est un projet sous forme d'un site web semblable à Doctolib dans sont fonctionnement ( du point de vue du client ). Ce projet avait pour but de nous innitier à Ajax et l'architecture REST, en nous faisant travailler en autonomie à partir de seulement un cahier des charges.

Pour lancer le site il faut avoir déjà d'installer Apache2 et Postgresql.
Tout d'abord télécharger le dossier compresser avec tous les fichiers.
Il faut lancer apache2 et postgresql en lien la base de données.
~ pour lancer apache2 : sudo service apache2 start
~ pour lancer postgresql : sudo service postgresql start
~ Une base de données un peu remplis est donner dans "doctopus_BDD.sql"

Ce site est complet au niveau du point de vue du client, il y a :
- une page accueil
- une page recherche, afin de rechercher des practiciens selon leur localisation, leur nom, leur genre, ou encore leur profession
- une page rendez-vous, si vous être connecter vous avez accès à tout vos rendez-vous ainsi que la possibilité de reprendre rendez-vous avec le même practicien
- une page inscription, afin de s'inscrire pour se connecté après
- une page authentification, pour vous connectez
- un bouton déconnexion, pour se déconnecté

Architecture :
*
├── CSS
│   ├── all.css
│   ├── footer.css
│   └── header.css
├── DB
│   ├── base_doctopus.mcd
│   ├── database.php
│   ├── doctopus_BDD.sql
│   └── doctopus.sql
├── doctopus.session.sql
├── HTML
│   └── index.html
├── JS
│   ├── ajax.js
│   ├── authentification.js
│   ├── inscription.js
│   ├── link.js
│   ├── recherche.js
│   └── rendez_vous.js
├── PHP
│   ├── authentification.php
│   ├── inscription.php
│   ├── recherche.php
│   ├── rendez_vous.php
│   └── request.php
├── projet_php_groupe3_CIR2.zip
├── README.md
└── settings.json

Cahier des charges :
- Pas de rechargement de page
- Utiliser la structure REST
- Inclure Ajax dans le projet