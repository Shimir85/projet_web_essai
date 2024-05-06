<?php
$title="Introduction étudiants";
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/header.php';
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/menu.php'
?>
<body>

<form class="row g-3 container-fluid" style="border: 1px solid black" method="post">
    <div>
    </div>
    <div class="col-md-4"  style="margin-left: 5%">
        <label for="input_nom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="input_nom" name="input_nom" required>
    </div>
    <div class="col-md-4"  style="margin-left: 5%">
        <label for="input_pren" class="form-label">Prénom</label>
        <input type="text" class="form-control" id="input_pren" name="input_pren" required>
    </div>
    <div class="col-md-4"  style="margin-left: 5%">
        <label for="input_sexe" class="form-label">Sexe</label>
        <select class="form-select" aria-label="Default select example" id="input_sexe" name="input_sexe">
            <option value="M">M</option>
            <option value="F">F</option>
            <option value="X">X</option>
        </select>
    </div>
    <?php
    if (isset($reussite)){
        ?>
        <div class="col-md-2"  style="margin-left: 2%; background-color: #0f5132;color:white; text-align: center; margin: auto">
            <td>INSERTION REUSSIE</td>
        </div>
    <?php } ?>
    <p></p>
    <div class="row g-3 container-fluid" style="margin-left: 4%">
        <div class="col-2">
            <button class="btn btn-primary" type="submit">Valider</button>
        </div>
        <div class="col-2">
            <button class="btn btn-secondary" type="reset">Annuler</button>
        </div>
        <div class="col-3">
            <td><a href="/projet_web/controller/classe/read.php">Retour à la liste des classes</a></td>
        </div>
    </div>
    <p></p>
    <div></div>
</form>
</body>