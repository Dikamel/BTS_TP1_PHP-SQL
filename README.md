# BTS_TP1_PHP-SQL
1er TP de mon parcours BTS SIO option SLAM. L'objectif est de mettre en pratique les premières notions de PHP et de SQL via une interface web basique.

Ce projet est une petite application de gestion de stocks permettant de gérer des produits et leurs fournisseurs à l’aide d’une base de données MySQL.

Lien du repo : https://github.com/Dikamel/BTS_TP1_PHP-SQL
---

## Utilisation de l'IA : 

Pour maximisier l'apprentissage, l'IA n'a quasiment pas été utilisée, et que dans le cas de déboguage complexes.
Ce README a été généré par IA. 


## Contexte

Le TP simule une petite entreprise de bricolage qui souhaite informatiser la gestion de ses produits et fournisseurs.
Chaque produit appartient à un fournisseur, et un fournisseur peut posséder plusieurs produits.

Le projet est réalisé en architecture MVC avec PHP orienté objet et une connexion sécurisée à la base de données via PDO.

---

## Fonctionnalités

### Produits
- Liste des produits avec leur fournisseur
- Ajout d’un produit
- Modification d’un produit
- Suppression d’un produit
- Association d’un fournisseur à un produit

### Fournisseurs
- Liste des fournisseurs
- Ajout d’un fournisseur

---

## Technologies utilisées

- PHP (POO)
- MySQL / MariaDB
- PDO (requêtes préparées)
- HTML / CSS
- Bootstrap
- Serveur local XAMPP/WAMP

---

## Installation

1. Cloner le projet

git clone https://github.com/Dikamel/BTS_TP1_PHP-SQL.git

2. Placer le dossier dans le dossier "www" de WAMP

C:\WAMP64\www\

3. Lancer Apache et MySQL dans WAMP

4. Créer la base de données

Aller sur : http://localhost/phpmyadmin

Créer une base appelée :

stock_db

5. Importer la base de données

Onglet "Importer"
Sélectionner le fichier :

database.sql

6. Configurer la connexion

Modifier les informations de connexion dans le fichier .env  :

DB_HOST=localhost
DB_NAME=stock_db
DB_USER=root
DB_PASS=

7. Lancer le site

Dans le navigateur :

http://localhost/BTS_TP1_PHP-SQL/public

---

## Structure du projet

public/        → point d’entrée du site (index.php)
src/
  controllers/ → logique applicative
  models/      → accès aux données (SQL)
  services/    → connexion à la BDD
templates/     → vues (pages affichées)
database.sql   → script de création de la base

Le projet suit le modèle MVC (Modèle / Vue / Contrôleur) pour séparer l’affichage, la logique et l’accès aux données.

---

## Base de données

La base contient 2 tables principales :

- products : informations sur les produits (nom, prix, stock, fournisseur…)
- suppliers : informations sur les fournisseurs

Relation :
Un fournisseur peut avoir plusieurs produits, mais un produit ne possède qu’un seul fournisseur.

---

## Auteur

Ilan V
BTS SIO SLAM — 1ère année
Année scolaire 2025-2026

---

## Remarque

Projet réalisé dans un but pédagogique pour apprendre :
- le PHP en relation avec SQL
- les requêtes SQL
- l’utilisation de PDO
- le fonctionnement du MVC

