<?php
session_start();
include '../secuin.php';
include_once '../../model/etudiantManager.php';

$BDMetud=new etudiantManager();
try
{
    if(isset($_GET['classe']))$Pk_clas = $_GET['classe'];
    if (isset($_POST['input_nom']))         //Update BDD + view
    {
        $inter_etudiant = new etudiant();
        $inter_etudiant->set_Nom(cleanInput($_POST['input_nom']));
        $inter_etudiant->set_Pren(cleanInput($_POST['input_pren']));
        $inter_etudiant->set_Sexe(cleanInput($_POST['input_sexe']));
        unset($_GET['id']); //désactivation pour ne pas retourner sur form 1
        $Pketud = $_POST['Pketud'];
        $BDMetud->update($inter_etudiant,$Pketud);
        $Form=0;
        $Tabetud = $BDMetud->read($Pk_clas);
    }
    if(isset($_GET['id']))          //passage formulaire encodage
    {
        $Form=1;
        $Pketudiant = $_GET['id'];
        $TEtudiant= $BDMetud->read($Pketudiant, $Pk_clas);
        $inter_etudiant = $TEtudiant[0];
    }
}
catch (Exception $Exc)
{
    Exception_perso($Exc);
}

include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/etudiant/update.php';
