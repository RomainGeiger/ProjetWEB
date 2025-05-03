<?php
require_once dirname(__DIR__) . '/config.php';
?>
<!DOCTYPE html>

<html lang="fr">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
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
</body>

</html>