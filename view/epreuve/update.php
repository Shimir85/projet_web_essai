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
            <th scope="col">Date</th>
            <th scope="col">Heure de départ</th>
            <th scope="col">Distance de l'épreuve</th>
            <th scope="col">Année scolaire</th>
            <th scope="col">Nombre de participants</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $x =0;
        if(isset($Tabepreuve))
            foreach ($Tabepreuve as $t_epreuve)
            {
                $x++;
                ?>

                <tr>
                    <th scope="row"><?= $x ?></th>
                    <td><?= date_format(date_create($t_epreuve->get_Date()), "d-m-Y")?></td>
                    <td><?= $t_epreuve->get_Tstart()?></td>
                    <td><?= $t_epreuve->get_Distance()?></td>
                    <td><?= $t_epreuve->get_Ansco()?></td>
                    <td><?= $BDMepreuve->Nbinsc_epr($t_epreuve->get_PkEpr())?></td>
                    <td> <a href="/projet_web/controller/epreuve/update?id=<?= $t_epreuve->get_PkEpr()?>"> Modifier </a></td>
                    <td> <a href="/projet_web/controller/epreuve/delete?id=<?= $t_epreuve->get_PkEpr()?>"> Supprimer </a></td>
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
            <label for="date">Date de l'épreuve </label>
            <input type="date" id="input_date" name="input_date" value="<?=$inter_epreuve->get_Date()?>" required>
        </div>
        <div class="col-md-3"  style="margin-left: 5%">
            <label for="heure">Heure de l'épreuve : </label>
            <input type="time" id="input_heure" name="input_heure" value="<?=$inter_epreuve->get_Tstart()?>" required>
        </div>
        <p></p>
        <div class="col-md-4" style="margin-left: 5%">
            <label for="input_distance" class="form-label">Distance</label>
            <input type="text" class="form-control" id="input_distance" name="input_distance" value="<?= $inter_epreuve->get_Distance() ?>" required>
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
                <td> <a href="/projet_web/controller/epreuve/read.php"> retour à la liste </a></td>
            </div>
            <input type="hidden" id="Pkepr" name="PkEpr" value="<?= $inter_epreuve->get_PkEpr()?>">
        </div>
        <p></p>
        <div></div>
    </form>
    </body>

<?php }?>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/footer.php';
?>
