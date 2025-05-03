<?php
require_once dirname(__DIR__) . '/config.php';
?>

<!Doctype html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Programme </title>
        <meta name="Lettre" content="Programme">
        <link rel="stylesheet" href="../css/programmes.css">	
	</head>
    <?php 
if(isset($_COOKIE["theme"])){
    if ($_COOKIE["theme"] == "sombre"){
        echo '<body class="dark-theme">';
    }
    else{
        echo '<body class="light-theme">';
    }
}
else{
    echo '<body class="light-theme">';
}

    include PHP_PATH_FS . '/nav.php'; ?>  
        <main>
                <article class="art1">
                    <img src="../images/obèselix.png" alt="obèselix">
                    <h1>Programme 1 : Obèselix</h1>
                    <ul>
                        <li>durée : 30 jours</li>
                        <li>repas : 120</li>
                        <li>en-cas : 120 (à manger à n'importe quelle heure)</li>
                        <li>prix : 600 euros</li>
                    </ul>
                    <div class="resume">
                    <p>Ce programme est facilement accessible, il permettra de vous lancer dans votre objectif avec un prix abordable. Les repas seront en grande partie des fritures, plats très calorique et des repas semblabes aux fastfood.
                    <br>Les en-cas quand à eux seront surtout composés d'aliment sucrés, de sodas, ou d'aliment gras. 
                    <br>
                    <h2>Nos conseils : </h2><br>
                    Il est important de les manger en dehors des repas. Votre sommeil ne doit pas exceder 7h, lors de votre sommeil vous allez utiliser énorméments de calories et vous éloigner de votre objectif. Réduire vos activités physique sera bénéfique à la prise de poids, avec une réduction de la masse musculaire. Essayé de vous hydraté seulement quand vous en resentez le besoin. 
                    </p>
                    </div>
                </article>


                <article class="art2">
                    <img src="../images/omarsimpson.jpeg" alt="omarsimpson">
                    <h1>Programme 2 : Omar Simpson</h1>
                    <ul>
                        <li>durée : 60 jours</li>
                        <li>repas : 240</li>
                        <li>en-cas : 120 (à manger à n'importe quelle heure)</li>
                        <li>prix : 1200 euros</li>
                    </ul>
                    <div class="resume">
                        <p> Ce programme est facilement accessible, il permettra de vous lancer dans votre objectif avec un prix abordable. Les repas seront en grande partie des fritures, plats très calorique et des repas semblabes aux fastfood.
                            <br>Les en-cas quand à eux seront surtout composés d'aliment sucrés, de sodas, ou d'aliment gras. 
                            <br>
                            <br><h2>Nos conseils : </h2>
                            <br>Il est important de les manger en dehors des repas. Votre sommeil ne doit pas exceder 7h, lors de votre sommeil vous allez utiliser énorméments de calories et vous éloigner de votre objectif. Réduire vos activités physique sera bénéfique à la prise de poids, avec une réduction de la masse musculaire. Essayé de vous hydraté seulement quand vous en resentez le besoin. 
                        </p>
                    </div>
                </article>

                <article class="art3">
                    <img src="../images/wargros.png" alt="wargros">
                    <h1>Programme 3 : Wargros</h1>
                    <ul>
                        <li>durée : 120 jours</li>
                        <li>repas : 480</li>
                        <li>en-cas : 240 (à manger à n'importe quelle heure)</li>
                        <li>prix : 2200 euros</li>
                    </ul>
                    <div class="resume">
                            <p> Ce programme est facilement accessible, il permettra de vous lancer dans votre objectif avec un prix abordable. Les repas seront en grande partie des fritures, plats très calorique et des repas semblabes aux fastfood.
                                <br>Les en-cas quand à eux seront surtout composés d'aliment sucrés, de sodas, ou d'aliment gras. 
                                <br></p>
                                <br><h2>Nos conseils : </h2>
                                <p><br>Il est important de les manger en dehors des repas. Votre sommeil ne doit pas exceder 7h, lors de votre sommeil vous allez utiliser énorméments de calories et vous éloigner de votre objectif. Réduire vos activités physique sera bénéfique à la prise de poids, avec une réduction de la masse musculaire. Essayé de vous hydraté seulement quand vous en resentez le besoin.</p>
                        </div>
                </article>
            </main>
            <aside class="aside2">
                <p> </p>
            </aside>

            <aside class="aside1">
                <p> 
                </p>
            </aside>










                
            <form class="formLetter" method="post" action="#">
                <fieldset>
                    <legend>Commande</legend>
                    
                    <!-- Nom -->
                    <label for="nom" class="test">Nom :</label>
                    <input class="spécial" type="text" name="nom" id="nom" placeholder="Votre nom">
                    <br><br>
                    
                    <!-- Prénom -->
                    <label for="prenom" class="test">Prénom :</label>
                    <input class="spécial" type="text" name="prenom" id="prenom" value="">
                    <br><br>
            
                    <!-- Numéro de téléphone -->
                    <label for="tel" class="test">Numéro de téléphone :</label>
                    <input class="spécial" type="tel" name="tel" id="tel" value="+33">
                    <br><br>
                    
                    <!-- Courriel -->
                    <label for="courriel" class="test">Courriel :</label>
                    <input class="spécial" type="email" name="courriel" id="courriel">
                    <br><br>
            
                    <!-- Publicité -->
                    <label for="pub" class="test">Pub :</label>
                    <input class="spécial" type="radio" name="pub" id="oui">
                    <label for="oui" class="test">Oui, j'accepte</label>
                    <input class="spécial" type="radio" name="pub" id="non">
                    <label for="non" class="test">Non je refuse</label>
                    <br><br>
            
                    <!-- Programme -->
                    <label for="programme" class="test">Programme :</label>
                    <input class="spécial" type="checkbox" name="programme" id="Obèselix">
                    <label for="Obèselix" class="test">Obèselix</label>
                    <input class="spécial" type="checkbox" name="programme" id="OmarSimpson">
                    <label for="OmarSimpson" class="test">Omar Simpson</label>
                    <input class="spécial" type="checkbox" name="programme" id="Wargros">
                    <label for="Wargros" class="test">Wargros</label>
                    <br><br>
            
                    <!-- Soumettre et Réinitialiser -->
                    <input class="spécial" type="submit" name="Envoyer" id="soumission" value="Soumettre">
                    <input class="spécial" type="reset" id="reinitialiser" value="Réinitialiser">

                </fieldset>
            </form>
            
            <?php include PHP_PATH_FS . '/footer.php'; ?>
    </div>
</body>
