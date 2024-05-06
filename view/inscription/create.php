<?php
$title="inscription aux épreuves";
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/header.php';
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/menu.php';
?>
        <body>

            <form class="row g-3 container-fluid" style="border: 1px solid black" method="post">
                <br>
                <br>
                <br>
                <div class="col-lg-2" style="margin-left: 5%; border: 3px solid black; border-color: #75b798">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="CB_coureur" name="CB_coureur">
                        <label class="form-check-label" for="CB_coureur">
                            Coureur?
                        </label>
                    </div>
                </div>
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
                            ?>

                            <tr>
                                <th scope="row"><?= $x ?></th>
                                <td><?= $t_epreuve->get_Date() ?></td>
                                <td><?= $t_epreuve->get_Tstart()?></td>
                                <td><?= $t_epreuve->get_Distance()?></td>
                                <td><?= $t_epreuve->get_Ansco()?></td>
                                <td><button class="btn btn-primary" type="submit" name="PkEpr" value ="<?= $t_epreuve->get_PkEpr()?>">Choisir cette épreuve</button></td>
                                <input type="hidden" id="PkEtud" name="PkEtud" value="<?= $Pketudiant?>">
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
                <?php
                if (isset($erreur)){
                    switch($erreur){
                        case 1:?>
                            <div class="col-md-2"  style="margin-left: 5%; background-color: #0f5132;color:white; text-align: center; margin: auto">
                                <td>INSCRIPTION REUSSIE</td>
                            </div>
                        <?php break;
                         case 23000:?>
                            <div class="col-md-5"  style="margin-left: 5%; background-color:red;color:white; text-align: center; margin: auto">
                                <td>Impossible d'inscrire le même élève deux fois dans la même épreuve </td>
                            </div>
                         <?php break;
                    }
                } ?>
                <br>
            </form>
        <div class="col-4" style="margin-left: 4%">
            <td><a href="/projet_web/controller/etudiant/read?pketud=<?= $_GET['id']?>" >Retour à la liste des élèves</a></td>
        </div>

        </body>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/footer.php';
?>