<?php
session_start();
include '../secuin.php';
include_once '../../model/epreuveManager.php';


$BDMepreuve=new epreuveManager();
try
{
    if (isset($_POST['input_date']))    //Update BDD après encodage modifications + view des épreuves
    {
        $inter_epreuve = new epreuve();
        $date=$_POST['input_date'];
        if ($date<date("Y-m-d"))throw new Exception("Date antérieure à la date du jour, veuillez sélectionnez une autre date");
        $inter_epreuve->set_Date(cleanInput($date));
        $inter_epreuve->set_Tstart(cleanInput($_POST['input_heure']));
        $test_int=filter_var($_POST['input_distance'], FILTER_VALIDATE_INT);
        if($test_int) $inter_epreuve->set_Distance(cleanInput($_POST['input_distance']));
        else throw new Exception("Veuillez utiliser un nombre entier pour déterminer la distance");
        $Pkepreuve = $_POST['PkEpr'];
        unset($_GET['id']); //désactivation pour ne pas retourner sur 'form 1'
        $BDMepreuve->update($inter_epreuve,$Pkepreuve);
        $Form=0;
        $Tabepreuve = $BDMepreuve->read();
    }
    if(isset($_GET['id']))    //on récupère l'id de la demande d'update de la page précédente pour passage formulaire update
    {
        $Form=1;
        $Pkepreuve = $_GET['id'];
        $Tabepreuve = $BDMepreuve->read($Pkepreuve);
        $inter_epreuve = $Tabepreuve[0]; // récupération de l'épreuve dans le tableau
    }
}
catch (Exception $Exc)
{
    Exception_perso($Exc);
}

include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/epreuve/update.php';

