<?php
session_start();
include '../secuin.php';
include_once '../../model/arriveeManager.php';
include_once '../../model/epreuveManager.php';
include_once '../../model/inscriptionManager.php';

if (isset($_POST['PkEpr'])||isset($_POST['input_dossard']))         //passage la première fois sur la page d'encodage des dossards
{
    $form=1;
    $Pkepreuve=$_POST['PkEpr'];
    if(isset($_POST['input_dossard']))    //Après encodage du dossard dans le textbox
    {
        $Dossard=cleanInput($_POST['input_dossard']);
        $BDMarrivee=new arriveeManager();
        $erreur=$BDMarrivee->add_arrivee_inscription($Dossard,$Pkepreuve);
        $Tarrivee=$BDMarrivee->read($Dossard, $Pkepreuve);
    }
}
else
{
    $form = 0;
    $BDMepreuve=new epreuveManager();
    $Tabepreuve = $BDMepreuve->read();
}

include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/arrivee/create.php';
