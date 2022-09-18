
# ECF - Part 1 - Projet bibliothèque - BDD

Le but de cet exercice est de maîtriser la création d'une base de données (BDD) qui sera utilisée dans une application web dynamique.

## Cahier des charges

Vous devez créer une BDD qui implémente la structure et les données indiquées plus bas.

Attention : l'accès à la BDD doit être limité à un unique utilisateur ayant le minimum possible de privilèges.

Pour créer la BDD, vous avez le choix des armes : SQL vanila, PHPMyAdmin, Doctrine (Symfony), Eloquent (Laravel), etc.
Mais vous êtes vivement encouragé à utiliser Symfony.

## Livrables

La BDD et les données doivent être livrées sous la forme d'un repository git en ligne sur un site comme github, gitlab ou autre.

Vous avez deux options : soit vous créez la BDD en utilisant un framework PHP soit vous la créez sans utiliser de framework PHP.

En fonction de votre choix, le repository doit contenir les fichiers suivants :

1. avec framework PHP
  - un fichier `README.md` (voir ci-dessous)
  - un ou des fichiers PHP contenant le code de création de la BDD
  - un ou des fichiers PHP contenant le code de création des données indispensables
  - un ou des fichiers PHP contenant le code de création des données de test
  - un fichier image (photo ou schéma) qui représente visuellement le schéma de la structure de la BDD (méthode Merise ou UML au choix)
2. sans framework PHP
  - un fichier `README.md` (voir ci-dessous)
  - un fichier SQL contenant le code de création de l'utilisateur de la BDD
  - un fichier SQL contenant le code de création de la BDD
  - un fichier SQL contenant les données indispensables
  - un fichier SQL contenant les données de test
  - un fichier image (photo ou schéma) qui représente visuellement le schéma de la structure de la BDD (méthode Merise ou UML au choix)

Dans tous les cas, le fichier `README.md` doit indiquer la procédure à suivre pour :

- si nécessaire, installer les dépendances (avec composer par exemple)
- créer l'utilisateur de la BDD
- créer la BDD
- créer la structure de la BDD
- injecter les données indispensables
- injecter les données de test

Optionnellement, vous pouvez aussi fournir un script Bash qui réalise chacune de ces opérations.

## Prérequis

- MariaDB
- PHPMyAdmin

Si vous utilisez Symfony :

- PHP 7.x ou 8.x
- composer

## Structure de la BDD, données indispensables et données de test

### User

Attributs :

- id : clé primaire
- email : varchar 190
- roles : text
- password : varchar 190
- enabled : boolean
- created_at : datetime
- updated_at : datetime

Relations :

- aucune

Données indispensables :

| id | email               | roles              | password                                                     | enabled | created_at        | updated_at        |
|----|---------------------|--------------------|--------------------------------------------------------------|---------|-------------------|-------------------|
| 1  | admin@example.com   | ["ROLE_ADMIN"]     | $2y$10$/H2ChUxriH.0Q33g3EUEx.S2s4j/rGJH2G88jK9nCP60GbUW8mi5K | true    | 20200101 09:00:00 | 20200101 09:00:00 |
| 2  | foo.foo@example.com | ["ROLE_EMRUNTEUR"] | $2y$10$/H2ChUxriH.0Q33g3EUEx.S2s4j/rGJH2G88jK9nCP60GbUW8mi5K | true    | 20200101 10:00:00 | 20200101 10:00:00 |
| 3  | bar.bar@example.com | ["ROLE_EMRUNTEUR"] | $2y$10$/H2ChUxriH.0Q33g3EUEx.S2s4j/rGJH2G88jK9nCP60GbUW8mi5K | false   | 20200201 11:00:00 | 20200501 12:00:00 |
| 4  | baz.baz@example.com | ["ROLE_EMRUNTEUR"] | $2y$10$/H2ChUxriH.0Q33g3EUEx.S2s4j/rGJH2G88jK9nCP60GbUW8mi5K | true    | 20200301 12:00:00 | 20200301 12:00:00 |

Note : le mot de passe haché correspond au mot de passe clair `123`.

Données de test : 100 users dont les données sont générées aléatoirement

Attention : chaque user doit être relié à un emprunteur mais n'oubliez pas que la relation est unidirectionnelle et qu'elle n'est visible que depuis l'emprunteur

### Livre

Attributs :

- id : clé primaire
- titre : varchar 190
- annee_edition : int, nullable
- nombre_pages : int
- code_isbn : varchar 190, nullable

Relations :

- auteur : many to one
- genres : many to many
- emprunts : one to many

Données indispensables :

| id | titre                       | annee_edition | nombre_pages | code_isbn     | auteur_id |
|----|-----------------------------|---------------|--------------|---------------|-----------|
| 1  | Lorem ipsum dolor sit amet  | 2010          | 100          | 9785786930024 | 1         |
| 2  | Consectetur adipiscing elit | 2011          | 150          | 9783817260935 | 2         |
| 3  | Mihi quidem Antiochum       | 2012          | 200          | 9782020493727 | 3         |
| 4  | Quem audis satis belle      | 2013          | 250          | 9794059561353 | 4         |

| livre_id | genre_id |
|----------|----------|
| 1        | 1        |
| 2        | 2        |
| 3        | 3        |
| 4        | 4        |

Données de test : 1000 livres dont les données sont générées aléatoirement.
N'oubliez pas créer également les relations.

### Auteur

Attributs :

- id : clé primaire
- nom : varchar 190
- prenom : varchar 190

Relations :

- livres : one to many, nullable

Données indispensables :

| id | nom            | prenom |
|----|----------------|--------|
| 1  | auteur inconnu |        |
| 2  | Cartier        | Hugues |
| 3  | Lambert        | Armand |
| 4  | Moitessier     | Thomas |

Données de test : 500 auteurs dont les données sont générées aléatoirement

### Genre

Attributs :

- id : clé primaire
- nom : varchar 190
- description : text, nullable

Relations :

- livres : many to many

Données indispensables :

| id | nom              | description |
|----|------------------|-------------|
| 1  | poésie           | NULL        |
| 2  | nouvelle         | NULL        |
| 3  | roman historique | NULL        |
| 4  | roman d'amour    | NULL        |
| 5  | roman d'aventure | NULL        |
| 6  | science-fiction  | NULL        |
| 7  | fantasy          | NULL        |
| 8  | biographie       | NULL        |
| 9  | conte            | NULL        |
| 10 | témoignage       | NULL        |
| 11 | théâtre          | NULL        |
| 12 | essai            | NULL        |
| 13 | journal intime   | NULL        |

Données de test : aucunes

### Emprunteur

Attributs :

- id : clé primaire
- nom : varchar 190
- prenom : varchar 190
- tel : varchar 190
- actif : boolean
- created_at : datetime
- updated_at : datetime

Relations :

- emprunts : one to many
- user : one to one, unidirectionnel

Données indispensables :

| id | nom | prenom | tel       | actif | created_at        | updated_at        | user_id |
|----|-----|--------|-----------|-------|-------------------|-------------------|---------|
| 1  | foo | foo    | 123456789 | true  | 20200101 10:00:00 | 20200101 10:00:00 | 2       |
| 2  | bar | bar    | 123456789 | false | 20200201 11:00:00 | 20200501 12:00:00 | 3       |
| 3  | baz | baz    | 123456789 | true  | 20200301 12:00:00 | 20200301 12:00:00 | 4       |

Données de test : 100 emprunteurs dont les données sont générées aléatoirement

Attention : chaque emprunteur doit être relié à un compte user

### Emprunt

Attributs :

- id : clé primaire
- date_emprunt : datetime
- date_retour : datetime, nullable

Relations :

- emprunteur : many to one, not nullable
- livre : many to one, not nullable

Données indispensables :

| id | date_emprunt        | date_retour         | emprunteur_id | livre_id |
|----|---------------------|---------------------|---------------|----------|
| 1  | 2020-02-01 10:00:00 | 2020-03-01 10:00:00 | 1             | 1        |
| 2  | 2020-03-01 10:00:00 | 2020-04-01 10:00:00 | 2             | 2        |
| 3  | 2020-04-01 10:00:00 | NULL                | 3             | 3        |

Données de test : 200 emprunts dont les données sont générées aléatoirement

# ECF - Part 2 - Projet bibliothèque - Composants d'accès aux données

Le but de cet exercice est de maîtriser l'utilisation de composants d'accès aux données d'une application web dynamique.

Note : cet exercice prolonge l'exercice de création de BDD.

## Cahier des charges

Vous devez utiliser des composants d'accès aux données qui réalise les requêtes indiquées plus bas.

Attention : l'accès à la BDD doit être effectué via un unique utilisateur ayant été créé à cet effet.

Vous pouvez utiliser les composants d'accès au données de votre choix : PHP vanila, Doctrine (Symfony) ou Eloquent (Laravel) par exemple.
Mais vous êtes vivement encouragé à utiliser Doctrine.

## Livrables

Le code doit être livré sous la forme d'un repository git en ligne sur un site comme github, gitlab ou autre.

Vous avez deux options : soit vous utilisez les composants d'accès aux données d'un framework PHP soit vous n'utilisez aucun framework PHP.

Quelque soit votre choix, le repository doit contenir les fichiers suivants :

- un fichier `README.md` (voir ci-dessous)
- un ou des fichiers PHP contenant des requêtes qui utilisent des composants d'accès aux données

Le fichier `README.md` doit indiquer la procédure à suivre pour :

- si nécessaire, installer les dépendances (avec composer par exemple)
- lancer le serveur web
- montrer l'URL à ouvrir pour tester les requêtes d'accès aux données

Attention : en fonction de vos données de test, il se peut que certaines requêtes ne renvoient aucunes données.
Dans ce cas, ne vous inquiétez pas.
Ce qui est évalué, c'est le fonctionnement correct des requêtes, pas la présence ou l'absence de résultats.

## Prérequis

- MariaDB
- PHPMyAdmin
- la BDD du projet bibliothèque

Si vous utilisez Symfony :

- PHP 7.x ou 8.x
- composer

## Les requêtes

### Les utilisateurs

Requêtes de lecture :

- la liste complète de tous les utilisateurs (de la table `user`)
- les données de l'utilisateur dont l'id est `1`
- les données de l'utilisateur dont l'email est `foo.foo@example.com`
- les données des utilisateurs dont l'attribut `roles` contient le mot clé `ROLE_EMRUNTEUR`

### Les livres

Requêtes de lecture :

- la liste complète de tous les livres
- les données du livre dont l'id est `1`
- la liste des livres dont le titre contient le mot clé `lorem`
- la liste des livres dont l'id de l'auteur est `2`
- la liste des livres dont le genre contient le mot clé `roman`

Requêtes de création :

- ajouter un nouveau livre
  - titre : Totum autem id externum
  - année d'édition : 2020
  - nombre de pages : 300
  - code ISBN : 9790412882714
  - auteur : Hugues Cartier (id `2`)
  - genre : science-fiction (id `6`)

Requêtes de mise à jour :

- modifier le livre dont l'id est `2`
  - titre : Aperiendum est igitur
  - genre : roman d'aventure (id `5`)

Requêtes de suppression :

- supprimer le livre dont l'id est `123`

### Les emprunteurs

Requêtes de lecture :

- la liste complète des emprunteurs
- les données de l'emprunteur dont l'id est `3`
- les données de l'emprunteur qui est relié au user dont l'id est `3`
- la liste des emprunteurs dont le nom ou le prénom contient le mot clé `foo`
- la liste des emprunteurs dont le téléphone contient le mot clé `1234`
- la liste des emprunteurs dont la date de création est antérieure au 01/03/2021 exclu (c-à-d strictement plus petit)
- la liste des emprunteurs inactifs (c-à-d dont l'attribut `actif` est égal à `false`)

### Les emprunts

Requêtes de lecture :

- la liste des 10 derniers emprunts au niveau chronologique
- la liste des emprunts de l'emprunteur dont l'id est `2`
- la liste des emprunts du livre dont l'id est `3`
- la liste des emprunts qui ont été retournés avant le 01/01/2021
- la liste des emprunts qui n'ont pas encore été retournés (c-à-d dont la date de retour est nulle)
- les données de l'emprunt du livre dont l'id est `3` et qui n'a pas encore été retournés (c-à-d dont la date de retour est nulle)

Requêtes de création :

- ajouter un nouvel emprunt
  - date d'emprunt : 01/12/2020 à 16h00
  - date de retour : aucune date
  - emprunteur : foo foo (id `1`)
  - livre : Lorem ipsum dolor sit amet (id `1`)

Requêtes de mise à jour :

- modifier l'emprunt dont l'id est `3`
  - date de retour : 01/05/2020 à 10h00

Requêtes de suppression :

- supprimer l'emprunt dont l'id est `42`
