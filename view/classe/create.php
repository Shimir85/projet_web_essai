<?php
$title="Introduction classe";
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/header.php';
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/menu.php'
?>
<body>

<form class="row g-3 container-fluid" style="border: 1px solid black" method="post">
    <div>


    </div>
    <div class="col-md-4" style="margin-left: 5%">
        <label for="input_niv" class="form-label">Année</label>
        <input type="text" class="form-control" id="input_niv" name="input_niv" required>
    </div>
    <div class="col-md-4"  style="margin-left: 5%">
        <label for="input_id" class="form-label">Identifiant (2 caractères maximum)</label>
        <input type="text" class="form-control" id="input_id" name="input_id" required>
    </div>
    <?php
    if (isset($reussite)){
    ?>
    <div class="col-md-2"  style="margin-left: 5%; background-color: #0f5132;color:white; text-align: center; margin: auto">
        <td>INSERTION REUSSIE</td>
    </div>
    <?php } ?>
    <p></p>
    <div class="row" style="margin-left: 4%">
        <div class="col-1">
            <button class="btn btn-primary" type="submit">Valider</button>
        </div>
        <div class="col-1">
            <button class="btn btn-secondary" type="reset">Annuler</button>
        </div>
        <div class="col-2">
            <td><a href="/projet_web/controller/classe/read.php">Retour à la liste des classes</a></td>
        </div>
    </div>
    <p></p>
    <div></div>
</form>
</body>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/footer.php';
?>
