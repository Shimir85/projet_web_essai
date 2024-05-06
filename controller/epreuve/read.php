<?php
session_start();
include '../secuin.php';
include_once '../../model/epreuveManager.php';
try
{
    $BDMepreuve=new epreuveManager();
    $Tabepreuve = $BDMepreuve->read();
}
catch (Exception $Exc)
{
    Exception_perso($Exc);
}
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/epreuve/read.php';
