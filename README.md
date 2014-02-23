AumBot
======

Bot pour adopteunmec.com


Quand j'ai découvert ce site, extrèmement chronophage, j'ai tout de suite pensé à développer un bot qui visiterait les profils à ma place en effectuant des statistiques sur les données récoltées afin de me fournir des profils intéressants à moindre coût.
Pour développer ce bot, j'ai tout d'abord commencé par utiliser cUrl et request de nodeJs. Ne fonctionnant pas très bien sur le site internet, et ressentant de plus le besoin d'utiliser du javascript sur le page, j'ai opté pour PHP et GoogleChromeCli.
Une fois l'API installée, cette dernière permet de contrôler google chrome depuis le terminal.

Ce projet comporte trois dossiers :
- Bot contient le code concernant la récupération et le traitement des données,
- SQL contient les fichiers utiles à la mise en place de la base de donnée MySQL,
- www contient un site internet CakePHP permettant de mettre en valeur les données récoltées.

Pour lancer le bot depuis le terminal :
cd [your_directory]/AumBot/Bot
php main.php

Pour visionner le site, sachez que j'utilise MAMP et que ça marche très bien.


