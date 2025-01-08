# **Projet PHP :** Doctolib

# **Description :**

Ce site web à été fait lors d'une projet scolaire de PhP a l'ISEN afin de faire un site fonctionel en full stack.
L'objectif été de recrée un site similaire a doctolib ou un utilisatuer pourait s'y inscrire et prendre rendez-vous avec de medecin eux meme inscrit.

 # **Comment Installer :**

**Installation Debian :**

**Installation Apache2 :**

Dans le terminal de WSL ecrire cette ligne de commande afin d'installer Apache2.

`sudo apt-get install apache2`

Pour vérifier que l'installation ait bien fonctioner vous pouvez lancer le serveur Apache2 avec `sudo service apache2 start` puis cherchez "localhost" dans votre navigateur aux choix, si une page Apache2 s'ouvre l'installation c'est bien faite.

**Installation PhP :**

Dans le terminal de WSL ecrire cette ligne de commande afin d'installer le module PhP

`sudo apt install php libapache2-mod-php`

**Installation du Site :**

Vous pouvez désormais installer le site dans Le localhost qui ce trouve depuis l'instalation d'Apache2 dans `/var/www/html` ou `/var/www/devroot`.

Desormais en cherchant "localhost/projetPHPCIR2" vous devriez étre rediriger vers la page de connection.

Si ce n'est pas le cas il se peut que vous n'ayez pas démarez le serveur avec la commande `sudo service apache2 start`.

# **Instalations Bonus :**
[Avec les cours de serveur web, bloquer l'access au dossiers css et php]