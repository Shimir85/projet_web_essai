<?php
session_start();
include '../secuin.php';
include_once '../../model/classeManager.php';

if(isset($_POST['input_niv']))
try
{
    $inter_classe = new classe();
    $test_int=filter_var($_POST['input_niv'], FILTER_VALIDATE_INT);
    if($test_int) $inter_classe->set_Niv(cleanInput($_POST['input_niv']));
    else throw new Exception("Veuillez utiliser un nombre entier pour déterminer l'année de la classe");
    $nbcaractere=strlen($_POST['input_id']);
    if($nbcaractere>2) throw new Exception("Pas plus de deux caractères à encoder");
    else $inter_classe->set_Ident(cleanInput($_POST['input_id']));
    $BDMclasse=new classeManager();
    $BDMclasse->create($inter_classe);
    $reussite = 1;
}
catch (Exception $Exc)
{
    Exception_perso($Exc);
}
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/classe/create.php';
