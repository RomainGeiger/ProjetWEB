<?php
require_once dirname(__DIR__) . '/config.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact - Club de Prise de Poids</title>
<<<<<<< HEAD
  <link href="../css/contact.css" rel="stylesheet" />
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
  <?php include PHP_PATH_FS . '/footer.php'; ?>
=======
  <link rel="stylesheet" href="../css/contact.css" />
  <link rel="stylesheet" href="../css/theme.css" />
</head>

<body>

  <?php
    $title = 'Accueil';
    include $_SERVER['DOCUMENT_ROOT'] . '/ProjetWEB/Php/Darkmode.php';

    require_once("../bdb/connexion.php");

    // Insertion du message si le formulaire est soumis
    $messageEnvoye = false;
    if (isset($_POST['contact']) && isset($_SESSION['user_id'])) {
        $reqSQL = "INSERT INTO contact (id_clients, request) VALUES (:id, :request)";
        $stmt = $conn->prepare($reqSQL);
        $stmt->execute([
            ':id' => $_SESSION['user_id'],
            ':request' => $_POST['message'],
        ]);
        $messageEnvoye = true;
    }

    // Récupération de l'historique
    $historique = [];
    if (isset($_SESSION['user_id'])) {
        $reqSQL = "SELECT utilisateur.nom, utilisateur.prenom, utilisateur.age, contact.request
                   FROM contact 
                   INNER JOIN utilisateur ON contact.id_clients = utilisateur.id
                   WHERE utilisateur.id = :id";
        $stmt = $conn->prepare($reqSQL);
        $stmt->execute([':id' => $_SESSION['user_id']]);
        $historique = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    $conn = null;
  ?>

  <div class="container">
    <div class="contact-form">
      <h2>Contactez-nous !</h2>

      <?php if (!isset($_SESSION['user_id'])): ?>
        <p>Vous devez être connecté pour saisir un message et accéder à l'historique.</p>
      <?php else: ?>

        <?php if ($messageEnvoye): ?>
          <p class="confirmation">Votre message a été envoyé avec succès.</p>
        <?php endif; ?>

        <form method="post">
          <label for="message"><p>Votre message :</p></label>
          <textarea id="message" name="message" rows="5" placeholder="Expliquez-nous votre situation..." required></textarea>
          <button type="submit" name="contact">Envoyer</button>
        </form>

        <?php if (!empty($historique)): ?>
          <h3>Vos messages précédents :</h3>
          <ul>
            <?php foreach ($historique as $entry): ?>
              <li><?= htmlspecialchars($entry['prenom']) ?> (<?= (int)$entry['age'] ?> ans) : <?= htmlspecialchars($entry['request']) ?></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>

      <?php endif; ?>
    </div>
  </div>

  <footer class="footer">
    <dl>
      <dt>Téléphone :</dt>
      <dd>(+33) (0)3 22 88 99 63</dd>
      <dt>Adresse :</dt>
      <dd>
        Gourmang & CO - Institut Santé<br>
        de l'art de manger équilibré<br>
        2 Rue de Marthe<br>
        80500 Montdidier
      </dd>
    </dl>
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2583.4086902754784!2d2.5847180920388624!3d49.646598271309735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e7c1c6a9871dc7%3A0x6a6bb891382827e8!2sMcDonald&#39;s!5e0!3m2!1sfr!2sfr!4v1732617040481!5m2!1sfr!2sfr"
      width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"></iframe>

    <ul class="formLink">
      <li><a href="magazin.php">Visitez notre boutique en ligne</a></li>
      <li><a href="contact.php">Contactez-nous</a></li>
      <li><a href="login.php">Connectez-vous !</a></li>
    </ul>
  </footer>

>>>>>>> 786feb03664338be690f0cbaf57367a6baac0587
</body>

</html>
