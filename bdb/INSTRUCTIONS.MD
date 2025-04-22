Pour apporter des modifications dans la base de donnée : 
- Se rendre dans MAMP > phpMyAdmin
- Créer une base de donnée **avec le même nom que le fichier sql présent dans le repo**
- Apportez vos modifications et sauvegardez
- Aller dans l'onglet **Exporter** de phpMyAdmin
- Placer le fichier de la base de donnée modifiée dans ce même dossier, puis push

- Pour utiliser la base de donnée, placez "require("..\bdb\connexion.php");" dans votre fichier php.