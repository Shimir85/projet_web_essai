<?php
$title="Récapitulatif des épreuves";
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/header.php';
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/menu.php';
?>
    <body>

    <table class="table table-striped" style="text-align: center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Heure de départ</th>
            <th scope="col">Distance de l'épreuve (en km)</th>
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
                    <td><?= date_format(date_create($t_epreuve->get_Date()), "d-m-Y") ?></td>
                    <td><?= $t_epreuve->get_Tstart()?></td>
                    <td><?= $t_epreuve->get_Distance()?></td>
                    <td><?= $t_epreuve->get_Ansco()?></td>
                    <td><?= $BDMepreuve->Nbinsc_epr($t_epreuve->get_PkEpr())?></td>
                    <td> <a href="/projet_web/controller/inscription/read?pkepr=<?= $t_epreuve->get_PkEpr()?>"> Liste des participants </a></td>
                    <?php if($t_epreuve->get_Date()>=date("Y-m-d")){ ?>
                    <td> <a href="/projet_web/controller/epreuve/update?id=<?= $t_epreuve->get_PkEpr()?>"> Modifier </a></td>
                    <td> <a href="/projet_web/controller/epreuve/delete?id=<?= $t_epreuve->get_PkEpr()?>"> Supprimer </a></td>
                    <?php } else{ ?>
                    <td></td>
                    <td></td>
                </tr>
            <?php }}?>
        </tbody>
    </table>
    </body>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/footer.php';
?>