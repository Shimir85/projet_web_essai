<?php
$title="Logon screen";
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/header.php';
?>

<div>
    <p></p>
    <p></p>
</div>
    <body >
        <form class="row g-3 container-fluid" style="border: 1px solid black" method="post">
            <div>
                <p></p>
                <p></p>
            </div>
            <div class="col-md-4" style="margin-left: 5%">
                <label for="input_log" class="form-label">Login</label>
                <input type="text" class="form-control" id="input_log" name="input_log" required>
            </div>
            <div class="col-md-4"  style="margin-left: 5%">
                <label for="input_pswd" class="form-label">Password</label>
                <input type="password" class="form-control" id="input_pswd" name="input_pswd" required>
            </div>
            <p></p>
            <?php
            if (isset($no_utilisateur)){
                ?>
                <br>
                <div class="col g-3 container-fluid"  style="background-color: red;color:white; text-align: center; margin: auto">
                    <td>Veuillez d'abord vous inscrire via le lien ci dessous</td>
                </div>
                <br>
            <?php } ?>

            <?php
            if (isset($lien_inscription)){
                ?>
                <div style="margin-left: 6%">
                    <p> <a href="/projet_web/controller/user/create.php"> Premier utilisateur? Inscrivez-vous ici </a></p>
                </div>
            <?php } ?>
            <p></p>
            <div class="row" style="margin-left: 4%">
                <div class="col-2">
                    <button class="btn btn-primary" type="submit">Valider</button>
                </div>
                <div class="col-2">
                    <button class="btn btn-secondary" type="reset">Annuler</button>
                </div>
            </div>
                <p></p>
            <div></div>
        </form>
    </body>

<?php
    $footer="Page de connexion";
    include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/footer.php';
?>

