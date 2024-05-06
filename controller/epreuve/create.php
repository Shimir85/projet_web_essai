<?php
session_start();
include '../secuin.php';
include_once '../../model/epreuveManager.php';
try
{
    if(isset($_POST['input_date']))
    {
        $inter_epreuve = new epreuve();
        $date=$_POST['input_date'];
        if ($date<date("Y-m-d"))throw new Exception("Date antérieure à la date du jour, veuillez sélectionnez une autre date");
        $inter_epreuve->set_Date(cleanInput($date));
        $inter_epreuve->set_Tstart(cleanInput($_POST['input_heure']));
        $test_int=filter_var($_POST['input_distance'], FILTER_VALIDATE_INT);
        if($test_int) $inter_epreuve->set_Distance(cleanInput($_POST['input_distance']));
        else throw new Exception("Veuillez utiliser un nombre entier pour déterminer la distance");
        $BDMepreuve=new epreuveManager();
        $BDMepreuve->create($inter_epreuve);
        $reussite = 1;
    }
}
catch (Exception $Exc)
{
    Exception_perso($Exc);
}
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/epreuve/create.php';
