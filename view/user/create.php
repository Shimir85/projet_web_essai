<?php
$title="Inscription";
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/header.php';
?>

<body>
<form class="row g-3 container-fluid" style="border: 1px solid black" method="post">
    <div>
        <p></p>
        <p></p>
    </div>
    <div class="col-md-4" style="margin-left: 5%">
        <label for="input_log" class="form-label">Entrez votre Login</label>
        <input type="text" class="form-control" id="input_log" name="input_log" required>
    </div>
    <div class="col-md-4"  style="margin-left: 5%">
        <label for="input_pswd" class="form-label">Entrez votre Password</label>
        <input type="password" class="form-control" id="input_pswd" name="input_pswd" required>
    </div>
    <p></p>
    <?php
    if (isset($reussite)){
        ?>
        <div class="col-md-2"  style="margin-left: 5%; background-color: #0f5132;color:white; text-align: center; margin: auto">
            <td>INSCRIPTION REUSSIE</td>
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
        <div class="col-2">
            <td><a href="/projet_web/controller/home/index.php">Retour à la page de Login</a></td>
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

