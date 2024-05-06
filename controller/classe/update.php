<?php
session_start();
include '../secuin.php';
include_once '../../model/classeManager.php';

$BDMclasse=new classeManager();
try
{
    if (isset($_POST['input_niv']))   // après modification
    {
        $inter_classe = new classe();
        $test_int=filter_var($_POST['input_niv'], FILTER_VALIDATE_INT);
        if($test_int) $inter_classe->set_Niv(cleanInput($_POST['input_niv']));
        else throw new Exception("Veuillez utiliser un nombre entier pour déterminer l'année de la classe");
        $nbcaractere=strlen($_POST['input_id']);
        if($nbcaractere>2) throw new Exception("Pas plus de deux caractères à encoder");
        else $inter_classe->set_Ident(cleanInput($_POST['input_id']));
        unset($_GET['id']); //désactivation pour ne pas retourner sur form 1
        $Pkclasse = $_POST['PkEntr'];
        $BDMclasse->update($inter_classe,$Pkclasse);
        $Form=0;
        $Tabclasse = $BDMclasse->read();
    }
    if(isset($_GET['id']))
    {
        $Form=1;   //passage dans le formulaire de modif
        $Pkclas = $_GET['id'];
        $Tabclasse = $BDMclasse->read($Pkclas);
        $inter_classe = $Tabclasse[0]; // récupération de la classe dans le tableau
    }
}
catch (Exception $Exc)
{
    Exception_perso($Exc);
}

include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/classe/update.php';

