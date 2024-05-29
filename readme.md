# TP

## Partie 1

Faire un formulaire d'inscription à une newsletter. On doit retrouver : 

- 1 page permettant de s'inscrire (mail obligatoire + nom (optionnel) + prenom (optionnel))
- 1 page permettant d'afficher la totalité des inscrits. Cette page ne doit afficher le contenu QUE avec un système de protection par mot de passe (géré en GET via l'URL)


### Étapes

1. Créer la page "index.php" avec le formulaire de récupération des emails
2. Créez votre BDD pour le projet
3. Gérez sur la même page la connexion avec votre BDD
4. Gérez la récupération des informations depuis le formulaire
5. Enregistrez les infos en BDD avec PDO
6. Créez la page "admin.php" qui doit afficher toutes les adresses mail. Intégrez un formulaire pour saisir le MDP
7. Intégrez la condition qui permet de n'afficher les résultats QUE si le MDP choisi est bon ($_GET)
8. Gérez la connexion BDD sur la page admin.php
9. Récupérez les contenus depuis la BDD sur les inscrits à la newsletter
10. Afficher les résultats dans un tableau


## Partie 2
1. Ajouter un bouton en JS qui permette de copier dans le presse papier toutes les adresses mail de la forme : "addr1 addr2 addr3 etc..." (un espace entre chaque adresse mail).
2. Pouvoir "désactiver" les adresses mails à partir de la BDD. Les adresses désactivées ne sont pas copier dans le presse papier à partir du bouton 1. Pour la partie copier/colle, vous pouvez vous servir des "data-attributes" du HTML, avec notamment la propriété "dataset".


## Partie 3
1. Permettre aux gens de se désinscrire en créant une page "unsubscribe.php". Mettre un formulaire leur permettant de saisir l'adresse mail pour laquelle ils doivent se désinscrire.
2. Refactorez votre code. Regrouper l'ensemble des informations de connexion à la base de données dans un seul fichier. Extrayez le traitement des informations dans des fichiers PHP spécifiques.