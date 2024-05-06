<?php
$title="Classement des participants";
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/header.php';
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/menu.php';
if (!$form){
    ?>
    <body>
    <form class="row g-3 container-fluid" method="post">
        <br>
        <br>
        <table class="table table-striped" style="text-align: center">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Heure de départ</th>
                <th scope="col">Distance de l'épreuve (en km)</th>
                <th scope="col">Année scolaire</th>
                <th scope="col">Choix</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $x =0;
            if(isset($Tabepreuve))
                foreach ($Tabepreuve as $t_epreuve)
                {
                    $x++;
                    if($t_epreuve->get_Date()<=date("Y-m-d")){
                    ?>

                    <tr>
                        <th scope="row"><?= $x ?></th>
                        <td><?= date_format(date_create($t_epreuve->get_Date()),"d-m-Y") ?></td>
                        <td><?= $t_epreuve->get_Tstart()?></td>
                        <td><?= $t_epreuve->get_Distance()?></td>
                        <td><?= $t_epreuve->get_Ansco()?></td>
                        <td><button class="btn btn-primary" type="submit" name="PkEpr" value ="<?= $t_epreuve->get_PkEpr()?>">Choisir cette épreuve</button></td>
                    </tr>
                <?php }}?>
            </tbody>
        </table>
    </form>
    <br>
    </body>
<?php }
    if ($form){ ?>
    <br>
    <br>
    <p1 style="margin-left: 2%; font-size: x-large; color: royalblue"><u> Classement de la course <?=date_format(date_create($BDMinscr->get_date_epr($Pkepreuve)), "d-m-Y") ?></u></p1>
    <br>
    <br>
    <br>
    <p2 style="margin-left: 2%; font-size: larger; color: green"><u> Classement des coureurs </u></p2>
    <br>
    <br>
    <table class="table table-striped" style="text-align: center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">No de dossard</th>
            <th scope="col">Nom</th>
            <th scope="col">Temps de course</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $x =0;
        if(isset($Tcoureur)){
            foreach ($Tcoureur as $t_arrivee)
            {
                $x++;
                ?>
                <tr>
                    <th scope="row"><?= $x ?></th>
                    <td><?= $t_arrivee->get_Nodos()?></td>
                    <td><?= $BDMinscr->get_nom_etudiant($t_arrivee->get_FkEtud())?></td>
                    <td><?= $t_arrivee->get_Temps()?></td>
                </tr>
            <?php }}?>
        </tbody>
    </table>
    <br>
    <br>
    <p2 style="margin-left: 2%; font-size: larger; color: green"><u> Classement des marcheurs </u></p2>
    <br>
    <br>
    <table class="table table-striped" style="text-align: center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">No de dossard</th>
            <th scope="col">Nom</th>
            <th scope="col">Temps de course</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $x =0;
        if(isset($Tmarcheur)){
            foreach ($Tmarcheur as $t_arrivee)
            {
                $x++;
                ?>
                <tr>
                    <th scope="row"><?= $x ?></th>
                    <td><?= $t_arrivee->get_Nodos()?></td>
                    <td><?= $BDMinscr->get_nom_etudiant($t_arrivee->get_FkEtud())?></td>
                    <td><?= $t_arrivee->get_Temps()?></td>
                </tr>
            <?php }}?>
        </tbody>
    </table>
    <br>
    <td><a href="/projet_web/controller/arrivee/read.php" style="margin-left: 2%"> Retour liste des épreuves </a></td>
    </body>
<?php  }
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/footer.php';?>