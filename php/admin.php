<?php
/* admin.php
   Page réservée aux administrateurs : liste des comptes + bascule admin / utilisateur */
require_once dirname(__DIR__) . '/config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

require_once dirname(__DIR__) . '/bdb/connexion.php';

/* Vérifie que l’utilisateur courant est admin */
$stmt = $conn->prepare('SELECT estAdmin FROM utilisateur WHERE id = ?');
$stmt->execute([$_SESSION['user_id']]);
if (!$stmt->fetchColumn()) {
    http_response_code(403);
    exit('Accès refusé.');
}

/* Traitement du POST : mise à jour des rôles */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['roles'])) {
    foreach ($_POST['roles'] as $uid => $val) {
        $conn->prepare('UPDATE utilisateur SET estAdmin = ? WHERE id = ?')
             ->execute([(int)$val, (int)$uid]);
    }
    header('Location: admin.php?maj=ok&filtre=' . urlencode($_GET['filtre'] ?? 'tous'));
    exit;
}

/* Récupération de la liste avec filtre */
$filtre   = $_GET['filtre'] ?? 'tous';
$requete  = 'SELECT id, nom, prenom, adresse_email, estAdmin FROM utilisateur WHERE id <> ?';
if     ($filtre === 'admins')      $requete .= ' AND estAdmin = 1';
elseif ($filtre === 'non_admins')  $requete .= ' AND estAdmin = 0';

$stmt = $conn->prepare($requete);
$stmt->execute([$_SESSION['user_id']]);
$liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des utilisateurs</title>
    <link rel="stylesheet" href="../css/presentation.css">
</head>
<?php
$themeClass = (isset($_COOKIE['theme']) && $_COOKIE['theme'] === 'sombre') ? 'dark-theme' : 'light-theme';
echo "<body class=\"$themeClass\">";
include PHP_PATH_FS . '/nav.php';
?>
<h1>Gestion des utilisateurs</h1>

<?php if (isset($_GET['maj']) && $_GET['maj'] === 'ok'): ?>
    <div class="alert success">Rôles mis à jour.</div>
<?php endif; ?>

<form method="get" style="margin-bottom:20px;">
    <label>Filtrer :</label>
    <select name="filtre" onchange="this.form.submit()">
        <option value="tous"       <?= $filtre === 'tous'       ? 'selected' : '' ?>>Tous</option>
        <option value="admins"     <?= $filtre === 'admins'     ? 'selected' : '' ?>>Admins</option>
        <option value="non_admins" <?= $filtre === 'non_admins' ? 'selected' : '' ?>>Non‑admins</option>
    </select>
</form>

<form method="post">
    <table>
        <thead>
            <tr>
                <th>Nom</th><th>Prénom</th><th>Email</th><th>Rôle</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($liste as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['nom']) ?></td>
                <td><?= htmlspecialchars($user['prenom']) ?></td>
                <td><?= htmlspecialchars($user['adresse_email']) ?></td>
                <td>
                    <select name="roles[<?= $user['id'] ?>]">
                        <option value="0" <?= $user['estAdmin'] ? '' : 'selected' ?>>Utilisateur</option>
                        <option value="1" <?= $user['estAdmin'] ? 'selected' : '' ?>>Admin</option>
                    </select>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <input type="submit" value="Valider les changements">
</form>

<?php include PHP_PATH_FS . '/footer.php'; ?>
</body>
</html>
