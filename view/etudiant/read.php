<?php
$title="Récapitulatif des étudiants de la classe";
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/header.php';
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/menu.php';
?>
    <body>

    <table class="table table-striped" style="text-align: center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Année</th>
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
                    <td><?= $BDMetud->get_nom_classe_complet($Pk_clas)?></td>
                    <td><?= $t_etud->get_Sexe()?></td>
                    <td><?= $t_etud->get_Nb_Insc()?></td>
                    <td> <a href="/projet_web/controller/inscription/create?id=<?= $t_etud->get_PkEtud()?>"> Ajouter inscription </a></td>
                    <td> <a href="/projet_web/controller/inscription/read?id=<?= $t_etud->get_PkEtud()?>"> Liste inscriptions </a></td>
                    <td> <a href="/projet_web/controller/etudiant/update?id=<?= $t_etud->get_PkEtud()?>&classe=<?= $t_etud->get_FkClas()?>"> Modifier </a></td>
                    <td> <a href="/projet_web/controller/etudiant/delete?id=<?= $t_etud->get_PkEtud()?>&classe=<?= $t_etud->get_FkClas()?>"> Supprimer </a></td>
                </tr>
            <?php }?>
        </tbody>
    </table>
    <div class="col-4" style="margin-left: 4%">
        <td><a href="/projet_web/controller/classe/read.php">Retour à la liste des classes</a></td>
    </div>
    </body>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/footer.php';
?>