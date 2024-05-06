
<?php
include_once '../../model/userManager.php';
$BDMuser=new userManager();

try
{
    if(isset($_POST['input_log']))
    {
        $inter_user = new user();
        $inter_user->set_Login($_POST['input_log']);
        $mdp_crypt=password_hash(($_POST['input_pswd']),PASSWORD_BCRYPT);
        $inter_user->set_Pswd($mdp_crypt);
        $inter_user->set_Admin(1);
        $BDMuser=new userManager();
        $BDMuser->create($inter_user);
        $reussite = 1;
    }
    include '../../view/user/create.php';

}
catch (Exception $Exc)
{
    Exception_perso($Exc);
}
