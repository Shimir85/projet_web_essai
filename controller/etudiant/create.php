<?php
session_start();
include '../secuin.php';
include_once '../../model/etudiantManager.php';
include_once '../../model/inscriptionManager.php';
try
{
    if(isset($_GET['id']))$Pkclas = $_GET['id'];
    if(isset($_POST['input_nom']))
    {
        $inter_etudiant = new etudiant();
        $inter_etudiant->set_Fkclas($Pkclas);
        $inter_etudiant->set_Nom(cleanInput($_POST['input_nom']));
        $inter_etudiant->set_Pren(cleanInput($_POST['input_pren']));
        $inter_etudiant->set_Sexe(cleanInput($_POST['input_sexe']));
        $BDMetudiant=new etudiantManager();
        $BDMetudiant->create($inter_etudiant);
        $reussite = 1;
    }
}
catch (Exception $Exc)
{
    Exception_perso($Exc);
}

include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/etudiant/create.php';
