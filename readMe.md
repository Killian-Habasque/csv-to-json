

# Conversion Json App ✨🎉✨

## Contexte
Cette application a pour but de convertir des fichiers spécifiques au format Json.
Elle a été créée dans le but d'une évaluation par Killian Habasque, étudiant à ECV en Mastère Développement web.

Vous retrouvez ci dessous toute la documentation nécessaire.

## Techno utilisée 🔧

Pour la création de ce projet, nous avons pour objectif d'utiliser le langage de développement PHP. Afin d'être plus efficace dans le développement de notre application, nous avons ajouté l'outil de versionning git avec github.

#### PHP
PHP est principalement conçu pour servir de langage de script coté serveur, ce qui fait qu'il est capable de réaliser tout ce qu'un script CGI quelconque peut faire, comme collecter des données de formulaire, générer du contenu dynamique, ou gérer des cookies.

#### GIT
Git permet de faciliter la collaboration en permettant de revenir sur les anciennes versions. La plateforme GitHub va contenir quant à elle les dépôts dans le cloud afin que les développeurs arrivent à travailler sur un même projet et distinguent en temps réel les modifications apportées par les autres développeurs.

## Énoncée 🚨
Créer un formulaire sur une page, permettant d’uploader des fichiers CSV, de les
transformer en json, puis d’enregistrer les json en local

• Users stories :
- En tant qu’utilisateur lorsque je suis sur la page racine du site, il y a un
formulaire avec un input me permettant d’uploader un fichier csv.
- Lorsque je soumet le formulaire, le fichier transformé est enregistré dans le
projet.
- Lorsque j’ai soumis un fichier un lien de téléchargement du json s’affiche. Au
click, le fichier se télécharge sur mon navigateur.

### Version 1
Réaliser l’exercice le plus rapidement possible avec le code le plus lisible possible.

### Version 2
Créer une version 2 (le formulaire sera sur l’url “/version-2”gardez le code de la première version) qui sera une version refactorisée en POO et pourra en plus convertir du xml en json.


## Développement 👷

### Version 1
Pour accéder à la version 1, cela se trouve à la racine du projet : [index.php](index.php)
On peut retrouver le formulaire Html avec la méthode post qui permet d'upload le fichier CSV. Il redirige vers la page result.

Par la suite, nous récupérons les données du formulaire pour ensuite les convertir et les télécharger sur le second fichier : [result.php](result.php),

🚩Les fichiers sont enregistrés dans un dossier "storage" défini dans une variable. Si le fichier est déjà existant, une clé, définie en variable, et un chiffre sont ajoutés à son nom d'upload (créer dans le but de ne pas écraser un fichier qui a le même nom. Exemple un utilisateur veut upload pokemon2 sauf qu'il existe déjà, avec la clé le fichier est bien enregistré ). Oui si l'utilisateur connaît la clé, il peut casser le systeme ! 🎉


### Version 2
La version 2, correspond au code en POO. 
Pour tester, on se rend sur cette page : [version-2.php](version-2.php)
De plus, on retrouve un select maintenant qui nous permet de choisir entre la conversion CSV ou XML.

On dispose d'une classe ConvertInstance qui permet de gérer la conversion globale et le téléchargement.
La classe File gère la conversion/ le téléchargement/ récupération du nom.. Tout ce qui est en rapport avec le fichier.
La récupération du fichier se fait maintenant sur [result-2.php](result-2.php), on peut retrouver un lien de téléchargement qui redirige vers [download.php](download.php) qui permet de télécharger notre fichier.


## Tester l'application 📝
Template CSV/ XML
[Dossier /file](file)


## Contact 🚀
killian.habasque@gmail.com
