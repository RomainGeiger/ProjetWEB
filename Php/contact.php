<!DOCTYPE html>

<html lang="fr">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Contact - Club de Prise de Poids</title>
  <link href="../css/contact.css" rel="stylesheet" />
  <link href="../css/theme.css" rel="stylesheet" />
</head>

<body>
  <?php
  $title = 'Accueil';
  include $_SERVER['DOCUMENT_ROOT'].'/ProjetWEB/Php/Darkmode.php';
  ?>
  <main>
    <form class="contact-form">
      <label for="nom"><p>Votre Nom :</p></label>
      <input id="nom" name="nom" placeholder="Ex : Amélie Grossipe" required="" type="text" />
      <label for="email"><p>Votre Email :</p></label>
      <input id="email" name="email" placeholder="Ex : foodie@bonvivant.com" required="" type="email" />
      <label for="message"><p>Votre Message :</p></label>
      <textarea id="message" name="message" placeholder="Posez vos questions gourmandes ici..." required=""
        rows="4"></textarea>
      <button>Envoyer mon message</button>
    </form>
  </main>
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
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2583.4086902754784!2d2.5847180920388624!3d49.646598271309735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e7c1c6a9871dc7%3A0x6a6bb891382827e8!2sMcDonald&#39;s!5e0!3m2!1sfr!2sfr!4v1732617040481!5m2!1sfr!2sfr"
      width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"></iframe>
    <ul class="formLink">
    <li><a class="formLink" href="magazin.php">Visitez notre boutique en ligne</a></li>
            <li><a class="formLink" href="contact.php">Contactez-nous </a></li>
            <li><a class="formLink" href="login.php">Connectez-vous! </a></li>
    
    </ul>
    </ul>
  </footer>
</body>

</html>