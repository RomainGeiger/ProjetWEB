<?php
require_once dirname(__DIR__) . '/config.php';
?>
<footer class="footer">
    <form method="post" action="<?php echo PHP_PATH . '/theme.php'; ?>">
        <label>Choisissez un thème :</label>
        <select name="Choixtheme">
            <option value="sombre">Sombre</option>
            <option value="clair">Clair</option>
        </select>
        <!-- Champ caché pour envoyer la page courante -->
        <input type="hidden" name="retour" value="<?= htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES) ?>">
        <input type="submit" name="EnvoiTheme" value="Changer le thème">
    </form>
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
        <li><a class="formLink" href="/ProjetWEB/php/magazin.php">Visitez notre boutique en ligne</a></li>
        <li><a class="formLink" href="/ProjetWEB/php/contact.php">Contactez-nous </a></li>
    </ul>
</footer>