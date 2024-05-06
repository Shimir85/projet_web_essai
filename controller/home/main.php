<?php
include_once '../../model/inscriptionManager.php';
include '../secuin.php';

try
{
    $BDMinscription=new inscriptionManager();
    $Tresultat=$BDMinscription->get_stat_run();
    $coureur=$Tresultat["coureur"];
    $marcheur=$Tresultat["marcheur"];
    $abstention=$Tresultat["abstention"];
}
catch (Exception $Exc)
{
    Exception_perso($Exc);
}
include '../../view/home/main.php';