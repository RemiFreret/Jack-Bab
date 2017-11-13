# Jack-Bab
## Prérequis :
- php
- composer
- symfony
- mysql

## Installation

Copiez le repository sur votre machine :
```
git clone https://github.com/RemiFreret/Jack-Bab
```

Mettez vous à la racine du site :
```
cd Jack-Bab/Jack-Bab
```

Lancez composer et renseignez les champs demandés
```
composer install
```

Initialisez la base de données
```
php bin/console doctrine:database:create
```

## Base de données
Remplissez la base de donnée avec les produits
(Indispensable pour pouvoir afficher le shop)

Remplissez la base de donnée avec au moins un utilisateur avec rights à 2
(Indispensable pour administrer le site)

Vous pouvez vous inspirez du fichier symfony.mysql (qui peut être importé dans phpmyadmin)

Ou le faire à la main :
```
php bin/console doctrine:schema:update --force
```
Puis modifier la base de donnée
