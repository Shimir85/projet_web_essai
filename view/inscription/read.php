<?php
$title="Récapitulatif des inscriptions";
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/header.php';
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/menu.php';

if($read=="etudiant"){
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
                    <td><?= date_format(date_create($BDMinsc->get_date_epr($t_inscription->get_FkEpr())),"d-m-Y") ?></td>
                    <td><?= $t_inscription->get_Tstart()?></td>
                    <td><?= $t_inscription->get_NoDos()?></td>
                    <td><?php echo($t_inscription->get_Rw())? "oui":"non"?></td>
                    <td><?= $t_inscription->get_Temps()?></td>
                    <?php if($BDMinsc->get_date_epr($t_inscription->get_FkEpr())>=date("Y-m-d")){ ?>
                    <td> <a href="/projet_web/controller/inscription/update?id=<?= $t_inscription->get_PkInscr()?>&fketud=<?= $t_inscription->get_FkEtud()?>"> Modifier </a></td>
                    <td> <a href="/projet_web/controller/inscription/delete?id=<?= $t_inscription->get_PkInscr()?>&fketud=<?= $t_inscription->get_FkEtud()?>"> Supprimer </a></td>
                    <?php } else { ?>
                    <td></td>
                    <td></td>
                </tr>
            <?php }}?>
        </tbody>
    </table>
    </body>
<?php }

if ($read=="epreuve"){?>
    <body>
    <br>
    <h1 style="margin-left: 4%; font-size: larger; color: green"><u> Course du <?=date_format(date_create($BDMinsc->get_date_epr($FkEpr)), "d-m-Y") ?> </u></h1>
    <br>
    <br>
    <table class="table table-striped" style="text-align: center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom de l'élève</th>
            <th scope="col">Classe</th>
            <th scope="col">No Dossard</th>
            <th scope="col">Coureur?</th>
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
                    <td><?= $BDMinsc->get_nom_etudiant($t_inscription->get_FkEtud()) ?></td>
                    <td><?= $BDMetud->get_nom_classe_complet($BDMetud->get_classe_pketud($t_inscription->get_FkEtud()))?></td>
                    <td><?= $t_inscription->get_NoDos()?></td>
                    <td><?php echo($t_inscription->get_Rw())? "oui":"non"?></td>
                    <td> <a href="/projet_web/controller/inscription/delete?id=<?= $t_inscription->get_PkInscr()?>&FkEpr=<?= $t_inscription->get_FkEpr()?>"> Supprimer </a></td>
                </tr>
            <?php }?>
        </tbody>
    </table>
    </body>

<?php }
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/footer.php';
?>
