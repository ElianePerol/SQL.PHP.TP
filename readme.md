# Gestion d'Abonnement Newsletter - TP PHP & SQL (Procédural)

## Contexte du Projet
Réalisé dans le cadre de mon **BTS SIO SLAM**, ce projet consiste à développer un système d'abonnement à une newsletter en utilisant **PHP** et **SQL** dans un style **procédural**. 
Le système permet aux utilisateurs de s'inscrire à une newsletter, de consulter la liste des abonnés protégée par mot de passe, et d'implémenter des fonctionnalités supplémentaires telles que la copie des adresses e-mail et la désinscription.

## Objectifs
Le système développé permet :
- La gestion des inscriptions à une newsletter via un formulaire HTML.
- La consultation de la liste des abonnés dans une page d'administration protégée par mot de passe.
- L'implémentation d'une fonctionnalité pour copier les adresses e-mail.
- La possibilité de désactiver les abonnements via une mise à jour dans la base de données.
- La possibilité de se désinscrire de la newsletter via un formulaire.
- Une organisation procédurale du code PHP, avec l'utilisation de fonctions et d'un accès à la base de données via **PDO**.

## Structure du Projet

### Partie 1 : Inscription et Affichage des Inscrits

1. **Page d'Inscription (index.php)** :
   - Formulaire permettant de saisir un e-mail (obligatoire), et un nom et prénom (optionnels).
   - Les données sont envoyées et traitées par PHP et enregistrées dans la base de données à l'aide de PDO.

2. **Base de données** :
   - Une base de données MySQL est utilisée pour stocker les informations des abonnés.
   - Une table `abonnés` contient les champs suivants : `id`, `email`, `nom`, `prenom`, `status`.

3. **Page d'Administration (admin.php)** :
   - Cette page permet d'afficher la liste des abonnés sous forme de tableau.
   - L'accès à cette page est protégé par un mot de passe passé en **GET** dans l'URL.
   - La page interroge la base de données et récupère les informations des inscrits seulement si le mot de passe est correct.

### Partie 2 : Fonctionnalités Avancées

1. **Copie des adresses e-mail (JavaScript)** :
   - Un bouton permet de copier toutes les adresses e-mail des abonnés sous la forme : `"addr1 addr2 addr3 ..."`.
   - Les adresses e-mail sont récupérées via les **data-attributes** du HTML et traitées en JavaScript.

2. **Désactivation des adresses e-mail** :
   - Les utilisateurs peuvent désactiver leurs abonnements via la mise à jour du champ `status` dans la base de données.
   - Les adresses e-mail désactivées ne seront pas copiées dans le presse-papier.

### Partie 3 : Désinscription et Refactorisation

1. **Désinscription des abonnés (unsubscribe.php)** :
   - Une page permet à l'utilisateur de saisir son adresse e-mail pour se désinscrire de la newsletter.
   - L'utilisateur passe en status "désactivé" dans la base de donnée.
