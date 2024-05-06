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
            <th scope="col">Date épreuve</th>
            <th scope="col">Heure de départ</th>
            <th scope="col">No Dossard</th>
            <th scope="col">Coureur?</th>
            <th scope="col">Temps de course</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $x =0;
        if(isset($Tabinscription))
            foreach ($Tabinscription as $t_inscription)
            {
                $x++;
                ?>

                <tr>
                    <th scope="row"><?= $x ?></th>
                    <td><?= $BDMinscription->get_date_epr($t_inscription->get_FkEpr()) ?></td>
                    <td><?= $t_inscription->get_Tstart()?></td>
                    <td><?= $t_inscription->get_NoDos()?></td>
                    <td><?php echo($t_inscription->get_Rw())? "oui":"non"?></td>
                    <td><?= $t_inscription->get_Temps()?></td>
                    <td> <a href="/projet_web/controller/inscription/update?id=<?= $t_inscription->get_PkInscr()?>&fketud=<?= $t_inscription->get_FkEtud()?>"> Modifier </a></td>
                    <td> <a href="/projet_web/controller/inscription/delete?id=<?= $t_inscription->get_PkInscr()?>&fketud=<?= $t_inscription->get_FkEtud()?>"> Supprimer </a></td>
                </tr>
            <?php }?>
        </tbody>
    </table>
    </body>
<?php }
else
{
    ?>
    <br>
    <br>
    <body>
    <form class="row g-2 container-fluid" style="border: 1px solid black" method="post">
        <div>
            <p></p>
            <p></p>
            <div class="col-sm-2" style="margin-left: 5%; border: 2px solid #75b798; padding: 1% 1% 1% 4%;">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="CB_coureur" name="CB_coureur" value="1" <?php if($inscr_etud->get_Rw()){?> checked <?php }?>>
                    <label class="form-check-label" for="CB_coureur">Coureur?</label>
                </div>
            </div>
        <br>
        <br>
        <div class="row" style="margin-left: 4%">
            <div class="col-1">
                <button class="btn btn-primary" type="submit">Valider</button>
            </div>
            <input type="hidden" id="PkInscr" name="PkInscr" value="<?=$Pkinscription?>">
            <div class="col-1">
                <button class="btn btn-secondary" type="reset">Annuler</button>
            </div>

        </div>
        <p></p>
        <div></div>
    </form>
    </body>

<?php }?>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/footer.php';
?>
