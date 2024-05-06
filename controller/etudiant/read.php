<?php
session_start();
include '../secuin.php';
include_once '../../model/etudiantManager.php';


$BDMetud=new etudiantManager();
try
{
    if(isset($_GET['pketud'])) $Pk_clas=$BDMetud->get_classe_pketud($_GET['pketud']);   //en cas de retour sur la liste étudiants dans la partie "inscriptions"
    if(isset($_GET['pk'])) $Pk_clas = $_GET['pk'];      //à partir du choix de la classe
    $Tabetud = $BDMetud->read($Pk_clas);
}
catch (Exception $Exc)
{
    Exception_perso($Exc);
}

include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/etudiant/read.php';
