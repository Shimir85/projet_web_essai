<?php
$title="Mise à jour";
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/header.php';
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/menu.php';
if(!$Form)
{
    ?>
    <body>

    <table class="table table-striped" style="text-align: center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Sexe</th>
            <th scope="col">Nombre d'inscriptions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $x =0;
        if(isset($Tabetud))
            foreach ($Tabetud as $t_etud)
            {
                $x++;
                ?>

                <tr>
                    <th scope="row"><?= $x ?></th>
                    <td><?= $t_etud->get_Nom() ?></td>
                    <td><?= $t_etud->get_Pren()?></td>
                    <td><?= $t_etud->get_Sexe()?></td>
                    <td><?= $t_etud->get_Nb_Insc()?></td>
                    <td> <a href="/projet_web/controller/inscription/create.php"> Ajouter inscription </a></td>
                    <td> <a href="/projet_web/controller/inscription/read?id=<?= $t_etud->get_PkEtud()?>"> Liste inscriptions </a></td>
                    <td> <a href="/projet_web/controller/etudiant/update?id=<?= $t_etud->get_PkEtud()?>"> Modifier </a></td>
                    <td> <a href="/projet_web/controller/etudiant/delete?id=<?= $t_etud->get_PkEtud()?>"> Supprimer </a></td>
                </tr>
            <?php }?>
        </tbody>
    </table>
    <div class="col-4" style="margin-left: 4%">
        <td><a href="/projet_web/controller/classe/read.php">Retour à la liste des classes</a></td>
    </div>
    </body>
    <?php
}
else
{
    ?>
    <p></p>
    <p></p>
    <body>
    <form class="row g-3 container-fluid" style="border: 1px solid black" method="post">
        <div>
            <p></p>
            <p></p>
        </div>
        <div class="col-md-3" style="margin-left: 5%">
            <label for="input_nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="input_nom" name="input_nom" value="<?= $inter_etudiant->get_Nom() ?>" required>
        </div>
        <div class="col-md-3"  style="margin-left: 5%">
            <label for="input_pren" class="form-label">Prenom</label>
            <input type="text" class="form-control" id="input_pren" name="input_pren" value="<?= $inter_etudiant->get_Pren()?>" required>
        </div>
        <div class="col-md-3"  style="margin-left: 5%">
            <label for="input_sexe" class="form-label">Sexe</label>
            <select class="form-select" aria-label="Default select example" id="input_sexe" name="input_sexe" required >
                <option selected ><?= $inter_etudiant->get_Sexe()?></option>
                <option value="M">M</option>
                <option value="F">F</option>
                <option value="X">X</option>
            </select>
        </div>
        <p></p>
        <div class="row" style="margin-left: 4%">
            <div class="col-1">
                <button class="btn btn-primary" type="submit">Valider</button>
            </div>
            <div class="col-1">
                <button class="btn btn-secondary" type="reset">Annuler</button>
            </div>

            <div class="col-2">
                <td> <a href="/projet_web/controller/etudiant/read.php?pk=<?= $inter_etudiant->get_FkClas()?>"> retour à la liste </a></td>
            </div>
            <input type="hidden" id="Pketud" name="Pketud" value="<?= $inter_etudiant->get_PkEtud()?>">
        </div>
        <p></p>
        <div></div>
    </form>
    </body>

<?php }?>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/footer.php';
?>
