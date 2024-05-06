<?php
$title="Encodage des arrivées";
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
                            if($t_epreuve->get_Date()>=date("Y-m-d")){
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

if ($form){
?>
    <body>
    <br>
    <br>
    <form class="row g-3 container-fluid"  method="post">
        <div class="col-md-3" style="margin-left: 5%">
            <label for="input_dossard" class="form-label">Encodage du dossard à l'arrivée</label>
            <input type="text" class="form-control" id="input_dossard" name="input_dossard" required autofocus>
        </div>
        <div class="col-2" style="margin-left: 2%">
            <div>
                <br>
            </div>
            <td><button class="btn btn-primary" type="submit" name="PkEpr" value ="<?= $Pkepreuve?>">Valider</button></td>
        </div>
        <?php
        if(isset($erreur)){
            switch($erreur)
                {
                case 1 : ?>
                    <div class="col-md-2"  style="margin-left: 5%; background-color: red;color:white; text-align: center; margin: auto">
                        <td>Dossard déjà encodé</td>
                    </div>
                <?php break;
                case 2 : ?>
                <div class="col-md-2"  style="margin-left: 5%; background-color: red;color:white; text-align: center; margin: auto">
                    <td>Dossard inexistant pour cette épreuve</td>
                </div>
                <?php break;
            }}?>
        <div>
            <br>
        </div>
    </form>
    <p1 style="margin-left: 2%; font-size: x-large; color: royalblue"><u> Classement de la course </u></p1>
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
            <th scope="col">Temps de course</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $x =0;
        if(isset($Tarrivee)){

            foreach ($Tarrivee as $t_arrivee)
            {
                    $x++;
                    ?>
                    <tr>
                        <th scope="row"><?= $x ?></th>
                        <td><?= $t_arrivee->get_Nodos()?></td>
                        <td><?= $t_arrivee->get_Temps()?></td>
                    </tr>
            <?php }}?>
        </tbody>
    </table>
    <br>
    </body>
<?php  }
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/footer.php';?>