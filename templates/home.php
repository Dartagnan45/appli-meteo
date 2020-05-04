<?php
require '../vendor/autoload.php';
session_start();
$_SESSION = $_POST;

$error = null;
if (array_key_exists('submit', $_POST)) {
    if (isset($_POST['city']) && empty($_POST['city'])) {
        $error = 'le champ ne peut être vide';
    }
    if (empty($error)) {
        header("location: /meteo");
    }
}
?>
<header>
    <div id="clouds">
        <?php for ($i = 0; $i < 5; $i++) : ?>
            <img id="cloud" src="/asset/img/cloud-153992_640.png" alt="nuage">
        <?php endfor; ?>
    </div>
    <div>
        <img id="sun" src="/asset/img/sun.png" alt="soleil">
    </div>
</header>

<div class="form">
    <form action="" method="post">
        <?php if (!empty($error)) : ?>
            <legend class="alert alert-danger">Des erreurs ont été trouvées</legend>
        <?php endif; ?>
        <div class="form-group">
            <label for="city">Entrez votre le nom de la ville</label>
            <input type="text" class="form-control" id="city" name="city" aria-describedby="cityHelp">
            <?php if (!empty($error)) : ?>
                <p style="color:red"><?php echo $error ?></p>
            <?php endif ?>
            <small id="cityHelp" class="form-text text-muted">Taper le nom de la ville de votre choix.</small>
        </div>
        <button type="submit" name="submit" class="btn">Envoyer</button>
    </form>