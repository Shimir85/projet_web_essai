<?php
session_start();
include '../secuin.php';
include_once '../../model/arriveeManager.php';
include_once '../../model/epreuveManager.php';
include_once '../../model/inscriptionManager.php';

try
{
    if (isset($_POST['PkEpr']))         //après sélection de l'épreuve pour le classement
    {
        $BDMarrivee=new arriveeManager();
        $BDMinscr=new inscriptionManager();
        $form=1;
        $Pkepreuve=$_POST['PkEpr'];
        $Tcoureur=$BDMarrivee->read("coureur",$Pkepreuve);
        $Tmarcheur=$BDMarrivee->read("marcheur",$Pkepreuve);
    }
    else
    {
        $form = 0;
        $BDMepreuve=new epreuveManager();
        $Tabepreuve = $BDMepreuve->read();
    }
    include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/arrivee/read.php';
}

catch (Exception $Exc)
{
    Exception_perso($Exc);
}
