<?php
session_start();
include '../secuin.php';
include_once '../../model/inscriptionManager.php';

try
{
    $BDMinscription=new inscriptionManager();
    $Pkinscription = $_GET['id'];
    $Fketud=$_GET['fketud'];
    if (isset($_POST['PkInscr']))    //update BDD + view inscription pour la partie "étudiant"
    {
        if(isset($_POST['CB_coureur']))$Rw=true;
        else $Rw=false;
        $BDMinscription->update($Pkinscription,$Rw);
        unset($_GET['id']);         //désactivation pour ne pas retourner sur form 1
        $Form=0;
        $Tabinscription = $BDMinscription->read($Fketud);
    }

    if(isset($_GET['id']))    //passage formulaire de modification
    {
        $resultat=$BDMinscription->read($Fketud);
        $inscr_etud=$resultat[0];
        $Form=1;
    }
}
catch (Exception $Exc)
{
    Exception_perso($Exc);
}

include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/inscription/update.php';

