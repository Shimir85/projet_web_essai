<?php
session_start();
include '../secuin.php';
include_once '../../model/epreuveManager.php';

$BDMepreuve=new epreuveManager();
try
{
    if(isset($_GET['id']))
    {
        $Pkepreuve = $_GET['id'];
        $BDMepreuve->delete($Pkepreuve);
    }
    $Tabepreuve = $BDMepreuve->read();
    include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/epreuve/read.php';
}
catch (Exception $Exc)
{
    Exception_perso($Exc);
}


