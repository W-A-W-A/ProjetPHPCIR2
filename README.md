# **Projet PHP :** Doctolib

# **Description :**

Ce site web à été fait lors d'une projet scolaire de PhP a l'ISEN afin de faire un site fonctionel en full stack.
L'objectif été de recrée un site similaire a doctolib ou un utilisatuer pourait s'y inscrire et prendre rendez-vous avec de medecin eux meme inscrit.

 # **Comment Installer :**

**Installation Debian :**

Voir : `https://wiki.debian.org/InstallingDebianOn/Microsoft/Windows/SubsystemForLinux`

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

Les changement suivant ne change pas le fonctionnement du site et ne sont pas nessessaire !

Pour voir les changement que vous faitez il faudra utiliser `sudo service apache2 reload` afin de voir les modifications.

Tous les changements suivants seront a faire dans le dossier `etc/apache2/sites-available`.

Vous pouvez ensuite copier le fichier `000-default.conf` et cree un nouveau fichier dans le quelle vous rajouterait les modifications qui suivent.

Pour activer la configuration que vous allez crée utiliser `a2enconf` puis selectionner votre ficher, il faut aussi dessactiver les autres configurations avec `a2disconf`.

**Changer le Root :**

Modifier l'attribut `DocumentRoot` pour que la racine soit dans le dossier du site/projet.

**Changer l'url :**

Rajouter `ServerName doctolib` a la ligne qui suit "DocumentRoot".

Ceci permetera de simplement écrire doctolib dans la bar de recherche afin d'arriver sur le site, bien sur l'ancienne methode marchera toujour.

**Sécuriser les dossiers pas destiné au utilisateurs :**

Rajouter les ligne suivantes pour emecher aux utilisateurs d'acceder au dossier php et css :

```conf
<Location "/php/">
    Require all denied 
</Location>

<Location "/css/">
    Require all denied   
</Location>
```
