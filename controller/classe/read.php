<?php
session_start();
include '../secuin.php';
include_once '../../model/classeManager.php';
try
{
    $BDMclasse=new classeManager();
    $Tabclasse = $BDMclasse->read();
    include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/classe/read.php';
}

catch (Exception $Exc)
{
    Exception_perso($Exc);
}
