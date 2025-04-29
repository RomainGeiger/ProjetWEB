<?php
// register.php – formulaire + traitement (plus de JavaScript)
// ----------------------------------------------------------
// Connexion à la base de données (adapte le chemin si besoin)
require_once __DIR__ . '/../bdb/connexion.php'; // $mysqli ou $pdo

$erreurs = [];
$champs  = [
    'nom'      => '',
    'prenom'   => '',
    'tel'      => '',
    'email'    => '',
    'sexe'     => '',
    'age'      => ''
];

/* ───────── 1. TRAITEMENT DU POST ───────── */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // a) Récupérer & nettoyer
    foreach ($champs as $k => $v) {
        if (!isset($_POST[$k]) || trim($_POST[$k]) === '') {
            $erreurs[] = "Le champ $k est obligatoire.";
        } else {
            $champs[$k] = trim($_POST[$k]);
        }
    }
    $password  = $_POST['password']  ?? '';
    $password2 = $_POST['password2'] ?? '';

    // b) Règles métier
    if ($password !== $password2) {
        $erreurs[] = 'Les mots de passe ne correspondent pas.';
    }
    if (!filter_var($champs['email'], FILTER_VALIDATE_EMAIL)) {
        $erreurs[] = 'Adresse e‑mail invalide.';
    }

    // c) Unicité de l’e‑mail
    if (empty($erreurs)) {
        $stmt = $mysqli->prepare('SELECT 1 FROM utilisateur WHERE adresse_email = ? LIMIT 1');
        $stmt->bind_param('s', $champs['email']);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows) {
            $erreurs[] = 'Adresse e‑mail déjà utilisée.';
        }
        $stmt->close();
    }

    // d) Insertion si tout est bon
    if (empty($erreurs)) {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $mysqli->prepare('INSERT INTO utilisateur
            (nom, prenom, numero_de_tel, adresse_email, mot_de_passe, sexe, age)
            VALUES (?,?,?,?,?,?,?)');
        $stmt->bind_param(
            'ssssssi',
            $champs['nom'],
            $champs['prenom'],
            $champs['tel'],
            $champs['email'],
            $hash,
            $champs['sexe'],
            $champs['age']
        );

        if ($stmt->execute()) {
            header('Location: login.php?inscription=reussie');
            exit;
        }
        $erreurs[] = "Erreur d\'insertion : " . $stmt->error;
        $stmt->close();
    }
}

/* ───────── 2. AFFICHAGE DU FORMULAIRE ───────── */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="../css/register.css" />
</head>
<body>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <h2 class="inactive underlineHover"><a href="login.php">Connexion</a></h2>
        <h2 class="active">Inscription</h2>

        <?php if ($erreurs): ?>
            <div class="alert">
                <?php foreach ($erreurs as $e) echo "<p>$e</p>"; ?>
            </div>
        <?php endif; ?>

        <form action="" method="post">
            <input type="text" name="nom" placeholder="Nom" required
                   value="<?= htmlspecialchars($champs['nom']) ?>" />

            <input type="text" name="prenom" placeholder="Prénom" required
                   value="<?= htmlspecialchars($champs['prenom']) ?>" />

            <input type="tel" name="tel" placeholder="Numéro de téléphone" required
                   value="<?= htmlspecialchars($champs['tel']) ?>" />

            <input type="email" name="email" placeholder="Adresse e‑mail" required
                   value="<?= htmlspecialchars($champs['email']) ?>" />

            <input type="password" name="password" placeholder="Mot de passe" required />
            <input type="password" name="password2" placeholder="Vérifier le mot de passe" required />

            <select name="sexe" required>
                <option value="">Sexe</option>
                <option value="1" <?= $champs['sexe']==='1'?'selected':''; ?>>Homme</option>
                <option value="2" <?= $champs['sexe']==='2'?'selected':''; ?>>Femme</option>
                <option value="0" <?= $champs['sexe']==='0'?'selected':''; ?>>Autre</option>
            </select>

            <input type="date" name="age" placeholder="Date de naissance" required
                   value="<?= htmlspecialchars($champs['age']) ?>" />

            <input type="submit" value="S&#39;inscrire" />
        </form>
    </div>
</div>
</body>
</html>
