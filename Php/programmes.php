<!Doctype html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Programme </title>
        <meta name="Lettre" content="Programme">
        <link rel="stylesheet" type="text/css" href="../css/programmes.css" media="screen">	
        <link rel="stylesheet" href="../css/theme.css">
	</head>



<body>
    <div class="conteneur">
        <?php
    $title = 'Accueil';
    include $_SERVER['DOCUMENT_ROOT'].'/ProjetWEB/Php/Darkmode.php';
    ?>
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
            
        <footer class="footer">
            <dl>
                <dt>Téléphone :</dt>
                <dd> (+33) (0)3 22 88 99 63</dd>
                <dt> Adresse :</dt>
                <dd> Gourmang & CO
                -
                Institut Santé <br>
                de l'art de manger équilibré <br>
                2 Rue de Marthe <br>
                80500 Montdidier </dd>
            </dl>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2583.4086902754784!2d2.5847180920388624!3d49.646598271309735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e7c1c6a9871dc7%3A0x6a6bb891382827e8!2sMcDonald&#39;s!5e0!3m2!1sfr!2sfr!4v1732617040481!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <ul class="formLink">
                <li><a class="formLink" href="magazin.php">Visitez notre boutique en ligne</a></li>
                <li><a class="formLink" href="contact.php">Contactez-nous </a></li>
                <li><a class="formLink" href="login.php">Connectez-vous! </a></li>
            </ul>
        </ul>
            </footer>
    </div>
</body>
