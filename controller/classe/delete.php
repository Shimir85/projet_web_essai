<?php
session_start();
include '../secuin.php';
include_once '../../model/classeManager.php';

$BDMentr=new classeManager();
try
{
    if(isset($_GET['id']))
    {
        $Pkclasse = $_GET['id'];
        $BDMentr->delete($Pkclasse);
    }
    $Tabclasse = $BDMentr->read();
    include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/classe/read.php';
}
catch (Exception $Exc)
{
    Exception_perso($Exc);
}


