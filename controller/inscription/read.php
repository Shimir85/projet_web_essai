<?php
session_start();
include '../secuin.php';
include_once '../../model/inscriptionManager.php';
include_once '../../model/etudiantManager.php';   //pour la gestion du nom de classe dans le read

try
{
    $BDMinsc=new inscriptionManager();
    $BDMetud=new etudiantManager();
    if (isset($_GET['id']))             //gestion read des inscription de la partie "étudiants"
    {
        $Fketud=$_GET['id'];
        $read="etudiant";
        $Tabinscription = $BDMinsc->read($Fketud);
    }
    if (isset($_GET['pkepr']))          //gestion read des inscription de la partie "épreuve"
    {
        $FkEpr=$_GET['pkepr'];
        $read="epreuve";
        $Tabinscription = $BDMinsc->read($FkEpr, $read);
    }
}
catch (Exception $Exc)
{
    Exception_perso($Exc);
}

include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/inscription/read.php';