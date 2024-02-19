# Mise en route de votre site.
## Execution du site en local
### _Elements prérequis :_

> Telechargez ces logiciels et installez les en suivant ce qui est indiqué sur l'écran

| Logiciels | Lien de téléchargement |
| ------ | ------ |
| XAMPP | [https://www.apachefriends.org/download.html][PlDb] |
| MySQL | [https://dev.mysql.com/downloads/installer/][PlGh] |

### _Démarche à suivre pour executer le site en local :_
> Execution de XAMPP

- Lancez XAMPP
- Cliquez sur le bouton "Explorer". Cherchez le dossier le dossier "htdocs" puis glissez y le fichier du site "ecf"
- Retournez sur XAMPP et cliquez sur "Start" à droite de la ligne "Apache"

> Execution de MySQL

- Après avoir initialisé MySQL ainsi que la base de donnée local durant l'installation, 
ouvrez la base de donnée et connectez vous avec l'utilisateur "root" que vous avez crée durant l'installation
- Une fois que vous êtes connecté. Ouvrez depuis la fenètre de MySQL le fichier init.sql situé dans le dossier "ecf" du site.
- Lancez le script SQL en cliquant sur le logo d'éclair seul en haut de la fenêtre de MySQL.
- Votre base de donnée est initialisée
- Ouvrez votre site depuis votre navigateur web depuis le lien : http://localhost/ecf

### _Création du compte administrateur pour le back-office_
- Une fois votre site lancé. Connectez vous sur ce lien : http://localhost/ecf/admin.php
- Vous pourrez y indiquer les informations du compte administrateur

`!ATTENTION! Cette action est irréversible. Cette page est à usage unique !`