<?php
session_start();
include '../secuin.php';
include_once '../../model/etudiantManager.php';

$BDMetud=new etudiantManager();

try
{
    if(isset($_GET['id']))
    {
        $Pk_etud = $_GET['id'];
        $BDMetud->delete($Pk_etud);
    }
    if(isset($_GET['classe']))$Pk_clas = $_GET['classe'];
    $Tabetud = $BDMetud->read($Pk_clas);

    include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/etudiant/read.php';
}
catch (Exception $Exc)
{
    Exception_perso($Exc);
}


