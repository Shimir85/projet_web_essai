<?php
session_start();
include '../secuin.php';
include_once '../../model/inscriptionManager.php';
include_once '../../model/etudiantManager.php';

try
{
    $BDMinsc=new inscriptionManager();
    $BDMetud=new etudiantManager();

    if(isset($_GET['id']))   //gestion delete point de vue étudiant et epreuve
    {
        $Pkinscription = $_GET['id'];
        $BDMinsc->delete($Pkinscription);

        if(isset($_GET['fketud']))   // gestion read après fonction delete point de vue étudiant
        {
            $read="etudiant";
            $Fketud=$_GET['fketud'];
            $Tabinscription = $BDMinsc->read($Fketud);
        }
        if(isset($_GET['FkEpr']))   // gestion read après del point de vue épreuve
        {
            $read="epreuve";
            $FkEpr=$_GET['FkEpr'];
            $Tabinscription = $BDMinsc->read($FkEpr, $Pkinscription);
        }
    }
}
catch (Exception $Exc)
{
    Exception_perso($Exc);
}

include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/inscription/read.php';

