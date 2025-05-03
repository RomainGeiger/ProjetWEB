<?php
session_start();

// Redirection si l'utilisateur est déjà connecté
if (isset($_SESSION['user_id']) || (!empty($_COOKIE['user_session']))) {
    header('Location: ../index.php');
    exit;
}

require __DIR__ . '/../bdb/connexion.php';

// Vérifie la connexion PDO
if (!isset($conn) || !($conn instanceof PDO)) {
    http_response_code(500);
    die('Connexion BD introuvable.');
}

// Calcule l'âge à partir d'une date AAAA‑MM‑JJ
function calculerAge(string $dateNaissance): int
{
    try {
        $dob = new DateTime($dateNaissance);
    } catch (Exception $e) {
        return -1;
    }
    return (new DateTime())->diff($dob)->y;
}

$erreurs = [];
$champs  = [
    'nom'    => '',
    'prenom' => '',
    'tel'    => '',
    'email'  => '',
    'age'    => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['inscription'])) {
    // Validation des champs
    foreach ($champs as $k => &$v) {
        $v = trim($_POST[$k] ?? '');
        if ($v === '') {
            $erreurs[$k] = "Le champ $k est obligatoire.";
            continue;
        }
        switch ($k) {
            case 'nom':
            case 'prenom':
                if (!preg_match('/^[\p{L}\s\'-]{2,50}$/u', $v)) {
                    $erreurs[$k] = "$k invalide.";
                }
                break;
            case 'tel':
                if (!preg_match('/^0[1-9](\d{2}){4}$/', $v)) {
                    $erreurs[$k] = 'Numéro de téléphone invalide.';
                }
                break;
            case 'email':
                if (!filter_var($v, FILTER_VALIDATE_EMAIL)) {
                    $erreurs[$k] = 'Adresse e‑mail invalide.';
                }
                break;
            case 'age':
                if (calculerAge($v) < 13) {
                    $erreurs[$k] = 'Âge insuffisant (13 ans minimum).';
                }
                break;
        }
    }
    unset($v);

    // Mot de passe
    $password  = $_POST['password']  ?? '';
    $password2 = $_POST['password2'] ?? '';
    if ($password === '' || $password2 === '') {
        $erreurs['password'] = 'Mot de passe obligatoire.';
    } elseif ($password !== $password2) {
        $erreurs['password'] = 'Les mots de passe ne correspondent pas.';
    } elseif (
        strlen($password) < 8 ||
        !preg_match('/[A-Z]/', $password) ||
        !preg_match('/[a-z]/', $password) ||
        !preg_match('/\d/',  $password)
    ) {
        $erreurs['password'] = 'Mot de passe trop faible.';
    }

    // Unicité e‑mail
    if (empty($erreurs)) {
        try {
            $stmt = $conn->prepare('SELECT 1 FROM utilisateur WHERE adresse_email = ? LIMIT 1');
            $stmt->execute([$champs['email']]);
            if ($stmt->fetchColumn()) {
                $erreurs['email'] = 'Adresse e‑mail déjà utilisée.';
            }
        } catch (PDOException $e) {
            $erreurs['global'] = "Erreur de vérification d'adresse e‑mail.";
        }
    }

    // Insertion
    if (empty($erreurs)) {
        try {
            $stmt = $conn->prepare('INSERT INTO utilisateur (nom, prenom, numero_de_tel, adresse_email, mot_de_passe, age) VALUES (:nom, :prenom, :tel, :email, :pwd, :age)');
            $stmt->execute([
                ':nom'    => $champs['nom'],
                ':prenom' => $champs['prenom'],
                ':tel'    => $champs['tel'],
                ':email'  => $champs['email'],
                ':pwd'    => password_hash($password, PASSWORD_DEFAULT),
                ':age'    => calculerAge($champs['age'])
            ]);
            header('Location: login.php?inscription=reussie');
            exit;
        } catch (PDOException $e) {
            error_log('Erreur inscription : ' . $e->getMessage());
            $erreurs['global'] = 'Erreur interne, réessayez plus tard.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Inscription</title>
    <link rel="stylesheet" href="../css/register.css" />
</head>
<body>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <h2 class="inactive underlineHover"><a href="login.php">Connexion</a></h2>
        <h2 class="active">Inscription</h2>

        <?php if (!empty($erreurs)): ?>
            <div class="alert">
                <?php foreach ($erreurs as $msg): ?>
                    <p><?= htmlspecialchars($msg) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form action="" method="post" novalidate>
            <input type="text" name="nom" placeholder="Nom" required value="<?= htmlspecialchars($champs['nom']) ?>" />
            <input type="text" name="prenom" placeholder="Prénom" required value="<?= htmlspecialchars($champs['prenom']) ?>" />
            <input type="tel" name="tel" placeholder="Numéro de téléphone" required value="<?= htmlspecialchars($champs['tel']) ?>" />
            <input type="email" name="email" placeholder="Adresse e‑mail" required value="<?= htmlspecialchars($champs['email']) ?>" />
            <input type="password" name="password" placeholder="Mot de passe" required />
            <input type="password" name="password2" placeholder="Vérifier le mot de passe" required />
            <input type="date" name="age" placeholder="Date de naissance" required value="<?= htmlspecialchars($champs['age']) ?>" />
            <input type="submit" name="inscription" value="S'inscrire" />
        </form>
    </div>
</div>
</body>
</html>
