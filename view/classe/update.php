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
            <th scope="col">Niveau</th>
            <th scope="col">Identifiant</th>
            <th scope="col">Nombre d'étudiants</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $x =0;
        if(isset($Tabclasse))
            foreach ($Tabclasse as $t_classe)
            {
                $x++;
                ?>

                <tr>
                    <th scope="row"><?= $x ?></th>
                    <td><?= $t_classe->get_Niv() ?></td>
                    <td><?= $t_classe->get_Ident()?></td>
                    <td><?= $t_classe->get_Nbinsc()?></td>
                    <td> <a href="/projet_web/controller/etudiant/create?id=<?= $t_classe->get_Pkclas()?>"> Ajouter étudiant </a></td>
                    <td> <a href="/projet_web/controller/etudiant/read?id=<?= $t_classe->get_Pkclas()?>"> Liste étudiants </a></td>
                    <td> <a href="/projet_web/controller/classe/update?id=<?= $t_classe->get_Pkclas()?>"> Modifier </a></td>
                    <td> <a href="/projet_web/controller/classe/delete?id=<?= $t_classe->get_Pkclas()?>"> Supprimer </a></td>
                </tr>
            <?php }?>
        </tbody>
    </table>
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
        <div class="col-md-4" style="margin-left: 5%">
            <label for="input_niv" class="form-label">Année</label>
            <input type="text" class="form-control" id="input_niv" name="input_niv" value="<?= $inter_classe->get_Niv() ?>" required>
        </div>
        <div class="col-md-4"  style="margin-left: 5%">
            <label for="input_id" class="form-label">Identifiant</label>
            <input type="text" class="form-control" id="input_id" name="input_id" value="<?= $inter_classe->get_Ident()?>" required>
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
                <td> <a href="/projet_web/controller/classe/read.php"> retour à la liste </a></td>
            </div>
            <input type="hidden" id="Pkentr" name="PkEntr" value="<?= $inter_classe->get_Pkclas()?>">
        </div>
        <p></p>
        <div></div>
    </form>
    </body>

<?php }?>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/footer.php';
?>
