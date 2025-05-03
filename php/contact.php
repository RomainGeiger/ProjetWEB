<?php
require_once dirname(__DIR__) . '/config.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact - Club de Prise de Poids</title>
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

    include PHP_PATH_FS . '/nav.php'; 

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
  <?php include PHP_PATH_FS . '/footer.php'; ?>

</body>

</html>
