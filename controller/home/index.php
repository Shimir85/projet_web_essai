<?php
    session_start();
    include_once '../../model/userManager.php';
try
{
    $BDMuser=new userManager();
    $nbre_user=$BDMuser->nbre_user();
    if (!$nbre_user)
    {
        $lien_inscription=1;
        if(isset($_POST['input_log'])) $no_utilisateur=1;
    }
    else
    {
        if(isset($_POST['input_log']))
        {
            $user=$BDMuser->read();
            $login=$user->get_Login();
            $pswd=$user->get_Pswd();
            $mdp_saisi=$_POST['input_pswd'];
            $login_saisi=$_POST['input_log'];
            if($login_saisi == $login && password_verify($mdp_saisi, $pswd))
            {
                $_SESSION['LogOk'] = 1;
                //header('Location: http://localhost/projet_web/controller/home/main.php');
                include $_SERVER['DOCUMENT_ROOT'].'/projet_web/controller/home/main.php';
                exit;
            }
            else
            {
                $_SESSION['LogOk']=0;
                session_unset();
                //echo "<script>alert('Paramètres de connexion invalides')</script>";
                header("Location: http://localhost/projet_web/Nedry/nedry.php");
            }
        }
    }
}
catch (Exception $Exc)
{
    Exception_perso($Exc);
}
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/home/index.php';
