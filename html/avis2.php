<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Témoignages - Être Gros, C'est Bon pour la Santé !</title>
    <link rel="stylesheet" href="../css/avis.css">
</head>
<body>

    <header>
        <h1>Contactez-nous pour vos questions de prise de poids</h1>
        <nav>
            <a href="../index.html">Accueil</a>
              <a href="présentation.html">Présentation</a>
              <a href="programmes.html">Programmes</a>
              <a href="avis.html">Feedback</a>
              <a href="magazin.html">Boutique</a>
              <a href="contact.html">Contact</a>
        </nav>
      </header>

<div class="container">

    <?php 
        require("..\bdb\connexion.php"); //Etablie une connexion à la base de données
    ?>

    <div class="testimonial">
        <h3>Olivier, 41 ans</h3>
        <p>"Depuis que j’ai remplacé le lait par la crème glacée dans mes céréales, chaque matin est un bonheur. Mon petit-déjeuner a le goût du dessert, et je me sens comme un roi ! Ma balance est peut-être moins fan, mais moi je suis ravi ! 🍦😄"</p>
    </div>

    <div class="avis">
        <h2>Déposez votre avis !</h2>
        <form action="submit-review.php" method="post">
            <label for="name">Votre prénom :</label>
            <input type="text" id="name" name="name" placeholder="Exemple : Pauline" required>

            <label for="age">Votre âge :</label>
            <input type="number" id="age" name="age" min="1" placeholder="Exemple : 30" required>

            <label for="message">Votre témoignage :</label>
            <textarea id="message" name="message" rows="5" placeholder="Racontez votre expérience..." required></textarea>

            <button type="submit">Envoyer</button>
        </form>
    </div>
</div>
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
        <li><a class="formLink" href="magazin.html">Visitez notre boutique en ligne</a></li>
        <li><a class="formLink" href="contact.html">Contactez-nous </a></li>
    </ul>
</ul>
    </footer>
</body>
</html>