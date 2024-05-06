<?php
$title="Récapitulatif des classes";
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/header.php';
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/menu.php';
?>
    <body>

    <table class="table table-striped" style="text-align: center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Année</th>
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
                    <td> <a href="/projet_web/controller/etudiant/read?pk=<?= $t_classe->get_Pkclas()?>"> Liste étudiants </a></td>
                    <td> <a href="/projet_web/controller/classe/update?id=<?= $t_classe->get_Pkclas()?>"> Modifier </a></td>
                    <td> <a href="/projet_web/controller/classe/delete?id=<?= $t_classe->get_Pkclas()?>"> Supprimer </a></td>
                </tr>
            <?php }?>
        </tbody>
    </table>
    </body>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/footer.php';
?>