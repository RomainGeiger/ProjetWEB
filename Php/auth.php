<?php
function current_user_id(bool $redirect = true): ?int
{
    session_start();

    /* Session classique */
    if (isset($_SESSION['user_id'])) {
        return (int)$_SESSION['user_id'];
    }

    /* Cookie persistant */
    if (!empty($_COOKIE['user_session'])) {
        [$data, $sig] = explode('.', $_COOKIE['user_session'].'..', 3);
        $secret = 'votre_clef_ultra_secrete';

        if (hash_equals($sig, hash_hmac('sha256', $data, $secret))) {
            $payload = json_decode(base64_decode($data), true);

            if (($payload['exp'] ?? 0) >= time()) {
                $_SESSION['user_id'] = (int)$payload['uid'];
                return (int)$payload['uid'];
            }
        }
    }

    /* redirection si pas identifier */
    if ($redirect) {
        header('Location: php/login.php');
        exit;
    }

    return null;
}

