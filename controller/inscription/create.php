<?php
session_start();
include '../secuin.php';
include_once '../../model/inscriptionManager.php';
include_once '../../model/epreuveManager.php';
include_once '../../model/etudiantManager.php';

try
{
    if (isset($_POST['PkEtud']))
    {
        $inter_Inscription=new inscription();
        $BDMinscription=new inscriptionManager();
        $inter_Inscription->set_FkEtud(($_POST['PkEtud']));
        $inter_Inscription->set_FkEpr(($_POST['PkEpr']));
        $nbre_inscription=$BDMinscription->get_nbre_inscr(($_POST['PkEpr']));
        $dossard=($BDMinscription->get_max_id($_POST['PkEpr']))+1;
        $inter_Inscription->set_NoDos($dossard);
        if (isset($_POST['CB_coureur'])) $inter_Inscription->set_Rw(true);
        else $inter_Inscription->set_Rw(false);
        $Tstart=$BDMinscription->get_Tstart(($_POST['PkEpr']));
        $inter_Inscription->set_Tstart($Tstart);
        $erreur=$BDMinscription->create($inter_Inscription);
    }
    if(isset($_GET['id']))
    {
        $Pketudiant = $_GET['id'];
        $BDMepreuve=new epreuveManager();
        $Tabepreuve = $BDMepreuve->read();
    }
}
catch (Exception $Exc)
{
    Exception_perso($Exc);
}

include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/inscription/create.php';
